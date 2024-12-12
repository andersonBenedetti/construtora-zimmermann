<?php
// Template Name: Contato
?>

<?php get_header(); ?>

<?php
$infos = [
    ['title' => 'Matriz', 'img' => 'contato.webp', 'alt' => 'Foto da Matriz', 'link-location' => '#', 'location' => 'R. 232, n 245 - meia praia, itapema/SC 88220-000', 'link-email' => '#', 'email' => 'contato@construtorazimmermann.com.br', 'link-tel' => '#', 'tel' => '(47) 3268 1000'],
    ['title' => 'Filial São José', 'img' => 'contato.webp', 'alt' => 'Foto da Filial São José', 'link-location' => '#', 'location' => 'R. Ademar da Silva, n° 512 - Campinas, São José/SC 88101-001', 'link-email' => '#', 'email' => 'contato@construtorazimmermann.com.br', 'link-tel' => '#', 'tel' => '(47) 3268 1000'],
];
?>

<main id="pg-contact">

    <section class="intro-top"></section>

    <section class="content container">
        <h1>Contato</h1>
        <?php
        foreach ($infos as $info): ?>
            <div class="infos">
                <div class="img">
                    <h2><?php echo esc_attr($info['title']); ?></h2>
                    <img class="img" src="<?php echo get_stylesheet_directory_uri() . "/img/{$info['img']}"; ?>"
                        alt="<?php echo esc_attr($info['alt']); ?>">
                </div>
                <div class="links">
                    <a href="<?php echo esc_attr($info['link-location']); ?>">
                        <?php include get_stylesheet_directory() . '/img/icons/location.svg'; ?>
                        <p><?php echo esc_attr($info['location']); ?></p>
                    </a>
                    <a href="<?php echo esc_attr($info['link-email']); ?>">
                        <?php include get_stylesheet_directory() . '/img/icons/email.svg'; ?>
                        <p><?php echo esc_attr($info['email']); ?></p>
                    </a>
                    <a href="<?php echo esc_attr($info['link-tel']); ?>">
                        <?php include get_stylesheet_directory() . '/img/icons/tel.svg'; ?>
                        <p><?php echo esc_attr($info['tel']); ?></p>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="social container">
        <h2 class="title">Nos siga nas redes sociais</h2>
        <div>
            <a href="#">
                <?php include get_stylesheet_directory() . '/img/icons/linkedin.svg'; ?>
            </a>
            <a href="#">
                <?php include get_stylesheet_directory() . '/img/icons/instagram.svg'; ?>
            </a>
            <a href="#">
                <?php include get_stylesheet_directory() . '/img/icons/facebook.svg'; ?>
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>