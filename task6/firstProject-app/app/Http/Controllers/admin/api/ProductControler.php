<?php
namespace App\Http\Controllers\admin\api;


use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductControler extends Controller
{

    public function index(){
        $products=Product::all();
        return response()->json(compact('products'));

    }

    public function create()
    {
    $brands= Brand::all(['id','name_en']);
    $subcategories= Subcategory::all(['id','name_ar']);
    return response()->json(compact('brands','subcategories'));
    }

    public function store(){
         

    }

    public function update(){}

    public function edit($id){
        $product= Product::findOrFail($id);
        $brands= Brand::all(['id','name_en']);
        $subcategories= Subcategory::all(['id','name_ar']);
        return response()->json(compact('brands','subcategories','product'));

    }


    public function destroy(){}

}
