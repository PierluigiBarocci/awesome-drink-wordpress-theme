<article id="post-<?php the_ID(); ?>" <?php post_class('awesomedrink-quote-format'); ?>>
    <header class="entry-header text-center">
        <h1 class="quote-content">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_excerpt(); ?></a>
        </h1>
        <?php the_title( '<h2 class="quote-author">- ', ' -</h2>' ); ?>
    </header>
</article>