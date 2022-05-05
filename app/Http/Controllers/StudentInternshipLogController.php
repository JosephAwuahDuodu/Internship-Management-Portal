<?php

namespace App\Http\Controllers;

use App\Models\StudentInternshipLog;
use App\Models\StudentInternshipOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentInternshipLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if currently looged in user if admin, organization or student
        $current_internship = StudentInternshipOffer::where([['student_id', Auth::user()->username], ['approval_status', true]])->first();
        return view('student.log', compact('current_internship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentInternshipLog  $studentInternshipLog
     * @return \Illuminate\Http\Response
     */
    public function show(StudentInternshipLog $studentInternshipLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentInternshipLog  $studentInternshipLog
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentInternshipLog $studentInternshipLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentInternshipLog  $studentInternshipLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentInternshipLog $studentInternshipLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentInternshipLog  $studentInternshipLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentInternshipLog $studentInternshipLog)
    {
        //
    }
}
