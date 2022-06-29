<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trip</title>
		<!--  기본 css	-->	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/reset.css" rel="stylesheet">
		<link href="/assets/default.css" rel="stylesheet">

		<!--  기본 js	-->	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
		<script src="/assets/common.js"></script>

		<!-- 추가 css -->
		<? if (@is_file(ASSETSPATH."/".$fetch_class."/".$fetch_method.".css")): ?>
			<link href="/<?=ASSETSPATH."/".$fetch_class.'/'.$fetch_method?>.css" rel="stylesheet">
		<?endif;?>

	</head>
  <body>
		<header>
			<div class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<div class="container-fluid">
				<a class="navbar-brand" href="/">TRIP</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled">Disabled</a>
					</li>
					</ul>
					<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</div>
				</div>
			</div>
		</header>

		<div class="defaultdiv">
			<? include $fetch_views;?>

			<? if (@is_file(VIEWPATH."/footer.php")) :
				include VIEWPATH."/footer.php";
			endif; ?>
		</div>
	<!-- 추가 js -->
	<? if (@is_file(ASSETSPATH."/".$fetch_class."/".$fetch_class.".js")): ?>
		<script src="/<?=ASSETSPATH."/".$fetch_class.'/'.$fetch_class?>.js"></script>
	
		<script>
			if (typeof(window["<?=$fetch_method?>"]) == "function"){
				window["<?=$fetch_method?>"]();
			}
		</script>
			
	<?endif;?>

</body>
</html>
