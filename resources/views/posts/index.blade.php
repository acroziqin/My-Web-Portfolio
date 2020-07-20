@include('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            @isset($category)
                <h4>Category: {{ $category->name }}</h4>
            @endisset
            @isset($tag)
                <h4>Tag: {{ $tag->name }}</h4>
            @endisset
            @if (!isset($tag) && !isset($category))
                <h4>All Posts</h4>
            @endif
            <hr>
        </div>
        <div class="row">
            @forelse ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-3">
                    @if ($post->thumbnail)
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img style="height: 270px; object-fit: cover; object-position: center" src="{{ $post->takeImage() }}" class="card-img-top">
                        </a>
                    @endif
                    <div class="card-body">
                        <a href="{{ route('posts.show', $post->slug) }}" class="card-title">
                            {{ $post->title }}
                        </a>
                        <div>
                            {{ Str::limit($post->body, 100) }}
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        Published on {{ $post->created_at->diffForHumans() }}
                        @can('update', $post)
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                        @endcan
                    </div>
                </div>
            </div>
            @empty
                <div class="col-md-6">
                    <div class="alert alert-info">
                        There's no posts.
                    </div>
                </div>
            @endforelse

        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@show