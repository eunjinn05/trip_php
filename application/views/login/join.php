<div class=" m-auto joindiv">
  <div class="g-5 py-5">
    <p class="jointitle">회원가입</p>
    <form class="needs-validation" novalidate="">
      <div class="row g-3 ">
        <div class="col-12">
          <label for="mem_id" class="form-label">아이디</label>
          <input type="text" class="form-control req" id="mem_id" name="mem_id">
          <div class="invalid-feedback"> 아이디를 입력해주세요.</div>
        </div>

        <div class="col-12">
          <label for="password" class="form-label">비밀번호</label>
          <input type="password" class="form-control req" id="password" name="mem_pass">
          <div class="invalid-feedback-password invalid-feedback">최소 8 자, 하나 이상의 대문자, 하나의 소문자 및 하나의 숫자를 포함해야합니다.</div>
        </div>

        <div class="col-12">
          <label for="password_ck" class="form-label">비밀번호 확인</label>
          <input type="password" class="form-control req" id="password_ck">
          <div class="invalid-feedback"> 비밀번호 확인을 정확히 입력해주세요.</div>
        </div>

        <div class="col-12">
          <label for="mem_name" class="form-label">이름</label>
          <input type="text" class="form-control req" id="mem_name" name="mem_name">
          <div class="invalid-feedback"> 이름을 입력해주세요.</div>
        </div>

        <label for="mem_phone" class="form-label">전화번호</label>
        <div class="col-4">
          <select class="form-select mem_phone req">
            <option value="">선택해주세요</option>
            <option value="010">010</option>
            <option value="011">011</option>
          </select>
          <div class="invalid-feedback"> 전화번호를 입력해주세요.</div>
        </div>
        <div class="col-4">
          <input type="text" class="form-control mem_phone number req" maxlength="4">
        </div>
        <div class="col-4">
          <input type="text" class="form-control mem_phone number req" maxlength="4">
        </div>

        <label for="mem_phone" class="form-label">이메일</label>
        <div class="col-6">
          <input type="text" class="form-control mem_email req">
          <div class="invalid-feedback"> 이메일을 입력해주세요.</div>
        </div>
        <div class="col-6">
          <select class="form-select mem_email req">
            <option value="">선택해주세요</option>
            <option value="gmail.com">@gmail.com</option>
            <option value="naver.com">@naver.com</option>
          </select>
        </div>
      </div>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg joinButton" type="button">회원가입</button>
    </form>
  </div>
</div>
