<?php
declare(strict_types=1);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use deidee\Dedate\Dedate;

$dedate = new Dedate;
// Should return TRUE only when the (server) date is April 1st.
var_dump($dedate->isAprilFools());
// This should do the same as above.
var_dump($dedate->{'aprilFools'});

