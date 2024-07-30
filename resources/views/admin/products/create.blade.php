@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <!-- massage Add -->
                @if (session()->has('success'))
                    <div class="alert alert-info"><i class="fas fa-check-circle"></i>
                        <strong style="font-size: xx-large">{{ session()->get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form class="p-4 m-3 border bg-gradient-info" autocomplete="off" method="POST"
                    action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h3>Add Product</h3>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Product Name" name="name" value="{{ old('name') }}" id="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <h4>Related Category</h4>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id">
                                <option value="">--Choose--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h4>Price</h4>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}" name="price">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <h4>Offer</h4>
                            <input type="number" class="form-control @error('offer') is-invalid @enderror"
                                value="{{ old('offer') }}" name="offer">
                            @error('offer')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <h4>quantity</h4>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity') }}" name="quantity">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <h4>Description</h4>
                            <textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Description" id="description"
                                name="description" rows="3" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>Main Image</h4>
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile1" type="file">
                                    <label class="custom-file-label" for="customFile1">Choose file</label>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <p class="text-danger mt-2">* Main Image: jpg, jpeg, png</p>
                            </div>
                            <div class="col-sm-6">
                                <h4>Other Images</h4>
                                <div class="custom-file">
                                    <input class="custom-file-input" name="images[]" type="file" id="formFile"
                                        accept=".jpg, .jpeg, .png" multiple>
                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                    @error('images')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <p class="text-danger mt-2">* Image: jpg, jpeg, png</p>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg" style="font-size: 20px;">Add</button>
            </div>
            </form>

        </div>
    </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
