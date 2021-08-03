<?php

namespace App\Http\Controllers\Api;

use App\Models\Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data',
            'data' => $data,
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
            'name' => 'required|unique:data|max:255',
            'description' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $d = Data::create([
            'name' => $request->name,
            'description' => $request->description,
            'harga' => $request->harga,
        ]);

        if($data)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Ditambahkan',
                'data' => $data
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
          $d = Data::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail data Group',
            'data' => $d
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
        $data = Data::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'harga' => $request->harga,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di rubah',
            'data' => $d
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
        $d = Data::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di hapus',
            'data'    => $d
        ], 200);
    }
}
