
<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">

                                       <div class="modal-header" id="sign1">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><? echo __("Sign in to your account");?></h2>
                            </div>

                            <div class="modal-body"  id="sign">
                                    <form class="form-horizontal" name="login" id="login_form" action="<?php echo BASE_URL;?>pages/signin" method="post">
									<input type="hidden" value="0" name="login_test" id="login_test">
                                    <div class="control-group" id="log_in_email">
                                        <label class="control-label" for="inputInfo"><?php echo __("Email");?></label>
                                        <div class="controls">
                                            <input type="text" id="login_email" placeholder="Email" name="data[email]">
											<span class="help-inline" id="login_email_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" id="log_in_pwd">
                                        <label class="control-label" for="inputPassword"><?php echo __("Password");?></label>
                                        <div class="controls">
                                            <input type="password" id="login_password" placeholder="Password" name="data[password]">
											<span class="help-inline" id="login_pwd_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary" id="login_btn"><?php echo __("Sign in");?></button>
											<a id="forget" onload="showpass(id)" style="cursor:pointer;"><?php echo __("Forgot password?");?></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Forget Password-->
                           
                            
                            
                        </div>




                        
<script type="text/javascript">

 $(document).on('load.modal.data-api', '[data-toggle="modal"]', function (e) {
    var $this = $(this)
      , href = $this.attr('href')
      , $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) //strip for ie7
      , option = $target.data('modal') ? 'toggle' : $.extend({ remote:!/#/.test(href) && href }, $target.data(), $this.data())

    e.preventDefault()

    $target
      .modal(option)
      .one('hide', function () {
        $this.focus()
      })
	 })

</script>          