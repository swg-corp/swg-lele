<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/sidebar'); ?>
<div class="span9">
    <h1 class="page-title"><a href="<?php echo site_url('album') ?>" class="btn btn-warning">&laquo; Back to List</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-plus"></i>  Create New Album</h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <?php
                echo form_open('album/create');

                echo form_fieldset('Album Information');

                echo form_error('title');
                echo form_label('Album Title', 'title');
                echo form_input('title');
                
                echo form_label('Description','desc');
                echo form_textarea('desc');

                echo form_fieldset_close();

                echo form_button(array('id' => 'submit', 'value' => 'Add', 'name' => 'submit', 'type' => 'submit', 'content' => 'Add', 'class' => 'btn btn-primary'));
                ?>
                <a href="<?php echo site_url('album'); ?>" class="btn">Cancel</a>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('form:not(.filter) :input:visible:first').focus();
});
</script>
<?php $this->load->view('includes/footer'); ?>