@extends('admins.layouts.app')
@section('title','Create New Product')

@section('content')
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Product Info</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name_en">Name en</label>
                            <input type="text" name="name_en" class="form-control" id="name_en" value="{{old('name_en')}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="Name_ar">Name ar</label>
                            <input type="text" name="name_ar" class="form-control" id="Name_ar">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="Price">Price</label>
                            <input type="number" name="price" class="form-control" id="Price">
                        </div>
                        <div class="form-group col-4">
                            <label for="Quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="Quantity">
                        </div>
                        <div class="form-group col-4">
                            <label for="Code">Code</label>
                            <input type="number" name="code" class="form-control" id="Code">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-6">
                            <label for="Brand">Brand</label>
                            <select name="brand_id" id="Brand" class="form-control">
                                @foreach ($brands as $brand)
                                <option @selected(old('brand_id') == $brand->id) value="{{$brand->id}}">{{$brand->name_en}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="Subcategory">Subcategory</label>
                            <select name="subcategory_id" id="Subcategory" class="form-control">
                                @foreach ($subcategories as $subcategory)
                                <option @selected(old('subcategory_id') == $subcategory->id ) value="{{$subcategory->id}}">{{$subcategory->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="detailsen">Details en</label>
                            <textarea name="details_en" id="detailsen" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label for="detailsar">Details ar</label>
                            <textarea name="details_ar" id="detailsar" class="form-control" cols="30" rows="10"> </textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" form-group col-4">
                            <label for="image">
                                <img  style="cursor: pointer" alt="upload" class="w-100">
                            </label>
                            <input onchange="loadImage(event)" type="file" name="image" id="image" class="d-none">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @endsection
    @section('js')
    <script>
        var loadImage = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
    @endsection