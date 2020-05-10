<?php get_header(); ?>

<div class="container wrapper">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div id="primary" class="content-area pr-lg-5">
                <main id="main" class="site-main" role="main">
                    <?php 
                        if ( have_posts() ) :
                            while (have_posts()) : the_post(); 
                                get_template_part( 'partials/content', 'single' ); ?>
                                <div class="row nav-wrapper">
                                    <div class="col-6"><?php previous_post_link(); ?></div>
                                    <div class="col-6 text-right"><?php next_post_link(); ?></div>
                                </div>
                                <?php
                                // If comments are open or have at least one comment, load up the comment template
                                if ( comments_open() || get_comments_number () ) :
                                    comments_template ();
                                endif;
                            endwhile;
                        endif; ?>
                </main>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>