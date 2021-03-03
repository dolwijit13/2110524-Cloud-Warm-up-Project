<?php
    require_once('config.php');
    function getSafe($key){
        if(!array_key_exists($key, $_POST))
            return false;
        return trim($_POST[$key]);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = getSafe('username');
        $password = getSafe('password');
        
        $hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
        echo $hash;
        if (password_verify('rasmuslerdorf', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
        
        echo 'login';
    }
?>