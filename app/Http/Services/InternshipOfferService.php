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

    public function get_offers(int $limit = 0)
    {
        return $limit <= 0 ? InternshipOffer::all() : InternshipOffer::paginate($limit);
    }
}
