<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?for($i=0; $i<count($main_banner); $i++) : $class=''; $current='';?>
        <?if ($i==0) :
          $class='active'; $current='true';
          endif;?>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?=$i?>" class="<?=$class?>" <??> aria-current="<?=$current?>"></button>
      <?endfor;?>
    </div>
    <div class="carousel-inner">
    <?for($i=0; $i<count($main_banner); $i++) : $class=''; $active='';
        if ($i==0) :
          $class='text-start';
          $active='active';
        elseif($i == count($main_banner)-1) :
          $class='text-end';
        endif;?>

        <div class="carousel-item <?=$active?>" style="background-image : url('<?=$main_banner[$i]->mb_image?>')">
          <div class="container">
            <div class="carousel-caption <?=$class?>">
              <h1 class="slideTitle"><?=$main_banner[$i]->mb_title?></h1>
              <p class="slideContent"><?=$main_banner[$i]->mb_content?></p>
            </div>
          </div>
        </div>
      <?endfor;?>
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