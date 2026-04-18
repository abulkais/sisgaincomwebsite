<?php
include("url-page.php");
?>


<style>
    .contact__sec form p {
        font-size: small;
    }

    #res {
        padding: 0;
        margin-bottom: 0px;
        margin-top: 20px;
        text-align: center;
        color: green;
        font-weight: 600;
    }

    .btn-whatsapp-pulse {
        z-index: 10000;
        background: #25d366;
        color: white;
        position: fixed;
        bottom: 15px;
        left: 20px;
        font-size: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 0;
        height: 0;
        padding: 30px;
        text-decoration: none;
        border-radius: 50%;
        animation-name: pulse;
        animation-duration: 1.5s;
        animation-timing-function: ease-out;
        animation-iteration-count: infinite;
    }



    .btn-whatsapp-pulse i {
        color: #fff;
        /* margin-top: px; */
        font-size: 30px;
    }

    .btn-whatsapp-pulse a {
        align-items: center;
        text-align: center;
        margin-top: -5px;
    }

    .btn-whatsapp-pulse a:hover {
        display: block !important;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
        }

        80% {
            box-shadow: 0 0 0 14px rgba(37, 211, 102, 0);
        }
    }
</style>
<section class="btn-whatsapp-pulse">
    <a href="https://wa.me/919212080630?text=Hi, I want to know more about your services." target="blank">
        <i class="fa fa-whatsapp"></i>
    </a>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script>
    function form_validate() {
        $('.formbuttonhide').hide();
        $('.formbuttonshow').show();
        return true;
    }
</script>

<footer id="footer_section" class="footer_section bg_gray_3 deco_wrap clearfix">
    <div class="widget_area">
        <div class="container position-relative">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="widget useful_links ul_li_block" data-aos="fade-up" data-aos-delay="500">
                        <div class="brand_logo mb-2"> <a href="index" class="brand_link"> <img loading="lazy" class="lazyload" src="../assets/images/logo.webp" height="45" width="147" alt="Sisgain Logo"> </a> </div>
                        <p>SISGAIN is a renowned app development company. We build technology-rich superior apps. We help businesses around the globe to add value by multiplying profits for long-term benefits. Get custom solutions developed for your business.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="widget useful_links ul_li_block" data-aos="fade-up" data-aos-delay="700">
                        <h3 class="widget_title mb-30"> App Services</h3>
                        <ul class="clearfix">

                            <li><a href="../ott-app-development-company">OTT Application Development</a></li>
                            <li><a href="../cross-platform-application-development">Cross Platform Development</a></li>
                            <li><a href="../react-native-app-development-company">React Native Development</a></li>
                            <li><a href="../android-application-development">Android Development</a></li>
                            <li><a href="../flutter-application-development-company">Flutter Development</a></li>
                            <li><a href="../ios-app-developement-company">iOS Development</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="widget useful_links ul_li_block" data-aos="fade-up" data-aos-delay="900">
                        <h3 class="widget_title mb-30"> Web Services</h3>
                        <ul class="clearfix">
                            <li><a href="../wordpress-development-company">Wordpress Development</a></li>
                            <li><a href="../react-js-app-development-company">React JS Development</a></li>
                            <li><a href="../angular-development-company">Angular Development</a></li>
                            <li><a href="../node-js-development">Node JS Development</a></li>
                            <li><a href="../laravel-development">Laravel Development</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="widget useful_links ul_li_block" data-aos="fade-up" data-aos-delay="500">
                        <h3 class="widget_title mb-30"> Industries </h3>
                        <ul class="clearfix">
                            <li><a>Automobile</a></li>
                            <li><a href="../healthcare">Healthcare</a></li>
                            <li><a href="../real-estate">Real Estate</a></li>
                            <li><a href="../education-app-development">Education</a></li>
                            <li><a href="../e-learning">E-Learning</a></li>

                            <li><a href="../industries">more..</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="widget useful_links ul_li_block" data-aos="fade-up" data-aos-delay="700">
                        <h3 class="widget_title mb-30">Hire us</h3>
                        <ul class="clearfix">
                            <li><a href="../hire-react-js-developer">React JS Developer</a></li>
                            <li><a href="https://sisgain.com/hire-android-developer">Android Developer</a></li>

                            <li><a href="angular-development-company">Angular Developer</a></li>
                            <li><a href="https://sisgain.com/hire-node-js-developer">Node JS Developer</a></li>

                            <li><a href="https://sisgain.com/hire-ios-developer">iOS Developer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                    <div class="widget useful_links ul_li_block" data-aos="fade-up" data-aos-delay="900">
                        <h3 class="widget_title mb-30">Contact</h3>
                        <div class="widget about_content">
                            <div class="footerflagbox"> <img loading="lazy" class="lazyload" src="../assets/images/icons/india_flag.webp" height="30" width="30" alt="india Flag" title="UAE">
                                <h6 class="mb-0"> India </h6> <a href="tel:+919212080630">+91 9212080630</a>
                            </div>
                            <hr>
                            <div class="footerflagbox"> <img loading="lazy" class="lazyload" src="../assets/images/icons/usa_flag.webp" height="30" width="30" alt="usa Flag" title="UAE">
                                <h6 class="mb-0"> USA </h6><a href="tel:+18444455767">+1 8444455767</a>
                            </div>
                            <hr>
                            <div class="footerflagbox"> <img loading="lazy" class="lazyload" src="../assets/images/icons/uae_flag.webp" height="30" width="30" alt="UAE Flag" title="UAE">
                                <h6 class="mb-0"> UAE</h6> <a href="tel: +971 568485757"> +971 56-848-5757</a>
                            </div>
                            <div class="footercontent">
                                <hr> <a href="mailto:hello@sisgain.com"> <i class="fa fa-envelope fa-lg"></i> hello@sisgain.com</a> <br> <a href="skype:spectrum.specialist"> <i class="fa fa-skype fa-lg"></i> spectrum.specialist</a>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="social_icon ul_li_center">
                        <ul class="clearfix">
                            <li> <a aria-label="facebook" href="https://www.facebook.com/SISGAIN/"> <i class="fa fa-facebook"></i> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a aria-label="twitter" href="https://twitter.com/spectrum1995"> <!-- <i class="fa fa-twitter"></i> <i class="fa fa-twitter"></i> --> <svg xmlns="http://www.w3.org/2000/svg" height="15" width="15" viewBox="0 0 512 512" fill="#6a7c92" style="margin-top: 7px;">
                                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                    </svg> </a> </li>
                            <li> <a aria-label="linkedin" href="https://www.linkedin.com/company/sisgain/mycompany/"> <i class="fa fa-linkedin"></i> <i class="fa fa-linkedin"></i> </a> </li>
                            <li> <a aria-label="instagram" href="https://www.instagram.com/sisgainofficial"> <i class="fa fa-instagram"></i> <i class="fa fa-instagram"></i> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer_menu ul_li_right">
                        <ul class="clearfix">
                            <li><a href="https://sisgain.com/terms-condition">Terms of Use</a></li>
                            <li><a href="https://sisgain.com/privacy-policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- The Modal -->
<div class="modal fade" id="myModal">
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
                        <img src="../assets/images/modal-img.webp" style="width:auto; height:auto" class="lazyload" height="305" width="296" alt="Application Development Company - SISGAIN">
                    </div>
                    <div class="col-lg-7">
                        <form action="../mail" method="post" onsubmit="return form_validate();" style="padding:0">
                            <input type="hidden" name="comingfrom" value="<?php echo $data ?> (Blog)">
                            <input type="hidden" name="preventfromrobo">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name*" name="name" autocomplete="off" required>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email*" name="email" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-lg-12col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div style="display: flex;">
                                            <select style="width:80px; padding: 0; margin: 0;" id="countrycode" name="countrycode" autocomplete="off">
                                                <option value="+1" selected="selected">US +1</option>
                                                <option value="+20">EG +20</option>
                                                <option value="+212">MA +212</option>
                                                <option value="+213">DZ +213</option>
                                                <option value="+216">TN +216</option>
                                                <option value="+218">LY +218</option>
                                                <option value="+220">GM +220</option>
                                                <option value="+221">SN +221</option>
                                                <option value="+222">MR +222</option>
                                                <option value="+223">ML +223</option>
                                                <option value="+224">GN +224</option>
                                                <option value="+225">CI +225</option>
                                                <option value="+226">BF +226</option>
                                                <option value="+227">NE +227</option>
                                                <option value="+228">TG +228</option>
                                                <option value="+229">BJ +229</option>
                                                <option value="+230">MU +230</option>
                                                <option value="+231">LR +231</option>
                                                <option value="+232">SL +232</option>
                                                <option value="+233">GH +233</option>
                                                <option value="+234">NG +234</option>
                                                <option value="+235">TD +235</option>
                                                <option value="+236">CF +236</option>
                                                <option value="+237">CM +237</option>
                                                <option value="+238">CV +238</option>
                                                <option value="+239">ST +239</option>
                                                <option value="+240">GQ +240</option>
                                                <option value="+241">GA +241</option>
                                                <option value="+242">CG +242</option>
                                                <option value="+243">ZR +243</option>
                                                <option value="+244">AO +244</option>
                                                <option value="+245">GW +245</option>
                                                <option value="+246">BB +246</option>
                                                <option value="+248">SC +248</option>
                                                <option value="+249">SD +249</option>
                                                <option value="+250">RW +250</option>
                                                <option value="+251">ET +251</option>
                                                <option value="+252">SO +252</option>
                                                <option value="+253">DJ +253</option>
                                                <option value="+254">KE +254</option>
                                                <option value="+255">TZ +255</option>
                                                <option value="+256">UG +256</option>
                                                <option value="+257">BI +257</option>
                                                <option value="+258">MZ +258</option>
                                                <option value="+260">ZM +260</option>
                                                <option value="+261">MG +261</option>
                                                <option value="+263">ZW +263</option>
                                                <option value="+264">NA +264</option>
                                                <option value="+265">MW +265</option>
                                                <option value="+266">LS +266</option>
                                                <option value="+267">BW +267</option>
                                                <option value="+268">SZ +268</option>
                                                <option value="+269">KM +269</option>
                                                <option value="+27">ZA +27</option>
                                                <option value="+290">SH +290</option>
                                                <option value="+299">GL +299</option>
                                                <option value="+30">GR +30</option>
                                                <option value="+31">NL +31</option>
                                                <option value="+32">BE +32</option>
                                                <option value="+33">FR +33</option>
                                                <option value="+34">ES +34</option>
                                                <option value="+345">KY +345</option>
                                                <option value="+351">PT +351</option>
                                                <option value="+352">LU +352</option>
                                                <option value="+353">IE +353</option>
                                                <option value="+354">IS +354</option>
                                                <option value="+355">AL +355</option>
                                                <option value="+356">MT +356</option>
                                                <option value="+357">CY +357</option>
                                                <option value="+358">FI +358</option>
                                                <option value="+359">BG +359</option>
                                                <option value="+36">HU +36</option>
                                                <option value="+370">LT +370</option>
                                                <option value="+371">LV +371</option>
                                                <option value="+372">EE +372</option>
                                                <option value="+373">MD +373</option>
                                                <option value="+374">AM +374</option>
                                                <option value="+375">BY +375</option>
                                                <option value="+376">AD +376</option>
                                                <option value="+377">MC +377</option>
                                                <option value="+378">SM +378</option>
                                                <option value="+380">UA +380</option>
                                                <option value="+381">RS +381</option>
                                                <option value="+382">ME +382</option>
                                                <option value="+385">HR +385</option>
                                                <option value="+386">SI +386</option>
                                                <option value="+387">BA +387</option>
                                                <option value="+389">MK +389</option>
                                                <option value="+39">IT +39</option>
                                                <option value="+40">RO +40</option>
                                                <option value="+41">CH +41</option>
                                                <option value="+420">CZ +420</option>
                                                <option value="+421">SK +421</option>
                                                <option value="+423">LI +423</option>
                                                <option value="+43">AT +43</option>
                                                <option value="+44">GB +44</option>
                                                <option value="+441">BM +441</option>
                                                <option value="+45">DK +45</option>
                                                <option value="+46">SE +46</option>
                                                <option value="+47">NO +47</option>
                                                <option value="+473">GD +473</option>
                                                <option value="+48">PL +48</option>
                                                <option value="+49">DE +49</option>
                                                <option value="+501">BZ +501</option>
                                                <option value="+502">GT +502</option>
                                                <option value="+503">SV +503</option>
                                                <option value="+504">HN +504</option>
                                                <option value="+505">NI +505</option>
                                                <option value="+506">CR +506</option>
                                                <option value="+507">PA +507</option>
                                                <option value="+509">HT +509</option>
                                                <option value="+51">PE +51</option>
                                                <option value="+52">MX +52</option>
                                                <option value="+53">CU +53</option>
                                                <option value="+54">AR +54</option>
                                                <option value="+55">BR +55</option>
                                                <option value="+56">CL +56</option>
                                                <option value="+57">CO +57</option>
                                                <option value="+58">VE +58</option>
                                                <option value="+591">BO +591</option>
                                                <option value="+592">GY +592</option>
                                                <option value="+593">EC +593</option>
                                                <option value="+595">PY +595</option>
                                                <option value="+597">SR +597</option>
                                                <option value="+598">UY +598</option>
                                                <option value="+60">MY +60</option>
                                                <option value="+61">AU +61</option>
                                                <option value="+62">ID +62</option>
                                                <option value="+63">PH +63</option>
                                                <option value="+64">NZ +64</option>
                                                <option value="+65">SG +65</option>
                                                <option value="+66">TH +66</option>
                                                <option value="+664">MS +664</option>
                                                <option value="+673">BN +673</option>
                                                <option value="+674">NR +674</option>
                                                <option value="+675">PG +675</option>
                                                <option value="+676">TO +676</option>
                                                <option value="+677">SB +677</option>
                                                <option value="+678">VU +678</option>
                                                <option value="+679">FJ +679</option>
                                                <option value="+685">WS +685</option>
                                                <option value="+686">KI +686</option>
                                                <option value="+691">FM +691</option>
                                                <option value="+7">RU +7</option>
                                                <option value="+758">LC +758</option>
                                                <option value="+767">DM +767</option>
                                                <option value="+784">VC +784</option>
                                                <option value="+809">DO +809</option>
                                                <option value="+81">JP +81</option>
                                                <option value="+82">KR +82</option>
                                                <option value="+84">VN +84</option>
                                                <option value="+850">KP +850</option>
                                                <option value="+852">HK +852</option>
                                                <option value="+853">MO +853</option>
                                                <option value="+855">KH +855</option>
                                                <option value="+856">LA +856</option>
                                                <option value="+86">CN +86</option>
                                                <option value="+868">TT +868</option>
                                                <option value="+869">KN +869</option>
                                                <option value="+876">JM +876</option>
                                                <option value="+880">BD +880</option>
                                                <option value="+886">TW +886</option>
                                                <option value="+90">TR +90</option>
                                                <option value="+91">IN +91</option>
                                                <option value="+92">PK +92</option>
                                                <option value="+93">AF +93</option>
                                                <option value="+94">LK +94</option>
                                                <option value="+95">MM +95</option>
                                                <option value="+960">MV +960</option>
                                                <option value="+961">LB +961</option>
                                                <option value="+962">JO +962</option>
                                                <option value="+963">SY +963</option>
                                                <option value="+964">IQ +964</option>
                                                <option value="+965">KW +965</option>
                                                <option value="+966">SA +966</option>
                                                <option value="+967">YE +967</option>
                                                <option value="+968">OM +968</option>
                                                <option value="+971">AE +971</option>
                                                <option value="+972">IL +972</option>
                                                <option value="+973">BH +973</option>
                                                <option value="+974">QA +974</option>
                                                <option value="+975">BT +975</option>
                                                <option value="+976">MN +976</option>
                                                <option value="+977">NP +977</option>
                                                <option value="+98">IR +98</option>
                                                <option value="+993">TM +993</option>
                                                <option value="+994">AZ +994</option>
                                                <option value="+995">GE +995</option>
                                                <option value="+996">KG +996</option>
                                                <option value="+998">UZ +998</option>
                                            </select>
                                            <input type="tel" class="form-control" placeholder="Phone*" name="number" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <select id="budget" class="form-control" name="budget" autocomplete="off" required>
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
                                        <select id="prefer" class="form-control" name="prefer" autocomplete="off" required>
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

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="2" style="height: auto;" placeholder="Message" autocomplete="off" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button class="btn bg_default_blue formbuttonhide w-100" name="form_submit"> Send Message</button>
                                    <p class="btn bg_default_blue formbuttonshow w-100" style="display: none;  cursor: not-allowed! important; opacity:0.5; float:right; background-color: #4A25AA; border-radius:10px; font-size: medium;"> Please wait</p>
                                </div>

                                <p class="mt-3">By Send Message you agree to our <a href="https://sisgain.com/terms-condition" target="_blank" style="color: #cc0f0f;">terms &amp;
                                        conditions </a> and our <a href="https://sisgain.com/privacy-policy" target="_blank" style="color: #cc0f0f;">privacy policy.</a></p>

                            </div>
                        </form>


                    </div>
                </div>
            </div>



        </div>
    </div>
</div>


<!-- company profile download -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight:600">Download Company Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close modal">✖</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body contact__sec">

                <form action="../mail.php" method="post" onsubmit="return form_validate();" style="padding:10px 20px">
                    <input type="hidden" name="comingfrom" value="Download Company Profile <?php echo $data ?> (Blog)">
                    <input type="hidden" name="preventfromrobo2">


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name*" name="name" autocomplete="off" required>
                    </div>




                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email*" name="email" autocomplete="off" required>
                    </div>


                    <div class="form-group">
                        <div style="display: flex;">
                            <select style="width:80px; padding: 0; margin: 0;" id="countrycode" name="countrycode" autocomplete="off">
                                <option value="+1" selected="selected">US +1</option>
                                <option value="+20">EG +20</option>
                                <option value="+212">MA +212</option>
                                <option value="+213">DZ +213</option>
                                <option value="+216">TN +216</option>
                                <option value="+218">LY +218</option>
                                <option value="+220">GM +220</option>
                                <option value="+221">SN +221</option>
                                <option value="+222">MR +222</option>
                                <option value="+223">ML +223</option>
                                <option value="+224">GN +224</option>
                                <option value="+225">CI +225</option>
                                <option value="+226">BF +226</option>
                                <option value="+227">NE +227</option>
                                <option value="+228">TG +228</option>
                                <option value="+229">BJ +229</option>
                                <option value="+230">MU +230</option>
                                <option value="+231">LR +231</option>
                                <option value="+232">SL +232</option>
                                <option value="+233">GH +233</option>
                                <option value="+234">NG +234</option>
                                <option value="+235">TD +235</option>
                                <option value="+236">CF +236</option>
                                <option value="+237">CM +237</option>
                                <option value="+238">CV +238</option>
                                <option value="+239">ST +239</option>
                                <option value="+240">GQ +240</option>
                                <option value="+241">GA +241</option>
                                <option value="+242">CG +242</option>
                                <option value="+243">ZR +243</option>
                                <option value="+244">AO +244</option>
                                <option value="+245">GW +245</option>
                                <option value="+246">BB +246</option>
                                <option value="+248">SC +248</option>
                                <option value="+249">SD +249</option>
                                <option value="+250">RW +250</option>
                                <option value="+251">ET +251</option>
                                <option value="+252">SO +252</option>
                                <option value="+253">DJ +253</option>
                                <option value="+254">KE +254</option>
                                <option value="+255">TZ +255</option>
                                <option value="+256">UG +256</option>
                                <option value="+257">BI +257</option>
                                <option value="+258">MZ +258</option>
                                <option value="+260">ZM +260</option>
                                <option value="+261">MG +261</option>
                                <option value="+263">ZW +263</option>
                                <option value="+264">NA +264</option>
                                <option value="+265">MW +265</option>
                                <option value="+266">LS +266</option>
                                <option value="+267">BW +267</option>
                                <option value="+268">SZ +268</option>
                                <option value="+269">KM +269</option>
                                <option value="+27">ZA +27</option>
                                <option value="+290">SH +290</option>
                                <option value="+299">GL +299</option>
                                <option value="+30">GR +30</option>
                                <option value="+31">NL +31</option>
                                <option value="+32">BE +32</option>
                                <option value="+33">FR +33</option>
                                <option value="+34">ES +34</option>
                                <option value="+345">KY +345</option>
                                <option value="+351">PT +351</option>
                                <option value="+352">LU +352</option>
                                <option value="+353">IE +353</option>
                                <option value="+354">IS +354</option>
                                <option value="+355">AL +355</option>
                                <option value="+356">MT +356</option>
                                <option value="+357">CY +357</option>
                                <option value="+358">FI +358</option>
                                <option value="+359">BG +359</option>
                                <option value="+36">HU +36</option>
                                <option value="+370">LT +370</option>
                                <option value="+371">LV +371</option>
                                <option value="+372">EE +372</option>
                                <option value="+373">MD +373</option>
                                <option value="+374">AM +374</option>
                                <option value="+375">BY +375</option>
                                <option value="+376">AD +376</option>
                                <option value="+377">MC +377</option>
                                <option value="+378">SM +378</option>
                                <option value="+380">UA +380</option>
                                <option value="+381">RS +381</option>
                                <option value="+382">ME +382</option>
                                <option value="+385">HR +385</option>
                                <option value="+386">SI +386</option>
                                <option value="+387">BA +387</option>
                                <option value="+389">MK +389</option>
                                <option value="+39">IT +39</option>
                                <option value="+40">RO +40</option>
                                <option value="+41">CH +41</option>
                                <option value="+420">CZ +420</option>
                                <option value="+421">SK +421</option>
                                <option value="+423">LI +423</option>
                                <option value="+43">AT +43</option>
                                <option value="+44">GB +44</option>
                                <option value="+441">BM +441</option>
                                <option value="+45">DK +45</option>
                                <option value="+46">SE +46</option>
                                <option value="+47">NO +47</option>
                                <option value="+473">GD +473</option>
                                <option value="+48">PL +48</option>
                                <option value="+49">DE +49</option>
                                <option value="+501">BZ +501</option>
                                <option value="+502">GT +502</option>
                                <option value="+503">SV +503</option>
                                <option value="+504">HN +504</option>
                                <option value="+505">NI +505</option>
                                <option value="+506">CR +506</option>
                                <option value="+507">PA +507</option>
                                <option value="+509">HT +509</option>
                                <option value="+51">PE +51</option>
                                <option value="+52">MX +52</option>
                                <option value="+53">CU +53</option>
                                <option value="+54">AR +54</option>
                                <option value="+55">BR +55</option>
                                <option value="+56">CL +56</option>
                                <option value="+57">CO +57</option>
                                <option value="+58">VE +58</option>
                                <option value="+591">BO +591</option>
                                <option value="+592">GY +592</option>
                                <option value="+593">EC +593</option>
                                <option value="+595">PY +595</option>
                                <option value="+597">SR +597</option>
                                <option value="+598">UY +598</option>
                                <option value="+60">MY +60</option>
                                <option value="+61">AU +61</option>
                                <option value="+62">ID +62</option>
                                <option value="+63">PH +63</option>
                                <option value="+64">NZ +64</option>
                                <option value="+65">SG +65</option>
                                <option value="+66">TH +66</option>
                                <option value="+664">MS +664</option>
                                <option value="+673">BN +673</option>
                                <option value="+674">NR +674</option>
                                <option value="+675">PG +675</option>
                                <option value="+676">TO +676</option>
                                <option value="+677">SB +677</option>
                                <option value="+678">VU +678</option>
                                <option value="+679">FJ +679</option>
                                <option value="+685">WS +685</option>
                                <option value="+686">KI +686</option>
                                <option value="+691">FM +691</option>
                                <option value="+7">RU +7</option>
                                <option value="+758">LC +758</option>
                                <option value="+767">DM +767</option>
                                <option value="+784">VC +784</option>
                                <option value="+809">DO +809</option>
                                <option value="+81">JP +81</option>
                                <option value="+82">KR +82</option>
                                <option value="+84">VN +84</option>
                                <option value="+850">KP +850</option>
                                <option value="+852">HK +852</option>
                                <option value="+853">MO +853</option>
                                <option value="+855">KH +855</option>
                                <option value="+856">LA +856</option>
                                <option value="+86">CN +86</option>
                                <option value="+868">TT +868</option>
                                <option value="+869">KN +869</option>
                                <option value="+876">JM +876</option>
                                <option value="+880">BD +880</option>
                                <option value="+886">TW +886</option>
                                <option value="+90">TR +90</option>
                                <option value="+91">IN +91</option>
                                <option value="+92">PK +92</option>
                                <option value="+93">AF +93</option>
                                <option value="+94">LK +94</option>
                                <option value="+95">MM +95</option>
                                <option value="+960">MV +960</option>
                                <option value="+961">LB +961</option>
                                <option value="+962">JO +962</option>
                                <option value="+963">SY +963</option>
                                <option value="+964">IQ +964</option>
                                <option value="+965">KW +965</option>
                                <option value="+966">SA +966</option>
                                <option value="+967">YE +967</option>
                                <option value="+968">OM +968</option>
                                <option value="+971">AE +971</option>
                                <option value="+972">IL +972</option>
                                <option value="+973">BH +973</option>
                                <option value="+974">QA +974</option>
                                <option value="+975">BT +975</option>
                                <option value="+976">MN +976</option>
                                <option value="+977">NP +977</option>
                                <option value="+98">IR +98</option>
                                <option value="+993">TM +993</option>
                                <option value="+994">AZ +994</option>
                                <option value="+995">GE +995</option>
                                <option value="+996">KG +996</option>
                                <option value="+998">UZ +998</option>
                            </select>
                            <input type="tel" class="form-control" placeholder="Phone*" name="number" autocomplete="off" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Company Name" name="company_name" autocomplete="off">
                    </div>





                    <button class="btn bg_default_blue formbuttonhide w-100" name="form_submit2"> Send Message</button>
                    <p class="btn bg_default_blue formbuttonshow w-100" style="display: none;  cursor: not-allowed! important; opacity:0.5; float:right; background-color: #4A25AA; border-radius:10px"> Please wait</p>

                    <br>
                    <p class="mt-5">By Send Message you agree to our <a href="https://sisgain.com/terms-condition" target="_blank" style="color: #cc0f0f;">terms &amp;
                            conditions </a> and our <a href="https://sisgain.com/privacy-policy" target="_blank" style="color: #cc0f0f;">privacy policy.</a></p>


                </form>

            </div>



        </div>
    </div>
</div>


