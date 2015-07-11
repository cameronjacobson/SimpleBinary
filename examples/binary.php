<?php

require_once(dirname(__DIR__).'/vendor/autoload.php');

use SimpleBinary\SimpleBinary;

$sb = new SimpleBinary('');

echo 'Packing 8-bit Int'.PHP_EOL;
$sb->setInt8(250);
echo 'Packing 16-bit Int'.PHP_EOL;
$sb->setInt16(1000);
echo 'Packing string with length: 10'.PHP_EOL;
$sb->setInt8(10);
$sb->setString('0123456789');
echo 'Packing 32-bit Int'.PHP_EOL.PHP_EOL;
$sb->setInt32(1000000);

echo 'Total length of packed binary string is: ';
echo strlen($sb->getBinary()).PHP_EOL.PHP_EOL;

echo 'Unpacking 8-bit Int'.PHP_EOL;
echo $sb->getInt8().PHP_EOL;
echo 'Unpacking 16-bit Int'.PHP_EOL;
echo $sb->getInt16().PHP_EOL;
echo 'Getting length of string to unpack'.PHP_EOL;
echo $sb->getInt8().PHP_EOL;
echo 'Getting string of length 10:'.PHP_EOL;
echo $sb->getString(10).PHP_EOL;
echo 'Unpacking 32-bit Int'.PHP_EOL;
echo $sb->getInt32().PHP_EOL;

