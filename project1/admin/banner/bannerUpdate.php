<!DOCTYPE html>
<html lang="en">

<?php
	if (basename(__DIR__) != 'admin') {
		$baseUrl = '../';
		$isInternal = true;
	} else {
		$baseUrl = '';
		$isInternal = false;
	}
 	include '../includes/head.php'; 
?>


<body>

	<!-- Top Nav bar -->
	<?php include '../includes/top_nav.php';?>

	<!-- /Top Nav bar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg"
										class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->



					<!-- Main navigation -->
					<?php include '../includes/navigation.php'; ?>
					<!-- /Main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">


					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i>Banner</a></li>
							<li class="active">Update</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Banner Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">


								</ul>
							</div>
						</div>

						<div class="panel-body">


							<!-- Basic examples -->
							<div class="panel panel-flat">
								<div class="panel-heading">

								<div class="panel-body">

								<?php
									require '../controller/dbconfig.php';
									$banner_id =$_GET['banner_id'];
									$getSingleDataQry = "SELECT * FROM banners WHERE id='{$banner_id}'";
									$getResult = mysqli_query($dbCon,$getSingleDataQry);
								 ?>
								<form class="form-horizontal" action="../controller/bannerController.php" method="post" enctype="multipart/form-data">
								<fieldset class="content-group mt-5">

								<?php
								  if (isset($_GET['msg'])) {

									?>
							
									<div class="alert alert-success no-border">
											<button type="button" class="close" data-dismiss="alert"><span>??</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Success</span> <?php echo $_GET['msg']; ?>
										</div>
								 
								 <?php }  ?>
								


								 <?php
								 	foreach ($getResult as $key => $banner) {
										
								  ?>
								  <input type="hidden" class="form-control" name="banner_id" value="<?php echo $banner['id']; ?>">
								  
									<div class="form-group">
										<label class="control-label col-lg-2" for="title" >Title</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="title" name="title" value="<?php echo $banner['title']; ?>">
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-lg-2" for="sub_title" required  >Sub title</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="sub_title" name="sub_title" value="<?php echo $banner['sub_title']; ?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2" for="details">Details</label>
										<div class="col-lg-10">
											<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" for="details" name="details"><?php echo $banner['details']; ?></textarea>
										</div>
									</div>

									<!-- image update -->

									<div class="form-group">
											<label class="col-lg-2 control-label text-semibold" for="image">Image</label>
											<div class="col-lg-10">
												<input type="file" name="image" class="file-input-extensions" id="image">
												<span class="help-block">Allow extensions: <code>jpg</code>, <code>png</code> and <code>jpeg</code> and  Allow Size: <code>640 * 426</code> Only</span>


												<div class="file-preview" id="custom_file_preview">
													<div class="close fileinput-remove text-right" id="custom_close">??</div>
													<div class="file-preview-thumbnails">
														<div class="file-preview-frame" id="preview-1603644588432-0">
															<img src="<?php echo '../uploads/bannerImage/'.$banner['image']; ?>" class="file-preview-image" title="" alt="" style="width:auto;height:160px;">
														</div>
													</div>
													<div class="clearfix"></div>   
													<div class="file-preview-status text-center text-success"></div>
													<div class="kv-fileinput-error file-error-message" style="display: none;"></div>
												</div>
											</div>
								</div>
							
								

									<?php } ?>

								</fieldset>

								<div class="text-right">
								<button type="submit" class="btn btn-primary" name="updateBanner">Submit <i class="icon-arrow-right14 position-right"></i></button>

									<a href="bannerList.php" class="btn btn-primary"><i class=" icon-arrow-left13 position-right"></i> Back</a>

								</div>
					    </form>


							</div>
							</div>
							<!-- /basic examples -->


						</div>

					</div>
					<!-- /basic datatable -->







					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a
							href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->



	<?php include '../includes/script.php'; ?>

</body>

</html>