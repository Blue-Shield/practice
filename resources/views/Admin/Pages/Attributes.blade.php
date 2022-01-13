@extends('Admin/Layout/Layout');
@section('content')
@php
$Attributes = DB::table('attributes')->get();
@endphp
<style type="text/css">
  .btn-add{
    position: absolute;
    right: 38px;
    top: 9px;
}
.color{
  color: #fff;
}
  }
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Attributes Table</h1>
          <p>You can get Attributes details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Attribute Table</a></li>
        </ul>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" style="margin-top: 30px;">
               <div class="text-center btn-add">
                  <a href="{{ route('add-attribute') }}" class="btn btn-info color">Add Attribute</a>
               </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Attribute ID</th>
                      <th>Attribute Name</th>
                      <th>Added On</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Attributes as $Attribute)
                  	<tr>
                      <td>{{ $Attribute->id }}</td>
                      <td>{{ $Attribute->attribute_name }}</td>
                      <td>{{ date('d/m/Y',strtotime($Attribute->created_at)) }}</td>
                      <td>
                        <a href="{{ route('edit-attribute',$Attribute->id) }}" class="btn btn-primary mr-1" style="color: #fff">Edit</a>
                        <a onclick="return confirm('Do you want to delete this ?')" href="{{ route('delete-attribute',$Attribute->id) }}" class="btn btn-danger" style="color: #fff">Delete</a>
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