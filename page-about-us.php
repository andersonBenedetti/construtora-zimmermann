<?php
// Template Name: Sobre nós
?>

<?php get_header(); ?>

<?php
$timeline = [
    ['img' => 'atlantis.webp', 'alt' => 'Foto de Atlantis', 'title' => 'Atlantis', 'date' => '2021'],
    ['img' => 'black-piano.webp', 'alt' => 'Foto de Black Piano', 'title' => 'Black Piano', 'date' => '2022'],
    ['img' => 'garden-park.webp', 'alt' => 'Foto de Garden Park', 'title' => 'Garden Park', 'date' => '2022'],
    ['img' => 'infinity-tower.webp', 'alt' => 'Foto de Infinity Tower Flat', 'title' => 'Infinity Tower Flat', 'date' => '2022'],
    ['img' => 'avant-garden.webp', 'alt' => 'Foto de Avant Garden', 'title' => 'Avant Garden', 'date' => '2023'],
];
?>

<main id="pg-about">

    <section class="intro">
        <img class="img" src="<?php echo get_stylesheet_directory_uri() . "/img/sobre-nos.webp"; ?>"
            alt="Imagem Sobre nós">
        <div class="content container">
            <h1>Sobre nós</h1>
        </div>
        <a href="#infos" class="link">desça</a>
    </section>

    <section class="infos container">
        <div class="top">
            <div>
                <h2 class="title">Nossa Essência</h2>
                <img class="img" src="<?php echo get_stylesheet_directory_uri() . "/img/contato.webp"; ?>"
                    alt="Imagem Nossa Essência">
            </div>
            <p>A Construtora Zimmermann acredita que <strong>transformar a vida</strong> das pessoas é um processo que
                vai além de
                construir espaços. Desde <strong>2008</strong>, em Itapema, dedicamo-nos a criar empreendimentos que
                <strong>surpreendem</strong> pela
                <strong>qualidade</strong>, <strong>inovação</strong> e <strong>comprometimento</strong>. Cada projeto é
                pensado para proporcionar uma <strong>experiência única</strong>,
                despertando sensações que fazem a diferença no dia a dia.
            </p>
        </div>

        <div class="bottom">
            <div>
                <h2 class="title">Missão</h2>
                <p class="text">Nossa missão é construir mais do que imóveis: é <strong>criar lares</strong> que se
                    tornem cenários
                    para
                    <strong>momentos
                        inesquecíveis</strong>. Com uma equipe dedicada e atenta aos <strong>detalhes</strong>,
                    trabalhamos
                    para garantir que cada espaço
                    seja <strong>elegante</strong> e <strong>acolhedor</strong>, refletindo a
                    <strong>excelência</strong>
                    que nossos clientes merecem.
                </p>
            </div>
            <div class="content">
                <p>
                    <?php include get_stylesheet_directory() . '/img/icons/compromentimento.svg'; ?>
                    <span>Compromentimento</span>
                </p>
                <p>
                    <?php include get_stylesheet_directory() . '/img/icons/qualidade.svg'; ?>
                    <span>Qualidade</span>
                </p>
                <p>
                    <?php include get_stylesheet_directory() . '/img/icons/inovacao.svg'; ?>
                    <span>Inovação</span>
                </p>
            </div>
        </div>
    </section>

    <section class="timeline container">
        <div class="top">
            <h2>Construindo Sonhos, Criando Histórias</h2>
            <p class="text">Desde o início, nossa trajetória tem sido marcada pela entrega de empreendimentos que
                transformam vidas.
                Sabemos que cada lar é parte de uma história e, por isso, criamos ambientes onde as memórias mais belas
                podem ser construídas. Cada empreendimento reflete nossa paixão por transformar espaços em lares de
                beleza e
                funcionalidade incomparáveis.</p>
        </div>
        <div class="timeline-list">
            <?php
            foreach ($timeline as $item): ?>
            <div class="timeline-item">
                <img class="img" src="<?php echo get_stylesheet_directory_uri() . "/img/{$item['img']}"; ?>"
                    alt="<?php echo esc_attr($item['alt']); ?>">
                <h3><?php echo esc_attr($item['title']); ?></h3>
                <span class="dot"></span>
                <p><?php echo esc_attr($item['date']); ?></p>
            </div>
            <?php endforeach; ?>
            <div class="timeline-line"></div>
        </div>
    </section>

    <?php include(TEMPLATEPATH . '/inc/Services.php'); ?>

</main>

<?php get_footer(); ?>