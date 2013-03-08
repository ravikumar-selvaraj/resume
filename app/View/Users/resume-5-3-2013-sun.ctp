<?php echo $this->Element('side');?>

<div class="span5 middle-col"> 
  <!--Display Proffessional Experiance-->
  <?php 
					$exp_count = count($exp);
					 if(!empty($exp)){ 
					 
					 ?>
  <div class="proff-exp resume-box-cont" >
    <h2 class="text-right">Professional Experience</h2>
    <?php 
							$r=1;
                            foreach($exp as $exp) { 
                            ?>
    <div class="exp-box clearfix" id="profile_experiance_<?php echo $r;?>" onmouseover="exp_div_show('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')" onmouseout="exp_div_hide('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')">
      <h3><a><?php echo $exp['Experience']['job_title'];?></a>
        <div class="pull-right">
          <?php if(!empty($exp['Experience']['logo']))
							
							echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>''));
							
							?>
        </div>
      </h3>
      <ul>
        <?php $sp=explode(',',$exp['Experience']['responsibility']) ;
                            $i=0;
                            foreach($sp as $sp1) {
								if(trim($sp1) !='') {?>
        <li>
          <?php  echo $sp1; ?>
        </li>
        <?php }$i++;}?>
      </ul>
      <ul  class="edith unstyled" style="margin:0;" >
        <li><i class="icon-white"></i>
          <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
          <?php /*?>  <a  href="<?php echo BASE_URL.'users/edit_experiance/'.$exp['Experience']['key'];?>" style="display:none"  class="pull-right  edit_proffessional" id="p_exp_edit_<?php echo $r;?>">      Edit</a>   <?php */?>
          <?php /*?><a  href=""  class="pull-right"   data-toggle="modal" data-target="#editexp<?php echo $exp['Experience']['eid']; ?>" >Edit</a> 
                             <?php echo $this->Element('editexp',array('edid'=>$exp['Experience']['eid'])); ?><?php */?>
          <div class="editdelete"> 
          <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Experience<?php echo $exp['Experience']['eid']; ?>" id="p_exp_del_<?php echo $r;?>" > Delete</a>
           <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editexp<?php echo $exp['Experience']['eid']; ?>" id="p_exp_edit_<?php echo $r;?>" >Edit</a>
            </div>
            <script type="text/javascript">
			$('#p_exp_edit_<?php echo $r;?>').live('click',function(){
				alert('test');
			});
			</script>
          <?php echo $this->Element('editexp',array('edid'=>$exp['Experience']['eid'])); ?>
          <?php echo $this->Element('delete',array('did'=>$exp['Experience']['eid'],'model'=>'Experience','wid'=>'eid','rid'=>Configure::read('userpage'))); ?>
          <?php } } ?>
        </li>
      </ul>
    </div>
    <?php $r++;}?>
  </div>
  <?php }?>
  <!--Display Education-->
  <?php 
					 
					 if(!empty($edu)){  ?>
  <div class="proff-exp resume-box-cont">
    <h2 class="text-right">Education</h2>
    <?php  
						$ed = 1;   
                        foreach($edu as $edu) { 
                        ?>
    <div class="exp-box clearfix" onmouseover="exp_div_show('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" onmouseout="exp_div_hide('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" >
      <h3><a><?php echo $edu['Education']['course']?></a></h3>
      <div class="blog_date" >
        <?php 
                        echo $edu['Education']['organization'].'-'."\t".'('.date("M Y", strtotime($edu['Education']['start_date']))."\t".'-'."\t".date("M Y", strtotime($edu['Education']['end_date'])).  ')';?>
      </div>
      <ul class="edith unstyled">
        <li><i class="icon-white"></i>
          <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
          <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
          <?php /*?> <a  href="<?php echo BASE_URL.'users/edit_education/'.$edu['Education']['key'];?>"  style="display:none" class="pull-right  " id="p_edu_edit_<?php echo $ed;?>">Edit</a> <?php */?>
          <div class="editdelete"><a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Education<?php echo $edu['Education']['eid']; ?>" id="p_edu_del_<?php echo $ed;?>" > Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editedu<?php echo $edu['Education']['eid']; ?>" id="p_edu_edit_<?php echo $ed;?>" >Edit | </a> </div>
          <?php echo $this->Element('editedu',array('uid'=>$edu['Education']['eid'])); ?> <?php echo $this->Element('delete',array('did'=>$edu['Education']['eid'],'model'=>'Education','wid'=>'eid','rid'=>Configure::read('userpage'))); ?>
          <?php } } ?>
        </li>
      </ul>
    </div>
    <?php $ed++;}?>
  </div>
  <?php } ?>
  
  <!--Display Portfolio Photo-->
  <?php if($c > 0) {?>
  <div class="proff-exp resume-box-cont">
    <h2 class="text-right">Portfolio</h2>
    <?php if(!empty($portimg)){  ?>
    <h3><a>Photo's</a></h3>
    <?php
						$p=1;     
                        foreach($portimg as $portimg) { 
                        //pr($portimg);
                        ?>
    <div class="exp-box clearfix" onmouseover="exp_div_show('p_photo_edit_<?php echo $p;?>','p_photo_del_<?php echo $p;?>')" onmouseout="exp_div_hide('p_photo_edit_<?php echo $p;?>','p_photo_del_<?php echo $p;?>')">
      <div class="port-imge">
        <h5><?php echo $portimg['Portimage']['image_title']?></h5>
        <ul class="thumbnails" >
          <li class="span5"> <a href="#" class="thumbnail">
            <?php  echo  $this->html->image('portfolio-images/big/'.$portimg['Portimage']['image'],array('border'=>0,'alt'=>'pic'),array('class'=>'thumbnail')); ?>
            </a> </li>
        </ul>
        <ul class="edith unstyled">
          <li><i class="icon-white"></i>
            <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
            <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
            <?php /*?><a  href="<?php echo BASE_URL.'users/edit_port_photo/'.$portimg['Portimage']['key'];?>"  style="display:none;" class="pull-right" id="p_photo_edit_<?php echo $p;?>">
                        Edit</a> <?php */?>
            <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portimage<?php echo $portimg['Portimage']['piid']; ?>" id="p_photo_del_<?php echo $p;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportimg<?php echo $portimg['Portimage']['piid']; ?>"  id="p_photo_edit_<?php echo $p;?>"  >Edit | </a> </div>
            <?php echo $this->Element('editportimage',array('piid'=>$portimg['Portimage']['piid'])); ?> <?php echo $this->Element('delete',array('did'=>$portimg['Portimage']['piid'],'model'=>'Portimage','wid'=>'piid','rid'=>Configure::read('userpage'))); ?>
            <?php } } ?>
          </li>
        </ul>
      </div>
    </div>
    <?php $p++; }?>
    <?php } ?>
    <!--Display Portfolio Video-->
    <?php if(!empty($portvid)){  ?>
    <div class="proff-exp ">
      <h3><a>Video's</a></h3>
      <?php 
						$v=1;    
                        foreach($portvid as $portvid) { 
                        ?>
      <div class="exp-box clearfix" onmouseover="exp_div_show('p_video_edit_<?php echo $v;?>','p_video_del_<?php echo $v;?>')" onmouseout="exp_div_hide('p_video_edit_<?php echo $v;?>','p_video_del_<?php echo $v;?>')">
        <div class="port-imge">
          <h5><?php echo $portvid['Portvideo']['video_title']?></h5>
          <table cellpadding="0" cellspacing="5" width="100%">
            <tr>
              <td class="videotitle"><?php echo $portvid['Portvideo']['video_title']; ?></td>
            </tr>
            <tr>
              <td><?php echo $portvid['Portvideo']['video_code']; ?></td>
            </tr>
          </table>
        </div>
        <ul class="edith unstyled">
          <li><i class="icon-white"></i>
            <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
            <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
            <?php /*?><a  href="<?php echo BASE_URL.'users/edit_port_video/'.$portvid['Portvideo']['key'];?>"  style="display:none;" class="pull-right" id="p_video_edit_<?php echo $v;?>">
                        Edit</a> <?php */?>
            <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portvideo<?php echo $portvid['Portvideo']['pvid']; ?>" id="p_video_del_<?php echo $v;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportvideo<?php echo $portvid['Portvideo']['pvid']; ?>" id="p_video_edit_<?php echo $v;?>" >Edit  | </a> </div>
            <?php echo $this->Element('editportvideo',array('pv'=>$portvid['Portvideo']['pvid'])); ?> <?php echo $this->Element('delete',array('did'=>$portvid['Portvideo']['pvid'],'model'=>'Portvideo','wid'=>'pvid','rid'=>Configure::read('userpage'))); ?>
            <?php } } ?>
          </li>
        </ul>
      </div>
      <?php }?>
    </div>
    <?php } ?>
    <!--Display Portfolio Document-->
    <?php if(!empty($portdoc)){  ?>
    <div class="proff-exp ">
      <h3><a>Document's</a></h3>
      <?php     
                        //pr($portdoc);
						$g = 1;
                        foreach($portdoc as $portdoc) { 
                        ?>
      <div class="exp-box clearfix" onmouseover="exp_div_show('p_doc_edit_<?php echo $g;?>','p_doc_del_<?php echo $g;?>')" onmouseout="exp_div_hide('p_doc_edit_<?php echo $g;?>','p_doc_del_<?php echo $g;?>')">
        <div class="port-imge">
          <h5><?php echo $portdoc['Portdocument']['document_title']?></h5>
          <table cellpadding="0" cellspacing="5" width="100%">
            <tr>
              <td align="right"><?php $ex=explode('.',$portdoc['Portdocument']['document_file']);
						if($ex[1]=='pdf') 
						echo  $this->html->image('PDFicon.png',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
						else
						echo  $this->html->image('microsoft-word.jpeg',array('border'=>0,'alt'=>'pic','width'=>'50','height'=>'50'),array('class'=>''));
						?></td>
            </tr>
            <tr>
              <td align="right"><?php echo '<a href="'.BASE_URL.'files/portfolio-documents/'.$portdoc['Portdocument']['document_file'].'" target="_blank">'."Download".'<a>';?></td>
            </tr>
          </table>
        </div>
        <ul class="edith unstyled">
          <li><i class="icon-white"></i>
            <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
            <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
            <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portdocument<?php echo $portdoc['Portdocument']['pdid']; ?>" id="p_doc_del_<?php echo $g;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportdoc<?php echo $portdoc['Portdocument']['pdid']; ?>" id="p_doc_edit_<?php echo $g;?>" >Edit | </a> </div>
            <?php echo $this->Element('editportdocu',array('pd'=>$portdoc['Portdocument']['pdid'])); ?> <?php echo $this->Element('delete',array('did'=>$portdoc['Portdocument']['pdid'],'model'=>'Portdocument','wid'=>'pdid','rid'=>Configure::read('userpage'))); ?>
            <?php /*?> <a  href="<?php echo BASE_URL.'users/edit_port_document/'.$portdoc['Portdocument']['key'];?>"  style="display:none;" class="pull-right" id="p_doc_edit_<?php echo $g;?>">
                        Edit</a> <?php */?>
            <?php } } ?>
          </li>
        </ul>
      </div>
      <?php $g++; }?>
    </div>
    <?php } ?>
    
    <!--Display Portfolio Presentation-->
    
    <?php
					  if(!empty($portpre)){  ?>
    <div class="proff-exp ">
      <h3><a>Presentations</a></h3>
      <?php     
                      $l =1;
                        foreach($portpre as $pres) { 
						// pr($portaud);
                        ?>
      <div class="exp-box clearfix" onmouseover="exp_div_show('p_pre_edit_<?php echo $l;?>','p_pre_del_<?php echo $l;?>')" onmouseout="exp_div_hide('p_pre_edit_<?php echo $l;?>','p_pre_del_<?php echo $l;?>')">
        <div class="port-imge">
          <h5><?php echo $pres['Portpresent']['present_title']?></h5>
          <table cellpadding="0" cellspacing="5" width="100%">
            <tr>
              <td><?php
											 $var = $pres['Portpresent']['present_code'];
											 preg_match('/src="(.*?)"/', $var, $src);
											 $src = $src[1];
											  ?>
                <iframe src="<?php echo $src; ?>" width="100%" height="300" frameborder="0" 	marginwidth="0" marginheight="0" scrolling="no" 
                                    style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen> </iframe>
                <?php 	
							
							//echo $portaud['Portaudio']['audio_file'];?></td>
            </tr>
          </table>
        </div>
        <ul class="edith unstyled">
          <li><i class="icon-white"></i>
            <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
            <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
            <?php /*?><a  href="<?php echo BASE_URL.'users/edit_port_presentation/'.$pres['Portpresent']['key'];?>"  style="display:none;" class="pull-right" id="p_pre_edit_<?php echo $l;?>">
                        Edit</a> <?php */?>
            <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portpresent<?php echo $pres['Portpresent']['ppid']; ?>" id="p_pre_del_<?php echo $l;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportpres<?php echo $pres['Portpresent']['ppid']; ?>" id="p_pre_edit_<?php echo $l;?>" >Edit  |</a> </div>
            <?php echo $this->Element('editportpres',array('pp'=>$pres['Portpresent']['ppid'])); ?> <?php echo $this->Element('delete',array('did'=>$pres['Portpresent']['ppid'],'model'=>'Portpresent','wid'=>'ppid','rid'=>Configure::read('userpage'))); ?>
            <?php /*?> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportpres<?php echo $pres['Portpresent']['ppid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editportpres',array('pp'=>$pres['Portpresent']['ppid'])); ?><?php */?>
            <?php } } ?>
          </li>
        </ul>
      </div>
      <?php $l++; }?>
    </div>
    <?php } ?>
    
    <!--Display Portfolio Audio-->
    <?php
					 
					  if(!empty($portaud)){  ?>
    <div class="proff-exp ">
      <h3><a>Audio</a></h3>
      <?php     
                      	$au = 1;
                        foreach($portaud as $portaud) { 
						// pr($portaud);
                        ?>
      <div class="exp-box clearfix" onmouseover="exp_div_show('p_aud_edit_<?php echo $au;?>','p_aud_del_<?php echo $au;?>')" onmouseout="exp_div_hide('p_aud_edit_<?php echo $au;?>','p_aud_del_<?php echo $au;?>')">
        <div class="port-imge">
          <h5><?php echo $portaud['Portaudio']['audio_title']?></h5>
          <table cellpadding="0" cellspacing="5" width="100%">
            <tr>
              <td><object height="20" width="200" data="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" type="application/x-shockwave-flash">
                  <param value="<?php echo $this->Html->webroot('player_mp3_maxi.swf'); ?>" name="movie">
                  <param value="mp3=<?php echo $this->Html->webroot('files/portfolio-audios/'.$portaud['Portaudio']['audio_file'].''); ?>&amp;showstop=1&amp;showvolume=1&amp;bgcolor1=ffa50b&amp;bgcolor2=d07600" name="FlashVars">
                </object>
                <?php 	
							
							//echo $portaud['Portaudio']['audio_file'];?></td>
            </tr>
          </table>
        </div>
        <ul class="edith unstyled">
          <li ><i class="icon-white"></i>
            <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
            <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
            <?php /*?><a  href="<?php echo BASE_URL.'users/edit_port_audio/'.$portaud['Portaudio']['key'];?>"  style="display:none;" class="pull-right  " id="p_aud_edit_<?php echo $au;?>">
                        Edit</a> <?php */?>
            <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Portaudio<?php echo $portaud['Portaudio']['paid']; ?>" id="p_aud_del_<?php echo $au;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editportaudio<?php echo $portaud['Portaudio']['paid']; ?>" id="p_aud_edit_<?php echo $au;?>" >Edit | </a> </div>
            <?php echo $this->Element('editportaudio',array('pa'=>$portaud['Portaudio']['paid'])); ?> <?php echo $this->Element('delete',array('did'=>$portaud['Portaudio']['paid'],'model'=>'Portaudio','wid'=>'paid','rid'=>Configure::read('userpage'))); ?>
            <?php } } ?>
          </li>
        </ul>
      </div>
      <?php $au++; }?>
    </div>
    <?php } ?>
  </div>
  <?php }?>
</div>
<div class="span4 right-col"> 
  <!--Display Skills-->
  <?php if(!empty($skill)){  ?>
  <div class="proff-exp resume-box-cont" >
    <h2 class="text-right">Skills</h2>
    <?php
					$sk = 1;     
                    foreach($skill as $skill) { 
                    ?>
    <div class="exp-box clearfix" onmouseover="exp_div_show('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')" onmouseout="exp_div_hide('p_skil_edit_<?php echo $sk;?>','p_skil_del_<?php echo $sk;?>')">
      <h5><?php echo $skill['Skill']['skill_area']?></h5>
      <ul class="">
        <?php $sp=explode(',',$skill['Skill']['skills']) ;
                    $i=0;
                    foreach($sp as $sp1) {if(trim($sp1) !='') {?>
        <li>
          <?php  echo $sp1; ?>
        </li>
        <?php }$i++;}?>
      </ul>
      <ul class="edith unstyled" >
        <li><i class="icon-white"></i>
          <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
          <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
          <?php /*?><a  href="<?php echo BASE_URL.'users/edit_skills/'.$skill['Skill']['key'];?>" style="display:none"  class="pull-right" id="p_skil_edit_<?php echo $sk;?>" >
                        Edit</a> <?php */?>
          <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Skill<?php echo $skill['Skill']['sid']; ?>" id="p_skil_del_<?php echo $sk;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editskills<?php echo $skill['Skill']['sid']; ?>" id="p_skil_edit_<?php echo $sk;?>" >Edit | </a> </div>
          <?php echo $this->Element('editskills',array('sk'=>$skill['Skill']['sid'])); ?> <?php echo $this->Element('delete',array('did'=>$skill['Skill']['sid'],'model'=>'Skill','wid'=>'sid','rid'=>Configure::read('userpage'))); ?>
          <?php } } ?>
        </li>
      </ul>
    </div>
    <?php $sk++; }?>
  </div>
  <?php } ?>
  <!--Display Interest-->
  <?php if(!empty($int)){  ?>
  <div class="proff-exp resume-box-cont">
    <h2 class="text-right">Interests</h2>
    <?php
					$est = 1;
                    foreach($int as $int) { 
                    ?>
    <div class="exp-box clearfix" onmouseover="exp_div_show('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')" onmouseout="exp_div_hide('p_int_edit_<?php echo $est;?>','p_int_del_<?php echo $est;?>')">
      <h5><?php echo $int['Interest']['interest_type']?></h5>
      <ul class="">
        <?php $sp=explode(',',$int['Interest']['interest']) ;
                    $i=0;
                    foreach($sp as $sp1) {
						if(trim($sp1) !='') {?>
        <li>
          <?php  echo $sp1; ?>
        </li>
        <?php  } $i++;}?>
      </ul>
      <ul class="edith unstyled" >
        <li><i class="icon-white"></i>
          <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
          <?php // echo BASE_URL.'users/edit_resume/'.$exp['Experience']['eid'];?>
          <?php /*?><a  href="<?php echo BASE_URL.'users/edit_interests/'.$int['Interest']['key'];?>" style="display:none" class="pull-right" id="p_int_edit_<?php echo $est;?>" >
                    Edit</a> <?php */?>
          <div class="editdelete"> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Interest<?php echo $int['Interest']['iid']; ?>" id="p_int_del_<?php echo $est;?>" >Delete</a> <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editinterest<?php echo $int['Interest']['iid']; ?>" id="p_int_edit_<?php echo $est;?>" >Edit | </a> </div>
          <?php echo $this->Element('editinterest',array('in'=>$int['Interest']['iid'])); ?> <?php echo $this->Element('delete',array('did'=>$int['Interest']['iid'],'model'=>'Interest','wid'=>'iid','rid'=>Configure::read('userpage'))); ?>
          <?php } } ?>
        </li>
      </ul>
    </div>
    <?php  $est++;}?>
  </div>
  <?php } ?>
</div>
</div>
</div>

<!-- 
	 <script type="text/javascript">
	 
	 function exp_div_show(i){
		 $("#"+i).show();
	 }
	 function exp_div_hide(i){
		 $("#"+i).hide();
	 }
	$('.exptab').live('click',function(){
		var news = $(this).parents('table').attr('class');
		$('.'+news+' tr:last').after('<tr><td><input type="text"  class="team validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" ></td><td><span class="exptd">Delete</span></td></tr>');
	});
	
	$('.exptd').live('click',function(){
	$(this).parents('tr').remove();
});
	
	
	</script>

 
    <script type="text/javascript">
	function ajaxFileUpload()
{
	var fileextension=/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;
	$(".ploading").ajaxStart(function(){
			$(this).show();
		}).ajaxComplete(function(){
			$(this).hide();
		});
	$('#image').val('');	
	if($('.editfile').val().match(fileextension)){
		alert("dfgsdg");
	$.ajaxFileUpload
	(
		{
			url:'users/uploadimage',
			secureuri:false,
			fileElementId:'file',
			dataType: 'json',
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined') {
					if(data.error != '')
						alert(data.error);
				} else {
					$('#user_logo').val(data.msg);
					$('#mylogo').show();
					$('#delme').show();
					$('#mylogo2').hide();
					$('#mylogo').html('<img src="<?php echo BASE_URL.'img/users/small/'; ?>'+data.msg+'" height="30" width="50" >');
					
					//window.location="newuploadimage";	
					/*$.fancybox({ 
					 'width'    : '9',
					 'height'   : '6',
					 'autoScale'   : false,
					 'href'    : 'newuploadimage',					
					 'type'    : 'iframe',					 
					 'centerOnScroll' : true,
					 'onClosed'   : function() {changeimg();}
					});	*/
									
				}
			}			
		}
	)}else{
		$("#error").html("Oops..Please upload profile image").show(500);
	setTimeout(function(){  $('.error').hide(500); }, 5000); 
	$('#image').focus();
	}
	return false;
}

function scat(){
	var logodel=$('#user_logo').val()
		$.ajax({
		type: "POST",
		data: "imgval="+logodel,
		url: "users/delimage",
		success: function(msg){
			$('#mylogo').hide();
			$('#mylogo2').show();
			$("#hai").css({'width' : '140px', 'padding-top' : '0px'})
			$("#delme").hide();
			$('#display').show();
				
		}});
	}
		
</script>--> 
