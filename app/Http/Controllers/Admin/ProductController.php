<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $data['datalist'] = Product::all();
        return view('admin.product', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['datalist'] = Category::with('children')->get();
        return view('admin.product_add', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product;
        $data->category_id = $request->input('category_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->user_id = Auth::id();
        $data->price = $request->input('price');
        $data->quantity =$request->input('quantity');
        $data->minquantity =$request->input('minquantity');
        $data->tax =$request->input('tax');
        $data->detail =$request->input('detail');
        $data->slug = $request->input('slug');
        $data->image = Storage::putFile('images',$request->file('image'));
        $data->save();
        return redirect()->route('admin_product');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $datalist['data'] =  Product::find($id);
        $datalist['categories'] =  Category::with('children')->get();
        return view('admin.product_edit', $datalist);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        $data=Product::find($id);
        $data->category_id = $request->input('category_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->user_id = Auth::id();
        $data->price = $request->input('price');
        $data->quantity =$request->input('quantity');
        $data->minquantity =$request->input('minquantity');
        $data->tax =$request->input('tax');
        $data->detail =$request->input('detail');
        $data->slug = $request->input('slug');
        if ($request->file('image')!=null){
            $data->image = Storage::putFile('images',$request->file('image'));
        }

        $data->save();
        return redirect()->route('admin_product');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin_products');
    }
}
