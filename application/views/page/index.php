<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/sidebar') ?>
<div class="span9">
    <h1 class="page-title">Page<a class="btn btn-warning pull-right" href="<?php echo site_url('page/create'); ?>">Create New Page</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Page List</h3>

        </div>
        <div class="widget-content">
            
            <?php if (!empty($pages)): ?>
            
            <?php else: ?>
                <p>No page found <a class="btn" href="<?php echo site_url('page/create'); ?>">Create New Page &raquo;</a> </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>