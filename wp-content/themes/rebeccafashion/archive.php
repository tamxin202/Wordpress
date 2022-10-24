<?php

get_header();

?>
<div class="archive-box">
	<div class="content-text">
        <h1><?php the_archive_title(); ?></h1>
        <?php if ( get_the_archive_description() ) { ?>
        <div class="desc">
            <?php the_archive_description(); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php

get_template_part( 'loop' );

get_footer();
