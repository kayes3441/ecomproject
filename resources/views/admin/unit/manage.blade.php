@extends('master.admin.master')

@section('title')
    Manage Unit
@endsection

@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All Unit Info</h5>
            <p class="text-success text-center">{{Session::get('message')}}</p>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Unit Name</th>
                        <th>Unit Description</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units as $unit)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$unit->name}}</td>
                        <td>{{$unit->description}}</td>
                        <td>{{$unit->status ==1 ? 'published' :'Unpublished'}}</td>
                        <td>
                            <a href="{{route('edit.unit',['id'=>$unit->id])}}" class="btn btn-primary btn-sm">
                                <i class="bx bx-edit"></i>
                            </a>
                            <a href="{{route('delete.unit',['id'=>$unit->id])}}"onclick="return confirm('Are you sure to delete......')" class="btn btn-primary btn-sm">
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
