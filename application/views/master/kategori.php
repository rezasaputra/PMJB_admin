CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Master Kategori</h1>

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
			                <h3 class="panel-title">Form Kategori</h3>
			            </div>
			
			            <div class="panel-body">
			                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>Master_data/save_kategori">
			                	<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Kategori</label>
									<div class="col-sm-7">
										<input type="text" name="id" id="id" class="hidden">
										<input type="text" class="form-control" placeholder="Nama Kategori" required="" name="nama" id="nama">
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Jumlah</label>
									<div class="col-sm-7">
										<input type="number" placeholder="Jumlah" class="form-control" required="" id="jumlah" name="jumlah">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Tanggal Kuliner</label>
									<div class="col-sm-7">
										<input type="text" placeholder="Tanggal Kuliner" data-date-format="yyyy-mm-dd" class="form-control date-picker" required="" id="tgl_kuliner" name="tgl_kuliner">
									</div>
								</div> -->
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
			            	 <h3 class="panel-title">Data Tabel Kategori</h3>
			            </div>
			            <div class="panel-body">
			            	<table id="dataTable" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Kategori</th>
<!-- 										<th class="min-desktop">Jumlah</th>
										<th class="min-desktop">Tgl Kategori</th> -->
										<th class="min-desktop">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;
									foreach ($kategori as $row) {

									?>
									<tr>
										<td><?php echo $no++?></td>
										<td><?php echo $row->nama_kategori?></td>
										<!-- <td align="right"><?php echo $row->jumlah?></td>
										<td><?php echo $row->tgl_kuliner?></td>
										 --><td>
											<a class="btn btn-danger  btn-xs" onclick="confirm_del(<?php echo $row->id_kategori?>)">
												<i class="fa fa-times"></i> Hapus
											</a>
											<a onclick="get_edit(<?php echo $row->id_kategori?>)" class="btn btn-primary btn-xs">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</td>
									</tr>	
									<?php } ?>								
								</tbody>
							</table>
			            </div>
			        </div>					
				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER