<?php

namespace App\Http\Controllers\admin;

use App\Http\Service\Media;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\Requests\StoreController;
use App\Http\Requests\UpdateRequest;

class ProductController extends Controller
{

    public function preview()
    {
        $products = DB::table('products')
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->select('products.*', 'brands.name_en AS brand_name_en', 'brands.name_ar AS brand_name_ar', 'subcategories.name_en AS subcategory_name_en', 'subcategories.name_ar AS subcategory_name_ar')
            ->get();
        return view('admins.products.index', compact('products'));
        // return view('admins.products.index');
    }
    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        return view('admins.products.create', compact('brands', 'subcategories'));
    }

    public function edit($id)
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->orderBy('name_ar')->get();
        $product = DB::table('products')->where('id', $id)->first();
        return view('admins.products.edit', compact('brands', 'subcategories', 'product'));
    }

    public function store(StoreRequest $req)
    {
        $fileName = Media::upload($req->file('image'), 'products');

        $data = $req->except('_token', 'image');
        $data['image'] = $fileName;
        DB::table('products')->insert($data);
        return redirect()->route('admins.products.index')->with('success', 'Product Created Successfully');
    }

    public function destroy($id)
    {
        $oldPhoto=DB::table('products')->select('image')->where('id',$id)->pluck('image')->first();
        if(file_exists(public_path('dist\img\products\\'.$oldPhoto))){
            unlink(public_path('dist\img\products\\'.$oldPhoto));
        }

        DB::table('products')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'product is Deleted');
    
    }

    public function update(UpdateRequest $req,$id)
    {
        $data = $req->except('_token', 'image');
        if ($req->hasFile('image')) {
            $fileName = $req->file('image')->hashName();
            $req->file('image')->move(public_path('dist\img\products', $fileName));
            $oldPhoto = DB::table('products')->select('image')->where('id', $id)->first()->image;
            if (file_exists(public_path('dist\img\products\\' . $oldPhoto))) {
                unlink(public_path('dist\img\products\\' . $oldPhoto));
            }
            $data['image'] = $fileName;
        }
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('index');
    }
}
