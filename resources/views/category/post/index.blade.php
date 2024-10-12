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
            </section>
        </div>

    </main>
    @endsection