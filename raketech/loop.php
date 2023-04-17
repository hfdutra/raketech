<div class="table loop">
  <div class="table-row">
<!-- First Column: Casino -->
    <div class="table-cell brand">
        <?php echo '<img src="'. $item->logo .'" class="brand-logo" width="100%">'; ?>
        <a href="<?php echo get_site_url(). '/' . $item->brand_id; ?>" class="review">Review</a>
    </div>
<!-- Second Column: Casino -->
    <div class="table-cell bonus">
        <span class="rating">
            <!-- require star rating file -->
           <?php include('rating.php'); ?>
        </span>
        <span class="bonus">
            <?php echo $item->info->bonus; ?>
        </span>
    </div>
<!-- Third Column: Features -->
    <div class="table-cell features">
        <ul class="icon-list">
        <?php foreach ($item->info->features as $feature) { ?>
            <li><i class="fa fa-arrow-right"></i> <?php echo $feature; ?></li>
        <?php } ?>
        </ul>
    </div>
<!-- Fourth Column: Play -->
    <div class="table-cell play">
        <a href="<?php echo $item->play_url; ?>" class="play-btn">Play now</a>
        <br>
        <span class="terms">
            <?php echo $item->terms_and_conditions; ?>
        </span>
    </div>
  </div>
</div>