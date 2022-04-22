<?php

namespace App\Http\Controllers;

use App\Http\Services\BaseServices;
use App\Http\Services\InternshipOfferService;
use App\Models\InternshipOffer;
// use App\Http\Services\IntershipOfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InternshipOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InternshipOfferService $offer)
    {
        $offers = $offer->get_offers();
        Log::info($offers);
        return view('organization.internship_offers.index', compact('offers'));
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
    public function store(Request $request, InternshipOfferService $internship_offer)
    {
        $new_offer =$this->validate($request, [
            'title' => 'string|string',
            'job_description' => 'nullable|string',
            'dept' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $offer = $internship_offer->save_offer($new_offer);

        if ($offer) {
            return back()->with('success', 'Internship Offer Saved Successfully');
        } else {
            return back()->with('error', 'Internship Offer Counld Not Be Saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternshipOffer  $internshipOffer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $offer = InternshipOffer::where('offer_id', $req->internship_offer)->first();
        $applicants = [];
        return view('organization.internship_offers.show', compact('offer', 'applicants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternshipOffer  $internshipOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(InternshipOffer $internshipOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternshipOffer  $internshipOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternshipOffer $internshipOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternshipOffer  $internshipOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternshipOffer $internshipOffer)
    {
        //
    }
}
