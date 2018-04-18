<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->display('inc_skin.php',0,'首页'); ?>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <?php $this->display('inc_header.php'); ?>
	<div class="main">
		<div class="advert-banner">
			
		</div>
	</div>
    <?php $this->display('inc_footer.php'); ?> 
    <div class="pagebottom"></div>
    <?php $this->display('inc_chat.php'); ?>
</body>
</html>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		console.info("hello1");
	})
</script>