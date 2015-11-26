<?php 
/*template name: Home - Slider Only */
get_header(); ?>
	
<?php $options = get_option('salient'); ?>

<div id="featured" data-caption-animation="<?php echo (!empty($options['slider-caption-animation']) && $options['slider-caption-animation'] == 1) ? '1' : '0'; ?>" data-bg-color="<?php if(!empty($options['slider-bg-color'])) echo $options['slider-bg-color']; ?>" data-slider-height="<?php if(!empty($options['slider-height'])) echo $options['slider-height']; ?>" data-animation-speed="<?php if(!empty($options['slider-animation-speed'])) echo $options['slider-animation-speed']; ?>" data-advance-speed="<?php if(!empty($options['slider-advance-speed'])) echo $options['slider-advance-speed']; ?>" data-autoplay="<?php echo $options['slider-autoplay'];?>"> 
	 
	<?php 
	 $slides = new WP_Query( array( 'post_type' => 'home_slider', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); 
	 if( $slides->have_posts() ) : ?>
	
		<?php while( $slides->have_posts() ) : $slides->the_post(); 
			
			$alignment = get_post_meta($post->ID, '_nectar_slide_alignment', true); 
			
			$video_embed = get_post_meta($post->ID, '_nectar_video_embed', true);
			$video_m4v = get_post_meta($post->ID, '_nectar_video_m4v', true); 
			$video_ogv = get_post_meta($post->ID, '_nectar_video_ogv', true); 
			$video_poster = get_post_meta($post->ID, '_nectar_video_poster', true); 
			
			?>
			
			<div class="slide orbit-slide <?php if( !empty($video_embed) || !empty($video_m4v)) { echo 'has-video'; } else { echo $alignment; } ?>">
				
				<?php $image = get_post_meta($post->ID, '_nectar_slider_image', true); ?>
				<article data-background-cover="<?php echo (!empty($options['slider-background-cover']) && $options['slider-background-cover'] == 1) ? '1' : '0'; ?>" style="background-image: url('<?php echo $image; ?>')">
					<div class="container">
						<div class="col span_12">
							<div class="post-title">
								
								<?php 
									 $wp_version = floatval(get_bloginfo('version'));
									
									//video embed
									if( !empty( $video_embed ) ) {
										
							             echo '<div class="video">' . do_shortcode($video_embed) . '</div>';
										
							        } 
							        //self hosted video pre 3-6
							        else if( !empty($video_m4v) && $wp_version < "3.6" || !empty($video_ogv) && $wp_version < "3.6") {
							        	
							        	 echo '<div class="video">'; 
							            	 nectar_video($post->ID); 
										 echo '</div>'; 
										 
							        } 
							        //self hosted video post 3-6
							        else if($wp_version >= "3.6"){
							        	
							        	if(!empty($video_m4v) || !empty($video_ogv)) {
							        		
											$video_output = '[video ';
											
											if(!empty($video_m4v)) { $video_output .= 'mp4="'. $video_m4v .'" '; }
											if(!empty($video_ogv)) { $video_output .= 'ogv="'. $video_ogv .'"'; }
											
											$video_output .= ' poster="'.$video_poster.'"]';
											
							        		echo '<div class="video">' . do_shortcode($video_output) . '</div>';	
							        	}
							        }
									
								?>
								
								 <?php 
								 //mobile more info button for video
								 if( !empty($video_embed) || !empty($video_m4v)) { echo '<div><a href="#" class="more-info"><span class="mi">'.__("More Info",NECTAR_THEME_NAME).'</span><span class="btv">'.__("Back to Video",NECTAR_THEME_NAME).'</span></a></div>'; } ?>
								 
								 <?php $caption = get_post_meta($post->ID, '_nectar_slider_caption', true); ?>
								<h2 data-has-caption="<?php echo (!empty($caption)) ? '1' : '0'; ?>"><span>
				        			<?php echo $caption; ?>
								</span></h2>
								
								<?php 
									$button = get_post_meta($post->ID, '_nectar_slider_button', true);
									$button_url = get_post_meta($post->ID, '_nectar_slider_button_url', true);
									
									if(!empty($button)) { ?>
										<a href="<?php echo $button_url; ?>" class="uppercase"><?php echo $button; ?></a>
								 <?php } ?>
								 

							</div><!--/post-title-->
						</div>
					</div>
				</article>
			</div>
		<?php endwhile; ?>
		<?php else: ?>


	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>

<div class="home-wrap">
	<!--  verde -->
	<div class="laranja" style="padding:30px; background-color:#8dcaab;">
		<div class="vc_row wpb_row vc_row-fluid" >
			<div class="vc_col-sm-12 wpb_column vc_column_container centered" >
				<img class="numeros" src="wp-content/themes/salient/img/numeros.png" alt="">
			</div> 
		</div>
	</div>
	<!--  verde -->
	<div class="container main-content" style="padding:35px;">
			<div class="vc_col-sm-4 wpb_column vc_column_container centered" >
				<img src="wp-content/themes/salient/img/novidades.png" alt="">
			</div>
			<div class="vc_col-sm-4 wpb_column vc_column_container centered" >
				<img src="wp-content/themes/salient/img/projetos.png" alt="">
			</div> 
			<div class="vc_col-sm-4 wpb_column vc_column_container centered" >
				<img src="wp-content/themes/salient/img/biblioteca.png" alt="">
			</div>  

	</div><!--/container-->
	
	<!--  foto criança -->
	<div class="laranja" style="padding:20px; background-color:#fff; background-image:url('wp-content/themes/salient/img/menina.jpg');  background-size: cover; background-position-x: 100%;">
		<div class="vc_row wpb_row vc_row-fluid">
			<div class="vc_col-sm-12 wpb_column vc_column_container ">
				<div class="wpb_wrapper vc_col-sm-6"><br/>
					<div class="row"><em style="color:#fff; font-size:5rem; line-height:150%;">colabore com a pró-saber</em> </div>
					<div class="row">
						<div class="row vc_col-sm-6">
						<p style="color:#fff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis deleniti corrupti maxime iure illo, quas beatae iusto .</p>
					</div>
					<div class="row vc_col-sm-6">
						<img src="wp-content/themes/salient/img/botao-quero-ajudar.jpg" alt="">
					</div>
					</div>
				</div> 
				<div class="wpb_wrapper vc_col-sm-6">
							
				</div>
			</div> 
		</div>
	</div>
	<!--  foto criança -->
<!--  laranja -->
	<div class="laranja" style="padding:30px; background-color:#f29d42;">
		<div class="vc_row wpb_row vc_row-fluid" style="background-color:#f29d42;" >
			<div class="vc_col-sm-12 orange wpb_column vc_column_container " style="background-color:#f29d42;">
				<div class="wpb_wrapper">
					
			<div class="wpb_text_column wpb_content_element  orange wpb_animate_when_almost_visible wpb_bottom-to-top wpb_start_animation">
				<div class="wpb_wrapper">
					<div class="col span_12 testimonial_slider" data-autorotate="6500" style="opacity: 1;"><div class="slides" style="height: 152.80512px; overflow: hidden;">
						<blockquote style="color:#fff; opacity: 0.880375591284748; left: -2.99061021788129px; z-index: 20;">
						<div class="vc_col-sm-6">
							<p style="color:#8dcaab;">"
								 <em class="depoimentos" style="color:#fff;">
								 	Depois que o Guilherme entrou aqui ele mudou de comportamento. Antes ele me respondia com desrespeito quando eu reclamava alguma coisa. Ele dizia ‘você não é minha mãe!’ e só atendia minha mãe. Agora agente conversa e eu até ajudo nas lições da escola dele.
								 </em>"
							</p>
						</div>
						<div class="vc_col-sm-6"> 
							<span ><br/><br/>
								<em style="color:#715bae; font-size: 2rem;" >- Sandra Josefa de Lima, mãe do Guilherme</em>
							</span>
						</div>
						
							
						</blockquote>
						<blockquote style="color:#fff; opacity: 0; left: -25px; z-index: 1;">
						<div class="vc_col-sm-6">
							<p style="color:#8dcaab;">"
								 <em class="depoimentos" style="color:#fff;">
								 	Giovana prendeu muita coisa! Desenvolveu a leitura e passou a se interessar mais pelos livros. Aqui é diferente porque vocês lidam com as crianças individualmente, nas outras escolas não. Gosto dos recursos e tecnologias a disposição da Giovana aqui, no meu tempo não tive nada disso. Eu adorei o ensino de vocês.
								 </em>"
							</p>
						</div>
						<div class="vc_col-sm-6"> 
							<span ><br/><br/>
								<em style="color:#715bae; font-size: 2rem;" >- Alciléia Pereira lima Azevedo, mãe da Giovana</em>
							</span>
						</div>
						
							
						</blockquote>
						<blockquote style="color:#fff; opacity: 0; left: -25px; z-index: 1;">
						<div class="vc_col-sm-6">
							<p style="color:#8dcaab;">"
								 <em class="depoimentos" style="color:#fff;">
								 	Ela melhorou bastante em relação a conversar mais com os outros, pois ela era muito tímida vejo que ela mudou muito.
								 </em>"
							</p>
						</div>
						<div class="vc_col-sm-6"> 
							<span >
								<em style="color:#715bae; font-size: 2rem;" >- Rozana Fernandes Bezerra, mãe da Camilly</em>
							</span>
						</div>
						
							
						</blockquote>

						</div>
						<div class="controls">
							<ul>
								<li><span class="pagination-switch active"></span></li>
								<li><span class="pagination-switch"></span></li>
								<li><span class="pagination-switch"></span></li>
							</ul>
						</div>
					</div>
				</div> 
			</div> 
				</div> 
			</div> 
		</div>
	</div>
	<!--  laranja -->
	<!--  branco parceiros -->
	<div class="laranja" style="padding:30px; background-color:#fff;">
		<div class="vc_row wpb_row vc_row-fluid" style="background-color:#fff;" >
			<div class="vc_col-sm-12 orange wpb_column vc_column_container " style="background-color:#fff;">
						<div class="vc_col-sm-2">							
								 <em style="color:#ff0000; font-size: 2rem; line-height:200%;" >
								 	Conheça <br/>os nossos parceiros:
								 </em>							
						</div>
						<div class="vc_col-sm-10">
	          				<div id="owl-demo" class="owl-carousel" >
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/estater2.jpg" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/lourenco-castanho1.jpg" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/funcad1.jpg" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/itau-social1.jpg" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/wbrothers1.jpg" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/logo_lote45.png" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/singular1.jpg" alt="Owl Image"></div>
								  <div class="item"><img src="http://www.prosabersp.org.br/wp-content/uploads/2012/06/logo_itaubba.jpg" alt="Owl Image"></div>
							 </div>
						</div>
			</div> 
		</div>
	</div>
</div><!--/home-wrap-->
<style type="text/css">
	#owl-demo .item{
	  margin: 3px;
	}
	#owl-demo .item img{
	  display: block;
	  width: 100%;
	  height: auto;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function() {
 
	  jQuery("#owl-demo").owlCarousel({
	 
	      autoPlay: 3000
	 
	  });
	 
	});
</script>

<?php get_footer(); ?>