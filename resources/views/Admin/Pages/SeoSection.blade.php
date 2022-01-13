@extends('Admin/Layout/Layout')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Add Seo Stuffs</h1>
          <p>You can Add Seo Informations here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Add Information</a></li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Seo Forms</h3>
            <div class="tile-body">
              <form action="{{ route('add-seo-field') }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="form-group">
                  <label class="control-label">Meta Url</label>
                  <input class="form-control" type="url" placeholder="Type Appropriate Url.." name="url">
                </div>
                <div class="form-group">
                  <label class="control-label">Meta Title</label>
                  <input class="form-control" type="meta_title" placeholder="Type Title." name="meta_title">
                </div>
                <div class="form-group">
                  <label class="control-label">Meta Description</label>
                  <input class="form-control" type="meta_description" placeholder="Type Description.." name="meta_description">
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Information</button>&nbsp;&nbsp;&nbsp;
            </div>
            </form>
          </div>
        </div>
      </div> 
</main> 
@endsection