  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                        <h2 class="text-right">Portfolio</h2>
                     <?php if(!empty($portimg)){  ?>
                        
                        <div class="exp-box clearfix">
                        <h3><a>Photo's</a></h3>
                        <?php     
                        foreach($portimg as $portimg) { 
                        //pr($portimg);
                        ?>
                         
                        <div class="port-imge">
                         <h5><?php echo $portimg['Portimage']['image_title']?></h5>
                         
                        <ul class="thumbnails">
                        <li class="span5">
                        <a href="#" class="thumbnail">
                        <?php  echo  $this->html->image('portfolio-images/big/'.$portimg['Portimage']['image'],array('border'=>0,'alt'=>'pic'),array('class'=>'thumbnail')); ?>
                        </a>
                        </li>
                        </ul>
                        </div>
                        <?php }?>
                        </div>
                       
                    <?php } ?>
                    <!--Display Portfolio Video-->
                     <?php if(!empty($portvid)){  ?>
                        <div class="proff-exp ">
                        <div class="exp-box clearfix">
                        <h3><a>Video's</a></h3>
                        <?php     
                        //pr($portvid);
                        foreach($portvid as $portvid) { 
                    
                        ?>
                         
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
                        <?php }?>
                        </div>
                        </div>
                    <?php } ?>
                    <!--Display Portfolio Document-->
                     <?php if(!empty($portdoc)){  ?>
                        <div class="proff-exp ">
                        <div class="exp-box clearfix">
                        <h3><a>Document's</a></h3>
                        <?php     
                        //pr($portdoc);
                        foreach($portdoc as $portdoc) { 
                        ?>
                        <div class="port-imge">
                         <h5><?php echo $portdoc['Portdocument']['document_title']?></h5>
                        <table cellpadding="0" cellspacing="5" width="100%">
                        <tr><td align="right"><?php $ex=explode('.',$portdoc['Portdocument']['document_file']);
						if($ex[1]=='pdf') 
						echo  $this->html->image('PDFicon.png',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
						else
						echo  $this->html->image('microsoft-word.jpg',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
						?></td></tr>
                        <tr>
                            <td align="right">
                            <?php echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portdoc['Portdocument']['document_file'].'" target="_blank">'."Download".'<a>';?>
                            </td>
                        </tr>
                        
                        </table>
                        </div>
                        <?php }?>
                        </div>
                        </div>
                    <?php } ?>
                     <!--Display Portfolio Audio-->
                     <?php
					 
					  if(!empty($portaud)){  ?>
                        <div class="proff-exp ">
                        <div class="exp-box clearfix">
                        <h3><a>Audio</a></h3>
                        <?php     
                      
                        foreach($portaud as $portaud) { 
						// pr($portaud);
                        ?>
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
                        </div>
                        <?php }?>
                        </div>
                        </div>
                    <?php } ?>
                     <!--Display Portfolio Presentation-->
                    
                     <?php
					 
					  if(!empty($portpre)){  ?>
                        <div class="proff-exp ">
                        <div class="exp-box clearfix">
                        <h3><a>Audio</a></h3>
                        <?php     
                      
                        foreach($portpre as $pres) { 
						// pr($portaud);
                        ?>
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
                        </div>
                        <?php }?>
                        </div>
                        </div>
                    <?php } ?>
                    
                    </div>
    
   
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>