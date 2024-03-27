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
                    action="{{ route('setting.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <h3>Name</h3>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Name" name="name" value="{{ old('name') }}" 
                            id="name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h3>Email</h3>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            placeholder="" name="email" value="{{ old('email') }}" 
                            id="email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h3>Phone</h3>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                            placeholder="" name="phone" value="{{ old('phone') }}" 
                            id="phone">
                            @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h3>WhatsApp</h3>
                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" 
                            placeholder="" name="whatsapp" value="{{ old('whatsapp') }}" 
                            id="whatsapp">
                            @error('whatsapp')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    
                    <div class="form-group">
                        <h3>Facebook</h3>
                        <input type="text" class="form-control @error('facebook') is-invalid @enderror" 
                            placeholder="" name="facebook" value="{{ old('facebook') }}" 
                            id="facebook">
                            @error('facebook')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h3>instagram</h3>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" 
                            placeholder="" name="instagram" value="{{ old('instagram') }}" 
                            id="instagram">
                            @error('instagram')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h3>Youtube</h3>
                        <input type="text" class="form-control @error('youtube') is-invalid @enderror" 
                            placeholder="" name="youtube" value="{{ old('youtube') }}" 
                            id="youtube">
                            @error('youtube')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h3>twitter</h3>
                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" 
                            placeholder="" name="twitter" value="{{ old('twitter') }}" 
                            id="twitter">
                            @error('twitter')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h4>Description</h4>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="text" id="description"
                            name="description" rows="3"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <h4>Logo</h4>
                    <p class="text-danger">* format : pdf, jpeg ,.jpg , png </p>
                    <div class="col-sm-12 col-md-12">
                        <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                        @error('logo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
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
