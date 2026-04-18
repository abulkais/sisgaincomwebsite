<!-- NAVBAR -->
<nav class="navbar">
  <a href="https://sisgain.com/" class="logo">
    <img loading="lazy" src="https://sisgain.com/assets/images/logo.webp" alt="Sisgain Logo">
  </a>
  <ul class="nav-links">
    <li class="nav-item" id="svcItem">
      <button class="nav-btn" id="svcBtn" onclick="toggleMenu()">
        Services
        <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>
    </li>
    <li class="nav-item" id="indItem">
      <button class="nav-btn" id="indBtn" onclick="toggleIndustries()">
        Industries
        <svg class="chev" width="11" height="11" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>
    </li>
    <li class="nav-item"><a href="https://sisgain.com/portfolio" class="nav-btn">Portfolio</a></li>
    <li class="nav-item"><a href="https://sisgain.com/about-us" class="nav-btn">About</a></li>
    <li class="nav-item"><a href="https://sisgain.com/blogs/" class="nav-btn">Blog</a></li>
  </ul>

  <div class="nav-actions">
    <a href="https://wa.me/919212080630?text=Hi, I want to know more about your services." target="blank" aria-label="Contact us on WhatsApp" class="btn-whatsapp-pulse2">
      <img loading="lazy" src="https://sisgain.com/assets/images/WhatsApp.svg.webp" alt="whatsapp icon">
    </a>
    <button data-toggle="modal" data-target="#myModal" class="btn-primary">Get a Quote</button>
  </div>
  <button class="hamburger" id="ham" onclick="toggleMob()"><span></span><span></span><span></span></button>
</nav>

<!-- ════════════════════════════════════════
  MEGA MENU
════════════════════════════════════════ -->


<div class="mega-wrap" id="megaWrap">
  <div class="mega-inner">

    <!-- TOP STATS BAR -->
    <div class="mm-topbar">
      <div class="mm-topbar-title">Our Services</div>
      <div class="mm-topbar-right">
        <div class="mm-topbar-stat"><span class="mm-topbar-stat-num">500+</span><span class="mm-topbar-stat-lbl">Projects Delivered</span></div>
        <div class="mm-topbar-divider"></div>
        <div class="mm-topbar-stat"><span class="mm-topbar-stat-num">40+</span><span class="mm-topbar-stat-lbl">Countries Served</span></div>
        <div class="mm-topbar-divider"></div>
        <div class="mm-topbar-stat"><span class="mm-topbar-stat-num">200+</span><span class="mm-topbar-stat-lbl">Expert Developers</span></div>
        <div class="mm-topbar-divider"></div>
        <div class="mm-topbar-stat"><span class="mm-topbar-stat-num">98%</span><span class="mm-topbar-stat-lbl">Client Satisfaction</span></div>
      </div>
    </div>

    <!-- UNIFIED SCROLLABLE GRID -->
    <div class="mm-scroll">
      <div class="mm-grid">

        <!-- ══ COL 1 ══ -->
        <div class="mm-col">

          <!-- 1. AI & Intelligent Solutions -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>AI &amp; Intelligent Solutions</div>

            <a href="https://sisgain.com/ai-software-development-company" class="mm-svc-link">AI Software Development</a>
            <a href="https://sisgain.com/generative-ai-development-services" class="mm-svc-link">Generative AI Development</a>
            <a href="https://sisgain.com/chatbot-solution" class="mm-svc-link">AI Chatbot &amp; Virtual Assistant</a>
            <a href="https://sisgain.com/ai-agent-development-services" class="mm-svc-link">AI Agents / Copilot Development</a>
            <a href="https://sisgain.com/rag-solutions" class="mm-svc-link">RAG Solutions</a>
            <a href="https://sisgain.com/ai-automation-workflow-solutions" class="mm-svc-link">AI Automation &amp; Workflow Solutions</a>
            <a href="https://sisgain.com/machine-learning-development-services" class="mm-svc-link">Machine Learning Solutions</a>
            <a href="https://sisgain.com/nlp-solutions" class="mm-svc-link">NLP Solutions</a>
            <a href="https://sisgain.com/computer-vision-solutions" class="mm-svc-link">Computer Vision Solutions</a>
            <a href="https://sisgain.com/multimodal-ai-development" class="mm-svc-link">Multimodal AI Development</a>
           
          </div>

          <!-- Enterprise & Product Engineering -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Enterprise &amp; Product Engineering</div>

            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link"> Software Development</a>
            <a href="https://sisgain.com/saas-development-company" class="mm-svc-link">SaaS Development</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">End-to-End Product Engineering</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Software Integration</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">API Development</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Digital Product Management</a>
            <a href="https://sisgain.com/devops-development-services" class="mm-svc-link">DevOps</a>
          </div>
        </div>

        <!-- ══ COL 2 ══ -->
        <div class="mm-col">

          <!-- Infrastructure & Cloud -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Infrastructure &amp; Cloud</div>

            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Infrastructure Management Services</a>
            <a href="https://sisgain.com/cloud-consulting/" class="mm-svc-link">Cloud Architecture &amp; Infrastructure</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Cloud Managed Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Cloud Migration &amp; Modernization</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">FinOps Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Kubernetes &amp; Containerization</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Serverless Architecture Development</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Platform Engineering</a>
          </div>



          <!-- Cybersecurity -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Cybersecurity &amp; Security Services</div>

            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Cybersecurity Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Cloud Security Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">SOC Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">IT Risk &amp; Compliance</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Zero Trust Security</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Identity &amp; Access Management (IAM)</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Endpoint Security</a>
          </div>




        </div>

        <!-- ══ COL 3 ══ -->
        <div class="mm-col">


          <!-- Application Development -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Application Development</div>

            <a href="https://sisgain.com/mobile-app-development-company" class="mm-svc-link">Mobile App Development</a>
            <a href="https://sisgain.com/cross-platform-application-development" class="mm-svc-link">Cross-Platform Development</a>
            <a href="https://sisgain.com/mobile-website-development" class="mm-svc-link">Web App Development</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">PWA Development</a>
            <a href="https://sisgain.com/ecommerce-app-development-services" class="mm-svc-link">E-commerce Development</a>
            <a href="https://sisgain.com/crm-development-company" class="mm-svc-link">CRM Development</a>
            <a href="https://sisgain.com/erp-development-company" class="mm-svc-link">ERP Development</a>
            <a href="https://sisgain.com/ott-app-development-company" class="mm-svc-link">OTT App Development</a>

          </div>


          <!-- Healthcare -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Healthcare Software</div>
            <a href="https://sisgain.com/telemedicine" class="mm-svc-link">Telemedicine App Development</a>
            <a href="https://sisgain.com/telehealth" class="mm-svc-link">Telehealth Solutions</a>
            <a href="https://sisgain.com/remote-patient-monitoring" class="mm-svc-link">Remote Patient Monitoring</a>
            <a href="https://sisgain.com/hospital-management" class="mm-svc-link">Hospital Management Systems</a>
            <a href="https://sisgain.com/ehr-emr-phr" class="mm-svc-link">EHR / EMR / PHR</a>
            <a href="https://sisgain.com/hl7" class="mm-svc-link">HL7 & FHIR Integration</a>
            <a href="https://sisgain.com/hie" class="mm-svc-link">HIE</a>
            <a href="https://sisgain.com/erx" class="mm-svc-link">ePrescription</a>
            <a href="https://sisgain.com/rcm" class="mm-svc-link">RCM</a>
          </div>




        </div>

        <!-- ══ COL 4 ══ -->
        <div class="mm-col">


          <!-- Emerging Technologies -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Emerging Technologies</div>
            <a href="https://sisgain.com/internet-of-things" class="mm-svc-link">IoT Development</a>
            <a href="https://sisgain.com/augmented-reality-service" class="mm-svc-link">AR/VR Development</a>
            <a href="https://sisgain.com/blockchain-development-company" class="mm-svc-link">Blockchain Development</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Digital Workplace Solutions</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">ITSM Solutions</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Super App Development</a>
          </div>



          <!-- Consulting -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Consulting Services</div>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Technology Consulting</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">IT Consulting</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Software Development Consulting</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Mobile App Consulting</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Fintech Consulting</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">AI Consulting</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Cloud Consulting</a>
          </div>

          <!-- Outsourcing -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Outsourcing &amp; Engagement</div>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Software Development Outsourcing</a>
            <a href="https://sisgain.com/hire-offshore-developer" class="mm-svc-link">Offshore Development</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Dedicated Development Teams</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">White Label Development</a>
          </div>

        </div>

        <!-- ══ COL 5 ══ -->
        <div class="mm-col">
          <!-- Digital Transformation -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>Digital Transformation</div>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Digital Transformation Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Cloud Transformation Services</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Application Modernization</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Legacy System Modernization</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Application Migration</a>
            <a href="https://sisgain.com/business-process-automation/" class="mm-svc-link">Business Process Automation</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Enterprise Workflow Automation</a>
          </div>

          <!-- UI/UX -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>UI/UX &amp; Design</div>
            <a href="https://sisgain.com/ui-ux-design-development" class="mm-svc-link">UI/UX Design</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Product Design</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Mobile-First Design</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Design Systems</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">UX Research &amp; Testing</a>
          </div>

          <!-- QA & Support -->
          <div class="mm-section">
            <div class="mm-cat-heading"><span class="mm-cat-heading-dot"></span>QA &amp; Support</div>

            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">QA & Testing</a>
            <a href="https://sisgain.com/automation-testing/" class="mm-svc-link">Automation Testing</a>
            <a href="https://sisgain.com/performance-testing/" class="mm-svc-link">Performance Testing</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">AI-Powered Monitoring & Observability</a>
            <a data-toggle="modal" data-target="#myModal" class="mm-svc-link">Support & Maintenance</a>
          </div>
        </div>



      </div><!-- /mm-grid -->
    </div><!-- /mm-scroll -->

    <!-- BOTTOM CTA -->
    <div class="mm-cta">
      <div class="mm-cta-left">
        <div class="mm-cta-text">Didn't find what you're looking for? <strong>Let us know your needs, and we'll tailor a solution just for you.</strong></div>
      </div>
      <button data-toggle="modal" data-target="#myModal" class="mm-cta-btn">Schedule Free Consultations</button>
    </div>

  </div>
</div><!-- /mega-wrap -->

<!-- ════════════════════════════════════════
  INDUSTRIES MEGA DROPDOWN (full-width)
════════════════════════════════════════ -->
<div class="ind-wrap" id="indWrap">
  <div class="ind-inner">
    <div class="ind-body">

      <div class="ind-section">
        <div class="ind-section-lbl">Core Industries</div>
        <div class="ind-grid">

          <a href="https://sisgain.com/healthcare" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
              </svg></div>
            <span class="ind-lname">Healthcare</span>
          </a>

          <a href="https://sisgain.com/fintech-app-development/" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="12" y1="1" x2="12" y2="23" />
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
              </svg></div>
            <span class="ind-lname">Fintech</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3" />
                <rect x="9" y="11" width="14" height="10" rx="2" />
              </svg></div>
            <span class="ind-lname">Aviation</span>
          </a>

          <a href="https://sisgain.com/real-estate-software-solutions" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg></div>
            <span class="ind-lname">Real Estate</span>
          </a>

          <a href="https://sisgain.com/logistic-software-development-company" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <rect x="1" y="3" width="15" height="13" />
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8" />
                <circle cx="5.5" cy="18.5" r="2.5" />
                <circle cx="18.5" cy="18.5" r="2.5" />
              </svg></div>
            <span class="ind-lname">Logistics</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <rect x="2" y="3" width="20" height="14" rx="2" />
                <path d="M8 21h8M12 17v4" />
              </svg></div>
            <span class="ind-lname">Gaming</span>
          </a>

          <a href="https://sisgain.com/food-delivery-app-development-company" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M18 8h1a4 4 0 0 1 0 8h-1" />
                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z" />
                <line x1="6" y1="1" x2="6" y2="4" />
                <line x1="10" y1="1" x2="10" y2="4" />
                <line x1="14" y1="1" x2="14" y2="4" />
              </svg></div>
            <span class="ind-lname">Food &amp; Beverages</span>
          </a>

          <a href="https://sisgain.com/travel-app-development-services" class="ind-link">

            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M3 11l19-9-9 19-2-8-8-2z" />
              </svg></div>
            <span class="ind-lname">Travel</span>
          </a>


          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M18 20V10" />
                <path d="M12 20V4" />
                <path d="M6 20v-6" />
              </svg></div>
            <span class="ind-lname">Telecommunications</span>
            </ad>
            <a href="https://sisgain.com/ecommerce-app-development-services" class="ind-link">
              <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                  <circle cx="9" cy="21" r="1" />
                  <circle cx="20" cy="21" r="1" />
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                </svg></div>
              <span class="ind-lname">eCommerce</span>
            </a>



            <a href="https://sisgain.com/government-app-development-company" class="ind-link">
              <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                  <path d="M9 22V12h6v10" />
                </svg></div>
              <span class="ind-lname">Government Sector</span>
            </a>

            <a data-toggle="modal" data-target="#myModal" class="ind-link">
              <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg></div>
              <span class="ind-lname">Mining</span>
            </a>

        </div>
      </div>

      <div class="ind-divider"></div>

      <div class="ind-section">
        <div class="ind-section-lbl">More Industries</div>
        <div class="ind-grid">

          <a href="https://sisgain.com/entertainment-app-development-company" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <polygon points="23 7 16 12 23 17 23 7" />
                <rect x="1" y="5" width="15" height="14" rx="2" />
              </svg></div>
            <span class="ind-lname">Media &amp; Entertainment</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
              </svg></div>
            <span class="ind-lname">Hospitality</span>
          </a>

          <a href="https://sisgain.com/education-app-development" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                <path d="M6 12v5c3 3 9 3 12 0v-5" />
              </svg></div>
            <span class="ind-lname">Education</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M4 4h16v2a8 8 0 0 1-16 0V4z" />
                <path d="M12 10v10" />
                <path d="M4 20h16" />
              </svg></div>
            <span class="ind-lname">Telecommunications</span>
          </a>

          <a href="https://sisgain.com/sports" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <circle cx="12" cy="12" r="10" />
                <polygon points="10 8 16 12 10 16 10 8" />
              </svg></div>
            <span class="ind-lname">Sports</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg></div>
            <span class="ind-lname">Retail</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                <polyline points="13 2 13 9 20 9" />
              </svg></div>
            <span class="ind-lname">Agribusiness</span>
          </a>

          <a data-toggle="modal" data-target="#myModal" class="ind-link">
            <div class="ind-dot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <circle cx="12" cy="12" r="3" />
                <path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83" />
              </svg></div>
            <span class="ind-lname">Utilities</span>
          </a>

        </div>
      </div>

    </div>

    <div class="ind-cta">
      <p>Don't see your industry? <strong>We serve every sector - let us know your needs and we'll tailor a solution.</strong></p>
      <button data-toggle="modal" data-target="#myModal" class="btn-primary ind-cta-btn">
        Schedule Free Consultations
      </button>
    </div>

  </div>
</div>
<!-- /ind-wrap -->

<!-- MOBILE MENU -->
<div class="mob-menu" id="mobMenu">
  <div class="mob-inner">
    <div class="mob-acc"><button class="mob-trigger" onclick="toggleAcc(this)">AI &amp; Intelligent Solutions <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg></button>
      <!-- AI & Intelligent Solutions -->
      <div class="mob-body">
        <a href="https://sisgain.com/ai-software-development-company" class="mob-svc">AI Software Development</a>
        <a href="https://sisgain.com/generative-ai-development-services" class="mob-svc">Generative AI Development</a>
        <a href="https://sisgain.com/chatbot-solution" class="mob-svc">AI Chatbot & Virtual Assistant Development</a>
        <a href="https://sisgain.com/ai-agent-development-services" class="mob-svc">AI Agents / Copilot Development</a>
        <a href="https://sisgain.com/rag-solutions" class="mob-svc">RAG Solutions</a>
        <a href="https://sisgain.com/ai-automation-workflow-solutions" class="mob-svc">AI Automation & Workflow Solutions</a>
        <a href="https://sisgain.com/machine-learning-development-services" class="mob-svc">Machine Learning Solutions</a>
        <a href="https://sisgain.com/nlp-solutions" class="mob-svc">NLP Solutions</a>
        <a href="https://sisgain.com/computer-vision-solutions" class="mob-svc">Computer Vision Solutions</a>
        <a href="https://sisgain.com/multimodal-ai-development" class="mob-svc">Multimodal AI Development</a>
       
      </div>
    </div>
    <div class="mob-acc"><button class="mob-trigger" onclick="toggleAcc(this)">Infrastructure &amp; Cloud <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg></button>
      <!-- Infrastructure & Cloud -->
      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Infrastructure Management Services</a>
        <a href="https://sisgain.com/cloud-consulting/" class="mob-svc">Cloud Architecture & Infrastructure Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Cloud Managed Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Cloud Migration & Modernization</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">FinOps Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Kubernetes & Containerization Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Serverless Architecture Development</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Platform Engineering</a>
      </div>
    </div>
    <div class="mob-acc"><button class="mob-trigger" onclick="toggleAcc(this)">Emerging Technologies <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg></button>
      <!-- Emerging Technologies -->
      <div class="mob-body">
        <a href="https://sisgain.com/internet-of-things" class="mob-svc">IoT Development</a>
        <a href="https://sisgain.com/augmented-reality-service" class="mob-svc">AR/VR Development</a>
        <a href="https://sisgain.com/blockchain-development-company" class="mob-svc">Blockchain Development</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Digital Workplace Solutions</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">ITSM Solutions</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Super App Development</a>
      </div>

    </div>
    <div class="mob-acc"><button class="mob-trigger" onclick="toggleAcc(this)">Cybersecurity &amp; Security Services <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg></button>
      <!-- Cybersecurity -->
      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Cybersecurity Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Cloud Security Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">SOC Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">IT Risk & Compliance</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Zero Trust Security</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">IAM</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Endpoint Security</a>
      </div>
    </div>
    <div class="mob-acc"><button class="mob-trigger" onclick="toggleAcc(this)">Healthcare Software <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg></button>
      <!-- Healthcare -->
      <div class="mob-body">
        <a href="https://sisgain.com/telemedicine" class="mob-svc">Telemedicine App Development</a>
        <a href="https://sisgain.com/telehealth" class="mob-svc">Telehealth Solutions</a>
        <a href="https://sisgain.com/remote-patient-monitoring" class="mob-svc">Remote Patient Monitoring</a>
        <a href="https://sisgain.com/hospital-management" class="mob-svc">Hospital Management Systems</a>
        <a href="https://sisgain.com/ehr-emr-phr" class="mob-svc">EHR / EMR / PHR</a>
        <a href="https://sisgain.com/hl7" class="mob-svc">HL7 & FHIR Integration</a>
        <a href="https://sisgain.com/hie" class="mob-svc">HIE</a>
        <a href="https://sisgain.com/erx" class="mob-svc">ePrescription</a>
        <a href="https://sisgain.com/rcm" class="mob-svc">RCM</a>
      </div>
    </div>
    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Digital Transformation &amp; Modernization
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Digital Transformation Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Cloud Transformation Services</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Application Modernization</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Legacy System Modernization</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Application Migration</a>
        <a href="https://sisgain.com/business-process-automation/" class="mob-svc">Business Process Automation</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Enterprise Workflow Automation</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Consulting Services
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Technology Consulting</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">IT Consulting</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Software Development Consulting</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Mobile App Consulting</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Fintech Consulting</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">AI Consulting</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Cloud Consulting</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Enterprise &amp; Product Engineering
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc"> Software Development</a>
        <a href="https://sisgain.com/saas-development-company" class="mob-svc">SaaS Development</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">End-to-End Product Engineering</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Software Integration</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">API Development</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Digital Product Management</a>
        <a href="https://sisgain.com/devops-development-services" class="mob-svc">DevOps</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Application Development
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a href="https://sisgain.com/mobile-app-development-company" class="mob-svc">Mobile App Development</a>
        <a href="https://sisgain.com/cross-platform-application-development" class="mob-svc">Cross-Platform Development</a>
        <a href="https://sisgain.com/mobile-website-development" class="mob-svc">Web App Development</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">PWA Development</a>
        <a href="https://sisgain.com/ecommerce-app-development-services" class="mob-svc">E-commerce Development</a>
        <a href="https://sisgain.com/crm-development-company" class="mob-svc">CRM Development</a>
        <a href="https://sisgain.com/erp-development-company" class="mob-svc">ERP Development</a>
        <a href="https://sisgain.com/ott-app-development-company" class="mob-svc">OTT App Development</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        UI/UX &amp; Design
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a href="https://sisgain.com/ui-ux-design-development" class="mob-svc">UI/UX Design</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Product Design</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Mobile-First Design</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Design Systems</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">UX Research & Testing</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Outsourcing &amp; Engagement Models
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Software Development Outsourcing</a>
        <a href="https://sisgain.com/hire-offshore-developer" class="mob-svc">Offshore Development</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Dedicated Development Teams</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">White Label Development</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Quality Assurance &amp; Support
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">QA & Testing</a>
        <a href="https://sisgain.com/automation-testing/" class="mob-svc">Automation Testing</a>
        <a href="https://sisgain.com/performance-testing/" class="mob-svc">Performance Testing</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">AI-Powered Monitoring & Observability</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Support & Maintenance</a>
      </div>
    </div>

    <div class="mob-acc">
      <button class="mob-trigger" onclick="toggleAcc(this)">
        Industries
        <svg class="arr" width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="2 4 6 8 10 4" />
        </svg>
      </button>

      <div class="mob-body">

        <div class="mob-glbl">Core Industries</div>

        <a href="https://sisgain.com/healthcare" class="mob-svc">Healthcare</a>
        <a href="https://sisgain.com/fintech-app-development" class="mob-svc">Fintech</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Aviation</a>
        <a href="https://sisgain.com/real-estate-software-solutions" class="mob-svc">Real Estate</a>
        <a href="https://sisgain.com/logistic-software-development-company" class="mob-svc">Logistics</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Gaming</a>
        <a href="https://sisgain.com/food-delivery-app-development-company" class="mob-svc">Food & Beverages</a>
        <a href="https://sisgain.com/fitness-club-management" class="mob-svc">Fitness</a>
        <a href="https://sisgain.com/ecommerce-app-development-services" class="mob-svc">Travel</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">eCommerce</a>
        <a href="https://sisgain.com/government-app-development-company" class="mob-svc">Government Sector</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Mining</a>

        <div class="mob-glbl">More Industries</div>

        <a href="https://sisgain.com/entertainment-app-development-company" class="mob-svc">Media & Entertainment</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Hospitality</a>
        <a href="https://sisgain.com/education-app-development" class="mob-svc">Education</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Telecommunications</a>
        <a href="https://sisgain.com/sports" class="mob-svc">Sports</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Retail</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Agribusiness</a>
        <a data-toggle="modal" data-target="#myModal" class="mob-svc">Utilities</a>

      </div>
    </div>
  </div>
  <!-- <div class="mob-btns"><button class="btn-ghost">Log In</button><button class="btn-primary">Get a Quote</button></div> -->
</div>
</div>


<script>
  let open = false;
  let indOpen = false;

  // ===== MOBILE CLICK ONLY =====
  function toggleMenu() {
    if (window.innerWidth > 992) return;

    if (indOpen) {
      indOpen = false;
      document.getElementById('indWrap').classList.remove('visible');
      document.getElementById('indItem').classList.remove('open');
    }

    open = !open;
    document.getElementById('megaWrap').classList.toggle('visible', open);
    document.getElementById('svcItem').classList.toggle('open', open);
  }

  function toggleIndustries() {
    if (window.innerWidth > 992) return;

    if (open) {
      open = false;
      document.getElementById('megaWrap').classList.remove('visible');
      document.getElementById('svcItem').classList.remove('open');
    }

    indOpen = !indOpen;
    document.getElementById('indWrap').classList.toggle('visible', indOpen);
    document.getElementById('indItem').classList.toggle('open', indOpen);
  }

  // ===== CLICK OUTSIDE (MOBILE ONLY) =====
  document.addEventListener('click', e => {
    if (window.innerWidth > 992) return;

    const wrap = document.getElementById('megaWrap');
    const btn = document.getElementById('svcBtn');

    if (open && !wrap.contains(e.target) && !btn.contains(e.target)) {
      open = false;
      wrap.classList.remove('visible');
      document.getElementById('svcItem').classList.remove('open');
    }

    const indWrap = document.getElementById('indWrap');
    const indBtn = document.getElementById('indBtn');

    if (indOpen && !indWrap.contains(e.target) && !indBtn.contains(e.target)) {
      indOpen = false;
      indWrap.classList.remove('visible');
      document.getElementById('indItem').classList.remove('open');
    }
  });

  // ===== POSITION FIX =====
  function setTop() {
    const strip = document.querySelector('.cta-strip');
    const nav = document.querySelector('.navbar');

    const stripH = strip ? strip.offsetHeight : 0;
    const navH = nav ? nav.offsetHeight : 0;

    const offset = stripH + navH + 2;

    document.getElementById('megaWrap').style.top = offset + 'px';
    document.getElementById('indWrap').style.top = offset + 'px';
  }

  setTop();
  window.addEventListener('resize', setTop);

  // ===== MOBILE MENU =====
  function toggleMob() {
    const menu = document.getElementById("mobMenu");
    const ham = document.getElementById("ham");

    menu.classList.toggle("open");
    ham.classList.toggle("open");

    // 👇 ADD THIS
    document.body.classList.toggle("menu-open");
  }

  function toggleAcc(t) {
    const b = t.nextElementSibling;
    const was = b.classList.contains('open');

    document.querySelectorAll('.mob-body').forEach(x => x.classList.remove('open'));
    document.querySelectorAll('.mob-trigger').forEach(x => x.classList.remove('open'));

    if (!was) {
      b.classList.add('open');
      t.classList.add('open');
    }
  }
  const svcItem = document.getElementById('svcItem');
  const megaWrap = document.getElementById('megaWrap');

  let svcTimeout;

  function openSvc() {
    if (window.innerWidth <= 992) return;
    clearTimeout(svcTimeout);
    megaWrap.classList.add('visible');
    svcItem.classList.add('open');
  }

  function closeSvc() {
    if (window.innerWidth <= 992) return;
    svcTimeout = setTimeout(() => {
      megaWrap.classList.remove('visible');
      svcItem.classList.remove('open');
    }, 200); // delay to prevent flicker
  }

  svcItem.addEventListener('mouseenter', openSvc);
  svcItem.addEventListener('mouseleave', closeSvc);
  megaWrap.addEventListener('mouseenter', openSvc);
  megaWrap.addEventListener('mouseleave', closeSvc);


  const indItem = document.getElementById('indItem');
  const indWrap = document.getElementById('indWrap');

  let indTimeout;

  function openInd() {
    if (window.innerWidth <= 992) return;
    clearTimeout(indTimeout);
    indWrap.classList.add('visible');
    indItem.classList.add('open');
  }

  function closeInd() {
    if (window.innerWidth <= 992) return;
    indTimeout = setTimeout(() => {
      indWrap.classList.remove('visible');
      indItem.classList.remove('open');
    }, 200);
  }

  indItem.addEventListener('mouseenter', openInd);
  indItem.addEventListener('mouseleave', closeInd);
  indWrap.addEventListener('mouseenter', openInd);
  indWrap.addEventListener('mouseleave', closeInd);

  /* ONLY CLOSE MENU WHEN CLICK ON data-toggle="modal" LINKS */
  document.querySelectorAll('#mobMenu a[data-toggle="modal"]').forEach(item => {
    item.addEventListener('click', function(e) {

      const menu = document.getElementById("mobMenu");
      const ham = document.getElementById("ham");

      // CLOSE MENU
      menu.classList.remove("open");
      ham.classList.remove("open");
      document.body.classList.remove("menu-open");

      // OPTIONAL: ensure modal opens smoothly
      const target = this.getAttribute("data-target");

      setTimeout(() => {
        $(target).modal('show');
      }, 200);

    });
  });
</script>


<script>
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');

    if (window.scrollY > 10) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
</script>