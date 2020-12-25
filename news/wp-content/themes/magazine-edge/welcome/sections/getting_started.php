<div class="getting-started-top-wrap clearfix">
    <div class="theme-steps-list">
        <div class="theme-steps">
            <h3><?php echo esc_html__('Step 1 - Create a new page with "Home Page" Template', 'magazine-edge'); ?></h3>
            <ol>
                <li><?php echo esc_html__('Create a new Post (any title like You like )', 'magazine-edge'); ?></li>
                <li><?php echo esc_html__('Assign Category To Post, and publish Post', 'magazine-edge'); ?> </li>
                <li><?php echo esc_html__('Select Category from Customizer Settings and design Website', 'magazine-edge'); ?></li>
            </ol>
            <a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>"><?php echo esc_html__('Create New Page', 'magazine-edge'); ?></a>
        </div>

        <div class="theme-steps">
            <h3><?php echo esc_html__('Step 2 - Ensure Your Page Home Page is set Your latest posts', 'magazine-edge'); ?></h3>
            <ol>
                <li><?php echo esc_html__('Go to Settings > Reading > General settings > Your homepage displays', 'magazine-edge'); ?></li>
                <li><?php echo esc_html__('Set "Your homepage displays" to Your latest posts', 'magazine-edge'); ?></li>
                <li><?php echo esc_html__('Save changes', 'magazine-edge'); ?></li>
            </ol>
            <a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'magazine-edge'); ?></a>
        </div>

        <div class="theme-steps">
            <h3><?php echo esc_html__('Step 3 - Customizer Options Panel', 'magazine-edge'); ?></h3>
            <p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'magazine-edge'); ?></p>
            <a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'magazine-edge'); ?></a>
        </div>

    </div>

    <div class="theme-image">
        <h3><?php echo esc_html__('Demo Importer', 'magazine-edge'); ?><a href="http://ratinatemplates.com/demo/<?php echo get_option('stylesheet'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('View Demo', 'magazine-edge'); ?></a></h3>
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_html__('HashOne Demo', 'magazine-edge'); ?>">

        <div class="theme-import-demo">
            <?php
            $hashone_demo_importer_slug = 'hashthemes-demo-importer';
            $hashone_demo_importer_filename = 'hashthemes-demo-importer';

            if ($this->hashone_check_installed_plugin($hashone_demo_importer_slug, $hashone_demo_importer_filename) && !$this->hashone_check_plugin_active_state($hashone_demo_importer_slug, $hashone_demo_importer_filename)) :
                $hashone_import_class = 'button button-primary hashone-activate-plugin';
                $hashone_import_button_text = esc_html__('Activate Demo Importer Plugin', 'magazine-edge');
            elseif ($this->hashone_check_installed_plugin($hashone_demo_importer_slug, $hashone_demo_importer_filename)) :
                $hashone_import_class = 'button button-primary';
                $hashone_import_button_text = esc_html__('Go to Demo Importer Page', 'magazine-edge');
            else :
                $hashone_import_class = 'button button-primary hashone-install-plugin';
                $hashone_import_button_text = esc_html__('Install Demo Importer Plugin', 'magazine-edge');
            endif;
            ?>
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'magazine-edge'); ?></p>
        </div>
    </div>
</div>