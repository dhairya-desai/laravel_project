<x-admin-master>

@section('content')
<h1>Categories</h1>

<!-- UPDATE form -->
<div class="col-sm-3">

        <form method="post" action="{{ route('categories.update', ['category'=> $category->id])}}" enctype = multipart/form-data>
        @csrf
     

        <div class="form-group">
            <label for="category">Update Category</label>
            <input type="text" name="name" id ="category" value="{{$category->name}}" class="form-control">
          </div>

          <div>
          <button class="btn btn-primary btn-block" type="submit">Update</button>
          <br/>
          </div>
            
        </form>
</div>

<!-- Delete Form -->
<div class="col-sm-3">

        <form method="DELETE" action="{{ route('categories.delete', ['category'=> $category->id])}}">
        @csrf
        @method('DELETE')

          <div>
          <button class="btn btn-danger btn-block" type="submit">Delete</button>
          <br/>
          </div>
            
        </form>
</div>


 @endsection

</x-admin-master>