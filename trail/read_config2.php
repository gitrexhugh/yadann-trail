<?php

//define('BIRD', 'Dodo bird');

// Parse without sections
$ini_array = parse_ini_file('webconfig.ini');
print_r($ini_array);

// Parse with sections
//$ini_array = parse_ini_file("sample.ini", true);
//print_r($ini_array);

?>