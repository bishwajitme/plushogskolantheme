
<div class="event-entry col-lg-4 col-md-4 col-sm-12">
    <div class="bg-light">
        <img src="<?php echo $featuredImage['url']; ?>" class="card-img-top" alt="<?php echo $title; ?> Featured blid">
        <h6 class="ff-label-wrapper custom"><?php echo $entityType; ?></h6>
        <div class="p-3 event-entry-text">
            <p class="publish_date"><?php echo $publishdate; ?></p>
            <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link"><h4
                        class="nyheter_title card-title"><?php echo $title; ?></h4></a>
            <p class="card-text"><?php echo $excerpt ?></p>
            <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link" class="arrow_right_container"><span
                        class="icon-arrow-right2"></span></a>
        </div>
    </div>
</div>
