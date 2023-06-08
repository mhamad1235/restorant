<!-- this cdn used for notification icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="nav-side-menu text-center">
	<div class="brand">پانێڵی ئەدمین</div>
	<i class="fa fa-bars fa-2x toggle-btn rounded" data-toggle="collapse" data-target="#menu-content"></i>
	<div class="menu-list">
		<ul id="menu-content" class="menu-content collapse out">


			<li class="active">
				<a href="dashboard.php">
					داشبۆڕد<i class="fa-solid fa-gauge fa-lg"></i>
				</a>
			</li>

			<li data-toggle="collapse" data-target="#users" class="collapsed">
				<a href="#"><i class="fas fa-caret-down"></i> بەکارهێنەران <i class="fa fa-user fa-lg"></i></a>
			</li>
			<ul class="sub-menu collapse" id="users">
				<li><a href="add_user.php">زیادکردنی بەکارهێنەران</a></li>
				<li><a href="manage_user.php">بەڕێوەبردنی بەکارهێنەران</a></li>
			</ul>



			<li data-toggle="collapse" data-target="#groups" class="collapsed ">
				<a href="#"> گروپەکان <i class="fa fa-users fa-lg"></i><i class="fas fa-caret-down"></i></a>
			</li>
			<ul class="sub-menu collapse" id="groups">
				<li><a href="group.php">بەڕێوەبردنی گروپەکان</a></li>
			</ul>



			<li>
				<a href="store.php">
					کۆگاکان<i class="fa fa-store fa-lg"></i>
				</a>
			</li>

			<li>
				<a href="table.php">
					مێز <i class="fa fa-table fa-lg"></i>
				</a>
			</li>

			<li data-toggle="collapse" data-target="#category" class="collapsed">
				<a>
					پۆڵێن<i class="fas fa-cash-register"></i><i class="fas fa-caret-down"></i>
				</a>
			</li>
			<ul class="sub-menu collapse" id="category">
				<li><a href="category.php"> پۆڵێنی سەرەکی </a></li>
				<li><a href="subcategory.php">پۆڵێنی لاوەکی</a></li>
			</ul>


			<li data-toggle="collapse" data-target="#products" class="collapsed">
				<a href="#"> بەرهەمەکان<i class="fas fa-cookie"></i> <i class="fas fa-caret-down"></i></a>
			</li>
			<ul class="sub-menu collapse" id="products">
				<li><a href="add_product.php">زیادکردنی بەرهەمەکان</a></li>
				<li><a href="manage_product.php">بەڕێوەبردنی بەرهەمەکان</a></li>
			</ul>



			<li data-toggle="collapse" data-target="#order" class="collapsed">
				<a href="#"> داواکارییەکان (ئۆڕدەرەکان) <i class="fas fa-book-open"></i><i class="fas fa-caret-down"></i></a>
			</li>
			<ul class="sub-menu collapse" id="order">
				<li><a href="prepare_order.php">بەڕێوەبردنی داواکارییەکان</a></li>
			</ul>

			<li class=" py-2">

				<a href="notification_page.php" class="d-flex justify-content-center align-items-center align-content-center">
					<span>ئاگادارکردنەوەکان </span>
					<button type="button" class="icon-button mr-3">
						<span class="material-icons text-white mt-1">notifications</span>
						<span class="icon-button__badge"><?php $query1 = "select * from notification";
															$result1 = mysqli_query($connect, $query1);
															$count1 = mysqli_num_rows($result1);
															echo $count1;
															?></span>
					</button>
				</a>

			</li>
			<li>
				<a href="info.php">
					زانیاری ڕێستورانت <i class="fa fa-info fa-lg"></i>
				</a>
			</li>

			<li>
				<a href="profile.php">
					پڕۆفایل<i class="fa fa-users fa-lg"></i>
				</a>
			</li>

			<li>
				<a href="settings.php">
					ڕێکخستن<i class="fa fa-sun fa-lg"></i>
				</a>
			</li>

			<li>
				<a href="logout.php">
					چوونە دەرەوە<i class="fa fa-user-times fa-lg"></i>
				</a>
			</li>

		</ul>
	</div>
</div>