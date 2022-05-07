<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\OrganizationIndustry;
use App\Models\OrganizationInfo;
use App\Models\OrganizationLocation;
use Illuminate\Support\Facades\Log;

class OrgService extends Controller
{
    public function generate_token()
    {
        $one = random_int(1000, 9999);
        $two = random_int(1000, 9999);
        return str_shuffle($one.$two);
    }

    protected function fetch_orgs(int $limit = 0, $org_id = '')
    {
        // if org id was specified, fetch only 1 org
        if ($org_id != '') {
            return Organization::with(['info', 'location'])->where('org_id', $org_id)->first();
        }
        return $limit == 0 ? Organization::with(['info', 'location'])->all() : Organization::with(['info', 'location'])->paginate($limit);
    }

    protected function save_org(array $org_details)
    {
        try {
            $basic = $this->save_basic($org_details);
            $info = $this->save_info($org_details);
            $location = $this->save_location($org_details);
            $industry = $this->save_industry($org_details);

            return true;
        } catch (\Throwable $th) {
            Log::info("\nSave error" . $th->getMessage());
            return false;
        }
    }

    protected function save_basic(array $org)
    {
        try {
            return Organization::create($org);
        } catch (\Throwable $th) {
            Log::info("Organization Basic Saving Error: ". $th->getMessage());
            return false;
        }
    }

    protected function save_info(array $org)
    {
        try {
            return OrganizationInfo::create($org);
        } catch (\Throwable $th) {
            Log::info("Organization Info Saving Error: ". $th->getMessage());
            return false;
        }
    }

    protected function save_location($org)
    {
        try {
            return OrganizationLocation::create($org);
        } catch (\Throwable $th) {
            Log::info("Organization Location Saving Error: ". $th->getMessage());
            return false;
        }
    }

    protected function save_industry($org)
    {
        try {
            return OrganizationIndustry::create($org);
        } catch (\Throwable $th) {
            Log::info("Organization Industry Saving Error: ". $th->getMessage());
            return false;
        }
    }


}
