<div class="m-auto form-signin w-100 text-center">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">로그인</h1>
    <div class="form-floating">
      <input type="text" class="form-control req" name="mem_id" id="floatingInput">
      <label for="floatingInput">아이디</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control req" name="mem_password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">비밀번호</label>
    </div>
    <div class="checkbox mb-3">
      <label><input type="checkbox" value="remember-me"> 자동 로그인하기</label>
    </div>

    <div class="mb-3">
      <button type="button" id="kakao">카카오</button>
    </div>
    <div class="mb-3">
      <p><a href="/login/join">회원가입</a> / <a>아이디 찾기</a>/ <a>비밀번호 찾기</a></p>
    </div>
    <button class="w-100 btn btn-lg btn-primary loginButton" data-action="/login/normal_login" type="button">로그인</button>
  </form>
</div>