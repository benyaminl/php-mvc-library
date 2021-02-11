<?php 
define("GLOBALDIR", realpath(__DIR__."/..")); // Untuk dir utama yang di load terlebih dahulu

// Add some include path first this directory, 2nd is app directory
set_include_path(__DIR__.PATH_SEPARATOR.GLOBALDIR);

// Function to call all dependencies, so it will like classing on java. 
// @see http://php.net/manual/en/function.spl-autoload-register.php 
// @see https://stackoverflow.com/questions/30569615/autoload-namespaces-based-on-directory-structure 
// @see http://php.net/manual/en/language.oop5.autoload.php
spl_autoload_register(); 