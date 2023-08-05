<?php

$responses = [];
$success = "";
if (isset($_POST['email'], $_POST['subject'], $_POST['name'], $_POST['msg'])) 
{
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
  {
		$responses[] = 'Email is not valid!';
	}
	if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['msg'])) 
  {
		$responses[] = 'Please complete all fields!';
	} 
	if (!$responses) 
  {
		$success = "http://formspree.io/venturarubyjean@gmail.com";    
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  
  <!-- links -->
  <?php include('links.php') ?>
</head>
<body>
 <!-- Header Start -->
  <header>
    <?php include('header.php') ?>
  </header>
  <!-- Header End -->
  <!-- Carousel Start -->
  <?php include('carousel.php') ?>
  <!-- Carousel End -->
  <!-- Page Title Start -->
  <div class="container mb-5">
    <div class="row">
      <div class="col d-flex justify-content-center nacci-title-box">
        <div class="nacci-title p-4">
          <h1>Contact Us</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  <!-- Form Start -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 d-flex flex-column align-items-center p-5">
        <h2><b>Inquire</b></h2>
        <div class="container myform-wrapper m-5 p-5">
          <div class="row">
            <div class="col">
              <form action="post" action="<?php echo $success?>" autocomplete="on">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="name" name="name" required>
                  <label for="name" class="form-label">Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" required>
                  <label for="email" class="form-label">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="subject" name="subject" required>
                  <label for="subject" class="form-label">Subject</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="message" name="msg" style="height: 100px" required></textarea>
                  <label for="message">Message</label>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                  <?php if ($responses): ?>
                    <p class="responses"><?php echo implode('<br>', $responses); ?></p>
                  <?php endif; ?>
                  <input class="btn btn-primary" type="submit" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 myform-img d-flex justify-content-center p-5">
        <img src="assets/remake.png" alt="">
      </div>
    </div>
  </div>
  <!-- Form End -->
  <!-- Footer Start -->
    <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>