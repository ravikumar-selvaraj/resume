<?php 
	 $portpre=ClassRegistry::init('Portpresent')->find('first',array('conditions'=>array('key'=>$this->params['pass'][0]))); 
	?>


<div data-backdrop="static" data-keyboard="false" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal  hide fade in" id="update-resume" style="display:block ;">
<form class="form-inline" name="update" action="" method="post" >

<input type="hidden" name="data[ppid]" value="<?php echo $portpre['Portpresent']['ppid'];?>"  />
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Portfolio Edit Slideshow");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:440px;" >
    
      <div class="control-group" id="present_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Presentation Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Presentation Title" id="present_title" value="<?php echo $portpre['Portpresent']['present_title'];?>" name="data[present_title]" style="padding:2px; margin-right:25px; width:345px;">
          
          <span class="help-inline" id="present_title_div_error"></span> </div>
      </div>
      
      <div class="control-group" id="present_code_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:12px;font-family: arial; font-size:10px;"><?php echo __("Insert Embed Code");?></label>
                    <div class="controls">
                 <textarea rows="2" cols="5" id="present_code" name="data[present_code]"  style="width:340px;"><?php echo $portpre['Portpresent']['present_code'];?></textarea>
                  <p style="width:320px;"> To insert a presentation, copy the &quot;embed&quot; code from one of the following services and paste it above.</p>
                      <span class="help-inline" id="present_code_div_error"></span> </div>
                  </div>
                  
      <!--<div class="control-group" id="size_div">
        <div class="controls">
      <a href='http://www.dailymotion.com' target="_blank" style="margin-left:20px;"><img src="img/dailymotion.png"  style="border:0;"/></a>
       <a href="http://www.vimeo.com" target="_blank" style="margin-left:20px;"><img src="img/vimeo.png"  style="border:0;"/></a>
        <a href="http://www.youtube.com" target="_blank" style="margin-left:20px;"><img src="img/youtube.png"  style="border:0;"/></a>
         
          <br />
          <span class="info"></span> </div>
      </div>-->
      
      <div class="control-group" id="job_title_div">
    <div class="controls">
					<label style="margin-left:5px; font-size:12px;">Choose the aspect ratio for your player:</label><br />
					<p style="margin-left:5px; font-size:12px;"><input 	id="4-3" type="radio" name="data[present_ratio]"	value="0.75"  /> 
					<label for="4-3" >3:4 format</label>
					&nbsp;&nbsp;
					<input 	id="16-9" type="radio"	name="data[present_ratio]"	value="0.5625" checked="checked" /> 
					<label for="16-9" >16:9 format</label></p>
					<br />
					<span class="info"></span>
				</div>
     </div>
    </div>
     
    <div class="modal-footer">
     
      <label class="checkbox" style="display:block;">
        <input type="checkbox" name="data[display]" value="1">
        <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on Home page");?></span> </label>
      <button type="submit" id="port_present_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>