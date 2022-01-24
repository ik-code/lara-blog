@extends('front.layouts.layout')

@section('title', 'Markedia::' . $post->title)

@section('content')
    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $post->category->title }}</a></li>
                <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ol>

            <span class="color-yellow"><a href="#" title="">{{ $post->category->title }}</a></span>

            <h3>{{ $post->title }}</h3>

            <div class="blog-meta big-meta">
                <small>{{ $post->getPostDate() }}</small>
                <small><i class="fa fa-eye"></i>{{ $post->views }}</small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">

            {!! $post->content !!}

        </div><!-- end content -->

        <div class="blog-title-area">
            @if($post->tags->count())
                <div class="tag-cloud-single">
                    <span>Tags</span>
                    @foreach($post->tags as $tag)
                        <small><a href="{{ route('tags.single', ['slug' => $tag->slug ]) }}" title="">{{ $tag->title }}</a></small>
                    @endforeach
                </div><!-- end meta -->
            @endif

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->


    </div><!-- end page-wrapper -->
    @endsection
@section('scripts')
    <script>
        // jQuery(document).ready(function ($) {
        //     let imagesPath = $('.page-wrapper img')
        //     imagesPath.each(function () {
        //         let substring = $(this).attr('src').substring($(this).attr('src').indexOf('/'));
        //         //console.log(substring);
        //         let newPath = window.location.origin + '/ckfinder/userfiles/images' + substring;
        //         $(this).attr('src', newPath)
        //     })
        // });
    </script>
@endsection
