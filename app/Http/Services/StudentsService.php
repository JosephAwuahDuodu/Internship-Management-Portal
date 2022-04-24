<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class StudentsService extends Controller
{
    public function save_student_as_user()
    {

    }

    public function fetch_students($limit =  0, $org_id = "")
    {
        if (empty($org_id)) {
            Log::info("\n\n IN ADMIN ");
            return $limit <= 0 ? Student::all() : Student::paginate($limit);
        } else {
            Log::info("\n\n IN ORGANIZATION ");
            return $limit <= 0 ? Student::where('org_id', $org_id)->get() : Student::where('org_id', $org_id)->paginate($limit);
        }
    }
}
