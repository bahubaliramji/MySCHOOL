<!-- Start student registration form -->
<form id="stuRegForm"  method="POST">
						<div class="form-group">
							<i class="fas fa-user"></i>
							<label for="stuname" class="pl-2 font-weight-bold">Name</label>
                            <small id="statusMsg1"></small>
							<input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname" required>

						</div>
						<div class="form-group">
							<i class="fas fa-envelope"></i>
							<label for="stuemail" class="pl-2 font-weight-bold">Email address</label>
                            <small id="statusMsg2"></small>
							<input type="email" class="form-control" placeholder="Your Email Address" name="stuemail" id="stuemail" required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<i class="fas fa-key"></i>
							<label for="stupass" class="pl-2 font-weight-bold">New Password</label>
                            <small id="statusMsg3"></small>
							<input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass" required>
						</div>
						
					</form>
<!-- End student registration form -->