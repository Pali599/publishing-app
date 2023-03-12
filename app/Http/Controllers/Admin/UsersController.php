<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    public function delete($user_id)
    {
        $user_id = User::find($user_id);
        if($user_id)
        {
            $user_id->delete();
            return redirect('admin/users')->with('message','User deleted Successfully');
        }
        else
        {
            return redirect('admin/users')->with('message','No user with this ID found');
        }
    }
    
}
