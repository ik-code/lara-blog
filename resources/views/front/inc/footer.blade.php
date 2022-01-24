<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @foreach($popular_posts as $post)
                                <a href="{{ route('posts.single' , ['slug' => $post->slug]) }}"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ $post->getImage() }}" alt="{{ $post->title }}"
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->getPostDate() }}</small>
                                        <small><i class="fa fa-eye"></i>{{ $post->views }}</small>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget-no-style">
                    @include('front.inc.subscribe_form')
                </div>
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Categories</h2>
                    <div class="link-widget">
                        <ul>
                            @foreach($cats as $cat)
                                <li><a href="{{ route('categories.single', ['slug' => $cat->slug]) }}">{{ $cat->title }}<span>({{ $cat->posts_count }})</span></a></li>
                            @endforeach
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Powered by Laravel. Laravel Developer - Ihor Khaletskyi</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->
