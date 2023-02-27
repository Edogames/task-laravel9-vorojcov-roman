<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class todoController extends Controller
{
    public function create(Request $request){
        // dd($request->toArray());
        $request->validate([
            'fromuser' => 'required',
            'targetuser' => 'required',
            'content' => 'required',
        ]);

        Todo::create($request->post());
        return redirect()->route('home')->with('success','Task has been created successfully.');
    }
    public function createform(){
        $users = DB::table('users')->get();
        return view('create', ['users' => $users]);
    }

    public function update(Request $request){
        $todo = Todo::find($request->id);
        $todo->fromuser = $request->fromuser;
        $todo->targetuser = $request->targetuser;
        $todo->content = $request->content;
        $todo->status = $request->status;
        $todo->update();
        return redirect()->back()->with('status', 'Update complete successfully!');
    }

    public function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back();
    }
}
