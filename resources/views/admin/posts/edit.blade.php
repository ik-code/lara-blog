@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Post: {{ $post->title }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body ">
                <!-- form start -->
                <form action="{{ route('posts.update', ['post' => $post->id ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea id="excerpt"  name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3" >{{ $post->excerpt }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content"  name="content" class="form-control @error('content') is-invalid @enderror" rows="5" >{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach($categories as $k => $v)
                                    <option value="{{ $k }}" @if($k == $post->category_id) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select id="tags" name="tags[]" class="select2 " multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                                @foreach($tags as $k => $v)
                                    <option value="{{ $k }}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"  name="image" class="custom-file-input" id="image" >
                                    <label class="custom-file-label" for="image"></label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <img src="{{ $post->getImage() }}" alt="image" class="img-thumbnail">

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
    </section>
@endsection
