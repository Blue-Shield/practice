@extends('Admin/Layout/Layout')
@section('content')
<style type="text/css">
  .attribute{
    font-size: 16px;
    font-weight: bold;
  }
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Edit Attributes</h1>
          <p>You can Edit Attributes here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Edit Attributes</a></li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Attributes Form</h3>
            <div class="tile-body">
              <form action="{{ route('update-attribute',$Attribute->id) }}" method="post" id="basic-form" enctype="multipart/form-data">
              	@csrf
                <div class="form-group">
                  <label class="control-label">Attribute Name</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="attribute_name" value="{{ $Attribute->attribute_name }}">
                </div>
                <div class="form-group">
                  <label class="control-label">Attribute Value</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="attribute_value" value="{{ $Attribute->attribute_value}}">
                </div>
                <div class="form-group">
                  <label class="control-label">Attribute Price</label>
                  <input class="form-control" type="number" placeholder="Type Something.." name="attribute_price" value="{{ $Attribute->attribute_price}}">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Attribute Image</label>
                      <input class="form-control" type="file" name="attribute_image">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img src="{{ url('/') }}/Admin/AttributeImage/{{ $Attribute->attribute_image }}" height="100px" width="100px" />
                  </div>
                </div>

              <div class="tile-footer">
                <button class="btn btn-primary submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Attribute</button>&nbsp;&nbsp;&nbsp;
              </div>
            </form>
            </div> 
          </div>
        </div>
      </div> 
</main>
@endsection
<script src="{{ url('/') }}/Admin/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     $('.submit').click(function(){
        // e.preventDefault();
        if($('#checkbox').is(':checked')){

          return true;
        }
        else
        {
          return true;
        }
     });
  });
</script>