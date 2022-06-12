@extends('master.admin.master')

@section('title')
    Manage Brand
@endsection

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All Brand Info</h5>
            <p class="text-success text-center">{{Session::get('message')}}</p>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Brnad Name</th>
                        <th>brand description</th>
                        <th>brand image</th>
                        <th>Status</th>
                        <th>action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->description}}</td>
                        <td>
                            <img src="{{asset($brand->image)}}" alt="" height="50" width="80"/>
                        </td>
                        <td>{{$brand->status ==1 ? 'Published' : 'Unpublished'}}</td>
                        <td>
                            <a  href="{{route('edit.brand',['id'=>$brand->id])}}" class="btn btn-primary btn-sm">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a  href="{{route('delete.brand',['id'=>$brand->id])}}" onclick="event.preventDefault();
                            document.getElementById('DeleteBrand{{$brand->id}}').submit();
                            return confirm('Are you Sure to Delete')" class="btn btn-primary btn-sm">
                                <i class="bx bx-trash"></i>
                            </a>
                            <form action="{{route('delete.brand',['id'=>$brand->id])}}" method="post"  id="DeleteBrand{{$brand->id}}">
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
