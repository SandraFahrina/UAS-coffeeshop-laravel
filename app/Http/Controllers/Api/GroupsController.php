<?php

namespace App\Http\Controllers\Api;

use App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Trans',
            'data' => $groups,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:groups|max:255',
            'alamat' => 'required|numeric',
        ]);

        $g = Groups::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        if($groups)
        {
            return response()->json([
                'success' => true,
                'message' => 'Trans Berhasil Ditambahkan',
                'data' => $groups
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Trans Gagal Ditambahkan',
                'data' => $groups
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $group = Groups::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail data trans',
            'data' => $group
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $groups = Groups::find($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Trans berhasil di rubah',
            'data' => $group
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Trans Berhasil di hapus',
            'data'    => $group
        ], 200);
    }
}
