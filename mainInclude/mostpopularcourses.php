<div class="container mt-5">
		<h1 class="text-center">Popular Courses</h1>
		<!-- course first card deck -->
		<div class="card-deck  mt-4">
		<?php 
		$sql = "SELECT * FROM allcourse LIMIT 3";
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$course_id = $row['id'];
				echo '<a href="coursedetail.php?course_id='.$row['id'].'" class="btn" style="text-align:left; padding:0px; margin:0px;">
				<div class="card " >
					<img style="max-height:300px;" src="'.str_replace('..','.',$row['image']).'" alt="course_image" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">'.$row['name'].'</h5>
						<p class="card-text">'.$row['c_desc'].'</p>
					</div>
					<div class="card-footer">
						<p class="card-text d-inline">Price: <small><del>&#8377 '.$row['originl_price'].'</del></small><span
								class="font-weight-bolder p-sapn">&#8377 '.$row['price'].'</span></p>
						<a href="coursedetail.php?course_id='.$row['id'].'"  class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
					</div>
				</div>
			</a>'; 
			}
		}
		?>

		</div>
		<!-- style="border-style:none;" border style -->

		<!-- second deck -->
		<div class="card-deck mt-5">
		<?php 
		$sql = "SELECT * FROM allcourse LIMIT 3, 3";
		$result = $conn->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$course_id = $row['id'];
				echo '<a href="coursedetail.php?course_id='.$row['id'].'" class="btn" style="text-align:left; padding:0px; margin:0px;">
				<div class="card " >
					<img style="max-height:300px;" src="'.str_replace('..','.',$row['image']).'" alt="course_image" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">'.$row['name'].'</h5>
						<p class="card-text">'.$row['c_desc'].'</p>
					</div>
					<div class="card-footer">
						<p class="card-text d-inline">Price: <small><del>&#8377 '.$row['originl_price'].'</del></small><span
								class="font-weight-bolder p-sapn">&#8377 '.$row['price'].'</span></p>
						<a href="coursedetail.php?course_id='.$row['id'].'"  class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
					</div>
				</div>
			</a>'; 
			}
		}
		?>
		</div>
	</div>