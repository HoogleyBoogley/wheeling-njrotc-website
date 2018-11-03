<?php
$menu_bck_img = get_theme_mod('tesseract_header_layout_bck_image');
$bck_image_rpt = (get_theme_mod('tesseract_vertical_header_bck_img_rpt')) ? get_theme_mod('tesseract_vertical_header_bck_img_rpt') : 'disable';
if($menu_bck_img)
{
  $menu_bck_img_url = 'bck_img';
  if($bck_image_rpt == 'enable'){
  ?>
    <style type="text/css">
      .bck_img{
        background-repeat: repeat;
        background-position: 0 0;
        background:url(<?php echo $menu_bck_img; ?>) right center #FFF !important; padding:0 15px; overflow:inherit !important;
        
      }
    </style>
  <?php
  }
  else{
    ?>
    <style type="text/css">
      .bck_img{
        background:url(<?php echo $menu_bck_img; ?>) right center no-repeat #FFF !important; padding:0 15px; overflow:inherit !important;
        
      }
    </style>
    <?php
  }
}
else
{
  $menu_bck_img_url = '';
}
$menuSelected = (get_theme_mod('tesseract_header_menu_select')) ? get_theme_mod('tesseract_header_menu_select') : 'none';
$tesheadr_layout = (get_theme_mod('tesseract_header_layout_setting')) ? get_theme_mod('tesseract_header_layout_setting') :'defaultlayout' ;

//echo '************************************** '.$tesheadr_layout;
$tesheadr_menu = (get_theme_mod('tesseract_vertical_header_menu_fixed')) ? get_theme_mod('tesseract_vertical_header_menu_fixed') : 'disable';
if($tesheadr_menu == 'enable')
{
	$tesheadr_menu_fixed = 'header-fixed';
	$tesheadr_content_fixed = 'content-fixed';
	?>
	<script type="text/javascript">
		jQuery('body').addClass('content-fixed');
	</script>
	<?php
}
if($tesheadr_menu == 'disable')
{
	$tesheadr_menu_fixed = 'header-not-fixed';
	$tesheadr_content_fixed = '';
}


?>
<?php if ( $tesheadr_layout == 'none') { ?>
<?php }elseif ( $tesheadr_layout == 'defaultlayout') { ?>
			<header id="masthead_TesseractTheme" class="defaultlayout site-header <?php echo $rightclass . $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$tesheadr_menu_fixed.' '.$menu_bck_img_url.' '; ?>" role="banner">
				<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?>">
					<div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">
						<?php if($mmdClass=='mob-showit'){ ?>
					  		<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>
					  	<?php } ?>

					  	<div id="site-banner-left">

							<div id="site-banner-left-inner">

							    <div class="site-branding">

							        <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

							        <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

							        <?php else : ?>

							        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

							          <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
							            <?php echo $header_text; ?>
							          </span>

							          </a>
							        </h1>

							        <?php endif; ?>
							    </div>

							  	<?php 
								if ( $menuSelected !== 'none' ) : ?>

									<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">
							    		<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 );  ?>
							  		</nav>
							  <?php endif; ?>
							</div>
					  	</div>

					  	<?php get_template_part( 'content', 'header-rightcontent' ); ?>
					</div>

			  	</div>
			</header>
<?php } elseif ( $tesheadr_layout == 'navbottom' ) { ?>

			<header id="masthead_TesseractTheme" class="navbottom site-header <?php echo $rightclass . $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$tesheadr_menu_fixed.' '.$menu_bck_img_url.' '; ?>" role="banner">

			  	<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?> bottomNav">

				    <div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">
				      	<?php if($mmdClass=='mob-showit'){ ?>
				      		<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>
				      	<?php } ?>
					    <div id="site-banner-left">

					        <div id="site-banner-left-inner">

					              <div class="site-branding">

					                <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

					                <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

					                <?php else : ?>

					                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					                  <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
					                    <?php echo $header_text; ?>
					                  </span>

					                  </a></h1>

					                <?php endif; ?>

					              </div>

					        </div>
					    </div>
				      	<?php get_template_part( 'content', 'header-rightcontent' ); ?>
				    </div>

			    	<?php $menuSelected = (get_theme_mod('tesseract_header_menu_select')) ? get_theme_mod('tesseract_header_menu_select'):'none';
						if ( $menuSelected !== 'none' ) : ?>
						    <nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">
						    	<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>
						    </nav>
			    	<?php endif; ?>
			  	</div>
			</header>
<?php } elseif( $tesheadr_layout == 'navright' ) { ?>
			<header id="masthead_TesseractTheme" class="navright site-header <?php echo $rightclass . $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$tesheadr_menu_fixed.' '.$menu_bck_img_url.' '; ?>" role="banner">
				<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?>">
					<div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">
					  <?php if($mmdClass=='mob-showit'){ ?>
					  <div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>
					  <?php } ?>
						<div id="site-banner-left">

						    <div id="site-banner-left-inner">

						        <div class="site-branding">

						            <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

						            <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

						            <?php else : ?>

						            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

						              <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
						                <?php echo $header_text; ?>
						              </span>

						              </a></h1>

						            <?php endif; ?>

						        </div>


						    </div>
						</div>
						<div id="" class="banner-right">
							<?php if ( $menuSelected !== 'none' ) : ?>

								<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation rightNav <?php echo $hmenusize_class; ?>" role="navigation">

								<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>

								</nav>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</header>
<?php } elseif( $tesheadr_layout == 'navleft' ) { ?>

			<header id="masthead_TesseractTheme" class="navleft site-header <?php echo $rightclass . $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$tesheadr_menu_fixed.' '.$menu_bck_img_url.' '; ?>" role="banner">
			  	<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?>">
			    	<div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">
						<?php if($mmdClass=='mob-showit'){ ?>
						<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>
						<?php } ?>
						<div id="site-banner-left">

							<div id="site-banner-left-inner">

							  	<?php if ( $menuSelected !== 'none' ) : ?>

									<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">

							    	<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>

							  	</nav>

							  	<?php endif; ?>


							    <div class="site-branding">

							        <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

							        <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

							        <?php else : ?>

								        <h1 class="site-title">
								        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									        	<span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
									            	<?php echo $header_text; ?>
									        	</span>
									        </a>
								        </h1>

							        <?php endif; ?>

							    </div>

							</div>
						</div>
			    	</div>
			  	</div>
			</header>
<?php } elseif( $tesheadr_layout == 'centered-inline-logo' ) { ?>

			<header id="masthead_TesseractTheme" class="centered-inline-logo site-header <?php echo $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$tesheadr_menu_fixed.' '.$menu_bck_img_url.' '; ?>" role="banner">

			  	<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?> centeredNav">

				    <div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">

				      	<div class="row">

					        <div class="col-md-12 dsk-menu">

					        	<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>

					        	
						        <div class="col-md-12 mob-menu">
						            <?php if ( $menuSelected !== 'none' ) : ?>
						            	<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation 	<?php echo $hmenusize_class; ?>" role="navigation">
						                	<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>
						            	</nav>
						            <?php endif; ?>
						        </div>

					        </div>

				      	</div>

				    </div>

			  	</div>

			</header>


<?php } elseif( $tesheadr_layout == 'navcentered' ) { ?>

			<header id="masthead_TesseractTheme" class="navcentered site-header <?php echo $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$tesheadr_menu_fixed.' '.$menu_bck_img_url.' '; ?>" role="banner">

				<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?> centeredNav">

			    	<div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">

			      		<div class="row">

				        	<div class="col-md-12">

				            	<div class="site-branding">

					                <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

					                <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

					                <?php else : ?>

					                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					                  <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
					                    <?php echo $header_text; ?>
					                  </span>

					                  </a></h1>

					                <?php endif; ?>

				             	</div>

				        	</div>

					        <div class="col-md-12">

					          	<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>

					          	<?php if ( $menuSelected !== 'none' ) : ?>

					        		<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">

					            		<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>

					        		</nav>

					          	<?php endif; ?>
					        </div>

			      		</div>

			    	</div>

			  	</div>

			</header>



<?php } elseif( $tesheadr_layout == 'vertical-left' ) { ?>

		<div class="fl-page verticalNavLeftContainer">

		  	<header id="masthead_TesseractTheme" class="vertical-left site-header verticalLeftHeader <?php echo $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$menu_bck_img_url.' '; ?>" style="width:<?php echo $tesheadr_vertpadding; ?>px;" role="banner">

			    <div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?> vertical">

			      	<div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">


			            <div class="site-branding">

			                <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

			                  <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

			                  <?php else : ?>

			                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

			                    <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
			                      <?php echo $header_text; ?>
			                    </span>

			                    </a></h1>

			                <?php endif; ?>

			            </div>

			        	<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>

			        	<?php if ( $menuSelected !== 'none' ) : ?>

				        	<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">

				          		<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>

				        	</nav>

			        	<?php endif; ?>

			      	</div>

			    </div>

			</header>

<?php } elseif( $tesheadr_layout == 'vertical-right' ) { ?>

		<div class="fl-page verticalNavRightContainer">

			<header id="masthead_TesseractTheme" class="vertical-right site-header verticalRightHeader <?php echo $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '.$menu_bck_img_url.' '; ?>" style="width:<?php echo $tesheadr_vertpadding; ?>px;" role="banner">

			  <div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?> vertical">

			    <div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">

			      <?php //if ( $logoImg || $blogname ) { ?>

			              <div class="site-branding">

			                <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

			                <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

			                <?php else : ?>

			                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

			                  <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
			                    <?php echo $header_text; ?>
			                  </span>

			                  </a></h1>

			                <?php endif; ?>

			              </div>

			              <!-- .site-branding -->

			              <?php //} ?>

			      <div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>

			      <?php //$menuSelected = get_theme_mod('tesseract_header_menu_select');

						//if ( $menuSelected !== 'none' ) : ?>

			      <nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">

			        <?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 ); ?>

			      </nav>

			      <!-- #site-navigation -->

			      <?php //endif; ?>

			    </div>

			  </div>

			</header>



<?php }/*else{ ?>

<header id="masthead_TesseractTheme" class="site-header <?php echo $rightclass . $headpos . ' ' . 'menusize-' . $hmenusize_class . ' '; echo get_header_image() ? 'is-header-image' : 'no-header-image'; ?>" role="banner">

  	<div id="site-banner" class="cf<?php echo ' ' . $headright_content . ' ' . $brand_content; ?>">
		<div id="site-banner-main" class="<?php echo ( ( $headright_content  ) && ( $headright_content !== 'nothing' ) ) ?  'is-right' : 'no-right'; ?>">
			<?php if($mmdClass=='mob-showit'){ ?>
		  		<div id="mobile-menu-trigger-wrap" class="cf"><a class="<?php echo $rightclass; ?>menu-open dashicons dashicons-menu" href="#" id="mobile-menu-trigger"></a></div>
		  	<?php } ?>

		  	<div id="site-banner-left">

				<div id="site-banner-left-inner">

				    <div class="site-branding">

				        <?php if ( $header_logo_choice == 'image' && $logoImg ) : ?>

				        <h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

				        <?php else : ?>

				        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

				          <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
				            <?php echo $header_text; ?>
				          </span>

				          </a>
				        </h1>

				        <?php endif; ?>
				    </div>

				  	<?php 
					if ( $menuSelected !== 'none' ) : ?>

						<nav id="site-navigation" class="<?php echo $mmdClass; ?> main-navigation top-navigation <?php echo $hmenusize_class; ?>" role="navigation">
				    		<?php tesseract_output_menu( FALSE, FALSE, 'primary', 0 );  ?>
				  		</nav>
				  <?php endif; ?>
				</div>
		  	</div>

		  	<?php get_template_part( 'content', 'header-rightcontent' ); ?>
		</div>

  	</div>
</header>
<?php } */?>
