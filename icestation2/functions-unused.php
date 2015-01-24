<?php
/*
This code allows wp_query to paginate correctly, it is extremely handy and will save you tons of time looking for a fix
Case below = Category ID
*/
function cure_wp_amnesia_on_query_string($query_string){
    if ( !is_admin() ){
        if ( isset( $query_string['cat'] ) ) {
            switch ($query_string['cat']) {
                case 9:
                $query_string['posts_per_page'] = 5;
                    break;
                case 25:
                $query_string['posts_per_page'] = 5;
                    break;
                case 27:
                $query_string['posts_per_page'] = 5;
                    break;
                
            }
        }
        if ( isset( $query_string['s'] ) ){//case SEARCH
            $query_string['posts_per_page'] = 5;
        }
    }
    return $query_string;
}

add_filter('request', 'cure_wp_amnesia_on_query_string');
?>