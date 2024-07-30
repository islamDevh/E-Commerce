@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Mail</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Compose-mail</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- massage add-->
                    @if (session()->has('Add'))
                        <div class="alert alert-success"><i class="fas fa-check-circle"></i>
                            <strong>{{ session()->get('Add') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h3>Compose-mail</h3>
                    <form class="p-4 m-3 border bg-gradient-info" autocomplete="off" method="POST"
                        action="{{ route('massage.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row align-items-center">
                                <label class="col-sm-2">name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('name') }}" id="name" name="name"
                                        placeholder="user Name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <label class="col-sm-2">To</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{ old('email') }}" id="email" name="email"
                                        placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-center">
                                <label class="col-sm-2">subject</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('subject') }}" id="subject" name="subject"
                                        placeholder="text" class="form-control @error('subject') is-invalid @enderror">
                                    @error('subject')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row ">

                                <label class="col-sm-2">massage</label>
                                <div class="col-sm-10">
                                    <textarea rows="10" name="message" placeholder="Text" class="form-control @error('message') is-invalid @enderror"></textarea>
                                </div>
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="btn-list mr-auto">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
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
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
@endsection
