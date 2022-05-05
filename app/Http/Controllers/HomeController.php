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
        $current_internship = StudentInternshipOffer::where([['student_id', Auth::user()->username], ['approval_status', true]])->first();
        if (!$current_internship) {
            $applied_internships = StudentInternshipOffer::where('student_id', Auth::user()->username)->latest()->pluck('offer_id');
            // dd($applied_internship);
            // $internship_offers = InternshipOffer::where('active_status', true)->whereNotIn('offer_id', $applied_internships)->get();
            $internship_offers = InternshipOffer::where('active_status', true)->get();
            return view('student.no_active_internships', compact('applied_internships', 'internship_offers'));
        } else {
            // return view('student.no_active_internship', compact('current_internship', 'internship_offers'));
            return "User has active internship";
        }
        // $all_my_internships =
        // dd($internship_offers);
    }
}
