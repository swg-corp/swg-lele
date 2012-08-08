<?php
$assets = array(
    'js' => array('swfobject.js',
        'jquery.uploadify.v2.1.4.min.js',
        'fancybox/jquery.mousewheel-3.0.6.pack.js',
        'fancybox/jquery.fancybox.js',
        'fancybox/jquery.fancybox-buttons.js',
        'fancybox/jquery.fancybox-thumbs.js'
    ),
    'css' => array('uploadify.css',
        'fancybox/jquery.fancybox.css',
        'fancybox/jquery.fancybox-buttons.css',
        'fancybox/jquery.fancybox-thumbs.css'
    )
);
?>
<?php $this->load->view('includes/header', $assets); ?>
<?php if (isset($flash)): ?>
    <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash; ?></strong></div>
<?php endif; ?>
<?php $this->load->view('includes/sidebar'); ?>
<div class="span9">
    <h1 class="page-title"><a href="<?php echo site_url('album') ?>" class="btn btn-warning">&laquo; Back to List</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-picture"></i>  Upload image for album: <?php echo $album->title; ?></h3>
        </div>
        <div class="widget-content">
            <div class="well">
                <input type="file" name="file_upload" id="file_upload">
                <p id="upload-btn" style="margin:10px 0;">
                    <a href="javascript:$('#file_upload').uploadifyUpload()" class="btn btn-warning btn-large">Upload Files</a>
                </p>
                <div id="new-images">
                    <h4>Uploaded Images</h4>
                    <p><a class="btn" href="<?php echo site_url("album/images/$album->id"); ?>" style="margin: 10px 0;"><i class="icon-refresh"></i> Refresh</a></p>
                    <ul id="new-image-list"></ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget">
        <div class="widget-header">
            <h3><i class="icon-picture"></i>  Images in Album: <?php echo $album->title; ?></h3>
        </div>
        <div class="widget-content">
            <div class="carousel slide span8" id="myCarousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <ul class="thumbnails">
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="thumbnails">
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                           <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="thumbnails">
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a class="img-fancy" href="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" title="London Olympic Logo"><img src="https://ssl.gstatic.com/onebox/sports/olympics/london2012_logo.png" alt=""></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
                <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myCarousel').carousel('pause');
        $('a.img-fancy').fancybox({ helpers: {
              title : {
                  type : 'float'
              }
          }
});
        $('#upload-btn').hide();
        $('#new-images').hide();
        $('#file_upload').uploadify({
            'uploader'       : '<?php echo base_url(); ?>assets/swf/uploadify.swf',
            'script'         : '<?php echo base_url(); ?>index.php/api/upload/<?php echo $album->id; ?>',
            'cancelImg'      : '<?php echo base_url(); ?>assets/img/cancel.png',
            'folder'         : '/uploads',
            'auto'           : false,
            'multi'          : true,
            'scriptData'     : { 'user_id' : '<?php echo $user_id; ?>' },
            'fileExt'        : '*.jpg;*.jpeg;*.gif;*.png',
            'fileDesc'       : 'Image files',
            'sizeLimit'      : 2097152, // 2MB
            'wmode'          : 'opaque',
            'onSelect'       : function(event, ID, fileObj) {
                $('#upload-btn').show();
                alert('file: '+fileObj.name);
            },'onCancel'       : function(event, ID, fileObj) {
                $('#upload-btn').hide();
            },
            'onError'        : function(event, ID, fileObj, errorObj) {
                alert(errorObj.type + ' Error: ' + errorObj.info);
            },
            'onComplete'     : function(event, ID, fileObj, response, data) {
                var fileName = response;
                $('#upload-btn').hide();
                $('#new-images').show();
                $.ajax({
                    url          : '<?php echo base_url(); ?>index.php/album/resize/' + response,
                    type         : 'POST',
                    cache        : false,
                    success      : function(response) {
                        if (response !== 'failure') {
                            var new_image = '<li><img src="<?php echo base_url(); ?>uploads/' + response + '" /><br />' + response + '</li>';
                            $('#new-image-list').append(new_image);
                        } else {
                            var fail_message = '<li>Thumbnail creation failed for: ' + fileObj.name + '</li>';
                            $('#new-image-list').append(fail_message);
                        }
                    },
                    error        : function(jqXHR, textStatus, errorThrown) {
                        alert('Error occurred when generating thumbnails.');
                    }
                });
            }
            
        });
    });
</script>

<?php $this->load->view('includes/footer'); ?>