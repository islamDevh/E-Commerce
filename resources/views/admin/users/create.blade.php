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
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <!-- Add message -->
            @if (session()->has('Add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('Add') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form class="p-4 m-3 border bg-gradient-info" autocomplete="off" method="POST"
                action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>Name</h3>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                name="name" value="{{ old('name') }}" id="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>Email</h3>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                name="email" value="{{ old('email') }}" id="email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>Password</h3>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password" name="password" id="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h3>Password Confirmation</h3>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Password Confirmation" name="password_confirmation" id="password_confirmation">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h4>Type</h4>
                    <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                        <option value="">--Choose--</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    @error('type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <h4>Image</h4>
                    <p class="text-danger">* Format: pdf, jpeg, jpg, png</p>
                    <input type="file" name="image" class="dropify" accept=".pdf, .jpg, .jpeg, .png, image/jpeg, image/png" data-height="70" />
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
            </form>
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
