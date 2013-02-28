

        <div class="span3 pull-right ">
        
     
        <!-- Login -->
          <!--  <div id="login" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">-->
          <div class="modal-backdrop fade in"></div>
      <div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
           
               <form class="form-inline" name="update" action="<?php echo BASE_URL;?>/pages/test" method="post">
        
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2 id="myModalLabel">First, the basics.</h2>
                                    </div>

                                    
                                      
                                     <div class="modal-body">  
                                            <div class="control-group">
                                                <label class="control-label" for="inputInfo">Who are you?</label>
                                                <div class="controls">
                                                    <select name="data[gender]">
                                                        <option>Mr.</option>
                                                        <option>Miss.</option>
                                                    </select>
                                                    <input type="text" placeholder="First Name" name="data[firstname]">
                                                    <input type="text" placeholder="Last Name" name="data[lastname]">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Resume Title (or current position)</label>
                                                <div class="controls">
                                                     <input type="text" placeholder="Ex: Sales Director" name="data[resume_title]">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                 <label class="control-label" for="inputPassword">Proffessional status</label>
                                                <div class="controls">
                                                     <select name="data[professional]">
                                                        <option>Employed</option>
                                                        <option>Unemployed</option>
                                                        <option>Student</option>
                                                    </select>
                                                </div>
                                           </div>

                                           <div class="control-group">
                                                 <label class="control-label" for="inputPassword">Availablity</label>
                                                <div class="controls">
                                                     <select name="data[professional_status]">
                                                        <option>Available</option>
                                                        <option>Unemployed</option>
                                                        <option>Student</option>
                                                    </select>
                                                </div>
                                           </div>
                                       
                                    </div>

                                    <div class="modal-footer" >   
                                        <label class="checkbox" style="display:block;padding-bottom:5px;">
                                            <input type="checkbox"> I have read and I accept the <a href="">Terms of Service</a> and the <a href="">Privacy Policy</a>
                                        </label>

                                        <label class="checkbox" style="display:block;">
                                            <input type="checkbox" name="data[newsletter]"> I'd like to subscribe to CVomg newsletter
                                        </label>
                                          <button type="submit" id="signup_btn" class="btn btn-primary "><?php echo __("Go to my resume");?></button>
                                     
                                    </div>
                                
            </form>
            </div>
        </div>

<script type="text/javascript">

	
	$("#login_btn1").click(function(){
		alert('hi');
	
	});






</script>
        