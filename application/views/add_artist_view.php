<script src="<?php echo $this->config->base_url(); ?>assets/adm/js/jquery-1.9.1.min.js"></script>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<a href="<?php echo $this->config->base_url(); ?>Admin/listArtist"><i class="icon-file-alt"></i><span class="hidden-tablet"> Artists List</span></a>
					</div>
					<div class="box-content">
					<form class="form-horizontal" action="<?php echo $this->config->base_url(); ?>index.php/Admin/addChangeArtist"" method="post"  enctype="multipart/form-data" >
						  <fieldset>
						  <legend>Edit</legend>
														
													  
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Name</label>
							  <div class="controls">
								<input type="text" class="form-control" name="name" id="name" required  value='' >
							  </div>
							</div>
							

							
							
							<div class="form-actions">
								<input type="hidden" id="codigo"  name="codigo"  value=''>
								<input type="hidden" id="op"  name="op"  value='0'>
							  <button type="submit" class="btn btn-primary" >Add Artist</button>
							</div>
						  </fieldset>
						</form>   
						           
					</div>
				</div><!--/span-->
			
			</div><!--/row-->	
		

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
		