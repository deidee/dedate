<?php

require_once '../src/class.dedate.php';

$dedate = new Dedate(strtotime('2021-06-20'));
// Should return true.
var_dump($dedate->isFathersDay());
