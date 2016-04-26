<?php require_once "inc/functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--[if lt IE 9]>
		    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Simex</title>
		<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
		     $(document).ready(function(){
		        $('.dropdown-toggle').dropdown()
		    });
		</script>
    	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
	</head>
	<body>
		<?php require "inc/navigationTop.php"; ?>
		
		<?php require "inc/slider.php"; ?>
		
		<?php require "inc/footer.php"; ?>
	</body>
</html>