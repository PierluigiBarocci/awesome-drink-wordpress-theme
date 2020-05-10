<?php get_header(); ?>

<div class="container wrapper">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <section class="error-404 text-center">
                        <header class="page-header">
                            <h1 class="page-title">
                                <?php _e( '404: Page not found.', 'awesomedrink'); ?>
                            </h1>
                        </header>
                        <div class="page-content">
                            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'awesomedrink'); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>