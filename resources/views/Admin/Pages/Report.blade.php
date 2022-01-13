@extends('Admin/Layout/Layout');
@section('content')
@php
$Reports = DB::table('reports')->get();
@endphp
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Reports Table</h1>
          <p>You can get Free Reports details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Reports Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Service</th>
                      <th>Website</th>
                      <th>Description</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Reports as $Report)
                  	<tr>
                      <td>{{ $Report->services }}</td> 
                      <td>
                      	{{ $Report->website }} <br/>
                      </td>
                      <td>{{ $Report->description }}</td>
                      <td>{{ date('d/m/Y h:i:s',strtotime($Report->created_at)) }}</td>
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