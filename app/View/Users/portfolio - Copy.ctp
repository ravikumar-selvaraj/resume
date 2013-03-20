  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                        <h2 ><?php echo __("Portfolio");?></h2>
                     <?php if(!empty($portimg)){  ?>
                        
                        
                        <h3><a><?php echo __("Photo");?></a></h3>
                        <?php     $p=1;  
                        foreach($portimg as $portimg) { 
						
						$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$portimg['Portimage']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
                        //pr($portimg);
                        ?>
                         <div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_photo_edit_<?php echo $p;?>','p_photo_del_<?php echo $p;?>')" onmouseout="exp_div_hide('p_photo_edit_<?php echo $p;?>','p_photo_del_<?php echo $p;?>')" <?php echo $style;?>>
                        <div class="port-imge">
                         <h5><?php echo $portimg['Portimage']['image_title']?></h5>
                         
                        <ul class="thumbnails">
                        <li class="span5">
                        <a href="#" class="thumbnail">
                        <?php  echo  $this->html->image('portfolio-images/big/'.$portimg['Portimage']['image'],array('border'=>0,'alt'=>'pic'),array('class'=>'thumbnail')); ?>
                        </a>
                        </li>
                        </ul>
                        
                        <?php /*?><a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportimg<?php echo $portimg['Portimage']['piid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editportimage',array('piid'=>$portimg['Portimage']['piid'])); ?><?php */?>
                <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>   
                    <div class="editdelete">
              
                <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portimage<?php echo $portimg['Portimage']['piid']; ?>" id="p_photo_del_<?php echo $p;?>" style="padding-left:3px; display:none;"  ><?php echo __("Delete");?></a>   <a  href=""  style="display:none" class="pull-right"   data-toggle="modal" data-target="#editportimg<?php echo $portimg['Portimage']['piid']; ?>"  id="p_photo_edit_<?php echo $p;?>"  ><?php echo __("Edit");?> | </a>   
                 </div>
                  <?php echo $this->Element('editportimage',array('piid'=>$portimg['Portimage']['piid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$portimg['Portimage']['piid'],'model'=>'Portimage','wid'=>'piid','rid'=>Configure::read('userpage').'/portfolio')); ?>
                  
                  <?php } } ?>  
                        </div> </div> 
                        
                        <?php $p++; }?>
                        
                       
                        
                       
                    <?php } ?>
                    <!--Display Portfolio Video-->
                     <?php if(!empty($portvid)){  ?>
                        <div class="proff-exp ">
                        
                        <h3><a><?php echo __("Video");?></a></h3>
                        <?php   $v=1;    
                        foreach($portvid as $portvid) { 
                    $user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$portvid['Portvideo']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
                        ?>
                         <div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_video_edit_<?php echo $v;?>','p_video_del_<?php echo $v;?>')" onmouseout="exp_div_hide('p_video_edit_<?php echo $v;?>','p_video_del_<?php echo $v;?>')" <?php echo $style;?>>
                        <div class="port-imge">
                         <h5><?php echo $portvid['Portvideo']['video_title']?></h5>
                       
                        <table cellpadding="0" cellspacing="5" width="100%">
                        <tr>
                        <td class="videotitle"><?php echo $portvid['Portvideo']['video_title']; ?></td></tr>
                        <tr>
                        <td>
                        <?php echo $portvid['Portvideo']['video_code']; ?>
                        </td></tr>
                        </table>
                        </div>
                           <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportvideo<?php echo $portvid['Portvideo']['pvid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editportvideo',array('pv'=>$portvid['Portvideo']['pvid'])); ?><?php */?>
                  
                    <div class="editdelete"> 
                         <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portvideo<?php echo $portvid['Portvideo']['pvid']; ?>" id="p_video_del_<?php echo $v;?>" style="padding-left:3px; display:none;"  ><?php echo __("Delete");?></a>
                <a  href=""  class="pull-right"   data-toggle="modal" style="display:none;" data-target="#editportvideo<?php echo $portvid['Portvideo']['pvid']; ?>" id="p_video_edit_<?php echo $v;?>" >Edit  | </a> 
               
                 </div>
                  <?php echo $this->Element('editportvideo',array('pv'=>$portvid['Portvideo']['pvid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$portvid['Portvideo']['pvid'],'model'=>'Portvideo','wid'=>'pvid','rid'=>Configure::read('userpage').'/portfolio')); ?>
                        
                        </div><?php $v++;}?>
                        </div>
                    <?php } ?>
                    <!--Display Portfolio Document-->
                     <?php if(!empty($portdoc)){  ?>
                        <div class="proff-exp ">
                      
                        <h3><a><?php echo __("Document");?></a></h3>
                        <?php     $g = 1;
                        //pr($portdoc);
                        foreach($portdoc as $portdoc) { 
						$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$portdoc['Portdocument']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
                        ?>  <div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_doc_edit_<?php echo $g;?>','p_doc_del_<?php echo $g;?>')" onmouseout="exp_div_hide('p_doc_edit_<?php echo $g;?>','p_doc_del_<?php echo $g;?>')" <?php echo $style;?>>
                        <div class="port-imge">
                         <h5><?php echo $portdoc['Portdocument']['document_title']?></h5>
                        <table cellpadding="0" cellspacing="5" width="100%">
                        <tr><td align="right"><?php $ex=explode('.',$portdoc['Portdocument']['document_file']);
						if($ex[1]=='pdf') 
						echo  $this->html->image('PDFicon.png',array('border'=>0,'alt'=>'pic','width'=>'30','height'=>''),array('class'=>''));
						else
						echo  $this->html->image('microsoft-word.jpg',array('border'=>0,'alt'=>'pic','width'=>'30','height'=>''),array('class'=>''));
						?></td></tr>
                        <tr>
                            <td align="right">
                            <?php echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portdoc['Portdocument']['document_file'].'" target="_blank">'."Download".'<a>';?>
                            </td>
                        </tr>
                        
                        </table>
                        </div>
                        <?php /*?>  <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportdoc<?php echo $portdoc['Portdocument']['pdid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editportdocu',array('pd'=>$portdoc['Portdocument']['pdid'])); ?><?php */?>
                  
                   <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portdocument<?php echo $portdoc['Portdocument']['pdid']; ?>" id="p_doc_del_<?php echo $g;?>"  style="padding-left:3px; display:none;" ><?php echo __("Delete");?></a>
                <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#editportdoc<?php echo $portdoc['Portdocument']['pdid']; ?>" id="p_doc_edit_<?php echo $g;?>" ><?php echo __("Edit");?> | </a>  
               
                 </div>
                 
                  <?php echo $this->Element('editportdocu',array('pd'=>$portdoc['Portdocument']['pdid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$portdoc['Portdocument']['pdid'],'model'=>'Portdocument','wid'=>'pdid','rid'=>Configure::read('userpage').'/portfolio')); ?>
                        
                        </div><?php $g++;}?>
                        </div>
                    <?php } ?>
                    
                     <!--Display Portfolio Audio-->
                     <?php
					 
					  if(!empty($portaud)){  ?>
                        <div class="proff-exp ">
                       
                        <h3><a><?php echo __("Audio");?></a></h3>
                        <?php     
                      $au = 1;
                        foreach($portaud as $portaud) { 
						$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$portaud['Portaudio']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
						// pr($portaud);
                        ?> <div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_aud_edit_<?php echo $au;?>','p_aud_del_<?php echo $au;?>')" onmouseout="exp_div_hide('p_aud_edit_<?php echo $au;?>','p_aud_del_<?php echo $au;?>')" <?php echo $style;?>>
                        <div class="port-imge">
                         <h5><?php echo $portaud['Portaudio']['audio_title']?></h5>
                        <table cellpadding="0" cellspacing="5" width="100%">
                        
                        <tr>
                            <td>
                            
							 <object height="20" width="200" data="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" type="application/x-shockwave-flash">
<param value="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" name="movie"> <param value="mp3=<?php echo $this->Html->webroot('files/portfolio-audios/'.$portaud['Portaudio']['audio_file'].''); ?>&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=ffa50b&amp;bgcolor2=d07600" name="FlashVars">
</object>

						<?php 	
							
							//echo $portaud['Portaudio']['audio_file'];?>
                            </td>
                        </tr>
                        
                        </table>
                       <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportaudio<?php echo $portaud['Portaudio']['paid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editportaudio',array('pa'=>$portaud['Portaudio']['paid'])); ?><?php */?>
                  
                   <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portaudio<?php echo $portaud['Portaudio']['paid']; ?>" id="p_aud_del_<?php echo $au;?>"  style="padding-left:3px; display:none;" ><?php echo __("Delete");?></a>
                <a  href=""  class="pull-right" style="display:none;"   data-toggle="modal" data-target="#editportaudio<?php echo $portaud['Portaudio']['paid']; ?>" id="p_aud_edit_<?php echo $au;?>" ><?php echo __("Edit");?> | </a> 
               
                 </div>
                 
                  <?php echo $this->Element('editportaudio',array('pa'=>$portaud['Portaudio']['paid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$portaud['Portaudio']['paid'],'model'=>'Portaudio','wid'=>'paid','rid'=>Configure::read('userpage').'/portfolio')); ?>
                  
                        </div>
                       
                        </div> <?php $au++;}?>
                        </div>
                    <?php } ?>
                     <!--Display Portfolio Presentation-->
                    
                     <?php
					 
					  if(!empty($portpre)){  ?>
                        <div class="proff-exp ">
                        
                        <h3><a><?php echo __("Presentation");?></a></h3>
                        <?php     
                      $l =1;
                        foreach($portpre as $pres) { 
						$user_de = ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$pres['Portpresent']['uid'])));
										if($user_de['User']['template'] == 'yellow'){
											$template = '';
											$style = 'style="border:none;"';
										}else {
											$template = 'well';
											$style = '';
										}
						// pr($portaud);
                        ?><div class="exp-box <?php echo $template;?> clearfix" onmouseover="exp_div_show('p_pre_edit_<?php echo $l;?>','p_pre_del_<?php echo $l;?>')" onmouseout="exp_div_hide('p_pre_edit_<?php echo $l;?>','p_pre_del_<?php echo $l;?>')" <?php echo $style;?>>
                        <div class="port-imge">
                         <h5><?php echo $pres['Portpresent']['present_title']?></h5>
                        <table cellpadding="0" cellspacing="5" width="100%">
                        
                        <tr>
                            <td>
                            <?php
											 $var = $pres['Portpresent']['present_code'];
											 preg_match('/src="(.*?)"/', $var, $src);
											 $src = $src[1];
											  ?>
							  <iframe src="<?php echo $src; ?>" width="70%" height="250" frameborder="0" 	marginwidth="0" marginheight="0" scrolling="no" 
                                    style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen> </iframe>

						<?php 	
							
							//echo $portaud['Portaudio']['audio_file'];?>
                            </td>
                        </tr>
                        
                        </table>
                        <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportpres<?php echo $pres['Portpresent']['ppid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editportpres',array('pp'=>$pres['Portpresent']['ppid'])); ?><?php */?>
                  
                    <div class="editdelete">  <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portpresent<?php echo $pres['Portpresent']['ppid']; ?>" id="p_pre_del_<?php echo $l;?>" style="padding-left:3px;"  ><?php echo __("Delete");?></a>
               <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportpres<?php echo $pres['Portpresent']['ppid']; ?>" id="p_pre_edit_<?php echo $l;?>" ><?php echo __("Edit");?>  |</a>
              
                 </div>
                 
                   <?php echo $this->Element('editportpres',array('pp'=>$pres['Portpresent']['ppid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$pres['Portpresent']['ppid'],'model'=>'Portpresent','wid'=>'ppid','rid'=>Configure::read('userpage').'/portfolio')); ?>
                  
                        </div> </div>
                        <?php $l++;}?>
                       
                        </div>
                    <?php } ?>
                    
                    </div>
    
   
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>