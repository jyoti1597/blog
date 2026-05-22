<?php

	include '../common_page/header.php';
	include '../common_page/navbar.php';

?>
	<div class="mainSection">
		<div class="newsDetailCard">
			<h5 class="newsTitle">Lorem LoremLoremLoremLoremLorem</h5>
			<ul class="newsInfo">
				<li>
					<i class="fa fa-tag"></i>
					<span>Sports</span>
				</li>
				<li>
					<i class="fa fa-user"></i>
					<span>Admin</span>
				</li><li>
					<i class="fa fa-calendar"></i>
					<span>Fri, 07 Nov 2025</span>
				</li>
			</ul>
			<img src="../assets/images/new_image.jpg" alt="newsImage">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="otherContent">
			<div class="searchCard">
				<h5 class="cardHeading">Search</h5>
				<div class="searchSection">
					<input type="search" name="search" value="Search....." required>
					<button type="submit" name="submit" class="blackBtn">
						Search
					</button>
				</div>
			</div>
			<div class="postCard">
				<h5 class="cardHeadings">Recent Posts</h5>
				<ul class="postList">
					<li>
						<img src="../assets/images/new_image.jpg" alt="newsImage">
						<div class="postContext">
							<h5 class="newsTitle">Lorem ipsum dolor sit amet</h5>
							<ul class="newsInfo">
								<li>
									<i class="fa fa-tag"></i>
									<span>Sports</span>
								</li>
								<li>
									<i class="fa fa-calendar"></i>
									<span>Fri, 07 Nov 2025</span>
								</li>
							</ul>
							<button class="greyBtn">
								Read More
							</button>
						</div>
					</li>
					<span class="border-bottom"></span>
					<li>
						<img src="../assets/images/new_image.jpg" alt="newsImage">
						<div class="postContext">
							<h5 class="newsTitle">Lorem ipsum dolor sit amet</h5>
							<ul class="newsInfo">
								<li>
									<i class="fa fa-tag"></i>
									<span>Sports</span>
								</li>
								<li>
									<i class="fa fa-calendar"></i>
									<span>Fri, 07 Nov 2025</span>
								</li>
							</ul>
							<button class="greyBtn">
								Read More
							</button>
						</div>
					</li>
					<span class="border-bottom"></span>
					<li>
						<img src="../assets/images/new_image.jpg" alt="newsImage">
						<div class="postContext">
							<h5 class="newsTitle">Lorem ipsum dolor sit amet</h5>
							<ul class="newsInfo">
								<li>
									<i class="fa fa-tag"></i>
									<span>Sports</span>
								</li>
								<li>
									<i class="fa fa-calendar"></i>
									<span>Fri, 07 Nov 2025</span>
								</li>
							</ul>
							<button class="greyBtn">
								Read More
							</button>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?php
	include '../common_page/footer.php';
?>
