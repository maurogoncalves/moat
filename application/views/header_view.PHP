<!DOCTYPE html>
<html lang="en">
<head>
  <title>MOAT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $this->config->base_url(); ?>/assets/bootstrap.min.css">
  <script src="<?php echo $this->config->base_url(); ?>/assets/jquery.min.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>/assets/bootstrap.min.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>/assets/jquery.js"></script>
<script src="<?php echo $this->config->base_url(); ?>assets/jquery-ui-1.9.2.custom.min.js"></script>
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	
  </style>
</head>
<body>

<nav class="navbar navbar-inverse" style='background-color: #dedede!important'>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
      <h3 style='color:#fff;text-align:center'>RESTRICTED AREA</h3>
	  <h4 style='color:#fff;text-align:center'></h4>
    </div>
  </div>
</nav>
