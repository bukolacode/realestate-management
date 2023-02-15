<?php 
session_start();
require("config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// add code

$msg="";
if(isset($_POST['update']))
{
	$fid = $_GET['id'];
	$status=$_POST['status'];
		
	$sql="UPDATE feedback SET status = '{$status}' WHERE fid = {$fid}";
	$result=mysqli_query($con,$sql);
	if($result == true)
		{
			$msg="<p class='alert alert-success'>Feedback Updated Successfully</p>";
			header("Location:feedbackview.php?msg=$msg");		
		}
		else
		{
			$msg="<p class='alert alert-warning'>Feedback Not Updated</p>";
			header("Location:feedbackview.php?msg=$msg");
		}
}
?>
 
<?php include "inc/heder1.php" ; ?>
	
		<!-- Main Wrapper -->
		
			<!-- Header -->
			<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Feedback</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Feedback</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h2 class="card-title">Update Feedback</h2>
								</div>
								<?php 
								$fid = $_GET['id'];
								$sql = "SELECT * FROM feedback WHERE fid = {$fid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
								<form method="post">
								<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<h5 class="card-title">Update Feedback</h5>
												
												<?php echo $msg; ?>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Feedback Id</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="fid" value="<?php echo $row['0']; ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Status</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="status" required="" value="<?php echo $row['3']; ?>">
														<small>Enter [1] to set as testimonial & [0] to cancel it.</small>
													</div>
												</div>
												
											</div>
										</div>
										<div class="text-left">
											<input type="submit" class="btn btn-primary"  value="Submit" name="update" style="margin-left:200px;">
										</div>
									</form>
									<?php } ?>
								</div>
								
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			<!-- /Page Wrapper -->
		<!-- /Main Wrapper -->
	<?php include "inc/footer.php" ?>
