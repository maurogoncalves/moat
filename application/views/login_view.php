<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1 sidenav">    </div>
    <div class="col-sm-10 text-left"> 
		<div class="col-sm-12 text-left"> 
		<BR>
		</div>		
		<div class="col-sm-12 text-left"> 
		<BR>
		</div>
		<div class="col-sm-12 text-left"> 
		<BR>
		</div>
		<div class="col-sm-12 text-left"> 
		<BR>
		</div>
		
		<?php
			  $attributes = array('class' => 'm-t');
			  echo form_open('Verify', $attributes); 
			  ?>
		 <div class="col-sm-12 text-left"> 
			  <div class="col-sm-9">
				<input type="text" class="form-control"  placeholder='Username' name="username" required>
			  </div>
			  <div class="col-sm-3">
				<input type="password" class="form-control"   placeholder='Password' name="password" required>
			  </div>
		</div>		
		<div class="col-sm-12 text-left"> 
		<BR>
		</div>
		<div class="col-sm-12 text-left"> 
			<div class="col-sm-4">
			</div>
			  <div class="col-sm-4">
				<button type="submit" id='registrar' style='background-color:#FF0000!important;color:#fff!important;font-size:18px!important;font-weight:bold' class="btn btn-default form-control">
					Access
				</button>
			  </div>
			  <div class="col-sm-4">
			</div>
		</div>
		<div class="col-sm-12 text-left"> 
		<BR>
		</div>
		<div class="col-sm-12 text-left"> 
			<div class="col-sm-3">
			</div>
			  <div class="col-sm-6" style='text-align:center;color:#FF0000!important;font-size:14px!important;font-weight:bold'>
				<?php if($this->session->flashdata('mensagem')) {
					echo $message = $this->session->flashdata('mensagem');
				}
				?>
			  </div>
			  <div class="col-sm-3">
			</div>
		</div>

		</form>
		
		<div class="col-sm-12 text-left"> 
		<BR><br>
		</div>
				<div class="col-sm-12 text-left"> 
		<div class="col-sm-4">
			</div>
			  <div class="col-sm-4 text-center">
				<a class="submenu" style='font-weight:bold!important' href="<?php echo $this->config->base_url(); ?>index.php/Register"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Register </span></a>
			  </div>
			  <div class="col-sm-4">
			</div>
		</div>
		
  </div>
  <div class="col-sm-1 sidenav">   </div>
 
</div>

  