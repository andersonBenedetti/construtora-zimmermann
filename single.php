<?php
// Template Name: Single
?>

<?php get_header(); ?>

<?php
$items = [
  ['title' => 'Projeto', 'percentage' => 'porcentagem_-_projeto'],
  ['title' => 'Fundações e contenções', 'percentage' => 'porcentagem_-_fundacoes_e_contencoes'],
  ['title' => 'Alvenarias', 'percentage' => 'porcentagem_-_alvenarias'],
  ['title' => 'Instalações hidrossanitárias', 'percentage' => 'porcentagem_-_instalacoes_hidrossanitarias'],
  ['title' => 'Revestimentos internos', 'percentage' => 'porcentagem_-_revestimentos_internos'],
  ['title' => 'Preparo do terreno', 'percentage' => 'porcentagem_-_preparo_do_terreno'],
  ['title' => 'Estrutura', 'percentage' => 'porcentagem_-_estrutura'],
  ['title' => 'Instalações elétricas e de comunicação', 'percentage' => 'porcentagem_-_instalacoes_eletricas_e_de_comunicacao'],
  ['title' => 'Instalações climáticas', 'percentage' => 'porcentagem_-_instalacoes_climaticas'],
  ['title' => 'Contrapiso e piso', 'percentage' => 'porcentagem_-_contrapiso_e_piso'],
];
?>

<main id="pg-single">

    <section class="intro">
        <img class="img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <div class="content container">
            <p class="caption">
                <?php
        $tags = get_the_tags();

        if ($tags) {
          $tag_names = array();

          foreach ($tags as $tag) {
            $tag_names[] = esc_html($tag->name);
          }

          echo implode(', ', $tag_names);
        } else {
          echo '';
        }
        ?>
            </p>
            <h1><?php the_title(); ?></h1>
            <p class="text">
                <?php include get_stylesheet_directory() . '/img/icons/local-single.svg'; ?>
                <?php the_field('address'); ?>
            </p>
            <p class="text">
                <?php include get_stylesheet_directory() . '/img/icons/data-single.svg'; ?>
                <?php the_field('date'); ?>
            </p>
        </div>
        <a href="#infos" class="link">desça</a>
    </section>

    <section class="content container">
        <div>
            <?php // the_content(); ?>
            <div class="btns">
                <a class="btn secondary"
                    href="https://wa.me/?text=<?php echo urlencode('Olá, tenho interesse no ' . get_the_title()); ?>"
                    target="_blank">
                    Tenho interesse
                </a>
                <a href="<?php the_field('folder_digital'); ?>" class="btn" download>
                    folder digital
                    <?php include get_stylesheet_directory() . '/img/icons/btn-down.svg'; ?>
                </a>
            </div>
        </div>

        <div class="infos">
            <div class="description">
                <?php the_field('short_description'); ?>
            </div>
            <div class="card">
                <div class="info">
                    <div>
                        <?php include get_stylesheet_directory() . '/img/icons/1-icon.svg'; ?>
                    </div>
                    <?php the_field('1_text'); ?>
                </div>
                <div class="info">
                    <div>
                        <?php include get_stylesheet_directory() . '/img/icons/2-icon.svg'; ?>
                    </div>
                    <?php the_field('2_text'); ?>
                </div>
                <div class="info">
                    <div>
                        <?php include get_stylesheet_directory() . '/img/icons/3-icon.svg'; ?>
                    </div>
                    <?php the_field('3_text'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="video">
        <div class="container">
            <?php the_field('video_project'); ?>
        </div>
    </section>

    <section class="data">
        <div class="container">
            <h2 class="title">Estágio de construção</h2>
            <div class="list">
                <?php foreach ($items as $item):
          $percentage = get_field($item['percentage']);
          $circle_offset = 28.27 - (28.27 * $percentage / 100);
          ?>
                <div class="item">
                    <span class="icon">
                        <svg class="circle-progress" width="15" height="15" viewBox="0 0 15 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle class="circle-bg" cx="7.5" cy="7.5" r="6.5" stroke="#272527" stroke-width="1"
                                fill="none" />
                            <circle class="circle-fg" cx="7.5" cy="7.5" r="6.5" stroke="#d9d9d9" stroke-width="1"
                                fill="none" stroke-dasharray="40.84"
                                stroke-dashoffset="<?php echo $circle_offset; ?>" />
                        </svg>
                    </span>
                    <p class="percentage"><?php echo esc_html($percentage); ?>%</p>
                    <p class="label"><?php echo esc_html($item['title']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>