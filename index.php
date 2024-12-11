<?php get_header(); ?>

<main id="pg-projects">
    <section class="intro">
        <h1>Empreendimentos Zimmermann</h1>
        <form method="GET" action="<?php echo esc_url(home_url('/empreendimentos/')); ?>" id="search-form">
            <div class="search-wrapper">
                <input type="text" name="s" id="search-input"
                    value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>"
                    placeholder="Buscar por empreendimentos" />
                <button type="submit" class="search-icon">
                    <?php include get_stylesheet_directory() . '/img/icons/lupa.svg'; ?>
                </button>
            </div>

            <select name="category" id="category-filter" onchange="this.form.submit()">
                <option value=""><?php _e('Selecione uma opção', 'textdomain'); ?></option>
                <?php
                $categories = get_categories();
                foreach ($categories as $category):
                    echo '<option value="' . esc_attr($category->term_id) . '" ' . (isset($_GET['category']) && $_GET['category'] == $category->term_id ? 'selected' : '') . '>' . esc_html($category->name) . '</option>';
                endforeach;
                ?>
            </select>

            <select name="tag" id="tag-filter" onchange="this.form.submit()">
                <option value=""><?php _e('Selecione um status', 'textdomain'); ?></option>
                <?php
                $tags = get_tags();
                foreach ($tags as $tag):
                    echo '<option value="' . esc_attr($tag->term_id) . '" ' . (isset($_GET['tag']) && $_GET['tag'] == $tag->term_id ? 'selected' : '') . '>' . esc_html($tag->name) . '</option>';
                endforeach;
                ?>
            </select>
        </form>
    </section>

    <section class="services">
        <div class="container">
            <div class="list-cards">
                <?php
                $category_filter = isset($_GET['category']) ? $_GET['category'] : '';
                $tag_filter = isset($_GET['tag']) ? $_GET['tag'] : '';
                $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    's' => $search_query,
                );

                if (!empty($category_filter)) {
                    $args['cat'] = $category_filter;
                }

                if (!empty($tag_filter)) {
                    $args['tag_id'] = $tag_filter;
                }

                $the_query = new WP_Query($args);
                ?>

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
                    <p><?php _e('Desculpe, nenhum empreendimento encontrado.', 'textdomain'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main><?php get_footer(); ?>