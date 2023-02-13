<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('guest.index', ['title' => $title]);
    }
}
