<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function welcome()
    {

        return view('data.welcome');
    }
    public function index()
    {
        $data= Data::orderby('id', 'desc')->paginate(3);

        return view('data.index', compact('data'));
    }

    public function create()
    {

        return view('data.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:data|max:255',
            'description' => 'required',
            'harga' => 'required|numeric',
        ]);
        $data= new Data;

        $data->name = $request->name;
        $data->description = $request->description;
        $data->harga = $request->harga;

        $data->save();

        return redirect('/data');
    }

    public function edit($id)
    {
        $d = Data::where('id', $id)->first();
        return view('data.edit', ['d'=>$d]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:data|max:255',
            'description' => 'required',
            'harga' => 'required|numeric',
        ]);

        Data::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'harga' => $request->harga,
        ]);

        return redirect('/data');
    }

    public function destroy($id)
    {
        Data::find($id)->delete();
        return redirect('/data');
    }

}
