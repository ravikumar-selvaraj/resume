  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    <div class="resume-box-cont" >
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 class="text-right">Education</h2>
                    <div class="exp-box clearfix">
                    <?php     
                    foreach($edu as $edu) { 
                    ?>
                  
                    <h3><a><?php echo $edu['Education']['course']?></a></h3>
                    <div class="blog_date">
                    <?php 
                    echo $edu['Education']['organization'].'-'."\t".'('.date("M Y", strtotime($edu['Education']['start_date']))."\t".'-'."\t".date("M Y", strtotime($edu['Education']['end_date'])).  ')';?>
                    </div>
                    <ul class="">
                    <?php $sp=explode(',',$edu['Education']['extra_curricular']) ;
                    $i=0;
                    foreach($sp as $sp1) {?>
                    <li><?php echo $sp1; ?></li>
                    <?php $i++;}?>
                    </ul>
					<?php if(!empty( $edu['Education']['desc'])){?>
                    Company Description
                    <ul>
                    <li> <?php echo $edu['Education']['desc']?></li>
                    </ul>
                    <?php }?>
                  
                    <?php }?>
                    </div>
                    </div>
    
    </div>
      <?php } ?>
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>
