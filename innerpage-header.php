<?php
$message = "";
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
/*$PublicIP = get_client_ip(); 
$json  = file_get_contents("https://api.ipstack.com/$PublicIP?access_key=a1b253e3baa847098a071d7e1631fe1a");
$json  =  json_decode($json ,true);
$country =  $json['country_name'];
$region= $json['region_name'];
$city = $json['city'];*/

function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/OPR/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

// now try it
$ua = getBrowser();
$browser = $ua['name'] . " " . $ua['version'] . " on " . $ua['platform'];
$device = $ua['userAgent'];
?>

<!-- End of Async Drift Code -->

<meta name="naver-site-verification" content="naver1e7fd41b9932cf544a67b20da4e2cac6.html" />

<meta name="yandex-verification" content="83dae0c0f0f78e14" />

<meta name="p:domain_verify" content="f967655f2fcb43aa8f7cd09ab93d32a8" />
<link href="favicon.png" type="image/x-icon" rel="shortcut icon">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="mystyle.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="float-panel.js"></script>
<script type="text/javascript" src="sis.js"></script>



<script>
// Wait collectchat
setTimeout(function() {
  if (window.innerWidth > 576) {
    (function(w, d) {
      w.CollectId = "67627ee6d3925dd2f895b7e3";
      var h = d.head || d.getElementsByTagName("head")[0];
      var s = d.createElement("script");
      s.setAttribute("type", "text/javascript");
      s.async = true;
      s.setAttribute("src", "https://collectcdn.com/launcher.js");
      h.appendChild(s);
    })(window, document);
  }
}, 5000); // Wait collectchat

</script>

<div id="page-preloader"><span class="spinner"></span></div>
<!-- <script src="https://code.jquery.com/jquery-latest.js"></script> -->
<script type="text/javascript">
    setTimeout(function() {
        $("#page-preloader").css('display', 'none');
    }, 3000);

    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('#background').fadeIn(500);
            $("#background").css('background-color', '#eaecec');
            $("#background").css('height', '10px;');
            $("#topbar2").css('display', 'block');
        } else {
            $('#background').fadeOut(0);
        }
    });

    var headerscroll = document.getElementById("headerscroll");
    var myScrollFunc = function() {
        var y = window.scrollY;
        if (y <= 10) {
            $("#background").css('background-color', 'transparent');
            $("#background").css('height', '10px;');
            $("#topbar2").css('display', 'block');
        }

        if (y >= 20 && y <= 499) {
            $("#navbarid").css('display', 'none');
            $("#topbarid").css('display', 'none');
        } else {
            $("#navbarid").css('display', 'block');
            $("#topbarid").css('display', 'block');
            $("#background").css('display', 'block');
        }
    };
    window.addEventListener("scroll", myScrollFunc);
</script>

<script async src="https://cdn.ampproject.org/v0.js"></script>
<style amp-boilerplate>
    body {
        -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
        -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
        -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
        animation: -amp-start 8s steps(1, end) 0s 1 normal both
    }

    @-webkit-keyframes -amp-start {
        from {
            visibility: hidden
        }

        to {
            visibility: visible
        }
    }

    @-moz-keyframes -amp-start {
        from {
            visibility: hidden
        }

        to {
            visibility: visible
        }
    }

    @-ms-keyframes -amp-start {
        from {
            visibility: hidden
        }

        to {
            visibility: visible
        }
    }

    @-o-keyframes -amp-start {
        from {
            visibility: hidden
        }

        to {
            visibility: visible
        }
    }

    @keyframes -amp-start {
        from {
            visibility: hidden
        }

        to {
            visibility: visible
        }
    }
</style>
<noscript>
    <style amp-boilerplate>
        body {
            -webkit-animation: none;
            -moz-animation: none;
            -ms-animation: none;
            animation: none
        }
    </style>
</noscript>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QQD49NDHW8"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QQD49NDHW8');
</script>

<body>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <div id="headerscroll" class="row container headerscroll1 headerScinline">
        <!---SEO -->
        <div id="topbarid" class="row  container-fluid navbar-fixed-top topinline oveflow-x:hidden;">
            <div id="topbar2 background1" style="z-index:1000" class="col-sm-12  hidden-xs hidden-md hidden-sm topbar2inline">
                <div class="top-bar" itemscope itemtype="https://schema.org/Person">
                    <!--<ul class="list-inline">-->

                    <!--    <div class='sprite flag3'>-->
                    <!--        <img class="sprite sprite-Flag3" src="image/flag3.png" alt="flag">-->
                    <!--        <a href="tel:+1.844.44.55.767" itemprop="name">-->
                    <!--            <span class="topBarFont" itemprop="telephone" style="color:#000;">+1.844.44.55.767</span>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--    <div class='sprite flag1'>-->
                    <!--        <img class="sprite sprite-Flag1" src="image/flag1.png" alt="flag">-->
                    <!--        <a href="tel:+91.9212.080.630" itemprop="name">-->
                    <!--            <span class="topBarFont" itemprop="telephone" style="color:#000;">+91.9212.080.630</span>-->
                    <!--        </a>-->
                    <!--    </div>-->
                        
                    <!--     <div class='sprite flag1'>-->
                    <!--        <img class="sprite sprite-Flag1" src="image/flag2.png" alt="flag">-->
                    <!--        <a href="tel:+971 56-848-5757" itemprop="name">-->
                    <!--            <span class="topBarFont" itemprop="telephone" style="color:#000;">+971 56-848-5757</span>-->
                    <!--        </a>-->
                    <!--    </div>-->
                       
                       
                    <!--    <div class='sprite email'>-->
                    <!--        <img class="sprite sprite-Email" src="image/email.png" alt="email">-->

                    <!--        <a href="mailto:hello&#64;sisgain&#46;com" itemprop="name">-->
                    <!--            <span class="topBarFont" itemprop="email" style="color:#000;">hello&#64;sisgain&#46;com</span>-->
                    <!--        </a>-->
                    <!--    </div>-->

                    <!--    <li class="icons" style="margin-left:140px;"> <i class="fa fa-skype skypeinline" aria-hidden="true"></i>-->
                    <!--        <a href='skype:spectrum&#46;specialist?call'>-->
                    <!--            <span class="topBarFont" style="color:#000;">spectrum&#46;specialist</span>-->
                    <!--        </a>-->
                    <!--    </li>-->

                    <!--</ul>-->
                       <div class="ctb-wrapper">
                        <div class="ctb-inner">

                            <a href="tel:+18444455767" class="ctb-item">
                                <img src="image/flag3.png" alt="USA" class="ctb-icon">
                                <span class="ctb-text">+1.844.44.55.767</span>
                            </a>

                            <a href="tel:+919212080630" class="ctb-item">
                                <img src="image/flag1.png" alt="India" class="ctb-icon">
                                <span class="ctb-text">+91.9212.080.630</span>
                            </a>
                            
                              <a href="tel:+971 56-848-5757" class="ctb-item">
                                <img  src="image/flag2.png" alt="India" class="ctb-icon">
                                <span class="ctb-text">+971 56-848-5757</span>
                            </a>

                            <a href="mailto:hello@sisgain.com" class="ctb-item">
                                <img src="image/email.png" alt="Email" class="ctb-icon">
                                <span class="ctb-text">hello@sisgain.com</span>
                            </a>

                        </div>
                    </div>
                       <style>
                .ctb-wrapper {
                    width: 100%;
                    background-color: transparent;

                }

                .ctb-inner {
                    float: right;
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 6px 12px;
                    display: flex;
                    align-items: center;
                    gap: 24px;
                }

                .ctb-item {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    text-decoration: none;
                    color: #000;
                    font-size: 14px;
                }

                .ctb-item:hover {
                    text-decoration: underline;
                }

                .ctb-icon {
                    width: 18px;
                    height: 18px;
                    object-fit: contain;
                }

                .ctb-text {
                    white-space: nowrap;
                }
            </style>
                </div>
            </div>


            <nav class="navbar navbar-inverse" id="navbarid">

                <div class="col-sm-12" style="background: #eaecec;">
                    <div class="navbar-header logo">
                        <a href="https://sisgain.com/"><img src="image/logo.webp" alt="SISGAIN LOGO"></a>
                        <button id="collapse-btn" class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse js-navbar-collapse" id="telemedicine-new">
                        <ul class="nav navbar-nav navbarinline" id="navActive" data-top="0" data-scroll="800" itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                            <li class="dropdown mega-dropdown">

                            <li class="dos.bis" itemprop="name"><a href="https://sisgain.com/about-us" itemprop="url">About us</a></li>



                            <li class="dropdown mega-dropdown dos.bis" itemprop="name">
                                <a itemprop="url" href="#" class="dropdown-toggle nav ul li.services" data-toggle="dropdown">Services<span class="caret"></span></a>
                                <ul class="dropdown-menu mega-dropdown-menu menu-border">

                                    <li id="service1" class="col-sm-3">
                                        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                                            <li class="dropdown-header color-red box-size"><img src="image/hire-mob.png" alt="Check Box">&nbsp;&nbsp;MOBILE DEVELOPMENT SERVICES</li>
                                            <br>
                                            <!--<li class="crm-box" itemprop="name">
                                                        <a href="https://sisgain.com/android-application-development" itemprop="url"><img src="image/red-check.png" alt="Check Box">&nbsp;&nbsp;Android App Development</a>
                                                    </li>-->
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/android-application-development" itemprop="url"><img src="image/red-check.png" alt="Check Box">&nbsp;&nbsp;Android App Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/iphone-application-development" itemprop="url"><img src="image/red-check.png" alt="Check Box">&nbsp;&nbsp;iPhone App Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/ipad-application-development" itemprop="url"><img src="image/red-check.png" alt="Check Box">&nbsp;&nbsp;iPad App Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/cross-platform-application-development" itemprop="url"><img src="image/red-check.png" alt="Check Box">&nbsp;&nbsp;Cross Platform Development</a>
                                            </li>
                                            <li class="crm-box liMobileMargin" itemprop="name">
                                                <a href="https://sisgain.com/ionic-application-development" itemprop="url"><img src="image/red-check.png" alt="Check Box">&nbsp;&nbsp;Ionic App Development</a>
                                            </li>
                                            <li class="dropdown-header color-blue box-size liWebPadding"><img src="image/web.png" alt="Check Box">&nbsp;&nbsp;WEB DEVELOPMENT SERVICES</li>

                                            <br>

                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/responsive-website-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Responsive Website</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/ui-ux-design-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;UI/UX Design</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/mobile-website-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Mobile Website</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/website-maintenance" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Website Maintenance</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/angular-js-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Angular JS Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/node-js-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Node JS Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/php-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;PHP Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/codeigniter-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Codeigniter Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/laravel-development" itemprop="url"><img src="image/blue.png" alt="Check Box">&nbsp;&nbsp;Laravel Development</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li id="service2" class="col-sm-3">
                                        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                                            <li class="dropdown-header color-yellow box-size"><img src="image/hire-web.png" alt="Check Box">&nbsp;&nbsp;CMS & E-COMMERCE</li>
                                            <br>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/wordpress-development-company" itemprop="url"><img src="image/yellow-check.png" alt="Check Box">&nbsp;&nbsp;Wordpress Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/magento-development-company" itemprop="url"><img src="image/yellow-check.png" alt="Check Box">&nbsp;&nbsp;Magento Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/woo-commerce-development-company" itemprop="url"><img src="image/yellow-check.png" alt="Check Box">&nbsp;&nbsp;Woo-Commerce Developement</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/drupal-development-company" itemprop="url"><img src="image/yellow-check.png" alt="Check Box">&nbsp;&nbsp;Drupal Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/joomla-development-company" itemprop="url"><img src="image/yellow-check.png" alt="Check Box">&nbsp;&nbsp;Joomla Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/open-cart-development-company" itemprop="url"><img src="image/yellow-check.png" alt="Check Box">&nbsp;&nbsp;Open Cart Development</a>
                                            </li>

                                            <li class="dropdown-header color-green box-size"><img src="image/emer.png" alt="Check Box">&nbsp;&nbsp;EMERGING TECHNOLOGIES</li>
                                            <br>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/wearable-application-development" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Wearable Apps Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/internet-of-things" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Internet of Things</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/cloud-computing" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Cloud Computing</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/big-data-service" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Big Data Services</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/augmented-reality-service" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Augmented Reality Services</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/apple-watch-development" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Apple Watch Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/google-glass-development" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Google Glass Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/webrtc" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;WebRTC</a>
                                            </li>
                                            <li class="crm-box liMobileMargin" itemprop="name">
                                                <a href="https://sisgain.com/tokbox" itemprop="url"><img src="image/green-check1.png" alt="Check Box">&nbsp;&nbsp;Tokbox</a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li id="service3" class="col-sm-2">
                                        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                                            <li class="dropdown-header color-light crm-box"><img src="image/crm.png" alt="crm">&nbsp;&nbsp;ERP & CRM SERVICES</li>
                                            <br>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/crm-development-company" itemprop="url"><img src="image/green-check.png" alt="Check Box">&nbsp;&nbsp;CRM Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/crm-implementation-company" itemprop="url"><img src="image/green-check.png" alt="Check Box">&nbsp;&nbsp;CRM Implementation</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/crm-consulting-company" itemprop="url"><img src="image/green-check.png" alt="Check Box">&nbsp;&nbsp;CRM Consulting</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/erp-development-company" itemprop="url"><img src="image/green-check.png" alt="Check Box">&nbsp;&nbsp;ERP Development</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/erp-consulting-company" itemprop="url"><img src="image/green-check.png" alt="Check Box">&nbsp;&nbsp;ERP Consulting</a>
                                            </li>
                                            <br>
                                            <li class="dropdown-header color-orange crm-box dropdwonInline"><img src="image/qa.png" alt="Check Box">&nbsp;&nbsp;QA TESTING & SUPPORT</li>
                                            <br>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/performance-testing" itemprop="url"><img src="image/orang-check.png" alt="Check Box">&nbsp;&nbsp;Performance Testing</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/mobile-testing" itemprop="url"><img src="image/orang-check.png" alt="Check Box">&nbsp;&nbsp;Mobile Testing</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/automation-testing" itemprop="url"><img src="image/orang-check.png" alt="Check Box">&nbsp;&nbsp;Automation Testing</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/software-test-management" itemprop="url"><img src="image/orang-check.png" alt="Check Box">&nbsp;&nbsp;Software Test Management</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/annual-maintenance-contract" itemprop="url"><img src="image/orang-check.png" alt="Check Box">&nbsp;&nbsp;AMC </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li id="service4" class="col-sm-4">
                                        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                                            <li class="dropdown-header achive box-size">Awards & Achievement</li>
                                            <ul>
                                                <div class="row achive-img">
                                                    <li class="col-sm-6 col-xs-6 achiveAward"><a href="https://www.softwareworld.co/top-mobile-app-development-companies-in-usa/" target="_blank"><img src="image/usa.webp" class="img-responsive" alt="Award And Achivement"></a></li>
                                                    <li class="col-sm-6 col-xs-6 space-img achiveAward1"><a href="https://wimgo.com/s/usa/apple-watch-designers/" target="_blank"><img src="image/wimgo.webp" class="img-responsive" alt="Award And Achivement"></a></li>
                                                </div>
                                                <div class="row achive-img">

                                                    <li class="col-sm-6 col-xs-6 achiveAward"><img src="image/top-app-development-companies.webp" class="img-responsive" alt="Award And Achivement"></li>
                                                    <li class="col-sm-6 col-xs-6 space-img achiveAward1" align="center"><img src="image/app.png" class="img-responsive" alt="Award And Achivement"></li>
                                                </div>
                                                <div class="row achive-img">

                                                    <li class="col-sm-6 col-xs-6 achiveAward" align="center"><img src="image/good.png" class="img-responsive" alt="Award And Achivement"></li>
                                                    <li class="col-sm-6 col-xs-6 space-img achiveAward1" align="center"><img src="image/valley.png" class="img-responsive" alt="Award And Achivement"></li>
                                                </div>
                                            </ul>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown mega-dropdown" itemprop="name">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" itemprop="url">Healthcare<span class="caret"></span></a>
                                <ul class="dropdown-menu mega-dropdown-menu menu-border">
                                    <li id="service5" class="col-sm-3">
                                        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                                            <li class="dropdown-header box-sizee color-red" style="margin-left: 100px;"><img src="image/healthcare_1.png" alt="check box">&nbsp;&nbsp;HEALTHCARE SERVICES</li>
                                            <br>

                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/telemedicine" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Telemedicine</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/remote-patient-monitoring-software-development" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Remote Patient Monitoring</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/ehr-emr-phr" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;EMR / EHR / PHR</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/hospital-management" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;HIS & Practice Management</a>
                                            </li>

                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/erx" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;E-prescribing (eRx)</a>
                                            </li>
                                            <!--<li class="crm-box" itemprop="name">
                                                        <a href="https://sisgain.com/hospital-management" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Pharmacy Management</a>
                                                    </li>-->


                                        </ul>
                                    </li>
                                    <li id="service6" class="col-sm-3" style="top:35px;">

                                        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" role="navigation">
                                            <!--<li class="dropdown-header  box-size color-yellow "><img src="image/hire-web.png" alt="check Box">&nbsp;&nbsp;HEALTHCARE SERVICES</li>-->
                                            <br>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/pharmacy" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Pharmacy Management</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/telehealth" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Healthcare / Telehealth</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/hl7" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Interoperability (HL7)</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/rcm" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;RCM & Medical Billing</a>
                                            </li>
                                            <li class="crm-box" itemprop="name">
                                                <a href="https://sisgain.com/veterinary" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Veterinary</a>
                                            </li>
                                            <!--<li class="crm-box" itemprop="name">
                                                        <a href="https://sisgain.com/veterinary" itemprop="url"><img src="image/red-check.png" alt="check Box">&nbsp;&nbsp;Veterinary</a>
                                                    </li>-->

                                        </ul>
                                    </li>

                                    <li id="service7" class="col-sm-6" align="center">
                                        <ul>

                                            <li class="dropdown-header color-blue box-size " id="brands" style="width: 130px;margin-left: 35%;"><img src="image/web.png" alt="check Box">&nbsp;&nbsp;OUR BRANDS</li>
                                            <br>
                                            <div class="row achive-img">
                                                <li class="col-sm-6 col-xs-6 achiveAward"><a href="https://myconnectcenter.com/" target="_blank"><img src="image/virtue.png" class="img-responsive" alt="VirtueMD" width="230"></a></li>
                                                <li class="col-sm-6 col-xs-6 space-img achiveAward1"><a href="https://myconnectcenter.com/" target="_blank"><img src="image/connect.png" class="img-responsive" alt="Connect Center" width="230"></a></li>
                                            </div>




                                            <!--<li><img src="image/hipaa_2.png" class="myimg" alt="Client Engagement Model"></li>-->
                                        </ul>

                                    </li>
                                </ul>
                            </li>
                            <li itemprop="name"><a href="https://sisgain.com/industries" itemprop="url">Industries</a></li>

                            <li class="dos.bis" itemprop="name"><a href="https://sisgain.com/portfolio" itemprop="url">Portfolio</a></li>
                            <li class="dos.bis" itemprop="name"><a href="https://sisgain.com/contact" itemprop="url">Blogs</a></li>

                            <!---end SEO-->

                            <li>
                                <button type="button" class="getaquotes" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return gtag_report_conversion()">
                                    Get a Quote
                                </button>
                            </li>

                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
        </div>

        <!-- header Model For Header -->
        <div class="modal ModelTop" id="exampleModal" tabindex="999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modelContent modelbackgroundColor">
                    <div class="modal-header ModelHeader">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="teleclose();">
                            <span aria-hidden="true" class="modelCloseSpan">&times;</span></button>
                        <h4 class="modelTitle modeltitalFontColor" id="exampleModalLabel">GET A QUOTE</h4>
                    </div>
                    <form method="POST" onsubmit="return checkform1(this);" id="checkformHeaderId" action="thankyou">
                        <input type="text" class="hidden" name="get-a-quote">
                        <div class="modal-body">

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label"> Your Name</label>
                                <input type="text" class="form-control NameInline" name="name" id="firstnameHeader" placeholder="Your Name" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Contact No.</label>
                                <input type="text" class="form-control NameInline" name="phone" onkeypress="javascript:allowNumeric(this,event);" id="ContactNoHeader" placeholder="Contact No" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Email:</label>
                                <input type="email" class="form-control NameInline" name="email" id="EmailidHeader" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" placeholder="Email" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Captcha:</label>
                                <br>
                                <input type="text" name="captchaLabel1" id="CaptchaInput1" placeholder="Captcha" onkeypress="javascript:allowNumeric(this,event);" class="inputboxQuery input1 NameInline captchaInputColor" required>

                                <button type="button" class="modelCaptchaBtn">
                                    <span class="captchaLabel1" id="CaptchaDiv1"></span>
                                </button>

                                <button type="button" class="buttoninline" align="center" onclick="checkform2(this)">
                                    <i class="fa fa-refresh ButtonIconInline" aria-hidden="true"></i>
                                </button>
                                <input type="hidden" id="txtCaptcha1">
                            </div>

                            <div class="col-sm-12 col-xs-12 form-group">
                                <label for="message-text" class="control-label">Message:</label>
                                <textarea class="form-control NameInline" id="messageHeader" name="EnquirymessageHeader" placeholder="Message" required></textarea>
                            </div>
                        </div>

                        <div class="modal-footer modelFooter">
                            <button type="button" class="btn btn-default hidden-xs" data-dismiss="modal">Close</button>
                            <button type="submit" name="enquirymail" class="btn-primary">Send</button>
                        </div>
                    </form>

                </div>
            </div>
            <script type="text/javascript">
                $("#checkformHeaderId").on('submit', function(event) {

                    //event.preventDefault();
                    var why = "";
                    firstname = $("#firstnameHeader").val();
                    ContactNo = $("#ContactNoHeader").val();
                    Emailid = $("#EmailidHeader").val();
                    message = $("#messageHeader").val();
                    CaptchaInput1 = $("#CaptchaInput1").val();

                    if (firstname == "") {
                        why += "- Name is required.\n";
                    }

                    if (ContactNo == "") {
                        why += "- Contact no. is required.\n";
                    }

                    if (Emailid == "") {
                        why += "- Email is required.\n";
                    }

                    if (Emailid != "") {
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                        if (!emailReg.test(Emailid)) {
                            why += "- Invalid Email Id.\n";
                        }
                    }

                    if (message == "") {
                        why += "- Message is required.\n";
                    }

                    if (CaptchaInput1 == "") {
                        why += "- Captcha Code is required.\n";
                    }

                    if (CaptchaInput1 != "") {
                        if (ValidCaptcha1(CaptchaInput1) == false) {
                            why += "- The CAPTCHA Code Does Not Match.\n";
                        }
                    }

                    if (why != "") {
                        alert(why);
                        return false;
                    }
                });

                var a = Math.ceil(Math.random() * 9) + '';
                var b = Math.ceil(Math.random() * 9) + '';
                var c = Math.ceil(Math.random() * 9) + '';
                var d = Math.ceil(Math.random() * 9) + '';
                var e = Math.ceil(Math.random() * 9) + '';

                var code = a + b + c + d + e;
                document.getElementById("txtCaptcha1").value = code;
                document.getElementById("CaptchaDiv1").innerHTML = code;

                // Validate input against the generated number
                function ValidCaptcha1() {
                    var str1 = removeSpaces1(document.getElementById('txtCaptcha1').value);
                    var str2 = removeSpaces1(document.getElementById('CaptchaInput1').value);
                    if (str1 == str2) {
                        return true;
                    } else {
                        return false;
                    }
                }

                // Remove the spaces from the entered and generated code
                function removeSpaces1(string) {
                    return string.split(' ').join('');
                }

                //check numeric number					

                function allowNumeric(element, event) {
                    if ((event.which >= 48 && event.which <= 57) || event.which == 8) {} else {
                        event.preventDefault();
                    }
                }

                //refressh captcha number			
                function checkform2(theform) {
                    var why = "";

                    var a = Math.ceil(Math.random() * 9) + '';
                    var b = Math.ceil(Math.random() * 9) + '';
                    var c = Math.ceil(Math.random() * 9) + '';
                    var d = Math.ceil(Math.random() * 9) + '';
                    var e = Math.ceil(Math.random() * 9) + '';

                    var code = a + b + c + d + e;
                    document.getElementById("txtCaptcha1").value = code;
                    document.getElementById("CaptchaDiv1").innerHTML = code;

                }
            </script>
        </div>

        <!--- Model2 for get a free Quote-->
        <div class="modal ModelTop" id="exampleModal2" tabindex="999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modelContent modelbackgroundColor">
                    <div class="modal-header ModelHeader">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="modelCloseSpan">&times;</span></button>
                        <h4 class="modelTitle modeltitalFontColor" id="exampleModalLabel">GET A QUOTE</h4>
                    </div>
                    <form action="thankyou" method="POST" id="checkformfooterId" onsubmit="return checkform4(this);">
                        <input type="text" class="hidden" name="enquiry-freemail">
                        <div class="modal-body quoteInline">

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Your Name:</label>
                                <input type="text" class="form-control NameInline" name="name" id="firstnamefooter" placeholder="Your Name" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Contact No:</label>
                                <input type="text" class="form-control NameInline" name="phone" onkeypress="javascript:allowNumeric(this,event);" id="ContactNofooter" placeholder="Contact No" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Email:</label>
                                <input type="email" class="form-control NameInline" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" name="email" id="Emailidfooter" placeholder="Email" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Captcha:</label>
                                <br>
                                <input type="text" name="captchaLabel4" id="CaptchaInput4" placeholder="Captcha" class="inputboxQuery input1 NameInline captchaInputColor" onkeypress="javascript:allowNumeric(this,event);" required>

                                <button type="button" class="modelCaptchaBtn">
                                    <span class="captchaLabel4" id="CaptchaDiv4"></span>
                                </button>

                                <button type="button" class="button1inline" align="center" onclick="checkform41(this);">
                                    <i class="fa fa-refresh ButtonIconInline" aria-hidden="true" align="center"></i>
                                </button>

                                <input type="hidden" id="txtCaptcha4">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="message-text" class="control-label">Message:</label>
                                <textarea class="form-control NameInline" id="messagefooter" name="Enquirymessage" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <style>
                            .antispam {
                                display: none;
                            }
                        </style>
                        <p class="antispam">
                            <input type="text" name="url" />
                        </p>

                        <div class="modal-footer modelFooter">
                            <button type="button" class="btn btn-default hidden-xs" data-dismiss="modal">Close</button>
                            <button type="submit" name="enquiryfreemail" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                    <script type="text/javascript">
                        $("#checkformfooterId").on('submit', function(event) {

                            //event.preventDefault();
                            var why = "";
                            firstname = $("#firstnamefooter").val();
                            ContactNo = $("#ContactNofooter").val();
                            Emailid = $("#Emailidfooter").val();
                            message = $("#messagefooter").val();
                            CaptchaInput4 = $("#CaptchaInput4").val();

                            if (firstname == "") {
                                why += "- Name is required.\n";
                            }

                            if (ContactNo == "") {
                                why += "- Contact no. is required.\n";
                            }

                            if (Emailid == "") {
                                why += "- Email is required.\n";
                            }

                            if (Emailid != "") {
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                                if (!emailReg.test(Emailid)) {
                                    why += "- Invalid Email Id.\n";
                                }
                            }

                            if (message == "") {
                                why += "- Message is required.\n";
                            }

                            if (CaptchaInput4 == "") {
                                why += "- Captcha Code is required.\n";
                            }

                            if (CaptchaInput4 != "") {
                                if (ValidCaptchaSlider(CaptchaInput4) == false) {
                                    why += "- The CAPTCHA Code Does Not Match.\n";
                                }
                            }
                            if (why != "") {
                                alert(why);
                                return false;
                            }
                        });

                        var a = Math.ceil(Math.random() * 9) + '';
                        var b = Math.ceil(Math.random() * 9) + '';
                        var c = Math.ceil(Math.random() * 9) + '';
                        var d = Math.ceil(Math.random() * 9) + '';
                        var e = Math.ceil(Math.random() * 9) + '';

                        var code = a + b + c + d + e;
                        document.getElementById("txtCaptcha4").value = code;
                        document.getElementById("CaptchaDiv4").innerHTML = code;

                        // Validate input against the generated number
                        function ValidCaptchaSlider() {
                            var str1 = removeSpaces4(document.getElementById('txtCaptcha4').value);
                            var str2 = removeSpaces4(document.getElementById('CaptchaInput4').value);
                            if (str1 == str2) {
                                return true;
                            } else {
                                return false;
                            }
                        }

                        // Remove the spaces from the entered and generated code
                        function removeSpaces4(string) {
                            return string.split(' ').join('');
                        }

                        function checkform41(theform) {
                            var why = "";
                            var a = Math.ceil(Math.random() * 9) + '';
                            var b = Math.ceil(Math.random() * 9) + '';
                            var c = Math.ceil(Math.random() * 9) + '';
                            var d = Math.ceil(Math.random() * 9) + '';
                            var e = Math.ceil(Math.random() * 9) + '';
                            var code = a + b + c + d + e;
                            document.getElementById("txtCaptcha4").value = code;
                            document.getElementById("CaptchaDiv4").innerHTML = code;
                        }
                    </script>

                </div>
            </div>
        </div>

        <!--- Slider Model  for get a free Quote-->
        <div class="modal ModelTop" id="exampleModalSlider1" tabindex="999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modelContent modelbackgroundColor">
                    <div class="modal-header ModelHeader">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="modelCloseSpan">&times;</span></button>
                        <h4 class="modelTitle modeltitalFontColor" id="exampleModalLabel">GET A QUOTE</h4>
                    </div>
                    <form action="thankyou" method="POST" id="checkformSliderid" onsubmit="return checkformSlider(this);">

                        <input type="text" class="hidden" name="enquiry-Slider">
                        <div class="modal-body quoteInline">

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Your Name:</label>
                                <input type="text" class="form-control NameInline" name="name" id="firstnameSlider" placeholder="Your Name" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Contact No:</label>
                                <input type="text" class="form-control NameInline" name="phone" onkeypress="javascript:allowNumeric(this,event);" id="ContactNoSlider" placeholder="Contact No" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Email:</label>
                                <input type="email" class="form-control NameInline" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$" name="email" id="EmailidSlider" placeholder="Email" required>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="recipient-name" class="control-label">Captcha:</label>
                                <br>
                                <input type="text" name="captchaLabel4" id="CaptchaInputSlider" placeholder="Captcha" class="inputboxQuery input1 NameInline captchaInputColor" onkeypress="javascript:allowNumeric(this,event);" required>

                                <button type="button" class="modelCaptchaBtn">
                                    <span class="captchaLabel4" id="CaptchaDivSlider"></span>
                                </button>

                                <button type="button" class="button1inline" align="center" onclick="checkformSlider1(this);">
                                    <i class="fa fa-refresh ButtonIconInline" aria-hidden="true" align="center"></i>
                                </button>

                                <input type="hidden" id="txtCaptchaSlider">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="message-text" class="control-label">Message:</label>
                                <textarea class="form-control NameInline" id="messageSlider" name="Enquirymessage" placeholder="Message" required></textarea>
                            </div>
                        </div>

                        <div class="modal-footer modelFooter">
                            <button type="button" class="btn btn-default hidden-xs" data-dismiss="modal">Close</button>
                            <button type="submit" name="enquirySlider" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- telemedicine slider-->
        <style>
            .usa_states_telemed h3 {
                font-weight: bold !important;
                margin-top: 50px;
            }

            .usa_states_telemed h5 {

                font-weight: 600 !important;

            }


            .other_countries_telemed ul li a {
                color: #000;
                font-weight: 600;
            }

            .other_countries_telemed h3 {
                margin-top: 80px;
                font-weight: bold !important;
            }

            .slick-dots {
                bottom: -60px !important;
            }

            .other_countries_telemed h5,
            .usa_states_telemed h5 {
                font-size: larger;
                font-size: larger;
            }
        </style>