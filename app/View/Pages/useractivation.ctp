<div class="span3 pull-right ">


<!-- Login -->
<!--  <div id="login" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">-->
	<div class="modal-backdrop fade in"></div>
	<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">

    <form class="form-inline" name="update" action="<?php echo BASE_URL;?>/pages/useractivation/<?php echo $this->params['pass'][0]?>" method="post">
    <input type="hidden" name="test_url" value="0" id="test_url">
    <div class="modal-header">
    <h2 id="myModalLabel"><?php echo __("First, the basics.");?></h2>
    </div>
    <div class="modal-body">  
    <div class="control-group" id="whoru">
    <label class="control-label" for="inputInfo"><?php echo __("Who are you?");?></label>
    <div class="controls">
    <select name="data[gender]" id="user_gender">
    <option value="Mr."><?php echo __("Mr.");?></option>
    <option value="Miss."><?php echo __("Miss.");?></option>
    <option value="Mrs."><?php echo __("Mrs.");?></option>
    </select>
    <input type="text" placeholder="First Name" id="user_first_name" name="data[firstname]">
    <input type="text" placeholder="Last Name" id="user_last_name" name="data[lastname]">
    <span class="help-inline" id="whoru_error"></span>
    </div>
    </div>
    <div class="control-group" id="cvomg_url">
    <label class="control-label" for="inputInfo"><?php echo __("Select your CVOMG url");?></label>
    <div class="controls">
    <?php echo BASE_URL;?> <input type="text" placeholder="Username" id="user_username" name="data[username]">
    <span class="help-inline" id="cvomg_url_error"></span>
    </div>
    </div>
    <div class="control-group" id="resume_title">
    <label class="control-label" for="inputPassword"><?php echo __("Resume Title (or current position)");?></label>
    <div class="controls">
    <input type="text" placeholder="Ex: Sales Director" id="user_resume_title" name="data[resume_title]">
    
    </div><span class="help-inline" id="resume_title_error"></span>
    </div>
    
    <div class="control-group" id="status">
    <label class="control-label" for="inputPassword"><?php echo __("Proffessional status");?></label>
    <div class="controls">
    <select name="data[professional]" id="user_status">
    <option value="Employed"><?php echo __("Employed");?></option>
    <option value="Unemployed"><?php echo __("Unemployed");?></option>
    <option value="Student"><?php echo __("Student");?></option>
    </select>
    
    </div><span class="help-inline" id="status_error"></span>
    </div>
    
    <div class="control-group" id="availability">
    <label class="control-label" for="inputPassword"><?php echo __("Availablity");?></label>
    <div class="controls">
        <select name="data[professional_status]" id="user_prof_status">
        <option value="Available"><?php echo __("Available");?></option>
        <option value="Looking for an internship"><?php echo __("Looking for an internship");?></option>
        <option value="Just looking around"><?php echo __("Just looking around");?></option>
        <option value="Open to opportunities"><?php echo __("Open to opportunities");?></option>
        <option value="Unavailable"><?php echo __("Unavailable");?></option>
    </select>
    
    

    
    
    </div><span class="help-inline" id="availability_error"></span>
    </div>
    
    </div>
    
    <div class="modal-footer" >   
    <label class="checkbox" style="display:block;padding-bottom:5px;">
    <input type="checkbox" id="terms"> I have read and I accept the <a href="">Terms of Service</a> and the <a href="">Privacy Policy</a>
    <span class="help-inline" id="terms_error"></span>
    </label>
    
    <label class="checkbox" style="display:block;">
    <input type="checkbox" name="data[newsletter]"> <?php echo __("I'd like to subscribe to CVomg newsletter");?>
    </label>
    <button type="submit" id="useractive_btn" class="btn btn-primary "><?php echo __("Go to my resume");?></button>
    
    </div>
    
    </form>
</div>
</div>
