<?php get_header(); ?>
<!-- single-project.php -->
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            // Retrieve the necessary data
            $project_html = get_post_meta(get_the_ID(), '_project_html', true);
            $project_categories = get_the_terms(get_the_ID(), 'project_category'); // Replace 'project_category' with your actual taxonomy slug
            $category_list = !empty($project_categories) ? esc_html($project_categories[0]->name) : '';
            ?>
            <section class="blog2 section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="item">
                                        <div class="post-img img-grayscale">
                                            <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('full'); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="post-cont">
                                            <?php if ($category_list) : ?>
                                                <span class="category"><a><?php echo $category_list; ?></a></span>
                                            <?php endif; ?>
                                            <span class="calendar"><?php echo get_the_date('d M, Y'); ?></span>
                                            <h5 class="custome_title"><?php the_title(); ?></h5>
                                            <p><?php the_content(); ?></p>
                                            <?php
                                            // Conditionally display the excerpt
                                            if (has_excerpt()) {
                                                echo '<p>' . get_the_excerpt() . '</p>';
                                            }
                                            ?>
                                            <?php
                                            // Output the project HTML content
                                            if (!empty($project_html)) {
                                                echo wp_kses_post($project_html);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        endwhile;
        ?>
    </main>
</div>

<?php get_footer(); ?>
