<?php
include("url-page.php");
?>
<style>
    /* blog section start */
    .blog_reviews_sec {
        padding: 4rem 0;
        background-color: #000;
        /* margin: 4rem 0 0; */
    }

    .blog_reviews_sec h5 {
        font-weight: 600;
        font-size: 2.5rem;
        color: #fff;
        text-align: center;
    }

    .blog_slider-container {
        /* padding-top: 3rem; */
        position: relative;
        width: 90%;
        margin: auto;
        overflow: hidden;
    }

    .blog_slider-track {
        display: flex;
        transition: transform 0.4s ease-in-out;
    }

    .blog_slide {
        min-width: 33.3333333333%;
        box-sizing: border-box;
        padding: 20px;
        background: none;
    }

    .blog_arrow-left,
    .blog_arrow-right {
        height: auto;
        width: 48px;
        border-radius: 50px;
        position: absolute;
        top: 6%;
        transform: translateY(-50%);
        background-color: transparent;
        border: 1px solid #075bd9;
        background-color: #075bd9;
        color: #fff;
        padding: 10px;
        transition: 0.8sease-in-out;
    }

    .blog_arrow-left:hover,
    .blog_arrow-right:hover {
        background-color: transparent;
        color: #fff;
        border: 1px solid #0b79be;
    }

    .blog_arrow-left {
        left: 91%;
    }

    .blog_arrow-right {
        right: 1%;
    }

    .blog_arrow-left i,
    .blog_arrow-right i {
        text-align: center;
        font-size: 1.5rem;
    }

    .blog_card {
        border: 2px solid #343434;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        width: 100%;
        background-color: #171717;
        height: auto;
        padding: 1rem;
        margin: 10px;
        border-radius: 10px;
    }

    .blog_card a:hover {
        text-decoration: none !important;
    }

    .blog_card img {
        border-radius: 10px;
        width: 100%;
        height: 180px;
    }

    .blog_card_a {
        color: #0a78be;
        padding: 0 !important;
    }

    .blog_card .blog_category_box,
    .blog_card span {
        text-align: start;
        color: #f5f5f5;
        cursor: pointer;
        border: 0;
        font-size: 13px;
        font-weight: 600;
        border-radius: 5px;
        padding: 5px 10px;
        background-color: rgba(134, 161, 225, 0.15);
    }

    .blog_card span:hover,
    .blog_card .blog_category_box:hover {
        color: #fff;
        background-color: #0a78be;
    }

    .blog_card h6 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Limit to 4 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 1.1rem;
        line-height: normal;
        color: #fff;
        text-align: start;
        font-weight: 600;
        margin: 14px 0 9px;
    }

    .blog_card p {
        font-size: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: justify;
        color: #fff;
    }

    .countrycode {
        width: 80px !important;
    }

    #selectBudget,
    #countryCode,
    #selectPrefer {
        background-color: #0e0e1c;
    }

    .pleaseWaitBtn {
        background-color: #0a78be7a;
        display: none;
        cursor: not-allowed;
        margin-bottom: 0;
    }

    /* blog section end */
    /* bottom form section start */
    .form_section {
        padding: 4rem 0;
        background-image: url("https://sisgain.ae/assets/images/home/talk-to-us-banner.webp");
        background-position: center left;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .form_section h5 {
        padding-right: 4rem;
        font-weight: 500;
        color: #fff;
        font-size: 3rem;
        line-height: normal;
        margin-bottom: 1rem;
    }

    .form_section p {
        /* padding-right: 3rem; */
        color: #fff;
        margin-bottom: 0;
    }

    .form_section .form_box {
        background: #0e0e1c;
        border: 1px solid #1f1f1f;
        border-radius: 15px;
        padding: 1rem;
    }

    .form_box input,
    .form_box select {
        border-radius: 0;
        border-bottom: 1px solid #fff !important;
        color: #fff;
        border: none;
        background-color: transparent;
        padding: 5px 0;
        margin-bottom: 10px;
        width: 100%;
        height: 46px;

        box-shadow: none;
    }

    .form_box textarea {
        border-radius: 0;
        border-bottom: 1px solid #ececec !important;
        color: #fff;
        border: none;
        background-color: transparent;
        padding: 5px 0;
        /* margin-bottom: 10px; */
        width: 100%;

        box-shadow: none;
    }

    .form_box input::placeholder,
    .form_box select::placeholder,
    .form_box textarea::placeholder {
        color: #ececec !important;
    }

    .form_box input:focus,
    .form_box select:focus,
    .form_box textarea:focus {
        color: #ffff;
        box-shadow: none;
        background: transparent;
    }

    .form_box button {
        color: #fff;
        background-color: #0a78be;
        padding: 10px 1rem;
        border-radius: 5px;
        width: 100%;
        /* font-size: 1.2rem; */
        border: none;
    }

    /* bottom form section end */

    /* footer section start */
    .footer_2nd {
        background-color: #11171e;
        padding: 2rem 0;
    }

    .footer_2nd h6 {
        color: #fff;
        font-size: 1.3rem;
    }

    .footer-sep {
        width: 100%;
        max-width: 60px;
        margin: 15px 0 24px;
        border-bottom: 1px solid #fff;
        display: block;
    }

    .footer_2nd ul {
        padding-left: 0;
        list-style-type: none;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .footer_2nd ul li a {
        color: #fff;
        font-size: 1rem;
        font-weight: normal;
    }

    .footer_2nd ul li a:hover {
        color: orange;
        text-decoration: none;
    }

    .footer_2nd ul li a i {
        color: #fff;
        font-size: 1.3rem;
    }

    /*  */
    .footer_1st {
        background: radial-gradient(22.19% 95.72% at 77.81% 50%,
                #102338 0%,
                #161e29 100%);
        padding: 4rem 0 2rem 0;
    }

    .footer_1st img {
        width: 180px;
        height: auto;
        margin-bottom: 1rem;
    }

    .footer_1st p {
        margin-bottom: 0;
    }

    .footer_1st p {
        color: #fff;
    }

    .flag_loc h6 {
        color: #fff;
        font-size: 1.3rem;
        font-weight: 500;
    }

    .flag_loc p {
        margin-bottom: 0;
    }

    .flag_loc img {
        height: 100px;
        width: 100%;
        max-width: 150px;
        width: 100%;
        -webkit-animation: 1.5s infinite alternate floatingfooter;
        animation: 1.5s infinite alternate floatingfooter;
    }

    @-webkit-keyframes floatingfooter {
        from {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }

        to {
            -webkit-transform: translateY(5px);
            transform: translateY(5px);
        }
    }

    .footer_2nd li {
        display: flex;
    }

    .footer_2nd li span {
        height: 30px;
        width: 35px;
        margin-right: 5px;
        background: #16417dbd;
        color: #ffffff;
        padding: 5px 10px;
        line-height: 22px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0px 20px 50px 0px rgb(0 0 0 / 20%);
    }

    .footer_2nd li span img {
        width: 17px;
        height: auto;
    }

    .footer_2nd li span i {
        text-align: center;
        font-size: 1.1rem !important;
    }

    .footer_2nd li p {
        color: #fff;
    }

    .foot_social_network {
        margin-top: 1rem;
    }

    .foot_social_network a {
        text-decoration: none;
    }

    .foot_social_network a img {
        width: 30px;
        height: 30px;
        object-fit: contain;
    }

    .foot_social_network a:not(:last-child) {
        margin-right: 7px;
    }

    .foot_btm_uper {
        padding: 1rem 0;
        margin-bottom: 2.3rem;
        border-bottom: 1px solid #fff;
    }

    /* footer section end */
    .text-end {
        float: right;
    }

    /* Make the image fully responsive */
    .carousel-inner img {
        width: auto;
        margin: 0 auto;
        display: block;
        height: 350px;
    }

    .modalbg {
        background: transparent linear-gradient(270deg, #33b4ff 0%, #00649e 100%) 0% 0% no-repeat padding-box;
        width: 100%;
        height: 100%;
        padding: 2rem 1.5rem;
    }

    .modalbg h4 {
        color: #fff;
        font-weight: 600;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .modalbg p {
        color: #fff;
        margin-bottom: 2rem;
        text-align: start;
        font-size: 14px;
    }

    #form_modal .close_common {
        background: #016dee;
        color: #fff;
        padding: 10px !important;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        position: relative;
        z-index: 1;
        border: 0;
        margin-top: 0;
        opacity: 1;
    }

    #form_modal .modal-header {
        border: none !important;
        padding: 0px !important;
        top: -8px;
        right: -9px;
        position: absolute;
    }

    .modal_form2 {
        padding: 2rem 1.5rem;
    }

    .modal_form2 .form-group input,
    .modal_form2 .form-group select {
        border-radius: 30px;
        height: 50px;
        background: #f4f3f8;
        box-shadow: none !important;
        border: none;
    }

    .modal_form2 .form-group textarea {
        border-radius: 30px;
        background: #f4f3f8;
        box-shadow: none !important;
        border: none;
        height: auto;
    }

    .modal_form2 button {
        color: #fff;
        background-color: #0a78be;
        padding: 10px 1rem;
        border-radius: 30px;
        width: 100%;
        border: none;
    }

    body {
        overflow-x: hidden;
        /* Prevents horizontal scrolling */
    }

    @media only screen and (max-width: 500px) {
        .blog_card img {
            width: 100%;
            height: auto;
        }

        .blog_card p {

            text-align: start;
            margin-bottom: 1rem;
        }

        html,
        body {
            overflow-x: hidden;
            /* Prevents horizontal scrolling */
        }

        .faq_sec h5,
        .faq_sec h3 {
            font-size: 2rem;
        }

        .blog_reviews_sec {
            padding: 2rem 0;
        }

        .form_section {
            padding: 2rem 0;
            /* margin: 2rem 0; */
        }

        .form_section h5 {
            font-size: 2rem;
            padding: 0;
        }

        .form_section p {
            margin-bottom: 1rem;
        }

        .blog_reviews_sec h5 {
            font-size: 2rem;
        }

        .blog_slide {
            padding: 0px 10px;
            min-width: 100%;
        }

        .blog_slider-track {
            padding-bottom: 3rem;
        }

        .blog_arrow-left,
        .blog_arrow-right {
            z-index: 1000 !important;
            top: 95% !important;
        }

        .blog_arrow-left {
            left: 100px;
        }

        .blog_arrow-right {
            right: 100px;
        }

        .footer_1st {
            padding: 2rem 0;
        }

        .footer_2nd {
            padding-bottom: 1rem;
        }

        .flag_loc img {
            margin-top: 2rem;
        }

        .text-end {
            float: left;
        }

        .modal_bg {
            display: none !important;
        }

        .g-recaptcha {
            transform: scale(0.8);
            transform-origin: 0 0;
        }

        .modalbg {
            display: none !important;
        }
    }
</style>
<section class="form_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h5>Our Technology Experts are Change Catalysts</h5>
                <p>Book a Free Consultation Call with Our Experts Today</p>
            </div>
            <div class="col-lg-6">
                <div class="form_box">
                    <form action="webMailer" method="post" onsubmit="return modalformnnq();">
                        <input type="hidden" name="preventfromrobo">
                        <input type="hidden" name="comingfrom" value="<?php echo $data ?>">

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name*" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email*" autocomplete="off" required>
                        </div>

                        <div class="form-group d-flex">
                            <select name="countrycode" class="countrycode" id="countryCode"></select>
                            <input type="tel" class="form-control" name="number" placeholder="Contact Number*" minlength="10" maxlength="10" autocomplete="off" required>
                        </div>


                        <div class="form-group">
                            <select id="selectBudget" class="form-control" name="budget" aria-label="Budget" autocomplete="off" required>
                                <option value="">Budget</option>
                                <option value="Below AED 30K">Below AED 30K</option>
                                <option value="AED 30K - AED 50K">AED 30K - AED 50K</option>
                                <option value="AED 50K - AED 100K">AED 50K - AED 100K</option>
                                <option value="AED 100K and more">AED 100K and more</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="prefer" aria-label="I prefer to" id="selectPrefer" autocomplete="off" required>
                                <option value="">I prefer to*</option>

                                <option value="Healthcare Solutions">Healthcare Solutions</option>
                                <option value="Telehealth/RPM Solutions">Telehealth/RPM Solutions</option>
                                <option value="POS Software Solutions - SaleSpot">POS Software Solutions - SaleSpot</option>
                                <option value="OTT Solutions">OTT Solutions</option>
                                <option value="Fitness Solutions">Fitness Solutions</option>
                                <option value="Other Web & Mobile App Development">Other Web & Mobile App
                                    Development</option>
                                <option value="Team Extension">Team Extension</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="2" name="query" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <div id="captcha" class="g-recaptcha" data-sitekey="6LeaMZspAAAAAOn6uJBw3j8TKSXFnfwtslQOwycH" data-callback="verifyCaptcha">
                            </div>
                            <p class="captchamandatoryfooter"></p>
                        </div>
                        <button type="submit" class="buttonhide" name="contactForm">Submit</button>
                        <button class="buttonshow pleaseWaitBtn" disabled>Please Wait</button>
                    </form>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let options = document.getElementById("preferOption2").options;
                            for (let option of options) {
                                if (option.value.includes("SaleSpot")) {
                                    // Replace "SaleSpot" with a bold Unicode version
                                    option.text = "POS Software Solutions - 𝗦𝗮𝗹𝗲𝗦𝗽𝗼𝘁";
                                }
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog_reviews_sec">

    <div class="blog_slider-container">
        <h5>Latest Blogs</h5>
        <div class="blog_slider-track">
            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/in-2025-make-your-business-mobile-ready-by-building-an-android-app" class="blog_card_a">
                        <img loading="lazy" src="https://sisgain.com/blogs/blogBackend/uploads/1734168312361-android-app-blog-banner.webp" height="170" width="370" alt="sisgain blog1">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">Android App</span>
                            <h6>In 2025, Make Your Business Mobile-Ready by Building an Android App </h6>
                            <p>In today's fast-paced digital world, having a mobile presence is crucial for any business looking to stay competitive and connect with customers. With the ever-growing popularity of smartphones, developing a mobile app is an effective way to reach a wider audience and enhance the user experience.</p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Rahul </span>
                                <span><i class="fa fa-calendar"></i> Dec, 14 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/how-can-hospital-information-systems-improve-patient-care" class="blog_card_a">
                        <img loading="lazy" src="https://sisgain.com/blogs/blogBackend/uploads/1732967784855-hospital-information-systems-blog-banner%20(1).jpg" height="170" width="370" alt="sisgain blog1">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">HIS Software</span>
                            <h6>How Can Hospital Information Systems Improve Patient Care? </h6>
                            <p>Hospitals need to provide the best care possible for their patients. To do this, doctors and nurses need the right tools and information. Hospital Information System (HIS) are like powerful tools that help hospitals work more efficiently. These systems use technology to make it easier for hospitals to manage their operations, make better decisions about patient care, and ultimately improve patient outcomes.</p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Layla </span>
                                <span><i class="fa fa-calendar"></i> Nov, 30 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/the-evolution-of-emr-systems-from-paper-to-digital-records" class="blog_card_a">
                        <img loading="lazy" src="https://sisgain.com/blogs/blogBackend/uploads/1732956102551-emr_system_blog.webp" height="170" width="370" alt="sisgain blog1">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">EMR Software</span>
                            <h6>The Evolution of EMR Systems: From Paper to Digital Records</h6>
                            <p>The days are gone when our medical records were stored in paper files. Today, EMR software has become prevalent in almost all medical institutions. Doctors in large hospitals and small clinics make use of medical electronic record systems to store medical information about their patients. EHR software and EMR software have become an indispensable part of medical services and are helping medical professionals easily manage patient records.</p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Suleman </span>
                                <span><i class="fa fa-calendar"></i> Nov, 30 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/next-gen-custom-healthcare-software-development-in-2025" class="blog_card_a">
                        <img loading="lazy" data-src="https://sisgain.com/blogs/blogBackend/uploads/1732955870181-next_genration_healthcare.webp" src="https://sisgain.com/blogs/blogBackend/uploads/1732955870181-next_genration_healthcare.webp" height="170" width="370" alt="sisgain blog1">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">Healthcare Software</span>
                            <h6>Next-Gen Custom Healthcare Software Development in 2025</h6>
                            <p>As we step into 2025, exciting developments and innovations await the healthcare sector. Post-COVID, we have already witnessed the rapid adoption of digital solutions by healthcare organisations and patients. 85% of clinicians in India used teleconsultation platforms during the pandemic. Since then, the digital health industry has come a long way.</p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Rahul </span>
                                <span><i class="fa fa-calendar"></i> Nov, 29 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/which-is-the-best-telemedicine-app-development-company-in-india-for-healthcare-industries" class="blog_card_a">
                        <img loading="lazy" data-src="https://sisgain.com/blogs/blogBackend/uploads/1732952909434-best_telemed_app.webp" src="https://sisgain.com/blogs/blogBackend/uploads/1732952909434-best_telemed_app.webp" height="170" width="370" alt="sisgain blog1">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">Telemedicine Software</span>
                            <h6>RWhich Is The Best Telemedicine App Development Company In India For Healthcare Industries?</h6>
                            <p>Telehealth and telemedicine are not foreign words anymore. We are continuously witnessing an increase in the use of telemedicine software in Indian hospitals. The Indian telemedicine market was valued at USD 33 million in 2020 and is expected to reach USD 506 million by 2025, growing at a CAGR of 31.24%. </p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Rahul</span>
                                <span><i class="fa fa-calendar"></i> Nov, 26 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/build-essential-mobile-app-development-skills-for-your-career-development" class="blog_card_a">
                        <img loading="lazy" data-src="https://sisgain.com/blogs/blogBackend/uploads/1732947856612-app_development_skills.webp" src="https://sisgain.com/blogs/blogBackend/uploads/1732947856612-app_development_skills.webp" height="170" width="370" alt="sisgain blog2">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">Mobile App</span>
                            <h6>Build Essential Mobile App Development Skills for Your Career Development</h6>
                            <p>Are you a mobile app developer or planning to become one? If you also want to work in this fascinating and adventurous field, then you must first have the right skills. What skills do I need to work for a mobile app development company, you might ask? Well, the list is long. As a mobile app developer, you must continuously work on your skills to stay updated with the latest trends in mobile app development.</p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Suleman</span>
                                <span><i class="fa fa-calendar"></i> Nov, 24 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="blog_slide">
                <div class="blog_card">
                    <a href="https://sisgain.com/blogs/complete-guide-to-gaming-app-development-cost-time-and-process-in-usa" class="blog_card_a">
                        <img loading="lazy" data-src="https://sisgain.com/blogs/blogBackend/uploads/1732946933468-game_app_development.webp" src="https://sisgain.com/blogs/blogBackend/uploads/1732946933468-game_app_development.webp" height="170" width="370" alt="sisgain blog3">
                        <div style="padding: 1rem 0 0 0;">
                            <span class="blog_category_box">Game</span>
                            <h6>Complete Guide To Gaming App Development Cost, Time and Process in USA</h6>
                            <p>It won't be wrong to say that today, the four basics of life are food, shelter, clothes, and gaming apps. The craze for mobile games is immeasurable. You can find children glued to their screens playing PUBG, Minecraft, Free Fire, Clash of Clans or the ever-ending Candy Crush. These games are undoubtedly addictive.</p>
                            <p style="display: flex; justify-content: space-between; margin-bottom:0">
                                <span><i class="fa fa-user-o"></i> Suleman </span>
                                <span><i class="fa fa-calendar"></i> Nov, 21 2024</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>



        </div>
        <button class="blog_arrow blog_arrow-left" aria-label="left arrow"><i class="fa fa-angle-left"></i></button>
        <button class="blog_arrow blog_arrow-right" aria-label="right arrow"><i class="fa fa-angle-right"></i></button>
    </div>
</section>
<footer>
    <div class="footer_1st">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <img loading="lazy" data-src="https://sisgain.ae/assets/images/home/white-logo.webp" src="https://sisgain.ae/assets/images/home/white-logo.webp" width="180" height="45" alt="sisgain logo">
                    <p>As a leading IT services and solutions firm in UAE, we provide scalable Digital Transformation to Startups, SMBs, and enterprises worldwide. We're dedicated to assisting...</p>
                </div>
                <div class="col-lg-3">
                    <div class="flag_loc">
                        <img loading="lazy" data-src="assets/images/home/hq-uae.svg" src="https://sisgain.ae/assets/images/home/hq-uae.svg" width="150" height="100" alt="UAE-address">
                        <h6>Dubai - UAE</h6>
                        <p> DUQE FREEZONE Quarter Deck, Queen Elizabeth 2, Mina Rashid, Dubai, UAE</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="flag_loc">
                        <img loading="lazy" data-src="https://sisgain.ae/assets/images/home/canadaAddress.svg" src="https://sisgain.ae/assets/images/home/canadaAddress.svg" width="150" height="100" alt="Canada-address">
                        <h6> Canada</h6>
                        <p> 100 Consilium Pl Suite 200, Scarborough, ON M1H 3E3, Canada
                        </p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="flag_loc">
                        <img loading="lazy" data-src="https://sisgain.ae/assets/images/home/hq-india.svg" src="https://sisgain.ae/assets/images/home/hq-india.svg" width="150" height="100" alt="India-address">
                        <h6>Noida - India</h6>
                        <p> C-109, Sector 2, Noida, Uttar Pradesh 201301 India</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer_2nd">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h6>Company
                        <span class="footer-sep"></span>
                    </h6>

                    <ul>
                        <li><a href="" data-toggle="modal" data-target="#form_modal">Free Quote</a></li>


                        <li><a href="https://sisgain.com/about">Who We Are</a></li>
                        <li><a href="" data-toggle="modal" data-target="#form_modal">Career</a></li>
                        <li><a href="https://sisgain.com/contact">Contact Us</a></li>
                        <li><a href="" data-toggle="modal" data-target="#form_modal">Case Study</a></li>
                        <li><a href="https://sisgain.com/blogs">Blogs</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6>Development Services
                        <span class="footer-sep"></span>
                    </h6>
                    <ul>
                        <li><a href="https://sisgain.com/mobile-app-development-company">Mobile App Development </a></li>
                        <li><a href="https://sisgain.ae/web-development">Web Development </a></li>
                        <li><a href="https://sisgain.ae/software-development">Software Development</a></li>
                        <li><a href="https://sisgain.com/ios-app-developement-company">iOS App Development</a></li>
                        <li><a href="https://sisgain.com/android-application-development">Android App Development</a></li>
                        <li><a href="https://sisgain.com/react-native-app-development-company">Native App Development</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6>Our Specialization
                        <span class="footer-sep"></span>
                    </h6>
                    <ul>
                        <li> <a href="https://sisgain.com/hospital-management">Hospital Management
                                System</a></li>
                        <li> <a href="https://sisgain.com/telemedicine">Telemedicine App Development</a></li>
                        <li> <a href="https://sisgain.com/remote-patient-monitoring-software-development">Remote Patient
                                Monitoring </a></li>
                        <li> <a href="https://sisgain.com/pos">Restaurant POS Systems</a></li>
                        <li> <a href="https://sisgain.com/fitness-club-management">Fitness App
                                Development</a></li>
                        <li> <a href="https://sisgain.com/ott-app-development">OTT App Development</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6>Contact Us
                        <span class="footer-sep"></span>
                    </h6>
                    <ul>
                        <li><span><i class="fa fa-envelope"></i></span><a href=""> hello@sisgain.com </a></li>
                        <li>
                            <span><img loading="lazy" data-src="https://sisgain.ae/assets/images/home/india.webp" src="https://sisgain.ae/assets/images/home/india.webp" width="18" height="10" alt="dubai flag"></span>
                            <a href="tel:+919212080630">+91 921-208-0630</a>
                        </li>

                        <li> <span><i class="fa fa-map-marker fa-lg"></i></span>
                            <p>C-109, Sector 2, Noida, Uttar Pradesh 201301 India </p>
                        </li>
                    </ul>

                    <h6>Follow Us on
                        <span class="footer-sep" style="margin: 5px 0px 10px;"></span>
                    </h6>
                    <div class="foot_social_network">


                        <a href="https://www.facebook.com/SISGAIN" target="_blank">
                            <img loading="lazy" data-src="assets/images/home/at_facebook.svg" src="https://sisgain.ae/assets/images/home/at_facebook.svg" width="30" height="30" alt="Facebook Icon">
                        </a>
                        <a href="https://twitter.com/spectrum1995" target="_blank">
                            <img loading="lazy" data-src="assets/images/home/at_twitter.svg" src="https://sisgain.ae/assets/images/home/at_twitter.svg" width="30" height="30" alt="Twitter Icon">
                        </a>
                        <a href="https://www.linkedin.com/company/sisgain/" target="_blank">
                            <img loading="lazy" data-src="assets/images/home/at_linkedin.svg" src="https://sisgain.ae/assets/images/home/at_linkedin.svg" width="30" height="30" alt="LinkedIn Icon">
                        </a>

                        <a href="https://www.instagram.com/sisgainofficial" target="_blank">
                            <img loading="lazy" data-src="assets/images/home/at_instagram.svg" src="https://sisgain.ae/assets/images/home/at_instagram.svg" width="30" height="30" alt="Instagram Icon">
                        </a>
                        <a href="https://www.youtube.com/@SISGAIN" target="_blank">
                            <img loading="lazy" data-src="assets/images/home/at_youtube.svg" src="https://sisgain.ae/assets/images/home/at_youtube.svg" width="30" height="30" alt="YouTube Icon">
                        </a>


                    </div>
                </div>
            </div>

            <div class="foot_btm_uper"> </div>

            <div class="row justify-content-between">
                <div class="col-lg-6 text-white">
                    <p class="my-0">©
                        2025 <a class="text-white" href="https://sisgain.com/">SISGAIN</a> | All rights
                        reserved
                    </p>
                </div>
                <div class="col-lg-6 text-white">
                    <p class="mr-0 text-end">
                        <a href="https://sisgain.com/terms-condition" class="text-white">Term & Condition</a> • <a href="https://sisgain.com/privacy-policy" class="text-white">Privacy
                            Policy
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="modal fade show" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight:600">Get A Free Quote Now!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">✖</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body contact__sec">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <img loading="lazy" class="lazyload" src="assets/images/modal-img.webp" height="305" width="296" alt="Application Development Company - SISGAIN">
                    </div>
                    <div class="col-lg-7">

                        <form action="mail" method="POST" onsubmit="return modalformnnq();">
                            <input type="hidden" name="preventfromrobo">
                            <input type="hidden" name="comingfrom" value="<?php echo $data ?>">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name*" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email*" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div style="display: flex;">
                                            <select style="width:80px; padding: 0; margin: 0; background:#fff;" class="countrycode" name="countrycode" autocomplete="off" aria-label="Country Code"></select>
                                            <input type="tel" class="form-control" name="number" placeholder="Phone*" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">

                                        <select class="form-control" name="budget" aria-label="Budget" autocomplete="off" required="">
                                            <option value="">Budget</option>
                                            <option value="Below $10K">Below $10K</option>
                                            <option value="$10K - $25K">$10K - $25K</option>
                                            <option value="$25K - $50K">$25K - $50K</option>
                                            <option value="$50K - 100K">$50K - 100K</option>
                                            <option value="$100K and more">$100K and more</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <select class="form-control" name="prefer" aria-label="I prefer to" required="">
                                            <option value="">I prefer to</option>
                                            <option value="App development">App development</option>
                                            <option value="Web development">Web development</option>
                                            <option value="Software development">Software development</option>
                                            <option value="Team extension">Team extension</option>
                                            <option value="DevOps">DevOps</option>
                                            <option value="Product engineering">Product engineering</option>
                                            <option value="IoT">IoT</option>
                                            <option value="Digital Transformation">Digital Transformation</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="1" name="message" placeholder="Message" required=""></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <center>
                                        <div id="captha" class="g-recaptcha" data-sitekey="6LeaMZspAAAAAOn6uJBw3j8TKSXFnfwtslQOwycH" data-callback="verifyCaptcha" style="width:100%">
                                        </div>
                                    </center>
                                    <p class="captchamandatoryfooter"></p>
                                </div>
                            </div>
                            <button type="submit" name="form_submit" class="btn bg_default_blue  w-100 buttonhide ">Submit</button>
                            <button type="button" class="btn bg_default_blue  w-100 pleaseWaitBtn buttonshow" disabled style="cursor:not-allowed"> <i class="spinner-border spinner-border-sm"></i> Please Wait</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const countryCodes = [{
            code: '+91',
            name: 'IN'
        },
        {
            code: '+971',
            name: 'AE'
        },
        {
            code: '+1',
            name: 'US'
        }, {
            code: '+20',
            name: 'EG'
        }, {
            code: '+212',
            name: 'MA'
        }, {
            code: '+213',
            name: 'DZ'
        }, {
            code: '+216',
            name: 'TN'
        }, {
            code: '+218',
            name: 'LY'
        }, {
            code: '+220',
            name: 'GM'
        }, {
            code: '+221',
            name: 'SN'
        }, {
            code: '+222',
            name: 'MR'
        }, {
            code: '+223',
            name: 'ML'
        }, {
            code: '+224',
            name: 'GN'
        }, {
            code: '+225',
            name: 'CI'
        }, {
            code: '+226',
            name: 'BF'
        }, {
            code: '+227',
            name: 'NE'
        }, {
            code: '+228',
            name: 'TG'
        }, {
            code: '+229',
            name: 'BJ'
        }, {
            code: '+230',
            name: 'MU'
        }, {
            code: '+231',
            name: 'LR'
        }, {
            code: '+232',
            name: 'SL'
        }, {
            code: '+233',
            name: 'GH'
        }, {
            code: '+234',
            name: 'NG'
        }, {
            code: '+235',
            name: 'TD'
        }, {
            code: '+236',
            name: 'CF'
        }, {
            code: '+237',
            name: 'CM'
        }, {
            code: '+238',
            name: 'CV'
        }, {
            code: '+239',
            name: 'ST'
        }, {
            code: '+240',
            name: 'GQ'
        }, {
            code: '+241',
            name: 'GA'
        }, {
            code: '+242',
            name: 'CG'
        }, {
            code: '+243',
            name: 'CD'
        }, {
            code: '+244',
            name: 'AO'
        }, {
            code: '+245',
            name: 'GW'
        }, {
            code: '+246',
            name: 'IO'
        }, {
            code: '+248',
            name: 'SC'
        }, {
            code: '+249',
            name: 'SD'
        }, {
            code: '+250',
            name: 'RW'
        }, {
            code: '+251',
            name: 'ET'
        }, {
            code: '+252',
            name: 'SO'
        }, {
            code: '+253',
            name: 'DJ'
        }, {
            code: '+254',
            name: 'KE'
        }, {
            code: '+255',
            name: 'TZ'
        }, {
            code: '+256',
            name: 'UG'
        }, {
            code: '+257',
            name: 'BI'
        }, {
            code: '+258',
            name: 'MZ'
        }, {
            code: '+260',
            name: 'ZM'
        }, {
            code: '+261',
            name: 'MG'
        }, {
            code: '+262',
            name: 'RE/TF'
        }, {
            code: '+263',
            name: 'ZW'
        }, {
            code: '+264',
            name: 'NA'
        }, {
            code: '+265',
            name: 'MW'
        }, {
            code: '+266',
            name: 'LS'
        }, {
            code: '+267',
            name: 'BW'
        }, {
            code: '+268',
            name: 'SZ'
        }, {
            code: '+269',
            name: 'KM'
        }, {
            code: '+27',
            name: 'ZA'
        }, {
            code: '+290',
            name: 'SH'
        }, {
            code: '+291',
            name: 'ER'
        }, {
            code: '+297',
            name: 'AW'
        }, {
            code: '+298',
            name: 'FO'
        }, {
            code: '+299',
            name: 'GL'
        }, {
            code: '+30',
            name: 'GR'
        }, {
            code: '+31',
            name: 'NL'
        }, {
            code: '+32',
            name: 'BE'
        }, {
            code: '+33',
            name: 'FR'
        }, {
            code: '+34',
            name: 'ES'
        }, {
            code: '+36',
            name: 'HU'
        }, {
            code: '+39',
            name: 'IT'
        }, {
            code: '+40',
            name: 'RO'
        }, {
            code: '+41',
            name: 'CH'
        }, {
            code: '+43',
            name: 'AT'
        }, {
            code: '+44',
            name: 'GB'
        }, {
            code: '+45',
            name: 'DK'
        }, {
            code: '+46',
            name: 'SE'
        }, {
            code: '+47',
            name: 'NO'
        }, {
            code: '+48',
            name: 'PL'
        }, {
            code: '+49',
            name: 'DE'
        }, {
            code: '+51',
            name: 'PE'
        }, {
            code: '+52',
            name: 'MX'
        }, {
            code: '+53',
            name: 'CU'
        }, {
            code: '+54',
            name: 'AR'
        }, {
            code: '+55',
            name: 'BR'
        }, {
            code: '+56',
            name: 'CL'
        }, {
            code: '+57',
            name: 'CO'
        }, {
            code: '+58',
            name: 'VE'
        }, {
            code: '+60',
            name: 'MY'
        }, {
            code: '+61',
            name: 'AU'
        }, {
            code: '+62',
            name: 'ID'
        }, {
            code: '+63',
            name: 'PH'
        }, {
            code: '+64',
            name: 'NZ'
        }, {
            code: '+65',
            name: 'SG'
        }, {
            code: '+66',
            name: 'TH'
        }, {
            code: '+81',
            name: 'JP'
        }, {
            code: '+82',
            name: 'KR'
        }, {
            code: '+84',
            name: 'VN'
        }, {
            code: '+86',
            name: 'CN'
        }, {
            code: '+90',
            name: 'TR'
        }, {
            code: '+92',
            name: 'PK'
        }, {
            code: '+93',
            name: 'AF'
        }, {
            code: '+94',
            name: 'LK'
        }, {
            code: '+95',
            name: 'MM'
        }, {
            code: '+98',
            name: 'IR'
        }, {
            code: '+211',
            name: 'SS'
        }, {
            code: '+377',
            name: 'MC'
        }, {
            code: '+378',
            name: 'SM'
        }, {
            code: '+380',
            name: 'UA'
        }, {
            code: '+381',
            name: 'RS'
        }, {
            code: '+382',
            name: 'ME'
        }, {
            code: '+383',
            name: 'XK'
        }, {
            code: '+385',
            name: 'HR'
        }, {
            code: '+386',
            name: 'SI'
        }, {
            code: '+387',
            name: 'BA'
        }, {
            code: '+389',
            name: 'MK'
        }, {
            code: '+420',
            name: 'CZ'
        }, {
            code: '+421',
            name: 'SK'
        }, {
            code: '+423',
            name: 'LI'
        },
        // Add more codes as necessary
    ];
    // Select all elements with the class "countrycode"
    const selectElements = document.querySelectorAll('.countrycode');

    // Loop through each select element and populate it with the country codes
    selectElements.forEach(selectElement => {
        countryCodes.forEach(country => {
            const option = new Option(`${country.name} (${country.code})`, country.code);
            selectElement.add(option);
        });
        selectElement.value = '+91';
    });
</script>
<!-- blog slider  -->
<script>
    const blogSliderTrack = document.querySelector('.blog_slider-track');
    const blogSlides = document.querySelectorAll('.blog_slide');
    const blogBtnLeft = document.querySelector('.blog_arrow-left');
    const blogBtnRight = document.querySelector('.blog_arrow-right');

    let blogIndex = 0;
    let blogSlidesToShow = 3; // Default number of visible slides
    let blogTotalSlides = blogSlides.length - blogSlidesToShow;

    function updateBlogSlidesToShow() {
        if (window.innerWidth <= 768) { // Mobile view threshold (768px or less)
            blogSlidesToShow = 1;
        } else {
            blogSlidesToShow = 3;
        }
        blogTotalSlides = blogSlides.length - blogSlidesToShow;
        moveBlogSlide(blogIndex); // Adjust the position when the number of visible slides changes
    }

    function moveBlogSlide(index) {
        blogSliderTrack.style.transform = `translateX(-${index * 100 / blogSlidesToShow}%)`;
    }

    blogBtnRight.addEventListener('click', () => {
        blogIndex = Math.min(blogIndex + 1, blogTotalSlides); // Don't go beyond the last slide
        moveBlogSlide(blogIndex);
    });

    blogBtnLeft.addEventListener('click', () => {
        blogIndex = Math.max(blogIndex - 1, 0); // Don't go before the first slide
        moveBlogSlide(blogIndex);
    });

    // Auto-slide functionality
    let blogAutoSlideInterval;

    function startBlogAutoSlide() {
        blogAutoSlideInterval = setInterval(() => {
            if (blogIndex < blogTotalSlides) {
                blogBtnRight.click(); // Move to the next slide
            } else {
                blogIndex = 0; // Reset to the first slide
                moveBlogSlide(blogIndex);
            }
        }, 10000); // Slide every 3 seconds
    }

    function stopBlogAutoSlide() {
        clearInterval(blogAutoSlideInterval);
    }

    // Start auto-slide on load
    startBlogAutoSlide();

    // Pause on hover, resume on mouse leave
    blogSlides.forEach(slide => {
        slide.addEventListener('mouseenter', stopBlogAutoSlide);
        slide.addEventListener('mouseleave', startBlogAutoSlide);
    });

    // Update the number of visible slides on load and resize
    updateBlogSlidesToShow();
    window.addEventListener('resize', updateBlogSlidesToShow);
</script>
<!-- blog slider end -->