<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function welcome()
    {

        return view('groups.welcome');
    }
    public function index()
    {
        $groups= Groups::orderby('id', 'desc')->paginate(3);

        return view('groups.index', compact('groups'));
    }

    public function create()
    {

        return view('groups.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:groups|max:255',
            'alamat' => 'required',
        ]);
        $groups= new Groups;

        $groups->nama = $request->nama;
        $groups->alamat = $request->alamat;

        $groups->save();

        return redirect('/groups');
    }

    public function edit($id)
    {
        $group = Groups::where('id', $id)->first();
        return view('groups.edit', ['group'=>$group]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:groups|max:255',
            'alamat' => 'required',
        ]);

        Groups::find($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect('/groups');
    }

    public function destroy($id)
    {
        Groups::find($id)->delete();
        return redirect('/groups');
    }

}
