<?php

namespace App\Http\Controllers\Api;

use App\Models\Coshops;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoshopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coshops = Coshops::with('data')->WhereHas('data')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Coshop',
            'data' => $coshops
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
            'nama' => 'required|unique:coshops|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required',
        ]);

        $coshops = Coshops::create([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id,
        ]);

        if($coshops)
        {
            return response()->json([
                'success' => true,
                'message' => 'Coshop Berhasil Ditambahkan',
                'data' => $coshops
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Coshop Gagal Ditambahkan',
                'data' => $coshops
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
          $coshop = Coshops::with('data')->Where('id', $id)->get();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Coshops',
            'data' => $coshop
        ], 200);
    }

    public function edit($id)
    {
          $coshop = Coshops::with('data')->Where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Coshops',
            'data' => $coshop
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
        $coshops = Coshops::find($id)->update([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $coshop
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
        $cek = Coshops::find($id)->delete();
        $coshop = Coshops::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $coshop
        ], 200);
    }
} 