<x-admin-master>
@section('content')

<h1>Edit Permissions</h1>


    <div class="col-sm-6">
        @if(Session('permission-update'))
        <div class="alert alert-success">
          {{Session::get('permission-update')}}
        </div>
        @endif
        <form method="post" action="{{route('permissions.update',$permission->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Name</label>
                <input  type="text"      
                        name="name"
                        class="form-control"
                        id="name"
                        value="{{$permission->name}}">
        </div>
        <button type ="submit" class="btn btn-primary">Update</button>
        </form>
    </div>







@endsection
</x-admin-master>