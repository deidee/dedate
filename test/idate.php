<?php

declare(strict_types=1);

namespace deidee;

require_once '../src/class.dedate.php';

$dedate = new Dedate;
// Should return the current hour.
var_dump($dedate->H);
// Should return FALSE;
var_dump($dedate->h);

