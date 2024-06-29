    <!DOCTYPE html>
    <html <?php language_attributes(); ?> >
    <head>
        <meta charset="<? bloginfo('charset')?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" href="img/logo.svg" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Preloader -->
        <div class="preloader-bg"></div>
        <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader"> <span></span> </div>
            </div>
        </div>
        <!-- Progress scroll totop -->
        <div class="progress-wrap cursor-pointer">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- Cursor -->
        <div class="cursor js-cursor"></div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <div class="logo-wrapper">
                    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" class="logo-img" alt="">
                    </a>
                    <!-- <a class="logo" href="index.html"> <h2>CARE<span>X</span></h2> </a> -->
                </div>
                <!-- Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span> </button>
                <!-- Menu -->
                <div class="collapse scroll-init navbar-collapse" id="navbar">
                <?php
// Check if it's the main page
if (is_front_page()) {
    // Display navigation for the main page
    ?>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#" data-scroll-nav="0">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="1">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="2">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="3">Projects</a></li>
        <li class="nav-item" style="margin-right: 60px;"><a class="nav-link" href="#" data-scroll-nav="4">Clients</a></li>
        <li class="nav-item"><a class="nav-link" href="#" data-scroll-nav="5">Contact</a></li>
    </ul>
    <?php
} else {
    // Display navigation for other pages
    ?>
    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo esc_url( home_url( '/' ) ); ?>#section-home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>#section-about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>#section-services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>#section-projects">Projects</a></li>
                    <li class="nav-item" style="margin-right: 60px;"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>#section-clients">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>#section-contact">Contact</a></li>
                </ul>
    <?php
}
?>
                    <div class="navbar-right">
                        <div class="wrap">
                            <div class="icon"> <i class="carex-phone-call"></i> </div>
                            <div class="text">
                                <p>Need help?</p>
                                <h5><a href="tel:8551004444">*2354</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Slider -->
        <?php wp_footer(); ?>
        <main>