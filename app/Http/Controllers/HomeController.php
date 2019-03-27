<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            if(auth()->user()->role_id == UserType::Administrator)
                return redirect('admin');

            if(auth()->user()->role_id == UserType::Employee)
                return redirect('dashboard');
        }

        return view('home');
    }
}
