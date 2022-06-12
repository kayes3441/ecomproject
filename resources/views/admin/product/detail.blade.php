@extends('master.admin.master')

@section('title')
    Detail Product
@endsection

@section('main-content')

    <div class="container-xxl  container-p-y">
        <div class="card">
            <div class="card-body">
            <h5 class="card-header">Product Details</h5>
                <table class="table  dt-responsive nowrap">
                    <tr>
                        <th>Product Id</th>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr >
                        <th>Category Name</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Sub-Category Name</th>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Brand Name</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Unit Name</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Stock Amount</th>
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Short Description </th>
                        <td>{{$product->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Long Description </th>
                        <td>{!!$product->long_description!!}</td>
                    </tr>
                    <tr>
                        <th>Main Image </th>
                        <td>
                            <img src="{{asset($product->image)}}" alt="" height="150" width="180">
                        </td>
                    </tr>
                    <tr>
                        <th>Other Images </th>
                        <td>
                            @foreach($product->otherImages as $otherImage)
                            <img src="{{asset($otherImage->image)}}" alt="" height="150" width="180">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Status </th>
                        <td>{{$product->status ==1 ? 'Published' : 'Unpublished'}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
