<?php

namespace App\Http\Controllers;

use App\Http\Services\BaseServices;
use App\Jobs\ProcessTextMessage;
use App\Models\Student;
use App\Models\StudentInternshipLog;
use App\Models\StudentInternshipOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentInternshipOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_sms($message, $student_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['offer' => 'required|numeric',]);

        try {
            StudentInternshipOffer::create([
                'student_id' => Auth::user()->username,
                'offer_id' => $request->offer
            ]);

            return back()->with('success', 'Application Sent Successfully. Kindly Hold on for Feedback');
        } catch (\Throwable $th) {
            Log::alert("\n". $th->getMessage());
            // return back()->with('error', $th->getMessage());
            return back()->with('error', 'Application Could Not Be Sent. Error Occured');
        }

    }

    public function withdraw_application()
    {
        $offer = request('offer');
        try {
            $offer = StudentInternshipOffer::where([['offer_id', $offer], ['student_id', Auth::user()->username]])->first();
            $offer->delete();
            return back()->with('success', 'Application Withdrawn Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
            return back()->with('error', 'Could Not Withdraw Application. Contact Admin or Try Again Later.');
        }
    }

    private function message_text($type, $org_name, $student_name)
    {
        if ($type == "approve") {
            return "Hi, ". $student_name . " your internship request sent to " . $org_name . " has been successfully approved.";
        } else {
            return "Hi, ". $student_name . " your internship request sent to " . $org_name . " has been rejected. Kindly apply for another offer.";
        }

    }

    public function act_on_intership_request()
    {
        $req_id = request('request');
        $action_type = request('action_type');

        $req = BaseServices::get_internship_request_by_id($req_id);

        $student_name = $req->student->name;
        $student_id = $req->student->student_id;
        $phone = $req->student->phone;
        $org_name = $req->organization->org_name;

        try {
            $req->approval_status = $action_type == "reject" ? false : true;
            $req->active_status = $action_type == "reject" ? false : true;
            $req->save();
        } catch (\Throwable $th) {
            return "Error ...." .$th->getMessage();
        }

        // SET ACTIVE INTERNSHIP IN STUDENT TABLE TO TRUE
        $this->set_active_internship($student_id, $action_type);
        // CREATE FIRST LOG AS (INTERNSHIP STARTED WITH DATE)
        $this->write_student_first_log($org_name, $req->offer_id, $student_id, $action_type);
        // GENERATE A TYPE OF MESSAGE
        $message = $this->message_text($action_type, $org_name, $student_name);

        ProcessTextMessage::dispatch($message, $phone);

        $action = $action_type == "approve" ? "approved" : "rejected";
        return back()->with('success', "You have successfully $action internship for $student_name");

    }

    private function set_active_internship(int $student_id, $action_type)
    {
        $action = $action_type == "approve" ? true : false;
        try {
            Student::where('student_id', $student_id)->first()->update(['active_internship'=>$action]);
            return true;
        } catch (\Throwable $th) {
            Log::info("Could Not Change Active Internship Status". $th->getMessage());
        }
    }

    private function write_student_first_log($org_name, $offer_id, $student_id, $action_type)
    {
        try {
            $approval_text = "Internship Request Approved by $org_name ";
            $rejection_text = "Internship Request Cancel by $org_name ";
            $stu_log = StudentInternshipLog::create([
                'student_id' =>$student_id ,
                'offer_id' =>$offer_id ,
                'log_text' =>$action_type == "approve" ? $approval_text : $rejection_text ,
                'supervisor_approval' =>true ,
                'supervisor_approval_date' =>now() ,
            ]);
            // print_r($stu_log);
            return true;
        } catch (\Throwable $th) {
            Log::info("Could Not Write Student Log". $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentInternshipOffer  $studentInternshipOffer
     * @return \Illuminate\Http\Response
     */
    public function show(StudentInternshipOffer $studentInternshipOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentInternshipOffer  $studentInternshipOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentInternshipOffer $studentInternshipOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentInternshipOffer  $studentInternshipOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentInternshipOffer $studentInternshipOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentInternshipOffer  $studentInternshipOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentInternshipOffer $studentInternshipOffer)
    {
        //
    }
}
