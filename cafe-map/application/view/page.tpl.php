<section>
	<div class="container">
		<?php foreach ( $restaurants['content'] as $content ) {
			echo esc_html( $content['content'] );
		} ?>
	</div>
</section>
