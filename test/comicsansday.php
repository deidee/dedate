<?php

declare(strict_types=1);

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use deidee\Dedate\Dedate;

$dedate = new Dedate;

var_dump($dedate->isComicSansDay());

$comicSansDay = new Dedate(mktime(0, 0, 0, 7, 7, 2023));

var_dump($comicSansDay->isComicSansDay());
