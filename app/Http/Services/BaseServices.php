<?php

namespace App\Http\Services;

use App\Models\Industry;
use App\Models\Region;

class BaseServices {

    public static function fetch_region(int $id = null)
    {
        return is_null($id) ? Region::all() : Region::where("region_id", $id)->first();
    }

    public static function fetch_industry(int $id = null)
    {
        return is_null($id) ? Industry::all() : Industry::where("industry_id", $id)->first();
    }




}
