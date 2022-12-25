<?php

declare(strict_types=1);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use deidee\Dedate\Dedate;

$dedate = new Dedate(strtotime('2021-05-09'));
// Should return true.
var_dump($dedate->isMothersDay());
