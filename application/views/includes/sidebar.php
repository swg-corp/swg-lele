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
                <i class="icon-group"></i>
                Menteri		
            </a>
        </li>
        <li <?php if ($this->uri->segment(1) == "album") echo ' class="active"'; ?>>
            <a href="<?php echo site_url('album'); ?>">
                <i class="icon-picture"></i>
                Album		
            </a>
        </li>
         <li <?php if ($this->uri->segment(1) == "article") echo ' class="active"'; ?>>
            <a href="<?php echo site_url('article'); ?>">
                <i class="icon-book"></i>
                Article		
            </a>
        </li>
         <li <?php if ($this->uri->segment(1) == "page") echo ' class="active"'; ?>>
            <a href="<?php echo site_url('page'); ?>">
                <i class="icon-bookmark"></i>
                Page		
            </a>
        </li>

        

    </ul>	

</div>