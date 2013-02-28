  <?php echo $this->Element('side');?>
    <div class="span9 viewmore middle-col">
    
    <div class="resume-box-cont" >
    
    <h2 class="text-right">Blog</h2>
    <?php 
	if(!empty($items)){
    foreach ($items as $items)
    { ?>
    <div class="exp-box clearfix">
    <h3><?php echo $this->html->link($items['title'],$items['link'], array('target'=>'_blank'));?></h3>
    <div class="blog_date"><?php echo date("M d, Y", strtotime($items['pubDate'])); ?></div>
    <div class="blog_desc"> <?php echo html_entity_decode($items['description'],ENT_QUOTES);?></div>
    <!--<ul class="">
    <li><?php echo html_entity_decode($items['description'],ENT_QUOTES);?></li>
    <li><?php //echo  strip_tags(html_entity_decode($items['description'],ENT_QUOTES), '<p><b>');?></li>
    
    <li></li>
    <li><?php echo date("d/m/Y", strtotime($items['pubDate']));
    //date('Y m',$items['pubDate']);?></li>
    </ul>-->
    </div>
    <?php } }?>
    
    </div>
    
    
    </div>
</div>
</div>
