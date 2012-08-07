<?php $this->load->view('includes/header');?>
<?php if (isset($flash_message)): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<?php $this->load->view('includes/sidebar');?>
<div class="span9">
    <h1 class="page-title"><i class="icon-user"></i>&nbsp;User Setting</h1>
    <div class="widget">
        <div class="widget-header">
            <h3>User Profile</h3>
        </div>
        <div class="widget-content">
            <h2><?php echo $menteri->name ;?></h2>
            <p><?php echo $menteri->profile;?></p>
            <p><?php echo $email;?></p>
            <p><?php echo $role;?></p>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer');?>