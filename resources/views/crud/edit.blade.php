@extends('layouts.master')

@section('title') Edit Post @endsection

@section('content')
    <form action="{{ route('crud.update', $crud->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card card-default">
            <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title"
                           value="{{ $crud->title }}">
                    @if($errors->has('title'))
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea cols="5" rows="3" class="form-control @if($errors->has('description')) is-invalid @endif"
                              name="description">{{ $crud->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox"
                               class="form-check-input @if($errors->has('description')) is-invalid @endif"
                               name="is_active" value="1" @if($crud->is_active == 1) checked @endif>
                        <label class="form-check-label" for="is_active">
                            Active Post?
                        </label>
                        @if($errors->has('is_active'))
                            <div class="invalid-feedback">{{ $errors->first('is_active') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('crud.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection