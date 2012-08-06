<div id="content">
    <div class="container">
        <div class="row">
             <div class="span3">
                <?php echo $this->bootstrap->widget("sidebar_widget",array())?>;
            </div>

            <div class="span9 pull-left">

                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-edit"></i>
                        <h3>Create New Article</h3>
                    </div>
                    <div class="widget-content">
                      
                        <?php echo validation_errors();?>
                        <?php echo form_open('admin/article/add', array('class' => 'clearfix well')); ?>
                        <fieldset>
                           
                            <div class="control-group">
                                <label class="control-label" for="input01">Title</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="input01" name="title" placeholder="The title">

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="txt">Content</label>
                                <div class="controls">
                                    <textarea id="txt" style="width: 640px; height: 300px"  name="content" placeholder="enter content..">&nbsp;</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> save</button>
                            <button type="reset" class="btn"><i class="icon-refresh"></i> clear</button>
                           
                        </div>
                        <?php echo form_close(); ?>
                        
                    </div>
                      
                </div>
                <a href="./" class="btn"><i class="icon-arrow-left"></i>&nbsp;&nbsp;Back</a>

            </div>
        </div>
    </div>