@extends('Admin/Layout/Layout');
@section('content')
@php
$Subcategories = DB::table('subcategories')->get();
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
          <h1><i class="fa fa-th-list"></i> SubCategory Table</h1>
          <p>You can get SubCategories details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">SubCategories Table</a></li>
        </ul>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" style="margin-top: 30px;">
               <div class="text-center btn-add">
                  <a href="{{ route('add-subcategory') }}" class="btn btn-info color">Add SubCategory</a>
               </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SubCategory ID</th>
                      <th>SubCategory Name</th>
                      <th>SubCategory Image</th>
                      <th>Category Of</th>
                      <th>Added On</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Subcategories as $Subcategory)
                  	<tr>
                      <td>{{ $Subcategory->id }}</td>
                      <td>{{ $Subcategory->subcategory_name }}</td>
                      <td style="text-align: center;"><img src="{{ url('/') }}/Admin/SubcategoryImage/{{ $Subcategory->subcategory_image }}" height="100px" width="100px"></td>
                      <td>
                        @php
                          $Category = DB::table('categories')->where('id',$Subcategory->category_id)->first();
                          if(!empty($Category))
                          {
                            echo $Category->category_name;
                          }
                        @endphp
                      </td>
                      <td>{{ date('d/m/Y',strtotime($Subcategory->created_at)) }}</td>
                      <td>
                        <a href="{{ route('edit-subcategory',$Subcategory->id) }}" class="btn btn-primary mr-1" style="color: #fff">Edit</a>
                        <a onclick="return confirm('Do you want to delete this ?')" href="{{ route('delete-subcategory',$Subcategory->id) }}" class="btn btn-danger" style="color: #fff">Delete</a>
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