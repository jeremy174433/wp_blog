	<footer class="bgc-dark">

		<div class="container py-5 px-4 px-xl-5">

			<div class="d-flex flex-column flex-sm-row py-5">
				<a class="logo-link d-flex mx-auto mx-sm-0" href="https://www.askingfranklin.com">
					<object data="<?php echo get_template_directory_uri() . '/img/svg/logo-white.svg' ?>" alt="Logo Asking Franklin" width="200" type="image/svg+xml"></object>
				</a>
				<ul class="social-media-wrapper d-flex flex-row mx-auto mr-sm-0 ml-sm-auto mt-5 mt-sm-0">
					<li>
						<a href="https://www.facebook.com/askingfranklin/" target="_blank" rel="nofollow noopener" title="Ouvrir dans un nouvel onglet : Facebook">
							<object data="<?php echo get_template_directory_uri() . '/img/svg/social-media/facebook.svg' ?>" alt="Facebook de Asking Franklin" height="18" type="image/svg+xml"></object>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/AskingFranklin" target="_blank" rel="nofollow noopener" title="Ouvrir dans un nouvel onglet : Twitter">
							<object data="<?php echo get_template_directory_uri() . '/img/svg/social-media/twitter.svg' ?>" alt="Twitter de Asking Franklin" width="18" type="image/svg+xml"></object>
						</a>
					</li>
					<li>
						<a href="https://www.linkedin.com/company/asking-franklin/" target="_blank" rel="nofollow noopener" title="Ouvrir dans un nouvel onglet : LinkedIn">
							<object data="<?php echo get_template_directory_uri() . '/img/svg/social-media/linkedin.svg' ?>" alt="LinkedIn de Asking Franklin" width="18" type="image/svg+xml"></object>
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/channel/UC3ZL1ozv0C0ip8T3VHrp2qw" target="_blank" rel="nofollow noopener" title="Ouvrir dans un nouvel onglet : YouTube">
							<object data="<?php echo get_template_directory_uri() . '/img/svg/social-media/youtube.svg' ?>" alt="YouTube de Asking Franklin" width="18" type="image/svg+xml"></object>
						</a>
					</li>
				</ul>
			</div>

			<div class="d-flex justify-content-center pb-5 pb-sm-0 pt-5">
				<p class="fz-14">Asking Franklin <?php echo date('Y'); ?>, par <a href="https://sortvoices.fr" target="_blank" title="Ouvrir dans un nouvel onglet : www.sortvoices.fr">Sortvoices</a>. Tous droits réservés.</p>
			</div>

		</div>

	</footer>

	<button class="back-to-top-btn">
		<object data="<?php echo get_template_directory_uri() . '/img/svg/arrow.svg' ?>" class="back-to-top-btn-icon" width="22" type="image/svg+xml"></object>
	</button>

	<script>
		const scrollToTopBtn = document.querySelector('.back-to-top-btn'),
			rootElement = document.documentElement,
			scrollingLimit = 2500;

		function handleScroll() {
			if ( document.body.scrollTop >= scrollingLimit || rootElement.scrollTop >= scrollingLimit ) {
				scrollToTopBtn.classList.add('back-to-top-btn-showed');
			}
			else {
				scrollToTopBtn.classList.remove('back-to-top-btn-showed');
			}
		}

		function scrollToTop() {
			rootElement.scrollTo({
				top: 0,
				left: 0,
				behavior: 'smooth'
			});
		}

		document.addEventListener('scroll', handleScroll);
		scrollToTopBtn.addEventListener('click', scrollToTop);
	</script>

</body>

</html>