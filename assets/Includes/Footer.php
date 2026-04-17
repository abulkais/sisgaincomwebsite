<?php
include("url-page.php");
?>


<script>
    var multipleCardCarousel = document.querySelector("#carouselExampleControls");

function handleScroll() {
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
    var cardWidth = $(".carousel-item").width();ind
    var scrollPosition = 0;

    // Desktop view (>= 576px)
    if (window.matchMedia("(min-width: 576px)").matches) {
        var carousel = new bootstrap.Carousel(multipleCardCarousel, {
            interval: false // Disable auto-sliding for manual control
        });

        // Next button functionality for desktop
        $("#carouselExampleControls .carousel-control-next").on("click", function () {
            scrollPosition += cardWidth;

            if (scrollPosition >= carouselWidth - cardWidth * 1) {
                // Reset to the start to create a loop effect
                scrollPosition = 0;
            }
            $("#carouselExampleControls .carousel-inner").animate({
                scrollLeft: scrollPosition
            }, 600);
        });

        // Previous button functionality for desktop
        $("#carouselExampleControls .carousel-control-prev").on("click", function () {
            scrollPosition -= cardWidth;

            if (scrollPosition < 0) {
                // Reset to the end to create a loop effect
                scrollPosition = carouselWidth - cardWidth * 3;
            }
            $("#carouselExampleControls .carousel-inner").animate({
                scrollLeft: scrollPosition
            }, 600);
        });
        
    } else {
        // For mobile, add the 'slide' class for Bootstrap's sliding behavior
        $(multipleCardCarousel).addClass("slide");

        // Remove custom scroll animation and use Bootstrap's native slide effect
        var carousel = new bootstrap.Carousel(multipleCardCarousel, {
            interval: false // Disable auto-sliding for manual control
        });
    }
}

// Call the function on page load
handleScroll();

// Recheck on window resize to handle screen resizing
window.addEventListener('resize', function () {
    handleScroll();
});

</script>


    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6">

                    <h1 class="cta-title">
                        Ready to Build Your<br>
                        <span>Next Mobile App?</span>
                    </h1>

                    <p class="cta-desc">
                        Let's turn your idea into a high-performing mobile application. Get a free consultation with our senior mobile app architects — no obligations, no sales pressure.
                    </p>

                    <ul class="cta-list">
                        <li>Free 60-minute strategy consultation</li>
                        <li>Detailed project cost estimate within 48 hours</li>
                        <li>NDA signed before any discussion begins</li>
                        <li>Direct access to senior developers from day one</li>
                        <li>Fixed-price or dedicated team engagement models</li>
                        <li>3-month post-launch support included</li>
                    </ul>

                    <!-- 🔥 CONTACT BLOCK -->
                    <div class="contact-wrapper">

                        <!-- SALES -->
                        <div class="contact-box">
                            <div class="contact_team">Sales Team</div>

                            <a class="contact_team_phone_email" href="mailto:hello@sisgain.com">
                                <img loading="lazy" src="https://sisgain.com/assets/images/home/email.webp">
                                hello@sisgain.com
                            </a>

                            <a class="contact_team_phone_email" href="tel:+18444455767">
                                <img loading="lazy" src="https://sisgain.com/assets/images/icons/usa_flag.webp">
                                +1 844-445-5767
                            </a>

                            <a class="contact_team_phone_email" href="tel:+971568485757">
                                <img loading="lazy" src="https://sisgain.com/assets/images/icons/uae_flag.webp">
                                +971 56-848-5757
                            </a>

                            <a class="contact_team_phone_email" href="tel:+919212080630">
                                <img loading="lazy" src="https://sisgain.com/assets/images/icons/india_flag.webp">
                                +91 921-208-0630
                            </a>
                        </div>

                        <!-- HR -->
                        <div class="contact-box">
                            <div class="contact_team">HR & Talent</div>

                            <a class="contact_team_phone_email" href="mailto:hr@sisgain.com">
                                <img loading="lazy" src="https://sisgain.com/assets/images/home/email.webp">
                                hr@sisgain.com
                            </a>

                            <a class="contact_team_phone_email" href="tel:+918744888528">
                                <img loading="lazy" src="https://sisgain.com/assets/images/icons/india_flag.webp">
                                +91 8744-888-528
                            </a>
                        </div>

                    </div>

                </div>

                <!-- RIGHT FORM -->
                <div class="col-lg-6">
                    <div class="form-card">

                        <h3>Start Your Project</h3>
                        <p>Get a free consultation and cost estimate for your mobile app</p>


                        <form action="mail" method="POST" onsubmit="return footerform();" class="custom-form">
                            <input type="hidden" name="preventfromrobo">
                            <input type="hidden" name="comingfrom" value="<?php echo $data ?>">
                            <!-- NAME -->
                            <input type="text" placeholder="Name" name="name" required>

                            <!-- EMAIL -->
                            <input type="email" placeholder="Email" name="email" required>

                            <!-- PHONE WITH COUNTRY CODE -->
                            <div class="phone-group">
                                <select class="countrycode" name="countrycode" aria-label="Country Code"></select>
                                <input type="tel" placeholder="Phone Number" name="number" required>
                            </div>

                            <!-- BUDGET -->
                            <select required name="budget">
                                <option value="">Budget*</option>
                                <option value="Below $10K">Below $10K</option>
                                <option value="$10K - $25K">$10K - $25K</option>
                                <option value="$25K - $50K">$25K - $50K</option>
                                <option value="$50K - 100K">$50K - 100K</option>
                                <option value="$100K and more">$100K and more</option>
                            </select>

                            <!-- PREFERENCE -->
                            <select required name="prefer">
                                <option value="">I prefer to</option>

                                <option value="Healthcare Software & App Solutions">Healthcare Software & App Solutions</option>
                                <option value="AI Solutions">AI Solutions</option>
                                <option value="Blockchain Solutions">Blockchain Solutions</option>
                                <option value="Fintech App Solutions">Fintech App Solutions</option>
                                <option value="AR/VR App Solutions">AR/VR App Solutions</option>
                                <option value="Mobile & Web App Solutions">Mobile & Web App Solutions</option>
                                <option value="AI-Powered CRM & ERP Solutions">AI-Powered CRM & ERP Solutions</option>
                                <option value="Gaming App Solutions">Gaming App Solutions</option>
                                <option value="Real Estate Software Solutions">Real Estate Software Solutions</option>
                                <option value="Logistics Software Solutions">Logistics Software Solutions</option>
                                <option value="Aviation Software Solutions">Aviation Software Solutions</option>
                                <option value="Enterprise Software Solutions">Enterprise Software Solutions</option>
                                <option value="Fitness App Solutions">Fitness App Solutions</option>
                                <option value="OTT Platform Solutions">OTT Platform Solutions</option>
                                <option value="Restaurant POS Software – SaleSpot">Restaurant POS Software – SaleSpot</option>
                                <option value="Hospitality Management Software Solutions">Hospitality Management Software Solutions</option>
                                <option value="Team extension">Team extension</option>
                                <option value="DevOps">DevOps</option>
                                <option value="Product engineering">Product engineering</option>
                                <option value="IoT">IoT</option>
                                <option value="Digital Transformation">Digital Transformation</option>
                                <option value="Other">Other</option>
                            </select>

                            <!-- MESSAGE -->
                            <textarea placeholder="Message" rows="3" name="message" class="form-controll"></textarea>


                            <div>
                                <center>
                                    <div id="captha" class="g-recaptcha"
                                        data-sitekey="6LeaMZspAAAAAOn6uJBw3j8TKSXFnfwtslQOwycH"
                                        data-callback="verifyCaptcha" style="width:100%">
                                    </div>
                                </center>

                                <p class="footerformcaptcha"></p>

                            </div>
                            <!-- BUTTON -->
                            <button type="submit" class="footerformbuttonhide" name="form_submit">Get Free Consultation →</button>

                            <button class="pleaseWaitBtn footerformbuttonshow"
                                disabled style="cursor:not-allowed"> <i
                                    class="spinner-border spinner-border-sm"></i> Please Wait</button>
                        </form>
                        <div class="form-footer">
                            🔒 NDA available · Responds in &lt;2 hours · No spam ever
                        </div>

                    </div>
                </div>

                <script>
                    var recaptcha_response = '';

                    function footerform() {
                        if (recaptcha_response.length == 0) {
                            var captchaElements = document.getElementsByClassName("footerformcaptcha");
                            for (var i = 0; i < captchaElements.length; i++) {
                                captchaElements[i].innerHTML = "Captcha is mandatory";
                            }
                            return false;
                        } else {
                            $('.footerformbuttonhide').hide();
                            $('.footerformbuttonshow').show();
                            return true;
                        }
                    }

                    function verifyCaptcha(token) {
                        recaptcha_response = token;
                        document.getElementById('g-recaptcha-error').innerHTML = '';
                    }
                </script>



            </div>
        </div>
    </section>

<div class="modal" id="myModal">
    <div class="modal-dialog" style="max-width:920px; ">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <button aria-label="Link" id="close_modal" rel="noopener noreferrer" type="button" class="close_common"
                    data-dismiss="modal">✕
                </button>
            </div>
            <div class="modal-body">
                <div class="lead-form-popup-wrapper">
                      <div class="left_section">

                        <h2>Let’s Build Something Amazing Together</h2>
                        <p>Connect with Sisgain and discover how our innovative software solutions can transform
                            your business. Reach out today—we’re ready to help!
                        </p>
                        <img loading="lazy" class="lead-image" data-src="https://sisgain.com/assets/images/home/cta-modal-images.svg"
                            src="https://sisgain.com/assets/images/home/cta-modal-images.svg" width="250" height="250"
                            alt="Build AI-Powered, Secure, and Scalable Apps">

                        <div class="trusted-by-brand">
                            <p>Trusted by businesses worldwide for innovative software solutions.
                            </p>
                            <ul class="brand-list">
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/toyota.png"
                                        src="https://sisgain.com/assets/images/home/toyota.png" width="83" height="30" alt="AXA">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/united-healthcare.png"
                                        src="https://sisgain.com/assets/images/home/united-healthcare.png" width="83" height="30"
                                        alt="Audi">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/akos.png"
                                        src="https://sisgain.com/assets/images/home/akos.png" width="83" height="30" alt="American Express">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/gt-bank.png"
                                        src="https://sisgain.com/assets/images/home/gt-bank.png" width="83" height="30" alt="Lafarge">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/tcs.png"
                                        src="https://sisgain.com/assets/images/home/tcs.png" width="83" height="30"
                                        alt="Great American Insurance Group">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/modelcraft.png"
                                        src="https://sisgain.com/assets/images/home/modelcraft.png" width="83" height="30" alt="ESPN-F1">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="assets/images/home/tawuniya.png"
                                        src="assets/images/home/tawuniya.png" width="83" height="30" alt="Disney">
                                </li>
                                <li>
                                    <img loading="lazy" data-src="https://sisgain.com/assets/images/home/health-neutron.png"
                                        src="https://sisgain.com/assets/images/home/health-neutron.png" width="83" height="30" alt="DLF">
                                </li>

                            </ul>
                        </div>

                        <div class="clutch-box">
                            <img loading="lazy" alt="clutch-rating"
                                data-src="https://sisgain.com/assets/images/home/5-star-google-rating.webp"
                                src="https://sisgain.com/assets/images/home/5-star-google-rating.webp" width="240" height="37" alt="rating">
                        </div>
                    </div>
                    <div class="right_section">
                        <h2>Connect with SISGAIN</h2>
                        <form action="mail" method="POST" onsubmit="return modalformnnq();">
                            <input type="hidden" name="preventfromrobo">
                            <input type="hidden" name="comingfrom" value="<?php echo $data ?>">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group d-flex">

                                        <select
                                            style="width:150px;     border: 1px solid #ced4da; padding: 0; margin: 0; background:#fff; border-radius: 15px 0px 0px 15px;"
                                            class="countrycode" name="countrycode" autocomplete="off"
                                            aria-label="Country Code"></select>
                                        <input type="text" placeholder="Phone Number" name="number" class="form-control"
                                            style="border-radius: 0px 15px 15px 0px;">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select class="form-control" name="budget" aria-label="Budget"
                                            autocomplete="off" required="">
                                             <option value="">Budget</option>
                                            <option value="Below $10K">Below $10K</option>
                                            <option value="$10K - $25K">$10K - $25K</option>
                                            <option value="$25K - $50K">$25K - $50K</option>
                                            <option value="$50K - 100K">$50K - 100K</option>
                                            <option value="$100K and more">$100K and more</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <select class="form-control" id="preferOption" name="prefer"
                                            aria-label="I prefer to" required="">
                                                        <option value="">I prefer to</option>
                                                        <!--<option value="App development">App development</option>-->
                                                        <!--<option value="Web development">Web development</option>-->
                                                        <!--<option value="Software development">Software development</option>-->
                                                        <option value="Healthcare Software & App Solutions">Healthcare Software & App Solutions</option>
                                                        <option value="AI Solutions">AI Solutions</option>
                                                        <option value="Blockchain Solutions">Blockchain Solutions</option>
                                                        <option value="Fintech App Solutions">Fintech App Solutions</option>
                                                        <option value="AR/VR App Solutions">AR/VR App Solutions</option>
                                                        <option value="Mobile & Web App Solutions">Mobile & Web App Solutions</option>
                                                        <option value="AI-Powered CRM & ERP Solutions">AI-Powered CRM & ERP Solutions</option>
                                                        <option value="Gaming App Solutions">Gaming App Solutions</option>
                                                        <option value="Real Estate Software Solutions">Real Estate Software Solutions</option>
                                                        <option value="Logistics Software Solutions">Logistics Software Solutions</option>
                                                        <option value="Aviation Software Solutions">Aviation Software Solutions</option>
                                                        <option value="Enterprise Software Solutions">Enterprise Software Solutions</option>
                                                        <option value="Fitness App Solutions">Fitness App Solutions</option>
                                                        <option value="OTT Platform Solutions">OTT Platform Solutions</option>
                                                        <option value="Restaurant POS Software – SaleSpot">Restaurant POS Software – SaleSpot</option>
                                                        <option value="Hospitality Management Software Solutions">Hospitality Management Software Solutions</option>
                                                        <option value="Team extension">Team extension</option>
                                                        <option value="DevOps">DevOps</option>
                                                        <option value="Product engineering">Product engineering</option>
                                                        <option value="IoT">IoT</option>
                                                        <option value="Digital Transformation">Digital Transformation</option>
                                                        <option value="Other">Other</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="2" name="message"
                                            placeholder="Message"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <center>
                                        <div id="captha" class="g-recaptcha"
                                            data-sitekey="6LeaMZspAAAAAOn6uJBw3j8TKSXFnfwtslQOwycH"
                                            data-callback="verifyCaptcha" style="width:100%">
                                        </div>
                                    </center>

                                    <p class="captchamandatoryfooter"></p>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="form_submit" class="btn btn_submit buttonhide ">Get a
                                        Free Consultation</button>
                                    <button type="button" class="btn btn_submit pleaseWaitBtn buttonshow" disabled
                                        style="cursor:not-allowed"> <i class="spinner-border spinner-border-sm"></i>
                                        Please Wait</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // show after 10,000 ms
    setTimeout(function () {
        if (document.getElementById('myModal')) {
            $('#myModal').modal('show');
        }
    }, 10000);
</script>
<div class="footer_1st">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="flag_loc">
                    <img loading="lazy" data-src="https://sisgain.com/assets/images/hq-uae.svg"
                        src="https://sisgain.ae/assets/images/home/hq-uae.svg" width="150" height="100"
                        alt="UAE-address">
                    <h6>Dubai - UAE</h6>
                    <p> DUQE FREEZONE Quarter Deck, Queen Elizabeth 2, Mina Rashid, Dubai, UAE</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="flag_loc">
                    <img loading="lazy" data-src="https://sisgain.com/assets/images/canadaAddress.svg"
                        src="https://sisgain.ae/assets/images/home/canadaAddress.svg" width="150" height="100"
                        alt="Canada-address">
                    <h6> Canada</h6>
                    <p> 100 Consilium Pl Suite 200, Scarborough, ON M1H 3E3, Canada
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="flag_loc">
                    <img loading="lazy" data-src="https://sisgain.com/assets/images/hq-india.svg"
                        src="https://sisgain.ae/assets/images/home/hq-india.svg" width="150" height="100"
                        alt="India-address">
                    <h6>Noida - India</h6>
                    <p> C-109, Sector 2, Noida, Uttar Pradesh 201301 India</p>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="contact-cta" id="contact-cta" aria-labelledby="contact-cta-heading">
    <div class="container">
        <h2 id="contact-cta-heading" class="text-center">Connect with our team</h2>

        <!-- Top cards: Sales vs Careers -->
        <div class="cards">
            <!-- Business & Service Inquiries -->
            <article class="cta_card" aria-labelledby="sales-heading">
                <header class="card__header">
                    <div class="cta_badge">For Business &amp; Service Inquiries</div>
                    <h3 class="card__title" id="sales-heading">Sales Team</h3>
                    <p class="card__subtitle">Project quotes, partnerships, implementation</p>
                </header>

                <address class="card__body">
                    <div class="card__body_head">
                        <a class="contact-line" href="mailto:hello@sisgain.com"
                            aria-label="Email sales at hello@sisgain.com">
                            <span class="icon" aria-hidden="true">
                                <!-- mail icon -->
                                <svg viewBox="0 0 24 24" width="18" height="18" role="img">
                                    <path
                                        d="M4 6h16a2 2 0 0 1 2 2v.3l-10 6.25L2 8.3V8a2 2 0 0 1 2-2zm0 4.25 8 5 8-5V16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            hello@sisgain.com
                        </a>


                        <a class="contact-line" href="tel:+1 8444455767" aria-label="Email sales at sales@sisgain.com">
                            <span class="icon" aria-hidden="true">
                                <!-- mail icon -->
                                <img loading="lazy" class="lazyload" src="https://sisgain.com/assets/images/icons/usa_flag.webp" height="30"
                                    width="30" alt="usa Flag" title="USA">
                            </span>
                            +1 844-445-5767
                        </a>
                    </div>

                    <div class="card__body_head">
                        <a class="contact-line" href="tel:+91 9212080630" aria-label="Email sales at sales@sisgain.com">
                            <span class="icon" aria-hidden="true">
                                <!-- mail icon -->
                                <img loading="lazy" class="lazyload" src="https://sisgain.com/assets/images/icons/india_flag.webp"
                                    height="30" width="30" alt="india Flag" title="India">
                            </span>
                            +91 921-208-0630
                        </a>


                        <a class="contact-line" href="tel:+971 568485757" aria-label="Email sales at sales@sisgain.com">
                            <span class="icon" aria-hidden="true">
                                <!-- mail icon -->
                                <img loading="lazy" class="lazyload" src="https://sisgain.com/assets/images/icons/uae_flag.webp" height="30"
                                    width="30" alt="UAE Flag" title="UAE">
                            </span>
                            +971 56-848-5757
                        </a>
                    </div>

                </address>
                <span style="color: red; font-size:10px; font-style: italic;" class=" text-center">For business and project inquiries only.
                    Job or career-related queries sent here will be automatically rejected.
                </span>
            </article>

            <!-- Careers & Job Applications -->
            <article class="cta_card" aria-labelledby="careers-heading">
                <header class="card__header">
                    <div class="cta_badge badge--alt">For Career, Job Application & Verification</div>
                    <h3 class="card__title" id="careers-heading">HR &amp; Talent</h3>
                    <p class="card__subtitle">Open roles, referrals, campus hiring</p>
                </header>

                <address class="card__body">
                    <div class="card__body_head">
                        <a class="contact-line" href="mailto:hr@sisgain.com" aria-label="Email HR at hr@sisgain.com">
                            <span class="icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="18" height="18" role="img">
                                    <path
                                        d="M4 6h16a2 2 0 0 1 2 2v.3l-10 6.25L2 8.3V8a2 2 0 0 1 2-2zm0 4.25 8 5 8-5V16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            hr@sisgain.com
                        </a>

                        <a class="contact-line" href="tel: +91 8744888528"
                            aria-label="Call HR helpline at plus nine one eight nine three eight nine eight seven three">
                            <span class="icon" aria-hidden="true">
                                <!-- phone icon -->
                                <svg viewBox="0 0 24 24" width="18" height="18" role="img">
                                    <path
                                        d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1.5 1.5 0 0 1 1.5-.37c1.63.54 3.4.83 5.2.83a1.5 1.5 0 0 1 1.5 1.5V21a1.5 1.5 0 0 1-1.5 1.5C10.97 22.5 1.5 13.03 1.5 2.5A1.5 1.5 0 0 1 3 1h3.86A1.5 1.5 0 0 1 8.5 2.5c0 1.8.29 3.57.83 5.2.17.5.06 1.05-.37 1.46L6.6 10.8z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            +91 8744-888-528
                        </a>
                    </div>
                </address>
            </article>
        </div>


    </div>
</section>
<!-- <footer id="footer_section" class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <div class="brand_logo mb-3"> <a href="index" class="brand_link"> <img loading="lazy" data-src="https://sisgain.com/assets/images/logo.webp" src="https://sisgain.com/assets/images/logo.webp" height="50" width="160" alt="Sisgain Logo" style="width:auto"> </a> </div>
                <p style="color:#000">SISGAIN is a renowned app development company. We build technology-rich superior apps. We help businesses around the globe to add value by multiplying profits for long-term benefits. Get custom solutions developed for your business.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                <h5> App Services</h5>
                <ul>
                    <li><a href="https://sisgain.com/ott-app-development-company">OTT Application Development</a></li>
                    <li><a href="https://sisgain.com/cross-platform-application-development">Cross Platform Development</a></li>
                    <li><a href="https://sisgain.com/react-native-app-development-company">React Native Development</a></li>
                    <li><a href="https://sisgain.com/android-application-development">Android Development</a></li>
                    <li><a href="https://sisgain.com/flutter-application-development-company">Flutter Development</a></li>
                    <li><a href="https://sisgain.com/ios-app-developement-company">iOS Development</a></li>
                </ul>

            </div>
              <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                <h5> Web Services</h5>
                <ul class="clearfix">
                    <li><a href="https://sisgain.com/wordpress-development-company">Wordpress Development</a></li>
                    <li><a href="https://sisgain.com/react-js-app-development-company">React JS Development</a></li>
                    <li><a href="https://sisgain.com/angular-development-company">Angular Development</a></li>
                    <li><a href="https://sisgain.com/node-js-development">Node JS Development</a></li>
                    <li><a href="https://sisgain.com/laravel-development">Laravel Development</a></li>
                </ul>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                <h5> Industries </h5>
                <ul>
                    <li><a>Automobile</a></li>
                    <li><a href="https://sisgain.com/healthcare">Healthcare</a></li>
                    <li><a href="https://sisgain.com/real-estate-software-solutions">Real Estate</a></li>
                    <li><a href="https://sisgain.com/education-app-development">Education</a></li>
                    <li><a href="https://sisgain.com/e-learning">E-Learning</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                <h5>Quick Links </h5>
                <ul>
                    <li><a href="https://sisgain.com/about-us">About us</a></li>
                    <li><a href="https://sisgain.com/contact">Contact us</a></li>
                    <li><a href="https://sisgain.com/blogs/">Blogs</a></li>
                    <li><a href="https://sisgain.com/sitemap">Sitemap</a></li>

                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                <h5>Hire us</h5>
                <ul>
                    <li><a href="https://sisgain.com/hire-react-js-developer">React JS Developer</a></li>
                    <li><a href="https://sisgain.com/hire-android-developer">Android Developer</a></li>
                    <li><a href="https://sisgain.com/angular-development-company">Angular Developer</a></li>
                    <li><a href="https://sisgain.com/hire-node-js-developer">Node JS Developer</a></li>
                    <li><a href="https://sisgain.com/hire-ios-developer">iOS Developer</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                <h5> Our Core Services </h5>
                <ul>
                    <li><a href="https://sisgain.com/telemedicine">Telemedicine App Development</a></li>
                    <li><a href="https://sisgain.com/healthcare">Healthcare App Development</a></li>
                    <li><a href="https://sisgain.com/hospital-management">Hospital Management System</a></li>
                    <li><a href="https://sisgain.com/remote-patient-monitoring">Remote Patient
                            Monitoring Software</a></li>

                    <li><a href="https://sisgain.com/pos">Restaurant POS Systems</a></li>
                    <li><a href="https://sisgain.com/crm-development-company">CRM Development</a></li>

                </ul>

            </div>

        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="copyright_text">
                        <p class="mb-0"> © Copyright <script>
                                document.write(new Date().getFullYear())
                            </script> <b>SISGAIN</b>. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="social_icon">
                        <ul class="clearfix">
                            <li> <a aria-label="facebook" href="https://www.facebook.com/SISGAIN/">
                                    <img loading="lazy" data-src="https://sisgain.ae/assets/images/home/at_facebook.svg"
                                        src="https://sisgain.ae/assets/images/home/at_facebook.svg" width="30"
                                        height="30" alt="Facebook Icon"> </a> </li>
                            <li> <a aria-label="twitter" href="https://twitter.com/spectrum1995">
                                    <img loading="lazy" data-src="https://sisgain.ae/assets/images/home/at_twitter.svg"
                                        src="https://sisgain.ae/assets/images/home/at_twitter.svg" width="30"
                                        height="30" alt="Twitter Icon"> </a> </li>
                            <li> <a aria-label="linkedin"
                                    href="https://www.linkedin.com/company/sisgain/mycompany/"><img loading="lazy"
                                        data-src="https://sisgain.ae/assets/images/home/at_linkedin.svg"
                                        src="https://sisgain.ae/assets/images/home/at_linkedin.svg" width="30"
                                        height="30" alt="LinkedIn Icon"> </a> </li>
                            <li> <a aria-label="instagram" href="https://www.instagram.com/sisgainofficial"> <img
                                        loading="lazy" data-src="https://sisgain.ae/assets/images/home/at_instagram.svg"
                                        src="https://sisgain.ae/assets/images/home/at_instagram.svg" width="30"
                                        height="30" alt="Instagram Icon"> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                     <div style="float: right;">
                        <a href="https://sisgain.com/terms-condition">Terms of Use</a> |
                        <a href="https://sisgain.com/privacy-policy">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> -->


  <style>
    

    /* ── FOOTER ── */
    #footer_section {
      background-color: #0d1b2e;
      padding: 3.5rem 0 0 0;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1.5fr 0.8fr 1fr 1fr 1fr;
      gap: 2rem;
      padding-bottom: 3rem;
    }

    /* Col 1 */
    .footer-brand {}

    .footer-logo {
      display: block;
      margin-bottom: 1.4rem;
    }

    .footer-logo img {
      height: 48px;
      width: auto;
      filter: brightness(0) invert(1);
    }

    /* Fallback SVG logo if image fails */
    .logo-svg-wrap {
      display: flex;
      flex-direction: column;
      gap: 2px;
      margin-bottom: 1.4rem;
    }

    .logo-name {
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.5px;
      line-height: 1;
    }

    .logo-name sup {
      font-size: 1rem;
      vertical-align: super;
      font-weight: 400;
    }

    .logo-tagline {
      font-size: 11px;
      color: #a0aec0;
      letter-spacing: 1px;
    }

    .footer-desc {
      font-size: 14px;
      line-height: 1.75;
      color: #a0b4c8;
      margin-bottom: 1.6rem;
      max-width: 300px;
    }

    /* Social icons */
    .footer-social {
      display: flex;
      gap: 14px;
      align-items: center;
      margin-bottom: 2.5rem;
    }

    .footer-social a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255,255,255,0.05);
      transition: background 0.2s ease;
      color: #a0b4c8;
      text-decoration: none;
    }

    .footer-social a:hover {
      background: rgba(255,255,255,0.12);
      color: #fff;
    }

    .footer-social svg {
      width: 18px;
      height: 18px;
      fill: currentColor;
    }

    /* More from box */
    .more-from-box {
      border: 1.5px solid rgba(255,255,255,0.55);
      border-radius: 14px;
      padding: 18px 26px;
      display: block;
      width: 100%;
      max-width: 360px;
    }

    .more-from-title {
      color: #fff;
      font-weight: 700;
      font-size: 15px;
      margin-bottom: 12px;
    }

    .more-from-links {
      display: flex;
      align-items: center;
      flex-direction: row;
      flex-wrap: nowrap;
      gap: 0;
      white-space: nowrap;
    }

    .more-from-links a {
      color: #a0b4c8;
      font-size: 14px;
      text-decoration: none;
      transition: color 0.2s;
      display: inline;
    }

    .more-from-links a:hover { color: #fff; }

    .more-from-links .sep {
      color: #a0b4c8;
      font-size: 14px;
      display: inline;
    }

    /* Nav columns */
    .footer-col h5 {
      font-size: 15px;
      font-weight: 700;
      color: #fff;
      margin-bottom: 1.4rem;
      letter-spacing: 0.2px;
    }

    .footer-col ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-col ul li {
      margin-bottom: 11px;
    }

    .footer-col ul li a {
      color: #8fa3b8;
      font-size: 14px;
      text-decoration: none;
      line-height: 1.4;
      transition: color 0.2s ease;
      display: inline-block;
    }

    .footer-col ul li a:hover { color: #fff; }

    /* ── FOOTER BOTTOM ── */
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.1);
      padding: 1.1rem 0;
    }

    .footer-bottom-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .footer-copy {
      font-size: 13px;
      color: #8fa3b8;
    }

    .footer-copy b { font-weight: 600; }

    .footer-legal {
      display: flex;
      gap: 6px;
      align-items: center;
    }

    .footer-legal a {
      font-size: 13px;
      color: #8fa3b8;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s;
    }

    .footer-legal a:hover { color: #fff; }

    .footer-legal span {
      color: #8fa3b8;
      font-size: 13px;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 992px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr 1fr;
      }
      .footer-brand { grid-column: 1 / -1; }
    }

    @media (max-width: 600px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr;
      }
      .footer-brand { grid-column: 1 / -1; }
      .footer-bottom-inner { flex-direction: column; gap: 8px; text-align: center; }
    }

    @media (max-width: 380px) {
      .footer-grid { grid-template-columns: 1fr; }
    }
  </style>


<footer id="footer_section">
  <div class="footer-container">
    <div class="footer-grid">

      <!-- ── Col 1: Brand ── -->
      <div class="footer-brand footer-col">
        <!-- Logo -->
        <a href="/" class="footer-logo">
          <img src="https://sisgain.com/assets/images/logo.webp" alt="Sisgain Logo"
               onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
          <div class="logo-svg-wrap" style="display:none;">
            <div class="logo-name">sisgain<sup>®</sup></div>
            <div class="logo-tagline">Your Technology Partner</div>
          </div>
        </a>

        <p class="footer-desc">
          SISGAIN is a global technology partner delivering AI, mobile app, blockchain,
          and enterprise software solutions.
        </p>

        <!-- Social -->
        <div class="footer-social">
          <!-- LinkedIn -->
          <a href="https://www.linkedin.com/company/sisgain/" target="_blank" aria-label="LinkedIn">
            <svg viewBox="0 0 24 24"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14zM7.12 20.45H3.55V9h3.57v11.45z"/></svg>
          </a>
          <!-- X / Twitter -->
          <a href="https://twitter.com/spectrum1995" target="_blank" aria-label="X (Twitter)">
            <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L2.25 2.25h6.988l4.27 5.647zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <!-- Facebook -->
          <a href="https://www.facebook.com/SISGAIN/" target="_blank" aria-label="Facebook">
            <svg viewBox="0 0 24 24"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
          </a>
          <!-- Instagram -->
          <a href="https://www.instagram.com/sisgainofficial" target="_blank" aria-label="Instagram">
            <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          </a>
        </div>

        <!-- More from SISGAIN -->
        <div class="more-from-box">
          <p class="more-from-title">More from SISGAIN</p>
          <div class="more-from-links">
            <a href="https://sisgain.ae/" target="_blank" rel="noopener noreferrer">SISGAIN Technologies</a>
            <span class="sep">&nbsp;|&nbsp;</span>
            <a href="https://dubaiitconsulting.com/" target="_blank" rel="noopener noreferrer">Dubai IT Consulting</a>
          </div>
        </div>
      </div>

      <!-- ── Col 2: Quick Links ── -->
      <div class="footer-col">
        <h5>Quick Links</h5>
        <ul>
          <li><a href="https://sisgain.com/about-us">About</a></li>
          <li><a href="https://sisgain.com/contact">Contact</a></li>
          <li><a href="https://sisgain.com/portfolio">Portfolio</a></li>
          <li><a href="https://sisgain.com/blogs">Blogs</a></li>
          <li><a href="https://sisgain.com/sitemap">Sitemap</a></li>
        </ul>
      </div>

      <!-- ── Col 3: Services ── -->
      <div class="footer-col">
        <h5>Services</h5>
        <ul>
          <li><a href="https://sisgain.com/mobile-app-development-company">Mobile App Development</a></li>
          <li><a href="https://sisgain.com/">Software Development</a></li>
          <li><a href="https://sisgain.com/crm-development-company">CRM Development</a></li>
          <li><a href="https://sisgain.com/ott-app-development-company">OTT Platform Development</a></li>
          <li><a href="https://sisgain.com/pos">Restaurant POS Software Development</a></li>
        </ul>
      </div>

      <!-- ── Col 4: Industries ── -->
      <div class="footer-col">
        <h5>Industries</h5>
        <ul>
          <li><a href="https://sisgain.com/healthcare">Healthcare</a></li>
          <li><a href="https://sisgain.com/real-estate-software-solutions">Real Estate</a></li>
          <li><a href="https://sisgain.com/fintech-app-development">Finance</a></li>
          <li><a href="https://sisgain.com/logistic-software-development-company">Logistics and Transportation</a></li>
          <li><a href="#" data-toggle="modal" data-target="#myModal">Aviation</a></li>
          <li><a href="#" data-toggle="modal" data-target="#myModal">Gaming</a></li>
          <li><a href="https://sisgain.com/fitness-club-management">Fitness</a></li>
          <li><a href="https://sisgain.com/entertainment-app-development-company">Media and Entertainment</a></li>
          <li><a href="https://sisgain.com/food-delivery-app-development-company">Food</a></li>
          <li><a href="https://sisgain.com/education-app-development">Education</a></li>
        </ul>
      </div>

      <!-- ── Col 5: High Demand Technologies ── -->
      <div class="footer-col">
        <h5>High Demand Technologies</h5>
        <ul>
          <li><a href="https://sisgain.com/ai-software-development-company">AI</a></li>
          <li><a href="https://sisgain.com/blockchain-development-company">Blockchain</a></li>
          <li><a href="https://sisgain.com/chatbot-solution">Chatbot</a></li>
          <li><a href="https://sisgain.com/augmented-reality-service">AR/VR</a></li>
          <li><a href="https://sisgain.com/internet-of-things">IoT (Internet of Things)</a></li>
          <li><a href="https://sisgain.com/bitcoin-app-development">Bitcoin</a></li>
          <li><a href="https://sisgain.com/saas-development-company">SaaS</a></li>
        </ul>
      </div>

    </div><!-- /footer-grid -->
  </div><!-- /footer-container -->

  <!-- ── Bottom bar ── -->
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <p class="footer-copy">© 2026 <b>SISGAIN</b>. All rights reserved.</p>
      <div class="footer-legal">
        <a href="https://sisgain.com/terms-condition">Terms of Use</a>
        <span>|</span>
        <a href="https://sisgain.com/privacy-policy">Privacy Policy</a>
      </div>
    </div>
  </div>

</footer>



<script>
    const track = document.querySelector('.slider-trackreviews');
    const slidesreviews = document.querySelectorAll('.slidereviews');
    const btnLeft = document.querySelector('.arrow-leftreviews');
    const btnRightSlide = document.querySelector('.arrow-rightreviews');

    let index = 0;
    let slidesToShow = 3; // Default number of visible slides
    let totalSlidesr = slidesreviews.length - slidesToShow;

    function updateSlidesToShow() {
        if (window.innerWidth <= 768) { // Mobile view threshold (768px or less)
            slidesToShow = 1;
        } else {
            slidesToShow = 3;
        }
        totalSlidesr = slidesreviews.length - slidesToShow;
        moveToSlide(index); // Adjust the position when the number of visible slides changes
    }

    function moveToSlide(idx) {
        track.style.transform = `translateX(-${idx * 100 / slidesToShow}%)`;
    }

    btnRightSlide.addEventListener('click', () => {
        index = Math.min(index + 1, totalSlidesr); // Don't go beyond the last slide
        moveToSlide(index);
    });

    btnLeft.addEventListener('click', () => {
        index = Math.max(index - 1, 0); // Don't go before the first slide
        moveToSlide(index);
    });

    // Auto-slide functionality
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            if (index < totalSlidesr) {
                btnRightSlide.click(); // Move to the next slide
            } else {
                index = 0; // Reset to the first slide
                moveToSlide(index);
            }
        }, 3000); // Slide every 3 seconds
    }

    // function stopAutoSlide() {
    //     clearInterval(autoSlideInterval);
    // }

    // // Start auto-slide on load
    // startAutoSlide();

    // // Pause on hover, resume on mouse leave
    // slidesreviews.forEach(slide => {
    //     slide.addEventListener('mouseenter', stopAutoSlide);
    //     slide.addEventListener('mouseleave', startAutoSlide);
    // });

    // // Update the number of visible slides on load and resize
    updateSlidesToShow();
    window.addEventListener('resize', updateSlidesToShow);
</script>

<style>
    .captchamandatoryfooter,
    .footerformcaptcha {
        text-align: center;
        color: red;
        padding: 10px 0px;
        font-size: 15px;
    }
</style>
<script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            // Load reCAPTCHA script after the same delay
            var recaptchaScript = document.createElement('script');
            recaptchaScript.src = 'https://www.google.com/recaptcha/api.js';
            document.head.appendChild(recaptchaScript);
        }, 5000);
    });
</script>

<script>
    var recaptcha_response = '';

    function modalformnnq() {
        if (recaptcha_response.length == 0) {
            var captchaElements = document.getElementsByClassName("captchamandatoryfooter");
            for (var i = 0; i < captchaElements.length; i++) {
                captchaElements[i].innerHTML = "Captcha is mandatory";
            }
            return false;
        } else {
            $('.buttonhide').hide();
            $('.buttonshow').show();
            return true;
        }
    }

    function verifyCaptcha(token) {
        recaptcha_response = token;
        document.getElementById('g-recaptcha-error').innerHTML = '';
    }
</script>




<script>
const countryCodes = [
{ code: '+1', name: 'US/CA' },
{ code: '+7', name: 'RU' },
{ code: '+20', name: 'EG' },
{ code: '+27', name: 'ZA' },
{ code: '+30', name: 'GR' },
{ code: '+31', name: 'NL' },
{ code: '+32', name: 'BE' },
{ code: '+33', name: 'FR' },
{ code: '+34', name: 'ES' },
{ code: '+36', name: 'HU' },
{ code: '+39', name: 'IT' },
{ code: '+40', name: 'RO' },
{ code: '+41', name: 'CH' },
{ code: '+43', name: 'AT' },
{ code: '+44', name: 'GB' },
{ code: '+45', name: 'DK' },
{ code: '+46', name: 'SE' },
{ code: '+47', name: 'NO' },
{ code: '+48', name: 'PL' },
{ code: '+49', name: 'DE' },
{ code: '+51', name: 'PE' },
{ code: '+52', name: 'MX' },
{ code: '+53', name: 'CU' },
{ code: '+54', name: 'AR' },
{ code: '+55', name: 'BR' },
{ code: '+56', name: 'CL' },
{ code: '+57', name: 'CO' },
{ code: '+58', name: 'VE' },
{ code: '+60', name: 'MY' },
{ code: '+61', name: 'AU' },
{ code: '+62', name: 'ID' },
{ code: '+63', name: 'PH' },
{ code: '+64', name: 'NZ' },
{ code: '+65', name: 'SG' },
{ code: '+66', name: 'TH' },
{ code: '+81', name: 'JP' },
{ code: '+82', name: 'KR' },
{ code: '+84', name: 'VN' },
{ code: '+86', name: 'CN' },
{ code: '+90', name: 'TR' },
{ code: '+91', name: 'IN' },
{ code: '+92', name: 'PK' },
{ code: '+93', name: 'AF' },
{ code: '+94', name: 'LK' },
{ code: '+95', name: 'MM' },
{ code: '+98', name: 'IR' },

// GCC Countries
{ code: '+971', name: 'AE' },
{ code: '+966', name: 'SA' }, // KSA Added
{ code: '+974', name: 'QA' },
{ code: '+973', name: 'BH' },
{ code: '+965', name: 'KW' },
{ code: '+968', name: 'OM' },

// Middle East
{ code: '+961', name: 'LB' },
{ code: '+962', name: 'JO' },
{ code: '+963', name: 'SY' },
{ code: '+964', name: 'IQ' },
{ code: '+970', name: 'PS' },
{ code: '+972', name: 'IL' },
{ code: '+967', name: 'YE' },

// Africa
{ code: '+211', name: 'SS' },
{ code: '+212', name: 'MA' },
{ code: '+213', name: 'DZ' },
{ code: '+216', name: 'TN' },
{ code: '+218', name: 'LY' },
{ code: '+220', name: 'GM' },
{ code: '+221', name: 'SN' },
{ code: '+222', name: 'MR' },
{ code: '+223', name: 'ML' },
{ code: '+224', name: 'GN' },
{ code: '+225', name: 'CI' },
{ code: '+226', name: 'BF' },
{ code: '+227', name: 'NE' },
{ code: '+228', name: 'TG' },
{ code: '+229', name: 'BJ' },
{ code: '+230', name: 'MU' },
{ code: '+231', name: 'LR' },
{ code: '+232', name: 'SL' },
{ code: '+233', name: 'GH' },
{ code: '+234', name: 'NG' },
{ code: '+235', name: 'TD' },
{ code: '+236', name: 'CF' },
{ code: '+237', name: 'CM' },
{ code: '+238', name: 'CV' },
{ code: '+239', name: 'ST' },
{ code: '+240', name: 'GQ' },
{ code: '+241', name: 'GA' },
{ code: '+242', name: 'CG' },
{ code: '+243', name: 'CD' },
{ code: '+244', name: 'AO' },
{ code: '+245', name: 'GW' },
{ code: '+248', name: 'SC' },
{ code: '+249', name: 'SD' },
{ code: '+250', name: 'RW' },
{ code: '+251', name: 'ET' },
{ code: '+252', name: 'SO' },
{ code: '+253', name: 'DJ' },
{ code: '+254', name: 'KE' },
{ code: '+255', name: 'TZ' },
{ code: '+256', name: 'UG' },
{ code: '+257', name: 'BI' },
{ code: '+258', name: 'MZ' },
{ code: '+260', name: 'ZM' },
{ code: '+261', name: 'MG' },
{ code: '+263', name: 'ZW' },
{ code: '+264', name: 'NA' },
{ code: '+265', name: 'MW' },
{ code: '+266', name: 'LS' },
{ code: '+267', name: 'BW' },
{ code: '+268', name: 'SZ' },
{ code: '+269', name: 'KM' },

// Europe (Remaining)
{ code: '+352', name: 'LU' },
{ code: '+353', name: 'IE' },
{ code: '+354', name: 'IS' },
{ code: '+355', name: 'AL' },
{ code: '+356', name: 'MT' },
{ code: '+357', name: 'CY' },
{ code: '+358', name: 'FI' },
{ code: '+359', name: 'BG' },
{ code: '+370', name: 'LT' },
{ code: '+371', name: 'LV' },
{ code: '+372', name: 'EE' },
{ code: '+373', name: 'MD' },
{ code: '+374', name: 'AM' },
{ code: '+375', name: 'BY' },
{ code: '+376', name: 'AD' },
{ code: '+377', name: 'MC' },
{ code: '+378', name: 'SM' },
{ code: '+380', name: 'UA' },
{ code: '+381', name: 'RS' },
{ code: '+382', name: 'ME' },
{ code: '+383', name: 'XK' },
{ code: '+385', name: 'HR' },
{ code: '+386', name: 'SI' },
{ code: '+387', name: 'BA' },
{ code: '+389', name: 'MK' },
{ code: '+420', name: 'CZ' },
{ code: '+421', name: 'SK' },
{ code: '+423', name: 'LI' }
];

    // Select all elements with the class "countrycode"
/*    const selectElements = document.querySelectorAll('.countrycode');

    // Loop through each select element and populate it with the country codes
    selectElements.forEach(selectElement => {
        countryCodes.forEach(country => {
            const option = new Option(`${country.name} (${country.code})`, country.code);
            selectElement.add(option);
        });
        selectElement.value = '+91';
    });*/


const selectElements = document.querySelectorAll('.countrycode');

// Populate dropdowns
selectElements.forEach(selectElement => {
  countryCodes.forEach(country => {
    const option = new Option(`${country.name} (${country.code})`, country.code);
    selectElement.add(option);
  });
});

// Function to set country code
function setCountryCode(countryCode) {
  const match = countryCodes.find(c => c.name === countryCode);
  selectElements.forEach(selectElement => {
    selectElement.value = match ? match.code : '+91';
  });
}

// Detect country by IP location
fetch('https://ipapi.co/json/')
  .then(response => response.json())
  .then(data => {
    const countryCode = data.country_code; // e.g., "IN" for India
    setCountryCode(countryCode);
  })
  .catch(error => {
    console.log('Geolocation failed, using fallback');
    // Fallback to India
    setCountryCode('IN');
  });
</script>



</section>
<script>
    // Load the WhatsApp button after 3 seconds
    setTimeout(function() {
        document.querySelector('.wahtsapp').style.display = 'block'; // Show the button
    }, 3000); // 3000 milliseconds = 3 seconds
</script>


