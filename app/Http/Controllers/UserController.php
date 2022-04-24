<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('user_role.role')->get();
        $roles = Role::all();
        $orgs = Organization::all();
        // dd($orgs);
        return view('admin.users.index', compact('users', 'orgs', 'roles'));
    }

    public function add_new_user(Request $request)
    {
        // return "hi";
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'role' => ['required', 'numeric'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        // dd($request->all());

        $user = $this->save_user($request);

        if ($user) {
            return redirect()->back()->with('success', 'User Created Successfully');
        } else {
            return redirect()->back()->with('error', 'User Could Not Be Created');
        }
    }

    public function save_user($request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            Log::info("\n\n". "########################### User Saved ###########################" . "\n\n");

            // add a role
            $org = $request->role == 2 ? $request->org : "";
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $request->role,
                'org_id' => $org
            ]);

            Log::info("\n\n". "########################### User Role Saved ###########################" . "\n\n");

            Log::info("Saved Successfully");
            return true;
        } catch (\Throwable $th) {
            Log::info("\n\n" . $th->getMessage());
            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
