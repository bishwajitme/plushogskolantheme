
<div class="event-entry col-lg-4 col-md-6 col-sm-12 easyanimator custom-content-card">
    <div class="bg-light">
        <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link" class="full_box_link"></a>
        <img src="<?php echo $featuredImage['url']; ?>" class="card-img-top" alt="<?php echo $title; ?> Featured blid">
        <span class="ff-label-wrapper custom"><?php echo $entityType; ?></span>
        <div class="p-3 event-entry-text">
            <p class="publish_date mb-2"><?php echo $publishdate; ?></p>
            <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link">
                <h3 class="nyheter_title card-title"><?php echo $title; ?></h3></a>
            <p class="card-text"><?php echo $excerpt ?></p>
            <a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link" class="arrow_right_container"><span
                        class="icon-arrow-right2"></span></a>
        </div>
    </div>
</div>
