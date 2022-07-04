$(document).ready(function(){
  $("[name='editor1']").each(function(idx, elem) {
    CKEDITOR.replace( 'editor1' );
  });
});


function uploadFile(e) {
  var currentTarget = e.currentTarget;

  var fd = new FormData();
  var files = currentTarget.files;
  fd.append('image', files[0]);

  $.ajax({
    type: "POST",
    url: "/file/uploadFile/",
    data : fd,
    contentType : false,
    processData : false,
    success: function (data) {
    }
  });
}
