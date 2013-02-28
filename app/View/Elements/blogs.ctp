<div id="blogs" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Add Links");?></h2>
                            </div>

                            <div class="modal-body">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>users/blogs" id="rss_form" method="post">
                                    <div class="control-group" id="user_blog">
                                        <label class="control-label" for="inputInfo"><?php echo __("Rss feed link");?></label>
                                        <div class="controls">
                                            <input type="text" id="rss_feed" name="data[rss_feed]" >
                                             <span class="help-inline" id="rss_feed_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="rss_feed_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>