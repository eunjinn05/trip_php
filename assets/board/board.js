function review_write () {
  $(document).on("change", "#file", function (e) {
    uploadFile(e);
  });

  $(document).on("change", "#continent", function (e) {
    var idx = $(this).val();
    if (idx == 0) return false;
    $.ajax({
      type: "POST",
      url: "/board/get_category/1/"+idx,
      success: function (data) {
        var obj = $.parseJSON(data);
        var html = '';
        for(var i=0; i < obj.bcat.length; i++) {
          html += '<option value="'+obj.bcat[i].bcat_idx+'">'+obj.bcat[i].bcat_title+'</option>';
        } 
        $('#country').html(html);
      }
    });
  });

  $(document).on("click", "#writeBtn", function (e) {
    var content = CKEDITOR.instances.content.getData();
    $('[name="content"]').val(content);

  });

}