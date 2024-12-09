<section class="services">
  <div class="container">
    <h2 class="title">empreendimentos em destaque</h2>
    <div class="list-cards carousel-cards">
      <?php
      $args = array(
        'post_type' => 'post',
        'status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'DESC',
      );
      $the_query = new WP_Query($args); ?>

      <?php if ($the_query->have_posts()): ?>
        <?php while ($the_query->have_posts()):
          $the_query->the_post(); ?>

          <a href="<?php the_permalink(); ?>">
            <img class="img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <div class="content">
              <div>
                <p>
                  <?php
                  $categories = get_the_category();
                  if (!empty($categories)) {
                    foreach ($categories as $category) {
                      echo esc_html($category->name);
                      if (!($category === end($categories))) {
                        echo ', ';
                      }
                    }
                  }
                  ?>
                </p>
                <h3><?php the_title(); ?></h3>
              </div>
              <?php include get_stylesheet_directory() . '/img/icons/arrow-card.svg'; ?>
            </div>
          </a>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <p><?php _e('Desculpe, nenhum slide encontrado.'); ?></p>
      <?php endif; ?>
    </div>
    <a href="#" class="btn">
      Ver todos
      <?php include get_stylesheet_directory() . '/img/icons/arrow-btn.svg'; ?>
    </a>
  </div>
</section>