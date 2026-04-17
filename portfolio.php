<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include("assets/includes-new/header.php");
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portfolio - Technology Company</title>
	<link rel="stylesheet" href="assets/css/portfolio.css">


</head>

<body>

	<?php
	$url = "portfolio";
	include("assets/includes-new/navbar.php");
	?>
	<section class="hero bg-grid">
		<div class="hero-content">
			<div class="hero-badge">
				<svg viewBox="0 0 24 24" fill="currentColor">
					<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
				</svg>
				<span>Trusted by Industry Leaders</span>
			</div>
			<h1>Our Work Across<br><span class="gradient">Industries</span></h1>
			<p>We build scalable, high-performance web and mobile applications that transform businesses. From healthcare to fintech, our solutions drive real results.</p>
		</div>
	</section>

	<div class="filter-section" id="filterSection">
		<div class="filter-container">
			<div class="filter-primary" id="primaryFilter">
				<button class="filter-btn primary active" data-filter="web">Web Apps</button>
				<button class="filter-btn primary" data-filter="mobile">Mobile Apps</button>
			</div>
			<div class="filter-secondary" id="secondaryFilter"></div>
		</div>
	</div>

	<section class="projects-section container">
		<div id="projectsGrid" class="projects-grid"></div>
		<div id="emptyState" class="empty-state">
			<p>No projects found matching your criteria.</p>
		</div>
	</section>

		<section class="container mt-5 mb-5">

		<div class="cta-card">
			<div class="cta-content">
				<h2 class="cta-title">Have a similar idea?</h2>
				<p class="cta-description">Let's build it together. Our team is ready to transform your vision into reality.</p>
				<button class="cta-btn" data-toggle="modal" data-target="#myModal">
					<span>Book a Free Consultation</span>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M5 12h14M12 5l7 7-7 7" />
					</svg>
				</button>
			</div>
		</div>
	</section>

	<script>
		const industryOrder = [
			"Healthcare",
			"Fitness",
			"Logistics",
			"Real Estate",
			"Enterprise",
			"E-commerce",
			"Blockchain",
			"Hospitality",
			"FMCG",
			"Media",
			"Entertainment",
			"Gaming",
			"Food Delivery",
		];



		const allProjects = [{
				title: "DWTC",
				description: "A modern platform showcasing global events and business excellence in Dubai city.",
				industry: "Real Estate",
				type: "web",
				img: "dwtc.png",
				link: "https://www.dwtc.com/en/"
			},
			{
				title: "Orpheo Canada",
				description: "A smart visitor assistance platform enhancing tourism and cultural experiences.",
				industry: "Hospitality",
				type: "web",
				img: "orpheo-canada.png",
				link: "https://www.orpheocanada.ca/"
			},
			{
				title: "Hitachi",
				description: "A global technology conglomerate delivering innovative solutions across diverse industries worldwide markets.",
				industry: "Enterprise",
				type: "web",
				img: "hitachi.png",
				link: "https://www.hitachi.com/en/"
			},
			{
				title: "Deliciously Ella",
				description: "A wellness-focused recipe platform promoting healthier living through delicious meals and guidance.",
				industry: "FMCG",
				type: "web",
				img: "deliciously-ella.png",
				link: "https://deliciouslyella.com/"
			},
			{
				title: "Mojo Pizza",
				description: "A leading pizza delivery brand known for quality and customer satisfaction.",
				industry: "FMCG",
				type: "web",
				img: "mojopizza.png",
				link: "https://mojopizza.in/"
			},
			{
				title: "Mojo Pizza",
				description: "A leading pizza delivery brand known for quality and customer satisfaction.",
				industry: "FMCG",
				type: "mobile",
				img: "mojo-pizza-app.png",
				link: "https://play.google.com/store/apps/details?id=com.mojopizza&hl=en_IN"
			},
			{
				title: "Protein Bar & Kitchen",
				description: "A healthy dining brand serving nutritious, protein-packed meals with customizable flavors.",
				industry: "FMCG",
				type: "web",
				img: "theproteinbar.png",
				link: "https://www.theproteinbar.com/"
			},
			{
				title: "Radley London",
				description: "A premium British handbag brand blending timeless design with modern elegance.",
				industry: "E-commerce",
				type: "web",
				img: "radley.png",
				link: "https://www.radley.co.uk/"
			},
			{
				title: "BrandsWalk",
				description: "A curated platform showcasing sustainable brands with meaningful stories and craftsmanship.",
				industry: "E-commerce",
				type: "web",
				img: "brandswalk.png",
				link: "https://brandswalk.com/"
			},
			{
				title: "Century 21",
				description: "A global real estate franchise network connecting buyers, sellers, and professionals worldwide.",
				industry: "Real Estate",
				type: "web",
				img: "century21.png",
				link: "https://www.century21.com/"
			},
			{
				title: "Century 21",
				description: "A global real estate franchise network connecting buyers, sellers, and professionals worldwide.",
				industry: "Real Estate",
				type: "mobile",
				img: "century-21-app.png",
				link: "https://play.google.com/store/apps/details?id=com.century21.appc21&hl=en_IN"
			},
			{
				title: "Hotel De Sers",
				description: "A luxury hotel collection offering unique, story-driven stays across iconic destinations in France and the Caribbean.",
				industry: "Hospitality",
				type: "web",
				img: "hoteldesers.png",
				link: "https://www.hoteldesers-paris.com/"
			},
			{
				title: "Accor Hotels",
				description: "A global hospitality group operating hotels, resorts, and lifestyle destinations worldwide.",
				industry: "Hospitality",
				type: "web",
				img: "accor-hotels.png",
				link: "https://all.accor.com/"
			},

			{
				title: "Accor Hotels",
				description: "A global hospitality group operating hotels, resorts, and lifestyle destinations worldwide.",
				industry: "Hospitality",
				type: "mobile",
				img: "accor-hotel-app.png",
				link: "https://apps.apple.com/us/app/all-accor-hotel-booking/id489472613"
			},
			{
				title: "Palazzo Versace",
				description: "An iconic luxury hotel blending Italian elegance with Arabian architectural charm.",
				industry: "Hospitality",
				type: "web",
				img: "palazzoversace.png",
				link: "https://www.palazzoversace.ae/"
			},
			{
				title: "Fitness First",
				description: "A global fitness brand offering premium gyms and training experiences worldwide members.",
				industry: "Fitness",
				type: "web",
				img: "fitnessfirst.png",
				link: "https://www.fitnessfirst.co.uk/"
			},
			{
				title: "Fitness First",
				description: "A global fitness brand offering premium gyms and training experiences worldwide members.",
				industry: "Fitness",
				type: "mobile",
				img: "fitness-first-app.png",
				link: "https://play.google.com/store/apps/details?id=com.flg.kubofitapp.ff&hl=en_IN"
			},
			{
				title: "The Gym Group",
				description: "A fitness chain providing accessible gyms, expert guidance, and flexible memberships.",
				industry: "Fitness",
				type: "web",
				img: "thegymgroup.png",
				link: "https://www.thegymgroup.com/"
			},
			{
				title: "The Gym Group",
				description: "A fitness chain providing accessible gyms, expert guidance, and flexible memberships.",
				industry: "Fitness",
				type: "mobile",
				img: "the-gym-group-app.png",
				link: "https://apps.apple.com/pl/app/the-gym-group/id1444707310"
			},
			{
				title: "Payasu Gym",
				description: "A UK fitness marketplace offering flexible, discounted access to gyms and classes nationwide.",
				industry: "Fitness",
				type: "web",
				img: "payasu-gym.png",
				link: ""
			},
			{
				title: "Lords and Ladies",
				description: "Lords & Ladies have been offering quality beauty and well being treatments in Bedford since 2005.",
				industry: "E-commerce",
				type: "web",
				img: "lordsandladies.png",
				link: "https://www.lordsandladiessalons.com/"
			},

			{
				title: "Casa Mozambique",
				description: "A real estate platform connecting buyers with premium properties across Mozambique.",
				industry: "Real Estate",
				type: "web",
				img: "casamozambique.png",
				link: "https://casamozambique.co.mz/"
			},
			{
				title: "Doocan",
				description: "A global B2B platform connecting buyers with Indian manufacturers for seamless sourcing solutions.",
				industry: "E-commerce",
				type: "web",
				img: "doocan.png",
				link: "https://doocan.io/"
			},

			{
				title: "Summit Radio",
				description: "A community-focused public radio station celebrating adventurous music and local culture.",
				industry: "Media",
				type: "mobile",
				img: "summit-radio.png",
				link: "https://play.google.com/store/apps/details?id=com.thesummit.waps"
			},
			{
				title: "Venture",
				description: "Venture is a service platform geared to the needs of people who would like to innovate their projects.",
				industry: "Media",
				type: "mobile",
				img: "venture.png",
				link: "https://apps.apple.com/ke/app/venture/id6743491796"
			},
			{
				title: "Trade Search",
				description: "TradeSearch helps tradies grow their business with quality leads, referrals, and repeat customers.",
				industry: "Media",
				type: "mobile",
				img: "tradesearch.png",
				link: "https://play.google.com/store/apps/details?id=com.teqcraft.tradesearch&hl=en_IN"
			},

			{
				title: "Blahah",
				description: "Blahah is a free app that lets users see how their reputation impacts others with a complete 360 degree view.",
				industry: "Media",
				type: "mobile",
				img: "blahah.png",
				link: ""
			},

			{
				title: "Snap Print",
				description: "A leading Australian print and design franchise delivering personalised business printing and marketing solutions.",
				industry: "Media",
				type: "mobile",
				img: "snapprint.png",
				link: "https://play.google.com/store/apps/details?id=app.snapprint.android&hl=en_IN"
			},
			{
				title: "King of Flags",
				description: "King of Flags brings you extreme freestyle riding action with insane stunts, simple and intuitive controls.",
				industry: "Gaming",
				type: "mobile",
				img: "king-of-flags.png",
				link: ""
			},
			{
				title: "Little Kitten",
				description: "Enjoy stunning graphics and multiple game modes, including Survival, Time Mode, and Free Play.",
				industry: "Gaming",
				type: "mobile",
				img: "little-kitten.png",
				link: "https://apps.apple.com/us/app/little-kitten-cat-adventures/id1294341144"
			},
			{
				title: "Solaris Rover Expedition",
				description: "A fun simulation game where you design and test custom rovers to conquer Mars-like terrain challenges.",
				industry: "Gaming",
				type: "mobile",
				img: "solaris-rover-expedition.png",
				link: "https://apps.apple.com/us/app/solaris-rover-expedition/id982969463"
			},
			{
				title: "Hafele Flick Rugby",
				description: "A fast-paced mobile rugby game that lets you flick and score tries in fun, action-packed matches on the go.",
				industry: "Gaming",
				type: "mobile",
				img: "flick-kick-rugby-kickoff.png",
				link: "https://play.google.com/store/apps/details?id=com.pikpok.fkrk&hl=en_IN"
			},
			{
				title: "Real Racing 3",
				description: "A high-quality mobile racing game offering realistic cars, tracks, and competitive races on the go.",
				industry: "Gaming",
				type: "mobile",
				img: "real-racing-3.png",
				link: ""
			},
			{
				title: "TrafficVille 3D",
				description: "A 3D traffic management game where you control vehicles and guide them safely through busy intersections.",
				industry: "Gaming",
				type: "mobile",
				img: "trafficville-3d.png",
				link: "https://apps.apple.com/us/app/trafficville-3d/id599294385"
			},


			{
				title: "RAAK Hospitals",
				description: "A full-service healthcare provider delivering comprehensive medical care and patient-centered services.",
				industry: "Healthcare",
				type: "web",
				img: "raak-hospitals.png",
				link: "https://rakhospital.com/"
			},
			{
				title: "adMedic",
				description: "Complete RPM solution with OxiTone integration, real-time vitals tracking, clinician alerts, appointment scheduling, and secure video consultations.",
				industry: "Healthcare",
				type: "mobile",
				img: "adMedic.png",
				link: "https://admedic.mx/"
			},
			{
				title: "AkosMD",
				description: "A telehealth platform providing convenient virtual consultations with healthcare professionals.",
				industry: "Healthcare",
				type: "mobile",
				img: "akosmd.png",
				link: "https://play.google.com/store/apps/details?id=com.akos_mobile_app&hl=en_IN"
			},
			{
				title: "HealthNeutron",
				description: "A preventive telemedicine platform offering virtual doctor consultations, mobile labs, and personalized healthcare services.",
				industry: "Healthcare",
				type: "mobile",
				img: "healthneutron.png",
				link: "https://apps.apple.com/nz/app/healthneutron/id1553826704"
			},
			{
				title: "Avino Health",
				description: "A remote patient monitoring platform empowering healthcare providers and patients with secure, real-time health insights.",
				industry: "Healthcare",
				type: "web",
				img: "avinohealth.png",
				link: "https://avinohealth.com/"
			},
			{
				title: "Tawuniya Insurance",
				description: "A leading Saudi insurance provider offering diverse Shariah-compliant coverage for individuals and businesses.",
				industry: "Enterprise",
				type: "mobile",
				img: "tawuniyainsurance.png",
				link: "https://play.google.com/store/apps/details?id=com.dxp.TawuniyaInsurance&hl=en_IN"
			},
			{
				title: "Indiechain",
				description: "A decentralized blockchain platform empowering creators and communities with transparent, token-driven engagement.",
				industry: "Blockchain",
				type: "web",
				img: "indiechain.png",
				link: "https://indiechain.io/"
			},
			{
				title: "Indiechain",
				description: "A decentralized blockchain platform empowering creators and communities with transparent, token-driven engagement.",
				industry: "Blockchain",
				type: "mobile",
				img: "indiechain-app.png",
				link: "https://play.google.com/store/apps/details?id=com.indiechain"
			},


			{
				title: "iCare",
				description: "A Dubai-based multi-specialty healthcare clinic offering expert medical care across diverse specialties.",
				industry: "Healthcare",
				type: "mobile",
				img: "icare.png",
				link: "https://apps.apple.com/ph/app/icare-insular-health-care/id1453643319"
			},
			{
				title: "Club Life",
				description: "The LifeClub Rewards program gives you instant rewards every time you shop at participating LifeClub Pharmacies.",
				industry: "Healthcare",
				type: "mobile",
				img: "club-life.png",
				link: "https://apps.apple.com/us/app/club-life/id1128681766"
			},

			{
				title: "MaxHealth",
				description: "A UAE-based health insurance provider offering flexible medical coverage and support solutions for individuals and businesses.",
				industry: "Enterprise",
				type: "web",
				img: "maxhealth.png",
				link: "https://maxhealth.ae/"
			},
			{
				title: "TELUS TV",
				description: "A streaming platform offering premium TV shows, movies, and entertainment content for diverse audiences.",
				industry: "Entertainment",
				type: "mobile",
				img: "telus-tv.png",
				link: "https://play.google.com/store/apps/details?id=com.optiktv&hl=en"
			},
			{
				title: "TELUS TV",
				description: "A streaming platform offering premium TV shows, movies, and entertainment content for diverse audiences.",
				industry: "Entertainment",
				type: "web",
				img: "telus-tv-web.png",
				link: "https://www.telustvplus.com/"
			},
			{
				title: "ReDiscover TV",
				description: "A storytelling-driven platform showcasing faith-based films and family-friendly content for uplifting entertainment.",
				industry: "Entertainment",
				type: "mobile",
				img: "rediscovertv.png",
				link: "https://play.google.com/store/apps/details?id=com.app.rediscovertv&hl=en_IN"
			},
			{
				title: "ReDiscover TV",
				description: "A storytelling-driven platform showcasing faith-based films and family-friendly content for uplifting entertainment.",
				industry: "Entertainment",
				type: "web",
				img: "rediscover-web.png",
				link: "https://www.rediscoverfamily.tv/"
			},
			{
				title: "Satoria",
				description: "Satoria is an entertainment platform delivering engaging and immersive digital experiences for modern audiences.",
				industry: "Entertainment",
				type: "both",
				img: "satoria.png",
				link: "https://apps.apple.com/us/app/satoria/id6752298162"
			},
			{
				title: "Magellan TV",
				description: "A streaming service delivering curated TV shows and movies with engaging, family-friendly entertainment.",
				industry: "Entertainment",
				type: "mobile",
				img: "magellantv.png",
				link: "https://play.google.com/store/apps/details?id=com.abide.magellantv&hl=en_IN"
			},
			{
				title: "Magellan TV",
				description: "A streaming service delivering curated TV shows and movies with engaging, family-friendly entertainment.",
				industry: "Entertainment",
				type: "mobile",
				img: "magellan-web.png",
				link: "https://www.magellantv.com/"
			},
			{
				title: "Dr. Labike",
				description: "A premium motocross and adventure bike gear brand offering high-performance apparel and accessories for riders.",
				industry: "Healthcare",
				type: "mobile",
				img: "drlabike.png",
				link: "https://play.google.com/store/apps/details?id=com.labike.app&hl=en_IN"
			},
			{
				title: "Dr. Labike",
				description: "A premium motocross and adventure bike gear brand offering high-performance apparel and accessories for riders.",
				industry: "Healthcare",
				type: "web",
				img: "drlabike-web.png",
				link: "https://drlabike.com/"
			},

			{
				title: "Desh Clinic",
				description: "A Canadian healthcare clinic providing patient-focused medical services and comprehensive care solutions.",
				industry: "Healthcare",
				type: "mobile",
				img: "desh-clinic.png",
				link: ""
			},

			{
				title: "DOT",
				description: "Dot is a period tracker that helps prevent or plan pregnancy based on your unique cycle.",
				industry: "Healthcare",
				type: "mobile",
				img: "dot.png",
				link: ""
			},

			{
				title: "Niros",
				description: "Niros is a premium restaurant in Dubai offering authentic flavors, elegant dining, and a memorable culinary experience, powered by our advanced POS software for seamless operations.",
				industry: "Food Delivery",
				type: "Web",
				img: "niros-pos-web-screen.png",
				link: "https://www.facebook.com/niros.resro"
			},
			{
				title: "TABE",
				description: "TABE is a smart food ordering app that lets users explore menus, order quickly, and enjoy seamless delivery from their favorite restaurants.",
				industry: "Food Delivery",
				type: "Mobile",
				img: "tabe-app.png",
				link: "https://play.google.com/store/apps/details?id=com.kl.tabe&hl=en"
			},
			{
				title: "Faasos",
				description: "Faasos is a popular food brand known for its delicious wraps and rolls, offering quick, flavorful meals delivered fresh to your doorstep.",
				industry: "Food Delivery",
				type: "Mobile",
				img: "faasos-app.png",
				link: "https://play.google.com/store/apps/details?id=com.faasos&hl=en"
			},
			{
				title: "Foodoos",
				description: "Foodoos is a modern food delivery platform connecting users with local restaurants, ensuring fast ordering, diverse choices, and great taste.",
				industry: "Food Delivery",
				type: "Mobile",
				img: "foodoos-app.png",
				link: "https://play.google.com/store/apps/details?id=com.foodoos.notif"
			},
			{
				title: "Real-Sports",
				description: "A real-time sports platform delivering live scores, updates, and engaging experiences for passionate sports fans.",
				industry: "Sports",
				type: "Mobile",
				img: "real-sports-app.png",
				link: "https://apps.apple.com/us/app/real-sports/id1514546162"
			},
			{
				title: "GTG: Strength Builder",
				description: "A performance-driven fitness application designed to help users build strength through structured training and progress tracking.",
				industry: "Sports",
				type: "Mobile",
				img: "gtg-strength-builder-app.png",
				link: "https://play.google.com/store/apps/details?id=com.pw.gtg"
			},
			{
				title: "CBS Sports Fantasy",
				description: "A feature-rich fantasy sports platform enabling users to create teams, compete in leagues, and monitor live player performance.",
				industry: "Sports",
				type: "Mobile",
				img: "cbs-sports-fantasy-app.png",
				link: "https://play.google.com/store/apps/details?id=com.cbs.sports.fantasy"
			},
			{
				title: "Game Changer",
				description: "A comprehensive sports management solution that streamlines team operations, score tracking, and performance analytics.",
				industry: "Sports",
				type: "Mobile",
				img: "game-changer-app.png",
				link: "https://play.google.com/store/apps/details?id=com.gc.teammanager"
			},
			{
				title: "PropFlo",
				description: "An intelligent real estate solution that simplifies property management, lead tracking, and sales workflows for professionals.",
				industry: "Real Estate",
				type: "Mobile",
				img: "propflo-app.png",
				
				link: "https://apps.apple.com/in/app/customer-propflo/id6473384840"
			},

			{
				title: "PropFlo",
				description: "An intelligent real estate solution that simplifies property management, lead tracking, and sales workflows for professionals.",
				industry: "Real Estate",
				type: "Web",
				img: "propflo-web.png",
				
				link: "https://tinyurl.com/mr3r3sdb"
			},
			{
				title: "Peek",
				description: "A modern property discovery platform that helps users explore listings, schedule visits, and make confident real estate decisions.",
				industry: "Real Estate",
				type: "Mobile",
				img: "peek-real-estate-app.png",
			
				link: "https://apps.apple.com/us/app/peek-real-estate/id1568722302"
			},

			{
				title: "Peek",
				description: "A modern property discovery platform that helps users explore listings, schedule visits, and make confident real estate decisions.",
				industry: "Real Estate",
				type: "Web",
				img: "peek-web.png",
				link: "https://tinyurl.com/33e64n4a"
			},
			{
				title: "Matterport",
				description: "An immersive 3D visualization platform that transforms property showcasing through interactive virtual tours.",
				industry: "Real Estate",
				type: "Mobile",
				img: "matterport-app.png",
				link: "https://play.google.com/store/apps/details?id=com.matterport.android.capture&hl=en_IN"
			}

		];

		const sortedProjects = [...allProjects].sort((a, b) => {
			return industryOrder.indexOf(a.industry) - industryOrder.indexOf(b.industry);
		});
		let currentPrimary = 'web';
		let currentSecondary = 'All';

		function getTypeCategory(project) {
			return project.type; // 'web', 'mobile', or 'both'
		}

		// function filterProjects() {
		// 	return sortedProjects.filter(p => {
		// 		if (currentPrimary === 'web' && p.type === 'mobile') return false;
		// 		if (currentPrimary === 'mobile' && p.type === 'web') return false;
		// 		if (currentSecondary !== 'All' && p.industry !== currentSecondary) return false;
		// 		return true;
		// 	});
		// }

		function filterProjects() {
    return sortedProjects.filter(p => {
        const type = p.type.toLowerCase();

        if (currentPrimary === 'web' && !type.includes('web')) return false;
        if (currentPrimary === 'mobile' && !type.includes('mobile')) return false;

        if (currentSecondary !== 'All' && p.industry !== currentSecondary) return false;

        return true;
    });
}

		// function getIndustries() {
		// 	return [...new Set(
		// 		sortedProjects
		// 		.filter(p => p.type === currentPrimary || p.type === 'both')
		// 		.map(p => p.industry)
		// 		// )].sort();
		// 	)].sort((a, b) => industryOrder.indexOf(a) - industryOrder.indexOf(b));
		// }

		function getIndustries() {
    return [...new Set(
        sortedProjects
        .filter(p => {
            const type = p.type.toLowerCase();

            if (currentPrimary === 'web') return type.includes('web');
            if (currentPrimary === 'mobile') return type.includes('mobile');

            return true;
        })
        .map(p => p.industry)
    )].sort((a, b) => industryOrder.indexOf(a) - industryOrder.indexOf(b));
}
		function renderSecondaryFilter() {
			const container = document.getElementById('secondaryFilter');
			container.classList.add('visible');
			const industries = getIndustries();
			container.innerHTML = ['All', ...industries].map(ind => `
        <button class="filter-btn secondary ${ind === currentSecondary ? 'active' : ''}" data-secondary="${ind}">${ind}</button>
    `).join('');
			container.querySelectorAll('.filter-btn.secondary').forEach(btn => {
				btn.addEventListener('click', () => {
					currentSecondary = btn.dataset.secondary;
					renderSecondaryFilter();
					renderProjects();
				});
			});
		}

		function createCard(p) {
			const imagePath = `assets/images/portfolio/${p.img}`;

			const viewBtn = p.link ?
				`<a class="cta-button" href="${p.link}" target="_blank" rel="noopener noreferrer">View Details ↗</a>` :
				`<span class="cta-button cta-button-disabled">View Details</span>`;

			return `
<div class="project-card animate-fadeIn">
  <div class="project-image" style="background-image:url('${imagePath}'); background-size:cover; background-position:center; background-repeat:no-repeat;">
    <div class="project-overlay">${viewBtn}</div>
    
  </div>
  <div class="project-content">
  <div class="project-badge">${p.industry}</div>
    <h3 class="project-title">${p.title}</h3>
    <p class="project-description">${p.description}</p>
  </div>
</div>
`;
		}

		function renderProjects() {
			const grid = document.getElementById('projectsGrid');
			const empty = document.getElementById('emptyState');
			const filtered = filterProjects();
			if (filtered.length === 0) {
				grid.style.display = 'none';
				empty.style.display = 'block';
			} else {
				grid.style.display = 'grid';
				empty.style.display = 'none';
				grid.innerHTML = filtered.map(createCard).join('');
			}
		}

		document.querySelectorAll('.filter-btn.primary').forEach(btn => {
			btn.addEventListener('click', () => {
				document.querySelectorAll('.filter-btn.primary').forEach(b => b.classList.remove('active'));
				btn.classList.add('active');
				currentPrimary = btn.dataset.filter;
				currentSecondary = 'All';
				renderSecondaryFilter();
				renderProjects();
			});
		});
		renderSecondaryFilter();
		renderProjects();
	</script>
	<?php
	include("assets/includes-new/footer.php");
	?>
</body>

</html>