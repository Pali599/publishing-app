<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserAddedEvent;
use App\Events\UserDeletedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditUserFormRequest;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

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
        $role = UserRole::all();
        $type = UserType::all();

        return view('admin.users.edit', compact('user','role','type'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'university' => ['required', 'string', 'max:255'],
            'faculty' => ['required', 'string', 'max:255'],
            'type_id' => ['nullable', 'integer'],
            'role_id' => ['nullable', 'integer'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'type_id' => $request->type_id,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        
        event(new UserAddedEvent($user));

        return redirect('admin/users')->with('message','User Added Successfully');
    }

    public function update(EditUserFormRequest $request, $user_id)
    {
        $data = $request->validated();

        $user = User::find($user_id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->university = $data['university'];
        $user->faculty = $data['faculty'];
        $user->type_id = $data['type_id'];
        $user->role_id = $data['role_id'];
        $user->update();

        return redirect('admin/users')->with('message','User updated Successfully');
    }


    public function delete($user_id)
    {
        $user = User::find($user_id);
        if($user)
        {
            $user->delete();

            event(new UserDeletedEvent($user));

            return redirect('admin/users')->with('message','User deleted Successfully');
        }
        else
        {
            return redirect('admin/users')->with('message','No user with this ID found');
        }
    }
    
}
