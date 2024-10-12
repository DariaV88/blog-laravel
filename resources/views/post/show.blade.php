@extends('layouts.main');

@section('content');
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}} {{$date->format('H:i')}}, {{$post->comments->count()}} комментария</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{url('storage/' . $post->image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                       </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{url('storage/' . $post->image)}}" alt="related post" class="post-thumbnail">
                                <a href="{{route('post.show', $post->id)}}"><h5 class="post-title">{{$relatedPost->title}}</h5></a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    <section class="py-2">
                    <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                @auth
                                <i class="fa fa-heart{{auth()->user()->likedPosts->contains($post->id) ? '' : '-o'}}" aria-hidden="true"></i>
                                @endauth
                            </button>
                        </form>
                    </section>

                    <section class="comment-list mb-5">
                    <h2 class="section-title mb-4" data-aos="fade-up">Комментарии ({{$post->comments->count()}})</h2>
                        @foreach($post->comments as $comment)
                    <div class="comment-text mb-3">
                    <span class="username">
                      <div>{{$comment->user->name}}</div>
                      <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                    </span>{{$comment->message}}
                  </div>
                  @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Комментарий</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Оставьте комментарий" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Добавить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
    @endsection