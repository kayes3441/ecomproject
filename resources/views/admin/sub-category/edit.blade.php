@extends('master.admin.master')

@section('title')
    Edit Sub-Category
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
                            <h5 class="mb-0">Fill-Up Sub-Category Info</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>

                            <form action="{{route('update.sub-category',['id'=>$sub_category->id])}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="category_id">
                                            <option>--Select Category Name --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{$category->id == $sub_category->category_id ? 'Selected' :' '}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Sub-Category Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$sub_category->name}}" name="name" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Sub-Category Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control"  name="description"  placeholder="Category Description">{{$sub_category->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Sub-Category Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" />
                                        <img src="{{asset($sub_category->image)}}" class="mt-3" alt="" height="80" width="100">
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Sub-Category Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection


