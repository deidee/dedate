<?php

require_once '../src/class.dedate.php';

$dedate = new Dedate;
// Should return TRUE only when the (server) time is 13:37.
var_dump($dedate->is1337Time());

