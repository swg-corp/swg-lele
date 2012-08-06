<div id="content">
    <div class="container">
        <div class="row">
            <div class="span3">
                <?php echo $this->bootstrap->widget("sidebar_widget",array())?>;
            </div>
            <div class="span9">
                <h1 class="page-title">
                    <i class="icon-bookmark icon-large"></i>
                    Articles</h1>
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-bookmark-empty"></i>
                        <h3>Article</h3>
                    </div>
                    <div class="widget-content">
                        <p><?php echo $message; ?></p>
                    </div>
                </div>
                <div><a class="btn btn-primary" href="<?php echo site_url('admin/article/add'); ?>"><i class="icon-plus"></i>create article</a></div>
            </div>
        </div>
    </div>
</div>