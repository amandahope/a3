<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrabbleController extends Controller
{
    /**
    * GET /books
    */
    public function index() {
        return view('scrabble.index');
    }
}
