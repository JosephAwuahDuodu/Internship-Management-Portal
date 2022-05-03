<?php

namespace App\Http\Controllers;

use App\Models\InternshipOffer;
use App\Models\Organization;
use App\Models\StudentInternshipOffer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function admin()
    {
        $internship_offers = InternshipOffer::paginate(20);
        $organizations = Organization::paginate(20);
        $users = User::paginate(20);
        return view('admin.index', compact('internship_offers','organizations', 'users'));
    }

    public function student_home()
    {
        $current_internship = StudentInternshipOffer::where('student_id', Auth::user()->username)->latest()->first();
        $internship_offers = InternshipOffer::where('active_status', true )->get();
        dd($internship_offers);
        return view('student.index', compact('current_internship', 'internship_offers'));
    }
}
