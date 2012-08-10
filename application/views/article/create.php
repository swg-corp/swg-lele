<?php
$assets = array(
    'js' => array('redactor/redactor.js'),
    'css' => array('redactor.css')
);
?>
<?php $this->load->view('includes/header', $assets); ?>

<?php $this->load->view('includes/sidebar'); ?>
<div class="span9">
    <h1 class="page-title"><a href="<?php echo site_url('article') ?>" class="btn btn-warning">&laquo; Back to Article List</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-plus"></i>  Create New Article</h3>
        </div>
        <div class="widget-content">
            <div class="well">
<?php echo form_open('article/create'); ?>

                <fieldset><legend>Article</legend>

                    <?php echo form_error('title') ?>
                    <?php echo form_label('Title', 'title'); ?>
                    <input type="text" name="title" class="input-xlarge"/>
<?php echo form_label('Content', 'content'); ?>
                    <textarea name="content" rows="10" cols="12" id="txt_content"></textarea>

                    <?php echo form_error('status'); ?>
<?php echo form_label('Status', 'status'); ?>
                    <select name = "status">
                        <option value = "draft">Draft</option>
                        <option value = "publish">Publish</option>

                    </select>
                </fieldset>
                <div class="form-actions">
                    <?php
                    echo form_button(array('id' => 'submit', 'value' => 'Add', 'name' => 'submit', 'type' => 'submit', 'content' => 'Add', 'class' => 'btn btn-primary'));
                    ?>
                    <a href="<?php echo site_url('article'); ?>" class="btn">Cancel</a>
                </div>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
    function()
    {
        var buttons = ['formatting', '|', 'bold', 'italic', 'deleted','|'
            ,'unorderedlist', 'orderedlist', 'outdent', 'indent','|'
            ,'alignleft', 'aligncenter', 'alignright', 'justify', '|'
            ,'image', 'video', 'file', 'link', '|','html','|'];
        $('#txt_content').redactor({ 
            imageUpload: '<?php echo base_url();?>index.php/api/upload_json',
            buttons: buttons,
            fixed: true
        });
    }
);
</script>	
<?php $this->load->view('includes/footer'); ?>