<x-home-master>

@section('content')
<h1>Home</h1>
@foreach($posts as $post)
        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{Str::limit($post->body,'200','...')}}</p>
                <a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on{{$post->created_at}}
                <a href="#"></a>
            </div>
        </div>
    @endforeach
@endsection
</x-home-master>