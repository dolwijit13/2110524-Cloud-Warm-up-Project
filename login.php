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
        $password = getSafe('password');

	$key = $datastore->key('User', $username);
        $user = $datastore->lookup($key);

        if($user == null) {
            echo 'Invalid username or password.';
	    echo str_repeat("throughput",25);
        }
        else {
            if (password_verify($password, $user->password)) {
                echo 'Logged in';
		echo str_repeat("throughput",25);
            } else {
                echo 'Invalid username or password.';
		echo str_repeat("throughput",25);
            }
        }
    }
?>
