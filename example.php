<?php require_once('vendor/autoload.php');

$m = new \RobbieP\MeaningCloudProofReader\MeaningCloud(['api_key' => '']);

$m->check("Hello Im workin on a new projeckt");