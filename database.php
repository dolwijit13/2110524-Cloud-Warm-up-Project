<?php
    require_once('config.php');
    require '../vendor/autoload.php';

    use Google\Cloud\Datastore\DatastoreClient;

    $datastore = new DatastoreClient([
        'keyFilePath' => 'atomic-climate.json',
        'projectId' => 'atomic-climate-307312'
    ]);

?>
