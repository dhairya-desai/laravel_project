<x-admin-master>

@section('content')

<h2>All Posts</h2>

@if(Session::has('message'))

<div class="alert alert-danger">
{{Session::get('message')}}
</div>

@elseif(Session('post-message'))
<div class="alert alert-success">
  {{Session::get('post-message')}}
</div>

@elseif(Session('post-update-message'))
<div class="alert alert-success">
  {{Session::get('post-update-message')}}
</div>

@endif

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                         <th>ID</th>
                         <th>Owner</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  @foreach($posts as $post)

                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td><a href="{{route('post.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->category ? $post->category->name:'Uncategorized'}}</td>
                    <td>
                           <img height="40" src="{{$post->post_image}}" alt="Image not displayed">
                    </td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                    <form method="post" action="{{route('post.destroy',$post->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">DELETE</button>
                    </form>
                    </td>
                    
                  
                  </tr>

                  @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection

@section('scripts')

<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
</x-admin-master>