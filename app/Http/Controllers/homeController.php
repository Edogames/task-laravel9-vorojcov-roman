<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function show(){
        $todos = DB::table('todos')->get()->reverse();
        $users = DB::table('users')->get();
        return view('home', ['todos' => $todos, 'users' => $users]);
    }
}
