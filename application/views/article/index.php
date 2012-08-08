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
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>title</th>
                    <th>status</th>
                    <th>created</th>
                    <th>content</th>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $value): ?>
                            <tr>
                                <td><?php echo $value->title; ?></td>
                                <td>
                                    <?php if ($value->status==='publish'):?>
                                        <span class="label label-info">Publish</span>
                                    <?php else:?>
                                        <span class="label label-warning">Draft</span>
                                    <?php endif;?>
                                </td>
                                <td><?php echo $value->create_date; ?></td>
                                <td><?php echo $value->content; ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>

                </table>
            <?php else: ?>
                <p>No article found <a class="btn" href="<?php echo site_url('article/create'); ?>">Create New Article &raquo;</a> </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>