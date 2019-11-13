<?php

require_once '../src/class.dedate.php';

$dedate = new Dedate;
// Should return TRUE only when the (server) date is April 1st.
var_dump($dedate->isAprilFools());
// This should do the same as above.
var_dump($dedate->{'aprilFools'});

