@extends('admins.layouts.app')
@section('title','All Products')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Code</th>
                      <th>Brand</th>
                      <th>SubCategory</th>
                      <th>Creation Date</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name_en}}</td>
                    <td>{{$product->price}} EGP</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->brand_name_en}}</td>
                    <td>{{$product->subcategory_name_en}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>
                 
                      <a class="btn btn-warning"
                       href="{{route('edit',['id'=>$product->id])}}">Edit</a>
                       <form method="post" action="{{route('destroy',['id'=>$product->id])}}">
                      @csrf
                       <button class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
         
        </div>
        <!-- /.row -->

       
      </div><!-- /.container-fluid -->
    </section>
@endsection