<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CVomg _ Beautifully Simple Online Resume Builder _ Maker _ Generator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

      <?php	
		echo $this->html->css(array('dragdrop/compassCV','dragdrop/compassCVEdit')); 
		 
?>
	<?php 
	$template=ClassRegistry::init('User')->find(array('username'=>$this->Session->read('User.username'))); 
	
	
	
	
	?>
    
    
    </head>
    <body >
		
		
 	
<?php echo $this->fetch('content'); ?>
    


 <?php	echo $this->html->script(array('page/vendor/jquery-1.9.1.min','dragdrop/common','dragdrop/home_portlet'));?> 

	
	 </body>
</html>
