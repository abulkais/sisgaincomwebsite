<?php
include("url-page.php");
?>
<div class="col-lg-3 col-md-3 col-sm-4 blog_body_r8_sec">

    <div style="position:sticky!important; top:90px!important;">
        <div class="form">
            <h5>Subscribe Us</h5>
            <form action="../mail" method="post" style="padding:0px" onsubmit="return form_validate();">
                <input type="hidden" name="preventfromrobo">
                <input type="hidden" id="comingfrom" name="comingfrom" value="<?php echo $data ?> (Blog Subscribe Us)" />

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name*" id="name" name="name" autocomplete="off" required="">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email*" id="email" name="email" autocomplete="off" required="">
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
                        <input type="tel" class="form-control" placeholder="Phone*" id="number" name="number" autocomplete="off" required="">
                    </div>
                </div>


                <button class="btn bg_default_blue w-100 formbuttonhide" name="subscribe_now"> Subscribe Now</button>
                <p class="btn bg_default_blue w-100 formbuttonshow" style="display: none;  cursor: not-allowed! important; opacity:0.5; float:right; background-color: #4A25AA; border-radius:10px; font-size:large"> Please wait</p>

            </form>

        </div>


        <center class="recent_post">
            <h5>Recent Post</h5>


            <div>
                <a href="how-much-does-android-app-development-cost-in-2024">
                    <img src="images/android-app-dev-cost.webp">
                    <p>How Much Does Android App Development Cost in 2024?</p>
                    <span><i class="fa fa-calendar"></i> 21 Feb 2024</span>
                </a>
            </div>


            <div>
                <a href="top-10-remote-patient-monitoring-companies-in-2024">
                    <img src="images/top-10-rpm.webp">
                    <p>Top 10 Remote Patient Monitoring Companies in 2024</p>
                    <span><i class="fa fa-calendar"></i> 20 Feb 2024</span>
                </a>
            </div>


            <div>
                <a href="ott-app-development-complete-guide-creating-an-ott-app-like-netflix">
                    <img src="images/ott-app-development.webp">
                    <p>OTT App Development Complete Guide: Creating an OTT App Like Netflix</p>
                    <span><i class="fa fa-calendar"></i> 16 Feb 2024</span>
                </a>
            </div>

            <div>
                <a href="healthcare-app-development-in-2024-a-step-by-step-guide">
                    <img src="images/healthcare_app.webp">
                    <p>Healthcare App Development in 2024: A Step-by-Step Guide</p>
                    <span><i class="fa fa-calendar"></i> 9 Feb 2024</span>
                </a>
            </div>
            
            <div>
                <a href="complete-guide-to-gaming-app-development-cost-time-and-process-in-usa">
                    <img src="images/game_app_development.webp">
                    <p>Complete Guide To Gaming App Development Cost, Time and Process in USA</p>
                    <span><i class="fa fa-calendar"></i> 8 Feb 2024</span>
                </a>
            </div>
            <div>
                <a href="build-essential-mobile-app-development-skills-for-your-career-development">
                    <img src="images/app_development_skills.webp">
                    <p>Build Essential Mobile App Development Skills for Your Career Development</p>
                    <span><i class="fa fa-calendar"></i> 2 Feb 2024</span>
                </a>
            </div>

            <div>
                <a href="the-transformative-impact-of-hospital-management-software-in-healthcare">
                    <img src="images/hospital_management_software.webp">
                    <p>The Transformative Impact of Hospital Management Software in Healthcare</p>
                    <span><i class="fa fa-calendar"></i> 30 Jan 2024</span>
                </a>
            </div>

            <div>
                <a href="which-is-the-best-telemedicine-app-development-company-in-india-for-healthcare-industries">
                    <img src="images/best_telemed_app.webp">
                    <p>Which Is The Best Telemedicine App Development Company In India For Healthcare Industries?</p>
                    <span><i class="fa fa-calendar"></i> 25 Jan 2024</span>
                </a>
            </div>


            <div>
                <a href="next-gen-custom-healthcare-software-development-in-2024">
                    <img src="images/next_genration_healthcare.webp">
                    <p>Next-Gen Custom Healthcare Software Development in 2024</p>
                    <span><i class="fa fa-calendar"></i> 24 Jan 2024</span>
                </a>
            </div>

            <div>
                <a href="the-evolution-of-emr-systems-from-paper-to-digital-records">
                    <img src="images/emr_system_blog.webp">
                    <p>The Evolution of EMR Systems: From Paper to Digital Records</p>
                    <span><i class="fa fa-calendar"></i> 20 Jan 2024</span>
                </a>
            </div>

            <div>
                <a href="top-10-must-follow-trends-for-android-application-development-in-2024">
                    <img src="images/top-10-android-app-dev.webp">
                    <p>Top 10 Must Follow Trends For Android Application Development in 2024</p>
                    <span><i class="fa fa-calendar"></i> 18 Jan 2024</span>
                </a>
            </div>
            <div>
                <a href="why-telemedicine-is-important-in-the-development-of-healthcare">
                    <img src="images/why_telemed_important.webp">
                    <p>Why Telemedicine Is Important In The Development Of Healthcare</p>
                    <span><i class="fa fa-calendar"></i> 13 Jan 2024</span>
                </a>
            </div>
            <div>
                <a href="follow-these-9-tips-to-choose-a-mobile-app-development-company">
                    <img src="images/choose-a-mobile-app.webp">
                    <p>Follow These 9 Tips To Choose A Mobile App Development Company</p>
                    <span><i class="fa fa-calendar"></i> 12 Jan 2024</span>
                </a>
            </div>

            <div>
                <a href="explore-the-difference-between-telehealth-and-telemedicine">
                    <img src="images/telehealth-telemedicine.webp">
                    <p>Explore The Difference Between Telehealth And Telemedicine</p>
                    <span><i class="fa fa-calendar"></i> 6 Jan 2024</span>
                </a>
            </div>

            <div>
                <a href="a-comprehensive-guide-to-hire-healthcare-mobile-app-developers">
                    <img src="images/a-comprehensive.webp">
                    <p>A Comprehensive Guide To Hire Healthcare Mobile App Developers</p>
                    <span><i class="fa fa-calendar"></i> 23 Dec 2023</span>
                </a>
            </div>

            <div>
                <a href="how-much-does-healthcare-app-development-cost-in-2024">
                    <img src="images/how_much_does.webp">
                    <p>How Much Does Healthcare App Development Cost In 2024?</p>
                    <span><i class="fa fa-calendar"></i> 20 Dec 2023</span>
                </a>
            </div>

            <div>
                <a href="telemedicine-in-rural-healthcare-benefits-and-challenges">
                    <img src="images/telemedicine_in_rural.webp">
                    <p>Telemedicine in Rural Healthcare: Benefits And Challenges</p>
                    <span><i class="fa fa-calendar"></i> 18 Dec 2023</span>
                </a>
            </div>


            <div>
                <a href="the-role-of-artificial-intelligence-in-healthcare-decision-making">
                    <img src="images/the-role-of-ai.webp">
                    <p>The Role of Artificial Intelligence in Healthcare Decision-Making</p>
                    <span><i class="fa fa-calendar"></i> 11 Dec 2023</span>
                </a>
            </div>

            <div>
                <a href="8-ways-remote-patient-monitoring-is-revolutionising-healthcare">
                    <img src="images/8ways-rpm.webp">
                    <p>8 Ways Remote Patient Monitoring Is Revolutionising Healthcare</p>
                    <span><i class="fa fa-calendar"></i> 03 Dec 2023</span>
                </a>
            </div>

            <div>
                <a href="telemedicine-app-development-features-for-patients-and-doctors">
                    <img src="images/telemedicine-app-development.webp">
                    <p>Telemedicine App Development: Features For Patients And Doctors</p>
                    <span><i class="fa fa-calendar"></i> 01 Dec 2023</span>
                </a>
            </div>

            <div>
                <a href="telemedicine-app-development-features-for-patients-and-doctors">
                    <img src="images/the-top-12-medical-app.webp">
                    <p>The Top 12 Medical Apps for Patients and Doctors in 2024</p>
                    <span><i class="fa fa-calendar"></i> 08 Nov 2023</span>
                </a>
            </div>


            <div>
                <a href="beyond-the-basics-advanced-strategies-for-react-native-app-development">
                    <img src="images/beyond-the-basics-advanced.webp">
                    <p>Beyond the Basics: Advanced Strategies for React Native App Development</p>
                    <span><i class="fa fa-calendar"></i> 23 Aug 2023</span>
                </a>
            </div>

            <div>
                <a href="creating-love-connections-the-expense-of-a-tinder-like-app">
                    <img src="images/creating-love-connections.webp">
                    <p>Creating Love Connections: The Expense of a Tinder-like App</p>
                    <span><i class="fa fa-calendar"></i> 23 Aug 2023</span>
                </a>
            </div>


            <div>
                <a href="price-of-innovation-mobile-app-development-in-2023">
                    <img src="images/price-of-innovation.webp">
                    <p>Price of Innovation: Mobile App Development in 2023</p>
                    <span><i class="fa fa-calendar"></i> 22 Aug 2023</span>
                </a>
            </div>

            <div>
                <a href="building-your-own-threads-like-app-easy-steps-features-and-pricing">
                    <img src="images/building-your-own-thread.webp">
                    <p>Building Your Own Threads-Like App: Easy Steps, Features, and Pricing</p>
                    <span><i class="fa fa-calendar"></i> 19 Jul 2023</span>
                </a>
            </div>

            <div>
                <a href="flutter-vs-swift-for-ios-app-development-a-comparative-analysis">
                    <img src="images/flutter-vs-swift-for-ios-app-development.webp">
                    <p>Flutter vs. Swift for iOS App Development: A Comparative Analysis</p>
                    <span><i class="fa fa-calendar"></i> 12 Jul 2023</span>
                </a>
            </div>


            <div>
                <a href="the-10-most-important-steps-in-mobile-app-development-ultimate-guide">
                    <img src="images/the-10-most-important-steps-in-mobile-app.webp">
                    <p>The 10 Most Important Steps in Mobile App Development | Ultimate Guide</p>
                    <span><i class="fa fa-calendar"></i> 5 Jul 2023</span>
                </a>
            </div>

            <div>
                <a href="5-benefits-of-hl7-integration-solutions-for-healthcare-organizations">
                    <img src="images/HL7-Integration.webp">
                    <p>5 Benefits of HL7 Integration Solutions for Healthcare Organizations</p>
                    <span><i class="fa fa-calendar"></i> 28 Jul 2023</span>
                </a>
            </div>

            <div>
                <a href="10-best-intermittent-fasting-apps-for-fitness-success-in-2023">
                    <img src="images/best_international.webp">
                    <p>10 Best Intermittent Fasting Apps for Fitness Success in 2023</p>
                    <span><i class="fa fa-calendar"></i> 20 Jul 2023</span>
                </a>
            </div>

            <div>
                <a href="10-highly-recommended-databases-for-web-application-development">
                    <img src="images/dbforweb.webp">
                    <p>10 Highly Recommended Databases for Web Application Development</p>
                    <span><i class="fa fa-calendar"></i> 10 Jul 2023</span>
                </a>
            </div>

            <div>
                <a href="boosting-your-online-store-with-magento-e-commerce-development-key-benefits-in-2023">
                    <img src="images/magento_dev.webp">
                    <p>Boosting Your Online Store with Magento E-Commerce Development: Key Benefits in 2023</p>
                    <span><i class="fa fa-calendar"></i> 1 Jul 2023</span>
                </a>
            </div>

            <div>
                <a href="building-a-mobile-wallet-app-like-paypal-key-strategies-for-efficiency-and-success">
                    <img src="images/building-a-mobile-app.webp">
                    <p>Building a Mobile Wallet App Like PayPal: Key Strategies for Efficiency and Success</p>
                    <span><i class="fa fa-calendar"></i> 25 Jun 2023</span>
                </a>
            </div>

            <div>
                <a href="data-security-in-the-cloud-strategies-to-safeguard-enterprise-information">
                    <img src="images/data-security.webp">
                    <p>Data Security in the Cloud: Strategies to Safeguard Enterprise Information</p>
                    <span><i class="fa fa-calendar"></i> 20 Jun 2023</span>
                </a>
            </div>

            <div>
                <a href="designing-your-perfect-lims-software-understanding-the-purpose-and-implementation">
                    <img src="images/lims_software.webp">
                    <p>Designing Your Perfect LIMS Software: Understanding the Purpose and Implementation</p>
                    <span><i class="fa fa-calendar"></i> 10 Jun 2023</span>
                </a>
            </div>

            <div>
                <a href="expert-recommended-web-development-tools-boost-your-development-workflow">
                    <img src="images/web-dev.webp">
                    <p>Expert-Recommended Web Development Tools: Boost Your Development Workflow</p>
                    <span><i class="fa fa-calendar"></i> 5 Jun 2023</span>
                </a>
            </div>

            <div>
                <a href="from-idea-to-execution-a-non-tech-founders-guide-to-recruiting-developers-for-startups">
                    <img src="images/dev_for_startup.webp">
                    <p>From Idea to Execution: A Non-Tech Founder's Guide to Recruiting Developers for Startups</p>
                    <span><i class="fa fa-calendar"></i> 1 Jun 2023</span>
                </a>
            </div>

            <div>
                <a href="hl7-version-2-vs-version-3-which-one-is-the-best-fit-for-your-organization">
                    <img src="images/hl7-version.webp">
                    <p>HL7 Version 2 vs Version 3: Which one is the best fit for your organization?</p>
                    <span><i class="fa fa-calendar"></i> 25 May 2023</span>
                </a>
            </div>

            <div>
                <a href="how-can-remote-patient-monitoring-be-integrated-into-existing-healthcare-workflows">
                    <img src="images/rpm-be-integrated.webp">
                    <p>How can remote patient monitoring be integrated into existing healthcare workflows?</p>
                    <span><i class="fa fa-calendar"></i> 20 May 2023</span>
                </a>
            </div>

            <div>
                <a href="iot-revolutionizing-logistics-and-supply-chain-unlocking-benefits-exploring-use-cases-and-confronting-challenges">
                    <img src="images/iot.webp">
                    <p>IoT Revolutionizing Logistics and Supply Chain: Unlocking Benefits, Exploring Use Cases, and Confronting Challenges</p>
                    <span><i class="fa fa-calendar"></i> 15 May 2023</span>
                </a>
            </div>

            <div>
                <a href="make-your-iphone-talk-building-a-voice-assistant-app-like-siri">
                    <img src="images/iphone-talk-hey-siri.webp">
                    <p>Make Your iPhone Talk: Building a Voice Assistant App like Siri</p>
                    <span><i class="fa fa-calendar"></i> 10 May 2023</span>
                </a>
            </div>

            <div>
                <a href="ott-app-development-cost-explained-what-you-need-to-know">
                    <img src="images/ott-app-dev.webp">
                    <p>OTT App Development Cost Explained: What You Need to Know</p>
                    <span><i class="fa fa-calendar"></i> 5 May 2023</span>
                </a>
            </div>

            <div>
                <a href="telehealth-for-remote-patient-monitoring-an-essential-tool-for-the-modern-age">
                    <img src="images/telehealth-for-rpm.webp">
                    <p>Telehealth for Remote Patient Monitoring: An Essential Tool for the Modern Age</p>
                    <span><i class="fa fa-calendar"></i> 1 May 2023</span>
                </a>
            </div>



            <div>
                <a href="telemedicine-vs-in-person-visits-which-is-better-for-you">
                    <img src="images/telemedicine-vs-person-visits.webp">
                    <p>Telemedicine vs. In-Person Visits: Which Is Better for You?</p>
                    <span><i class="fa fa-calendar"></i> 25 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="the-benefits-and-challenges-of-implementing-electronic-health-records">
                    <img src="images/ehr.webp">
                    <p>The Benefits and Challenges of Implementing Electronic Health Records</p>
                    <span><i class="fa fa-calendar"></i> 20 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="the-complete-guide-to-developing-a-hotel-booking-app-costs-and-key-features-2023">
                    <img src="images/hotel-booking.webp">
                    <p>The Complete Guide to Developing a Hotel Booking App: Costs and Key Features (2023)</p>
                    <span><i class="fa fa-calendar"></i> 15 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="the-future-of-telemedicine-transforming-healthcare-with-technology">
                    <img src="images/the_future_of_telemed.webp">
                    <p>The Future of Telemedicine: Transforming Healthcare with Technology</p>
                    <span><i class="fa fa-calendar"></i> 10 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="the-price-tag-of-building-a-job-portal-like-glassdoor-what-to-expect">
                    <img src="images/job_glassdoor.webp">
                    <p>The Price Tag of Building a Job Portal like Glassdoor: What to Expect</p>
                    <span><i class="fa fa-calendar"></i> 7 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="the-price-tag-of-developing-a-saas-application-on-aws-a-comprehensive-breakdown">
                    <img src="images/price_of_saas_app.webp">
                    <p>The Price Tag of Developing a SaaS Application on AWS: A Comprehensive Breakdown</p>
                    <span><i class="fa fa-calendar"></i> 4 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="top-15-hookup-apps-for-2023-find-casual-connections-free-hookup-sites">
                    <img src="images/top-15-hooks.webp">
                    <p>Top 15 Hookup Apps for 2023: Find Casual Connections & Free Hookup Sites</p>
                    <span><i class="fa fa-calendar"></i> 1 Apr 2023</span>
                </a>
            </div>

            <div>
                <a href="top-notch-development-tools-and-ides-for-golang-coders">
                    <img src="images/top-notch-blogs.webp">
                    <p>Top-notch Development Tools and IDEs for Golang Coders</p>
                    <span><i class="fa fa-calendar"></i> 25 Mar 2023</span>
                </a>
            </div>

            <div>
                <a href="user-interface-vs-user-experience-a-guide-to-mobile-app-design-basics">
                    <img src="images/userinterface.webp">
                    <p>User Interface vs. User Experience: A Guide to Mobile App Design Basics</p>
                    <span><i class="fa fa-calendar"></i> 20 Mar 2023</span>
                </a>
            </div>

            <div>
                <a href="what-is-the-difference-between-telehealth-and-telemedicine">
                    <img src="images/telehealth-and-telemedicine.webp">
                    <p>What is the Difference between Telehealth and Telemedicine</p>
                    <span><i class="fa fa-calendar"></i> 15 Mar 2023</span>
                </a>
            </div>

            <div>
                <a href="whats-the-price-tag-for-building-a-website-in-2023">
                    <img src="images/pricetag_build-website.webp">
                    <p>What's the Price Tag for Building a Website in 2023</p>
                    <span><i class="fa fa-calendar"></i> 10 Mar 2023</span>
                </a>
            </div>


            <div>
                <a href="why-drupal-is-the-best-cms-for-enterprise-level-websites">
                    <img src="images/drupal_is_best_cms.webp">
                    <p>Why Drupal is the best CMS for enterprise-level websites</p>
                    <span><i class="fa fa-calendar"></i> 5 Mar 2023</span>
                </a>
            </div>




        </center>

        <div class="categories">
            <h5>Categories</h5>
            <ul>
                <li><a href="">Mobile App Development</a></li>
                <li> <a href="">Cloud and DevOps</a></li>
                <li> <a href="">Healthcare</a></li>
                <li> <a href="">IT Consulting</a></li>
                <li> <a href="">Software Development</a></li>
            </ul>
        </div>
    </div>



</div>


<div class="social_share">
    <div class="box-shadow-medium social_share_sec">
        <div class="share-icon"><a data-value="Linkedin" title="Linkedin" href="<?php echo $linkedin_share_link ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" rel="nofollow"><span class="sisgain-blog-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27" height="27" viewBox="0 0 48 48">
                        <path fill="#0288D1" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path>
                        <path fill="#FFF" d="M12 19H17V36H12zM14.485 17h-.028C12.965 17 12 15.888 12 14.499 12 13.08 12.995 12 14.514 12c1.521 0 2.458 1.08 2.486 2.499C17 15.887 16.035 17 14.485 17zM36 36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698-1.501 0-2.313 1.012-2.707 1.99C24.957 25.543 25 26.511 25 27v9h-5V19h5v2.616C25.721 20.5 26.85 19 29.738 19c3.578 0 6.261 2.25 6.261 7.274L36 36 36 36z"></path>
                    </svg></span></a></div>
        <div class="share-icon"><a data-value="twitter" title="twitter" href="<?php echo $twitter_share_link ?>" onclick="javascript:window.open(this.href,'_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" rel="nofollow"><span class="sisgain-blog-icon sisgain-tw"></span></a></div>
        <div class="share-icon"><a data-value="facebook" title="facebook" href="<?php echo $facebook_share_link ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" rel="nofollow"><span class="sisgain-blog-icon sisgain-fb"></span></a></div>
    </div>
</div>