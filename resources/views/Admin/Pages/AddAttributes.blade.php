@extends('Admin/Layout/Layout')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Add Category</h1>
          <p>You can Add Attributes here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Add Attribute Table</a></li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Attribute Form</h3>
            <div class="tile-body">
              <form action="{{ route('attribute_add') }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="form-group">
                  <label class="control-label">Attribute Name</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="attribute_name">
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Attribute</button>&nbsp;&nbsp;&nbsp;
            </div>
            </form>
          </div>
        </div>
      </div> 
</main>
@endsection