<?php

$studentavdelning_text = get_sub_field('studentavdelning_text');
$mv_studentavdelning_image = get_sub_field('mv_studentavdelning_image');

?>

<section class="mot_vara_studentavdelning home-section easyanimator clearfix">

    <div class="container">

        <div class="row">
            <div class="aspekter-entry col-lg-6 col-md-6 col-sm-12 col-xs-12 p-2 minImageHeight">

                <p class="text-white pr-4"><a href="/nyheter?_sft_nyhetstyp=intervju" title="Läs alla våra intervjuer"><img class="mv_studentavdelning_image img-fluid z-depth-2"
                                                src="<?php echo $mv_studentavdelning_image['url'] ?>"
                                                alt="Studentavdelning Blid"/></a></p>
            </div>
            <div class="aspekter-entry col-lg-6 col-md-6 col-sm-12 col-xs-12 p-4">
                <h2 class="section_title text-left pt-2 pb-2">Möt våra studerande</h2>
                <p class="text-white aspekter_text"><?php echo $studentavdelning_text; ?></p>
                <p class="las-mer"><a href="/nyheter?_sft_nyhetstyp=intervju" title="Läs alla våra intervjuer">Läs alla våra intervjuer
                        >></a></p>

            </div>


        </div>
    </div>

</section>