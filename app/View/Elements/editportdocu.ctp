<?php 
	 $portdoc=ClassRegistry::init('Portfolio')->find('first',array('conditions'=>array('pid'=>$pid))); 
	?>

<div id="editportdoc<?php echo $pid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px;">

<form class="form-inline" name="update" action="<?php echo BASE_URL; ?>portfolio/edit_portfolios" enctype="multipart/form-data" method="post" >
<input type="hidden" name="data[pid]" value="<?php echo $portdoc['Portfolio']['pid'];?>"  />

    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel"  style="background:#fff; color:#000; font-size:24px;"><?php echo __("Portfolio Add Document");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="edit_document_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Document Title");?></label>
        <div class="controls">
          <input type="text" placeholder="Document Title" id="edit_document_title" name="data[title]" value="<?php echo $portdoc['Portfolio']['title'];?>" style="padding:2px; margin-right:25px; width:345px;">
          
           </div><span class="help-inline" id="edit_document_title_div_error"></span>
      </div>
	  
	  <div class="control-group" id="edit_audio_title_div">
       <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 14px;font-weight: bold;"><?php echo __("Current Audio");?></label>
        <div class="controls"><?php $ex=explode('.',$portdoc['Portfolio']['document']);
						if($ex[1]=='pdf') 
						echo  $this->html->image('PDFicon.png',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
						else
						echo  $this->html->image('microsoft-word.jpeg',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
						?>
                        
                            <?php echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portdoc['Portfolio']['document'].'" target="_blank">'."Download".'<a>';?>
                            
		
          </div><span class="help-inline" id="edit_audio_title_div_error"></span>
      </div>
      
      <div class="control-group" id="edit_document_file_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:12px;font-family: arial; font-size: 12px;font-weight: bold;"><?php echo __("Add a document");?></label>
                    <div class="controls">
                    <?php //echo $this->Html->image('avatar_cp.jpg',array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file" id="edit_document_file" name="data[document]" style="padding:2px; margin: 5px 0px 0px 0px; height:26px;"> 
                       </div><span class="help-inline" id="document_file_div_error"></span>
                  </div>
                  
     
                  
    </div>
    <div class="modal-footer">
     
      <label class="checkbox" style="display:block;">
        <!--<input type="checkbox" name="data[display]" value="1">
        <span style="margin-left:5px; float:left; font-size:12px;"><?php echo __("Display on home page");?></span>--> </label>
      <button type="submit" id="edit_port_document_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
    </div>
    
    <!--</div>-->
  </form>
  
  
   </div>