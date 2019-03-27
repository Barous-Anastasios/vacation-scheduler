<?php

namespace App\Http\Controllers;

use App\Application;
use App\Role;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('employee.create_application');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        $data = $this->validateData($request);

        $formatted_data = [
            'start'=> Carbon::createFromFormat('d/m/Y', $data['start']),
            'end'=> Carbon::createFromFormat('d/m/Y', $data['end']),
            'reason' => $data['reason'],
            'user_id' => auth()->user()->id,
            'status_id' => 1
        ];

        $application = Application::create($formatted_data);
        $data['application_id'] = $application->id;

        $admin = User::where('role_id', 1)->first();

        // MAIL
        $mail_data = array('data' => $data);
        Mail::send('mails.new_application', $mail_data, function($message) use ($admin) {
            $message->to($admin->email)->subject('Vacation Request');
            $message->from(auth()->user()->email);
        });

        return redirect('/home');
    }

    public function reject($applicationId)
    {
        $this->respond('rejected', $applicationId);
        return redirect('/home')->with(['message'=>'Response email was sent to employee']);
    }

    public function approve($applicationId)
    {
        $this->respond('approved', $applicationId);
        return redirect('/home')->with(['message'=>'Response email was sent to employee']);
    }

    public function respond($response, $applicationId)
    {
        $application = Application::find($applicationId);
        $application->status_id = Status::where('name', $response)->first()->id;
        $application->save();
        // MAIL
        $mail_data = array('data' => ['response'=>$response, 'date'=>$application->created_at]);
        Mail::send('mails.respond_to_application', $mail_data, function($message) use ($application) {
            $message->to($application->user->email)->subject('Vacation Request');
            $message->from(auth()->user()->email);
        });
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function validateData(Request $request)
    {
        return $request->validate([
            'start' => 'required|after:today|date_format:d/m/Y',
            'end' => 'required|after:start|date_format:d/m/Y',
            'reason' => 'required'
        ]);
    }
}
