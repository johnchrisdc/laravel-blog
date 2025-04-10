@extends('layouts.app')
@section('title', config('app.name', 'Laravel'))

@section('content')
    <div class="container">
        @foreach ($blogs as $blog)
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->description }}</p>
                        <a href="{{ route('blog.edit', ['blog_id' => $blog->id]) }}" class="card-link">Edit</a>
                        <a href="#" class="card-link text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $blog->id }}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteModal_{{ $blog->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form id="delete-form" action="{{ route('blog.delete', ['blog_id' => $blog->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Blog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete {{ $blog->title }}?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection