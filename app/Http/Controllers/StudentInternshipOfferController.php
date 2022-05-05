<?php

namespace App\Http\Controllers;

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
