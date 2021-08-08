

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Albums List
						&nbsp;&nbsp;
						<a href="<?php echo $this->config->base_url(); ?>Admin/addAlbum"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Album</span></a>
						&nbsp;
						<span style='color:#ff0000!important'> 	<?php if(!empty($mensagem)){ echo($mensagem); }?> </span>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="forj">
						  <thead>
							  <tr>
								 <th>Album Name</th>	
								 <th>Album Year</th>	
								 <th>Artist Name</th>									 
								 <th>Options</th>	
							  </tr>
						  </thead>   
						  <tbody>
							<?php 
								$isArray =  is_array($eventos) ? '1' : '0';
								if($isArray == 0){ ?>
								<?php 
								}else{
								 foreach($eventos as $key => $evento){ 
								 ?>
								 <tr>
								 <td ><?php echo $evento->name; ?> </td>
								 <td ><?php echo $evento->year; ?> </td>
								 <td ><?php echo $evento->artist; ?> </td>
								 <td >
								 <a  href="<?php echo $this->config->base_url(); ?>Admin/editAlbum?id=<?php echo $evento->id;?>"><i class="halflings-icon pencil" style='height:20px'  title='Edit' alt='Edit'></i></a>
								 &nbsp;
								 <?php  if($role == 1){ ?>
									 <a  href="<?php echo $this->config->base_url(); ?>Admin/delAlbum?id=<?php echo $evento->id;?>"><i class="halflings-icon remove" style='height:20px'  title='Delete' alt='Delete'></i></a>
								 <?php } ?>
									 
								 
								 
								 </td>
								</tr>
								<?php
								}//fim foreach
								}//fim if
								?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->	
		

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->