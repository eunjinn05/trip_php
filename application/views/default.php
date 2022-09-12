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
		<script src="/assets/ckeditor/ckeditor.js"></script>
		<script src="/assets/common.js"></script>

		<!-- 추가 css -->
		<? if (@is_file(ASSETSPATH."/".$fetch_class."/".$fetch_method.".css")): ?>
			<link href="/<?=ASSETSPATH."/".$fetch_class.'/'.$fetch_method?>.css" rel="stylesheet">
		<?endif;?>

	</head>
  <body>
		<? if (@is_file(VIEWPATH."/header.php")) :
				include VIEWPATH."/header.php";
			endif; ?>
	
		<div class="defaultdiv">
			<? include $fetch_views;?>

		<? if (@is_file(VIEWPATH."/popup.php")) :
				include VIEWPATH."/popup.php";
			endif; ?>

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
		<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>

	<?endif;?>

</body>
</html>
