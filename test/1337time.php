<?php

declare(strict_types=1);

namespace deidee;

require_once '../src/class.dedate.php';

$dedate = new Dedate;
// Should return TRUE only when the (server) time is 13:37.
var_dump($dedate->is1337Time());
// This should do the same as above.
var_dump($dedate->{'1337Time'});

