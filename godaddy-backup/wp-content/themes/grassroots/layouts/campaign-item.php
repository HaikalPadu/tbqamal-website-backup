<?php
/**
 * Campaign Item
 *
 * Sets how our campaign items are displayed in the home page widget.
 *
 * @package WordPress
 * @subpackage Grassroots
 * @since 1.0.0
 */

?>
<?php global $post, $campaign; ?>	

<li id="campaign-item-<?php the_ID(); ?>" class="campaign-item">
	
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'home-product', array( 'class' => 'feature' ) ); ?></a>
	
	<div class="campaign-item-content">
	
		<h4 class="camaign-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'grassroots' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h4>
		
		<?php the_excerpt(); ?>
		
		<div class="the-411">
		
			<div class="graph"><span style="width: <?php echo $campaign->percent_completed(); ?>"></span></div>
		
			<div class="percentage">
				<h5><?php echo $campaign->percent_completed(); ?></h5>
				<p>Funded</p>
			</div>
			
			<div class="pledged">
				<h5><?php echo $campaign->percent_completed(); ?></h5>
				<p>Pledged</p>
			</div>

			<?php if ( ! $campaign->is_endless() ) : ?>
			<div class="days-remaining">
				<?php if ( $campaign->days_remaining() > 0 ) : ?>
					<h3><?php echo $campaign->days_remaining(); ?></h3>
					<p><?php echo _n( 'Day to Go', 'Days to Go', $campaign->days_remaining(), 'fundify' ); ?></p>
				<?php else : ?>
					<h3><?php echo $campaign->hours_remaining(); ?></h3>
					<p><?php echo _n( 'Hour to Go', 'Hours to Go', $campaign->hours_remaining(), 'fundify' ); ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		
	</div>

</li><!-- #campaign-item-<?php the_ID(); ?> -->