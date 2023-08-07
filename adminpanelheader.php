<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <!-- Include Font Awesome CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    /* Set the sidebar height to 100vh to fill the entire viewport height */
    #sidebar {
      height: 100vh;
      background-color: #ccd4db; /* Change this to the shade of gray you prefer */
    }

    /* Style the logo and title in the header */
    .admin-logo {
      height: 40px;
      margin-right: 10px;
    }

    .admin-title {
      font-size: 1.5rem;
      margin: 0;
      display: inline-block;
      vertical-align: middle;
    }
    .admindetails{
        background-color: #99a6b3;
    }
    .linkuser{
        color: black !important;

    }
    .myprofiledesign , .myprofiledesign:hover{
      text-decoration: none;
      color: black !important;
    }
    #logoutBtn {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #dc3545;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <!-- Page Header -->
    <div class="row bg-dark text-light py-2">
      <div class="col-md-4">
        <img src="assets/logo.png" alt="NACCI Logo" height=70 class="admin-logo">
        <h3 class="admin-title">Nature Awareness & Conservation Club, Inc.</h3>
      </div>
      <div class="col-md-8 text-right">
      </div>
    </div>

    <div class="row">
      <!-- Sidebar -->
      <div id="sidebar" class="col-md-2 text-light">
  <br>
  <!-- Add the image here -->
    <a href="adminuserpage.php"><img src="displayimage.php?image=<?php echo $_SESSION['picturename']; ?>" alt="<?php echo $_SESSION['username']; ?>" width="100" height="100">
    <h3 class="linkuser"><?php echo $_SESSION['username']; ?></h3>
    <span class="linkuser"><?php echo $_SESSION['position']; ?></span><br></a>
    <span class="linkuser"><a class="myprofiledesign" href="adminmyprofile.php" title="My Profile">View my profile</a></span>
    <br><br>
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link linkuser" href="adminManageProgram.php"><i class="fas fa-bars"></i> Manage Programs</a>
        </li>
        <li class="nav-item">
        <a class="nav-link linkuser" href="adminManageVolunteer.php"><i class="fas fa-users"></i> Manage Volunteers</a>
        </li>
        <!-- Add more navigation items here -->
    </ul>
    <!-- Logout Button -->
    <button id="logoutBtn"><a class="myprofiledesign" href="adminlogin.php?logout=1">Logout</a></button>
    </div>
