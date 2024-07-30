@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">

            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- massage error-->
    @if (session()->has('Add'))
        <div class="alert alert-success bg bg-success-gradient tx-white alert-dismissible fade show col-sm-2" role="alert">
            <i class="fas fa-check-circle"></i>
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- delete -->
    @if (session()->has('delete'))
        <div class="alert alert-danger bg bg-danger-gradient tx-white alert-dismissible fade show col-sm-2" role="alert">
            <i class="fas fa-check-circle"></i>
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- edit -->
    @if (session()->has('edit'))
        <div class="alert alert-info bg bg-info-gradient tx-white  alert-dismissible fade show col-sm-2" role="alert">
            <i class="fas fa-check-circle"></i>
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<!--massage Error -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <form class="p-4 m-3 border bg-gradient-info" method="POST"
                    action="{{ route('category.update', $category->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <h3>Edit category: {{ $category->name }} </h3>
                        <input type="text" placeholder="new name" name="name"
                            value="{{ $category->name }}" class="form-control" id="name">
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
@endsection
