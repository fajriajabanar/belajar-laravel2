<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product   ::select('id','namaproduk','deskripsi','harga','gambar')->get();
		return response()->json([
			'data' => $produk
	], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'namaproduk'=> 'required',
            'deskripsi' => 'required',
            'harga'     => 'required|integer',
            'gambar'    =>'required|image|mimes:jpg,png|max:4096'
        ]);
    
        if($validasi->fails()){
            return response()->json($validasi->error(),422);
        }
    
        $gambar = $request->file('gambar')->store('public/gambar');
        $data = Product::create([
            'namaproduk'=> $request->namaproduk,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'gambar'    => $gambar
        ]);
    
        return response()->json([
            'status'    => 'berhasil',
            'data'      => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Product::select('id','namaproduk','deskripsi','harga','gambar')->get();
        return response()->json([
            'data' => $produk
             ->where('id', $id)
            ->first()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validasi = Validator::make($request->all(), [
            'namaproduk'=> 'required',
            'deskripsi' => 'required',
            'harga'     => 'required|integer',
        ]);
    
        if($validasi->fails()){
            return response()->json($validasi->error(),422);
        }
    
        Product::where('id', $id)->update($request->all());
    
        return response()->json([
            "status"    => 'update sukses'
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
        //
    }
}
