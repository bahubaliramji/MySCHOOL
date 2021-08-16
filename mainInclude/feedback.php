<h1 class="text-center testyheading p-4">Student's Feedback</h1>
<div class="owl-carousel owl-theme">
		<?php
		$sql = "SELECT stu_name, stu_occ, stu_img, f_content FROM student JOIN feedback ON id = stu_id";
		// or 
		// $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.id = f.stu_id LIMIT 3";

		$result = $conn->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$s_img = $row['stu_img'];
				$n_img = str_replace('..','.',$s_img);
		?>
		<div class="item">
			<div class="testimonials">
				<img class="img-thumbnail rounded-circle" style="max-height: 100px" src="<?php echo $n_img;?>" />
				<p class="mt-2"><?php echo $row['f_content'];?></p>
			</div>
			<div class="designation">
				<i class="fas fa-quote-left"></i>
				<h3><?php echo $row['stu_name'];?></h3>
				<span><?php echo $row['stu_occ'];?></span>
			</div>

		</div>
<?php
		}
		}
?>
		
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$('.owl-carousel').owlCarousel({

			center: true,
			// items: 3,
			autoplay: true,
			dots: true,
			autoplayTimeout: 3000,
			smartSpeed: 600,
			loop: true,
			margin: 10,
			nav: false,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 2
				},
				1280: {
					items: 3
				}
			}
		})
	</script>