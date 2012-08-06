<div id="content">
    <div class="container">
        <div class="row">
            <div class="span3">
                <?php echo $this->bootstrap->widget("sidebar_widget",array())?>;
            </div>
            <div class="span9">
                <h1 class="page-title">Admin Dashboard</h1>
                <?php echo $this->bootstrap->widget("hero_widget", array("title"=>"Dashboard","text"=>"This is the dashboard main page")); ?>
               
            </div>
        </div>
    </div>
</div>