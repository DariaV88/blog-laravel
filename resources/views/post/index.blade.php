@extends('layouts.main');

@section('content');
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{url('storage/' . $post->image)}}" alt="blog post">
                        </div>
                        <div class="d-flex justify-content-between">
                        <p class="blog-post-category">{{$post->category->title}}</p>
                        @auth
                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <span>{{$post->liked_users_count}}</span>
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa fa-heart{{auth()->user()->likedPosts->contains($post->id) ? '' : '-o'}}" aria-hidden="true"></i> 
                            </button>
                        </form>
                        @endauth
                        @guest
                        <div>
                        <span>{{$post->liked_users_count}}</span>
                        <i class="fa fa-heart-o" aria-hidden="true"></i> 
                        </div>
                        @endguest
                        </div>
                        <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{$post->title}}</h6>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div style="margin-top: -90px; margin-bottom: 80px;">{{$posts->links()}}</div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                        @foreach($randomPosts as $post)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{url('storage/' . $post->image)}}" alt="blog post">
                                </div>
                                
                                <div>
                                    <p class="blog-post-category">{{$post->category->title}}</p>
                                </div>
                                
                                <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$post->title}}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">10 самых популярных постов</h5>
                        <ul class="post-list">
                        @foreach($likedPosts as $post)
                            <li class="post">
                                <a href="{{route('post.show', $post->id)}}" class="post-permalink media">
                                    <img src="{{url('storage/' . $post->image)}}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{$post->title}}</h6>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>  
                </div>
            </div>
        </div>

    </main>
    @endsection