@extends('layouts.blog')
@section('content')
<main class="post blog-post col-lg-8"> 
  <div class="container">
   @if($post)
   <div class="post-single">
    <div class="post-thumbnail"><img src="{{$post->photo ? $post->photo->file : 'No Image'}} " alt="No Images" class="img-fluid"></div>
    <div class="post-details">
      <div class="post-meta d-flex justify-content-between">
        <div class="category"><a href="#">{{$post->category ? $post->category->name : 'Uncategorise'}} </a></div>
      </div>
      <h1>{{$post->title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
      <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
        <div class="avatar"><img  src="{{$post->user->photo ? $post->user->photo->file : 'No Image'}}" alt="..." class="img-fluid"></div>
        <div class="title"><span>{{$post->user->name}}</span></div></a>
        <div class="d-flex align-items-center flex-wrap">       
          <div class="date"><i class="fa fa-clock"></i>{{$post->created_at->diffForHumans()}}</div>
          <div class="views"><i class="fa fa-eye"></i>500</div>
          <div class="comments meta-last"><i class="icon-comment"></i>12</div>
        </div>
      </div>
      <div class="post-body">
        {{$post->body}}
      </div>
      <div class="post-tags"><a href="#" class="tag">#Business</a><a href="#" class="tag">#Tricks</a><a href="#" class="tag">#Financial</a><a href="#" class="tag">#Economy</a></div>
      <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
       <div class="icon prev"><i class="fa fa-angle-left"></i></div>
       <div class="text"><strong class="text-primary">Previous Post </strong>
         <h6>I Bought a Wedding Dress.</h6>
       </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
         <div class="text"><strong class="text-primary">Next Post </strong>
           <h6>I Bought a Wedding Dress.</h6>
         </div>
         <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>

         <div class="post-comments">
          <header>
            <h3 class="h6">Post Comments<span class="no-of-comments">({{$comments ? count($comments) : 0}})</span></h3>
          </header>

          @if($comments)
          @foreach($comments as $comment)
          <div class="comment">
            <div class="comment-header d-flex justify-content-between">
              <div class="user d-flex align-items-center">
                <div class="image"><img src="https://via.placeholder.com/150" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title"><strong> {{$comment->author}} </strong><span class="date">{{$comment->created_at->format('M d | Y ')}}</span></div>
              </div>
            </div>
            <div class="comment-body">
              <p>{{$comment->body}} </p>
            </div>
          </div>
          @endforeach
          @endif

        </div>
        <div class="add-comment">
          <header>
            <h3 class="h6">Leave a reply</h3>
          </header>

          @if(session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          {!! Form::open(['action'=>'PostCommentsController@store','method'=>'post' , 'class'=>'commenting-form']) !!}
          <div class="row">
            <input type="text" name="post_id" value="{{$post->id}} " hidden>
            @if(Auth::check() == false)
            <div class="form-group col-md-6">
              {!! Form::text('author',null,['class'=>'form-control','placeholder'=>'Name']) !!}
            </div>
            <div class="form-group col-md-6">
              {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email Address (will not be published)']) !!}
            </div>
            @endif
            <div class="form-group col-md-12">
              {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Type your comment here.....']) !!}
            </div>
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-secondary">Submit Comment</button>
            </div>
          </div>

          {!! Form::close() !!}

        </div>
      </div>
    </div>

    @endif
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