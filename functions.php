<?php
/* functions.php */
function fn_theme_scripts() {
    // Base directory for CSS files
    $css_base_dir = get_template_directory_uri() . '/css/plugins/';

    // Base directory for general CSS files
    $css_dir = get_template_directory_uri() . '/css/';

    // Enqueue each stylesheet
    wp_enqueue_style('animate', $css_base_dir . 'animate.min.css');
    wp_enqueue_style('before-after', $css_base_dir . 'before-after.css');
    wp_enqueue_style('bootstrap', $css_base_dir . 'bootstrap.min.css');
    wp_enqueue_style('carex-icon', $css_base_dir . 'carex-icon.css');
    wp_enqueue_style('font-awesome', $css_base_dir . 'font-awesome.min.css');
    wp_enqueue_style('magnific-popup', $css_base_dir . 'magnific-popup.css');
    wp_enqueue_style('owl-carousel', $css_base_dir . 'owl.carousel.min.css');
    wp_enqueue_style('owl-theme-default', $css_base_dir . 'owl.theme.default.min.css');
    wp_enqueue_style('select2', $css_base_dir . 'select2.css');
    wp_enqueue_style('themify-icons', $css_base_dir . 'themify-icons.css');
    wp_enqueue_style('vegas-slider', $css_base_dir . 'vegas.slider.min.css');
    wp_enqueue_style('youtube-popup', $css_base_dir . 'YouTubePopUp.css');

    // Enqueue the general plugins.css file
    wp_enqueue_style('plugins', $css_dir . 'plugins.css');
    wp_enqueue_style('style', $css_dir . 'style.css');
}

// Hook into the wp_enqueue_scripts action to add stylesheets
add_action('wp_enqueue_scripts', 'fn_theme_scripts');


function fn_theme_supports() {
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("html5", array("search-form"));
    add_theme_support("custom-logo");
}

add_action("after_setup_theme", 'fn_theme_supports');

function enqueue_custom_scripts() {
    // Base directory for JavaScript files
    $js_base_dir = get_template_directory_uri() . '/js/';

    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('before-after', $js_base_dir . 'before-after.js', array(), null, true);
    wp_enqueue_script('bootstrap', $js_base_dir . 'bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('datepicker', $js_base_dir . 'datepicker.js', array('jquery'), null, true);
    wp_enqueue_script('imagesloaded', $js_base_dir . 'imagesloaded.pkgd.min.js', array(), null, true);
    wp_enqueue_script('jquery-3.7.1', $js_base_dir . 'jquery-3.7.1.min.js', array(), null, true);
    wp_enqueue_script('jquery-migrate-3.4.1', $js_base_dir . 'jquery-migrate-3.4.1.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-isotope', $js_base_dir . 'jquery.isotope.v3.0.2.js', array('jquery'), null, true);
    wp_enqueue_script('magnific-popup', $js_base_dir . 'jquery.magnific-popup.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-stellar', $js_base_dir . 'jquery.stellar.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-waypoints', $js_base_dir . 'jquery.waypoints.min.js', array('jquery'), null, true);
    wp_enqueue_script('modernizr', $js_base_dir . 'modernizr-2.6.2.min.js', array(), null, true);
    wp_enqueue_script('owl-carousel', $js_base_dir . 'owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('popper', $js_base_dir . 'popper.min.js', array(), null, true);
    wp_enqueue_script('scrollIt', $js_base_dir . 'scrollIt.min.js', array('jquery'), null, true);
    wp_enqueue_script('select2', $js_base_dir . 'select2.js', array('jquery'), null, true);
    wp_enqueue_script('sticky-kit', $js_base_dir . 'sticky-kit.min.js', array('jquery'), null, true);
    wp_enqueue_script('vegas-slider', $js_base_dir . 'vegas.slider.min.js', array('jquery'), null, true);
    wp_enqueue_script('YouTubePopUp', $js_base_dir . 'YouTubePopUp.js', array('jquery'), null, true);
    wp_enqueue_script('custom', $js_base_dir . 'custom.js', array('jquery'), null, true);

    // Localize script with data
    wp_localize_script('custom', 'themeData', array(
        'logoLight' => get_template_directory_uri() . '/img/logo-light.svg',
        'logoDark' => get_template_directory_uri() . '/img/logo-dark.svg',
    ));
}

// Hook into the wp_enqueue_scripts action to add scripts
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function register_project_post_type() {
    $labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'edit_item'          => 'Edit Project',
        'new_item'           => 'New Project',
        'view_item'          => 'View Project',
        'search_items'       => 'Search Projects',
        'not_found'          => 'No projects found',
        'not_found_in_trash' => 'No projects found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'projects'),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_rest'        => true,
    );

    register_post_type('project', $args);
}
add_action('init', 'register_project_post_type');

// Add custom meta box for project details
function add_project_meta_box() {
    add_meta_box(
        'project_details',
        'Project Details',
        'render_project_meta_box',
        'project',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_meta_box');

// Render meta box content
function render_project_meta_box($post) {
    // Retrieve current values
    $project_html = get_post_meta($post->ID, '_project_html', true);
    
    // Add nonce for security
    wp_nonce_field('project_meta_box', 'project_meta_box_nonce');
    
    // HTML for the meta box
    ?>
    <p>
        <label for="project_html">Project HTML:</label><br>
        <textarea name="project_html" id="project_html" rows="5" cols="30" style="width:100%;"><?php echo esc_textarea($project_html); ?></textarea>
    </p>
    <?php
}

// Save meta box data
function save_project_meta($post_id) {
    // Check if nonce is set and valid
    if (!isset($_POST['project_meta_box_nonce']) || !wp_verify_nonce($_POST['project_meta_box_nonce'], 'project_meta_box')) {
        return;
    }
    
    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save project HTML
    if (isset($_POST['project_html'])) {
        update_post_meta($post_id, '_project_html', wp_kses_post($_POST['project_html']));
    }
}
add_action('save_post_project', 'save_project_meta');

// Register project category taxonomy
function register_project_category_taxonomy() {
    $labels = array(
        'name'              => 'Project Categories',
        'singular_name'     => 'Project Category',
        'search_items'      => 'Search Project Categories',
        'all_items'         => 'All Project Categories',
        'parent_item'       => 'Parent Project Category',
        'parent_item_colon' => 'Parent Project Category:',
        'edit_item'         => 'Edit Project Category',
        'update_item'       => 'Update Project Category',
        'add_new_item'      => 'Add New Project Category',
        'new_item_name'     => 'New Project Category Name',
        'menu_name'         => 'Categories',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('project_category', 'project', $args);
}
add_action('init', 'register_project_category_taxonomy');

?>
