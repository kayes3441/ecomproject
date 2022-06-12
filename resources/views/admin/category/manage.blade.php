@extends('master.admin.master')

@section('title')
    Manage Category
@endsection

@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All Category Info </h5>
            <p class="text-center text-success">{{Session::get('message')}}</p>
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
                    <th>Publication Status</th>
                    <th>Action </th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <img src="{{asset($category->image)}}" alt="" height="50" width="80">
                    </td>
                    <td>{{$category->status == 1 ? 'Published' :'Unpublished'}}</td>
                    <td >
                        <a  href="{{route('edit.category',['id'=>$category->id])}}" class="btn btn-primary  btn-sm" >
                            <i class="bx bx-edit"></i>
                        </a>
                        <a  href="{{route('delete.category',['id'=>$category->id])}}" class="btn btn-primary  btn-sm" >
                            <i class="bx bx-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
    </div>
@endsection
