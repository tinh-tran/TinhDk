<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/resume.css"/>
</head>

<body>
<!--


____      __              _______ 
 /  '  / /  )/__/    /| )(_   /   
(  //)/)/(_//  ) .  / |/ /__ (    
                                  

✿ Please feel free to connect with me: https://www.facebook.com/tinh.dk ✿
-->
<header class="site-navigation">
    <div class="nav-container">
        <div class="nav-brand underline">
            <a href="<?php echo home_url('/') . 'resume' ?>">
                Tat <strong>Vi Quyen</strong>
            </a>
        </div>
        <i class="nav-toggle fa fa-2x fa-bars" aria-hidden="true" id="toggle-open"></i>
        <nav class="nav-menu">
            <div class="nav-mobile-header">
                <span class="primary">Tinh</span>
                <strong class="secondary">DK</strong>
                <i class="nav-toggle fa fa-2x fa-times" aria-hidden="true" id="toggle-close"></i>
            </div>
            <a href="#skills">Skills</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#side-projects">Side Projects</a>
            <a href="#contact">Contact</a>
        </nav>
    </div>
</header>

<section id="introduction">
    <div class="about">
        <h1 class="q-name">Trần Lục Long Tính</h1>
        <h2 class="q-job-title">< Web Developer /></h2>
        <p class="q-intro-text">My name is Tính and I am a web developer, currently living in HCMC, Vietnam. I am very
            passionate about Web Development, and strive to better myself as a developer, and the development community
            as a whole.<br/><i class="fas fa-terminal"></i> <i class="fas fa-heart"></i></p>
    </div>
    <div class="button-cv">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myCV">My CV <i
                    class="fas fa-chevron-circle-right"></i>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myCV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src=""/>
                    <a href=""
                       class="btn btn-outline-primary mt-2">
                        <strong>DOWNLOAD .PDF (239 KB)</strong>
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="modal-footer-close">
                <a class="btn-close" data-dismiss="modal"><i class="far fa-times-circle fa-2x"></i></a>
            </div>
        </div>
    </div><!-- end modal-->
    <div class="scroll_me">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>

<section id="skills">
    <div class="is-primary">
        <h1 class="section-title">Skills</h1>
        <p class="description">I specialize in both back & front-end development with knowledge in system
            administration.</p>
    </div>
    <div class="container is-content">
        <div class="row">
            <div class="block-skill col-12 col-lg-4 border-right">
                <div class="skill-icon"><i class="fas fa-database"></i></div>
                <h3>Back-end Stacks</h3>
                <ul class="skill-list">
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>Laravel Framework</li>
                    <li>Wordpress CMS</li>
                </ul>
            </div>

            <div class="block-skill col-12 col-lg-4 border-right">
                <div class="skill-icon"><i class="fas fa-vector-square"></i></div>
                <h3>Front-end Stacks</h3>
                <ul class="skill-list">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>jQuery</li>
                    <li>Bootstrap Framework</li>
                </ul>
            </div>

            <div class="block-skill col-12 col-lg-4">
                <div class="skill-icon"><i class="fas fa-terminal"></i></div>
                <h3>Dev Tools</h3>
                <ul class="skill-list">
                    <li>Photoshop</li>
                    <li>Illustrator</li>
                    <li>PHPStorm</li>
                    <li>Sublime Text 3</li>
                    <li>Git Control</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="line-break mx-auto"></div>

<section id="portfolio">
    <h1 class="section-title">Portfolio</h1>
    <p class="description">Some of my recent works / projects <i class="fas fa-laptop-code"></i></p>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 project-item">
                <div class="preview">
                    <div class="preview-top">
                        <span class="circle-ico ico-red"></span>
                        <span class="circle-ico ico-yellow"></span>
                        <span class="circle-ico ico-green"></span>
                        <p class="preview-url">
                            <span class="fa fa-globe mr-1"></span>
                            <a href="http://youthhuflit.com/" target="_blank">http://youthhuflit.com</a>
                        </p>
                    </div>
                    <div class="preview-img">
                        <a href="http://youthhuflit.com/" target="_blank">
                            <img src="https://tatviquyen.name.vn/wp-content/uploads/2018/09/youth-huflit-screenshot.png"
                                 alt="YouthHuflit">
                        </a>
                    </div>
                </div>
                <div class="project-info">
                    <h3>YouthHuflit</h3>
                    <p>A website for HUFLIT students conveniently updates the information of the union .</p>
                </div>
            </div>

            <div class="col-12 col-lg-6 project-item">
                <div class="preview">
                    <div class="preview-top">
                        <span class="circle-ico ico-red"></span>
                        <span class="circle-ico ico-yellow"></span>
                        <span class="circle-ico ico-green"></span>
                        <p class="preview-url">
                            <span class="fa fa-globe mr-1"></span>
                            <a href="http://qlmobile.gear.host" target="_blank">http://qlmobile.gear.host</a>
                        </p>
                    </div>
                    <div class="preview-img">
                        <a href="http://qlmobile.gear.host" target="_blank">
                            <img src="https://tatviquyen.name.vn/wp-content/uploads/2017/05/qlmobile.png"
                                 alt="QLMobile">
                        </a>
                    </div>
                </div>
                <div class="project-info">
                    <h3>QLMobile</h3>
                    <p>My first project at university, built from scratch with pure PHP & MySQL. Check more at <a
                                href="https://tatviquyen.name.vn/showcase-web-projects-sinh-vien/"
                                target="_blank">here</a>!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="side-projects">
    <h1 class="section-title">Side Pr<i class="fab fa-github"></i>jects</h1>
    <p class="description">I spend my free time to code and experiment with programming and achieve new stacks. Beside
        coding, I also <a href="https://tatviquyen.name.vn/" target="_blank">write blog</a> to share my knowledge and
        something interesting. <i class="far fa-comments"></i></p>
    <div class="container">
        <table>
            <thead>
            <tr>
                <th>Project</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="https://tatviquyen.name.vn/" target="_blank">TVQZone</a></td>
                <td>My personal blog built with Wordpress CMS
                    with customized theme based on Bootstrap 4. -
                    <a class="github" href="https://github.com/tvqqq/tvqzone-wp-theme" target="_blank">Github</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<div class="line-break mx-auto"></div>

<section id="contact" class="container">
    <span>Interested in working together? Let's chat.</span>
    <ul class="contact-list">
        <li><a href="mailto:tvq9612@gmail.com">tvq9612@gmail.com</a></li>
        <li><a href="https://www.linkedin.com/in/tvq" target="_blank">linkedin.com/in/tvq</a></li>
        <li><a href="https://m.me/tvqqq" target="_blank">m.me/tvqqq</a></li>
    </ul>
</section>

<footer>
    <img src="<?php echo get_template_directory_uri() ?>/img/tvq-white.png" width="100px"/>
    <div class="quote my-3">"Stop dreaming, start doing"</div>
    <div class="text-updated">Last updated: 20 September 2018</div>
</footer>

<script src="<?php echo get_template_directory_uri() ?>/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/resume.js"></script>
</body>
</html>