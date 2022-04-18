<?php

namespace App\Http\Services;

use App\Models\Industry;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;

class BaseServices {

    public static function fetch_region(int $id = null)
    {
        return is_null($id) ? Region::all() : Region::where("region_id", $id)->first();
    }

    public static function fetch_industry(int $id = null)
    {
        return is_null($id) ? Industry::all() : Industry::where("industry_id", $id)->first();
    }


    public static function is_admin()
    {
        return Auth::user()->user_role->role_id == 1 ? true : false;
    }

    public static function is_student()
    {
        return Auth::user()->user_role->role_id == 1 ? true : false;
    }

    public static function is_organization()
    {
        return Auth::user()->user_role->role_id == 1 ? true : false;
    }



}
