<div id="content">
    <div class="container">
        <div class="row">
            <div class="span3">
                <?php echo $this->bootstrap->widget("sidebar_widget",array())?>;
            </div>
            <div class="span9">
                <h1 class="page-title">
                    <i class="icon-bookmark icon-large"></i>
                    Articles <a class="btn btn-warning pull-right" href="<?php echo site_url('admin/article/add'); ?>" title="create new article"><i class="icon-file"></i>&nbsp;new</a></h1>
                    
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-bookmark-empty"></i>
                        <h3>Article</h3>
                    </div>
                    <div class="widget-content">
                        <p><?php if(isset($message)) echo $message; ?></p>
                        <?php foreach ($articles as $key => $value):?>
                         <h1><?php echo $value->getArtikel_name();?></h1><br/>
                         <p><?php echo $value->getArtikel_content();?></p><hr/>
                        <?php endforeach;?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>