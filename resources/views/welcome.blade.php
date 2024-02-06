@extends('partials.layout')
@section('title', 'Home page')
@section('content')
    <div class="container mx-auto">
        {{ $posts->links() }}
        <div class="flex flex-row flex-wrap">
            @foreach ($posts as $post)
                <div class="basis-1/4 my-2">
                    <div class="card bg-base-200 shadow-xl min-h-full m-2">
                        @if ($post->images->count() == 1)
                            <figure>
                                <img src="{{ $post->images->first()->path }}" alt="{{ $post->title }}" />
                            </figure>
                        @elseif($post->images->count() > 1)
                            <div class="carousel rounded-box">
                                @foreach ($post->images as $image)
                                    <div class="carousel-item w-full">
                                        <img src="{{ $image->path }}" class="w-full" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->snippet }}</p>
                            <p class="text-gray-400">{{ $post->user->name }}</p>
                            <p class="text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            <p class="text-gray-400"><b>Comments: </b>{{ $post->comments()->count() }}</p>
                            <p class="text-gray-400"><b>Likes: </b>{{ $post->likes()->count() }}</p>
                            <div>
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('tag', ['tag' => $tag])}}">
                                        <div class="badge badge-neutral">{{$tag->name}}</div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="card-actions justify-end">
                                @if($post->authHasLiked)
                                    <a href="{{ route('like', ['post' => $post]) }}" class="btn btn-error">Unlike</a>
                                @else
                                    <a href="{{ route('like', ['post' => $post]) }}" class="btn btn-primary">Like</a>
                                @endif
                                <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
