<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BS4WP
 */
?>

<?php
/* Side bar of home */
if (is_home()) { ?>
    <div class="col-12 col-lg-4 mt-3 home-sidebar">
        <div class="row no-gutters">
            <div class="col-10 col-info">
                <div class="particletext confetti">
                    <div class="info-me-im">HELLOOOO! I'M</div>
                    <div class="info-me-name mb-1">Trần Lục Long Tính/ MAX</div>
                    <div class= "info-me-img">
                         <img alt="" src="<?php echo get_option( 'tinhdk_useravatar' ); ?>" srcset="<?php echo get_option( 'tinhdk_useravatar' ); ?> 2x" class="avatar avatar-96 photo" height="96" width="96">
                    </div>
                    <div class="info-me-job-location"> 
                        <div class="info-me-job">
                            <i class="fas fa-code-branch"></i>
                            <span class="text-muted">a</span> <span class="info-text-highlight">web developer</span>
                        </div>
                        <div class="info-me-location mt-1">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="text-muted">from</span> <span class="info-text-highlight">HCMC</span>
                        </div>
                    </div>
                    <div class="works_item_title mt-2">
                        <a class="animated jello" href="<?php echo home_url('/') . '#' ?>">
                            <span><strong><i class="fas fa-file-alt"></i></strong> my resume</span>
                        </a>
                    </div>
                </div><!-- /particletext confetti -->
            </div><!-- /col-10 -->
            <div class="col-2 col-social">
                <ul class="social-link">
                    <li><a href="<?php echo get_option( 'tinhdk_facebook' ); ?>" target="_blank"><i class="fab fa-facebook fa-2x"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    title="fb/tinh.dk"></i></a></li>
                    <li><a href="" target="_blank"><i class="fab fa-linkedin fa-2x"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    title="in/tvq"></i></a></li>
                    <li><a href="<?php echo get_option( 'tinhdk_github' ); ?>" target="_blank"><i class="fab fa-github fa-2x"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="left"
                                                                                    title="github/tinhdk1"></i></a></li>
                    <li> <a data-balloon="Chế độ ngày / đêm" data-balloon-pos="up" href="javascript:void(0)" class="set-view-mode external"><i class="far fa-moon fa-2x"></i></a> <li>
                </ul>
            </div><!-- /col-2 -->
        </div><!-- /row -->

        <div class="mt-2 text-muted text-center">
            <i class="fas fa-ellipsis-h"></i>
        </div>
            <div class="textwidget custom-html-widget">
                <div class='like-vote'>
                    <h5 class='like-title'>Do You Like Me?</h5>
                    <div class='like-count'>
                        <i class="fas fa-heart"></i><span></span>
                    </div>
                </div>
            </div>
        <div class="categories text-center">
            <h5 class="dropdown-header"><i class="fas fa-hdd"></i> CATEGORIES</h5>
            <a class="badge-blogging" href="<?php echo home_url('/') . 'blogging' ?>">Blogging
                <span class="badge badge-cate">
							<?php echo get_category(3)->count; ?>
						</span>
            </a>
            <a class="badge-coding" href="<?php echo home_url('/') . 'coding' ?>">Coding
                <span class="badge badge-cate">
							<?php echo get_category(2)->count; ?>
						</span>
            </a>
            <a class="badge-sharing" href="<?php echo home_url('/') . 'sharing' ?>">Sharing
                <span class="badge badge-cate">
							<?php echo get_category(1)->count; ?>
						</span>
            </a>
        </div><!-- /categories -->
        <div class="widget-border-event mt-3">
            <?php echo widget_event(); ?>
        </div>
        <div class="mt-2 text-muted text-center">
            <i class="fas fa-ellipsis-h"></i>
        </div>
        <aside id="secondary" class="widget-area" role="complementary">
            <h3 class="widget-title"><span>Top Posts</span></h3>
            <?php echo top10_post(); ?>

            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
    </div><!-- /home-sidebar -->
<?php } /* Side bar of post, page, ... */
else { ?>
    <div class="col-12 col-lg-3 mt-3">
        <aside id="secondary" class="widget-area" role="complementary">
            <h3 class="widget-title"><span>Random Posts</span></h3>
            <?php echo random_post(); ?>

            <?php dynamic_sidebar('sidebar-post'); ?>
        </aside>
    </div>
<?php } // end else ?>

</div>
<!-- end .container-->