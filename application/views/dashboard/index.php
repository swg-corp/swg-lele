<?php $this->load->view('includes/header');?>
<?php if (isset($flash_message)): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<?php $this->load->view('includes/sidebar');?>
<div class="span9">
    <h1 class="page-title">Admin Dashboard</h1>
</div>
<?php $this->load->view('includes/footer');?>