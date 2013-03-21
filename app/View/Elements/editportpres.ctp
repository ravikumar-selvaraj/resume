<?php 	 $portpre=ClassRegistry::init('Portfolio')->find('first',array('conditions'=>array('pid'=>$pid))); 	?>

<div id="editportpres<?php echo $pid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">
<form class="form-inline" name="update" action="<?php echo BASE_URL; ?>portfolio/edit_portfolios" method="post" >

<input type="hidden" name="data[pid]" value="<?php echo $portpre['Portfolio']['pid'];?>"  />
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="background:#fff; color:#000; font-size:24px;"><?php echo __("Portfolio Edit Slideshow");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:440px;" >
    
      <div class="control-group" id="edit_present_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Presentation Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Presentation Title" id="edit_present_title" value="<?php echo $portpre['Portfolio']['title'];?>" name="data[title]" style="padding:2px; margin-right:25px; width:345px;">
          
          <span class="help-inline" id="edit_present_title_div_error"></span> </div>
      </div>
      
      <div class="control-group" id="edit_present_code_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:440px; font-size:12px;font-family: arial; font-size:10px;"><?php echo __("Insert Embed Code");?></label>
                    <div class="controls">
                 <textarea rows="2" cols="5" id="edit_present_code" name="data[presentation]"  style="width:340px;"><?php echo $portpre['Portfolio']['presentation'];?></textarea>
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
      
      <div class="control-group" id="edit_job_title_div">
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
       <!-- <input type="hidden" name="data[display]" value="1">
        <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on Home page");?></span>--> </label>
      <button type="submit" id="edit_port_present_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
  </form>
   </div>