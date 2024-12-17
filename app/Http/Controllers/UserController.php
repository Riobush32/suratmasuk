<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Users',
                'icon' => 'fa-user',
                'link' => '/user',
            ],
            [
                'name' => 'List',
                'icon' => 'fa-file-lines',
                'link' => '',
            ],
        ];
        $users = User::latest()->paginate(5);
        $active = 'user';
        return view('page.user.index',[
            'users' => $users,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function home(){
        $breadcrumbs = [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
        ];
        return view('page.admin.dashboard.index',[
            'active' => 'home',
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        $breadcrumbs = [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => 'home',
            ],
            [
                'name' => 'Users',
                'icon' => 'fa-user',
                'link' => 'user',
            ],
            [
                'name' => 'Edit User ',
                'icon' => 'fa-file-pen',
                'link' => '',
            ],
        ];
        return view('page.user.edit',[
            'user' => $user,
            'active' => 'user',
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'active' => $request->active,
                'nip' => $request->nip,
                'position' => $request->position,
            ]
        );
        return redirect()->route('user')->with('success', 'User updated successfully');
    }

    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('user')->with('success', 'User deleted successfully');
    }
}
