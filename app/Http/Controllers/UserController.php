<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $users = DB::select("SELECT * FROM users WHERE name LIKE '%" . $name . "%'");
        return view('users', compact('users', 'name'));
    }
}
