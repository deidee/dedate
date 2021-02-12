<?php

require_once '../src/class.dedate.php';

$dedate = new Dedate(strtotime('2021-05-09'));
// Should return true.
var_dump($dedate->isMothersDay());
