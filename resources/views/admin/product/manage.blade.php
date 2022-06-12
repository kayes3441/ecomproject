@extends('master.admin.master')

@section('title')
    Manage Product
@endsection

@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All Product Info</h5>
            <p class="text-success text-center">{{Session::get('message')}}</p>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Category Name</th>
                            <th>Product Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                <img src="{{asset($product->image)}}" alt="" height="50" width="80"/>
                            </td>
                            <td>{{$product->status == 1 ? 'Published':'Unpublished'}}</td>
                            <td>
                                <a href="{{route('detail.product',['id'=>$product->id])}}" class="btn btn-success btn-sm">
                                    <i class="bx bx-detail"></i>
                                </a>
                                <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-primary btn-sm">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="{{route('delete.product',['id'=>$product->id])}}"
                                   onclick="event.preventDefault();document.getElementById('DeleteProduct{{$product->id}}').submit();
                                   return confirm('Are you sure to Delete')" class="btn btn-danger btn-sm">
                                    <i class="bx bx-trash"></i>
                                </a>
                                <form action="{{route('delete.product',['id'=>$product->id])}}" method="post" id="DeleteProduct{{$product->id}}">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
