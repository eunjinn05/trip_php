<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container marketing">
    <div class="row">
      <?foreach ($main_category1 as $key => $val) :?>
      <div class="col-lg-4">
        <img src="<?=$val->bcat_img?>" class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2 class="fw-normal bcat_title"><?=$val->bcat_title?></h2>
        <p class="comment"><?=$val->bcat_comment?></p>
      </div>
      <?endforeach;?>
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <?foreach ($main_category2 as $key => $val) : $mdclass=''; $mdclass_='';?>
      <?if ($key%2!=1) : $mdclass = 'order-md-1'; $mdclass_ = 'order-md-2'; endif;?>
      <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-7 <?=$mdclass_?>">
          <h2 class="featurette-heading fw-normal lh-1"><?=$val->bcat_title?></h2>
          <p class="lead"><?=$val->bcat_comment?></p>
        </div>
        <div class="col-md-5 <?=$mdclass?>">
          <img src="<?=$val->bcat_img?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
        </div>
      </div>
    <?endforeach;?>
    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div>