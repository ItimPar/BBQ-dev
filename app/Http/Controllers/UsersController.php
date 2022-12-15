<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }
}
