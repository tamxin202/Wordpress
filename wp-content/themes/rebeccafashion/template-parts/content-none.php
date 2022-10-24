<header class="page-header">
	<h1 class="page-title"><?php esc_html_e('Nothing Found', 'rebeccafashion'); ?></h1>
</header>
<div class="page-content error-page">
	<?php if (is_home() && current_user_can('publish_posts')) : ?>
	<p><?php esc_html_e('Ready to publish your first post?', 'rebeccafashion'); ?> <a href="<?php echo esc_url( admin_url('post-new.php') ); ?>"><?php esc_html_e('Get started here', 'rebeccafashion'); ?></a></p>
	<?php elseif (is_search()) : ?>
	<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rebeccafashion'); ?></p>
	<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rebeccafashion'); ?></p>
	<?php get_search_form(); ?>
	<?php endif; ?>
</div>