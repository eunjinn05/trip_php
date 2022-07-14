<div class="container">
  <main>
    <div class="g-5 py-5">
        <form class="needs-validation form" novalidate="">
          <div class="row g-3">

            <div class="col-md-6">
              <label for="country" class="form-label">대륙</label>
              <select class="form-select" name="" id="continent" required="">
                <option value="">선택하세요</option>
                <?foreach ($bcat as $row) :?>
                  <option value="<?=$row->bcat_idx?>"><?=$row->bcat_title?></option>
                <?endforeach;?>
              </select>
              <div class="invalid-feedback">대륙을 선택하세요</div>
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label">나라</label>
              <select class="form-select" name="br_bcat_idx" id="country" required="">
                <option value="">선택하세요</option>
              </select>
              <div class="invalid-feedback">나라를 선택하세요</div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">제목</label>
              <input type="text" class="form-control" name="br_title" id="address" required="">
              <div class="invalid-feedback"> 제목을 입력해주세요.</div>
            </div>

            <div class="col-12">
              <label for="content" class="form-label">내용 </label>
              <textarea class="form-control ckeditor" id="content" required="" rows="8"></textarea>
              <div class="invalid-feedback">내용을 입력해주세요</div>
              <textarea class="hide" name="br_content"></textarea>
            </div>

            <input type="file" id="file" class="form-control col-md-7 col-xs-12">
            <input type="hidden" name="br_main_img">
            <input type="hidden" name="br_regdate">
          </div>

          <hr class="my-4">

          <button id="writeBtn" class="w-100 btn btn-primary btn-lg" data-method="post" data-action="/board/review_insert" type="button">Continue to checkout</button>
        </form>
    </div>
  </main>
</div>

<script src="https://getbootstrap.com/docs/5.2/examples/checkout/form-validation.js"></script>