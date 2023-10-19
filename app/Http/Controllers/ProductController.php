<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Exception;
use PDOException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = Product::get();
            return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
        }catch (Exception | PDOException $e){
            return response()->json(['status'=>false,'message'=>'gagal menampilkan data']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try{
            $data = Product::create($request->all());
             return response()->json(['status'=>true, 'message'=>'success', 'data'=>$data]);
         }catch (Exception | PDOException $e){
             return response()->json(['status'=>false,'message'=>'gagal menampilkan data']);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try{
            return response()->json(['status'=>true, 'data'=>$product]);
        }catch (Exception | PDOException $e){
            return response()->json(['status'=>false,'message'=>'data failed to get',
        'error_type'=>$e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try{
            $product->update($request->all());
               return response()->json(['status'=>true, 'message'=>'data has been updated']);
           }catch (Exception | PDOException $e){
               return response()->json(['status'=>false,'message'=>'data failed to update', 'error_type'=>$e]);
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try{
            $data = $product->delete();
            return response()->json(['status'=>true, 'message'=>'data has been deleted', 'data'=>$data]);
        }catch (Exception | PDOException $e){
            return response()->json(['status'=>false,'message'=>'data failed to deleted']);
        }
    }
}
