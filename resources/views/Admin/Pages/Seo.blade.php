@extends('Admin/Layout/Layout');
@section('content')
<style type="text/css">
  .btn-add{
    position: absolute;
    right: 38px;
    top: 9px;
}
.color{
  color: #fff;
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Seo Table</h1>
          <p>You can get Seo details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Seo Table</a></li>
        </ul>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" style="margin-top: 30px;">
               <div class="text-center btn-add">
                  <a href="{{ route('seo-section') }}" class="btn btn-info color">Add</a>
               </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Url</th>
                      <th>Meta Title</th>
                      <th>Meta Description</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Seo as $Information)
                  	<tr>
                      <td>{{ $Information->id }}</td>
                      <td>{{ $Information->url }}</td>
                      <td>{{ $Information->meta_title }}</td>
                      <td>{{ $Information->meta_description }}</td>
                      <td>
                        <a href="{{ route('edit-seo',$Information->id) }}" class="btn btn-primary mr-1" style="color: #fff">Edit</a>
                        <a onclick="return confirm('Do you want to delete this ?')" href="{{ route('delete-seo',$Information->id) }}" class="btn btn-danger" style="color: #fff">Delete</a>
                      </td>
                    </tr> 
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection