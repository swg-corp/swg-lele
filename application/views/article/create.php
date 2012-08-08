<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/sidebar') ?>
<div class="span9">
    <h1 class="page-title"><a class="btn btn-warning" href="<?php echo site_url('article'); ?>">&laquo; Back to Article List</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Create New Article</h3>
        </div>
        <div class="widget-content">
            <?php echo form_open('article/create'); ?>
            <?php echo form_label('Title'); ?>
            <input type="text" class="input-xlarge" name="title" placeholder="Title of content"/>
            <textarea name="content" placeholder="Content here.."></textarea>
            <input type="submit"/>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>