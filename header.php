<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <title>
        <?php if (is_front_page() || is_home()) {
            echo get_bloginfo('name');
        } else {
            echo wp_title('');
        } ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vue.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div id="app">

        <header id="header" v-bind:class="{ 'header-static': !isScrolled, 'header-scrolled': isScrolled }">
            <div class="header-static" v-bind:class="{ hidden: isScrolled }">
                <div class="container">
                    <div class="content">
                        <a href="/" class="logo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-header.webp"
                                alt="Logo Construtora Zimmermann">
                        </a>
                        <div class="menu-header" :class="{ active: activeMenu }">
                            <button class="btn-menu" @click="activeMenu = !activeMenu">
                                <span></span>
                            </button>
                            <ul class="menu-list">
                                <li><a href="/">Home</a></li>
                                <li><a href="#">Empreendimentos</a></li>
                                <li><a href="#">Sobre nós</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-scrolled" v-bind:class="{ hidden: !isScrolled }">
                <div class="container">
                    <div class="content">
                        <a href="/" class="logo">
                            <?php include get_stylesheet_directory() . '/img/logo-header-active.svg'; ?>
                        </a>
                        <ul class="menu-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Empreendimentos</a></li>
                            <li><a href="#">Sobre nós</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>