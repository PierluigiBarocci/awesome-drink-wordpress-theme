<?php get_header(); ?>

<div class="container wrapper">
    <div class="row">
        <div class="col-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php 
                        if ( have_posts() ) :
                            while (have_posts()) : the_post(); 
                                get_template_part( 'partials/content', 'listofdrinks' );
                            endwhile;
                        endif; ?>                  
                </main>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>