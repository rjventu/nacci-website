<!-- Website icon -->
<link rel="icon" href="assets/remake.png" type="image/gif" />
<!-- Include Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 <!-- Include Font Awesome CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    /* Set the sidebar height to 100vh to fill the entire viewport height */
    #sidebar {
      display:relative;
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
  </style>
</head>
<body>
  <div class="container-fluid">
    <!-- Page Header -->
    <div class="row bg-dark text-light py-2">
      <div class="col-md-6">
        <img src="assets/logo.png" alt="NACCI Logo" height=70 class="admin-logo">
        <h3 class="admin-title">Nature Awareness & Conservation Club, Inc.</h3>
      </div>
      <div class="col-md-6 text-right">
      </div>
    </div>

    <div class="row">
      <!-- Sidebar -->
      <div id="sidebar" class="col-md-2 text-light d-flex flex-column justify-content-between px-4 py-5">
        <div class="sidebar-top">
          <h3 class="linkuser">Hi,  <?php echo $_SESSION['username']; ?></h3>
          <span class="linkuser"><a class="myprofiledesign" href="clientmyprofile.php" title="My Profile">View my profile</a></span>
          <br><br>
          <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link linkuser" href="clientvolunteer.php"><i class="fas fa-users"></i> Volunteer Opportunities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link linkuser" href="clientreservation.php"><i class="fas fa-bars"></i> My Reservation</a>
            </li>
            <!-- Add more navigation items here -->
          </ul>
        </div>
        <div class="sidebar-bottom">
         <!-- Logout Button -->
          <a href="signin.php?logout=1"><button type="button" class="btn btn-danger" id="logoutBtn">Logout</button></a>
        </div>
        
      </div> 
      <!-- end php link -->