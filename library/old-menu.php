<?php 
function library_academy_menu( $menu, $element ) {

    if ( $menu == 'primary' ) {

        if ( $element == 'label' ) {
            
            if ( has_category('getting-started') ) { $element = 'Getting Started'; } 
            else if ( has_category('browse-by-subject') ) { $element = 'Browse by Subject'; }            
            else if ( has_category('research') ) { $element = 'Research'; }            
            else if ( has_category('citation-management') ) { $element = 'Citation Management'; }
            
            else { $element = 'Choose a Subject'; }            
            return $element;

        } // if $element == 'label'

        if ( $element == 'menu' ) {

            $args =  array(
                'menu'          => 'primary',
                'container'     => false,
                'menu_class'    => 'sub-menu',
                'fallback_cb'   => false
            );

            wp_nav_menu( $args );

        } // if $element is 'menu'
        
    } // if $menu is 'primary'

    if ( $menu == 'secondary' ) {

        if ( $element == 'label' ) {

            if ( has_category('getting-started') ) {
                if ( is_category('using-the-library') ) { $element = 'Using the Library'; }
                elseif ( is_category('books-and-ebooks') ) { $element = 'Books & E-Books'; }
                elseif ( is_category('articles') ) { $element = 'Articles'; }
                elseif ( is_category('search-strategies') ) { $element = 'Search Strategies'; }
                else { $element = 'All'; }
            }

            elseif ( has_category('browse-by-subject') ) {
                if ( has_category('business') ) { $element = 'Business'; }
                elseif ( has_category('education') ) { $element = 'Education'; }
                elseif ( has_category('arts-and-humanities') ) { $element = 'Arts & Humanities'; }
                elseif ( has_category('criminal-justice-and-law') ) { $element = 'Criminal Justice & Law'; }
                elseif ( has_category('engineering-math-tech') ) { $element = 'Engineering, Math, Tech'; }
                elseif ( has_category('health-and-medicine') ) { $element = 'Health & Medicine'; }
                elseif ( has_category('history-and-genealogy') ) { $element = 'History & Genealogy'; }
                elseif ( has_category('ocean-and-aquatic-sciences') ) { $element = 'Ocean & Aquatic Sciences'; }
                elseif ( has_category('psychology-and-behavior') ) { $element = 'Psychology & Behavior'; }
                elseif ( has_category('science') ) { $element = 'Science'; }
                elseif ( has_category('social-sciences') ) { $element = 'Social Sciences'; }
                elseif ( has_category('speech-language-and-hearing') ) { $element = 'Speech Language & Hearing'; }
                else { $element = 'All'; }
            }

            elseif ( has_category('research') ) {
                if ( is_category('literature-review') ) { $element = 'Literature Review'; }
                elseif ( has_category('methodology-and-theories') ) { $element = 'Methodology & Theories'; }
                elseif ( has_category('mining-for-ideas') ) { $element = 'Mining for Ideas'; }
                elseif ( has_category('recorded-workshops') ) { $element = 'Recorded Workshops'; }
                elseif ( has_category('dissertations') ) { $element = 'Dissertations'; }
                elseif ( has_category('theoretical-framework') ) { $element = 'Theoretical Framework'; }
                elseif ( has_category('introduction-to-research') ) { $element = 'Introduction to Research'; }
                else { $element = 'All'; }
            }

            elseif ( has_category('citation-management') ) {
                if ( has_category('apa') ) { $element = 'APA'; }
                elseif ( has_category('ama') ) { $element = 'AMA'; }
                elseif ( has_category('chicago-style') ) { $element = 'Chicago Style'; }
                elseif ( has_category('copyright-and-plagiarism') ) { $element = 'Copyright & Plagiarism'; }
                elseif ( has_category('citation-tools') ) { $element = 'Citation Tools'; }
                elseif ( has_category('mla') ) { $element = 'MLA'; }
                else { $element = 'All'; }
            }

            else { $element = ''; }

            return $element;
        } // if $element is 'label'

        if ( $element == 'menu') {

            if ( !is_home() ) {

                if ( has_category('getting-started') ) { 
                    
                    $args =  array(
                        'menu'          => 'getting started',
                        'container'     => false,
                        'menu_class'    => 'sub-menu'
                    );

                    wp_nav_menu( $args );
                } // gs menu

                elseif ( has_category('research-by-subject') ) {

                    $args = array(
                        'menu' => 'research by subject',
                        'container' => false,
                        'menu_class' => 'sub-menu'
                    );

                    wp_nav_menu( $args ); 
                } // research menu

                elseif ( has_category('dissertation-research') ) {

                    $args = array(
                        'menu' => 'dissertation research',
                        'container' => false,
                        'menu_class' => 'sub-menu'
                    );

                    wp_nav_menu( $args );

                } // diss menu

                elseif ( has_category('citation-management') ) {

                    $args = array(
                        'menu' => 'citation management',
                        'container' => false,
                        'menu_class' => 'sub-menu'
                    );

                    wp_nav_menu( $args );
                } // cm menu

                

            
            } // is_home()

        } // if $element is 'menu'

    } // if $menu is 'secondary'
    
}
 ?>