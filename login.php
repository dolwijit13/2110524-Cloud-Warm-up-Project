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

        $result = $client->getItem(array(
            'TableName' => 'WarmUpProjectUser',
            'Key' => array(
                "username" => array("S" => $username)
            )
        ));
        
        if($result['Item'] == null){
            echo 'Invalid username or password.';
        }
        else {
            if (password_verify($password, $result['Item']['password']['S'])) {
                echo 'Logged in';
            } else {
                echo 'Invalid username or password.';
            }
        }
    }
?>