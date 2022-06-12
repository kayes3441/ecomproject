@extends('master.admin.master')

@section('title')
    Add Product
@endsection
@section('name')
    Add Product Info
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
                            <h5 class="mb-0">Fill-Up Product Info</h5>
                        </div>
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <div class="card-body">
                            <form action="{{route('new.product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="category_id" onchange="getProductSubCategory(this.value)">
                                            <option> --Select Category Name--</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Sub-Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="sub_category_id" id="subCategoryId">
                                            <option> --Select Sub-Category Name--</option>
                                            @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}" >  {{$sub_category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Brand Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="brand_id">
                                            <option> --Select Brand Name--</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Unit Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="unit_id">
                                            <option> --Select Unit Name--</option>
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}"> {{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="basic-default-company"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Product Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="code" id="basic-default-company"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Stock Amount</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="stock_amount" id="basic-default-company"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Selling Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="selling_price" id="basic-default-company"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Regular Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="regular_price" id="basic-default-company"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="short_description"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control summernote " name="long_description"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Product Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" id="basic-default-company"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Other Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="other_image[]" multiple id="basic-default-company"/>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add Product Info</button>
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

