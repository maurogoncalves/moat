<script src="<?php echo $this->config->base_url(); ?>assets/adm/js/jquery-1.9.1.min.js"></script>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<a href="<?php echo $this->config->base_url(); ?>Admin/listAlbum"><i class="icon-file-alt"></i><span class="hidden-tablet"> Albums List</span></a>
					</div>
					<div class="box-content">
					<form class="form-horizontal" action="<?php echo $this->config->base_url(); ?>index.php/Admin/addChangeAlbum"" method="post"  enctype="multipart/form-data" >
						  <fieldset>
						  <legend>Add</legend>
														
													  
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Name</label>
							  <div class="controls">
								<input type="text" class="form-control" name="name" id="name" required  value='' >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Year</label>
							  <div class="controls">
								<input type="number" class="form-control" name="year" id="year" required  value='' maxlength="4" min="1" >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Artists</label>
							  <div class="controls">
								<select class="form-control" name='codigo' required>  
								  <option value="" selected >Choose</option>	
									<?php foreach($artist as $key => $art){ ?>
										<option value="<?php echo $art->codigo ?>" ><?php echo $art->name?></option>											
									<?php
									}
									?>			
								</select>
								
							  </div>
							</div>

							
							
							<div class="form-actions">
								<input type="hidden" id="op"  name="op"  value='0'>
								<input type="hidden" id="codigoAlbum"  name="codigoAlbum"  value='0'>
							  <button type="submit" class="btn btn-primary" >Add</button>
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
		
		