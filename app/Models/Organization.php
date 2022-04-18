<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    public function info()
    {
        return $this->hasOne(OrganizationInfo::class, "org_id", "org_id");
    }

    public function location()
    {
        return $this->hasOne(OrganizationLocation::class, "org_id", "org_id");
    }

}
