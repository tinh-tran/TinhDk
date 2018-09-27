<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BS4WP
 */

?>
</div>
<!-- #content -->

<div class="back-to-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>

<footer id="colophon" class="site-footer bd-footer text-muted" role="contentinfo">
    <div class="container">
        <div class="site-info">
            <p>Copyright
                <i class="fa fa-copyright" aria-hidden="true"></i>
                <?php echo date('Y') ?> -
                <a href="<?php echo home_url() ?>" title="<?php bloginfo('name') ?>">
                    <?php bloginfo('name') ?>
                </a>.
                <i class="fa fa-coffee text-info" id="heartPulse" aria-hidden="true"></i> +
                <i id="heartPulse" class="fa fa-heart animated pulse" aria-hidden="true"></i> =
                <img class="tvqzone-label" src="<?php echo get_stylesheet_directory_uri() ?>/img/tinhdkLogo.png"
                     alt="TinhDk">.
            </p>
            <p>Inspired by
                <a href="https://v4-alpha.getbootstrap.com/" target="_blank">Bootstrap v4.0.0-alpha.6</a>.
                Proudly powered by
                <a href="https://wordpress.org/" target="_blank">
                    <i class="fab fa-wordpress-simple"></i>
                </a>.
            </p>
        </div>
        <!-- .site-info -->
    </div>
    <!-- .container-->
</footer>
<!-- #colophon -->
<div class="stripes"></div>
</div>
<!-- #page -->

<?php wp_footer(); ?>
</body>

</html>