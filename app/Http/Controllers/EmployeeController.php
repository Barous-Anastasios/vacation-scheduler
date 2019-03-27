<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(5);
        return view('employee.dashboard', compact('applications'));
    }
}
