<?php
    require 'config/config.php';
    
    if(isset($_SESSION['username'])){
		$userLoggedIn = $_SESSION['username'];
		$user_details_query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$userLoggedIn'");
		$user = mysqli_fetch_array($user_details_query);
	}
	else{
		header('Location: register.php');
	}
?>

<html>
<head>
	<title>Stream Home</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
  <meta name="theme-color" content="#fffeee" /> 
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css?ver=1.1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
  <style>
        .user_greet {
            background-color: #f8f8f8 ;
            cursor: default;
        }
        .user_greet:hover {
            background-color: #f8f8f8 ;
            cursor: default;
        }
    </style>
</head>
<body style="background-color: #f8f8f8 ">

<header class="hide-on-med-and-down">
	<div class="navbar-fixed">
    <nav class="top-nav" style="box-shadow: none;background-color:rgba(245, 245, 245,0);">
      <div class="nav-wrapper" style="background-color:rgba(245, 245, 245,0.9);height:120%; z-index:1; display:flex">
        <span style="font-size:2em ;color: rgba(0,0,0,0.6); margin-left:25vw; font-weight: 700; margin-top: 2.5vh">Your Stream</span>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <div style="display:flex; margin-top:0.6em; margin-left: 42vw">
            <li style="margin-right:0em; color: #707070; margin-top:0.6em; margin-left:4vw">Hello, <?php echo $user['first_name'];?></li><a href="<?php echo $userLoggedIn;?>" class="user_greet"><img src="<?php echo $user['profile_pic'];?>" alt="" width="50px" class="circle responsive-img z-depth-2" style="margin-top:15px; margin-right:2em;cursor:pointer"/></a>
          </div>
        </ul>

      </div>
    </nav>
  </div>
	<div class="container hide-on-large"></div>
	<ul id="nav-mobile" class="sidenav sidenav-fixed z-depth-1" style="background-color: #6CD5A4; width:22.5vw">
			<!-- <li class="row" style="margin-top:5em">
				<div class="container">
					<div class="col s12 m12 l12 center-align">
						<img src="" alt="" width="50%" class="circle responsive-img">
					</div>
				</div>
			</li> -->
			<!-- <h2><a href="sass.html" style="margin-left:10%" class="white-text">Stream.io</a></h2> -->
			<li style="margin-top:1em"><a href="index.php" class="white-text"><i class="small material-icons white-text">home</i>Home</a></li>
			<li><a href="badges.html" class="white-text"><i class="small material-icons white-text">mail</i>Messages</a></li>
			<li><a href="collapsible.html" class="white-text"><i class="small material-icons white-text">notifications</i>Notifications</a></li>
			<li><a href="collapsible.html" class="white-text"><i class="small material-icons white-text">person_add</i>Friend Request</a></li>
			<li><a href="collapsible.html" class="white-text"><i class="small material-icons white-text">settings</i>Settings</a></li>
			<li><a href="includes/handlers/logout.php" class="white-text" style="position:absolute; bottom:10vh;"><i class="tiny material-icons white-text">power_settings_new</i>Logout</a></li>
	</ul>
</header>




<!-- 
<div class="nav-col">

</div>
<div class="content-col">
</div>
<div class="content-col1">
	
</div>
<div class="content-col2">
	
</div>
 -->

<!-- 
<ul id="nav-mobile" class="sidenav sidenav-fixed" style="transform: translateX(0px);">
        <li class="logo"><a id="logo-container" href="/" class="brand-logo">
            <object id="front-page-logo" type="image/svg+xml" data="res/materialize.svg">Your browser does not support SVG</object></a></li>
        <li class="version"><a href="#" data-target="version-dropdown" class="dropdown-trigger">
            1.0.0
            <svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg></a><ul id="version-dropdown" class="dropdown-content" tabindex="0">
            <li tabindex="0"><a>1.0.0</a></li>
            <li tabindex="0"><a href="http://archives.materializecss.com/0.100.2/">0.100.2</a></li>
          </ul>
          
        </li>
        <li class="search">
          <div class="search-wrapper">
            <input id="search" placeholder="Search"><i class="material-icons">search</i>
            <div class="search-results"></div>
          </div>
        </li>
        <li class="bold"><a href="about.html" class="waves-effect waves-teal">About</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Getting Started</a></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">CSS</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="color.html">Color</a></li>
                  <li><a href="grid.html">Grid</a></li>
                  <li><a href="helpers.html">Helpers</a></li>
                  <li><a href="media-css.html">Media</a></li>
                  <li><a href="pulse.html">Pulse</a></li>
                  <li><a href="sass.html">Sass</a></li>
                  <li><a href="shadow.html">Shadow</a></li>
                  <li><a href="table.html">Table</a></li>
                  <li><a href="css-transitions.html">Transitions</a></li>
                  <li><a href="typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="bold active"><a class="collapsible-header waves-effect waves-teal" tabindex="0">Components</a>
              <div class="collapsible-body" style="display: block;">
                <ul>
                  <li><a href="badges.html">Badges</a></li>
                  <li><a href="buttons.html">Buttons</a></li>
                  <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                  <li><a href="cards.html">Cards</a></li>
                  <li><a href="collections.html">Collections</a></li>
                  <li><a href="floating-action-button.html">Floating Action Button</a></li>
                  <li><a href="footer.html">Footer</a></li>
                  <li><a href="icons.html">Icons</a></li>
                  <li class="active"><a href="navbar.html">Navbar</a></li>
                  <li><a href="pagination.html">Pagination</a></li>
                  <li><a href="preloader.html">Preloader</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">JavaScript</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="auto-init.html">Auto Init</a></li>
                  <li><a href="carousel.html">Carousel</a></li>
                  <li><a href="collapsible.html">Collapsible</a></li>
                  <li><a href="dropdown.html">Dropdown</a></li>
                  <li><a href="feature-discovery.html">FeatureDiscovery</a></li>
                  <li><a href="media.html">Media</a></li>
                  <li><a href="modals.html">Modals</a></li>
                  <li><a href="parallax.html">Parallax</a></li>
                  <li><a href="pushpin.html">Pushpin</a></li>
                  <li><a href="scrollspy.html">Scrollspy</a></li>
                  <li><a href="sidenav.html">Sidenav</a></li>
                  <li><a href="tabs.html">Tabs</a></li>
                  <li><a href="toasts.html">Toasts</a></li>
                  <li><a href="tooltips.html">Tooltips</a></li>
                  <li><a href="waves.html">Waves</a></li>
                </ul>
              </div>
            </li>
            <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">Forms</a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="autocomplete.html">Autocomplete</a></li>
                  <li><a href="checkboxes.html">Checkboxes</a></li>
                  <li><a href="chips.html">Chips</a></li>
                  <li><a href="pickers.html">Pickers</a></li>
                  <li><a href="radio-buttons.html">Radio Buttons</a></li>
                  <li><a href="range.html">Range</a></li>
                  <li><a href="select.html">Select</a></li>
                  <li><a href="switches.html">Switches</a></li>
                  <li><a href="text-inputs.html">Text Inputs</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="bold"><a href="mobile.html" class="waves-effect waves-teal">Mobile</a></li>
        <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Showcase</a></li>
        <li class="bold"><a href="themes.html" class="waves-effect waves-teal">Themes<span data-badge-caption="updated" class="new badge"></span></a></li>
      </ul> -->