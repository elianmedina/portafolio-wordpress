<?php
/*
Plugin Name: Filtro de Proyectos por Categoría (AJAX)
Description: Muestra un filtro moderno y responsive para proyectos (CPT) por categorías personalizadas. Shortcode: [filtro_proyectos]
Version: 1.0
Author: Elián Medina
*/

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('mpp-filtrado-ajax', plugins_url('filtro.js', __FILE__), ['jquery'], null, true);
    wp_enqueue_style('mpp-filtrado-estilos', plugins_url('filtro.css', __FILE__));
    wp_localize_script('mpp-filtrado-ajax', 'mppFiltro', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]);
});

add_shortcode('filtro_proyectos', function($atts) {
    $cats = get_terms([
        'taxonomy' => 'categoria_proyecto',
        'hide_empty' => true
    ]);

    ob_start();
    ?>
    <div class="mpp-filtro-categorias">
        <button class="mpp-cat-btn active" data-cat="all">Todos</button>
        <?php foreach($cats as $cat): ?>
            <button class="mpp-cat-btn" data-cat="<?php echo esc_attr($cat->slug); ?>">
                <?php echo esc_html($cat->name); ?>
            </button>
        <?php endforeach; ?>
    </div>
    <div id="mpp-contenedor-proyectos">
        <?php echo mpp_filtro_render_projects(); ?>
    </div>
    <?php
    return ob_get_clean();
});

add_action('wp_ajax_mpp_filtrar_proyectos', 'mpp_filtro_ajax');
add_action('wp_ajax_nopriv_mpp_filtrar_proyectos', 'mpp_filtro_ajax');
function mpp_filtro_ajax() {
    $cat = isset($_POST['cat']) ? sanitize_text_field($_POST['cat']) : '';
    echo mpp_filtro_render_projects($cat);
    wp_die();
}

function mpp_filtro_render_projects($cat = '') {
    $args = [
        'post_type'      => 'proyectos',
        'posts_per_page' => 20,
        'post_status'    => 'publish'
    ];
    if ($cat && $cat !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'categoria_proyecto',
                'field' => 'slug',
                'terms' => $cat
            ]
        ];
    }
    $query = new WP_Query($args);

    $html = '<div class="mpp-proyectos-listado">';
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $titulo = get_field('titulo_proyecto', $post_id);
            $descripcion = get_field('descripcion_breve', $post_id);
            $url_imagen = get_field('url_imagen', $post_id);
            $img_html = $url_imagen ? '<img src="'.esc_url($url_imagen).'" alt="Captura de proyecto: '.esc_attr($titulo).'" style="max-width:100%;border-radius:10px;margin-bottom:14px;height:145px;object-fit:cover;">' : '';
            $categorias = get_the_terms($post_id, 'categoria_proyecto');
            $cat_text = '';
            if ($categorias && !is_wp_error($categorias)) {
                $cat_array = wp_list_pluck($categorias, 'name');
                $cat_text = implode(', ', $cat_array);
            }

            $html .= '<div class="mpp-proyecto-item">';
            $html .= $img_html ? '<div class="mpp-proyecto-img">'.$img_html.'</div>' : '';
            $html .= '<h2 class="mpp-proyecto-titulo">'.esc_html($titulo).'</h2>';
            $html .= $cat_text ? '<div class="mpp-proyecto-cat"><b>Categoría:</b> '.esc_html($cat_text).'</div>' : '';
            $html .= $descripcion ? '<div class="mpp-proyecto-desc">'.esc_html($descripcion).'</div>' : '';
            $html .= '</div>';
        }
    } else {
        $html .= '<p style="width:100%;text-align:center;">No hay proyectos en esta categoría.</p>';
    }
    $html .= '</div>';

    wp_reset_postdata();
    return $html;
}
?>
