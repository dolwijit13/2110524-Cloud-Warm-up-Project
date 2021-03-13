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
            if (password_verify($old_password, $result['Item']['password']['S'])) {
                $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT, $options);
                $result = $client->updateItem(array(
                        'TableName' => 'WarmUpProjectUser',
                        'Key' => array(
                            "username" => array("S" => $username),
                        ),
                        'AttributeUpdates' => array(
                            "password" => array(
                                "Value" => array("S" => $hashed_new_password)
                            )
                        )
                    ));
                }
            else {
                echo 'Invalid username or password.';
            }
        }
    }
?>