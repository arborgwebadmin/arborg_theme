<?php
/**
 * skolasidur-arborg Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skolasidur-arborg
 * @since 1.0.0
 */

include 'facebook.php';


/**
 * Define Constants
 */
define( 'CHILD_THEME_SKOLASIDUR_ARBORG_VERSION', '1.0.0' );


/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'skolasidur-arborg-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_SKOLASIDUR_ARBORG_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
/*setja icona í thema nota class class="icon [iconName]" */
/*Prufa*/
/*gitprufa*/
function wpb_hook_javascript_header() {
	?>
		<script>

			function change_search_icon() {
				var icon = document.getElementsByClassName('astra-search-icon');
				if (icon) {
					for (var i = 0; i < icon.length; i++ ) {
						icon[0].classList.add('ar-icon-search');
						icon[0].classList.remove('astra-search-icon');
					}
				}
			}
			//change_search_icon();
			
			
			var nodes = document.getElementsByClassName('icon');
			for(var i=0; i< nodes.length; i++) {
				var node = nodes[i];
				node.style.display = "table-cell";
				var icon = document.createElement('span');
				var className = 'ar-icon-'+node.classList[1];
				icon.classList.add(className);
				node.parentNode.insertBefore(icon, node);
			}
			
			var heads = document.getElementsByClassName("parent-menu-item");
			for (var i=0; i<heads.length; i++) {
				var head = heads[i];
				console.log(head.firstChild);
				head.firstChild.removeAttribute("href");
			}
		</script>
	<?php
}
add_action('wp_footer', 'wpb_hook_javascript_header');

/*Bæta við Image dálk í færslulista og hreinsa út annað.*/

add_filter('manage_posts_columns', 'arborg_filter_post_columns' );
function arborg_filter_post_columns( $columns ) {
	$columns = array(
		'cb' => $columns['cb'],
		'image' => __( 'Image' ),
		'title' => __( 'Title' ),
		'categories' => __( 'Categories' ),
		'date' => __( 'Date' ),
		'author' => __( 'Author' ),
	);
	
	return $columns;
}

add_action( 'manage_posts_custom_column', 'arborg_column', 10, 2);
function arborg_column( $column, $post_id ) {
	// Image column
	if ( 'image' === $column ) {
		echo get_the_post_thumbnail( $post_id, array(80, 80) );
	}
}

/*dashboard*/

add_action( 'wp_dashboard_setup', 'register_arborg_dashboard_widget' );
function register_arborg_dashboard_widget() {
	wp_add_dashboard_widget(
		'arborg_dashboard_widget',
		'Website Guidelines',
		'arborg_dashboard_widget_display'
	);

}

function arborg_dashboard_widget_display() {
    ?>
    <p>Velkomin á bakenda Sunnulækjar vefsíðunar. Hér geturu bætt við nýrri frétt og uppfært gamalt efni ásamt fleirru.</p>


	<h4><strong>Fréttir</strong></h4>
    <p>Munið eftir að velja viðeigiandi flokk og setja aðalmynd ef við á. Hægt er að finna myndir inná https://unsplash.com/ við fréttir.</p>


	<h4><strong>Flýtileiðir</strong></h4>
    <ul>
		<li><a href='<?php echo admin_url("post-new.php") ?>'>Ný færsla</a></li>
    </ul>

	<h3><strong>Leiðbeiningar og handbók</strong></h3>
		<p>Ath að velja "Login with Microsoft"</p>
	<a href="https://rh-arborg.atlassian.net/wiki/spaces/VEF/pages/529891329/Wordpress+lei+beiningar" target="_blank" rel="noopener">Wordpress leiðbeiningar</a>


    <?php
}
