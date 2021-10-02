<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
      
        //  return ProductResource::collection(Product::all());

        return Product::all();
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request) : ProductResource
    {

      
        $product = $request->isMethod('patch') ? Product::findOrFail($request->product_id) : new Product;
        // $student = new Student;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->sale_price = $request->sale_price;
        $product->phone = $request->phone;

        if($request->hasfile('image'))
        {
          $file = $request->file('image');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'.$extention;
          $file->move('uploads/product/', $filename);
          $product->image = $filename;
        }

        // here is the image part okay

        // if ($request->hasFile('image')) {
            
        //     $file =  $request->file('image');
        //     $file->move(public_path(). '/images/students', $file->getClientOriginalName());

        //     $student->image = $file->getClientOriginalName();
        // }

        $product->save();
        return new ProductResource($product);




    }

    public function edit($id)
    {
     $brand = Brand::findOrFail($id);
 
     return view('brand.edit', compact('brand'));
 
    }
 
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('name');
        if($request->has('image'))
        {
          $file = $request->file('image');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'.$extention;
          $file->move('uploads/brand/', $filename);
          $brand->image = $filename;
        }
        $products->save();
      /* Brand::whereId($id)->update($brand); */
 
      return redirect()->route('products.index')->with('success','Product Update successfully.');
    }
 

    public function destroy($id)
   {
       $product = Product::findOrFail($id);
       $product->delete();

       return redirect()->route('products.index')->with('success','Product Delete successfully.');
   }  
}
