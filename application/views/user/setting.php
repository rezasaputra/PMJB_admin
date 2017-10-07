<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow"><i class="fa fa-gear fa-fw fa-lg"></i> Pengaturan </h1>

					<!--Searchbox-->
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->		

				<!--Page content-->
				<!--===================================================-->
				<div id="page-content">				
			        <!--User table-->
			        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			        <div class="panel">
			            <?php echo $this->session->flashdata('message'); ?>
			            <div class="panel-heading">
			                <div class="panel-control">
			                    <a class="fa fa-question-circle fa-lg fa-fw unselectable add-tooltip" href="#" data-original-title="<h4 class='text-thin'>Information</h4><p style='width:150px'>This is an information About Our Client.</p>" data-html="true" title=""></a>
			                </div>
			                <h3 class="panel-title">Form Pengaturan</h3>
			            </div>
			
			            <div class="panel-body">
			            	<div class="col-lg-6">
					
							<!--Default Tabs (Left Aligned)-->
							<!--===================================================-->
							<div class="tab-base">
									<!--Nav Tabs-->
									<ul class="nav nav-tabs">
										<li class="active">
											<a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="false"><i class="fa fa-user fa-fw fa-md"></i> Profil </a>
										</li>
										<li class="">
											<a data-toggle="tab" href="#demo-lft-tab-2" aria-expanded="true"><i class="fa fa-lock fa-fw fa-md"></i> Password</a>
										</li>
									</ul>
						
									<!--Tabs Content-->
									<div class="tab-content">
										<div id="demo-lft-tab-1" class="tab-pane fade active in">
											<form class="form-horizontal" method="POST" action="<?php echo base_url()?>User/update_profil">
							                	<div class="form-group">
													<label class="col-sm-3 control-label" for="demo-hor-inputemail">Nama Lengkap</label>
													<div class="col-sm-7">
														<input type="text" name="id" id="id" value="<?php echo isset($edit->uid) ? $edit->uid:'';?>" class="hidden">
														<input type="text" name="nama" value="<?php echo isset($edit->nama_admin) ? $edit->nama_admin:'';?>" id="nama" class="form-control" placeholder="Nama Lengkap" required="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label" for="demo-hor-inputemail">Email</label>
													<div class="col-sm-7">
														<input type="email" placeholder="Username" value="<?php echo isset($edit->email) ? $edit->email:'';?>" name="email" id="email" class="form-control" required="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label" for="demo-hor-inputemail">Username</label>
													<div class="col-sm-7">
														<input type="text" placeholder="Username" value="<?php echo isset($edit->username) ? $edit->username:'';?>" name="username" id="username" class="form-control" required="">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-5 col-sm-offset-3">
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</div>
							                </form>
										</div>
										<div id="demo-lft-tab-2" class="tab-pane fade ">
											<form class="form-horizontal" method="POST" action="<?php echo base_url()?>User/update_password">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="demo-hor-inputemail">Password</label>
													<div class="col-sm-7">
														<input type="text" name="id" id="id" value="<?php echo isset($edit->uid) ? $edit->uid:'';?>" class="hidden">
														<input type="password" placeholder="Password" name="password" id="password" class="form-control" required="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label" for="demo-hor-inputemail">Retype Password</label>
													<div class="col-sm-7">
														<input type="password" placeholder="Retype Password" id="retypepassword" name="retypepassword" class="form-control" required="">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-5 col-sm-offset-3">
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!--===================================================-->
								<!--End Default Tabs (Left Aligned)-->					
							</div>
			            </div>
			        </div>					
				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->