<?php

namespace App\Http\Controllers;

use App\Http\Services\BaseServices;
use App\Http\Services\InternshipOfferService;
use App\Models\InternshipOffer;
use App\Models\StudentInternshipOffer;
use App\Models\User;
use App\Models\UserRole;
// use App\Http\Services\IntershipOfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InternshipOfferController extends Controller
{
    public function index(InternshipOfferService $offer)
    {
        $org_id = User::is_organization() ? User::find_organization_id() : "";
        $offers = $offer->get_offers(0, $org_id);
        // dd($offers);
        return view('organization.internship_offers.index', compact('offers'));
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
    public function show(Request $req, InternshipOfferService $internshipOfferService)
    {
        $offer = InternshipOffer::where('offer_id', $req->internship_offer)->first();
        $applicants = StudentInternshipOffer::where('offer_id', $req->internship_offer)->get();
        // dd($applicants);
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

    public function change_status(InternshipOfferService $internship_offer)
    {
        // dd(request('offer'));
        return $internship_offer->change_status(request('offer'));
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
