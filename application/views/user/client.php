<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">User Client</h1>

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
			                <h3 class="panel-title">Data Client</h3>
			            </div>
			
			            <div class="panel-body">
			                <table id="dataTable" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Id User</th>
										<th>Nama Lengkap</th>
										<th class="min-desktop">Email</th>
										<!-- <th class="min-desktop">Aksi</th> -->
									</tr>
								</thead>
								<tbody>
								<?php 
								$no=1;
								foreach ($user as $row) 
								{
								
								?>
									<tr>
										<td><?php echo $no++?></td>
										<td><?php echo $row->id_user?></td>
										<td><?php echo $row->nama_user?></td>
										<td><?php echo $row->email_user?></td>
										<!-- <td>
											<a href="" class="btn btn-danger" title="hapus">
												<i class="fa fa-trash"></i> 
											</a>
											<a href="" class="btn btn-primary" title="detail">
												<i class="fa fa-eye"></i>
											</a>
										</td> -->
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