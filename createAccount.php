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
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
        
        $result = $client->putItem(array(
            'TableName' => 'WarmUpProjectUser',
            'Item' => array(
                'username'      => array('S' => $username),
                'password'    => array('S' => $hashed_password),
            )
        ));
        echo str_repeat("throughput",100);
    }
?>