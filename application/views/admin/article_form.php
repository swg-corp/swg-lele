<div id="content">
    <div class="container">
        <div class="row">

            <div class="span12">

                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-edit"></i>
                        <h3>Create New Article</h3>
                    </div>
                    <div class="widget-content">
                      
                        <?php echo validation_errors();?>
                        <?php echo form_open('admin/article/add', array('class' => 'form-horizontal well clearfix')); ?>
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
                                    <textarea id="txt" class="input-xlarge" rows="5" name="content">&nbsp;</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-large"><i class="icon-ok"></i> save</button>
                           
                        </div>
                        <?php echo form_close(); ?>
                        <?php if (isset($article)){
                                 echo '<p>'.$article->getArtikel_name().'</p>';
                             }
                        ?>
                    </div>
                      
                </div>
                <a href="./" class="btn"><i class="icon-arrow-left"></i>&nbsp;&nbsp;Back</a>

            </div>
        </div>
    </div>