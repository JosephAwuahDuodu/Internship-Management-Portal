<?php

namespace App\Http\Services;

use App\Models\InternshipOffer;
use Illuminate\Support\Facades\Log;

class InternshipOfferService {
    public function save_offer($offer)
    {
        $offer_id = BaseServices::generate_token();
        $offer['offer_id'] = $offer_id;

        try {
            $offer = InternshipOffer::create($offer);
            Log::info("\n Internship Offer Saved Successfully. \n ");
            return $offer;
        } catch (\Throwable $th) {
            Log::info("\n Could not Save Internship Offer details due to \n " . $th->getMessage());
            return false;
        }
    }

    public function change_status(string $offer_id)
    {
        $offer = InternshipOffer::where('offer_id', $offer_id)->first();
        // dd($offer);
        if ($offer->active_status) {
            $offer->active_status = false;
            $offer->save();
            return back()->with('success', 'Successfully Deactivated');
        } else {
            $offer->active_status = true;
            $offer->save();
            return back()->with('success', 'Successfully Activated');
        }
    }

    public function get_offers(int $limit = 0, string $org_id = '')
    {
        // Log::info("\n ORG ID: $org_id");

        if ($org_id != '') {
            Log::info("\n\n IN ORGANIZATION ");
            return $limit <= 0 ? InternshipOffer::where('org_id', $org_id)->get() : InternshipOffer::where('org_id', $org_id)->paginate($limit);
        } else {
            Log::info("\n\n IN ALL ");
            return $limit <= 0 ? InternshipOffer::all() : InternshipOffer::paginate($limit);
        }
    }
}
