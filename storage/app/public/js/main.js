
$(document).ready(function() {

  $('#upload_image').click(function(e){
    e.preventDefault();
    $('#profile_image').trigger('click');
  });
 
  $('.artwork').on('click', function (e) {
      e.preventDefault();
    //   console.log('click');
    $('.modal-content.create').addClass('show');
    $('.main-modal.create').addClass('show');
  })
  $('.close').click(function(e){
      e.preventDefault();
    //   $('.modal-content').removeClass('show');
      $('.main-modal').removeClass('show');
  });

  $('#btn-comment').click(function(e){
    e.preventDefault();
    console.log('test');
    $('.comment-data-container').slideToggle(500);
  });

  $('#edit-artwork').on('click', function (e) {
    e.preventDefault();
  //   console.log('click');
  $('.modal-content.artwork').addClass('show');
  $('.main-modal.artwork').addClass('show');
})
$('.comments-data').on('click','#edit-comment',function(e){
  e.preventDefault();
  var comment = $(this).data('comment');
  var id = $(this).data('id');
  var artwork_id = $(this).data('artwork');
  
  // alert(comment);
  $('#comment').val(comment);
  $('.modal-content.comment').addClass('show');
  $('.main-modal.comment').addClass('show');

  $('#updateComment').on('click',function(e){
    e.preventDefault();
    var data_comment = $('#comment').val();
   
    $.ajax({
      method: "PUT",
      data:{
      
        comment:data_comment
      },
      url: "/updateComment/"+id,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: 'json',
      success: function (response) {

        toastr.success('Comment updated successfully');
        window.location.replace('http://127.0.0.1:8000/artwork/'+artwork_id);
        
        },
      error: function(error){
      
          console.log(error);
      }
    });
  })
 
})
$('.comments-data').on('click','#delete-comment',function(e){
  e.preventDefault();
  var comment = $(this).data('comment');
  var id = $(this).data('id');
  var artwork_id = $(this).data('artwork');
  
  // alert(comment);
  
  

 
    $.ajax({
      method: "Delete",
     
      url: "/deleteComment/"+id,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: 'json',
      success: function (response) {

        toastr.error('Comment updated successfully');
        window.location.replace('http://127.0.0.1:8000/artwork/'+artwork_id);
        
        },
      error: function(error){
      
          console.log(error);
      }
    });
 
 
})
// $('#edit-comment').on('click', function (e) {
//   e.preventDefault();
// //   console.log('click');
// $('.modal-content.comment').addClass('show');
// $('.main-modal.comment').addClass('show');
// })
$('.search_icon').on('click',function(e){
  e.preventDefault();
 
  var search = $('.search_input').val();
  $.ajax({

    type: "GET",
    url: "/search/"+search,
    dataType: 'json',
    success: function (response) {
      console.log(response);
      
      window.location.replace("http://127.0.0.1:8000/search_filter/"+search);
      
      },
    error: function(error){
    
        console.log(error);
    }
  });
  
  
 
  
})




   
 
 
 });
 