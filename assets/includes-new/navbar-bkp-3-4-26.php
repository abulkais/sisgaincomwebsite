<nav class="nav" id="nav">
    <div class="container">
        <div class="wrapper ">
            <div class="logo"><a href="https://sisgain.com">
                    <img loading="lazy" data-src="https://sisgain.com/assets/images/logo.webp"
                        src="https://sisgain.com/assets/images/logo.webp" width="160" height="50" alt="sisgain logo">
                </a>
            </div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fa fa-times"></i></label>

                <style>
                    /* target your nav link */
                    a.ai_text {
                        position: relative;
                        display: inline-block;
                        line-height: 1;
                        color: transparent;
                        /* keep original text accessible */
                        min-width: 2.6ch;
                        /* reserve space to avoid layout shift */
                        --gif: url("http://sisgain.com/assets/images/home/robot.gif");
                        /* replace with your path */
                        --gif-size: 40px;
                        /* tweak size */
                    }

                    /* animated replacement content */
                    a.ai_text::after {
                        content: "AI";
                        display: inline-block;
                        color: #0b0f19;
                        /* nav text color */
                        font-weight: 500;
                        vertical-align: middle;
                        height: 1.2em;
                        /* gives box height for the GIF state */
                        animation: aiRobotSwap 4s steps(1, end) infinite;
                        /* 2s text + 2s gif */
                    }

                    /* hover/focus: always show the robot GIF */
                    a.ai_text:hover::after,
                    a.ai_text:focus-visible::after {
                        animation: none;
                        /* freeze swap */
                        content: "";
                        width: var(--gif-size);
                        height: var(--gif-size);
                        background: var(--gif) center/contain no-repeat;
                    }

                    /* optional hover color on the text state */
                    a.ai_text:hover::after {
                        color: #0a78be;
                    }

                    /* 0–2s show "AI", 2–4s show GIF, loop */
                    @keyframes aiRobotSwap {

                        0%,
                        49.999% {
                            content: "AI";
                            background: none;
                            width: auto;
                        }

                        50%,
                        100% {
                            content: "";
                            width: var(--gif-size);
                            height: var(--gif-size);
                            background: var(--gif) center/contain no-repeat;
                        }
                    }
                </style>
                <li><a class="desktop_nav ai_text" href="https://sisgain.com/ai-software-development-company"
                        aria-label="AI Software Development Company"></a></li>

                <li>
                    <a class="desktop-item desktop_nav" style="cursor: pointer;">Services <i
                            class="fa fa-angle-down"></i></a>
                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">Services <i class="fa fa-angle-down"></i></label>
                    <div class="mega-box">
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="heading_content"> <a href="https://sisgain.com/mobile-app-development-company">Mobile App Development</a> </div>
                                    <ul class="mega_menu_list">
                                        
                                        <li> <a class="list_item"
                                                href="https://sisgain.com/react-native-app-development-company">React
                                                Native Development </a> </li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/flutter-application-development-company">Flutter
                                                Development </a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/hybrid-app-development-company">Hybrid Mobile
                                                Application</a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/ott-app-development-company">OTT App
                                                Development</a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/travel-app-development-services">Travel
                                                App</a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/ecommerce-app-development-services">E-Commerce
                                                Mobile App</a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/education-app-development">Education App</a>
                                        </li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/mobile-wallet-development">Wallet App</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="heading_content">Software Development</div>
                                    <ul class="mega_menu_list">
                                        <li><a class="list_item" href="https://sisgain.com/pos">Restaurant POS
                                                Software</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/crm-development-company"> CRM
                                                Software </a></li>
                                        <li><a class="list_item" href="https://sisgain.com/erp-development-company">ERP
                                                Software</a></li>
                                        <li><a class="list_item" href="#" data-toggle="modal" data-target="#myModal">Aviation
                                                Software</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/real-estate-software-solutions">Real-Estate
                                                Management Software</a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/logistic-software-development-company">Logistic
                                                Software</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/e-learning">E-Learning
                                                Software</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/blockchain-development-company">Blockchain Development</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mr-0 pr-0">
                                    <div class="heading_content"> <a href="https://sisgain.com/healthcare">Healthcare Software</a> </div>
                                    <ul class="mega_menu_list">

                                        <li><a class="list_item" href="https://sisgain.com/hospital-management">Hospital
                                                Management Software</a></li>
                                        <li><a class="list_item"
                                                href="https://sisgain.com/remote-patient-monitoring">Remote Patient
                                                Monitoring Software</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/telemedicine">Telemedicine
                                                App</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/telehealth">Telehealth
                                                App</a></li>

                                        <li><a class="list_item" href="https://sisgain.com/rcm">RCM & Medical
                                                Billing</a></li>

                                        <li><a class="list_item" href="https://sisgain.com/pharmacy">Pharmacy
                                                Management</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/hl7">Interoperability
                                                (HL7)</a></li>
                                        <li><a class="list_item" href="https://sisgain.com/veterinary">Veterinary
                                                Software</a></li>


                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ml-0 pl-0 cp">
                                    <img class="companyprofile" data-toggle="modal" data-target="#myModal"
                                        loading="lazy" data-src="https://sisgain.com/assets/images/company_profile.webp"
                                        src="https://sisgain.com/assets/images/event-banner.webp" width="351" height="351" alt="Experience the future with sisgain">
                                    <p style=" line-height:25px; margin-top: 10px; margin-bottom: 10px;">
                                        <span style="font-size:17px; font-weight: 600;">Experience the Future with
                                            SISGAIN</span>
                                        <br>
                                        <span style="font-size:16px; "> Pioneering AI-powered
                                            Innovation & Digital Transformation Across Industries.</span>
                                        <br>
                                        <span style="font-size:15px;"> 📍 H10-C70 | Dubai
                                            Harbour | Oct 12-15</span>
                                    </p>

                                </div>



                            </div>
                        </div>
                    </div>
                </li>


                <li><a class="desktop_nav" href="https://sisgain.com/industries">Industries</a></li>
                <li><a class="desktop_nav" href="https://sisgain.com/portfolio">Portfolio</a></li>
                <li><a class="desktop_nav" href="https://sisgain.com/blogs">Blog</a></li>
                <li>
                    <a href="https://wa.me/919212080630?text=Hi, I want to know more about your services."
                        target="blank" aria-label="Contact us on WhatsApp" class="btn-whatsapp-pulse">
                      <img loading="lazy" src="https://sisgain.com/assets/images/WhatsApp.svg.webp" alt="whatsapp icon" >
                    </a>

                </li>
                <li style="cursor:pointer">
                    <a class="navbar_btn" data-toggle="modal" data-target="#myModal" id="getaQuoteID">
                        <img src="https://sisgain.com/assets/images/icons/calender.svg" loading="lazy" width="20"
                            height="20" alt="Calendar"> Get a Quote</a>
                </li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fa fa-bars"></i></label>
        </div>
    </div>
</nav>


<script>
    window.onscroll = function () {
        const nav = document.getElementById("nav");
        if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
            nav.classList.add("sticky");
        } else {
            nav.classList.remove("sticky");
        }
    };
</script>