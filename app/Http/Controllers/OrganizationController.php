<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Http\Services\OrgService;
use App\Models\Organization;
use App\Http\Services\BaseServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrganizationController extends OrgService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = BaseServices::fetch_region();
        $industries = BaseServices::fetch_industry();
        // dd($regions);
        $organizations = $this->fetch_orgs(50);
        return view('organizations.index', ['organizations'=>$organizations, 'regions'=>$regions, 'industries'=>$industries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationRequest $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validated();
            $validated['org_id'] = $this->generate_token();
            // dd($validated);
            $this->save_org($validated);
            Log::info("Save Complete");
            return redirect()->back()->with('success', $validated['org_name'] . ' Organisation Added Successfully');
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return redirect()->back()->with('error', $validated['org_name'] . ' - Error Occured while saving.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
