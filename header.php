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

        <header id="header">
            <div class="container">
                <a href="/" class="logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-header.webp" alt="Logo SupelPack">
                </a>
                <div class="links">
                    <div class="menu-header" :class="{active: activeMenu}">
                        <button class="btn-menu" @click="activeMenu = !activeMenu">
                            <span></span>
                        </button>
                        <?php
                        wp_nav_menu([
                            'menu' => 'menuHeader',
                            'container' => 'nav',
                            'container_class' => 'menu-list',
                        ]);
                        ?>
                    </div>
                    <a href="#" class="btn">
                        <span>Meu orçamento</span>
                        <?php include get_stylesheet_directory() . '/img/icons/cart-icon.svg'; ?>
                    </a>
                </div>
            </div>
        </header>