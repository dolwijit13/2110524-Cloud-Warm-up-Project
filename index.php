<?php
    require_once('config.php');
    function getSafe($key){
        if(!array_key_exists($key, $_POST))
            return false;
        return trim($_POST[$key]);
    }

    function createAccount($username, $password) {
        echo 'createAccount';
    }

    function login($username, $password, $options) {
        
        $hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
        echo $hash;
        if (password_verify('rasmuslerdorf', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }

    function updatePassword($username, $password) {
        echo 'updatePassword';
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = getSafe('username');
        $password = getSafe('password');
        return createAccount($username, $password);
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $username = getSafe('username');
        $password = getSafe('password');
        return login($username, $password, $options);
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'PUT')
    {
        $username = getSafe('username');
        $password = getSafe('password');
        return updatePassword($username, $password);
    }
?>
