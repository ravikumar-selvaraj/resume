  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 class="text-right">Education</h2>
                    
                    <?php  $ed=1;    
                    foreach($edu as $edu) { 
                    ?>
                  <div class="exp-box clearfix" onmouseover="exp_div_show('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" onmouseout="exp_div_hide('p_edu_edit_<?php echo $ed;?>','p_edu_del_<?php echo $ed;?>')" >
                    <h3><a><?php echo $edu['Education']['course']?></a></h3>
                    <div class="blog_date">
                    <?php 
                    echo $edu['Education']['organization'].'-'."\t".'('.date("M Y", strtotime($edu['Education']['start_date']))."\t".'-'."\t".date("M Y", strtotime($edu['Education']['end_date'])).  ')';?>
                    </div>
                    <ul class="">
                    <?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
                    $i=0;
                    foreach($sp as $sp1) {
						if(trim($sp1) !='') {
						?>
                        
                    <li><?php echo $sp1; ?></li>
                    <?php }  ?>
					
					
                  
                 <?php  $i++;} ?>
              <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>    
                 <div class="editdelete"><a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Education<?php echo $edu['Education']['eid']; ?>" id="p_edu_del_<?php echo $ed;?>" style="padding-left:3px;" >   Delete  </a>
      <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editedu<?php echo $edu['Education']['eid']; ?>" id="p_edu_edit_<?php echo $ed;?>" >Edit | </a>  
       
       </div>
                  <?php echo $this->Element('editedu',array('uid'=>$edu['Education']['eid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$edu['Education']['eid'],'model'=>'Education','wid'=>'eid','rid'=>Configure::read('userpage').'/educations')); ?>
                 
            <?php } } ?>       
               <?php /*?>  <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editedu<?php echo $edu['Education']['eid']; ?>" >Edit</a> 
                  <?php echo $this->Element('editedu',array('uid'=>$edu['Education']['eid'])); ?><?php */?>
                    </ul>
					<?php if(!empty( $edu['Education']['desc'])){?>
                    Company Description
                    <ul>
                    <li> <?php echo $edu['Education']['desc']?></li>
                   
                  
                    </ul>
                    <?php }?>
                  </div>
                    <?php $ed++; }?>
                    
                    </div>
    
    </div>
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>

<div class="recommend-fix" style="display:none" id="refoot">
            <a href="" class="add-recommend pull-left" data-toggle="modal" data-target=".recommendtr"><img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="">Recommendations</a>
            <div class="recommend-skillsfix span5 offset7">
            <?php  $i=1; foreach($recedu as $recedu) { ?>
                <a href="#" class="ex2" rel="<?php echo $recedu['Recommentation']['rid'];?>" data-placement="top"><button class="btn"><?php echo $recedu['Recommentation']['skills']; ?></button></a>
                
                <?php $i++; } ?>
            </div>
            <a href="" class="pull-right span1" onClick="changefoot1()"><img src="<?php echo BASE_URL; ?>img/rnd_br_down_icon.png" alt=""></a>
        </div>
<div class="resume_footer1" id="refoot1"><a onClick="changefoot()"><img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt=""></a></div>

<div id="ver_content" style="display:none; background:#fff">
  <div>
  <div class="norecm recme">No Recommentation For Now</div>
    <div class="norecm recm_code" style="display:none;"><textarea rows="2" cols="5" id="recm_code23" name="data[present_code]" style="width:242px;"></textarea></div>
   <div class="resumebtn">
     <a href="#" class="btn btn-large btn-primary disabled recmme" style="cursor:pointer" onclick="recommentme()" >
     <img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" style="padding-right:15px;">Recomment Mani</a> 
     <button class="btn btn-large btn-primary disabled" id="recmbtn" style="display:none"> <img src="<?php echo BASE_URL; ?>img/hand_pro_icon.png" alt="" style="padding-right:15px;">Recomment Mani</button>
      <br /> <br />
     <a href="#" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline" data-toggle="modal" data-target=".recommendtr">See all recommentation</a>
   </div>
   </div>
</div>



<!--  <a href="#" style="cursor:pointer;" class="btn btn-large btn-primary disabled " data-toggle="modal" data-target="#recommendmy">Recommentation</a>	
<div class="resume_footer" style="display:none" id="refoot">
<div class="resume_footer_rec"><span style="padding-left:10px;"><img src="../img/add.png" ></span><span><a href="#">Recommentation</a></span></div> 
<div class="resume_footer_skill">
<?php foreach($recmd as $recmd1) { ?>
<a><span class="re_skill"><?php echo $recmd1['Recommentation']['skills']; ?></span><span class="re_skill2">2</span></a>
<?php } ?>

<a href="#" id="ex2" data-placement="top">Please, let me speak!</a>
<div id="ver_content" style="display:none; background:#fff">
  <div>
  <div class="norecm">No Recommentation For Now</div>
   <div class="resumebtn">
     <button class="btn btn-info" type="button">PHP 25</button>  <br /> <br />
     <a href="#" style="color:#397; cursor:pointer; font-size:12px; border:none">See all recommentation</a>
   </div>
   </div>
</div>
 </div> 
<div class="resume_back"><a onClick="changefoot1();">old</a> </div>
</div>
<div class="resume_footer1" id="refoot1"><a onClick="changefoot();">new</a></div>-->
<!-- Recommend -->
<div  class="modal hide fade recommendtr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="resume-cont clearfix">
                                        <img src="<?php echo BASE_URL; ?>img/profile_pic_default.jpg" alt="" class="pull-left img-polaroid">
                                        <div class="span5 resume_head">
                                            <h3><a href="">John Doe</a></h3>
                                            <small class="muted">Web Developer</small>  
                                        </div>
                                    </div>
                                    <div class="recommend-skills">
                                        <p>Recommand sheik dawood on one of his key-skills</p>
                                        <button class="btn btn-info" type="button">PHP 25</button>
                                        <button class="btn btn-info" type="button">Java 25</button>
                                        
                                    </div>

                                    <ul class="nav nav-tabs" id="recommend-tab">
                                        <li class="active"><a href="#approval">Waiting for approval (0)</a></li>
                                        <li><a href="#my-recommend">All my recommendations (1)</a></li>
                                    </ul>
 
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="approval">

                                            <img src="<?php echo BASE_URL; ?>img/profile_pic_mini.jpg" alt="" class="pull-left img-polaroid">
                                            <div class="resume-cont recommend-list clearfix pull-left span6">
                                                <span><a href=""><i class="icon-remove pull-right"></i></a></span>
                                                <div class=" resume_head">
                                                    <h5><a href="">John Doe</a></h5>
                                                    <small class="muted">Web Developer</small>
                                                    <span class="label label-info">Php</span>

                                                </div>

                                                <input type="text" placeholder="I recommend you php" class="span6" disabled="">
                                                <small class="muted">02/19/2013</small>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="my-recommend">...</div>

                                        <button class="btn btn-block" type="button">Go back to sheik dawood resume</button>
                                    </div>
                                </div>
<style>
.norecm
{
	width:254px;
	background:#FFF;
	float:left;
	padding:23px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:17px;
	color:#333;
}
.resumebtn
{
	width:254px;
	background:#eaeaea;
	float:left;
	padding:23px;
	font-size:12px;
	color:#39F;
	text-align:center;
}
.resa
{
	padding:10px;
	font-size:12px;
	color:#39F;
}
</style>

<script>
$(document).ready(function(){
	$('.ex2').click(function(){
		$('.popover').hide();
		})
$('.ex2').popover({
	html : true,
	content: function() {
		var rel = $(this).attr('rel');
		$.ajax({
		type: "POST",
		data: "recid="+<?php echo $_SESSION['User']['uid']; ?>+"&skill="+rel,
		url: "<?php echo BASE_URL; ?>users/recommentme",
		success: function(msg){
			if(msg=='no'){
		$('.recme').show();	
		$('.recm_code').hide();	
		}
		else
		{
		$('.recme').hide();	
		$('.recm_code').show();	
		}	
		}});
		
      return $('#ver_content').html();
    }
	
});

function scat(){
	var logodel=$('#user_logo').val()
		$.ajax({
		type: "POST",
		data: "imgval="+logodel+"&new="+fygf,
		url: "<?php echo BASE_URL; ?>users/delimage",
		success: function(msg){
			$('#mylogo').hide();
			$('#mylogo2').show();
			$(".hai").css({'width' : '140px', 'padding-top' : '0px','top' :'15px'})
			$("#delme").hide();
			$('.display').show();
			$(".display").css({'width' : '150px', 'padding-top' : '0px','top' :'15px'})
				
		}});
	}


});
function poprec() {	 
	$('#refoot').show();
	$('#refoot1').hide();
 }
function changefoot(id) {
	$('#refoot').show();
	$('#refoot1').hide();
 }
 function changefoot1(id) {
	$('#refoot').hide();
	$('#refoot1').show();
 }
  function recommentme(id) {
	var rel = $(this).attr('rel');
	$('.recme').hide();
	$('.recmme').hide();
	$('.recm_code').show();
	$('#recmbtn').show()
	$('.popover').css({'top':'-240px'});
 }
    </script>