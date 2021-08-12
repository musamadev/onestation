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
   <script>
          ClassicEditor
        .create( document.querySelector( '#editor6' ) )
        .catch( error => {
            console.error( error );
        } );
        
</script>
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
										<h5 class="text-dark font-weight-bold my-1 mr-5">Company</h5>
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											
											<li class="breadcrumb-item">
												<a  class="text-muted"> case study details
</a>
											</li>
											
										</ul>
									</div>
								</div>
                                <div class="card-toolbar">
											<!--end::Dropdown-->
											<!--begin::Button-->
											
											<!--end::Button-->
										</div>
							</div>
						</div>
                        
						<div class="row">
                   
							<div class="container col-12" id="box"  >
							
							</div>
                   
							<div class="container col-12" id="box1"  >
							
							</div>
						</div>
							</div>
							</div>
				</div>
		</div>
	<!-- Button trigger modal -->
  <div class="modal fade" id="showservice" tabindex="-1" role="dialog" aria-labelledby="addservice" aria-hidden="true" enctype="multipart/fo">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add case study detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
          
      </div> 
        <div id="servicearea">
           
        </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal  " id="edit" tabindex="-1" role="dialog" aria-labelledby="addservice" aria-hidden="true">
  <div class="modal-dialog modal-lg   modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Image</h5>
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
     
          ///  document.getElementById('box').innerHTML=x; 
       //     setTimeout(function() { load_service(); }, 1000);
     
            
   load_about();
        load_gallery();
    
});
        function load_about()  {
        $("#servicearea").load("case_study_detail/load.php");     
        }
            

        function load_gallery()  {
        $("#box1").load("case_study_detail/load_gallery.php");     
        }
            
            
          function add_abt_gallery_img()  {
            
           if( fetch('case_study_detail/add_abt_gallery_img.php',{
                method:"POST",
                body : new FormData(document.getElementById('add_abt_gallery_img'))   
            }))
           {
                
               $("#add_abt_gallery_img").each(function(){
            $(this).find('input').val("");
           
      })
            $('#showservice').modal('hide'); 
            load_gallery();
           }     
        }
            
            
            
        function del_about_gallery(id)  {
          var value=id;
            if(confirm("Confimm delete id = "+value)) {
    $.ajax({
            type: 'GET',
            data: {id:value},	
			url: 'case_study_detail/del_about_gallery.php',
			success: function(data){
        load_gallery();
			}
		});
  }
       } 
          function edit_about_gallery(id)  {
          var value=id;
               $("#showAjaxResults").html(x);
                  $('#edit').modal('show');
              $.ajax({
            type: 'GET',
            data: {id:value},	
			url: 'case_study_detail/edit_about_gallery.php',
			success: function(data){
         
				$("#showAjaxResults").html(data);
                $('#edit').modal('show');
			}
		});
               
              
       } 
        
        
        </script>
	</body>
</html>