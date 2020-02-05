<?php

function ec_featured_post_shortcode($atts)
{
    $a = extract(shortcode_atts(array(
        'posttype' => 'nyheter',
    ), $atts));

    $posttype = $atts['posttype'];

    $query = new WP_Query(array('post_type' => 'nyheter', 'post_status' => 'publish', 'orderby' => 'date', 'meta_key' => 'is_it_featured',
        'meta_value' => 'Yes', 'posts_per_page' => 1));


    $count = 0;
    $output = '<div class="news-post-grid">';
    while ($query->have_posts()) : $query->the_post();
        $img_url = get_field('featured_image_for_home_page')['url'];
        if ($img_url == "") {
            $img_url = "/wp-content/uploads/2019/05/transph.png";
        }

        $output .= '<div class="news_featured_item">';

        $output .= '<div class="news_featuered_img col-md-6" style="background-image:url(' . $img_url . ');"><a href="' . get_permalink() . '"><img src="/wp-content/uploads/2019/05/transph.png" alt="' . get_the_title() . '"></a></div>';

        $output .= '<div class="col-md-6"><div class="featured_text_wrapper">';

        $output .= '<a href="' . get_permalink() . '"><h3 class="featured_news_title">' . get_the_title() . '</h3></a>';
        $output .= '<p class="featured_excerpt">' . get_field('excerpt') . '<a href="' . get_permalink() . '" class="read_more trans black" > </a></p>';
        $output .= '</div></div>';
        $output .= '</div>';
    endwhile;

    wp_reset_postdata();
    $output .= '</div>';

    return $output;

}

add_shortcode('featured_post_item', 'ec_featured_post_shortcode');


function ec_interest_form_shortcode($atts)
{
    $a = extract(shortcode_atts(array(
        'form_title' => 'interest',
    ), $atts));

    $form_title = $atts['form_title'];
    $blog_id = get_current_blog_id();
    if($blog_id == 2){
        $ApiKey = 'F71C22F2-48DD-4138-8E86-4E299C61F145';
    }
    if($blog_id == 3){
        $ApiKey = '5ED87713-B5E0-4B09-8630-CD6D550C5468';
    }
    if($blog_id == 4){
        $ApiKey = 'F1D6D6D8-ECC3-4E02-BB46-54111EB52206';
    }


    $file = "https://www.emg-srs.com/api/v1.0/educationtree/?ApiKey=".$ApiKey;
    $data = file_get_contents($file);
    $result = json_decode($data, true);
//print_r($result);
    $education_option = [];
    foreach ($result as $educationtree) {

        foreach ($educationtree['Locations'] as $v) {
            $education_option[] = $educationtree['Name'] . " ~ " . $v['Name'];
        }
    }


    $output = '<div class="interset_form_home" id="intresseanmalan">';

    $output .= '<form action="/tack/" method="POST" id="srs_form" accept-charset="utf-8" >
                    <label for="input_firstname" class="ax-hidden">Namn</label>
					<input type="text" id="input_firstname" class="srs_input" placeholder="Namn" required name="f_name">
                    <label for="input_email" class="ax-hidden">email</label>
					<input type="email" class="srs_input" id="input_email" placeholder="E-post" required name="email" >
                    <label for="input_telefonnummer" class="ax-hidden">Telefonnummer</label>
					<input class="srs_input" id="input_telefonnummer" placeholder="Telefonnummer" name="phone"  maxlength="12"  required="required" title="Vänligen fyll i ditt svenska telefonnummer med landskod, ex: +46701234567" type="tel" pattern="^\+46[1-9][0-9]{6,12}$">
					<select name="utbilding_name[]"  required="" multiple id="education_select">';


    foreach ($education_option as $education) {
        $output .= '<option value="' . $education . '">' . $education . '</option>';

    }

    $output .= '	</select>';
    $output .= '<div class="extra_field"><span class="consent_text"><label for="input_consent" class="ax-hidden">personuppgifter Samtycke</label>	<input type="checkbox" class="consent" id="input_consent" name="consent" required> Jag samtycker till att mina personuppgifter samlas in och behandlas för att kunna ta emot riktad information och marknadsföring.  Läs hela vår personuppgiftspolicy <span class="integrity-text"><u>här</u><br /> 
                <div class="tooltip">
                  <strong>Hantering av personuppgifter</strong><br />När du skickar in en intresseanmälan till oss behöver du lämna ditt samtycke till att vi behandlar dina personuppgifter för att vi ska kunna registrera din ansökan. De personuppgifter som vi behandlar om dig är ditt namn, din e-postadress, 
                  ditt telefonnummer, programmet/programmen du är intresserad av samt när du börjar gymnasiet. Vi behandlar dessa uppgifter om dig i ett IT-system som används av alla bolag inom AcadeMedia-koncernen.<br />Om du samtycker till att ta emot marknadsföring och information från våra skolor kommer vi även att behandla dina personuppgifter för detta ändamål. Utöver vad som framgår ovan kan vi komma att lagra trafiken i syfte att förbättra webbplatsen, samt för att efterkomma anmodan från myndighet eller att upptäcka och förebygga olagliga aktiviteter.
                  <br />Huvudmannen är personuppgiftsansvarige på den skola du går på. Vi tillämpar gällande integritetslagstiftning vid behandling av personuppgifter. Uppgifterna lagras i ett år efter att ansökningsperioden är över för den sökta utbildningen. Vi använder oss av automatiserat individuellt beslutsfattande och profilering när vi skickar ut marknadsföring och annan information till dig.<br />Du kan när som helst återkalla ditt samtycke. 
                  Du når våra dataskyddsombud <a href="https://trygg.academedia.se/kontakt/">här</a>. Du hittar mer information på <a href="https://trygg.academedia.se/">trygg.academedia.se</a>. Om du vill ta emot marknadsföring, information och påminnelser från våra skolor, bocka i rutan nedan.
                </div>
              </span></span>
					<input type="submit" value="Skicka intresseanmälan" class="srs-submit btn-primary"></div>
				</form>';
    wp_reset_postdata();
    $output .= '</div>';

    return $output;

}

add_shortcode('interest_form', 'ec_interest_form_shortcode');


function ec_recent_post_shortcode($atts)
{
    $a = extract(shortcode_atts(array(
        'posttype' => 'nyheter',
    ), $atts));

    $posttype = $atts['posttype'];
    $post_class = "d-all";
    $posts_per_page = 3;
    // if($posttype=="nyheter"){
    // 	$post_class = "d-1of2";
    // 	$posts_per_page = 3;
    // }

    $query = new WP_Query(array('post_type' => $posttype, 'post_status' => 'publish', 'orderby' => 'date', 'posts_per_page' => $posts_per_page));


    $count = 0;
    $output = '<div class="news-post-grid ' . $posttype . '_container">';
    while ($query->have_posts()) : $query->the_post();
        $img_url = get_field('featured_image')['url'];
        if ($img_url == "") {
            $img_url = "/wp-content/uploads/2019/05/transph.png";
        }


        $count = $count + 1;
        $output .= '<div class="news_recent_items m-all t-1of3 d-all ' . $posttype . $count . ' ">';

        $output .= '<div class="news_featuered_img ' . $post_class . '"><a href="' . get_permalink() . '"><img src="' . $img_url . '" alt="' . get_the_title() . '"></a></div>';

        $output .= '<div class="featured_text_wrapper ' . $post_class . '">';
        $output .= '<h6 class="ff-label-wrapper custom">' . $posttype . '</h6>';
        $output .= '<a href="' . get_permalink() . '"><h3 class="featured_news_title">' . get_the_title() . '</h3></a>';
        $output .= '<p class="featured_excerpt">' . get_field('excerpt') . '<a href="' . get_permalink() . '" class="read_more trans black" aria-label="Läs mer om' . get_the_title() . '"> </a></p>';
        $output .= '</div>';
        $output .= '</div>';
    endwhile;

    wp_reset_postdata();
    $output .= '</div>';

    return $output;

}

add_shortcode('recent_post_items', 'ec_recent_post_shortcode');


function team_member_shortcode($atts)
{
    $a = extract(shortcode_atts(array(
        'name' => 'Your name',
        'img' => '/wp-content/uploads/2018/11/43aspect.png',
        'email' => 'name@email.com',
        'mob' => '',
        'title' => 'your title'
    ), $atts));

    $email = $atts['email'];
    $name = $atts['name'];
    $img = $atts['img'];
    $mob = $atts['mob'];
    $title = $atts['title'];

    $output = '<div class="single_staff">';
    $output .= '<img class="memeberimg" alt="' . $name . ' blid" src="' . $img . '">';
    $output .= '<p><strong>' . $name . '</strong><br/>' . $title . '<br/>';
    if ($mob != '') {
        $output .= $mob . '<br/>';
    }
    if ($mob != '') {
        $output .= '<a href="mailto:' . $email . '">' . $email . '</a></p>';
    }
    $output .= '</div>';

    return $output;

}

add_shortcode('team_member', 'team_member_shortcode');


/* #####################

for breadcrumb functionality 

###########################
*/


function get_hansel_and_gretel_breadcrumbs()
{
    // Set variables for later use
    $here_text = __('');
    $home_link = home_url('/');
    $home_text = __('Hem');
    $link_before = '<span typeof="v:Breadcrumb">';
    $link_after = '</span>';
    $link_attr = ' rel="v:url" property="v:title"';
    $link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter = ' &raquo; ';              // Delimiter between crumbs
    $before = '<span class="current">'; // Tag before the current crumb
    $after = '</span>';                // Tag after the current crumb
    $page_addon = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links = '';

    /**
     * Set our own $wp_the_query variable. Do not use the global variable version due to
     * reliability
     */
    $wp_the_query = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if (is_singular()) {
        /**
         * Set our own $post variable. Do not use the global variable version due to
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post($queried_object);

        // Set variables 
        $title = apply_filters('the_title', $post_object->post_title);
        $parent = $post_object->post_parent;
        $post_type = $post_object->post_type;
        $post_id = $post_object->ID;
        $post_link = $before . $title . $after;
        $parent_string = '';
        $post_type_link = '';

        if ('post' === $post_type) {
            // Get the post categories
            $categories = get_the_category($post_id);
            if ($categories) {
                // Lets grab the first category
                $category = $categories[0];

                $category_links = get_category_parents($category, true, $delimiter);
                $category_links = str_replace('<a', $link_before . '<a' . $link_attr, $category_links);
                $category_links = str_replace('</a>', '</a>' . $link_after, $category_links);
            }
        }

        if (!in_array($post_type, ['post', 'page', 'attachment'])) {
            $post_type_object = get_post_type_object($post_type);
            $archive_link = esc_url(get_post_type_archive_link($post_type));
            if ('utbildning' === $post_type) {
                $archive_link = '/utbildningar/';
            }
            if ('nyhet' === $post_type) {
                $archive_link = '/nyheter/';
            }

            if ('studieort' === $post_type) {
                $archive_link = '/studieorter/';
            }

            $post_type_link = sprintf($link, $archive_link, $post_type_object->labels->singular_name);
        }

        // Get post parents if $parent !== 0
        if (0 !== $parent) {
            $parent_links = [];
            while ($parent) {
                $post_parent = get_post($parent);

                $parent_links[] = sprintf($link, esc_url(get_permalink($post_parent->ID)), get_the_title($post_parent->ID));

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse($parent_links);

            $parent_string = implode($delimiter, $parent_links);
        }

        // Lets build the breadcrumb trail
        if ($parent_string) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ($post_type_link)
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ($category_links)
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if (is_archive()) {
        if (is_category()
            || is_tag()
            || is_tax()
        ) {
            // Set the variables for this section
            $term_object = get_term($queried_object);
            $taxonomy = $term_object->taxonomy;
            $term_id = $term_object->term_id;
            $term_name = $term_object->name;
            $term_parent = $term_object->parent;
            $taxonomy_object = get_taxonomy($taxonomy);
            $current_term_link = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
            $parent_term_string = '';

            if (0 !== $term_parent) {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ($term_parent) {
                    $term = get_term($term_parent, $taxonomy);

                    $parent_term_links[] = sprintf($link, esc_url(get_term_link($term)), $term->name);

                    $term_parent = $term->parent;
                }

                $parent_term_links = array_reverse($parent_term_links);
                $parent_term_string = implode($delimiter, $parent_term_links);
            }

            if ($parent_term_string) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif (is_author()) {

            $breadcrumb_trail = __('Author archive for ') . $before . $queried_object->data->display_name . $after;

        } elseif (is_date()) {
            // Set default variables
            $year = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ($monthnum) {
                $date_time = DateTime::createFromFormat('!m', $monthnum);
                $month_name = $date_time->format('F');
            }

            if (is_year()) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif (is_month()) {

                $year_link = sprintf($link, esc_url(get_year_link($year)), $year);

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif (is_day()) {

                $year_link = sprintf($link, esc_url(get_year_link($year)), $year);
                $month_link = sprintf($link, esc_url(get_month_link($year, $monthnum)), $month_name);

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif (is_post_type_archive()) {

            $post_type = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object($post_type);

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }

    // Handle the search page
    if (is_search()) {
        $breadcrumb_trail = __('Sökresultat för: ') . $before . get_search_query() . $after;
    }

    // Handle 404's
    if (is_404()) {
        $breadcrumb_trail = $before . __('Error 404') . $after;
    }

    // Handle paged pages
    if (is_paged()) {
        $current_page = get_query_var('paged') ? get_query_var('paged') : get_query_var('page');
        $page_addon = $before . sprintf(__(' ( Page %s )'), number_format_i18n($current_page)) . $after;
    }

    $breadcrumb_output_link = '';
    $breadcrumb_output_link .= '<div class="breadcrumb">';
    if (is_home()
        || is_front_page()
    ) {
        // Do not show breadcrumbs on page one of home and frontpage
        if (is_paged()) {
            // $breadcrumb_output_link .= $here_text . $delimiter;
            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else {
        //$breadcrumb_output_link .= $here_text . $delimiter;
        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</div><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;
}


/**
 * Disable the emoji's
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

?>