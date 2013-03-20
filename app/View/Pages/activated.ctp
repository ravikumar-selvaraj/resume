
<div id="main-body">
       <div id="content">
        <div id="inner-content">
<div class="about_para1" style="border-radius:10px; border:1px solid #d6d6d6; padding:20px; text-align:justify">
		<h2><?php echo __("Validation Error"); ?> </h2>
		<p><?php
		
		echo __("Your email (").$user['User']['email'].__(") is already Activated, you can log in");
		//echo $this->Html->link('there',array(''),array('data-target'=>'#login')); 
		?>
		
	  <button type="button" data-toggle="modal" data-target="#login" class="btn secondary_btn " ><?php echo __("Here");?></button></p>
        
    </div>        
</div>
</div>
</div>	

<style>
#main-body {
	padding:0px;
	margin: 0px;
	overflow:hidden;
	margin-bottom:20px;
	margin-top:20px;
}
#content {
	padding:0px;
	margin: 0px;
}
#inner-content {
	width:1000px;
	padding:0px;
	margin:0px auto;
}
</style>