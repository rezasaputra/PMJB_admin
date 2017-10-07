<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Form Warung Makan</h1>

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
			                <h3 class="panel-title">Form Warung Makan</h3>
			            </div>
			
			            <div class="panel-body">
			                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>Manajemen_data/save_kuliner" enctype="multipart/form-data">
			                	<input type="text" name="id" id="id" value="<?php echo isset($edit->id_kuliner) ? $edit->id_kuliner:'';?>" hidden="">
			                	<div class="form-group <?php echo isset($edit->id_kuliner) ? 'hidden':'';?>">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Gambar</label>
									<div class="col-sm-7">
										<input type="file" name="file[]" class="form-control" multiple="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Wisata</label>
									<div class="col-sm-7">
										<select class="form-control" name="id_wisata" name="id_wisata" required="">
											<option value=""> - Pilih wisata - </option>
											<?php 
											foreach ($wisata as $row) 
											{		
												$selected = ($edit->id_wisata == $row->id_wisata) ? 'selected' : '';						
											?>
											<option value="<?php echo $row->id_wisata?>" <?php echo $selected?>><?php echo $row->nama_wisata?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Judul / Nama Warung</label>
									<div class="col-sm-7">
										<input type="text" placeholder="Judul / Nama Warung" id="inama" name="inama" class="form-control" value="<?php echo isset($edit->nama_kuliner) ? $edit->nama_kuliner:'';?>" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Jam Buka </label>
									<div class="col-sm-7">
										<input type="text" placeholder="Jam Buka" value="<?php echo isset($edit->jam_buka) ? $edit->jam_buka:'';?>" id="ijam_buka" name="ijam_buka" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Alamat</label>
									<div class="col-sm-7">
										<textarea class="form-control" id="ialamat" name="ialamat" placeholder="Alamat Warung Makan" rows="2"><?php echo isset($edit->alamat_kuliner) ? $edit->alamat_kuliner:'';?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Cari Lat, Long <i class="fa fa-map-marker"></i></label>
									<div class="col-sm-7">
										<input type="text" placeholder="Cari berdasarkan nama tempat / alamat" id="locality" onFocus="initializeAutocomplete()" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Latitude</label>
									<div class="col-sm-7">
										<input type="text" value="<?php echo isset($edit->latitude) ? $edit->latitude:'';?>" placeholder="Latitude" id="ilat" name="ilat" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Longitude</label>
									<div class="col-sm-7">
										<input type="text" value="<?php echo isset($edit->longitude) ? $edit->longitude:'';?>" placeholder="Longitude" id="ilong" name="ilong" class="form-control" required="">
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Deskripsi / Tentang Warung</label>
									<div class="col-sm-7">
										<textarea class="form-control" id="ideskripsi" name="ideskripsi" placeholder="Deskripsi Warung Makan" rows="4"></textarea>
									</div>
								</div> -->
								<div class="form-group">
									<div class="col-sm-5 col-sm-offset-2">
										<button class="btn btn-primary">Submit</button>
										<a class="btn btn-danger" href="<?php echo base_url()?>Manajemen_data/warung_makan">Kembali</a>
									</div>
								</div>
			                </form>
			            </div>
			            
			        </div>	
			        <?php 
			        if ($edit) 
			        {
			        ?>
			        <div class="panel">
			        	<div class="panel-heading">
			                <div class="panel-control">
			                    <a class="fa fa-question-circle fa-lg fa-fw unselectable add-tooltip" href="#" data-original-title="<h4 class='text-thin'>Information</h4><p style='width:150px'>This is an information About Our Client.</p>" data-html="true" title=""></a>
			                </div>
			                <h3 class="panel-title">Gambar Wisata</h3>
			            </div>
			        	<div class="panel-body">
			        		<div class="form-inline">
			                    <div class="row">
			                        <div class="col-sm-6 table-toolbar-left">
			                            <a type="button" id="add_data" class="btn btn-success btn-labeled fa fa-plus">Tambah</a>
			                        </div>
			                        
			                    </div>
			                </div>
			        		<div id="tabel_gambar"></div>
			        	</div>
			        </div>
			        <?php } else {}?>				
				</div>
				<!--===================================================-->
				<!--End page content-->
				<div class="modal fade" id="modal_gmb" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<form method="POST" id="form_gambar">

							<!--Modal header-->
							<div class="modal-header">
								<button data-dismiss="modal" class="close" type="button">
								<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Form Gambar</h4>
							</div>

							<!--Modal body-->
							<div class="modal-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Gambar</label>
												<input type="file" name="gambar[]" id="gambar" class="form-control" multiple="">
											</div>
										</div>
									</div>
							</div>

							<!--Modal footer-->
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
						</div>
					</div>
				</div>

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->
			 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw2sxdXHvZtmJGlu5Qa7sBgN1AoIj3dI8&libraries=places&sensor=false"></script>