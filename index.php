<?php
	get_header();
?>
		<!--  Begin index.php -->
		
			<?php
			
				// !Basic Loop here
				if(have_posts()) {
					while(have_posts()) {
						the_post();
						echo "<h1>" . get_the_title() . "</h1>\n";
						the_content();
					}
				}
			
			?>
		
		<!--  End index.php -->
<?php
	get_footer();
?>