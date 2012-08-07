<div class="span3">
    <ul id="main-nav" class="nav nav-tabs nav-stacked">

        <li <?php if ($this->uri->segment(1) == "dashboard") echo ' class="active"'; ?>>
            <a href="<?php echo site_url('dashboard'); ?>">
                <i class="icon-home"></i>
                Dashboard 		
            </a>
        </li>
        <li <?php if ($this->uri->segment(1) == "menteri") echo ' class="active"'; ?>>
            <a href="<?php echo site_url('menteri'); ?>">
                <i class="icon-user"></i>
                Menteri		
            </a>
        </li>

        

    </ul>	

</div>