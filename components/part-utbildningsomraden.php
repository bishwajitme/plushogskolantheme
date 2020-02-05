<?php

$utbildningsomraden = get_sub_field('utbildningsomraden_section_title');
$orter_text = get_sub_field('utbildningsomraden_orter_text');
$alla_utbildningar_blid = get_sub_field('alla_utbildningar_blid');

?>
<section class="utbildningsomraden pt-4 mt-4 pb-4 mb-4 clearfix ">
    <h2 class="section_title text-center p-4 mb-4"  aria-label="<?php echo $utbildningsomraden; ?>" title="<?php echo $utbildningsomraden; ?>"><?php echo $utbildningsomraden; ?></h2>
    <div class="container">
        <div class="row">
            <?php
            $subject_count = count(get_sub_field('amne_names'));
            if (have_rows('amne_names')):


                if($subject_count  > 3 ){
                    $subject_class = "col-lg-4 col-md-4";
                }
                else{
                    $subject_class = "two-col col-md-6";
               }

                    // loop through the rows of data
               while (have_rows('amne_names')): the_row();

                        // display a sub field value
                $amne_title = get_sub_field('amne_title');
                $amne_image = get_sub_field('amne_blid');

                $amne_link = get_sub_field('amne_link');

                ?>

                <div class="amne-entry easyanimator <?php echo $subject_class; ?> col-sm-6 col-xs-12 p-2">

                    <div class="text-white hovereffect">
                      <a href="<?php echo $amne_link; ?>" title="<?php echo $amne_title; ?> link" class="full_box_link"></a>
                      <img src="<?php echo esc_url($amne_image['url']); ?>" class="img-responsive"
                      alt="<?php echo $amne_title; ?>">
                      <div class="overlay">
                        <h2 class="text-white"><a  href="<?php echo $amne_link; ?>"
                          title="gå till <?php echo $amne_title; ?>"><?php echo $amne_title; ?></a></h2>
                          <p><a class="info" href="<?php echo $amne_link; ?>"
                              title="gå till <?php echo $amne_title; ?>">Läs mer</a></p>
                          </div>
                      </div>
                  </div>


                  <?php
              endwhile;

          else:

                    // no rows found

          endif;
          ?>
          <div class="amne-entry <?php echo $subject_class; ?>  col-sm-6 col-xs-12 p-2">

            <div class="text-white hovereffect">
              <a href="/utbildningar/" title="Alla utbildningar link" class="full_box_link"></a>
                <img src="<?php echo esc_url($alla_utbildningar_blid['url']); ?>" class="img-responsive"
                alt="Alla utbildningar">
                <div class="overlay">
                    <h2 class="text-white"><a href="/utbildningar/"
                      title="gå till Alla utbildningar">Alla utbildningar</a></h2>
                      <p>Här hittar du hela utbildningsutbudet.</p>
                     </div>
                 </div>
             </div>


         </div>
         <div class="orter_text text-center mt-4 mb-4 ml-auto mr-auto pt-4 pb-2 w-75"><?php echo $orter_text; ?></div>
     </div>

 </section>