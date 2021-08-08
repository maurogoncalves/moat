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
								<input type="text" class="form-control" name="name" id="name" required  value='<?php echo $usuario[0]->name?>' >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Year</label>
							  <div class="controls">
								<input type="number" class="form-control" name="year" id="year" required  maxlength="4" value='<?php echo $usuario[0]->year?>' min="1" >
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">(*) Artists</label>
							  <div class="controls">
								<select class="form-control" name='codigo' required>  
								  <option value="" selected >Choose</option>	
									<?php foreach($artist as $key => $art){ 
										if($usuario[0]->id_artist == $art->codigo){
									?>
										<option value="<?php echo $art->codigo ?>" selected><?php echo $art->name?></option>											
									<?php
										}else{ ?>
											<option value="<?php echo $art->codigo ?>" ><?php echo $art->name?></option>											
									<?php 	}
									}
									?>			
								</select>
								
							  </div>
							</div>

							
							
							<div class="form-actions">
								<input type="hidden" id="op"  name="op"  value='1'>
								<input type="hidden" id="codigoAlbum"  name="codigoAlbum"  value='<?php echo $usuario[0]->codigo?>'>
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
		
		