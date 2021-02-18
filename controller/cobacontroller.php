<?php

namespace controller;

class CobaController {
    public $abc = 0;

    public function test($a) {
        \var_dump($a);
        echo "HALO $a";
        echo \htmlspecialchars("<div></div>");
    }
}