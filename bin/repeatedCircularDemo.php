#!/usr/bin/php
<?php

include_once 'RepeatAndStats.lib.php';


// Define how we want to perform tests.
$listSize = (isset($argv[1]))?$argv[1]:100;
$repeats = (isset($argv[2]))?$argv[2]:1000;

// Get a list set with numbers.
$repeatAndStats = new RepeatAndStats($listSize);

$stats = $repeatAndStats->repeat($repeats);
$repeatAndStats->analyseStats($stats);
?>
