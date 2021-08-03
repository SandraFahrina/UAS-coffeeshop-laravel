<?php

namespace App\Http\Controllers\Api;

use App\Models\Trans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Trans::with('groups')->WhereHas('groups')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Trans',
            'data' => $trans
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
            'name' => 'required|unique:trans|max:255',
            'minuman' => 'required',
            'ukuran' => 'required',
            'jmlh' => 'required',
            'price' => 'required',
            'groups_id' => 'required',
        ]);

        $trans = Trans::create([
            'name' => $request->name,
            'minuman' => $request->minuman,
            'ukuran' => $request->ukuran,
            'jmlh' => $request->jmlh,
            'price' => $request->price,
            'groups_id' => $request->groups_id
        ]);

        if($trans)
        {
            return response()->json([
                'success' => true,
                'message' => 'Trans Berhasil Ditambahkan',
                'data' => $trans
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Trans Gagal Ditambahkan',
                'data' => $trans
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
          $t = Trans::with('groups')->Where('id', $id)->get();

          return response()->json([
            'success' => true,
            'message' => 'Detail data teman',
            'data' => $t
        ], 200);
    }

    public function edit($id)
    {
          $t = Trans::with('groups')->Where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail data trans',
            'data' => $t
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
        $trans = Trans::find($id)->update([
            'name' => $request->name,
            'minuman' => $request->minuman,
            'ukuran' => $request->ukuran,
            'jmlh' => $request->jmlh,
            'price' => $request->price,
            'groups_id' => $request->groups_id
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $t
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
        $cek = Trans::find($id)->delete();
        $t = Trans::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $t
        ], 200);
    }
} 