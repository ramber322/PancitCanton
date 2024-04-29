<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function restrictAdmin () {

        if (auth()->user()->role === 'admin') {
            return redirect('admin-dashboard');
        }

    }

    public function index () {
        return view ('admin.dashboard');
    }

  
}
