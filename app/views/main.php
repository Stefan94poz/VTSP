<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php   setExamCookie(); ?>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<base href="http:/vtsp/"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http:/vtsp/public/css/styles.css">

		<!-- Google fonts -->
		<link href="https:/fonts.googleapis.com/css?family=Arsenal|Lato" rel="stylesheet">
		<link href="https:/fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

		<!-- OwlCarousel-2 -->
		<link rel="stylesheet"  href="http:/vtsp/public/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="http:/vtsp/public/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">

    <script src="http:/vtsp/public/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script src="./public/OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>

		<!-- jquery -->
		<script
			src="https:/ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
		</script>

		<!-- No Conflict script -->
		<script>
    	var j = jQuery.noConflict(true);
    </script>
		<!-- Custom Jquery scripts -->
		<script src="http:/vtsp/public/js/owl-carousel.js"> </script>
		<script src="http:/vtsp/public/js/mobile-dropdown.js"> </script>
		<script src="http:/vtsp/public/js/tabs.js"> </script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https:/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https:/maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https:/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
			<script src="https:/oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<title>ВТШСС</title>
	</head>
	<body>
<?php require('./app/views/templates/header.php'); ?>
<?php require($view); ?>
<?php require('./app/views/templates/footer.php'); ?>
	</body>
</html>
