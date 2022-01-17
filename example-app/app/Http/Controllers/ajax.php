<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ajax extends Controller
{
    public function index(int $id) {
        $children = [];
        for($i=0;$i<3;$i++) {
            $children[] = ['id' => $id*3+$i, 'label' => now()->addDays($i+$id)->dayName];
        }

        return json_encode($children);
    }
}
