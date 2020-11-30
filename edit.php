<?php 
require 'vendor/autoload.php';

$client = new MongoDB\Client;

$tktdb = $client -> tktdb;

$tktcoll=$tktdb -> tktcoll;

$updateResult = $tktcoll->updateOne(
    ['executive'=>'R3'],['$set'=>['executive'=>'R4', 'description'=>'new 4']]
);



?>

