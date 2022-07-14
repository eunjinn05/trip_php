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
          var selected = (i==0) ? 'selected' : '';
          html += '<option '+selected+' value="'+obj.bcat[i].bcat_idx+'">'+obj.bcat[i].bcat_title+'</option>';
        } 
        $('#country').html(html);
      }
    });
  });

  $(document).on("click", "#writeBtn", function (e) {
    var $this = $(this);
    var content = CKEDITOR.instances.content.getData();
    $('[name="br_content"]').val(content);
    
    if ($this.data("action")) {
      $('.form').prop("action", $this.data("action"));
      $('.form').prop("method", $this.data("method"));
    }
    $('.form').submit();
  });

}