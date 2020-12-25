<?php
if (!class_exists('Hashone_Welcome')) :

    class Hashone_Welcome {

        public $tab_sections = array();
        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information
        public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins
        public $pro_plugins = array(); // For Storing the list of the Recommended Pro Plugins

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables * */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /** Define Tabs Sections * */
            $this->tab_sections = array(
                'getting_started' => esc_html__('Getting Started', 'magazine-edge'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'magazine-edge'),
                'support' => esc_html__('Support', 'magazine-edge')
            );

            /** List of Recommended Free Plugins * */
            $this->free_plugins = array(
                'contact-form-7' => array(
                    'name' => 'ProfileGrid – User Profiles, Groups and Communities',
                    'slug' => 'profilegrid-user-profiles-groups-and-communities',
                    'filename' => 'profile-magic'
                ),
                 
				'demo-import' => array(
                    'name' => 'One Click Demo Import',
                    'slug' => 'one-click-demo-import',
                    'filename' => 'one-click-demo-import'
                ),
				'price-table' => array(
                    'name' => 'Price Table',
                    'slug' => 'pricetable-wp',
                    'filename' => 'pricetable-wp'
                )
            );

            /** List of Recommended Pro Plugins * */
            $this->pro_plugins = array();

            /* Theme Activation Notice */
            add_action('admin_notices', array($this, 'hashone_activation_admin_notice'));

            /* Create a Welcome Page */
            add_action('admin_menu', array($this, 'hashone_welcome_register_menu'));

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'hashone_welcome_styles_and_scripts'));

            add_action('wp_ajax_hashone_activate_plugin', array($this, 'hashone_activate_plugin'));
        }

        /** Welcome Message Notification on Theme Activation * */
        public function hashone_activation_admin_notice() {
            global $pagenow;

            if (is_admin() && ('themes.php' == $pagenow) && (isset($_GET['activated']))) {
                ?>
                <div class="notice notice-success is-dismissible"> 
                    <p><?php echo esc_html__('Welcome! Thank you for choosing Magazine Edge. Please make sure you visit Settings Page to get started with Magazine Edge theme.', 'magazine-edge'); ?></p>
                    <p><a class="button button-primary" href="<?php echo admin_url('/themes.php?page=hashone-welcome') ?>"><?php echo esc_html__('Let\'s Get Started', 'magazine-edge'); ?></a></p>
                </div>
                <?php
            }
        }

        /** Register Menu for Welcome Page * */
        public function hashone_welcome_register_menu() {
            add_theme_page(esc_html__('Welcome', 'magazine-edge'), esc_html__('Magazine Edge Setting', 'magazine-edge'), 'edit_theme_options', 'hashone-welcome', array($this, 'hashone_welcome_screen'));
        }

        /** Welcome Page * */
        public function hashone_welcome_screen() {
            $tabs = $this->tab_sections;
            ?>
            <div class="wrap about-wrap access-wrap">
                <div class="abt-promo-wrap clearfix">
                    <div class="abt-theme-wrap">
                        <h1><?php
                            printf(// WPCS: XSS OK.
                                    /* translators: 1-theme name, 2-theme version */
                                    esc_html__('Welcome to %1$s - Version %2$s', 'magazine-edge'), $this->theme_name, $this->theme_version);
                            ?></h1>
                        <div class="about-text"><?php echo esc_html__('Magazine Edge is a powerful multipurpose WordPress Theme that is packed with lots of features for creating a full packaged website that can be used by a business, restaurant, freelancers, photographers, bloggers, education firms, non-profit organization and creative agencies. The theme is fully responsive and mobile friendly and has lots of customization possibilities with various home page sections to showcase varieties of content. The theme can be used to set up a single page website with animated content that adds charm to the website with additional parallax effect. The theme is SEO friendly, Translation ready, Woo Commerce compatible and integrates seamlessly with almost all popular WordPress Plugins. When paired with Profileagrid, the theme can work wonders. The functionalities of PG compliments the theme exceptionally well. ProfileGrid is a striking WordPress user profile and community-based plugin. The plugin has some of the most versatile features that allow you to create any number of User Profiles, and Groups for your WordPress website. In addition to that, you can create Communities to support and engage your subscribers. Memberships, Content Restriction, Messaging, WooCommerce Integration are just a few more to name in the list. Magazine Edge powered with ProfileGrid makes the process of monetizing your magazine easier and better.', 'magazine-edge'); ?></div>
                    </div>
                </div>

                <div class="nav-tab-wrapper clearfix">
                    <?php foreach ($tabs as $id => $label) : ?>
                        <?php
                        $section = isset($_GET['section']) ? $_GET['section'] : 'getting_started'; // Input var okay.
                        $nav_class = 'nav-tab';
                        if ($id == $section) {
                            $nav_class .= ' nav-tab-active';
                        }
                        ?>
                        <a href="<?php echo esc_url(admin_url('themes.php?page=hashone-welcome&section=' . $id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
                            <?php echo esc_html($label); ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="welcome-section-wrapper">
                    <?php $section = isset($_GET['section']) ? $_GET['section'] : 'getting_started'; // Input var okay.  ?>

                    <div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
                        <?php require_once get_template_directory() . '/welcome/sections/' . $section . '.php'; ?>
                    </div>
                </div>
            </div>
            <?php
        }

        /** Enqueue Necessary Styles and Scripts for the Welcome Page * */
        public function hashone_welcome_styles_and_scripts($hook) {
            if ('appearance_page_hashone-welcome' == $hook) {
                $importer_params = array(
                    'installing_text' => esc_html__('Installing Demo Importer Plugin', 'magazine-edge'),
                    'activating_text' => esc_html__('Activating Demo Importer Plugin', 'magazine-edge'),
                    'importer_page' => esc_html__('Go to Demo Importer Page', 'magazine-edge'),
                    'importer_url' => admin_url('themes.php?page=hdi-demo-importer'),
                    'error' => esc_html__('Error! Reload the page and try again.', 'magazine-edge'),
                );
                wp_enqueue_style('hashone-welcome', get_template_directory_uri() . '/welcome/css/welcome.css');
                wp_enqueue_style('plugin-install');
                wp_enqueue_script('plugin-install');
                wp_enqueue_script('updates');
                wp_enqueue_script('hashone-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array(), '1.0');
                wp_localize_script('hashone-welcome', 'importer_params', $importer_params);
            }
        }

        // Check if plugin is installed
        public function hashone_check_installed_plugin($slug, $filename) {
            return file_exists(ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php') ? true : false;
        }

        // Check if plugin is activated
        public function hashone_check_plugin_active_state($slug, $filename) {
            return is_plugin_active($slug . '/' . $filename . '.php') ? true : false;
        }

        /** Generate Url for the Plugin Button * */
        public function hashone_plugin_generate_url($status, $slug, $file_name) {
            switch ($status) {
                case 'install':
                    return wp_nonce_url(
                            add_query_arg(
                                    array(
                        'action' => 'install-plugin',
                        'plugin' => esc_attr($slug)
                                    ), network_admin_url('update.php')
                            ), 'install-plugin_' . esc_attr($slug)
                    );
                    break;

                case 'inactive':
                    return add_query_arg(array(
                        'action' => 'deactivate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;

                case 'active':
                    return add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;
            }
        }

        public function hashone_activate_plugin() {
            $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
            $file = isset($_POST['file']) ? $_POST['file'] : '';
            $success = false;

            if (!empty($slug) && !empty($file)) {
                $result = activate_plugin($slug . '/' . $file . '.php');

                if (!is_wp_error($result)) {
                    $success = true;
                }
            }
            echo wp_json_encode(array('success' => $success));
            die();
        }

    }

    new Hashone_Welcome();

endif;