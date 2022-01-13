@extends('Admin/Layout/Layout');
@section('content')
@php
$Partners = DB::table('partners')->get();
@endphp
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Partners Table</h1>
          <p>You can get Candidates applied details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Partners Table</a></li>
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
                      <th>Name</th>
                      <th>Job Title</th>
                      <th>Email</th>
                      <th>Country</th>
                      <th>Interested</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Partners as $Partner)
                  	<tr>
                      <td>{{ $Partner->name }}</td> 
                      <td>
                      	{{ $Partner->job_title }} <br/>
                      </td>
                      <td>{{ $Partner->email }}</td>
                      <td>{{ $Partner->country }}</td>
                      <td>{{ $Partner->interests}}</td>
                      <td>{{ date('d/m/Y h:i:s',strtotime($Partner->created_at)) }}</td>
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