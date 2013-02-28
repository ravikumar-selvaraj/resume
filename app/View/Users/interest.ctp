  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
     <?php if(!isset($this->params['pass'][0])){?>
    
    
    
            <div class="proff-exp resume-box-cont">
                        <h2 class="text-right">Interest</h2>
                        <div class="exp-box clearfix">
                          <?php
                        foreach($int as $int) { 
                        ?>
                            <h3><a><?php echo $int['Interest']['interest_type']?></a></h3>
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
    <?php if(isset($this->params['pass'][0])){?>
    
    <?php } ?>
    
    
    </div>
    
</div>
</div>