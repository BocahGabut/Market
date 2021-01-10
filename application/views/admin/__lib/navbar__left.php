<aside class="app-navbar">
	<!-- begin sidebar-nav -->
	<div class="sidebar-nav scrollbar scroll_dark">
		<ul class="metismenu " id="sidebarNav">
			<li class="nav-static-title">Navigation Menu</li>
			<li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/dashboard" aria-expanded="false"><i class="nav-icon ti ti ti-dashboard"></i><span class="nav-title">Dashboard</span></a> </li>
			<li class="<?php echo $this->uri->segment(2) == 'product' || $this->uri->segment(2) == 'diskon' || $this->uri->segment(2) == 'publish'  ? 'active' : ''; ?>">
				<a class="has-arrow" href="javascript:void(0)" aria-expanded="fasle">
					<i class="nav-icon ti ti-layout"></i>
					<span class="nav-title">Management Product</span>
				</a>
				<ul aria-expanded="false">
					<li class="<?php echo $this->uri->segment(2) == 'product' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/product'>Product</a>
					</li>
					<li class="<?php echo $this->uri->segment(2) == 'publish' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/publish'>Publish</a>
					</li>
					<li class="<?php echo $this->uri->segment(2) == 'diskon' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/diskon'>Diskon</a>
					</li>
				</ul>
			</li>
			<li class="<?php echo $this->uri->segment(2)  == 'account' || $this->uri->segment(2) == 'notes' ? 'active' : ''; ?>">
				<a class="has-arrow" href="javascript:void(0)" aria-expanded="fasle">
					<i class="nav-icon ti ti ti-key"></i>
					<span class="nav-title">Settings</span>
				</a>
				<ul aria-expanded="false">
					<li class="<?php echo $this->uri->segment(2) == 'account' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/account'>Account</a>
					</li>
					<li class="<?php echo $this->uri->segment(2) == 'notes' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/notes'>Notes</a>
					</li>
				</ul>
			</li>

			<li class="sidebar-banner bg-gradient text-center m-3 d-block rounded">
				<button onclick="logout_message('<?= base_url() . 'admin/dashboard/logout' ?>');" class="btn btn-square btn-inverse-light btn-xs d-inline-block p-3 col-md-12"> Logout Now</button>
			</li>
		</ul>
	</div>
	<!-- end sidebar-nav -->
</aside>
