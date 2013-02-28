  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                    <h2 class="text-right">Skills</h2>
                    <div class="exp-box clearfix">
                    <?php     
                    foreach($skill as $skill) { 
                    ?>
                    <h3><a><?php echo $skill['Skill']['skill_area']?></a></h3>
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
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>
