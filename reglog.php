

<!-- Start Admin Login-->
	<!-- Modal -->
	<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered">
			<div class="modal-content" >
				<div class="modal-header">
					<h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: black;">&times</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Start student login form -->
					<form id="adminLogForm"  method="POST">
						<div class="form-group">
							<i class="fas fa-envelope"></i>
							<label for="adminLogemail" class="pl-2 font-weight-bold">Email address</label>
							<input type="email" class="form-control" placeholder="Your Email Address" name="adminLogemail" id="adminLogemail" required>
							
						</div>
						<div class="form-group">
							<i class="fas fa-key"></i>
							<label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass" required>
						</div>

							<!-- <button type="submit" name="signin" class="btn btn-primary">Submit</button> -->
					</form>
					<!-- End student registration form -->
				</div>
				<div class="modal-footer">
						<span  id="adminLogMsg"></span>
						<button type="submit" class="btn btn-primary" id="adminLoginBtn" onclick="adminLogin()">Login</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
					
				</div>
			</div>
		</div>
	</div>
	<!-- End Admin login-->


	<!-- Start Student Login-->
	<!-- Modal -->
	<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: black;">&times</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Start student login form -->
					<form id="stuLogForm" method="POST">
						<div class="form-group">
							<i class="fas fa-envelope"></i>
							<label for="stuLogemail" class="pl-2 font-weight-bold">Email address</label>
							<input type="email" class="form-control" placeholder="Your Email Address" name="stuLogemail" id="stuLogemail" required>
							
						</div>
						<div class="form-group">
							<i class="fas fa-key"></i>
							<label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass" required>
						</div>
						<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
						
					</form>
					<!-- End student login form -->
				</div>
				<div class="modal-footer">
							<span  id="statusLogMsg"></span>
							<button type="submit" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
						
				</div>
			</div>
		</div>
	</div>
	<!-- End Student login-->


	<!-- Start Student Registration-->

	<!-- Modal -->

	<div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered">
			<div class="modal-content" >
				<div class="modal-header">
					<h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" style="color: black;">&times</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Start student registration form -->
					
					<?php 
						include ('Student/studentRegistration.php');
					?>
					<!-- End student registration form -->
				</div>
				<div class="modal-footer">
					<span  id="successMsg"></span>
					<button type="button"  class="btn btn-primary" id="stuRegBtn">Sign up</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Student Registration-->
