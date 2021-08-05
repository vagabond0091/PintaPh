@extends('layouts.main')

@section('content')
<header class="masthead  ">
    <div class="masthead-wrapper d-flex justify-content-between align-items-center">
    <div class="home-wrapper">
        <h3>Home</h3>
    </div>
    <div class="artwork-wrapper ">
        <ul class="navigation d-flex justify-content-around align-items-center">
            <li class="active"><a href="/">
                ARTWORKS
            </a></li>
            <li><a href="#" class="artwork">
                POSTS
            </a></li>
        </ul>
    </div>
    <div class="right-navigation"></div>
    </div>
    
</header>
<section class="artwork-wrapper d-flex mt-3 ">
        @foreach($artworks as $artwork)
        <div class="artwork-container ">
        <a href="/artwork/{{$artwork->id}}">
            <div class="image-container">
                <img src=" {{asset('storage/images/'.$artwork->artwork_image)}}" alt="" class="overlay">
            </div>
           
            <div class="author-wrapper">
                <div class="title-wrapper">
                    <p>{{$artwork->title}}</p>
                </div>
                <div class="author-detail">
                    <span><img src="{{asset('storage/images/'.$artwork->user->avatar_original)}}" alt="" > </span>
                    <span>{{$artwork->user->name}}</span>
                </div>
            </div>
            </a>
        </div>

        @endforeach
        <!-- <div class="artwork-container ">
            <img src=" storage/images/xd.jpeg" alt="" class="overlay">
            <div class="author-wrapper">
                <div class="title-wrapper">
                    <p>Title</p>
                </div>
                <div class="author-detail">
                    <span><img src="storage/images/xd.jpeg" alt="" > </span>
                    <span>Name</span>
                </div>
            </div>
        </div>
        <div class="artwork-container  ">
            <img src=" storage/images/xd.jpeg" alt="">
        </div>
        <div class="artwork-container  ">
            <img src=" storage/images/xd.jpeg" alt="">
        </div>
        <div class="artwork-container  ">
            <img src=" storage/images/xd.jpeg" alt="">
        </div>
        <div class="artwork-container  ">
            <img src=" storage/images/xd.jpeg" alt="">
        </div> -->

</section>
@if(auth::check())
<section class="modal-wrapper create">

    <div class="main-modal create">
        <div class="modal-content create">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Your Artwork</h5>
                <a href="#" class="close">
                <span aria-hidden="true">&times;</span>
                </a>
                
            
            </div>
            {!! Form::open(['action' => 'ArtworkController@store', 'method' => 'POST','enctype' =>'multipart/form-data','id' => 'Forms']) !!}
            <div class="modal-body">
    
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-1">
                        <h6 class="mb-0">Title:</h6>
                        </div>
                        <div class="col-sm-11 text-secondary">
                        {{Form::text('title','',['class' => 'form-control name', 'placeholder' => 'Name'])}}
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mt-5">
                        <div class="col-sm-2">
                        <h6 class="mb-0">Artwork:</h6>
                        </div>
                        <div class="col-sm-10 text-secondary">
                        {{Form::file('image',['id' => 'animal_image','class' => 'form-control'])}}
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
            
            
                {{Form::submit('Save',['class' => 'btn btn-save']) }}
            </div>
            </div>
            {!! Form::close() !!}
    </div> 
</section>
@endif

@endsection