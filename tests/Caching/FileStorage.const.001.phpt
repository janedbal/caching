<?php

/**
 * Test: Nette\Caching\Storages\FileStorage constant dependency test.
 */

use Nette\Caching\Cache;
use Nette\Caching\Storages\FileStorage;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$key = 'nette';
$value = 'rulez';

$cache = new Cache(new FileStorage(TEMP_DIR));


define('ANY_CONST', 10);


// Writing cache...
$cache->save($key, $value, [
	Cache::CONSTS => 'ANY_CONST',
]);

Assert::truthy($cache->load($key));
