<?php

namespace App\Http\Controllers;
use App\Models\Coshops;
use Illuminate\Http\Request;

class coshopsController extends Controller
{
    public function welcome()
    {

        return view('coshops.welcome');
    }
    public function index()
    {
        $coshops = Coshops::orderby('id', 'desc')->paginate(5);

        return view('coshops.index', compact('coshops'));
    }

    public function create()
    {

        return view('coshops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:coshops|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required'
        ]);
        $coshops = new Coshops;

        $coshops->nama = $request->nama;
        $coshops->image = $request->image;
        $coshops->size = $request->size;
        $coshops->harga = $request->harga;
        $coshops->data_id = $request->data_id;

        $coshops->save();

        return redirect('/coshops');
    }

    public function show($id)
    {
        $coshop = Coshops::where('id', $id)->first();
        return view('coshops.show', ['coshop'=>$coshop]);
    }

    public function edit($id)
    {
        $coshop = Coshops::where('id', $id)->first();
        return view('coshops.edit', ['coshop'=>$coshop]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:coshops|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required'
        ]);

        Coshops::find($id)->update([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id
        ]);

        return redirect('/coshops');
    }

    public function destroy($id)
    {
        Coshops::find($id)->delete();
        return redirect('/coshops');
    }

}
