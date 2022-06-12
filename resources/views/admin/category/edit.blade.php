@extends('master.admin.master')

@section('title')
    Edit Category
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
                            <h5 class="mb-0">Add Category Info</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>

                            <form action="{{route('update.category',['id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$category->name}}" name="name" id="basic-default-name" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Category Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" placeholder="Category Description">{{$category->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" >
                                        <img src="{{asset($category->image)}}" alt="" class=" mt-3" height="80" width="100"/>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

