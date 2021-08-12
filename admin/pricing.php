 <?php
            session_start();
if(isset( $_SESSION['email'])) {
    
}
else {
     header('Location:login.php');
}
          include('assets/include/db.php');
if(isset($_GET['action'])) {
    $action='
    <div class="container pt-5">
    <div class="alert alert-success alert-dismissible fade show " role="alert">
  <strong>Record Updated!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
';
}
else {
    $action='';
}
          ?>
<!DOCTYPE html>

<html lang="en">
	
<head>
		 <?php
          include('assets/include/script.php');
          ?>
	</head>
	
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        
		<?php
          include('assets/include/header.php');
          ?>
	
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<?php
          include('assets/include/websidebar.php');
          ?>
                
    			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					
                    <?php
          include('assets/include/webheader.php');
          ?>
            		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<?php echo $action;?>
						<div class="subheader py-6 py-lg-8 " >
							
                            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                
								<div class="d-flex align-items-center flex-wrap mr-1">
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<h5 class="text-dark font-weight-bold my-1 mr-5">Pricing</h5>
									
									</div>
								</div>
                                <div class="card-toolbar">
											<!--end::Dropdown-->
											<!--begin::Button-->
											<a  class="btn btn-primary font-weight-bolder" type="button"  data-toggle="modal" data-target="#showservice">
											<i class="fas fa-plus fa-1x"></i>Add Pricing</a>
											<!--end::Button-->
										</div>
							</div>
						</div>
                        
						<div class="d-flex flex-column-fluid">
                            
							<div class="container" id="box"  >
							
							</div>
						</div>
							</div>
							</div>
				</div>
		</div>
	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="showservice" tabindex="-1" role="dialog" aria-labelledby="addservice" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Pricing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>  <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_login_singin_form" novalidate="novalidate" action="assets/include/login_check.php" >
      <div class="modal-body" id="servicearea">
     
								<!--begin::Title-->
								
								<div class="form-group ">
									<label class=" font-weight-bolder text-dark"> Title</label>
									<input class="form-control h-auto py-4 rounded-lg " type="text" id="title" name="title" required>
								<div class="fv-plugins-message-container"></div>
                                </div>
					
					
								<div class="form-group ">
									<label class=" font-weight-bolder text-dark"> price ($)</label>
									<input class="form-control h-auto py-4 rounded-lg " type="text" id="price" name="price" required>
								<div class="fv-plugins-message-container"></div>
                                </div>
					
								<div class="form-group ">
									<label class=" font-weight-bolder text-dark"> Select Service</label>
                  <select name="s_id" class="form-control h-auto py-4 rounded-lg " required>
							<?php
              $sql="SELECT id,title FROM services";
              $run=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($run)) {
                  echo '
                  <option value="'.$row['id'].'"  >'.$row['title'].'</option>
                  ';
                }
                  ?> 
              </select>
								<div class="fv-plugins-message-container"></div>
                                </div>
					
					
								
						
								
								<!--end::Action-->
							<input type="hidden"><div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="adds();">Add</button>
      </div></form>
    </div>
  </div>
</div>
<!-- edit Modal -->
<div class="modal " id="editservicecategory" tabindex="-1" role="dialog" aria-labelledby="addservice" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Service Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showAjaxResults">
       
      </div>
   
    </div>
  </div>
</div>
		
        <?php
          include('assets/include/footer_script.php');
          ?>
        <script>
             var x='<div class="row"><div class="col-12 text-center"> <div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div></div>';
            
        $(document).ready(function(){
     
            document.getElementById('box').innerHTML=x; 
       //     setTimeout(function() { load_service(); }, 1000);
            
     //       setTimeout(function() { load_service(); }, 1000);
      load_service();
    
});
        function load_service()  {
        $("#box").load("pricing/load.php");     
        }
            
            
          function adds()  {
            
           if( fetch('pricing/add.php',{
                method:"POST",
                body : new FormData(document.getElementById('kt_login_singin_form'))   
            }))
           {
                
               $("#kt_login_singin_form").each(function(){
            $(this).find('input').val("");
            $(this).find('textarea').val("");
      })
            $('#showservice').modal('hide'); 
            load_service();
           }     
        }
            
            
            
        function del_service(id)  {
          var value=id;
            if(confirm("Confimm delete id = "+value)) {
    $.ajax({
            type: 'GET',
            data: {id:value},	
			url: 'pricing/del.php',
			success: function(data){
				load_service();
			}
		});
  }
       } 
          function edit_service(id)  {
          var value=id;
               $("#showAjaxResults").html(x);
                  $('#editservicecategory').modal('show');
              $.ajax({
            type: 'GET',
            data: {id:value},	
			url: 'pricing/edit.php',
			success: function(data){
				$("#showAjaxResults").html(data);
                $('#editservicecategory').modal('show');
			}
		});
               
              
       } 
        
        
        </script>
	</body>
</html>