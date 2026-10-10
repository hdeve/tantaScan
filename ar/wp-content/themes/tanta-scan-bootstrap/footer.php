<!-- BEGIN: Footer -->
	<footer class="bg-gray-100 border-t border-gray-300 py-0 text-sm" data-purpose="site-footer">
	<div class="container row mx-auto px-4 max-w-7xl  gap-8">
		<!-- Services List -->
		<div class="col-md-4 footer-menu">
			<h4 class="text-accent font-bold mb-4 flex justify-between border-b pb-2">
							الخدمات
							<a class="text-xs text-gray-500 hover:text-primary" href="#">شاهد جميع الخدمات</a>
			</h4>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'menu_class'     => 'space-y-2 text-gray-600',
					'container'      => false,
					'echo'           => true,
					'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
					'link_before'    => '<span>',
					'link_after'     => '</span>',
				) );
			?>
		</div>
		<!-- Contact Info -->
		<div class="col-md-4 text-center border-x border-gray-300 px-4">
			<h4 class="text-accent font-bold mb-4 border-b pb-2">اتصل بنا</h4>
			<div>
				<span class="font-bold text-gray-800">الشبكات الاجتماعية:</span>
				<a class="inline-block bg-gray-600 text-white px-2 py-1 rounded mr-2 hover:bg-primary transition" href="#">f</a>
			</div>
		</div>
		<div>
			
		</div>
	</div>
	<div class="footer-copy-right">
		<div class="text-center text-black-100 text-sm lg:text-[16px] font-semibold bg-gradient-to-br from-green-200 to-green-500 pt-[17px] pb-[17px]">جميع الحقوق محفوظة لـ<?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> </div>
	</div>
	</footer>
	<!-- END: Footer -->

</div>
<!-- #page -->

<?php wp_footer(); ?>
</body>
</html>