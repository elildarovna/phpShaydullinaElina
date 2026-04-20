<?php

namespace App\Controllers;

use App\Models\Psychologist;

class HomeController
{
    public function index()
    {
        $list = Psychologist::all();

        foreach ($list as $item) {
            echo $item['name'] . " - " . $item['specialty'] . "<br>";
        }
    }
}