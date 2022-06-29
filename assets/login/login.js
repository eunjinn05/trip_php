function join () {
  var passwordFlag = true;
  var passwordckFlag = true;
  var reqFlag = true;

  $(document).on("click", ".joinButton", function (e) {
    $(".req").each(function(idx, elem) {
      if (!$(elem).val()) {
        $(elem).next().show();
        reqFlag = false;
      } else {
        $(elem).next().hide();
      }
    });

    if (reqFlag && passwordFlag && passwordckFlag) {
      $('form').submit();
    }

  });

  $(document).on("keyup", "#mem_id", function (e) {
    var mem_id = $(this).val();
    var $this = $(this);

    $.ajax({
      type: "POST",
      async: false,
      url: "/login/member_id_check/",
      data : {mem_id : mem_id},
      success: function (data, textStatus, jqXH) {
        var obj = $.parseJSON(data);
        if (obj.result == true) {
          $this.next().show();
        } else {
          $this.next().hide();
        }
      }
    });
  });

  $(document).on("keyup", "#password", function (e) {
    //최소 8 자, 하나 이상의 대문자, 하나의 소문자 및 하나의 숫자
    var reg =  new RegExp(/^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{8,16}$/);
    var password = $(this).val();
    if( !reg.test(password) ) {
      $('.invalid-feedback-password').show();
      passwordFlag = false;
    } else {
      $('.invalid-feedback-password').hide();
      passwordFlag = true;
    }
  });

  $(document).on("keyup", "#password_ck", function (e) {
    var password = $('#password').val();
    var password_check = $('#password_ck').val();
    
    if (password == password_check) {
      $(this).next().hide();
      passwordckFlag = true;
    } else {
      $(this).next().show();
      passwordckFlag = false;
    }
  });

  $(document).on("keyup", "#mem_name", function (e) {
    (!$(this).val()) ? $(this).next().show() : $(this).next().hide();
  });
  
  $(document).on("change", ".mem_phone", function (e) {
    var Flag = true;
    $(".mem_phone").each(function(idx, elem) {
      if (!$(elem).val()) {
        Flag = false;
        return false;
      }
      if ($(elem).hasClass('number') && ($(elem).val().length != 4)) {
        Flag = false;
      }
    });

    (!Flag) ? $('.mem_phone').next().show() : $('.mem_phone').next().hide();
  });

  $(document).on("change", ".mem_email", function (e) {
    console.log('ee');
    var Flag = true;
    $(".mem_email").each(function(idx, elem) {
      if (!$(elem).val()) {
        Flag = false;
        return false;
      }
    });
    (!Flag) ? $('.mem_email').next().show() : $('.mem_email').next().hide();

  });
  


  $(document).on("keydown", ".mem_phone", function (e) {
    if ((e.key >= 0 && e.key <= 9) || e.key == "Backspace") {
      return true;
    } else {
      return false;
    }
  });

}