<?php 
/** @var \system\Route $router Router Var */
$router->get("halo/{a}", "CobaController.test");
$router->get("mahasiswa", "MahasiswaController.list");