<?php get_header(); ?>

<div class="container wrapper">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div id="primary" class="content-area pr-lg-5">
                <main id="main" class="site-main" role="main">
                    <?php 
                        if ( have_posts() ) :
                            while (have_posts()) : the_post(); 
                                get_template_part( 'partials/content', get_post_format() );
                            endwhile;

                            the_posts_pagination( array(
                                'prev_text' => '«',
                                'next_text' => '»'
                            ) );
                        else: ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'awesomedrink' ); ?></p>
                        <?php endif; ?>
                </main>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>