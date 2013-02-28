  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
            <h2 class="text-right">Professional Experience</h2>
            <?php 
            foreach($exp as $exp) { 
            ?>
            <div class="exp-box clearfix">
            <h3><a href=""><?php echo $exp['Experience']['job_title'];?></a></h3>
            <div class="blog_date">
            <?php 
            
            $cou=ClassRegistry::init('Country')->find('first',array('conditions'=>array('iso_code2'=>$exp['Experience']['country'])));
            echo $exp['Experience']['company'].'-'."\t".$exp['Experience']['city'].'-'."\t".$cou['Country']['country_name']."\t".'('.$exp['Experience']['contract_type']."\t".'-'."\t".
            date("M Y", strtotime($exp['Experience']['start_date']))."\t".'-'."\t".date("M Y", strtotime($exp['Experience']['end_date'])).  ')';?>
            </div> 
            Responisibily
            <ul>
            <?php $sp=explode(',',$exp['Experience']['responsibility']) ;
            $i=0;
            foreach($sp as $sp1) {?>
            <li><?php echo $sp1; ?></li>
            <?php $i++;}?>
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
            <?php }?>     
            </div>
    
    </div>
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>
