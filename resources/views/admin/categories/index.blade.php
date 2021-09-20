<x-admin-master>

@section('content')
<h1>Categories</h1>

<!-- Create FORM -->
<div class="col-sm-3">

        <form method="post" action="{{route('categories.store')}}">
        @csrf

        <div class="form-group">
            <label for="category">Add a Category</label>
            <input type="text" name="name" id ="category" class="form-control">
          </div>

          <div>
          <button class="btn btn-primary btn-block" type="submit">Create</button>
          <br/>
          </div>
            
        </form>
</div>

<!-- DISPLAY Categories -->

<div class="col-sm-6" >
  @if($categories)
      <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                         <th>ID</th>
                         <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th> 
                          
                    </tr>
                  </tfoot>
                  <tbody>

                  @foreach($categories as $category)

                        <tr>
                          <td>{{$category->id}}</td>
                          <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                          <td>{{$category->created_at->diffforHumans()}}</td>
                          <td>{{$category->updated_at->diffforHumans()}}</td>
                        </tr>

                    @endforeach
                  </tbody>
              </table>
            @endif
</div>

 @endsection

</x-admin-master>