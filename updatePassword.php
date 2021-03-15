<?php
    require_once('config.php');
    require_once('database.php');
    function getSafe($key){
        if(!array_key_exists($key, $_POST))
            return false;
        return trim($_POST[$key]);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = getSafe('username');
        $old_password = getSafe('old_password');
        $new_password = getSafe('new_password');

        $key = $datastore->key('User', $username);
	$user = $datastore->lookup($key);

        if($user == null) {
            echo 'Invalid username or password.';
	    echo str_repeat("throughput",25);
        }
        else {
            if (password_verify($old_password, $user->password)) {
                $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT, $options);
		$transaction = $datastore->transaction();
                $key = $datastore->key('User', $username);
                $user = $transaction->lookup($key);
                $user->password = $hashed_new_password;
                $transaction->upsert($user);
                $transaction->commit();
		echo str_repeat("throughput",25);
            }
            else {
                echo 'Invalid username or password.';
		echo str_repeat("throughput",25);
            }
        }
    }
?>
