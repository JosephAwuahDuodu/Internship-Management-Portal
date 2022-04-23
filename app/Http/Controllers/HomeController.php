<?php

namespace App\Http\Controllers;

use App\Models\InternshipOffer;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        $internship_offers = InternshipOffer::paginate(20);
        $organizations = Organization::paginate(20);
        $users = User::paginate(20);
        return view('admin.index', compact('internship_offers','organizations', 'users'));
    }
}
