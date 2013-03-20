<div class="row-fluid">
    <div class="dialog">
	<?php 
			if($this->Session->read('Message.flash.message')) { ?>
	 		
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong><?php echo $this->Session->read('Message.flash.message');?> </strong>
		</div>
     <?php } ?>
        <div class="block">
            <p class="block-heading">Admin Secure Login</p>
            <div class="block-body">
                <form action="" name="login" id="login" method="post">
                    <label>Username</label>
                    <input type="text" name="data[username]" id="username" class="validate[required] span12">
                    <label>Password</label>
                    <input type="password" name="data[password]" id="password" class="validate[required] span12" >
					<button class="btn btn-primary pull-right">Login</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <p><a href="<?php echo BASE_URL;?>adminpanel/forgetpassword">Forgot your password?</a></p>
    </div>
</div>