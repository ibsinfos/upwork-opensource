

  <div class="page animsition">
    <div class="page-header">
	
		  
	  
	  
		  
		  
      <div class="row">
        <div class="col-md-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
			
					<?php
			if(isset($errormsg)){
			if($errormsg=="na"){
			}else{
					?>
                  <button type="button" class="btn btn-large btn-block btn-danger example"><?php echo $errormsg; ?></button>
				  	<?php 
			
			}
			}
				  ?>
            <form class="form-horizontal" id="exampleStandardForm" method="post" action="<?php echo site_url('administrator/userpage/loadpage/'.$loadpage.'/subpage/addcheck/'); ?>"  enctype="multipart/form-data" autocomplete="off">
              <?php
	
	$inputarr=array("name", "shortcode", "dialingcode", "currency", "currencycode", "index");

	foreach($inputarr as $val){
	echo $this->Adminforms->inputtext(ucfirst($val),$db."_".$val,"Enter ".ucfirst($val),"",1);
	}
	

$avaliable = array(
   array('1','Yes'),
   array('2','No'),
);


			  echo $this->Adminforms->selectgrp("Coverage",$db."_avaliable",$avaliable,"",true,"Select Coverage","");
			  
			  		  

			  
			  echo $this->Adminforms->submit($title);

			  ?>
              </form>
            </div>
          </div>
		  
          </div>
		  
		  
		  
		  
		  
		  
		  
          </div>
		  
          </div>
		  
		  
		  
		  
		  
		  
		  
          </div>
		  