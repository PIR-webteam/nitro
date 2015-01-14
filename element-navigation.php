		<!-- Menu -->
		<div class="twelve columns omega" id="menu"> 
			<div class="navigation">
				<!-- DEFAULT NAVIGATION -->
				<?php 
				wp_nav_menu( array(
					 'container' =>false,
					 'theme_location' => 'topbar',
					 'menu_class' => 'sf-menu dark',
					 'echo' => true,
					 'before' => '',
					 'after' => '',
					 'link_before' => '',
					 'link_after' => '',
					 'depth' => 0,
					 'walker' => new description_walker())
				 ); 
				?>
				 <!-- /DEFAULT NAVIGATION -->							 
			</div>	
		</div>		 
		<!-- /End Menu -->