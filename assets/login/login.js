function join () {
  var passwordFlag = false;
  var passwordckFlag = false;
  var reqFlag = true;
  var idFlag = false;

  $(document).on("click", ".joinButton", function (e) {
    e.preventDefault();
    var $self = $(this);
    var $form = $('form');
  
    $(".req").each(function(idx, elem) {
      if (!$(elem).val()) {
        $(elem).next().show();
        reqFlag = false;
        return false;
      } else {
        $(elem).next().hide();
        reqFlag = true;
      }
    });

    console.log(reqFlag);
    console.log(passwordFlag);
    console.log(passwordckFlag);
    console.log(idFlag);
    if (reqFlag && passwordFlag && passwordckFlag && idFlag) {
      if ($self.data("action")) {
        $form.prop("action", $self.data("action"));
      }
      $form.submit();
    }

  });

  $(document).on("keyup", "#mem_id", function (e) {
    var mem_id = $(this).val();
    var $this = $(this);
    
    if (!$this.val()) {
      $this.next().text('아이디를 입력해주세요.');
      $this.next().show();
      return false;
    }

    $.ajax({
      type: "POST",
      async: false,
      url: "/login/member_id_check/",
      data : {mem_id : mem_id},
      success: function (data, textStatus, jqXH) {
        var obj = $.parseJSON(data);
        if (obj.result == true) {
          $this.next().text('중복된 아이디가 있습니다.');
          $this.next().show();
          idFlag = false;
        } else {
          $this.next().hide();
          idFlag = true;
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
    var phone_text = '';
    $(".mem_phone").each(function(idx, elem) {
      if (!$(elem).val()) {
        Flag = false;
        return false;
      }
      if ($(elem).hasClass('number') && ($(elem).val().length != 4)) {
        Flag = false;
      }
      (phone_text != '') ? phone_text += '-' : '';
      phone_text += $(elem).val();
    });

    (!Flag) ? $('.mem_phone').next().show() : $('.mem_phone').next().hide();
    $('[name="mem_phone"]').val(phone_text);
  });

  $(document).on("change", ".mem_email", function (e) {
    var Flag = true;
    var email_text = '';
    $(".mem_email").each(function(idx, elem) {
      if (!$(elem).val()) {
        Flag = false;
        return false;
      }
      email_text += $(elem).val();

    });
    (!Flag) ? $('.mem_email').next().show() : $('.mem_email').next().hide();
    $('[name="mem_email"]').val(email_text);

  });
  


  $(document).on("keydown", ".mem_phone", function (e) {
    if ((e.key >= 0 && e.key <= 9) || e.key == "Backspace") {
      return true;
    } else {
      return false;
    }
  });

}