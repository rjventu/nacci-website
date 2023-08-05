<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  
  <!-- links -->
  <?php include('links.php') ?>

  <!-- style -->
  <style>
    /* --- Start progress bar --- */
    .process-wrapper {
    margin:auto;
    max-width:1080px;
    }

    #progress-bar-container {
    position:relative;
    width:90%;
    margin:auto;
    height:100px;
    margin-top:65px;
    }

    #progress-bar-container ul {
    padding:0;
    margin:0;
    padding-top:15px;
    z-index:9999;
    position:absolute;
    width:100%;
    margin-top:-40px
    }

    #progress-bar-container li:before {
    content:" ";
    display:block;
    margin:auto;
    width:30px;
    height:30px;
    border-radius:50%;
    border:solid 2px #ffffff;
    transition:all ease 0.3s;
      
    }

    #progress-bar-container li.active:before, #progress-bar-container li:hover:before {
    border:solid 2px #fff;
            
    background: linear-gradient(to right, #1E3B1F 30%,#fff 80%); 
    }

    #progress-bar-container li {
    list-style:none;
    float:left;
    width:20%;
    text-align:center;
    color:#ffffff;
    text-transform:uppercase;
    font-size:11px;
    cursor:pointer;
    font-weight:700;
    transition:all ease 0.2s;
    vertical-align:bottom;
    height:70px;
    position:relative;
    }

    #progress-bar-container li .step-inner {
    position:absolute;
    width:100%;
    bottom:0;
      font-size: 14px;
    }

    #progress-bar-container li.active, #progress-bar-container li:hover {
    color:#ffffff;
    }

    #progress-bar-container li:after {
    content:" ";
    display:block;
    width:6px;
    height:6px;
    background:#777;
    margin:auto;
    border:solid 7px #fff;
    border-radius:50%;
    margin-top:40px;
    box-shadow:0 2px 13px -1px rgba(0,0,0,0.3);
    transition:all ease 0.2s;
      
    }

    #progress-bar-container li:hover:after {
    background:#000000;
    }

    #progress-bar-container li.active:after {
    background:#60ff68;
    }

    #progress-bar-container #line {
    width:80%;
    margin:auto;
    background: #eee;
    height:6px;
    position:absolute;
    left:10%;
    top:57px;
    z-index:1;
    border-radius:50px;
    transition:all ease 0.9s;
    }

    #progress-bar-container #line-progress {
    content:" ";
    width:3%;
    height:100%;
    background: rgb(70, 224, 82);	 
    position:absolute;
    z-index:2;
    border-radius:50px;
    transition:all ease 0.9s;
    }

    #progress-content-section {
    width:90%;
    height:auto;
    margin: auto;
    background: #f3f3f3;
    border-radius: 10px;
    }

    #progress-content-section .section-content {
    padding:30px 40x;
    text-align:center;
    }

    #progress-content-section .section-content h2 {
    font-size:17px;
    text-transform:uppercase;
    color:#000000;
    letter-spacing:1px;
    }

    #progress-content-section .section-content p {
    font-size:16px;
    line-height:1.8em;
    color:#000000;
    }

    #progress-content-section .section-content {
    display:none;
    animation: FadeInUp 700ms ease 1;
    animation-fill-mode:forwards;
    transform:translateY(15px);
    opacity:0;
    }

    #progress-content-section .section-content.active {
    display:block;
    }

    @keyframes FadeInUp {
    0% {
      transform:translateY(15px);
      opacity:0;
    }

    100% {
      transform:translateY(0px);
      opacity:1;
    }
    }
  </style>
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
          <h1>About NACCI</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  <!-- About Start -->
  <div class="container myabout mb-5">
    <div class="row">
      <div class="col-md-6">
        <div class="row about-text">
          <h2 class="my-3"><b>WHO WE ARE</b></h2>
          <p>
            Nature Awareness and Conservation Club Incorporation is a charity or fundraising organization that aims to further help and support the tropical tourism of Asia. Hence, their club is also the daughter of Conservation for Tomorrow Foundation, Inc and Miriam PEACE of Environmental Studies Institute of Miriam College, and finally also known to be the granddaughter of Foundation for Philippine Environment and great granddaughter of Philippine Eagle Foundation, Inc.
          </p>
          <h2 class="my-3"><b>WHAT WE DO</b></h2>
          <p>
            We have different social and environment responsibility programs. But mostly, on massive mangrove and upland tree planting, rehabilitation and reforestation in partnership with local peoples organization of fishing community and farmers with formation on Enhanced National Greening Program (ENGP) of Department of Environment and Natural Resources (DENR). The tree planting can be done ALL YEAR ROUND by the requesting organization, companies, and schools.
          </p>
        </div>
      </div>
      <div class="col-md-6 about-img-box">
        <img src="assets/about.png" alt="">
      </div>
    </div>
  </div>
  <!-- About End -->
  <!-- Mission Vision Start -->
  <div class="container mission-vision mb-5 p-5">
    <div class="row">
      <div class="col-md-6 mv-desc">
        <div class="description-box pe-4">
          <h2><b>Mission</b></h2>
          <p>
            To pursue effective environmental programs geared toward the conservation of the eco-system through outdoor environmental education and conservation actions.
          </p>
        </div>
      </div>
      <div class="col-md-6 mv-img">
        <img src="assets/mission.png" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mv-img">
        <img src="assets/vision.png" alt="">
      </div>
      <div class="col-md-6 mv-desc">
        <div class="description-box pe-4">
          <h2><b>Vision</b></h2>
          <p>
          A society where its citizens are aware of the value of its diverse natural heritage and working together for the benefit of the environment and the common future. #SDG
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Mission Vision End -->
  <!-- Timeline Start -->
  <div class="c1">
  <div class="process-wrapper">
    <h1 style="color:white"><b>Our Timeline</b></h1>
    <div id="progress-bar-container">
      <ul>
        <li class="step step01 active"><div class="step-inner">1971</div></li>
        <li class="step step02"><div class="step-inner">1992</div></li>
        <li class="step step03"><div class="step-inner">2008  </div></li>
        <li class="step step04"><div class="step-inner">2017  </div></li>
        <li class="step step05"><div class="step-inner">2021  </div></li>
      </ul>
      <div id="line">
        <div id="line-progress"></div>
      </div>
    </div>
    
    <div id="progress-content-section">
      <div class="section-content discovery active">
        <h2>1971</h2>
        <p> A summer conservation camp was organized by Mr. Jesus Alvarez of Parks & Wildlife in Mt. Apo, Davao through the inspiration of Gen. Charles Lindberg, aviation hero turned environmentalist. Encouraged by it’s success, a 2nd camp was held in Mt. Mayon, Bicol. However, due to budgetary constraints, future camps were discontinued.</p>
      </div>
      
      <div class="section-content strategy">
        <h2>1992</h2>
        <p> Two participants from the 1971 conservation camp, Mr. Manuel & Nelson Petines carried on the mission on their drive for continued ecological preservation by started Conserving for Tomorrow Fnd, Inc. (C.F.T.F.I.) It raised its initial funding from Foundation for Philippine Environment thru the support of Miriam PEACE. Since then the foundation continued its mission by way of participation of teachers, student leaders and young professionals
        </p>
      </div>
      
      <div class="section-content creative">
        <h2>2008</h2>
        <p> From Eco-Camps and Eco-tours with environment education thru structured learning activities, NACCI evolve to Corporate Social Responsibility (CSR) Programs thru massive mangrove tree planting in Batangas.</p>
      </div>
      
      <div class="section-content production">
        <h2>2017</h2>
        <p> We branched out the CSR tree planting to Bataan, Pampanga, Bulacan, Quezon Province, La Union and Pangasinan. We also started leveling up of scientific knowledge thru Zoological Society London and Philippine Wetlands International. We started to partner up with mangrove enthusiast in Visayas and Mindanao. </p>
      </div>
      
      <div class="section-content analysis">
        <h2>2021</h2>
        <p> We started Mangrove tree planting in Lemery, Batangas and Noveleta, Cavite. We might start a mangrove river and firefly tour in Noveleta so the marginalized fishing community will have additional extra income. </p>
      </div>
    </div>
  </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script>
          
          $(".step").click( function() {
        $(this).addClass("active").prevAll().addClass("active");
        $(this).nextAll().removeClass("active");
      });
      
      $(".step01").click( function() {
        $("#line-progress").css("width", "3%");
        $(".discovery").addClass("active").siblings().removeClass("active");
      });
      
      $(".step02").click( function() {
        $("#line-progress").css("width", "25%");
        $(".strategy").addClass("active").siblings().removeClass("active");
      });
      
      $(".step03").click( function() {
        $("#line-progress").css("width", "50%");
        $(".creative").addClass("active").siblings().removeClass("active");
      });
      
      $(".step04").click( function() {
        $("#line-progress").css("width", "75%");
        $(".production").addClass("active").siblings().removeClass("active");
      });
      
      $(".step05").click( function() {
        $("#line-progress").css("width", "100%");
        $(".analysis").addClass("active").siblings().removeClass("active");
      });
      
      </script>
    </div>
  </div>
  <!-- Timeline End -->
  <!-- Footer Start -->
  <?php include('footer.php') ?>
  <!-- Footer End -->
</body>
</html>