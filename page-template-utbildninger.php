<?php
/**
 *  Template Name: Utbildninger Page
 *
 * @package plushogskolan
 */

get_header();
$utbildning_page_form = get_field('utbildning_page_form');
 $email_address = get_field('email_address', 'option');
  $phone_number = get_field('phone_number', 'option');
$sidebar_button_text = get_field('sidebar_button_text');
$sidebar_button_link = get_field('sidebar_button_link');
  

sidebar_button_link

?>
<div class="row">
    <div id="filter_form" class="form-area col-12 col-md-3">
        <button class="btn filtering_button hidden visible-xs" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Filtrera utbildningar
  </button>
    
  <div class="collapse dont-collapse-sm" id="collapseExample">
        <?php echo do_shortcode('[searchandfilter id="'. $utbildning_page_form .'"]'); ?>
        </div>
        <div class="sidecontent d-none d-lg-block">
         <?php if($sidebar_button_link != ""):?>
          <p class="mb-0 mt-3"> <span class="font-weight-bold d-block">Vill du inleda en ny karriär?</span>Gå vidare med din ansökan!</p>
          <a href="<?php echo $sidebar_button_link; ?>" class="btn btn-primary ansok_button btn-md mt-3 mb-4"><?php echo $sidebar_button_text; ?></a>

           <?php endif;?>

      <p class="font-weight-bold d-block mb-0">  Kom i kontakt med oss</p>
      <p>Behöver mer info innan du bestämmer dig? Kontakta oss på <a href="tel:<?php echo $phone_number; ?>"> <?php echo $phone_number; ?> </a>
        eller <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>.</p>
       <p class="font-weight-bold d-block mb-0">Ska vi skicka dig mer info?</p>
        <p>Gör en <a href='/om-oss/intresseanmalan/' style="text-decoration: underline;"><strong>intresseanmälan</strong> </a>
        så håller vi dig uppdaterad om vad som är på gång!</p>
    </div>
</div>
<div id="primary" class="content-area col-12 col-md-9">
    <main id="main" class="site-main pt-4">

        <?php
        while (have_posts()) :
            the_post();

                    //get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
        endif;

                endwhile; // End of the loop.
                echo do_shortcode('[searchandfilter id="'.$utbildning_page_form .'" show="results"]');
                ?>

                 <div class="sidecontent d-md-block d-lg-none text-center">
         
          <p class="mb-0 mt-3"> <span class="font-weight-bold d-block">Vill du inleda en ny karriär?</span>Gå vidare med din ansökan!</p>
          <a href="/om-oss/intresseanmalan/" class="btn btn-primary ansok_button btn-md mt-3 mb-4">Ansök här</a>



      <p class="font-weight-bold d-block mb-0">  Kom i kontakt med oss</p>
      <p>Behöver mer info innan du bestämmer dig? Kontakta oss på <a href="tel:<?php echo $phone_number; ?>"> <?php echo $phone_number; ?> </a>
        eller <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>.</p>
       <p class="font-weight-bold d-block mb-0">Ska vi skicka dig mer info?</p>
        <p>Gör en <a href='/om-oss/intresseanmalan/' style="text-decoration: underline;"><strong>intresseanmälan</strong> </a>
        så håller vi dig uppdaterad om vad som är på gång!</p>
    </div>

                <div class="row">
                    <div class="col-lg-12 col-12 p-4 mt-5 mb-5 ej_sokbarbox text-center">
                        <a href="/ej-sokbara/" title="<?php echo $link_title; ?> link">
                            <h4 class="nyheter_title card-title">Ej sökbara utbildningar</h4>
                        </a>
                        <p>Går du redan en av våra utbildningar? Här finns information om ej sökbara utbildningar.</p>
                        <a href="/ej-sokbara/" title="Ej sökbara utbildningar link"
                        class="arrow_right_container"><span class="icon-arrow-right2 text-white"></span></a>
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
            <div class="p-2 m-2 clearfix"></div>

    </div><!-- #row -->
    <?php get_footer();