<?php
    function getSafe($key){
        if(!array_key_exists($key, $_POST))
            return false;
        return trim($_POST[$key]);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $username = getSafe('username');
        $password = getSafe('password');
        
        echo 'login';
    }
?>