@extends('layouts.master')
@section('css')
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
                @if (session()->has('messege'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('messege') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form class="p-4 m-3 border bg-gradient-info" autocomplete="off" method="POST"
                    action="{{ route('color.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h2>product</h2>
                    <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="product_id">
                        <option value="" > --Choose--</option>
                        @foreach  ($products as $product)
                        <option value="{{$product->id}}" > {{$product->name}} </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>

                    <div class="form-group">
                        <h4>Name Color</h4>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="product name" name="name" value="{{ old('name') }}" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <h4>Choice a Color</h4>
                    <input type="color" id="color" name="color" value="#ff0000">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                </form>
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
