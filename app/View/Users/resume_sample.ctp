
                
                <?php echo $this->Element('side');?>
				
				
					<div class="span5 middle-col column ">
					
					<!--Display Proffessional Experiance-->
					<?php if(!empty($exp)){ ?>
					<div class="proff-exp resume-box-cont dragbox" >
						 <h2 class="text-right">Professional Experience</h2>
								<?php foreach($exp as $exp) {  ?>
								<div class="exp-box clearfix dragbox"  onmouseover="mousein()" onmouseout="mouseout()">
									<h3><a href=""><?php echo $exp['Experience']['job_title'];?></a>
										<div class="pull-right">
											<?php 
												if(!empty($exp['Experience']['logo'])) 
												echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>''));
										
											?>
										</div>
									</h3>
								<ul>
									<?php $sp=explode(',',$exp['Experience']['responsibility']);
											$i=0;
											foreach($sp as $sp1) {?>
												<li><?php echo $sp1; ?></li>
											<?php $i++;}?>
								
								</ul>
								 <?php  if(isset($_SESSION['User']['uid'])) { 
											if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
												<ul class="edith unstyled" style="display:none">
													<li>
														<i class="icon-white"></i>
														<a  href="<?php echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>"  class="pull-right  edit_proffessional" id="edit_proffessional">Edit</a> 
													</li>
												</ul>
										<?php }
										 } ?>
								</div>
								<?php }?>     
								</div>
						  <?php }?>
						  
						<!--Display Education-->
						 <?php if(!empty($edu)){  ?>
							<div class="proff-exp resume-box-cont dragbox">
							<h2 class="text-right">Education</h2>
							<div class="exp-box clearfix">
							<?php     
							foreach($edu as $edu) { 
							?>
							<h5><?php echo $edu['Education']['course']?></h5>
							<div class="blog_date">
							<?php 
							echo $edu['Education']['organization'].'-'."\t".'('.date("M Y", strtotime($edu['Education']['start_date']))."\t".'-'."\t".date("M Y", strtotime($edu['Education']['end_date'])).  ')';?>
							</div>
						   <!-- <ul class="">
							<?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
							$i=0;
							foreach($sp as $sp1) {?>
							<li><?php echo $sp1; ?></li>
							<?php $i++;}?>
							</ul>-->
							
						   <!-- <a href="" class="pull-right" id="sdsd">view all</a>-->
							<?php }?>
							</div>
							</div>
						<?php } ?>
						
						<!--Display Portfolio Photo-->
						<?php if($c > 0) {?>
						<div class="proff-exp resume-box-cont dragbox">
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
						
						
						
						 <!--Display Portfolio Presentation-->
						
						 <?php
						 
						  if(!empty($portpre)){  ?>
							<div class="proff-exp ">
							<div class="exp-box clearfix">
							<h3><a>Presentations</a></h3>
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
								  <iframe src="<?php echo $src; ?>" width="100%" height="300" frameborder="0" 	marginwidth="0" marginheight="0" scrolling="no" 
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
						</div>
						<?php }?>
					</div>
	
					<div class="span4 right-col column">
						<!--Display Skills-->
						<?php if(!empty($skill)){  ?>
						<div class="proff-exp resume-box-cont dragbox">
						<h2 class="text-right">Skills</h2>
						<div class="exp-box clearfix">
						<?php     
						foreach($skill as $skill) { 
						?>
						<h5><?php echo $skill['Skill']['skill_area']?></h5>
						<ul class="">
						<?php $sp=explode(',',$skill['Skill']['skills']) ;
						$i=0;
						foreach($sp as $sp1) {?>
						<li><?php echo $sp1; ?></li>
						<?php $i++;}?>
						</ul>
						
						<!-- <a href="" class="pull-right" id="sdsd">view all</a>-->
						<?php }?>
						</div>
						</div>
						<?php } ?>
						<!--Display Interest-->   
						<?php if(!empty($int)){  ?>
						<div class="proff-exp resume-box-cont dragbox">
						<h2 class="text-right">Interests</h2>
						<div class="exp-box clearfix">
						<?php
						foreach($int as $int) { 
						?>
						<h5><?php echo $int['Interest']['interest_type']?></h5>
						<ul class="">
						<?php $sp=explode(',',$int['Interest']['interest']) ;
						$i=0;
						foreach($sp as $sp1) {?>
						<li><?php echo $sp1; ?></li>
						<?php $i++;}?>
						</ul>
						<!-- <a href="" class="pull-right">view all</a>-->
						<?php  }?>
						</div>
						</div> 
						<?php } ?> 
					 
					</div>
					
				
        </div>
        </div>
     
<script>
  $('.column').sortable({
	connectWith: '.column',
	handle: 'h2',
	cursor: 'move',
	placeholder: 'placeholder',
	forcePlaceholderSize: true,
	opacity: 0.4,
        stop: function(event, ui){
            saveState();
        }
})
.disableSelection();

function saveState(){
    var items = [];
    // traverse all column div and fetch its id and its item detail. 
    $(".column").each(function(){
        var columnId = $(this).attr("id");
        $(".dragbox", this).each(function(i){ // here i is the order, it start from 0 to...
           var item = {
               id: $(this).attr("id"),
               column_no: columnId,
               order: i
           }
           items.push(item);
        });
        
    });
    $("#results").html("loading..");
    var shortorder = {items : items};
        $.ajax({
          url: "<?php echo "save.php"; ?>",
          async: false, 
          data: shortorder,
          dataType: "html",
          type: "POST",
          success: function(html){
            $("#results").html(html);
          }
        });    
}


</script>