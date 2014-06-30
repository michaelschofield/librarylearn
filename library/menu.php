<?php 
function library_academy_menu( $menu, $element ) {

    if ( $menu == 'primary' ) {

        if ( $element == 'label' ) {

            $element = '☰';
            return $element;

        } // if $element == 'label'

        if ( $element == 'menu' ) {

            $args =  array(                
                'menu'          => 'primary-menu',
                'container'     => false,
                'menu_class'    => 'sub-menu',
                'fallback_cb'   => false
            );

            wp_nav_menu( $args );

        } // if $element is 'menu'
        
    } // if $menu is 'primary'

    if ( $menu == 'secondary' ) {

        if ( $element == 'label' ) {

            $element = 'Browse for Videos';

            return $element;
        } // if $element is 'label'

        if ( $element == 'menu') {

            $args =  array(

                'menu'          => 'Secondary Menu',
                'container'     => false,
                'menu_class'    => 'sub-menu',
                'fallback_cb'   => false
            );

            wp_nav_menu( $arg );

        } // if $element is 'menu'

    } // if $menu is 'secondary'
    
}
 ?>