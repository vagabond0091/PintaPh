@extends('layouts.main')

@section('content')
<header class="masthead  ">
    <div class="masthead-wrapper d-flex justify-content-between align-items-center">
    <div class="home-wrapper">
        <h3>You search artwork title with the word: {{$title}}</h3>
    </div>
    
    
</header>
<section class="artwork-wrapper d-flex padding mt-3 ">
        @foreach($searches as $search)
        <div class="artwork-container ">
        <a href="/artwork/{{$search->id}}">
            <div class="image-container">
                <img src=" {{asset('storage/images/'.$search->artwork_image)}}" alt="" class="overlay">
            </div>
           
            <div class="author-wrapper">
                <div class="title-wrapper">
                    <p>{{$search->title}}</p>
                </div>
                <div class="author-detail">
                    <span><img src="{{asset('storage/images/'.$search->user->avatar_original)}}" alt="" > </span>
                    <span>{{$search->user->name}}</span>
                </div>
            </div>
            </a>
        </div>

        @endforeach


</section>


@endsection