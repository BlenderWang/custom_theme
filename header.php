<?php
/**
 * @subpackage Elling_theme
 * @since 2021
 */
?><!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Alexander Elling</title>

        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/bootstrap.bundle.min.js'; ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js"></script>
        
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/bootstrap.css'; ?>">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        
        <link
            rel="shortcut icon"
            href="<?php echo get_stylesheet_directory_uri().'/images/alex_logo_portfolio.svg'; ?>"
            type="image/x-icon"
        />
        <script
            src="https://kit.fontawesome.com/3e27283071.js"
            crossorigin="anonymous"
        ></script>
    </head>

    <body>
        <div class="container-fluid overflow-hidden px-4 bg-light">
            <main class="row">
                <nav class="navbar burger-menu pt-3 position-fixed">
                    <div class="container-fluid">
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarToggleMenuContent"
                            aria-controls="navbarToggleMenuContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </nav>