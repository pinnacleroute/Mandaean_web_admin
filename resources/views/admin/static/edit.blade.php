@extends('layouts.app')
@section('title','Static Content')
@section('pagetitle','Static Content')
@section('sort_name',$data['sort_name'])
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Static Content</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('static-content')}}" title="Back">
                        <label><- Back</label>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST" action="{{route('static-content.update',$data['static']->id)}}" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="form-group col-sm-12">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug',$data['static']->slug)}}">
                        @error('slug')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title',$data['static']->title)}}">
                        @error('title')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" placeholder="Content">{{old('content',$data['static']->content)}}</textarea>
                        @error('content')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="image">Image (optional):</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        @if($data['static']->image)
                        <div class="mt-2">
                            <img src="{{ asset($data['static']->image) }}" alt="Current Image" style="max-width: 200px;">
                            <div>
                                <label>
                                    <input type="checkbox" name="delete_image" value="1"> Delete current image
                                </label>
                            </div>
                        </div>
                        @endif
                        @error('image')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <a href="{{url('static-content')}}" class="btn btn-light">Cancel</a>
                </form>
                <form action="{{ route('static-content.destroy', $data['static']->id) }}" method="POST" style="margin-top: 1rem;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this static content?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript">
    $('#content').summernote({
        height: 300
    });
</script>
@endsection