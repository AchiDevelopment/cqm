<?php get_header(); ?>
<!-- taxonomy-project_category.php -->
<section class="section-padding all-projects">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 style="color:#fff"><?php single_term_title(); ?></h2>
            </div>
        </div>
        <div class="row gallery-items">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    // Get the categories associated with the current post
                    $categories = get_the_terms(get_the_ID(), 'project_category');
                    $category_class = '';

                    // Determine the category class for filtering
                    if ($categories) {
                        foreach ($categories as $category) {
                            $category_class .= ' ' . $category->slug;
                        }
                    }

                    // Initialize $category_list variable
                    $category_list = '';

                    // Set $category_list if categories exist
                    if (!empty($categories)) {
                        $category_list = esc_html($categories[0]->name);
                    }
                    ?>
                    <div class="col-lg-4 col-md-6 gallery-masonry-wrapper single-item <?php echo esc_attr($category_class); ?>">
                        <div class="gallery-box">
                            <div class="gallery-img img-grayscale">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        $thumbnail_attributes = array(
                                            'class' => 'img-fluid mx-auto d-block',
                                            'alt'   => get_the_title(),
                                            'style' => 'min-height: 250px; max-height: 250px;',
                                        );
                                        the_post_thumbnail('full', $thumbnail_attributes);
                                        ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="gallery-masonry-item-img">
                                <?php if ($category_list) : ?>
                                    <span class="category"><a><?php echo $category_list; ?></a></span>
                                <?php endif; ?>
                                <h2 class="custome_title"><?php the_title(); ?></h2>
                                <a href="<?php the_permalink(); ?>" class="button-1"> Learn More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('No projects found in this category.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
