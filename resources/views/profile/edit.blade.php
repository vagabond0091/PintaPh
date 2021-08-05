@extends('layouts.main')

@section('content')
<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          {!! Form::open(['action' => ['ProfileController@update',$users->id], 'method' => 'POST','enctype' =>'multipart/form-data']) !!}
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card profile">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                      @if($users->avatar_original == NULL)
                        <img src="{{ $users->avatar}}" alt="Admin" class="rounded-circle" width="150">

                      @else
                      <img src="{{ asset('storage/images/'.$users->avatar_original)}}" alt="Admin" class="rounded-circle" width="150">
                      @endif
                    <div class="icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" id="upload_image" width="24" height="24" fill="currentColor" class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z"/>
                    </svg>
                    {{Form::file('image',['id' => 'profile_image'])}}
                    </div>

                    <div class="mt-3">
                      <h4>{{$users->name}}</h4>
                      <!-- <p class="text-secondary mb-1">Full Stack Developer</p> -->
                      <p class="text-muted font-size-sm">
                      @if($users->profile->address == NULL)

                      @else
                      {{$users->profile->address }}
                      @endif
                      </p>

                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3 profile-links">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0 update-profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">

                    </span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0 update-profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">

                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0 update-profile"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">

                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0 update-profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3 profile">

                <div class="card-body">
                  <div class="row d-flex align-items-center">

                    <div class="col-sm-3 ">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">

                    {{Form::text('name',$users->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
                    </div>
                  </div>
                  <hr>
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Form::text('contact',$users->contact,['class' => 'form-control', 'placeholder' => 'Phone'])}}
                    </div>
                  </div>
                  <hr>
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Form::text('phone',$users->profile->mobile_no,['class' => 'form-control', 'placeholder' => 'Mobile No.'])}}
                    </div>
                  </div>
                  <hr>
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Form::text('addr',$users->profile->address,['class' => 'form-control', 'placeholder' => 'Address'])}}
                    </div>

                  </div>
                  <hr>
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Twitter</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Form::text('twitter_link',$users->profile->twitter_link,['class' => 'form-control', 'placeholder' => 'Twitter Url'])}}
                    </div>

                  </div>

                  <hr>
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Instagram</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Form::text('ig_link',$users->profile->instagram_link,['class' => 'form-control ', 'placeholder' => 'Instagram Url'])}}
                    </div>

                  </div>
                  <hr>
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Website</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Form::text('web_link',$users->profile->website_link,['class' => 'form-control', 'placeholder' => 'Website Url'])}}
                    </div>

                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-12">
                    <!-- <button class="btn btn-outline-primary">Message</button> -->

                      {{Form::submit('Submit',['class' => 'btn btn-outline-primary']) }}
                    </div>

                  </div>

                </div>
                {{Form::hidden('_method','PUT') }}
                {!! Form::close() !!}
              </div>

              <div class="row gutters-sm profile">
                <!-- <div class="col-sm-6 mb-3">
                  <div class="card h-100 profile-content">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100 profile-content">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>



            </div>
          </div>

        </div>
    </div>
    @endsection


