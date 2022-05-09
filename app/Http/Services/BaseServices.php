<?php

namespace App\Http\Services;

use App\Models\Industry;
use App\Models\Region;
use App\Models\StudentInternshipOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BaseServices {

    public static function fetch_region(int $id = null)
    {
        return is_null($id) ? Region::all() : Region::where("region_id", $id)->first();
    }

    public static function fetch_industry(int $id = null)
    {
        return is_null($id) ? Industry::all() : Industry::where("industry_id", $id)->first();
    }

    public static function generate_token()
    {
        $one = random_int(1000, 9999);
        $two = random_int(1000, 9999);
        return str_shuffle($one.$two);
    }

    public static function get_internship_request_by_id($req_id)
    {
        return StudentInternshipOffer::with(['organization','student'])->find($req_id);
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



    public function send_sms($message, $recipient)
    {
        $api_key = "qR3upRhX8kxIOjOwUJBf4A34MZSw17drYgWn8ekgySYnc";
        $url = env('MNOTIFY_URL')  . "$api_key";
        $data = [
            'recipient' => array($recipient),
            'message' => $message,
            'sender' => env('SENDER_ID'),
            'is_schedule' => false,
            'schedule_date' => "",
        ];

        $send_sms = Http::post($url, $data);
        $response = $send_sms->json();

        print_r($response);

        if ($response['code'] == "2000") {
            Log::info("\n SMS Sent Successfully");
        } else {
            Log::info("\n SMS Sending Error");
        }
    }

}
