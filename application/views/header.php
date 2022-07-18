<header>
  <div class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">TRIP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">후기</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
        <? if (@$_SESSION['mem_idx']) :?>
         <p><?=$_SESSION['mem_name']?>님 환영합니다!</p>
        <? endif; ?>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mb-2 mb-md-0">
          <li class="nav-item">
            <? if (@$_SESSION['mem_idx']) :?>
              <a class="nav-link" href="#"><?=$_SESSION['mem_name']?></a>
            <? else :?>
              <a class="nav-link" href="/login/login">로그인</a>
            <?endif;?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>