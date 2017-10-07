<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Manajemen Hotel</h1>

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
			                <h3 class="panel-title">Data Tabel Hotel</h3>
			            </div>
			
			            <div class="panel-body">
			                <div class="form-inline">
			                    <div class="row">
			                        <div class="col-sm-6 table-toolbar-left">
			                            <a href="<?php echo base_url()?>Manajemen_data/formHotel" class="btn btn-success btn-labeled fa fa-plus">Tambah</a>
			                        </div>
			                        
			                    </div>
			                </div>
			                <table id="dataTable" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Kategori</th>
										<th class="min-desktop">Jumlah</th>
										<th class="min-desktop">Tgl Kategori</th>
										<th class="min-desktop">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Makanan</td>
										<td align="right">2500</td>
										<td>25 August 2017</td>
										<td>
											<a href="" class="btn btn-danger  btn-xs">
												<i class="fa fa-times"></i> Hapus
											</a>
											<a href="" class="btn btn-primary btn-xs">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</td>
									</tr>									
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