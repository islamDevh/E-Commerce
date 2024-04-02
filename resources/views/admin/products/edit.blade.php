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
                <form class="p-4 m-3 border bg-gradient-info" method="POST" autocomplete="off"
                    action="{{route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h3>Edit Product</h3>
                            <input type="text" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Product name" name="name" value="{{ old('name') }}"
                                id="name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <h4>Related Category</h4>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" >
                                <option value="" > --Choose--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}> {{ $category->name }} </option>
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
                                value="{{ $product->price }}" name="price">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <h4>Offer</h4>
                            <input type="number" class="form-control @error('offer') is-invalid @enderror"
                                value="{{ $product->offer }}" name="offer">
                            @error('offer')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <h4>Description</h4>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="description"
                            name="description" rows="3" >{{ $product->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
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
                                    <input class="custom-file-input" name="images[]" type="file" id="formFile" accept=".jpg, .jpeg, .png" multiple>
                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                    @error('images')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <p class="text-danger mt-2">* Image: jpg, jpeg, png</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg" style="font-size: 20px;">Update</button>
                    </div>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
