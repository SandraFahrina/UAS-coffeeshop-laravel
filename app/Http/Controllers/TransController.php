<?php

namespace App\Http\Controllers;
use App\Models\Trans;
use Illuminate\Http\Request;

class TransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {

        return view('trans.welcome');
    }
    public function index()
    {
        $trans = Trans::orderby('id', 'desc')->paginate(5);

        return view('trans.index', compact('trans'));
    }

    public function create()
    {

        return view('trans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:trans|max:255',
            'minuman' => 'required',
            'ukuran' => 'required',
            'jmlh' => 'required',
            'price' => 'required',
            'groups_id' => 'required',
        ]);
        $trans = new Trans;

        $trans->name = $request->name;
        $trans->minuman = $request->minuman;
        $trans->ukuran = $request->ukuran;
        $trans->jmlh = $request->jmlh;
        $trans->price = $request->price;
        $trans->groups_i = $request->groups_i;

        $trans->save();

        return redirect('/trans');
    }

    public function show($id)
    {
        $t = Trans::where('id', $id)->first();
        return view('trans.show', ['t'=>$t]);
    }

    public function edit($id)
    {
        $t = Trans::where('id', $id)->first();
        return view('trans.edit', ['t'=>$t]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:trans|max:255',
            'minuman' => 'required',
            'ukuran' => 'required',
            'jmlh' => 'required',
            'price' => 'required',
            'groups_id' => 'required',
        ]);

        Trans::find($id)->update([
            'name' => $request->name,
            'minuman' => $request->minuman,
            'ukuran' => $request->ukuran,
            'jmlh' => $request->jmlh,
            'price' => $request->price,
            'groups_id' => $request->groups_id
        ]);

        return redirect('/trans');
    }

    public function destroy($id)
    {
        Trans::find($id)->delete();
        return redirect('/trans');
    }

}
