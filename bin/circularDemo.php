#!/usr/bin/php
<?php

include_once 'ListSet.lib.php';


// Define how we want to perform tests.
$listSize = (isset($argv[1]))?$argv[1]:100;

// Get a list set with numbers.
$set = new ListSet($listSize);

// Show the raw loops.
$loops=$set->findLoops();
#print_r();

// Show how large each set of loops is.
$loopSizes=$set->getLoopsSizes($loops);
#print_r($loopSizes);

// Show stats on loop sizes.
//print_r($set->getLoopsStats($loopSizes));
$set->prettyPrintStats($set->getLoopsStats($loopSizes));
?>
