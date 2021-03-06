<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\DayReport;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use InfyOm\Generator\Utils\ResponseUtil;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
        // config(['app.timezone' => setting('timezone')]);
    }

    /**
     * @param $result
     * @param $message
     * @return mixed
     */
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    /**
     * @param $error
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
    public function requestRegister(Request $request){
        $applicant = new Applicant();
        $applicant->name =  $request->input('name');
        $applicant->email =  $request->input('email');
        $applicant->password = Hash::make($request->input('password'));
        //dd($applicant);
        $applicant->save();
        return "تم ارسال طلبك للادارة";
    }
    public function showRequests(){
        return view('layouts.requests')->with("applicants" , Applicant::all());
    }

    public function acceptRequest($id){
        $applicant = Applicant::find($id);
        $user = new User();
        $user->name =  $applicant->name;
        $user->email =  $applicant->email;
        $user->password = $applicant->password;
        $user->api_token = str_random(60);
        $user->save();
        $applicant->delete();
    }
    public function showUsers(){
        $users = User::where('rule_id','!=',1)->get();  // get all none admins users
        return view('layouts.users')->with(["users"=>$users]);
    }
    public function records(){
        return view('layouts.records');
    }
    public function dailyReports(){
        $reports = DayReport::all();  // all daily reports
        return view('layouts.dailyreports')->with(['reports'=>$reports]);
    }
    
    public function printPDF($id){
        set_time_limit(1000);
        $report = DayReport::find($id);
       // $pdf = PDF::loadView('layouts.dailyreportpdf',['report'=>$report]);
       // return $pdf->download('invoice.pdf');
        //$path = public_path().'/pdf';
        $path = public_path();
        $pdf = PDF::loadView('layouts.dailyreportpdf',['report'=>$report]);
        $pdf->save($path.'/my_pdf.pdf', 'UTF-8');
        return response()->download($path.'/my_pdf.pdf');
    }

    public function showMap(){
        return view('layouts.map');
    } 
}
