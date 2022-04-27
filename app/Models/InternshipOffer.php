<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipOffer extends Model
{
    use HasFactory, SoftDeletes;
    // protected $primary_key = 'offer_id';
    protected $guarded = ['id'];

    public function company()
    {
        return $this->hasOne(Organization::class, 'org_id', 'org_id');
    }
}
