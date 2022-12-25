<?php

declare(strict_types=1);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use deidee\Dedate\Dedate;

$dedate = new Dedate;
// Should return TRUE only when the (server) time is 13:37.
var_dump($dedate->is1337Time());
// This should do the same as above.
var_dump($dedate->{'1337Time'});

