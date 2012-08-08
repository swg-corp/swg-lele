<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/sidebar'); ?>
<div class="span9">
    <h1 class="page-title">Album<a class="btn btn-warning pull-right" href="<?php echo site_url('album/create'); ?>">Create new album</a></h1>
    <div class="widget">
        <div class="widget-header">
            <h3>Album List</h3>

        </div>
        <div class="widget-content">
            <?php if (isset($albums)): ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Photos</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($albums as $album): ?>
                            <tr>
                                <td>
                                    <?php echo $album['title'] ?>
                                    <?php $images = $album['images']; ?>
                                    <?php if (isset($images) && !empty($images)): ?>
                                    <ul class="mini-image-set">
                                            <?php foreach ($images as $image): ?>
                                                <li>
                                                    <img src="<?php echo base_url() . 'uploads/' . $image->thumb ?>" alt="<?php echo $image->caption; ?>" /></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <div class="clear"></div>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date('M d, Y', strtotime($album['create_date'])); ?></td>
                                <td><?php echo $album['total_images']; ?></td>
                                <td><?php echo $album['description']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            Action
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url("album/edit/" . $album['id']); ?>"><i class="icon-pencil"></i> Rename</a></li>
                                            <li><a href="<?php echo site_url("album/images/" . $album['id']); ?>"><i class="icon-picture"></i> Images</a></li>

                                            <li><a class="album-delete-btn" href="#album-modal" data-toggle="modal" rel="<?php echo site_url("album/remove/" . $album['id']); ?>"><i class="icon-trash"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No Album Found</p>
            <?php endif; ?>

            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>