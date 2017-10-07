<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Form Hotel</h1>

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
			            <div class="panel-heading">
			                <div class="panel-control">
			                    <a class="fa fa-question-circle fa-lg fa-fw unselectable add-tooltip" href="#" data-original-title="<h4 class='text-thin'>Information</h4><p style='width:150px'>This is an information About Our Client.</p>" data-html="true" title=""></a>
			                </div>
			                <h3 class="panel-title">Form Hotel</h3>
			            </div>
			
			            <div class="panel-body">
			                <form class="form-horizontal" method="POST" action="">
			                	<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Gambar</label>
									<div class="col-sm-7">
										<div class="panel-body">
	
								<!--Dropzonejs-->
								<!--===================================================-->
								<div id="demo-dropzone" action="#" class="dropzone">
									<div class="dz-default dz-message">
										<div class="dz-icon icon-wrap icon-circle icon-wrap-md">
											<i class="fa fa-cloud-upload fa-3x"></i>
										</div>
										<div>
											<p class="dz-text">Drop files to upload</p>
											<p class="text-muted">or click to pick manually</p>
										</div>
									</div>
									<div class="fallback">
										<input name="file" type="file" multiple />
									</div>
								</div>
								<!--===================================================-->
								<!-- End Dropzonejs -->
	
							</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Judul / Nama Hotel</label>
									<div class="col-sm-7">
										<input type="text" placeholder="Judul / Nama Hotel" id="" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Alamat</label>
									<div class="col-sm-7">
										<textarea class="form-control" placeholder="Alamat Hotel" rows="2"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Cari Lat, Long <i class="fa fa-map-marker"></i></label>
									<div class="col-sm-7">
										<input type="text" placeholder="Cari berdasarkan nama tempat / alamat" id="locality" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Latitude</label>
									<div class="col-sm-7">
										<input type="text" placeholder="Latitude" id="demo-hor-inputemail" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Longitude</label>
									<div class="col-sm-7">
										<input type="text" placeholder="Longitude" id="demo-hor-inputemail" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Deskripsi / Tentang Hotel</label>
									<div class="col-sm-7">
										<textarea class="form-control" placeholder="Deskripsi Hotel" rows="4"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5 col-sm-offset-2">
										<button class="btn btn-primary">Submit</button>
										<a class="btn btn-danger" href="<?php echo base_url()?>Manajemen_data/hotel">Kembali</a>
									</div>
								</div>
			                </form>
			            </div>
			            
			        </div>					
				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->