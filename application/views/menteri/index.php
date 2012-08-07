<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/sidebar'); ?>
<div class="span9">
    <h1 class="page-title">Menteri</h1>
    <div class="widget">
        <div class="widget-header">
            <h3>User Profile</h3>
        </div>
        <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Last Login</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($menteries as $key => $menteri): ?>
                        <tr>
                            <td><?php echo $menteri['name']; ?></td>
                            <td><?php echo $menteri['email']; ?></td>
                            <td><?php echo $menteri['last_login']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#">
                                        Action
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="icon-search"></i> Details</a></li>
                                        <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                                        <li><a href="#"><i class="icon-remove"></i> Remove</a></li>
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>