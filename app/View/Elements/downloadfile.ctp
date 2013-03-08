<div id="downloadfile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:440px; z-index:1500">
<form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>portfolio/portaudio" enctype="multipart/form-data" method="post" style="margin-bottom:0px;width:440px;">
    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h2 id="myModalLabel" style="font-size:16px; padding:0px; margin:0px;"><?php echo __("Resume Download");?></h2>
    </div>
    <div class="modal-body" style="padding-top:0px;width:500px;" >
    
      <div class="control-group" id="audio_title_div">
      
        <div class="downloaddoc">
           <?php echo  $this->html->link(__("Pdf").'<br>'.$this->html->image('PDFicon.png',array('border'=>0,'alt'=>'logo')),array('controller'=>'users','action'=>'viewpdf'),array('escape'=>false)); ?>
            <?php echo  $this->html->link(__("Word").'<br>'.$this->html->image('microsoft-word.jpeg',array('border'=>0,'alt'=>'logo')),array('controller'=>'users','action'=>'viewdoc'),array('escape'=>false)); ?>
            <?php echo  $this->html->link(__("ODT").'<br>'.$this->html->image('odt.png',array('border'=>0,'alt'=>'logo')),array('controller'=>'users','action'=>'viewodt'),array('escape'=>false)); ?>
      </div>
      
      
    </div>
    
    
    <!--</div>-->
  </form>
   </div>