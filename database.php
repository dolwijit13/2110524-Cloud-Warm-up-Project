<?php
    require_once('config.php');
    require 'aws/aws-autoloader.php';
    use Aws\DynamoDb\DynamoDbClient;

    $client = DynamoDbClient::factory(array(
        'profile'=>'default',
        'region'  => 'ap-east-1',
        'version' => '2012-08-10',
        'credentials' => [
                'key' => $key,
                'secret' => $secret
        ]
    ));
?>