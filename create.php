<?php
require("config.php");
	$sql = "SELECT * FROM `payload` WHERE 1";
	$result = $conn->query($sql);

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="js/jquery.js" />
<!------ Include the above in your HEAD tag ---------->

<div class="page-wrapper chiller-theme toggled">
	<nav id="sidebar" class="sidebar-wrapper">
		<div class="sidebar-content">
			<div id="toggle-sidebar">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div class="sidebar-brand">
				<a href="index.php">Exploit Knowledge-Based</a>
			</div>
			<div class="sidebar-header">
				<br>
				<br>
				<div class="user-info">
					<span class="user-name">
						<a href="#">Payload</a>
						<br>
						<br>
						<span class="Payload">
							<a href="#">Database</a></span>
						</span>
					</span>
				</div>
			</div>
			<!-- sidebar-content  -->
		</nav>
		<!-- sidebar-wrapper  -->
		<main class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="form-group col-md-12">
						<div class="card">
							<div class="card-header">
								<a>Dashboard</a>

							</div>
						</div>

					</div>
				</div>
				<br>

				<hr>
				<div class="card">

					<div class="card-header">



						<b>Create</b>

					</div>
					<div class="card-body">
						<form action="insert.php" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Title</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="title"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Url</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="url"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">CVE</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="cve"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">OSVDB</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="osvdb"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Author</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="author"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">File</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="file"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Type</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="type"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Platform</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="platform"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Vendor</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="vendor"/>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group row">
									<label class="col-sm-2 col-form-label">Content</label>
									<div class="col-sm-10">
									<textarea class="form-control" rows="6" name="content"></textarea>
								</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-10">
                                <div class="form-group">
                                    <select class="form-control" name="payload">
                        
                                           <?php while($row = $result->fetch_assoc()) { ?>
												<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                           	<?php } ?>
                                </select>
                            </div>
                        </div>
								<div class="col-md-2"></div>
								<div class="col-md-10">
									<button type="submit" class="btn btn-secondary" data-toggle="button" aria-pressed="false" autocomplete="off">
										Submit
									</button>
								</div>
							</div>
						</form></div>
					</div>
				</main>
				<!-- page-content" -->
			</div>