@extends('front.layouts.app')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('front') }}/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">Read Posts & More Articles</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ \Str::limit($post->body, 150) }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Omar Khattab, {{ $post->category->name }}</a>
                            on {{ $post->created_at->format('F d, Y') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase"
                            href="{{ route('front.posts') }}">Read
                            More →</a></div>
            </div>
        </div>
    </div>
@endsection
