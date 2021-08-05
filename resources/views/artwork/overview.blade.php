@extends('layouts.main')

@section('content')
<header class="masthead  ">
    <div class="masthead-wrapper d-flex justify-content-between align-items-center">
    <div class="home-wrapper">
        <h3>Home</h3>
    </div>
    <div class="artwork-wrapper ">
        <ul class="navigation d-flex justify-content-around align-items-center">
            <li ><a href="/">
                ARTWORKS
            </a></li>
            <li class="active"><a href="#" class="artwork">
                POSTS
            </a></li>
        </ul>
    </div>
    <div class="right-navigation"></div>
    </div>
    
</header>
<div class="overview container dflex">
        <section class="artwork-overview">
                <div class="image-wrapper">
                    <img src="{{asset('storage/images/'.$artwork->artwork_image)}}" alt="">
                </div>
               
        </section>
        <section class="artwork-thumbnails">
                <div class="more-artwork">
                <a href="/">See More</a>
                </div>
                <div class="thumbnails-images">
                        @foreach($artwork_datas as $data)
                        
                        <div class="thumbnail-wrapper">
                        <a href="/artwork/{{$data->id}}">
                        <img src="{{asset('storage/images/'.$data->artwork_image)}}" alt="">
                        </a>
                        </div>
                      
                        @endforeach
                        
                </div>
        </section>
</div>
<section class="social container mt-3">
    <div class="social-wrapper">
        <div class="like-wrapper ">
            {!! Form::open(['action' => 'LikeController@store', 'method' => 'POST','id' => 'Forms','class' => 'like-forms']) !!}

                <input type="hidden" value="{{$artwork->id}}" name="artwork">
                <span class="btn-wrapper">
              
                    <button type="submit" class="btn-like"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                </svg>Like</button>
              
            </span>
            {!! Form::close() !!}
                        <a hef="#" class="btn btn-secondary" id="btn-comment"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            </svg>Comments</a>
            @if($artwork->user_id != Auth::user()->id)
                
            @else
            <a href="#" class="btn btn-secondary" id="edit-artwork" >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
            </svg>
            Edit
            </a>
            @endif
        </div>
        <div class="comment-data-container">
            <div class="comments-data-wrapper d-flex align-items-center ">
                    <div class="profile-image">
                        <img src="{{asset('storage/images/logo.png')}}" alt="" >
                    </div>
                    <div class="comment-description">
                    {!! Form::open(['action' => 'CommentController@store', 'method' => 'POST','id' => 'Forms']) !!}
                        {{Form::textarea('comments','',['class' => 'form-control', 'id' =>'comments', 'placeholder' => 'Enter your comments here','cols'=>'10'])}}
                        <input type="hidden" value="{{$artwork->id}}" name="artwork">
                        <div class="btn-wrapper">
                        {{Form::submit('Save',['class' => 'btn btn-save']) }}
                        </div>
                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
       
        <div class="overview-author mt-4 d-flex align-items-center">
            <div class="author-image">
                
            <span><img src="{{asset('storage/images/'.$artwork->user->avatar_original)}}" alt=""></span>
            </div>
            <div class="author-info">
            <span>{{$artwork->title}} </span>
           
            <div class="author-name">
            <p>
            by <a href="/profile/{{$artwork->user->id}}" class="name">{{$artwork->user->name}}</a>
            </p>
            <p>Published: {{$artwork->created_at}}</p>
            <p>© 2021 {{$artwork->user->name}}</p>
            </div>
           
          
            </div>
           
            
        </div>
        <div class="comments-wrapper mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
            </svg> <span>
            {{$number_of_likes}} Likes
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            </svg><span>{{$number_of_comments}} Comments </span>
        </div>
        <div class="comments-data mt-4">
            <div class="comments-container">
                    <h6>COMMENTS</h6>
            </div>
            @foreach($comments as $comment)
          
            <div class="comments-data-wrapper d-flex align-items-center">
           
                <div class="profile-image">
                    @if($comment->avatar_original == null)
                    <img src="{{$comment->user->avatar}}" alt="" >
                    @else
                    <img src="{{asset('storage/images/'.$comment->user->avatar_original)}}" alt="" >
                    @endif
                </div>
                <div class="comment-description">
                    <div class="username">
                        <span>{{$comment->user->name}}</span>
                        <span>Created At: {{$comment->created_at}}</span>
                    </div>
                    <div class="desc">
                        <span>{{$comment->Comments}}</span>
                    </div>
                   
                </div>
               
            </div>
            @if(auth::user()->id == $comment->user_id)
            <div class="edit-comment pb-3">
            <a href="#" class="btn btn-secondary" id="edit-comment" data-id="{{$comment->id}}" data-comment="{{$comment->Comments}}" data-artwork="{{$comment->artwork_id}}" data-user_id="{{$comment->user_id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class='edit' width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                        </svg>
                        Edit
                    </a>
                    <a href="#" class="btn btn-secondary" id="delete-comment" data-id="{{$comment->id}}" data-comment="{{$comment->Comments}}" data-artwork="{{$comment->artwork_id}}" data-user_id="{{$comment->user_id}}">
            <svg xmlns="http://www.w3.org/2000/svg" class='delete' width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
                        Delete
                    </a>
                </div>
            @else
            @endif
          
           
            @endforeach
            

        </div>
       
           
      
    </div>
</section>
<section class="modal-wrapper artwork">

    <div class="main-modal artwork">
        <div class="modal-content artwork">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Your Artwork</h5>
                <a href="#" class="close">
                <span aria-hidden="true">&times;</span>
                </a>
                
            
            </div>
            {!! Form::open(['action' => ['ArtworkController@update',$artwork->id], 'method' => 'POST','enctype' =>'multipart/form-data','id' => 'Forms']) !!}
            <div class="modal-body">
    
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-1">
                        <h6 class="mb-0">Title:</h6>
                        </div>
                        <div class="col-sm-11 text-secondary">
                        {{Form::text('title',$artwork->title,['class' => 'form-control name', 'placeholder' => 'Name'])}}
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mt-5">
                        <div class="col-sm-2">
                        <h6 class="mb-0">Artwork:</h6>
                        </div>
                        <div class="col-sm-10 text-secondary">
                        {{Form::file('image',['id' => 'artwork-image','class' => 'form-control'])}}
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
            
                 {{Form::hidden('_method','PUT') }}
                {{Form::submit('Save',['class' => 'btn btn-save']) }}
            </div>
            </div>
            {!! Form::close() !!}
    </div> 
</section>

<section class="modal-wrapper comment">

    <div class=" main-modal comment">
        <div class="modal-content comment">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Your Comment</h5>
                <a href="#" class="close">
                <span aria-hidden="true">&times;</span>
                </a>
                
            
            </div>

            <div class="modal-body">
    
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-1">
                        <h6 class="mb-0">Title:</h6>
                        </div>
                        <div class="col-sm-11 text-secondary comments">
                            <textarea name="comments"  cols="10" rows="3" id="comment"></textarea>
                        </div>
                    </div>
                   
            </div>
            <div class="modal-footer">
            
               <button type="submit" class="btn btn-save" id="updateComment">Save</button>
            </div>
            </div>
          
    </div> 
</section>


@endsection