<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/sidebar') ?>
<div class="span9">
    <h1 class="page-title">Artic Monkeys<a class="btn btn-warning pull-right" href="<?php echo site_url('article/create'); ?>">Create New Article</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Article List</h3>

        </div>
        <div class="widget-content">
            <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $value):?>
             <?php echo $value->content; ;?>
            <?php endforeach;?>
            <?php else: ?>
                <p>No article found <a class="btn" href="<?php echo site_url('article/create'); ?>">Create New Article &raquo;</a> </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>