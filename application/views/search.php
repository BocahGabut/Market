<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('__lib/header_all');
?>
<title>Market</title>

<body>
	<div class="container">
		<div id="navbar" class="navbar fixed">
			<a href="#" class="back__">
				<i class="fas fa-arrow-left"></i>
			</a>
			<div class="container__search">
				<div class="search__">
					<input type="text" name="xxdw" placeholder="product name......" id="zxce">
				</div>
			</div>
			<div class="nav__items">
				<a href="#"><i class="fas fa-truck-moving"></i></a>
			</div>
		</div>
		<div class="main__">
			<div class="search__list" id="res__">

			</div>
		</div>
	</div>
	<?php
	$this->load->view('__lib/footer')
	?>
</body>

<script src="<?= base_url() . 'assets/front/js/live__search.js' ?>">
</script>
