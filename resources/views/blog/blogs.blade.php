@extends('layouts.blog')
@section('content')
<!-- Latest Posts -->
<main class="posts-listing col-lg-8"> 
  <div class="container">
    <div class="row">
      <!-- post -->
      @if($posts)
      @foreach($posts as $post)
      <div class="post col-xl-6 ">
        <div class="post-thumbnail border"><a href="/blog/{{$post->id}}"><img src="{{$post->photo ? $post->photo->file : 'No Image' }}" alt="No Images" class="img-fluid"></a></div>
        <div class="post-details">
          <div class="post-meta d-flex justify-content-between">
            <div class="date meta-last"> {{$post->created_at->diffForHumans()}}</div>
            <div class="category"><a href="#">{{$post->category ? $post->category->name : 'Uncategorise' }} </a></div>
          </div><a href="/blog/{{$post->id}}">
            <h3 class="h4">{{$post->title}}</h3></a>
            <p class="text-muted">{{str_limit($post->body,100)}}</p>
            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
              <div class="avatar"><img src="{{$post->user->photo ? $post->user->photo->file : 'No Image'}} " alt="No Image" class="img-fluid"></div>
              <div class="title"><span> {{$post->user->name}} </span></div></a>
              <div class="date"><i class="icon-clock"></i> {{$post->created_at->diffForHumans()}} </div>
              <div class="comments meta-last"><i class="icon-comment"></i>12</div>
            </footer>
          </div>
        </div>
        <!-- post             -->
        @endforeach
        @endif
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
         <!-- Pagination --> 
         <nav aria-label="Page navigation example">

          {{$posts->links('vendor.pagination.blog-pagination')}}

        </nav>

      </div>
    </div>
  </main>
  <aside class="col-lg-4">
    <!-- Widget [Search Bar Widget]-->
    <div class="widget search">
      <header>
        <h3 class="h6">Search the blog</h3>
      </header>
      <form action="#" class="search-form">
        <div class="form-group">
          <input type="search" placeholder="What are you looking for?">
          <button type="submit" class="submit"><i class="icon-search"></i></button>
        </div>
      </form>
    </div>
    <!-- Widget [Latest Posts Widget]        -->
    <div class="widget latest-posts">
      <header>
        <h3 class="h6">Latest Posts</h3>
      </header>
      <div class="blog-posts">
        @if($latestPost)
        @foreach($latestPost as $post)
        <a href="/blog/{{$post->id}}">
          <div class="item d-flex align-items-center">
            <div class="image"><img src="{{$post->photo ? $post->photo->file : 'No image'}}" alt="" class="img-fluid"></div>
            <div class="title"><strong>{{$post->title}}</strong>
              <div class="d-flex align-items-center">
                <div class="comments"><i class="icon-comment"></i>12</div>
              </div>
            </div>
          </div>
        </a>
        @endforeach
        @endif
      </div>
    </div>
    <!-- Widget [Categories Widget]-->
    <div class="widget categories">
      <header>
        <h3 class="h6">Categories</h3>
      </header>
      @if($categorys)
      @foreach($categorys as $category)
      <div class="item d-flex justify-content-between"><a href="#"> {{$category->name}} </a><span>12</span></div>
      @endforeach
      @endif
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">       
      <header>
        <h3 class="h6">Tags</h3>
      </header>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
        <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
        <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
        <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
        <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
      </ul>
    </div>
  </aside>
</div>
</div>

@endsection