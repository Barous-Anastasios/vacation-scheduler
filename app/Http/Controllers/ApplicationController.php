<?php

namespace App\Http\Controllers;

use App\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('employee.create_application');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'start' => 'required|after:today|date_format:d/m/Y',
            'end' => 'required|after:start|date_format:d/m/Y',
            'reason' => 'required'
        ]);

        $data = [
            'start'=> Carbon::createFromFormat('d/m/Y', $request->start),
            'end'=> Carbon::createFromFormat('d/m/Y', $request->end),
            'user_id' => auth()->user()->id,
            'status_id' => 1,
            'reason' => $data['reason']
        ];

        Application::create($data);

        return redirect('/home');
    }
}
