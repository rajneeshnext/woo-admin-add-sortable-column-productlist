dd_action( 'manage_product_posts_custom_column', 'wpso23858236_product_column_shopify', 10, 2 );
function wpso23858236_product_column_shopify( $column, $postid ) {
    if ( $column == 'shopify' ) {
        $shopify = get_post_meta( $postid, 'shopify', true );
        if ( ! empty( $shopify ) && $shopify =="Connected") {
            echo '<mark class="instock">In-Sync</mark>';
        }else{echo '<mark class="outofstock">No-Sync</mark>';;
        }
    }
}
add_filter( 'manage_edit-product_columns', 'show_product_order', 15);
function show_product_order($columns){
   $columns['shopify'] = __( 'Shopify'); 
   return $columns;
}
add_filter( 'manage_edit-product_sortable_columns', 'my_sortable_reference_column' );
function my_sortable_reference_column( $columns ) {
    $columns['shopify'] = 'shopify';
    return $columns;
}
