$(document).ready(function(){
  $("[name='editor1']").each(function(idx, elem) {
    CKEDITOR.replace( 'editor1' );
  });
});