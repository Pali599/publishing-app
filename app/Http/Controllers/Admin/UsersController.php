<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(EditUserFormRequest $request, $user_id)
    {
        $data = $request->validated();

        $user = User::find($user_id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->departure = $data['departure'];
        $user->type = $data['type'];
        $user->role = $data['role'];
        $user->update();

        return redirect('admin/users')->with('message','User updated Successfully');
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
