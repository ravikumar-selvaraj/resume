<div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Reset your password</p>
            <div class="block-body">
                <form name="forget" id="forgetpassword" method="post" action="">
                    <label>Email Address</label>
                    <input type="text" id="email" name="email" class="validate[required,custom[email]] span12"></input>
                    <button class="btn btn-primary pull-right">Send </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <a href="<?php echo BASE_URL;?>adminpanel">Sign in to your account</a>
    </div>
</div>