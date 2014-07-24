<?php

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('./ext'));


$rules_files = new RegexIterator($files, '/-rules\.php$/i');
foreach ($rules_files as $file) {
echo $file . '<br>';
preg_match('/\/ext\/(.*)\/(.*)-rules.php/',$file, $match);
//var_dump($match);
echo "input = $match[2]";
echo '<br>';
echo "output = $match[1]";
echo '<br>';
}
