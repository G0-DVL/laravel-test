<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Base extends Controller
{
    public function index() {
        $boutiques = json_decode('[
    {"id":1,"label":"terre"},
    {"id":2,"label":"lune"},
    {"id":3,"label":"soleil"}
]');
        return view('base', ['boutiques' => $boutiques,]); // boutiques
    }

    public function store(Request $request) {
        dd($request->input());
    }
}
