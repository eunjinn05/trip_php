$(document).ready(function(){
  $(".ckeditor").each(function(idx, elem) {
    CKEDITOR.replace( 'ckeditor' );
  });
    
  $.get("/_common/get_session", $.param({key:"alert_msg"}), function(rcv) {
    if (rcv) {
      rcv = JSON.parse(rcv);
      if (typeof rcv === "string") {
        showAlert(rcv);
      } else {
        var icon = null;
        var msg = null;

        switch (rcv.type) {
          case "confirm" :
            showConfirm(rcv.msg, "", {
              btnTextRight: "확인",
              btnTextLeft: "취소",
              onClickOk: function() {
                window.location.href = "/mypage/board/lists"
              }
            });
            break;
        }
      }
    }
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
      var obj = $.parseJSON(data);
      $(currentTarget).next().val(obj.data[0]);
    }
  });
}

function showAlert(msg, title, options) {
  //##### 변수 설정 #####//
  options     = options || {};
  var msg     = msg ? decodeURIComponent(msg) : "";
  var title   = title || "";
  var btnText = options.btnTxt ? options.btnTxt : "확인";

  //##### 컨텐츠 설정 #####//
  $("#alert_modal").find(".modal-title").html(title);
  $("#alert_modal").find(".modal-body").html(msg);

  $("#alert_modal").modal("show");
  $("#alert_modal .ok_btn").focus();

  $("#alert_modal .ok_btn").text(btnText);

  //##### 콜백 #####//
  $(document).on("hidden.bs.modal", "#alert_modal", function(){
    if (typeof(options.onClose) == "function") {
      setTimeout(function(){
        options.onClose();
      },400);
    }
  });

  $("#alert_modal").off("click", ".ok_btn");
  $("#alert_modal").on("click", ".ok_btn", function() {
    if (typeof(options.onClickOk) == "function") {
      options.onClickOk();
    }
  });
}