					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav>
						<ul>
							<li>
							<a href="https://www.creative-tim.com">
								Creative Tim
							</a>
							</li>
							<li>
							<a href="http://presentation.creative-tim.com">
								About Us
							</a>
							</li>
							<li>
							<a href="http://blog.creative-tim.com">
								Blog
							</a>
							</li>
						</ul>
						</nav>
						<div class="copyright" id="copyright">
						&copy;
						<script>
							document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
						</script>
						<a href="https://www.invisionapp.com" target="_blank">Capture Memories Travels and Tours</a>.
						</div>
					</div>
				</footer>
			</div>
		</div>
		
		<!-- <textarea name="" class="editor" id="editor" cols="30" rows="10"></textarea> -->
		<script src="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/js/core/jquery.min.js"></script>
		<script src="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/js/core/popper.min.js"></script>
		<script src="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/js/core/bootstrap.min.js"></script>
		<script src="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
		<script src="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
		<script src="https://cdn.tiny.cloud/1/eu5dzjii9t7855b8emqmu9rcklczoyr2ivtkmvj9712vbs33/tinymce/5/tinymce.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script>
			$('.datepicker').datepicker({
				uiLibrary: 'bootstrap4',
				format: 'yyyy-mm-dd',
				startDate: '-3d'
			});
			tinymce.init({
				selector: '.tinymce',
				height: 500
			});
		</script>
		<script src="<?= URL.'public/js/main.js'?>"></script>
		<script src="<?= URL.'public/js/'.$module.'.js'?>"></script>
		
	</body>
</html>