@extends('layouts.dashboard')

@section('title','Categories')
@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')

    <div class="mb-5 float-right">
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-primary py-2">Create New</a>
    </div>


    <table class="table">
        <div class=" w-50 d-flex  align-content-center">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created at</th>
            <th></th>
            <th colspan="2"></th>
        </tr>
        <tbody>
        @forelse($categories as $category)
        <tr>

                <td></td>
                <td>{{ $category->id }}</td>
                <td><img src="{{\Illuminate\Support\Facades\Storage::url( $category->image )}}" alt="image" style="width:100px;height: 100px;"></td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_id }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('dashboard.categories.destroy', $category->id)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
        @empty
            <tr>
                <td colspan="7">No categories found</td>
            </tr>

            </tr>
        @endforelse
        </tbody>
        </thead>
    </table>
@endsection
