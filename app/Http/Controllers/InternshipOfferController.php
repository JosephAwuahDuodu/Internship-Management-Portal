<?php

namespace App\Http\Controllers;

use App\Http\Services\InternshipOfferService;
use App\Models\InternshipOffer;
// use App\Http\Services\IntershipOfferService;
use Illuminate\Http\Request;

class InternshipOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organization.internship_offers.index');
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
    public function store(Request $request, InternshipOfferService $offer)
    {
        $offer->save_offer($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternshipOffer  $internshipOffer
     * @return \Illuminate\Http\Response
     */
    public function show(InternshipOffer $internshipOffer)
    {
        //
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
