<x-admin-master>
@section('content')

<h1>Edit Role :{{$role->name}}</h1>


    <div class="col-sm-6">
        @if(Session('role-update'))
        <div class="alert alert-success">
          {{Session::get('role-update')}}
        </div>
        @endif
        <form method="post" action="{{route('roles.update',$role->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Name</label>
                <input  type="text"      
                        name="name"
                        class="form-control"
                        id="name"
                        value="{{$role->name}}">
        </div>
        <button type ="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<br/>
<br/>

<div class="col-sm-12">
  @if($permissions->isNotEmpty())
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th> 
                                        <th>Detach</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th> 
                                        <th>Detach</th> 
                    </tr>
                  </tfoot>
                  <tbody>
                  

                      @foreach($permissions as $permission)
                  <tr>
                      <td>
                                        <input type="checkbox"
                                            @foreach($role->permissions as $role_permission)
                                            @if($role_permission->slug == $permission->slug)
                                            checked
                                            @endif
                                            @endforeach
                                            ></td>
                      <td>{{$permission->id}}</td>
                      <td>{{$permission->name}}</td>
                      <td>{{$permission->slug}}</td>
                      
                      <form method="post" action="{{route('role.permission.attach',$role)}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden"  name ="permission" value="{{$permission->id}}">
                                            
                                                <td><button class="btn btn-primary" 
                                                      @if($role->permissions->contains($permission))
                                                      disabled
                                                      @endif
                                                
                                                >Attach</button></td>
                                            </form>

                      <form method="post" action="{{route('role.permission.detach',$role)}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden"  name ="permission" value="{{$permission->id}}">
                                            
                                                <td><button class="btn btn-danger" 
                                                      @if(!$role->permissions->contains($permission))
                                                      disabled
                                                      @endif
                                                
                                                >Detach</button></td>
                                            </form>


                      @endforeach
                
                      
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>




@endsection
</x-admin-master>