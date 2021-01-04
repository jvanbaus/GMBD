<?php
if (!isset($_SESSION['login_user'])) {
?> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<img src="/img/LogoMakr-1k85PB.png" width="50" height="50">
    <a class="navbar-brand" href="home.php">Georgia Music Business Directory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Artist Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="artist-directory.php">All</a>
					<a class="dropdown-item" href="#">Hip-Hop</a>
					<a class="dropdown-item" href="#">Acoustic</a>
					<a class="dropdown-item" href="#">Bands</a>
					<a class="dropdown-item" href="#">Electronic</a>					
				</div>
			</li>
            <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Business Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="business-directory.php">All</a>
					<a class="dropdown-item" href="#">Recording</a>
					<a class="dropdown-item" href="#">Sales</a>
					<a class="dropdown-item" href="#">Touring</a>
					<a class="dropdown-item" href="#">Media</a>					
				</div>
                <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Venue Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="venue-directory.php">All</a>
					<a class="dropdown-item" href="#">Outdoor</a>
					<a class="dropdown-item" href="#">Amphitheaters</a>
					<a class="dropdown-item" href="#">Clubs</a>
					<a class="dropdown-item" href="#">Pubs & Restaurants</a>					
				</div>
			</li>
        </ul>
		<ul class="navbar-nav d-flex justify-content-end">           
            <li class="nav-item">
				<a class="nav-link" id="login" href="login.php">Log In</a>
			</li>
		</ul>
    </div>
</nav>
<?php 
// navbar for admin users
} else if ($_SESSION['user_type'] == "Admin") { 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<img src="/img/LogoMakr-1k85PB.png" width="50" height="50">
    <a class="navbar-brand" href="home.php">Georgia Music Business Directory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Artist Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="artist-directory.php">All</a>
					<a class="dropdown-item" href="#">Hip-Hop</a>
					<a class="dropdown-item" href="#">Acoustic</a>
					<a class="dropdown-item" href="#">Bands</a>
					<a class="dropdown-item" href="#">Electronic</a>					
				</div>
			</li>
            <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Business Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="business-directory.php">All</a>
					<a class="dropdown-item" href="#">Recording</a>
					<a class="dropdown-item" href="#">Sales</a>
					<a class="dropdown-item" href="#">Touring</a>
					<a class="dropdown-item" href="#">Media</a>					
				</div>
                <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Venue Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="venue-directory.php">All</a>
					<a class="dropdown-item" href="#">Outdoor</a>
					<a class="dropdown-item" href="#">Amphitheaters</a>
					<a class="dropdown-item" href="#">Clubs</a>
					<a class="dropdown-item" href="#">Pubs & Restaurants</a>					
				</div>
			</li>
        </ul>
		<ul class="navbar-nav d-flex justify-content-end">	
			<li class="nav-item">
				<a class="nav-link" id="admin-dashboard" href="admin-dashboard.php">Admin Dashboard</a>
			</li>
            <li class="nav-item">
				<a class="nav-link" id="logout" href="include/logout.php">Log Out</a>
			</li>
		</ul>
    </div>
</nav>

<?php 
// navbar for other users
} else if ($_SESSION['user_type'] == "Business" || $_SESSION['user_type'] == "Venue" || $_SESSION['user_type'] == "Artist") {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<img src="/img/LogoMakr-1k85PB.png" width="50" height="50">
    <a class="navbar-brand" href="home.php">Georgia Music Business Directory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Artist Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="artist-directory.php">All</a>
					<a class="dropdown-item" href="#">Hip-Hop</a>
					<a class="dropdown-item" href="#">Acoustic</a>
					<a class="dropdown-item" href="#">Bands</a>
					<a class="dropdown-item" href="#">Electronic</a>					
				</div>
			</li>
            <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Business Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="business-directory.php">All</a>
					<a class="dropdown-item" href="#">Recording</a>
					<a class="dropdown-item" href="#">Sales</a>
					<a class="dropdown-item" href="#">Touring</a>
					<a class="dropdown-item" href="#">Media</a>					
				</div>
                <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Venue Directory</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="venue-directory.php">All</a>
					<a class="dropdown-item" href="#">Outdoor</a>
					<a class="dropdown-item" href="#">Amphitheaters</a>
					<a class="dropdown-item" href="#">Clubs</a>
					<a class="dropdown-item" href="#">Pubs & Restaurants</a>					
				</div>
			</li>
        </ul>
		<ul class="navbar-nav d-flex justify-content-end">	
            <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				My Account</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">My Profile</a>
					<a class="dropdown-item" href="#">Messages</a>					
				</div>
            </li>
            <li class="nav-item">
				<a class="nav-link" id="logout" href="include/logout.php">Log Out</a>
			</li>
		</ul>
    </div>
</nav>
<?php } ?>