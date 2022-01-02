@extends('frontend.app')

@section('title')
	Home - Hotel Transportation
@endsection

@section('section')

<main>
    <div class="page-section pt-4">
      <div class="container">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb bg-transparent mb-4">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="blog.html">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hotel Transportation</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8">
              @foreach ($services as $service)

            <div class="blog-single-wrap">
              <div class="post-thumbnail">
                <img src="{{$service->image}}" alt="">
              </div>
              <h1 class="post-title">{{$service->title}}</h1>
              
              <div class="post-content">
                <p>{{$service->body}}</p>
              </div>
            </div> <!-- .blog-single-wrap -->
            @endforeach
            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="{{route('create-comment')}}" class="" method="POST">
                @csrf
                <div class="form-row form-group">
                  <div class="col-md-6">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" name="website" id="website">
                </div>
    
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="8"  class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>
    
              </form>
            </div> <!-- .comment-form-wrap -->
          </div>
          
          <div class="col-lg-4">
            <div class="widget">
              
              <div class="widget-box">
                <h3 class="widget-title">Other Services</h3>
                <div class="divider"></div>
                <ul class="categories">
                    @php 
                    $menu = \App\servicemenu::where('status', 1)->get();
                  @endphp
                  @foreach ($menu as $mn)  
                  <li><a href="{{$mn->link}}">{{$mn->name}}</a></li>
                  @endforeach
                </ul>
              </div>

            </div>
          </div>
          
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>


@endsection