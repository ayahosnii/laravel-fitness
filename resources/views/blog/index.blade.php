@extends('layouts.app')
@section('style-css')
    <style>
        img {
            width: 100%
        }
    </style>
@stop
@section('content')
<section class="section blog-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="blog-posts">

                    <div class="single-post">
                        <div class="image-wrapper"><img src="{{$latestArticle->image}}" alt="Blog Image"></div>

                        <div class="icons">
                            <div class="left-area">
                                <a class="btn caegory-btn" href="#"><b>TRAVEL</b></a>
                            </div>

                        </div>
                        <h6 class="date"><em>{{$latestArticle->created_at->toFormattedDateString()}}</em></h6>
                        <h3 class="title"><a href="#"><b class="light-color">{{$latestArticle->title}}</b></a></h3>
                        <p>{{substr($latestArticle->body, 0, 100)}}</p>
                        <a class="btn read-more-btn" href="#"><b>READ MORE</b></a>
                    </div><!-- single-post -->

                    <div class="row">

                        @foreach($articles as $arti)
                        <div class="col-lg-6 col-md-12">
                            <div class="single-post">
                                <div class="image-wrapper"><img src="{{$arti->image}}" alt="Blog Image"></div>

                                <div class="icons">
                                    <div class="left-area">
                                        <a class="btn caegory-btn" href="#"><b>TRAVEL</b></a>
                                    </div>
                                    <ul class="right-area social-icons">
                                        <li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
                                        <li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
                                    </ul>
                                </div>
                                <h6 class="date"><em> {{$arti->created_at->toFormattedDateString()}}</em></h6>
                                <h3 class="title"><a href="#"><b class="light-color">{{$arti->title}}</b></a></h3>
                                <p>{{ substr($arti->body, 0, 100)}}</p>
                                <a class="btn read-more-btn" href="#"><b>READ MORE</b></a>
                            </div><!-- single-post -->
                        </div><!-- col-sm-6 -->
                        @endforeach
                    </div><!-- row -->

                    <a class="btn load-more-btn" target="_blank" href="#">LOAD OLDER POSTS</a>

                </div><!-- blog-posts -->
            </div><!-- col-lg-4 -->


            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">

                    <div class="sidebar-section about-author center-text">
                        <div class="author-image"><img src="{{asset('assets/imgs/blog/author-1-200x200.jpg')}}" alt="Autohr Image"></div>

                        <ul class="social-icons">
                            <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                        </ul><!-- right-area -->

                        <h4 class="author-name"><b class="light-color">Cristine Smith</b></h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            dolore magnam aliquam quaerat voluptatem.</p>

                        <div class="signature-image"><img src="{{asset('assets/imgs/blog/signature-image.png')}}" alt="Signature Image"></div>
                        <a class="read-more-link" href="#"><b>READ MORE</b></a>

                    </div><!-- sidebar-section about-author -->

                    <div class="sidebar-section src-area">

                        <form action="post">
                            <input class="src-input" type="text" placeholder="Search">
                            <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                        </form>

                    </div><!-- sidebar-section src-area -->

                    <div class="sidebar-section newsletter-area">
                        <h5 class="title"><b>Subscribe to our newsletter</b></h5>
                        <form action="post">
                            <input class="email-input" type="text" placeholder="Your email here">
                            <button class="btn btn-2" type="submit">SUBSCRIBE</button>
                        </form>
                    </div><!-- sidebar-section newsletter-area -->

                    <div class="sidebar-section category-area">
                        <h4 class="title"><b class="light-color">Categories</b></h4>
                        <a class="category" href="#">
                            <img src="{{asset('assets/imgs/blog/category-1-400x150.jpg')}}" alt="Category Image">
                            <h6 class="name">TRAVEL</h6>
                        </a>

                        <a class="category" href="#">
                            <img src="{{asset('assets/imgs/blog/category-2-400x150.jpg')}}" alt="Category Image">
                            <h6 class="name">FASHION</h6>
                        </a>

                        <a class="category" href="#">
                            <img src="{{asset('assets/imgs/blog/category-3-400x150.jpg')}}" alt="Category Image">
                            <h6 class="name">LIFESTYLE</h6>
                        </a>
                        <a class="category" href="#">
                            <img src="{{asset('assets/imgs/blog/category-4-400x150.jpg')}}" alt="Category Image">
                            <h6 class="name">DESIGN</h6>
                        </a>
                    </div><!-- sidebar-section category-area -->

                    <div class="sidebar-section latest-post-area">
                        <h4 class="title"><b class="light-color">Latest Posts</b></h4>

                        <div class="latest-post" href="#">
                            <div class="l-post-image"><img src="{{asset('assets/imgs/blog/recent-post-1-150x200.jpg')}}" alt="Category Image"></div>
                            <div class="post-info">
                                <a class="btn category-btn" href="#">TRAVEL</a>
                                <h5><a href="#"><b class="light-color">One more night in the clubs</b></a></h5>
                                <h6 class="date"><em>Monday, October 13, 2017</em></h6>
                            </div>
                        </div>

                        <div class="latest-post" href="#">
                            <div class="l-post-image"><img src="{{asset('assets/imgs/blog/recent-post-2-150x200.jpg')}}" alt="Category Image"></div>
                            <div class="post-info">
                                <a class="btn category-btn" href="#">TRAVEL</a>
                                <h5><a href="#"><b class="light-color">Travel lights in winter</b></a></h5>
                                <h6 class="date"><em>Monday, October 13, 2017</em></h6>
                            </div>
                        </div>
                        <div class="latest-post" href="#">
                            <div class="l-post-image"><img src="{{asset('assets/imgs/blog/recent-post-3-150x200.jpg')}}" alt="Category Image"></div>
                            <div class="post-info">
                                <a class="btn category-btn" href="#">TRAVEL</a>
                                <h5><a href="#"><b class="light-color">How to travel with no money</b></a></h5>
                                <h6 class="date"><em>Monday, October 13, 2017</em></h6>
                            </div>
                        </div>

                        <div class="latest-post" href="#">
                            <div class="l-post-image"><img src="{{asset('assets/imgs/blog/recent-post-4-150x200.jpg')}}" alt="Category Image"></div>
                            <div class="post-info">
                                <a class="btn category-btn" href="#">TRAVEL</a>
                                <h5><a href="#"><b class="light-color">Smile 10 times a day</b></a></h5>
                                <h6 class="date"><em>Monday, October 13, 2017</em></h6>
                            </div>
                        </div>

                    </div><!-- sidebar-section latest-post-area -->

                    <div class="sidebar-section advertisement-area">
                        <h4 class="title"><b class="light-color">Advertisement</b></h4>
                        <a class="advertisement-img" href="#">
                            <img src="{{asset('assets/imgs/blog/advertise-1-400x500.jpg')}}" alt="Advertisement Image">
                            <h6 class="btn btn-2 discover-btn">DISCOVER</h6>
                        </a>
                    </div><!-- sidebar-section advertisement-area -->

                    <div class="sidebar-section instagram-area">
                        <h4 class="title"><b class="light-color">Instagram</b></h4>
                        <ul class="instagram-img">
                            <li><a href="#"><img src="{{asset('assets/imgs/blog/instragram-side-1-150x150.jpg')}}" alt="Instagram Image"></a></li>
                            <li><a href="#"><img src="{{asset('assets/imgs/blog/instragram-side-2-150x150.jpg')}}" alt="Instagram Image"></a></li>
                            <li><a href="#"><img src="{{asset('assets/imgs/blog/instragram-side-3-150x150.jpg')}}" alt="Instagram Image"></a></li>
                            <div class="clearfix"></div>
                            <li><a href="#"><img src="{{asset('assets/imgs/blog/instragram-side-4-150x150.jpg')}}" alt="Instagram Image"></a></li>
                            <li><a href="#"><img src="{{asset('assets/imgs/blog/instragram-side-5-150x150.jpg')}}" alt="Instagram Image"></a></li>
                            <li><a href="#"><img src="{{asset('assets/imgs/blog/instragram-side-6-150x150.jpg')}}" alt="Instagram Image"></a></li>
                        </ul>
                    </div><!-- sidebar-section instagram-area -->

                    <div class="sidebar-section tags-area">
                        <h4 class="title"><b class="light-color">Tags</b></h4>
                        <ul class="tags">
                            <li><a class="btn" href="#">design</a></li>
                            <li><a class="btn" href="#">fasinon</a></li>
                            <li><a class="btn" href="#">travel</a></li>
                            <li><a class="btn" href="#">music</a></li>
                            <li><a class="btn" href="#">video</a></li>
                            <li><a class="btn" href="#">photography</a></li>
                            <li><a class="btn" href="#">adventure</a></li>
                        </ul>
                    </div><!-- sidebar-section tags-area -->


                </div><!-- about-author -->
            </div><!-- col-lg-4 -->

        </div><!-- row -->
    </div><!-- container -->
</section>
@endsection
