<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Master Transportasi</h1>

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
			                <h3 class="panel-title">Form Transportasi</h3>
			            </div>
			
			            <div class="panel-body">
			                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>Master_data/save_transportasi">
			                	<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Transportasi</label>
									<div class="col-sm-7">
									<input type="text" name="id" id="id" class="hidden">
										<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Transportasi" required="">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-5 col-sm-offset-2">
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="reset" class="btn btn-danger">Batal</button>
									</div>
								</div>
			                </form>
			            </div>
			            <div class="panel-heading">
			                <div class="panel-control">
			                </div>
			            	 <h3 class="panel-title">Data Tabel Transportasi</h3>
			            </div>
			            <div class="panel-body">
			            	<table id="dataTable" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Transportasi</th>
										<th class="min-desktop">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($transport as $row) {
									?>
									<tr>
										<td><?php echo $no++?></td>
										<td><?php echo $row->nama_t?></td>
										<td>
											<a onclick="confirm_del(<?php echo $row->id_t?>)" class="btn btn-danger  btn-xs">
												<i class="fa fa-times"></i> Hapus
											</a>
											<a onclick="get_edit(<?php echo $row->id_t?>)" class="btn btn-primary btn-xs">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</td>
									</tr>
									<?php 
									}
									?>									
								</tbody>
							</table>
			            </div>
			        </div>					
				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->