@extends('Admin/Layout/Layout');
@section('content')
@php
$Careers = DB::table('candidates')->get();
@endphp
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Career Table</h1>
          <p>You can get Candidates applied details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Candidates Table</a></li>
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
                      <th>Email</th>
                      <th>Interested</th>
                      <th>Resume</th> 
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Careers as $Career)
                  	<tr>
                      <td>{{ $Career->name }}</td> 
                      <td>
                      	{{ $Career->email }} <br/>
                      </td>
                      <td>{{ $Career->interested }}</td>
                      <td class="text-center">
                        <a href="{{ route('download-resume',$Career->id) }}">
                        <i class="fa fa-download" aria-hidden="true" style="font-size: 22px;"></i>
                        </a>
                      </td>
                      <td>{{ date('d/m/Y h:i:s',strtotime($Career->created_at)) }}</td>
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