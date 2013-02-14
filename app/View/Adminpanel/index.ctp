<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Sign In</p>
            <div class="block-body">
                <form action="" name="login" id="login" method="post">
                    <label>Username</label>
                    <input type="text" name="data[username]" id="username" class="validate[required] span12">
                    <label>Password</label>
                    <input type="password" name="data[password]" id="password" class="validate[required] span12" >
					<button class="btn btn-primary pull-right">Sign In</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <p><a href="<?php echo BASE_URL;?>adminpanel/forgetpassword">Forgot your password?</a></p>
    </div>
</div>