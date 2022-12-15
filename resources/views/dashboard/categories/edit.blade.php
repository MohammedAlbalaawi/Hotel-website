@extends('layouts.dashboard')

@section('title','Edit Category')
@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection
@section('content')

    <div class="d-flex flex-row-reverse">
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-primary py-2">View Categories</a>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
<div style="width: 65%; margin: 0 auto;">
    <form method="post" action="{{ route('dashboard.categories.update',$model->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        @include('dashboard.categories._form')
    </form>
</div>
@endsection
