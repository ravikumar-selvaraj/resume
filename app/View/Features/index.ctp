<div class="row app-header">
            <div class="container ">
                <h1><?php echo __("Features");?></h1>
            </div>
        </div>

        <div class="container main-body">
            <div class="row dashboard">
                <ul class="thumbnails features"> 
				<?php foreach($features as $feature): 
						if($feature['Feature']['title'] != ''){
				?>
                    <li class="span4">
                        <div class="thumbnail">
                            <a href="<?php echo BASE_URL;?>features/view/<?php echo $feature['Feature']['key'];?>"><?php echo $this->html->image('feature-images/big/'.$feature['Feature']['image'],array('border'=>0,'style'=>'width:300px;height:200px','alt'=>h($feature['Feature']['title']))); ?>
                            <div class="caption">
                                <h4><?php echo substr($feature['Feature']['title'],0,20); if(strlen($feature['Feature']['title'])>20) echo '...'; ?></h4>
                                <p><?php echo substr($feature['Feature']['description'],0,100); if(strlen($feature['Feature']['description'])>100) echo '...'; ?></p>
                            </div></a>
                        </div>
                    </li>
					<?php } endforeach; ?>   
                </ul>


            </div>
        </div>