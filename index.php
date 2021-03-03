<?php
    function getSafe($key){
        if(!array_key_exists($key, $_POST))
            return false;
        return trim($_POST[$key]);
    }

    function createAccount($username, $password) {
        echo 'createAccount';
    }

    function login($username, $password) {
        echo 'login';
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
        return login($username, $password);
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'PUT')
    {
        $username = getSafe('username');
        $password = getSafe('password');
        return updatePassword($username, $password);
    }
?>
