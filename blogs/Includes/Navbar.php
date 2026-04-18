<script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide the preloader once the content is fully loaded
            setTimeout(function() {
                document.querySelector('.preloader').style.display = 'none';
            }, 500);
        });
    </script>
    <div class="preloader"></div>


<header id="header_section" class="header_section sticky_header d-flex align-items-center clearfix bg-white ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="brand_logo">
                    <a href="https://sisgain.com/" class="brand_link">
                        <img src="../assets/images/logo.webp" loading="lazy" height="50" width="160" alt="SISGAIN">
                        <img src="../assets/images/logo.webp" loading="lazy" height="50" width="160" alt="SISGAIN">
                    </a>
                    <button type="button" class="menu_btn" arial-label="Exapand">
                        <i class="fal fa-bars"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-7">
                <nav class="main_menu ul_li_center clearfix">
                    <ul class="clearfix">
                        <li class="menu_item_has_child">
                            <a href="https://sisgain.com/about-us">About us</a>

                        </li>

                        <li class="menu_item_has_child">
                            <a href="#" id="myDropdown" onclick="myFunction()">Services</a>
                            <div class="mega_menu">
                                <div class="container-fluid">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="menu_list ul_li_block clearfix">
                                                        <h3 class="list_title">Mobile Development</h3>
                                                        <ul class="clearfix">
                                                            <li>
                                                                <a href="https://sisgain.com/react-native-app-development-company"> <img src="../assets/images/icons/react.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="React Native Development"> React
                                                                    Native
                                                                    Development
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="https://sisgain.com/android-application-development"> <img src="../assets/images/icons/android.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Android App Development"> Android App
                                                                    Development
                                                                </a>
                                                            </li>





                                                            <li>
                                                                <a href="https://sisgain.com/ios-app-developement-company"><img src="../assets/images/icons/ios.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="iOS App Development"> iOS App
                                                                    Development
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="https://sisgain.com/ott-app-development-company"><img src="../assets/images/ott/svod.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="OTT App Development"> OTT APP Development
                                                                </a>
                                                            </li>


                                                            <li>
                                                                <a href="https://sisgain.com/flutter-application-development-company"> <img src="../assets/images/icons/flutter.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Flutter Development"> Flutter
                                                                    Development
                                                                </a>
                                                            </li>




                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="menu_list ul_li_block clearfix">
                                                        <h3 class="list_title">Web Development</h3>
                                                        <ul class="clearfix">

                                                            <li>
                                                                <a href="https://sisgain.com/react-js-app-development-company"><img src="../assets/images/icons/react.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="React Js Developer"> React JS
                                                                    Development
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="https://sisgain.com/angular-development-company"><img src="../assets/images/icons/angular.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Angular Js Development"> Angular
                                                                    Development
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="https://sisgain.com/laravel-development"><img src="../assets/images/icons/laravel.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Laravel Development"> Laravel
                                                                    Development
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="https://sisgain.com/node-js-development"><img src="../assets/images/icons/node.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Node Js Development"> Node
                                                                    Development
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="menu_list ul_li_block clearfix">
                                                        <h3 class="list_title">High Demand Technologies</h3>
                                                        <ul class="clearfix">

                                                            <li>
                                                                <a href="https://sisgain.com/apple-watch-development"><img src="../assets/images/icons/watch_icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Apple Watch Development">Apple Watch Development
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="https://sisgain.com/apple-watch-development"> <img src="../assets/images/icons/iot_icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Internet of Things"> Internet of Things
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="https://sisgain.com/big-data-service"> <img src="../assets/images/icons/big-data-icons.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Big Data Services"> Big Data Services
                                                                </a>
                                                            </li>



                                                            <li>
                                                                <a href="https://sisgain.com/cloud-computing"> <img src="../assets/images/icons/cloud-icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Cloud Computing"> Cloud Computing
                                                                </a>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-3">
                                            <img src="../assets/images/company_profile.webp" loading="lazy" width="350" height="350" alt="Our Company Profile - SISGAIN" data-toggle="modal" data-target="#myModal2" style="cursor:pointer; border-radius:8px">
                                        </div>
                                    </div>


                                    <hr class="pt-0 mt-0">
                                    <h5 style="font-weight:600; color:#2490cf; text-align:center" class="pt-3">Unlock Your Vision – Hire Our Developers Today! <a href="#" style="color:#ff6b00; text-decoration:underline; font-weight:normal;" class="ml-4">Hire Now</a></h5>


                                </div>
                            </div>




                        </li>

                        <li class="menu_item_has_child">
                            <a href="#" id="myDropdown" onclick="myFunction()">Healthcare</a>
                            <div class="mega_menu">
                                <div class="container">
                                    <div class="row align-items-center justify-content-center">


                                        <div class="col-lg-4">
                                            <div class="menu_list ul_li_block clearfix">

                                                <ul class="clearfix">

                                                    <li>
                                                        <a href="https://sisgain.com/remote-patient-monitoring-software-development">
                                                            <img src="../assets/images/icons/remote.webp" loading="lazy" width="20" height="20" style="width:20px" alt="rpm"> Remote Patient Monitoring
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://sisgain.com/hospital-management">
                                                            <img src="../assets/images/icons/his.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="his">
                                                            HIS & Practice Management
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://sisgain.com/pharmacy">
                                                            <img src="../assets/images/icons/pharmacy_management_icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt=" Pharmacy Management  Development">
                                                            Pharmacy Management
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://sisgain.com/hl7_icon"><img src="../assets/images/icons/hl7.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt=" Interoperability (HL7) Development">
                                                            Interoperability (HL7)
                                                        </a>
                                                    </li>




                                                    <li>
                                                        <a href="https://sisgain.com/erx"> <img src="../assets/images/icons/erx-icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="E-prescribing (eRx) App Development">
                                                            E-prescribing (eRx)
                                                        </a>
                                                    </li>



                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="menu_list ul_li_block clearfix">

                                                <ul class="clearfix">

                                                    <li>
                                                        <a href="https://sisgain.com/rcm"><img src="../assets/images/icons/medical_billing_icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="RCM & Medical Billing Development">
                                                            RCM & Medical Billing
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://sisgain.com/ehr-emr-phr">
                                                            <img src="../assets/images/icons/emr.webp" loading="lazy" width="20" height="20" style="width:20px" alt="EMR / EHR /
                                                                    PHR"> EMR / EHR /
                                                            PHR</a>
                                                    </li>

                                                    <li>
                                                        <a href="https://sisgain.com/telemedicine">
                                                            <img src="../assets/images/icons/healthcare.webp" loading="lazy" width="20" height="20" style="width:20px" alt="Telemedicine App Development">
                                                            Telemedicine</a>
                                                    </li>
                                                    <li>
                                                        <a href="https://sisgain.com/healthcare"><img src="../assets/images/icons/his.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt=" Healthcare / Telehealth Developer">
                                                            Healthcare
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://sisgain.com/veterinary"><img src="../assets/images/icons/vertinary_icon.webp" loading="lazy" width="20" height="20" style="width: 20px;" alt="Veterinary App Development">
                                                            Veterinary
                                                        </a>
                                                    </li>





                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <h3 class="list_title text-center">Our Brands</h3>
                                            <div class="d-flex">
                                                <a href="https://myconnectcenter.com/" target="blank"><img src="../assets/images/virtuemd.webp" style="width:100%; height:auto" alt="virtueMD" loading="lazy"></a>
                                                <a href="https://myconnectcenter.com/" target="blank" class="ml-3"><img src="../assets/images/connectcenter.webp" style="width:100%; height:auto" alt="connectcenter" loading="lazy"></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>




                        </li>

                        <li class="menu_item_has_child">
                            <a href="https://sisgain.com/industries">Industries</a>

                        </li>
                        <li class="menu_item_has_child">
                            <a href="https://sisgain.com/portfolio">Portfolio</a>

                        </li>
                        <li class="menu_item_has_child">
                            <a href="https://sisgain.com/blogs/">Blogs</a>

                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <a href="#" class="btn bg_default_blue float-right" data-toggle="modal" data-target="#myModal"><img src="../assets/images/icons/calender.svg" loading="lazy" width="20" height="20" alt="Calendar"> Get a Quote</a>
            </div>
        </div>
    </div>
</header>

<div class="sidebar-menu-wrapper">
    <div id="mobile_menu" class="mobile_menu">
        <div class="brand_logo mb-30 clearfix">
            <a href="https://sisgain.com/" class="brand_link">
                <img src="../assets/images/logo.webp" loading="lazy" height="50" width="160" alt="logo">
            </a>
            <span class="close_btn"><i class="fal fa-times"></i></span>
        </div>
        <div class="mobile_menu_dropdown menu_list ul_li_block mp_balancing mb-50 clearfix">
            <ul class="clearfix">
                <li>
                    <a href="about-us">About us</a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mobile Development</a>
                            <ul class="dropdown-menu">
                                <li><a href="https://sisgain.com/react-native-app-development-company">React Native Development</a></li>
                                <li><a href="https://sisgain.com/flutter-application-development-company">Flutter Development</a></li>
                                <li><a href="https://sisgain.com/ios-app-developement-company">Ios Development</a></li>
                                <li>
                                    <a href="https://sisgain.com/ott-app-development-company"> OTT APP Development
                                    </a>
                                </li>
                                <li><a href="https://sisgain.com/android-application-development">Android Development</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Web Development</a>
                            <ul class="dropdown-menu">
                                <li><a href="angular-development-company">Angular Development</a></li>
                                <li><a href="https://sisgain.com/react-js-app-development-company">ReactJs Development</a></li>
                                <li><a href="https://sisgain.com/node-js-development">NodeJs Development</a></li>
                                <li><a href="https://sisgain.com/laravel-development">Laravel Development</a></li>
                            </ul>
                        </li>


                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">High Demand Technologies</a>
                            <ul class="dropdown-menu">
                                <li><a href="https://sisgain.com/apple-watch-development">Apple Watch Development </a></li>
                                <li><a href="https://sisgain.com/internet-of-things">Internet of Things </a></li>
                                <li><a href="https://sisgain.com/big-data-service">Big Data Services</a></li>
                                <li><a href="https://sisgain.com/cloud-computing"> Cloud Computing</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Healthcare</a>
                    <ul class="dropdown-menu">

                        <li><a href="telemedicine">Telemedicine </a></li>
                        <li><a href="https://sisgain.com/ehr-emr-phr">EMR / EHR / PHR </a></li>
                        <li><a href="remote-patient-monitoring-software-development">Remote Patient Monitoring</a></li>
                        <li><a href="https://sisgain.com/hospital-management">HIS & Practice Management</a></li>

                        <li>
                            <a href="https://sisgain.com/erx">
                                E-prescribing (eRx)
                            </a>
                        </li>
                        <li>
                            <a href="https://sisgain.com/pharmacy">
                                Pharmacy Management
                            </a>
                        </li>
                        <li>
                            <a href="https://sisgain.com/healthcare">
                                Healthcare
                            </a>
                        </li>
                        <li>
                            <a href="https://sisgain.com/hl7">
                                Interoperability (HL7)
                            </a>
                        </li>
                        <li>
                            <a href="https://sisgain.com/rcm">
                                RCM & Medical Billing
                            </a>
                        </li>

                        <li>
                            <a href="https://sisgain.com/veterinary">
                                Veterinary
                            </a>
                        </li>


                    </ul>
                </li>


                <li>
                    <a href="industries">Industries</a>

                </li>
                <li>
                    <a href="https://sisgain.com/portfolio"> Portfolio</a>
                </li>
                <li>
                    <a href="../blogs">Blogs</a>

                </li>

            </ul>
        </div>
        <a href="#" class="btn bg_default_blue" data-toggle="modal" data-target="#myModal"> <img src="../assets/images/icons/calender.svg" loading="lazy" height="24" width="24" alt="Calendar">
            Get a Quote</a>
    </div>
    <div class="overlay"></div>
</div>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5SQNMZHN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->