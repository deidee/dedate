<?php

declare(strict_types=1);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use deidee\Dedate\Dedate;

$dedate = new Dedate;
// Should return the current hour.
var_dump($dedate->H);
// Should return FALSE;
var_dump($dedate->h);

