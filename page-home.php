<?php
// Template Name: Home
?>

<?php get_header(); ?>

<main id="pg-home">

  <section class="carousel-home">
    <?php
    $args = array(
      'post_type' => 'carrossel',
      'status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'DESC',
    );
    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()): ?>
      <?php while ($the_query->have_posts()):
        $the_query->the_post(); ?>

        <a href="<?php the_field('link_carrossel'); ?>">
          <img class="dkp" src="<?php the_field('imagem_carrossel'); ?>" alt="<?php the_title(); ?>">
          <img class="mbl" src="<?php the_field('imagem_mobile_carrossel'); ?>" alt="<?php the_title(); ?>">
        </a>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else: ?>
      <p><?php _e('Desculpe, nenhum slide encontrado.'); ?></p>
    <?php endif; ?>
  </section>

  <section class="infos container" id="infos">
    <a href="#infos" class="link">desça</a>
    <div class="top">
      <div class="img">
        <h2>construtora <br>zimmermann</h2>
        <img src="<?php echo get_stylesheet_directory_uri() . "/img/itapema.webp"; ?>" alt="Foto Itapema">
      </div>
      <div class="content">
        <p class="title">Para transformar a vida das pessoas, fuja do habitual e desperte novas sensações.
        </p>
        <div class="counter">
          <div v-for="(item, index) in counters" :key="index">
            <span>{{ item.sign }} {{ item.current }}</span>
            <p>{{ item.text }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="bottom">
      <div class="content">
        <p>A construtora Zimmermann atua a mais de <strong>12 anos</strong> com três princípios fundamentais:
          comprometimento,
          qualidade e inovação.</p>
        <p>Conceber e executar projetos fascinantes para quem vê e primorosos para quem vive, empreendimentos
          contemporâneos repletos de elegância, ambientes incríveis e <strong>qualidade de entrega
            superior</strong> com
          acabamentos executados nos mínimos detalhes.</p>
        <a href="#" class="btn">
          conheça mais
          <?php include get_stylesheet_directory() . '/img/icons/arrow-btn.svg'; ?>
        </a>
      </div>
      <a href="#" class="video">
        <img src="<?php echo get_stylesheet_directory_uri() . "/img/video-home.webp"; ?>" alt="Imagem do video home">
      </a>
    </div>
  </section>

</main><?php get_footer(); ?>