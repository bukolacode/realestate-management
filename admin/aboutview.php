<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
 <?php include "inc/heder1.php" ?>
	
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
								<h3 class="page-title">View About</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">View About</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">List Of About</h4>
									<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];
											
									?>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="table table-stripped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Title</th>
													<th>Content</th>
													<th>Image</th>
													<th>Actions</th>
													
												</tr>
											</thead>
											<?php
													
													$query=mysqli_query($con,"select * from about");
													$cnt=1;
													while($row=mysqli_fetch_row($query))
														{
											?>
											<tbody>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td><?php echo $row['title']; ?></td>
													<td><?php echo $row['content']; ?></td>
													<td><img src="upload/<?php echo $row['image']; ?>" height="200px" width="200px"></td>
													<td><a href="aboutedit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-info">Edit</button></a>
													<a href="aboutdelete.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
												</tr>
											</tbody>
												<?php
												$cnt=$cnt+1;
												} 
												?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		<?php include "inc/footer.php" ?>
