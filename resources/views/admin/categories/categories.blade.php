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
    <!-- row -->
    <div class="row">
        <!-- massage add-->
        @if (session()->has('Add'))
            <div class="alert alert-success"><i class="fas fa-check-circle"></i>
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!--massage edit -->
        @if (session()->has('edit'))
            <div class="alert alert-success"><i class="fas fa-check-circle"></i>
                <strong>{{ session()->get('edit') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!--massage delete -->
        @if (session()->has('delete'))
            <div class="alert alert-success"><i class="fas fa-check-circle"></i>
                <strong>{{ session()->get('delete') }}</strong>
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
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <form class="p-4 m-3 border bg-gradient-info" autocomplete="off" method="POST"
                    action="{{ route('category.store') }}">
                    @csrf
                    <div class="form-group">
                        <h2>Add Category</h2>
                        <input type="text" placeholder="category name" name="name" value="{{ old('name') }}"
                            class="form-control" id="section_name">
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                    </button>
                </form>

                <table class="table table-hover mb-0 text-md-nowrap">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">{{ $category->name }}</th>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit <i
                                            class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group">
                                            <input type="submit" value="Delete" class="btn btn-danger" />
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
