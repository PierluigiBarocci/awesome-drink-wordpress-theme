        <footer class="site-footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-4 text-center brand-container">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title footer-brand" rel="home"><?php bloginfo( 'name' )?></a>
                        </div>
                        <div class="col-md-4 order-md-first text-md-left">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'secondary',
                                    'container_class' => 'footer-menu-container'
                                ) ); 
                            ?>
                        </div>
                        <div class="col-md-4 order-md-last text-md-right">
                            <div class="social">
                                <a href="https://twitter.com/" target="_blank"><span class="fab fa-twitter"></span></a>
                                <a href="https://facebook.com/" target="_blank"><span class="fab fa-facebook"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="site-info text-center">
                        <p class="copyright">© 2020 Developed by Pierluigi Barocci</p>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
