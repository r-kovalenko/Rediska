<?php

require_once 'library/Rediska.php';

$rediska = new Rediska(array(
    'servers' => array(
        array('host' => '127.0.0.1', 'port' => 6380),
        array('host' => '127.0.0.1', 'port' => 6381),
    )
));

$key1 = 'key1';
$key2 = 'key3123';

$connection1 = $rediska->getConnectionByKeyName($key1);
$connection2 = $rediska->getConnectionByKeyName($key2);

if ($connection1->getAlias() == $connection2->getAlias()) {
    die('Same servers');
}

var_dump($rediska->diffSets(array($key1, $key2)));

$rediska->delete(array($key1, $key2));