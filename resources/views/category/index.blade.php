@extends('layouts.main');

@section('content');
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                @foreach($categories as $category)
                <ul><li>
                    <a href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a>
                </li></ul>
                @endforeach
            </section>
        </div>

    </main>
    @endsection