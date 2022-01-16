<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductTag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        $tags = Tag::all();
        $product_tag = ProductTag::all();
        $data = [];
        foreach($product_tag as $value){
            foreach($products as $product){
                foreach($tags as $tag){
                    if($value->product_id == $product->id && $value->tag_id == $tag->id){
                        $data [] = ['id' => $product->id,'name' => $product->name, 'id_tag' => $tag->id, 'name_tag' => $tag->name];
                    }
                }
            }
        }

        return $data;
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
        $product = new Product;
        $tag = new Tag;
        $productTag = new ProductTag;

        $nameProduct = $request->name;
        $product->name = $nameProduct;
        $product->save();
        $idProduct = $product->id;

        $nameTag = $request->tagName;
        $tag->name = $nameTag;
        $tag->save();
        $idTag = $tag->id;

        $productTag->product_id = $idProduct;
        $productTag->tag_id = $idTag;
        $productTag->save();

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
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
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $tag = Tag::findOrFail($request->id);
        $tag->name = $request->tagName;

        if( $product->save() && $tag->save() ){
            return $product;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $tag = Tag::findOrFail($id);
        $productTag = ProductTag::where(['product_id' => $product->id, 'tag_id' => $tag->id]);
        $productTag->delete();
        if( $product->delete() && $tag->delete() ){
            return "Product {$id} has been deleted";
        }
    }
}
