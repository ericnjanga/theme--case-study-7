
<footer class="entry-footer">
    <span class="entry-footer__label">
        <?php esc_html_e( 'Categories: ', 'generic' ); ?>
    </span>
    <?php
        include '_category-link.php';
    ?>
    <span class="entry-footer__links">
        <?php the_tags(); ?>
    </span>
    <?php //if ( comments_open() ) { echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'generic' ) ) . '</a></span>'; } ?>
</footer>