@extends('master.admin.master')

@section('title')
    Manage Sub-Category
@endsection
@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All Sub-Category info</h5>
            <p class="text-success text-center">{{Session::get('message')}}</p>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Sub-Category Name</th>
                        <th>Sub-Category Description</th>
                        <th>Sub-Category Image</th>
                        <th>Status </th>
                        <th>Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_categories as $sub_category)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$sub_category->category->name}}</td>
                        <td>{{$sub_category->name}}</td>
                        <td>{{$sub_category->description}}</td>
                        <td>
                            <img src="{{asset($sub_category->image)}}" alt="" height="50" width="80">
                        </td>
                        <td>{{$sub_category->status ==1 ? 'Published' : 'Unpublished'}}</td>
                        <td>
                            <a href="{{route('edit.sub-category',['id'=>$sub_category->id])}}" class="btn btn-primary btn-sm">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a href="{{route('delete.sub-category',['id'=>$sub_category->id])}}"
                               onclick="event.preventDefault();document.getElementById('DeleteSubCategory{{$sub_category->id}}').submit();
                               return confirm('Are You sure to delete???')"
                               class="btn btn-primary btn-sm">
                                <i class="bx bx-trash"></i>
                            </a>
                            <form action="{{route('delete.sub-category',['id'=>$sub_category->id])}}" method="POST" id="DeleteSubCategory{{$sub_category->id}}">
                                @csrf
                            </form>
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

