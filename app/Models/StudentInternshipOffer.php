<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInternshipOffer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasOne(Student::class, 'student_id', 'student_id');
    }

    public function offer_details()
    {
        return $this->hasOne(InternshipOffer::class, 'offer_id', 'offer_id');
    }

    public function organization()
    {
        return $this->hasOne(Organization::class, 'org_id', 'org_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'student_id', 'student_id');
    }
}
