<?php

require_once '../src/class.dedate.php';

$dedate = new Dedate;
// Should return the current hour.
var_dump($dedate->H);
// Should return FALSE;
var_dump($dedate->h);

