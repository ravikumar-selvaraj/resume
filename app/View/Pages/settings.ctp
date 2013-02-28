

        <!-- Body Content -->
        <div class="row app-header">
            <div class="container ">
                <h1>Settings</h1>
            </div>
        </div>

 
        <div class="container">
            <div class="row dashboard">
                <section class="left-col pull-left span9">
                    
                    <!-- Personal Information -->
                    <div class="box-container row clearfix">
                        <h2>Personal Information</h2> 
						
						<form class="form-horizontal">
						  <div class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
							  <input type="text" class="input-xlarge" id="inputEmail">
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label" for="inputPassword">First Name</label>
							<div class="controls">
							  <input type="text" class="input-xlarge" id="inputPassword" >
							</div>
						  </div>
						  
						  <div class="control-group">
							<label class="control-label" for="inputPassword">Last Name</label>
							<div class="controls">
							  <input type="text" class="input-xlarge" id="inputPassword" >
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label" for="inputPassword">Last Name</label>
							<div class="controls">
						  <select name="data[gender]" id="user_gender">
							<option value="Mr."><?php echo __("Mr.");?></option>
							<option value="Miss."><?php echo __("Miss.");?></option>
							<option value="Mrs."><?php echo __("Mrs.");?></option>
						</select>
						 </div>
						  </div>
						</form> 
						                      
                        
                    </div>

                    <!-- Change Password-->
                     <div class="box-container row clearfix">
                        <h2>Change Password</h2>
                     </div>

                    
                </section>

                 <section class="right-col span3">
                    <div class="newsletter right-box">
                        <h2>Stay informed</h2>
                      <form action="" name="campaign" id="mycampaign" method="post" enctype="multipart/form-data">
                          <fieldset>
                            <strong>I want to receive the: </strong>
                            <label class="checkbox">
                              <input type="checkbox" <?php if($user['User']['career_newsletter']==1) echo 'checked="checked"' ;?> name="data[career_newsletter]"> Career Guide newsletter
                            </label>

                            <label class="checkbox">
                              <input type="checkbox" <?php if($user['User']['newsletter']==1) echo 'checked="checked"' ;?> name="data[newsletter]"> CVOMG newsletter 
                            </label>
                            <button type="submit" class="btn" name="save">Save</button>
                          </fieldset>
                        </form>
                       <!-- <a href="">Edit my subscription</a>-->
                    </div>
                </section>
            </div>
        </div>

      
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
   
