  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
            <h2 class="text-right">Professional Experience</h2>
            <?php  $r=1;
            foreach($exp as $exp) { 
            ?>
            <div class="exp-box clearfix" id="profile_experiance_<?php echo $r;?>" onmouseover="exp_div_show('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')" onmouseout="exp_div_hide('p_exp_edit_<?php echo $r;?>','p_exp_del_<?php echo $r;?>')">
            <h3><a href=""><?php echo $exp['Experience']['job_title'];?></a>
            <div class="pull-right">
			<?php if(!empty($exp['Experience']['logo']))echo $this->Html->image('users/small/'.$exp['Experience']['logo'],array('border'=>0,'width'=>'50','height'=>'50','alt'=>'Logo','class'=>'')); ?>
            </div>
            </h3>
            <div class="blog_date">
            <?php 
            
            $coun=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
            echo $exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$coun['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".
            date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')';?>
            </div> 
           Responsibility	
            <ul>
            <?php $sp=explode(',',$exp['Experience']['responsibility']) ;
            $i=0;
            foreach($sp as $sp1) {
				if(trim($sp1)) { 
				?>
            <li><?php echo $sp1; ?></li>
            <?php } $i++;}?>
            
            
            <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
              <div class="editdelete">
               <a  href=""  class="pull-right"   data-toggle="modal" data-target="#delete_Experience<?php echo $exp['Experience']['eid']; ?>" id="p_exp_del_<?php echo $r;?>"  style="padding-left:3px;" >   Delete</a>
               <a  href=""  class="pull-right"   data-toggle="modal" data-target="#editexp<?php echo $exp['Experience']['eid']; ?>" id="p_exp_edit_<?php echo $r;?>" >Edit  |  </a>  
             </div>
                   <?php echo $this->Element('editexp',array('edid'=>$exp['Experience']['eid'])); ?>
                  <?php echo $this->Element('delete',array('did'=>$exp['Experience']['eid'],'model'=>'Experience','wid'=>'eid','rid'=>Configure::read('userpage').'/experience')); ?>
            
            <?php } } ?>
            
            
            
            </ul>
            <?php if(!empty( $exp['Experience']['comapny_desc'])){?>
            Company Description
            <ul>
            <li> <?php echo $exp['Experience']['comapny_desc']?></li>
            </ul>
            <?php }?>
            <?php if(!empty( $exp['Experience']['website'])){?>
            Website
            <ul>
            <li><?php echo $exp['Experience']['website']?></li>
            </ul> 
            <?php
			 //echo $this->Html->link('Enter', 'http://www.google.com', array('class' => 'button', 'target' => '_blank'));
			// echo $this->Html->link($exp['Experience']['website'],$exp['Experience']['website'], array('target'=>'_blank'));?>
            <?php }?>
            
            
            </div>
            <?php $r++;}?>     
            </div>
    
    </div>
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>

<script>
$('.exptab').click(function(){
		//var news = $(this).parents('table').attr('class');
		$('.miletab').append('<tr><td><input type="text"  class="team validate[required] text" name="resp[]"  placeholder="Responsibilities" style="width:425px;padding:2px; margin-bottom:10px;" ></td><td><!--<span class="exptd">Delete</span>--></td></tr>');
	});
	
	$('.exptd').click(function(){
	$(this).parents('tr').remove();
});
</script>