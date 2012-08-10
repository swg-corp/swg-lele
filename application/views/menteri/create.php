<?php
$assets = array(
    'js' => array('redactor/redactor.js'),
    'css' => array('redactor.css')
);
?>
<?php $this->load->view('includes/header', $assets); ?>

<?php $this->load->view('includes/sidebar'); ?>
<div class="span9">
    <h1 class="page-title"><a href="<?php echo site_url('menteri') ?>" class="btn btn-warning">&laquo; Back to List</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-plus"></i>  Create New Menteri</h3>
        </div>
        <div class="widget-content">
            <div class="well">
<?php echo form_open('menteri/create'); ?>

                <fieldset><legend>Article</legend>

                    <?php echo form_error('email') ?>
                    <?php echo form_label('Email', 'email'); ?>
                    <input type="text" name="email" class="input-xlarge"/>
                    

                    <?php echo form_error('password'); ?>
                    <?php echo form_label('Password', 'password'); ?>
                    <input type="password" name="password" class="input-xlarge"/>
                    
                    <?php echo form_error('name') ?>
                    <?php echo form_label('Name', 'name'); ?>
                    <input type="text" name="name" class="input-xlarge"/>
                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Add', 'name' => 'submit', 'type' => 'submit', 'content' => 'Add', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('menteri'); ?>" class="btn">Cancel</a>
                </div>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>