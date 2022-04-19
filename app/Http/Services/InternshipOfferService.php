<?php

namespace App\Http\Services;

use App\Models\InternshipOffer;
use Illuminate\Support\Facades\Log;

class InternshipOfferService {
    public function save_offer($offer)
    {
        $offer_id = BaseServices::generate_token();
        $offer_info = $offer['offer_id'] = $offer_id;

        try {
            $offer = InternshipOffer::create($offer_info);
            Log::info("\n Internship Offer Saved Successfully. \n ");
            return $offer;
        } catch (\Throwable $th) {
            Log::info("\n Could not Save Internship Offer details due to \n " . $th->getMessage());
            return false;
        }
    }
}
