@extends('master.admin.master')

@section('title')
    Add Unit
@endsection
@section('name')
    Add Unit Info
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Fill-Up Unit Info</h5>
                        </div>
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <div class="card-body">
                            <form action="{{route('new.unit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Unit Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="basic-default-name" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Unit Description</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add Unit Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

