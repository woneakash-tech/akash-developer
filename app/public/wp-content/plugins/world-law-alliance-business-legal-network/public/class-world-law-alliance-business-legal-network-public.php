<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://worldlawalliance.com/
 * @since      1.0.0
 *
 * @package    World_Law_Alliance_Business_Legal_Network
 * @subpackage World_Law_Alliance_Business_Legal_Network/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    World_Law_Alliance_Business_Legal_Network
 * @subpackage World_Law_Alliance_Business_Legal_Network/public
 * @author     World Law Alliance <contact@worldlawalliance>
 */
class World_Law_Alliance_Business_Legal_Network_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in World_Law_Alliance_Business_Legal_Network_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The World_Law_Alliance_Business_Legal_Network_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/world-law-alliance-business-legal-network-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in World_Law_Alliance_Business_Legal_Network_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The World_Law_Alliance_Business_Legal_Network_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/world-law-alliance-business-legal-network-public.js', array( 'jquery' ), $this->version, false );

	} 
	/**
	 * WLA Custom Header Shortcode - Complete Version
	 * Usage: [wla_header]
	 */

	public function wla_custom_header_shortcode() {

		$total      = intval( get_option( 'event_unbounded_ticket_count', 94 ) );
		$registered = intval( get_option( 'event_registered_unbounded_tickets', 0 ) );
		$remaining  = max( 0, $total - $registered );

		if ( is_user_logged_in() ) {
			$signin_url  = home_url( '/dashboard-2/' );
			$signin_text = 'Dashboard';
		} else {
			$signin_url  = home_url( '/partner-portal/' );
			$signin_text = 'Sign In';
		}

		$logo_url = 'https://worldlawalliance.com/wp-content/uploads/2025/12/wla-logo-variants-2-1-1.png';
		ob_start();
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Inter+Tight:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

		<div class="wlanav">

		<!-- ══ TOP STRIP ══ -->
		<div class="wla-top-strip">
			<div class="wla-strip-in">
				<div class="wla-strip-left">
					<span class="wla-blink"></span>
					<span class="wla-strip-text">
						<strong>UNBOUNDED™</strong> — Barcelona · 14–15 August · <?php echo esc_html( $remaining ); ?> spots remaining
					</span>
					<a href="https://unboundedglobal.com/" class="wla-strip-link">Register →</a>
				</div>
				<div class="wla-strip-right">
					<a href="<?php echo esc_url( $signin_url ); ?>" class="wla-strip-signin">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
						<?php echo esc_html( $signin_text ); ?>
					</a>
				</div>
			</div>
		</div>

		<!-- ══ STICKY HEADER ══ -->
		<header class="wla-hdr" id="wla-hdr">

			<a class="wla-brand" href="https://worldlawalliance.com/">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="World Law Alliance">
			</a>

			<nav class="wla-nav" aria-label="Main navigation">
				<div class="wla-ni" data-id="practices">
					<button class="wla-nb" aria-expanded="false" aria-haspopup="true">
						Practices
						<svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
					</button>
				</div>
				<div class="wla-ni" data-id="sectors">
					<button class="wla-nb" aria-expanded="false" aria-haspopup="true">
						Sectors
						<svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
					</button>
				</div>
				<div class="wla-ni" data-id="serve">
					<button class="wla-nb" aria-expanded="false" aria-haspopup="true">
						Who We Serve
						<svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
					</button>
				</div>
				<div class="wla-ni" data-id="corridors">
					<button class="wla-nb" aria-expanded="false" aria-haspopup="true">
						Corridors
						<svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
					</button>
				</div>
				<div class="wla-ni">
					<a class="wla-nb" href="https://worldlawalliance.com/for-firms/">For Law Firms</a>
				</div>
				<div class="wla-ni" data-id="about">
					<button class="wla-nb" aria-expanded="false" aria-haspopup="true">
						About
						<svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
					</button>
				</div>
				<div class="wla-ni">
					<a class="wla-nb" href="https://worldlawalliance.com/list-blog-post/">Insights</a>
				</div>
			</nav>

			<div class="wla-hdr-r">
				<a class="wla-btn-solid green" href="https://worldlawalliance.com/our-professionals-list/">Our Partner</a>
				<a class="wla-btn-solid" href="https://worldlawalliance.com/partners-expression-of-interest/">BE A WLA PARTNER</a>
				<button class="wla-ham" id="wla-hamburger" onclick="wlaDrawerToggle()" aria-label="Open menu" aria-expanded="false">
					<span></span><span></span><span></span>
				</button>
			</div>

		</header>

		<div class="wla-bdo" id="wla-bdo" role="presentation"></div>

		<!-- ════════════════════════════════════════════════
			PRACTICES PANEL
		════════════════════════════════════════════════════ -->
		<div class="mega" id="wla-panel-practices">
			<div class="mega-body g-practices">

				<div class="mc-feat">
					<div>
						<div class="feat-tag">Practice Groups</div>
						<div class="feat-h">Global expertise.<br><em>Local execution.</em></div>
						<div class="feat-p">8 specialist practice groups spanning every major cross-border legal discipline across 90+ jurisdictions.</div>
						<div class="feat-stats">
							<div><div class="fsn">8</div><div class="fsl">Practices</div></div>
							<div><div class="fsn">90+</div><div class="fsl">Jurisdictions</div></div>
							<div><div class="fsn">48h</div><div class="fsl">Matched</div></div>
						</div>
						<a class="feat-cta" href="https://worldlawalliance.com/how-it-works/">All practices →</a>
					</div>
					<div class="unb" style="margin-top:20px !important">
						<div><div class="unb-n">UNBOUNDED™</div><div class="unb-d">Barcelona · August 2026 · <?php echo esc_html( $remaining ); ?> spots</div></div>
						<a class="unb-btn" href="https://unboundedglobal.com/">Register →</a>
					</div>
				</div>

				<div class="mc">
					<div class="slbl">Core Alliances</div>
					<a class="ml" href="https://worldlawalliance.com/transactional/"><div class="ml-n">WLA Transactional</div><div class="ml-d">M&A · Corporate · Joint ventures</div></a>
					<a class="ml" href="https://worldlawalliance.com/ma-practice/"><div class="ml-n">M&A Practice</div><div class="ml-d">Cross-border acquisitions · Mergers</div></a>
					<a class="ml" href="https://worldlawalliance.com/practice-ip/"><div class="ml-n">Intellectual Property</div><div class="ml-d">Patents · Trademarks · Licensing</div></a>
					<a class="ml" href="https://worldlawalliance.com/global-dispute/"><div class="ml-n">Global Dispute Group</div><div class="ml-d">Litigation · Cross-border enforcement</div></a>
					<a class="ml" href="https://worldlawalliance.com/arbitration-mediation-group/"><div class="ml-n">Arbitration &amp; Mediation</div><div class="ml-d">HKIAC · ICC · LCIA · Commercial</div></a>
					<a class="ml" href="https://worldlawalliance.com/insolvency/"><div class="ml-n">Insolvency &amp; Restructuring</div><div class="ml-d">Cross-border · COMI · WHOA</div></a>
					<div style="margin-top:14px !important;padding-top:12px !important;border-top:1px solid rgba(6,20,31,.07) !important">
						<div class="slbl" style="margin-bottom:10px !important">Specialist Groups</div>
						<a class="ms" href="https://worldlawalliance.com/immigration/">Immigration &amp; Mobility <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/tax/">Tax Group <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/employment/">Labour &amp; Employment <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/energy/">Energy &amp; Infrastructure <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/contract-solutions/">Contract Solutions <span class="ms-arr">→</span></a>
					</div>
				</div>

				<div class="mc">
					<div class="slbl">By Region</div>
					<a class="ms" href="https://worldlawalliance.com/europe-2/">WLA Europe <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/asia/">WLA Asia Pacific <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/africa-middleeast/">WLA Africa &amp; Middle East <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/america/">WLA Americas <span class="ms-arr">→</span></a>
					<div style="margin-top:16px !important;padding-top:14px !important;border-top:1px solid rgba(6,20,31,.07) !important">
						<div class="slbl" style="margin-bottom:10px !important">Key Jurisdictions</div>
						<a class="ms" href="https://worldlawalliance.com/jurisdiction-india/">India <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/uae-jurisdiction/">UAE <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/singapore-jurisdiction/">Singapore <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/united-kingdom-jurisdiction/">United Kingdom <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/hong-kong-jurisdiction/">Hong Kong <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/germany-jurisdiction/">Germany <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/france-jurisdiction/">France <span class="ms-arr">→</span></a>
						<a class="ms" href="https://worldlawalliance.com/firms-directory/" style="font-weight:700 !important;color:#2d6e10 !important">All 90+ jurisdictions → <span class="ms-arr" style="opacity:1 !important">→</span></a>
					</div>
				</div>

				<div class="mc" style="display:flex !important;flex-direction:column !important;gap:10px !important;padding-top:32px !important">
					<a class="img-card" href="https://worldlawalliance.com/how-it-works/" style="height:180px !important">
						<img src="https://worldlawalliance.com/wp-content/uploads/2026/03/legal-concept-scales-justice-judge-s-gavel-hammer-as-symbol-law-order-402757407.webp" alt="Legal">
						<div class="img-card-ov"></div>
						<div class="img-card-body">
							<div class="img-card-tag">Co-Practice Model</div>
							<div class="img-card-title">Partner firms jointly hold the matter. One team.</div>
						</div>
					</a>
					<a class="img-card" href="https://worldlawalliance.com/referral-engine-content/" style="height:150px !important">
						<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=85" alt="Specialist">
						<div class="img-card-ov"></div>
						<div class="img-card-body">
							<div class="img-card-tag">Find a Specialist — 48h</div>
							<div class="img-card-title">Brief us. The right specialist responds within 48 hours.</div>
						</div>
					</a>
					<a href="https://worldlawalliance.com/firms-directory/" style="display:flex !important;align-items:center !important;justify-content:space-between !important;padding:12px 14px !important;background:rgba(6,20,31,.03) !important;border:1px solid rgba(6,20,31,.08) !important;border-radius:2px !important;text-decoration:none !important;transition:background .14s !important" onmouseover="this.style.background='rgba(107,191,62,.07)'" onmouseout="this.style.background='rgba(6,20,31,.03)'">
						<div style="font-size:12px !important;font-weight:600 !important;color:#06141F !important;font-family:'Inter',sans-serif !important">Partner Firms Directory</div>
						<div style="font-size:10px !important;font-weight:500 !important;color:#6BBF3E !important;font-family:'Inter',sans-serif !important">90+ jurisdictions →</div>
					</a>
				</div>

			</div>
			<div class="mega-strip">
				<a class="strip-a" href="https://worldlawalliance.com/referral-engine-content/"><span class="sdot g"></span>Find a Specialist — matched in 48 hours</a>
				<a class="strip-a" href="https://worldlawalliance.com/how-it-works/"><span class="sdot"></span>How WLA co-practice works</a>
				<a class="strip-a" href="https://worldlawalliance.com/accreditation/"><span class="sdot"></span>WLA Qualified accreditation</a>
				<a class="strip-a" href="https://worldlawalliance.com/firms-directory/"><span class="sdot"></span>Partner firms directory</a>
				<div class="strip-right">contact@worldlawalliance</div>
			</div>
		</div>

		<!-- ════════════════════════════════════════════════
			SECTORS PANEL
		════════════════════════════════════════════════════ -->
		<div class="mega" id="wla-panel-sectors">
			<div class="mega-body g-sectors">

				<div class="mc-feat">
					<div>
						<div class="feat-tag">Sector Groups</div>
						<div class="feat-h">Industry expertise.<br><em>Global reach.</em></div>
						<div class="feat-p">12 sector-focused groups. Specialists who understand your industry's legal language in every jurisdiction you operate in.</div>
						<div class="feat-stats">
							<div><div class="fsn">12</div><div class="fsl">Sector Groups</div></div>
							<div><div class="fsn">90+</div><div class="fsl">Jurisdictions</div></div>
						</div>
						<a class="feat-cta" href="https://worldlawalliance.com/for-clients/">All sectors →</a>
					</div>
					<a class="img-card" href="https://worldlawalliance.com/for-clients/" style="height:160px !important;margin-top:16px !important;border-radius:4px !important">
						<img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=85" alt="Global">
						<div class="img-card-ov"></div>
						<div class="img-card-body">
							<div class="img-card-tag">Sector Intelligence</div>
							<div class="img-card-title">12 sectors. Every industry. Global.</div>
						</div>
					</a>
				</div>

				<div class="mc">
					<div class="slbl">Business Sectors</div>
					<a class="ml" href="https://worldlawalliance.com/private-equity/"><div class="ml-n">Private Equity &amp; Funds</div><div class="ml-d">Funds · Portfolio · Cross-border M&A</div></a>
					<a class="ml" href="https://worldlawalliance.com/sector-technology/"><div class="ml-n">Technology</div><div class="ml-d">Scale-ups · IP · International expansion</div></a>
					<a class="ml" href="https://worldlawalliance.com/energy/"><div class="ml-n">Energy &amp; Infrastructure</div><div class="ml-d">Project finance · Regulatory</div></a>
					<a class="ml" href="https://worldlawalliance.com/compliance/"><div class="ml-n">Compliance &amp; Regulatory</div><div class="ml-d">Multi-jurisdiction · Risk</div></a>
					<a class="ml" href="https://worldlawalliance.com/institutions/"><div class="ml-n">Institutions &amp; Development</div><div class="ml-d">Multilaterals · NGOs · DFIs</div></a>
					<a class="ml" href="https://worldlawalliance.com/fashion/"><div class="ml-n">Fashion &amp; Luxury Goods</div><div class="ml-d">IP · Brand protection · Distribution</div></a>
					<a class="ml" href="https://worldlawalliance.com/charities/"><div class="ml-n">Charities &amp; Non-Profits</div><div class="ml-d">Governance · Global operations</div></a>
				</div>

				<div class="mc">
					<div class="slbl">Individual &amp; Family</div>
					<a class="ml" href="https://worldlawalliance.com/hnw/"><div class="ml-n">High Net Worth</div><div class="ml-d">Wealth · Estates · Asset protection</div></a>
					<a class="ml" href="https://worldlawalliance.com/sector-family-office/"><div class="ml-n">Family Office</div><div class="ml-d">Governance · Succession · Cross-border</div></a>
					<a class="ml" href="https://worldlawalliance.com/sector-founder/"><div class="ml-n">Founders &amp; Entrepreneurs</div><div class="ml-d">Startup legal · New market entry</div></a>
					<a class="ml" href="https://worldlawalliance.com/private-clients/"><div class="ml-n">Private Clients</div><div class="ml-d">Personal legal · Confidential</div></a>
					<a class="ml" href="https://worldlawalliance.com/professionals/"><div class="ml-n">Professionals</div><div class="ml-d">Individual advisory · Practice support</div></a>
					<div class="ref-card">
						<div class="ref-h">48-Hour Referral Engine</div>
						<div class="ref-p">Brief us on your matter. The right specialist — in your jurisdiction — responds within 48 hours.</div>
						<a class="ref-a" href="https://worldlawalliance.com/referral-engine-content/">Find a specialist →</a>
					</div>
				</div>

				<div class="mc">
					<div class="slbl">Disputes &amp; ADR</div>
					<a class="ml" href="https://worldlawalliance.com/disputes/"><div class="ml-n">Disputes</div><div class="ml-d">Cross-border · Resolution</div></a>
					<div style="margin-top:14px !important">
						<div class="slbl">Connected Organisations</div>
						<a href="https://theneutrals.org" target="_blank" rel="noopener" style="display:flex !important;align-items:center !important;gap:10px !important;padding:12px 14px !important;background:rgba(6,20,31,.03) !important;border:1px solid rgba(6,20,31,.08) !important;border-radius:2px !important;text-decoration:none !important;margin-bottom:6px !important;transition:background .14s !important" onmouseover="this.style.background='rgba(107,191,62,.06)'" onmouseout="this.style.background='rgba(6,20,31,.03)'">
							<div style="width:8px !important;height:8px !important;border-radius:50% !important;background:#6BBF3E !important;flex-shrink:0 !important"></div>
							<div><div style="font-size:12.5px !important;font-weight:600 !important;color:#06141F !important;font-family:'Inter',sans-serif !important">TheNeutrals.ORG™</div><div style="font-size:10px !important;color:rgba(6,20,31,.4) !important;margin-top:2px !important;font-family:'Inter',sans-serif !important">1,500+ certified neutrals · ADR</div></div>
							<div style="font-size:10px !important;color:rgba(6,20,31,.3) !important;margin-left:auto !important;font-family:'Inter',sans-serif !important">↗</div>
						</a>
						<a href="https://unboundedglobal.com/" style="display:flex !important;align-items:center !important;gap:10px !important;padding:12px 14px !important;background:rgba(6,20,31,.03) !important;border:1px solid rgba(6,20,31,.08) !important;border-radius:2px !important;text-decoration:none !important;transition:background .14s !important" onmouseover="this.style.background='rgba(107,191,62,.06)'" onmouseout="this.style.background='rgba(6,20,31,.03)'">
							<div style="width:8px !important;height:8px !important;border-radius:50% !important;background:#06141F !important;flex-shrink:0 !important"></div>
							<div><div style="font-size:12.5px !important;font-weight:600 !important;color:#06141F !important;font-family:'Inter',sans-serif !important">UNBOUNDED™</div><div style="font-size:10px !important;color:rgba(6,20,31,.4) !important;margin-top:2px !important;font-family:'Inter',sans-serif !important">World Summit · Barcelona 2026</div></div>
							<div style="font-size:10px !important;color:rgba(6,20,31,.3) !important;margin-left:auto !important;font-family:'Inter',sans-serif !important">↗</div>
						</a>
					</div>
				</div>

			</div>
			<div class="mega-strip">
				<a class="strip-a" href="https://worldlawalliance.com/referral-engine-content/"><span class="sdot g"></span>Find a sector specialist — 48 hours</a>
				<a class="strip-a" href="https://worldlawalliance.com/for-clients/"><span class="sdot"></span>How WLA serves clients</a>
				<div class="strip-right">contact@worldlawalliance</div>
			</div>
		</div>

		<!-- ════════════════════════════════════════════════
			WHO WE SERVE PANEL
		════════════════════════════════════════════════════ -->
		<div class="mega" id="wla-panel-serve">
			<div class="mega-body g-serve">

				<div class="mc-feat">
					<div>
						<div class="feat-tag">Client Types</div>
						<div class="feat-h">Your situation.<br><em>Your specialist.</em></div>
						<div class="feat-p">WLA serves businesses, GC teams, families and individuals across 90+ jurisdictions.</div>
						<a class="feat-cta" href="https://worldlawalliance.com/for-clients/">Who we serve →</a>
					</div>
					<a class="img-card" href="https://worldlawalliance.com/for-clients/" style="height:170px !important;margin-top:20px !important;border-radius:4px !important">
						<img src="https://worldlawalliance.com/wp-content/uploads/2026/03/legal-concept-scales-justice-judge-s-gavel-hammer-as-symbol-law-order-402757407.webp" alt="Serve">
						<div class="img-card-ov"></div>
						<div class="img-card-body">
							<div class="img-card-tag">General Counsel</div>
							<div class="img-card-title">WLA Bench. Your cross-border team, assembled.</div>
						</div>
					</a>
				</div>

				<div class="mc">
					<div class="slbl">For Business</div>
					<a class="ml" href="https://worldlawalliance.com/for-gc/"><div class="ml-n">General Counsel</div><div class="ml-d">WLA Bench · GC Council · Co-practice</div></a>
					<a class="ml" href="https://worldlawalliance.com/co-practice/"><div class="ml-n">In-House Connect</div><div class="ml-d">Co-practice · External counsel integration</div></a>
					<a class="ml" href="https://worldlawalliance.com/private-equity/"><div class="ml-n">Private Equity &amp; Funds</div><div class="ml-d">Cross-border acquisitions · Portfolio</div></a>
					<a class="ml" href="https://worldlawalliance.com/sector-technology/"><div class="ml-n">Technology Companies</div><div class="ml-d">International expansion · IP strategy</div></a>
					<a class="ml" href="https://worldlawalliance.com/sector-founder/"><div class="ml-n">Founders &amp; Startups</div><div class="ml-d">Legal infrastructure · New markets</div></a>
					<a class="ml" href="https://worldlawalliance.com/institutions/"><div class="ml-n">Institutions &amp; Development</div><div class="ml-d">Multilaterals · NGOs · DFIs</div></a>
				</div>

				<div class="mc">
					<div class="slbl">For Individuals &amp; Families</div>
					<a class="ml" href="https://worldlawalliance.com/hnw/"><div class="ml-n">Family Offices &amp; HNW</div><div class="ml-d">Wealth · Estates · Residency planning</div></a>
					<a class="ml" href="https://worldlawalliance.com/private-clients/"><div class="ml-n">Private Clients</div><div class="ml-d">Confidential · Discreet personal legal</div></a>
					<a class="ml" href="https://worldlawalliance.com/immigration/"><div class="ml-n">Immigration &amp; Mobility</div><div class="ml-d">Global mobility · Visas · Residency</div></a>
					<a class="ml" href="https://worldlawalliance.com/professionals/"><div class="ml-n">Professionals</div><div class="ml-d">Individual advisory · Practice support</div></a>
					<div class="ref-card">
						<div class="ref-h">48-Hour Referral Engine</div>
						<div class="ref-p">Brief us once. WLA matches you with the right specialist — WLA Qualified, in your jurisdiction.</div>
						<a class="ref-a" href="https://worldlawalliance.com/referral-engine-content/">Find a specialist →</a>
					</div>
				</div>

			</div>
			<div class="mega-strip">
				<a class="strip-a" href="https://worldlawalliance.com/referral-engine-content/"><span class="sdot g"></span>Referral engine — matched in 48 hours</a>
				<a class="strip-a" href="https://worldlawalliance.com/for-gc/"><span class="sdot"></span>WLA for General Counsel</a>
				<div class="strip-right">contact@worldlawalliance</div>
			</div>
		</div>

		<!-- ════════════════════════════════════════════════
			CORRIDORS PANEL
		════════════════════════════════════════════════════ -->
		<div class="mega" id="wla-panel-corridors">
			<div class="mega-body g-corridors">

				<div class="mc-feat">
					<div>
						<div class="feat-tag">Deal Corridors</div>
						<div class="feat-h">Cross-border corridors.<br><em>Both sides. Live.</em></div>
						<div class="feat-p">WLA co-practices both sides of the world's most active cross-border legal corridors simultaneously. One brief. Both jurisdictions held.</div>
						<div class="feat-stats">
							<div><div class="fsn">6</div><div class="fsl">Active</div></div>
							<div><div class="fsn">Both</div><div class="fsl">Sides held</div></div>
						</div>
						<a class="feat-cta" href="https://worldlawalliance.com/how-it-works/">How corridors work →</a>
					</div>
					<a class="img-card" href="https://worldlawalliance.com/how-it-works/" style="height:148px !important;margin-top:16px !important;border-radius:4px !important">
						<img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=600&q=85" alt="City">
						<div class="img-card-ov"></div>
						<div class="img-card-body">
							<div class="img-card-tag">Co-Practice Corridors</div>
							<div class="img-card-title">Both sides. One brief. Brief to close.</div>
						</div>
					</a>
				</div>

				<div class="mc">
					<div class="slbl">Active Corridors 2026</div>
					<a class="corr-card" href="https://worldlawalliance.com/gulf-to-cee-deal-corridor/"><div><div class="corr-r">Gulf <span>→</span> CEE</div><div class="corr-s">GCC · Central &amp; Eastern Europe</div></div><div class="corr-pct">+38%</div></a>
					<a class="corr-card" href="https://worldlawalliance.com/eu-india-corridor/"><div><div class="corr-r">EU <span>→</span> India</div><div class="corr-s">Trade · Technology · Investment</div></div><div class="corr-pct">+34%</div></a>
					<a class="corr-card" href="https://worldlawalliance.com/gcc-%e2%86%92-se-asia-deal-corridor/"><div><div class="corr-r">GCC <span>→</span> SE Asia</div><div class="corr-s">Gulf capital into ASEAN</div></div><div class="corr-pct">+31%</div></a>
					<a class="corr-card" href="https://worldlawalliance.com/us-europe-corridor/"><div><div class="corr-r">US <span>↔</span> Europe</div><div class="corr-s">Transatlantic M&amp;A · Highest volume</div></div><div class="corr-pct">+18%</div></a>
					<a class="corr-card" href="https://worldlawalliance.com/corridor-apac-americas/"><div><div class="corr-r">APAC <span>↔</span> Americas</div><div class="corr-s">Pacific Rim · Cross-border flows</div></div><div class="corr-pct">+19%</div></a>
					<a class="corr-card" href="https://worldlawalliance.com/corridor-uk-to-africa/"><div><div class="corr-r">UK <span>→</span> Africa</div><div class="corr-s">Common law · Critical minerals · BII</div></div><div class="corr-pct">+22%</div></a>
				</div>

				<div class="mc">
					<div class="slbl">Jurisdiction Spotlights</div>
					<a class="ms" href="https://worldlawalliance.com/jurisdiction-india/">India <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/uae-jurisdiction/">United Arab Emirates <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/singapore-jurisdiction/">Singapore <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/united-kingdom-jurisdiction/">United Kingdom <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/germany-jurisdiction/">Germany <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/france-jurisdiction/">France <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/netherlands-jurisdiction/">Netherlands <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/portugal-jurisdiction/">Portugal <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/hong-kong-jurisdiction/">Hong Kong <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/jurisdiction-poland/">Poland <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/bahamas-jurisdiction/">Bahamas <span class="ms-arr">→</span></a>
					<a class="ms" href="https://worldlawalliance.com/zambia-jurisdiction/">Zambia <span class="ms-arr">→</span></a>
				</div>

			</div>
			<div class="mega-strip">
				<a class="strip-a" href="https://worldlawalliance.com/referral-engine-content/"><span class="sdot g"></span>Find a corridor specialist</a>
				<a class="strip-a" href="https://worldlawalliance.com/how-it-works/"><span class="sdot"></span>How corridor co-practice works</a>
				<a class="strip-a" href="https://worldlawalliance.com/firms-directory/"><span class="sdot"></span>All partner firms</a>
				<div class="strip-right">contact@worldlawalliance</div>
			</div>
		</div>

		<!-- ════════════════════════════════════════════════
			ABOUT PANEL
		════════════════════════════════════════════════════ -->
		<div class="mega" id="wla-panel-about">
			<div class="mega-body g-about">

				<div class="mc-feat">
					<div>
						<div class="feat-tag">The Institution</div>
						<div class="feat-h">An institution.<br><em>Not a network.</em></div>
						<div class="feat-p">The only place where cross-border legal responsibility and execution are held together — by independently excellent firms, under one Institutional framework.</div>
						<a class="feat-cta" href="https://worldlawalliance.com/about-us/">About WLA →</a>
					</div>
					<a class="img-card" href="https://worldlawalliance.com/accreditation/" style="height:150px !important;margin-top:20px !important;border-radius:4px !important">
						<img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&q=85" alt="Institution">
						<div class="img-card-ov"></div>
						<div class="img-card-body">
							<div class="img-card-tag">WLA Qualified</div>
							<div class="img-card-title">The standard that defines Institutional co-practice.</div>
						</div>
					</a>
				</div>

				<div class="mc">
					<div class="slbl">The Institution</div>
					<a class="ml" href="https://worldlawalliance.com/about-us/"><div class="ml-n">About WLA</div><div class="ml-d">Story · Pillars · Vision</div></a>
					<a class="ml" href="https://worldlawalliance.com/how-it-works/"><div class="ml-n">How It Works</div><div class="ml-d">Central Command model explained</div></a>
					<a class="ml" href="https://worldlawalliance.com/accreditation/"><div class="ml-n">WLA Qualified / Accreditation</div><div class="ml-d">The designation · 7 criteria</div></a>
					<a class="ml" href="https://worldlawalliance.com/neutrals/"><div class="ml-n">WLA Neutrals</div><div class="ml-d">Dispute resolution · ADR network</div></a>
					<a class="ml" href="https://worldlawalliance.com/firms-directory/"><div class="ml-n">Partner Firms Directory</div><div class="ml-d">All WLA Qualified firms · 90+ jurisdictions</div></a>
					<a class="ml" href="https://worldlawalliance.com/for-firms/"><div class="ml-n">For Law Firms</div><div class="ml-d">Designation · Co-practice · Benefits</div></a>
				</div>

				<div class="mc">
					<div class="slbl">Get Started</div>
					<a class="ml" href="https://worldlawalliance.com/referral-engine-content/"><div class="ml-n">Find a Specialist</div><div class="ml-d">Matched within 48 hours</div></a>
					<a class="ml" href="https://worldlawalliance.com/partners-expression-of-interest/"><div class="ml-n">Be a WLA Partner</div><div class="ml-d">Designation expression of interest</div></a>
					<a class="ml" href="https://worldlawalliance.com/list-blog-post/"><div class="ml-n">Insights</div><div class="ml-d">Intelligence · Analysis · Commentary</div></a>
					<a class="ml" href="https://worldlawalliance.com/our-professionals-list/"><div class="ml-n">Our Professionals</div><div class="ml-d">WLA team · Leadership</div></a>
					<div class="cbox">
						<div class="cbox-email">contact@worldlawalliance</div>
						<div class="cbox-det">+91 9818030146 <br>New Delhi · Vienna</div>
					</div>
				</div>

			</div>
			<div class="mega-strip">
				<a class="strip-a" href="https://worldlawalliance.com/about-us/"><span class="sdot"></span>About World Law Alliance</a>
				<a class="strip-a" href="https://worldlawalliance.com/accreditation/"><span class="sdot"></span>WLA Qualified standard</a>
				<a class="strip-a" href="https://worldlawalliance.com/partners-expression-of-interest/"><span class="sdot g"></span>Apply for designation</a>
				<div class="strip-right">worldlawalliance.com</div>
			</div>
		</div>

		<!-- ════════════════════════════════════════════════
			MOBILE DRAWER
		════════════════════════════════════════════════════ -->
		<div class="mobile-drawer" id="wla-drawer">
			<div class="drawer-overlay" onclick="wlaDrawerClose()"></div>
			<div class="drawer-panel">

				<div class="drawer-head">
					<a class="drawer-logo" href="https://worldlawalliance.com/">
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="World Law Alliance">
					</a>
					<button class="drawer-close" onclick="wlaDrawerClose()" aria-label="Close menu">✕</button>
				</div>

				<div class="drawer-body">

					<!-- PRACTICES -->
					<div class="dacc">
						<button class="dacc-head" type="button">
							Practices
							<span class="dacc-arrow"><svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="#06141F" stroke-width="1.5" stroke-linecap="round"/></svg></span>
						</button>
						<div class="dacc-body">
							<span class="m-slbl">Core Alliances</span>
							<a class="m-link" href="https://worldlawalliance.com/transactional/">WLA Transactional <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/ma-practice/">M&amp;A Practice <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/practice-ip/">Intellectual Property <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/global-dispute/">Global Dispute Group <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/arbitration-mediation-group/">Arbitration &amp; Mediation <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/insolvency/">Insolvency &amp; Restructuring <span class="m-link-arr">→</span></a>
							<span class="m-slbl" style="margin-top:10px !important">Specialist Groups</span>
							<a class="m-link" href="https://worldlawalliance.com/immigration/">Immigration &amp; Mobility <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/tax/">Tax Group <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/employment/">Labour &amp; Employment <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/energy/">Energy &amp; Infrastructure <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/contract-solutions/">Contract Solutions <span class="m-link-arr">→</span></a>
							<span class="m-slbl" style="margin-top:10px !important">By Region</span>
							<a class="m-link" href="https://worldlawalliance.com/europe-2/">WLA Europe <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/asia/">WLA Asia Pacific <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/africa-middleeast/">WLA Africa &amp; Middle East <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/america/">WLA Americas <span class="m-link-arr">→</span></a>
							<a class="m-unb" href="https://unboundedglobal.com/">
								<div><div class="m-unb-n">UNBOUNDED™</div><div class="m-unb-d">Barcelona · August 2026 · <?php echo esc_html( $remaining ); ?> spots</div></div>
								<span class="m-unb-btn">Register →</span>
							</a>
						</div>
					</div>

					<!-- SECTORS -->
					<div class="dacc">
						<button class="dacc-head" type="button">
							Sectors
							<span class="dacc-arrow"><svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="#06141F" stroke-width="1.5" stroke-linecap="round"/></svg></span>
						</button>
						<div class="dacc-body">
							<span class="m-slbl">Business Sectors</span>
							<a class="m-link" href="https://worldlawalliance.com/private-equity/">Private Equity &amp; Funds <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/sector-technology/">Technology <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/energy/">Energy &amp; Infrastructure <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/compliance/">Compliance &amp; Regulatory <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/institutions/">Institutions &amp; Development <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/fashion/">Fashion &amp; Luxury Goods <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/charities/">Charities &amp; Non-Profits <span class="m-link-arr">→</span></a>
							<span class="m-slbl" style="margin-top:10px !important">Individual &amp; Family</span>
							<a class="m-link" href="https://worldlawalliance.com/hnw/">High Net Worth <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/sector-family-office/">Family Office <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/sector-founder/">Founders &amp; Entrepreneurs <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/private-clients/">Private Clients <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/professionals/">Professionals <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/disputes/">Disputes <span class="m-link-arr">→</span></a>
						</div>
					</div>

					<!-- WHO WE SERVE -->
					<div class="dacc">
						<button class="dacc-head" type="button">
							Who We Serve
							<span class="dacc-arrow"><svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="#06141F" stroke-width="1.5" stroke-linecap="round"/></svg></span>
						</button>
						<div class="dacc-body">
							<span class="m-slbl">For Business</span>
							<a class="m-link" href="https://worldlawalliance.com/for-gc/">General Counsel <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/co-practice/">In-House Connect <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/private-equity/">Private Equity &amp; Funds <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/sector-technology/">Technology Companies <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/sector-founder/">Founders &amp; Startups <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/institutions/">Institutions &amp; Development <span class="m-link-arr">→</span></a>
							<span class="m-slbl" style="margin-top:10px !important">For Individuals &amp; Families</span>
							<a class="m-link" href="https://worldlawalliance.com/hnw/">Family Offices &amp; HNW <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/private-clients/">Private Clients <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/immigration/">Immigration &amp; Mobility <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/professionals/">Professionals <span class="m-link-arr">→</span></a>
						</div>
					</div>

					<!-- CORRIDORS -->
					<div class="dacc">
						<button class="dacc-head" type="button">
							Corridors
							<span class="dacc-arrow"><svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="#06141F" stroke-width="1.5" stroke-linecap="round"/></svg></span>
						</button>
						<div class="dacc-body">
							<span class="m-slbl">Active Corridors 2026</span>
							<a class="m-link" href="https://worldlawalliance.com/gulf-to-cee-deal-corridor/">Gulf → CEE <span class="m-link-arr">+38%</span></a>
							<a class="m-link" href="https://worldlawalliance.com/eu-india-corridor/">EU → India <span class="m-link-arr">+34%</span></a>
							<a class="m-link" href="https://worldlawalliance.com/gcc-%e2%86%92-se-asia-deal-corridor/">GCC → SE Asia <span class="m-link-arr">+31%</span></a>
							<a class="m-link" href="https://worldlawalliance.com/us-europe-corridor/">US ↔ Europe <span class="m-link-arr">+18%</span></a>
							<a class="m-link" href="https://worldlawalliance.com/corridor-apac-americas/">APAC ↔ Americas <span class="m-link-arr">+19%</span></a>
							<a class="m-link" href="https://worldlawalliance.com/corridor-uk-to-africa/">UK → Africa <span class="m-link-arr">+22%</span></a>
							<span class="m-slbl" style="margin-top:10px !important">Jurisdiction Spotlights</span>
							<a class="m-link" href="https://worldlawalliance.com/jurisdiction-india/">India <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/uae-jurisdiction/">UAE <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/singapore-jurisdiction/">Singapore <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/united-kingdom-jurisdiction/">United Kingdom <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/germany-jurisdiction/">Germany <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/hong-kong-jurisdiction/">Hong Kong <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/firms-directory/" style="color:#2d6e10 !important;font-weight:700 !important">All 90+ jurisdictions <span class="m-link-arr">→</span></a>
						</div>
					</div>

					<a class="d-direct" href="https://worldlawalliance.com/for-firms/">For Law Firms <span style="color:#6BBF3E !important">→</span></a>

					<!-- ABOUT -->
					<div class="dacc">
						<button class="dacc-head" type="button">
							About
							<span class="dacc-arrow"><svg viewBox="0 0 11 11" fill="none"><path d="M1.5 3.5l4 4 4-4" stroke="#06141F" stroke-width="1.5" stroke-linecap="round"/></svg></span>
						</button>
						<div class="dacc-body">
							<a class="m-link" href="https://worldlawalliance.com/about-us/">About WLA <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/how-it-works/">How It Works <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/accreditation/">WLA Qualified / Accreditation <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/neutrals/">WLA Neutrals <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/firms-directory/">Partner Firms Directory <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/for-firms/">For Law Firms <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/referral-engine-content/">Find a Specialist <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/partners-expression-of-interest/">Be a WLA Partner <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/list-blog-post/">Insights <span class="m-link-arr">→</span></a>
							<a class="m-link" href="https://worldlawalliance.com/our-professionals-list/">Our Professionals <span class="m-link-arr">→</span></a>
						</div>
					</div>

					<a class="d-direct" href="https://worldlawalliance.com/list-blog-post/">Insights <span style="color:#6BBF3E !important">→</span></a>

				</div><!-- /.drawer-body -->

				<div class="drawer-foot">
					<a class="wla-btn-solid green" href="https://worldlawalliance.com/referral-engine-content/">Find a Specialist</a>
					<a class="wla-btn-outline" href="<?php echo esc_url( $signin_url ); ?>"><?php echo esc_html( $signin_text ); ?></a>
					<a class="wla-btn-solid" href="https://worldlawalliance.com/partners-expression-of-interest/">Expression of Interest</a>
				</div>

			</div><!-- /.drawer-panel -->
		</div><!-- /.mobile-drawer -->

		</div><!-- /.wlanav -->

		<?php
		return ob_get_clean();
	}


	/**
	 * The shortcode itself — outputs HTML only.
	 * All styling lives in wla-footer.css, all behaviour in wla-footer.js.
	 */
	public function wla_custom_footer_shortcode() {
		ob_start();
		?>
		<!-- ══ TICKER ══════════════════════════════════════ -->
		<div class="sk-ticker">
		<div class="sk-ticker-track">
			<div class="sk-ticker-item"><strong>151 Partner Firms</strong> across 90+ jurisdictions <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">Co-Practice Both Sides of Every Corridor <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">WLA Qualified — <strong>Accreditation Standards</strong> <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">12 Practice Groups · Global Dispute · Arbitration &amp; Mediation <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">UNBOUNDED™ — Barcelona, 14–15 August 2026 <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">1,500+ Certified Neutrals via TheNeutrals.ORG™ <span class="sk-ticker-sep"></span></div>
			<!-- duplicate for seamless loop -->
			<div class="sk-ticker-item"><strong>151 Partner Firms</strong> across 90+ jurisdictions <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">Co-Practice Both Sides of Every Corridor <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">WLA Qualified — <strong>Accreditation Standards</strong> <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">12 Practice Groups · Global Dispute · Arbitration &amp; Mediation <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">UNBOUNDED™ — Barcelona, 14–15 August 2026 <span class="sk-ticker-sep"></span></div>
			<div class="sk-ticker-item">1,500+ Certified Neutrals via TheNeutrals.ORG™ <span class="sk-ticker-sep"></span></div>
		</div>
		</div>

		<!-- ══ CTA BAND ══════════════════════════════════════ -->
		<div class="sk-cta">
		<div class="sk-cta-inner">
			<div>
			<div class="sk-cta-eyebrow">Cross-border deal? We co-practice both sides.</div>
			<div class="sk-cta-h">One brief covers both jurisdictions<br><em>— brief to close.</em></div>
			<p class="sk-cta-note">151 Partner Firms · 90+ Jurisdictions · 12 Practice Groups</p>
			</div>
			<div class="sk-cta-btns">
			<a href="https://worldlawalliance.com/for-firms/" class="sk-btn-primary">Be a WLA Partner →</a>
			<a href="https://worldlawalliance.com/firms-directory/" class="sk-btn-ghost">Partner Firms Directory</a>
			</div>
		</div>
		</div>

		<!-- ══ MAIN FOOTER ════════════════════════════════════ -->
		<footer class="wla-footer">

		<div class="sk-wrap">

			<div class="sk-top">

			<!-- Brand -->
			<div>
				<a href="https://worldlawalliance.com/">
				<span class="sk-logo-name">WLA<span>™ World Law Alliance</span></span>
				<span class="sk-logo-byline">Practice Together. Globally.</span>
				</a>
				<p class="sk-brand-desc">
				The world's finest independent law firms, co-practicing across borders. 151 partner firms. 90+ jurisdictions. One brief, both sides.
				</p>
				<ul class="sk-creds">
				<li class="sk-cred"><div class="sk-cred-dash"></div><span><strong>WLA Qualified</strong> — every partner firm independently accredited</span></li>
				<li class="sk-cred"><div class="sk-cred-dash"></div><span><strong>90+ Jurisdictions</strong> covered across active deal corridors</span></li>
				<li class="sk-cred"><div class="sk-cred-dash"></div><span><strong>12 Practice Groups</strong> spanning M&amp;A, IP, Arbitration &amp; more</span></li>
				<li class="sk-cred"><div class="sk-cred-dash"></div><span><strong>151 Partner Firms</strong> · Co-practicing since founding</span></li>
				</ul>
				<div class="sk-socials">
				<a href="#" class="sk-social" title="Facebook">f</a>
				<a href="#" class="sk-social" title="LinkedIn">in</a>
				<a href="#" class="sk-social" title="X">𝕏</a>
				<a href="#" class="sk-social" title="YouTube">yt</a>
				<a href="mailto:contact@worldlawalliance.com" class="sk-social" title="Email">✉</a>
				</div>
			</div>

			<!-- Nav -->
			<div class="sk-nav">

				<div class="sk-col">
				<span class="sk-col-title">Practices</span>
				<ul>
					<li><a href="https://worldlawalliance.com/transactional/">WLA Transactional</a></li>
					<li><a href="https://worldlawalliance.com/practice-ip/">Intellectual Property</a></li>
					<li><a href="https://worldlawalliance.com/global-dispute/">Global Dispute Group</a></li>
					<li><a href="https://worldlawalliance.com/arbitration-mediation-group/">Arbitration &amp; Mediation</a></li>
					<li><a href="https://worldlawalliance.com/insolvency/">Insolvency &amp; Restructuring</a></li>
					<li><a href="https://worldlawalliance.com/immigration/">Immigration &amp; Mobility</a></li>
					<li><a href="https://worldlawalliance.com/tax/">Tax Group <span class="sk-pill sk-pill-gold">New</span></a></li>
				</ul>
				</div>

				<div class="sk-col">
				<span class="sk-col-title">Corridors</span>
				<ul>
					<li><a href="https://worldlawalliance.com/gulf-to-cee-deal-corridor/">Gulf → CEE <span class="sk-pill sk-pill-green">+38%</span></a></li>
					<li><a href="https://worldlawalliance.com/eu-india-corridor/">EU → India</a></li>
					<li><a href="https://worldlawalliance.com/gcc-%e2%86%92-se-asia-deal-corridor/">GCC → SE Asia</a></li>
					<li><a href="https://worldlawalliance.com/us-europe-corridor/">US ↔ Europe</a></li>
					<li><a href="https://worldlawalliance.com/corridor-apac-americas/">APAC ↔ Americas</a></li>
					<li><a href="https://worldlawalliance.com/corridor-uk-to-africa/">UK → Africa</a></li>
				</ul>
				</div>

				<div class="sk-col">
				<span class="sk-col-title">Sectors</span>
				<ul>
					<li><a href="https://worldlawalliance.com/private-equity/">Private Equity &amp; Funds</a></li>
					<li><a href="https://worldlawalliance.com/sector-technology/">Technology</a></li>
					<li><a href="https://worldlawalliance.com/energy/">Energy &amp; Infrastructure</a></li>
					<li><a href="https://worldlawalliance.com/hnw/">Family Office &amp; HNW</a></li>
					<li><a href="https://worldlawalliance.com/fashion/">Fashion &amp; Luxury Goods</a></li>
					<li><a href="https://worldlawalliance.com/charities/">Charities &amp; Non-Profits</a></li>
				</ul>
				</div>

				<div class="sk-col">
				<span class="sk-col-title">The Institution</span>
				<ul>
					<li><a href="https://worldlawalliance.com/about-us/">About WLA</a></li>
					<li><a href="https://worldlawalliance.com/how-it-works/">How It Works</a></li>
					<li><a href="https://worldlawalliance.com/accreditation/">WLA Qualified</a></li>
					<li><a href="https://worldlawalliance.com/firms-directory/">Partner Firms Directory</a></li>
					<li><a href="https://worldlawalliance.com/partners-expression-of-interest/">Be a WLA Partner</a></li>
					<li><a href="https://worldlawalliance.com/partner-portal/">Partner Portal</a></li>
				</ul>
				</div>

				<div class="sk-col">
				<span class="sk-col-title">Support</span>
				<ul>
					<li><a href="https://worldlawalliance.com/for-gc/">For General Counsel</a></li>
					<li><a href="https://worldlawalliance.com/list-blog-post/">Insights</a></li>
					<li><a href="https://worldlawalliance.com/privacy-policy/">Privacy Policy</a></li>
					<li><a href="https://worldlawalliance.com/terms/">Terms of Use</a></li>
					<li><a href="#">Cookie Policy</a></li>
					<li><a href="https://worldlawalliance.com/our-professionals-list/">Our Professionals</a></li>
				</ul>
				</div>

			</div>
			</div><!-- /.sk-top -->

			<!-- Stats -->
			<div class="sk-stats">
			<div class="sk-stat">
				<span class="sk-stat-n">151<span class="g">+</span></span>
				<span class="sk-stat-l">Partner Firms</span>
				<span class="sk-stat-sub">Independent &amp; accredited</span>
			</div>
			<div class="sk-stat">
				<span class="sk-stat-n">90<span class="g">+</span></span>
				<span class="sk-stat-l">Jurisdictions</span>
				<span class="sk-stat-sub">Across active corridors</span>
			</div>
			<div class="sk-stat">
				<span class="sk-stat-n">12</span>
				<span class="sk-stat-l">Practice Groups</span>
				<span class="sk-stat-sub">M&amp;A · IP · Arbitration &amp; more</span>
			</div>
			<div class="sk-stat">
				<span class="sk-stat-n">1<span class="g">,500+</span></span>
				<span class="sk-stat-l">Certified Neutrals</span>
				<span class="sk-stat-sub">via TheNeutrals.ORG™</span>
			</div>
			</div>

			<!-- Bottom -->
			<div class="sk-bottom">
			<div class="sk-copy">
				© <?php echo esc_html( date( 'Y' ) ); ?> <a href="https://worldlawalliance.com/">World Law Alliance</a> · All rights reserved ·
				Part of the <a href="https://unboundedglobal.com/wp-content/uploads/2026/06/UNBOUNDED%E2%84%A2-Global-Ecosystem.pdf" target="_blank" rel="noopener noreferrer">UNBOUNDED™ Global Ecosystem</a>
			</div>
			<div class="sk-legal">
				<a href="https://worldlawalliance.com/privacy-policy/">Privacy Policy</a>
				<span class="sk-legal-sep">·</span>
				<a href="https://worldlawalliance.com/terms/">Terms of Use</a>
				<span class="sk-legal-sep">·</span>
				<a href="#">Cookie Policy</a>
				<span class="sk-legal-sep">·</span>
				<a href="https://worldlawalliance.com/accreditation/">Accreditation Standards</a>
			</div>
			</div>

			<div class="sk-commit">
			<div class="sk-commit-dot"></div>
			<span class="sk-commit-txt">WLA Qualified — every partner firm independently accredited</span>
			<div class="sk-commit-dot"></div>
			</div>

		</div><!-- /.sk-wrap -->
		</footer>

		<?php
		return ob_get_clean();
	}
	/**
	 * Home Page Shortcode
	 *
	 * Displays the World Law Alliance Business & Legal Network
	 * homepage including hero section, statistics, members,
	 * law firms, lawyers, awards, conferences and latest updates.
	 *
	 * Shortcode: [wla_home]
	 *
	 * @return string
	 */
	public function wla_home_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA HOME PAGE WRAPPER -->
		<div class="wla-home-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-hero">
				<div class="wla-hero-img"></div>
				<div class="wla-hero-ov"></div>
				<div class="wla-hero-content">
					<div class="wla-hero-eyebrow">AN INSTITUTION · NOT A NETWORK · EST. 2018</div>
					<div class="wla-hero-title">
						THE WORLD'S LEGAL<br>
						WORK IS MOVING<br>
						<span>THROUGH</span> CORRIDORS.
					</div>
					<p class="wla-hero-sub">
						World Law Alliance co-practices cross-border legal matters on both sides simultaneously — one brief, the right specialist in every required jurisdiction, in writing within 48 hours.
					</p>
					<div class="wla-hero-btns">
						<a href="wla-specialist.html" class="wla-btn-primary">BRIEF WLA — 48 HOUR RESPONSE</a>
						<a href="wla-page-forfirms.html" class="wla-btn-ghost">BE A PARTNER FIRM</a>
					</div>
					<div class="wla-hero-stats">
						<div class="wla-hstat">
							<div class="wla-hstat-n">151</div>
							<div class="wla-hstat-l">Partner Firms</div>
						</div>
						<div class="wla-hstat">
							<div class="wla-hstat-n">90+</div>
							<div class="wla-hstat-l">Jurisdictions</div>
						</div>
						<div class="wla-hstat">
							<div class="wla-hstat-n">48H</div>
							<div class="wla-hstat-l">Brief to Specialist</div>
						</div>
						<div class="wla-hstat">
							<div class="wla-hstat-n">6</div>
							<div class="wla-hstat-l">Active Corridors</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDOR TICKER                                      -->
			<!-- ============================================================ -->
			<div class="wla-ticker-wrap">
				<div class="wla-ticker-track" id="wlaTicker">
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>GULF → CEE &nbsp;+38%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>EU → INDIA &nbsp;+34%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>GCC → SE ASIA &nbsp;+31%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>UK → AFRICA &nbsp;+22%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>APAC ↔ AMERICAS &nbsp;+19%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>US ↔ EUROPE &nbsp;+18%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>WLA GLOBAL CORRIDORS™</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>FOUNDING CORRIDOR LEAD POSITIONS AVAILABLE NOW</div>
					<!-- Duplicate for seamless loop -->
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>GULF → CEE &nbsp;+38%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>EU → INDIA &nbsp;+34%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>GCC → SE ASIA &nbsp;+31%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>UK → AFRICA &nbsp;+22%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>APAC ↔ AMERICAS &nbsp;+19%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>US ↔ EUROPE &nbsp;+18%</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>WLA GLOBAL CORRIDORS™</div>
					<div class="wla-ticker-item"><span class="wla-ticker-dot"></span>FOUNDING CORRIDOR LEAD POSITIONS AVAILABLE NOW</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INSTITUTION FACTS                                    -->
			<!-- ============================================================ -->
			<section class="wla-section wla-section--light" style="padding-top:96px;padding-bottom:0">
				<div class="wla-container">
					<div class="wla-eyebrow wla-animate">THE INSTITUTION</div>
					<div class="wla-heading wla-animate wla-animate--delay1" style="max-width:640px">ONE INSTITUTION.<br>BOTH SIDES OF EVERY MATTER.</div>
					<div class="wla-facts-grid wla-animate wla-animate--delay2">
						<div class="wla-fact">
							<div class="wla-fact-n">151</div>
							<div class="wla-fact-l">Partner Firms</div>
							<p class="wla-fact-body">The world's finest independent law firms — one per practice per jurisdiction, WLA-Qualified, and held to annual accreditation standards.</p>
						</div>
						<div class="wla-fact">
							<div class="wla-fact-n">90+</div>
							<div class="wla-fact-l">Jurisdictions</div>
							<p class="wla-fact-body">Active WLA co-practice coverage across every major legal market — from New Delhi and Dubai to Warsaw, Singapore, London, and New York.</p>
						</div>
						<div class="wla-fact">
							<div class="wla-fact-n">48H</div>
							<div class="wla-fact-l">Brief to Specialist</div>
							<p class="wla-fact-body">Every client brief receives a written response from WLA Central Command within 48 hours — confirming the right specialist in every required jurisdiction.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WLA GLOBAL CORRIDORS                                 -->
			<!-- ============================================================ -->
			<section class="wla-section wla-section--dark">
				<div class="wla-container">
					<div class="wla-corridors-header">
						<div>
							<div class="wla-eyebrow wla-eyebrow--light wla-animate">WLA GLOBAL CORRIDORS™</div>
							<div class="wla-heading wla-heading--light wla-animate wla-animate--delay1">THE WORLD'S MOST<br>ACTIVE LEGAL CORRIDORS.</div>
						</div>
						<div class="wla-corridors-header-right wla-animate wla-animate--delay2">
							<p class="wla-corridors-desc">WLA co-practices on both sides of every corridor simultaneously. One brief. Both sides. From the first day.</p>
							<a href="wla-corridors.html" class="wla-btn-bdr-light">VIEW ALL CORRIDORS</a>
						</div>
					</div>

					<!-- Corridor Rows -->
					<div class="wla-corridor-rows wla-animate wla-animate--delay2">
						<!-- Corridor 01 -->
						<div class="wla-corridor-row">
							<div class="wla-cr-num">01</div>
							<div>
								<div class="wla-cr-name">GULF → CENTRAL &amp; EASTERN EUROPE</div>
								<div class="wla-cr-sub">Gulf sovereign and family capital · Real assets · Manufacturing · Infrastructure</div>
							</div>
							<div class="wla-cr-src">UAE · Saudi Arabia<br>Qatar · Kuwait</div>
							<div class="wla-cr-dest">Poland · Czech Republic<br>Romania · Hungary</div>
							<div><span class="wla-cr-badge wla-cr-badge--green">+38% GROWTH</span></div>
						</div>
						<!-- Corridor 02 -->
						<div class="wla-corridor-row">
							<div class="wla-cr-num">02</div>
							<div>
								<div class="wla-cr-name">EU → INDIA</div>
								<div class="wla-cr-sub">FTA negotiations · Technology M&amp;A · Manufacturing · FDI</div>
							</div>
							<div class="wla-cr-src">Germany · France<br>Netherlands · Sweden</div>
							<div class="wla-cr-dest">India · New Delhi</div>
							<div><span class="wla-cr-badge wla-cr-badge--green">+34% GROWTH</span></div>
						</div>
						<!-- Corridor 03 -->
						<div class="wla-corridor-row">
							<div class="wla-cr-num">03</div>
							<div>
								<div class="wla-cr-name">GCC → SOUTH EAST ASIA</div>
								<div class="wla-cr-sub">Gulf sovereign capital into ASEAN · Infrastructure · Digital assets</div>
							</div>
							<div class="wla-cr-src">UAE · Saudi Arabia</div>
							<div class="wla-cr-dest">Singapore · Indonesia<br>Malaysia · Vietnam</div>
							<div><span class="wla-cr-badge wla-cr-badge--green">+31% GROWTH</span></div>
						</div>
						<!-- Corridor 04 -->
						<div class="wla-corridor-row">
							<div class="wla-cr-num">04</div>
							<div>
								<div class="wla-cr-name">UK → AFRICA</div>
								<div class="wla-cr-sub">Critical minerals · BII · Common law advantage · Project finance</div>
							</div>
							<div class="wla-cr-src">United Kingdom<br>London</div>
							<div class="wla-cr-dest">Kenya · Zambia<br>Nigeria · Ghana</div>
							<div><span class="wla-cr-badge wla-cr-badge--grey">+22% GROWTH</span></div>
						</div>
						<!-- Corridor 05 -->
						<div class="wla-corridor-row">
							<div class="wla-cr-num">05</div>
							<div>
								<div class="wla-cr-name">APAC ↔ AMERICAS</div>
								<div class="wla-cr-sub">Pacific Rim technology and resources · CFIUS · Semiconductors</div>
							</div>
							<div class="wla-cr-src">Japan · South Korea<br>Singapore · Australia</div>
							<div class="wla-cr-dest">United States · Brazil<br>Canada</div>
							<div><span class="wla-cr-badge wla-cr-badge--grey">+19% GROWTH</span></div>
						</div>
						<!-- Corridor 06 -->
						<div class="wla-corridor-row" style="border-bottom:none">
							<div class="wla-cr-num">06</div>
							<div>
								<div class="wla-cr-name">US ↔ EUROPE</div>
								<div class="wla-cr-sub">PE carve-outs · M&amp;A · FSR · AI regulation · IP — highest volume transatlantic</div>
							</div>
							<div class="wla-cr-src">New York · Boston<br>San Francisco</div>
							<div class="wla-cr-dest">Germany · UK<br>France · Netherlands</div>
							<div><span class="wla-cr-badge wla-cr-badge--grey">+18% GROWTH</span></div>
						</div>
					</div>

					<!-- Corridor CTA Band -->
					<div class="wla-corridor-cta wla-animate">
						<div>
							<div class="wla-corridor-cta-label">FOUNDING CORRIDOR LEAD POSITIONS</div>
							<div class="wla-corridor-cta-title">One firm per side. Both sides held. 12 positions total.</div>
						</div>
						<a href="wla-global-corridors-v4.html" class="wla-btn-ink-light">FOUNDING CORRIDOR LEADERSHIP →</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: HOW IT WORKS                                        -->
			<!-- ============================================================ -->
			<section class="wla-section wla-section--light">
				<div class="wla-container">
					<div class="wla-how-header">
						<div>
							<div class="wla-eyebrow wla-animate">HOW CO-PRACTICE WORKS</div>
							<div class="wla-heading wla-animate wla-animate--delay1">NOT REFERRAL.<br>NOT INTRODUCTION.<br>CO-PRACTICE.</div>
						</div>
						<div class="wla-how-header-right wla-animate wla-animate--delay2">
							<p class="wla-body-text">WLA holds both sides of every cross-border matter simultaneously — not in sequence. When a client briefs WLA, both the origination-side and execution-side specialists are activated on the same day, under one institutional framework, from brief to close.</p>
							<a href="wla-how-it-works.html" class="wla-btn-bdr">HOW IT WORKS IN DETAIL</a>
						</div>
					</div>
					<div class="wla-steps wla-animate wla-animate--delay2">
						<div class="wla-step">
							<div class="wla-step-n">01</div>
							<div class="wla-step-title">ONE BRIEF</div>
							<p class="wla-step-body">Client sends one brief to WLA. Describes the matter in plain language. No procurement process. No RFP. No form. WLA Central Command receives it directly.</p>
						</div>
						<div class="wla-step">
							<div class="wla-step-n">02</div>
							<div class="wla-step-title">48H RESPONSE</div>
							<p class="wla-step-body">Within 48 hours, WLA responds in writing with the right specialist confirmed for every jurisdiction required — co-practicing together under one institutional standard from day one.</p>
						</div>
						<div class="wla-step">
							<div class="wla-step-n">03</div>
							<div class="wla-step-title">BOTH SIDES HELD</div>
							<p class="wla-step-body">Both sides of the matter are held simultaneously by WLA partner firms. Not handed off. Not introduced. Co-practiced — aligned strategy, shared accountability, brief to close.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: FOR CLIENTS / FOR FIRMS                             -->
			<!-- ============================================================ -->
			<div class="wla-split wla-animate">
				<div class="wla-split-dark">
					<div>
						<div class="wla-split-label">FOR CLIENTS</div>
						<div class="wla-split-title-dark">THE RIGHT<br>SPECIALIST.<br>IN 48 HOURS.</div>
						<p class="wla-split-body">WLA serves corporate clients, general counsel, family offices, and private individuals who need the highest quality legal specialists across multiple jurisdictions — under one coordinated framework.</p>
						<div class="wla-split-list">
							<div class="wla-split-item"><div class="wla-split-dot"></div><span>One brief covers every jurisdiction required</span></div>
							<div class="wla-split-item"><div class="wla-split-dot"></div><span>WLA-Qualified specialists — not generalists</span></div>
							<div class="wla-split-item"><div class="wla-split-dot"></div><span>Written confirmation within 48 hours</span></div>
							<div class="wla-split-item"><div class="wla-split-dot"></div><span>Both sides of every corridor matter held simultaneously</span></div>
						</div>
					</div>
					<a href="wla-specialist.html" class="wla-btn-ink-light" style="align-self:flex-start">FIND A SPECIALIST — 48H</a>
				</div>
				<div class="wla-split-light">
					<div>
						<div class="wla-split-label-light">FOR LAW FIRMS</div>
						<div class="wla-split-title-light">ONE EXCLUSIVE<br>POSITION.<br>ONE JURISDICTION.</div>
						<p class="wla-split-body-light">WLA designates one exclusive partner firm per practice per jurisdiction — independently accredited, reviewed annually, and held to the WLA Qualified standard. Now inviting Founding Corridor Lead applications.</p>
						<div class="wla-split-list">
							<div class="wla-split-item-light"><div class="wla-split-dot"></div><span>Exclusive designation — no competing firms for the same mandate</span></div>
							<div class="wla-split-item-light"><div class="wla-split-dot"></div><span>WLA Qualified accreditation mark — usable in all firm marketing</span></div>
							<div class="wla-split-item-light"><div class="wla-split-dot"></div><span>Founding Corridor Lead positions available now</span></div>
							<div class="wla-split-item-light"><div class="wla-split-dot"></div><span>Fixed annual contribution — transparent, no variable fees</span></div>
						</div>
					</div>
					<a href="wla-page-forfirms.html" class="wla-btn-ink" style="align-self:flex-start">BE A WLA PARTNER FIRM</a>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICES                                           -->
			<!-- ============================================================ -->
			<section class="wla-section wla-section--light">
				<div class="wla-container">
					<div class="wla-practices-header">
						<div>
							<div class="wla-eyebrow wla-animate">WLA PRACTICE GROUPS</div>
							<div class="wla-heading wla-animate wla-animate--delay1" style="font-size:clamp(32px,3.8vw,56px)">12 PRACTICES.<br>90+ JURISDICTIONS.<br>CO-PRACTICED.</div>
						</div>
						<a href="wla-practices.html" class="wla-btn-bdr wla-animate wla-animate--delay2">ALL PRACTICES</a>
					</div>
					<div class="wla-practices-grid wla-animate wla-animate--delay2">
						<a href="wla-page-transactional.html" class="wla-practice-card">
							<div class="wla-pc-num">01</div>
							<div class="wla-pc-title">TRANSACTIONAL &amp; M&amp;A</div>
							<p class="wla-pc-desc">Cross-border acquisitions, mergers, and corporate transactions co-practiced in every required jurisdiction simultaneously.</p>
						</a>
						<a href="wla-page-ip.html" class="wla-practice-card">
							<div class="wla-pc-num">02</div>
							<div class="wla-pc-title">INTELLECTUAL PROPERTY</div>
							<p class="wla-pc-desc">Global IP protection — patents, trademarks, copyright, and enforcement across every jurisdiction where your assets operate.</p>
						</a>
						<a href="wla-page-arbitration.html" class="wla-practice-card">
							<div class="wla-pc-num">03</div>
							<div class="wla-pc-title">ARBITRATION</div>
							<p class="wla-pc-desc">International arbitration — SIAC, DIAC, HKIAC, ICC, LCIA. WLA holds both sides of every cross-border dispute.</p>
						</a>
						<a href="wla-page-insolvency.html" class="wla-practice-card">
							<div class="wla-pc-num">04</div>
							<div class="wla-pc-title">INSOLVENCY &amp; RESTRUCTURING</div>
							<p class="wla-pc-desc">Cross-border restructuring — WHOA, UK Part 26A, Chapter 11, and all major insolvency frameworks co-practiced.</p>
						</a>
						<a href="wla-page-tax.html" class="wla-practice-card">
							<div class="wla-pc-num">05</div>
							<div class="wla-pc-title">INTERNATIONAL TAX</div>
							<p class="wla-pc-desc">Transfer pricing, Pillar Two, treaty planning, and cross-border tax structuring across all WLA-active jurisdictions.</p>
						</a>
						<a href="wla-page-employment.html" class="wla-practice-card">
							<div class="wla-pc-num">06</div>
							<div class="wla-pc-title">EMPLOYMENT</div>
							<p class="wla-pc-desc">Cross-border employment — Works Councils, TUPE equivalents, executive arrangements, and workforce restructuring.</p>
						</a>
						<a href="wla-page-immigration.html" class="wla-practice-card">
							<div class="wla-pc-num">07</div>
							<div class="wla-pc-title">IMMIGRATION</div>
							<p class="wla-pc-desc">Global workforce mobility — work permits, investor visas, Golden Visa programmes, and multi-jurisdiction relocations.</p>
						</a>
						<a href="wla-practice-energy.html" class="wla-practice-card">
							<div class="wla-pc-num">08</div>
							<div class="wla-pc-title">ENERGY &amp; INFRASTRUCTURE</div>
							<p class="wla-pc-desc">Project finance, renewable energy, critical minerals, and infrastructure M&amp;A across all active energy corridors.</p>
						</a>
						<a href="wla-sector-hnw.html" class="wla-practice-card">
							<div class="wla-pc-num">09</div>
							<div class="wla-pc-title">PRIVATE WEALTH &amp; HNW</div>
							<p class="wla-pc-desc">Family offices, trusts, succession planning, and residency — the full private wealth mandate co-practiced globally.</p>
						</a>
						<a href="wla-practice-compliance.html" class="wla-practice-card">
							<div class="wla-pc-num">10</div>
							<div class="wla-pc-title">COMPETITION &amp; REGULATORY</div>
							<p class="wla-pc-desc">Merger control, FSR, antitrust, and regulatory approvals — coordinated across every jurisdiction required simultaneously.</p>
						</a>
						<a href="wla-practice-disputes.html" class="wla-practice-card">
							<div class="wla-pc-num">11</div>
							<div class="wla-pc-title">DISPUTES</div>
							<p class="wla-pc-desc">Cross-border commercial litigation — co-practiced across jurisdictions with coordinated strategy from brief to resolution.</p>
						</a>
						<a href="wla-practice-contract-solutions.html" class="wla-practice-card">
							<div class="wla-pc-num">12</div>
							<div class="wla-pc-title">CONTRACT SOLUTIONS</div>
							<p class="wla-pc-desc">International contract drafting, review, and negotiation — standardised under WLA co-practice across all operating jurisdictions.</p>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: JURISDICTIONS MARQUEE                               -->
			<!-- ============================================================ -->
			<div class="wla-jur-wrap">
				<div class="wla-jur-track">
					<div class="wla-jur-item">India<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">UAE<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">United Kingdom<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Germany<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">France<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Singapore<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Poland<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Netherlands<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Hong Kong<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Portugal<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Zambia<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Saudi Arabia<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Kenya<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Japan<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">South Korea<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Australia<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Switzerland<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Italy<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Spain<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Bahamas<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Nigeria<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Ghana<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">United States<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Brazil<span class="wla-jur-dot"></span></div>
					<!-- Duplicate for seamless loop -->
					<div class="wla-jur-item">India<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">UAE<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">United Kingdom<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Germany<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">France<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Singapore<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Poland<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Netherlands<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Hong Kong<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Portugal<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Zambia<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Saudi Arabia<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Kenya<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Japan<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">South Korea<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Australia<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Switzerland<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Italy<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Spain<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Bahamas<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Nigeria<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Ghana<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">United States<span class="wla-jur-dot"></span></div>
					<div class="wla-jur-item">Brazil<span class="wla-jur-dot"></span></div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CLOSE / CTA                                         -->
			<!-- ============================================================ -->
			<div class="wla-close-section">
				<div class="wla-close-img"></div>
				<div class="wla-close-ov"></div>
				<div class="wla-close-content wla-animate">
					<div class="wla-close-title">
						THE FUTURE WILL NOT<br>BE DEFINED BY BORDERS.<br>IT WILL BE DEFINED<br>BY CORRIDORS.
					</div>
					<p class="wla-close-sub">Brief WLA on your next cross-border matter. The right specialist in every required jurisdiction. In writing. Within 48 hours.</p>
					<div class="wla-close-btns">
						<a href="wla-specialist.html" class="wla-btn-ink-light">BRIEF WLA — 48H RESPONSE</a>
						<a href="wla-global-corridors-v4.html" class="wla-btn-bdr-light">WLA GLOBAL CORRIDORS™</a>
					</div>
				</div>
			</div>

		</div>
		<!-- END WLA HOME PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Tax Page Shortcode
	 *
	 * Displays the WLA International Tax Group page including:
	 * - Hero section with live tax intelligence
	 * - Tax capabilities
	 * - BEPS & OECD compliance section
	 * - CTA band
	 *
	 * Shortcode: [wla_tax_page]
	 *
	 * @return string
	 */
	public function wla_tax_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA TAX PAGE WRAPPER -->
		<div class="wla-tax-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-tax-hero">
				<!-- Left Column -->
				<div class="wla-tax-hero-l">
					<div class="wla-tax-breadcrumb">
						PRACTICES <span>›</span> SPECIALIST GROUPS <span>›</span> INTERNATIONAL TAX
					</div>
					<h1 class="wla-tax-h1">WLA INTERNATIONAL TAX GROUP</h1>
					<p class="wla-tax-hero-p">
						Cross-border tax structuring, transfer pricing, BEPS compliance, and international tax disputes — co-practiced by specialist tax lawyers in every relevant jurisdiction. The WLA Tax Group works alongside the Transactional, Insolvency, and Immigration practices on every major cross-border matter.
					</p>
					<div class="wla-tax-hero-btns">
						<a href="wla-specialist.html" class="wla-tax-btn-ink">FIND A TAX SPECIALIST — 48H</a>
						<a href="#capabilities" class="wla-tax-btn-bdr">EXPLORE CAPABILITIES</a>
					</div>
					
					<!-- Live Tax Intelligence -->
					<div class="wla-tax-intel">
						<div class="wla-tax-intel-title">
							LIVE TAX INTELLIGENCE 
							<div class="wla-tax-intel-live">
								<span class="wla-tax-dot-live"></span>UPDATING
							</div>
						</div>
						<div class="wla-tax-intel-row">
							<div>
								<div class="wla-tax-intel-jur">OECD PILLAR TWO</div>
								<div class="wla-tax-intel-area">Global Minimum Tax · 15%</div>
							</div>
							<div>
								<div class="wla-tax-intel-rate">15%</div>
								<div class="wla-tax-intel-change">Effective 2024+</div>
							</div>
						</div>
						<div class="wla-tax-intel-row">
							<div>
								<div class="wla-tax-intel-jur">UAE CORPORATE TAX</div>
								<div class="wla-tax-intel-area">Federal CIT — Free Zone</div>
							</div>
							<div>
								<div class="wla-tax-intel-rate">9%</div>
								<div class="wla-tax-intel-change">QFZP Rules Clarified</div>
							</div>
						</div>
						<div class="wla-tax-intel-row">
							<div>
								<div class="wla-tax-intel-jur">UK DST</div>
								<div class="wla-tax-intel-area">Digital Services Tax</div>
							</div>
							<div>
								<div class="wla-tax-intel-rate">2%</div>
								<div class="wla-tax-intel-change">OECD Pillar 1 Watch</div>
							</div>
						</div>
						<div class="wla-tax-intel-row">
							<div>
								<div class="wla-tax-intel-jur">INDIA — DPDP</div>
								<div class="wla-tax-intel-area">Transfer Pricing · Digital</div>
							</div>
							<div>
								<div class="wla-tax-intel-rate">+34%</div>
								<div class="wla-tax-intel-change">TP Activity Rising</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Right Column - Dark Panel -->
				<div class="wla-tax-hero-r">
					<!-- OECD Card -->
					<div class="wla-tax-oecd-card">
						<div class="wla-tax-oecd-label">OECD PILLAR TWO — GLOBAL MINIMUM TAX</div>
						<div class="wla-tax-oecd-rate">15%</div>
						<p class="wla-tax-oecd-desc">
							The OECD Global Minimum Tax is live. Qualifying companies with revenue above €750M must now ensure an effective minimum tax rate of 15% in every jurisdiction they operate in. WLA Tax Group advises on compliance structuring across every relevant jurisdiction simultaneously.
						</p>
					</div>
					
					<div class="wla-tax-pillar-label">OECD TWO-PILLAR FRAMEWORK</div>
					
					<div class="wla-tax-pillar-cards">
						<div class="wla-tax-pillar-card">
							<div class="wla-tax-pillar-name">PILLAR ONE</div>
							<div class="wla-tax-pillar-desc">Profit reallocation to market jurisdictions — large multinationals. OECD MLC under negotiation.</div>
							<div class="wla-tax-pillar-status wla-tax-pillar-status--watch">IN NEGOTIATION</div>
						</div>
						<div class="wla-tax-pillar-card">
							<div class="wla-tax-pillar-name">PILLAR TWO</div>
							<div class="wla-tax-pillar-desc">Global minimum effective tax rate of 15%. IIR, UTPR, and STTR rules now active in major jurisdictions.</div>
							<div class="wla-tax-pillar-status wla-tax-pillar-status--active">LIVE · 60+ STATES</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: TAX CAPABILITIES                                     -->
			<!-- ============================================================ -->
			<section class="wla-tax-section wla-tax-section--light wla-tax-animate" id="capabilities">
				<div class="wla-tax-container">
					<div class="wla-tax-eyebrow">TAX CAPABILITIES</div>
					<h2 class="wla-tax-heading">EVERY DIMENSION OF<br>CROSS-BORDER INTERNATIONAL TAX.</h2>
					
					<div class="wla-tax-rows">
						<!-- Capability 01 -->
						<div class="wla-tax-row">
							<div class="wla-tax-row-num">01</div>
							<div class="wla-tax-row-title">TRANSFER PRICING — CROSS-BORDER INTRA-GROUP TRANSACTIONS</div>
							<div class="wla-tax-row-desc">
								Transfer pricing documentation, policy design, advance pricing agreements, and dispute resolution across all major tax jurisdictions. WLA Tax Group practitioners in each jurisdiction ensure TP policies are defensible locally and globally consistent. Country-by-country reporting compliance and BEPS Action 13 documentation coordinated across the group.
							</div>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-tax-row">
							<div class="wla-tax-row-num">02</div>
							<div class="wla-tax-row-title">INTERNATIONAL TAX STRUCTURING — M&A AND HOLDING STRUCTURES</div>
							<div class="wla-tax-row-desc">
								Tax-efficient structuring for cross-border M&A transactions, group reorganisations, IP holding structures, and financing arrangements — coordinated across all relevant jurisdictions simultaneously. WLA Tax Group works alongside the Transactional practice to ensure deal structure is tax-optimised in every jurisdiction before signing.
							</div>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-tax-row">
							<div class="wla-tax-row-num">03</div>
							<div class="wla-tax-row-title">BEPS COMPLIANCE — OECD PILLAR ONE &amp; PILLAR TWO</div>
							<div class="wla-tax-row-desc">
								Comprehensive BEPS compliance across OECD Pillar Two (Global Minimum Tax), BEPS Actions 1–15, and national implementation legislation in each jurisdiction. WLA Tax Group practitioners advise on Qualified Domestic Minimum Top-Up Tax (QDMTT), Income Inclusion Rule (IIR), and Undertaxed Profit Rule (UTPR) compliance in every relevant territory.
							</div>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-tax-row">
							<div class="wla-tax-row-num">04</div>
							<div class="wla-tax-row-title">TAX DISPUTES &amp; CONTROVERSY — CROSS-BORDER</div>
							<div class="wla-tax-row-desc">
								Cross-border tax disputes, mutual agreement procedure (MAP), competent authority negotiations, and international tax arbitration under BEPS Action 14 — co-practiced by WLA Tax Group practitioners alongside the Arbitration &amp; Mediation Group. Transfer pricing disputes, PE attribution controversies, and withholding tax disputes across multiple jurisdictions.
							</div>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-tax-row">
							<div class="wla-tax-row-num">05</div>
							<div class="wla-tax-row-title">TAX IN M&A — DUE DILIGENCE AND STRUCTURING</div>
							<div class="wla-tax-row-desc">
								Tax due diligence for cross-border M&A — tax risk identification, deferred tax analysis, and transaction structuring to optimise tax outcomes in each jurisdiction. Warranty and indemnity alignment on tax representations. Post-completion tax integration planning across all operating jurisdictions.
							</div>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-tax-row">
							<div class="wla-tax-row-num">06</div>
							<div class="wla-tax-row-title">PRIVATE CLIENT &amp; HNW TAX — CROSS-BORDER</div>
							<div class="wla-tax-row-desc">
								Cross-border personal tax planning for high net worth individuals, family offices, and internationally mobile professionals — working alongside the WLA Private Clients practice. Residency changes, exit taxation, trust taxation, and offshore structure compliance across all relevant jurisdictions.
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BEPS & OECD COMPLIANCE                               -->
			<!-- ============================================================ -->
			<div class="wla-tax-beps-bg">
				<div class="wla-tax-beps-inner wla-tax-animate">
					<div class="wla-tax-beps-label">BEPS &amp; OECD COMPLIANCE</div>
					<h2 class="wla-tax-heading wla-tax-heading--light">THE BIGGEST SHIFT IN<br>INTERNATIONAL TAX IN 50 YEARS.</h2>
					
					<div class="wla-tax-beps-layout">
						<!-- Left: BEPS Tracker -->
						<div class="wla-tax-beps-vis">
							<div class="wla-tax-beps-vis-header">BEPS / OECD ACTION TRACKER — WLA TAX GROUP</div>
							
							<div class="wla-tax-beps-row">
								<div>
									<div class="wla-tax-beps-action">Pillar Two — Global Minimum Tax (15%)</div>
									<div class="wla-tax-beps-area">IIR, UTPR, QDMTT — 60+ jurisdictions enacted</div>
								</div>
								<div class="wla-tax-beps-status wla-tax-beps-status--active">LIVE</div>
							</div>
							
							<div class="wla-tax-beps-row">
								<div>
									<div class="wla-tax-beps-action">BEPS Action 13 — CbCR &amp; TP Documentation</div>
									<div class="wla-tax-beps-area">Country-by-Country Reporting · Master File · Local File</div>
								</div>
								<div class="wla-tax-beps-status wla-tax-beps-status--active">ACTIVE</div>
							</div>
							
							<div class="wla-tax-beps-row">
								<div>
									<div class="wla-tax-beps-action">BEPS Action 15 — MLI (Multilateral Instrument)</div>
									<div class="wla-tax-beps-area">Treaty modifications — PPT, LOB, PE provisions</div>
								</div>
								<div class="wla-tax-beps-status wla-tax-beps-status--active">ACTIVE</div>
							</div>
							
							<div class="wla-tax-beps-row">
								<div>
									<div class="wla-tax-beps-action">Pillar One — Profit Reallocation (Amount A)</div>
									<div class="wla-tax-beps-area">MLC under OECD negotiation — large multinationals</div>
								</div>
								<div class="wla-tax-beps-status wla-tax-beps-status--watch">IN NEGOTIATION</div>
							</div>
							
							<div class="wla-tax-beps-row">
								<div>
									<div class="wla-tax-beps-action">Digital Services Taxes — National Level</div>
									<div class="wla-tax-beps-area">UK 2% · France 3% · India 2% · Multiple countries</div>
								</div>
								<div class="wla-tax-beps-status wla-tax-beps-status--active">ACTIVE PARALLEL</div>
							</div>
							
							<div class="wla-tax-beps-row">
								<div>
									<div class="wla-tax-beps-action">BEPS Action 14 — Tax Dispute Resolution</div>
									<div class="wla-tax-beps-area">MAP minimum standards · Mandatory arbitration</div>
								</div>
								<div class="wla-tax-beps-status wla-tax-beps-status--active">MONITORING</div>
							</div>
						</div>
						
						<!-- Right: BEPS Content -->
						<div>
							<div class="wla-tax-beps-title">WLA TAX GROUP NAVIGATES BEPS COMPLIANCE ACROSS EVERY RELEVANT JURISDICTION.</div>
							<p class="wla-tax-beps-body">
								The OECD BEPS project and the two-pillar framework have fundamentally restructured international tax. For multinational companies, the compliance burden now spans dozens of jurisdictions — each implementing the OECD framework at a different pace, with different national variations, and different enforcement priorities.
							</p>
							<p class="wla-tax-beps-body">
								WLA Tax Group practitioners in each jurisdiction track local BEPS implementation in real time — feeding into WLA Intelligence daily. The co-practice framework means your tax compliance is coordinated across all jurisdictions by specialist local practitioners, not managed centrally by a team without local expertise.
							</p>
							<ul class="wla-tax-beps-points">
								<li>Pillar Two QDMTT analysis — does your group need a QDMTT in each jurisdiction?</li>
								<li>IIR and UTPR exposure assessment — where is top-up tax due?</li>
								<li>CbCR filing obligations — jurisdictions requiring local filing</li>
								<li>MLI impact analysis — which of your tax treaties have been modified?</li>
								<li>DST exposure — which countries impose digital services taxes on your revenues?</li>
							</ul>
							<a href="wla-specialist.html" class="wla-tax-btn-white">FIND A BEPS SPECIALIST →</a>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-tax-cta-band">
				<div class="wla-tax-cta-title">BRIEF WLA ON YOUR CROSS-BORDER TAX MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-tax-cta-btns">
					<a href="wla-specialist.html" class="wla-tax-btn-white">FIND A TAX SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-tax-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>
		</div>
		<!-- END WLA TAX PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Transactional & M&A Page Shortcode
	 *
	 * Displays the WLA Transactional & M&A practice page including:
	 * - Hero section with stats
	 * - Capabilities accordion
	 * - Active deal corridors
	 * - How co-practice works
	 * - Case studies
	 * - Related practices
	 *
	 * Shortcode: [wla_transactional_page]
	 *
	 * @return string
	 */
	public function wla_transactional_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA TRANSACTIONAL PAGE WRAPPER -->
		<div class="wla-txn-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-txn-hero">
				<!-- Left Column -->
				<div class="wla-txn-hero-l">
					<div class="wla-txn-breadcrumb">
						PRACTICES <span>›</span> CORE ALLIANCES <span>›</span> TRANSACTIONAL &amp; M&A
					</div>
					<h1 class="wla-txn-h1">WLA TRANSACTIONAL &amp; M&A</h1>
					<p class="wla-txn-hero-p">
						Cross-border M&A, corporate structuring, joint ventures, and private equity transactions co-practiced across 90+ jurisdictions. Both sides of every major deal corridor. One co-practice team, brief to close.
					</p>
					<div class="wla-txn-hero-btns">
						<a href="wla-specialist.html" class="wla-txn-btn-ink">FIND AN M&A SPECIALIST — 48H</a>
						<a href="#capabilities" class="wla-txn-btn-bdr">EXPLORE CAPABILITIES</a>
					</div>
					<div class="wla-txn-hero-stats">
						<div class="wla-txn-hs">
							<div class="wla-txn-hs-n">90+</div>
							<div class="wla-txn-hs-l">Jurisdictions</div>
						</div>
						<div class="wla-txn-hs">
							<div class="wla-txn-hs-n">6</div>
							<div class="wla-txn-hs-l">Active Corridors</div>
						</div>
						<div class="wla-txn-hs">
							<div class="wla-txn-hs-n">48H</div>
							<div class="wla-txn-hs-l">Team Matched</div>
						</div>
						<div class="wla-txn-hs">
							<div class="wla-txn-hs-n">1</div>
							<div class="wla-txn-hs-l">Firm Per Market</div>
						</div>
					</div>
				</div>
				
				<!-- Right Column -->
				<div class="wla-txn-hero-r">
					<img src="https://images.unsplash.com/photo-1554774853-aae0a22c8aa4?w=1200&q=85" alt="M&A Practice">
					<div class="wla-txn-hero-r-grad"></div>
					<div class="wla-txn-hero-r-tag">
						<span class="wla-txn-live-dot"></span>ACTIVE ACROSS 90+ JURISDICTIONS
					</div>
					<div class="wla-txn-hero-r-big">M&A</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CAPABILITIES                                         -->
			<!-- ============================================================ -->
			<section class="wla-txn-section wla-txn-section--light wla-txn-animate" id="capabilities">
				<div class="wla-txn-container">
					<div class="wla-txn-eyebrow">CAPABILITIES</div>
					<h2 class="wla-txn-heading">EVERY DIMENSION OF<br>CROSS-BORDER M&A.</h2>
					<p class="wla-txn-sub-text">
						WLA's Transactional practice covers every stage of a cross-border deal — from initial structuring and due diligence through to signing, regulatory clearances, and post-completion integration. Click any capability to expand.
					</p>
					
					<div class="wla-txn-accordion" id="wlaTxnAccordion">
						
						<!-- Capability 01 -->
						<div class="wla-txn-accordion-row" onclick="wlaTxnToggle(this)">
							<div class="wla-txn-accordion-head">
								<div class="wla-txn-accordion-num">01</div>
								<div class="wla-txn-accordion-title">CROSS-BORDER M&A — ACQUISITIONS &amp; MERGERS</div>
								<div class="wla-txn-accordion-toggle">+</div>
							</div>
							<div class="wla-txn-accordion-body">
								<div class="wla-txn-accordion-body-inner">
									<p class="wla-txn-accordion-desc">
										WLA co-practices full cross-border M&A transactions — covering both the buy-side and sell-side across multiple jurisdictions simultaneously. Partner firms in each jurisdiction jointly hold the matter, ensuring deal strategy is aligned and jurisdiction-specific execution is delivered by the deepest possible local specialists.
									</p>
									<ul class="wla-txn-accordion-list">
										<li>Buy-side acquisition support across all required jurisdictions simultaneously</li>
										<li>Sell-side transaction management — WLA coordinates both sides of the deal</li>
										<li>Merger structuring and regulatory clearance in each jurisdiction</li>
										<li>Cross-border due diligence coordination — one timeline, all markets</li>
										<li>Post-completion integration support including employment and IP transfer</li>
										<li>FDI screening and foreign investment approval management</li>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-txn-accordion-row" onclick="wlaTxnToggle(this)">
							<div class="wla-txn-accordion-head">
								<div class="wla-txn-accordion-num">02</div>
								<div class="wla-txn-accordion-title">JOINT VENTURES &amp; STRATEGIC ALLIANCES</div>
								<div class="wla-txn-accordion-toggle">+</div>
							</div>
							<div class="wla-txn-accordion-body">
								<div class="wla-txn-accordion-body-inner">
									<p class="wla-txn-accordion-desc">
										Joint venture structures across multiple legal systems require specialist knowledge of corporate law in each jurisdiction combined with the ability to align JV terms across different regulatory frameworks. WLA co-practices both the JV structuring and the ongoing governance framework — with partner firms in each jurisdiction jointly accountable for the outcome.
									</p>
									<ul class="wla-txn-accordion-list">
										<li>JV structure design across multiple legal systems</li>
										<li>Shareholder agreement drafting and cross-jurisdiction harmonisation</li>
										<li>Governance framework design for international joint ventures</li>
										<li>Ongoing JV legal support — operational and strategic matters</li>
										<li>JV exit structuring and dispute resolution framework</li>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-txn-accordion-row" onclick="wlaTxnToggle(this)">
							<div class="wla-txn-accordion-head">
								<div class="wla-txn-accordion-num">03</div>
								<div class="wla-txn-accordion-title">PRIVATE EQUITY — CROSS-BORDER TRANSACTIONS</div>
								<div class="wla-txn-accordion-toggle">+</div>
							</div>
							<div class="wla-txn-accordion-body">
								<div class="wla-txn-accordion-body-inner">
									<p class="wla-txn-accordion-desc">
										WLA's co-practice framework is purpose-built for private equity transactions spanning multiple jurisdictions. Fund formation and structuring, portfolio company acquisitions, cross-border carve-outs, and exit transactions — all delivered through WLA partner firms who understand the PE deal clock and operate under one institutional accountability framework.
									</p>
									<ul class="wla-txn-accordion-list">
										<li>Fund formation across multiple legal systems — common law, civil law, Islamic</li>
										<li>Portfolio company acquisitions in multiple jurisdictions simultaneously</li>
										<li>Cross-border carve-outs and management buyouts</li>
										<li>Warranty and indemnity insurance across jurisdictions</li>
										<li>Exit structuring — trade sale, secondary, IPO preparation</li>
										<li>Portfolio company legal infrastructure across all operating markets</li>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-txn-accordion-row" onclick="wlaTxnToggle(this)">
							<div class="wla-txn-accordion-head">
								<div class="wla-txn-accordion-num">04</div>
								<div class="wla-txn-accordion-title">CORPORATE RESTRUCTURING &amp; GROUP REORGANISATION</div>
								<div class="wla-txn-accordion-toggle">+</div>
							</div>
							<div class="wla-txn-accordion-body">
								<div class="wla-txn-accordion-body-inner">
									<p class="wla-txn-accordion-desc">
										Group reorganisations across multiple jurisdictions — whether driven by operational efficiency, tax optimisation, regulatory compliance, or M&A preparation — require coordinated corporate law support across every territory in which the group operates. WLA delivers this through the co-practice framework: one engagement, all jurisdictions, one coordinated timeline.
									</p>
									<ul class="wla-txn-accordion-list">
										<li>Multi-jurisdiction group reorganisation design and execution</li>
										<li>Holding company migrations and group structure simplification</li>
										<li>Tax-efficient cross-border restructuring — working alongside WLA Tax Group</li>
										<li>Subsidiary mergers, liquidations, and dormant company management</li>
										<li>Regulatory clearance for group reorganisations in multiple markets</li>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-txn-accordion-row" onclick="wlaTxnToggle(this)">
							<div class="wla-txn-accordion-head">
								<div class="wla-txn-accordion-num">05</div>
								<div class="wla-txn-accordion-title">FDI SCREENING &amp; REGULATORY CLEARANCE</div>
								<div class="wla-txn-accordion-toggle">+</div>
							</div>
							<div class="wla-txn-accordion-body">
								<div class="wla-txn-accordion-body-inner">
									<p class="wla-txn-accordion-desc">
										Foreign direct investment screening has become one of the most complex and jurisdiction-specific aspects of cross-border M&A since 2019. Every major deal corridor now involves FDI review in at least one jurisdiction. WLA co-practices FDI screening across all required jurisdictions simultaneously — with partner firms who live and breathe each regime daily.
									</p>
									<ul class="wla-txn-accordion-list">
										<li>EU Foreign Subsidies Regulation — screening and phase 2 proceedings</li>
										<li>CFIUS review in the United States</li>
										<li>MISA fast-track and standard approval in Saudi Arabia</li>
										<li>FIRB in Australia, NSIA in the UK, and equivalents across 40+ jurisdictions</li>
										<li>Strategic coordination of multi-jurisdiction FDI filings on parallel timelines</li>
									</ul>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ACTIVE DEAL CORRIDORS                               -->
			<!-- ============================================================ -->
			<div class="wla-txn-corridor-bg">
				<section class="wla-txn-section wla-txn-animate">
					<div class="wla-txn-container">
						<div class="wla-txn-eyebrow">ACTIVE DEAL CORRIDORS — TRANSACTIONAL &amp; M&A</div>
						<h2 class="wla-txn-heading">WLA CO-PRACTICES BOTH SIDES<br>OF EVERY MAJOR M&A CORRIDOR.</h2>
						<p class="wla-txn-sub-text">
							Transactional and M&A co-practice is active across all six WLA deal corridors in 2026. WLA holds the accredited partner firm on both sides — one brief covers both jurisdictions.
						</p>
						
						<div class="wla-txn-corridor-grid">
							<a href="wla-corridors.html" class="wla-txn-corridor-card">
								<div class="wla-txn-cc-route">
									<span class="wla-txn-cc-from">GULF</span>
									<span class="wla-txn-cc-arrow">→</span>
									<span class="wla-txn-cc-to">CEE</span>
								</div>
								<div class="wla-txn-cc-desc">GCC · Central &amp; Eastern Europe</div>
								<div class="wla-txn-cc-growth">↑ 38% — M&A dominant practice</div>
								<div class="wla-txn-cc-practice">Corporate · FDI · Real Estate</div>
							</a>
							
							<a href="wla-corridors.html" class="wla-txn-corridor-card">
								<div class="wla-txn-cc-route">
									<span class="wla-txn-cc-from">EU</span>
									<span class="wla-txn-cc-arrow">→</span>
									<span class="wla-txn-cc-to">INDIA</span>
								</div>
								<div class="wla-txn-cc-desc">Trade · Technology · Investment</div>
								<div class="wla-txn-cc-growth">↑ 34% — Technology M&A leading</div>
								<div class="wla-txn-cc-practice">Tech M&A · JV · Tax Structuring</div>
							</a>
							
							<a href="wla-corridors.html" class="wla-txn-corridor-card">
								<div class="wla-txn-cc-route">
									<span class="wla-txn-cc-from">US</span>
									<span class="wla-txn-cc-arrow">↔</span>
									<span class="wla-txn-cc-to">EUROPE</span>
								</div>
								<div class="wla-txn-cc-desc">Transatlantic · Highest Volume</div>
								<div class="wla-txn-cc-growth">↑ 18% — PE carve-outs dominant</div>
								<div class="wla-txn-cc-practice">PE M&A · Competition · Employment</div>
							</a>
							
							<a href="wla-corridors.html" class="wla-txn-corridor-card">
								<div class="wla-txn-cc-route">
									<span class="wla-txn-cc-from">GCC</span>
									<span class="wla-txn-cc-arrow">→</span>
									<span class="wla-txn-cc-to">SE ASIA</span>
								</div>
								<div class="wla-txn-cc-desc">Gulf Capital into ASEAN</div>
								<div class="wla-txn-cc-growth">↑ 31% — Infrastructure focus</div>
								<div class="wla-txn-cc-practice">FDI · Infrastructure · Real Estate</div>
							</a>
							
							<a href="wla-corridors.html" class="wla-txn-corridor-card">
								<div class="wla-txn-cc-route">
									<span class="wla-txn-cc-from">UK</span>
									<span class="wla-txn-cc-arrow">→</span>
									<span class="wla-txn-cc-to">AFRICA</span>
								</div>
								<div class="wla-txn-cc-desc">Common Law · Critical Minerals</div>
								<div class="wla-txn-cc-growth">↑ 22% — Mining M&A</div>
								<div class="wla-txn-cc-practice">Mining · Resources · Project Finance</div>
							</a>
							
							<a href="wla-corridors.html" class="wla-txn-corridor-card">
								<div class="wla-txn-cc-route">
									<span class="wla-txn-cc-from">APAC</span>
									<span class="wla-txn-cc-arrow">↔</span>
									<span class="wla-txn-cc-to">AMERICAS</span>
								</div>
								<div class="wla-txn-cc-desc">Pacific Rim · Cross-Border</div>
								<div class="wla-txn-cc-growth">↑ 19% — Tech / Semiconductor</div>
								<div class="wla-txn-cc-practice">Tech M&A · IP · CFIUS</div>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: HOW CO-PRACTICE WORKS FOR M&A                       -->
			<!-- ============================================================ -->
			<div class="wla-txn-process-bg">
				<section class="wla-txn-section wla-txn-section--dark wla-txn-animate">
					<div class="wla-txn-container">
						<div class="wla-txn-process-label">HOW IT WORKS IN PRACTICE</div>
						<h2 class="wla-txn-heading wla-txn-heading--light">FROM DEAL ALERT<br>TO SIGNING. ONE TEAM.</h2>
						
						<div class="wla-txn-process-grid">
							<div class="wla-txn-process-card">
								<div class="wla-txn-pg-stage">STAGE 01</div>
								<div class="wla-txn-pg-num">01</div>
								<div class="wla-txn-pg-title">BRIEF WLA ON YOUR DEAL</div>
								<p class="wla-txn-pg-desc">Describe the deal — jurisdictions, parties, timeline, and structure. WLA Central Command reviews and begins matching immediately. No RFP. No procurement.</p>
								<div class="wla-txn-pg-badge">✓ Instant brief receipt</div>
							</div>
							
							<div class="wla-txn-process-card">
								<div class="wla-txn-pg-stage">STAGE 02 · 48H</div>
								<div class="wla-txn-pg-num">02</div>
								<div class="wla-txn-pg-title">M&A TEAM CONFIRMED</div>
								<p class="wla-txn-pg-desc">WLA confirms the right M&A specialist in each required jurisdiction. One team confirmation document. Not six separate proposals from six different firms.</p>
								<div class="wla-txn-pg-badge">✓ Written within 48 hours</div>
							</div>
							
							<div class="wla-txn-process-card">
								<div class="wla-txn-pg-stage">STAGE 03</div>
								<div class="wla-txn-pg-num">03</div>
								<div class="wla-txn-pg-title">CO-PRACTICE ACTIVATED</div>
								<p class="wla-txn-pg-desc">Partner firms jointly hold the deal. Shared strategy meetings. Aligned due diligence timelines. One WLA coordination layer. No gaps between jurisdictions.</p>
								<div class="wla-txn-pg-badge">✓ Joint accountability</div>
							</div>
							
							<div class="wla-txn-process-card">
								<div class="wla-txn-pg-stage">STAGE 04</div>
								<div class="wla-txn-pg-num">04</div>
								<div class="wla-txn-pg-title">SIGNING &amp; CLOSE</div>
								<p class="wla-txn-pg-desc">Every jurisdiction signs simultaneously. Regulatory clearances coordinated. Post-completion steps managed. One consolidated invoice. Brief to close.</p>
								<div class="wla-txn-pg-badge">✓ Brief to close</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CASE STUDIES                                         -->
			<!-- ============================================================ -->
			<section class="wla-txn-section wla-txn-section--light wla-txn-animate wla-txn-case-bg">
				<div class="wla-txn-container">
					<div class="wla-txn-eyebrow">M&A CO-PRACTICE — CASE STUDIES</div>
					<h2 class="wla-txn-heading">HOW WLA CLOSES<br>CROSS-BORDER DEALS.</h2>
					
					<div class="wla-txn-case-grid">
						<a href="#" class="wla-txn-case-card">
							<img src="https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?w=900&q=80" alt="UAE Poland">
							<div class="wla-txn-case-overlay"></div>
							<div class="wla-txn-case-body">
								<div class="wla-txn-case-tag">M&A · GULF → CEE · 3 JURISDICTIONS</div>
								<div class="wla-txn-case-title">UAE SOVEREIGN FUND ACQUISITION OF POLISH LOGISTICS GROUP</div>
								<div class="wla-txn-case-meta">WLA UAE + WLA Poland + WLA Netherlands · 6 weeks brief to signing</div>
							</div>
						</a>
						
						<a href="#" class="wla-txn-case-card">
							<img src="https://images.unsplash.com/photo-1553484771-047a44eee27b?w=900&q=80" alt="Tech M&A">
							<div class="wla-txn-case-overlay"></div>
							<div class="wla-txn-case-body">
								<div class="wla-txn-case-tag">PE CARVE-OUT · US → EUROPE · 4 JURISDICTIONS</div>
								<div class="wla-txn-case-title">US PRIVATE EQUITY EUROPEAN TECHNOLOGY CARVE-OUT ACROSS GERMANY, FRANCE, POLAND</div>
								<div class="wla-txn-case-meta">WLA US + WLA Germany + WLA France + WLA Poland · 8 weeks deal close</div>
							</div>
						</a>
					</div>
					
					<div class="wla-txn-case-cta">
						<a href="wla-specialist.html" class="wla-txn-btn-ink">VIEW ALL M&A CASE STUDIES →</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-txn-cta-band">
				<div class="wla-txn-cta-title">BRIEF WLA ON YOUR CROSS-BORDER M&A TRANSACTION. TEAM IN 48 HOURS.</div>
				<div class="wla-txn-cta-btns">
					<a href="wla-specialist.html" class="wla-txn-btn-white">FIND AN M&A SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-txn-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED PRACTICES                                   -->
			<!-- ============================================================ -->
			<div class="wla-txn-related-bg">
				<section class="wla-txn-section wla-txn-section--light wla-txn-animate">
					<div class="wla-txn-container">
						<div class="wla-txn-eyebrow">RELATED PRACTICES</div>
						<h2 class="wla-txn-heading">OFTEN NEEDED<br>ALONGSIDE M&A.</h2>
						
						<div class="wla-txn-related-grid">
							<a href="wla-page-ip.html" class="wla-txn-related-card">
								<div class="wla-txn-rc-tag">PRACTICE</div>
								<div class="wla-txn-rc-title">INTELLECTUAL PROPERTY</div>
								<p class="wla-txn-rc-desc">IP due diligence, licensing, and cross-border IP transfer on M&A transactions.</p>
								<div class="wla-txn-rc-link">EXPLORE IP →</div>
							</a>
							
							<a href="wla-page-tax.html" class="wla-txn-related-card">
								<div class="wla-txn-rc-tag">PRACTICE</div>
								<div class="wla-txn-rc-title">INTERNATIONAL TAX</div>
								<p class="wla-txn-rc-desc">Deal structuring, transfer pricing, and post-acquisition tax optimisation.</p>
								<div class="wla-txn-rc-link">EXPLORE TAX →</div>
							</a>
							
							<a href="#" class="wla-txn-related-card">
								<div class="wla-txn-rc-tag">PRACTICE</div>
								<div class="wla-txn-rc-title">EMPLOYMENT &amp; LABOUR</div>
								<p class="wla-txn-rc-desc">TUPE, Works Council consultation, and cross-border employment integration.</p>
								<div class="wla-txn-rc-link">EXPLORE EMPLOYMENT →</div>
							</a>
							
							<a href="#" class="wla-txn-related-card">
								<div class="wla-txn-rc-tag">PRACTICE</div>
								<div class="wla-txn-rc-title">COMPETITION LAW</div>
								<p class="wla-txn-rc-desc">Merger control filings across multiple jurisdictions on parallel timelines.</p>
								<div class="wla-txn-rc-link">EXPLORE COMPETITION →</div>
							</a>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- END WLA TRANSACTIONAL PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Compliance & Regulatory Page Shortcode
	 *
	 * Displays the WLA Compliance & Regulatory practice page including:
	 * - Hero section
	 * - Compliance capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_compliance_page]
	 *
	 * @return string
	 */
	public function wla_compliance_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA COMPLIANCE PAGE WRAPPER -->
		<div class="wla-compliance-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-compliance-hero">
				<div class="wla-compliance-hero-content">
					<div class="wla-compliance-hero-eyebrow">WLA PRACTICE · COMPLIANCE &amp; REGULATORY</div>
					<h1 class="wla-compliance-hero-title">COMPLIANCE &amp; REGULATORY</h1>
					<h2 class="wla-compliance-hero-subtitle">MULTI-JURISDICTION · REGULATORY RISK · COMPETITION LAW</h2>
					<p class="wla-compliance-hero-description">
						WLA co-practices this specialty across 90+ jurisdictions under one Institutional framework — one brief, the right specialist in every required jurisdiction, confirmed in writing within 48 hours.
					</p>
					<div class="wla-compliance-hero-buttons">
						<a href="wla-specialist.html" class="wla-compliance-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-compliance-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: COMPLIANCE CAPABILITIES                             -->
			<!-- ============================================================ -->
			<section class="wla-compliance-section wla-compliance-animate">
				<div class="wla-compliance-container">
					<div class="wla-compliance-eyebrow">COMPLIANCE CAPABILITIES</div>
					<h2 class="wla-compliance-heading">EVERY DIMENSION OF CROSS-BORDER REGULATORY COMPLIANCE.</h2>
					
					<div class="wla-compliance-grid">
						
						<!-- Capability 01 -->
						<div class="wla-compliance-card">
							<div class="wla-compliance-card-number">01</div>
							<h3 class="wla-compliance-card-title">COMPETITION &amp; ANTITRUST</h3>
							<p class="wla-compliance-card-desc">
								Cross-border merger control, cartel defence, and competition compliance programmes — co-practiced by WLA specialists in every jurisdiction where the company operates or has market presence.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-compliance-card">
							<div class="wla-compliance-card-number">02</div>
							<h3 class="wla-compliance-card-title">DATA PROTECTION &amp; PRIVACY</h3>
							<p class="wla-compliance-card-desc">
								GDPR, DPDP, PDPA, and the full range of national data protection laws — co-practiced as one programme across all operating jurisdictions, not as separate engagements in each country.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-compliance-card">
							<div class="wla-compliance-card-number">03</div>
							<h3 class="wla-compliance-card-title">AML &amp; FINANCIAL CRIME</h3>
							<p class="wla-compliance-card-desc">
								Anti-money laundering compliance programmes, suspicious activity reporting obligations, and regulatory investigations — across every jurisdiction where the company holds licences or operates.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-compliance-card">
							<div class="wla-compliance-card-number">04</div>
							<h3 class="wla-compliance-card-title">SANCTIONS COMPLIANCE</h3>
							<p class="wla-compliance-card-desc">
								OFAC, EU, and UN sanctions screening programme design, country risk assessment, and legal opinions on sanctions exposure for international transactions and operations.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-compliance-card">
							<div class="wla-compliance-card-number">05</div>
							<h3 class="wla-compliance-card-title">REGULATORY INVESTIGATIONS</h3>
							<p class="wla-compliance-card-desc">
								Cross-border regulatory investigations — coordinating defence strategy and regulatory responses simultaneously across multiple jurisdictions under one WLA co-practice team.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-compliance-card">
							<div class="wla-compliance-card-number">06</div>
							<h3 class="wla-compliance-card-title">ESG &amp; SUPPLY CHAIN</h3>
							<p class="wla-compliance-card-desc">
								ESG compliance — supply chain due diligence under the EU CSRD and national equivalents (LkSG in Germany, French Vigilance Law), modern slavery, and human rights due diligence frameworks.
							</p>
						</div>
						
					</div>
					
					<div class="wla-compliance-cta-row">
						<a href="wla-specialist.html" class="wla-compliance-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-compliance-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-compliance-cta-band">
				<div class="wla-compliance-cta-title">BRIEF WLA. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-compliance-cta-buttons">
					<a href="wla-specialist.html" class="wla-compliance-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-compliance-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA COMPLIANCE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Contract Solutions Page Shortcode
	 *
	 * Displays the WLA Contract Solutions practice page including:
	 * - Hero section
	 * - Contract capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_contract_solutions_page]
	 *
	 * @return string
	 */
	public function wla_contract_solutions_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA CONTRACT SOLUTIONS PAGE WRAPPER -->
		<div class="wla-contract-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-contract-hero">
				<div class="wla-contract-hero-content">
					<div class="wla-contract-hero-eyebrow">WLA PRACTICE · CONTRACT SOLUTIONS</div>
					<h1 class="wla-contract-hero-title">CONTRACT SOLUTIONS</h1>
					<h2 class="wla-contract-hero-subtitle">INTERNATIONAL CONTRACTS · DRAFTING · NEGOTIATION · DISPUTES</h2>
					<p class="wla-contract-hero-description">
						WLA co-practices this specialty across 90+ jurisdictions under one Institutional framework — one brief, the right specialist in every required jurisdiction, confirmed in writing within 48 hours.
					</p>
					<div class="wla-contract-hero-buttons">
						<a href="wla-specialist.html" class="wla-contract-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-contract-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CONTRACT CAPABILITIES                               -->
			<!-- ============================================================ -->
			<section class="wla-contract-section wla-contract-animate">
				<div class="wla-contract-container">
					<div class="wla-contract-eyebrow">CONTRACT SOLUTIONS CAPABILITIES</div>
					<h2 class="wla-contract-heading">EVERY DIMENSION OF INTERNATIONAL CONTRACT LAW.</h2>
					
					<div class="wla-contract-grid">
						
						<!-- Capability 01 -->
						<div class="wla-contract-card">
							<div class="wla-contract-card-number">01</div>
							<h3 class="wla-contract-card-title">CROSS-BORDER CONTRACT DRAFTING</h3>
							<p class="wla-contract-card-desc">
								Complex international contracts drafted to work across multiple legal systems — identifying the conflicts between applicable law in each jurisdiction and structuring clauses that hold.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-contract-card">
							<div class="wla-contract-card-number">02</div>
							<h3 class="wla-contract-card-title">GOVERNING LAW STRATEGY</h3>
							<p class="wla-contract-card-desc">
								Governing law selection for international contracts — English law, New York law, Swiss law, and jurisdiction-specific requirements. Ensuring enforceability in every relevant jurisdiction.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-contract-card">
							<div class="wla-contract-card-number">03</div>
							<h3 class="wla-contract-card-title">CONTRACT NEGOTIATION</h3>
							<p class="wla-contract-card-desc">
								Contract negotiation support for international transactions — WLA specialists on both sides of the negotiating table, understanding the counterparty's legal system as well as the client's.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-contract-card">
							<div class="wla-contract-card-number">04</div>
							<h3 class="wla-contract-card-title">TEMPLATE LIBRARIES</h3>
							<p class="wla-contract-card-desc">
								Multi-jurisdiction contract template libraries — employment contracts, commercial agreements, supplier frameworks, and distribution contracts adapted for each WLA-active jurisdiction.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-contract-card">
							<div class="wla-contract-card-number">05</div>
							<h3 class="wla-contract-card-title">CONTRACT DISPUTES</h3>
							<p class="wla-contract-card-desc">
								Contract dispute resolution — WLA co-practices the full enforcement chain from notice to arbitration to enforcement of the award or judgment across every relevant jurisdiction.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-contract-card">
							<div class="wla-contract-card-number">06</div>
							<h3 class="wla-contract-card-title">REGULATORY COMPLIANCE</h3>
							<p class="wla-contract-card-desc">
								Ensuring contracts comply with mandatory regulatory requirements in every jurisdiction of performance — consumer protection, competition law, data protection, and sector-specific regulation.
							</p>
						</div>
						
					</div>
					
					<div class="wla-contract-cta-row">
						<a href="wla-specialist.html" class="wla-contract-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-contract-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-contract-cta-band">
				<div class="wla-contract-cta-title">BRIEF WLA. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-contract-cta-buttons">
					<a href="wla-specialist.html" class="wla-contract-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-contract-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA CONTRACT SOLUTIONS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Global Dispute Group Page Shortcode
	 *
	 * Displays the WLA Global Dispute Group practice page including:
	 * - Hero section
	 * - Dispute capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_disputes_page]
	 *
	 * @return string
	 */
	public function wla_disputes_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA DISPUTES PAGE WRAPPER -->
		<div class="wla-disputes-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-disputes-hero">
				<div class="wla-disputes-hero-content">
					<div class="wla-disputes-hero-eyebrow">WLA PRACTICE · GLOBAL DISPUTE GROUP</div>
					<h1 class="wla-disputes-hero-title">GLOBAL DISPUTE GROUP</h1>
					<h2 class="wla-disputes-hero-subtitle">CROSS-BORDER LITIGATION · ENFORCEMENT · ASSET RECOVERY</h2>
					<p class="wla-disputes-hero-description">
						WLA co-practices this specialty across 90+ jurisdictions under one Institutional framework — one brief, the right specialist in every required jurisdiction, confirmed in writing within 48 hours.
					</p>
					<div class="wla-disputes-hero-buttons">
						<a href="wla-specialist.html" class="wla-disputes-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-disputes-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: DISPUTE CAPABILITIES                                -->
			<!-- ============================================================ -->
			<section class="wla-disputes-section wla-disputes-animate">
				<div class="wla-disputes-container">
					<div class="wla-disputes-eyebrow">DISPUTE CAPABILITIES</div>
					<h2 class="wla-disputes-heading">EVERY FORM OF CROSS-BORDER DISPUTE RESOLUTION.</h2>
					
					<div class="wla-disputes-grid">
						
						<!-- Capability 01 -->
						<div class="wla-disputes-card">
							<div class="wla-disputes-card-number">01</div>
							<h3 class="wla-disputes-card-title">COMMERCIAL LITIGATION</h3>
							<p class="wla-disputes-card-desc">
								Cross-border commercial litigation coordinated across multiple jurisdictions — parallel proceedings strategy, anti-suit injunctions, and service and enforcement across legal systems.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-disputes-card">
							<div class="wla-disputes-card-number">02</div>
							<h3 class="wla-disputes-card-title">ARBITRATION</h3>
							<p class="wla-disputes-card-desc">
								International commercial arbitration under ICC, HKIAC, LCIA, SIAC, and UNCITRAL rules — co-practiced across the seat jurisdiction and all enforcement jurisdictions simultaneously.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-disputes-card">
							<div class="wla-disputes-card-number">03</div>
							<h3 class="wla-disputes-card-title">ENFORCEMENT &amp; RECOVERY</h3>
							<p class="wla-disputes-card-desc">
								Award and judgment enforcement across 90+ jurisdictions — New York Convention recognition, asset freezing orders, and the full enforcement chain from judgment to recovery.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-disputes-card">
							<div class="wla-disputes-card-number">04</div>
							<h3 class="wla-disputes-card-title">ASSET TRACING</h3>
							<p class="wla-disputes-card-desc">
								Global asset tracing and freezing — ex parte freezing injunctions, disclosure orders, and coordinated asset recovery across every jurisdiction where assets are held.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-disputes-card">
							<div class="wla-disputes-card-number">05</div>
							<h3 class="wla-disputes-card-title">INVESTOR-STATE</h3>
							<p class="wla-disputes-card-desc">
								ICSID and BIT arbitration — investor-state disputes against sovereign states under bilateral investment treaties, including enforcement of treaty awards against state assets.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-disputes-card">
							<div class="wla-disputes-card-number">06</div>
							<h3 class="wla-disputes-card-title">EMERGENCY RELIEF</h3>
							<p class="wla-disputes-card-desc">
								Emergency applications — without notice injunctions, emergency arbitrator appointments, and urgent protective measures across multiple jurisdictions simultaneously.
							</p>
						</div>
						
					</div>
					
					<div class="wla-disputes-cta-row">
						<a href="wla-specialist.html" class="wla-disputes-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-disputes-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-disputes-cta-band">
				<div class="wla-disputes-cta-title">BRIEF WLA. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-disputes-cta-buttons">
					<a href="wla-specialist.html" class="wla-disputes-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-disputes-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA DISPUTES PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Energy & Infrastructure Page Shortcode
	 *
	 * Displays the WLA Energy & Infrastructure practice page including:
	 * - Hero section
	 * - Energy capabilities grid
	 * - Key markets / corridors section
	 * - CTA band
	 *
	 * Shortcode: [wla_energy_page]
	 *
	 * @return string
	 */
	public function wla_energy_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA ENERGY PAGE WRAPPER -->
		<div class="wla-energy-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-energy-hero">
				<div class="wla-energy-hero-content">
					<div class="wla-energy-hero-eyebrow">WLA PRACTICE · ENERGY &amp; INFRASTRUCTURE</div>
					<h1 class="wla-energy-hero-title">ENERGY &amp; INFRASTRUCTURE</h1>
					<h2 class="wla-energy-hero-subtitle">PROJECT FINANCE · RENEWABLES · CRITICAL INFRASTRUCTURE</h2>
					<p class="wla-energy-hero-description">
						WLA co-practices this specialty across 90+ jurisdictions under one Institutional framework — one brief, the right specialist in every required jurisdiction, confirmed in writing within 48 hours.
					</p>
					<div class="wla-energy-hero-buttons">
						<a href="wla-specialist.html" class="wla-energy-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-energy-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ENERGY CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-energy-section wla-energy-animate">
				<div class="wla-energy-container">
					<div class="wla-energy-eyebrow">ENERGY &amp; INFRASTRUCTURE CAPABILITIES</div>
					<h2 class="wla-energy-heading">EVERY DIMENSION OF ENERGY AND INFRASTRUCTURE LAW.</h2>
					
					<div class="wla-energy-grid">
						
						<!-- Capability 01 -->
						<div class="wla-energy-card">
							<div class="wla-energy-card-number">01</div>
							<h3 class="wla-energy-card-title">PROJECT FINANCE</h3>
							<p class="wla-energy-card-desc">
								Cross-border project financing for energy and infrastructure — security structures, lender step-in rights, EPC documentation, and offtake agreements across all required jurisdictions.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-energy-card">
							<div class="wla-energy-card-number">02</div>
							<h3 class="wla-energy-card-title">RENEWABLE ENERGY</h3>
							<p class="wla-energy-card-desc">
								Solar, wind, and hydrogen project development — land rights, grid connection agreements, power purchase agreements, and regulatory approvals across all WLA-active jurisdictions.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-energy-card">
							<div class="wla-energy-card-number">03</div>
							<h3 class="wla-energy-card-title">OIL &amp; GAS</h3>
							<p class="wla-energy-card-desc">
								Upstream, midstream, and downstream oil and gas — exploration licences, production sharing agreements, pipeline easements, and trading documentation across global energy markets.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-energy-card">
							<div class="wla-energy-card-number">04</div>
							<h3 class="wla-energy-card-title">ENERGY TRANSITION</h3>
							<p class="wla-energy-card-desc">
								Legal infrastructure for the energy transition — green hydrogen, carbon capture, battery storage, and the evolving regulatory frameworks in each jurisdiction.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-energy-card">
							<div class="wla-energy-card-number">05</div>
							<h3 class="wla-energy-card-title">CRITICAL MINERALS</h3>
							<p class="wla-energy-card-desc">
								Mining law and critical minerals — exploration, extraction, and offtake agreements for lithium, cobalt, copper, and rare earths. UK→Africa corridor most active. WLA Zambia and WLA Africa active.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-energy-card">
							<div class="wla-energy-card-number">06</div>
							<h3 class="wla-energy-card-title">INFRASTRUCTURE M&amp;A</h3>
							<p class="wla-energy-card-desc">
								Infrastructure asset acquisitions — regulated utilities, toll roads, ports, airports, and digital infrastructure. Complex regulatory approvals coordinated across all jurisdictions involved.
							</p>
						</div>
						
					</div>
					
					<div class="wla-energy-cta-row">
						<a href="wla-specialist.html" class="wla-energy-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-energy-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY MARKETS / CORRIDORS                             -->
			<!-- ============================================================ -->
			<section class="wla-energy-section wla-energy-section--alt wla-energy-animate">
				<div class="wla-energy-container">
					<div class="wla-energy-eyebrow">KEY MARKETS</div>
					<h2 class="wla-energy-heading">ENERGY &amp; INFRASTRUCTURE MOST ACTIVE ON THESE CORRIDORS.</h2>
					
					<div class="wla-energy-rows">
						
						<!-- Corridor 01 -->
						<div class="wla-energy-row">
							<div class="wla-energy-row-number">01</div>
							<div class="wla-energy-row-title">GULF → CEE +38%</div>
							<div class="wla-energy-row-desc">
								Gulf sovereign energy funds deploying into CEE renewable energy — Poland, Romania, Czech Republic wind and solar. WLA co-practices both sides simultaneously.
							</div>
						</div>
						
						<!-- Corridor 02 -->
						<div class="wla-energy-row">
							<div class="wla-energy-row-number">02</div>
							<div class="wla-energy-row-title">UK → AFRICA +22%</div>
							<div class="wla-energy-row-desc">
								UK project finance into African critical minerals, renewable energy, and infrastructure. Kenya geothermal. Zambia copper. Nigeria gas-to-power. WLA co-practices both sides.
							</div>
						</div>
						
						<!-- Corridor 03 -->
						<div class="wla-energy-row">
							<div class="wla-energy-row-number">03</div>
							<div class="wla-energy-row-title">EU GREEN DEAL</div>
							<div class="wla-energy-row-desc">
								EU energy transition creating record project finance activity across all 27 member states. WLA EU co-practices every jurisdiction under the NZIA fast-track framework.
							</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-energy-cta-band">
				<div class="wla-energy-cta-title">BRIEF WLA. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-energy-cta-buttons">
					<a href="wla-specialist.html" class="wla-energy-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-energy-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA ENERGY PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * In-House Connect Page Shortcode
	 *
	 * Displays the WLA In-House Connect practice page including:
	 * - Hero section
	 * - In-House Connect capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_inhouse_page]
	 *
	 * @return string
	 */
	public function wla_inhouse_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA IN-HOUSE CONNECT PAGE WRAPPER -->
		<div class="wla-inhouse-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-inhouse-hero">
				<div class="wla-inhouse-hero-content">
					<div class="wla-inhouse-hero-eyebrow">WLA PRACTICE · IN-HOUSE CONNECT</div>
					<h1 class="wla-inhouse-hero-title">IN-HOUSE CONNECT</h1>
					<h2 class="wla-inhouse-hero-subtitle">CO-PRACTICE · EXTERNAL COUNSEL INTEGRATION · GC TEAMS</h2>
					<p class="wla-inhouse-hero-description">
						WLA co-practices this specialty across 90+ jurisdictions under one Institutional framework — one brief, the right specialist in every required jurisdiction, confirmed in writing within 48 hours.
					</p>
					<div class="wla-inhouse-hero-buttons">
						<a href="wla-specialist.html" class="wla-inhouse-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-inhouse-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: IN-HOUSE CONNECT CAPABILITIES                       -->
			<!-- ============================================================ -->
			<section class="wla-inhouse-section wla-inhouse-animate">
				<div class="wla-inhouse-container">
					<div class="wla-inhouse-eyebrow">IN-HOUSE CONNECT CAPABILITIES</div>
					<h2 class="wla-inhouse-heading">HOW WLA INTEGRATES WITH IN-HOUSE LEGAL TEAMS.</h2>
					
					<div class="wla-inhouse-grid">
						
						<!-- Capability 01 -->
						<div class="wla-inhouse-card">
							<div class="wla-inhouse-card-number">01</div>
							<h3 class="wla-inhouse-card-title">WLA BENCH — STANDING TEAM</h3>
							<p class="wla-inhouse-card-desc">
								Your dedicated standing WLA Bench — the pre-assembled co-practice team that knows your organisation, your risk appetite, and your priorities across all operating jurisdictions.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-inhouse-card">
							<div class="wla-inhouse-card-number">02</div>
							<h3 class="wla-inhouse-card-title">GC COUNCIL</h3>
							<p class="wla-inhouse-card-desc">
								The WLA GC Council — a private peer community for General Counsel and senior in-house legal leaders. Closed roundtables, intelligence briefings, and peer connection across WLA's client base.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-inhouse-card">
							<div class="wla-inhouse-card-number">03</div>
							<h3 class="wla-inhouse-card-title">CO-PRACTICE INTEGRATION</h3>
							<p class="wla-inhouse-card-desc">
								WLA partner firms integrate directly with in-house legal teams — acting as extension of the GC function across jurisdictions where the in-house team lacks local specialist depth.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-inhouse-card">
							<div class="wla-inhouse-card-number">04</div>
							<h3 class="wla-inhouse-card-title">MATTER MANAGEMENT</h3>
							<p class="wla-inhouse-card-desc">
								One WLA coordination layer managing all external counsel across all jurisdictions — consolidated reporting, coordinated strategy, and single billing relationship for the entire programme.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-inhouse-card">
							<div class="wla-inhouse-card-number">05</div>
							<h3 class="wla-inhouse-card-title">INTELLIGENCE BRIEFINGS</h3>
							<p class="wla-inhouse-card-desc">
								Weekly WLA Intelligence briefings delivered directly to GC and senior in-house legal teams — 1,240+ regulatory signals across 80+ jurisdictions, filtered for your operating footprint.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-inhouse-card">
							<div class="wla-inhouse-card-number">06</div>
							<h3 class="wla-inhouse-card-title">SECONDMENTS</h3>
							<p class="wla-inhouse-card-desc">
								WLA specialist secondments into in-house legal teams — providing deep specialist expertise in specific jurisdictions or practice areas on a defined-term basis.
							</p>
						</div>
						
					</div>
					
					<div class="wla-inhouse-cta-row">
						<a href="wla-specialist.html" class="wla-inhouse-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-inhouse-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-inhouse-cta-band">
				<div class="wla-inhouse-cta-title">BRIEF WLA. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-inhouse-cta-buttons">
					<a href="wla-specialist.html" class="wla-inhouse-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-inhouse-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA IN-HOUSE CONNECT PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Neutrals Page Shortcode
	 *
	 * Displays the WLA Neutrals / TheNeutrals.ORG™ practice page including:
	 * - Hero section
	 * - Neutrals capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_neutrals_page]
	 *
	 * @return string
	 */
	public function wla_neutrals_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA NEUTRALS PAGE WRAPPER -->
		<div class="wla-neutrals-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-neutrals-hero">
				<div class="wla-neutrals-hero-content">
					<div class="wla-neutrals-hero-eyebrow">WLA CONNECTED ORGANISATION · ADR</div>
					<h1 class="wla-neutrals-hero-title">WLA NEUTRALS</h1>
					<h2 class="wla-neutrals-hero-subtitle">THENEUTRALS.ORG™ · 1,500+ CERTIFIED NEUTRALS · 80+ JURISDICTIONS</h2>
					<p class="wla-neutrals-hero-description">
						WLA co-practices this specialty across 90+ jurisdictions under one Institutional framework — one brief, the right specialist in every required jurisdiction, confirmed in writing within 48 hours.
					</p>
					<div class="wla-neutrals-hero-buttons">
						<a href="wla-specialist.html" class="wla-neutrals-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-neutrals-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: NEUTRALS CAPABILITIES                               -->
			<!-- ============================================================ -->
			<section class="wla-neutrals-section wla-neutrals-animate">
				<div class="wla-neutrals-container">
					<div class="wla-neutrals-eyebrow">WLA NEUTRALS — THENEUTRALS.ORG™</div>
					<h2 class="wla-neutrals-heading">THE WORLD'S PREMIER INDEPENDENT NEUTRAL EVALUATION NETWORK.</h2>
					
					<div class="wla-neutrals-grid">
						
						<!-- Capability 01 -->
						<div class="wla-neutrals-card">
							<div class="wla-neutrals-card-number">01</div>
							<h3 class="wla-neutrals-card-title">CERTIFIED NEUTRAL EVALUATORS</h3>
							<p class="wla-neutrals-card-desc">
								1,500+ certified neutral evaluators across 80+ jurisdictions — each independently assessed against published standards of expertise, professional conduct, and ADR process knowledge.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-neutrals-card">
							<div class="wla-neutrals-card-number">02</div>
							<h3 class="wla-neutrals-card-title">COMMERCIAL MEDIATION</h3>
							<p class="wla-neutrals-card-desc">
								International commercial mediation under ICC, CEDR, SIAC, and CMAP rules — certified neutrals available in every major arbitration seat globally.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-neutrals-card">
							<div class="wla-neutrals-card-number">03</div>
							<h3 class="wla-neutrals-card-title">EXPERT DETERMINATION</h3>
							<p class="wla-neutrals-card-desc">
								Independent expert determination for technical and valuation disputes — binding and non-binding expert opinions from certified specialists in law, accounting, engineering, and science.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-neutrals-card">
							<div class="wla-neutrals-card-number">04</div>
							<h3 class="wla-neutrals-card-title">NEUTRAL EVALUATION</h3>
							<p class="wla-neutrals-card-desc">
								Early neutral evaluation — a certified neutral provides a non-binding assessment of the merits of a dispute, facilitating early settlement and avoiding expensive arbitration proceedings.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-neutrals-card">
							<div class="wla-neutrals-card-number">05</div>
							<h3 class="wla-neutrals-card-title">DISPUTE BOARDS</h3>
							<p class="wla-neutrals-card-desc">
								Dispute boards for construction and infrastructure projects — standing neutral panels providing real-time decisions throughout the project lifecycle under FIDIC and ICC rules.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-neutrals-card">
							<div class="wla-neutrals-card-number">06</div>
							<h3 class="wla-neutrals-card-title">SINGAPORE CONVENTION</h3>
							<p class="wla-neutrals-card-desc">
								Enforcement of mediated settlement agreements under the Singapore Convention — WLA Neutrals and WLA co-practice working together from mediation to enforcement.
							</p>
						</div>
						
					</div>
					
					<div class="wla-neutrals-cta-row">
						<a href="wla-specialist.html" class="wla-neutrals-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-neutrals-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-neutrals-cta-band">
				<div class="wla-neutrals-cta-title">BRIEF WLA. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-neutrals-cta-buttons">
					<a href="wla-specialist.html" class="wla-neutrals-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-neutrals-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA NEUTRALS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Practices & Capabilities Page Shortcode
	 *
	 * Displays the WLA Practices & Capabilities page including:
	 * - Page hero with stats
	 * - Practice accordion
	 * - Corridors table
	 * - Co-practice feature section
	 * - Testimonials
	 * - CTA strip
	 *
	 * Shortcode: [wla_practices_page]
	 *
	 * @return string
	 */
	public function wla_practices_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA PRACTICES PAGE WRAPPER -->
		<div class="wla-practices-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: PAGE HERO                                            -->
			<!-- ============================================================ -->
			<section class="wla-practices-phero">
				<div class="wla-practices-phero-top">
					<div class="wla-practices-phero-left">
						<div class="wla-practices-phero-eyebrow">PRACTICES &amp; CAPABILITIES</div>
						<h1 class="wla-practices-phero-title">GLOBAL<br>EXPERTISE.<br>LOCAL<br>EXECUTION.</h1>
						<p class="wla-practices-phero-desc">8 core practice alliances and 5 specialist groups spanning every major cross-border legal discipline across 90+ jurisdictions. One accredited specialist firm in each territory.</p>
						<div class="wla-practices-phero-buttons">
							<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST — 48H</a>
							<a href="#practices" class="wla-practices-btn-bdr">EXPLORE PRACTICES</a>
						</div>
					</div>
					<div class="wla-practices-phero-right">
						<img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?w=1200&q=85" alt="Global law practice">
						<div class="wla-practices-phero-right-grad"></div>
						<div class="wla-practices-phero-right-count">
							<div class="wla-practices-phero-big-num">12</div>
							<div class="wla-practices-phero-right-label">GLOBAL PRACTICE GROUPS ACTIVE</div>
						</div>
					</div>
				</div>
				
				<div class="wla-practices-phero-strip">
					<div class="wla-practices-pstrip-item">
						<div class="wla-practices-pstrip-num">12</div>
						<div class="wla-practices-pstrip-label">Practice Groups</div>
					</div>
					<div class="wla-practices-pstrip-item">
						<div class="wla-practices-pstrip-num">90+</div>
						<div class="wla-practices-pstrip-label">Jurisdictions</div>
					</div>
					<div class="wla-practices-pstrip-item">
						<div class="wla-practices-pstrip-num">1</div>
						<div class="wla-practices-pstrip-label">Firm Per Market</div>
					</div>
					<div class="wla-practices-pstrip-item">
						<div class="wla-practices-pstrip-num">48H</div>
						<div class="wla-practices-pstrip-label">Specialist Matched</div>
					</div>
					<div class="wla-practices-pstrip-item">
						<div class="wla-practices-pstrip-num">100%</div>
						<div class="wla-practices-pstrip-label">WLA Qualified</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE ACCORDION                                  -->
			<!-- ============================================================ -->
			<section class="wla-practices-section" id="practices">
				<div class="wla-practices-container">
					<div class="wla-practices-eyebrow">ALL PRACTICE GROUPS</div>
					<h2 class="wla-practices-heading">CLICK TO EXPLORE<br>EACH PRACTICE.</h2>
					
					<div class="wla-practices-accordion wla-practices-animate">
						
						<!-- Practice 01: Transactional & M&A -->
						<div class="wla-practices-pb-row" onclick="wlaPracticesToggle(this)">
							<div class="wla-practices-pb-num">01</div>
							<div class="wla-practices-pb-head">
								<div>
									<div class="wla-practices-pb-name">TRANSACTIONAL &amp; M&amp;A</div>
									<div class="wla-practices-pb-tag">Cross-border deals · Acquisitions · Joint ventures · Corporate restructuring</div>
								</div>
								<div class="wla-practices-pb-arrow">+</div>
							</div>
							<div class="wla-practices-pb-content-wrap">
								<div class="wla-practices-pb-content">
									<div class="wla-practices-pb-text">
										<p class="wla-practices-pb-desc">WLA's Transactional practice co-ordinates cross-border M&A, corporate structuring, joint ventures, and private equity transactions across 90+ jurisdictions. Partner firms jointly hold the matter from term sheet to close — one team, shared accountability, no seams.</p>
										<div class="wla-practices-pb-caps">
											<span class="wla-practices-pb-cap">M&A</span>
											<span class="wla-practices-pb-cap">JOINT VENTURES</span>
											<span class="wla-practices-pb-cap">PRIVATE EQUITY</span>
											<span class="wla-practices-pb-cap">CORPORATE RESTRUCTURING</span>
											<span class="wla-practices-pb-cap">DUE DILIGENCE</span>
											<span class="wla-practices-pb-cap">CROSS-BORDER MERGERS</span>
										</div>
										<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST →</a>
									</div>
									<div class="wla-practices-pb-img">
										<img src="https://images.unsplash.com/photo-1554774853-aae0a22c8aa4?w=700&q=80" alt="M&A Practice">
									</div>
								</div>
							</div>
						</div>
						
						<!-- Practice 02: Intellectual Property -->
						<div class="wla-practices-pb-row" onclick="wlaPracticesToggle(this)">
							<div class="wla-practices-pb-num">02</div>
							<div class="wla-practices-pb-head">
								<div>
									<div class="wla-practices-pb-name">INTELLECTUAL PROPERTY</div>
									<div class="wla-practices-pb-tag">Patents · Trademarks · Licensing · Brand protection · IP strategy</div>
								</div>
								<div class="wla-practices-pb-arrow">+</div>
							</div>
							<div class="wla-practices-pb-content-wrap">
								<div class="wla-practices-pb-content">
									<div class="wla-practices-pb-text">
										<p class="wla-practices-pb-desc">Global IP strategy, patent prosecution, trademark registration, and brand protection across multiple jurisdictions simultaneously. WLA IP specialists are embedded in the world's fastest-growing innovation markets — from Silicon Valley to Shenzhen to Bangalore.</p>
										<div class="wla-practices-pb-caps">
											<span class="wla-practices-pb-cap">PATENTS</span>
											<span class="wla-practices-pb-cap">TRADEMARKS</span>
											<span class="wla-practices-pb-cap">COPYRIGHT</span>
											<span class="wla-practices-pb-cap">LICENSING</span>
											<span class="wla-practices-pb-cap">BRAND PROTECTION</span>
											<span class="wla-practices-pb-cap">IP LITIGATION</span>
										</div>
										<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST →</a>
									</div>
									<div class="wla-practices-pb-img">
										<img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=700&q=80" alt="IP Practice">
									</div>
								</div>
							</div>
						</div>
						
						<!-- Practice 03: Disputes & Arbitration -->
						<div class="wla-practices-pb-row" onclick="wlaPracticesToggle(this)">
							<div class="wla-practices-pb-num">03</div>
							<div class="wla-practices-pb-head">
								<div>
									<div class="wla-practices-pb-name">DISPUTES &amp; ARBITRATION</div>
									<div class="wla-practices-pb-tag">International litigation · Mediation · HKIAC · ICC · LCIA · Enforcement</div>
								</div>
								<div class="wla-practices-pb-arrow">+</div>
							</div>
							<div class="wla-practices-pb-content-wrap">
								<div class="wla-practices-pb-content">
									<div class="wla-practices-pb-text">
										<p class="wla-practices-pb-desc">Cross-border dispute resolution across all major arbitral institutions — ICC, HKIAC, LCIA, SIAC, and ICSID. WLA dispute specialists coordinate complex multi-party, multi-jurisdictional proceedings with a single point of accountability for the client.</p>
										<div class="wla-practices-pb-caps">
											<span class="wla-practices-pb-cap">INTERNATIONAL ARBITRATION</span>
											<span class="wla-practices-pb-cap">COMMERCIAL LITIGATION</span>
											<span class="wla-practices-pb-cap">MEDIATION</span>
											<span class="wla-practices-pb-cap">ENFORCEMENT</span>
											<span class="wla-practices-pb-cap">INVESTOR-STATE</span>
											<span class="wla-practices-pb-cap">EMERGENCY RELIEF</span>
										</div>
										<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST →</a>
									</div>
									<div class="wla-practices-pb-img">
										<img src="https://images.unsplash.com/photo-1589994965851-a8f479c573a9?w=700&q=80" alt="Disputes">
									</div>
								</div>
							</div>
						</div>
						
						<!-- Practice 04: Insolvency & Restructuring -->
						<div class="wla-practices-pb-row" onclick="wlaPracticesToggle(this)">
							<div class="wla-practices-pb-num">04</div>
							<div class="wla-practices-pb-head">
								<div>
									<div class="wla-practices-pb-name">INSOLVENCY &amp; RESTRUCTURING</div>
									<div class="wla-practices-pb-tag">Cross-border insolvency · COMI · WHOA · Debt restructuring · Administration</div>
								</div>
								<div class="wla-practices-pb-arrow">+</div>
							</div>
							<div class="wla-practices-pb-content-wrap">
								<div class="wla-practices-pb-content">
									<div class="wla-practices-pb-text">
										<p class="wla-practices-pb-desc">Complex cross-border insolvency proceedings, COMI determinations, WHOA restructuring plans, and debt restructuring across multiple legal systems. WLA's insolvency network spans common law, civil law, and hybrid systems with specialist practitioners in each.</p>
										<div class="wla-practices-pb-caps">
											<span class="wla-practices-pb-cap">CROSS-BORDER INSOLVENCY</span>
											<span class="wla-practices-pb-cap">COMI</span>
											<span class="wla-practices-pb-cap">WHOA</span>
											<span class="wla-practices-pb-cap">DEBT RESTRUCTURING</span>
											<span class="wla-practices-pb-cap">ADMINISTRATION</span>
											<span class="wla-practices-pb-cap">LIQUIDATION</span>
										</div>
										<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST →</a>
									</div>
									<div class="wla-practices-pb-img">
										<img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=700&q=80" alt="Insolvency">
									</div>
								</div>
							</div>
						</div>
						
						<!-- Practice 05: Immigration & Mobility -->
						<div class="wla-practices-pb-row" onclick="wlaPracticesToggle(this)">
							<div class="wla-practices-pb-num">05</div>
							<div class="wla-practices-pb-head">
								<div>
									<div class="wla-practices-pb-name">IMMIGRATION &amp; MOBILITY</div>
									<div class="wla-practices-pb-tag">Global mobility · Work visas · Residency · Golden Visa · Citizenship by investment</div>
								</div>
								<div class="wla-practices-pb-arrow">+</div>
							</div>
							<div class="wla-practices-pb-content-wrap">
								<div class="wla-practices-pb-content">
									<div class="wla-practices-pb-text">
										<p class="wla-practices-pb-desc">The World Immigration Alliance — WLA's specialist immigration network — covers corporate mobility programmes, executive relocation, investor visas, and citizenship by investment across 80+ jurisdictions. One coordinator. Every destination.</p>
										<div class="wla-practices-pb-caps">
											<span class="wla-practices-pb-cap">WORK VISAS</span>
											<span class="wla-practices-pb-cap">RESIDENCY</span>
											<span class="wla-practices-pb-cap">GOLDEN VISA</span>
											<span class="wla-practices-pb-cap">CITIZENSHIP</span>
											<span class="wla-practices-pb-cap">CORPORATE MOBILITY</span>
											<span class="wla-practices-pb-cap">GLOBAL RELOCATION</span>
										</div>
										<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST →</a>
									</div>
									<div class="wla-practices-pb-img">
										<img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=700&q=80" alt="Immigration">
									</div>
								</div>
							</div>
						</div>
						
						<!-- Practice 06: Private Clients & HNW -->
						<div class="wla-practices-pb-row" onclick="wlaPracticesToggle(this)">
							<div class="wla-practices-pb-num">06</div>
							<div class="wla-practices-pb-head">
								<div>
									<div class="wla-practices-pb-name">PRIVATE CLIENTS &amp; HNW</div>
									<div class="wla-practices-pb-tag">Wealth structuring · Family office · Succession · Asset protection · Estate planning</div>
								</div>
								<div class="wla-practices-pb-arrow">+</div>
							</div>
							<div class="wla-practices-pb-content-wrap">
								<div class="wla-practices-pb-content">
									<div class="wla-practices-pb-text">
										<p class="wla-practices-pb-desc">Discreet, high-quality private legal services for high net worth individuals, family offices, and ultra-high net worth families. From complex multi-jurisdictional estate planning to family governance frameworks, WLA's private client network understands the intersection of wealth, privacy, and global mobility.</p>
										<div class="wla-practices-pb-caps">
											<span class="wla-practices-pb-cap">WEALTH STRUCTURING</span>
											<span class="wla-practices-pb-cap">FAMILY OFFICE</span>
											<span class="wla-practices-pb-cap">SUCCESSION PLANNING</span>
											<span class="wla-practices-pb-cap">ASSET PROTECTION</span>
											<span class="wla-practices-pb-cap">TRUSTS</span>
											<span class="wla-practices-pb-cap">ESTATE PLANNING</span>
										</div>
										<a href="#" class="wla-practices-btn-ink">FIND A SPECIALIST →</a>
									</div>
									<div class="wla-practices-pb-img">
										<img src="https://images.unsplash.com/photo-1560472355-536de3962603?w=700&q=80" alt="Private Clients">
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS TABLE                                     -->
			<!-- ============================================================ -->
			<div class="wla-practices-corridor-bg">
				<section class="wla-practices-section wla-practices-animate">
					<div class="wla-practices-container">
						<div class="wla-practices-eyebrow">DEAL CORRIDORS 2026</div>
						<h2 class="wla-practices-heading">THE WORLD'S MOST ACTIVE<br>LEGAL CORRIDORS. BOTH SIDES.</h2>
						<p class="wla-practices-sub-text">WLA holds both sides of every corridor simultaneously. One brief. Both jurisdictions coordinated. Brief to close.</p>
						
						<table class="wla-practices-corridor-table">
							<thead>
								<tr>
									<th>CORRIDOR</th>
									<th>DESCRIPTION</th>
									<th>ACTIVE PRACTICES</th>
									<th style="text-align:right">GROWTH 2026</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-practices-ct-route">
											<span class="wla-practices-ct-from">GULF</span>
											<span class="wla-practices-ct-arr">→</span>
											<span class="wla-practices-ct-to">CEE</span>
										</div>
										<div class="wla-practices-ct-desc">GCC · Central &amp; Eastern Europe</div>
									</td>
									<td class="wla-practices-ct-desc-text">Sovereign wealth into Eastern European real estate, infrastructure, and manufacturing. Top practice: Corporate + FDI.</td>
									<td>
										<div class="wla-practices-ct-tags">
											<span class="wla-practices-ct-tag">M&A</span>
											<span class="wla-practices-ct-tag">CORPORATE</span>
											<span class="wla-practices-ct-tag">FDI</span>
										</div>
									</td>
									<td><div class="wla-practices-ct-growth">+38%</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-practices-ct-route">
											<span class="wla-practices-ct-from">EU</span>
											<span class="wla-practices-ct-arr">→</span>
											<span class="wla-practices-ct-to">INDIA</span>
										</div>
										<div class="wla-practices-ct-desc">Trade · Technology · Investment</div>
									</td>
									<td class="wla-practices-ct-desc-text">EU-India FTA negotiations driving record dealflow in technology, renewable energy, and pharma corridors.</td>
									<td>
										<div class="wla-practices-ct-tags">
											<span class="wla-practices-ct-tag">TRADE</span>
											<span class="wla-practices-ct-tag">TECH</span>
											<span class="wla-practices-ct-tag">TAX</span>
										</div>
									</td>
									<td><div class="wla-practices-ct-growth">+34%</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-practices-ct-route">
											<span class="wla-practices-ct-from">GCC</span>
											<span class="wla-practices-ct-arr">→</span>
											<span class="wla-practices-ct-to">SE ASIA</span>
										</div>
										<div class="wla-practices-ct-desc">Gulf Capital into ASEAN</div>
									</td>
									<td class="wla-practices-ct-desc-text">Gulf sovereign and family office capital flowing into ASEAN infrastructure, hospitality, and technology investments.</td>
									<td>
										<div class="wla-practices-ct-tags">
											<span class="wla-practices-ct-tag">FDI</span>
											<span class="wla-practices-ct-tag">INFRA</span>
											<span class="wla-practices-ct-tag">REAL ESTATE</span>
										</div>
									</td>
									<td><div class="wla-practices-ct-growth">+31%</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-practices-ct-route">
											<span class="wla-practices-ct-from">UK</span>
											<span class="wla-practices-ct-arr">→</span>
											<span class="wla-practices-ct-to">AFRICA</span>
										</div>
										<div class="wla-practices-ct-desc">Common Law · Critical Minerals · BII</div>
									</td>
									<td class="wla-practices-ct-desc-text">British Investment International-led infrastructure and critical minerals deals across Sub-Saharan and East Africa.</td>
									<td>
										<div class="wla-practices-ct-tags">
											<span class="wla-practices-ct-tag">MINING</span>
											<span class="wla-practices-ct-tag">INFRA</span>
											<span class="wla-practices-ct-tag">ENERGY</span>
										</div>
									</td>
									<td><div class="wla-practices-ct-growth">+22%</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-practices-ct-route">
											<span class="wla-practices-ct-from">APAC</span>
											<span class="wla-practices-ct-arr">↔</span>
											<span class="wla-practices-ct-to">AMERICAS</span>
										</div>
										<div class="wla-practices-ct-desc">Pacific Rim · Cross-Border Flows</div>
									</td>
									<td class="wla-practices-ct-desc-text">US-Asia technology, semiconductor, and clean energy dealflow rebounding strongly in 2026 post-regulatory recalibration.</td>
									<td>
										<div class="wla-practices-ct-tags">
											<span class="wla-practices-ct-tag">TECH</span>
											<span class="wla-practices-ct-tag">IP</span>
											<span class="wla-practices-ct-tag">REGULATORY</span>
										</div>
									</td>
									<td><div class="wla-practices-ct-growth">+19%</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-practices-ct-route">
											<span class="wla-practices-ct-from">US</span>
											<span class="wla-practices-ct-arr">↔</span>
											<span class="wla-practices-ct-to">EUROPE</span>
										</div>
										<div class="wla-practices-ct-desc">Transatlantic M&A · Highest Volume</div>
									</td>
									<td class="wla-practices-ct-desc-text">Transatlantic remains the highest-volume cross-border corridor globally. M&A, PE portfolio transactions, and employment restructuring dominate.</td>
									<td>
										<div class="wla-practices-ct-tags">
											<span class="wla-practices-ct-tag">M&A</span>
											<span class="wla-practices-ct-tag">PE</span>
											<span class="wla-practices-ct-tag">EMPLOYMENT</span>
										</div>
									</td>
									<td><div class="wla-practices-ct-growth">+18%</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CO-PRACTICE FEATURE                                  -->
			<!-- ============================================================ -->
			<section class="wla-practices-section wla-practices-animate">
				<div class="wla-practices-container">
					<div class="wla-practices-eyebrow">HOW CO-PRACTICE WORKS</div>
					<h2 class="wla-practices-heading">JOINTLY HOLD.<br>TOGETHER DELIVER.</h2>
					
					<div class="wla-practices-feat-grid">
						<div class="wla-practices-feat-img">
							<img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=1000&q=85" alt="Co-practice">
							<div class="wla-practices-feat-img-overlay"></div>
							<div class="wla-practices-feat-img-label">WLA CO-PRACTICE PROTOCOL — SINCE 2018</div>
						</div>
						<div class="wla-practices-feat-right">
							<div class="wla-practices-feat-right-top">
								<div class="wla-practices-feat-right-title">NOT A REFERRAL. A JOINT ENGAGEMENT.</div>
								<p class="wla-practices-feat-right-desc">The WLA Co-Practice Protocol is the operating architecture that enables partner firms across different jurisdictions to jointly serve a single client engagement — with shared accountability, coordinated matter management, and one seamless client experience across every border. Both firms jointly hold the matter from brief to completion. One shared brief. One coordinated team. One quality standard.</p>
								<a href="#" class="wla-practices-btn-ink">UNDERSTAND CO-PRACTICE →</a>
							</div>
							<div class="wla-practices-feat-stats">
								<div class="wla-practices-feat-stat">
									<div class="wla-practices-feat-stat-num">90+</div>
									<div class="wla-practices-feat-stat-label">Jurisdictions Active</div>
								</div>
								<div class="wla-practices-feat-stat">
									<div class="wla-practices-feat-stat-num">48H</div>
									<div class="wla-practices-feat-stat-label">Brief to First Response</div>
								</div>
								<div class="wla-practices-feat-stat">
									<div class="wla-practices-feat-stat-num">1,240+</div>
									<div class="wla-practices-feat-stat-label">Regulatory Signals Tracked</div>
								</div>
								<div class="wla-practices-feat-stat">
									<div class="wla-practices-feat-stat-num">100%</div>
									<div class="wla-practices-feat-stat-label">WLA Qualified Partners</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: TESTIMONIALS                                        -->
			<!-- ============================================================ -->
			<div class="wla-practices-testimonials">
				<div class="wla-practices-testimonial">
					<div class="wla-practices-testimonial-open">"</div>
					<p class="wla-practices-testimonial-quote">WLA gives our firm an Institutional weight that no 60-lawyer practice could ever build alone. We compete and win on a global stage, while remaining exactly who we are.</p>
					<div class="wla-practices-testimonial-name">DAWID SOKOLOWSKI</div>
					<div class="wla-practices-testimonial-firm">Managing Partner · Sokolowski &amp; Partners · Warsaw, Poland</div>
				</div>
				<div class="wla-practices-testimonial">
					<div class="wla-practices-testimonial-open">"</div>
					<p class="wla-practices-testimonial-quote">The Co-Practice framework transformed how we think about international mandates. We are not a local firm that refers work abroad any more. We are a global practice with a local soul.</p>
					<div class="wla-practices-testimonial-name">JOSEP FIGUERAS</div>
					<div class="wla-practices-testimonial-firm">Figueras Legal · Barcelona, Spain</div>
				</div>
				<div class="wla-practices-testimonial">
					<div class="wla-practices-testimonial-open">"</div>
					<p class="wla-practices-testimonial-quote">In the Gulf, Institutional credibility is everything. WLA gives our clients the assurance of a globally recognised framework — and us the tools to serve them at that level.</p>
					<div class="wla-practices-testimonial-name">MUSED S. ALRASHIDI</div>
					<div class="wla-practices-testimonial-firm">Al Jubairi Law Firm · Riyadh, Saudi Arabia</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: JOIN STRIP                                           -->
			<!-- ============================================================ -->
			<div class="wla-practices-join-strip">
				<div class="wla-practices-join-title">BECOME THE WLA PARTNER FIRM IN YOUR JURISDICTION.</div>
				<div class="wla-practices-join-buttons">
					<a href="#" class="wla-practices-btn-white">SUBMIT EXPRESSION OF INTEREST</a>
					<a href="wla-about.html" class="wla-practices-btn-ghost-white">LEARN MORE ABOUT WLA</a>
				</div>
			</div>

		</div>
		<!-- END WLA PRACTICES PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Privacy Policy Page Shortcode
	 *
	 * Displays the WLA Privacy Policy page including:
	 * - Hero section with policy title
	 * - Policy sections (Who We Are, Data We Collect, etc.)
	 *
	 * Shortcode: [wla_privacy_page]
	 *
	 * @return string
	 */
	public function wla_privacy_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA PRIVACY PAGE WRAPPER -->
		<div class="wla-privacy-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: PRIVACY CONTENT                                     -->
			<!-- ============================================================ -->
			<div class="wla-privacy-content">
				<div class="wla-privacy-container">
					
					<!-- Header -->
					<div class="wla-privacy-eyebrow">LEGAL · PRIVACY</div>
					<h1 class="wla-privacy-title">PRIVACY POLICY</h1>
					<p class="wla-privacy-date">Last updated: January 2026</p>
					
					<!-- Section 1: Who We Are -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">1. WHO WE ARE</h2>
						<p class="wla-privacy-section-text">
							World Law Alliance ("WLA", "we", "us") is an institutional legal co-practice framework headquartered at W-122, Second Floor, Greater Kailash-2, New Delhi, India 110048. WLA operates worldlawalliance.com and the services described on it. This privacy policy explains how WLA collects, uses, and protects personal data submitted through this website.
						</p>
					</div>
					
					<!-- Section 2: Data We Collect -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">2. DATA WE COLLECT</h2>
						<p class="wla-privacy-section-text">
							WLA collects personal data only when you submit it voluntarily — through the Brief WLA form, the Find a Specialist form, the Partner Firm Application form, or by contacting us directly. The data collected may include: name, email address, organisation, jurisdiction, and the content of your enquiry. WLA does not use tracking cookies, advertising cookies, or third-party analytics. WLA does not sell, share, or transfer personal data to third parties for marketing purposes.
						</p>
					</div>
					
					<!-- Section 3: How We Use Your Data -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">3. HOW WE USE YOUR DATA</h2>
						<p class="wla-privacy-section-text">
							Personal data submitted through this website is used solely to: respond to your enquiry or brief; identify the appropriate WLA specialist for your matter; and maintain a record of correspondence. WLA does not use submitted data for marketing, profiling, or automated decision-making.
						</p>
					</div>
					
					<!-- Section 4: Data Sharing -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">4. DATA SHARING WITH WLA PARTNER FIRMS</h2>
						<p class="wla-privacy-section-text">
							When WLA identifies the appropriate specialist for your matter, the relevant details of your enquiry are shared with the relevant WLA partner firm or firms. WLA partner firms are independent law firms bound by their own professional obligations of confidentiality. WLA does not share personal data with any party other than the relevant WLA specialist(s) required to respond to your matter.
						</p>
					</div>
					
					<!-- Section 5: Data Retention -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">5. DATA RETENTION</h2>
						<p class="wla-privacy-section-text">
							WLA retains personal data submitted through this website for a period of 24 months from the date of submission, after which it is deleted unless you have entered into an ongoing relationship with WLA or a WLA partner firm.
						</p>
					</div>
					
					<!-- Section 6: Your Rights -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">6. YOUR RIGHTS</h2>
						<p class="wla-privacy-section-text">
							You have the right to request access to the personal data WLA holds about you, to request correction or deletion of that data, and to object to its processing. To exercise any of these rights, contact: contact@worldlawalliance.com. WLA will respond within 30 days.
						</p>
					</div>
					
					<!-- Section 7: Contact -->
					<div class="wla-privacy-section-block">
						<h2 class="wla-privacy-section-title">7. CONTACT</h2>
						<p class="wla-privacy-section-text">
							contact@worldlawalliance.com · +91 9818030146 · W-122, Second Floor, Greater Kailash-2, New Delhi, India 110048.
						</p>
					</div>
					
				</div>
			</div>

		</div>
		<!-- END WLA PRIVACY PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Africa & Middle East Regional Hub Page Shortcode
	 *
	 * Displays the WLA Africa & Middle East Regional Hub page including:
	 * - Hero section with regional stats
	 * - All jurisdictions list
	 * - Active corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_africa_me_page]
	 *
	 * @return string
	 */
	public function wla_africa_me_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA AFRICA & MIDDLE EAST PAGE WRAPPER -->
		<div class="wla-africa-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-africa-hero">
				<img src="https://images.unsplash.com/photo-1489493887464-892be6d1daae?w=1920&q=85" alt="WLA AFRICA & MIDDLE EAST" class="wla-africa-hero-bg">
				<div class="wla-africa-hero-overlay"></div>
				<div class="wla-africa-hero-content">
					<div class="wla-africa-hero-eyebrow">WLA REGIONAL HUB</div>
					<h1 class="wla-africa-hero-title">WLA AFRICA &amp; MIDDLE EAST</h1>
					<h2 class="wla-africa-hero-subtitle">16 JURISDICTIONS · GCC · CRITICAL MINERALS · COMMON LAW AFRICA</h2>
					<p class="wla-africa-hero-description">
						WLA Africa and Middle East spans 16 jurisdictions across the GCC states and Sub-Saharan and North Africa — connecting Gulf sovereign capital, African critical mineral resources, and the common law East African corridor under one Institutional co-practice framework.
					</p>
					<div class="wla-africa-hero-buttons">
						<a href="wla-specialist.html" class="wla-africa-btn-white">FIND A SPECIALIST IN THIS REGION — 48H</a>
						<a href="wla-directory.html" class="wla-africa-btn-ghost-white">VIEW PARTNER DIRECTORY</a>
					</div>
					<div class="wla-africa-hero-stats">
						<div class="wla-africa-hero-stat">
							<div class="wla-africa-hero-stat-number">16</div>
							<div class="wla-africa-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-africa-hero-stat">
							<div class="wla-africa-hero-stat-number">GCC</div>
							<div class="wla-africa-hero-stat-label">6 Gulf States Active</div>
						</div>
						<div class="wla-africa-hero-stat">
							<div class="wla-africa-hero-stat-number">UK→Africa</div>
							<div class="wla-africa-hero-stat-label">Critical Minerals</div>
						</div>
						<div class="wla-africa-hero-stat">
							<div class="wla-africa-hero-stat-number">48H</div>
							<div class="wla-africa-hero-stat-label">Specialist Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ALL JURISDICTIONS                                   -->
			<!-- ============================================================ -->
			<div class="wla-africa-jurisdictions">
				<div class="wla-africa-jurisdictions-inner wla-africa-animate">
					<div class="wla-africa-eyebrow-dark">ALL JURISDICTIONS — WLA AFRICA &amp; MIDDLE EAST</div>
					<h2 class="wla-africa-heading-dark">EVERY JURISDICTION<br>IN THIS REGION.</h2>
					
					<div class="wla-africa-jurisdiction-tags">
						<span class="wla-africa-jurisdiction-tag">UAE</span>
						<span class="wla-africa-jurisdiction-tag">Saudi Arabia</span>
						<span class="wla-africa-jurisdiction-tag">Qatar</span>
						<span class="wla-africa-jurisdiction-tag">Kuwait</span>
						<span class="wla-africa-jurisdiction-tag">Oman</span>
						<span class="wla-africa-jurisdiction-tag">Bahrain</span>
						<span class="wla-africa-jurisdiction-tag">Kenya</span>
						<span class="wla-africa-jurisdiction-tag">Nigeria</span>
						<span class="wla-africa-jurisdiction-tag">South Africa</span>
						<span class="wla-africa-jurisdiction-tag">Ghana</span>
						<span class="wla-africa-jurisdiction-tag">Zambia</span>
						<span class="wla-africa-jurisdiction-tag">Tanzania</span>
						<span class="wla-africa-jurisdiction-tag">Morocco</span>
						<span class="wla-africa-jurisdiction-tag">Egypt</span>
						<span class="wla-africa-jurisdiction-tag">Ethiopia</span>
						<span class="wla-africa-jurisdiction-tag">Mauritius</span>
					</div>
					
					<div class="wla-africa-jurisdiction-cards">
						<a href="wla-jurisdiction-uae.html" class="wla-africa-jurisdiction-card">
							<div class="wla-africa-jurisdiction-card-name">UAE</div>
							<div class="wla-africa-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-zambia.html" class="wla-africa-jurisdiction-card">
							<div class="wla-africa-jurisdiction-card-name">Zambia</div>
							<div class="wla-africa-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: ACTIVE CORRIDORS                                    -->
			<!-- ============================================================ -->
			<div class="wla-africa-corridors">
				<div class="wla-africa-corridors-inner wla-africa-animate">
					<div class="wla-africa-eyebrow">ACTIVE CORRIDORS — WLA AFRICA &amp; MIDDLE EAST</div>
					<h2 class="wla-africa-heading">CORRIDORS ACTIVE<br>IN THIS REGION.</h2>
					
					<div class="wla-africa-corridor-cards">
						<a href="wla-corridor-gulf-cee.html" class="wla-africa-corridor-card">
							<div class="wla-africa-corridor-card-title">Gulf → CEE +38%</div>
							<div class="wla-africa-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-africa-corridor-card">
							<div class="wla-africa-corridor-card-title">GCC → SE Asia +31%</div>
							<div class="wla-africa-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-africa-corridor-card">
							<div class="wla-africa-corridor-card-title">UK → Africa +22%</div>
							<div class="wla-africa-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-africa-cta-band">
				<div class="wla-africa-cta-title">FIND THE RIGHT SPECIALIST IN WLA AFRICA &amp; MIDDLE EAST IN 48 HOURS.</div>
				<div class="wla-africa-cta-buttons">
					<a href="wla-specialist.html" class="wla-africa-btn-white">FIND A SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-africa-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA AFRICA & MIDDLE EAST PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Americas Regional Hub Page Shortcode
	 *
	 * Displays the WLA Americas Regional Hub page including:
	 * - Hero section with regional stats
	 * - All jurisdictions list
	 * - Active corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_americas_page]
	 *
	 * @return string
	 */
	public function wla_americas_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA AMERICAS PAGE WRAPPER -->
		<div class="wla-americas-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-americas-hero">
				<img src="https://images.unsplash.com/photo-1534430480872-3498386e7856?w=1920&q=85" alt="WLA AMERICAS" class="wla-americas-hero-bg">
				<div class="wla-americas-hero-overlay"></div>
				<div class="wla-americas-hero-content">
					<div class="wla-americas-hero-eyebrow">WLA REGIONAL HUB</div>
					<h1 class="wla-americas-hero-title">WLA AMERICAS</h1>
					<h2 class="wla-americas-hero-subtitle">18 JURISDICTIONS · US · BRAZIL · LATIN AMERICA</h2>
					<p class="wla-americas-hero-description">
						WLA Americas connects independent law firms across 18 jurisdictions in North, Central, and South America — from the United States and Canada through Brazil, Mexico, Colombia, and the wider LatAm market. Co-practicing across the two most active trans-Pacific and transatlantic corridors.
					</p>
					<div class="wla-americas-hero-buttons">
						<a href="wla-specialist.html" class="wla-americas-btn-white">FIND A SPECIALIST IN THIS REGION — 48H</a>
						<a href="wla-directory.html" class="wla-americas-btn-ghost-white">VIEW PARTNER DIRECTORY</a>
					</div>
					<div class="wla-americas-hero-stats">
						<div class="wla-americas-hero-stat">
							<div class="wla-americas-hero-stat-number">18</div>
							<div class="wla-americas-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-americas-hero-stat">
							<div class="wla-americas-hero-stat-number">US+Canada</div>
							<div class="wla-americas-hero-stat-label">North America</div>
						</div>
						<div class="wla-americas-hero-stat">
							<div class="wla-americas-hero-stat-number">Brazil</div>
							<div class="wla-americas-hero-stat-label">LatAm Hub</div>
						</div>
						<div class="wla-americas-hero-stat">
							<div class="wla-americas-hero-stat-number">48H</div>
							<div class="wla-americas-hero-stat-label">Specialist Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ALL JURISDICTIONS                                   -->
			<!-- ============================================================ -->
			<div class="wla-americas-jurisdictions">
				<div class="wla-americas-jurisdictions-inner wla-americas-animate">
					<div class="wla-americas-eyebrow-dark">ALL JURISDICTIONS — WLA AMERICAS</div>
					<h2 class="wla-americas-heading-dark">EVERY JURISDICTION<br>IN THIS REGION.</h2>
					
					<div class="wla-americas-jurisdiction-tags">
						<span class="wla-americas-jurisdiction-tag">United States</span>
						<span class="wla-americas-jurisdiction-tag">Canada</span>
						<span class="wla-americas-jurisdiction-tag">Brazil</span>
						<span class="wla-americas-jurisdiction-tag">Mexico</span>
						<span class="wla-americas-jurisdiction-tag">Colombia</span>
						<span class="wla-americas-jurisdiction-tag">Argentina</span>
						<span class="wla-americas-jurisdiction-tag">Chile</span>
						<span class="wla-americas-jurisdiction-tag">Peru</span>
						<span class="wla-americas-jurisdiction-tag">Ecuador</span>
						<span class="wla-americas-jurisdiction-tag">Uruguay</span>
						<span class="wla-americas-jurisdiction-tag">Costa Rica</span>
						<span class="wla-americas-jurisdiction-tag">Panama</span>
						<span class="wla-americas-jurisdiction-tag">Jamaica</span>
						<span class="wla-americas-jurisdiction-tag">Bahamas</span>
						<span class="wla-americas-jurisdiction-tag">Trinidad</span>
						<span class="wla-americas-jurisdiction-tag">Honduras</span>
						<span class="wla-americas-jurisdiction-tag">Guatemala</span>
						<span class="wla-americas-jurisdiction-tag">Bolivia</span>
					</div>
					
					<div class="wla-americas-jurisdiction-cards">
						<a href="wla-jurisdiction-bahamas.html" class="wla-americas-jurisdiction-card">
							<div class="wla-americas-jurisdiction-card-name">Bahamas</div>
							<div class="wla-americas-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: ACTIVE CORRIDORS                                    -->
			<!-- ============================================================ -->
			<div class="wla-americas-corridors">
				<div class="wla-americas-corridors-inner wla-americas-animate">
					<div class="wla-americas-eyebrow">ACTIVE CORRIDORS — WLA AMERICAS</div>
					<h2 class="wla-americas-heading">CORRIDORS ACTIVE<br>IN THIS REGION.</h2>
					
					<div class="wla-americas-corridor-cards">
						<a href="wla-corridor-us-europe.html" class="wla-americas-corridor-card">
							<div class="wla-americas-corridor-card-title">US ↔ Europe +18%</div>
							<div class="wla-americas-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-americas-corridor-card">
							<div class="wla-americas-corridor-card-title">APAC ↔ Americas +19%</div>
							<div class="wla-americas-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-americas-cta-band">
				<div class="wla-americas-cta-title">FIND THE RIGHT SPECIALIST IN WLA AMERICAS IN 48 HOURS.</div>
				<div class="wla-americas-cta-buttons">
					<a href="wla-specialist.html" class="wla-americas-btn-white">FIND A SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-americas-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA AMERICAS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Asia Pacific Regional Hub Page Shortcode
	 *
	 * Displays the WLA Asia Pacific Regional Hub page including:
	 * - Hero section with regional stats
	 * - All jurisdictions list
	 * - Active corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_asia_pacific_page]
	 *
	 * @return string
	 */
	public function wla_asia_pacific_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA ASIA PACIFIC PAGE WRAPPER -->
		<div class="wla-asia-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-asia-hero">
				<img src="https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=1920&q=85" alt="WLA ASIA PACIFIC" class="wla-asia-hero-bg">
				<div class="wla-asia-hero-overlay"></div>
				<div class="wla-asia-hero-content">
					<div class="wla-asia-hero-eyebrow">WLA REGIONAL HUB</div>
					<h1 class="wla-asia-hero-title">WLA ASIA PACIFIC</h1>
					<h2 class="wla-asia-hero-subtitle">22 JURISDICTIONS · CHINA GATEWAY · ASEAN · COMMON LAW HUBS</h2>
					<p class="wla-asia-hero-description">
						WLA Asia Pacific connects the most capable independent legal practices across Greater China, India, South East Asia, Japan, South Korea, and Australasia — coordinated through WLA's Institutional framework, serving the world's most dynamic cross-border legal markets.
					</p>
					<div class="wla-asia-hero-buttons">
						<a href="wla-specialist.html" class="wla-asia-btn-white">FIND A SPECIALIST IN THIS REGION — 48H</a>
						<a href="wla-directory.html" class="wla-asia-btn-ghost-white">VIEW PARTNER DIRECTORY</a>
					</div>
					<div class="wla-asia-hero-stats">
						<div class="wla-asia-hero-stat">
							<div class="wla-asia-hero-stat-number">22</div>
							<div class="wla-asia-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-asia-hero-stat">
							<div class="wla-asia-hero-stat-number">India</div>
							<div class="wla-asia-hero-stat-label">Central Command</div>
						</div>
						<div class="wla-asia-hero-stat">
							<div class="wla-asia-hero-stat-number">SIAC</div>
							<div class="wla-asia-hero-stat-label">HKIAC Active</div>
						</div>
						<div class="wla-asia-hero-stat">
							<div class="wla-asia-hero-stat-number">48H</div>
							<div class="wla-asia-hero-stat-label">Specialist Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ALL JURISDICTIONS                                   -->
			<!-- ============================================================ -->
			<div class="wla-asia-jurisdictions">
				<div class="wla-asia-jurisdictions-inner wla-asia-animate">
					<div class="wla-asia-eyebrow-dark">ALL JURISDICTIONS — WLA ASIA PACIFIC</div>
					<h2 class="wla-asia-heading-dark">EVERY JURISDICTION<br>IN THIS REGION.</h2>
					
					<div class="wla-asia-jurisdiction-tags">
						<span class="wla-asia-jurisdiction-tag">India</span>
						<span class="wla-asia-jurisdiction-tag">Singapore</span>
						<span class="wla-asia-jurisdiction-tag">Hong Kong</span>
						<span class="wla-asia-jurisdiction-tag">Japan</span>
						<span class="wla-asia-jurisdiction-tag">Australia</span>
						<span class="wla-asia-jurisdiction-tag">South Korea</span>
						<span class="wla-asia-jurisdiction-tag">Malaysia</span>
						<span class="wla-asia-jurisdiction-tag">Vietnam</span>
						<span class="wla-asia-jurisdiction-tag">Indonesia</span>
						<span class="wla-asia-jurisdiction-tag">Thailand</span>
						<span class="wla-asia-jurisdiction-tag">Philippines</span>
						<span class="wla-asia-jurisdiction-tag">New Zealand</span>
						<span class="wla-asia-jurisdiction-tag">Bangladesh</span>
						<span class="wla-asia-jurisdiction-tag">Sri Lanka</span>
						<span class="wla-asia-jurisdiction-tag">Myanmar</span>
						<span class="wla-asia-jurisdiction-tag">Cambodia</span>
						<span class="wla-asia-jurisdiction-tag">Taiwan</span>
						<span class="wla-asia-jurisdiction-tag">Pakistan</span>
						<span class="wla-asia-jurisdiction-tag">Nepal</span>
						<span class="wla-asia-jurisdiction-tag">Bahrain</span>
						<span class="wla-asia-jurisdiction-tag">Brunei</span>
						<span class="wla-asia-jurisdiction-tag">Macao</span>
					</div>
					
					<div class="wla-asia-jurisdiction-cards">
						<a href="wla-jurisdiction-india.html" class="wla-asia-jurisdiction-card">
							<div class="wla-asia-jurisdiction-card-name">India</div>
							<div class="wla-asia-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-singapore.html" class="wla-asia-jurisdiction-card">
							<div class="wla-asia-jurisdiction-card-name">Singapore</div>
							<div class="wla-asia-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-hongkong.html" class="wla-asia-jurisdiction-card">
							<div class="wla-asia-jurisdiction-card-name">Hong Kong</div>
							<div class="wla-asia-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: ACTIVE CORRIDORS                                    -->
			<!-- ============================================================ -->
			<div class="wla-asia-corridors">
				<div class="wla-asia-corridors-inner wla-asia-animate">
					<div class="wla-asia-eyebrow">ACTIVE CORRIDORS — WLA ASIA PACIFIC</div>
					<h2 class="wla-asia-heading">CORRIDORS ACTIVE<br>IN THIS REGION.</h2>
					
					<div class="wla-asia-corridor-cards">
						<a href="wla-corridor-gcc-seasia.html" class="wla-asia-corridor-card">
							<div class="wla-asia-corridor-card-title">GCC → SE Asia +31%</div>
							<div class="wla-asia-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-asia-corridor-card">
							<div class="wla-asia-corridor-card-title">EU → India +34%</div>
							<div class="wla-asia-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-asia-corridor-card">
							<div class="wla-asia-corridor-card-title">APAC ↔ Americas +19%</div>
							<div class="wla-asia-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-asia-cta-band">
				<div class="wla-asia-cta-title">FIND THE RIGHT SPECIALIST IN WLA ASIA PACIFIC IN 48 HOURS.</div>
				<div class="wla-asia-cta-buttons">
					<a href="wla-specialist.html" class="wla-asia-btn-white">FIND A SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-asia-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA ASIA PACIFIC PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Asia Pacific Regional Page Shortcode
	 *
	 * Displays the WLA Asia Pacific Regional page including:
	 * - Hero section with regional stats
	 * - Region overview with image
	 * - All jurisdictions list
	 * - CTA band
	 *
	 * Shortcode: [wla_asia_pacific_region_page]
	 *
	 * @return string
	 */
	public function wla_asia_pacific_region_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA ASIA PACIFIC REGION PAGE WRAPPER -->
		<div class="wla-asia-region-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-asia-region-hero">
				<img class="wla-asia-region-hero-img" src="https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=1920&q=85" alt="WLA ASIA PACIFIC">
				<div class="wla-asia-region-hero-grad"></div>
				<div class="wla-asia-region-hero-content">
					<div class="wla-asia-region-hero-eyebrow">WLA REGION · ASIA PACIFIC · 22 JURISDICTIONS</div>
					<h1 class="wla-asia-region-hero-title">WLA ASIA PACIFIC</h1>
					<h2 class="wla-asia-region-hero-subtitle">22 JURISDICTIONS · INDIA · SINGAPORE · HONG KONG · JAPAN · AUSTRALIA</h2>
					<p class="wla-asia-region-hero-description">
						WLA Asia Pacific spans 22 jurisdictions across Greater China, South and Southeast Asia, Japan, Korea, and Australasia — co-ordinated through WLA's Institutional framework with New Delhi as Central Command and Singapore as the APAC regional hub.
					</p>
					<div class="wla-asia-region-hero-buttons">
						<a href="wla-specialist.html" class="wla-asia-region-btn-white">FIND A SPECIALIST IN THIS REGION — 48H</a>
						<a href="wla-directory.html" class="wla-asia-region-btn-ghost-white">VIEW ALL PARTNER FIRMS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: REGION OVERVIEW                                      -->
			<!-- ============================================================ -->
			<section class="wla-asia-region-section wla-asia-region-animate">
				<div class="wla-asia-region-container">
					<div class="wla-asia-region-layout">
						<div class="wla-asia-region-text">
							<div class="wla-asia-region-eyebrow">WLA ASIA — THE REGION</div>
							<h2 class="wla-asia-region-title">22 JURISDICTIONS · INDIA · SINGAPORE · HONG KONG · JAPAN · AUSTRALIA</h2>
							<p class="wla-asia-region-body">
								WLA Asia Pacific spans 22 jurisdictions across Greater China, South and Southeast Asia, Japan, Korea, and Australasia — co-ordinated through WLA's Institutional framework with New Delhi as Central Command and Singapore as the APAC regional hub.
							</p>
							<p class="wla-asia-region-body">
								Asia Pacific is the world's most dynamic cross-border legal market. The EU→India corridor (+34%), the GCC→SE Asia corridor (+31%), and the APAC↔Americas corridor (+19%) all flow through WLA Asia Pacific — co-practiced on both sides simultaneously.
							</p>
							<div class="wla-asia-region-buttons">
								<a href="wla-specialist.html" class="wla-asia-region-btn-ink">FIND A SPECIALIST — 48H</a>
								<a href="wla-directory.html" class="wla-asia-region-btn-bdr">VIEW ALL PARTNER FIRMS</a>
							</div>
						</div>
						<div class="wla-asia-region-image">
							<img src="https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=1920&q=85" alt="WLA ASIA PACIFIC">
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: JURISDICTIONS                                        -->
			<!-- ============================================================ -->
			<div class="wla-asia-region-jurisdictions">
				<div class="wla-asia-region-jurisdictions-inner wla-asia-region-animate">
					<div class="wla-asia-region-jurisdictions-eyebrow">WLA ACTIVE JURISDICTIONS</div>
					<h2 class="wla-asia-region-heading-dark">WLA QUALIFIED PARTNER FIRMS<br>ACROSS THE REGION.</h2>
					<p class="wla-asia-region-jurisdictions-desc">
						One exclusive WLA Qualified partner firm per practice per jurisdiction. Click any jurisdiction to explore the WLA practice in detail.
					</p>
					
					<div class="wla-asia-region-jurisdictions-grid">
						<a href="wla-jurisdiction-india.html" class="wla-asia-region-jurisdiction-item">→ India</a>
						<a href="wla-jurisdiction-singapore.html" class="wla-asia-region-jurisdiction-item">→ Singapore</a>
						<a href="wla-jurisdiction-hongkong.html" class="wla-asia-region-jurisdiction-item">→ Hong Kong</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Japan</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Australia</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ South Korea</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Malaysia</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Vietnam</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Indonesia</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Thailand</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ Philippines</a>
						<a href="#" class="wla-asia-region-jurisdiction-item">→ New Zealand</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-asia-region-cta-band">
				<div class="wla-asia-region-cta-title">BRIEF WLA ON YOUR MATTER IN THIS REGION. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-asia-region-cta-buttons">
					<a href="wla-specialist.html" class="wla-asia-region-btn-white">FIND A SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-asia-region-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA ASIA PACIFIC REGION PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Europe Regional Hub Page Shortcode
	 *
	 * Displays the WLA Europe Regional Hub page including:
	 * - Hero section with regional stats
	 * - All jurisdictions list
	 * - Active corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_europe_page]
	 *
	 * @return string
	 */
	public function wla_europe_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA EUROPE PAGE WRAPPER -->
		<div class="wla-europe-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-europe-hero">
				<img src="https://images.unsplash.com/photo-1467269204594-9661b134dd2b?w=1920&q=85" alt="WLA EUROPE" class="wla-europe-hero-bg">
				<div class="wla-europe-hero-overlay"></div>
				<div class="wla-europe-hero-content">
					<div class="wla-europe-hero-eyebrow">WLA REGIONAL HUB</div>
					<h1 class="wla-europe-hero-title">WLA EUROPE</h1>
					<h2 class="wla-europe-hero-subtitle">28 JURISDICTIONS · COMMON LAW + CIVIL LAW · EU REGULATION</h2>
					<p class="wla-europe-hero-description">
						WLA Europe connects 28 of the continent's finest independent law firms across every major European legal system — English common law, French and German civil law, Scandinavian law, and the full spectrum of EU member state jurisdictions. All co-practicing under one shared Institutional framework.
					</p>
					<div class="wla-europe-hero-buttons">
						<a href="wla-specialist.html" class="wla-europe-btn-white">FIND A SPECIALIST IN THIS REGION — 48H</a>
						<a href="wla-directory.html" class="wla-europe-btn-ghost-white">VIEW PARTNER DIRECTORY</a>
					</div>
					<div class="wla-europe-hero-stats">
						<div class="wla-europe-hero-stat">
							<div class="wla-europe-hero-stat-number">28</div>
							<div class="wla-europe-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-europe-hero-stat">
							<div class="wla-europe-hero-stat-number">EU</div>
							<div class="wla-europe-hero-stat-label">Single Market Coverage</div>
						</div>
						<div class="wla-europe-hero-stat">
							<div class="wla-europe-hero-stat-number">6</div>
							<div class="wla-europe-hero-stat-label">Active Corridors</div>
						</div>
						<div class="wla-europe-hero-stat">
							<div class="wla-europe-hero-stat-number">48H</div>
							<div class="wla-europe-hero-stat-label">Specialist Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ALL JURISDICTIONS                                   -->
			<!-- ============================================================ -->
			<div class="wla-europe-jurisdictions">
				<div class="wla-europe-jurisdictions-inner wla-europe-animate">
					<div class="wla-europe-eyebrow-dark">ALL JURISDICTIONS — WLA EUROPE</div>
					<h2 class="wla-europe-heading-dark">EVERY JURISDICTION<br>IN THIS REGION.</h2>
					
					<div class="wla-europe-jurisdiction-tags">
						<span class="wla-europe-jurisdiction-tag">United Kingdom</span>
						<span class="wla-europe-jurisdiction-tag">Germany</span>
						<span class="wla-europe-jurisdiction-tag">France</span>
						<span class="wla-europe-jurisdiction-tag">Netherlands</span>
						<span class="wla-europe-jurisdiction-tag">Poland</span>
						<span class="wla-europe-jurisdiction-tag">Spain</span>
						<span class="wla-europe-jurisdiction-tag">Portugal</span>
						<span class="wla-europe-jurisdiction-tag">Italy</span>
						<span class="wla-europe-jurisdiction-tag">Sweden</span>
						<span class="wla-europe-jurisdiction-tag">Belgium</span>
						<span class="wla-europe-jurisdiction-tag">Austria</span>
						<span class="wla-europe-jurisdiction-tag">Switzerland</span>
						<span class="wla-europe-jurisdiction-tag">Czech Republic</span>
						<span class="wla-europe-jurisdiction-tag">Romania</span>
						<span class="wla-europe-jurisdiction-tag">Hungary</span>
						<span class="wla-europe-jurisdiction-tag">Greece</span>
						<span class="wla-europe-jurisdiction-tag">Denmark</span>
						<span class="wla-europe-jurisdiction-tag">Finland</span>
						<span class="wla-europe-jurisdiction-tag">Norway</span>
						<span class="wla-europe-jurisdiction-tag">Ireland</span>
						<span class="wla-europe-jurisdiction-tag">Luxembourg</span>
						<span class="wla-europe-jurisdiction-tag">Slovakia</span>
						<span class="wla-europe-jurisdiction-tag">Croatia</span>
						<span class="wla-europe-jurisdiction-tag">Estonia</span>
						<span class="wla-europe-jurisdiction-tag">Latvia</span>
						<span class="wla-europe-jurisdiction-tag">Lithuania</span>
						<span class="wla-europe-jurisdiction-tag">Bulgaria</span>
						<span class="wla-europe-jurisdiction-tag">Slovenia</span>
					</div>
					
					<div class="wla-europe-jurisdiction-cards">
						<a href="wla-jurisdiction-uk.html" class="wla-europe-jurisdiction-card">
							<div class="wla-europe-jurisdiction-card-name">United Kingdom</div>
							<div class="wla-europe-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-germany.html" class="wla-europe-jurisdiction-card">
							<div class="wla-europe-jurisdiction-card-name">Germany</div>
							<div class="wla-europe-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-france.html" class="wla-europe-jurisdiction-card">
							<div class="wla-europe-jurisdiction-card-name">France</div>
							<div class="wla-europe-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-netherlands.html" class="wla-europe-jurisdiction-card">
							<div class="wla-europe-jurisdiction-card-name">Netherlands</div>
							<div class="wla-europe-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-poland.html" class="wla-europe-jurisdiction-card">
							<div class="wla-europe-jurisdiction-card-name">Poland</div>
							<div class="wla-europe-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
						<a href="wla-jurisdiction-portugal.html" class="wla-europe-jurisdiction-card">
							<div class="wla-europe-jurisdiction-card-name">Portugal</div>
							<div class="wla-europe-jurisdiction-card-status">WLA ACTIVE →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: ACTIVE CORRIDORS                                    -->
			<!-- ============================================================ -->
			<div class="wla-europe-corridors">
				<div class="wla-europe-corridors-inner wla-europe-animate">
					<div class="wla-europe-eyebrow">ACTIVE CORRIDORS — WLA EUROPE</div>
					<h2 class="wla-europe-heading">CORRIDORS ACTIVE<br>IN THIS REGION.</h2>
					
					<div class="wla-europe-corridor-cards">
						<a href="wla-corridor-gulf-cee.html" class="wla-europe-corridor-card">
							<div class="wla-europe-corridor-card-title">Gulf → CEE +38%</div>
							<div class="wla-europe-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-europe-corridor-card">
							<div class="wla-europe-corridor-card-title">EU → India +34%</div>
							<div class="wla-europe-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
						<a href="wla-corridor-us-europe.html" class="wla-europe-corridor-card">
							<div class="wla-europe-corridor-card-title">US ↔ Europe +18%</div>
							<div class="wla-europe-corridor-card-status">WLA BOTH SIDES →</div>
						</a>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-europe-cta-band">
				<div class="wla-europe-cta-title">FIND THE RIGHT SPECIALIST IN WLA EUROPE IN 48 HOURS.</div>
				<div class="wla-europe-cta-buttons">
					<a href="wla-specialist.html" class="wla-europe-btn-white">FIND A SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-europe-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA EUROPE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Charities & Non-Profits Sector Page Shortcode
	 *
	 * Displays the WLA Charities & Non-Profits Sector page including:
	 * - Hero section
	 * - Sector capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_charities_page]
	 *
	 * @return string
	 */
	public function wla_charities_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA CHARITIES PAGE WRAPPER -->
		<div class="wla-charities-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-charities-hero">
				<img class="wla-charities-hero-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=85" alt="">
				<div class="wla-charities-hero-grad"></div>
				<div class="wla-charities-hero-content">
					<div class="wla-charities-hero-eyebrow">SECTOR GROUP · CHARITIES &amp; NON-PROFITS</div>
					<h1 class="wla-charities-hero-title">CHARITIES &amp; NON-PROFITS</h1>
					<h2 class="wla-charities-hero-subtitle">GOVERNANCE · GLOBAL OPERATIONS · COMPLIANCE</h2>
					<p class="wla-charities-hero-description">
						International charities, NGOs, and non-profit organisations operating across multiple jurisdictions face unique legal challenges — regulatory compliance in each operating country, governance frameworks satisfying multiple jurisdictions, and cross-border fund flows under AML and sanctions compliance frameworks.
					</p>
					<div class="wla-charities-hero-buttons">
						<a href="wla-specialist.html" class="wla-charities-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-charities-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-charities-section wla-charities-animate">
				<div class="wla-charities-container">
					<div class="wla-charities-eyebrow">WHAT WLA CO-PRACTICES IN THIS SECTOR</div>
					<h2 class="wla-charities-heading">EVERY LEGAL DIMENSION.<br>EVERY JURISDICTION.</h2>
					
					<div class="wla-charities-grid">
						
						<!-- Capability 01 -->
						<div class="wla-charities-card">
							<div class="wla-charities-card-number">01</div>
							<h3 class="wla-charities-card-title">CHARITY REGISTRATION</h3>
							<p class="wla-charities-card-desc">
								Multi-jurisdiction charity registration — UK Charity Commission, US 501(c)(3), EU equivalents, and registration in operating jurisdictions across Africa, Asia, and the Middle East.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-charities-card">
							<div class="wla-charities-card-number">02</div>
							<h3 class="wla-charities-card-title">GOVERNANCE FRAMEWORKS</h3>
							<p class="wla-charities-card-desc">
								Constitutional documents, trustee governance, conflict of interest frameworks, and the legal architecture for boards overseeing international operations across multiple legal systems.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-charities-card">
							<div class="wla-charities-card-number">03</div>
							<h3 class="wla-charities-card-title">CROSS-BORDER FUND FLOWS</h3>
							<p class="wla-charities-card-desc">
								International funds transfer compliance — AML obligations, sanctions screening, correspondent banking relationships, and the legal documentation required by recipient country regulators.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-charities-card">
							<div class="wla-charities-card-number">04</div>
							<h3 class="wla-charities-card-title">EMPLOYMENT</h3>
							<p class="wla-charities-card-desc">
								Employment of international programme staff across operating countries — local employment law compliance, expatriate arrangements, and volunteer agreement frameworks.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-charities-card">
							<div class="wla-charities-card-number">05</div>
							<h3 class="wla-charities-card-title">PROGRAMME AGREEMENTS</h3>
							<p class="wla-charities-card-desc">
								Programme implementation agreements, partnership agreements with local NGOs, government grant agreements, and memoranda of understanding across all operating jurisdictions.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-charities-card">
							<div class="wla-charities-card-number">06</div>
							<h3 class="wla-charities-card-title">DATA PROTECTION</h3>
							<p class="wla-charities-card-desc">
								GDPR and data protection compliance for charities handling beneficiary and donor data across multiple jurisdictions — including data transfers to programme countries outside the EU.
							</p>
						</div>
						
					</div>
					
					<div class="wla-charities-cta-row">
						<a href="wla-specialist.html" class="wla-charities-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-charities-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-charities-cta-band">
				<div class="wla-charities-cta-title">BRIEF WLA ON YOUR CHARITY OR NGO LEGAL MATTER. 48 HOURS.</div>
				<div class="wla-charities-cta-buttons">
					<a href="wla-specialist.html" class="wla-charities-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-charities-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA CHARITIES PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Family Office Sector Page Shortcode
	 *
	 * Displays the WLA Family Office Sector page including:
	 * - Hero section
	 * - Sector capabilities grid
	 * - Key markets section
	 * - CTA band
	 *
	 * Shortcode: [wla_family_office_page]
	 *
	 * @return string
	 */
	public function wla_family_office_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA FAMILY OFFICE PAGE WRAPPER -->
		<div class="wla-family-office-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-family-office-hero">
				<img class="wla-family-office-hero-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=85" alt="">
				<div class="wla-family-office-hero-grad"></div>
				<div class="wla-family-office-hero-content">
					<div class="wla-family-office-hero-eyebrow">SECTOR GROUP · FAMILY OFFICE</div>
					<h1 class="wla-family-office-hero-title">FAMILY OFFICE</h1>
					<h2 class="wla-family-office-hero-subtitle">GOVERNANCE · SUCCESSION · CROSS-BORDER WEALTH STRUCTURES</h2>
					<p class="wla-family-office-hero-description">
						WLA's Family Office sector group co-practices every dimension of family office legal infrastructure — from establishment and governance through to succession planning and cross-border wealth structuring across common law, civil law, and Islamic law systems.
					</p>
					<div class="wla-family-office-hero-buttons">
						<a href="wla-specialist.html" class="wla-family-office-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-family-office-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-family-office-section wla-family-office-animate">
				<div class="wla-family-office-container">
					<div class="wla-family-office-eyebrow">WHAT WLA CO-PRACTICES IN THIS SECTOR</div>
					<h2 class="wla-family-office-heading">EVERY LEGAL DIMENSION.<br>EVERY JURISDICTION.</h2>
					
					<div class="wla-family-office-grid">
						
						<!-- Capability 01 -->
						<div class="wla-family-office-card">
							<div class="wla-family-office-card-number">01</div>
							<h3 class="wla-family-office-card-title">ESTABLISHMENT &amp; STRUCTURE</h3>
							<p class="wla-family-office-card-desc">
								Family office entity formation across ADGM, DIFC, Singapore, Luxembourg, and Cayman — choosing the right domicile for the family's investment profile, governance preferences, and regulatory obligations.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-family-office-card">
							<div class="wla-family-office-card-number">02</div>
							<h3 class="wla-family-office-card-title">GOVERNANCE FRAMEWORKS</h3>
							<p class="wla-family-office-card-desc">
								Family governance documentation — family constitution, investment policy statements, governance committee charters, and family council structures designed to work across generations.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-family-office-card">
							<div class="wla-family-office-card-number">03</div>
							<h3 class="wla-family-office-card-title">SUCCESSION PLANNING</h3>
							<p class="wla-family-office-card-desc">
								Multi-jurisdiction succession planning — wills, trusts, foundations, and cross-border estate structures that work across common law, civil law, and Islamic inheritance systems simultaneously.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-family-office-card">
							<div class="wla-family-office-card-number">04</div>
							<h3 class="wla-family-office-card-title">INVESTMENT COMPLIANCE</h3>
							<p class="wla-family-office-card-desc">
								Investment entity compliance across all operating jurisdictions — fund licensing, co-investment vehicle structuring, and regulatory reporting in each territory where the family office deploys capital.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-family-office-card">
							<div class="wla-family-office-card-number">05</div>
							<h3 class="wla-family-office-card-title">FAMILY CONSTITUTION</h3>
							<p class="wla-family-office-card-desc">
								Family constitution design and legal documentation — defining family governance principles, next-generation engagement frameworks, and the legal architecture supporting family decision-making.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-family-office-card">
							<div class="wla-family-office-card-number">06</div>
							<h3 class="wla-family-office-card-title">PHILANTHROPY &amp; FOUNDATIONS</h3>
							<p class="wla-family-office-card-desc">
								Philanthropic vehicle structuring — foundations, donor-advised funds, and charitable structures across multiple jurisdictions for internationally active family philanthropy programmes.
							</p>
						</div>
						
					</div>
					
					<div class="wla-family-office-cta-row">
						<a href="wla-specialist.html" class="wla-family-office-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-family-office-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY MARKETS                                          -->
			<!-- ============================================================ -->
			<div class="wla-family-office-markets">
				<section class="wla-family-office-markets-section wla-family-office-animate">
					<div class="wla-family-office-markets-container">
						<div class="wla-family-office-markets-eyebrow">KEY MARKETS</div>
						<h2 class="wla-family-office-markets-heading">WHERE THIS PRACTICE<br>IS MOST ACTIVE.</h2>
						
						<div class="wla-family-office-markets-rows">
							<!-- Market 01 -->
							<div class="wla-family-office-market-row">
								<div class="wla-family-office-market-number">01</div>
								<div class="wla-family-office-market-title">ADGM — ABU DHABI GLOBAL MARKET</div>
								<div class="wla-family-office-market-desc">
									ADGM's family office framework is among the most sophisticated globally — single-family office registration under FSRA, full common law framework, and zero tax on family office activities.
								</div>
							</div>
							
							<!-- Market 02 -->
							<div class="wla-family-office-market-row">
								<div class="wla-family-office-market-number">02</div>
								<div class="wla-family-office-market-title">SINGAPORE — GLOBAL INVESTOR PROGRAMME</div>
								<div class="wla-family-office-market-desc">
									Singapore GIP investor programme and VCC structure for family office investment vehicles. MAS regulatory framework. New UHNWi category for family offices managing SGD 200M+.
								</div>
							</div>
							
							<!-- Market 03 -->
							<div class="wla-family-office-market-row">
								<div class="wla-family-office-market-number">03</div>
								<div class="wla-family-office-market-title">SWITZERLAND — PRIVATE WEALTH HQ</div>
								<div class="wla-family-office-market-desc">
									Switzerland as the premier European family office domicile — banking stability, political neutrality, and sophisticated wealth management infrastructure. WLA Switzerland active.
								</div>
							</div>
							
							<!-- Market 04 -->
							<div class="wla-family-office-market-row">
								<div class="wla-family-office-market-number">04</div>
								<div class="wla-family-office-market-title">LUXEMBOURG — EU FUND VEHICLES</div>
								<div class="wla-family-office-market-desc">
									Luxembourg for EU-regulated family office investment vehicles — RAIF, SICAV, and SIF structures with AIFMD passport across 27 EU member states.
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-family-office-cta-band">
				<div class="wla-family-office-cta-title">SPEAK WITH A FAMILY OFFICE SPECIALIST. CONFIDENTIAL. 48 HOURS.</div>
				<div class="wla-family-office-cta-buttons">
					<a href="wla-specialist.html" class="wla-family-office-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-family-office-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA FAMILY OFFICE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Fashion & Luxury Sector Page Shortcode
	 *
	 * Displays the WLA Fashion & Luxury Sector page including:
	 * - Hero section
	 * - Sector capabilities grid
	 * - Key markets section
	 * - CTA band
	 *
	 * Shortcode: [wla_fashion_page]
	 *
	 * @return string
	 */
	public function wla_fashion_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA FASHION PAGE WRAPPER -->
		<div class="wla-fashion-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-fashion-hero">
				<img class="wla-fashion-hero-img" src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1920&q=85" alt="">
				<div class="wla-fashion-hero-grad"></div>
				<div class="wla-fashion-hero-content">
					<div class="wla-fashion-hero-eyebrow">SECTOR GROUP · FASHION &amp; LUXURY GOODS</div>
					<h1 class="wla-fashion-hero-title">FASHION &amp; LUXURY</h1>
					<h2 class="wla-fashion-hero-subtitle">BRAND PROTECTION · IP · SELECTIVE DISTRIBUTION · PARIS</h2>
					<p class="wla-fashion-hero-description">
						WLA's Fashion &amp; Luxury sector group co-practices trademark protection, anti-counterfeiting enforcement, selective distribution compliance, and luxury brand M&A across every major consumer market simultaneously — anchored in Paris and Milan.
					</p>
					<div class="wla-fashion-hero-buttons">
						<a href="wla-specialist.html" class="wla-fashion-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-fashion-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-fashion-section wla-fashion-animate">
				<div class="wla-fashion-container">
					<div class="wla-fashion-eyebrow">WHAT WLA CO-PRACTICES IN THIS SECTOR</div>
					<h2 class="wla-fashion-heading">EVERY LEGAL DIMENSION.<br>EVERY JURISDICTION.</h2>
					
					<div class="wla-fashion-grid">
						
						<!-- Capability 01 -->
						<div class="wla-fashion-card">
							<div class="wla-fashion-card-number">01</div>
							<h3 class="wla-fashion-card-title">TRADEMARK PROTECTION</h3>
							<p class="wla-fashion-card-desc">
								Multi-jurisdiction trademark registration strategy and enforcement — Madrid Protocol coordination, EUIPO proceedings, and national registrations across all markets where the brand trades or plans to trade.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-fashion-card">
							<div class="wla-fashion-card-number">02</div>
							<h3 class="wla-fashion-card-title">SELECTIVE DISTRIBUTION</h3>
							<p class="wla-fashion-card-desc">
								Selective distribution network design and compliance under EU VBER and national competition law equivalents — authorised retailer agreements, online distribution restrictions, and grey market enforcement.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-fashion-card">
							<div class="wla-fashion-card-number">03</div>
							<h3 class="wla-fashion-card-title">ANTI-COUNTERFEITING</h3>
							<p class="wla-fashion-card-desc">
								Global anti-counterfeiting enforcement — customs enforcement, online marketplace takedowns, physical market enforcement, and criminal prosecution coordination across Asia, Africa, and the Americas.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-fashion-card">
							<div class="wla-fashion-card-number">04</div>
							<h3 class="wla-fashion-card-title">LUXURY BRAND M&amp;A</h3>
							<p class="wla-fashion-card-desc">
								Luxury brand acquisitions, IP asset transfers, licensing portfolio restructuring, and brand valuation for M&A — WLA co-practices the full transaction with IP specialists on both sides of every deal.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-fashion-card">
							<div class="wla-fashion-card-number">05</div>
							<h3 class="wla-fashion-card-title">LICENSING &amp; DISTRIBUTION</h3>
							<p class="wla-fashion-card-desc">
								International licensing and distribution agreements — royalty structures, quality control provisions, geographic exclusivity, and termination mechanics across multiple legal systems.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-fashion-card">
							<div class="wla-fashion-card-number">06</div>
							<h3 class="wla-fashion-card-title">DESIGN PROTECTION</h3>
							<p class="wla-fashion-card-desc">
								Design right registration and enforcement across the EU Community design system, national design registries, and copyright protection for fashion designs across 90+ jurisdictions.
							</p>
						</div>
						
					</div>
					
					<div class="wla-fashion-cta-row">
						<a href="wla-specialist.html" class="wla-fashion-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-fashion-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY MARKETS                                          -->
			<!-- ============================================================ -->
			<div class="wla-fashion-markets">
				<section class="wla-fashion-markets-section wla-fashion-animate">
					<div class="wla-fashion-markets-container">
						<div class="wla-fashion-markets-eyebrow">KEY MARKETS</div>
						<h2 class="wla-fashion-markets-heading">WHERE THIS PRACTICE<br>IS MOST ACTIVE.</h2>
						
						<div class="wla-fashion-markets-rows">
							<!-- Market 01 -->
							<div class="wla-fashion-market-row">
								<div class="wla-fashion-market-number">01</div>
								<div class="wla-fashion-market-title">FRANCE — LUXURY LAW CAPITAL</div>
								<div class="wla-fashion-market-desc">
									France governs the world's most valuable luxury brand portfolios. Paris is the home of the ICC and the world's deepest expertise in luxury brand law. WLA France co-practices every dimension.
								</div>
							</div>
							
							<!-- Market 02 -->
							<div class="wla-fashion-market-row">
								<div class="wla-fashion-market-number">02</div>
								<div class="wla-fashion-market-title">CHINA — ANTI-COUNTERFEITING EPICENTRE</div>
								<div class="wla-fashion-market-desc">
									China is both the world's largest luxury consumer market and the primary source of counterfeit goods. WLA China co-practices trademark enforcement, customs actions, and e-commerce platform takedowns.
								</div>
							</div>
							
							<!-- Market 03 -->
							<div class="wla-fashion-market-row">
								<div class="wla-fashion-market-number">03</div>
								<div class="wla-fashion-market-title">UAE — GULF LUXURY CONSUMPTION</div>
								<div class="wla-fashion-market-desc">
									The UAE's luxury retail market is among the fastest-growing globally. WLA UAE co-practices trademark registration, selective distribution compliance, and brand protection in the Gulf.
								</div>
							</div>
							
							<!-- Market 04 -->
							<div class="wla-fashion-market-row">
								<div class="wla-fashion-market-number">04</div>
								<div class="wla-fashion-market-title">HONG KONG — APAC IP ENFORCEMENT</div>
								<div class="wla-fashion-market-desc">
									Hong Kong remains the primary enforcement jurisdiction for IP rights across APAC. WLA HK co-practices customs enforcement, civil proceedings, and cross-border IP litigation.
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-fashion-cta-band">
				<div class="wla-fashion-cta-title">BRIEF WLA ON YOUR FASHION OR LUXURY LEGAL MATTER. 48 HOURS.</div>
				<div class="wla-fashion-cta-buttons">
					<a href="wla-specialist.html" class="wla-fashion-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-fashion-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA FASHION PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Founders & Entrepreneurs Sector Page Shortcode
	 *
	 * Displays the WLA Founders & Entrepreneurs Sector page including:
	 * - Hero section with founder journey
	 * - Founder legal checklist (interactive)
	 * - Market entry grid
	 * - CTA band
	 *
	 * Shortcode: [wla_founders_page]
	 *
	 * @return string
	 */
	public function wla_founders_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA FOUNDERS PAGE WRAPPER -->
		<div class="wla-founders-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-founders-hero">
				<div class="wla-founders-hero-left">
					<div class="wla-founders-hero-tag">SECTOR GROUP · FOUNDERS &amp; ENTREPRENEURS</div>
					<h1 class="wla-founders-hero-title">FOUNDERS &amp; ENTREPRENEURS</h1>
					<p class="wla-founders-hero-description">
						Legal infrastructure for founders building companies that cross borders. From co-founder agreements to Series A, international expansion to exit — WLA gives founders access to the same Institutional quality legal resource as their institutional investors, in every market they enter.
					</p>
					<div class="wla-founders-hero-buttons">
						<a href="wla-specialist.html" class="wla-founders-btn-ink">FIND A FOUNDER SPECIALIST — 48H</a>
						<a href="#checklist" class="wla-founders-btn-bdr">FOUNDER LEGAL CHECKLIST</a>
					</div>
					<div class="wla-founders-hero-stats">
						<div class="wla-founders-hero-stat">
							<div class="wla-founders-hero-stat-number">90+</div>
							<div class="wla-founders-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-founders-hero-stat">
							<div class="wla-founders-hero-stat-number">48H</div>
							<div class="wla-founders-hero-stat-label">Response</div>
						</div>
						<div class="wla-founders-hero-stat">
							<div class="wla-founders-hero-stat-number">WLA</div>
							<div class="wla-founders-hero-stat-label">Institutional Quality</div>
						</div>
						<div class="wla-founders-hero-stat">
							<div class="wla-founders-hero-stat-number">1</div>
							<div class="wla-founders-hero-stat-label">Point of Contact</div>
						</div>
					</div>
				</div>
				<div class="wla-founders-hero-right">
					<div class="wla-founders-journey-title">THE FOUNDER LEGAL JOURNEY</div>
					<div class="wla-founders-journey-steps">
						<div class="wla-founders-jstep">
							<div class="wla-founders-js-dot">1</div>
							<div class="wla-founders-js-content">
								<div class="wla-founders-js-stage">FORMATION</div>
								<div class="wla-founders-js-title">Co-Founder Agreements &amp; Incorporation</div>
								<div class="wla-founders-js-wla">WLA: Right structure in the right jurisdiction from day one</div>
							</div>
						</div>
						<div class="wla-founders-jstep">
							<div class="wla-founders-js-dot">2</div>
							<div class="wla-founders-js-content">
								<div class="wla-founders-js-stage">IP &amp; PRODUCT</div>
								<div class="wla-founders-js-title">IP Assignment &amp; Protection</div>
								<div class="wla-founders-js-wla">WLA: IP assigned correctly, protected in key markets</div>
							</div>
						</div>
						<div class="wla-founders-jstep">
							<div class="wla-founders-js-dot">3</div>
							<div class="wla-founders-js-content">
								<div class="wla-founders-js-stage">FIRST FUNDING</div>
								<div class="wla-founders-js-title">Seed &amp; Series A Documentation</div>
								<div class="wla-founders-js-wla">WLA: Investment terms reviewed across all investor jurisdictions</div>
							</div>
						</div>
						<div class="wla-founders-jstep">
							<div class="wla-founders-js-dot">4</div>
							<div class="wla-founders-js-content">
								<div class="wla-founders-js-stage">FIRST HIRES</div>
								<div class="wla-founders-js-title">Employment in Multiple Jurisdictions</div>
								<div class="wla-founders-js-wla">WLA: Employment contracts in every market simultaneously</div>
							</div>
						</div>
						<div class="wla-founders-jstep">
							<div class="wla-founders-js-dot">5</div>
							<div class="wla-founders-js-content">
								<div class="wla-founders-js-stage">EXPANSION</div>
								<div class="wla-founders-js-title">Market Entry in New Territories</div>
								<div class="wla-founders-js-wla">WLA: Entity, data, regulatory, IP — one co-practice team</div>
							</div>
						</div>
						<div class="wla-founders-jstep">
							<div class="wla-founders-js-dot">6</div>
							<div class="wla-founders-js-content">
								<div class="wla-founders-js-stage">EXIT</div>
								<div class="wla-founders-js-title">Strategic Sale or IPO Preparation</div>
								<div class="wla-founders-js-wla">WLA: Exit legal across all jurisdictions, one team, one timeline</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: FOUNDER CHECKLIST                                   -->
			<!-- ============================================================ -->
			<div class="wla-founders-checklist-bg">
				<section class="wla-founders-section wla-founders-animate" id="checklist">
					<div class="wla-founders-container">
						<div class="wla-founders-eyebrow">THE FOUNDER LEGAL CHECKLIST</div>
						<h2 class="wla-founders-heading">WHAT FOUNDERS GET WRONG<br>AND HOW WLA FIXES IT.</h2>
						
						<div class="wla-founders-checklist-layout">
							<div>
								<div class="wla-founders-cl-list">
									<div class="wla-founders-cl-header">FOUNDER LEGAL CHECKLIST — COMMON GAPS</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Co-founder agreement with IP assignment, vesting schedule, and departure provisions signed</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">All founder IP assigned to the company — including pre-incorporation work</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Incorporation in the right jurisdiction for your investor and product profile</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">ESOP pool sized, structured, and documented for Series A</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Privacy policy and terms of service compliant in every jurisdiction where you have users</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Employment contracts for all employees — not just offer letters — in every jurisdiction</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Data processing agreements with all processors and sub-processors (GDPR requirement)</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Trademark registered in all jurisdictions where you operate or plan to expand</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Cap table documentation and shareholder register maintained accurately and up to date</div>
									</div>
									<div class="wla-founders-cl-item" onclick="wlaFoundersToggleCheck(this)">
										<div class="wla-founders-cl-check wla-founders-cl-check-todo">✓</div>
										<div class="wla-founders-cl-text">Transfer pricing documentation if you have entities in multiple jurisdictions</div>
									</div>
								</div>
							</div>
							<div class="wla-founders-cl-content">
								<div class="wla-founders-cl-title">WLA GIVES FOUNDERS THE SAME INSTITUTIONAL LEGAL RESOURCE AS THEIR INVESTORS HAVE.</div>
								<p class="wla-founders-cl-body">
									Founders consistently face the same structural problem: their institutional investors — the VCs, the PE funds, the strategics — have access to the best legal resource in every jurisdiction. The founders typically don't. The result is information and negotiation asymmetry at exactly the wrong moment.
								</p>
								<p class="wla-founders-cl-body">
									WLA changes that. The same co-practice framework that WLA delivers to multinational GC teams and private equity funds is available to founders building globally-ambitious companies. One brief. WLA-Qualified specialists in every jurisdiction you operate in. 48-hour response.
								</p>
								<div class="wla-founders-cl-features">
									<div class="wla-founders-clf">Co-founder agreements, IP assignment, and incorporation — structured correctly from day one</div>
									<div class="wla-founders-clf">Investment round documentation reviewed by WLA specialists across all investor jurisdictions</div>
									<div class="wla-founders-clf">Employment in every new market — entered simultaneously with one WLA brief</div>
									<div class="wla-founders-clf">Cross-border data compliance — GDPR, DPDP, PDPA — managed as one programme not separate engagements</div>
									<div class="wla-founders-clf">Exit legal co-practiced across all jurisdictions simultaneously — one WLA team, one timeline</div>
								</div>
								<div class="wla-founders-cl-buttons">
									<a href="wla-specialist.html" class="wla-founders-btn-ink">FIND A FOUNDER SPECIALIST →</a>
									<a href="wla-how-it-works.html" class="wla-founders-btn-bdr">HOW CO-PRACTICE WORKS</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: MARKET ENTRY                                         -->
			<!-- ============================================================ -->
			<div class="wla-founders-market-bg">
				<section class="wla-founders-section wla-founders-section--dark wla-founders-animate">
					<div class="wla-founders-container">
						<div class="wla-founders-eyebrow-dark">BEST FIRST INTERNATIONAL MARKETS FOR FOUNDERS</div>
						<h2 class="wla-founders-heading-dark">WHERE FOUNDERS ARE<br>EXPANDING. WLA IS READY.</h2>
						
						<div class="wla-founders-market-grid">
							<a href="wla-jurisdiction-uae.html" class="wla-founders-market-card">
								<div class="wla-founders-mk-flag">🇦🇪</div>
								<div class="wla-founders-mk-country">UAE</div>
								<div class="wla-founders-mk-why">0% Corp Tax · Talent · Gateway</div>
								<p class="wla-founders-mk-desc">DIFC and mainland free zones. 0% personal tax. Access to Gulf capital. Gateway to 2.5B people across MENA and South Asia.</p>
								<div class="wla-founders-mk-badge">WLA UAE ACTIVE</div>
							</a>
							<a href="wla-jurisdiction-singapore.html" class="wla-founders-market-card">
								<div class="wla-founders-mk-flag">🇸🇬</div>
								<div class="wla-founders-mk-country">SINGAPORE</div>
								<div class="wla-founders-mk-why">ASEAN Hub · English Law · Funding</div>
								<p class="wla-founders-mk-desc">Premier APAC tech hub. English common law. Strong founder ecosystem. Gateway to 700M ASEAN market. MAS regulated fintech sandbox.</p>
								<div class="wla-founders-mk-badge">WLA SG ACTIVE</div>
							</a>
							<a href="wla-jurisdiction-india.html" class="wla-founders-market-card">
								<div class="wla-founders-mk-flag">🇮🇳</div>
								<div class="wla-founders-mk-country">INDIA</div>
								<div class="wla-founders-mk-why">Scale · Market · Deep Tech</div>
								<p class="wla-founders-mk-desc">1.4B population. World's largest developer ecosystem. Fastest-growing startup market. DPDP 2025 compliance required for all digital products.</p>
								<div class="wla-founders-mk-badge">WLA INDIA ACTIVE</div>
							</a>
							<a href="wla-jurisdiction-uk.html" class="wla-founders-market-card">
								<div class="wla-founders-mk-flag">🇬🇧</div>
								<div class="wla-founders-mk-country">UK</div>
								<div class="wla-founders-mk-why">English Law · Tech Talent · Europe Access</div>
								<p class="wla-founders-mk-desc">Global Talent and Innovator Founder visas. English law for contracts. SEIS/EIS investor incentives. Strong B2B SaaS market.</p>
								<div class="wla-founders-mk-badge">WLA UK ACTIVE</div>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-founders-cta-band">
				<div class="wla-founders-cta-title">BRIEF WLA ON YOUR STARTUP OR SCALE-UP LEGAL MATTER. 48 HOURS.</div>
				<div class="wla-founders-cta-buttons">
					<a href="wla-specialist.html" class="wla-founders-btn-white">FIND A FOUNDER SPECIALIST</a>
					<a href="wla-sector-technology.html" class="wla-founders-btn-ghost-white">TECHNOLOGY SECTOR</a>
				</div>
			</div>

		</div>
		<!-- END WLA FOUNDERS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * High Net Worth Sector Page Shortcode
	 *
	 * Displays the WLA High Net Worth & Private Clients Sector page including:
	 * - Hero section with stats
	 * - Services rows
	 * - Residency options grid
	 * - Discretion section
	 * - CTA band
	 *
	 * Shortcode: [wla_hnw_page]
	 *
	 * @return string
	 */
	public function wla_hnw_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA HNW PAGE WRAPPER -->
		<div class="wla-hnw-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-hnw-hero">
				<img class="wla-hnw-hero-img" src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=85" alt="HNW Private Wealth">
				<div class="wla-hnw-hero-grad"></div>
				<div class="wla-hnw-hero-content">
					<div class="wla-hnw-hero-tag">SECTOR GROUP · HIGH NET WORTH &amp; PRIVATE CLIENTS</div>
					<h1 class="wla-hnw-hero-title">HIGH NET WORTH</h1>
					<h2 class="wla-hnw-hero-subtitle">PRIVATE WEALTH · FAMILY OFFICE · RESIDENCY · SUCCESSION</h2>
					<p class="wla-hnw-hero-description">
						Cross-border wealth structuring, family office establishment, investor residence planning, succession, and asset protection — handled with the discretion, depth, and institutional weight that significant private wealth demands.
					</p>
					<div class="wla-hnw-hero-buttons">
						<a href="wla-specialist.html" class="wla-hnw-btn-white">SPEAK WITH A SPECIALIST — CONFIDENTIAL</a>
						<a href="#services" class="wla-hnw-btn-ghost-white">SERVICES</a>
						<a href="#residency" class="wla-hnw-btn-ghost-white">RESIDENCY &amp; CITIZENSHIP</a>
					</div>
					<div class="wla-hnw-hero-stats">
						<div class="wla-hnw-hero-stat">
							<div class="wla-hnw-hero-stat-number">90+</div>
							<div class="wla-hnw-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-hnw-hero-stat">
							<div class="wla-hnw-hero-stat-number">100%</div>
							<div class="wla-hnw-hero-stat-label">Confidential</div>
						</div>
						<div class="wla-hnw-hero-stat">
							<div class="wla-hnw-hero-stat-number">48H</div>
							<div class="wla-hnw-hero-stat-label">Initial Response</div>
						</div>
						<div class="wla-hnw-hero-stat">
							<div class="wla-hnw-hero-stat-number">WLA</div>
							<div class="wla-hnw-hero-stat-label">Institutional Standard</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SERVICES                                             -->
			<!-- ============================================================ -->
			<section class="wla-hnw-section wla-hnw-animate" id="services">
				<div class="wla-hnw-container">
					<div class="wla-hnw-eyebrow">WLA HNW SERVICES</div>
					<h2 class="wla-hnw-heading">EVERY DIMENSION OF<br>INTERNATIONAL PRIVATE WEALTH.</h2>
					
					<div class="wla-hnw-service-rows">
						
						<!-- Service 01 -->
						<div class="wla-hnw-srow">
							<div class="wla-hnw-sr-num">01</div>
							<div class="wla-hnw-sr-title">CROSS-BORDER WEALTH STRUCTURING</div>
							<div class="wla-hnw-sr-desc">
								Multi-jurisdiction holding structures, trust and foundation arrangements, asset protection planning, and wealth restructuring across common law, civil law, and Islamic law systems simultaneously — coordinated by WLA specialists in each territory.
							</div>
						</div>
						
						<!-- Service 02 -->
						<div class="wla-hnw-srow">
							<div class="wla-hnw-sr-num">02</div>
							<div class="wla-hnw-sr-title">FAMILY OFFICE ESTABLISHMENT</div>
							<div class="wla-hnw-sr-desc">
								Family office legal infrastructure across ADGM, DIFC, Singapore, and Luxembourg — the four premier family office jurisdictions. Governance frameworks, investment mandates, family constitution design, and ongoing regulatory compliance.
							</div>
						</div>
						
						<!-- Service 03 -->
						<div class="wla-hnw-srow">
							<div class="wla-hnw-sr-num">03</div>
							<div class="wla-hnw-sr-title">RESIDENCE &amp; CITIZENSHIP PLANNING</div>
							<div class="wla-hnw-sr-desc">
								Investor residence visas, Golden Visa programmes, citizenship by investment, and long-route naturalisation — structured around your investment profile, family situation, travel needs, and long-term residency objectives across 40+ destination jurisdictions.
							</div>
						</div>
						
						<!-- Service 04 -->
						<div class="wla-hnw-srow">
							<div class="wla-hnw-sr-num">04</div>
							<div class="wla-hnw-sr-title">SUCCESSION &amp; ESTATE PLANNING</div>
							<div class="wla-hnw-sr-desc">
								Cross-border succession planning — wills, forced heirship analysis in civil law jurisdictions, estate administration across multiple territories, and tax-efficient inter-generational wealth transfer structures under English, civil law, and Islamic inheritance frameworks.
							</div>
						</div>
						
						<!-- Service 05 -->
						<div class="wla-hnw-srow">
							<div class="wla-hnw-sr-num">05</div>
							<div class="wla-hnw-sr-title">PRIVATE INVESTMENT TRANSACTIONS</div>
							<div class="wla-hnw-sr-desc">
								Private M&A, real estate acquisitions, yacht and aircraft ownership structures, and direct investment transactions — all requiring the same institutional quality of legal advice as institutional PE transactions, delivered by WLA's Transactional practice to private clients.
							</div>
						</div>
						
						<!-- Service 06 -->
						<div class="wla-hnw-srow">
							<div class="wla-hnw-sr-num">06</div>
							<div class="wla-hnw-sr-title">PERSONAL TAX PLANNING</div>
							<div class="wla-hnw-sr-desc">
								Cross-border personal tax planning for internationally mobile HNW individuals — residency change implications, exit taxation, offshore structure compliance, trust taxation, and coordination with WLA's International Tax Group across every relevant jurisdiction.
							</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: RESIDENCY OPTIONS                                   -->
			<!-- ============================================================ -->
			<div class="wla-hnw-residency-bg">
				<section class="wla-hnw-section wla-hnw-animate" id="residency">
					<div class="wla-hnw-container">
						<div class="wla-hnw-eyebrow">INVESTOR RESIDENCE OPTIONS — 2026</div>
						<h2 class="wla-hnw-heading">THE WORLD'S LEADING<br>RESIDENCE PROGRAMMES. LIVE STATUS.</h2>
						
						<div class="wla-hnw-residency-grid">
							
							<!-- UAE -->
							<div class="wla-hnw-residency-card">
								<div class="wla-hnw-rc-flag">🇦🇪</div>
								<div class="wla-hnw-rc-country">UAE</div>
								<div class="wla-hnw-rc-type">Golden Visa · 10-Year</div>
								<div class="wla-hnw-rc-status wla-hnw-rc-status-open">FULLY OPEN</div>
								<div class="wla-hnw-rc-min">AED 2M</div>
								<div class="wla-hnw-rc-min-label">Min. Investment</div>
								<p class="wla-hnw-rc-note">10-year renewable. No minimum stay. Family included. UAE as global mobility hub.</p>
							</div>
							
							<!-- Singapore -->
							<div class="wla-hnw-residency-card">
								<div class="wla-hnw-rc-flag">🇸🇬</div>
								<div class="wla-hnw-rc-country">Singapore</div>
								<div class="wla-hnw-rc-type">Global Investor Programme</div>
								<div class="wla-hnw-rc-status wla-hnw-rc-status-open">FULLY OPEN</div>
								<div class="wla-hnw-rc-min">SGD 2.5M</div>
								<div class="wla-hnw-rc-min-label">Min. Investment</div>
								<p class="wla-hnw-rc-note">Permanent residence pathway. Premier APAC investor route. New UHNWi family office category.</p>
							</div>
							
							<!-- Greece -->
							<div class="wla-hnw-residency-card">
								<div class="wla-hnw-rc-flag">🇬🇷</div>
								<div class="wla-hnw-rc-country">Greece</div>
								<div class="wla-hnw-rc-type">Golden Visa</div>
								<div class="wla-hnw-rc-status wla-hnw-rc-status-open">FULLY OPEN</div>
								<div class="wla-hnw-rc-min">€800K</div>
								<div class="wla-hnw-rc-min-label">Prime Areas</div>
								<p class="wla-hnw-rc-note">EU residence. Schengen access. Fastest EU processing. Lower threshold outside prime areas.</p>
							</div>
							
							<!-- Portugal -->
							<div class="wla-hnw-residency-card">
								<div class="wla-hnw-rc-flag">🇵🇹</div>
								<div class="wla-hnw-rc-country">Portugal</div>
								<div class="wla-hnw-rc-type">ARI — Fund Route</div>
								<div class="wla-hnw-rc-status wla-hnw-rc-status-changed">ROUTE CHANGED</div>
								<div class="wla-hnw-rc-min">€500K</div>
								<div class="wla-hnw-rc-min-label">Fund Investment</div>
								<p class="wla-hnw-rc-note">Property route closed. Fund investment route active. EU residence pathway.</p>
							</div>
							
							<!-- Malta -->
							<div class="wla-hnw-residency-card">
								<div class="wla-hnw-rc-flag">🇲🇹</div>
								<div class="wla-hnw-rc-country">Malta</div>
								<div class="wla-hnw-rc-type">MPRP Permanent Residence</div>
								<div class="wla-hnw-rc-status wla-hnw-rc-status-open">FULLY OPEN</div>
								<div class="wla-hnw-rc-min">€150K</div>
								<div class="wla-hnw-rc-min-label">Government Contribution</div>
								<p class="wla-hnw-rc-note">EU permanent residence. Intensive due diligence. Schengen access.</p>
							</div>
							
							<!-- UK -->
							<div class="wla-hnw-residency-card">
								<div class="wla-hnw-rc-flag">🇬🇧</div>
								<div class="wla-hnw-rc-country">United Kingdom</div>
								<div class="wla-hnw-rc-type">Global Talent / Innovator</div>
								<div class="wla-hnw-rc-status wla-hnw-rc-status-open">FULLY OPEN</div>
								<div class="wla-hnw-rc-min">Endorsement</div>
								<div class="wla-hnw-rc-min-label">Based</div>
								<p class="wla-hnw-rc-note">Global Talent and Innovator Founder routes. No minimum investment. Endorsement-based.</p>
							</div>
							
						</div>
						
						<div class="wla-hnw-residency-cta">
							<a href="wla-page-immigration.html" class="wla-hnw-btn-ink">FULL INVESTOR VISA TRACKER — WIA →</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: DISCRETION                                          -->
			<!-- ============================================================ -->
			<div class="wla-hnw-discretion-bg">
				<div class="wla-hnw-discretion-layout wla-hnw-animate">
					<div class="wla-hnw-discretion-text">
						<div class="wla-hnw-discretion-eyebrow">HOW WLA SERVES PRIVATE CLIENTS</div>
						<h2 class="wla-hnw-discretion-title">INSTITUTIONAL QUALITY. ABSOLUTE DISCRETION.</h2>
						<p class="wla-hnw-discretion-body">
							WLA's HNW practice operates to the same Institutional standard as every WLA co-practice engagement — but with the additional layer of care and discretion that significant private wealth requires. Everything is handled confidentially, on a strict need-to-know basis within the co-practice team.
						</p>
						<p class="wla-hnw-discretion-body">
							Most HNW legal needs cross multiple jurisdictions — a residence planning matter often involves immigration law in the destination, tax law in the origin, estate planning across both, and trust law in a third territory. WLA's co-practice framework means every dimension is covered simultaneously, by the right specialist in each territory, under one confidential engagement.
						</p>
						<ul class="wla-hnw-discretion-points">
							<li>All matters handled with strict confidentiality — no information shared outside the co-practice team</li>
							<li>Single WLA point of contact — no navigating multiple law firm relationships across borders</li>
							<li>All WLA HNW specialists independently WLA-Qualified — four published standards, annually reviewed</li>
							<li>Coordinated across immigration, tax, trust, and estate specialists simultaneously</li>
							<li>Initial consultation entirely confidential — no obligation to proceed</li>
						</ul>
						<a href="wla-specialist.html" class="wla-hnw-btn-white">SPEAK WITH A SPECIALIST — CONFIDENTIAL →</a>
					</div>
					<div class="wla-hnw-discretion-visual">
						<div class="wla-hnw-discretion-item">
							<div class="wla-hnw-di-num">WEALTH STRUCTURING</div>
							<div class="wla-hnw-di-title">Multi-Jurisdiction Holding &amp; Trust Structures</div>
							<p class="wla-hnw-di-desc">Common law trusts, civil law foundations, and Islamic waqf — structures that work in every jurisdiction your wealth spans.</p>
						</div>
						<div class="wla-hnw-discretion-item">
							<div class="wla-hnw-di-num">FAMILY OFFICE</div>
							<div class="wla-hnw-di-title">ADGM · DIFC · Singapore · Luxembourg</div>
							<p class="wla-hnw-di-desc">Family office legal infrastructure in the four premier jurisdictions — governance, investment mandate, and regulatory compliance.</p>
						</div>
						<div class="wla-hnw-discretion-item">
							<div class="wla-hnw-di-num">RESIDENCY</div>
							<div class="wla-hnw-di-title">Investor Residence in 40+ Jurisdictions</div>
							<p class="wla-hnw-di-desc">Golden Visa, GIP, and citizenship programmes structured around your specific situation — family, travel needs, and long-term objectives.</p>
						</div>
						<div class="wla-hnw-discretion-item">
							<div class="wla-hnw-di-num">SUCCESSION</div>
							<div class="wla-hnw-di-title">Cross-Border Estate &amp; Succession Planning</div>
							<p class="wla-hnw-di-desc">Wills, forced heirship analysis, and inter-generational transfer — structured to work across civil law, common law, and Islamic inheritance systems.</p>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-hnw-cta-band">
				<div class="wla-hnw-cta-title">SPEAK WITH A WLA HNW SPECIALIST. CONFIDENTIAL. 48 HOURS.</div>
				<div class="wla-hnw-cta-buttons">
					<a href="wla-specialist.html" class="wla-hnw-btn-white">INITIAL CONSULTATION — CONFIDENTIAL</a>
					<a href="wla-page-immigration.html" class="wla-hnw-btn-ghost-white">RESIDENCY &amp; CITIZENSHIP</a>
				</div>
			</div>

		</div>
		<!-- END WLA HNW PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Institutions & Development Sector Page Shortcode
	 *
	 * Displays the WLA Institutions & Development Sector page including:
	 * - Hero section
	 * - Sector capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_institutions_page]
	 *
	 * @return string
	 */
	public function wla_institutions_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA INSTITUTIONS PAGE WRAPPER -->
		<div class="wla-institutions-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-institutions-hero">
				<img class="wla-institutions-hero-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=85" alt="">
				<div class="wla-institutions-hero-grad"></div>
				<div class="wla-institutions-hero-content">
					<div class="wla-institutions-hero-eyebrow">SECTOR GROUP · INSTITUTIONS &amp; DEVELOPMENT</div>
					<h1 class="wla-institutions-hero-title">INSTITUTIONS &amp; DEVELOPMENT</h1>
					<h2 class="wla-institutions-hero-subtitle">MULTILATERALS · DEVELOPMENT FINANCE · INTERNATIONAL ORGANISATIONS</h2>
					<p class="wla-institutions-hero-description">
						WLA co-practices development finance transactions, procurement law, immunities and privileges, employment for internationally recruited staff, and the complex regulatory landscape of development operations — through the same Institutional framework that serves the world's most sophisticated private sector clients.
					</p>
					<div class="wla-institutions-hero-buttons">
						<a href="wla-specialist.html" class="wla-institutions-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-institutions-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-institutions-section wla-institutions-animate">
				<div class="wla-institutions-container">
					<div class="wla-institutions-eyebrow">WHAT WLA CO-PRACTICES IN THIS SECTOR</div>
					<h2 class="wla-institutions-heading">EVERY LEGAL DIMENSION.<br>EVERY JURISDICTION.</h2>
					
					<div class="wla-institutions-grid">
						
						<!-- Capability 01 -->
						<div class="wla-institutions-card">
							<div class="wla-institutions-card-number">01</div>
							<h3 class="wla-institutions-card-title">DEVELOPMENT FINANCE</h3>
							<p class="wla-institutions-card-desc">
								Development finance transaction legal support — project finance, loan documentation, security structures, environmental compliance, and community resettlement frameworks under DFI safeguarding standards.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-institutions-card">
							<div class="wla-institutions-card-number">02</div>
							<h3 class="wla-institutions-card-title">PROCUREMENT LAW</h3>
							<p class="wla-institutions-card-desc">
								International procurement law compliance — World Bank, African Development Bank, and ADB procurement frameworks co-practiced across all implementing jurisdictions.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-institutions-card">
							<div class="wla-institutions-card-number">03</div>
							<h3 class="wla-institutions-card-title">IMMUNITIES &amp; PRIVILEGES</h3>
							<p class="wla-institutions-card-desc">
								International organisation immunities and privileges — host country agreement negotiation, status-of-forces agreements, and staff immunity management across operating countries.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-institutions-card">
							<div class="wla-institutions-card-number">04</div>
							<h3 class="wla-institutions-card-title">INTERNATIONAL EMPLOYMENT</h3>
							<p class="wla-institutions-card-desc">
								Employment of internationally recruited and locally recruited staff across programme countries — local labour law compliance, expatriate arrangements, and disciplinary procedures.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-institutions-card">
							<div class="wla-institutions-card-number">05</div>
							<h3 class="wla-institutions-card-title">PARTNERSHIPS &amp; PROGRAMMES</h3>
							<p class="wla-institutions-card-desc">
								Implementation partnership agreements, co-financing documentation, trust fund establishment, and the full range of programme legal documentation for multilateral operations.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-institutions-card">
							<div class="wla-institutions-card-number">06</div>
							<h3 class="wla-institutions-card-title">SANCTIONS &amp; COMPLIANCE</h3>
							<p class="wla-institutions-card-desc">
								Sanctions compliance for development organisations — OFAC, EU, and UN sanctions screening, compliance programme design, and legal opinions on sanctions exposure in programme countries.
							</p>
						</div>
						
					</div>
					
					<div class="wla-institutions-cta-row">
						<a href="wla-specialist.html" class="wla-institutions-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-institutions-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-institutions-cta-band">
				<div class="wla-institutions-cta-title">BRIEF WLA ON YOUR INSTITUTION OR DEVELOPMENT LEGAL MATTER. 48 HOURS.</div>
				<div class="wla-institutions-cta-buttons">
					<a href="wla-specialist.html" class="wla-institutions-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-institutions-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA INSTITUTIONS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Private Equity & Funds Sector Page Shortcode
	 *
	 * Displays the WLA Private Equity & Funds Sector page including:
	 * - Hero section with deal flow
	 * - PE lifecycle grid
	 * - Fund structures grid
	 * - Key markets
	 * - CTA band
	 *
	 * Shortcode: [wla_pe_page]
	 *
	 * @return string
	 */
	public function wla_pe_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA PE PAGE WRAPPER -->
		<div class="wla-pe-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-pe-hero">
				<div class="wla-pe-hero-left">
					<div class="wla-pe-hero-tag">SECTOR GROUP · PRIVATE EQUITY &amp; FUNDS</div>
					<div class="wla-pe-hero-eyebrow">WLA SERVES · PRIVATE EQUITY · FUND MANAGERS · PORTFOLIO COMPANIES</div>
					<h1 class="wla-pe-hero-title">PRIVATE EQUITY &amp; FUNDS</h1>
					<p class="wla-pe-hero-description">
						Cross-border PE transactions, fund formation, portfolio company legal infrastructure, and exit structuring — co-practiced by WLA partner firms in every jurisdiction simultaneously. One brief. The full deal clock.
					</p>
					<div class="wla-pe-hero-buttons">
						<a href="wla-specialist.html" class="wla-pe-btn-white">FIND A PE SPECIALIST — 48H</a>
						<a href="#lifecycle" class="wla-pe-btn-ghost-white">FULL DEAL LIFECYCLE</a>
					</div>
					<div class="wla-pe-hero-stats">
						<div class="wla-pe-hero-stat">
							<div class="wla-pe-hero-stat-number">90+</div>
							<div class="wla-pe-hero-stat-label">Jurisdictions Active</div>
						</div>
						<div class="wla-pe-hero-stat">
							<div class="wla-pe-hero-stat-number">48H</div>
							<div class="wla-pe-hero-stat-label">Specialist Confirmed</div>
						</div>
						<div class="wla-pe-hero-stat">
							<div class="wla-pe-hero-stat-number">6</div>
							<div class="wla-pe-hero-stat-label">Active Deal Corridors</div>
						</div>
					</div>
				</div>
				<div class="wla-pe-hero-right">
					<div class="wla-pe-deal-title">ACTIVE PE CO-PRACTICE MANDATES — 2026</div>
					<div class="wla-pe-deal-rows">
						<div class="wla-pe-deal-row">
							<div class="wla-pe-dr-type">ACQUISITION · CROSS-BORDER</div>
							<div class="wla-pe-dr-title">Gulf Sovereign Fund → CEE Manufacturing Group</div>
							<div class="wla-pe-dr-meta">
								<span class="wla-pe-dr-status">IN PROGRESS</span>
								<span class="wla-pe-dr-jurs">UAE · Poland · Germany · Netherlands</span>
							</div>
						</div>
						<div class="wla-pe-deal-row">
							<div class="wla-pe-dr-type">CARVE-OUT · PE</div>
							<div class="wla-pe-dr-title">US PE → European Technology Platform</div>
							<div class="wla-pe-dr-meta">
								<span class="wla-pe-dr-status">DUE DILIGENCE</span>
								<span class="wla-pe-dr-jurs">US · Germany · France · India</span>
							</div>
						</div>
						<div class="wla-pe-deal-row">
							<div class="wla-pe-dr-type">FUND FORMATION</div>
							<div class="wla-pe-dr-title">APAC PE Fund · Singapore VCC Structure</div>
							<div class="wla-pe-dr-meta">
								<span class="wla-pe-dr-status">STRUCTURING</span>
								<span class="wla-pe-dr-jurs">Singapore · Cayman · India · SE Asia</span>
							</div>
						</div>
						<div class="wla-pe-deal-row">
							<div class="wla-pe-dr-type">EXIT · SECONDARY</div>
							<div class="wla-pe-dr-title">CEE Portfolio Company Secondary Sale</div>
							<div class="wla-pe-dr-meta">
								<span class="wla-pe-dr-status">NEAR CLOSE</span>
								<span class="wla-pe-dr-jurs">Poland · UK · Luxembourg</span>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PE LIFECYCLE                                        -->
			<!-- ============================================================ -->
			<section class="wla-pe-section wla-pe-animate" id="lifecycle">
				<div class="wla-pe-container">
					<div class="wla-pe-eyebrow">WLA PE — FULL DEAL LIFECYCLE</div>
					<h2 class="wla-pe-heading">FROM FUND FORMATION TO<br>EXIT. EVERY JURISDICTION.</h2>
					<p class="wla-pe-sub-text">WLA co-practices every stage of the PE deal lifecycle — fund formation, acquisition, portfolio management, and exit — with the right specialist in each jurisdiction at each stage.</p>
					
					<div class="wla-pe-lifecycle-grid">
						<!-- Stage 01 -->
						<div class="wla-pe-lc">
							<div class="wla-pe-lc-number">STAGE 01</div>
							<div class="wla-pe-lc-stage">FUND FORMATION</div>
							<p class="wla-pe-lc-desc">LP/GP structuring, fund domicile selection, MAS/DFSA/CSSF licensing, SMA and co-investment vehicles, and investor side letters across multiple jurisdictions.</p>
							<div class="wla-pe-lc-practices">
								<span class="wla-pe-lc-prac">Cayman</span>
								<span class="wla-pe-lc-prac">Luxembourg</span>
								<span class="wla-pe-lc-prac">Singapore VCC</span>
								<span class="wla-pe-lc-prac">DIFC</span>
							</div>
							<div class="wla-pe-lc-bg">01</div>
						</div>
						
						<!-- Stage 02 -->
						<div class="wla-pe-lc">
							<div class="wla-pe-lc-number">STAGE 02</div>
							<div class="wla-pe-lc-stage">ACQUISITION</div>
							<p class="wla-pe-lc-desc">Buy-side due diligence, SPA negotiation, W&I insurance, FDI screening, merger control, and management incentive plans — all jurisdictions co-practiced simultaneously.</p>
							<div class="wla-pe-lc-practices">
								<span class="wla-pe-lc-prac">SPA</span>
								<span class="wla-pe-lc-prac">W&amp;I</span>
								<span class="wla-pe-lc-prac">FDI</span>
								<span class="wla-pe-lc-prac">MIP</span>
							</div>
							<div class="wla-pe-lc-bg">02</div>
						</div>
						
						<!-- Stage 03 -->
						<div class="wla-pe-lc">
							<div class="wla-pe-lc-number">STAGE 03</div>
							<div class="wla-pe-lc-stage">PORTFOLIO</div>
							<p class="wla-pe-lc-desc">Ongoing portfolio company legal support — employment, compliance, tax planning, add-on acquisitions, and financing — across all operating jurisdictions under one WLA relationship.</p>
							<div class="wla-pe-lc-practices">
								<span class="wla-pe-lc-prac">Employment</span>
								<span class="wla-pe-lc-prac">Tax</span>
								<span class="wla-pe-lc-prac">Add-ons</span>
								<span class="wla-pe-lc-prac">Debt</span>
							</div>
							<div class="wla-pe-lc-bg">03</div>
						</div>
						
						<!-- Stage 04 -->
						<div class="wla-pe-lc">
							<div class="wla-pe-lc-number">STAGE 04</div>
							<div class="wla-pe-lc-stage">EXIT</div>
							<p class="wla-pe-lc-desc">Trade sale, secondary, or IPO preparation — exit structuring, tax-efficient disposal, vendor due diligence, and management arrangements on exit across all jurisdictions.</p>
							<div class="wla-pe-lc-practices">
								<span class="wla-pe-lc-prac">Trade Sale</span>
								<span class="wla-pe-lc-prac">Secondary</span>
								<span class="wla-pe-lc-prac">IPO Prep</span>
							</div>
							<div class="wla-pe-lc-bg">04</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: FUND STRUCTURES                                     -->
			<!-- ============================================================ -->
			<div class="wla-pe-funds-bg">
				<section class="wla-pe-section wla-pe-animate">
					<div class="wla-pe-container">
						<div class="wla-pe-eyebrow">FUND STRUCTURES — WLA ACTIVE</div>
						<h2 class="wla-pe-heading">EVERY MAJOR FUND STRUCTURE.<br>EVERY DOMICILE JURISDICTION.</h2>
						
						<div class="wla-pe-fund-grid">
							<!-- Fund 01 -->
							<div class="wla-pe-fund-card">
								<div class="wla-pe-fg-type">OFFSHORE · CLOSED-END</div>
								<div class="wla-pe-fg-title">CAYMAN ISLANDS LP</div>
								<p class="wla-pe-fg-desc">The global standard for PE fund formation — Cayman exempted limited partnership, flexible LP agreement, and tax-neutral structure for global investor base.</p>
								<div class="wla-pe-fg-jurs">WLA CAYMAN ACTIVE</div>
							</div>
							
							<!-- Fund 02 -->
							<div class="wla-pe-fund-card">
								<div class="wla-pe-fg-type">EU · REGULATED</div>
								<div class="wla-pe-fg-title">LUXEMBOURG RAIF / SCSp</div>
								<p class="wla-pe-fg-desc">EU-regulated fund domicile — RAIF for speed-to-market, SCSp for maximum flexibility. Passporting across 27 EU member states under AIFMD.</p>
								<div class="wla-pe-fg-jurs">WLA LUXEMBOURG ACTIVE</div>
							</div>
							
							<!-- Fund 03 -->
							<div class="wla-pe-fund-card">
								<div class="wla-pe-fg-type">APAC · SINGAPORE</div>
								<div class="wla-pe-fg-title">SINGAPORE VCC</div>
								<p class="wla-pe-fg-desc">Variable Capital Company — Singapore's modern fund vehicle. Sub-fund capability, flexible capital reduction, and MAS oversight. Ideal for ASEAN-focused funds.</p>
								<div class="wla-pe-fg-jurs">WLA SINGAPORE ACTIVE</div>
							</div>
							
							<!-- Fund 04 -->
							<div class="wla-pe-fund-card">
								<div class="wla-pe-fg-type">GULF · DIFC</div>
								<div class="wla-pe-fg-title">DIFC FUND STRUCTURES</div>
								<p class="wla-pe-fg-desc">DIFC Exempt Fund and Qualified Investor Fund — DFSA regulated. The preferred structure for GCC-based PE and family office investment vehicles.</p>
								<div class="wla-pe-fg-jurs">WLA DIFC ACTIVE</div>
							</div>
							
							<!-- Fund 05 -->
							<div class="wla-pe-fund-card">
								<div class="wla-pe-fg-type">UK · POST-BREXIT</div>
								<div class="wla-pe-fg-title">UK LIMITED PARTNERSHIP</div>
								<p class="wla-pe-fg-desc">Updated UK LP Act regime — enhanced LP flexibility, improved GP governance. UK as domicile for funds focused on UK and Africa investment corridors.</p>
								<div class="wla-pe-fg-jurs">WLA UK ACTIVE</div>
							</div>
							
							<!-- Fund 06 -->
							<div class="wla-pe-fund-card">
								<div class="wla-pe-fg-type">INDIA · GROWTH</div>
								<div class="wla-pe-fg-title">INDIA AIF / GIFT CITY</div>
								<p class="wla-pe-fg-desc">SEBI Alternative Investment Fund and GIFT City IFSC fund structures for India-focused capital. Co-ordinated with WLA India's Transactional practice.</p>
								<div class="wla-pe-fg-jurs">WLA INDIA ACTIVE</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: KEY MARKETS                                          -->
			<!-- ============================================================ -->
			<div class="wla-pe-markets-bg">
				<section class="wla-pe-section wla-pe-section--dark wla-pe-animate">
					<div class="wla-pe-container">
						<div class="wla-pe-eyebrow-dark">MOST ACTIVE PE MARKETS — WLA 2026</div>
						<h2 class="wla-pe-heading-dark">WHERE WLA PE CO-PRACTICE<br>IS MOST ACTIVE.</h2>
						
						<div class="wla-pe-markets-grid">
							<!-- India -->
							<a href="wla-jurisdiction-india.html" class="wla-pe-market-card">
								<div class="wla-pe-mkt-flag">🇮🇳</div>
								<div class="wla-pe-mkt-country">INDIA</div>
								<div class="wla-pe-mkt-focus">PE Growth · Consumer · Tech</div>
								<p class="wla-pe-mkt-desc">India is WLA's most active PE jurisdiction — record deal volumes in 2025. FDI, FEMA, and SEBI all require specialist local knowledge.</p>
								<div class="wla-pe-mkt-growth">↑ Most active WLA PE market 2026</div>
							</a>
							
							<!-- UAE -->
							<a href="wla-jurisdiction-uae.html" class="wla-pe-market-card">
								<div class="wla-pe-mkt-flag">🇦🇪</div>
								<div class="wla-pe-mkt-country">UAE</div>
								<div class="wla-pe-mkt-focus">GCC Capital · Real Assets · DIFC</div>
								<p class="wla-pe-mkt-desc">Gulf sovereign and family capital deploying globally through DIFC structures. UAE as hub for GCC→CEE and GCC→India PE activity.</p>
								<div class="wla-pe-mkt-growth">↑ +38% Gulf outbound 2026</div>
							</a>
							
							<!-- Germany -->
							<a href="wla-jurisdiction-germany.html" class="wla-pe-market-card">
								<div class="wla-pe-mkt-flag">🇩🇪</div>
								<div class="wla-pe-mkt-country">GERMANY</div>
								<div class="wla-pe-mkt-focus">Mittelstand · Carve-outs · Tech</div>
								<p class="wla-pe-mkt-desc">Germany's Mittelstand is the world's largest pool of PE acquisition targets. Works Council and FDI screening require specialist navigation.</p>
								<div class="wla-pe-mkt-growth">↑ Record inbound PE 2025–26</div>
							</a>
							
							<!-- Singapore -->
							<a href="wla-jurisdiction-singapore.html" class="wla-pe-market-card">
								<div class="wla-pe-mkt-flag">🇸🇬</div>
								<div class="wla-pe-mkt-country">SINGAPORE</div>
								<div class="wla-pe-mkt-focus">ASEAN Funds · VCC · GIP</div>
								<p class="wla-pe-mkt-desc">Singapore VCC adoption growing rapidly. ASEAN PE expansion route and Southeast Asian portfolio co-ordination hub.</p>
								<div class="wla-pe-mkt-growth">↑ GCC→SE Asia +31%</div>
							</a>
							
							<!-- UK -->
							<a href="wla-jurisdiction-uk.html" class="wla-pe-market-card">
								<div class="wla-pe-mkt-flag">🇬🇧</div>
								<div class="wla-pe-mkt-country">UK</div>
								<div class="wla-pe-mkt-focus">Carve-outs · Part 26A · Tech</div>
								<p class="wla-pe-mkt-desc">UK remains a major PE market — carve-outs, W&I insurance, and Part 26A restructuring all creating significant PE legal work.</p>
								<div class="wla-pe-mkt-growth">↑ PE restructuring active</div>
							</a>
							
							<!-- France -->
							<a href="wla-jurisdiction-france.html" class="wla-pe-market-card">
								<div class="wla-pe-mkt-flag">🇫🇷</div>
								<div class="wla-pe-mkt-country">FRANCE</div>
								<div class="wla-pe-mkt-focus">Luxury · Tech · CSE</div>
								<p class="wla-pe-mkt-desc">French PE market active in luxury brand roll-ups, technology platforms, and infrastructure. CSE consultation a key complexity on all French PE transactions.</p>
								<div class="wla-pe-mkt-growth">↑ Luxury M&A active</div>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-pe-cta-band">
				<div class="wla-pe-cta-title">BRIEF WLA ON YOUR PRIVATE EQUITY MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-pe-cta-buttons">
					<a href="wla-specialist.html" class="wla-pe-btn-white">FIND A PE SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-pe-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA PE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Private Clients Sector Page Shortcode
	 *
	 * Displays the WLA Private Clients Sector page including:
	 * - Hero section
	 * - Sector capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_private_clients_page]
	 *
	 * @return string
	 */
	public function wla_private_clients_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA PRIVATE CLIENTS PAGE WRAPPER -->
		<div class="wla-private-clients-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-private-clients-hero">
				<img class="wla-private-clients-hero-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=85" alt="">
				<div class="wla-private-clients-hero-grad"></div>
				<div class="wla-private-clients-hero-content">
					<div class="wla-private-clients-hero-eyebrow">SECTOR GROUP · PRIVATE CLIENTS</div>
					<h1 class="wla-private-clients-hero-title">PRIVATE CLIENTS</h1>
					<h2 class="wla-private-clients-hero-subtitle">CONFIDENTIAL · DISCREET · PERSONAL LEGAL SERVICES</h2>
					<p class="wla-private-clients-hero-description">
						WLA's Private Clients sector group serves individuals and families needing the highest quality legal advice across multiple jurisdictions — handled with complete discretion, under one institutional relationship, with the same standard of excellence that WLA delivers to its largest corporate clients.
					</p>
					<div class="wla-private-clients-hero-buttons">
						<a href="wla-specialist.html" class="wla-private-clients-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-private-clients-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-private-clients-section wla-private-clients-animate">
				<div class="wla-private-clients-container">
					<div class="wla-private-clients-eyebrow">WHAT WLA CO-PRACTICES IN THIS SECTOR</div>
					<h2 class="wla-private-clients-heading">EVERY LEGAL DIMENSION.<br>EVERY JURISDICTION.</h2>
					
					<div class="wla-private-clients-grid">
						
						<!-- Capability 01 -->
						<div class="wla-private-clients-card">
							<div class="wla-private-clients-card-number">01</div>
							<h3 class="wla-private-clients-card-title">RESIDENCY &amp; CITIZENSHIP</h3>
							<p class="wla-private-clients-card-desc">
								Investor residence visas, Golden Visa programmes, citizenship by investment, and naturalisation pathways — structured around your specific situation and life objectives across 40+ destination jurisdictions.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-private-clients-card">
							<div class="wla-private-clients-card-number">02</div>
							<h3 class="wla-private-clients-card-title">ESTATE &amp; SUCCESSION</h3>
							<p class="wla-private-clients-card-desc">
								Cross-border wills, trusts, and estate administration — structured to work across the specific inheritance systems of every jurisdiction where you hold assets or have family members.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-private-clients-card">
							<div class="wla-private-clients-card-number">03</div>
							<h3 class="wla-private-clients-card-title">PERSONAL INVESTMENT</h3>
							<p class="wla-private-clients-card-desc">
								Private M&A, real estate acquisitions across multiple jurisdictions, yacht and aircraft ownership structures — co-practiced at the same institutional standard as corporate transactions.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-private-clients-card">
							<div class="wla-private-clients-card-number">04</div>
							<h3 class="wla-private-clients-card-title">PERSONAL TAX PLANNING</h3>
							<p class="wla-private-clients-card-desc">
								Cross-border personal tax planning for internationally mobile individuals — residency change planning, exit taxation, offshore structure compliance, and treaty planning.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-private-clients-card">
							<div class="wla-private-clients-card-number">05</div>
							<h3 class="wla-private-clients-card-title">PERSONAL DISPUTES</h3>
							<p class="wla-private-clients-card-desc">
								Cross-border personal disputes — family law, inheritance disputes, and high-value personal litigation — handled with discretion and the full WLA co-practice framework in every relevant jurisdiction.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-private-clients-card">
							<div class="wla-private-clients-card-number">06</div>
							<h3 class="wla-private-clients-card-title">PRIVACY &amp; REPUTATION</h3>
							<p class="wla-private-clients-card-desc">
								Personal privacy, data rights, and reputation management — including cross-border injunctions and online content removal in each relevant territory.
							</p>
						</div>
						
					</div>
					
					<div class="wla-private-clients-cta-row">
						<a href="wla-specialist.html" class="wla-private-clients-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-private-clients-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-private-clients-cta-band">
				<div class="wla-private-clients-cta-title">SPEAK WITH A PRIVATE CLIENT SPECIALIST. COMPLETELY CONFIDENTIAL.</div>
				<div class="wla-private-clients-cta-buttons">
					<a href="wla-specialist.html" class="wla-private-clients-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-private-clients-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA PRIVATE CLIENTS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Professionals Sector Page Shortcode
	 *
	 * Displays the WLA Professionals Sector page including:
	 * - Hero section
	 * - Sector capabilities grid
	 * - CTA band
	 *
	 * Shortcode: [wla_professionals_page]
	 *
	 * @return string
	 */
	public function wla_professionals_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA PROFESSIONALS PAGE WRAPPER -->
		<div class="wla-professionals-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-professionals-hero">
				<img class="wla-professionals-hero-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=85" alt="">
				<div class="wla-professionals-hero-grad"></div>
				<div class="wla-professionals-hero-content">
					<div class="wla-professionals-hero-eyebrow">SECTOR GROUP · PROFESSIONALS</div>
					<h1 class="wla-professionals-hero-title">PROFESSIONALS</h1>
					<h2 class="wla-professionals-hero-subtitle">INDIVIDUAL ADVISORY · CAREER LEGAL SUPPORT · CROSS-BORDER</h2>
					<p class="wla-professionals-hero-description">
						Senior professionals — executives, partners, consultants, and specialists — working across borders face personal legal complexity that combines employment law, immigration, tax, and personal wealth planning simultaneously. WLA's Professionals sector group provides coordinated specialist advice across every dimension.
					</p>
					<div class="wla-professionals-hero-buttons">
						<a href="wla-specialist.html" class="wla-professionals-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-professionals-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR CAPABILITIES                                 -->
			<!-- ============================================================ -->
			<section class="wla-professionals-section wla-professionals-animate">
				<div class="wla-professionals-container">
					<div class="wla-professionals-eyebrow">WHAT WLA CO-PRACTICES IN THIS SECTOR</div>
					<h2 class="wla-professionals-heading">EVERY LEGAL DIMENSION.<br>EVERY JURISDICTION.</h2>
					
					<div class="wla-professionals-grid">
						
						<!-- Capability 01 -->
						<div class="wla-professionals-card">
							<div class="wla-professionals-card-number">01</div>
							<h3 class="wla-professionals-card-title">EXECUTIVE CONTRACT REVIEW</h3>
							<p class="wla-professionals-card-desc">
								Senior executive employment contract review and negotiation — compensation structures, equity arrangements, restrictive covenants, and termination provisions assessed against every relevant jurisdiction's law.
							</p>
						</div>
						
						<!-- Capability 02 -->
						<div class="wla-professionals-card">
							<div class="wla-professionals-card-number">02</div>
							<h3 class="wla-professionals-card-title">INTERNATIONAL RELOCATION</h3>
							<p class="wla-professionals-card-desc">
								Cross-border relocation — employment in the destination jurisdiction, residency and work permit, tax residence planning, and exit from the origin jurisdiction all coordinated simultaneously.
							</p>
						</div>
						
						<!-- Capability 03 -->
						<div class="wla-professionals-card">
							<div class="wla-professionals-card-number">03</div>
							<h3 class="wla-professionals-card-title">PERSONAL TAX PLANNING</h3>
							<p class="wla-professionals-card-desc">
								Personal tax planning for internationally mobile professionals — residency determination, treaty analysis, stock option taxation across borders, and year-end cross-border tax planning.
							</p>
						</div>
						
						<!-- Capability 04 -->
						<div class="wla-professionals-card">
							<div class="wla-professionals-card-number">04</div>
							<h3 class="wla-professionals-card-title">EQUITY &amp; CARRIED INTEREST</h3>
							<p class="wla-professionals-card-desc">
								Equity incentive and carried interest arrangements — vesting structures, good leaver and bad leaver provisions, and tax-efficient structures across all relevant legal systems.
							</p>
						</div>
						
						<!-- Capability 05 -->
						<div class="wla-professionals-card">
							<div class="wla-professionals-card-number">05</div>
							<h3 class="wla-professionals-card-title">SENIOR DISPUTES</h3>
							<p class="wla-professionals-card-desc">
								Senior executive employment disputes — termination, bonus disputes, restrictive covenant enforcement — co-practiced across every relevant jurisdiction simultaneously.
							</p>
						</div>
						
						<!-- Capability 06 -->
						<div class="wla-professionals-card">
							<div class="wla-professionals-card-number">06</div>
							<h3 class="wla-professionals-card-title">PERSONAL LEGAL INFRASTRUCTURE</h3>
							<p class="wla-professionals-card-desc">
								Wills, powers of attorney, personal trust structures, and the legal infrastructure every internationally mobile professional needs but rarely has time to put in place.
							</p>
						</div>
						
					</div>
					
					<div class="wla-professionals-cta-row">
						<a href="wla-specialist.html" class="wla-professionals-btn-ink">FIND A SPECIALIST — 48H</a>
						<a href="wla-how-it-works.html" class="wla-professionals-btn-bdr">HOW CO-PRACTICE WORKS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-professionals-cta-band">
				<div class="wla-professionals-cta-title">SPEAK WITH A PROFESSIONALS SPECIALIST. CONFIDENTIAL. 48 HOURS.</div>
				<div class="wla-professionals-cta-buttons">
					<a href="wla-specialist.html" class="wla-professionals-btn-white">BRIEF WLA NOW</a>
					<a href="wla-how-it-works.html" class="wla-professionals-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA PROFESSIONALS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Technology Sector Page Shortcode
	 *
	 * Displays the WLA Technology Sector page including:
	 * - Hero section with regulation tracker
	 * - Tech legal areas grid
	 * - Expansion stages
	 * - EU AI Act explainer
	 * - CTA band
	 *
	 * Shortcode: [wla_technology_page]
	 *
	 * @return string
	 */
	public function wla_technology_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA TECHNOLOGY PAGE WRAPPER -->
		<div class="wla-tech-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-tech-hero">
				<div class="wla-tech-hero-left">
					<div class="wla-tech-hero-tag">SECTOR GROUP · TECHNOLOGY</div>
					<div class="wla-tech-hero-eyebrow">WLA TECHNOLOGY · AI ACT · DATA · CROSS-BORDER EXPANSION</div>
					<h1 class="wla-tech-hero-title">TECHNOLOGY COMPANIES</h1>
					<p class="wla-tech-hero-description">
						Legal infrastructure for technology companies scaling internationally — from seed to public. AI Act compliance, cross-border data frameworks, technology M&A, IP strategy, and international expansion across every jurisdiction your product operates in.
					</p>
					<div class="wla-tech-hero-buttons">
						<a href="wla-specialist.html" class="wla-tech-btn-white">FIND A TECH SPECIALIST — 48H</a>
						<a href="#legal-areas" class="wla-tech-btn-ghost-white">LEGAL AREAS</a>
						<a href="#ai-act" class="wla-tech-btn-ghost-white">EU AI ACT</a>
					</div>
					<div class="wla-tech-hero-stats">
						<div class="wla-tech-hero-stat">
							<div class="wla-tech-hero-stat-number">90+</div>
							<div class="wla-tech-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-tech-hero-stat">
							<div class="wla-tech-hero-stat-number">AI Act</div>
							<div class="wla-tech-hero-stat-label">Full Compliance Coverage</div>
						</div>
						<div class="wla-tech-hero-stat">
							<div class="wla-tech-hero-stat-number">48H</div>
							<div class="wla-tech-hero-stat-label">Specialist Confirmed</div>
						</div>
					</div>
				</div>
				<div class="wla-tech-hero-right">
					<div class="wla-tech-reg-title">
						TECH REGULATION TRACKER
						<div class="wla-tech-live-badge">
							<span class="wla-tech-ldot"></span>LIVE
						</div>
					</div>
					<div class="wla-tech-reg-rows">
						<div class="wla-tech-reg-row">
							<div class="wla-tech-rr-jur">EU</div>
							<div class="wla-tech-rr-name">EU AI Act — Full Enforcement</div>
							<div class="wla-tech-rr-impact">High-risk AI obligations active. GPAI transparency requirements live. Prohibited practices enforced.</div>
							<div class="wla-tech-rr-status wla-tech-rr-status--live">LIVE</div>
						</div>
						<div class="wla-tech-reg-row">
							<div class="wla-tech-rr-jur">EU</div>
							<div class="wla-tech-rr-name">EU Data Act 2025</div>
							<div class="wla-tech-rr-impact">Data sharing obligations for connected devices. B2B data access rights. Cloud switching requirements.</div>
							<div class="wla-tech-rr-status wla-tech-rr-status--live">ACTIVE</div>
						</div>
						<div class="wla-tech-reg-row">
							<div class="wla-tech-rr-jur">INDIA</div>
							<div class="wla-tech-rr-name">DPDP Rules 2025</div>
							<div class="wla-tech-rr-impact">Cross-border data transfer framework. 12-month compliance window. Significant Processing Agreement.</div>
							<div class="wla-tech-rr-status wla-tech-rr-status--live">12-MONTH WINDOW</div>
						</div>
						<div class="wla-tech-reg-row">
							<div class="wla-tech-rr-jur">UK</div>
							<div class="wla-tech-rr-name">AI Copyright Consultation</div>
							<div class="wla-tech-rr-impact">Text and data mining exception proposed for AI training. Major implications for content-trained models.</div>
							<div class="wla-tech-rr-status wla-tech-rr-status--watch">CONSULTATION</div>
						</div>
						<div class="wla-tech-reg-row">
							<div class="wla-tech-rr-jur">US</div>
							<div class="wla-tech-rr-name">State-Level AI Laws</div>
							<div class="wla-tech-rr-impact">Colorado, California, Texas passing AI regulation. Federal framework still absent. Patchwork compliance.</div>
							<div class="wla-tech-rr-status wla-tech-rr-status--watch">EVOLVING</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: TECH LEGAL AREAS                                    -->
			<!-- ============================================================ -->
			<section class="wla-tech-section wla-tech-animate" id="legal-areas">
				<div class="wla-tech-container">
					<div class="wla-tech-eyebrow">TECHNOLOGY LEGAL AREAS</div>
					<h2 class="wla-tech-heading">EVERY LEGAL CHALLENGE<br>TECHNOLOGY COMPANIES FACE GLOBALLY.</h2>
					
					<div class="wla-tech-grid">
						
						<!-- Area 01: AI & Data -->
						<div class="wla-tech-card">
							<div class="wla-tech-card-number">01 — AI &amp; DATA</div>
							<div class="wla-tech-card-icon">🤖</div>
							<div class="wla-tech-card-title">AI REGULATION &amp; DATA LAW</div>
							<p class="wla-tech-card-desc">EU AI Act compliance across all four risk tiers. Cross-border data transfer frameworks — GDPR, DPDP, PDPA, PIPL. Data governance architecture for multi-jurisdiction deployments.</p>
							<ul class="wla-tech-card-list">
								<li>EU AI Act — high-risk classification and conformity assessment</li>
								<li>GPAI model transparency and copyright obligations</li>
								<li>Cross-border data transfer: SCCs, BCRs, and equivalency frameworks</li>
								<li>India DPDP 2025 — Significant Processing Agreement requirements</li>
								<li>AI-generated IP ownership across jurisdictions</li>
							</ul>
							<div class="wla-tech-card-bg">AI</div>
						</div>
						
						<!-- Area 02: IP Strategy -->
						<div class="wla-tech-card">
							<div class="wla-tech-card-number">02 — IP STRATEGY</div>
							<div class="wla-tech-card-icon">⚗️</div>
							<div class="wla-tech-card-title">TECHNOLOGY IP PROTECTION</div>
							<p class="wla-tech-card-desc">Software patent strategy, trademark registration in key markets, trade secret protection, and copyright across multiple legal systems. Open source compliance on M&A. IP holding structure optimisation.</p>
							<ul class="wla-tech-card-list">
								<li>Software patent prosecution — US, EU, India, China simultaneously</li>
								<li>Trademark registration in all operating jurisdictions</li>
								<li>Trade secret protection and employee NDA enforceability</li>
								<li>Open source licence compliance — acquisition due diligence</li>
								<li>IP holding structure — tax and operational optimisation</li>
							</ul>
							<div class="wla-tech-card-bg">IP</div>
						</div>
						
						<!-- Area 03: Expansion -->
						<div class="wla-tech-card">
							<div class="wla-tech-card-number">03 — EXPANSION</div>
							<div class="wla-tech-card-icon">🌐</div>
							<div class="wla-tech-card-title">INTERNATIONAL MARKET ENTRY</div>
							<p class="wla-tech-card-desc">Legal infrastructure for cross-border technology expansion — entity structuring, employment, data localisation compliance, and regulatory licensing in each new jurisdiction. WLA co-practices every new market entry simultaneously.</p>
							<ul class="wla-tech-card-list">
								<li>Market entry entity structuring — subsidiary vs branch vs partnership</li>
								<li>Employment contracts for first hires in each jurisdiction</li>
								<li>Data localisation compliance — India, Russia, China, Indonesia</li>
								<li>Regulatory licensing — fintech, healthtech, edtech by jurisdiction</li>
								<li>Transfer pricing for IP licensing to new subsidiaries</li>
							</ul>
							<div class="wla-tech-card-bg">EXP</div>
						</div>
						
						<!-- Area 04: M&A -->
						<div class="wla-tech-card">
							<div class="wla-tech-card-number">04 — M&amp;A</div>
							<div class="wla-tech-card-icon">🤝</div>
							<div class="wla-tech-card-title">TECHNOLOGY M&amp;A &amp; INVESTMENT</div>
							<p class="wla-tech-card-desc">Technology acquisitions, ESOP restructuring on exit, founder liquidity transactions, strategic investment rounds, and public company M&A — all requiring specialist tech law across multiple jurisdictions simultaneously.</p>
							<ul class="wla-tech-card-list">
								<li>Technology M&A due diligence — IP, data, regulatory, employment</li>
								<li>ESOP and equity incentive restructuring on M&A</li>
								<li>Founder liquidity — secondary sales, tender offers</li>
								<li>Strategic investor rounds — preference terms across jurisdictions</li>
								<li>Public company technology M&A — takeover code and securities law</li>
							</ul>
							<div class="wla-tech-card-bg">M&amp;A</div>
						</div>
						
						<!-- Area 05: Fintech -->
						<div class="wla-tech-card">
							<div class="wla-tech-card-number">05 — FINTECH</div>
							<div class="wla-tech-card-icon">💳</div>
							<div class="wla-tech-card-title">FINTECH &amp; DIGITAL ASSETS</div>
							<p class="wla-tech-card-desc">Payment services regulation (EU PSD3, UK PSR, India RBI), digital asset licensing, open banking compliance, and e-money institution authorisation across multiple jurisdictions for fintech scale-ups.</p>
							<ul class="wla-tech-card-list">
								<li>Payment institution authorisation — EU, UK, Singapore, UAE</li>
								<li>Digital asset licensing — MiCA (EU), MAS, FSRA, ADGM</li>
								<li>Open banking compliance under PSD3 and national equivalents</li>
								<li>Buy-now-pay-later regulation across EU and UK</li>
								<li>Stablecoin regulatory framework — jurisdiction-by-jurisdiction</li>
							</ul>
							<div class="wla-tech-card-bg">FIN</div>
						</div>
						
						<!-- Area 06: Employment -->
						<div class="wla-tech-card">
							<div class="wla-tech-card-number">06 — EMPLOYMENT</div>
							<div class="wla-tech-card-icon">💻</div>
							<div class="wla-tech-card-title">TECH WORKFORCE — GLOBAL</div>
							<p class="wla-tech-card-desc">Remote-first employment structures, contractor vs employee classification (platform work directive), stock option taxation across borders, and workforce immigration for technology companies scaling globally.</p>
							<ul class="wla-tech-card-list">
								<li>Contractor vs employee classification — EU Platform Work Directive</li>
								<li>Stock option taxation — cross-border vesting and exercise</li>
								<li>Remote work compliance — where does the employment obligation arise?</li>
								<li>Tech workforce visas — coordinated with WIA immigration practice</li>
								<li>TUPE on technology M&A and acqui-hires</li>
							</ul>
							<div class="wla-tech-card-bg">EMP</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: EXPANSION STAGES                                    -->
			<!-- ============================================================ -->
			<div class="wla-tech-expansion-bg">
				<section class="wla-tech-section wla-tech-section--dark wla-tech-animate">
					<div class="wla-tech-container">
						<div class="wla-tech-eyebrow-dark">TECHNOLOGY EXPANSION — LEGAL BY STAGE</div>
						<h2 class="wla-tech-heading-dark">WLA CO-PRACTICES EVERY STAGE<br>OF TECHNOLOGY EXPANSION.</h2>
						
						<div class="wla-tech-expansion-grid">
							<div class="wla-tech-expansion-card">
								<div class="wla-tech-eg-stage">STAGE 01</div>
								<div class="wla-tech-eg-title">SEED &amp; EARLY STAGE</div>
								<p class="wla-tech-eg-desc">Founder agreements, ESOP setup, IP assignment, and incorporation in the right jurisdiction. Getting the structure right before investors arrive.</p>
								<div class="wla-tech-eg-badge">Foundation</div>
							</div>
							<div class="wla-tech-expansion-card">
								<div class="wla-tech-eg-stage">STAGE 02</div>
								<div class="wla-tech-eg-title">SERIES A / B — SCALING</div>
								<p class="wla-tech-eg-desc">Investment documentation across jurisdictions, employment framework, IP protection in key markets, and first cross-border data compliance.</p>
								<div class="wla-tech-eg-badge">Growth</div>
							</div>
							<div class="wla-tech-expansion-card">
								<div class="wla-tech-eg-stage">STAGE 03</div>
								<div class="wla-tech-eg-title">INTERNATIONAL EXPANSION</div>
								<p class="wla-tech-eg-desc">Market entry in 3–10 jurisdictions simultaneously — entity, employment, data, regulatory, and IP handled as one co-practice engagement.</p>
								<div class="wla-tech-eg-badge">Expansion</div>
							</div>
							<div class="wla-tech-expansion-card">
								<div class="wla-tech-eg-stage">STAGE 04</div>
								<div class="wla-tech-eg-title">SERIES C+ — LATE STAGE</div>
								<p class="wla-tech-eg-desc">Complex cap table management, secondary transactions, regulatory licensing, M&A as acquirer, and governance as the company professionalises for institutional investors.</p>
								<div class="wla-tech-eg-badge">Scale</div>
							</div>
							<div class="wla-tech-expansion-card">
								<div class="wla-tech-eg-stage">STAGE 05</div>
								<div class="wla-tech-eg-title">EXIT — M&amp;A OR IPO</div>
								<p class="wla-tech-eg-desc">Strategic sale, secondary buyout, or IPO preparation — all requiring coordinated legal support across every jurisdiction simultaneously, under one WLA co-practice team.</p>
								<div class="wla-tech-eg-badge">Exit</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: EU AI ACT EXPLAINER                                 -->
			<!-- ============================================================ -->
			<section class="wla-tech-section wla-tech-section--alt wla-tech-animate" id="ai-act">
				<div class="wla-tech-container">
					<div class="wla-tech-eyebrow">EU AI ACT — COMPLIANCE FOR TECHNOLOGY COMPANIES</div>
					<h2 class="wla-tech-heading">THE EU AI ACT IS<br>LIVE. IS YOUR PRODUCT COMPLIANT?</h2>
					
					<div class="wla-tech-ai-layout">
						<div class="wla-tech-ai-visual">
							<div class="wla-tech-ai-label">EU AI ACT RISK TIERS</div>
							
							<div class="wla-tech-ai-tier wla-tech-ai-tier--prohibited">
								<div class="wla-tech-ai-level">PROHIBITED — BAN EFFECTIVE FEB 2025</div>
								<div class="wla-tech-ai-title">PROHIBITED AI PRACTICES</div>
								<div class="wla-tech-ai-examples">Social scoring · Subliminal manipulation · Real-time biometric surveillance in public spaces · Exploiting vulnerable groups</div>
							</div>
							
							<div class="wla-tech-ai-tier wla-tech-ai-tier--high">
								<div class="wla-tech-ai-level">HIGH RISK — OBLIGATIONS FULLY ACTIVE</div>
								<div class="wla-tech-ai-title">HIGH-RISK AI SYSTEMS</div>
								<div class="wla-tech-ai-examples">Recruitment AI · Credit scoring · Educational assessment · Law enforcement · Critical infrastructure · Medical devices</div>
							</div>
							
							<div class="wla-tech-ai-tier wla-tech-ai-tier--limited">
								<div class="wla-tech-ai-level">LIMITED RISK — TRANSPARENCY OBLIGATIONS</div>
								<div class="wla-tech-ai-title">LIMITED RISK AI</div>
								<div class="wla-tech-ai-examples">Chatbots · Deepfakes · AI-generated content — disclosure obligations to users required</div>
							</div>
							
							<div class="wla-tech-ai-tier wla-tech-ai-tier--minimal">
								<div class="wla-tech-ai-level">MINIMAL RISK — NO SPECIFIC OBLIGATIONS</div>
								<div class="wla-tech-ai-title">MINIMAL RISK AI</div>
								<div class="wla-tech-ai-examples">Spam filters · AI in video games · Recommendation systems (most use cases) — no EU AI Act obligations</div>
							</div>
						</div>
						
						<div class="wla-tech-ai-content">
							<div class="wla-tech-ai-content-title">WLA ADVISES TECHNOLOGY COMPANIES ON EU AI ACT COMPLIANCE ACROSS ALL OPERATING JURISDICTIONS.</div>
							<p class="wla-tech-ai-body">
								The EU AI Act is the world's first comprehensive AI regulation — and it has extraterritorial effect. Any AI system placed on the EU market, or whose output is used in the EU, falls within scope — regardless of where the developer is based. For technology companies with EU users, customers, or operations, compliance is not optional.
							</p>
							<p class="wla-tech-ai-body">
								WLA's technology practice co-practices EU AI Act compliance alongside national AI regulation in every jurisdiction the technology company operates in — coordinated through one co-practice team, not managed piecemeal by separate firms in each territory.
							</p>
							<ul class="wla-tech-ai-points">
								<li>AI system risk classification — where does your product fall in the four-tier framework?</li>
								<li>High-risk AI conformity assessment — technical documentation, human oversight, accuracy requirements</li>
								<li>GPAI model obligations — transparency, copyright compliance, systemic risk assessment</li>
								<li>AI governance framework — internal policies, incident reporting, market surveillance</li>
								<li>Cross-border consistency — EU AI Act + India AI Guidelines + UK AI Safety Institute</li>
							</ul>
							<div class="wla-tech-ai-buttons">
								<a href="wla-specialist.html" class="wla-tech-btn-ink">FIND A TECH REGULATION SPECIALIST →</a>
								<a href="wla-intelligence.html" class="wla-tech-btn-bdr">TECH INTELLIGENCE PLATFORM</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-tech-cta-band">
				<div class="wla-tech-cta-title">BRIEF WLA ON YOUR TECHNOLOGY LEGAL MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-tech-cta-buttons">
					<a href="wla-specialist.html" class="wla-tech-btn-white">FIND A TECH SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-tech-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA TECHNOLOGY PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Find a Specialist Page Shortcode
	 *
	 * Displays the WLA Find a Specialist page including:
	 * - Hero with search
	 * - How it works steps
	 * - Specialist grid
	 * - Corridor matching
	 * - Guarantee section
	 *
	 * Shortcode: [wla_specialist_page]
	 *
	 * @return string
	 */
	public function wla_specialist_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA SPECIALIST PAGE WRAPPER -->
		<div class="wla-specialist-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-specialist-hero">
				<div class="wla-specialist-hero-bg"></div>
				<div class="wla-specialist-hero-content">
					<div class="wla-specialist-hero-eyebrow">WLA SPECIALIST NETWORK · 90+ JURISDICTIONS · 151 PARTNER FIRMS</div>
					<h1 class="wla-specialist-hero-title">FIND THE RIGHT SPECIALIST. ANY JURISDICTION. 48 HOURS.</h1>
					<div class="wla-specialist-hero-badge">
						<span class="wla-specialist-hero-badge-dot"></span>
						GUARANTEED 48H BRIEF-TO-MATCH
					</div>
					<div class="wla-specialist-search-box">
						<input class="wla-specialist-search-input" type="text" placeholder="Search by jurisdiction, practice area, or corridor...">
						<button class="wla-specialist-search-btn">SEARCH SPECIALISTS</button>
					</div>
					<div class="wla-specialist-filter-row">
						<div class="wla-specialist-filter-label">PRACTICE AREA</div>
						<div class="wla-specialist-chip wla-specialist-chip--active">All Practices</div>
						<div class="wla-specialist-chip">M&amp;A</div>
						<div class="wla-specialist-chip">IP</div>
						<div class="wla-specialist-chip">Arbitration</div>
						<div class="wla-specialist-chip">Tax</div>
						<div class="wla-specialist-chip">Immigration</div>
						<div class="wla-specialist-chip">Employment</div>
						<div class="wla-specialist-chip">Private Clients</div>
						<div class="wla-specialist-chip">Data &amp; Tech</div>
					</div>
					<div class="wla-specialist-filter-row">
						<div class="wla-specialist-filter-label">REGION</div>
						<div class="wla-specialist-chip wla-specialist-chip--selected">All Regions</div>
						<div class="wla-specialist-chip">Europe</div>
						<div class="wla-specialist-chip">Asia Pacific</div>
						<div class="wla-specialist-chip">Middle East</div>
						<div class="wla-specialist-chip">Americas</div>
						<div class="wla-specialist-chip">Africa</div>
					</div>
					<div class="wla-specialist-search-note">Or submit a full brief below for coordinated matching across multiple jurisdictions simultaneously</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: HOW IT WORKS                                       -->
			<!-- ============================================================ -->
			<section class="wla-specialist-section wla-specialist-animate">
				<div class="wla-specialist-container">
					<div class="wla-specialist-eyebrow">HOW IT WORKS</div>
					<h2 class="wla-specialist-heading">THREE STEPS.<br>ONE COORDINATED TEAM.</h2>
					<div class="wla-specialist-hiw-grid">
						<div class="wla-specialist-hiw-step">
							<div class="wla-specialist-hiw-tag">STEP 01 · IMMEDIATE</div>
							<div class="wla-specialist-hiw-number">01</div>
							<div class="wla-specialist-hiw-title">SUBMIT YOUR BRIEF</div>
							<p class="wla-specialist-hiw-desc">Share your jurisdictions, practice areas, and timeline. One brief — no need to contact multiple firms separately. WLA's coordination team reviews within hours.</p>
						</div>
						<div class="wla-specialist-hiw-step">
							<div class="wla-specialist-hiw-tag">STEP 02 · WITHIN 48 HOURS</div>
							<div class="wla-specialist-hiw-number">02</div>
							<div class="wla-specialist-hiw-title">SPECIALIST MATCHED</div>
							<p class="wla-specialist-hiw-desc">WLA matches your brief with the accredited WLA-Qualified specialist firm in each required jurisdiction. You receive one coordinated team proposal — not six separate responses.</p>
						</div>
						<div class="wla-specialist-hiw-step">
							<div class="wla-specialist-hiw-tag">STEP 03 · FROM DAY ONE</div>
							<div class="wla-specialist-hiw-number">03</div>
							<div class="wla-specialist-hiw-title">CO-PRACTICE ACTIVATED</div>
							<p class="wla-specialist-hiw-desc">Partner firms jointly hold the engagement across all jurisdictions — shared matter management, WLA coordination layer, one seamless client experience through to completion.</p>
						</div>
					</div>
					<div class="wla-specialist-hiw-cta">
						<a href="#brief" class="wla-specialist-btn-ink">SUBMIT A BRIEF NOW</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: SPECIALISTS GRID                                   -->
			<!-- ============================================================ -->
			<div class="wla-specialist-results-bg">
				<section class="wla-specialist-section wla-specialist-animate">
					<div class="wla-specialist-container">
						<div class="wla-specialist-results-header">
							<div>
								<div class="wla-specialist-eyebrow">WLA SPECIALISTS</div>
								<h2 class="wla-specialist-heading">ALL WLA-QUALIFIED<br>PARTNER SPECIALISTS.</h2>
							</div>
							<div class="wla-specialist-sort">SORT BY JURISDICTION ↓</div>
						</div>
						<div class="wla-specialist-results-count">Showing <strong>8</strong> of 151 WLA-Qualified partner firm specialists across 90+ jurisdictions</div>
						<div class="wla-specialist-grid">
							
							<!-- Specialist Card 1 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Akshay-Singhi-WLA-Member-scaled.jpg" alt="Akshay Singhi">
									<div class="wla-specialist-card-jur-badge">INDIA</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">AKSHAY SINGHI</div>
									<div class="wla-specialist-card-role">Senior Partner · S.K. Singhi &amp; Partners</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">M&amp;A</span>
										<span class="wla-specialist-card-tag">Corporate</span>
										<span class="wla-specialist-card-tag">FDI</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA India</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 2 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Dawid-Sokolowski-WLA-Member-scaled.jpg" alt="Dawid Sokolowski">
									<div class="wla-specialist-card-jur-badge">POLAND</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">DAWID SOKOLOWSKI</div>
									<div class="wla-specialist-card-role">Managing Partner · Sokolowski &amp; Partners</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">Transactional</span>
										<span class="wla-specialist-card-tag">CEE M&amp;A</span>
										<span class="wla-specialist-card-tag">Disputes</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Poland</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 3 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Melody-Mwansa-WLA-Member.jpg" alt="Melody Mwansa">
									<div class="wla-specialist-card-jur-badge">ZAMBIA</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">MELODY MWANSA</div>
									<div class="wla-specialist-card-role">Senior Associate · WLA Zambia</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">Corporate</span>
										<span class="wla-specialist-card-tag">Mining</span>
										<span class="wla-specialist-card-tag">Energy</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Zambia</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 4 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/11/Natacha-Auvertin-WLA-Member.jpg" alt="Natacha Auvertin">
									<div class="wla-specialist-card-jur-badge">SWITZERLAND</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">NATACHA AUVERTIN</div>
									<div class="wla-specialist-card-role">Partner · WLA Switzerland</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">Private Clients</span>
										<span class="wla-specialist-card-tag">HNW</span>
										<span class="wla-specialist-card-tag">Succession</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Switzerland</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 5 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Abdulraheem-Tariq-Bubshait-scaled.jpg" alt="Abdulraheem Bubshait">
									<div class="wla-specialist-card-jur-badge">SAUDI ARABIA</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">ABDULRAHEEM BUBSHAIT</div>
									<div class="wla-specialist-card-role">Partner · WLA Saudi Arabia</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">FDI</span>
										<span class="wla-specialist-card-tag">Vision 2030</span>
										<span class="wla-specialist-card-tag">M&amp;A</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Saudi Arabia</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 6 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Evelyn-W.-Njiru-WLA-Member.jpg" alt="Evelyn Njiru">
									<div class="wla-specialist-card-jur-badge">KENYA</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">EVELYN W. NJIRU</div>
									<div class="wla-specialist-card-role">Head of Corporate Law · WLA Kenya</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">Corporate</span>
										<span class="wla-specialist-card-tag">East Africa</span>
										<span class="wla-specialist-card-tag">Infrastructure</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Kenya</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 7 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Jean-Pascal-Ouendeno-WLA-Member.jpg" alt="Jean Pascal Ouendeno">
									<div class="wla-specialist-card-jur-badge">GUINEA</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">JEAN PASCAL OUENDENO</div>
									<div class="wla-specialist-card-role">Managing Partner · WLA Guinea</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">Mining</span>
										<span class="wla-specialist-card-tag">Natural Resources</span>
										<span class="wla-specialist-card-tag">FDI</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Guinea</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
							<!-- Specialist Card 8 -->
							<a href="#" class="wla-specialist-card">
								<div class="wla-specialist-card-img-wrap">
									<img class="wla-specialist-card-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Ahmed-Richard-Bhurtun-WLA-Member-scaled.jpg" alt="Ahmed Bhurtun">
									<div class="wla-specialist-card-jur-badge">MAURITIUS</div>
								</div>
								<div class="wla-specialist-card-body">
									<div class="wla-specialist-card-name">AHMED R. BHURTUN</div>
									<div class="wla-specialist-card-role">Managing Partner · WLA Mauritius</div>
									<div class="wla-specialist-card-tags">
										<span class="wla-specialist-card-tag">Tax Structuring</span>
										<span class="wla-specialist-card-tag">Africa Gateway</span>
										<span class="wla-specialist-card-tag">Funds</span>
									</div>
									<div class="wla-specialist-card-footer">
										<span class="wla-specialist-card-firm">WLA Mauritius</span>
										<span class="wla-specialist-card-contact">CONTACT →</span>
									</div>
								</div>
							</a>
							
						</div>
						<div class="wla-specialist-load-more">
							<a href="#" class="wla-specialist-btn-bdr">LOAD MORE SPECIALISTS</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDOR MATCH                                     -->
			<!-- ============================================================ -->
			<div class="wla-specialist-corr-match-bg">
				<div class="wla-specialist-corr-match-inner wla-specialist-animate">
					<div class="wla-specialist-cm-head">
						<div>
							<div class="wla-specialist-eyebrow-dark">CORRIDOR MATCHING</div>
							<h2 class="wla-specialist-cm-title">NEED BOTH SIDES OF A CORRIDOR? WLA HOLDS THEM SIMULTANEOUSLY.</h2>
						</div>
						<div>
							<p class="wla-specialist-cm-desc">Submit one brief for any cross-border corridor. WLA activates the accredited partner firm in each jurisdiction simultaneously — both sides, one engagement, one coordinated team.</p>
							<div class="wla-specialist-cm-cta">
								<a href="#brief" class="wla-specialist-btn-white">SUBMIT A CORRIDOR BRIEF →</a>
							</div>
						</div>
					</div>
					<div class="wla-specialist-cm-grid">
						<div class="wla-specialist-cm-card">
							<div class="wla-specialist-cm-route">
								<span class="wla-specialist-cm-from">GULF</span>
								<span class="wla-specialist-cm-arrow">→</span>
								<span class="wla-specialist-cm-to">CEE</span>
							</div>
							<div class="wla-specialist-cm-desc">GCC · CENTRAL &amp; EASTERN EUROPE</div>
							<div class="wla-specialist-cm-growth">↑ 38% GROWTH 2026</div>
						</div>
						<div class="wla-specialist-cm-card">
							<div class="wla-specialist-cm-route">
								<span class="wla-specialist-cm-from">EU</span>
								<span class="wla-specialist-cm-arrow">→</span>
								<span class="wla-specialist-cm-to">INDIA</span>
							</div>
							<div class="wla-specialist-cm-desc">TRADE · TECHNOLOGY · INVESTMENT</div>
							<div class="wla-specialist-cm-growth">↑ 34% GROWTH 2026</div>
						</div>
						<div class="wla-specialist-cm-card">
							<div class="wla-specialist-cm-route">
								<span class="wla-specialist-cm-from">UK</span>
								<span class="wla-specialist-cm-arrow">→</span>
								<span class="wla-specialist-cm-to">AFRICA</span>
							</div>
							<div class="wla-specialist-cm-desc">COMMON LAW · CRITICAL MINERALS</div>
							<div class="wla-specialist-cm-growth">↑ 22% GROWTH 2026</div>
						</div>
						<div class="wla-specialist-cm-card">
							<div class="wla-specialist-cm-route">
								<span class="wla-specialist-cm-from">GCC</span>
								<span class="wla-specialist-cm-arrow">→</span>
								<span class="wla-specialist-cm-to">SE ASIA</span>
							</div>
							<div class="wla-specialist-cm-desc">GULF CAPITAL INTO ASEAN</div>
							<div class="wla-specialist-cm-growth">↑ 31% GROWTH 2026</div>
						</div>
						<div class="wla-specialist-cm-card">
							<div class="wla-specialist-cm-route">
								<span class="wla-specialist-cm-from">US</span>
								<span class="wla-specialist-cm-arrow">↔</span>
								<span class="wla-specialist-cm-to">EUROPE</span>
							</div>
							<div class="wla-specialist-cm-desc">TRANSATLANTIC M&amp;A · HIGHEST VOLUME</div>
							<div class="wla-specialist-cm-growth">↑ 18% GROWTH 2026</div>
						</div>
						<div class="wla-specialist-cm-card">
							<div class="wla-specialist-cm-route">
								<span class="wla-specialist-cm-from">APAC</span>
								<span class="wla-specialist-cm-arrow">↔</span>
								<span class="wla-specialist-cm-to">AMERICAS</span>
							</div>
							<div class="wla-specialist-cm-desc">PACIFIC RIM · CROSS-BORDER</div>
							<div class="wla-specialist-cm-growth">↑ 19% GROWTH 2026</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: GUARANTEE                                           -->
			<!-- ============================================================ -->
			<div class="wla-specialist-guarantee">
				<div class="wla-specialist-guarantee-inner wla-specialist-animate" id="brief">
					<div class="wla-specialist-g-cell">
						<div class="wla-specialist-g-number">48H</div>
						<div class="wla-specialist-g-title">BRIEF-TO-MATCH GUARANTEE</div>
						<p class="wla-specialist-g-desc">WLA guarantees a coordinated specialist team proposal within 48 hours of brief receipt — for any jurisdiction combination across the WLA network.</p>
					</div>
					<div class="wla-specialist-g-cell wla-specialist-g-cell--highlight">
						<div class="wla-specialist-g-number">01</div>
						<div class="wla-specialist-g-title">FIRM PER JURISDICTION</div>
						<p class="wla-specialist-g-desc">One exclusive WLA-Qualified specialist firm per practice per jurisdiction — no internal competition, no conflicts, the deepest possible local expertise every time.</p>
					</div>
					<div class="wla-specialist-g-cell">
						<div class="wla-specialist-g-number">100%</div>
						<div class="wla-specialist-g-title">WLA QUALIFIED SPECIALISTS</div>
						<p class="wla-specialist-g-desc">Every specialist in the WLA network holds current WLA Qualified accreditation — reviewed annually against published standards. No exceptions.</p>
					</div>
				</div>
			</div>

		</div>
		<!-- END WLA SPECIALIST PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Terms of Use Page Shortcode
	 *
	 * Displays the WLA Terms of Use page including:
	 * - Hero section
	 * - Terms content sections
	 *
	 * Shortcode: [wla_terms_page]
	 *
	 * @return string
	 */
	public function wla_terms_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA TERMS PAGE WRAPPER -->
		<div class="wla-terms-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: TERMS CONTENT                                      -->
			<!-- ============================================================ -->
			<div class="wla-terms-content-wrapper">
				<div class="wla-terms-content-container">
					<div class="wla-terms-eyebrow">LEGAL · TERMS</div>
					<h1 class="wla-terms-heading">TERMS OF USE</h1>
					<p class="wla-terms-updated">Last updated: January 2026</p>
					
					<!-- Section 1: Acceptance -->
					<div class="wla-terms-section">
						<div class="wla-terms-section-title">1. ACCEPTANCE</div>
						<p class="wla-terms-section-body">By accessing worldlawalliance.com, you accept these terms of use in full. If you do not accept these terms, you must not use this website.</p>
					</div>
					
					<!-- Section 2: Not Legal Advice -->
					<div class="wla-terms-section">
						<div class="wla-terms-section-title">2. NOT LEGAL ADVICE</div>
						<p class="wla-terms-section-body">The content of this website is provided for general information purposes only. Nothing on this website constitutes legal advice. WLA is an institutional co-practice framework — not a law firm and not a legal services provider. Legal advice is provided by the independent WLA partner firms, not by WLA itself. You should not rely on any content of this website as a substitute for independent legal advice from a qualified lawyer.</p>
					</div>
					
					<!-- Section 3: WLA is Not a Law Firm -->
					<div class="wla-terms-section">
						<div class="wla-terms-section-title">3. WLA IS NOT A LAW FIRM</div>
						<p class="wla-terms-section-body">World Law Alliance is an institutional framework that coordinates co-practice between independent law firms. WLA is not a law firm, does not practise law, does not hold any legal practising certificate or regulatory authorisation in any jurisdiction, and does not provide legal services. All legal services are provided directly by the independent WLA partner firms in their respective jurisdictions.</p>
					</div>
					
					<!-- Section 4: Intellectual Property -->
					<div class="wla-terms-section">
						<div class="wla-terms-section-title">4. INTELLECTUAL PROPERTY</div>
						<p class="wla-terms-section-body">All content on this website — including the WLA™, WLA Global Corridors™, WIA™, UNBOUNDED™, and TheNeutrals.ORG™ marks, all text, design, and institutional materials — is the property of World Law Alliance or its affiliates and is protected by applicable intellectual property laws. No part of this website may be reproduced without prior written permission from WLA.</p>
					</div>
					
					<!-- Section 5: Limitation of Liability -->
					<div class="wla-terms-section">
						<div class="wla-terms-section-title">5. LIMITATION OF LIABILITY</div>
						<p class="wla-terms-section-body">WLA makes no representations or warranties about the accuracy or completeness of the information on this website. To the fullest extent permitted by law, WLA excludes all liability for loss or damage arising from use of this website or reliance on its content.</p>
					</div>
					
					<!-- Section 6: Governing Law -->
					<div class="wla-terms-section">
						<div class="wla-terms-section-title">6. GOVERNING LAW</div>
						<p class="wla-terms-section-body">These terms are governed by the laws of India. Any dispute arising from these terms or the use of this website shall be subject to the exclusive jurisdiction of the courts of New Delhi, India.</p>
					</div>
					
					<!-- Section 7: Contact -->
					<div class="wla-terms-section wla-terms-section--last">
						<div class="wla-terms-section-title">7. CONTACT</div>
						<p class="wla-terms-section-body">contact@worldlawalliance.com · W-122, Second Floor, Greater Kailash-2, New Delhi, India 110048.</p>
					</div>
				</div>
			</div>

		</div>
		<!-- END WLA TERMS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * UNBOUNDED Barcelona 2026 Page Shortcode
	 *
	 * Displays the WLA UNBOUNDED Barcelona annual gathering page
	 *
	 * Shortcode: [wla_unbounded_page]
	 *
	 * @return string
	 */
	public function wla_unbounded_page_shortcode() {
		
		ob_start();
		?>
		
		<div class="wla-unbounded-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-unbounded-hero">
				<div class="wla-unbounded-hero-bg"></div>
				<div class="wla-unbounded-hero-overlay"></div>
				<div class="wla-unbounded-hero-content">
					<div class="wla-unbounded-hero-eyebrow">WLA ANNUAL INSTITUTIONAL GATHERING · 2026</div>
					<h1 class="wla-unbounded-hero-title">UNBOUNDED™<br>BARCELONA<br>2026.</h1>
					<p class="wla-unbounded-hero-sub">14–15 August 2026 · Hyatt Regency Barcelona Tower · The annual gathering of WLA partner firms, Founding Corridor Leads, and the institutions that shape international legal practice.</p>
					<div class="wla-unbounded-hero-buttons">
						<a href="wla-page-contact.html" class="wla-unbounded-btn-white">REGISTER INTEREST</a>
						<a href="wla-page-forfirms.html" class="wla-unbounded-btn-ghost-white">BE A WLA PARTNER FIRM</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- EVENT INFO                                                   -->
			<!-- ============================================================ -->
			<section class="wla-unbounded-section wla-unbounded-section--dark">
				<div class="wla-unbounded-container">
					<div class="wla-unbounded-event-grid">
						<div class="wla-unbounded-event-text">
							<div class="wla-unbounded-eyebrow-dark">THE EVENT</div>
							<h2 class="wla-unbounded-heading-dark">THE ANNUAL WLA<br>INSTITUTIONAL<br>GATHERING.</h2>
							<p class="wla-unbounded-body-dark">UNBOUNDED™ is the annual moment at which WLA's global network convenes — partner firms, Founding Corridor Leads, and the practitioners who co-practice across the world's most active legal corridors.</p>
							<p class="wla-unbounded-body-dark">It is not a conference. It is not an awards ceremony. It is a working gathering — corridor sessions, co-practice alignment, bilateral partner meetings, and the annual WLA corridor review.</p>
						</div>
						<div class="wla-unbounded-event-details">
							<div class="wla-unbounded-details-box">
								<div class="wla-unbounded-details-label">EVENT DETAILS</div>
								<div class="wla-unbounded-details-item">
									<div class="wla-unbounded-details-item-label">DATES</div>
									<div class="wla-unbounded-details-item-value">14–15 AUGUST 2026</div>
								</div>
								<div class="wla-unbounded-details-item">
									<div class="wla-unbounded-details-item-label">VENUE</div>
									<div class="wla-unbounded-details-item-value">Hyatt Regency Barcelona Tower</div>
									<div class="wla-unbounded-details-item-sub">Barcelona, Spain</div>
								</div>
								<div class="wla-unbounded-details-item">
									<div class="wla-unbounded-details-item-label">FORMAT</div>
									<div class="wla-unbounded-details-item-value">Two full days. Corridor sessions. Bilateral partner meetings. Annual corridor review. WLA institutional programme.</div>
								</div>
								<div class="wla-unbounded-details-item wla-unbounded-details-item--last">
									<div class="wla-unbounded-details-item-label">ATTENDANCE</div>
									<div class="wla-unbounded-details-item-value">WLA partner firms and Founding Corridor Leads. By invitation and registration.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- PROGRAMME                                                    -->
			<!-- ============================================================ -->
			<section class="wla-unbounded-section wla-unbounded-section--light">
				<div class="wla-unbounded-container">
					<div class="wla-unbounded-eyebrow">THE PROGRAMME</div>
					<h2 class="wla-unbounded-heading">TWO DAYS.<br>SIX CORRIDOR SESSIONS.<br>ONE INSTITUTION.</h2>
					<div class="wla-unbounded-programme-grid">
						<div class="wla-unbounded-programme-card">
							<div class="wla-unbounded-programme-card-number">DAY 01 · MORNING</div>
							<div class="wla-unbounded-programme-card-title">CORRIDOR SESSIONS</div>
							<p class="wla-unbounded-programme-card-body">Each of the six active WLA corridors holds a dedicated working session. Both sides of each corridor represented. Co-practice alignment, intelligence sharing, and bilateral planning for the year ahead.</p>
						</div>
						<div class="wla-unbounded-programme-card">
							<div class="wla-unbounded-programme-card-number">DAY 01 · AFTERNOON</div>
							<div class="wla-unbounded-programme-card-title">BILATERAL MEETINGS</div>
							<p class="wla-unbounded-programme-card-body">One-to-one bilateral partner meetings — Founding Corridor Leads meeting their counterparts on the opposite side of each corridor. Structured format. 90 minutes per bilateral pair.</p>
						</div>
						<div class="wla-unbounded-programme-card">
							<div class="wla-unbounded-programme-card-number">DAY 01 · EVENING</div>
							<div class="wla-unbounded-programme-card-title">WLA INSTITUTIONAL DINNER</div>
							<p class="wla-unbounded-programme-card-body">The annual WLA institutional dinner. All partner firms and Founding Corridor Leads. The one moment each year at which the full WLA network is in one room.</p>
						</div>
						<div class="wla-unbounded-programme-card">
							<div class="wla-unbounded-programme-card-number">DAY 02 · MORNING</div>
							<div class="wla-unbounded-programme-card-title">ANNUAL CORRIDOR REVIEW</div>
							<p class="wla-unbounded-programme-card-body">The formal annual WLA corridor review. Corridor performance assessed. Intelligence contributions reviewed. Designations confirmed. The institutional governance moment of the year.</p>
						</div>
						<div class="wla-unbounded-programme-card">
							<div class="wla-unbounded-programme-card-number">DAY 02 · AFTERNOON</div>
							<div class="wla-unbounded-programme-card-title">NEW CORRIDOR PRESENTATIONS</div>
							<p class="wla-unbounded-programme-card-body">Corridors Under Development presented for institutional review. Firms interested in new corridor designations present their cases. New Founding Corridor Lead appointments confirmed.</p>
						</div>
						<div class="wla-unbounded-programme-card">
							<div class="wla-unbounded-programme-card-number">DAY 02 · CLOSE</div>
							<div class="wla-unbounded-programme-card-title">WLA PRIORITIES 2027</div>
							<p class="wla-unbounded-programme-card-body">WLA sets institutional priorities for the coming year — new corridor designations, intelligence platform development, and corridors elevated from Under Development to Priority.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- CTA BAND                                                     -->
			<!-- ============================================================ -->
			<div class="wla-unbounded-cta-band">
				<div class="wla-unbounded-cta-title">UNBOUNDED™ BARCELONA.<br>14–15 AUGUST 2026.</div>
				<div class="wla-unbounded-cta-buttons">
					<a href="wla-page-contact.html" class="wla-unbounded-btn-white">REGISTER INTEREST</a>
					<a href="wla-page-forfirms.html" class="wla-unbounded-btn-ghost-white">BE A WLA PARTNER FIRM</a>
				</div>
			</div>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * World Immigration Alliance Page Shortcode
	 *
	 * Displays the WIA immigration co-practice page
	 *
	 * Shortcode: [wla_wia_page]
	 *
	 * @return string
	 */
	public function wla_wia_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-wia-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-wia-hero">
				<div class="wla-wia-hero-bg"></div>
				<div class="wla-wia-hero-overlay"></div>
				<div class="wla-wia-hero-content">
					<div class="wla-wia-hero-eyebrow">A WLA INSTITUTIONAL PROGRAMME · EST. 2018</div>
					<h1 class="wla-wia-hero-title">WORLD<br>IMMIGRATION<br>ALLIANCE™</h1>
					<p class="wla-wia-hero-sub">The global immigration co-practice network. WIA coordinates visa, work permit, investor residence, and citizenship applications across 90+ jurisdictions — simultaneously, under one institutional framework.</p>
					<div class="wla-wia-hero-buttons">
						<a href="wla-specialist.html" class="wla-wia-btn-white">FIND AN IMMIGRATION SPECIALIST</a>
						<a href="wla-page-immigration.html" class="wla-wia-btn-ghost-white">IMMIGRATION PRACTICE</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- THE WIA DISTINCTION                                         -->
			<!-- ============================================================ -->
			<section class="wla-wia-section">
				<div class="wla-wia-container">
					<div class="wla-wia-distinction-grid">
						<div class="wla-wia-distinction-text">
							<div class="wla-wia-eyebrow">THE WIA DISTINCTION</div>
							<h2 class="wla-wia-heading">IMMIGRATION IS NOT<br>A SINGLE COUNTRY<br>PROBLEM.</h2>
							<p class="wla-wia-body">A company relocating 200 employees across UAE, India, UK, Singapore, Germany, and Canada does not have six separate immigration problems. It has one workforce mobility programme — that happens to require six simultaneous legal mandates.</p>
							<p class="wla-wia-body">WIA is the only institutional framework that coordinates all six simultaneously — one programme director, one coordination point, one institutional standard across every destination jurisdiction.</p>
						</div>
						<div class="wla-wia-distinction-stats">
							<div class="wla-wia-stats-box">
								<div class="wla-wia-eyebrow">WIA KEY FACTS</div>
								<div class="wla-wia-stats-grid">
									<div class="wla-wia-stat">
										<div class="wla-wia-stat-number">90+</div>
										<div class="wla-wia-stat-label">Jurisdictions</div>
									</div>
									<div class="wla-wia-stat">
										<div class="wla-wia-stat-number">48H</div>
										<div class="wla-wia-stat-label">Response Standard</div>
									</div>
									<div class="wla-wia-stat">
										<div class="wla-wia-stat-number">One</div>
										<div class="wla-wia-stat-label">Coordination Point</div>
									</div>
									<div class="wla-wia-stat">
										<div class="wla-wia-stat-number wla-wia-stat-number--green">WIA™</div>
										<div class="wla-wia-stat-label">Institutional Mark</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- WIA PRACTICE AREAS                                          -->
			<!-- ============================================================ -->
			<section class="wla-wia-section wla-wia-section--alt">
				<div class="wla-wia-container">
					<div class="wla-wia-eyebrow">WIA PRACTICE AREAS</div>
					<h2 class="wla-wia-heading">EVERY DIMENSION<br>OF GLOBAL MOBILITY.</h2>
					<div class="wla-wia-practice-grid">
						<div class="wla-wia-practice-card">
							<div class="wla-wia-practice-card-number">CORPORATE MOBILITY</div>
							<div class="wla-wia-practice-card-title">WORKFORCE RELOCATION</div>
							<p class="wla-wia-practice-card-body">Multi-jurisdiction work permit and visa programmes for corporate workforce relocations — coordinated simultaneously across every destination jurisdiction under one WIA framework.</p>
						</div>
						<div class="wla-wia-practice-card">
							<div class="wla-wia-practice-card-number">INVESTOR RESIDENCE</div>
							<div class="wla-wia-practice-card-title">GOLDEN VISA &amp; RESIDENCE</div>
							<p class="wla-wia-practice-card-body">Investor residence programmes — UAE Golden Visa, Portugal ARI, Greece Golden Visa, Malta MRVP, and 40+ other investor residence routes. WIA advises on programme selection and coordinates all applications.</p>
						</div>
						<div class="wla-wia-practice-card">
							<div class="wla-wia-practice-card-number">CITIZENSHIP</div>
							<div class="wla-wia-practice-card-title">CITIZENSHIP BY INVESTMENT</div>
							<p class="wla-wia-practice-card-body">Citizenship by investment programmes — St Kitts, Antigua, Vanuatu, Malta, and others. WIA coordinates due diligence, application, and naturalisation across all active CBI jurisdictions.</p>
						</div>
						<div class="wla-wia-practice-card">
							<div class="wla-wia-practice-card-number">PROFESSIONAL</div>
							<div class="wla-wia-practice-card-title">EXECUTIVE &amp; PROFESSIONAL VISAS</div>
							<p class="wla-wia-practice-card-body">Senior executive and specialist professional visa applications — UK Skilled Worker, US O-1 and EB-1, UAE Professional, Germany Specialist, and equivalents coordinated simultaneously.</p>
						</div>
						<div class="wla-wia-practice-card">
							<div class="wla-wia-practice-card-number">DIGITAL NOMAD</div>
							<div class="wla-wia-practice-card-title">REMOTE WORK &amp; D8 VISAS</div>
							<p class="wla-wia-practice-card-body">Digital nomad and remote work visas — Portugal D8, Spain Digital Nomad Visa, UAE Remote Work Visa, and equivalents. WIA advises on programme selection for internationally mobile professionals.</p>
						</div>
						<div class="wla-wia-practice-card">
							<div class="wla-wia-practice-card-number">FAMILY</div>
							<div class="wla-wia-practice-card-title">FAMILY REUNIFICATION</div>
							<p class="wla-wia-practice-card-body">Family reunification applications coordinated across all relevant jurisdictions — accompanying dependents, spouse visas, and long-term residency for internationally mobile families.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- CTA BAND                                                     -->
			<!-- ============================================================ -->
			<div class="wla-wia-cta-band">
				<div class="wla-wia-cta-title">WIA IMMIGRATION SPECIALIST.<br>CONFIRMED IN 48 HOURS.</div>
				<div class="wla-wia-cta-buttons">
					<a href="wla-specialist.html" class="wla-wia-btn-white">FIND A WIA SPECIALIST</a>
					<a href="wla-page-contact.html" class="wla-wia-btn-ghost-white">CONTACT WIA</a>
				</div>
			</div>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * UNBOUNDED Forum Page Shortcode
	 *
	 * Displays the WLA UNBOUNDED Annual Global Forum page
	 *
	 * Shortcode: [wla_forums_page]
	 *
	 * @return string
	 */
	public function wla_forums_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-forums-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-forums-hero">
				<div class="wla-forums-hero-img"></div>
				<div class="wla-forums-hero-grad"></div>
				<div class="wla-forums-seats-pill">
					<div class="wla-forums-sp-dot"></div>
					<span class="wla-forums-sp-text">58 SPOTS REMAINING</span>
				</div>
				<div class="wla-forums-hero-content">
					<div class="wla-forums-h-edition">FOURTH EDITION · ANNUAL GLOBAL FORUM · WORLD LAW ALLIANCE</div>
					<div class="wla-forums-h-logo-big">UNBOUNDED™</div>
					<div class="wla-forums-h-sub">BARCELONA · 2026</div>
					<div class="wla-forums-countdown" id="wlaForumsCountdown">
						<div class="wla-forums-cd-unit">
							<div class="wla-forums-cd-n" id="wlaForumsCdD">00</div>
							<div class="wla-forums-cd-l">Days</div>
						</div>
						<div class="wla-forums-cd-unit">
							<div class="wla-forums-cd-n" id="wlaForumsCdH">00</div>
							<div class="wla-forums-cd-l">Hours</div>
						</div>
						<div class="wla-forums-cd-unit">
							<div class="wla-forums-cd-n" id="wlaForumsCdM">00</div>
							<div class="wla-forums-cd-l">Minutes</div>
						</div>
						<div class="wla-forums-cd-unit">
							<div class="wla-forums-cd-n" id="wlaForumsCdS">00</div>
							<div class="wla-forums-cd-l">Seconds</div>
						</div>
					</div>
					<div class="wla-forums-hero-meta">
						<div class="wla-forums-hm-item">
							<div class="wla-forums-hm-icon">📅</div>
							14–15 August 2026
						</div>
						<div class="wla-forums-hm-item">
							<div class="wla-forums-hm-icon">📍</div>
							Hyatt Regency Barcelona Tower
						</div>
						<div class="wla-forums-hm-item">
							<div class="wla-forums-hm-icon">👥</div>
							200 Delegates
						</div>
						<div class="wla-forums-hm-item">
							<div class="wla-forums-hm-icon">🏆</div>
							HONORS 2026 Gala Evening
						</div>
					</div>
					<div class="wla-forums-hero-btns">
						<a href="#register" class="wla-forums-btn-gold-lg">REGISTER NOW — 58 SPOTS</a>
						<a href="#agenda" class="wla-forums-btn-ghost-w">VIEW FULL AGENDA</a>
						<a href="#past" class="wla-forums-btn-ghost-w">PAST EDITIONS</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- ABOUT UNBOUNDED                                              -->
			<!-- ============================================================ -->
			<section class="wla-forums-section wla-forums-section--white wla-forums-animate">
				<div class="wla-forums-container">
					<div class="wla-forums-about-grid">
						<div class="wla-forums-about-text">
							<div class="wla-forums-eyebrow-m">ABOUT UNBOUNDED™</div>
							<h2 class="wla-forums-sh-dark">THE WORLD'S MOST IMPORTANT GATHERING OF INDEPENDENT LEGAL MINDS.</h2>
							<p class="wla-forums-sp-dark">UNBOUNDED™ is not a legal conference. It is the convening institution of global independent legal practice — where managing partners, General Counsel, institutional investors, and policy makers shape the future of cross-border law. Two days. One annual gathering. Every year in a different world city.</p>
							<div class="wla-forums-about-cta">
								<a href="#register" class="wla-forums-btn-ink">REGISTER FOR BARCELONA 2026</a>
							</div>
						</div>
						<div class="wla-forums-about-stats">
							<div class="wla-forums-about-stat">
								<div class="wla-forums-about-stat-number">4th</div>
								<div class="wla-forums-about-stat-label">Annual Edition</div>
							</div>
							<div class="wla-forums-about-stat wla-forums-about-stat--dark">
								<div class="wla-forums-about-stat-number">200</div>
								<div class="wla-forums-about-stat-label">Delegates Cap</div>
							</div>
							<div class="wla-forums-about-stat wla-forums-about-stat--off">
								<div class="wla-forums-about-stat-number">60+</div>
								<div class="wla-forums-about-stat-label">Jurisdictions</div>
							</div>
							<div class="wla-forums-about-stat">
								<div class="wla-forums-about-stat-number">3</div>
								<div class="wla-forums-about-stat-label">Past Editions</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- PAST EDITIONS                                                -->
			<!-- ============================================================ -->
			<div class="wla-forums-rule"></div>
			<section class="wla-forums-section wla-forums-section--white wla-forums-section--past wla-forums-animate" id="past">
				<div class="wla-forums-container">
					<div class="wla-forums-eyebrow-m">PAST EDITIONS</div>
					<h2 class="wla-forums-sh-dark">THREE CITIES.<br>THREE DEFINING GATHERINGS.</h2>
				</div>
				<div class="wla-forums-editions-scroll" id="wlaForumsEdScroll">
					<div class="wla-forums-editions-track">
						<div class="wla-forums-ed-card wla-forums-ed-card--upcoming">
							<img class="wla-forums-ed-img" src="https://images.unsplash.com/photo-1539037116277-4db20889f2d4?w=800&q=80" alt="Barcelona">
							<div class="wla-forums-ed-grad"></div>
							<div class="wla-forums-ed-body">
								<div class="wla-forums-ed-year">2026</div>
								<div class="wla-forums-ed-city">BARCELONA</div>
								<div class="wla-forums-ed-meta">14–15 August · Hyatt Regency · 200 Delegates</div>
								<div class="wla-forums-ed-tag">REGISTRATION OPEN</div>
							</div>
						</div>
						<div class="wla-forums-ed-card">
							<img class="wla-forums-ed-img" src="https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=800&q=80" alt="Singapore">
							<div class="wla-forums-ed-grad"></div>
							<div class="wla-forums-ed-body">
								<div class="wla-forums-ed-year">2025</div>
								<div class="wla-forums-ed-city">SINGAPORE</div>
								<div class="wla-forums-ed-meta">Marina Bay Sands · 180 Delegates · WLA Intelligence Launched</div>
								<div class="wla-forums-ed-tag">COMPLETED</div>
							</div>
						</div>
						<div class="wla-forums-ed-card">
							<img class="wla-forums-ed-img" src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=800&q=80" alt="London">
							<div class="wla-forums-ed-grad"></div>
							<div class="wla-forums-ed-body">
								<div class="wla-forums-ed-year">2024</div>
								<div class="wla-forums-ed-city">LONDON</div>
								<div class="wla-forums-ed-meta">The Ned · 150 Delegates · HONORS Inaugural Gala</div>
								<div class="wla-forums-ed-tag">COMPLETED</div>
							</div>
						</div>
						<div class="wla-forums-ed-card">
							<img class="wla-forums-ed-img" src="https://images.unsplash.com/photo-1518684079-3c830dcef090?w=800&q=80" alt="Dubai">
							<div class="wla-forums-ed-grad"></div>
							<div class="wla-forums-ed-body">
								<div class="wla-forums-ed-year">2023</div>
								<div class="wla-forums-ed-city">DUBAI</div>
								<div class="wla-forums-ed-meta">Burj Al Arab · 120 Delegates · First Edition</div>
								<div class="wla-forums-ed-tag">COMPLETED</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wla-forums-editions-hint">
					<div class="wla-forums-editions-hint-line"></div>
					DRAG TO EXPLORE
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- AGENDA                                                       -->
			<!-- ============================================================ -->
			<section class="wla-forums-section wla-forums-section--dark wla-forums-animate" id="agenda">
				<div class="wla-forums-container">
					<div class="wla-forums-eyebrow-g">FULL AGENDA</div>
					<h2 class="wla-forums-sh-white">TWO DAYS.<br>BARCELONA. AUGUST 2026.</h2>
					<div class="wla-forums-agenda-grid">
						<div class="wla-forums-ag-times">
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">09:00</div>
								<div class="wla-forums-ag-day">DAY 1 · 14 AUG</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">10:30</div>
								<div class="wla-forums-ag-day">DAY 1</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">13:00</div>
								<div class="wla-forums-ag-day">DAY 1</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">14:30</div>
								<div class="wla-forums-ag-day">DAY 1</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">16:30</div>
								<div class="wla-forums-ag-day">DAY 1</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">20:00</div>
								<div class="wla-forums-ag-day">DAY 1 · EVENING</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">09:00</div>
								<div class="wla-forums-ag-day">DAY 2 · 15 AUG</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">11:00</div>
								<div class="wla-forums-ag-day">DAY 2</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">14:00</div>
								<div class="wla-forums-ag-day">DAY 2</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">16:00</div>
								<div class="wla-forums-ag-day">DAY 2</div>
							</div>
							<div class="wla-forums-ag-time-item">
								<div class="wla-forums-ag-time">19:30</div>
								<div class="wla-forums-ag-day">DAY 2 · GALA</div>
							</div>
						</div>
						<div class="wla-forums-ag-sessions">
							<div class="wla-forums-ag-session wla-forums-ag-session--keynote">
								<div class="wla-forums-as-tag">KEYNOTE</div>
								<div class="wla-forums-as-title">THE STATE OF GLOBAL INDEPENDENT LEGAL PRACTICE 2026</div>
								<div class="wla-forums-as-desc">WLA Founding Address · State of the institution · Strategic priorities · The year ahead</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">PLENARY</div>
								<div class="wla-forums-as-title">THE GULF-CEE CORRIDOR: HOW SOVEREIGN CAPITAL IS RESHAPING CENTRAL EUROPEAN LAW</div>
								<div class="wla-forums-as-desc">Panel: WLA UAE · WLA Poland · WLA Romania · WLA Czech Republic · Institutional Investor</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">LUNCH</div>
								<div class="wla-forums-as-title">WORKING LUNCH — BY PRACTICE GROUP</div>
								<div class="wla-forums-as-desc">12 practice group tables · Facilitated by WLA practice group leads</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">BREAKOUTS</div>
								<div class="wla-forums-as-title">CO-PRACTICE PROTOCOL — LIVE CASE STUDIES</div>
								<div class="wla-forums-as-desc">Three simultaneous breakout sessions: M&A Co-Practice · Immigration Co-Practice · Disputes Co-Practice</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">PLENARY</div>
								<div class="wla-forums-as-title">WLA INTELLIGENCE PLATFORM: WHERE ARE WE GOING IN 2027?</div>
								<div class="wla-forums-as-desc">AI roadmap · New jurisdiction coverage · API launch · Practitioner contribution model</div>
							</div>
							<div class="wla-forums-ag-session wla-forums-ag-session--keynote">
								<div class="wla-forums-as-tag">GALA DINNER · EVENING</div>
								<div class="wla-forums-as-title">UNBOUNDED™ DAY ONE DINNER — HOTEL ARTS BARCELONA</div>
								<div class="wla-forums-as-desc">Waterfront · Exclusive to delegates · Dress: smart evening</div>
							</div>
							<div class="wla-forums-ag-session wla-forums-ag-session--keynote">
								<div class="wla-forums-as-tag">KEYNOTE · DAY 2</div>
								<div class="wla-forums-as-title">THE FUTURE OF INDEPENDENT LEGAL PRACTICE IN A WORLD OF AI</div>
								<div class="wla-forums-as-desc">External keynote · Global legal market outlook · Q&A</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">GC FORUM</div>
								<div class="wla-forums-as-title">GENERAL COUNSEL ROUNDTABLE — CLOSED SESSION</div>
								<div class="wla-forums-as-desc">In-house General Counsel only · Facilitated discussion · No recording · Chatham House Rules</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">WORKSHOP</div>
								<div class="wla-forums-as-title">WLA ACCREDITATION — APPLYING FOR DISTINGUISHED AND ANCHOR STATUS</div>
								<div class="wla-forums-as-desc">Open to all WLA partner firms · Standards review · Q&A with WLA Accreditation Committee</div>
							</div>
							<div class="wla-forums-ag-session">
								<div class="wla-forums-as-tag">CLOSING PLENARY</div>
								<div class="wla-forums-as-title">WLA 2027 — STRATEGY, NEW JURISDICTIONS, AND THE ROAD AHEAD</div>
								<div class="wla-forums-as-desc">WLA leadership · New partner firm announcements · Forum 2027 city revealed</div>
							</div>
							<div class="wla-forums-ag-session wla-forums-ag-session--keynote">
								<div class="wla-forums-as-tag">HONORS 2026 GALA · BLACK TIE</div>
								<div class="wla-forums-as-title">UNBOUNDED™ HONORS 2026 — OFFICIAL AWARDS GALA EVENING</div>
								<div class="wla-forums-as-desc">Hyatt Regency Barcelona Tower · Awards ceremony · Dinner · All delegates · Black tie optional</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SPEAKERS                                                     -->
			<!-- ============================================================ -->
			<section class="wla-forums-section wla-forums-section--off wla-forums-animate">
				<div class="wla-forums-container">
					<div class="wla-forums-eyebrow-m">SPEAKERS &amp; DELEGATES</div>
					<h2 class="wla-forums-sh-dark">THE PRACTITIONERS<br>SHAPING GLOBAL LAW.</h2>
					<p class="wla-forums-sp-dark">UNBOUNDED™ speakers are WLA partner firm managing partners, General Counsel from multinational companies, and institutional investors actively working at the intersection of cross-border law and global capital.</p>
					<div class="wla-forums-speakers-grid">
						
						<!-- Speaker 1 -->
						<div class="wla-forums-flip-wrap">
							<div class="wla-forums-flip-inner">
								<div class="wla-forums-flip-front">
									<img src="https://worldlawalliance.com/wp-content/uploads/2025/10/Akshay-Singhi-WLA-Member-scaled.jpg" alt="Akshay Singhi">
									<div class="wla-forums-ff-info">
										<div class="wla-forums-ff-name">AKSHAY SINGHI</div>
										<div class="wla-forums-ff-role">Senior Partner</div>
										<div class="wla-forums-ff-firm">S.K. Singhi &amp; Partners · India</div>
									</div>
								</div>
								<div class="wla-forums-flip-back">
									<div class="wla-forums-fb-tag">WLA INDIA · SPEAKER</div>
									<div class="wla-forums-fb-name">AKSHAY SINGHI</div>
									<p class="wla-forums-fb-bio">Leads one of India's most respected independent practices. Speaking on the EU-India corridor and the DPDP compliance framework for international companies.</p>
									<div class="wla-forums-fb-jur">WLA INDIA — NEW DELHI</div>
								</div>
							</div>
						</div>
						
						<!-- Speaker 2 -->
						<div class="wla-forums-flip-wrap">
							<div class="wla-forums-flip-inner">
								<div class="wla-forums-flip-front">
									<img src="https://worldlawalliance.com/wp-content/uploads/2025/10/Dawid-Sokolowski-WLA-Member-scaled.jpg" alt="Dawid Sokolowski">
									<div class="wla-forums-ff-info">
										<div class="wla-forums-ff-name">DAWID SOKOLOWSKI</div>
										<div class="wla-forums-ff-role">Managing Partner</div>
										<div class="wla-forums-ff-firm">Sokolowski &amp; Partners · Poland</div>
									</div>
								</div>
								<div class="wla-forums-flip-back">
									<div class="wla-forums-fb-tag">WLA POLAND · KEYNOTE</div>
									<div class="wla-forums-fb-name">DAWID SOKOLOWSKI</div>
									<p class="wla-forums-fb-bio">Pioneer of the Gulf-CEE legal corridor. Speaking on how WLA's co-practice protocol closed €340M of inbound Gulf investment into Poland in 2025.</p>
									<div class="wla-forums-fb-jur">WLA POLAND — WARSAW</div>
								</div>
							</div>
						</div>
						
						<!-- Speaker 3 -->
						<div class="wla-forums-flip-wrap">
							<div class="wla-forums-flip-inner">
								<div class="wla-forums-flip-front">
									<img src="https://worldlawalliance.com/wp-content/uploads/2025/11/Natacha-Auvertin-WLA-Member.jpg" alt="Natacha Auvertin">
									<div class="wla-forums-ff-info">
										<div class="wla-forums-ff-name">NATACHA AUVERTIN</div>
										<div class="wla-forums-ff-role">Partner</div>
										<div class="wla-forums-ff-firm">WLA Switzerland · Geneva</div>
									</div>
								</div>
								<div class="wla-forums-flip-back">
									<div class="wla-forums-fb-tag">WLA SWITZERLAND · SPEAKER</div>
									<div class="wla-forums-fb-name">NATACHA AUVERTIN</div>
									<p class="wla-forums-fb-bio">Leading WLA's private clients practice development in Western Europe. Speaking on the 2026 Golden Visa landscape and HNW mobility structuring post-Portugal programme closure.</p>
									<div class="wla-forums-fb-jur">WLA SWITZERLAND — GENEVA</div>
								</div>
							</div>
						</div>
						
						<!-- Speaker 4 -->
						<div class="wla-forums-flip-wrap">
							<div class="wla-forums-flip-inner">
								<div class="wla-forums-flip-front">
									<img src="https://worldlawalliance.com/wp-content/uploads/2025/10/Evelyn-W.-Njiru-WLA-Member.jpg" alt="Evelyn Njiru">
									<div class="wla-forums-ff-info">
										<div class="wla-forums-ff-name">EVELYN W. NJIRU</div>
										<div class="wla-forums-ff-role">Head of Corporate Law</div>
										<div class="wla-forums-ff-firm">WLA Kenya · Nairobi</div>
									</div>
								</div>
								<div class="wla-forums-flip-back">
									<div class="wla-forums-fb-tag">WLA KENYA · SPEAKER</div>
									<div class="wla-forums-fb-name">EVELYN W. NJIRU</div>
									<p class="wla-forums-fb-bio">East Africa's most prominent WLA partner. Speaking on the UK-Africa corridor and the critical minerals legal framework emerging across East and Southern Africa in 2026.</p>
									<div class="wla-forums-fb-jur">WLA KENYA — NAIROBI</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="wla-forums-speakers-cta">
						<a href="wla-about.html" class="wla-forums-btn-ink">VIEW ALL SPEAKERS →</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- REGISTRATION                                                 -->
			<!-- ============================================================ -->
			<section class="wla-forums-section wla-forums-section--white wla-forums-section--register wla-forums-animate" id="register">
				<div class="wla-forums-container">
					<div class="wla-forums-eyebrow-m">REGISTRATION</div>
					<h2 class="wla-forums-sh-dark">SECURE YOUR PLACE.<br>58 SPOTS REMAINING.</h2>
					<div class="wla-forums-reg-layout">
						<div class="wla-forums-reg-left">
							<div class="wla-forums-seat-section">
								<div class="wla-forums-seat-label">
									<span>SEAT AVAILABILITY</span>
									<span class="wla-forums-seat-count">58 / 200 REMAINING</span>
								</div>
								<div class="wla-forums-seat-bar">
									<div class="wla-forums-seat-fill" id="wlaForumsSeatFill" data-w="71"></div>
								</div>
							</div>
							<div class="wla-forums-ticket-label">SELECT TICKET TYPE</div>
							<div class="wla-forums-ticket-tiers">
								<div class="wla-forums-tt wla-forums-tt--sel" onclick="wlaForumsSelectTt(this)">
									<div>
										<div class="wla-forums-tt-name">WLA PARTNER FIRM</div>
										<div class="wla-forums-tt-avail">Managing partner or designated delegate</div>
									</div>
									<div class="wla-forums-tt-right">
										<div class="wla-forums-tt-price">Complimentary</div>
										<div class="wla-forums-tt-spots">38 spots left</div>
									</div>
								</div>
								<div class="wla-forums-tt" onclick="wlaForumsSelectTt(this)">
									<div>
										<div class="wla-forums-tt-name">GENERAL COUNSEL</div>
										<div class="wla-forums-tt-avail">In-house GC or Head of Legal</div>
									</div>
									<div class="wla-forums-tt-right">
										<div class="wla-forums-tt-price">Complimentary</div>
										<div class="wla-forums-tt-spots">12 spots left</div>
									</div>
								</div>
								<div class="wla-forums-tt" onclick="wlaForumsSelectTt(this)">
									<div>
										<div class="wla-forums-tt-name">INSTITUTIONAL GUEST</div>
										<div class="wla-forums-tt-avail">Investor, DFI, or institutional invitee</div>
									</div>
									<div class="wla-forums-tt-right">
										<div class="wla-forums-tt-price">By invitation</div>
										<div class="wla-forums-tt-spots">8 spots left</div>
									</div>
								</div>
								<div class="wla-forums-tt wla-forums-tt--sold">
									<div>
										<div class="wla-forums-tt-name">GENERAL ADMISSION</div>
										<div class="wla-forums-tt-avail">Non-WLA legal professional</div>
									</div>
									<div class="wla-forums-tt-right">
										<div class="wla-forums-tt-price">€2,400</div>
										<div class="wla-forums-tt-spots wla-forums-tt-spots--sold">SOLD OUT</div>
									</div>
								</div>
							</div>
						</div>
						<div class="wla-forums-reg-right">
							<div class="wla-forums-reg-form-title">YOUR REGISTRATION DETAILS</div>
							<div class="wla-forums-reg-form">
								<div class="wla-forums-rf-row">
									<input type="text" class="wla-forums-rf-input" placeholder="First name">
									<input type="text" class="wla-forums-rf-input" placeholder="Last name">
								</div>
								<input type="email" class="wla-forums-rf-input" placeholder="Professional email">
								<input type="text" class="wla-forums-rf-input" placeholder="Firm / Organisation name">
								<div class="wla-forums-rf-row">
									<input type="text" class="wla-forums-rf-input" placeholder="Jurisdiction / Country">
									<select class="wla-forums-rf-input wla-forums-rf-select">
										<option value="">Role</option>
										<option>Managing Partner</option>
										<option>Partner</option>
										<option>General Counsel</option>
										<option>Head of Legal</option>
										<option>Associate</option>
										<option>Investor / DFI</option>
									</select>
								</div>
								<input type="text" class="wla-forums-rf-input" placeholder="Dietary requirements (optional)">
								<button class="wla-forums-rf-submit">SUBMIT REGISTRATION</button>
								<div class="wla-forums-rf-note">WLA will confirm your place within 48 hours. Registration is subject to approval for non-partner categories.</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SPONSORS                                                     -->
			<!-- ============================================================ -->
			<div class="wla-forums-sponsors-bg">
				<div class="wla-forums-sponsors-container">
					<div class="wla-forums-sponsors-label">UNBOUNDED™ PARTNERS &amp; SPONSORS 2026</div>
				</div>
				<div class="wla-forums-sponsor-track">
					<span class="wla-forums-spi">HYATT REGENCY BARCELONA</span>
					<span class="wla-forums-spi">BARCELONA CONVENTION BUREAU</span>
					<span class="wla-forums-spi">WLA INTELLIGENCE PLATFORM</span>
					<span class="wla-forums-spi">LEGAL WEEK</span>
					<span class="wla-forums-spi">PRACTICALLAW</span>
					<span class="wla-forums-spi">WLA GLOBAL FORUM</span>
					<span class="wla-forums-spi">UNBOUNDED HONORS</span>
					<span class="wla-forums-spi">WORLD LEGAL SUMMIT</span>
					<span class="wla-forums-spi">HYATT REGENCY BARCELONA</span>
					<span class="wla-forums-spi">BARCELONA CONVENTION BUREAU</span>
					<span class="wla-forums-spi">WLA INTELLIGENCE PLATFORM</span>
					<span class="wla-forums-spi">LEGAL WEEK</span>
					<span class="wla-forums-spi">PRACTICALLAW</span>
					<span class="wla-forums-spi">WLA GLOBAL FORUM</span>
					<span class="wla-forums-spi">UNBOUNDED HONORS</span>
					<span class="wla-forums-spi">WORLD LEGAL SUMMIT</span>
				</div>
			</div>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Corridor Secretariat Page Shortcode
	 *
	 * Displays the WLA Corridor Secretariat institutional governance page
	 *
	 * Shortcode: [wla_governance_page]
	 *
	 * @return string
	 */
	public function wla_governance_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-governance-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-governance-hero">
				<div class="wla-governance-hero-bg"></div>
				<div class="wla-governance-hero-overlay"></div>
				<div class="wla-governance-hero-content">
					<div class="wla-governance-hero-eyebrow">WLA INSTITUTION · GOVERNANCE</div>
					<h1 class="wla-governance-hero-title">WLA CORRIDOR<br>SECRETARIAT.</h1>
					<p class="wla-governance-hero-sub">The institutional governance framework that maintains WLA accreditation standards, coordinates the corridor programme, and manages the annual review of every Founding Corridor Lead designation.</p>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- THE SECRETARIAT                                             -->
			<!-- ============================================================ -->
			<section class="wla-governance-section">
				<div class="wla-governance-container">
					<div class="wla-governance-secretariat-grid">
						<div class="wla-governance-secretariat-text">
							<div class="wla-governance-eyebrow">THE SECRETARIAT</div>
							<h2 class="wla-governance-heading">HOW WLA<br>IS GOVERNED.</h2>
							<p class="wla-governance-body">WLA Corridor Secretariat is the operational hub of the WLA institutional framework — responsible for maintaining accreditation standards, coordinating co-practice activations, managing the annual corridor review cycle, and supporting the Founding Corridor Lead programme.</p>
							<p class="wla-governance-body">The Secretariat operates from WLA's Central Command in New Delhi. All client briefs, partner firm enquiries, corridor activations, and accreditation matters are coordinated through the Secretariat.</p>
							<p class="wla-governance-body">WLA Corridor Secretariat is not a law firm and does not provide legal advice. Legal services are provided exclusively by the independent WLA partner firms.</p>
						</div>
						<div class="wla-governance-secretariat-functions">
							<div class="wla-governance-function-item">
								<div class="wla-governance-eyebrow">ACCREDITATION</div>
								<p class="wla-governance-body-sm">The Secretariat maintains the WLA Qualified accreditation standard — the four-criteria framework against which every WLA partner firm is independently assessed annually.</p>
							</div>
							<div class="wla-governance-function-item">
								<div class="wla-governance-eyebrow">CORRIDOR ACTIVATION</div>
								<p class="wla-governance-body-sm">When a client brief arrives, the Secretariat identifies the relevant Corridor Leads and activates both sides simultaneously — within 48 hours of receipt.</p>
							</div>
							<div class="wla-governance-function-item">
								<div class="wla-governance-eyebrow">ANNUAL CORRIDOR REVIEW</div>
								<p class="wla-governance-body-sm">The Secretariat conducts the annual corridor review — assessing each Founding Corridor Lead's responsiveness, intelligence contributions, bilateral engagement quality, and accreditation compliance.</p>
							</div>
							<div class="wla-governance-function-item wla-governance-function-item--last">
								<div class="wla-governance-eyebrow">CONFLICT AND CLIENT PROTOCOL</div>
								<p class="wla-governance-body-sm">All co-practice activations are subject to conflict checks at each involved firm. Client consent governs every matter. The Secretariat coordinates the conflict clearance process without being a party to any legal engagement.</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- WLA QUALIFIED STANDARD                                      -->
			<!-- ============================================================ -->
			<section class="wla-governance-section wla-governance-section--alt">
				<div class="wla-governance-container">
					<div class="wla-governance-eyebrow">THE WLA QUALIFIED STANDARD</div>
					<h2 class="wla-governance-heading wla-governance-heading--max">FOUR CRITERIA.<br>INDEPENDENTLY ASSESSED.<br>ANNUALLY REVIEWED.</h2>
					<div class="wla-governance-criteria-grid">
						<div class="wla-governance-criterion">
							<div class="wla-governance-criterion-number">01</div>
							<div class="wla-governance-criterion-title">PRACTICE DEPTH</div>
							<p class="wla-governance-criterion-body">Demonstrated specialist depth in the designated practice area — genuine specialist expertise validated by practice track record.</p>
						</div>
						<div class="wla-governance-criterion">
							<div class="wla-governance-criterion-number">02</div>
							<div class="wla-governance-criterion-title">CO-PRACTICE READINESS</div>
							<p class="wla-governance-criterion-body">The firm must be genuinely prepared to co-practice — responsive and operating to the WLA 48-hour standard on every co-practice activation.</p>
						</div>
						<div class="wla-governance-criterion">
							<div class="wla-governance-criterion-number">03</div>
							<div class="wla-governance-criterion-title">JURISDICTIONAL STANDING</div>
							<p class="wla-governance-criterion-body">Good standing with the relevant regulatory authority in the jurisdiction, all required practising certificates and professional indemnity maintained.</p>
						</div>
						<div class="wla-governance-criterion">
							<div class="wla-governance-criterion-number">04</div>
							<div class="wla-governance-criterion-title">INSTITUTIONAL ALIGNMENT</div>
							<p class="wla-governance-criterion-body">Committed to the WLA institutional framework — contributing to corridor intelligence, participating in the annual review, representing WLA standards to clients.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- CTA BAND                                                     -->
			<!-- ============================================================ -->
			<div class="wla-governance-cta-band">
				<div class="wla-governance-cta-title">CONTACT WLA CORRIDOR<br>SECRETARIAT DIRECTLY.</div>
				<div class="wla-governance-cta-buttons">
					<a href="wla-page-contact.html" class="wla-governance-btn-white">CONTACT THE SECRETARIAT</a>
					<a href="wla-page-apply.html" class="wla-governance-btn-ghost-white">APPLY TO BE A PARTNER FIRM</a>
				</div>
			</div>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * How WLA Works Page Shortcode
	 *
	 * Displays the WLA Co-Practice Protocol page including:
	 * - Hero with split layout and animated flow visual
	 * - Four steps
	 * - What makes it different
	 * - Accreditation standards
	 * - Comparison table
	 * - Brief form
	 * - FAQ
	 * - Related content
	 *
	 * Shortcode: [wla_how_it_works_page]
	 *
	 * @return string
	 */
	public function wla_how_it_works_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-hiw-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-hiw-hero">
				<div class="wla-hiw-hero-left">
					<div class="wla-hiw-hero-eyebrow">WLA CO-PRACTICE PROTOCOL · HOW IT WORKS</div>
					<h1 class="wla-hiw-hero-title">BRIEF WLA. CO-PRACTICE TEAM IN 48 HOURS.</h1>
					<p class="wla-hiw-hero-description">WLA co-practice is not a referral protocol. It is an Institutional framework — pre-built infrastructure that allows independent law firms in multiple jurisdictions to jointly hold your matter as one team, under one engagement, with one standard of quality.</p>
					<div class="wla-hiw-hero-buttons">
						<a href="#brief" class="wla-hiw-btn-white">BRIEF WLA NOW — 48H</a>
						<a href="#steps" class="wla-hiw-btn-ghost-white">HOW IT WORKS</a>
					</div>
					<div class="wla-hiw-hero-stats">
						<div class="wla-hiw-hero-stat">
							<div class="wla-hiw-hero-stat-number">48H</div>
							<div class="wla-hiw-hero-stat-label">Team Confirmed</div>
						</div>
						<div class="wla-hiw-hero-stat">
							<div class="wla-hiw-hero-stat-number">1</div>
							<div class="wla-hiw-hero-stat-label">Plain Brief</div>
						</div>
						<div class="wla-hiw-hero-stat">
							<div class="wla-hiw-hero-stat-number">90+</div>
							<div class="wla-hiw-hero-stat-label">Jurisdictions</div>
						</div>
						<div class="wla-hiw-hero-stat">
							<div class="wla-hiw-hero-stat-number">0</div>
							<div class="wla-hiw-hero-stat-label">Procurement</div>
						</div>
					</div>
				</div>
				<div class="wla-hiw-hero-right">
					<div class="wla-hiw-hero-right-label">THE CO-PRACTICE JOURNEY</div>
					<div class="wla-hiw-flow-visual" id="wlaHiwFlowVis">
						<div class="wla-hiw-fv-step wla-hiw-fv-step--done" data-step="0">
							<div class="wla-hiw-fv-dot"></div>
							<div class="wla-hiw-fv-content">
								<div class="wla-hiw-fv-tag">STAGE 01 · MINUTES</div>
								<div class="wla-hiw-fv-title">YOU SUBMIT A PLAIN BRIEF</div>
								<div class="wla-hiw-fv-desc">Describe your matter in plain language — the jurisdictions, the parties, the issue. No RFP. No procurement. WLA Central Command receives it within minutes.</div>
								<div class="wla-hiw-fv-time">✓ Instant receipt</div>
							</div>
						</div>
						<div class="wla-hiw-fv-step wla-hiw-fv-step--done" data-step="1">
							<div class="wla-hiw-fv-dot"></div>
							<div class="wla-hiw-fv-content">
								<div class="wla-hiw-fv-tag">STAGE 02 · WITHIN 48 HOURS</div>
								<div class="wla-hiw-fv-title">WLA ASSEMBLES YOUR TEAM</div>
								<div class="wla-hiw-fv-desc">WLA Central Command identifies the right accredited partner firm in every required jurisdiction. You receive a single written team confirmation — not six separate responses.</div>
								<div class="wla-hiw-fv-time">✓ Written within 48h</div>
							</div>
						</div>
						<div class="wla-hiw-fv-step wla-hiw-fv-step--active" data-step="2">
							<div class="wla-hiw-fv-dot">3</div>
							<div class="wla-hiw-fv-content">
								<div class="wla-hiw-fv-tag">STAGE 03 · CO-PRACTICE LIVE</div>
								<div class="wla-hiw-fv-title">CO-PRACTICE TEAM ACTIVATED</div>
								<div class="wla-hiw-fv-desc">Partner firms across all jurisdictions jointly hold your matter — shared strategy, aligned outcomes, reporting through one WLA coordination layer. Not sub-contractors. Co-practice partners.</div>
								<div class="wla-hiw-fv-time">→ In progress</div>
							</div>
						</div>
						<div class="wla-hiw-fv-step" data-step="3">
							<div class="wla-hiw-fv-dot">4</div>
							<div class="wla-hiw-fv-content">
								<div class="wla-hiw-fv-tag">STAGE 04 · CLOSE</div>
								<div class="wla-hiw-fv-title">ONE ENGAGEMENT. EVERY BORDER.</div>
								<div class="wla-hiw-fv-desc">Every jurisdiction delivered. One bill. One relationship. One Institutional framework from brief to close. No gaps, no handoff failures, no jurisdiction left uncovered.</div>
								<div class="wla-hiw-fv-time">Brief to close</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- TICKER                                                       -->
			<!-- ============================================================ -->
			<div class="wla-hiw-ticker">
				<div class="wla-hiw-ticker-track">
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">GULF → CEE</span><span class="wla-hiw-ticker-up">+38%</span></span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">EU → INDIA</span><span class="wla-hiw-ticker-up">+34%</span></span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">GCC → SE ASIA</span><span class="wla-hiw-ticker-up">+31%</span></span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">UK → AFRICA</span><span class="wla-hiw-ticker-up">+22%</span></span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">CO-PRACTICE PROTOCOL</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">NOT A REFERRAL</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">1 FIRM PER JURISDICTION</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">WLA QUALIFIED · EVERY PARTNER</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">BRIEF TO CLOSE · 48H</span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">GULF → CEE</span><span class="wla-hiw-ticker-up">+38%</span></span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">EU → INDIA</span><span class="wla-hiw-ticker-up">+34%</span></span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">GCC → SE ASIA</span><span class="wla-hiw-ticker-up">+31%</span></span>
					<span class="wla-hiw-ticker-item"><span class="wla-hiw-ticker-label">UK → AFRICA</span><span class="wla-hiw-ticker-up">+22%</span></span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">CO-PRACTICE PROTOCOL</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">NOT A REFERRAL</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">1 FIRM PER JURISDICTION</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">WLA QUALIFIED · EVERY PARTNER</span>
					<span class="wla-hiw-ticker-item wla-hiw-ticker-item--static">BRIEF TO CLOSE · 48H</span>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- FOUR STEPS                                                   -->
			<!-- ============================================================ -->
			<section class="wla-hiw-section wla-hiw-section--white wla-hiw-animate" id="steps">
				<div class="wla-hiw-container">
					<div class="wla-hiw-eyebrow">THE CO-PRACTICE PROTOCOL</div>
					<h2 class="wla-hiw-heading">FOUR STEPS.<br>ONE INSTITUTIONAL ENGAGEMENT.</h2>
					<p class="wla-hiw-subheading">WLA co-practice is not a referral network and not a panel of preferred suppliers. It is an Institutional framework — every step designed to eliminate the gaps, delays, and accountability failures that plague conventional cross-border legal engagements.</p>
					<div class="wla-hiw-steps-grid">
						
						<!-- Step 01 -->
						<div class="wla-hiw-step-row">
							<div class="wla-hiw-step-number">01</div>
							<div class="wla-hiw-step-left">
								<div class="wla-hiw-step-tag">STEP 01 · IMMEDIATE</div>
								<div class="wla-hiw-step-title">BRIEF WLA IN PLAIN LANGUAGE</div>
								<p class="wla-hiw-step-desc">Describe your matter simply — the jurisdictions involved, the parties, the issue, and your timeline. No request for proposal. No procurement process. WLA Central Command receives your brief within minutes.</p>
								<div class="wla-hiw-step-time-badge">✓ No RFP required · No procurement delay</div>
							</div>
							<div class="wla-hiw-step-right">
								<div class="wla-hiw-step-detail-title">WHAT TO INCLUDE IN YOUR BRIEF</div>
								<ul class="wla-hiw-step-bullets">
									<li>The jurisdictions your matter touches — list all of them</li>
									<li>The parties involved and the nature of the issue</li>
									<li>Your preferred timeline and any hard deadlines</li>
									<li>Whether you need one specialist or a full co-practice team</li>
									<li>Any existing counsel relationships we should be aware of</li>
								</ul>
							</div>
						</div>
						
						<!-- Step 02 -->
						<div class="wla-hiw-step-row">
							<div class="wla-hiw-step-number">02</div>
							<div class="wla-hiw-step-left">
								<div class="wla-hiw-step-tag">STEP 02 · WITHIN 48 HOURS</div>
								<div class="wla-hiw-step-title">WLA IDENTIFIES AND CONFIRMS YOUR TEAM</div>
								<p class="wla-hiw-step-desc">WLA Central Command — operating from New Delhi and Vienna — reviews your brief and identifies the right WLA-Qualified partner firm in every required jurisdiction. You receive a single written team confirmation within 48 hours.</p>
								<div class="wla-hiw-step-time-badge">✓ Written confirmation within 48 hours</div>
							</div>
							<div class="wla-hiw-step-right">
								<div class="wla-hiw-step-detail-title">HOW WLA SELECTS THE RIGHT FIRM</div>
								<ul class="wla-hiw-step-bullets">
									<li>Jurisdiction-specific practice depth — not just proximity or availability</li>
									<li>WLA accreditation status confirmed current at time of selection</li>
									<li>Corridor experience matched to your specific cross-border need</li>
									<li>No conflicts of interest — WLA holds one firm per practice per jurisdiction</li>
									<li>Senior practitioner availability confirmed before written confirmation</li>
								</ul>
							</div>
						</div>
						
						<!-- Step 03 -->
						<div class="wla-hiw-step-row">
							<div class="wla-hiw-step-number">03</div>
							<div class="wla-hiw-step-left">
								<div class="wla-hiw-step-tag">STEP 03 · FROM DAY ONE</div>
								<div class="wla-hiw-step-title">CO-PRACTICE ACTIVATED ACROSS ALL JURISDICTIONS</div>
								<p class="wla-hiw-step-desc">Partner firms across all required jurisdictions jointly hold your matter. They are not sub-contractors receiving referral work — they are co-practice partners, jointly accountable for the outcome under the WLA Co-Practice Protocol.</p>
								<div class="wla-hiw-step-time-badge">✓ Joint accountability from day one</div>
							</div>
							<div class="wla-hiw-step-right">
								<div class="wla-hiw-step-detail-title">WHAT CO-PRACTICE MEANS IN PRACTICE</div>
								<ul class="wla-hiw-step-bullets">
									<li>Shared matter strategy — not siloed jurisdiction-by-jurisdiction advice</li>
									<li>One reporting point of contact for the full engagement</li>
									<li>Cross-jurisdiction strategy alignment built into the protocol</li>
									<li>WLA Central Command coordinates — no client management overhead</li>
									<li>All jurisdictions operating under the same Institutional quality standard</li>
								</ul>
							</div>
						</div>
						
						<!-- Step 04 -->
						<div class="wla-hiw-step-row wla-hiw-step-row--last">
							<div class="wla-hiw-step-number">04</div>
							<div class="wla-hiw-step-left">
								<div class="wla-hiw-step-tag">STEP 04 · ENGAGEMENT CLOSE</div>
								<div class="wla-hiw-step-title">ONE ENGAGEMENT. EVERY BORDER. BRIEF TO CLOSE.</div>
								<p class="wla-hiw-step-desc">Every jurisdiction delivered under one Institutional framework. One bill. One relationship. One standard of quality throughout. No gaps, no handoff failures, no jurisdiction left without the right specialist.</p>
								<div class="wla-hiw-step-time-badge">✓ Single engagement close · All jurisdictions</div>
							</div>
							<div class="wla-hiw-step-right">
								<div class="wla-hiw-step-detail-title">HOW CLOSING WORKS ACROSS BORDERS</div>
								<ul class="wla-hiw-step-bullets">
									<li>All jurisdiction deliverables coordinated through WLA Central Command</li>
									<li>Single engagement letter framework covering all jurisdictions</li>
									<li>Consolidated billing — one invoice, all jurisdictions itemised</li>
									<li>Post-engagement review — every co-practice engagement is assessed</li>
									<li>Annual accreditation review — performance feeds directly into firm standing</li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- WHAT MAKES IT DIFFERENT                                     -->
			<!-- ============================================================ -->
			<div class="wla-hiw-diff-bg wla-hiw-animate">
				<div class="wla-hiw-diff-inner">
					<div class="wla-hiw-eyebrow-dark">WHAT MAKES IT DIFFERENT</div>
					<h2 class="wla-hiw-heading-dark">NOT A REFERRAL.<br>NOT A PANEL.<br>AN INSTITUTION.</h2>
					<div class="wla-hiw-diff-rows">
						<div class="wla-hiw-diff-row">
							<div class="wla-hiw-dr-n">01</div>
							<div class="wla-hiw-dr-title">JOINTLY HELD — NOT REFERRED</div>
							<div class="wla-hiw-dr-desc">When WLA partner firms work on your matter, they <strong>jointly hold it</strong> — not refer it. The local firm in each jurisdiction is not a sub-contractor receiving a referral. They are a co-practice partner, accountable alongside every other WLA partner firm in the team for the outcome from brief to close. This single distinction is what separates WLA from every referral network on the market.</div>
						</div>
						<div class="wla-hiw-diff-row">
							<div class="wla-hiw-dr-n">02</div>
							<div class="wla-hiw-dr-title">ONE ENGAGEMENT FRAMEWORK — EVERY BORDER</div>
							<div class="wla-hiw-dr-desc">One brief. One WLA relationship. One bill. The co-practice team in every jurisdiction operates under WLA's Co-Practice Protocol — aligned on strategy, reporting through one point of contact at WLA Central Command. The client never has to manage multiple law firm relationships across multiple time zones simultaneously. <strong>WLA does that.</strong></div>
						</div>
						<div class="wla-hiw-diff-row">
							<div class="wla-hiw-dr-n">03</div>
							<div class="wla-hiw-dr-title">PRE-ACCREDITED — ANNUAL REVIEW — NO SURPRISES</div>
							<div class="wla-hiw-dr-desc">Every WLA partner firm has been reviewed against four published professional standards before any client brief reaches them. The review happens every year — it is not a one-time qualification. The designation can be lost. This means that when WLA assembles your co-practice team, <strong>the quality has already been tested</strong> — not promised by a membership brochure.</div>
						</div>
						<div class="wla-hiw-diff-row">
							<div class="wla-hiw-dr-n">04</div>
							<div class="wla-hiw-dr-title">CENTRAL COMMAND COORDINATION</div>
							<div class="wla-hiw-dr-desc">WLA Central Command — operated from New Delhi and Vienna — sits at the centre of every co-practice engagement. It selects the team, aligns strategy, manages communication, and ensures the engagement closes on standard. <strong>No other referral network has a Central Command layer.</strong> Most are just directories with a membership fee. WLA is an Institutional framework with operational infrastructure.</div>
						</div>
						<div class="wla-hiw-diff-row">
							<div class="wla-hiw-dr-n">05</div>
							<div class="wla-hiw-dr-title">ONE FIRM PER JURISDICTION — NO CONFLICTS</div>
							<div class="wla-hiw-dr-desc">WLA designates one exclusive partner firm per practice per jurisdiction. There is no competition within WLA for your matter. The firm you receive is the only WLA-accredited firm in that jurisdiction for that practice — they hold the designation because they have demonstrated they are the best independent firm in that territory for that work. No overlap. No confusion. <strong>The right firm, every time.</strong></div>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- ACCREDITATION STANDARDS                                     -->
			<!-- ============================================================ -->
			<div class="wla-hiw-std-bg wla-hiw-animate">
				<section class="wla-hiw-section">
					<div class="wla-hiw-container">
						<div class="wla-hiw-eyebrow">FOUR PUBLISHED ACCREDITATION STANDARDS</div>
						<h2 class="wla-hiw-heading">EVERY WLA PARTNER FIRM.<br>PRE-ACCREDITED. ANNUALLY REVIEWED.</h2>
						<p class="wla-hiw-subheading">Every firm in the WLA co-practice network has been reviewed against four published standards — reviewed annually. The co-practice team you receive has already been quality-tested. These standards are published openly — no black box, no hidden criteria.</p>
						<div class="wla-hiw-std-grid">
							<div class="wla-hiw-std-card">
								<div class="wla-hiw-std-number">STANDARD 01</div>
								<div class="wla-hiw-std-icon">⚖️</div>
								<div class="wla-hiw-std-title">JURISDICTIONAL STANDING</div>
								<p class="wla-hiw-std-desc">Active practice in good regulatory standing in the designated jurisdiction. Verified independently by WLA — not self-certified by the firm. Disciplinary records reviewed. Professional body membership confirmed.</p>
								<div class="wla-hiw-std-check">✓ Independently verified</div>
								<div class="wla-hiw-std-bg-n">I</div>
							</div>
							<div class="wla-hiw-std-card">
								<div class="wla-hiw-std-number">STANDARD 02</div>
								<div class="wla-hiw-std-icon">🎯</div>
								<div class="wla-hiw-std-title">QUALITY STANDARDS</div>
								<p class="wla-hiw-std-desc">Alignment with WLA professional standards across four dimensions: client care, ethics, matter management, and Co-Practice Protocol conduct. Client references reviewed. Internal standards assessed. No complaints history required.</p>
								<div class="wla-hiw-std-check">✓ Client-referenced</div>
								<div class="wla-hiw-std-bg-n">II</div>
							</div>
							<div class="wla-hiw-std-card">
								<div class="wla-hiw-std-number">STANDARD 03</div>
								<div class="wla-hiw-std-icon">🌐</div>
								<div class="wla-hiw-std-title">CO-PRACTICE ENGAGEMENT</div>
								<p class="wla-hiw-std-desc">Active participation in WLA practice groups, intelligence contribution, and cross-border matter engagement. Firms that hold the designation without co-practicing fail this standard at annual review. Designation requires active participation — not passive membership.</p>
								<div class="wla-hiw-std-check">✓ Active participation required</div>
								<div class="wla-hiw-std-bg-n">III</div>
							</div>
							<div class="wla-hiw-std-card">
								<div class="wla-hiw-std-number">STANDARD 04</div>
								<div class="wla-hiw-std-icon">📋</div>
								<div class="wla-hiw-std-title">ANNUAL REVIEW</div>
								<p class="wla-hiw-std-desc">Designation is reviewed every September against all published standards. The WLA designation can be lost — and has been on fewer than 5 occasions since 2018. Firms that no longer meet the standard are given a 90-day remediation period before designation is withdrawn.</p>
								<div class="wla-hiw-std-check">✓ Renewable — and loseable</div>
								<div class="wla-hiw-std-bg-n">IV</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- COMPARISON TABLE: WLA vs Old Model                          -->
			<!-- ============================================================ -->
			<div class="wla-hiw-compare-bg wla-hiw-animate">
				<section class="wla-hiw-section">
					<div class="wla-hiw-container">
						<div class="wla-hiw-eyebrow">WLA VS THE OLD REFERRAL MODEL</div>
						<h2 class="wla-hiw-heading">WHY THE OLD MODEL<br>NO LONGER WORKS.</h2>
						<p class="wla-hiw-subheading">Most cross-border legal "networks" are directories with a membership fee and a promise. WLA is different in every material way. Here is the comparison, side by side.</p>
						<div class="wla-hiw-compare-table-wrap">
							<table class="wla-hiw-ct">
								<thead>
									<tr>
										<th>WHAT MATTERS TO CLIENTS</th>
										<th>TRADITIONAL REFERRAL NETWORK</th>
										<th>WLA CO-PRACTICE</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><div class="wla-hiw-td-label">Accountability for outcome</div></td>
										<td class="wla-hiw-td-old"><span class="wla-hiw-x">✗</span> Referring firm only — local firm is a sub-contractor with no joint accountability</td>
										<td class="wla-hiw-td-new"><span class="wla-hiw-c">✓</span> All co-practice firms jointly hold the matter and are jointly accountable for outcome</td>
									</tr>
									<tr>
										<td><div class="wla-hiw-td-label">Quality assurance</div></td>
										<td class="wla-hiw-td-old"><span class="wla-hiw-x">✗</span> Self-certified membership — no independent review, no published standards</td>
										<td class="wla-hiw-td-new"><span class="wla-hiw-c">✓</span> Four published standards, independently reviewed, renewable annually</td>
									</tr>
									<tr>
										<td><div class="wla-hiw-td-label">Client experience across borders</div></td>
										<td class="wla-hiw-td-old"><span class="wla-hiw-x">✗</span> Multiple relationships, multiple reporting lines, multiple billing relationships</td>
										<td class="wla-hiw-td-new"><span class="wla-hiw-c">✓</span> One brief, one WLA relationship, one bill, one reporting point of contact</td>
									</tr>
									<tr>
										<td><div class="wla-hiw-td-label">Speed of assembly</div></td>
										<td class="wla-hiw-td-old"><span class="wla-hiw-x">✗</span> Client must contact multiple firms in multiple jurisdictions — weeks of procurement</td>
										<td class="wla-hiw-td-new"><span class="wla-hiw-c">✓</span> WLA assembles and confirms the full team in writing within 48 hours</td>
									</tr>
									<tr>
										<td><div class="wla-hiw-td-label">Strategic alignment across jurisdictions</div></td>
										<td class="wla-hiw-td-old"><span class="wla-hiw-x">✗</span> Each jurisdiction operates in isolation — no shared strategy, no coordination layer</td>
										<td class="wla-hiw-td-new"><span class="wla-hiw-c">✓</span> WLA Central Command aligns strategy across all jurisdictions from day one</td>
									</tr>
									<tr>
										<td><div class="wla-hiw-td-label">Exclusivity per jurisdiction</div></td>
										<td class="wla-hiw-td-old"><span class="wla-hiw-x">✗</span> Multiple member firms per jurisdiction — conflicts possible, quality uneven</td>
										<td class="wla-hiw-td-new"><span class="wla-hiw-c">✓</span> One exclusive WLA partner per practice per jurisdiction — no overlap, no conflict</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- BRIEF FORM                                                   -->
			<!-- ============================================================ -->
			<div class="wla-hiw-brief-bg" id="brief">
				<div class="wla-hiw-brief-inner wla-hiw-animate">
					<div class="wla-hiw-brief-left">
						<div class="wla-hiw-brief-eyebrow">BRIEF WLA NOW</div>
						<div class="wla-hiw-brief-title">TELL US YOUR MATTER. TEAM CONFIRMED IN 48 HOURS.</div>
						<p class="wla-hiw-brief-desc">Plain language is fine. WLA Central Command will review your brief, confirm availability across all required jurisdictions, and respond in writing within 48 hours. No procurement. No cold calls. No obligation.</p>
						<div class="wla-hiw-brief-promises">
							<div class="wla-hiw-brief-promise">Written team confirmation within 48 hours of brief receipt</div>
							<div class="wla-hiw-brief-promise">No RFP, no procurement process, no pitch required</div>
							<div class="wla-hiw-brief-promise">Every firm in your team is WLA-Qualified and annually reviewed</div>
							<div class="wla-hiw-brief-promise">One point of contact for the full engagement — WLA Central Command</div>
							<div class="wla-hiw-brief-promise">No obligation to proceed after receiving the team confirmation</div>
						</div>
					</div>
					<div class="wla-hiw-brief-right">
						<div class="wla-hiw-brief-form" id="wlaHiwBriefForm">
							<div class="wla-hiw-bf-title">SUBMIT YOUR BRIEF</div>
							<div class="wla-hiw-bf-row wla-hiw-bf-row--2col">
								<div>
									<div class="wla-hiw-bf-label">FIRST NAME</div>
									<input type="text" class="wla-hiw-bf-input" placeholder="First name">
								</div>
								<div>
									<div class="wla-hiw-bf-label">LAST NAME</div>
									<input type="text" class="wla-hiw-bf-input" placeholder="Last name">
								</div>
							</div>
							<div class="wla-hiw-bf-row">
								<div class="wla-hiw-bf-label">ORGANISATION / FIRM</div>
								<input type="text" class="wla-hiw-bf-input" placeholder="Your company or firm name">
							</div>
							<div class="wla-hiw-bf-row">
								<div class="wla-hiw-bf-label">EMAIL</div>
								<input type="email" class="wla-hiw-bf-input" placeholder="your@organisation.com">
							</div>
							<div class="wla-hiw-bf-row wla-hiw-bf-row--2col">
								<div>
									<div class="wla-hiw-bf-label">PRIMARY JURISDICTION</div>
									<input type="text" class="wla-hiw-bf-input" placeholder="e.g. India, UAE, EU">
								</div>
								<div>
									<div class="wla-hiw-bf-label">PRACTICE AREA</div>
									<select class="wla-hiw-bf-input wla-hiw-bf-select">
										<option value="">Select practice</option>
										<option>Transactional &amp; M&amp;A</option>
										<option>Intellectual Property</option>
										<option>Disputes &amp; Arbitration</option>
										<option>Insolvency &amp; Restructuring</option>
										<option>International Tax</option>
										<option>Employment &amp; Labour</option>
										<option>Immigration &amp; Mobility</option>
										<option>Private Clients &amp; HNW</option>
										<option>Technology, Data &amp; Digital</option>
										<option>Energy &amp; Infrastructure</option>
										<option>Competition &amp; Antitrust</option>
										<option>Multiple / Cross-Practice</option>
									</select>
								</div>
							</div>
							<div class="wla-hiw-bf-row">
								<div class="wla-hiw-bf-label">BRIEF YOUR MATTER (PLAIN LANGUAGE)</div>
								<textarea class="wla-hiw-bf-textarea" placeholder="Describe the jurisdictions, parties, issue, and timeline. Plain language is fine — WLA will work with whatever detail you can provide."></textarea>
							</div>
							<button class="wla-hiw-bf-submit">SUBMIT BRIEF — RESPONSE WITHIN 48H</button>
							<div class="wla-hiw-bf-note">All briefs are treated with strict confidentiality by WLA Central Command. No information is shared outside WLA without your explicit consent.</div>
						</div>
						<div class="wla-hiw-bf-success" id="wlaHiwBriefSuccess">
							<div class="wla-hiw-bf-success-icon">✓</div>
							<div class="wla-hiw-bf-success-title">BRIEF RECEIVED</div>
							<p class="wla-hiw-bf-success-desc">WLA Central Command has received your brief. You will receive a written team confirmation at your email address within 48 hours. If your matter is urgent, please call <strong>+91 9818030146</strong> directly.</p>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- FAQ                                                          -->
			<!-- ============================================================ -->
			<div class="wla-hiw-faq-bg">
				<section class="wla-hiw-section wla-hiw-animate">
					<div class="wla-hiw-container">
						<div class="wla-hiw-eyebrow">FREQUENTLY ASKED QUESTIONS</div>
						<h2 class="wla-hiw-heading">EVERYTHING YOU NEED<br>TO KNOW BEFORE BRIEFING WLA.</h2>
						<div class="wla-hiw-faq-layout">
							<div class="wla-hiw-faq-list" id="wlaHiwFaqList">
								
								<div class="wla-hiw-faq-item">
									<div class="wla-hiw-faq-q">
										<span class="wla-hiw-faq-q-text">What exactly is the difference between co-practice and a referral?</span>
										<div class="wla-hiw-faq-icon">+</div>
									</div>
									<div class="wla-hiw-faq-a">
										<div class="wla-hiw-faq-a-inner">A referral means your primary counsel passes your matter to a local firm in another jurisdiction — the local firm is a sub-contractor, your primary counsel takes no further responsibility, and you end up managing two separate relationships. WLA co-practice means both firms jointly hold the matter from the outset — both are accountable for the outcome, both operate under the same quality standard, and the client has one point of contact throughout. The difference in practice is significant: co-practice eliminates the information gaps, strategy misalignments, and accountability gaps that make cross-border legal work difficult.</div>
									</div>
								</div>
								
								<div class="wla-hiw-faq-item">
									<div class="wla-hiw-faq-q">
										<span class="wla-hiw-faq-q-text">How does WLA ensure the right firm is selected for my jurisdiction?</span>
										<div class="wla-hiw-faq-icon">+</div>
									</div>
									<div class="wla-hiw-faq-a">
										<div class="wla-hiw-faq-a-inner">WLA holds one exclusive partner firm per practice per jurisdiction — which means there is no competition within WLA for your matter. The firm you receive is the firm WLA has designated as the best independent practice in that jurisdiction for that area of law. Selection criteria include: practice depth and track record in the specific area, WLA accreditation standing, corridor experience, availability of senior practitioners, and absence of conflicts. WLA Central Command confirms all of these before issuing the written team confirmation.</div>
									</div>
								</div>
								
								<div class="wla-hiw-faq-item">
									<div class="wla-hiw-faq-q">
										<span class="wla-hiw-faq-q-text">What if I already have outside counsel in one of the jurisdictions?</span>
										<div class="wla-hiw-faq-icon">+</div>
									</div>
									<div class="wla-hiw-faq-a">
										<div class="wla-hiw-faq-a-inner">WLA can work around existing counsel relationships. If you have outside counsel in one jurisdiction but need WLA's co-practice capability in others, WLA can assemble a partial team — covering only the jurisdictions where you need it. Include details of existing relationships in your brief and WLA Central Command will structure the co-practice team accordingly. WLA does not require exclusivity across all jurisdictions on every engagement.</div>
									</div>
								</div>
								
								<div class="wla-hiw-faq-item">
									<div class="wla-hiw-faq-q">
										<span class="wla-hiw-faq-q-text">What does "WLA Qualified" mean for the firms on my team?</span>
										<div class="wla-hiw-faq-icon">+</div>
									</div>
									<div class="wla-hiw-faq-a">
										<div class="wla-hiw-faq-a-inner">WLA Qualified means the firm has been reviewed against four published standards — jurisdictional standing, quality standards, co-practice engagement, and annual review — and currently holds the WLA designation. The designation is renewed annually: firms must actively participate in WLA co-practice to maintain it. It is not a one-time membership certificate. The designation can be lost — and has been on fewer than 5 occasions since 2018. When WLA assembles your team, every firm on it holds a current WLA Qualified designation.</div>
									</div>
								</div>
								
								<div class="wla-hiw-faq-item">
									<div class="wla-hiw-faq-q">
										<span class="wla-hiw-faq-q-text">How does billing work across multiple jurisdictions?</span>
										<div class="wla-hiw-faq-icon">+</div>
									</div>
									<div class="wla-hiw-faq-a">
										<div class="wla-hiw-faq-a-inner">WLA co-practice engagements use a single engagement letter framework that covers all jurisdictions. Billing is consolidated — you receive one invoice with all jurisdiction work itemised within it. Each WLA partner firm invoices through the WLA framework rather than issuing separate invoices directly to the client. This eliminates the administrative overhead of managing multiple billing relationships and provides a single consolidated view of the full engagement cost. Fee arrangements are agreed upfront as part of the team confirmation.</div>
									</div>
								</div>
								
								<div class="wla-hiw-faq-item">
									<div class="wla-hiw-faq-q">
										<span class="wla-hiw-faq-q-text">What if my matter is urgent — can WLA respond faster than 48 hours?</span>
										<div class="wla-hiw-faq-icon">+</div>
									</div>
									<div class="wla-hiw-faq-a">
										<div class="wla-hiw-faq-a-inner">Yes. For urgent matters, call WLA Central Command directly on +91 9818030146. WLA operates across time zones from New Delhi and Vienna, which means urgent matters can be actioned outside standard business hours. The 48-hour guarantee is a maximum for standard briefs — WLA's average actual response time is 31 hours and urgent matters are typically confirmed same-day. Mark your brief as urgent when submitting and call to follow up immediately.</div>
									</div>
								</div>
								
							</div>
							<div class="wla-hiw-faq-facts">
								<div class="wla-hiw-ff-title">WLA CO-PRACTICE IN NUMBERS</div>
								<div class="wla-hiw-ff-list">
									<div class="wla-hiw-ff-item">
										<div class="wla-hiw-ff-n">48H</div>
										<div>
											<div class="wla-hiw-ff-label">Guaranteed Response</div>
											<div class="wla-hiw-ff-sub">Written team confirmation. 100% maintained across all 2025 briefs.</div>
										</div>
									</div>
									<div class="wla-hiw-ff-item">
										<div class="wla-hiw-ff-n">31H</div>
										<div>
											<div class="wla-hiw-ff-label">Average Actual Response</div>
											<div class="wla-hiw-ff-sub">The typical WLA brief-to-confirmation time in 2025 was 31 hours.</div>
										</div>
									</div>
									<div class="wla-hiw-ff-item">
										<div class="wla-hiw-ff-n">90+</div>
										<div>
											<div class="wla-hiw-ff-label">Jurisdictions Available</div>
											<div class="wla-hiw-ff-sub">One exclusive WLA partner firm per practice in every active jurisdiction.</div>
										</div>
									</div>
									<div class="wla-hiw-ff-item">
										<div class="wla-hiw-ff-n">4</div>
										<div>
											<div class="wla-hiw-ff-label">Published Standards</div>
											<div class="wla-hiw-ff-sub">All openly published. Reviewed annually. The designation can be lost.</div>
										</div>
									</div>
									<div class="wla-hiw-ff-item">
										<div class="wla-hiw-ff-n">0</div>
										<div>
											<div class="wla-hiw-ff-label">Procurement Required</div>
											<div class="wla-hiw-ff-sub">No RFP. No pitch. No procurement process. Brief us in plain language.</div>
										</div>
									</div>
									<div class="wla-hiw-ff-item">
										<div class="wla-hiw-ff-n">1</div>
										<div>
											<div class="wla-hiw-ff-label">Point of Contact</div>
											<div class="wla-hiw-ff-sub">WLA Central Command coordinates the full team across all jurisdictions.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- RELATED                                                      -->
			<!-- ============================================================ -->
			<div class="wla-hiw-related-bg">
				<section class="wla-hiw-section wla-hiw-animate">
					<div class="wla-hiw-container">
						<div class="wla-hiw-eyebrow">RELATED</div>
						<h2 class="wla-hiw-heading">EXPLORE THE<br>WLA INSTITUTION.</h2>
						<div class="wla-hiw-related-grid">
							<a href="wla-directory.html" class="wla-hiw-rel-card">
								<div class="wla-hiw-rc-tag">PARTNER DIRECTORY</div>
								<div class="wla-hiw-rc-title">ALL WLA-QUALIFIED PARTNER FIRMS</div>
								<p class="wla-hiw-rc-desc">Browse all 151 WLA-Qualified partner firms across 90+ jurisdictions. Filter by region, practice area, and accreditation level. All designations current.</p>
								<div class="wla-hiw-rc-link">VIEW PARTNER DIRECTORY →</div>
							</a>
							<a href="wla-accreditation.html" class="wla-hiw-rel-card">
								<div class="wla-hiw-rc-tag">WLA ACCREDITATION</div>
								<div class="wla-hiw-rc-title">THE FOUR PUBLISHED STANDARDS — IN FULL</div>
								<p class="wla-hiw-rc-desc">Read the full published accreditation standards. Understand exactly what every WLA partner firm has been reviewed against before joining your co-practice team.</p>
								<div class="wla-hiw-rc-link">VIEW ACCREDITATION STANDARDS →</div>
							</a>
							<a href="wla-specialist.html" class="wla-hiw-rel-card">
								<div class="wla-hiw-rc-tag">FIND A SPECIALIST</div>
								<div class="wla-hiw-rc-title">FIND THE RIGHT SPECIALIST IN ANY JURISDICTION</div>
								<p class="wla-hiw-rc-desc">Search the WLA specialist network by jurisdiction, practice area, or corridor. Find the right WLA-Qualified practitioner for your specific matter — 48 hours guaranteed.</p>
								<div class="wla-hiw-rc-link">SEARCH SPECIALISTS →</div>
							</a>
						</div>
					</div>
				</section>
			</div>

		</div>
		
		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Impact Annual Report Page Shortcode
	 *
	 * Displays the WLA Impact Report page including:
	 * - Hero with animated counters
	 * - Corridor flow analysis
	 * - Before/After slider
	 * - Growth chart
	 * - Timeline milestones
	 * - Impact metrics grid
	 * - Download report section
	 *
	 * Shortcode: [wla_impact_page]
	 *
	 * @return string
	 */
	public function wla_impact_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-impact-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-impact-hero">
				<canvas id="wlaImpactHeroBg" class="wla-impact-hero-bg-canvas"></canvas>
				<div class="wla-impact-hero-content">
					<div class="wla-impact-hero-label">WLA IMPACT REPORT · ANNUAL REVIEW 2025–2026</div>
					<h1 class="wla-impact-hero-title">THE INSTITUTION</h1>
					<div class="wla-impact-hero-year">IN NUMBERS</div>
				</div>
				<div class="wla-impact-hero-counters" id="wlaImpactHeroCounters">
					<div class="wla-impact-hc">
						<div class="wla-impact-hc-n" data-t="151" data-s="">0</div>
						<div class="wla-impact-hc-label">PARTNER FIRMS</div>
						<div class="wla-impact-hc-change">↑ 24 NEW IN 2025</div>
						<div class="wla-impact-hc-bar">
							<div class="wla-impact-hc-bar-fill" data-w="75"></div>
						</div>
					</div>
					<div class="wla-impact-hc">
						<div class="wla-impact-hc-n" data-t="90" data-s="+">0</div>
						<div class="wla-impact-hc-label">JURISDICTIONS ACTIVE</div>
						<div class="wla-impact-hc-change">↑ 12 NEW IN 2025</div>
						<div class="wla-impact-hc-bar">
							<div class="wla-impact-hc-bar-fill" data-w="90"></div>
						</div>
					</div>
					<div class="wla-impact-hc">
						<div class="wla-impact-hc-n" data-t="1240" data-s="+">0</div>
						<div class="wla-impact-hc-label">REGULATORY SIGNALS</div>
						<div class="wla-impact-hc-change">↑ 340 MORE THAN 2024</div>
						<div class="wla-impact-hc-bar">
							<div class="wla-impact-hc-bar-fill" data-w="62"></div>
						</div>
					</div>
					<div class="wla-impact-hc">
						<div class="wla-impact-hc-n" data-t="48" data-s="H">0</div>
						<div class="wla-impact-hc-label">BRIEF-TO-MATCH GUARANTEE</div>
						<div class="wla-impact-hc-change">MAINTAINED 100%</div>
						<div class="wla-impact-hc-bar">
							<div class="wla-impact-hc-bar-fill" data-w="100"></div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- CORRIDOR FLOW                                               -->
			<!-- ============================================================ -->
			<section class="wla-impact-section wla-impact-section--dark wla-impact-animate">
				<div class="wla-impact-container">
					<div class="wla-impact-eyebrow-dark">CORRIDOR FLOW ANALYSIS 2025–26</div>
					<h2 class="wla-impact-heading-dark">WHERE THE CROSS-BORDER<br>LEGAL WORK IS MOVING.</h2>
					<p class="wla-impact-sub-dark">This diagram shows the flow of co-practice mandates between WLA's six major corridors in 2025–26. Hover any arc to see corridor details. Arc thickness represents relative mandate volume.</p>
					<div class="wla-impact-chord-wrap">
						<canvas id="wlaImpactChord" width="520" height="520"></canvas>
						<div class="wla-impact-chord-tooltip" id="wlaImpactChordTip"></div>
						<div class="wla-impact-chord-legend" id="wlaImpactChordLegend"></div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- BEFORE / AFTER SLIDER                                       -->
			<!-- ============================================================ -->
			<section class="wla-impact-section wla-impact-section--white wla-impact-animate">
				<div class="wla-impact-container">
					<div class="wla-impact-eyebrow">THE WLA DIFFERENCE</div>
					<h2 class="wla-impact-heading">INDEPENDENT FIRM ALONE<br>VS. WLA PARTNER FIRM.</h2>
					<p class="wla-impact-sub">Drag the slider to compare what an independent firm looks like operating alone versus as a WLA partner firm with Institutional co-practice capability.</p>
					<div class="wla-impact-compare-wrap" id="wlaImpactCompareWrap">
						<div class="wla-impact-compare-before">
							<div class="wla-impact-compare-label wla-impact-compare-label--light">BEFORE WLA</div>
							<div class="wla-impact-compare-heading">INDEPENDENT FIRM — OPERATING ALONE</div>
							<div class="wla-impact-compare-items">
								<div class="wla-impact-ci">Refers cross-border work to unconnected foreign counsel — no joint accountability</div>
								<div class="wla-impact-ci">Limited to domestic regulatory intelligence — no cross-border signal access</div>
								<div class="wla-impact-ci">No Institutional accreditation mark — not differentiated in global client selection</div>
								<div class="wla-impact-ci">No access to co-practice mandates from institutional WLA client pipeline</div>
								<div class="wla-impact-ci">Annual Forum attendance is expensive and generic — not practitioner-specific</div>
							</div>
						</div>
						<div class="wla-impact-compare-after" id="wlaImpactCompareAfter">
							<div class="wla-impact-compare-label wla-impact-compare-label--dark">AFTER WLA</div>
							<div class="wla-impact-compare-heading wla-impact-compare-heading--dark">WLA PARTNER FIRM — GLOBALLY INSTITUTIONAL</div>
							<div class="wla-impact-compare-items">
								<div class="wla-impact-ci wla-impact-ci--dark">Jointly holds cross-border mandates with WLA partner firms — co-practice, not referral</div>
								<div class="wla-impact-ci wla-impact-ci--dark">WLA Intelligence platform — 1,240+ signals across 80+ jurisdictions daily</div>
								<div class="wla-impact-ci wla-impact-ci--dark">WLA Qualified mark — increasingly demanded by sophisticated clients globally</div>
								<div class="wla-impact-ci wla-impact-ci--dark">Direct routing of WLA institutional client mandates — brief to match in 48 hours</div>
								<div class="wla-impact-ci wla-impact-ci--dark">UNBOUNDED™ Annual Forum — the world's most important gathering of independent legal minds</div>
							</div>
						</div>
						<div class="wla-impact-compare-handle" id="wlaImpactHandle">
							<div class="wla-impact-compare-handle-circle">← →</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- GROWTH CHART                                                -->
			<!-- ============================================================ -->
			<section class="wla-impact-section wla-impact-section--dark wla-impact-animate">
				<div class="wla-impact-container">
					<div class="wla-impact-eyebrow-dark">WLA GROWTH 2018–2026</div>
					<h2 class="wla-impact-heading-dark">SEVEN YEARS OF<br>INSTITUTIONAL GROWTH.</h2>
					<p class="wla-impact-sub-dark">Partner firms, active jurisdictions, and regulatory intelligence signals tracked since WLA's founding in 2018. Hover any data point to see the year's key milestones.</p>
					<div class="wla-impact-chart-wrap">
						<canvas id="wlaImpactGrowthChart" height="320"></canvas>
					</div>
					<div class="wla-impact-chart-legend">
						<div class="wla-impact-chart-legend-item">
							<div class="wla-impact-chart-legend-dot" style="background:#4ade80"></div>
							PARTNER FIRMS
						</div>
						<div class="wla-impact-chart-legend-item">
							<div class="wla-impact-chart-legend-dot" style="background:#60a5fa"></div>
							JURISDICTIONS
						</div>
						<div class="wla-impact-chart-legend-item">
							<div class="wla-impact-chart-legend-dot" style="background:#f59e0b"></div>
							INTELLIGENCE SIGNALS (×10)
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- TIMELINE                                                    -->
			<!-- ============================================================ -->
			<section class="wla-impact-section wla-impact-section--dark wla-impact-section--timeline wla-impact-animate">
				<div class="wla-impact-container">
					<div class="wla-impact-eyebrow-dark">YEAR BY YEAR MILESTONES</div>
					<h2 class="wla-impact-heading-dark">EVERY YEAR A<br>DEFINING CHAPTER.</h2>
				</div>
				<div class="wla-impact-timeline-scroll">
					<div class="wla-impact-timeline-track">
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2018</div>
							<div class="wla-impact-tl-title">FOUNDED</div>
							<div class="wla-impact-tl-metric">8 founding partner firms · 3 jurisdictions · New Delhi + Vienna</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2019</div>
							<div class="wla-impact-tl-title">PROTOCOL LAUNCHED</div>
							<div class="wla-impact-tl-metric">Co-Practice Protocol published · First cross-border mandates closed · 22 firms</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2020</div>
							<div class="wla-impact-tl-title">RESILIENCE YEAR</div>
							<div class="wla-impact-tl-metric">Virtual co-practice framework developed · Remote mandate management protocols established</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2021</div>
							<div class="wla-impact-tl-title">GLOBAL EXPANSION</div>
							<div class="wla-impact-tl-metric">APAC + Americas regions added · 55 partner firms · First 5-jurisdiction mandate</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2022</div>
							<div class="wla-impact-tl-title">INTELLIGENCE LAUNCHED</div>
							<div class="wla-impact-tl-metric">WLA Intelligence platform live · 420 signals year one · AI synthesis layer added</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2023</div>
							<div class="wla-impact-tl-title">FIRST FORUM · DUBAI</div>
							<div class="wla-impact-tl-metric">UNBOUNDED™ launched · 120 delegates · 40 jurisdictions · 98 partner firms</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2024</div>
							<div class="wla-impact-tl-title">HONORS · LONDON</div>
							<div class="wla-impact-tl-metric">Accreditation tiers published · HONORS Gala inaugural · 150 delegates · 127 firms</div>
						</div>
						<div class="wla-impact-tl-year wla-impact-tl-year--active">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2025</div>
							<div class="wla-impact-tl-title">RECORD YEAR</div>
							<div class="wla-impact-tl-metric">151 firms · 90+ jurisdictions · 1,240+ signals · Singapore Forum · 180 delegates</div>
						</div>
						<div class="wla-impact-tl-year">
							<div class="wla-impact-tl-dot"></div>
							<div class="wla-impact-tl-y">2026</div>
							<div class="wla-impact-tl-title">BARCELONA YEAR</div>
							<div class="wla-impact-tl-metric">UNBOUNDED™ Barcelona · 200 delegate cap · API launch · 6 active corridors</div>
						</div>
					</div>
				</div>
				<div style="height:80px"></div>
			</section>

			<!-- ============================================================ -->
			<!-- IMPACT METRICS                                              -->
			<!-- ============================================================ -->
			<section class="wla-impact-section wla-impact-section--white wla-impact-animate">
				<div class="wla-impact-container">
					<div class="wla-impact-eyebrow">2025–26 IMPACT METRICS</div>
					<h2 class="wla-impact-heading">THE NUMBERS THAT<br>DEFINE OUR YEAR.</h2>
					<div class="wla-impact-metrics-grid" id="wlaImpactMetricsGrid">
						<div class="wla-impact-metric-card">
							<div class="wla-impact-metric-number" data-t="340">0</div>
							<div class="wla-impact-metric-label">NEW REGULATORY SIGNALS</div>
							<p class="wla-impact-metric-desc">340 more regulatory signals tracked in 2025 than in 2024 — reflecting both new jurisdiction coverage and deeper practice area intelligence across existing markets.</p>
							<div class="wla-impact-metric-change">↑ 37% vs 2024</div>
						</div>
						<div class="wla-impact-metric-card">
							<div class="wla-impact-metric-number" data-t="24">0</div>
							<div class="wla-impact-metric-label">NEW PARTNER FIRMS</div>
							<p class="wla-impact-metric-desc">24 new WLA-Qualified partner firms designated in 2025, adding 12 new jurisdictions to WLA's active network — the largest single-year expansion since 2021.</p>
							<div class="wla-impact-metric-change">↑ 19% vs 2024</div>
						</div>
						<div class="wla-impact-metric-card">
							<div class="wla-impact-metric-number" data-t="6">0</div>
							<div class="wla-impact-metric-label">ACTIVE DEAL CORRIDORS</div>
							<p class="wla-impact-metric-desc">All six WLA deal corridors showed positive growth in 2025, with the Gulf-CEE corridor recording +38% activity growth — the highest in WLA's history.</p>
							<div class="wla-impact-metric-change">ALL 6 GROWING</div>
						</div>
						<div class="wla-impact-metric-card">
							<div class="wla-impact-metric-number" data-t="8400">0</div>
							<div class="wla-impact-metric-label">INTELLIGENCE SUBSCRIBERS</div>
							<p class="wla-impact-metric-desc">The WLA Intelligence Brief is now read by 8,400 legal professionals across 90+ jurisdictions every Monday — up from 4,200 at the start of 2025.</p>
							<div class="wla-impact-metric-change">↑ 100% vs JAN 2025</div>
						</div>
						<div class="wla-impact-metric-card">
							<div class="wla-impact-metric-number" data-t="200">0</div>
							<div class="wla-impact-metric-label">FORUM DELEGATE CAP</div>
							<p class="wla-impact-metric-desc">UNBOUNDED™ Barcelona 2026 is WLA's largest forum to date — 200 delegate capacity, up from 180 in Singapore 2025. 58 spots remaining as of publication.</p>
							<div class="wla-impact-metric-change">↑ 11% vs 2025</div>
						</div>
						<div class="wla-impact-metric-card">
							<div class="wla-impact-metric-number" data-t="48">0</div>
							<div class="wla-impact-metric-label">HOUR MATCH GUARANTEE</div>
							<p class="wla-impact-metric-desc">WLA's 48-hour brief-to-specialist-match commitment was maintained at 100% across all co-practice briefs received in 2025. Average actual match time: 31 hours.</p>
							<div class="wla-impact-metric-change">100% MAINTAINED</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- DOWNLOAD REPORT                                             -->
			<!-- ============================================================ -->
			<section class="wla-impact-section wla-impact-section--dark wla-impact-animate" id="download">
				<div class="wla-impact-container">
					<div class="wla-impact-eyebrow-dark">ANNUAL IMPACT REPORT</div>
					<h2 class="wla-impact-heading-dark">DOWNLOAD THE FULL<br>2025–26 REPORT.</h2>
					<div class="wla-impact-download-section">
						<div class="wla-impact-dl-left">
							<div class="wla-impact-dl-title">WLA ANNUAL IMPACT REPORT 2025–26</div>
							<p class="wla-impact-dl-desc">52 pages. Covers all WLA accreditation metrics, corridor flow analysis, intelligence platform growth, co-practice mandate data, UNBOUNDED™ Forum highlights, and strategic priorities for 2026–27. Free to download. No registration required.</p>
							<div class="wla-impact-dl-tags">
								<span class="wla-impact-dl-tag">52 PAGES</span>
								<span class="wla-impact-dl-tag">PDF</span>
								<span class="wla-impact-dl-tag">2025–26</span>
								<span class="wla-impact-dl-tag">ALL JURISDICTIONS</span>
								<span class="wla-impact-dl-tag">FREE DOWNLOAD</span>
							</div>
							<div>
								<div class="wla-impact-dl-btn" id="wlaImpactDlBtn">
									<span>↓</span> DOWNLOAD FREE REPORT
								</div>
								<div class="wla-impact-dl-progress" id="wlaImpactDlProgress">
									<div class="wla-impact-dl-progress-fill" id="wlaImpactDlFill"></div>
								</div>
							</div>
							<div class="wla-impact-dl-alt">
								<a href="wla-insights.html" class="wla-impact-dl-btn-ghost">BROWSE INSIGHTS INSTEAD →</a>
							</div>
						</div>
						<div class="wla-impact-dl-mock">
							<img class="wla-impact-dl-mock-img" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&q=80" alt="Report">
							<div class="wla-impact-dl-mock-body">
								<div class="wla-impact-dl-mock-title">WLA IMPACT REPORT 2025–26</div>
								<div class="wla-impact-dl-mock-sub">52 pages · PDF · Free</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Insights Page Shortcode
	 *
	 * Displays the WLA Insights page including:
	 * - Magazine-style hero with featured and sidebar stories
	 * - Category filter tabs
	 * - Article grid with featured wide card
	 * - Intelligence report download section
	 * - Newsletter signup
	 *
	 * Shortcode: [wla_insights_page]
	 *
	 * @return string
	 */
	public function wla_insights_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-insights-wrapper">
			
			<!-- ============================================================ -->
			<!-- MAGAZINE HERO                                               -->
			<!-- ============================================================ -->
			<section class="wla-insights-hero">
				<div class="wla-insights-hero-inner">
					
					<!-- Main Featured Story -->
					<a href="#" class="wla-insights-hero-main">
						<img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1200&q=85" alt="Intelligence Report">
						<div class="wla-insights-hero-main-grad"></div>
						<div class="wla-insights-hm-arrow">→</div>
						<div class="wla-insights-hero-main-content">
							<div class="wla-insights-hm-cat">WLA INTELLIGENCE · FEATURE</div>
							<div class="wla-insights-hm-title">THE GULF-CEE CORRIDOR: WHY 2026 IS THE YEAR LEGAL STRUCTURING GOES MAINSTREAM</div>
							<div class="wla-insights-hm-meta">
								<span>WLA Intelligence Team</span>
								<span>May 2026</span>
								<span>8 min read</span>
							</div>
						</div>
					</a>
					
					<!-- Sidebar Stories -->
					<div class="wla-insights-hero-sidebar">
						
						<a href="#" class="wla-insights-hs-story">
							<img class="wla-insights-hs-img" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&q=80" alt="AI Act">
							<div class="wla-insights-hs-cat">EU · AI REGULATION</div>
							<div class="wla-insights-hs-title">EU AI ACT: WHAT GENERAL COUNSEL MUST KNOW BEFORE Q3 2026</div>
							<div class="wla-insights-hs-meta">6 min read</div>
						</a>
						
						<a href="#" class="wla-insights-hs-story">
							<img class="wla-insights-hs-img" src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400&q=80" alt="India">
							<div class="wla-insights-hs-cat">INDIA · DATA PROTECTION</div>
							<div class="wla-insights-hs-title">DPDP RULES 2025: THE 12-MONTH COMPLIANCE WINDOW IS NOW OPEN</div>
							<div class="wla-insights-hs-meta">5 min read</div>
						</a>
						
						<a href="#" class="wla-insights-hs-story">
							<img class="wla-insights-hs-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=400&q=80" alt="Co-practice">
							<div class="wla-insights-hs-cat">WLA · CO-PRACTICE</div>
							<div class="wla-insights-hs-title">HOW FIVE PARTNER FIRMS CLOSED A 4-JURISDICTION ACQUISITION IN 6 WEEKS</div>
							<div class="wla-insights-hs-meta">4 min read</div>
						</a>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- FILTER TABS                                                 -->
			<!-- ============================================================ -->
			<div class="wla-insights-filter-wrap">
				<div class="wla-insights-filter-inner">
					<div class="wla-insights-filter-tab wla-insights-filter-tab--active">ALL</div>
					<div class="wla-insights-filter-tab">INTELLIGENCE</div>
					<div class="wla-insights-filter-tab">M&amp;A + DEALS</div>
					<div class="wla-insights-filter-tab">REGULATION</div>
					<div class="wla-insights-filter-tab">CORRIDORS</div>
					<div class="wla-insights-filter-tab">CO-PRACTICE</div>
					<div class="wla-insights-filter-tab">ARBITRATION</div>
					<div class="wla-insights-filter-tab">IMMIGRATION</div>
					<div class="wla-insights-filter-tab">PRIVATE CLIENTS</div>
					<div class="wla-insights-filter-tab">FORUMS</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- ARTICLES                                                    -->
			<!-- ============================================================ -->
			<section class="wla-insights-section wla-insights-animate">
				<div class="wla-insights-container">
					<div class="wla-insights-header">
						<div>
							<div class="wla-insights-eyebrow">LATEST INSIGHTS</div>
							<h2 class="wla-insights-heading">THE WORLD'S CROSS-BORDER<br>LEGAL LANDSCAPE. DECODED.</h2>
						</div>
						<a href="#" class="wla-insights-btn-bdr">VIEW ALL INSIGHTS</a>
					</div>
					
					<div class="wla-insights-articles-grid">
						
						<!-- Featured Wide Article -->
						<a href="#" class="wla-insights-article-card wla-insights-article-card--wide">
							<img class="wla-insights-ac-img" src="https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?w=900&q=80" alt="KSA">
							<div class="wla-insights-ac-body">
								<div class="wla-insights-ac-cat wla-insights-ac-cat--green">FEATURE · SAUDI ARABIA · M&amp;A</div>
								<div class="wla-insights-ac-title">VISION 2030 PHASE 2: THE LEGAL STRUCTURING OPPORTUNITY THAT MOST INTERNATIONAL FIRMS ARE MISSING</div>
								<p class="wla-insights-ac-excerpt">MISA's 30-day fast-track approval process has transformed the speed of inbound investment into Saudi Arabia. WLA's KSA partner explains what's changed and what international counsel need to know before structuring any inbound deal.</p>
								<div class="wla-insights-ac-meta">
									<span>WLA Saudi Arabia</span>
									<span class="wla-insights-ac-dot"></span>
									<span>May 2026</span>
									<span class="wla-insights-ac-dot"></span>
									<span>10 min read</span>
								</div>
							</div>
						</a>
						
						<!-- Article 1 -->
						<a href="#" class="wla-insights-article-card">
							<img class="wla-insights-ac-img" src="https://images.unsplash.com/photo-1553484771-047a44eee27b?w=600&q=80" alt="Tech">
							<div class="wla-insights-ac-body">
								<div class="wla-insights-ac-cat wla-insights-ac-cat--blue">INTELLIGENCE · TECHNOLOGY</div>
								<div class="wla-insights-ac-title">THE AI ACT COMPLIANCE CHECKLIST FOR COMPANIES OPERATING ACROSS EU MEMBER STATES</div>
								<p class="wla-insights-ac-excerpt">With EU AI Act enforcement now active across all 27 member states, cross-border IP and liability implications are still unresolved. A practical framework for GCs.</p>
								<div class="wla-insights-ac-meta">
									<span>WLA EU</span>
									<span class="wla-insights-ac-dot"></span>
									<span>6 min read</span>
								</div>
							</div>
						</a>
						
						<!-- Article 2 -->
						<a href="#" class="wla-insights-article-card">
							<img class="wla-insights-ac-img" src="https://images.unsplash.com/photo-1589994965851-a8f479c573a9?w=600&q=80" alt="Arbitration">
							<div class="wla-insights-ac-body">
								<div class="wla-insights-ac-cat">ARBITRATION · HKIAC</div>
								<div class="wla-insights-ac-title">HKIAC AT RECORD CASELOAD: WHAT THE DATA TELLS US ABOUT APAC DISPUTE TRENDS IN 2026</div>
								<p class="wla-insights-ac-excerpt">Emergency arbitration 24-hour appointments are now standard. WLA Hong Kong's dispute team unpacks what's driving the surge and what it means for cross-border enforcement strategy.</p>
								<div class="wla-insights-ac-meta">
									<span>WLA Hong Kong</span>
									<span class="wla-insights-ac-dot"></span>
									<span>7 min read</span>
								</div>
							</div>
						</a>
						
						<!-- Article 3 -->
						<a href="#" class="wla-insights-article-card">
							<img class="wla-insights-ac-img" src="https://images.unsplash.com/photo-1560472355-536de3962603?w=600&q=80" alt="India">
							<div class="wla-insights-ac-body">
								<div class="wla-insights-ac-cat wla-insights-ac-cat--green">INTELLIGENCE · INDIA</div>
								<div class="wla-insights-ac-title">DPDP RULES 2025: A PRACTICAL GUIDE TO THE CROSS-BORDER TRANSFER FRAMEWORK</div>
								<p class="wla-insights-ac-excerpt">The 12-month compliance window is open. WLA India's data protection practice breaks down what international companies operating data processing in India must do before the window closes.</p>
								<div class="wla-insights-ac-meta">
									<span>WLA India</span>
									<span class="wla-insights-ac-dot"></span>
									<span>5 min read</span>
								</div>
							</div>
						</a>
						
						<!-- Article 4 -->
						<a href="#" class="wla-insights-article-card">
							<img class="wla-insights-ac-img" src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=600&q=80" alt="Employment">
							<div class="wla-insights-ac-body">
								<div class="wla-insights-ac-cat">EMPLOYMENT · UK</div>
								<div class="wla-insights-ac-title">UK EMPLOYMENT RIGHTS BILL: WHAT MULTINATIONAL EMPLOYERS MUST RESTRUCTURE BEFORE JUNE 2026</div>
								<p class="wla-insights-ac-excerpt">Day-one rights and fire-and-rehire restrictions are now live. WLA UK's employment team identifies the five highest-risk areas for international employers with UK workforces.</p>
								<div class="wla-insights-ac-meta">
									<span>WLA United Kingdom</span>
									<span class="wla-insights-ac-dot"></span>
									<span>8 min read</span>
								</div>
							</div>
						</a>
						
						<!-- Article 5 -->
						<a href="#" class="wla-insights-article-card">
							<img class="wla-insights-ac-img" src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600&q=80" alt="Immigration">
							<div class="wla-insights-ac-body">
								<div class="wla-insights-ac-cat wla-insights-ac-cat--blue">IMMIGRATION · GLOBAL MOBILITY</div>
								<div class="wla-insights-ac-title">THE 2026 GLOBAL MOBILITY LANDSCAPE: WHICH GOLDEN VISA PROGRAMMES ARE STILL WORTH IT?</div>
								<p class="wla-insights-ac-excerpt">With Portugal closing its programme and Spain under review, WLA's global immigration network maps the best remaining investor visa routes for high net worth individuals in 2026.</p>
								<div class="wla-insights-ac-meta">
									<span>WLA Immigration Alliance</span>
									<span class="wla-insights-ac-dot"></span>
									<span>9 min read</span>
								</div>
							</div>
						</a>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- REPORT DOWNLOAD                                             -->
			<!-- ============================================================ -->
			<div class="wla-insights-report-bg">
				<div class="wla-insights-report-inner wla-insights-animate">
					<div class="wla-insights-report-left">
						<div class="wla-insights-rep-eyebrow">WLA INTELLIGENCE REPORT · Q2 2026</div>
						<div class="wla-insights-rep-title">CROSS-BORDER LEGAL DEAL CLIMATE REPORT Q2 2026</div>
						<p class="wla-insights-rep-desc">WLA's quarterly deal climate report synthesizes regulatory signals, corridor activity data, and co-practice intelligence from 80+ partner firms across 90+ jurisdictions into a single actionable briefing for GCs, in-house teams, and institutional investors.</p>
						<div class="wla-insights-rep-tags">
							<span class="wla-insights-rep-tag">ALL JURISDICTIONS</span>
							<span class="wla-insights-rep-tag">Q2 2026</span>
							<span class="wla-insights-rep-tag">6 MAJOR CORRIDORS</span>
							<span class="wla-insights-rep-tag">12 PRACTICE AREAS</span>
						</div>
						<div class="wla-insights-rep-buttons">
							<a href="#" class="wla-insights-btn-white">DOWNLOAD FREE REPORT →</a>
							<a href="#" class="wla-insights-btn-ghost-white">SUBSCRIBE TO INTELLIGENCE</a>
						</div>
					</div>
					<div class="wla-insights-report-mock">
						<img class="wla-insights-report-mock-img" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&q=80" alt="Report cover">
						<div class="wla-insights-report-mock-body">
							<div class="wla-insights-rm-title">WLA DEAL CLIMATE REPORT Q2 2026</div>
							<div class="wla-insights-rm-sub">40 pages · PDF · Free download</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- NEWSLETTER                                                  -->
			<!-- ============================================================ -->
			<div class="wla-insights-nl-bg">
				<div class="wla-insights-nl-inner wla-insights-animate">
					<div>
						<div class="wla-insights-nl-title">THE WLA INTELLIGENCE BRIEF. WEEKLY.</div>
						<p class="wla-insights-nl-desc">Regulatory signals, deal corridor updates, and cross-border legal intelligence from 80+ jurisdictions — synthesized into a single weekly briefing for legal professionals who need to stay ahead.</p>
					</div>
					<div class="wla-insights-nl-form">
						<div class="wla-insights-nl-label">YOUR PROFESSIONAL EMAIL</div>
						<div class="wla-insights-nl-input-row">
							<input type="email" class="wla-insights-nl-input" placeholder="your@firm.com">
							<button class="wla-insights-nl-submit">SUBSCRIBE FREE</button>
						</div>
						<div class="wla-insights-nl-note">Published every Monday. Read by 8,400+ legal professionals in 90+ jurisdictions. Unsubscribe anytime.</div>
					</div>
				</div>
			</div>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Intelligence Platform Page Shortcode
	 *
	 * Displays the WLA Intelligence page including:
	 * - Hero with dashboard-style counters
	 * - Live regulatory signal dashboard
	 * - How intelligence is built process
	 * - Coverage map
	 * - Access/Pricing tiers
	 *
	 * Shortcode: [wla_intelligence_page]
	 *
	 * @return string
	 */
	public function wla_intelligence_page_shortcode() {

		ob_start();
		?>
		
		<div class="wla-intel-wrapper">
			
			<!-- ============================================================ -->
			<!-- HERO                                                         -->
			<!-- ============================================================ -->
			<section class="wla-intel-hero">
				<div class="wla-intel-hero-top">
					<div class="wla-intel-hero-left">
						<div class="wla-intel-hero-eyebrow">WLA INTELLIGENCE PLATFORM · EST. 2022 · AI-POWERED</div>
						<h1 class="wla-intel-hero-title">THE WORLD'S CROSS-BORDER LEGAL INTELLIGENCE LAYER.</h1>
						<p class="wla-intel-hero-description">1,240+ regulatory changes tracked across 80+ jurisdictions. Partner firm practitioners on the ground. Daily signals synthesized into actionable intelligence — every working day.</p>
						<div class="wla-intel-hero-buttons">
							<a href="#signals" class="wla-intel-btn-white">EXPLORE LIVE SIGNALS</a>
							<a href="#pricing" class="wla-intel-btn-ghost-white">ACCESS INTELLIGENCE</a>
						</div>
					</div>
					<div class="wla-intel-hero-right">
						<!-- Signal Activity Chart -->
						<div class="wla-intel-dash-card">
							<div class="wla-intel-dash-card-header">
								SIGNAL ACTIVITY — LAST 7 DAYS
								<span class="wla-intel-live-pill">
									<span class="wla-intel-ldot"></span>LIVE
								</span>
							</div>
							<div class="wla-intel-mini-chart" id="wlaIntelMiniChart"></div>
							<div class="wla-intel-mini-chart-labels">
								<span>MON</span><span>TUE</span><span>WED</span><span>THU</span><span>FRI</span><span>SAT</span><span>SUN</span>
							</div>
						</div>
						<!-- Jurisdiction Counts -->
						<div class="wla-intel-dash-card">
							<div class="wla-intel-dash-card-header">JURISDICTIONS — LIVE COUNTS</div>
							<div class="wla-intel-counter-grid">
								<div class="wla-intel-cg-item">
									<div class="wla-intel-cg-n" id="wlaIntelC1">0</div>
									<div class="wla-intel-cg-l">Europe</div>
								</div>
								<div class="wla-intel-cg-item">
									<div class="wla-intel-cg-n" id="wlaIntelC2">0</div>
									<div class="wla-intel-cg-l">APAC</div>
								</div>
								<div class="wla-intel-cg-item">
									<div class="wla-intel-cg-n" id="wlaIntelC3">0</div>
									<div class="wla-intel-cg-l">Middle East</div>
								</div>
								<div class="wla-intel-cg-item">
									<div class="wla-intel-cg-n" id="wlaIntelC4">0</div>
									<div class="wla-intel-cg-l">Americas</div>
								</div>
							</div>
						</div>
						<!-- Latest Signals Feed -->
						<div class="wla-intel-dash-card">
							<div class="wla-intel-dash-card-header">
								LATEST SIGNALS
								<span class="wla-intel-live-pill">
									<span class="wla-intel-ldot"></span>UPDATING
								</span>
							</div>
							<div class="wla-intel-mini-feed" id="wlaIntelMiniFeed"></div>
						</div>
					</div>
				</div>
				<!-- Hero Stats Strip -->
				<div class="wla-intel-hero-strip">
					<div class="wla-intel-hero-strip-item">
						<div class="wla-intel-hsi-n">1,240+</div>
						<div class="wla-intel-hsi-l">Signals Tracked YTD</div>
					</div>
					<div class="wla-intel-hero-strip-item">
						<div class="wla-intel-hsi-n">80+</div>
						<div class="wla-intel-hsi-l">Jurisdictions Live</div>
					</div>
					<div class="wla-intel-hero-strip-item">
						<div class="wla-intel-hsi-n">12</div>
						<div class="wla-intel-hsi-l">Practice Areas</div>
					</div>
					<div class="wla-intel-hero-strip-item">
						<div class="wla-intel-hsi-n">Daily</div>
						<div class="wla-intel-hsi-l">Update Frequency</div>
					</div>
					<div class="wla-intel-hero-strip-item">
						<div class="wla-intel-hsi-n">2018</div>
						<div class="wla-intel-hsi-l">Launched</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- LIVE SIGNAL DASHBOARD                                       -->
			<!-- ============================================================ -->
			<div class="wla-intel-sig-bg">
				<section class="wla-intel-section wla-intel-animate" id="signals">
					<div class="wla-intel-container">
						<div class="wla-intel-eyebrow">LIVE REGULATORY SIGNALS</div>
						<h2 class="wla-intel-heading">FILTER BY REGION.<br>SEE WHAT'S MOVING.</h2>
						<div class="wla-intel-sig-layout">
							<div class="wla-intel-sig-sidebar">
								<div class="wla-intel-sig-sidebar-header">FILTER BY REGION</div>
								<div class="wla-intel-sig-region wla-intel-sig-region--active" data-region="ALL">
									<span class="wla-intel-sr-name">ALL REGIONS</span>
									<span class="wla-intel-sr-count">18</span>
								</div>
								<div class="wla-intel-sig-region" data-region="EU">
									<span class="wla-intel-sr-name">EUROPE</span>
									<span class="wla-intel-sr-count">6</span>
								</div>
								<div class="wla-intel-sig-region" data-region="ME">
									<span class="wla-intel-sr-name">MIDDLE EAST</span>
									<span class="wla-intel-sr-count">4</span>
								</div>
								<div class="wla-intel-sig-region" data-region="APAC">
									<span class="wla-intel-sr-name">ASIA PACIFIC</span>
									<span class="wla-intel-sr-count">5</span>
								</div>
								<div class="wla-intel-sig-region" data-region="AM">
									<span class="wla-intel-sr-name">AMERICAS</span>
									<span class="wla-intel-sr-count">3</span>
								</div>
							</div>
							<div class="wla-intel-sig-main">
								<div class="wla-intel-sig-main-header">
									<div class="wla-intel-smh-title" id="wlaIntelRegionTitle">ALL REGIONS — 18 SIGNALS</div>
									<div class="wla-intel-smh-live">
										<span class="wla-intel-smh-ldot"></span>LIVE
									</div>
								</div>
								<div class="wla-intel-sig-rows" id="wlaIntelSigRows"></div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- HOW INTELLIGENCE IS BUILT                                   -->
			<!-- ============================================================ -->
			<section class="wla-intel-section wla-intel-animate">
				<div class="wla-intel-container">
					<div class="wla-intel-eyebrow">HOW IT'S BUILT</div>
					<h2 class="wla-intel-heading">FOUR LAYERS. ONE<br>INTELLIGENCE PLATFORM.</h2>
					<div class="wla-intel-process-grid">
						<div class="wla-intel-pg-step">
							<div class="wla-intel-pgs-n">01 — SOURCE</div>
							<div class="wla-intel-pgs-icon">⚖️</div>
							<div class="wla-intel-pgs-title">PARTNER FIRM PRACTITIONERS</div>
							<p class="wla-intel-pgs-desc">Every signal originates from WLA partner firm practitioners on the ground — lawyers who are living the regulatory changes in their jurisdictions daily. Not scrapers. Not aggregators. Real practitioners.</p>
						</div>
						<div class="wla-intel-pg-step">
							<div class="wla-intel-pgs-n">02 — SYNTHESIZE</div>
							<div class="wla-intel-pgs-icon">🔄</div>
							<div class="wla-intel-pgs-title">AI-ASSISTED SYNTHESIS</div>
							<p class="wla-intel-pgs-desc">Practitioner inputs are synthesized by WLA's AI layer — cross-referencing signals across jurisdictions, identifying patterns, and flagging cross-border implications that no single practitioner in a single jurisdiction would see alone.</p>
						</div>
						<div class="wla-intel-pg-step">
							<div class="wla-intel-pgs-n">03 — VALIDATE</div>
							<div class="wla-intel-pgs-icon">✓</div>
							<div class="wla-intel-pgs-title">EDITORIAL REVIEW</div>
							<p class="wla-intel-pgs-desc">Every signal is reviewed by WLA's editorial team before publication — combining AI synthesis speed with human practitioner judgment on materiality, accuracy, and cross-border relevance for partner firms and clients.</p>
						</div>
						<div class="wla-intel-pg-step">
							<div class="wla-intel-pgs-n">04 — DELIVER</div>
							<div class="wla-intel-pgs-icon">📡</div>
							<div class="wla-intel-pgs-title">DAILY DISTRIBUTION</div>
							<p class="wla-intel-pgs-desc">Signals are published to the WLA Intelligence platform daily — accessible to partner firms, WLA clients, and subscribers through the platform dashboard, weekly briefings, and API integration for enterprise clients.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- COVERAGE MAP                                                -->
			<!-- ============================================================ -->
			<div class="wla-intel-map-bg">
				<div class="wla-intel-map-inner wla-intel-animate">
					<div class="wla-intel-map-head">
						<div>
							<div class="wla-intel-eyebrow-dark">COVERAGE MAP</div>
							<h2 class="wla-intel-map-heading">ACTIVE ACROSS<br>80+ JURISDICTIONS.</h2>
						</div>
						<div>
							<p class="wla-intel-map-desc">WLA Intelligence is live across four global regions with partner firm practitioners contributing signals from 80+ jurisdictions. Coverage expands as new partner firms are accredited to the WLA network.</p>
						</div>
					</div>
					<div class="wla-intel-region-tabs">
						<div class="wla-intel-rtab wla-intel-rtab--active" data-region="ALL">ALL REGIONS</div>
						<div class="wla-intel-rtab" data-region="EU">EUROPE</div>
						<div class="wla-intel-rtab" data-region="ME">MIDDLE EAST</div>
						<div class="wla-intel-rtab" data-region="APAC">ASIA PACIFIC</div>
						<div class="wla-intel-rtab" data-region="AF">AFRICA</div>
						<div class="wla-intel-rtab" data-region="AM">AMERICAS</div>
					</div>
					<div class="wla-intel-map-canvas-wrap">
						<canvas id="wlaIntelMapCanvas" style="width:100%;border-radius:12px;border:1px solid rgba(255,255,255,.08)"></canvas>
						<div class="wla-intel-jur-tooltip" id="wlaIntelTooltip"></div>
					</div>
					<div class="wla-intel-map-stats">
						<div class="wla-intel-map-stat">
							<div class="wla-intel-map-stat-number">28</div>
							<div class="wla-intel-map-stat-label">EUROPE</div>
						</div>
						<div class="wla-intel-map-stat">
							<div class="wla-intel-map-stat-number">22</div>
							<div class="wla-intel-map-stat-label">ASIA PACIFIC</div>
						</div>
						<div class="wla-intel-map-stat">
							<div class="wla-intel-map-stat-number">18</div>
							<div class="wla-intel-map-stat-label">AMERICAS</div>
						</div>
						<div class="wla-intel-map-stat">
							<div class="wla-intel-map-stat-number">16</div>
							<div class="wla-intel-map-stat-label">AFRICA + MIDDLE EAST</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- ACCESS / PRICING                                            -->
			<!-- ============================================================ -->
			<div class="wla-intel-pricing-bg">
				<section class="wla-intel-section wla-intel-animate" id="pricing">
					<div class="wla-intel-container">
						<div class="wla-intel-eyebrow">ACCESS WLA INTELLIGENCE</div>
						<h2 class="wla-intel-heading">THREE WAYS TO ACCESS<br>THE PLATFORM.</h2>
						<div class="wla-intel-pricing-grid">
							<!-- Free Tier -->
							<div class="wla-intel-price-card">
								<div class="wla-intel-pc-badge wla-intel-pc-badge--green">FREE · WEEKLY</div>
								<div class="wla-intel-pc-tier">INTELLIGENCE BRIEF</div>
								<div class="wla-intel-pc-sub">Published every Monday. Read by 8,400+ legal professionals across 90+ jurisdictions. No obligation.</div>
								<ul class="wla-intel-pc-list">
									<li>Weekly regulatory signal digest</li>
									<li>Top 5 cross-border signals by corridor</li>
									<li>Deal climate indicator by region</li>
									<li>Upcoming regulatory deadlines</li>
								</ul>
								<a href="#" class="wla-intel-btn-bdr">SUBSCRIBE FREE</a>
							</div>
							<!-- Partner Tier -->
							<div class="wla-intel-price-card wla-intel-price-card--featured">
								<div class="wla-intel-pc-badge wla-intel-pc-badge--white">PARTNER FIRMS · INCLUDED</div>
								<div class="wla-intel-pc-tier">WLA INTELLIGENCE FULL ACCESS</div>
								<div class="wla-intel-pc-sub">Included with WLA Partner Firm accreditation. Full platform access for all fee earners across the firm.</div>
								<ul class="wla-intel-pc-list">
									<li>All weekly brief content</li>
									<li>Full live signal dashboard — 80+ jurisdictions</li>
									<li>Practice area signal filters</li>
									<li>Corridor activity tracker</li>
									<li>Regulatory deadline calendar</li>
									<li>Historical signal archive (2018–)</li>
								</ul>
								<a href="wla-firms.html" class="wla-intel-btn-white">APPLY TO JOIN WLA →</a>
							</div>
							<!-- Enterprise Tier -->
							<div class="wla-intel-price-card">
								<div class="wla-intel-pc-badge wla-intel-pc-badge--green">ENTERPRISE · API</div>
								<div class="wla-intel-pc-tier">INTELLIGENCE API</div>
								<div class="wla-intel-pc-sub">Direct API access to WLA Intelligence signals for integration into in-house legal tech stacks, GRC platforms, and enterprise legal management systems.</div>
								<ul class="wla-intel-pc-list">
									<li>All Platform features</li>
									<li>REST API — real-time signal feed</li>
									<li>Webhook alerts for jurisdiction triggers</li>
									<li>Custom jurisdiction coverage sets</li>
									<li>Dedicated account management</li>
								</ul>
								<a href="#" class="wla-intel-btn-bdr">REQUEST ACCESS</a>
							</div>
						</div>
					</div>
				</section>
			</div>

		</div>

		<?php
		return ob_get_clean();
	}
	/**
	 * Bahamas Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Bahamas jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Bahamas section with image
	 * - Practice coverage grid
	 * - Intelligence table with signals
	 * - Corridors active section
	 * - CTA band
	 *
	 * Shortcode: [wla_bahamas_page]
	 *
	 * @return string
	 */
	public function wla_bahamas_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA BAHAMAS PAGE WRAPPER -->
		<div class="wla-bahamas-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-bahamas-hero">
				<img class="wla-bahamas-hero-img" src="https://images.unsplash.com/photo-1548574505-5e239809ee19?w=1920&q=85" alt="Bahamas">
				<div class="wla-bahamas-hero-grad"></div>
				<div class="wla-bahamas-hero-content">
					<div class="wla-bahamas-flag">🇧🇸</div>
					<div class="wla-bahamas-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · BAHAMAS · OFFSHORE FINANCE · FUND DOMICILE</div>
					<h1 class="wla-bahamas-hero-title">BAHAMAS</h1>
					<div class="wla-bahamas-hero-subtitle">PREMIER OFFSHORE FINANCIAL CENTRE · SMART FUND · WEALTH STRUCTURES</div>
					<div class="wla-bahamas-hero-buttons">
						<a href="wla-specialist.html" class="wla-bahamas-btn-white">FIND A BAHAMAS SPECIALIST — 48H</a>
						<a href="#why" class="wla-bahamas-btn-ghost-white">WHY BAHAMAS</a>
						<a href="wla-intelligence.html" class="wla-bahamas-btn-ghost-white">BAHAMAS INTELLIGENCE</a>
					</div>
					<div class="wla-bahamas-hero-stats">
						<div class="wla-bahamas-hs">
							<div class="wla-bahamas-hs-number">SMART</div>
							<div class="wla-bahamas-hs-label">Bahamas SMART Fund Framework</div>
						</div>
						<div class="wla-bahamas-hs">
							<div class="wla-bahamas-hs-number">0%</div>
							<div class="wla-bahamas-hs-label">Personal Income Tax</div>
						</div>
						<div class="wla-bahamas-hs">
							<div class="wla-bahamas-hs-number">Common Law</div>
							<div class="wla-bahamas-hs-label">English Common Law</div>
						</div>
						<div class="wla-bahamas-hs">
							<div class="wla-bahamas-hs-number">GIFCS</div>
							<div class="wla-bahamas-hs-label">Offshore Standard</div>
						</div>
						<div class="wla-bahamas-hs">
							<div class="wla-bahamas-hs-number">Americas</div>
							<div class="wla-bahamas-hs-label">Gateway to US and Caribbean</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY BAHAMAS                                         -->
			<!-- ============================================================ -->
			<section class="wla-bahamas-section wla-bahamas-animate" id="why">
				<div class="wla-bahamas-container">
					<div class="wla-bahamas-why-grid">
						<div class="wla-bahamas-why-image">
							<img src="https://images.unsplash.com/photo-1548574505-5e239809ee19?w=1920&q=85" alt="Bahamas">
						</div>
						<div class="wla-bahamas-why-content">
							<div class="wla-bahamas-eyebrow">WHY BAHAMAS. WHY NOW.</div>
							<h2 class="wla-bahamas-why-title">THE PREMIER OFFSHORE FINANCIAL CENTRE OF THE WESTERN HEMISPHERE.</h2>
							<p class="wla-bahamas-why-body">
								The Bahamas is the premier offshore financial centre of the Western Hemisphere — a stable, English common law jurisdiction with a sophisticated regulatory framework, zero personal income tax, and a long track record of institutional-quality financial services. The Securities Commission of the Bahamas (SCB) regulates the SMART Fund framework, one of the most flexible private investment fund vehicles in the world, used by family offices and asset managers globally.
							</p>
							<p class="wla-bahamas-why-body">
								WLA Bahamas co-practices the full Bahamas legal landscape for international clients — from SMART Fund formation and Bahamas IBC structuring through private wealth planning, family office establishment, and the Bahamas economic investment programme. WLA Bahamas connects to WLA's global network for co-practice with the investor's home jurisdiction and the destination markets where Bahamas-domiciled vehicles invest.
							</p>
							<div class="wla-bahamas-why-stats">
								<div class="wla-bahamas-ws">
									<div class="wla-bahamas-ws-number">SMART</div>
									<div class="wla-bahamas-ws-label">Flexible Private Fund Vehicle</div>
								</div>
								<div class="wla-bahamas-ws">
									<div class="wla-bahamas-ws-number">IBC</div>
									<div class="wla-bahamas-ws-label">International Business Company</div>
								</div>
								<div class="wla-bahamas-ws">
									<div class="wla-bahamas-ws-number">0%</div>
									<div class="wla-bahamas-ws-label">Corporate and Personal Tax</div>
								</div>
								<div class="wla-bahamas-ws">
									<div class="wla-bahamas-ws-number">SCB</div>
									<div class="wla-bahamas-ws-label">Securities Commission Regulator</div>
								</div>
							</div>
							<div class="wla-bahamas-why-buttons">
								<a href="wla-specialist.html" class="wla-bahamas-btn-ink">FIND A SPECIALIST</a>
								<a href="wla-page-forgc.html" class="wla-bahamas-btn-bdr">BRIEF WLA BAHAMAS</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-bahamas-section wla-bahamas-section--alt wla-bahamas-animate">
				<div class="wla-bahamas-container">
					<div class="wla-bahamas-eyebrow">WLA BAHAMAS — PRACTICE COVERAGE</div>
					<h2 class="wla-bahamas-heading">EVERY MAJOR PRACTICE.<br>BAHAMAS-SPECIFIC EXPERTISE.</h2>
					
					<div class="wla-bahamas-practice-grid">
						
						<!-- Practice 01: SMART Fund -->
						<div class="wla-bahamas-pc">
							<div class="wla-bahamas-pc-number">SPECIALIST</div>
							<div class="wla-bahamas-pc-icon">🏦</div>
							<div class="wla-bahamas-pc-title">SMART FUND — PRIVATE FUNDS</div>
							<p class="wla-bahamas-pc-desc">Bahamas SMART (Specific Mandate Alternative Regulatory Test) Fund — the most flexible private investment fund vehicle available offshore. Seven SMART Fund templates. No mandatory offering document. Up to 50 investors. WLA Bahamas advises on structure selection, formation, and SCB registration.</p>
						</div>
						
						<!-- Practice 02: IBC -->
						<div class="wla-bahamas-pc">
							<div class="wla-bahamas-pc-number">SPECIALIST</div>
							<div class="wla-bahamas-pc-icon">🏢</div>
							<div class="wla-bahamas-pc-title">IBC — BAHAMAS COMPANY</div>
							<p class="wla-bahamas-pc-desc">Bahamas International Business Company (IBC) — the most-used Bahamas corporate vehicle for international holding, trading, and investment structures. Fast formation, flexible share structure, English common law governance. WLA Bahamas advises on IBC formation, governance, and ongoing compliance.</p>
						</div>
						
						<!-- Practice 03: Private Wealth -->
						<div class="wla-bahamas-pc">
							<div class="wla-bahamas-pc-number">SPECIALIST</div>
							<div class="wla-bahamas-pc-icon">💎</div>
							<div class="wla-bahamas-pc-title">PRIVATE WEALTH &amp; FAMILY OFFICE</div>
							<p class="wla-bahamas-pc-desc">Bahamas foundation and trust structures for private wealth planning. Bahamas purpose trust for specific asset holding. Executive estate planning using Bahamas vehicles. WLA Bahamas co-practices with WLA HNW specialists in the investor's home jurisdiction.</p>
						</div>
						
						<!-- Practice 04: Economic Investment Programme -->
						<div class="wla-bahamas-pc">
							<div class="wla-bahamas-pc-number">SPECIALIST</div>
							<div class="wla-bahamas-pc-icon">📊</div>
							<div class="wla-bahamas-pc-title">ECONOMIC INVESTMENT PROGRAMME</div>
							<p class="wla-bahamas-pc-desc">Bahamas Economic Investment Programme — residence by investment for HNWI. Permanent residence available via qualifying real estate investment. WLA Bahamas advises on EIP applications and Bahamas residence planning.</p>
						</div>
						
						<!-- Practice 05: Arbitration & Disputes -->
						<div class="wla-bahamas-pc">
							<div class="wla-bahamas-pc-number">CORE ALLIANCE</div>
							<div class="wla-bahamas-pc-icon">⚖️</div>
							<div class="wla-bahamas-pc-title">ARBITRATION &amp; DISPUTES</div>
							<p class="wla-bahamas-pc-desc">Bahamas Commercial Court and arbitration proceedings under the Bahamas Arbitration Act. Enforcement of foreign awards. WLA Bahamas co-practices disputes involving Bahamas-domiciled vehicles alongside partner firms in the relevant counterparty jurisdictions.</p>
						</div>
						
						<!-- Practice 06: Restructuring -->
						<div class="wla-bahamas-pc">
							<div class="wla-bahamas-pc-number">SPECIALIST</div>
							<div class="wla-bahamas-pc-icon">🔄</div>
							<div class="wla-bahamas-pc-title">RESTRUCTURING — BAHAMAS</div>
							<p class="wla-bahamas-pc-desc">Bahamas winding up proceedings, provisional liquidation, and cross-border insolvency recognition. WLA Bahamas co-practices Bahamas-entity restructuring alongside WLA insolvency specialists in every connected jurisdiction.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE TABLE                                  -->
			<!-- ============================================================ -->
			<div class="wla-bahamas-intel-bg">
				<section class="wla-bahamas-section wla-bahamas-animate">
					<div class="wla-bahamas-container">
						<div class="wla-bahamas-eyebrow">WLA INTELLIGENCE — BAHAMAS SIGNALS</div>
						<h2 class="wla-bahamas-heading">WHAT IS MOVING IN<br>BAHAMAS LEGAL LANDSCAPE.</h2>
						
						<table class="wla-bahamas-intel-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-bahamas-it-area">SCB</div>
										<div class="wla-bahamas-it-sub">FUND REGULATION</div>
									</td>
									<td class="wla-bahamas-it-text">Bahamas SMART Fund Framework Update — Securities Commission of the Bahamas updating SMART Fund templates and digital asset fund guidance. Enhanced framework for tokenised fund structures.</td>
									<td class="wla-bahamas-it-growth">+14%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-bahamas-it-area">CRS</div>
										<div class="wla-bahamas-it-sub">TAX TRANSPARENCY</div>
									</td>
									<td class="wla-bahamas-it-text">CRS/FATCA Compliance Active — Bahamas fully compliant with Common Reporting Standard and FATCA. Enhanced beneficial ownership register. WLA Bahamas advises on reporting obligations for Bahamas vehicles.</td>
									<td class="wla-bahamas-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-bahamas-it-area">DIGITAL ASSETS</div>
										<div class="wla-bahamas-it-sub">VASP</div>
									</td>
									<td class="wla-bahamas-it-text">Bahamas Digital Assets Framework — DARE Act (Digital Assets and Registered Exchanges) providing regulated framework for digital asset businesses in the Bahamas. One of the most comprehensive in the Caribbean.</td>
									<td class="wla-bahamas-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-bahamas-it-area">RESIDENCE</div>
										<div class="wla-bahamas-it-sub">INVESTMENT</div>
									</td>
									<td class="wla-bahamas-it-text">EIP Applications Growing — Bahamas Economic Investment Programme seeing record applications from US, UK, and MENA investors seeking Caribbean residence and lifestyle.</td>
									<td class="wla-bahamas-it-growth">+22%</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-bahamas-intel-footer">
							<a href="wla-intelligence.html" class="wla-bahamas-btn-bdr">FULL BAHAMAS INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-bahamas-corridor-bg">
				<section class="wla-bahamas-section wla-bahamas-section--dark wla-bahamas-animate">
					<div class="wla-bahamas-container">
						<div class="wla-bahamas-eyebrow-dark">CORRIDORS ACTIVE — BAHAMAS</div>
						<h2 class="wla-bahamas-heading-dark">BAHAMAS ON THE WORLD'S<br>MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-bahamas-corridor-grid">
							<a href="wla-corridor-apac-americas.html" class="wla-bahamas-cg">
								<div class="wla-bahamas-cg-route">APAC ↔ AMERICAS</div>
								<div class="wla-bahamas-cg-growth">+19%</div>
								<p class="wla-bahamas-cg-desc">Bahamas vehicles frequently used as holding structures for APAC-Americas investment flows.</p>
							</a>
							<a href="wla-corridor-us-europe.html" class="wla-bahamas-cg">
								<div class="wla-bahamas-cg-route">US ↔ EUROPE</div>
								<div class="wla-bahamas-cg-growth">+18%</div>
								<p class="wla-bahamas-cg-desc">Bahamas as neutral offshore domicile for US-European co-investment vehicles and joint ventures.</p>
							</a>
							<a href="wla-corridor-gulf-cee.html" class="wla-bahamas-cg">
								<div class="wla-bahamas-cg-route">GULF → CEE</div>
								<div class="wla-bahamas-cg-growth">+38%</div>
								<p class="wla-bahamas-cg-desc">Gulf family offices using Bahamas holding structures for European real estate and PE investment.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-bahamas-cta-band">
				<div class="wla-bahamas-cta-title">BRIEF WLA ON YOUR BAHAMAS MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-bahamas-cta-buttons">
					<a href="wla-specialist.html" class="wla-bahamas-btn-white">FIND A BAHAMAS SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-bahamas-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA BAHAMAS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * France Jurisdiction Page Shortcode
	 *
	 * Displays the WLA France jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why France section with image and key points
	 * - Practice coverage grid (6 areas)
	 * - Luxury sector section
	 * - CTA band
	 *
	 * Shortcode: [wla_france_page]
	 *
	 * @return string
	 */
	public function wla_france_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA FRANCE PAGE WRAPPER -->
		<div class="wla-france-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-france-hero">
				<img class="wla-france-hero-img" src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=1920&q=85" alt="Paris France">
				<div class="wla-france-hero-grad"></div>
				<div class="wla-france-hero-content">
					<div class="wla-france-flag">🇫🇷</div>
					<div class="wla-france-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · FRANCE · PARIS · ICC · LUXURY</div>
					<h1 class="wla-france-hero-title">FRANCE</h1>
					<div class="wla-france-hero-subtitle">EUROPE'S CIVIL LAW POWERHOUSE · ICC SEAT · LUXURY CAPITAL</div>
					<div class="wla-france-hero-buttons">
						<a href="wla-specialist.html" class="wla-france-btn-white">FIND A FRANCE SPECIALIST — 48H</a>
						<a href="#why" class="wla-france-btn-ghost-white">WHY FRANCE</a>
						<a href="wla-page-arbitration.html" class="wla-france-btn-ghost-white">ICC ARBITRATION</a>
					</div>
					<div class="wla-france-hero-stats">
						<div class="wla-france-hs">
							<div class="wla-france-hs-number">#7</div>
							<div class="wla-france-hs-label">Global GDP</div>
						</div>
						<div class="wla-france-hs">
							<div class="wla-france-hs-number">ICC</div>
							<div class="wla-france-hs-label">Paris HQ — Largest Caseload</div>
						</div>
						<div class="wla-france-hs">
							<div class="wla-france-hs-number">#1</div>
							<div class="wla-france-hs-label">Luxury Goods Globally</div>
						</div>
						<div class="wla-france-hs">
							<div class="wla-france-hs-number">SASE</div>
							<div class="wla-france-hs-label">Paris Stock Exchange</div>
						</div>
						<div class="wla-france-hs">
							<div class="wla-france-hs-number">DST</div>
							<div class="wla-france-hs-label">3% Digital Services Tax</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY FRANCE                                          -->
			<!-- ============================================================ -->
			<section class="wla-france-section wla-france-animate" id="why">
				<div class="wla-france-container">
					<div class="wla-france-layout-2">
						<div class="wla-france-image">
							<img src="https://images.unsplash.com/photo-1520939817895-060bdaf4fe1b?w=900&q=85" alt="France Paris">
						</div>
						<div class="wla-france-content">
							<div class="wla-france-eyebrow">WHY FRANCE. WHY NOW.</div>
							<h2 class="wla-france-title">CIVIL LAW, ICC ARBITRATION, AND THE WORLD'S LUXURY CAPITAL.</h2>
							<p class="wla-france-body">
								France is one of the world's most significant civil law jurisdictions — the origin of the Napoleonic Code that underpins the legal systems of over 40 countries. Paris is the home of the ICC, the world's largest international arbitration institution. And France is the undisputed global capital of luxury goods — home to LVMH, Kering, Hermès, and the world's most valuable brand portfolios.
							</p>
							<p class="wla-france-body">
								WLA France co-practices M&A under French law, ICC arbitration proceedings, luxury brand IP and distribution law, employment law including the French comité social et économique (CSE), and French tax including the 3% Digital Services Tax and transfer pricing under French rules.
							</p>
							<ul class="wla-france-points">
								<li>ICC headquarters — Paris as the premier seat for international commercial arbitration globally</li>
								<li>Luxury sector — France governs the world's most valuable luxury brand portfolios</li>
								<li>CSE consultation — mandatory social dialogue on any workforce change affecting 50+ employees</li>
								<li>French corporate law — SA, SAS, SASU structures for international investment</li>
								<li>Digital Services Tax — 3% on revenues of large digital companies operating in France</li>
							</ul>
							<div class="wla-france-buttons">
								<a href="wla-specialist.html" class="wla-france-btn-ink">FIND A FRANCE SPECIALIST →</a>
								<a href="wla-page-forgc.html" class="wla-france-btn-bdr">BRIEF WLA FRANCE</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-france-section wla-france-animate">
				<div class="wla-france-container">
					<div class="wla-france-eyebrow">WLA FRANCE — PRACTICE COVERAGE</div>
					<h2 class="wla-france-heading">SIX KEY PRACTICE AREAS<br>WHERE FRANCE DEMANDS SPECIALISTS.</h2>
					
					<div class="wla-france-practice-grid">
						
						<!-- Practice 01: M&A -->
						<div class="wla-france-pc">
							<div class="wla-france-pc-number">TRANSACTIONS</div>
							<div class="wla-france-pc-title">M&A UNDER FRENCH LAW</div>
							<p class="wla-france-pc-desc">Share deals, asset deals, SAS/SA acquisition structures, French merger control (Autorité de la concurrence), FDI screening (MEFR Decree), and Comité social et économique consultation obligations on M&A.</p>
						</div>
						
						<!-- Practice 02: Arbitration -->
						<div class="wla-france-pc">
							<div class="wla-france-pc-number">ARBITRATION</div>
							<div class="wla-france-pc-title">ICC &amp; PARIS ARBITRATION</div>
							<p class="wla-france-pc-desc">ICC arbitration proceedings, CMAP mediation, Paris as seat of international arbitration. French courts are among the most arbitration-friendly in the world — enforcement of awards under the New York Convention.</p>
						</div>
						
						<!-- Practice 03: Luxury/IP -->
						<div class="wla-france-pc">
							<div class="wla-france-pc-number">LUXURY / IP</div>
							<div class="wla-france-pc-title">LUXURY LAW &amp; BRAND PROTECTION</div>
							<p class="wla-france-pc-desc">Luxury brand IP protection, trademark enforcement, distribution network agreements, selective distribution systems under EU competition law, and anti-counterfeiting enforcement in France and across the EU.</p>
						</div>
						
						<!-- Practice 04: Employment -->
						<div class="wla-france-pc">
							<div class="wla-france-pc-number">EMPLOYMENT</div>
							<div class="wla-france-pc-title">CSE &amp; FRENCH EMPLOYMENT</div>
							<p class="wla-france-pc-desc">Comité social et économique consultation — mandatory on any collective measure affecting working conditions. French employment termination procedures, collective redundancy plans (PSE), and executive arrangements.</p>
						</div>
						
						<!-- Practice 05: Tax -->
						<div class="wla-france-pc">
							<div class="wla-france-pc-number">TAX</div>
							<div class="wla-france-pc-title">FRENCH TAX &amp; DST</div>
							<p class="wla-france-pc-desc">French corporate tax, transfer pricing under BOFIP guidelines, Digital Services Tax compliance for international platforms, and tax aspects of M&A under French law including tax consolidation groups.</p>
						</div>
						
						<!-- Practice 06: Energy -->
						<div class="wla-france-pc">
							<div class="wla-france-pc-number">ENERGY</div>
							<div class="wla-france-pc-title">ENERGY &amp; INFRASTRUCTURE</div>
							<p class="wla-france-pc-desc">French renewable energy — offshore wind, solar, and hydrogen projects under CRE regulation. French nuclear law update — new-build programme creating significant project finance and regulatory work.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: LUXURY SECTOR                                       -->
			<!-- ============================================================ -->
			<div class="wla-france-luxury-bg">
				<section class="wla-france-section wla-france-section--dark wla-france-animate">
					<div class="wla-france-container">
						<div class="wla-france-eyebrow-dark">FRANCE — LUXURY SECTOR</div>
						<h2 class="wla-france-heading-dark">FRANCE IS THE WORLD'S<br>LUXURY LAW JURISDICTION.</h2>
						<p class="wla-france-luxury-intro">
							WLA France's luxury practice covers every dimension of luxury brand law — IP protection, distribution networks, brand acquisitions, and anti-counterfeiting across global markets.
						</p>
						
						<div class="wla-france-luxury-grid">
							<div class="wla-france-lg">
								<div class="wla-france-lg-number">IP &amp; BRAND PROTECTION</div>
								<div class="wla-france-lg-title">TRADEMARK &amp; BRAND ENFORCEMENT</div>
								<p class="wla-france-lg-desc">Multi-jurisdiction trademark portfolio management, enforcement actions against counterfeiters, and EUIPO opposition proceedings. France as the hub for global luxury brand protection strategy.</p>
							</div>
							<div class="wla-france-lg">
								<div class="wla-france-lg-number">DISTRIBUTION LAW</div>
								<div class="wla-france-lg-title">SELECTIVE DISTRIBUTION NETWORKS</div>
								<p class="wla-france-lg-desc">Selective distribution agreements compliant with EU competition law (VBER), authorised retailer networks, franchise agreements, and enforcement against unauthorised distributors and grey market importers.</p>
							</div>
							<div class="wla-france-lg">
								<div class="wla-france-lg-number">M&amp;A &amp; BRAND ACQUISITIONS</div>
								<div class="wla-france-lg-title">LUXURY BRAND TRANSACTIONS</div>
								<p class="wla-france-lg-desc">Luxury brand acquisitions, IP asset transfers, licensing portfolio structuring, and brand valuation for M&A purposes. France as the natural seat for luxury group M&A transactions.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-france-cta-band">
				<div class="wla-france-cta-title">BRIEF WLA ON YOUR FRANCE MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-france-cta-buttons">
					<a href="wla-specialist.html" class="wla-france-btn-white">FIND A FRANCE SPECIALIST</a>
					<a href="wla-page-arbitration.html" class="wla-france-btn-ghost-white">ICC ARBITRATION</a>
				</div>
			</div>

		</div>
		<!-- END WLA FRANCE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Germany Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Germany jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Germany section with image and stats
	 * - Key practice areas (Mittelstand grid)
	 * - Key German legal developments 2025–26
	 * - CTA band
	 *
	 * Shortcode: [wla_germany_page]
	 *
	 * @return string
	 */
	public function wla_germany_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA GERMANY PAGE WRAPPER -->
		<div class="wla-germany-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-germany-hero">
				<img class="wla-germany-hero-img" src="https://images.unsplash.com/photo-1467269204594-9661b134dd2b?w=1920&q=85" alt="Germany">
				<div class="wla-germany-hero-grad"></div>
				<div class="wla-germany-hero-content">
					<div class="wla-germany-flag">🇩🇪</div>
					<div class="wla-germany-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · GERMANY · MITTELSTAND · EU LAW</div>
					<h1 class="wla-germany-hero-title">GERMANY</h1>
					<div class="wla-germany-hero-subtitle">EUROPE'S LARGEST ECONOMY · MITTELSTAND · EU REGULATORY EPICENTRE</div>
					<div class="wla-germany-hero-buttons">
						<a href="wla-specialist.html" class="wla-germany-btn-white">FIND A GERMANY SPECIALIST — 48H</a>
						<a href="#why" class="wla-germany-btn-ghost-white">WHY GERMANY</a>
						<a href="wla-corridors.html" class="wla-germany-btn-ghost-white">GULF → CEE CORRIDOR</a>
					</div>
					<div class="wla-germany-hero-stats">
						<div class="wla-germany-hs">
							<div class="wla-germany-hs-number">#4</div>
							<div class="wla-germany-hs-label">Global GDP</div>
						</div>
						<div class="wla-germany-hs">
							<div class="wla-germany-hs-number">3M+</div>
							<div class="wla-germany-hs-label">Mittelstand Companies</div>
						</div>
						<div class="wla-germany-hs">
							<div class="wla-germany-hs-number">EU HQ</div>
							<div class="wla-germany-hs-label">Most EU-HQ'd Multinationals</div>
						</div>
						<div class="wla-germany-hs">
							<div class="wla-germany-hs-number">AI Act</div>
							<div class="wla-germany-hs-label">EU AI Act Epicentre</div>
						</div>
						<div class="wla-germany-hs">
							<div class="wla-germany-hs-number">Works</div>
							<div class="wla-germany-hs-label">Council Jurisdiction</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY GERMANY                                         -->
			<!-- ============================================================ -->
			<section class="wla-germany-section wla-germany-animate" id="why">
				<div class="wla-germany-container">
					<div class="wla-germany-why-layout">
						<div class="wla-germany-why-image">
							<img src="https://images.unsplash.com/photo-1560969184-10fe8719e047?w=900&q=85" alt="Germany business">
						</div>
						<div class="wla-germany-why-content">
							<div class="wla-germany-eyebrow">WHY GERMANY. WHY NOW.</div>
							<h2 class="wla-germany-why-title">EUROPE'S MOST COMPLEX LEGAL MARKET. WLA NAVIGATES IT.</h2>
							<p class="wla-germany-why-body">
								Germany is Europe's largest economy and the most legally complex jurisdiction for international investors — Works Councils, co-determination, the Energiewende, German GmbH and AG law, and its central position in EU regulatory implementation all create significant cross-border legal complexity that demands genuine local specialist knowledge, not a generalist EU law overlay.
							</p>
							<p class="wla-germany-why-body">
								Germany's Mittelstand — 3 million mid-market companies accounting for 60% of German employment — is the world's largest pool of acquisition targets for international private equity and strategic buyers. WLA Germany co-practices every dimension of German law alongside every jurisdiction where the acquirer operates.
							</p>
							<div class="wla-germany-why-stats">
								<div class="wla-germany-ws">
									<div class="wla-germany-ws-number">€4.1T</div>
									<div class="wla-germany-ws-label">GDP 2025</div>
								</div>
								<div class="wla-germany-ws">
									<div class="wla-germany-ws-number">60%</div>
									<div class="wla-germany-ws-label">Mittelstand Share of Employment</div>
								</div>
								<div class="wla-germany-ws">
									<div class="wla-germany-ws-number">Works</div>
									<div class="wla-germany-ws-label">Council Mandatory 20+ Employees</div>
								</div>
								<div class="wla-germany-ws">
									<div class="wla-germany-ws-number">EU</div>
									<div class="wla-germany-ws-label">AI Act / GDPR Epicentre</div>
								</div>
							</div>
							<a href="wla-specialist.html" class="wla-germany-btn-ink">FIND A GERMANY SPECIALIST →</a>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY PRACTICE AREAS (MITTELSTAND GRID)              -->
			<!-- ============================================================ -->
			<div class="wla-germany-mitte-bg">
				<section class="wla-germany-section wla-germany-animate">
					<div class="wla-germany-container">
						<div class="wla-germany-eyebrow">GERMAN LAW — KEY PRACTICE AREAS</div>
						<h2 class="wla-germany-heading">SIX AREAS WHERE GERMAN<br>LAW COMPLEXITY DEMANDS SPECIALISTS.</h2>
						
						<div class="wla-germany-mitte-grid">
							
							<!-- Practice 01: M&A -->
							<div class="wla-germany-mg">
								<div class="wla-germany-mg-number">TRANSACTIONS</div>
								<div class="wla-germany-mg-title">M&amp;A — MITTELSTAND &amp; CORPORATES</div>
								<p class="wla-germany-mg-desc">GmbH and AG acquisition structures, share deal vs asset deal analysis, German merger control (Bundeskartellamt), FDI screening (BMWK), and Works Council consultation on M&A transactions.</p>
							</div>
							
							<!-- Practice 02: Employment -->
							<div class="wla-germany-mg">
								<div class="wla-germany-mg-number">EMPLOYMENT</div>
								<div class="wla-germany-mg-title">WORKS COUNCILS &amp; CO-DETERMINATION</div>
								<p class="wla-germany-mg-desc">Mandatory Works Council consultation — any workforce restructuring, redundancy, or working conditions change requires formal Works Council involvement. Germany's co-determination framework is the most complex in Europe.</p>
							</div>
							
							<!-- Practice 03: Restructuring -->
							<div class="wla-germany-mg">
								<div class="wla-germany-mg-number">RESTRUCTURING</div>
								<div class="wla-germany-mg-title">STARUG &amp; INSOLVENCY</div>
								<p class="wla-germany-mg-desc">Germany's StaRUG pre-insolvency restructuring framework and insolvency proceedings under InsO. COMI analysis for German-headquartered groups. Cross-border recognition in the EU.</p>
							</div>
							
							<!-- Practice 04: Regulatory -->
							<div class="wla-germany-mg">
								<div class="wla-germany-mg-number">REGULATORY</div>
								<div class="wla-germany-mg-title">EU AI ACT &amp; DIGITAL REGULATION</div>
								<p class="wla-germany-mg-desc">Germany as the EU's largest economy implements EU AI Act, GDPR, DSA, and DMA obligations first and most stringently. WLA Germany advises international companies on German regulatory implementation.</p>
							</div>
							
							<!-- Practice 05: Energy -->
							<div class="wla-germany-mg">
								<div class="wla-germany-mg-number">ENERGY</div>
								<div class="wla-germany-mg-title">ENERGIEWENDE &amp; RENEWABLES</div>
								<p class="wla-germany-mg-desc">Germany's energy transition creates significant legal work — renewable energy project development, grid connection agreements, PPA structuring, and the regulatory framework for hydrogen infrastructure.</p>
							</div>
							
							<!-- Practice 06: Disputes -->
							<div class="wla-germany-mg">
								<div class="wla-germany-mg-number">DISPUTES</div>
								<div class="wla-germany-mg-title">DIS ARBITRATION &amp; GERMAN COURTS</div>
								<p class="wla-germany-mg-desc">German Arbitration Institute (DIS) proceedings, German state court litigation, and enforcement of foreign awards in Germany. Germany as seat of arbitration for Central European disputes.</p>
							</div>
							
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: KEY GERMAN LEGAL DEVELOPMENTS 2025–26              -->
			<!-- ============================================================ -->
			<div class="wla-germany-dev-bg">
				<section class="wla-germany-section wla-germany-section--dark wla-germany-animate">
					<div class="wla-germany-container">
						<div class="wla-germany-eyebrow-dark">KEY GERMAN LEGAL DEVELOPMENTS 2025–26</div>
						<h2 class="wla-germany-heading-dark">WHAT'S CHANGED IN<br>GERMAN LAW THAT MATTERS.</h2>
						
						<div class="wla-germany-dev-grid">
							
							<!-- Development 01: EU AI Act -->
							<div class="wla-germany-dg">
								<div class="wla-germany-dg-tag">EU AI ACT · LIVE</div>
								<div class="wla-germany-dg-title">EU AI ACT — FULL ENFORCEMENT IN GERMANY</div>
								<p class="wla-germany-dg-desc">Germany's BaFin and regulators implementing EU AI Act in financial services. High-risk AI system requirements active. Prohibited AI practices enforcement began February 2025. Germany enforcing most actively among EU member states.</p>
								<div class="wla-germany-dg-badge">IN FORCE</div>
							</div>
							
							<!-- Development 02: FDI Screening -->
							<div class="wla-germany-dg">
								<div class="wla-germany-dg-tag">FDI SCREENING · ACTIVE</div>
								<div class="wla-germany-dg-title">BMWK FDI REVIEW — TIGHTENED THRESHOLDS</div>
								<p class="wla-germany-dg-desc">Federal Ministry for Economic Affairs tightened FDI screening thresholds for strategic sectors — semiconductors, AI, critical infrastructure. Any acquisition of 10%+ stake now triggers review. Significant for Gulf and Asian investors.</p>
								<div class="wla-germany-dg-badge">ENHANCED</div>
							</div>
							
							<!-- Development 03: Supply Chain Act -->
							<div class="wla-germany-dg">
								<div class="wla-germany-dg-tag">EMPLOYMENT · ACTIVE</div>
								<div class="wla-germany-dg-title">LIEFERKETTENSORGFALTSPFLICHTENGESETZ (LkSG)</div>
								<p class="wla-germany-dg-desc">Germany's Supply Chain Due Diligence Act — extended to companies with 1,000+ employees from 2024. Human rights and environmental due diligence in supply chains mandatory. Significant for international companies with German subsidiaries.</p>
								<div class="wla-germany-dg-badge">EXPANDED</div>
							</div>
							
							<!-- Development 04: StaRUG -->
							<div class="wla-germany-dg">
								<div class="wla-germany-dg-tag">RESTRUCTURING · ACTIVE</div>
								<div class="wla-germany-dg-title">STARUG UPTAKE — PRE-INSOLVENCY RESTRUCTURING</div>
								<p class="wla-germany-dg-desc">Germany's StaRUG pre-insolvency restructuring framework seeing significant uptake among Mittelstand companies. Cross-class cramdown capability being used increasingly for complex creditor situations. WLA Germany advises both debtors and creditors.</p>
								<div class="wla-germany-dg-badge">GROWING</div>
							</div>
							
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-germany-cta-band">
				<div class="wla-germany-cta-title">BRIEF WLA ON YOUR GERMANY MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-germany-cta-buttons">
					<a href="wla-specialist.html" class="wla-germany-btn-white">FIND A GERMANY SPECIALIST</a>
					<a href="wla-corridors.html" class="wla-germany-btn-ghost-white">GULF → CEE CORRIDOR</a>
				</div>
			</div>

		</div>
		<!-- END WLA GERMANY PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Hong Kong Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Hong Kong jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Hong Kong section with image and stats
	 * - Practice coverage grid (6 areas)
	 * - Intelligence table with signals
	 * - Corridors active section
	 * - CTA band
	 *
	 * Shortcode: [wla_hongkong_page]
	 *
	 * @return string
	 */
	public function wla_hongkong_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA HONG KONG PAGE WRAPPER -->
		<div class="wla-hongkong-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-hongkong-hero">
				<img class="wla-hongkong-hero-img" src="https://images.unsplash.com/photo-1507941097613-9f2157b69235?w=1920&q=85" alt="Hong Kong">
				<div class="wla-hongkong-hero-grad"></div>
				<div class="wla-hongkong-hero-content">
					<div class="wla-hongkong-flag">🇭🇰</div>
					<div class="wla-hongkong-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · HONG KONG · HKIAC · COMMON LAW</div>
					<h1 class="wla-hongkong-hero-title">HONG KONG</h1>
					<div class="wla-hongkong-hero-subtitle">ASIA'S INTERNATIONAL ARBITRATION CAPITAL · COMMON LAW · HKIAC</div>
					<div class="wla-hongkong-hero-buttons">
						<a href="wla-specialist.html" class="wla-hongkong-btn-white">FIND A HONG KONG SPECIALIST — 48H</a>
						<a href="#why" class="wla-hongkong-btn-ghost-white">WHY HONG KONG</a>
						<a href="wla-intelligence.html" class="wla-hongkong-btn-ghost-white">HONG KONG INTELLIGENCE</a>
					</div>
					<div class="wla-hongkong-hero-stats">
						<div class="wla-hongkong-hs">
							<div class="wla-hongkong-hs-number">+19%</div>
							<div class="wla-hongkong-hs-label">HKIAC Caseload Growth</div>
						</div>
						<div class="wla-hongkong-hs">
							<div class="wla-hongkong-hs-number">24H</div>
							<div class="wla-hongkong-hs-label">HKIAC Emergency Award</div>
						</div>
						<div class="wla-hongkong-hs">
							<div class="wla-hongkong-hs-number">Common Law</div>
							<div class="wla-hongkong-hs-label">English Common Law Framework</div>
						</div>
						<div class="wla-hongkong-hs">
							<div class="wla-hongkong-hs-number">APAC</div>
							<div class="wla-hongkong-hs-label">PE &amp; Finance Hub</div>
						</div>
						<div class="wla-hongkong-hs">
							<div class="wla-hongkong-hs-number">CNH</div>
							<div class="wla-hongkong-hs-label">Offshore RMB Centre</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY HONG KONG                                      -->
			<!-- ============================================================ -->
			<section class="wla-hongkong-section wla-hongkong-animate" id="why">
				<div class="wla-hongkong-container">
					<div class="wla-hongkong-why-grid">
						<div class="wla-hongkong-why-image">
							<img src="https://images.unsplash.com/photo-1507941097613-9f2157b69235?w=1920&q=85" alt="Hong Kong">
						</div>
						<div class="wla-hongkong-why-content">
							<div class="wla-hongkong-eyebrow">WHY HONG KONG. WHY NOW.</div>
							<h2 class="wla-hongkong-why-title">ASIA'S MOST SOPHISTICATED LEGAL MARKET AND THE WORLD'S ARBITRATION CAPITAL.</h2>
							<p class="wla-hongkong-why-body">
								Hong Kong remains Asia's premier international legal and financial centre — a common law jurisdiction with deep roots in English law, a sophisticated judiciary, and the Hong Kong International Arbitration Centre (HKIAC), which has become the dominant arbitration institution for cross-border Asia Pacific disputes. Despite the political changes of recent years, Hong Kong's legal system remains substantively independent, commercially sophisticated, and internationally trusted.
							</p>
							<p class="wla-hongkong-why-body">
								WLA Hong Kong co-practices every dimension of Hong Kong law — from HKIAC arbitration and cross-border M&A under the Companies Ordinance through to PDPO data privacy, SFC financial services regulation, and offshore RMB structuring. One brief covers both the Hong Kong law execution and the co-practice coordination with every connected jurisdiction.
							</p>
							<div class="wla-hongkong-why-stats">
								<div class="wla-hongkong-ws">
									<div class="wla-hongkong-ws-number">HKIAC</div>
									<div class="wla-hongkong-ws-label">World's Leading APAC Arbitration Seat</div>
								</div>
								<div class="wla-hongkong-ws">
									<div class="wla-hongkong-ws-number">HK$</div>
									<div class="wla-hongkong-ws-label">Strong HKD Peg — Monetary Stability</div>
								</div>
								<div class="wla-hongkong-ws">
									<div class="wla-hongkong-ws-number">SFC</div>
									<div class="wla-hongkong-ws-label">Sophisticated Financial Regulator</div>
								</div>
								<div class="wla-hongkong-ws">
									<div class="wla-hongkong-ws-number">Common Law</div>
									<div class="wla-hongkong-ws-label">Independent Judiciary</div>
								</div>
							</div>
							<div class="wla-hongkong-why-buttons">
								<a href="wla-specialist.html" class="wla-hongkong-btn-ink">FIND A SPECIALIST</a>
								<a href="wla-page-forgc.html" class="wla-hongkong-btn-bdr">BRIEF WLA HONG KONG</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-hongkong-section wla-hongkong-section--alt wla-hongkong-animate">
				<div class="wla-hongkong-container">
					<div class="wla-hongkong-eyebrow">WLA HONG KONG — PRACTICE COVERAGE</div>
					<h2 class="wla-hongkong-heading">EVERY MAJOR PRACTICE.<br>HONG KONG-SPECIFIC EXPERTISE.</h2>
					
					<div class="wla-hongkong-practice-grid">
						
						<!-- Practice 01: Arbitration -->
						<div class="wla-hongkong-pc">
							<div class="wla-hongkong-pc-number">CORE ALLIANCE</div>
							<div class="wla-hongkong-pc-icon">⚖️</div>
							<div class="wla-hongkong-pc-title">ARBITRATION — HKIAC</div>
							<p class="wla-hongkong-pc-desc">The world's premier APAC arbitration institution. HKIAC emergency arbitration — 24-hour appointment now standard. HKIAC caseload at record levels. WLA Hong Kong co-practices HKIAC arbitration proceedings alongside partner firms in every counterparty jurisdiction.</p>
						</div>
						
						<!-- Practice 02: M&A -->
						<div class="wla-hongkong-pc">
							<div class="wla-hongkong-pc-number">CORE ALLIANCE</div>
							<div class="wla-hongkong-pc-icon">🤝</div>
							<div class="wla-hongkong-pc-title">M&amp;A &amp; CORPORATE</div>
							<p class="wla-hongkong-pc-desc">Cross-border M&A under the Companies Ordinance, Hong Kong stock exchange listings (HKEX), and Takeovers Code compliance. Hong Kong as acquisition vehicle jurisdiction for APAC and mainland China transactions.</p>
						</div>
						
						<!-- Practice 03: Financial Services -->
						<div class="wla-hongkong-pc">
							<div class="wla-hongkong-pc-number">SPECIALIST</div>
							<div class="wla-hongkong-pc-icon">🏦</div>
							<div class="wla-hongkong-pc-title">FINANCIAL SERVICES — SFC</div>
							<p class="wla-hongkong-pc-desc">SFC licensing and regulation, asset management, Type 1-9 regulated activities, virtual asset VASP licensing, and financial services M&A. Hong Kong as Asia's leading fund management centre.</p>
						</div>
						
						<!-- Practice 04: Virtual Assets -->
						<div class="wla-hongkong-pc">
							<div class="wla-hongkong-pc-number">SPECIALIST</div>
							<div class="wla-hongkong-pc-icon">🌐</div>
							<div class="wla-hongkong-pc-title">VIRTUAL ASSETS — VASP</div>
							<p class="wla-hongkong-pc-desc">Hong Kong VASP licensing framework — one of the world's most comprehensive regulated virtual asset frameworks. WLA Hong Kong advises on licensing, compliance, and digital asset business structuring.</p>
						</div>
						
						<!-- Practice 05: Data Privacy -->
						<div class="wla-hongkong-pc">
							<div class="wla-hongkong-pc-number">SPECIALIST</div>
							<div class="wla-hongkong-pc-icon">🔐</div>
							<div class="wla-hongkong-pc-title">DATA PRIVACY — PDPO</div>
							<p class="wla-hongkong-pc-desc">Personal Data (Privacy) Ordinance compliance, cross-border data transfer, and privacy impact assessments. Hong Kong data privacy requirements for companies handling personal data of Hong Kong residents.</p>
						</div>
						
						<!-- Practice 06: Employment -->
						<div class="wla-hongkong-pc">
							<div class="wla-hongkong-pc-number">SPECIALIST</div>
							<div class="wla-hongkong-pc-icon">💼</div>
							<div class="wla-hongkong-pc-title">EMPLOYMENT — HONG KONG</div>
							<p class="wla-hongkong-pc-desc">Employment Ordinance, executive arrangements, Stock Option taxation, and employment aspects of M&A. WLA Hong Kong advises multinational employers on the full Hong Kong employment law framework.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE TABLE                                  -->
			<!-- ============================================================ -->
			<div class="wla-hongkong-intel-bg">
				<section class="wla-hongkong-section wla-hongkong-animate">
					<div class="wla-hongkong-container">
						<div class="wla-hongkong-eyebrow">WLA INTELLIGENCE — HONG KONG SIGNALS</div>
						<h2 class="wla-hongkong-heading">WHAT IS MOVING IN<br>HONG KONG'S LEGAL LANDSCAPE.</h2>
						
						<table class="wla-hongkong-intel-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-hongkong-it-area">HKIAC</div>
										<div class="wla-hongkong-it-sub">ARBITRATION</div>
									</td>
									<td class="wla-hongkong-it-text">HKIAC Caseload Record High — Emergency arbitration 24-hour appointment now standard. HKIAC international caseload at record levels, reinforcing Hong Kong as APAC's dominant arbitration seat.</td>
									<td class="wla-hongkong-it-growth">+19%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-hongkong-it-area">VASP</div>
										<div class="wla-hongkong-it-sub">VIRTUAL ASSETS</div>
									</td>
									<td class="wla-hongkong-it-text">Hong Kong VASP Licensing Expansion — New categories of virtual asset service providers added to HKEX regulatory framework. Significant for crypto exchanges and digital asset managers seeking APAC regulatory cover.</td>
									<td class="wla-hongkong-it-growth">+28%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-hongkong-it-area">SFC</div>
										<div class="wla-hongkong-it-sub">FINANCIAL SERVICES</div>
									</td>
									<td class="wla-hongkong-it-text">SFC Tokenisation Circular — Securities and Futures Commission guidance on tokenised securities. Significant for asset managers exploring tokenised fund structures in Hong Kong.</td>
									<td class="wla-hongkong-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-hongkong-it-area">PDPO</div>
										<div class="wla-hongkong-it-sub">DATA PRIVACY</div>
									</td>
									<td class="wla-hongkong-it-text">PDPO Enforcement Uptick — Privacy Commissioner increasing enforcement activity. Significant for multinationals with Hong Kong data processing operations. Cross-border transfer guidance updated.</td>
									<td class="wla-hongkong-it-growth">Active</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-hongkong-intel-footer">
							<a href="wla-intelligence.html" class="wla-hongkong-btn-bdr">FULL HONG KONG INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-hongkong-corridor-bg">
				<section class="wla-hongkong-section wla-hongkong-section--dark wla-hongkong-animate">
					<div class="wla-hongkong-container">
						<div class="wla-hongkong-eyebrow-dark">CORRIDORS ACTIVE — HONG KONG</div>
						<h2 class="wla-hongkong-heading-dark">HONG KONG ON THE WORLD'S<br>MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-hongkong-corridor-grid">
							<a href="wla-corridor-gcc-seasia.html" class="wla-hongkong-cg">
								<div class="wla-hongkong-cg-route">GCC → SE ASIA</div>
								<div class="wla-hongkong-cg-growth">+31%</div>
								<p class="wla-hongkong-cg-desc">Gulf capital transiting through Hong Kong into ASEAN and mainland China.</p>
							</a>
							<a href="wla-corridor-apac-americas.html" class="wla-hongkong-cg">
								<div class="wla-hongkong-cg-route">APAC ↔ AMERICAS</div>
								<div class="wla-hongkong-cg-growth">+19%</div>
								<p class="wla-hongkong-cg-desc">Hong Kong as the APAC origination hub for Pacific Rim cross-border flows.</p>
							</a>
							<a href="wla-corridor-us-europe.html" class="wla-hongkong-cg">
								<div class="wla-hongkong-cg-route">US ↔ EUROPE</div>
								<div class="wla-hongkong-cg-growth">+18%</div>
								<p class="wla-hongkong-cg-desc">Hong Kong as neutral seat for US-European disputes resolved through HKIAC.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-hongkong-cta-band">
				<div class="wla-hongkong-cta-title">BRIEF WLA ON YOUR HONG KONG MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-hongkong-cta-buttons">
					<a href="wla-specialist.html" class="wla-hongkong-btn-white">FIND A HONG KONG SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-hongkong-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA HONG KONG PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}	
	/**
	 * India Jurisdiction Page Shortcode
	 *
	 * Displays the WLA India jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why India Now section with image and stats
	 * - Practice coverage grid (6 areas)
	 * - Intelligence signals table
	 * - Corridors active section
	 * - Partner spotlight section
	 * - CTA band
	 *
	 * Shortcode: [wla_india_page]
	 *
	 * @return string
	 */
	public function wla_india_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA INDIA PAGE WRAPPER -->
		<div class="wla-india-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-india-hero">
				<img class="wla-india-hero-img" src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920&q=85" alt="India">
				<div class="wla-india-hero-grad"></div>
				<div class="wla-india-hero-content">
					<div class="wla-india-flag">🇮🇳</div>
					<div class="wla-india-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · CENTRAL COMMAND · NEW DELHI</div>
					<h1 class="wla-india-hero-title">INDIA</h1>
					<div class="wla-india-hero-subtitle">THE WORLD'S FASTEST-GROWING MAJOR LEGAL MARKET</div>
					<div class="wla-india-hero-buttons">
						<a href="wla-specialist.html" class="wla-india-btn-white">FIND AN INDIA SPECIALIST — 48H</a>
						<a href="#why" class="wla-india-btn-ghost-white">WHY INDIA NOW</a>
						<a href="wla-intelligence.html" class="wla-india-btn-ghost-white">INDIA INTELLIGENCE</a>
					</div>
					<div class="wla-india-hero-stats">
						<div class="wla-india-hs">
							<div class="wla-india-hs-number">#5</div>
							<div class="wla-india-hs-label">Global GDP 2026</div>
						</div>
						<div class="wla-india-hs">
							<div class="wla-india-hs-number">$3.7T</div>
							<div class="wla-india-hs-label">Economy Size</div>
						</div>
						<div class="wla-india-hs">
							<div class="wla-india-hs-number">+8.2%</div>
							<div class="wla-india-hs-label">GDP Growth 2025</div>
						</div>
						<div class="wla-india-hs">
							<div class="wla-india-hs-number">+34%</div>
							<div class="wla-india-hs-label">EU→India Corridor</div>
						</div>
						<div class="wla-india-hs">
							<div class="wla-india-hs-number">HQ</div>
							<div class="wla-india-hs-label">WLA Central Command</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY INDIA NOW                                      -->
			<!-- ============================================================ -->
			<section class="wla-india-section wla-india-animate" id="why">
				<div class="wla-india-container">
					<div class="wla-india-why-grid">
						<div class="wla-india-why-image">
							<img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=85" alt="India Business">
							<div class="wla-india-why-image-tag">NEW DELHI · WLA CENTRAL COMMAND</div>
						</div>
						<div class="wla-india-why-content">
							<div class="wla-india-eyebrow">WHY INDIA. WHY NOW.</div>
							<h2 class="wla-india-why-title">THE WORLD'S MOST CONSEQUENTIAL LEGAL MARKET OF THE NEXT DECADE.</h2>
							<p class="wla-india-why-body">
								India is the world's fastest-growing major economy and the most significant legal market opportunity of the next decade. The EU-India Free Trade Agreement negotiations, the DPDP Rules 2025 data protection framework, Vision 2047 infrastructure investment, and the ongoing transformation of India's corporate law landscape are creating unprecedented cross-border legal work across every major practice area.
							</p>
							<p class="wla-india-why-body">
								WLA is the only Institutional co-practice framework with New Delhi as its Central Command — meaning India is not a remote outpost but the operational heart of the WLA institution. Every co-practice mandate touching India is coordinated from New Delhi.
							</p>
							<div class="wla-india-why-stats">
								<div class="wla-india-ws">
									<div class="wla-india-ws-number">$100B+</div>
									<div class="wla-india-ws-label">FDI Inflows 2025</div>
								</div>
								<div class="wla-india-ws">
									<div class="wla-india-ws-number">1.4B</div>
									<div class="wla-india-ws-label">Population</div>
								</div>
								<div class="wla-india-ws">
									<div class="wla-india-ws-number">EU-IND</div>
									<div class="wla-india-ws-label">FTA In Negotiation</div>
								</div>
								<div class="wla-india-ws">
									<div class="wla-india-ws-number">2047</div>
									<div class="wla-india-ws-label">Vision — Developed Nation</div>
								</div>
							</div>
							<div class="wla-india-why-buttons">
								<a href="wla-specialist.html" class="wla-india-btn-ink">FIND AN INDIA SPECIALIST →</a>
								<a href="wla-page-forgc.html" class="wla-india-btn-bdr">BRIEF WLA INDIA</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<div class="wla-india-rule"></div>
			
			<section class="wla-india-section wla-india-animate">
				<div class="wla-india-container">
					<div class="wla-india-eyebrow">WLA INDIA — PRACTICE COVERAGE</div>
					<h2 class="wla-india-heading">EVERY MAJOR PRACTICE.<br>INDIA-SPECIFIC DEEP EXPERTISE.</h2>
					<p class="wla-india-subheading">
						WLA India partner firms hold exclusive designations across 8 practice areas — the deepest independent legal expertise in each discipline, co-practiced under WLA's Institutional framework.
					</p>
					
					<div class="wla-india-practice-grid">
						
						<!-- Practice 01: M&A -->
						<div class="wla-india-pc">
							<div class="wla-india-pc-icon">⚖️</div>
							<div class="wla-india-pc-practice">CORE ALLIANCE</div>
							<div class="wla-india-pc-title">TRANSACTIONAL &amp; M&amp;A</div>
							<p class="wla-india-pc-desc">Cross-border M&A, FDI, joint ventures, and corporate structuring under Indian company law, FEMA, SEBI regulations, and sector-specific FDI caps. India as acquisition target and as acquiring jurisdiction.</p>
							<div class="wla-india-pc-firms">WLA INDIA · S.K. SINGHI &amp; PARTNERS</div>
						</div>
						
						<!-- Practice 02: Technology & Data -->
						<div class="wla-india-pc">
							<div class="wla-india-pc-icon">🌐</div>
							<div class="wla-india-pc-practice">SPECIALIST GROUP</div>
							<div class="wla-india-pc-title">TECHNOLOGY &amp; DATA</div>
							<p class="wla-india-pc-desc">DPDP Rules 2025 compliance, IT Act obligations, cross-border data transfer frameworks, AI regulation, and technology M&A — India's technology sector is the fastest-growing in the world.</p>
							<div class="wla-india-pc-firms">WLA INDIA TECH PRACTICE</div>
						</div>
						
						<!-- Practice 03: IP -->
						<div class="wla-india-pc">
							<div class="wla-india-pc-icon">⚗️</div>
							<div class="wla-india-pc-practice">CORE ALLIANCE</div>
							<div class="wla-india-pc-title">INTELLECTUAL PROPERTY</div>
							<p class="wla-india-pc-desc">Indian Patent Office prosecution, trademark registration, copyright, and IP enforcement. India's pharmaceutical patent landscape is uniquely complex — WLA India's IP practice has specialist depth in compulsory licensing and Section 3(d) analysis.</p>
							<div class="wla-india-pc-firms">WLA INDIA IP PRACTICE</div>
						</div>
						
						<!-- Practice 04: Infrastructure & Energy -->
						<div class="wla-india-pc">
							<div class="wla-india-pc-icon">🏗️</div>
							<div class="wla-india-pc-practice">SPECIALIST GROUP</div>
							<div class="wla-india-pc-title">INFRASTRUCTURE &amp; ENERGY</div>
							<p class="wla-india-pc-desc">National Infrastructure Pipeline, renewable energy projects, PPP frameworks, and project finance under Indian law. India's $1.4T infrastructure investment programme creates the largest project finance opportunity in Asia.</p>
							<div class="wla-india-pc-firms">WLA INDIA ENERGY PRACTICE</div>
						</div>
						
						<!-- Practice 05: Employment -->
						<div class="wla-india-pc">
							<div class="wla-india-pc-icon">💼</div>
							<div class="wla-india-pc-practice">SPECIALIST GROUP</div>
							<div class="wla-india-pc-title">EMPLOYMENT &amp; LABOUR</div>
							<p class="wla-india-pc-desc">India's four Labour Codes consolidating 29 central laws — compliance redesign for all employers. State-by-state implementation, termination procedures, trade union relations, and executive arrangements under Indian law.</p>
							<div class="wla-india-pc-firms">WLA INDIA EMPLOYMENT PRACTICE</div>
						</div>
						
						<!-- Practice 06: Transfer Pricing & Tax -->
						<div class="wla-india-pc">
							<div class="wla-india-pc-icon">🔄</div>
							<div class="wla-india-pc-practice">SPECIALIST GROUP</div>
							<div class="wla-india-pc-title">TRANSFER PRICING &amp; TAX</div>
							<p class="wla-india-pc-desc">India transfer pricing — among the most heavily litigated in the world. Cross-border tax structuring, APAs, MAP proceedings, and BEPS compliance under Indian domestic law and its network of 90+ tax treaties.</p>
							<div class="wla-india-pc-firms">WLA INDIA TAX PRACTICE</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                -->
			<!-- ============================================================ -->
			<div class="wla-india-intel-bg">
				<section class="wla-india-section wla-india-animate">
					<div class="wla-india-container">
						<div class="wla-india-eyebrow">WLA INTELLIGENCE — INDIA SIGNALS</div>
						<h2 class="wla-india-heading">WHAT'S MOVING IN<br>INDIA'S LEGAL LANDSCAPE.</h2>
						
						<table class="wla-india-signal-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-india-st-area">DATA PROTECTION</div>
										<div class="wla-india-st-sub">DPDP Rules 2025</div>
									</td>
									<td class="wla-india-st-signal"><strong>DPDP Rules 2025 Final</strong> — Cross-border data transfer framework published. Significant Processing Agreement requirements. 12-month compliance window now open for all international companies processing personal data in India.</td>
									<td class="wla-india-st-idx">+34%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-india-st-area">FDI / CORPORATE</div>
										<div class="wla-india-st-sub">FEMA Amendments</div>
									</td>
									<td class="wla-india-st-signal"><strong>FEMA Downstream Investment Rules</strong> — Revised automatic route thresholds for downstream investments. Significant impact on holding structure design for international companies with Indian subsidiaries.</td>
									<td class="wla-india-st-idx">+22%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-india-st-area">M&amp;A / COMPETITION</div>
										<div class="wla-india-st-sub">CCI Deal Thresholds</div>
									</td>
									<td class="wla-india-st-signal"><strong>CCI New Threshold Framework</strong> — Competition Commission of India introduces deal value threshold — transactions valued above ₹2,000 crore now require CCI approval regardless of revenue thresholds.</td>
									<td class="wla-india-st-idx wla-india-st-idx--active">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-india-st-area">TAX / TRANSFER PRICING</div>
										<div class="wla-india-st-sub">CBDT TP Guidelines</div>
									</td>
									<td class="wla-india-st-signal"><strong>CBDT Transfer Pricing Safe Harbour</strong> — Expanded safe harbour margins for IT and ITES transactions. Significant compliance simplification for technology companies with Indian shared service centres.</td>
									<td class="wla-india-st-idx">+18%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-india-st-area">INFRASTRUCTURE</div>
										<div class="wla-india-st-sub">NIP Phase 2</div>
									</td>
									<td class="wla-india-st-signal"><strong>National Infrastructure Pipeline Phase 2</strong> — ₹111 lakh crore investment programme. New PPP frameworks for roads, ports, and renewable energy creating record project finance activity.</td>
									<td class="wla-india-st-idx">+41%</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-india-intel-footer">
							<a href="wla-intelligence.html" class="wla-india-btn-bdr">FULL INDIA INTELLIGENCE →</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-india-corridor-bg">
				<section class="wla-india-section wla-india-section--dark wla-india-animate">
					<div class="wla-india-container">
						<div class="wla-india-eyebrow-dark">CORRIDORS ACTIVE — INDIA</div>
						<h2 class="wla-india-heading-dark">INDIA ON BOTH SIDES<br>OF THE WORLD'S MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-india-corridor-grid">
							<a href="wla-corridors.html" class="wla-india-cc">
								<div class="wla-india-cc-route">
									<span class="wla-india-cc-from">EU</span>
									<span class="wla-india-cc-arrow">→</span>
									<span class="wla-india-cc-to">INDIA</span>
								</div>
								<div class="wla-india-cc-growth">↑ 34% GROWTH — MOST ACTIVE</div>
								<p class="wla-india-cc-desc">EU-India FTA negotiations driving record M&A, technology, and pharmaceutical dealflow. WLA EU + WLA India co-practice both sides.</p>
							</a>
							<a href="wla-corridors.html" class="wla-india-cc">
								<div class="wla-india-cc-route">
									<span class="wla-india-cc-from">GCC</span>
									<span class="wla-india-cc-arrow">→</span>
									<span class="wla-india-cc-to">INDIA</span>
								</div>
								<div class="wla-india-cc-growth">↑ 28% GROWTH</div>
								<p class="wla-india-cc-desc">Gulf sovereign capital and family office investment into Indian real estate, infrastructure, and technology. CEPA bilateral framework accelerating.</p>
							</a>
							<a href="wla-corridors.html" class="wla-india-cc">
								<div class="wla-india-cc-route">
									<span class="wla-india-cc-from">UK</span>
									<span class="wla-india-cc-arrow">↔</span>
									<span class="wla-india-cc-to">INDIA</span>
								</div>
								<div class="wla-india-cc-growth">↑ 19% GROWTH</div>
								<p class="wla-india-cc-desc">UK-India FTA post-implementation activity. Financial services, professional services, and technology corridors all growing. Common law alignment advantage.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PARTNER SPOTLIGHT                                   -->
			<!-- ============================================================ -->
			<section class="wla-india-section wla-india-section--partner wla-india-animate">
				<div class="wla-india-container">
					<div class="wla-india-eyebrow">WLA INDIA PARTNER SPOTLIGHT</div>
					<h2 class="wla-india-heading">MEET THE WLA INDIA<br>ANCHOR FIRM.</h2>
					
					<div class="wla-india-partner-layout">
						<div class="wla-india-partner-image">
							<img src="https://worldlawalliance.com/wp-content/uploads/2025/10/Akshay-Singhi-WLA-Member-scaled.jpg" alt="Akshay Singhi" onerror="this.style.background='var(--wla-india-off)'">
						</div>
						<div class="wla-india-partner-content">
							<div class="wla-india-pc-tag">WLA INDIA · ANCHOR FIRM · NEW DELHI</div>
							<div class="wla-india-pc-name">AKSHAY SINGHI</div>
							<div class="wla-india-pc-firm">Senior Partner · S.K. Singhi &amp; Partners · New Delhi, India</div>
							<div class="wla-india-pc-quote">"WLA gives our practice an Institutional platform that lets us compete at the very highest level of cross-border work — while our independence remains our greatest strength. India is the world's most consequential legal market of the next decade. WLA is how we serve it globally."</div>
							<div class="wla-india-pc-practices">
								<span class="wla-india-pc-prac">Transactional M&amp;A</span>
								<span class="wla-india-pc-prac">FDI</span>
								<span class="wla-india-pc-prac">Corporate</span>
								<span class="wla-india-pc-prac">Joint Ventures</span>
								<span class="wla-india-pc-prac">Private Equity</span>
							</div>
							<div class="wla-india-pc-buttons">
								<a href="wla-specialist.html" class="wla-india-btn-ink">BRIEF WLA INDIA — 48H →</a>
								<a href="wla-directory.html" class="wla-india-btn-bdr">VIEW ALL INDIA SPECIALISTS</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-india-cta-band">
				<div class="wla-india-cta-title">BRIEF WLA ON YOUR INDIA MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-india-cta-buttons">
					<a href="wla-specialist.html" class="wla-india-btn-white">FIND AN INDIA SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-india-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA INDIA PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Netherlands Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Netherlands jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Netherlands section with image and stats
	 * - Practice coverage grid (6 areas)
	 * - Intelligence table with signals
	 * - Corridors active section
	 * - CTA band
	 *
	 * Shortcode: [wla_netherlands_page]
	 *
	 * @return string
	 */
	public function wla_netherlands_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA NETHERLANDS PAGE WRAPPER -->
		<div class="wla-netherlands-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-netherlands-hero">
				<img class="wla-netherlands-hero-img" src="https://images.unsplash.com/photo-1512470876302-972faa2aa9a4?w=1920&q=85" alt="Netherlands">
				<div class="wla-netherlands-hero-grad"></div>
				<div class="wla-netherlands-hero-content">
					<div class="wla-netherlands-flag">🇳🇱</div>
					<div class="wla-netherlands-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · NETHERLANDS · AMSTERDAM · DUTCH LAW</div>
					<h1 class="wla-netherlands-hero-title">NETHERLANDS</h1>
					<div class="wla-netherlands-hero-subtitle">EUROPE'S MOST OPEN ECONOMY · WHOA · NAI ARBITRATION · EU GATEWAY</div>
					<div class="wla-netherlands-hero-buttons">
						<a href="wla-specialist.html" class="wla-netherlands-btn-white">FIND A NETHERLANDS SPECIALIST — 48H</a>
						<a href="#why" class="wla-netherlands-btn-ghost-white">WHY NETHERLANDS</a>
						<a href="wla-intelligence.html" class="wla-netherlands-btn-ghost-white">NETHERLANDS INTELLIGENCE</a>
					</div>
					<div class="wla-netherlands-hero-stats">
						<div class="wla-netherlands-hs">
							<div class="wla-netherlands-hs-number">#1</div>
							<div class="wla-netherlands-hs-label">EU FDI Destination Per Capita</div>
						</div>
						<div class="wla-netherlands-hs">
							<div class="wla-netherlands-hs-number">WHOA</div>
							<div class="wla-netherlands-hs-label">World-Class Restructuring Tool</div>
						</div>
						<div class="wla-netherlands-hs">
							<div class="wla-netherlands-hs-number">NAI</div>
							<div class="wla-netherlands-hs-label">Amsterdam Arbitration</div>
						</div>
						<div class="wla-netherlands-hs">
							<div class="wla-netherlands-hs-number">Dutch BV</div>
							<div class="wla-netherlands-hs-label">Preferred EU Holding Vehicle</div>
						</div>
						<div class="wla-netherlands-hs">
							<div class="wla-netherlands-hs-number">AEX</div>
							<div class="wla-netherlands-hs-label">Amsterdam Stock Exchange</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY NETHERLANDS                                    -->
			<!-- ============================================================ -->
			<section class="wla-netherlands-section wla-netherlands-animate" id="why">
				<div class="wla-netherlands-container">
					<div class="wla-netherlands-why-grid">
						<div class="wla-netherlands-why-image">
							<img src="https://images.unsplash.com/photo-1512470876302-972faa2aa9a4?w=1920&q=85" alt="Netherlands">
						</div>
						<div class="wla-netherlands-why-content">
							<div class="wla-netherlands-eyebrow">WHY NETHERLANDS. WHY NOW.</div>
							<h2 class="wla-netherlands-why-title">EUROPE'S MOST OPEN ECONOMY AND THE EU'S PREMIER HOLDING JURISDICTION.</h2>
							<p class="wla-netherlands-why-body">
								The Netherlands is Europe's most internationally open economy — the EU's number one FDI destination per capita and the preferred holding jurisdiction for international groups structuring EU market access. Dutch BV and NV structures are used by thousands of multinationals as their EU holding vehicle. Amsterdam is Europe's leading financial centre post-Brexit, with the AFM as a sophisticated EU-passporting regulator and a deep capital markets ecosystem.
							</p>
							<p class="wla-netherlands-why-body">
								The WHOA — the Dutch restructuring framework — has become one of the most-used cross-border restructuring tools in Europe since its introduction, with the Dutch courts attracting cross-border restructurings from across the EU. WLA Netherlands co-practices the full Dutch law landscape including Dutch BV/NV corporate law, WHOA restructuring, NAI arbitration, employment under the Dutch Works Council framework, and Dutch tax as a core element of EU holding structures.
							</p>
							<div class="wla-netherlands-why-stats">
								<div class="wla-netherlands-ws">
									<div class="wla-netherlands-ws-number">WHOA</div>
									<div class="wla-netherlands-ws-label">Cross-Border Restructuring Leader</div>
								</div>
								<div class="wla-netherlands-ws">
									<div class="wla-netherlands-ws-number">Dutch BV</div>
									<div class="wla-netherlands-ws-label">Most-Used EU Holding Vehicle</div>
								</div>
								<div class="wla-netherlands-ws">
									<div class="wla-netherlands-ws-number">AFM</div>
									<div class="wla-netherlands-ws-label">EU Financial Passporting</div>
								</div>
								<div class="wla-netherlands-ws">
									<div class="wla-netherlands-ws-number">NATO HQ</div>
									<div class="wla-netherlands-ws-label">The Hague — International Courts</div>
								</div>
							</div>
							<div class="wla-netherlands-why-buttons">
								<a href="wla-specialist.html" class="wla-netherlands-btn-ink">FIND A SPECIALIST</a>
								<a href="wla-page-forgc.html" class="wla-netherlands-btn-bdr">BRIEF WLA NETHERLANDS</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-netherlands-section wla-netherlands-section--alt wla-netherlands-animate">
				<div class="wla-netherlands-container">
					<div class="wla-netherlands-eyebrow">WLA NETHERLANDS — PRACTICE COVERAGE</div>
					<h2 class="wla-netherlands-heading">EVERY MAJOR PRACTICE.<br>NETHERLANDS-SPECIFIC EXPERTISE.</h2>
					
					<div class="wla-netherlands-practice-grid">
						
						<!-- Practice 01: Corporate -->
						<div class="wla-netherlands-pc">
							<div class="wla-netherlands-pc-number">CORE ALLIANCE</div>
							<div class="wla-netherlands-pc-icon">🏢</div>
							<div class="wla-netherlands-pc-title">DUTCH CORPORATE — BV/NV</div>
							<p class="wla-netherlands-pc-desc">Dutch BV and NV incorporation, corporate governance, shareholder agreements, and cross-border M&A under Dutch company law. The Netherlands as EU holding jurisdiction for international groups — tax efficient, legally certain, EU-passportable.</p>
						</div>
						
						<!-- Practice 02: WHOA Restructuring -->
						<div class="wla-netherlands-pc">
							<div class="wla-netherlands-pc-number">CORE ALLIANCE</div>
							<div class="wla-netherlands-pc-icon">🔄</div>
							<div class="wla-netherlands-pc-title">WHOA — RESTRUCTURING</div>
							<p class="wla-netherlands-pc-desc">The Dutch WHOA (Wet Homologatie Onderhands Akkoord) — one of Europe's most powerful pre-insolvency restructuring tools. Cross-class cramdown, fast timeline, international recognition across EU. WLA Netherlands is one of the most active WHOA practices in the country.</p>
						</div>
						
						<!-- Practice 03: NAI Arbitration -->
						<div class="wla-netherlands-pc">
							<div class="wla-netherlands-pc-number">SPECIALIST</div>
							<div class="wla-netherlands-pc-icon">⚖️</div>
							<div class="wla-netherlands-pc-title">NAI ARBITRATION</div>
							<p class="wla-netherlands-pc-desc">Netherlands Arbitration Institute (NAI) proceedings, international commercial arbitration seated in Amsterdam, and The Hague arbitration. Netherlands as neutral seat for European and international commercial disputes.</p>
						</div>
						
						<!-- Practice 04: Employment -->
						<div class="wla-netherlands-pc">
							<div class="wla-netherlands-pc-number">SPECIALIST</div>
							<div class="wla-netherlands-pc-icon">💼</div>
							<div class="wla-netherlands-pc-title">EMPLOYMENT — WORKS COUNCIL</div>
							<p class="wla-netherlands-pc-desc">Dutch Works Council (OR) consultation obligations, collective labour agreements (CAO), and employment law compliance. Dutch employment law is among the most employee-protective in Europe — Works Council consultation is mandatory on all major business decisions.</p>
						</div>
						
						<!-- Practice 05: Dutch Tax -->
						<div class="wla-netherlands-pc">
							<div class="wla-netherlands-pc-number">SPECIALIST</div>
							<div class="wla-netherlands-pc-icon">💰</div>
							<div class="wla-netherlands-pc-title">DUTCH TAX — EU HOLDING</div>
							<p class="wla-netherlands-pc-desc">Netherlands participation exemption, Dutch co-operative (Coöp) structures, dividend withholding tax, and transfer pricing. The Netherlands as tax-efficient EU holding jurisdiction for international groups routing income from EU subsidiaries.</p>
						</div>
						
						<!-- Practice 06: Sustainability -->
						<div class="wla-netherlands-pc">
							<div class="wla-netherlands-pc-number">SPECIALIST</div>
							<div class="wla-netherlands-pc-icon">🌱</div>
							<div class="wla-netherlands-pc-title">SUSTAINABILITY — CSRD</div>
							<p class="wla-netherlands-pc-desc">EU Corporate Sustainability Reporting Directive (CSRD) implementation — Dutch companies lead EU sustainability reporting. CSDDD supply chain due diligence obligations. WLA Netherlands advises on full CSRD and CSDDD compliance.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE TABLE                                  -->
			<!-- ============================================================ -->
			<div class="wla-netherlands-intel-bg">
				<section class="wla-netherlands-section wla-netherlands-animate">
					<div class="wla-netherlands-container">
						<div class="wla-netherlands-eyebrow">WLA INTELLIGENCE — NETHERLANDS SIGNALS</div>
						<h2 class="wla-netherlands-heading">WHAT IS MOVING IN<br>NETHERLANDS' LEGAL LANDSCAPE.</h2>
						
						<table class="wla-netherlands-intel-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-netherlands-it-area">WHOA</div>
										<div class="wla-netherlands-it-sub">RESTRUCTURING</div>
									</td>
									<td class="wla-netherlands-it-text">WHOA Cross-Border Uptake — Netherlands courts attracting record international WHOA filings from UK, German, and Belgian debtors. The Netherlands is now firmly established as Europe's premier pre-insolvency restructuring seat.</td>
									<td class="wla-netherlands-it-growth">+24%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-netherlands-it-area">CSRD</div>
										<div class="wla-netherlands-it-sub">SUSTAINABILITY</div>
									</td>
									<td class="wla-netherlands-it-text">CSRD Phase 2 — Large non-EU companies with EU operations now within CSRD scope. Dutch AFM and enterprise court enforcement active. WLA Netherlands advising on full CSRD compliance programmes.</td>
									<td class="wla-netherlands-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-netherlands-it-area">M&amp;A</div>
										<div class="wla-netherlands-it-sub">FDI SCREENING</div>
									</td>
									<td class="wla-netherlands-it-text">Dutch FDI Screening Expansion — Vifo Act review expanded to cover more technology sectors. Significant for non-EU acquisitions of Dutch technology companies. WLA Netherlands advises on screening procedures.</td>
									<td class="wla-netherlands-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-netherlands-it-area">TAX</div>
										<div class="wla-netherlands-it-sub">EU HOLDING</div>
									</td>
									<td class="wla-netherlands-it-text">Dutch Tax Treaty Network — Netherlands maintaining and updating its network of 100+ bilateral tax treaties. Significant for international groups using Dutch holding structures for EU and emerging market income.</td>
									<td class="wla-netherlands-it-growth">Active</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-netherlands-intel-footer">
							<a href="wla-intelligence.html" class="wla-netherlands-btn-bdr">FULL NETHERLANDS INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-netherlands-corridor-bg">
				<section class="wla-netherlands-section wla-netherlands-section--dark wla-netherlands-animate">
					<div class="wla-netherlands-container">
						<div class="wla-netherlands-eyebrow-dark">CORRIDORS ACTIVE — NETHERLANDS</div>
						<h2 class="wla-netherlands-heading-dark">NETHERLANDS ON THE WORLD'S<br>MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-netherlands-corridor-grid">
							<a href="wla-corridor-eu-india.html" class="wla-netherlands-cg">
								<div class="wla-netherlands-cg-route">EU → INDIA</div>
								<div class="wla-netherlands-cg-growth">+34%</div>
								<p class="wla-netherlands-cg-desc">Netherlands as EU origination hub for India-bound technology M&A and FDI.</p>
							</a>
							<a href="wla-corridor-us-europe.html" class="wla-netherlands-cg">
								<div class="wla-netherlands-cg-route">US ↔ EUROPE</div>
								<div class="wla-netherlands-cg-growth">+18%</div>
								<p class="wla-netherlands-cg-desc">Dutch BV holding structures a central feature of US-European M&A and PE carve-outs.</p>
							</a>
							<a href="wla-corridor-gulf-cee.html" class="wla-netherlands-cg">
								<div class="wla-netherlands-cg-route">GULF → CEE</div>
								<div class="wla-netherlands-cg-growth">+38%</div>
								<p class="wla-netherlands-cg-desc">Amsterdam as Gulf capital structuring hub for Central European real estate investment.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-netherlands-cta-band">
				<div class="wla-netherlands-cta-title">BRIEF WLA ON YOUR NETHERLANDS MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-netherlands-cta-buttons">
					<a href="wla-specialist.html" class="wla-netherlands-btn-white">FIND A NETHERLANDS SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-netherlands-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA NETHERLANDS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Poland Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Poland jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Poland section with image and stats
	 * - Practice coverage grid (6 areas)
	 * - Intelligence table with signals
	 * - Corridors active section
	 * - CTA band
	 *
	 * Shortcode: [wla_poland_page]
	 *
	 * @return string
	 */
	public function wla_poland_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA POLAND PAGE WRAPPER -->
		<div class="wla-poland-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-poland-hero">
				<img class="wla-poland-hero-img" src="https://images.unsplash.com/photo-1519197924294-4ba991a11128?w=1920&q=85" alt="Poland">
				<div class="wla-poland-hero-grad"></div>
				<div class="wla-poland-hero-content">
					<div class="wla-poland-flag">🇵🇱</div>
					<div class="wla-poland-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · POLAND · WARSAW · CEE HUB</div>
					<h1 class="wla-poland-hero-title">POLAND</h1>
					<div class="wla-poland-hero-subtitle">CENTRAL EUROPE'S LARGEST ECONOMY · EU POWERHOUSE · GULF CORRIDOR TARGET</div>
					<div class="wla-poland-hero-buttons">
						<a href="wla-specialist.html" class="wla-poland-btn-white">FIND A POLAND SPECIALIST — 48H</a>
						<a href="#why" class="wla-poland-btn-ghost-white">WHY POLAND</a>
						<a href="wla-intelligence.html" class="wla-poland-btn-ghost-white">POLAND INTELLIGENCE</a>
					</div>
					<div class="wla-poland-hero-stats">
						<div class="wla-poland-hs">
							<div class="wla-poland-hs-number">#1</div>
							<div class="wla-poland-hs-label">Largest CEE Economy</div>
						</div>
						<div class="wla-poland-hs">
							<div class="wla-poland-hs-number">GDP +3.2%</div>
							<div class="wla-poland-hs-label">2025 Growth Rate</div>
						</div>
						<div class="wla-poland-hs">
							<div class="wla-poland-hs-number">Gulf→CEE</div>
							<div class="wla-poland-hs-label">Primary Destination</div>
						</div>
						<div class="wla-poland-hs">
							<div class="wla-poland-hs-number">EU</div>
							<div class="wla-poland-hs-label">Full Member — Single Market</div>
						</div>
						<div class="wla-poland-hs">
							<div class="wla-poland-hs-number">Warsaw</div>
							<div class="wla-poland-hs-label">CEE Financial Capital</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY POLAND                                         -->
			<!-- ============================================================ -->
			<section class="wla-poland-section wla-poland-animate" id="why">
				<div class="wla-poland-container">
					<div class="wla-poland-why-grid">
						<div class="wla-poland-why-image">
							<img src="https://images.unsplash.com/photo-1519197924294-4ba991a11128?w=1920&q=85" alt="Poland">
						</div>
						<div class="wla-poland-why-content">
							<div class="wla-poland-eyebrow">WHY POLAND. WHY NOW.</div>
							<h2 class="wla-poland-why-title">CENTRAL EUROPE'S LARGEST ECONOMY AND THE PRIMARY DESTINATION FOR GULF-TO-CEE CAPITAL.</h2>
							<p class="wla-poland-why-body">
								Poland is Central Europe's largest economy and the primary destination for Gulf capital flows on the Gulf→CEE corridor — Europe's fastest-growing cross-border deal corridor at +38% in 2026. Poland's combination of EU membership, a large domestic market of 38 million people, a growing technology sector, strong manufacturing base, and proximity to both Western Europe and Ukraine reconstruction opportunity makes it the most active CEE investment destination for international capital.
							</p>
							<p class="wla-poland-why-body">
								WLA Poland co-practices every dimension of Polish law for cross-border mandates — from Polish M&A under the Kodeks Spółek Handlowych and FDI screening (UOKIK and strategic sector review) through Polish employment and Works Council law, competition filings with UOKiK, and the full Polish tax framework including the new Pillar Two domestic minimum top-up tax.
							</p>
							<div class="wla-poland-why-stats">
								<div class="wla-poland-ws">
									<div class="wla-poland-ws-number">38M</div>
									<div class="wla-poland-ws-label">Population — Largest CEE Market</div>
								</div>
								<div class="wla-poland-ws">
									<div class="wla-poland-ws-number">FDI</div>
									<div class="wla-poland-ws-label">Record Inflow 2025</div>
								</div>
								<div class="wla-poland-ws">
									<div class="wla-poland-ws-number">Ukraine</div>
									<div class="wla-poland-ws-label">Reconstruction Gateway</div>
								</div>
								<div class="wla-poland-ws">
									<div class="wla-poland-ws-number">NATO</div>
									<div class="wla-poland-ws-label">Strategic Security Positioning</div>
								</div>
							</div>
							<div class="wla-poland-why-buttons">
								<a href="wla-specialist.html" class="wla-poland-btn-ink">FIND A SPECIALIST</a>
								<a href="wla-page-forgc.html" class="wla-poland-btn-bdr">BRIEF WLA POLAND</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-poland-section wla-poland-section--alt wla-poland-animate">
				<div class="wla-poland-container">
					<div class="wla-poland-eyebrow">WLA POLAND — PRACTICE COVERAGE</div>
					<h2 class="wla-poland-heading">EVERY MAJOR PRACTICE.<br>POLAND-SPECIFIC EXPERTISE.</h2>
					
					<div class="wla-poland-practice-grid">
						
						<!-- Practice 01: M&A -->
						<div class="wla-poland-pc">
							<div class="wla-poland-pc-number">CORE ALLIANCE</div>
							<div class="wla-poland-pc-icon">🤝</div>
							<div class="wla-poland-pc-title">M&amp;A — POLISH CORPORATE</div>
							<p class="wla-poland-pc-desc">Polish M&A under the Kodeks Spółek Handlowych (KSH), sp. z o.o. and S.A. structures, share and asset deals, UOKiK merger control filings, and FDI screening for strategic sector acquisitions. Poland as primary CEE M&A destination for Gulf and global capital.</p>
						</div>
						
						<!-- Practice 02: Real Estate -->
						<div class="wla-poland-pc">
							<div class="wla-poland-pc-number">CORE ALLIANCE</div>
							<div class="wla-poland-pc-icon">🏗️</div>
							<div class="wla-poland-pc-title">REAL ESTATE — WARSAW AND BEYOND</div>
							<p class="wla-poland-pc-desc">Polish real estate — commercial property acquisition, logistics and warehouse parks, residential development, and REIT-equivalent structures. Warsaw remains the top CEE city for Gulf real estate investment. WLA Poland advises on the full acquisition chain from due diligence to completion.</p>
						</div>
						
						<!-- Practice 03: Employment -->
						<div class="wla-poland-pc">
							<div class="wla-poland-pc-number">SPECIALIST</div>
							<div class="wla-poland-pc-icon">💼</div>
							<div class="wla-poland-pc-title">EMPLOYMENT — POLISH WORKS COUNCIL</div>
							<p class="wla-poland-pc-desc">Polish Works Council consultation obligations, individual labour law under the Kodeks Pracy, collective redundancy procedures, and M&A employment aspects including TUPE equivalents. Polish employment law significantly employee-protective.</p>
						</div>
						
						<!-- Practice 04: Tax -->
						<div class="wla-poland-pc">
							<div class="wla-poland-pc-number">SPECIALIST</div>
							<div class="wla-poland-pc-icon">💰</div>
							<div class="wla-poland-pc-title">TAX — PILLAR TWO</div>
							<p class="wla-poland-pc-desc">Polish corporate income tax, transfer pricing under MF guidelines, the new Pillar Two domestic minimum top-up tax for global groups with Polish subsidiaries, and Polish VAT. Significant M&A tax structuring for Gulf and US buyers of Polish companies.</p>
						</div>
						
						<!-- Practice 05: Arbitration -->
						<div class="wla-poland-pc">
							<div class="wla-poland-pc-number">SPECIALIST</div>
							<div class="wla-poland-pc-icon">⚖️</div>
							<div class="wla-poland-pc-title">ARBITRATION — SA AND ICC POLAND</div>
							<p class="wla-poland-pc-desc">Polish Arbitration Court (SA) proceedings, ICC arbitrations with Polish seat, and enforcement of foreign awards in Poland under the New York Convention. Poland as arbitration seat for CEE disputes.</p>
						</div>
						
						<!-- Practice 06: Energy -->
						<div class="wla-poland-pc">
							<div class="wla-poland-pc-number">SPECIALIST</div>
							<div class="wla-poland-pc-icon">🏭</div>
							<div class="wla-poland-pc-title">ENERGY — TRANSITION</div>
							<p class="wla-poland-pc-desc">Polish energy law — renewable energy auctions (RES auctions), offshore wind, the Polish capacity market, and hydrogen regulation. Poland's energy transition creates significant project finance and regulatory work for international investors.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE TABLE                                  -->
			<!-- ============================================================ -->
			<div class="wla-poland-intel-bg">
				<section class="wla-poland-section wla-poland-animate">
					<div class="wla-poland-container">
						<div class="wla-poland-eyebrow">WLA INTELLIGENCE — POLAND SIGNALS</div>
						<h2 class="wla-poland-heading">WHAT IS MOVING IN<br>POLAND'S LEGAL LANDSCAPE.</h2>
						
						<table class="wla-poland-intel-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-poland-it-area">FDI</div>
										<div class="wla-poland-it-sub">SCREENING</div>
									</td>
									<td class="wla-poland-it-text">Polish FDI Screening Extension — Vifo-equivalent review expanded to real estate transactions above EUR 10M involving non-EU investors. Significant for Gulf real estate acquisitions in Warsaw.</td>
									<td class="wla-poland-it-growth">+38%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-poland-it-area">TAX</div>
										<div class="wla-poland-it-sub">PILLAR TWO</div>
									</td>
									<td class="wla-poland-it-text">Pillar Two Domestic Top-Up Tax — Poland enacted domestic minimum top-up tax. Polish subsidiaries of global groups now reviewing top-up tax exposure. WLA Poland advising on compliance.</td>
									<td class="wla-poland-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-poland-it-area">ENERGY</div>
										<div class="wla-poland-it-sub">RENEWABLES</div>
									</td>
									<td class="wla-poland-it-text">Polish Offshore Wind — First offshore wind auction concluded. Record international investment in Polish Baltic offshore wind. Significant project finance and regulatory work.</td>
									<td class="wla-poland-it-growth">+31%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-poland-it-area">UKRAINE</div>
										<div class="wla-poland-it-sub">RECONSTRUCTION</div>
									</td>
									<td class="wla-poland-it-text">Ukraine Reconstruction Gateway — Poland positioning as primary logistics and legal hub for Ukraine reconstruction investment. WLA Poland advising international investors on Polish-Ukraine legal structures.</td>
									<td class="wla-poland-it-growth">Emerging</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-poland-intel-footer">
							<a href="wla-intelligence.html" class="wla-poland-btn-bdr">FULL POLAND INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-poland-corridor-bg">
				<section class="wla-poland-section wla-poland-section--dark wla-poland-animate">
					<div class="wla-poland-container">
						<div class="wla-poland-eyebrow-dark">CORRIDORS ACTIVE — POLAND</div>
						<h2 class="wla-poland-heading-dark">POLAND ON THE WORLD'S<br>MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-poland-corridor-grid">
							<a href="wla-corridor-gulf-cee.html" class="wla-poland-cg">
								<div class="wla-poland-cg-route">GULF → CEE</div>
								<div class="wla-poland-cg-growth">+38%</div>
								<p class="wla-poland-cg-desc">Poland is the primary destination for Gulf capital on Europe's fastest-growing corridor.</p>
							</a>
							<a href="wla-corridor-eu-india.html" class="wla-poland-cg">
								<div class="wla-poland-cg-route">EU → INDIA</div>
								<div class="wla-poland-cg-growth">+34%</div>
								<p class="wla-poland-cg-desc">Poland-India technology and manufacturing corridor growing as Polish tech sector expands.</p>
							</a>
							<a href="wla-corridor-us-europe.html" class="wla-poland-cg">
								<div class="wla-poland-cg-route">US ↔ EUROPE</div>
								<div class="wla-poland-cg-growth">+18%</div>
								<p class="wla-poland-cg-desc">US PE carve-outs increasingly including Polish operations as part of European portfolios.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-poland-cta-band">
				<div class="wla-poland-cta-title">BRIEF WLA ON YOUR POLAND MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-poland-cta-buttons">
					<a href="wla-specialist.html" class="wla-poland-btn-white">FIND A POLAND SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-poland-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA POLAND PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Portugal Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Portugal jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Portugal section with image and stats
	 * - Practice coverage grid (6 areas)
	 * - Intelligence table with signals
	 * - Corridors active section
	 * - CTA band
	 *
	 * Shortcode: [wla_portugal_page]
	 *
	 * @return string
	 */
	public function wla_portugal_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA PORTUGAL PAGE WRAPPER -->
		<div class="wla-portugal-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-portugal-hero">
				<img class="wla-portugal-hero-img" src="https://images.unsplash.com/photo-1555881400-74d7acaacd8b?w=1920&q=85" alt="Portugal">
				<div class="wla-portugal-hero-grad"></div>
				<div class="wla-portugal-hero-content">
					<div class="wla-portugal-flag">🇵🇹</div>
					<div class="wla-portugal-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · PORTUGAL · LISBON · GOLDEN VISA · LUSOPHONE</div>
					<h1 class="wla-portugal-hero-title">PORTUGAL</h1>
					<div class="wla-portugal-hero-subtitle">EU GATEWAY · LUSOPHONE BRIDGE · ARI GOLDEN VISA · ATLANTIC HUB</div>
					<div class="wla-portugal-hero-buttons">
						<a href="wla-specialist.html" class="wla-portugal-btn-white">FIND A PORTUGAL SPECIALIST — 48H</a>
						<a href="#why" class="wla-portugal-btn-ghost-white">WHY PORTUGAL</a>
						<a href="wla-intelligence.html" class="wla-portugal-btn-ghost-white">PORTUGAL INTELLIGENCE</a>
					</div>
					<div class="wla-portugal-hero-stats">
						<div class="wla-portugal-hs">
							<div class="wla-portugal-hs-number">EU</div>
							<div class="wla-portugal-hs-label">Member Since 1986</div>
						</div>
						<div class="wla-portugal-hs">
							<div class="wla-portugal-hs-number">ARI</div>
							<div class="wla-portugal-hs-label">Golden Visa — Fund Route Active</div>
						</div>
						<div class="wla-portugal-hs">
							<div class="wla-portugal-hs-number">Portuguese</div>
							<div class="wla-portugal-hs-label">Spoken by 250M People</div>
						</div>
						<div class="wla-portugal-hs">
							<div class="wla-portugal-hs-number">Lusophone</div>
							<div class="wla-portugal-hs-label">Bridge to Brazil, Angola, Mozambique</div>
						</div>
						<div class="wla-portugal-hs">
							<div class="wla-portugal-hs-number">NHR 2.0</div>
							<div class="wla-portugal-hs-label">Tax Regime for New Residents</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY PORTUGAL                                      -->
			<!-- ============================================================ -->
			<section class="wla-portugal-section wla-portugal-animate" id="why">
				<div class="wla-portugal-container">
					<div class="wla-portugal-why-grid">
						<div class="wla-portugal-why-image">
							<img src="https://images.unsplash.com/photo-1555881400-74d7acaacd8b?w=1920&q=85" alt="Portugal">
						</div>
						<div class="wla-portugal-why-content">
							<div class="wla-portugal-eyebrow">WHY PORTUGAL. WHY NOW.</div>
							<h2 class="wla-portugal-why-title">EU MEMBERSHIP, LUSOPHONE GATEWAY, AND EUROPE'S MOST ACCESSIBLE GOLDEN VISA.</h2>
							<p class="wla-portugal-why-body">
								Portugal is uniquely positioned in the global legal landscape: a fully integrated EU member state with a common law-influenced civil law system, the gateway to the Lusophone world of 250 million Portuguese speakers across Brazil, Angola, Mozambique, Cape Verde, and beyond, and the home of one of Europe's most accessible investor residence programmes — the ARI Golden Visa, whose fund investment route remains open following the closure of the property route.
							</p>
							<p class="wla-portugal-why-body">
								WLA Portugal co-practices the full Portuguese legal landscape for international clients — from ARI Golden Visa fund route applications and NHR 2.0 tax status for new residents, through Portuguese M&A and corporate law, to the uniquely valuable role Portugal plays as the legal bridge between the EU and the Lusophone world across Brazil, Angola, and Mozambique.
							</p>
							<div class="wla-portugal-why-stats">
								<div class="wla-portugal-ws">
									<div class="wla-portugal-ws-number">ARI</div>
									<div class="wla-portugal-ws-label">Golden Visa Fund Route — EUR 500K</div>
								</div>
								<div class="wla-portugal-ws">
									<div class="wla-portugal-ws-number">NHR 2.0</div>
									<div class="wla-portugal-ws-label">Non-Habitual Resident Tax Status</div>
								</div>
								<div class="wla-portugal-ws">
									<div class="wla-portugal-ws-number">Lusophone</div>
									<div class="wla-portugal-ws-label">Bridge to 250M Speakers</div>
								</div>
								<div class="wla-portugal-ws">
									<div class="wla-portugal-ws-number">EU</div>
									<div class="wla-portugal-ws-label">Schengen Access</div>
								</div>
							</div>
							<div class="wla-portugal-why-buttons">
								<a href="wla-specialist.html" class="wla-portugal-btn-ink">FIND A SPECIALIST</a>
								<a href="wla-page-forgc.html" class="wla-portugal-btn-bdr">BRIEF WLA PORTUGAL</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-portugal-section wla-portugal-section--alt wla-portugal-animate">
				<div class="wla-portugal-container">
					<div class="wla-portugal-eyebrow">WLA PORTUGAL — PRACTICE COVERAGE</div>
					<h2 class="wla-portugal-heading">EVERY MAJOR PRACTICE.<br>PORTUGAL-SPECIFIC EXPERTISE.</h2>
					
					<div class="wla-portugal-practice-grid">
						
						<!-- Practice 01: Golden Visa Fund Route -->
						<div class="wla-portugal-pc">
							<div class="wla-portugal-pc-number">SPECIALIST</div>
							<div class="wla-portugal-pc-icon">🏠</div>
							<div class="wla-portugal-pc-title">ARI — GOLDEN VISA FUND ROUTE</div>
							<p class="wla-portugal-pc-desc">Portugal's ARI Golden Visa — fund investment route. EUR 500K minimum into qualified investment funds. EU residence. Schengen access. 5-year path to citizenship. WLA Portugal advises on qualifying fund selection, application process, and residence planning.</p>
						</div>
						
						<!-- Practice 02: NHR 2.0 -->
						<div class="wla-portugal-pc">
							<div class="wla-portugal-pc-number">SPECIALIST</div>
							<div class="wla-portugal-pc-icon">💰</div>
							<div class="wla-portugal-pc-title">NHR 2.0 — NON-HABITUAL RESIDENT</div>
							<p class="wla-portugal-pc-desc">Portugal's new NHR 2.0 tax regime — 20% flat rate for qualifying income categories. Significant for internationally mobile professionals and entrepreneurs relocating to Portugal. WLA Portugal coordinates NHR with the country-of-origin tax implications.</p>
						</div>
						
						<!-- Practice 03: Lusophone Bridge -->
						<div class="wla-portugal-pc">
							<div class="wla-portugal-pc-number">CORE ALLIANCE</div>
							<div class="wla-portugal-pc-icon">🌐</div>
							<div class="wla-portugal-pc-title">LUSOPHONE BRIDGE — BRAZIL · ANGOLA</div>
							<p class="wla-portugal-pc-desc">Portugal as the legal bridge between the EU and the Lusophone world. WLA Portugal co-practices transactions involving Portugal and Brazil, Angola, Mozambique, and Cape Verde simultaneously — common legal heritage, shared language, EU-Africa bridge.</p>
						</div>
						
						<!-- Practice 04: M&A Corporate Law -->
						<div class="wla-portugal-pc">
							<div class="wla-portugal-pc-number">CORE ALLIANCE</div>
							<div class="wla-portugal-pc-icon">🤝</div>
							<div class="wla-portugal-pc-title">M&A — PORTUGUESE CORPORATE LAW</div>
							<p class="wla-portugal-pc-desc">Portuguese M&A under the Código das Sociedades Comerciais, company formations (LDA and SA), and cross-border acquisitions into and out of Portugal. Portugal as EU entry point for Brazilian and Lusophone African capital.</p>
						</div>
						
						<!-- Practice 05: Arbitration -->
						<div class="wla-portugal-pc">
							<div class="wla-portugal-pc-number">SPECIALIST</div>
							<div class="wla-portugal-pc-icon">⚖️</div>
							<div class="wla-portugal-pc-title">ARBITRATION — TAL &amp; ICC PORTUGAL</div>
							<p class="wla-portugal-pc-desc">Portuguese arbitration under the LAV 2011 framework, Tribunal Arbitral de Lisboa (TAL) proceedings, and ICC arbitrations with Portuguese seat. Portugal as neutral seat for Lusophone international disputes.</p>
						</div>
						
						<!-- Practice 06: Tax -->
						<div class="wla-portugal-pc">
							<div class="wla-portugal-pc-number">SPECIALIST</div>
							<div class="wla-portugal-pc-icon">📊</div>
							<div class="wla-portugal-pc-title">TAX — PORTUGAL EU</div>
							<p class="wla-portugal-pc-desc">Portuguese corporate tax, transfer pricing, investment tax incentives (RFAI, CFEI), and the tax aspects of Golden Visa fund investments. Portugal's tax treaty network bridges EU and Lusophone markets.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE TABLE                                  -->
			<!-- ============================================================ -->
			<div class="wla-portugal-intel-bg">
				<section class="wla-portugal-section wla-portugal-animate">
					<div class="wla-portugal-container">
						<div class="wla-portugal-eyebrow">WLA INTELLIGENCE — PORTUGAL SIGNALS</div>
						<h2 class="wla-portugal-heading">WHAT IS MOVING IN<br>PORTUGAL'S LEGAL LANDSCAPE.</h2>
						
						<table class="wla-portugal-intel-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-portugal-it-area">ARI</div>
										<div class="wla-portugal-it-sub">GOLDEN VISA</div>
									</td>
									<td class="wla-portugal-it-text">ARI Fund Route Active 2026 — Property route closed. EUR 500K fund investment route remains fully operational. Processing times improving. EU residence and Schengen access within 12-18 months.</td>
									<td class="wla-portugal-it-growth">+18%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-portugal-it-area">NHR 2.0</div>
										<div class="wla-portugal-it-sub">TAX</div>
									</td>
									<td class="wla-portugal-it-text">NHR 2.0 Now Operational — New Non-Habitual Resident regime with 20% flat rate for qualifying income. Significant for HNWI relocating from UK, US, and Middle East.</td>
									<td class="wla-portugal-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-portugal-it-area">M&amp;A</div>
										<div class="wla-portugal-it-sub">BRAZIL</div>
									</td>
									<td class="wla-portugal-it-text">Portugal-Brazil Legal Traffic Increasing — Record Portuguese-Brazilian M&A and investment flows. Portugal increasingly used as EU structuring hub for Brazilian capital entering EU markets.</td>
									<td class="wla-portugal-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-portugal-it-area">ANGOLA</div>
										<div class="wla-portugal-it-sub">INVESTMENT</div>
									</td>
									<td class="wla-portugal-it-text">Angola Investment Law Reform — New framework improving legal certainty for Portuguese investors in Angola. WLA Portugal-Angola co-practice corridor seeing significant growth.</td>
									<td class="wla-portugal-it-growth">Active</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-portugal-intel-footer">
							<a href="wla-intelligence.html" class="wla-portugal-btn-bdr">FULL PORTUGAL INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-portugal-corridor-bg">
				<section class="wla-portugal-section wla-portugal-section--dark wla-portugal-animate">
					<div class="wla-portugal-container">
						<div class="wla-portugal-eyebrow-dark">CORRIDORS ACTIVE — PORTUGAL</div>
						<h2 class="wla-portugal-heading-dark">PORTUGAL ON THE WORLD'S<br>MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-portugal-corridor-grid">
							<a href="wla-corridor-eu-india.html" class="wla-portugal-cg">
								<div class="wla-portugal-cg-route">EU → INDIA</div>
								<div class="wla-portugal-cg-growth">+34%</div>
								<p class="wla-portugal-cg-desc">Portugal as EU origination base for India-bound investment via Lusophone business networks.</p>
							</a>
							<a href="wla-corridor-uk-africa.html" class="wla-portugal-cg">
								<div class="wla-portugal-cg-route">UK → AFRICA</div>
								<div class="wla-portugal-cg-growth">+22%</div>
								<p class="wla-portugal-cg-desc">Portugal as bridge between UK African investments and Portuguese-speaking African markets.</p>
							</a>
							<a href="wla-corridor-us-europe.html" class="wla-portugal-cg">
								<div class="wla-portugal-cg-route">US ↔ EUROPE</div>
								<div class="wla-portugal-cg-growth">+18%</div>
								<p class="wla-portugal-cg-desc">Portugal attracting US technology company European headquarters via NHR and ARI programmes.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-portugal-cta-band">
				<div class="wla-portugal-cta-title">BRIEF WLA ON YOUR PORTUGAL MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-portugal-cta-buttons">
					<a href="wla-specialist.html" class="wla-portugal-btn-white">FIND A PORTUGAL SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-portugal-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA PORTUGAL PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Singapore Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Singapore jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Hub section with canvas visualization
	 * - Practice coverage grid (6 areas)
	 * - Intelligence signals section
	 * - CTA band
	 *
	 * Shortcode: [wla_singapore_page]
	 *
	 * @return string
	 */
	public function wla_singapore_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA SINGAPORE PAGE WRAPPER -->
		<div class="wla-singapore-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-singapore-hero">
				<img class="wla-singapore-hero-img" src="https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=1920&q=85" alt="Singapore">
				<div class="wla-singapore-hero-grad"></div>
				<div class="wla-singapore-hero-content">
					<div class="wla-singapore-flag">🇸🇬</div>
					<div class="wla-singapore-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · APAC HUB · SIAC · IRDA · GIP</div>
					<h1 class="wla-singapore-hero-title">SINGAPORE</h1>
					<div class="wla-singapore-hero-subtitle">ASIA PACIFIC'S PREMIER LEGAL AND FINANCIAL HUB</div>
					<div class="wla-singapore-hero-buttons">
						<a href="wla-specialist.html" class="wla-singapore-btn-white">FIND A SINGAPORE SPECIALIST — 48H</a>
						<a href="#hub" class="wla-singapore-btn-ghost-white">SINGAPORE AS APAC HUB</a>
						<a href="wla-intelligence.html" class="wla-singapore-btn-ghost-white">SINGAPORE INTELLIGENCE</a>
					</div>
					<div class="wla-singapore-hero-stats">
						<div class="wla-singapore-hs">
							<div class="wla-singapore-hs-number">AAA+</div>
							<div class="wla-singapore-hs-label">Global Competitiveness</div>
						</div>
						<div class="wla-singapore-hs">
							<div class="wla-singapore-hs-number">SIAC</div>
							<div class="wla-singapore-hs-label">Premier APAC Arbitration</div>
						</div>
						<div class="wla-singapore-hs">
							<div class="wla-singapore-hs-number">GIP</div>
							<div class="wla-singapore-hs-label">Global Investor Programme</div>
						</div>
						<div class="wla-singapore-hs">
							<div class="wla-singapore-hs-number">IRDA</div>
							<div class="wla-singapore-hs-label">Restructuring Framework</div>
						</div>
						<div class="wla-singapore-hs">
							<div class="wla-singapore-hs-number">ASEAN</div>
							<div class="wla-singapore-hs-label">Gateway to SE Asia</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: HUB VISUALIZATION                                   -->
			<!-- ============================================================ -->
			<div class="wla-singapore-hub-bg">
				<section class="wla-singapore-section wla-singapore-animate" id="hub">
					<div class="wla-singapore-container">
						<div class="wla-singapore-eyebrow">SINGAPORE AS APAC LEGAL HUB</div>
						<h2 class="wla-singapore-heading">THE GATEWAY TO<br>EVERY ASEAN MARKET.</h2>
						
						<div class="wla-singapore-hub-layout">
							<div class="wla-singapore-hub-canvas-wrap">
								<canvas id="wlaHubCanvas" width="360" height="360"></canvas>
							</div>
							<div class="wla-singapore-hub-content">
								<div class="wla-singapore-hub-title">SINGAPORE IS WHERE INTERNATIONAL CAPITAL ENTERS ASIA.</div>
								<p class="wla-singapore-hub-body">
									Singapore is Asia Pacific's most sophisticated legal and financial hub — a common law jurisdiction with world-class courts, the region's premier arbitration centre, and an unparalleled network of bilateral investment treaties and tax agreements that make it the natural gateway for international investment into ASEAN and beyond.
								</p>
								<p class="wla-singapore-hub-body">
									WLA Singapore's co-practice capability covers the full Singapore legal landscape — from SIAC arbitration and IRDA restructuring through to GIP investor visas and PDPA data protection compliance — all co-practiced within WLA's Institutional framework with partner firms in every connected jurisdiction.
								</p>
								<ul class="wla-singapore-hub-points">
									<li>SIAC — Asia's leading arbitration centre, 1-day emergency appointment</li>
									<li>IRDA 2018 — Singapore's world-class restructuring framework</li>
									<li>GIP — Global Investor Programme, the premier APAC investor residence route</li>
									<li>ASEAN gateway — Singapore holding structures for ASEAN market entry</li>
									<li>GCC → Singapore corridor — Gulf sovereign capital into ASEAN</li>
									<li>Singapore Convention — enforcement of mediated settlements internationally</li>
								</ul>
								<a href="wla-specialist.html" class="wla-singapore-btn-ink">FIND A SINGAPORE SPECIALIST →</a>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-singapore-section wla-singapore-animate">
				<div class="wla-singapore-container">
					<div class="wla-singapore-eyebrow">WLA SINGAPORE — PRACTICE COVERAGE</div>
					<h2 class="wla-singapore-heading">EVERY MAJOR PRACTICE.<br>SINGAPORE AND ASEAN DEPTH.</h2>
					
					<div class="wla-singapore-practice-grid">
						
						<!-- Practice 01: M&A -->
						<div class="wla-singapore-pc">
							<div class="wla-singapore-pc-number">CORE ALLIANCE</div>
							<div class="wla-singapore-pc-title">M&amp;A &amp; SINGAPORE CORPORATE</div>
							<p class="wla-singapore-pc-desc">Singapore company law, cross-border M&A, holding structure design, ASEAN market entry, and SIC/MAS regulated entity transactions. Singapore as acquirer hub for ASEAN investments.</p>
						</div>
						
						<!-- Practice 02: Arbitration -->
						<div class="wla-singapore-pc">
							<div class="wla-singapore-pc-number">CORE ALLIANCE</div>
							<div class="wla-singapore-pc-title">ARBITRATION — SIAC &amp; SICC</div>
							<p class="wla-singapore-pc-desc">SIAC arbitration — Asia's most trusted seat. Singapore International Commercial Court (SICC) for international commercial litigation. Singapore Convention enforcement of mediated settlements.</p>
						</div>
						
						<!-- Practice 03: Restructuring -->
						<div class="wla-singapore-pc">
							<div class="wla-singapore-pc-number">SPECIALIST</div>
							<div class="wla-singapore-pc-title">RESTRUCTURING — IRDA</div>
							<p class="wla-singapore-pc-desc">Judicial management, schemes of arrangement, and IRDA 2018 cross-border recognition. Singapore as APAC's premier restructuring seat for regional corporate groups.</p>
						</div>
						
						<!-- Practice 04: Data Protection -->
						<div class="wla-singapore-pc">
							<div class="wla-singapore-pc-number">SPECIALIST</div>
							<div class="wla-singapore-pc-title">DATA PROTECTION — PDPA</div>
							<p class="wla-singapore-pc-desc">PDPA compliance and the 2026 amendments — enhanced data portability and cross-border transfer framework. Singapore as data hub for ASEAN operations of international companies.</p>
						</div>
						
						<!-- Practice 05: Funds -->
						<div class="wla-singapore-pc">
							<div class="wla-singapore-pc-number">SPECIALIST</div>
							<div class="wla-singapore-pc-title">FUNDS &amp; FINANCIAL SERVICES</div>
							<p class="wla-singapore-pc-desc">MAS fund licensing, family office structures, Variable Capital Company (VCC) framework, and digital asset regulation. Singapore as APAC's leading fund domicile jurisdiction.</p>
						</div>
						
						<!-- Practice 06: GIP -->
						<div class="wla-singapore-pc">
							<div class="wla-singapore-pc-number">SPECIALIST</div>
							<div class="wla-singapore-pc-title">GIP — GLOBAL INVESTOR PROGRAMME</div>
							<p class="wla-singapore-pc-desc">Singapore Global Investor Programme — the premier APAC investor residence route. Three investment options. Permanent residence pathway. WIA specialist support.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                -->
			<!-- ============================================================ -->
			<div class="wla-singapore-intel-bg">
				<section class="wla-singapore-section wla-singapore-section--dark wla-singapore-animate">
					<div class="wla-singapore-container">
						<div class="wla-singapore-eyebrow-dark">WLA INTELLIGENCE — SINGAPORE</div>
						<h2 class="wla-singapore-heading-dark">WHAT'S MOVING IN<br>SINGAPORE'S LEGAL MARKET.</h2>
						
						<div class="wla-singapore-signal-rows">
							<div class="wla-singapore-sr wla-singapore-sr--header">
								<div class="wla-singapore-sr-th">AREA</div>
								<div class="wla-singapore-sr-th">SIGNAL</div>
								<div class="wla-singapore-sr-th" style="text-align:right">INDEX</div>
							</div>
							<div class="wla-singapore-sr">
								<div class="wla-singapore-sr-area">DATA / PDPA</div>
								<div class="wla-singapore-sr-text"><strong>PDPA Amendment 2026</strong> — Enhanced data portability obligations and cross-border transfer framework. Significant for ASEAN regional data structures using Singapore as hub.</div>
								<div class="wla-singapore-sr-badge">+15%</div>
							</div>
							<div class="wla-singapore-sr">
								<div class="wla-singapore-sr-area">ARBITRATION / SIAC</div>
								<div class="wla-singapore-sr-text"><strong>SIAC 2025 Rules — Full Implementation</strong> — Enhanced emergency arbitrator provisions. 1-day appointment now standard. Singapore's position as APAC's premier seat strengthened.</div>
								<div class="wla-singapore-sr-badge wla-singapore-sr-badge--active">Active</div>
							</div>
							<div class="wla-singapore-sr">
								<div class="wla-singapore-sr-area">FUNDS / MAS</div>
								<div class="wla-singapore-sr-text"><strong>MAS Digital Asset Framework</strong> — Digital payment token service licensing expanded. Significant for crypto-native funds and digital asset managers seeking APAC regulatory cover.</div>
								<div class="wla-singapore-sr-badge">+22%</div>
							</div>
							<div class="wla-singapore-sr">
								<div class="wla-singapore-sr-area">GIP / INVESTMENT</div>
								<div class="wla-singapore-sr-text"><strong>GIP Enhanced Category</strong> — Global Investor Programme new category for family offices with SGD 200M+ AUM. Significant for ultra-HNW families relocating from Hong Kong and China.</div>
								<div class="wla-singapore-sr-badge">+18%</div>
							</div>
						</div>
						
						<div class="wla-singapore-intel-footer">
							<a href="wla-intelligence.html" class="wla-singapore-btn-white-intel">FULL SINGAPORE INTELLIGENCE →</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-singapore-cta-band">
				<div class="wla-singapore-cta-title">BRIEF WLA ON YOUR SINGAPORE MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-singapore-cta-buttons">
					<a href="wla-specialist.html" class="wla-singapore-btn-white">FIND A SINGAPORE SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-singapore-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA SINGAPORE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * UAE Jurisdiction Page Shortcode
	 *
	 * Displays the WLA UAE jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Three zones (DIFC, ADGM, Mainland) with tab switching
	 * - Practice coverage grid (6 areas)
	 * - Intelligence signals with indicators
	 * - Vision 2031 section
	 * - CTA band
	 *
	 * Shortcode: [wla_uae_page]
	 *
	 * @return string
	 */
	public function wla_uae_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA UAE PAGE WRAPPER -->
		<div class="wla-uae-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-uae-hero">
				<img class="wla-uae-hero-img" src="https://images.unsplash.com/photo-1518684079-3c830dcef090?w=1920&q=85" alt="Dubai UAE">
				<div class="wla-uae-hero-grad"></div>
				<div class="wla-uae-hero-content">
					<div class="wla-uae-flag">🇦🇪</div>
					<div class="wla-uae-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · DUBAI · ABU DHABI · DIFC · ADGM</div>
					<h1 class="wla-uae-hero-title">UNITED ARAB EMIRATES</h1>
					<div class="wla-uae-hero-subtitle">THE GULF'S INSTITUTIONAL LEGAL HUB · VISION 2031</div>
					<div class="wla-uae-hero-buttons">
						<a href="wla-specialist.html" class="wla-uae-btn-white">FIND A UAE SPECIALIST — 48H</a>
						<a href="#zones" class="wla-uae-btn-ghost-white">DIFC · ADGM · MAINLAND</a>
						<a href="wla-intelligence.html" class="wla-uae-btn-ghost-white">UAE INTELLIGENCE</a>
					</div>
					<div class="wla-uae-hero-stats">
						<div class="wla-uae-hs">
							<div class="wla-uae-hs-number">$500B+</div>
							<div class="wla-uae-hs-label">GDP 2025</div>
						</div>
						<div class="wla-uae-hs">
							<div class="wla-uae-hs-number">9%</div>
							<div class="wla-uae-hs-label">UAE CIT Rate</div>
						</div>
						<div class="wla-uae-hs">
							<div class="wla-uae-hs-number">10yr</div>
							<div class="wla-uae-hs-label">Golden Visa</div>
						</div>
						<div class="wla-uae-hs">
							<div class="wla-uae-hs-number">+38%</div>
							<div class="wla-uae-hs-label">Gulf→CEE Corridor</div>
						</div>
						<div class="wla-uae-hs">
							<div class="wla-uae-hs-number">DIFC+ADGM</div>
							<div class="wla-uae-hs-label">Common Law Courts</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ZONES (DIFC / ADGM / MAINLAND)                      -->
			<!-- ============================================================ -->
			<div class="wla-uae-zones-bg">
				<section class="wla-uae-section wla-uae-animate" id="zones">
					<div class="wla-uae-container">
						<div class="wla-uae-eyebrow">UAE LEGAL FRAMEWORK — THREE ZONES</div>
						<h2 class="wla-uae-heading">DIFC · ADGM · MAINLAND.<br>THREE FRAMEWORKS. ONE WLA TEAM.</h2>
						<p class="wla-uae-subtext">The UAE's legal landscape is uniquely structured around three distinct frameworks — each with different applicable law, court systems, and regulatory regimes. WLA UAE practitioners navigate all three simultaneously.</p>
						
						<!-- Tabs -->
						<div class="wla-uae-zone-tabs" id="wlaUaeZoneTabs">
							<div class="wla-uae-ztab wla-uae-ztab-active" data-zone="difc">DIFC</div>
							<div class="wla-uae-ztab" data-zone="adgm">ADGM</div>
							<div class="wla-uae-ztab" data-zone="mainland">MAINLAND UAE</div>
						</div>
						
						<!-- Panels -->
						<div class="wla-uae-zone-panels" id="wlaUaeZonePanels">
							
							<!-- DIFC Panel -->
							<div class="wla-uae-zone-panel wla-uae-zone-panel-active" id="wlaUaeZpDifc">
								<div class="wla-uae-zp-content">
									<div class="wla-uae-zp-title">DUBAI INTERNATIONAL FINANCIAL CENTRE (DIFC)</div>
									<p class="wla-uae-zp-body">The DIFC is an independent common law jurisdiction within Dubai — with its own courts, laws, and regulatory framework based on English common law. The DIFC Courts are widely recognised as one of the world's leading commercial courts and are a preferred choice for international dispute resolution in the Middle East.</p>
									<div class="wla-uae-zp-facts">
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">English</div>
											<div class="wla-uae-zpf-label">Common Law Framework</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">DIFC Courts</div>
											<div class="wla-uae-zpf-label">Internationally Recognised</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">HKIAC</div>
											<div class="wla-uae-zpf-label">DIFC-LCIA Arbitration</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">DFSA</div>
											<div class="wla-uae-zpf-label">Financial Regulator</div>
										</div>
									</div>
									<ul class="wla-uae-zp-list">
										<li>DIFC company formation — founding, licensing, and regulation under DFSA</li>
										<li>DIFC employment law — significant amendments effective Q3 2026 (secondments, mobility)</li>
										<li>DIFC Courts litigation — common law proceedings in English</li>
										<li>DIFC-LCIA and DIAC arbitration proceedings</li>
										<li>DIFC financial services regulation — fund management, banking, insurance</li>
									</ul>
									<a href="wla-specialist.html" class="wla-uae-btn-ink">FIND A DIFC SPECIALIST →</a>
								</div>
								<div class="wla-uae-zp-image">
									<img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=900&q=85" alt="DIFC Dubai">
								</div>
							</div>
							
							<!-- ADGM Panel -->
							<div class="wla-uae-zone-panel" id="wlaUaeZpAdgm">
								<div class="wla-uae-zp-content">
									<div class="wla-uae-zp-title">ABU DHABI GLOBAL MARKET (ADGM)</div>
									<p class="wla-uae-zp-body">ADGM is Abu Dhabi's international financial centre — also an independent common law jurisdiction with its own courts and regulatory framework. ADGM has grown rapidly to become a competitor to DIFC, particularly for asset management, family office structures, and sustainable finance.</p>
									<div class="wla-uae-zp-facts">
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">English</div>
											<div class="wla-uae-zpf-label">Common Law Framework</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">ADGM Courts</div>
											<div class="wla-uae-zpf-label">Independent Judiciary</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">FSRA</div>
											<div class="wla-uae-zpf-label">Financial Regulator</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">ICDR</div>
											<div class="wla-uae-zpf-label">AAA-ICDR Arbitration</div>
										</div>
									</div>
									<ul class="wla-uae-zp-list">
										<li>ADGM company formation — SPVs, holding companies, fund structures</li>
										<li>Family office establishment — ADGM's family office framework is among the most sophisticated globally</li>
										<li>Asset management licensing under FSRA</li>
										<li>Sustainable finance — ADGM is the GCC's leading sustainable finance hub</li>
										<li>ADGM Courts litigation and arbitration</li>
									</ul>
									<a href="wla-specialist.html" class="wla-uae-btn-ink">FIND AN ADGM SPECIALIST →</a>
								</div>
								<div class="wla-uae-zp-image">
									<img src="https://images.unsplash.com/photo-1494522855154-9297ac14b55f?w=900&q=85" alt="Abu Dhabi">
								</div>
							</div>
							
							<!-- Mainland Panel -->
							<div class="wla-uae-zone-panel" id="wlaUaeZpMainland">
								<div class="wla-uae-zp-content">
									<div class="wla-uae-zp-title">UAE MAINLAND — FEDERAL &amp; EMIRATE LAW</div>
									<p class="wla-uae-zp-body">UAE mainland operates under federal civil law (based on Egyptian civil law, itself derived from French civil law) with emirate-level variations. The UAE Corporate Tax, FATA foreign ownership reforms, and Golden Visa programme all operate at the mainland level — creating significant legal activity across M&A, employment, and immigration.</p>
									<div class="wla-uae-zp-facts">
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">9%</div>
											<div class="wla-uae-zpf-label">Corporate Tax Rate</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">100%</div>
											<div class="wla-uae-zpf-label">Foreign Ownership Now Permitted</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">10yr</div>
											<div class="wla-uae-zpf-label">Golden Visa</div>
										</div>
										<div class="wla-uae-zpf">
											<div class="wla-uae-zpf-number">MOCA</div>
											<div class="wla-uae-zpf-label">Ministry of Commerce Filings</div>
										</div>
									</div>
									<ul class="wla-uae-zp-list">
										<li>UAE company formation and commercial licensing — mainland and free zones</li>
										<li>UAE Corporate Tax — 9% CIT since June 2023, QFZP rules, free zone compliance</li>
										<li>Foreign ownership — 100% FDI now permitted in most sectors under FATA</li>
										<li>UAE Golden Visa — 10-year renewable for investors and qualified professionals</li>
										<li>UAE employment law — new Labour Law 2023 and DIFC Employment Amendment 2025</li>
									</ul>
									<a href="wla-specialist.html" class="wla-uae-btn-ink">FIND A UAE MAINLAND SPECIALIST →</a>
								</div>
								<div class="wla-uae-zp-image">
									<img src="https://images.unsplash.com/photo-1508804185872-d7badad00f7d?w=900&q=85" alt="UAE Mainland">
								</div>
							</div>
							
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-uae-section wla-uae-section--alt wla-uae-animate">
				<div class="wla-uae-container">
					<div class="wla-uae-eyebrow">WLA UAE — PRACTICE COVERAGE</div>
					<h2 class="wla-uae-heading">EVERY MAJOR PRACTICE.<br>ALL THREE UAE FRAMEWORKS.</h2>
					
					<div class="wla-uae-practice-grid">
						
						<!-- Practice 01: M&A Corporate -->
						<div class="wla-uae-pc">
							<div class="wla-uae-pc-icon">⚖️</div>
							<div class="wla-uae-pc-number">CORE ALLIANCE</div>
							<div class="wla-uae-pc-title">M&amp;A &amp; CORPORATE</div>
							<p class="wla-uae-pc-desc">Cross-border M&A, UAE company formation, DIFC/ADGM structures, and foreign ownership under FATA. UAE as acquisition target and as outbound investor into CEE, India, and Africa.</p>
						</div>
						
						<!-- Practice 02: Financial Services -->
						<div class="wla-uae-pc">
							<div class="wla-uae-pc-icon">🏦</div>
							<div class="wla-uae-pc-number">SPECIALIST</div>
							<div class="wla-uae-pc-title">FINANCIAL SERVICES &amp; FUNDS</div>
							<p class="wla-uae-pc-desc">DFSA and FSRA fund licensing, asset management, banking regulation, and financial services M&A. DIFC and ADGM as the GCC's premier fund domicile jurisdictions.</p>
						</div>
						
						<!-- Practice 03: Real Estate -->
						<div class="wla-uae-pc">
							<div class="wla-uae-pc-icon">🏗️</div>
							<div class="wla-uae-pc-number">SPECIALIST</div>
							<div class="wla-uae-pc-title">REAL ESTATE &amp; INFRASTRUCTURE</div>
							<p class="wla-uae-pc-desc">UAE real estate — freehold areas, strata law, developer agreements, and real estate investment trusts. Infrastructure project finance under UAE federal and emirate law.</p>
						</div>
						
						<!-- Practice 04: Tax -->
						<div class="wla-uae-pc">
							<div class="wla-uae-pc-icon">⚗️</div>
							<div class="wla-uae-pc-number">SPECIALIST</div>
							<div class="wla-uae-pc-title">TAX — UAE CIT &amp; VAT</div>
							<p class="wla-uae-pc-desc">UAE Corporate Tax compliance — 9% CIT, Qualifying Free Zone Person analysis, transfer pricing under UAE regulations. VAT compliance and cross-border VAT structuring.</p>
						</div>
						
						<!-- Practice 05: Employment -->
						<div class="wla-uae-pc">
							<div class="wla-uae-pc-icon">💼</div>
							<div class="wla-uae-pc-number">SPECIALIST</div>
							<div class="wla-uae-pc-title">EMPLOYMENT &amp; MOBILITY</div>
							<p class="wla-uae-pc-desc">UAE Labour Law 2023, DIFC Employment Amendment 2025, secondment structures, executive arrangements, and end-of-service gratuity. Golden Visa and residence planning.</p>
						</div>
						
						<!-- Practice 06: Arbitration -->
						<div class="wla-uae-pc">
							<div class="wla-uae-pc-icon">⚖️</div>
							<div class="wla-uae-pc-number">CORE ALLIANCE</div>
							<div class="wla-uae-pc-title">ARBITRATION — DIFC &amp; DIAC</div>
							<p class="wla-uae-pc-desc">DIFC-LCIA and DIAC arbitration, DIFC Courts litigation, and enforcement of foreign arbitral awards under the New York Convention in the UAE.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                 -->
			<!-- ============================================================ -->
			<div class="wla-uae-intel-bg">
				<section class="wla-uae-section wla-uae-section--dark wla-uae-animate">
					<div class="wla-uae-container">
						<div class="wla-uae-eyebrow-dark">WLA INTELLIGENCE — UAE SIGNALS</div>
						<h2 class="wla-uae-heading-dark">WHAT'S MOVING IN<br>THE UAE LEGAL MARKET.</h2>
						
						<div class="wla-uae-signal-rows">
							<!-- Header -->
							<div class="wla-uae-sr-header">
								<div class="wla-uae-sr-th">AREA</div>
								<div class="wla-uae-sr-th">SIGNAL</div>
								<div class="wla-uae-sr-th" style="text-align:right">INDEX</div>
							</div>
							
							<!-- Signal 1: DIFC Employment -->
							<div class="wla-uae-sr">
								<div class="wla-uae-sr-area">DIFC EMPLOYMENT</div>
								<div class="wla-uae-sr-text"><strong>DIFC Employment Act Amendment 2025</strong> — New secondment and mobility provisions effective Q3 2026. Significant impact on international executives seconded to DIFC entities. New end-of-service calculation framework.</div>
								<div class="wla-uae-sr-badge">+24%</div>
							</div>
							
							<!-- Signal 2: UAE Corporate Tax -->
							<div class="wla-uae-sr">
								<div class="wla-uae-sr-area">UAE CORPORATE TAX</div>
								<div class="wla-uae-sr-text"><strong>MoF QFZP Circular</strong> — Qualifying Free Zone Person rules clarified by Ministry of Finance circular. Passive income and related party transaction analysis updated. Significant for DIFC and mainland structures.</div>
								<div class="wla-uae-sr-badge">+18%</div>
							</div>
							
							<!-- Signal 3: M&A FDI -->
							<div class="wla-uae-sr">
								<div class="wla-uae-sr-area">M&amp;A / FDI</div>
								<div class="wla-uae-sr-text"><strong>FATA Positive List Update</strong> — Foreign ownership positive list updated. New sectors opened to 100% foreign ownership. Strategic sectors review ongoing. Impact on M&A structuring across manufacturing and logistics.</div>
								<div class="wla-uae-sr-badge wla-uae-sr-badge--active">Active</div>
							</div>
							
							<!-- Signal 4: Golden Visa -->
							<div class="wla-uae-sr">
								<div class="wla-uae-sr-area">GOLDEN VISA</div>
								<div class="wla-uae-sr-text"><strong>Golden Visa Expansion 2026</strong> — Qualifying categories expanded to include outstanding students and humanitarian contributors. 10-year renewable. No minimum stay. Family included.</div>
								<div class="wla-uae-sr-badge">+31%</div>
							</div>
							
							<!-- Signal 5: Arbitration -->
							<div class="wla-uae-sr">
								<div class="wla-uae-sr-area">ARBITRATION</div>
								<div class="wla-uae-sr-text"><strong>DIAC New Rules 2023 — Full Implementation</strong> — Dubai International Arbitration Centre new procedural rules now fully operational. Emergency arbitrator provisions significantly enhanced.</div>
								<div class="wla-uae-sr-badge wla-uae-sr-badge--active">Active</div>
							</div>
						</div>
						
						<div class="wla-uae-intel-footer">
							<a href="wla-intelligence.html" class="wla-uae-btn-white-dark">FULL UAE INTELLIGENCE →</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: VISION 2031                                          -->
			<!-- ============================================================ -->
			<section class="wla-uae-section wla-uae-section--vision wla-uae-animate">
				<div class="wla-uae-container">
					<div class="wla-uae-v2030-grid">
						<div class="wla-uae-v2030-vis">
							<div class="wla-uae-v2030-label">UAE VISION 2031 — LEGAL IMPLICATIONS</div>
							
							<div class="wla-uae-v2030-item">
								<div class="wla-uae-v2030-icon">🏭</div>
								<div>
									<div class="wla-uae-v2030-title">ADVANCED MANUFACTURING FDI</div>
									<div class="wla-uae-v2030-desc">UAE 2031 targets advanced manufacturing as a strategic pillar — creating significant M&A and JV structuring work for international investors entering UAE manufacturing.</div>
								</div>
							</div>
							
							<div class="wla-uae-v2030-item">
								<div class="wla-uae-v2030-icon">💡</div>
								<div>
									<div class="wla-uae-v2030-title">DIGITAL ECONOMY — AI &amp; FINTECH</div>
									<div class="wla-uae-v2030-desc">UAE National AI Strategy and Dubai FinTech Strategy creating new regulatory frameworks. Significant IP, data, and financial regulation work across DIFC and mainland.</div>
								</div>
							</div>
							
							<div class="wla-uae-v2030-item">
								<div class="wla-uae-v2030-icon">🌱</div>
								<div>
									<div class="wla-uae-v2030-title">SUSTAINABLE FINANCE</div>
									<div class="wla-uae-v2030-desc">UAE Net Zero 2050 and ADGM's sustainable finance framework creating new product structuring, green bond documentation, and ESG compliance work.</div>
								</div>
							</div>
							
							<div class="wla-uae-v2030-item">
								<div class="wla-uae-v2030-icon">🤝</div>
								<div>
									<div class="wla-uae-v2030-title">OUTBOUND INVESTMENT</div>
									<div class="wla-uae-v2030-desc">UAE sovereign and family capital continues to drive the Gulf→CEE (+38%), Gulf→India, and GCC→SE Asia corridors — all co-practiced by WLA.</div>
								</div>
							</div>
						</div>
						
						<div class="wla-uae-v2030-content">
							<div class="wla-uae-eyebrow">UAE VISION 2031</div>
							<div class="wla-uae-v2030-title">THE UAE'S TRANSFORMATION CREATES LEGAL WORK ACROSS EVERY PRACTICE.</div>
							<p class="wla-uae-v2030-body">UAE Vision 2031 is the most ambitious national transformation programme in the Gulf — targeting GDP doubling, advanced manufacturing expansion, digital economy leadership, and sustainable finance as strategic pillars. For international legal practitioners, every pillar of Vision 2031 creates cross-border legal work: M&A, regulatory, IP, employment, and tax.</p>
							<p class="wla-uae-v2030-body">WLA UAE partner firms are embedded in the Vision 2031 landscape — advising on incoming investment structuring, regulatory compliance for new frameworks, and the outbound Gulf capital flows that drive WLA's most active deal corridors.</p>
							<div class="wla-uae-v2030-buttons">
								<a href="wla-specialist.html" class="wla-uae-btn-ink">BRIEF WLA UAE — 48H →</a>
								<a href="wla-corridors.html" class="wla-uae-btn-bdr">GULF DEAL CORRIDORS</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-uae-cta-band">
				<div class="wla-uae-cta-title">BRIEF WLA ON YOUR UAE MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-uae-cta-buttons">
					<a href="wla-specialist.html" class="wla-uae-btn-white">FIND A UAE SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-uae-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA UAE PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * United Kingdom Jurisdiction Page Shortcode
	 *
	 * Displays the WLA United Kingdom jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why English Law section with image and points
	 * - Key UK Legal Developments 2025-26
	 * - Practice coverage grid (6 areas)
	 * - CTA band
	 *
	 * Shortcode: [wla_uk_page]
	 *
	 * @return string
	 */
	public function wla_uk_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA UK PAGE WRAPPER -->
		<div class="wla-uk-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-uk-hero">
				<img class="wla-uk-hero-img" src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=1920&q=85" alt="London UK">
				<div class="wla-uk-hero-grad"></div>
				<div class="wla-uk-hero-content">
					<div class="wla-uk-flag">🇬🇧</div>
					<div class="wla-uk-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · LONDON · ENGLISH LAW · COMMON LAW</div>
					<h1 class="wla-uk-hero-title">UNITED KINGDOM</h1>
					<div class="wla-uk-hero-subtitle">THE WORLD'S MOST TRUSTED LEGAL SYSTEM · LCIA · UPC · EMPLOYMENT</div>
					<div class="wla-uk-hero-buttons">
						<a href="wla-specialist.html" class="wla-uk-btn-white">FIND A UK SPECIALIST — 48H</a>
						<a href="#why" class="wla-uk-btn-ghost-white">WHY ENGLISH LAW</a>
						<a href="wla-corridors.html" class="wla-uk-btn-ghost-white">UK → AFRICA CORRIDOR</a>
					</div>
					<div class="wla-uk-hero-stats">
						<div class="wla-uk-hs">
							<div class="wla-uk-hs-number">#6</div>
							<div class="wla-uk-hs-label">Global GDP</div>
						</div>
						<div class="wla-uk-hs">
							<div class="wla-uk-hs-number">80%</div>
							<div class="wla-uk-hs-label">Global Trade Uses English Law</div>
						</div>
						<div class="wla-uk-hs">
							<div class="wla-uk-hs-number">+22%</div>
							<div class="wla-uk-hs-label">UK→Africa Corridor</div>
						</div>
						<div class="wla-uk-hs">
							<div class="wla-uk-hs-number">LCIA</div>
							<div class="wla-uk-hs-label">Premier Arbitration Seat</div>
						</div>
						<div class="wla-uk-hs">
							<div class="wla-uk-hs-number">April 2026</div>
							<div class="wla-uk-hs-label">Employment Rights Bill</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY ENGLISH LAW                                    -->
			<!-- ============================================================ -->
			<section class="wla-uk-section wla-uk-animate" id="why">
				<div class="wla-uk-container">
					<div class="wla-uk-law-grid">
						<div class="wla-uk-law-content">
							<div class="wla-uk-eyebrow">WHY ENGLISH LAW</div>
							<h2 class="wla-uk-law-title">THE WORLD CHOOSES ENGLISH LAW. WLA UK DELIVERS IT.</h2>
							<p class="wla-uk-law-body">
								English law governs an estimated 80% of global commercial contracts — not because of geography, but because of its qualities: commercial certainty, judicial independence, sophisticated precedent, and the confidence that courts will interpret contracts as written. WLA UK gives international clients access to the highest quality English law practitioners — independent specialists, not outposts of global firms.
							</p>
							<p class="wla-uk-law-body">
								Post-Brexit, the UK legal system has evolved significantly — new restructuring tools (Part 26A), new arbitration legislation, and the evolving Employment Rights Bill landscape are creating significant cross-border legal complexity that requires specialist knowledge, not generalist advice.
							</p>
							<ul class="wla-uk-law-points">
								<li>English law governs 80% of global commercial contracts — the most chosen legal system in the world</li>
								<li>LCIA remains the premier arbitration seat for cross-border commercial disputes involving English law</li>
								<li>Part 26A restructuring plans — world-class debt restructuring tool with cross-class cramdown</li>
								<li>UK-India FTA post-implementation — growing legal corridor in both directions</li>
								<li>UK → Africa corridor growing 22% — BII, critical minerals, infrastructure</li>
								<li>Employment Rights Bill 2025 — day-one rights, the biggest employment law change in a generation</li>
							</ul>
							<a href="wla-specialist.html" class="wla-uk-btn-ink">FIND A UK SPECIALIST — 48H →</a>
						</div>
						<div class="wla-uk-law-image">
							<img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=85" alt="London">
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY UK LEGAL DEVELOPMENTS                           -->
			<!-- ============================================================ -->
			<div class="wla-uk-dev-bg">
				<section class="wla-uk-section wla-uk-animate">
					<div class="wla-uk-container">
						<div class="wla-uk-eyebrow">KEY UK LEGAL DEVELOPMENTS 2025–26</div>
						<h2 class="wla-uk-heading">WHAT'S CHANGED IN<br>UK LAW THAT MATTERS TO YOU.</h2>
						
						<div class="wla-uk-dev-rows">
							
							<!-- Development 01: Employment Rights Bill -->
							<div class="wla-uk-dev-row">
								<div class="wla-uk-dr-left">
									<div class="wla-uk-dr-date">APRIL 2026</div>
									<div class="wla-uk-dr-status wla-uk-dr-status--live">LIVE</div>
								</div>
								<div class="wla-uk-dr-right">
									<div class="wla-uk-dr-title">EMPLOYMENT RIGHTS BILL — DAY-ONE RIGHTS</div>
									<p class="wla-uk-dr-desc">The most significant employment law change since the 1970s. Day-one unfair dismissal rights, fire-and-rehire restrictions, enhanced rights to flexible working, and worker status strengthening. International employers with UK workforces must review all employment contracts and HR policies.</p>
								</div>
							</div>
							
							<!-- Development 02: UPC -->
							<div class="wla-uk-dev-row">
								<div class="wla-uk-dr-left">
									<div class="wla-uk-dr-date">ONGOING 2026</div>
									<div class="wla-uk-dr-status wla-uk-dr-status--live">ACTIVE</div>
								</div>
								<div class="wla-uk-dr-right">
									<div class="wla-uk-dr-title">UPC — UNITARY PATENT COURT · UK NON-PARTICIPATION</div>
									<p class="wla-uk-dr-desc">The EU's Unified Patent Court is fully operational. UK non-participation means companies need parallel UK and European patent litigation strategies. WLA's co-practice model coordinates UK and EU proceedings simultaneously.</p>
								</div>
							</div>
							
							<!-- Development 03: Part 26A -->
							<div class="wla-uk-dev-row">
								<div class="wla-uk-dr-left">
									<div class="wla-uk-dr-date">IN FORCE</div>
									<div class="wla-uk-dr-status wla-uk-dr-status--live">LIVE</div>
								</div>
								<div class="wla-uk-dr-right">
									<div class="wla-uk-dr-title">PART 26A RESTRUCTURING PLANS — GLOBAL UPTAKE</div>
									<p class="wla-uk-dr-desc">UK Part 26A restructuring plans with cross-class cramdown are being used by international companies with no UK connection purely because of the quality of the tool. WLA UK restructuring specialists advise on eligibility, plan design, and international recognition.</p>
								</div>
							</div>
							
							<!-- Development 04: AI Copyright -->
							<div class="wla-uk-dev-row">
								<div class="wla-uk-dr-left">
									<div class="wla-uk-dr-date">2026</div>
									<div class="wla-uk-dr-status wla-uk-dr-status--watch">DEVELOPING</div>
								</div>
								<div class="wla-uk-dr-right">
									<div class="wla-uk-dr-title">AI COPYRIGHT CONSULTATION — MAJOR IP IMPLICATIONS</div>
									<p class="wla-uk-dr-desc">UK government proposing text and data mining exception for AI training. Major implications for content owners globally — music, publishing, visual art. WLA UK IP practice advises on UK AI copyright exposure and parallel EU AI Act IP obligations.</p>
								</div>
							</div>
							
							<!-- Development 05: UK Africa Corridor -->
							<div class="wla-uk-dev-row">
								<div class="wla-uk-dr-left">
									<div class="wla-uk-dr-date">ONGOING</div>
									<div class="wla-uk-dr-status wla-uk-dr-status--live">ACTIVE</div>
								</div>
								<div class="wla-uk-dr-right">
									<div class="wla-uk-dr-title">UK → AFRICA CORRIDOR — BII AND CRITICAL MINERALS</div>
									<p class="wla-uk-dr-desc">British International Investment (BII) funding and UK private capital driving record infrastructure and critical minerals investment across Sub-Saharan and East Africa. Common law alignment between UK and East African jurisdictions creates a structural legal advantage for this corridor.</p>
								</div>
							</div>
							
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-uk-section wla-uk-animate">
				<div class="wla-uk-container">
					<div class="wla-uk-eyebrow">WLA UK — PRACTICE COVERAGE</div>
					<h2 class="wla-uk-heading">EVERY MAJOR PRACTICE.<br>THE DEEPEST UK EXPERTISE.</h2>
					
					<div class="wla-uk-practice-grid">
						
						<!-- Practice 01: M&A -->
						<div class="wla-uk-pc">
							<div class="wla-uk-pc-number">CORE ALLIANCE</div>
							<div class="wla-uk-pc-title">M&amp;A &amp; CORPORATE</div>
							<p class="wla-uk-pc-desc">Cross-border M&A under English law, UK company law compliance, TUPE on acquisitions, and UK merger control filings. UK as both acquirer and target jurisdiction for international transactions.</p>
						</div>
						
						<!-- Practice 02: Restructuring -->
						<div class="wla-uk-pc">
							<div class="wla-uk-pc-number">SPECIALIST</div>
							<div class="wla-uk-pc-title">RESTRUCTURING — PART 26A</div>
							<p class="wla-uk-pc-desc">UK Part 26A restructuring plans, schemes of arrangement, administration, and CVA. WLA UK restructuring specialists advise both debtors and creditors on all available UK tools and their international recognition.</p>
						</div>
						
						<!-- Practice 03: Arbitration -->
						<div class="wla-uk-pc">
							<div class="wla-uk-pc-number">CORE ALLIANCE</div>
							<div class="wla-uk-pc-title">ARBITRATION — LCIA &amp; ENGLISH COURTS</div>
							<p class="wla-uk-pc-desc">LCIA arbitration, English Commercial Court and Technology and Construction Court litigation, and enforcement of English judgments and arbitral awards internationally.</p>
						</div>
						
						<!-- Practice 04: Employment -->
						<div class="wla-uk-pc">
							<div class="wla-uk-pc-number">SPECIALIST</div>
							<div class="wla-uk-pc-title">EMPLOYMENT — ERB 2025</div>
							<p class="wla-uk-pc-desc">UK Employment Rights Bill compliance, TUPE on M&A transactions, executive arrangements, and employment tribunal proceedings. Day-one rights strategy for international employers with UK workforces.</p>
						</div>
						
						<!-- Practice 05: IP -->
						<div class="wla-uk-pc">
							<div class="wla-uk-pc-number">CORE ALLIANCE</div>
							<div class="wla-uk-pc-title">INTELLECTUAL PROPERTY</div>
							<p class="wla-uk-pc-desc">UK patent prosecution (post-UPC), trademark registration, copyright, and brand protection. Post-Brexit IP transition — UK and EU IP now require separate strategies and separate filings.</p>
						</div>
						
						<!-- Practice 06: Tax -->
						<div class="wla-uk-pc">
							<div class="wla-uk-pc-number">SPECIALIST</div>
							<div class="wla-uk-pc-title">TAX — UK &amp; BEPS</div>
							<p class="wla-uk-pc-desc">UK corporate tax, transfer pricing under HMRC guidelines, BEPS Pillar Two compliance in the UK, and UK tax aspects of cross-border M&A. UK as holding jurisdiction for international groups.</p>
						</div>
						
					</div>
					
					<div class="wla-uk-practice-buttons">
						<a href="wla-specialist.html" class="wla-uk-btn-ink">FIND A UK SPECIALIST — 48H</a>
						<a href="wla-page-forgc.html" class="wla-uk-btn-bdr">BRIEF WLA UK</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-uk-cta-band">
				<div class="wla-uk-cta-title">BRIEF WLA ON YOUR UK MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-uk-cta-buttons">
					<a href="wla-specialist.html" class="wla-uk-btn-white">FIND A UK SPECIALIST</a>
					<a href="wla-corridors.html" class="wla-uk-btn-ghost-white">UK → AFRICA CORRIDOR</a>
				</div>
			</div>

		</div>
		<!-- END WLA UK PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Zambia Jurisdiction Page Shortcode
	 *
	 * Displays the WLA Zambia jurisdiction page including:
	 * - Hero section with flag and stats
	 * - Why Zambia section with image and stats
	 * - Practice coverage grid (6 areas)
	 * - Intelligence table with signals
	 * - Corridors active section
	 * - CTA band
	 *
	 * Shortcode: [wla_zambia_page]
	 *
	 * @return string
	 */
	public function wla_zambia_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA ZAMBIA PAGE WRAPPER -->
		<div class="wla-zambia-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-zambia-hero">
				<img class="wla-zambia-hero-img" src="https://images.unsplash.com/photo-1489493887464-892be6d1daae?w=1920&q=85" alt="Zambia">
				<div class="wla-zambia-hero-grad"></div>
				<div class="wla-zambia-hero-content">
					<div class="wla-zambia-flag">🇿🇲</div>
					<div class="wla-zambia-hero-eyebrow">WLA JURISDICTION SPOTLIGHT · ZAMBIA · MINING · CRITICAL MINERALS · BII</div>
					<h1 class="wla-zambia-hero-title">ZAMBIA</h1>
					<div class="wla-zambia-hero-subtitle">AFRICA'S COPPER CAPITAL · CRITICAL MINERALS · UK → AFRICA CORRIDOR</div>
					<div class="wla-zambia-hero-buttons">
						<a href="wla-specialist.html" class="wla-zambia-btn-white">FIND A ZAMBIA SPECIALIST — 48H</a>
						<a href="#why" class="wla-zambia-btn-ghost-white">WHY ZAMBIA</a>
						<a href="wla-intelligence.html" class="wla-zambia-btn-ghost-white">ZAMBIA INTELLIGENCE</a>
					</div>
					<div class="wla-zambia-hero-stats">
						<div class="wla-zambia-hs">
							<div class="wla-zambia-hs-number">#2</div>
							<div class="wla-zambia-hs-label">World's Copper Producer</div>
						</div>
						<div class="wla-zambia-hs">
							<div class="wla-zambia-hs-number">Critical</div>
							<div class="wla-zambia-hs-label">Cobalt &amp; Lithium</div>
						</div>
						<div class="wla-zambia-hs">
							<div class="wla-zambia-hs-number">Common Law</div>
							<div class="wla-zambia-hs-label">Zambian Common Law</div>
						</div>
						<div class="wla-zambia-hs">
							<div class="wla-zambia-hs-number">BII</div>
							<div class="wla-zambia-hs-label">UK Development Finance Active</div>
						</div>
						<div class="wla-zambia-hs">
							<div class="wla-zambia-hs-number">UK→Africa</div>
							<div class="wla-zambia-hs-label">+22% Corridor</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY ZAMBIA                                        -->
			<!-- ============================================================ -->
			<section class="wla-zambia-section wla-zambia-animate" id="why">
				<div class="wla-zambia-container">
					<div class="wla-zambia-why-grid">
						<div class="wla-zambia-why-image">
							<img src="https://images.unsplash.com/photo-1489493887464-892be6d1daae?w=1920&q=85" alt="Zambia">
						</div>
						<div class="wla-zambia-why-content">
							<div class="wla-zambia-eyebrow">WHY ZAMBIA. WHY NOW.</div>
							<h2 class="wla-zambia-why-title">AFRICA'S COPPER CAPITAL AND THE HEART OF THE GLOBAL CRITICAL MINERALS RACE.</h2>
							<p class="wla-zambia-why-body">
								Zambia is the second-largest copper producer in the world and sits at the heart of the global critical minerals race — copper, cobalt, and emerging lithium deposits make Zambia one of the most strategically important mining jurisdictions on the planet. The UK→Africa corridor at +22% growth is significantly driven by UK private capital and British International Investment (BII) deploying into Zambian mining, energy, and infrastructure.
							</p>
							<p class="wla-zambia-why-body">
								WLA Zambia co-practices the full Zambian legal landscape for international investors — from mining title acquisition and environmental permitting under the Mines and Minerals Development Act through to employment law under the Zambian Employment Code Act, FDI structures under the Zambia Development Agency Act, and investment arbitration under bilateral investment treaties. WLA Zambia coordinates with WLA UK for the UK origination side of UK→Africa transactions.
							</p>
							<div class="wla-zambia-why-stats">
								<div class="wla-zambia-ws">
									<div class="wla-zambia-ws-number">Copper</div>
									<div class="wla-zambia-ws-label">World's 2nd Largest Producer</div>
								</div>
								<div class="wla-zambia-ws">
									<div class="wla-zambia-ws-number">Mining Licence</div>
									<div class="wla-zambia-ws-label">MDA Framework</div>
								</div>
								<div class="wla-zambia-ws">
									<div class="wla-zambia-ws-number">BIT</div>
									<div class="wla-zambia-ws-label">Investment Treaty Network</div>
								</div>
								<div class="wla-zambia-ws">
									<div class="wla-zambia-ws-number">Common Law</div>
									<div class="wla-zambia-ws-label">English-Origin Legal System</div>
								</div>
							</div>
							<div class="wla-zambia-why-buttons">
								<a href="wla-specialist.html" class="wla-zambia-btn-ink">FIND A SPECIALIST</a>
								<a href="wla-page-forgc.html" class="wla-zambia-btn-bdr">BRIEF WLA ZAMBIA</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                   -->
			<!-- ============================================================ -->
			<section class="wla-zambia-section wla-zambia-section--alt wla-zambia-animate">
				<div class="wla-zambia-container">
					<div class="wla-zambia-eyebrow">WLA ZAMBIA — PRACTICE COVERAGE</div>
					<h2 class="wla-zambia-heading">EVERY MAJOR PRACTICE.<br>ZAMBIA-SPECIFIC EXPERTISE.</h2>
					
					<div class="wla-zambia-practice-grid">
						
						<!-- Practice 01: Mining Law -->
						<div class="wla-zambia-pc">
							<div class="wla-zambia-pc-number">CORE ALLIANCE</div>
							<div class="wla-zambia-pc-icon">⛏️</div>
							<div class="wla-zambia-pc-title">MINING LAW — LARGE SCALE &amp; ARTISANAL</div>
							<p class="wla-zambia-pc-desc">Mines and Minerals Development Act compliance, large-scale mining licence acquisition, environmental impact assessment, and mine development agreements. WLA Zambia advises international mining companies on the full Zambian regulatory framework from exploration to production.</p>
						</div>
						
						<!-- Practice 02: M&A Corporate -->
						<div class="wla-zambia-pc">
							<div class="wla-zambia-pc-number">CORE ALLIANCE</div>
							<div class="wla-zambia-pc-icon">🤝</div>
							<div class="wla-zambia-pc-title">M&amp;A — ZAMBIAN CORPORATE</div>
							<p class="wla-zambia-pc-desc">Zambian company law acquisitions, foreign investment registration (ZIDA), sector-specific approvals, and the legal infrastructure for international M&A involving Zambian operating companies in mining, energy, and agriculture.</p>
						</div>
						
						<!-- Practice 03: Energy -->
						<div class="wla-zambia-pc">
							<div class="wla-zambia-pc-number">SPECIALIST</div>
							<div class="wla-zambia-pc-icon">⚡</div>
							<div class="wla-zambia-pc-title">ENERGY — HYDRO AND RENEWABLES</div>
							<p class="wla-zambia-pc-desc">Zambia's hydroelectric power infrastructure and the growing renewable energy sector — independent power producer (IPP) frameworks, power purchase agreements with ZESCO, and the legal aspects of energy financing in Zambia.</p>
						</div>
						
						<!-- Practice 04: Employment -->
						<div class="wla-zambia-pc">
							<div class="wla-zambia-pc-number">SPECIALIST</div>
							<div class="wla-zambia-pc-icon">💼</div>
							<div class="wla-zambia-pc-title">EMPLOYMENT — ZAMBIAN CODE</div>
							<p class="wla-zambia-pc-desc">Employment Code Act compliance, collective bargaining under Zambian law, union relations in the mining sector, and executive arrangements for international staff in Zambia. WLA Zambia advises on the full employment legal framework for international employers.</p>
						</div>
						
						<!-- Practice 05: Investment Arbitration -->
						<div class="wla-zambia-pc">
							<div class="wla-zambia-pc-number">SPECIALIST</div>
							<div class="wla-zambia-pc-icon">⚖️</div>
							<div class="wla-zambia-pc-title">INVESTMENT ARBITRATION — BIT</div>
							<p class="wla-zambia-pc-desc">Zambia bilateral investment treaty claims, ICSID arbitration involving Zambian state entities, and investor-state dispute settlement. Zambia is party to a significant network of BITs providing international investment protection.</p>
						</div>
						
						<!-- Practice 06: Agriculture & Land -->
						<div class="wla-zambia-pc">
							<div class="wla-zambia-pc-number">SPECIALIST</div>
							<div class="wla-zambia-pc-icon">🏭</div>
							<div class="wla-zambia-pc-title">AGRICULTURE &amp; LAND</div>
							<p class="wla-zambia-pc-desc">Zambia's agricultural sector — one of Africa's most significant — is attracting growing international investment. Land tenure under Zambian customary and statutory title frameworks, agricultural concessions, and rural development legal infrastructure.</p>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE TABLE                                  -->
			<!-- ============================================================ -->
			<div class="wla-zambia-intel-bg">
				<section class="wla-zambia-section wla-zambia-animate">
					<div class="wla-zambia-container">
						<div class="wla-zambia-eyebrow">WLA INTELLIGENCE — ZAMBIA SIGNALS</div>
						<h2 class="wla-zambia-heading">WHAT IS MOVING IN<br>ZAMBIA'S LEGAL LANDSCAPE.</h2>
						
						<table class="wla-zambia-intel-table">
							<thead>
								<tr>
									<th>AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-zambia-it-area">MINING</div>
										<div class="wla-zambia-it-sub">CRITICAL MINERALS</div>
									</td>
									<td class="wla-zambia-it-text">Critical Minerals Framework — Zambia updating mining regulations for critical minerals export. New royalty structures for cobalt and lithium. Significant for UK and US investors in Zambian critical minerals extraction.</td>
									<td class="wla-zambia-it-growth">+28%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-zambia-it-area">BII</div>
										<div class="wla-zambia-it-sub">FDI</div>
									</td>
									<td class="wla-zambia-it-text">BII Zambia Portfolio Expanding — British International Investment accelerating Zambia commitments in mining services, renewable energy, and financial services. Common law advantage supporting UK-Zambia investment flows.</td>
									<td class="wla-zambia-it-growth">+22%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-zambia-it-area">ENERGY</div>
										<div class="wla-zambia-it-sub">HYDRO</div>
									</td>
									<td class="wla-zambia-it-text">Kariba Dam Rehabilitation — Major rehabilitation project creating significant legal work. International project finance, contractor agreements, and environmental compliance on Southern Africa's largest hydroelectric project.</td>
									<td class="wla-zambia-it-growth">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-zambia-it-area">AGRICULTURE</div>
										<div class="wla-zambia-it-sub">INVESTMENT</div>
									</td>
									<td class="wla-zambia-it-text">Zambia Agriculture FDI Rising — International agribusiness investment growing. New large-scale farm licence framework. WLA Zambia advising on land acquisition, agricultural concessions, and employment structures.</td>
									<td class="wla-zambia-it-growth">Emerging</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-zambia-intel-footer">
							<a href="wla-intelligence.html" class="wla-zambia-btn-bdr">FULL ZAMBIA INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CORRIDORS ACTIVE                                    -->
			<!-- ============================================================ -->
			<div class="wla-zambia-corridor-bg">
				<section class="wla-zambia-section wla-zambia-section--dark wla-zambia-animate">
					<div class="wla-zambia-container">
						<div class="wla-zambia-eyebrow-dark">CORRIDORS ACTIVE — ZAMBIA</div>
						<h2 class="wla-zambia-heading-dark">ZAMBIA ON THE WORLD'S<br>MOST ACTIVE CORRIDORS.</h2>
						
						<div class="wla-zambia-corridor-grid">
							<a href="wla-corridor-uk-africa.html" class="wla-zambia-cg">
								<div class="wla-zambia-cg-route">UK → AFRICA</div>
								<div class="wla-zambia-cg-growth">+22%</div>
								<p class="wla-zambia-cg-desc">Zambia is the primary mining destination on the UK→Africa corridor — copper, cobalt, and critical minerals.</p>
							</a>
							<a href="wla-corridor-gulf-cee.html" class="wla-zambia-cg">
								<div class="wla-zambia-cg-route">GULF → CEE</div>
								<div class="wla-zambia-cg-growth">+38%</div>
								<p class="wla-zambia-cg-desc">Gulf sovereign funds deploying into Zambian mining through CEE-structured investment vehicles.</p>
							</a>
							<a href="wla-corridor-apac-americas.html" class="wla-zambia-cg">
								<div class="wla-zambia-cg-route">APAC ↔ AMERICAS</div>
								<div class="wla-zambia-cg-growth">+19%</div>
								<p class="wla-zambia-cg-desc">Chinese and Japanese mining groups investing in Zambia as part of Pacific Rim critical minerals strategies.</p>
							</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-zambia-cta-band">
				<div class="wla-zambia-cta-title">BRIEF WLA ON YOUR ZAMBIA MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-zambia-cta-buttons">
					<a href="wla-specialist.html" class="wla-zambia-btn-white">FIND A ZAMBIA SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-zambia-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA ZAMBIA PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * About Page Shortcode
	 *
	 * Displays the WLA About page including:
	 * - Cinematic hero section
	 * - Stats strip with counters
	 * - Founding story (3-column editorial)
	 * - Three pillars section
	 * - Timeline with interactive years
	 * - Team grid
	 * - Vision section
	 * - Global reach with region cards
	 * - Connected organisations
	 *
	 * Shortcode: [wla_about_page]
	 *
	 * @return string
	 */
	public function wla_about_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA ABOUT PAGE WRAPPER -->
		<div class="wla-about-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: CINEMATIC HERO                                      -->
			<!-- ============================================================ -->
			<section class="wla-about-hero">
				<img class="wla-about-hero-img" src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=85" alt="Global skyline">
				<div class="wla-about-hero-grad"></div>
				<div class="wla-about-hero-content">
					<div class="wla-about-hero-eyebrow">ABOUT WORLD LAW ALLIANCE · EST. 2018 · NEW DELHI · VIENNA</div>
					<h1 class="wla-about-hero-title">AN INSTITUTION.<br>NOT A NETWORK.</h1>
					<p class="wla-about-hero-description">World Law Alliance is the only place where cross-border legal responsibility and execution are held together — by independently excellent firms, under one Institutional framework. We did not build a directory. We built an institution.</p>
					<div class="wla-about-hero-buttons">
						<a href="#story" class="wla-about-btn-white">OUR STORY</a>
						<a href="#team" class="wla-about-btn-ghost-white">MEET THE TEAM</a>
						<a href="wla-page-forfirms.html" class="wla-about-btn-ghost-white">JOIN WLA</a>
					</div>
				</div>
				<div class="wla-about-hero-scroll">
					<div class="wla-about-scroll-line"></div>
					SCROLL
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: STATS STRIP                                         -->
			<!-- ============================================================ -->
			<div class="wla-about-stats-strip">
				<div class="wla-about-stats-grid">
					<div class="wla-about-stat-c">
						<div class="wla-about-stat-n" data-t="2018">0</div>
						<div class="wla-about-stat-l">Year Founded</div>
					</div>
					<div class="wla-about-stat-c">
						<div class="wla-about-stat-n" data-t="151">0</div>
						<div class="wla-about-stat-l">Partner Firms</div>
					</div>
					<div class="wla-about-stat-c">
						<div class="wla-about-stat-n" data-t="90">0</div>
						<div class="wla-about-stat-l">Jurisdictions</div>
					</div>
					<div class="wla-about-stat-c">
						<div class="wla-about-stat-n" data-t="12">0</div>
						<div class="wla-about-stat-l">Practice Groups</div>
					</div>
					<div class="wla-about-stat-c">
						<div class="wla-about-stat-n">48H</div>
						<div class="wla-about-stat-l">Brief to Match</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: FOUNDING STORY                                      -->
			<!-- ============================================================ -->
			<section class="wla-about-section wla-about-animate" id="story">
				<div class="wla-about-container">
					<div class="wla-about-eyebrow">THE FOUNDING STORY</div>
					<h2 class="wla-about-heading">BUILT FROM A FRUSTRATION<br>WITH HOW GLOBAL LAW WORKED.</h2>
					
					<div class="wla-about-story-grid">
						<div class="wla-about-story-col">
							<p class="wla-about-story-body">
								<span class="wla-about-story-drop">W</span>orld Law Alliance was founded in 2018 in New Delhi and Vienna by legal practitioners who had spent years watching the same problem repeat itself: the world's finest independent law firms were systematically locked out of the most significant cross-border legal work — not because they lacked the expertise, but because they lacked the institutional framework to deliver it.
							</p>
							<p class="wla-about-story-body">
								The dominant model — global law firms with offices in every major city — offered scale but sacrificed depth. The local specialist, the practitioner who had spent twenty years building genuine expertise in their jurisdiction, was passed over in favour of the global firm's local outpost. The result was cross-border legal work delivered by generalists with a postbox in the right city, rather than true specialists with the deepest possible knowledge of that jurisdiction.
							</p>
						</div>
						<div class="wla-about-story-col-rule"></div>
						<div class="wla-about-story-col">
							<div class="wla-about-story-pull">
								"Independence is not a weakness. It is the source of the deepest legal expertise in the world. WLA was built to make that expertise available, at scale, across every border." — WLA Founding Statement, 2018
							</div>
							<p class="wla-about-story-body">
								The answer WLA's founders identified was not another referral network — the legal market was already full of those, and they hadn't solved the problem. Referral networks create databases of members, not joint accountability. They create introductions, not co-practice teams. They generate revenue from membership fees, not from institutional performance.
							</p>
							<p class="wla-about-story-body">
								The answer was an institution: a shared professional framework under which independent firms could genuinely co-practise, co-think, and co-build global legal capability — while remaining exactly who they were.
							</p>
						</div>
						<div class="wla-about-story-col-rule"></div>
						<div class="wla-about-story-col">
							<p class="wla-about-story-body">
								Since 2018, WLA has been building exactly that — one jurisdiction at a time, one WLA Qualified partner firm at a time. The Co-Practice Protocol was the first engine. WLA Intelligence — the world's first AI-powered cross-border legal intelligence layer — was the second. The WLA Accreditation framework was the third.
							</p>
							<p class="wla-about-story-body">
								Today, WLA spans 90+ jurisdictions across four global regions, with 151 partner firms co-practicing under one shared Institutional framework. The annual UNBOUNDED™ Global Forum brings managing partners, General Counsel, and institutional investors together in a single room once a year. The WLA designation is increasingly demanded by sophisticated clients in their outside counsel selection criteria. And the institution is still growing.
							</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: THREE PILLARS                                       -->
			<!-- ============================================================ -->
			<div class="wla-about-rule"></div>
			
			<section class="wla-about-section wla-about-animate">
				<div class="wla-about-container">
					<div class="wla-about-eyebrow">THREE PILLARS</div>
					<h2 class="wla-about-heading">THE INSTITUTION WLA<br>HAS BEEN BUILDING SINCE 2018.</h2>
					<p class="wla-about-subheading">
						Three integrated engines. Each one creating genuine, measurable value for partner firms and the clients they serve. Together, they constitute an institution that no referral network has ever built.
					</p>
					
					<div class="wla-about-pillars-grid">
						<div class="wla-about-pillar">
							<div class="wla-about-pillar-number">01</div>
							<div class="wla-about-pillar-title">CO-PRACTICE PROTOCOL</div>
							<p class="wla-about-pillar-desc">The WLA Co-Practice Protocol enables independent law firms to jointly hold client matters across borders — one engagement, shared accountability, a single seamless client experience. Not a referral. Not a sub-contract. A joint practice. Both firms hold the matter, both are accountable for the outcome, both operate under the same Institutional quality standard from brief to close.</p>
						</div>
						<div class="wla-about-pillar">
							<div class="wla-about-pillar-number">02</div>
							<div class="wla-about-pillar-title">WLA INTELLIGENCE</div>
							<p class="wla-about-pillar-desc">The world's first AI-powered cross-border legal intelligence layer. WLA Intelligence synthesizes real-time jurisdiction knowledge from 80+ partner firm practitioners on the ground — 1,240+ regulatory signals tracked across 80 jurisdictions, published daily, used by 8,400+ legal professionals every week. Not scraped from public sources. Practitioner-generated and AI-synthesised into actionable intelligence.</p>
						</div>
						<div class="wla-about-pillar">
							<div class="wla-about-pillar-number">03</div>
							<div class="wla-about-pillar-title">WLA ACCREDITATION</div>
							<p class="wla-about-pillar-desc">WLA Partner Firm status is a rigorous Institutional accreditation — reviewed annually against four published standards. The mark means something because it is hard to earn and possible to lose. It is not a membership certificate or a directory listing. It is the designation that sophisticated multinational clients and General Counsel increasingly require from their cross-border outside counsel — and are beginning to demand.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: TIMELINE                                            -->
			<!-- ============================================================ -->
			<div class="wla-about-timeline-bg">
				<section class="wla-about-section wla-about-section--dark">
					<div class="wla-about-container">
						<div class="wla-about-eyebrow-dark">WLA TIMELINE</div>
						<h2 class="wla-about-heading-dark">SEVEN YEARS.<br>ONE INSTITUTION.</h2>
						
						<div class="wla-about-tl-track" id="wlaTlTrack">
							<div class="wla-about-tl-year wla-about-tl-year--active" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2018</div>
								<div class="wla-about-tl-title">FOUNDED</div>
								<div class="wla-about-tl-metric">8 partner firms · New Delhi + Vienna · Co-Practice Protocol drafted</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2019</div>
								<div class="wla-about-tl-title">PROTOCOL LIVE</div>
								<div class="wla-about-tl-metric">First cross-border co-practice mandates closed · 22 partner firms · 18 jurisdictions</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2020</div>
								<div class="wla-about-tl-title">RESILIENCE</div>
								<div class="wla-about-tl-metric">Virtual co-practice infrastructure built · Remote mandate management protocols</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2021</div>
								<div class="wla-about-tl-title">GLOBAL EXPANSION</div>
								<div class="wla-about-tl-metric">APAC and Americas regions added · 55 firms · First 5-jurisdiction mandate</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2022</div>
								<div class="wla-about-tl-title">INTELLIGENCE LAUNCHED</div>
								<div class="wla-about-tl-metric">WLA Intelligence platform live · 420 signals year one · AI synthesis layer active</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2023</div>
								<div class="wla-about-tl-title">UNBOUNDED™ DUBAI</div>
								<div class="wla-about-tl-metric">First Annual Forum · 120 delegates · 40 jurisdictions · 98 partner firms</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2024</div>
								<div class="wla-about-tl-title">HONORS · LONDON</div>
								<div class="wla-about-tl-metric">Accreditation tiers published · HONORS Gala inaugural · 150 delegates · 127 firms</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2025</div>
								<div class="wla-about-tl-title">RECORD YEAR</div>
								<div class="wla-about-tl-metric">151 firms · 90+ jurisdictions · 1,240+ signals · Singapore Forum · 180 delegates</div>
							</div>
							<div class="wla-about-tl-year" onclick="wlaSetYear(this)">
								<div class="wla-about-tl-dot"></div>
								<div class="wla-about-tl-year-number">2026</div>
								<div class="wla-about-tl-title">BARCELONA</div>
								<div class="wla-about-tl-metric">UNBOUNDED™ Barcelona · 200 cap · API launch · 6 active corridors · 58 spots</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: TEAM                                                -->
			<!-- ============================================================ -->
			<section class="wla-about-section wla-about-section--team wla-about-animate" id="team">
				<div class="wla-about-container">
					<div class="wla-about-team-header">
						<div>
							<div class="wla-about-eyebrow">THE COMMUNITY</div>
							<h2 class="wla-about-heading">MEET THE PRACTITIONERS<br>WHO MAKE WLA WHAT IT IS.</h2>
						</div>
						<a href="https://worldlawalliance.com/our-professionals-list/" class="wla-about-btn-bdr">VIEW ALL PROFESSIONALS</a>
					</div>
					
					<div class="wla-about-team-grid">
						<a href="https://worldlawalliance.com/professional-profile/akshay-singhi/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Akshay-Singhi-WLA-Member-scaled.jpg" alt="Akshay Singhi" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">AKSHAY SINGHI</div>
								<div class="wla-about-tc-role">Senior Partner</div>
								<div class="wla-about-tc-jur">S.K. Singhi &amp; Partners · India</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/dawid-sokolowski/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Dawid-Sokolowski-WLA-Member-scaled.jpg" alt="Dawid Sokolowski" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">DAWID SOKOLOWSKI</div>
								<div class="wla-about-tc-role">Managing Partner</div>
								<div class="wla-about-tc-jur">Sokolowski &amp; Partners · Poland</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/melody-mwansa/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Melody-Mwansa-WLA-Member.jpg" alt="Melody Mwansa" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">MELODY MWANSA</div>
								<div class="wla-about-tc-role">Senior Associate</div>
								<div class="wla-about-tc-jur">WLA Zambia · Lusaka</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/natacha-auvertin/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/11/Natacha-Auvertin-WLA-Member.jpg" alt="Natacha Auvertin" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">NATACHA AUVERTIN</div>
								<div class="wla-about-tc-role">Partner</div>
								<div class="wla-about-tc-jur">WLA Switzerland · Geneva</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Abdulraheem-Tariq-Bubshait-scaled.jpg" alt="Abdulraheem Bubshait" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">ABDULRAHEEM BUBSHAIT</div>
								<div class="wla-about-tc-role">Partner</div>
								<div class="wla-about-tc-jur">WLA Saudi Arabia · Riyadh</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Evelyn-W.-Njiru-WLA-Member.jpg" alt="Evelyn Njiru" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">EVELYN W. NJIRU</div>
								<div class="wla-about-tc-role">Head of Corporate Law</div>
								<div class="wla-about-tc-jur">WLA Kenya · Nairobi</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Jean-Pascal-Ouendeno-WLA-Member.jpg" alt="Jean Pascal Ouendeno" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">JEAN PASCAL OUENDENO</div>
								<div class="wla-about-tc-role">Managing Partner</div>
								<div class="wla-about-tc-jur">WLA Guinea · Conakry</div>
							</div>
						</a>
						<a href="https://worldlawalliance.com/professional-profile/" class="wla-about-tc">
							<div class="wla-about-tc-image-wrap">
								<img class="wla-about-tc-img" src="https://worldlawalliance.com/wp-content/uploads/2025/10/Ahmed-Richard-Bhurtun-WLA-Member-scaled.jpg" alt="Ahmed Bhurtun" onerror="this.style.minHeight='200px'">
							</div>
							<div class="wla-about-tc-info">
								<div class="wla-about-tc-name">AHMED R. BHURTUN</div>
								<div class="wla-about-tc-role">Managing Partner</div>
								<div class="wla-about-tc-jur">WLA Mauritius · Moka</div>
							</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: VISION                                              -->
			<!-- ============================================================ -->
			<section class="wla-about-section wla-about-section--vision wla-about-animate">
				<div class="wla-about-container">
					<div class="wla-about-vision-layout">
						<div class="wla-about-vision-image">
							<img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=900&q=85" alt="WLA Vision">
						</div>
						<div class="wla-about-vision-content">
							<div class="wla-about-eyebrow">THE VISION</div>
							<div class="wla-about-vision-statement">A WORLD WHERE INDEPENDENT LEGAL EXCELLENCE IS INSTITUTIONALLY CONNECTED.</div>
							<p class="wla-about-vision-body">
								WLA's founding vision was precise: a world in which the best independent law firm in every jurisdiction — the firm with the deepest local knowledge, the strongest local relationships, and the most genuine local expertise — could serve any client, anywhere in the world, as part of a single co-practice team with institutional weight behind it.
							</p>
							<p class="wla-about-vision-body">
								That vision is still guiding every decision WLA makes. Every new partner firm designated brings one more piece of it to life. Every co-practice mandate closed proves the model works. Every WLA Intelligence signal published demonstrates the intelligence infrastructure that independent firms can build together.
							</p>
							<ul class="wla-about-vision-list">
								<li>151 WLA-Qualified partner firms across 90+ jurisdictions</li>
								<li>One exclusive firm per practice per jurisdiction — the best, not the nearest</li>
								<li>1,240+ regulatory intelligence signals tracked daily across 80 jurisdictions</li>
								<li>6 active cross-border deal corridors — both sides, held simultaneously</li>
								<li>UNBOUNDED™ Annual Forum — Barcelona 2026, four editions running</li>
							</ul>
							<div class="wla-about-vision-buttons">
								<a href="wla-how-it-works.html" class="wla-about-btn-ink">HOW CO-PRACTICE WORKS →</a>
								<a href="wla-page-forfirms.html" class="wla-about-btn-bdr">JOIN WLA</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: GLOBAL REACH                                        -->
			<!-- ============================================================ -->
			<section class="wla-about-section wla-about-section--globe wla-about-animate">
				<div class="wla-about-container">
					<div class="wla-about-eyebrow">GLOBAL REACH</div>
					<h2 class="wla-about-heading">ACTIVE ACROSS<br>90+ JURISDICTIONS.</h2>
					<p class="wla-about-subheading">
						One exclusive partner firm per practice per jurisdiction. Every major legal system — common law, civil law, Islamic law, and hybrid systems — with the right accredited specialist firm in each territory. Click any region to explore.
					</p>
					
					<div class="wla-about-region-cards" id="wlaRegionCards">
						<div class="wla-about-rc wla-about-rc--active" onclick="wlaToggleRc(this)">
							<div class="wla-about-rc-number">28</div>
							<div class="wla-about-rc-name">EUROPE</div>
							<div class="wla-about-rc-countries">United Kingdom · Germany · France · Poland · Netherlands · Spain · Portugal · Italy · Sweden · Switzerland · Belgium · Austria · Czech Republic · Romania · Hungary · Greece · Denmark · Finland · Norway · Ireland · Luxembourg · Slovakia · Croatia · Slovenia · Bulgaria · Estonia · Latvia · Lithuania</div>
						</div>
						<div class="wla-about-rc" onclick="wlaToggleRc(this)">
							<div class="wla-about-rc-number">22</div>
							<div class="wla-about-rc-name">ASIA PACIFIC</div>
							<div class="wla-about-rc-countries">India · Singapore · Hong Kong · Japan · Australia · South Korea · Malaysia · Vietnam · Indonesia · Thailand · Philippines · New Zealand · Bangladesh · Sri Lanka · Myanmar · Cambodia · Taiwan · Pakistan · Nepal · Bahrain</div>
						</div>
						<div class="wla-about-rc" onclick="wlaToggleRc(this)">
							<div class="wla-about-rc-number">16</div>
							<div class="wla-about-rc-name">AFRICA + MIDDLE EAST</div>
							<div class="wla-about-rc-countries">UAE · Saudi Arabia · Qatar · Kuwait · Oman · Kenya · Nigeria · South Africa · Ghana · Zambia · Tanzania · Morocco · Egypt · Ethiopia · Guinea · Mauritius</div>
						</div>
						<div class="wla-about-rc" onclick="wlaToggleRc(this)">
							<div class="wla-about-rc-number">18</div>
							<div class="wla-about-rc-name">AMERICAS</div>
							<div class="wla-about-rc-countries">United States · Canada · Brazil · Mexico · Colombia · Argentina · Chile · Peru · Ecuador · Uruguay · Costa Rica · Panama · Jamaica · Bahamas · Trinidad · Honduras · Guatemala · Bolivia</div>
						</div>
					</div>
					
					<div class="wla-about-region-buttons">
						<a href="wla-directory.html" class="wla-about-btn-ink">VIEW PARTNER DIRECTORY →</a>
						<a href="wla-specialist.html" class="wla-about-btn-bdr">FIND A SPECIALIST</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CONNECTED ORGANISATIONS                             -->
			<!-- ============================================================ -->
			<div class="wla-about-connected-bg">
				<section class="wla-about-section wla-about-section--dark wla-about-animate">
					<div class="wla-about-container">
						<div class="wla-about-eyebrow-dark">CONNECTED ORGANISATIONS</div>
						<h2 class="wla-about-heading-dark">THE WLA INSTITUTIONAL<br>FAMILY.</h2>
						<p class="wla-about-connected-intro">
							WLA operates alongside two sister organisations that extend its reach into dispute resolution and global convening.
						</p>
						
						<div class="wla-about-connected-grid">
							<div class="wla-about-corg">
								<div class="wla-about-corg-tag">SISTER ORGANISATION · ADR</div>
								<div class="wla-about-corg-name">THENEUTRALS.ORG™</div>
								<p class="wla-about-corg-desc">TheNeutrals.ORG™ is the world's premier network of certified neutral evaluators — 1,500+ certified neutrals across 80+ jurisdictions specialising in independent neutral evaluation, expert determination, and alternative dispute resolution. WLA partner firms work alongside TheNeutrals.ORG™ practitioners on complex cross-border dispute resolution matters.</p>
								<a href="https://theneutrals.org" target="_blank" class="wla-about-corg-link">VISIT THENEUTRALS.ORG →</a>
							</div>
							<div class="wla-about-corg">
								<div class="wla-about-corg-tag">SISTER ORGANISATION · EVENTS</div>
								<div class="wla-about-corg-name">UNBOUNDED™</div>
								<p class="wla-about-corg-desc">UNBOUNDED™ is the annual WLA Global Forum — the world's most important gathering of independent legal minds. Four editions. Dubai 2023, London 2024, Singapore 2025, Barcelona 2026. 200 delegates. Managing partners, General Counsel, institutional investors, and policy makers. Two days. One city. Every year. UNBOUNDED™ HONORS 2026 — the awards gala celebrating outstanding cross-border legal work — takes place on the evening of 15 August 2026.</p>
								<a href="https://unboundedglobal.com" target="_blank" class="wla-about-corg-link">VISIT UNBOUNDED™ →</a>
							</div>
						</div>
					</div>
				</section>
			</div>

		</div>
		<!-- END WLA ABOUT PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Arbitration & Mediation Page Shortcode
	 *
	 * Displays the WLA Arbitration & Mediation page including:
	 * - Hero with institution selector
	 * - Capability accordion rows
	 * - Institution coverage table
	 * - Enforcement visualization with bars
	 * - TheNeutrals.ORG integration
	 * - Process timeline
	 * - CTA band
	 *
	 * Shortcode: [wla_arbitration_page]
	 *
	 * @return string
	 */
	public function wla_arbitration_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA ARBITRATION PAGE WRAPPER -->
		<div class="wla-arbitration-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-arbitration-hero">
				<div class="wla-arbitration-hero-main">
					<div class="wla-arbitration-hero-left">
						<div class="wla-arbitration-breadcrumb">
							PRACTICES <span>›</span> CORE ALLIANCES <span>›</span> ARBITRATION &amp; MEDIATION
						</div>
						<h1 class="wla-arbitration-hero-title">WLA ARBITRATION &amp; MEDIATION GROUP</h1>
						<p class="wla-arbitration-hero-desc">International arbitration, mediation, and dispute resolution co-practiced across 90+ jurisdictions. WLA partner firms active at HKIAC, ICC, LCIA, SIAC, ICSID, and every major arbitral institution — with the right specialist in each seat.</p>
						<div class="wla-arbitration-hero-buttons">
							<a href="wla-specialist.html" class="wla-arbitration-btn-white">FIND A DISPUTES SPECIALIST — 48H</a>
							<a href="#capabilities" class="wla-arbitration-btn-ghost-white">CAPABILITIES</a>
							<a href="https://theneutrals.org" target="_blank" class="wla-arbitration-btn-ghost-white">THENEUTRALS.ORG™ ↗</a>
						</div>
					</div>
					<div class="wla-arbitration-hero-right">
						<div class="wla-arbitration-inst-title">ARBITRAL INSTITUTIONS — WLA ACTIVE</div>
						<div class="wla-arbitration-inst-grid" id="wlaArbInstGrid">
							
							<!-- HKIAC -->
							<div class="wla-arbitration-inst wla-arbitration-inst-active" data-inst="hkfac">
								<div>
									<div class="wla-arbitration-inst-name">HKIAC</div>
									<div class="wla-arbitration-inst-full">Hong Kong International Arbitration Centre</div>
								</div>
								<div class="wla-arbitration-inst-badge wla-arbitration-inst-badge--active">ACTIVE</div>
								<div class="wla-arbitration-inst-detail">Record caseload 2025–26. Emergency appointment 24h turnaround. WLA HK active across all proceedings including emergency, investor-state, and commercial arbitration.</div>
							</div>
							
							<!-- ICC -->
							<div class="wla-arbitration-inst" data-inst="icc">
								<div>
									<div class="wla-arbitration-inst-name">ICC</div>
									<div class="wla-arbitration-inst-full">International Chamber of Commerce</div>
								</div>
								<div class="wla-arbitration-inst-badge wla-arbitration-inst-badge--active">ACTIVE</div>
								<div class="wla-arbitration-inst-detail">Largest caseload globally. WLA partner firms active across ICC proceedings in Europe, Asia, and Middle East seat combinations.</div>
							</div>
							
							<!-- LCIA -->
							<div class="wla-arbitration-inst" data-inst="lcia">
								<div>
									<div class="wla-arbitration-inst-name">LCIA</div>
									<div class="wla-arbitration-inst-full">London Court of International Arbitration</div>
								</div>
								<div class="wla-arbitration-inst-badge wla-arbitration-inst-badge--active">ACTIVE</div>
								<div class="wla-arbitration-inst-detail">WLA UK active across all LCIA proceedings. Premier seat for UK and Commonwealth cross-border disputes post-Brexit.</div>
							</div>
							
							<!-- SIAC -->
							<div class="wla-arbitration-inst" data-inst="siac">
								<div>
									<div class="wla-arbitration-inst-name">SIAC</div>
									<div class="wla-arbitration-inst-full">Singapore International Arbitration Centre</div>
								</div>
								<div class="wla-arbitration-inst-badge wla-arbitration-inst-badge--active">ACTIVE</div>
								<div class="wla-arbitration-inst-detail">Primary APAC commercial seat. WLA Singapore active. Key for GCC-ASEAN and China-related proceedings.</div>
							</div>
							
							<!-- ICSID -->
							<div class="wla-arbitration-inst" data-inst="icsid">
								<div>
									<div class="wla-arbitration-inst-name">ICSID</div>
									<div class="wla-arbitration-inst-full">International Centre for Settlement of Investment Disputes</div>
								</div>
								<div class="wla-arbitration-inst-badge wla-arbitration-inst-badge--available">AVAILABLE</div>
								<div class="wla-arbitration-inst-detail">Investment treaty arbitration. WLA has specialist investor-state practitioners across multiple jurisdictions with ICSID experience.</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="wla-arbitration-hero-strip">
					<div class="wla-arbitration-hs">
						<div class="wla-arbitration-hs-number">5+</div>
						<div class="wla-arbitration-hs-label">Institutions Active</div>
					</div>
					<div class="wla-arbitration-hs">
						<div class="wla-arbitration-hs-number">90+</div>
						<div class="wla-arbitration-hs-label">Jurisdictions</div>
					</div>
					<div class="wla-arbitration-hs">
						<div class="wla-arbitration-hs-number">48H</div>
						<div class="wla-arbitration-hs-label">Specialist Matched</div>
					</div>
					<div class="wla-arbitration-hs">
						<div class="wla-arbitration-hs-number">24H</div>
						<div class="wla-arbitration-hs-label">Emergency Arb Available</div>
					</div>
					<div class="wla-arbitration-hs">
						<div class="wla-arbitration-hs-number">1,500+</div>
						<div class="wla-arbitration-hs-label">Neutrals via TheNeutrals.ORG™</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CAPABILITIES                                         -->
			<!-- ============================================================ -->
			<section class="wla-arbitration-section wla-arbitration-animate" id="capabilities">
				<div class="wla-arbitration-container">
					<div class="wla-arbitration-eyebrow">DISPUTE RESOLUTION CAPABILITIES</div>
					<h2 class="wla-arbitration-heading">EVERY FORM OF INTERNATIONAL<br>DISPUTE RESOLUTION.</h2>
					<p class="wla-arbitration-subtext">WLA's Arbitration &amp; Mediation Group co-practices all forms of international dispute resolution — from emergency injunctions to multi-year treaty arbitrations — with specialist partner firms in every relevant jurisdiction.</p>
					
					<div class="wla-arbitration-cap-rows" id="wlaArbCapRows">
						
						<!-- Capability 01: Commercial Arbitration -->
						<div class="wla-arbitration-cap-row" data-cap="01">
							<div class="wla-arbitration-cr-number">01</div>
							<div class="wla-arbitration-cr-title">INTERNATIONAL COMMERCIAL ARBITRATION</div>
							<div class="wla-arbitration-cr-toggle">+</div>
						</div>
						<div class="wla-arbitration-cr-expand">
							<p class="wla-arbitration-cr-desc">Commercial arbitration under ICC, HKIAC, LCIA, SIAC, and UNCITRAL rules — co-practiced by WLA partner firms in the seat jurisdiction, the counterparty jurisdiction, and any jurisdiction where enforcement is required. One co-practice team, coordinated strategy, no gaps between jurisdictions.</p>
							<ul class="wla-arbitration-cr-list">
								<li>ICC, HKIAC, LCIA, SIAC, and UNCITRAL proceedings</li>
								<li>Emergency arbitration — 24-hour appointment support</li>
								<li>Multi-party, multi-contract arbitration proceedings</li>
								<li>Counterclaim and cross-claim coordination across jurisdictions</li>
								<li>Expert witness coordination and quantum analysis support</li>
								<li>Post-award enforcement in New York Convention states</li>
							</ul>
						</div>
						
						<!-- Capability 02: Investor-State -->
						<div class="wla-arbitration-cap-row" data-cap="02">
							<div class="wla-arbitration-cr-number">02</div>
							<div class="wla-arbitration-cr-title">INVESTOR-STATE &amp; TREATY ARBITRATION</div>
							<div class="wla-arbitration-cr-toggle">+</div>
						</div>
						<div class="wla-arbitration-cr-expand">
							<p class="wla-arbitration-cr-desc">Investor-state dispute settlement under ICSID, UNCITRAL, and bilateral investment treaty frameworks — including BIT claims, fair and equitable treatment, expropriation, and umbrella clause disputes. WLA has specialist investment treaty practitioners across multiple jurisdictions.</p>
							<ul class="wla-arbitration-cr-list">
								<li>BIT and multilateral investment treaty claims</li>
								<li>ICSID and ICSID Additional Facility proceedings</li>
								<li>Expropriation and fair and equitable treatment claims</li>
								<li>Energy Charter Treaty proceedings</li>
								<li>State immunity and enforcement of treaty awards</li>
							</ul>
						</div>
						
						<!-- Capability 03: Mediation & ADR -->
						<div class="wla-arbitration-cap-row" data-cap="03">
							<div class="wla-arbitration-cr-number">03</div>
							<div class="wla-arbitration-cr-title">MEDIATION &amp; ALTERNATIVE DISPUTE RESOLUTION</div>
							<div class="wla-arbitration-cr-toggle">+</div>
						</div>
						<div class="wla-arbitration-cr-expand">
							<p class="wla-arbitration-cr-desc">International commercial mediation, expert determination, and other ADR processes — co-practiced alongside WLA's sister organisation TheNeutrals.ORG™, which provides 1,500+ certified neutrals across 80+ jurisdictions. WLA can co-practice the legal representation while TheNeutrals.ORG™ provides the neutral.</p>
							<ul class="wla-arbitration-cr-list">
								<li>International commercial mediation under ICC, CEDR, and SIAC rules</li>
								<li>Med-arb and arb-med hybrid processes</li>
								<li>Expert determination — independent and binding</li>
								<li>Dispute boards for construction and infrastructure projects</li>
								<li>Singapore Convention on Mediation — enforcement support</li>
							</ul>
						</div>
						
						<!-- Capability 04: Cross-Border Litigation -->
						<div class="wla-arbitration-cap-row" data-cap="04">
							<div class="wla-arbitration-cr-number">04</div>
							<div class="wla-arbitration-cr-title">CROSS-BORDER LITIGATION &amp; ENFORCEMENT</div>
							<div class="wla-arbitration-cr-toggle">+</div>
						</div>
						<div class="wla-arbitration-cr-expand">
							<p class="wla-arbitration-cr-desc">Cross-border commercial litigation coordinated across multiple jurisdictions simultaneously — including parallel proceedings, anti-suit injunctions, and global asset tracing and enforcement. WLA co-practices the full enforcement chain from judgment to recovery.</p>
							<ul class="wla-arbitration-cr-list">
								<li>Parallel litigation in multiple jurisdictions</li>
								<li>Anti-suit injunctions and anti-enforcement injunctions</li>
								<li>Global asset tracing and freezing order applications</li>
								<li>New York Convention arbitral award enforcement in 170+ states</li>
								<li>Recognition and enforcement of foreign court judgments</li>
							</ul>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INSTITUTION TABLE                                    -->
			<!-- ============================================================ -->
			<div class="wla-arbitration-inst-table-bg">
				<section class="wla-arbitration-section wla-arbitration-animate">
					<div class="wla-arbitration-container">
						<div class="wla-arbitration-eyebrow">ARBITRAL INSTITUTION COVERAGE</div>
						<h2 class="wla-arbitration-heading">WLA ACTIVE AT EVERY<br>MAJOR ARBITRAL INSTITUTION.</h2>
						
						<table class="wla-arbitration-inst-table">
							<thead>
								<tr>
									<th>INSTITUTION</th>
									<th>SEAT / HEARING LOCATIONS</th>
									<th>EMERGENCY TIMELINE</th>
									<th>WLA STATUS</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-arbitration-it-inst">HKIAC</div>
										<div class="wla-arbitration-it-full">Hong Kong International Arbitration Centre</div>
									</td>
									<td class="wla-arbitration-it-seat">Hong Kong · Singapore · London · Worldwide</td>
									<td class="wla-arbitration-it-time">24H appointment</td>
									<td><div class="wla-arbitration-it-wla">FULLY ACTIVE</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-arbitration-it-inst">ICC</div>
										<div class="wla-arbitration-it-full">International Chamber of Commerce</div>
									</td>
									<td class="wla-arbitration-it-seat">Paris HQ · Global hearings</td>
									<td class="wla-arbitration-it-time">15-day emergency</td>
									<td><div class="wla-arbitration-it-wla">FULLY ACTIVE</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-arbitration-it-inst">LCIA</div>
										<div class="wla-arbitration-it-full">London Court of International Arbitration</div>
									</td>
									<td class="wla-arbitration-it-seat">London · Dubai · Mauritius · India</td>
									<td class="wla-arbitration-it-time">72H appointment</td>
									<td><div class="wla-arbitration-it-wla">FULLY ACTIVE</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-arbitration-it-inst">SIAC</div>
										<div class="wla-arbitration-it-full">Singapore International Arbitration Centre</div>
									</td>
									<td class="wla-arbitration-it-seat">Singapore · Global hearings</td>
									<td class="wla-arbitration-it-time">1-day appointment</td>
									<td><div class="wla-arbitration-it-wla">FULLY ACTIVE</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-arbitration-it-inst">ICSID</div>
										<div class="wla-arbitration-it-full">International Centre for Settlement of Investment Disputes</div>
									</td>
									<td class="wla-arbitration-it-seat">Washington DC · Worldwide</td>
									<td class="wla-arbitration-it-seat" style="color:var(--wla-arbitration-muted)">N/A — treaty basis</td>
									<td><div class="wla-arbitration-it-wla">SPECIALIST AVAILABLE</div></td>
								</tr>
								<tr>
									<td>
										<div class="wla-arbitration-it-inst">UNCITRAL</div>
										<div class="wla-arbitration-it-full">Ad Hoc Rules — Various Seats</div>
									</td>
									<td class="wla-arbitration-it-seat">Any agreed seat</td>
									<td class="wla-arbitration-it-seat" style="color:var(--wla-arbitration-muted)">By agreement</td>
									<td><div class="wla-arbitration-it-wla">FULLY ACTIVE</div></td>
								</tr>
							</tbody>
						</table>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: ENFORCEMENT + NEUTRALS                               -->
			<!-- ============================================================ -->
			<div class="wla-arbitration-enf-bg">
				<div class="wla-arbitration-enf-inner wla-arbitration-animate">
					<div class="wla-arbitration-eyebrow-dark">AWARD ENFORCEMENT &amp; ADR</div>
					<h2 class="wla-arbitration-heading-dark">FROM AWARD TO RECOVERY.<br>PLUS THENEUTRALS.ORG™.</h2>
					
					<div class="wla-arbitration-enf-layout">
						<div class="wla-arbitration-enf-visual">
							<div class="wla-arbitration-enf-canvas-wrap" id="wlaArbEnfWrap">
								<div class="wla-arbitration-enf-label">NEW YORK CONVENTION ENFORCEMENT — WLA ACTIVE JURISDICTIONS</div>
								<div id="wlaArbEnfBars"></div>
							</div>
							<a href="https://theneutrals.org" target="_blank" class="wla-arbitration-neutrals-card">
								<div class="wla-arbitration-nc-left">
									<div class="wla-arbitration-nc-tag">CONNECTED ORGANISATION · ADR</div>
									<div class="wla-arbitration-nc-name">THENEUTRALS.ORG™</div>
									<p class="wla-arbitration-nc-desc">1,500+ certified neutrals across 80+ jurisdictions. Mediation, expert determination, and neutral evaluation — working alongside WLA's legal co-practice.</p>
								</div>
								<div class="wla-arbitration-nc-link">VISIT ↗</div>
							</a>
						</div>
						<div class="wla-arbitration-enf-content">
							<div class="wla-arbitration-enf-title">AWARD ENFORCEMENT IS WHERE CO-PRACTICE EARNS ITS VALUE.</div>
							<p class="wla-arbitration-enf-body">Winning an arbitral award is only the beginning. Enforcing it across multiple jurisdictions — where the respondent holds assets — requires coordinated legal action in each territory simultaneously. WLA co-practices the full enforcement chain: recognition, enforcement proceedings, asset freezing, and recovery — across every jurisdiction where assets are held.</p>
							<ul class="wla-arbitration-enf-points">
								<li>New York Convention enforcement in 170+ signatory states</li>
								<li>ICSID award enforcement — direct enforcement under Art. 54</li>
								<li>Parallel asset freezing orders across multiple jurisdictions simultaneously</li>
								<li>Asset tracing — working with WLA's financial investigation partners</li>
								<li>Enforcement-resistant structure unwinding — corporate veil, fraudulent transfer</li>
								<li>Singapore Convention enforcement of mediated settlement agreements</li>
							</ul>
							<a href="wla-specialist.html" class="wla-arbitration-btn-white">FIND AN ENFORCEMENT SPECIALIST →</a>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PROCESS TIMELINE                                     -->
			<!-- ============================================================ -->
			<section class="wla-arbitration-section wla-arbitration-animate">
				<div class="wla-arbitration-container">
					<div class="wla-arbitration-eyebrow">HOW WLA CO-PRACTICES DISPUTES</div>
					<h2 class="wla-arbitration-heading">FROM NOTICE OF ARBITRATION<br>TO ENFORCEMENT. ONE TEAM.</h2>
					
					<div class="wla-arbitration-timeline">
						
						<!-- Stage 01 -->
						<div class="wla-arbitration-pt-item">
							<div class="wla-arbitration-pt-dot"></div>
							<div class="wla-arbitration-pt-tag">STAGE 01 · DAY ONE</div>
							<div class="wla-arbitration-pt-title">BRIEF WLA — JURISDICTION &amp; INSTITUTION IDENTIFIED</div>
							<p class="wla-arbitration-pt-desc">Brief WLA on the dispute — the contract, the clause, the parties, and the jurisdictions where enforcement will be required. WLA confirms the right disputes specialist within 48 hours. Emergency proceedings: same-day response.</p>
							<div class="wla-arbitration-pt-badge">✓ 48H confirmation · Emergency same-day</div>
						</div>
						
						<!-- Stage 02 -->
						<div class="wla-arbitration-pt-item">
							<div class="wla-arbitration-pt-dot"></div>
							<div class="wla-arbitration-pt-tag">STAGE 02</div>
							<div class="wla-arbitration-pt-title">CO-PRACTICE TEAM ASSEMBLED — SEAT + ENFORCEMENT JURISDICTIONS</div>
							<p class="wla-arbitration-pt-desc">WLA assembles the full co-practice team — the lead disputes specialist in the arbitral seat, plus enforcement specialists in every jurisdiction where the respondent holds assets. Strategy aligned from day one.</p>
							<div class="wla-arbitration-pt-badge">✓ Full team confirmed · All jurisdictions</div>
						</div>
						
						<!-- Stage 03 -->
						<div class="wla-arbitration-pt-item">
							<div class="wla-arbitration-pt-dot"></div>
							<div class="wla-arbitration-pt-tag">STAGE 03</div>
							<div class="wla-arbitration-pt-title">PROCEEDINGS — COORDINATED ACROSS ALL JURISDICTIONS</div>
							<p class="wla-arbitration-pt-desc">Main proceedings in the seat. Parallel interim measures in enforcement jurisdictions. Asset freezing orders applied for simultaneously. One WLA coordination layer. No gaps between the seat team and the enforcement teams.</p>
							<div class="wla-arbitration-pt-badge">✓ Parallel proceedings coordinated</div>
						</div>
						
						<!-- Stage 04 -->
						<div class="wla-arbitration-pt-item">
							<div class="wla-arbitration-pt-dot"></div>
							<div class="wla-arbitration-pt-tag">STAGE 04</div>
							<div class="wla-arbitration-pt-title">AWARD &amp; ENFORCEMENT — FULL RECOVERY</div>
							<p class="wla-arbitration-pt-desc">Award obtained. Enforcement proceedings commenced simultaneously in all asset jurisdictions. New York Convention recognition obtained in each territory. Recovery of assets — not just a piece of paper.</p>
							<div class="wla-arbitration-pt-badge">✓ Brief to recovery · Full enforcement chain</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-arbitration-cta-band">
				<div class="wla-arbitration-cta-title">BRIEF WLA ON YOUR DISPUTE. SPECIALIST CONFIRMED IN 48 HOURS.</div>
				<div class="wla-arbitration-cta-buttons">
					<a href="wla-specialist.html" class="wla-arbitration-btn-white">FIND A DISPUTES SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-arbitration-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA ARBITRATION PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Clients Page Shortcode
	 *
	 * Displays the WLA Clients page including:
	 * - Hero section with glass card overlay
	 * - Who We Serve - horizontal scroll sectors
	 * - Process steps (alternating left/right)
	 * - Case studies grid
	 * - Intelligence live feed
	 * - Testimonials horizontal scroll
	 * - Bottom CTA strip
	 *
	 * Shortcode: [wla_clients_page]
	 *
	 * @return string
	 */
	public function wla_clients_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA CLIENTS PAGE WRAPPER -->
		<div class="wla-clients-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-clients-hero">
				<img class="wla-clients-hero-img" src="https://images.unsplash.com/photo-1556761175-4b46a572b786?w=1920&q=85" alt="Global business meeting">
				<div class="wla-clients-hero-grad"></div>
				<div class="wla-clients-hero-content">
					<div class="wla-clients-hero-eyebrow">FOR CLIENTS · MULTINATIONAL · INSTITUTIONAL · PRIVATE</div>
					<h1 class="wla-clients-hero-title">THE FINEST INDEPENDENT COUNSEL. GLOBALLY COORDINATED.</h1>
					<p class="wla-clients-hero-description">One brief. The right specialist in every jurisdiction. Jointly held under WLA's Institutional co-practice framework — from the first call to final completion.</p>
					<div class="wla-clients-hero-buttons">
						<a href="wla-specialist.html" class="wla-clients-btn-white">FIND A SPECIALIST — 48H</a>
						<a href="#process" class="wla-clients-btn-ghost-white">HOW IT WORKS</a>
					</div>
				</div>
				<div class="wla-clients-glass-card">
					<div class="wla-clients-gc-title">LIVE ACTIVITY</div>
					<div class="wla-clients-gc-stats">
						<div class="wla-clients-gc-stat">
							<div class="wla-clients-gc-stat-n">90+</div>
							<div class="wla-clients-gc-stat-l">Active<br>Jurisdictions</div>
						</div>
						<div class="wla-clients-gc-divider"></div>
						<div class="wla-clients-gc-stat">
							<div class="wla-clients-gc-stat-n">48H</div>
							<div class="wla-clients-gc-stat-l">Specialist<br>Matched</div>
						</div>
						<div class="wla-clients-gc-divider"></div>
						<div class="wla-clients-gc-stat">
							<div class="wla-clients-gc-stat-n">151</div>
							<div class="wla-clients-gc-stat-l">Partner<br>Firms</div>
						</div>
					</div>
					<div class="wla-clients-gc-live">
						<div class="wla-clients-gdot"></div>
						SYSTEM ACTIVE
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHO WE SERVE                                        -->
			<!-- ============================================================ -->
			<section class="wla-clients-section wla-clients-animate">
				<div class="wla-clients-container">
					<div class="wla-clients-eyebrow">WHO WE SERVE</div>
					<h2 class="wla-clients-heading">EVERY CLIENT TYPE.<br>EVERY JURISDICTION.</h2>
					<p class="wla-clients-subheading">
						From multinational corporations and institutional investors to high net worth individuals and fast-growing founders — WLA's accredited partner network covers every client profile across every territory.
					</p>
				</div>
				
				<div class="wla-clients-sectors-scroll">
					<div class="wla-clients-sectors-track">
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Multinational">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">01</div>
								<div class="wla-clients-sector-name">MULTINATIONAL CORPORATIONS</div>
								<div class="wla-clients-sector-desc">Complex multi-jurisdiction structures, cross-border employment, regulatory compliance across 90+ territories.</div>
							</div>
						</div>
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=600&q=80" alt="Private Equity">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">02</div>
								<div class="wla-clients-sector-name">PRIVATE EQUITY &amp; VENTURE</div>
								<div class="wla-clients-sector-desc">Cross-border acquisitions, portfolio company legal support, fund structuring across multiple legal systems.</div>
							</div>
						</div>
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1560472355-536de3962603?w=600&q=80" alt="Family Office">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">03</div>
								<div class="wla-clients-sector-name">FAMILY OFFICES &amp; HNW</div>
								<div class="wla-clients-sector-desc">Wealth structuring, succession, multi-jurisdictional estate planning and asset protection for global families.</div>
							</div>
						</div>
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1553484771-047a44eee27b?w=600&q=80" alt="Technology">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">04</div>
								<div class="wla-clients-sector-name">TECHNOLOGY COMPANIES</div>
								<div class="wla-clients-sector-desc">IP strategy, data protection compliance, AI regulation, cross-border expansion legal support globally.</div>
							</div>
						</div>
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?w=600&q=80" alt="General Counsel">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">05</div>
								<div class="wla-clients-sector-name">GENERAL COUNSEL</div>
								<div class="wla-clients-sector-desc">A single coordinated network of accredited specialists replacing multiple disconnected outside counsel relationships.</div>
							</div>
						</div>
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600&q=80" alt="Founders">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">06</div>
								<div class="wla-clients-sector-name">FOUNDERS &amp; SCALE-UPS</div>
								<div class="wla-clients-sector-desc">Global expansion legal support from day one — employment, IP, commercial contracts, and regulatory filings.</div>
							</div>
						</div>
						<div class="wla-clients-sector-card">
							<img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80" alt="Institutions">
							<div class="wla-clients-sector-grad"></div>
							<div class="wla-clients-sector-content">
								<div class="wla-clients-sector-tag">07</div>
								<div class="wla-clients-sector-name">INSTITUTIONS &amp; SOVEREIGNS</div>
								<div class="wla-clients-sector-desc">DFI, sovereign wealth, and development institution legal advisory across frontier and emerging markets.</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wla-clients-scroll-hint">
					<div class="wla-clients-hint-line"></div>
					SCROLL TO EXPLORE ALL SECTORS
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PROCESS                                              -->
			<!-- ============================================================ -->
			<div class="wla-clients-rule"></div>
			
			<section class="wla-clients-section wla-clients-animate" id="process">
				<div class="wla-clients-container">
					<div class="wla-clients-eyebrow">HOW IT WORKS</div>
					<h2 class="wla-clients-heading">FROM BRIEF TO CLOSE.<br>ONE COORDINATED TEAM.</h2>
					<p class="wla-clients-subheading">
						The WLA process is built for speed, clarity, and global coverage — without the chaos of managing multiple disconnected firms across different time zones.
					</p>
					
					<div class="wla-clients-process-wrap">
						
						<!-- Step 01 -->
						<div class="wla-clients-process-step">
							<div class="wla-clients-ps-content">
								<div class="wla-clients-ps-tag">STEP 01</div>
								<div class="wla-clients-ps-title">SUBMIT YOUR BRIEF</div>
								<p class="wla-clients-ps-desc">Share the jurisdictions, practice areas, and timeline with WLA's coordination team. One brief. No need to contact multiple firms separately across different countries.</p>
							</div>
							<div class="wla-clients-ps-center">
								<div class="wla-clients-ps-num">01</div>
							</div>
							<div class="wla-clients-ps-empty"></div>
						</div>
						<div class="wla-clients-ps-spacer"></div>

						<!-- Step 02 -->
						<div class="wla-clients-process-step">
							<div class="wla-clients-ps-empty"></div>
							<div class="wla-clients-ps-center">
								<div class="wla-clients-ps-num">02</div>
							</div>
							<div class="wla-clients-ps-content wla-clients-ps-right">
								<div class="wla-clients-ps-tag">STEP 02 — WITHIN 48 HOURS</div>
								<div class="wla-clients-ps-title">SPECIALIST MATCHED</div>
								<p class="wla-clients-ps-desc">WLA matches your brief with the accredited specialist firm in each required jurisdiction. You receive a coordinated team proposal — not six separate responses from six different firms.</p>
							</div>
						</div>
						<div class="wla-clients-ps-spacer"></div>

						<!-- Step 03 -->
						<div class="wla-clients-process-step">
							<div class="wla-clients-ps-content">
								<div class="wla-clients-ps-tag">STEP 03</div>
								<div class="wla-clients-ps-title">CO-PRACTICE ACTIVATED</div>
								<p class="wla-clients-ps-desc">The co-practice protocol activates. Partner firms across all required jurisdictions jointly hold the engagement — shared matter management, one WLA coordination layer, one client experience.</p>
							</div>
							<div class="wla-clients-ps-center">
								<div class="wla-clients-ps-num">03</div>
							</div>
							<div class="wla-clients-ps-empty"></div>
						</div>
						<div class="wla-clients-ps-spacer"></div>

						<!-- Step 04 -->
						<div class="wla-clients-process-step">
							<div class="wla-clients-ps-empty"></div>
							<div class="wla-clients-ps-center">
								<div class="wla-clients-ps-num">04</div>
							</div>
							<div class="wla-clients-ps-content wla-clients-ps-right">
								<div class="wla-clients-ps-tag">STEP 04</div>
								<div class="wla-clients-ps-title">BRIEF TO CLOSE</div>
								<p class="wla-clients-ps-desc">Your matter is completed across all jurisdictions simultaneously — with WLA Intelligence briefings throughout to keep you ahead of regulatory changes that could affect your position.</p>
							</div>
						</div>

					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CASE STUDIES                                        -->
			<!-- ============================================================ -->
			<div class="wla-clients-cs-bg">
				<section class="wla-clients-section wla-clients-animate">
					<div class="wla-clients-container">
						<div class="wla-clients-eyebrow">CASE STUDIES</div>
						<h2 class="wla-clients-heading">HOW WLA CLIENTS<br>MOVE ACROSS BORDERS.</h2>
						
						<div class="wla-clients-cs-grid">
							<a href="#" class="wla-clients-cs-card wla-clients-cs-card--tall">
								<img src="https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?w=900&q=80" alt="UAE to Poland">
								<div class="wla-clients-cs-overlay"></div>
								<div class="wla-clients-cs-arrow">→</div>
								<div class="wla-clients-cs-body">
									<div class="wla-clients-cs-sector">M&amp;A · GULF → CEE</div>
									<div class="wla-clients-cs-title">UAE SOVEREIGN FUND ACQUISITION OF POLISH LOGISTICS GROUP</div>
									<div class="wla-clients-cs-meta">
										<span>WLA UAE + WLA Poland</span>
										<span>4 jurisdictions</span>
									</div>
								</div>
							</a>
							<div class="wla-clients-cs-stack">
								<a href="#" class="wla-clients-cs-card wla-clients-cs-card--stack">
									<img src="https://images.unsplash.com/photo-1553484771-047a44eee27b?w=900&q=80" alt="EU Data">
									<div class="wla-clients-cs-overlay"></div>
									<div class="wla-clients-cs-arrow">→</div>
									<div class="wla-clients-cs-body">
										<div class="wla-clients-cs-sector">DATA PROTECTION · EU → INDIA</div>
										<div class="wla-clients-cs-title">EU TECH COMPANY DPDP COMPLIANCE ACROSS 3 STATES</div>
										<div class="wla-clients-cs-meta">
											<span>WLA Germany + WLA India</span>
											<span>2 jurisdictions</span>
										</div>
									</div>
								</a>
								<a href="#" class="wla-clients-cs-card wla-clients-cs-card--stack">
									<img src="https://images.unsplash.com/photo-1589994965851-a8f479c573a9?w=900&q=80" alt="Arbitration">
									<div class="wla-clients-cs-overlay"></div>
									<div class="wla-clients-cs-arrow">→</div>
									<div class="wla-clients-cs-body">
										<div class="wla-clients-cs-sector">ARBITRATION · APAC → EUROPE</div>
										<div class="wla-clients-cs-title">SINGAPORE-SEATED ICC ARBITRATION WITH ENFORCEMENT IN 4 STATES</div>
										<div class="wla-clients-cs-meta">
											<span>WLA Singapore + WLA UK + WLA France</span>
											<span>4 jurisdictions</span>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE LIVE FEED                              -->
			<!-- ============================================================ -->
			<div class="wla-clients-ifeed-bg">
				<div class="wla-clients-ifeed-inner wla-clients-animate">
					<div class="wla-clients-ifeed-head">
						<div>
							<div class="wla-clients-eyebrow-dark">WLA INTELLIGENCE</div>
							<div class="wla-clients-if-h">STAY AHEAD OF EVERY REGULATORY MOVE.</div>
						</div>
						<div>
							<p class="wla-clients-if-p">WLA Intelligence delivers real-time regulatory signals, deal climate maps, and jurisdictional risk alerts across 80+ jurisdictions — synthesized by partner firm practitioners on the ground, every working day.</p>
							<div class="wla-clients-if-cta">
								<a href="wla-insights.html" class="wla-clients-btn-white">EXPLORE INTELLIGENCE →</a>
							</div>
						</div>
					</div>
					
					<div class="wla-clients-feed-items">
						<div class="wla-clients-feed-item">
							<div class="wla-clients-fi-jur">UAE</div>
							<div class="wla-clients-fi-signal"><strong>DIFC Employment Act Amendments</strong> — New secondment and mobility provisions effective Q3 2026. Significant impact on international executive structures.</div>
							<div class="wla-clients-fi-idx">+24%</div>
						</div>
						<div class="wla-clients-feed-item">
							<div class="wla-clients-fi-jur">EU</div>
							<div class="wla-clients-fi-signal"><strong>AI Act Enforcement Begins</strong> — All 27 member states now subject to full AI Act compliance obligations. Cross-border IP and liability implications for technology companies remain unresolved.</div>
							<div class="wla-clients-fi-idx wla-clients-fi-idx--active">Active</div>
						</div>
						<div class="wla-clients-feed-item">
							<div class="wla-clients-fi-jur">India</div>
							<div class="wla-clients-fi-signal"><strong>DPDP Rules 2025 Final</strong> — Cross-border transfer framework published. 12-month compliance window now open for international companies operating data processing in India.</div>
							<div class="wla-clients-fi-idx">+34%</div>
						</div>
						<div class="wla-clients-feed-item">
							<div class="wla-clients-fi-jur">KSA</div>
							<div class="wla-clients-fi-signal"><strong>Vision 2030 Phase 2</strong> — Record privatisation activity with MISA 30-day fast-track now operational. International investor structuring demand at all-time high.</div>
							<div class="wla-clients-fi-idx">+31%</div>
						</div>
						<div class="wla-clients-feed-item">
							<div class="wla-clients-fi-jur">UK</div>
							<div class="wla-clients-fi-signal"><strong>Employment Rights Bill</strong> — Day-one rights and fire-and-rehire restrictions now effective. Cross-border workforce restructuring requires multi-jurisdiction review.</div>
							<div class="wla-clients-fi-idx wla-clients-fi-idx--active">Active</div>
						</div>
					</div>
					
					<div class="wla-clients-feed-cta">
						<a href="wla-insights.html" class="wla-clients-btn-white">FULL INTELLIGENCE PLATFORM →</a>
						<span class="wla-clients-feed-meta">1,240+ signals tracked across 80 jurisdictions</span>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: TESTIMONIALS                                        -->
			<!-- ============================================================ -->
			<div class="wla-clients-testi-bg">
				<section class="wla-clients-section wla-clients-animate">
					<div class="wla-clients-container">
						<div class="wla-clients-eyebrow">CLIENT PERSPECTIVES</div>
						<h2 class="wla-clients-heading">WHAT CLIENTS SAY<br>ABOUT WORKING WITH WLA.</h2>
					</div>
					
					<div class="wla-clients-testi-track-wrap">
						<div class="wla-clients-testi-track">
							<div class="wla-clients-tcard">
								<div class="wla-clients-tc-open">"</div>
								<p class="wla-clients-tc-q">WLA gave us a single coordinated team across five jurisdictions. The alternative would have been managing five separate firms with no common framework. The difference was extraordinary.</p>
								<div class="wla-clients-tc-name">GENERAL COUNSEL</div>
								<div class="wla-clients-tc-firm">Global Technology Company · EMEA Expansion</div>
							</div>
							<div class="wla-clients-tcard">
								<div class="wla-clients-tc-open">"</div>
								<p class="wla-clients-tc-q">We needed to close a cross-border acquisition involving UAE, Polish, and Singaporean law simultaneously. WLA held all three jurisdictions as one engagement. It was seamless.</p>
								<div class="wla-clients-tc-name">CFO, FAMILY OFFICE</div>
								<div class="wla-clients-tc-firm">GCC-Based Ultra-HNW Family</div>
							</div>
							<div class="wla-clients-tcard">
								<div class="wla-clients-tc-open">"</div>
								<p class="wla-clients-tc-q">The 48-hour brief-to-specialist-match commitment is real. We tested it. We had the right team in four jurisdictions within 36 hours of submitting our brief.</p>
								<div class="wla-clients-tc-name">VP LEGAL</div>
								<div class="wla-clients-tc-firm">European Private Equity Fund</div>
							</div>
							<div class="wla-clients-tcard">
								<div class="wla-clients-tc-open">"</div>
								<p class="wla-clients-tc-q">WLA Intelligence is now a standing item in our monthly GC brief. The regulatory signal coverage is unlike anything else available to independent counsel networks.</p>
								<div class="wla-clients-tc-name">GROUP GENERAL COUNSEL</div>
								<div class="wla-clients-tc-firm">Multinational Manufacturing Group</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: BOTTOM CTA STRIP                                    -->
			<!-- ============================================================ -->
			<div class="wla-clients-cta-strip">
				<div class="wla-clients-cs-h">READY TO FIND YOUR SPECIALIST ACROSS ANY JURISDICTION?</div>
				<div class="wla-clients-cs-btns">
					<a href="wla-specialist.html" class="wla-clients-btn-white">FIND A SPECIALIST — 48H</a>
					<a href="wla-about.html" class="wla-clients-btn-ghost-white">LEARN ABOUT WLA</a>
				</div>
			</div>

		</div>
		<!-- END WLA CLIENTS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * For Firms Page Shortcode
	 *
	 * Displays the WLA For Firms page including:
	 * - Hero section with left text panel and right benefit cards
	 * - Why WLA - feature rows
	 * - Accreditation path with three levels
	 * - Metrics grid
	 * - Application form area
	 * - Testimonials strip
	 *
	 * Shortcode: [wla_firms_page]
	 *
	 * @return string
	 */
	public function wla_firms_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA FIRMS PAGE WRAPPER -->
		<div class="wla-firms-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-firms-hero">
				<div class="wla-firms-hero-left">
					<div class="wla-firms-hero-ghost">WLA</div>
					<div class="wla-firms-hero-eyebrow">FOR INDEPENDENT LAW FIRMS · GLOBAL · EXCLUSIVE · ACCREDITED</div>
					<h1 class="wla-firms-hero-title">COMPETE ON A GLOBAL STAGE. REMAIN EXACTLY WHO YOU ARE.</h1>
					<p class="wla-firms-hero-description">WLA designates one exclusive partner firm per practice per jurisdiction. If your practice has the standing and the ambition, we want to hear from you.</p>
					<div class="wla-firms-hero-buttons">
						<a href="#apply" class="wla-firms-btn-white">APPLY TO JOIN WLA</a>
						<a href="#why" class="wla-firms-btn-ghost-white">WHY WLA</a>
					</div>
				</div>
				<div class="wla-firms-hero-right">
					<div class="wla-firms-hrc">
						<div class="wla-firms-hrc-number">01</div>
						<div class="wla-firms-hrc-title">EXCLUSIVE JURISDICTION</div>
						<div class="wla-firms-hrc-sub">One firm per practice. No competition within WLA.</div>
					</div>
					<div class="wla-firms-hrc wla-firms-hrc--dark">
						<div class="wla-firms-hrc-number">02</div>
						<div class="wla-firms-hrc-title">INSTITUTIONAL MANDATE PIPELINE</div>
						<div class="wla-firms-hrc-sub">Direct routing of cross-border client briefs.</div>
					</div>
					<div class="wla-firms-hrc">
						<div class="wla-firms-hrc-number">03</div>
						<div class="wla-firms-hrc-title">WLA INTELLIGENCE ACCESS</div>
						<div class="wla-firms-hrc-sub">1,240+ regulatory signals daily across 80 jurisdictions.</div>
					</div>
					<div class="wla-firms-hrc wla-firms-hrc--dark">
						<div class="wla-firms-hrc-number">04</div>
						<div class="wla-firms-hrc-title">ANNUAL GLOBAL FORUM</div>
						<div class="wla-firms-hrc-sub">The world's most important gathering of independent legal minds.</div>
					</div>
					<div class="wla-firms-hrc wla-firms-hrc--full">
						<div class="wla-firms-hrc-number">WLA</div>
						<div class="wla-firms-hrc-title">WLA QUALIFIED MARK</div>
						<div class="wla-firms-hrc-sub">The institutional credential sophisticated clients increasingly demand from their cross-border advisors worldwide.</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: WHY WLA                                              -->
			<!-- ============================================================ -->
			<section class="wla-firms-section wla-firms-animate" id="why">
				<div class="wla-firms-container">
					<div class="wla-firms-eyebrow">WHY WORLD LAW ALLIANCE</div>
					<h2 class="wla-firms-heading">FIVE THINGS WLA GIVES<br>YOUR FIRM THAT NOTHING ELSE DOES.</h2>
					
					<div class="wla-firms-feature-rows">
						<div class="wla-firms-feat-row">
							<div class="wla-firms-fr-num">01</div>
							<div class="wla-firms-fr-title">EXCLUSIVE JURISDICTION DESIGNATION</div>
							<div class="wla-firms-fr-desc">WLA designates one firm per practice per jurisdiction — creating genuine scarcity value. Once you hold the WLA designation for your territory, no competing firm can. It is a competitive position that compounds in value over time as WLA grows its institutional client base globally.</div>
						</div>
						<div class="wla-firms-feat-row">
							<div class="wla-firms-fr-num">02</div>
							<div class="wla-firms-fr-title">INSTITUTIONAL MANDATE PIPELINE</div>
							<div class="wla-firms-fr-desc">WLA routes cross-border client briefs directly to partner firms based on practice area, jurisdiction, and corridor activity. You don't pitch for work within the WLA framework — you are the designated specialist for your territory. The pipeline compounds as WLA's institutional client relationships deepen.</div>
						</div>
						<div class="wla-firms-feat-row">
							<div class="wla-firms-fr-num">03</div>
							<div class="wla-firms-fr-title">WLA INTELLIGENCE PLATFORM</div>
							<div class="wla-firms-fr-desc">Daily cross-border regulatory intelligence synthesized across 80 jurisdictions. Partner firms both contribute and consume — building a network intelligence resource that no single firm could create alone. Used by your lawyers daily to stay ahead of the regulatory changes that affect your clients.</div>
						</div>
						<div class="wla-firms-feat-row">
							<div class="wla-firms-fr-num">04</div>
							<div class="wla-firms-fr-title">CO-PRACTICE FRAMEWORK</div>
							<div class="wla-firms-fr-desc">The WLA Co-Practice Protocol gives your firm the operating framework to jointly hold cross-border mandates with partner firms in other jurisdictions — matter management, accountability structures, billing coordination, and client communication frameworks all built in. You practice globally with the structure of a global firm.</div>
						</div>
						<div class="wla-firms-feat-row">
							<div class="wla-firms-fr-num">05</div>
							<div class="wla-firms-fr-title">WLA QUALIFIED MARK</div>
							<div class="wla-firms-fr-desc">The WLA accreditation mark is increasingly demanded by sophisticated multinational clients in their outside counsel selection criteria. It signals that your firm has been independently reviewed against published standards — not just self-declared as internationally capable. The mark is a business development asset that grows in value as institutional awareness of WLA increases.</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: ACCREDITATION PATH                                  -->
			<!-- ============================================================ -->
			<div class="wla-firms-acc-bg">
				<section class="wla-firms-section wla-firms-animate">
					<div class="wla-firms-container">
						<div class="wla-firms-eyebrow">WLA ACCREDITATION</div>
						<h2 class="wla-firms-heading">THREE LEVELS.<br>ONE PATHWAY.</h2>
						<p class="wla-firms-subheading">
							WLA accreditation is not purchased — it is earned through demonstrated commitment to the co-practice framework, annual review against published standards, and consistent delivery for institutional clients.
						</p>
						
						<div class="wla-firms-acc-path">
							<div class="wla-firms-acp-step">
								<div class="wla-firms-acp-dot">I</div>
								<div class="wla-firms-acp-level">FOUNDATION</div>
								<div class="wla-firms-acp-name">WLA PARTNER FIRM</div>
								<p class="wla-firms-acp-desc">Full Institutional partnership. Exclusive jurisdiction designation. Co-Practice Protocol access. WLA Intelligence. Annual Forum. WLA Partner mark.</p>
							</div>
							<div class="wla-firms-acp-step wla-firms-acp-step--active">
								<div class="wla-firms-acp-dot">II</div>
								<div class="wla-firms-acp-level">DISTINGUISHED · MOST SOUGHT</div>
								<div class="wla-firms-acp-name">WLA DISTINGUISHED PARTNER</div>
								<p class="wla-firms-acp-desc">Earned through demonstrated excellence in co-practice and client outcomes. Priority mandate routing. Global Council engagement. Published Distinguished mark.</p>
							</div>
							<div class="wla-firms-acp-step">
								<div class="wla-firms-acp-dot">III</div>
								<div class="wla-firms-acp-level">ANCHOR · HIGHEST</div>
								<div class="wla-firms-acp-name">WLA ANCHOR FIRM</div>
								<p class="wla-firms-acp-desc">The highest Institutional designation. Regional leadership mandate. WLA Global Executive Board seat. First priority on all Institutional mandates. Globally published Anchor mark.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: METRICS                                              -->
			<!-- ============================================================ -->
			<section class="wla-firms-section wla-firms-animate">
				<div class="wla-firms-container">
					<div class="wla-firms-eyebrow">THE NUMBERS</div>
					<h2 class="wla-firms-heading">WHAT WLA PARTNER FIRMS<br>GAIN FROM THE INSTITUTION.</h2>
					
					<div class="wla-firms-metrics-grid">
						<div class="wla-firms-metric-card">
							<div class="wla-firms-mc-n">90+</div>
							<div class="wla-firms-mc-label">Active Jurisdictions</div>
							<div class="wla-firms-mc-sub">One exclusive firm per practice — your territory is yours alone within WLA</div>
						</div>
						<div class="wla-firms-metric-card">
							<div class="wla-firms-mc-n">48H</div>
							<div class="wla-firms-mc-label">Brief-to-Match</div>
							<div class="wla-firms-mc-sub">WLA routes cross-border client briefs to partner firms within 48 hours of receipt</div>
						</div>
						<div class="wla-firms-metric-card">
							<div class="wla-firms-mc-n">1,240+</div>
							<div class="wla-firms-mc-label">Regulatory Signals</div>
							<div class="wla-firms-mc-sub">Cross-border intelligence signals tracked and published across 80 jurisdictions annually</div>
						</div>
						<div class="wla-firms-metric-card">
							<div class="wla-firms-mc-n">4th</div>
							<div class="wla-firms-mc-label">Annual Forum</div>
							<div class="wla-firms-mc-sub">UNBOUNDED Barcelona 2026 — 200 delegates, managing partners, GCs, and institutional investors</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: APPLICATION FORM                                    -->
			<!-- ============================================================ -->
			<div class="wla-firms-app-bg">
				<div class="wla-firms-app-inner" id="apply">
					<div class="wla-firms-app-left wla-firms-animate">
						<div class="wla-firms-app-eyebrow">EXPRESSION OF INTEREST</div>
						<div class="wla-firms-app-title">START YOUR WLA APPLICATION.</div>
						<p class="wla-firms-app-description">Submit your expression of interest below. WLA's team will review your practice profile, confirm jurisdiction availability, and schedule an initial conversation within 5 working days.</p>
						<div class="wla-firms-app-checks">
							<div class="wla-firms-app-check">WLA will confirm whether your jurisdiction and practice area designation is available</div>
							<div class="wla-firms-app-check">Initial consultation with WLA's partnership team within 5 working days</div>
							<div class="wla-firms-app-check">Full accreditation review process explained in detail before any commitment</div>
							<div class="wla-firms-app-check">No obligation to proceed after the initial consultation</div>
						</div>
					</div>
					<div class="wla-firms-app-form wla-firms-animate">
						<div class="wla-firms-form-title">EXPRESSION OF INTEREST</div>
						<form id="wlaFirmsForm" method="POST" action="">
							<div class="wla-firms-form-2col">
								<div class="wla-firms-form-row">
									<label class="wla-firms-form-label">FIRST NAME</label>
									<input type="text" class="wla-firms-form-input" placeholder="First name" name="first_name">
								</div>
								<div class="wla-firms-form-row">
									<label class="wla-firms-form-label">LAST NAME</label>
									<input type="text" class="wla-firms-form-input" placeholder="Last name" name="last_name">
								</div>
							</div>
							<div class="wla-firms-form-row">
								<label class="wla-firms-form-label">FIRM NAME</label>
								<input type="text" class="wla-firms-form-input" placeholder="Your law firm's full name" name="firm_name">
							</div>
							<div class="wla-firms-form-row">
								<label class="wla-firms-form-label">EMAIL</label>
								<input type="email" class="wla-firms-form-input" placeholder="your@firm.com" name="email">
							</div>
							<div class="wla-firms-form-2col">
								<div class="wla-firms-form-row">
									<label class="wla-firms-form-label">JURISDICTION</label>
									<input type="text" class="wla-firms-form-input" placeholder="Primary jurisdiction" name="jurisdiction">
								</div>
								<div class="wla-firms-form-row">
									<label class="wla-firms-form-label">PRACTICE AREA</label>
									<select class="wla-firms-form-input wla-firms-form-select" name="practice_area">
										<option value="">Select practice</option>
										<option value="Transactional &amp; M&A">Transactional &amp; M&A</option>
										<option value="Intellectual Property">Intellectual Property</option>
										<option value="Disputes &amp; Arbitration">Disputes &amp; Arbitration</option>
										<option value="Insolvency &amp; Restructuring">Insolvency &amp; Restructuring</option>
										<option value="International Tax">International Tax</option>
										<option value="Employment &amp; Labour">Employment &amp; Labour</option>
										<option value="Immigration &amp; Mobility">Immigration &amp; Mobility</option>
										<option value="Private Clients &amp; HNW">Private Clients &amp; HNW</option>
										<option value="Technology, Data &amp; Digital">Technology, Data &amp; Digital</option>
										<option value="Energy &amp; Infrastructure">Energy &amp; Infrastructure</option>
										<option value="Competition &amp; Antitrust">Competition &amp; Antitrust</option>
										<option value="International Trade">International Trade</option>
									</select>
								</div>
							</div>
							<div class="wla-firms-form-row">
								<label class="wla-firms-form-label">FIRM SIZE (LAWYERS)</label>
								<select class="wla-firms-form-input wla-firms-form-select" name="firm_size">
									<option value="">Select size</option>
									<option value="1-10">1–10 lawyers</option>
									<option value="11-25">11–25 lawyers</option>
									<option value="26-50">26–50 lawyers</option>
									<option value="51-100">51–100 lawyers</option>
									<option value="100+">100+ lawyers</option>
								</select>
							</div>
							<button type="submit" class="wla-firms-form-submit">SUBMIT EXPRESSION OF INTEREST</button>
							<div class="wla-firms-form-note">WLA will respond within 5 working days. All enquiries are treated with strict confidentiality.</div>
						</form>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: TESTIMONIALS STRIP                                  -->
			<!-- ============================================================ -->
			<div class="wla-firms-tstrip">
				<div class="wla-firms-tc">
					<div class="wla-firms-tc-open">"</div>
					<p class="wla-firms-tc-q">WLA gives our firm an Institutional weight that no 60-lawyer practice could ever build alone. We compete and win on a global stage, while remaining exactly who we are.</p>
					<div class="wla-firms-tc-name">DAWID SOKOLOWSKI</div>
					<div class="wla-firms-tc-firm">Managing Partner · Sokolowski &amp; Partners · Poland</div>
				</div>
				<div class="wla-firms-tc">
					<div class="wla-firms-tc-open">"</div>
					<p class="wla-firms-tc-q">The Co-Practice framework transformed how we think about international mandates. We are not a local firm that refers work abroad any more. We are a global practice with a local soul.</p>
					<div class="wla-firms-tc-name">JOSEP FIGUERAS</div>
					<div class="wla-firms-tc-firm">Figueras Legal · Barcelona, Spain</div>
				</div>
				<div class="wla-firms-tc">
					<div class="wla-firms-tc-open">"</div>
					<p class="wla-firms-tc-q">In the Gulf, Institutional credibility is everything. WLA gives our clients the assurance of a globally recognised framework — and us the tools to serve them at that level.</p>
					<div class="wla-firms-tc-name">MUSED S. ALRASHIDI</div>
					<div class="wla-firms-tc-firm">Al Jubairi Law Firm · Riyadh, Saudi Arabia</div>
				</div>
			</div>

		</div>
		<!-- END WLA FIRMS PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Partner Directory Page Shortcode
	 *
	 * Displays the WLA Partner Directory page including:
	 * - Hero with search and region filters
	 * - Sticky filter bar with tabs
	 * - Sidebar with accreditation, region, and practice filters
	 * - Firms grid with cards
	 * - Pagination
	 * - Region explorer map
	 * - Apply strip
	 *
	 * Shortcode: [wla_directory_page]
	 *
	 * @return string
	 */
	public function wla_directory_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA DIRECTORY PAGE WRAPPER -->
		<div class="wla-directory-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-directory-hero">
				<img class="wla-directory-hero-bg" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=70" alt="Partner Directory">
				<div class="wla-directory-hero-grad"></div>
				<div class="wla-directory-hero-content">
					<div class="wla-directory-hero-eyebrow">PARTNER DIRECTORY · 151 WLA-QUALIFIED FIRMS · 90+ JURISDICTIONS</div>
					<h1 class="wla-directory-hero-title">FIND THE RIGHT FIRM IN ANY JURISDICTION.</h1>
					<div class="wla-directory-search-bar">
						<input type="text" id="wlaDirHeroSearch" placeholder="Search by firm name, jurisdiction, or practice area..." class="wla-directory-search-input">
						<button class="wla-directory-search-btn">SEARCH</button>
					</div>
					<div class="wla-directory-filter-chips">
						<div class="wla-directory-filter-label">FILTER BY REGION</div>
						<div class="wla-directory-chip wla-directory-chip--selected" data-region="ALL">All Regions</div>
						<div class="wla-directory-chip" data-region="EU">Europe</div>
						<div class="wla-directory-chip" data-region="ME">Middle East</div>
						<div class="wla-directory-chip" data-region="APAC">Asia Pacific</div>
						<div class="wla-directory-chip" data-region="AF">Africa</div>
						<div class="wla-directory-chip" data-region="AM">Americas</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: STICKY FILTER BAR                                    -->
			<!-- ============================================================ -->
			<div class="wla-directory-filter-bar">
				<div class="wla-directory-fb-inner">
					<div class="wla-directory-fbt wla-directory-fbt--active" data-filter="ALL">All Firms</div>
					<div class="wla-directory-fb-divider"></div>
					<div class="wla-directory-fbt" data-filter="anchor">WLA Anchor</div>
					<div class="wla-directory-fbt" data-filter="distinguished">WLA Distinguished</div>
					<div class="wla-directory-fbt" data-filter="partner">WLA Partner</div>
					<div class="wla-directory-fb-divider"></div>
					<div class="wla-directory-fbt" data-filter="ma">M&amp;A</div>
					<div class="wla-directory-fbt" data-filter="ip">IP</div>
					<div class="wla-directory-fbt" data-filter="arbitration">Arbitration</div>
					<div class="wla-directory-fbt" data-filter="tax">Tax</div>
					<div class="wla-directory-fbt" data-filter="immigration">Immigration</div>
					<div class="wla-directory-fbt" data-filter="private">Private Clients</div>
					<span class="wla-directory-fb-count" id="wlaDirFirmCount">Showing <strong>12</strong> of 151 firms</span>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: DIRECTORY LAYOUT                                     -->
			<!-- ============================================================ -->
			<div class="wla-directory-main-layout">
				
				<!-- SIDEBAR -->
				<div class="wla-directory-sidebar">
					
					<!-- Accreditation Level -->
					<div class="wla-directory-sb-section">
						<div class="wla-directory-sb-title">ACCREDITATION LEVEL</div>
						<div class="wla-directory-tier-filter">
							<div class="wla-directory-tf-btn wla-directory-tf-btn--active" data-tier="ALL">ALL LEVELS</div>
							<div class="wla-directory-tf-btn wla-directory-tf-btn--anchor" data-tier="anchor">WLA ANCHOR</div>
							<div class="wla-directory-tf-btn" data-tier="distinguished">WLA DISTINGUISHED</div>
							<div class="wla-directory-tf-btn" data-tier="partner">WLA PARTNER</div>
						</div>
					</div>
					
					<!-- Region -->
					<div class="wla-directory-sb-section">
						<div class="wla-directory-sb-title">REGION</div>
						<div class="wla-directory-sb-option" data-region="EU">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Europe</span>
							<span class="wla-directory-sb-count">28</span>
						</div>
						<div class="wla-directory-sb-option" data-region="ME">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Middle East</span>
							<span class="wla-directory-sb-count">12</span>
						</div>
						<div class="wla-directory-sb-option" data-region="APAC">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Asia Pacific</span>
							<span class="wla-directory-sb-count">22</span>
						</div>
						<div class="wla-directory-sb-option" data-region="AF">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Africa</span>
							<span class="wla-directory-sb-count">14</span>
						</div>
						<div class="wla-directory-sb-option" data-region="AM">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Americas</span>
							<span class="wla-directory-sb-count">18</span>
						</div>
					</div>
					
					<!-- Practice Area -->
					<div class="wla-directory-sb-section">
						<div class="wla-directory-sb-title">PRACTICE AREA</div>
						<div class="wla-directory-sb-option" data-practice="ma">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Transactional &amp; M&amp;A</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="ip">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Intellectual Property</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="arbitration">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Disputes &amp; Arbitration</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="tax">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">International Tax</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="employment">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Employment &amp; Labour</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="immigration">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Immigration &amp; Mobility</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="private">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Private Clients &amp; HNW</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="technology">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Technology &amp; Data</span>
						</div>
						<div class="wla-directory-sb-option" data-practice="energy">
							<div class="wla-directory-sb-checkbox"></div>
							<span class="wla-directory-sb-label">Energy &amp; Infrastructure</span>
						</div>
					</div>
					
					<button class="wla-directory-clear-btn" id="wlaDirClearFilters">CLEAR ALL FILTERS</button>
				</div>

				<!-- FIRMS GRID -->
				<div class="wla-directory-firms-area">
					<div class="wla-directory-firms-header">
						<div class="wla-directory-fh-count" id="wlaDirGridCount">Showing <strong>12</strong> of 151 WLA-Qualified partner firms</div>
						<div class="wla-directory-fh-sort" id="wlaDirToggleSort">SORT: A–Z ↕</div>
					</div>
					<div class="wla-directory-firms-grid" id="wlaDirFirmsGrid"></div>
					<div class="wla-directory-pagination">
						<div class="wla-directory-pg-btn wla-directory-pg-btn--arrow">←</div>
						<div class="wla-directory-pg-btn wla-directory-pg-btn--active">1</div>
						<div class="wla-directory-pg-btn">2</div>
						<div class="wla-directory-pg-btn">3</div>
						<div class="wla-directory-pg-btn wla-directory-pg-btn--disabled">…</div>
						<div class="wla-directory-pg-btn">13</div>
						<div class="wla-directory-pg-btn wla-directory-pg-btn--arrow">→</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: MAP REGION EXPLORER                                  -->
			<!-- ============================================================ -->
			<div class="wla-directory-map-bg">
				<div class="wla-directory-map-inner">
					<div class="wla-directory-map-eyebrow">EXPLORE BY REGION</div>
					<div class="wla-directory-map-title">ONE ACCREDITED FIRM<br>PER JURISDICTION. EVERY REGION.</div>
					<div class="wla-directory-region-cards">
						<div class="wla-directory-rc wla-directory-rc--active" data-region="europe">
							<div class="wla-directory-rc-number">28</div>
							<div class="wla-directory-rc-name">EUROPE</div>
							<div class="wla-directory-rc-countries">United Kingdom · Germany · France · Poland · Netherlands · Spain · Portugal · Italy · Sweden · Switzerland · Belgium · Austria · Czech Republic · Romania · Hungary · Greece · Denmark · Finland · Norway · Ireland · Luxembourg · Slovakia · Croatia · Slovenia · Bulgaria · Estonia · Latvia · Lithuania</div>
						</div>
						<div class="wla-directory-rc" data-region="apac">
							<div class="wla-directory-rc-number">22</div>
							<div class="wla-directory-rc-name">ASIA PACIFIC</div>
							<div class="wla-directory-rc-countries">India · Singapore · Hong Kong · Japan · Australia · South Korea · Malaysia · Vietnam · Indonesia · Thailand · Philippines · New Zealand · Bangladesh · Sri Lanka · Myanmar · Cambodia · Taiwan · China · Pakistan · Nepal</div>
						</div>
						<div class="wla-directory-rc" data-region="africa-me">
							<div class="wla-directory-rc-number">16</div>
							<div class="wla-directory-rc-name">AFRICA + MIDDLE EAST</div>
							<div class="wla-directory-rc-countries">UAE · Saudi Arabia · Qatar · Bahrain · Kuwait · Oman · Kenya · Nigeria · South Africa · Ghana · Zambia · Tanzania · Morocco · Egypt · Ethiopia · Guinea · Mauritius</div>
						</div>
						<div class="wla-directory-rc" data-region="americas">
							<div class="wla-directory-rc-number">18</div>
							<div class="wla-directory-rc-name">AMERICAS</div>
							<div class="wla-directory-rc-countries">United States · Canada · Brazil · Mexico · Colombia · Argentina · Chile · Peru · Ecuador · Uruguay · Costa Rica · Panama · Jamaica · Bahamas · Trinidad · Honduras · Guatemala · Bolivia</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: APPLY STRIP                                          -->
			<!-- ============================================================ -->
			<div class="wla-directory-apply-strip">
				<div class="wla-directory-as-inner">
					<div class="wla-directory-as-title">IS YOUR JURISDICTION AVAILABLE? CHECK AND APPLY NOW.</div>
					<div class="wla-directory-as-buttons">
						<a href="wla-firms.html" class="wla-directory-btn-ink">CHECK AVAILABILITY + APPLY</a>
						<a href="wla-about.html" class="wla-directory-btn-bdr">LEARN ABOUT WLA FIRST</a>
					</div>
				</div>
			</div>

		</div>
		<!-- END WLA DIRECTORY PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * US to Europe Corridor Page Shortcode
	 *
	 * Displays the WLA US to Europe Corridor page including:
	 * - Hero with split background and corridor display
	 * - Both sides covered section
	 * - Key legal themes grid
	 * - Intelligence signals
	 * - Related corridors grid
	 * - CTA band
	 *
	 * Shortcode: [wla_corridor_us_europe]
	 *
	 * @return string
	 */
	public function wla_corridor_us_europe_shortcode() {

		ob_start();
		?>
		
		<!-- WLA US TO EUROPE CORRIDOR PAGE WRAPPER -->
		<div class="wla-corridor-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-corridor-hero">
				<div class="wla-corridor-hero-bg">
					<div class="wla-corridor-hero-bg-l"></div>
					<div class="wla-corridor-hero-bg-r"></div>
					<div class="wla-corridor-hero-div"></div>
				</div>
				<div class="wla-corridor-hero-content">
					<div class="wla-corridor-h-crumb">CORRIDORS › ACTIVE 2026 › US Europe Transatlantic M&A PE Competition</div>
					<div class="wla-corridor-display">
						<div class="wla-corridor-cd-from">US</div>
						<div class="wla-corridor-cd-arrow">→</div>
						<div class="wla-corridor-cd-to">EUROPE</div>
						<div class="wla-corridor-cd-growth">+18%</div>
					</div>
					<p class="wla-corridor-h-p">WLA co-practices the US to EUROPE corridor on both sides simultaneously. One brief activates the origination-side specialists and the destination-side execution team, jointly holding the matter under one Institutional framework from brief to close.</p>
					<div class="wla-corridor-h-btns">
						<a href="wla-specialist.html" class="wla-corridor-btn-white">BRIEF WLA — BOTH SIDES — 48H</a>
						<a href="#both-sides" class="wla-corridor-btn-ghost-white">BOTH SIDES COVERED</a>
					</div>
					<div class="wla-corridor-hero-stats">
						<div class="wla-corridor-hs">
							<div class="wla-corridor-hs-number">+18%</div>
							<div class="wla-corridor-hs-label">Growth Rate</div>
						</div>
						<div class="wla-corridor-hs">
							<div class="wla-corridor-hs-number">Both</div>
							<div class="wla-corridor-hs-label">Sides Co-Practiced</div>
						</div>
						<div class="wla-corridor-hs">
							<div class="wla-corridor-hs-number">PE Carve-out</div>
							<div class="wla-corridor-hs-label">Primary Driver</div>
						</div>
						<div class="wla-corridor-hs">
							<div class="wla-corridor-hs-number">Germany/Fr</div>
							<div class="wla-corridor-hs-label">Key Destination</div>
						</div>
						<div class="wla-corridor-hs">
							<div class="wla-corridor-hs-number">48H</div>
							<div class="wla-corridor-hs-label">Both Sides Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BOTH SIDES COVERED                                  -->
			<!-- ============================================================ -->
			<section class="wla-corridor-section wla-corridor-animate" id="both-sides">
				<div class="wla-corridor-container">
					<div class="wla-corridor-eyebrow">WLA CO-PRACTICES BOTH SIDES</div>
					<h2 class="wla-corridor-heading">ONE BRIEF.<br>BOTH JURISDICTIONS HELD.</h2>
					<p class="wla-corridor-subheading">
						The defining WLA advantage: partner firms on both sides jointly hold the matter simultaneously — aligned strategy from day one, no handoff gap, no information asymmetry between sides.
					</p>
					
					<div class="wla-corridor-both-sides">
						<div class="wla-corridor-bs">
							<div class="wla-corridor-bs-label">
								<div class="wla-corridor-bs-dot"></div>
								ORIGINATION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-bs-country">US</div>
							<p class="wla-corridor-bs-desc">WLA US partner firms managing the US origination of transatlantic transactions — US PE carve-outs, US strategic acquisitions of European companies, CFIUS on inbound European investment, and US securities law.</p>
							<div class="wla-corridor-bs-tags">
								<span class="wla-corridor-bst">New York</span>
								<span class="wla-corridor-bst">Delaware</span>
								<span class="wla-corridor-bst">CFIUS</span>
								<span class="wla-corridor-bst">SEC</span>
								<span class="wla-corridor-bst">US PE Firms</span>
							</div>
							<a href="wla-specialist.html" class="wla-corridor-bs-link">FIND ORIGINATION SPECIALIST →</a>
							<div class="wla-corridor-bs-bg">US</div>
						</div>
						<div class="wla-corridor-bs">
							<div class="wla-corridor-bs-label">
								<div class="wla-corridor-bs-dot"></div>
								EXECUTION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-bs-country">EUROPE</div>
							<p class="wla-corridor-bs-desc">WLA European partner firms across Germany, France, UK, Netherlands, Sweden, Poland, and Spain managing the European execution including EU merger control filings, Works Council consultation, and FDI screening.</p>
							<div class="wla-corridor-bs-tags">
								<span class="wla-corridor-bst">Germany</span>
								<span class="wla-corridor-bst">France</span>
								<span class="wla-corridor-bst">UK</span>
								<span class="wla-corridor-bst">Netherlands</span>
								<span class="wla-corridor-bst">Sweden</span>
								<span class="wla-corridor-bst">+20 more</span>
							</div>
							<a href="wla-specialist.html" class="wla-corridor-bs-link">FIND EXECUTION SPECIALIST →</a>
							<div class="wla-corridor-bs-bg">EUROPE</div>
						</div>
					</div>
					
					<div class="wla-corridor-badge">
						<div>
							<div class="wla-corridor-wb-title">WLA HOLDS BOTH SIDES OF THE US TO EUROPE CORRIDOR SIMULTANEOUSLY</div>
							<div class="wla-corridor-wb-sub">One brief. Both sides activated. Brief to close under one Institutional framework.</div>
						</div>
						<div class="wla-corridor-wb-badge">BOTH SIDES</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY LEGAL THEMES                                    -->
			<!-- ============================================================ -->
			<div class="wla-corridor-themes-bg">
				<section class="wla-corridor-section wla-corridor-animate">
					<div class="wla-corridor-container">
						<div class="wla-corridor-eyebrow">KEY LEGAL THEMES — US TO EUROPE</div>
						<h2 class="wla-corridor-heading">THREE THEMES DRIVING<br>THIS CORRIDOR IN 2026.</h2>
						
						<div class="wla-corridor-themes-grid">
							<div class="wla-corridor-tg">
								<div class="wla-corridor-tg-number">DOMINANT</div>
								<div class="wla-corridor-tg-title">PE CARVE-OUTS</div>
								<p class="wla-corridor-tg-desc">US private equity carving out European divisions of US multinationals — the highest-volume transaction type on this corridor. Requires simultaneous US and European legal execution across employment, IP, tax, and competition.</p>
							</div>
							<div class="wla-corridor-tg">
								<div class="wla-corridor-tg-number">GROWING</div>
								<div class="wla-corridor-tg-title">EU FOREIGN SUBSIDIES REGULATION</div>
								<p class="wla-corridor-tg-desc">US companies with EU subsidies now face FSR notification obligations on M&A above EU thresholds. WLA co-practices the FSR filing in Brussels alongside the US deal execution.</p>
							</div>
							<div class="wla-corridor-tg">
								<div class="wla-corridor-tg-number">EMERGING</div>
								<div class="wla-corridor-tg-title">EU AI ACT AND US TECHNOLOGY M&A</div>
								<p class="wla-corridor-tg-desc">US technology acquisitions of European AI and data companies triggering EU AI Act compliance alongside US deal execution. WLA co-practices the US M&A and EU AI Act compliance simultaneously.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                -->
			<!-- ============================================================ -->
			<div class="wla-corridor-intel-bg">
				<section class="wla-corridor-section wla-corridor-section--dark wla-corridor-animate">
					<div class="wla-corridor-container">
						<div class="wla-corridor-eyebrow-dark">WLA INTELLIGENCE — US TO EUROPE SIGNALS</div>
						<h2 class="wla-corridor-heading-dark">WHAT IS MOVING ON<br>THIS CORRIDOR RIGHT NOW.</h2>
						
						<div class="wla-corridor-intel-rows">
							<div class="wla-corridor-ir wla-corridor-ir--header">
								<div class="wla-corridor-ir-th">JURISDICTION</div>
								<div class="wla-corridor-ir-th">SIGNAL</div>
								<div class="wla-corridor-ir-th" style="text-align:right">INDEX</div>
							</div>
							<div class="wla-corridor-ir">
								<div class="wla-corridor-ir-jur">EU</div>
								<div class="wla-corridor-ir-text">EU Foreign Subsidies Regulation — Phase II investigations increasing for US companies with EU subsidies. Mandatory notification on qualifying M&A transactions.</div>
								<div class="wla-corridor-ir-growth">Active</div>
							</div>
							<div class="wla-corridor-ir">
								<div class="wla-corridor-ir-jur">US/CFIUS</div>
								<div class="wla-corridor-ir-text">CFIUS Enhanced Review for European Technology — EU-US technology transactions increasingly subject to CFIUS review, particularly in AI, semiconductor, and quantum computing sectors.</div>
								<div class="wla-corridor-ir-growth">Active</div>
							</div>
							<div class="wla-corridor-ir">
								<div class="wla-corridor-ir-jur">GERMANY</div>
								<div class="wla-corridor-ir-text">BMWK FDI Screening Tightened — US acquisitions of German technology and critical infrastructure companies facing enhanced review. Strategic sector list expanded in 2025.</div>
								<div class="wla-corridor-ir-growth">+18%</div>
							</div>
						</div>
						
						<div class="wla-corridor-intel-footer">
							<a href="wla-intelligence.html" class="wla-corridor-btn-white-intel">FULL CORRIDOR INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED CORRIDORS                                   -->
			<!-- ============================================================ -->
			<section class="wla-corridor-section wla-corridor-section--related wla-corridor-animate">
				<div class="wla-corridor-container">
					<div class="wla-corridor-eyebrow">ALL ACTIVE WLA CORRIDORS</div>
					<h2 class="wla-corridor-heading">EVERY CORRIDOR. BOTH SIDES.</h2>
					
					<div class="wla-corridor-rel-grid">
						<a href="wla-corridor-gulf-cee.html" class="wla-corridor-rel-card">
							<div class="wla-corridor-rc-route">GULF TO CEE</div>
							<div class="wla-corridor-rc-growth">+38%</div>
							<div class="wla-corridor-rc-desc">GCC Capital into Central Europe</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-corridor-rel-card">
							<div class="wla-corridor-rc-route">EU TO INDIA</div>
							<div class="wla-corridor-rc-growth">+34%</div>
							<div class="wla-corridor-rc-desc">Trade Technology FTA</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-corridor-rel-card">
							<div class="wla-corridor-rc-route">GCC TO SE ASIA</div>
							<div class="wla-corridor-rc-growth">+31%</div>
							<div class="wla-corridor-rc-desc">Gulf Capital into ASEAN</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-corridor-rel-card">
							<div class="wla-corridor-rc-route">UK TO AFRICA</div>
							<div class="wla-corridor-rc-growth">+22%</div>
							<div class="wla-corridor-rc-desc">Critical Minerals BII</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-corridor-rel-card">
							<div class="wla-corridor-rc-route">APAC AMERICAS</div>
							<div class="wla-corridor-rc-growth">+19%</div>
							<div class="wla-corridor-rc-desc">Pacific Rim Tech</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-corridor-cta-band">
				<div class="wla-corridor-cta-title">BRIEF WLA ON YOUR US TO EUROPE MATTER. BOTH SIDES. 48 HOURS.</div>
				<div class="wla-corridor-cta-buttons">
					<a href="wla-specialist.html" class="wla-corridor-btn-white">BRIEF WLA BOTH SIDES</a>
					<a href="wla-how-it-works.html" class="wla-corridor-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA US TO EUROPE CORRIDOR PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA UK to Africa Corridor Page Shortcode
	 *
	 * Displays the WLA UK to Africa Corridor page including:
	 * - Hero with split background and corridor display
	 * - Both sides coverage (UK and Africa)
	 * - Key legal themes (Critical Minerals, BII, Infrastructure)
	 * - Intelligence signals
	 * - Related corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_corridor_uk_africa]
	 *
	 * @return string
	 */
	public function wla_corridor_uk_africa_shortcode() {

		ob_start();
		?>
		
		<!-- WLA UK TO AFRICA CORRIDOR WRAPPER -->
		<div class="wla-corridor-ukafrica-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-corridor-ukafrica-hero">
				<div class="wla-corridor-ukafrica-hero-bg">
					<div class="wla-corridor-ukafrica-hero-bg-left"></div>
					<div class="wla-corridor-ukafrica-hero-bg-right"></div>
					<div class="wla-corridor-ukafrica-hero-divider"></div>
				</div>
				<div class="wla-corridor-ukafrica-hero-content">
					<div class="wla-corridor-ukafrica-hero-crumb">CORRIDORS › ACTIVE 2026 › UK to Africa Critical Minerals BII Common Law</div>
					<div class="wla-corridor-ukafrica-corridor-display">
						<div class="wla-corridor-ukafrica-cd-from">UK</div>
						<div class="wla-corridor-ukafrica-cd-arrow">→</div>
						<div class="wla-corridor-ukafrica-cd-to">AFRICA</div>
						<div class="wla-corridor-ukafrica-cd-growth">+22%</div>
					</div>
					<p class="wla-corridor-ukafrica-hero-desc">WLA co-practices the UK to AFRICA corridor on both sides simultaneously. One brief activates the origination-side specialists and the destination-side execution team, jointly holding the matter under one Institutional framework from brief to close.</p>
					<div class="wla-corridor-ukafrica-hero-buttons">
						<a href="wla-specialist.html" class="wla-corridor-ukafrica-btn-white">BRIEF WLA — BOTH SIDES — 48H</a>
						<a href="#both-sides" class="wla-corridor-ukafrica-btn-ghost-white">BOTH SIDES COVERED</a>
					</div>
					<div class="wla-corridor-ukafrica-hero-stats">
						<div class="wla-corridor-ukafrica-hs">
							<div class="wla-corridor-ukafrica-hs-number">+22%</div>
							<div class="wla-corridor-ukafrica-hs-label">Growth Rate</div>
						</div>
						<div class="wla-corridor-ukafrica-hs">
							<div class="wla-corridor-ukafrica-hs-number">Both</div>
							<div class="wla-corridor-ukafrica-hs-label">Sides Co-Practiced</div>
						</div>
						<div class="wla-corridor-ukafrica-hs">
							<div class="wla-corridor-ukafrica-hs-number">Critical Min</div>
							<div class="wla-corridor-ukafrica-hs-label">Primary Driver</div>
						</div>
						<div class="wla-corridor-ukafrica-hs">
							<div class="wla-corridor-ukafrica-hs-number">Kenya/Zamb</div>
							<div class="wla-corridor-ukafrica-hs-label">Key Destination</div>
						</div>
						<div class="wla-corridor-ukafrica-hs">
							<div class="wla-corridor-ukafrica-hs-number">48H</div>
							<div class="wla-corridor-ukafrica-hs-label">Both Sides Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BOTH SIDES                                           -->
			<!-- ============================================================ -->
			<section class="wla-corridor-ukafrica-section wla-corridor-ukafrica-animate" id="both-sides">
				<div class="wla-corridor-ukafrica-container">
					<div class="wla-corridor-ukafrica-eyebrow">WLA CO-PRACTICES BOTH SIDES</div>
					<h2 class="wla-corridor-ukafrica-heading">ONE BRIEF.<br>BOTH JURISDICTIONS HELD.</h2>
					<p class="wla-corridor-ukafrica-subtext">The defining WLA advantage: partner firms on both sides jointly hold the matter simultaneously — aligned strategy from day one, no handoff gap, no information asymmetry between sides.</p>
					
					<div class="wla-corridor-ukafrica-both-sides">
						
						<!-- UK Side -->
						<div class="wla-corridor-ukafrica-bs">
							<div class="wla-corridor-ukafrica-bs-label">
								<div class="wla-corridor-ukafrica-bs-dot"></div>
								ORIGINATION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-ukafrica-bs-country">UK</div>
							<p class="wla-corridor-ukafrica-bs-desc">WLA UK partner firms managing the origination of UK private and development capital into Africa, including BII-backed transactions, UKEF structures, and UK company law aspects of African investment vehicles.</p>
							<div class="wla-corridor-ukafrica-bs-tags">
								<span class="wla-corridor-ukafrica-bst">London</span>
								<span class="wla-corridor-ukafrica-bst">BII</span>
								<span class="wla-corridor-ukafrica-bst">UKEF</span>
								<span class="wla-corridor-ukafrica-bst">English Law</span>
							</div>
							<a href="wla-specialist.html" class="wla-corridor-ukafrica-bs-link">FIND ORIGINATION SPECIALIST →</a>
							<div class="wla-corridor-ukafrica-bs-bg">UK</div>
						</div>
						
						<!-- Africa Side -->
						<div class="wla-corridor-ukafrica-bs">
							<div class="wla-corridor-ukafrica-bs-label">
								<div class="wla-corridor-ukafrica-bs-dot"></div>
								EXECUTION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-ukafrica-bs-country">AFRICA</div>
							<p class="wla-corridor-ukafrica-bs-desc">WLA Africa partner firms across Kenya, Zambia, Nigeria, Tanzania, Ghana, South Africa, and Mauritius managing the full African law execution, regulatory approvals, and local partnership structures.</p>
							<div class="wla-corridor-ukafrica-bs-tags">
								<span class="wla-corridor-ukafrica-bst">Kenya</span>
								<span class="wla-corridor-ukafrica-bst">Zambia</span>
								<span class="wla-corridor-ukafrica-bst">Nigeria</span>
								<span class="wla-corridor-ukafrica-bst">Ghana</span>
								<span class="wla-corridor-ukafrica-bst">South Africa</span>
							</div>
							<a href="wla-specialist.html" class="wla-corridor-ukafrica-bs-link">FIND EXECUTION SPECIALIST →</a>
							<div class="wla-corridor-ukafrica-bs-bg">AFRICA</div>
						</div>
						
					</div>
					
					<div class="wla-corridor-ukafrica-badge">
						<div>
							<div class="wla-corridor-ukafrica-badge-title">WLA HOLDS BOTH SIDES OF THE UK TO AFRICA CORRIDOR SIMULTANEOUSLY</div>
							<div class="wla-corridor-ukafrica-badge-sub">One brief. Both sides activated. Brief to close under one Institutional framework.</div>
						</div>
						<div class="wla-corridor-ukafrica-badge-tag">BOTH SIDES</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY LEGAL THEMES                                     -->
			<!-- ============================================================ -->
			<div class="wla-corridor-ukafrica-themes-bg">
				<section class="wla-corridor-ukafrica-section wla-corridor-ukafrica-animate">
					<div class="wla-corridor-ukafrica-container">
						<div class="wla-corridor-ukafrica-eyebrow">KEY LEGAL THEMES — UK TO AFRICA</div>
						<h2 class="wla-corridor-ukafrica-heading">THREE THEMES DRIVING<br>THIS CORRIDOR IN 2026.</h2>
						
						<div class="wla-corridor-ukafrica-themes-grid">
							<!-- Theme 01: Critical Minerals -->
							<div class="wla-corridor-ukafrica-tg">
								<div class="wla-corridor-ukafrica-tg-number">DOMINANT</div>
								<div class="wla-corridor-ukafrica-tg-title">CRITICAL MINERALS</div>
								<p class="wla-corridor-ukafrica-tg-desc">UK private capital and development finance into African critical minerals — lithium, cobalt, copper, and rare earth extraction. English law mining contracts under local mining frameworks.</p>
							</div>
							
							<!-- Theme 02: BII and Development Finance -->
							<div class="wla-corridor-ukafrica-tg">
								<div class="wla-corridor-ukafrica-tg-number">GROWING</div>
								<div class="wla-corridor-ukafrica-tg-title">BII AND DEVELOPMENT FINANCE</div>
								<p class="wla-corridor-ukafrica-tg-desc">British International Investment deploying GBP 7.5B across sub-Saharan Africa. WLA UK coordinates origination and WLA Africa co-practices the on-the-ground execution.</p>
							</div>
							
							<!-- Theme 03: Infrastructure and Energy -->
							<div class="wla-corridor-ukafrica-tg">
								<div class="wla-corridor-ukafrica-tg-number">EMERGING</div>
								<div class="wla-corridor-ukafrica-tg-title">INFRASTRUCTURE AND ENERGY</div>
								<p class="wla-corridor-ukafrica-tg-desc">UK project finance into African renewable energy and infrastructure. Kenya wind and solar. Nigerian gas-to-power. South African offshore wind. WLA co-practices both sides.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                 -->
			<!-- ============================================================ -->
			<div class="wla-corridor-ukafrica-intel-bg">
				<section class="wla-corridor-ukafrica-section wla-corridor-ukafrica-section--dark wla-corridor-ukafrica-animate">
					<div class="wla-corridor-ukafrica-container">
						<div class="wla-corridor-ukafrica-eyebrow-dark">WLA INTELLIGENCE — UK TO AFRICA SIGNALS</div>
						<h2 class="wla-corridor-ukafrica-heading-dark">WHAT IS MOVING ON<br>THIS CORRIDOR RIGHT NOW.</h2>
						
						<div class="wla-corridor-ukafrica-intel-rows">
							<!-- Header -->
							<div class="wla-corridor-ukafrica-ir wla-corridor-ukafrica-ir--header">
								<div class="wla-corridor-ukafrica-ir-th">JURISDICTION</div>
								<div class="wla-corridor-ukafrica-ir-th">SIGNAL</div>
								<div class="wla-corridor-ukafrica-ir-th" style="text-align:right">INDEX</div>
							</div>
							
							<!-- Signal 01: Zambia -->
							<div class="wla-corridor-ukafrica-ir">
								<div class="wla-corridor-ukafrica-ir-jur">ZAMBIA</div>
								<div class="wla-corridor-ukafrica-ir-text">Critical Minerals Framework Update — New mining regulations for critical minerals export. Significant for UK investors in Zambian copper and cobalt mining.</div>
								<div class="wla-corridor-ukafrica-ir-growth">+28%</div>
							</div>
							
							<!-- Signal 02: UK/BII -->
							<div class="wla-corridor-ukafrica-ir">
								<div class="wla-corridor-ukafrica-ir-jur">UK/BII</div>
								<div class="wla-corridor-ukafrica-ir-text">BII Portfolio Africa Expansion accelerating Sub-Saharan Africa commitments. Kenya, Nigeria, and South Africa primary targets.</div>
								<div class="wla-corridor-ukafrica-ir-growth">+22%</div>
							</div>
							
							<!-- Signal 03: Kenya -->
							<div class="wla-corridor-ukafrica-ir">
								<div class="wla-corridor-ukafrica-ir-jur">KENYA</div>
								<div class="wla-corridor-ukafrica-ir-text">Kenya Energy Transition — Record renewable energy FDI from UK. Geothermal, wind, and solar pipeline growing. New regulatory fast-track for clean energy approvals.</div>
								<div class="wla-corridor-ukafrica-ir-growth">Active</div>
							</div>
						</div>
						
						<div class="wla-corridor-ukafrica-intel-footer">
							<a href="wla-intelligence.html" class="wla-corridor-ukafrica-btn-white-dark">FULL CORRIDOR INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED CORRIDORS                                    -->
			<!-- ============================================================ -->
			<section class="wla-corridor-ukafrica-section wla-corridor-ukafrica-section--related wla-corridor-ukafrica-animate">
				<div class="wla-corridor-ukafrica-container">
					<div class="wla-corridor-ukafrica-eyebrow">ALL ACTIVE WLA CORRIDORS</div>
					<h2 class="wla-corridor-ukafrica-heading">EVERY CORRIDOR. BOTH SIDES.</h2>
					
					<div class="wla-corridor-ukafrica-rel-grid">
						<a href="wla-corridor-gulf-cee.html" class="wla-corridor-ukafrica-rel-card">
							<div class="wla-corridor-ukafrica-rc-route">GULF TO CEE</div>
							<div class="wla-corridor-ukafrica-rc-growth">+38%</div>
							<div class="wla-corridor-ukafrica-rc-desc">GCC Capital into Central Europe</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-corridor-ukafrica-rel-card">
							<div class="wla-corridor-ukafrica-rc-route">EU TO INDIA</div>
							<div class="wla-corridor-ukafrica-rc-growth">+34%</div>
							<div class="wla-corridor-ukafrica-rc-desc">Trade Technology FTA</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-corridor-ukafrica-rel-card">
							<div class="wla-corridor-ukafrica-rc-route">GCC TO SE ASIA</div>
							<div class="wla-corridor-ukafrica-rc-growth">+31%</div>
							<div class="wla-corridor-ukafrica-rc-desc">Gulf Capital into ASEAN</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-corridor-ukafrica-rel-card">
							<div class="wla-corridor-ukafrica-rc-route">UK TO AFRICA</div>
							<div class="wla-corridor-ukafrica-rc-growth">+22%</div>
							<div class="wla-corridor-ukafrica-rc-desc">Critical Minerals BII</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-corridor-ukafrica-rel-card">
							<div class="wla-corridor-ukafrica-rc-route">APAC AMERICAS</div>
							<div class="wla-corridor-ukafrica-rc-growth">+19%</div>
							<div class="wla-corridor-ukafrica-rc-desc">Pacific Rim Tech</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-corridor-ukafrica-cta-band">
				<div class="wla-corridor-ukafrica-cta-title">BRIEF WLA ON YOUR UK TO AFRICA MATTER. BOTH SIDES. 48 HOURS.</div>
				<div class="wla-corridor-ukafrica-cta-buttons">
					<a href="wla-specialist.html" class="wla-corridor-ukafrica-btn-white">BRIEF WLA BOTH SIDES</a>
					<a href="wla-how-it-works.html" class="wla-corridor-ukafrica-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA UK TO AFRICA CORRIDOR WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Corridors Landing Page Shortcode
	 *
	 * Displays the WLA Corridors landing page including:
	 * - Hero section
	 * - Priority corridors table (6 corridors)
	 * - Founding Corridor Leadership section
	 * - CTA band
	 *
	 * Shortcode: [wla_corridors_page]
	 *
	 * @return string
	 */
	public function wla_corridors_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA CORRIDORS LANDING PAGE WRAPPER -->
		<div class="wla-corridors-lp-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-corridors-lp-hero">
				<div class="wla-corridors-lp-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=2000&q=90')"></div>
				<div class="wla-corridors-lp-hero-overlay"></div>
				<div class="wla-corridors-lp-hero-content">
					<div class="wla-corridors-lp-h-eye">WLA GLOBAL CORRIDORS™ · BOTH SIDES · CO-PRACTICED</div>
					<h1 class="wla-corridors-lp-h-title">GLOBAL<br>CORRIDORS™</h1>
					<p class="wla-corridors-lp-h-sub">WLA identifies, develops, and co-practices the world's most significant cross-border legal corridors. One firm per side. Both sides held simultaneously.</p>
					<div class="wla-corridors-lp-h-btns">
						<a href="wla-global-corridors-v4.html" class="wla-corridors-lp-btn-white">FOUNDING CORRIDOR LEADERSHIP</a>
						<a href="wla-specialist.html" class="wla-corridors-lp-btn-ghost-white">BRIEF WLA ON A CORRIDOR MATTER</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: PRIORITY CORRIDORS                                  -->
			<!-- ============================================================ -->
			<section class="wla-corridors-lp-section">
				<div class="wla-corridors-lp-container">
					<div class="wla-corridors-lp-header">
						<div>
							<div class="wla-corridors-lp-eyebrow wla-corridors-lp-animate">PRIORITY CORRIDORS · 2026</div>
							<h2 class="wla-corridors-lp-heading wla-corridors-lp-animate">THE SIX CORRIDORS<br>WLA IS BUILDING FIRST.</h2>
						</div>
						<p class="wla-corridors-lp-body wla-corridors-lp-animate" style="max-width:280px">WLA co-practices on both sides of every corridor simultaneously. One brief. Both sides. From the first day.</p>
					</div>
					
					<div class="wla-corridors-lp-animate">
						<div class="wla-corridors-lp-table-header">
							<div></div>
							<div class="wla-corridors-lp-th">CORRIDOR</div>
							<div class="wla-corridors-lp-th">SOURCE</div>
							<div class="wla-corridors-lp-th">DESTINATION</div>
							<div class="wla-corridors-lp-th">GROWTH</div>
						</div>
						
						<!-- Corridor 01: Gulf → CEE -->
						<a href="wla-corridor-gulf-cee.html" class="wla-corridors-lp-row">
							<div class="wla-corridors-lp-row-number">01</div>
							<div>
								<div class="wla-corridors-lp-row-title">GULF → CENTRAL &amp; EASTERN EUROPE</div>
								<div class="wla-corridors-lp-row-sub">Gulf sovereign and family capital · Real assets · Manufacturing</div>
							</div>
							<div class="wla-corridors-lp-row-source">UAE · Saudi Arabia · Qatar</div>
							<div class="wla-corridors-lp-row-dest">Poland · Czech Republic · Romania</div>
							<div class="wla-corridors-lp-row-growth wla-corridors-lp-row-growth--green">+38%</div>
						</a>
						
						<!-- Corridor 02: EU → India -->
						<a href="wla-corridor-eu-india.html" class="wla-corridors-lp-row">
							<div class="wla-corridors-lp-row-number">02</div>
							<div>
								<div class="wla-corridors-lp-row-title">EU → INDIA</div>
								<div class="wla-corridors-lp-row-sub">FTA negotiations · Technology M&A · Manufacturing · FDI</div>
							</div>
							<div class="wla-corridors-lp-row-source">Germany · France · Netherlands</div>
							<div class="wla-corridors-lp-row-dest">India · New Delhi</div>
							<div class="wla-corridors-lp-row-growth wla-corridors-lp-row-growth--green">+34%</div>
						</a>
						
						<!-- Corridor 03: GCC → SE Asia -->
						<a href="wla-corridor-gcc-seasia.html" class="wla-corridors-lp-row">
							<div class="wla-corridors-lp-row-number">03</div>
							<div>
								<div class="wla-corridors-lp-row-title">GCC → SOUTH EAST ASIA</div>
								<div class="wla-corridors-lp-row-sub">Gulf sovereign capital into ASEAN economies</div>
							</div>
							<div class="wla-corridors-lp-row-source">UAE · Saudi Arabia</div>
							<div class="wla-corridors-lp-row-dest">Singapore · Indonesia · Malaysia</div>
							<div class="wla-corridors-lp-row-growth wla-corridors-lp-row-growth--green">+31%</div>
						</a>
						
						<!-- Corridor 04: UK → Africa -->
						<a href="wla-corridor-uk-africa.html" class="wla-corridors-lp-row">
							<div class="wla-corridors-lp-row-number">04</div>
							<div>
								<div class="wla-corridors-lp-row-title">UK → AFRICA</div>
								<div class="wla-corridors-lp-row-sub">Critical minerals · BII · Common law advantage</div>
							</div>
							<div class="wla-corridors-lp-row-source">United Kingdom</div>
							<div class="wla-corridors-lp-row-dest">Kenya · Zambia · Nigeria · Ghana</div>
							<div class="wla-corridors-lp-row-growth wla-corridors-lp-row-growth--muted">+22%</div>
						</a>
						
						<!-- Corridor 05: APAC ↔ Americas -->
						<a href="wla-corridor-apac-americas.html" class="wla-corridors-lp-row">
							<div class="wla-corridors-lp-row-number">05</div>
							<div>
								<div class="wla-corridors-lp-row-title">APAC ↔ AMERICAS</div>
								<div class="wla-corridors-lp-row-sub">Pacific Rim technology and resources flows</div>
							</div>
							<div class="wla-corridors-lp-row-source">Japan · South Korea · Singapore</div>
							<div class="wla-corridors-lp-row-dest">United States · Brazil</div>
							<div class="wla-corridors-lp-row-growth wla-corridors-lp-row-growth--muted">+19%</div>
						</a>
						
						<!-- Corridor 06: US ↔ Europe -->
						<a href="wla-corridor-us-europe.html" class="wla-corridors-lp-row">
							<div class="wla-corridors-lp-row-number">06</div>
							<div>
								<div class="wla-corridors-lp-row-title">US ↔ EUROPE</div>
								<div class="wla-corridors-lp-row-sub">PE carve-outs · M&A · FSR · AI regulation · IP</div>
							</div>
							<div class="wla-corridors-lp-row-source">New York · Boston</div>
							<div class="wla-corridors-lp-row-dest">Germany · UK · France · Netherlands</div>
							<div class="wla-corridors-lp-row-growth wla-corridors-lp-row-growth--muted">+18%</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: FOUNDING CORRIDOR LEADERSHIP                       -->
			<!-- ============================================================ -->
			<section class="wla-corridors-lp-section wla-corridors-lp-section--dark">
				<div class="wla-corridors-lp-container">
					<div class="wla-corridors-lp-leadership-grid">
						<div class="wla-corridors-lp-leadership-left">
							<div class="wla-corridors-lp-eyebrow-dark wla-corridors-lp-animate">FOUNDING CORRIDOR LEADERSHIP</div>
							<div class="wla-corridors-lp-heading-dark wla-corridors-lp-animate" style="margin-bottom:22px">ONE FIRM PER SIDE.<br>BOTH SIDES HELD.<br>12 POSITIONS TOTAL.</div>
							<p class="wla-corridors-lp-leadership-desc wla-corridors-lp-animate">WLA designates one Founding Corridor Lead per side on each active corridor. Exclusive. Performance-linked. Reviewed annually. The most senior designation in the WLA framework.</p>
							<div class="wla-corridors-lp-leadership-btns wla-corridors-lp-animate">
								<a href="wla-global-corridors-v4.html" class="wla-corridors-lp-btn-white">READ THE PUBLICATION</a>
								<a href="wla-page-apply.html" class="wla-corridors-lp-btn-ghost-white">APPLY NOW</a>
							</div>
						</div>
						<div class="wla-corridors-lp-leadership-stats wla-corridors-lp-animate">
							<div class="wla-corridors-lp-ls-item">
								<div class="wla-corridors-lp-ls-number">6</div>
								<div class="wla-corridors-lp-ls-label">Active Corridors</div>
							</div>
							<div class="wla-corridors-lp-ls-item">
								<div class="wla-corridors-lp-ls-number">12</div>
								<div class="wla-corridors-lp-ls-label">Lead Positions</div>
							</div>
							<div class="wla-corridors-lp-ls-item">
								<div class="wla-corridors-lp-ls-number">1</div>
								<div class="wla-corridors-lp-ls-label">Firm Per Side</div>
							</div>
							<div class="wla-corridors-lp-ls-item">
								<div class="wla-corridors-lp-ls-number wla-corridors-lp-ls-number--green">40+</div>
								<div class="wla-corridors-lp-ls-label">Corridors Identified</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-corridors-lp-cta-band wla-corridors-lp-animate">
				<div class="wla-corridors-lp-cta-title">BRIEF WLA ON YOUR<br>CORRIDOR MATTER.</div>
				<div class="wla-corridors-lp-cta-buttons">
					<a href="wla-specialist.html" class="wla-corridors-lp-btn-white">FIND A SPECIALIST — 48H</a>
					<a href="wla-global-corridors-v4.html" class="wla-corridors-lp-btn-ghost-white" style="color:rgba(255,255,255,0.7);border-color:rgba(255,255,255,0.2)">GLOBAL CORRIDORS™</a>
				</div>
			</div>

		</div>
		<!-- END WLA CORRIDORS LANDING PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * GCC to SE Asia Corridor Page Shortcode
	 *
	 * Displays the WLA GCC to SE Asia Corridor page including:
	 * - Hero with split background and corridor display
	 * - Both sides covered section
	 * - Key legal themes grid
	 * - Intelligence signals
	 * - Related corridors grid
	 * - CTA band
	 *
	 * Shortcode: [wla_corridor_gcc_seasia]
	 *
	 * @return string
	 */
	public function wla_corridor_gcc_seasia_shortcode() {

		ob_start();
		?>
		
		<!-- WLA GCC TO SE ASIA CORRIDOR PAGE WRAPPER -->
		<div class="wla-gcc-seasia-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-gcc-seasia-hero">
				<div class="wla-gcc-seasia-hero-bg">
					<div class="wla-gcc-seasia-hero-bg-l"></div>
					<div class="wla-gcc-seasia-hero-bg-r"></div>
					<div class="wla-gcc-seasia-hero-div"></div>
				</div>
				<div class="wla-gcc-seasia-hero-content">
					<div class="wla-gcc-seasia-h-crumb">CORRIDORS › ACTIVE 2026 › GCC to SE Asia Gulf Capital into ASEAN</div>
					<div class="wla-gcc-seasia-corridor-display">
						<div class="wla-gcc-seasia-cd-from">GCC</div>
						<div class="wla-gcc-seasia-cd-arrow">→</div>
						<div class="wla-gcc-seasia-cd-to">SE ASIA</div>
						<div class="wla-gcc-seasia-cd-growth">+31%</div>
					</div>
					<p class="wla-gcc-seasia-h-p">WLA co-practices the GCC to SE ASIA corridor on both sides simultaneously. One brief activates the origination-side specialists and the destination-side execution team, jointly holding the matter under one Institutional framework from brief to close.</p>
					<div class="wla-gcc-seasia-h-btns">
						<a href="wla-specialist.html" class="wla-gcc-seasia-btn-white">BRIEF WLA — BOTH SIDES — 48H</a>
						<a href="#both-sides" class="wla-gcc-seasia-btn-ghost-white">BOTH SIDES COVERED</a>
					</div>
					<div class="wla-gcc-seasia-hero-stats">
						<div class="wla-gcc-seasia-hs">
							<div class="wla-gcc-seasia-hs-number">+31%</div>
							<div class="wla-gcc-seasia-hs-label">Growth Rate</div>
						</div>
						<div class="wla-gcc-seasia-hs">
							<div class="wla-gcc-seasia-hs-number">Both</div>
							<div class="wla-gcc-seasia-hs-label">Sides Co-Practiced</div>
						</div>
						<div class="wla-gcc-seasia-hs">
							<div class="wla-gcc-seasia-hs-number">Infrastructure</div>
							<div class="wla-gcc-seasia-hs-label">Primary Driver</div>
						</div>
						<div class="wla-gcc-seasia-hs">
							<div class="wla-gcc-seasia-hs-number">Singapore</div>
							<div class="wla-gcc-seasia-hs-label">Key Destination</div>
						</div>
						<div class="wla-gcc-seasia-hs">
							<div class="wla-gcc-seasia-hs-number">48H</div>
							<div class="wla-gcc-seasia-hs-label">Both Sides Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BOTH SIDES COVERED                                  -->
			<!-- ============================================================ -->
			<section class="wla-gcc-seasia-section wla-gcc-seasia-animate" id="both-sides">
				<div class="wla-gcc-seasia-container">
					<div class="wla-gcc-seasia-eyebrow">WLA CO-PRACTICES BOTH SIDES</div>
					<h2 class="wla-gcc-seasia-heading">ONE BRIEF.<br>BOTH JURISDICTIONS HELD.</h2>
					<p class="wla-gcc-seasia-subheading">
						The defining WLA advantage: partner firms on both sides jointly hold the matter simultaneously — aligned strategy from day one, no handoff gap, no information asymmetry between sides.
					</p>
					
					<div class="wla-gcc-seasia-both-sides">
						<div class="wla-gcc-seasia-bs">
							<div class="wla-gcc-seasia-bs-label">
								<div class="wla-gcc-seasia-bs-dot"></div>
								ORIGINATION SIDE — WLA ACTIVE
							</div>
							<div class="wla-gcc-seasia-bs-country">GCC</div>
							<p class="wla-gcc-seasia-bs-desc">WLA GCC partner firms across UAE, Saudi Arabia, Qatar, and Kuwait managing the outbound structuring of Gulf sovereign and family capital into ASEAN, including DIFC and ADGM holding structures.</p>
							<div class="wla-gcc-seasia-bs-tags">
								<span class="wla-gcc-seasia-bst">UAE</span>
								<span class="wla-gcc-seasia-bst">Saudi Arabia</span>
								<span class="wla-gcc-seasia-bst">Qatar</span>
								<span class="wla-gcc-seasia-bst">Kuwait</span>
								<span class="wla-gcc-seasia-bst">DIFC</span>
							</div>
							<a href="wla-specialist.html" class="wla-gcc-seasia-bs-link">FIND ORIGINATION SPECIALIST →</a>
							<div class="wla-gcc-seasia-bs-bg">GCC</div>
						</div>
						<div class="wla-gcc-seasia-bs">
							<div class="wla-gcc-seasia-bs-label">
								<div class="wla-gcc-seasia-bs-dot"></div>
								EXECUTION SIDE — WLA ACTIVE
							</div>
							<div class="wla-gcc-seasia-bs-country">SE ASIA</div>
							<p class="wla-gcc-seasia-bs-desc">WLA Singapore as the ASEAN gateway with partner firm connections across Indonesia, Malaysia, Vietnam, and Thailand — managing destination-side execution and MAS compliance.</p>
							<div class="wla-gcc-seasia-bs-tags">
								<span class="wla-gcc-seasia-bst">Singapore</span>
								<span class="wla-gcc-seasia-bst">Indonesia</span>
								<span class="wla-gcc-seasia-bst">Malaysia</span>
								<span class="wla-gcc-seasia-bst">Vietnam</span>
								<span class="wla-gcc-seasia-bst">Thailand</span>
							</div>
							<a href="wla-specialist.html" class="wla-gcc-seasia-bs-link">FIND EXECUTION SPECIALIST →</a>
							<div class="wla-gcc-seasia-bs-bg">SE ASIA</div>
						</div>
					</div>
					
					<div class="wla-gcc-seasia-badge">
						<div>
							<div class="wla-gcc-seasia-wb-title">WLA HOLDS BOTH SIDES OF THE GCC TO SE ASIA CORRIDOR SIMULTANEOUSLY</div>
							<div class="wla-gcc-seasia-wb-sub">One brief. Both sides activated. Brief to close under one Institutional framework.</div>
						</div>
						<div class="wla-gcc-seasia-wb-badge">BOTH SIDES</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY LEGAL THEMES                                    -->
			<!-- ============================================================ -->
			<div class="wla-gcc-seasia-themes-bg">
				<section class="wla-gcc-seasia-section wla-gcc-seasia-animate">
					<div class="wla-gcc-seasia-container">
						<div class="wla-gcc-seasia-eyebrow">KEY LEGAL THEMES — GCC TO SE ASIA</div>
						<h2 class="wla-gcc-seasia-heading">THREE THEMES DRIVING<br>THIS CORRIDOR IN 2026.</h2>
						
						<div class="wla-gcc-seasia-themes-grid">
							<div class="wla-gcc-seasia-tg">
								<div class="wla-gcc-seasia-tg-number">DOMINANT</div>
								<div class="wla-gcc-seasia-tg-title">INFRASTRUCTURE AND REAL ASSETS</div>
								<p class="wla-gcc-seasia-tg-desc">Gulf sovereign funds deploying into ASEAN infrastructure — ports, logistics, data centres, and renewable energy. Singapore as regional HQ structure for Gulf-ASEAN investment vehicles.</p>
							</div>
							<div class="wla-gcc-seasia-tg">
								<div class="wla-gcc-seasia-tg-number">GROWING</div>
								<div class="wla-gcc-seasia-tg-title">REAL ESTATE AND HOSPITALITY</div>
								<p class="wla-gcc-seasia-tg-desc">Gulf HNWI and family capital into ASEAN real estate — Singapore prime residential, Bali developments, Bangkok commercial. WLA co-practices both origination and local law execution.</p>
							</div>
							<div class="wla-gcc-seasia-tg">
								<div class="wla-gcc-seasia-tg-number">EMERGING</div>
								<div class="wla-gcc-seasia-tg-title">TECHNOLOGY AND DIGITAL ECONOMY</div>
								<p class="wla-gcc-seasia-tg-desc">Gulf tech investors backing ASEAN technology scale-ups. Singapore as deal hub for Gulf-backed ASEAN tech investment leveraging common law framework.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                -->
			<!-- ============================================================ -->
			<div class="wla-gcc-seasia-intel-bg">
				<section class="wla-gcc-seasia-section wla-gcc-seasia-section--dark wla-gcc-seasia-animate">
					<div class="wla-gcc-seasia-container">
						<div class="wla-gcc-seasia-eyebrow-dark">WLA INTELLIGENCE — GCC TO SE ASIA SIGNALS</div>
						<h2 class="wla-gcc-seasia-heading-dark">WHAT IS MOVING ON<br>THIS CORRIDOR RIGHT NOW.</h2>
						
						<div class="wla-gcc-seasia-intel-rows">
							<div class="wla-gcc-seasia-ir wla-gcc-seasia-ir--header">
								<div class="wla-gcc-seasia-ir-th">JURISDICTION</div>
								<div class="wla-gcc-seasia-ir-th">SIGNAL</div>
								<div class="wla-gcc-seasia-ir-th" style="text-align:right">INDEX</div>
							</div>
							<div class="wla-gcc-seasia-ir">
								<div class="wla-gcc-seasia-ir-jur">SINGAPORE</div>
								<div class="wla-gcc-seasia-ir-text">MAS Digital Asset Framework expanding licensing for digital payment tokens. Significant for Gulf investors seeking regulated digital asset exposure in ASEAN.</div>
								<div class="wla-gcc-seasia-ir-growth">+22%</div>
							</div>
							<div class="wla-gcc-seasia-ir">
								<div class="wla-gcc-seasia-ir-jur">UAE</div>
								<div class="wla-gcc-seasia-ir-text">UAE-Singapore CEPA enhanced bilateral framework accelerating investment flows. Financial services and technology most active sectors.</div>
								<div class="wla-gcc-seasia-ir-growth">+31%</div>
							</div>
							<div class="wla-gcc-seasia-ir">
								<div class="wla-gcc-seasia-ir-jur">INDONESIA</div>
								<div class="wla-gcc-seasia-ir-text">Indonesia FDI Opening under Omnibus Law — New sectors opened to foreign investment. Gulf capital into Indonesian infrastructure and consumer sectors growing rapidly.</div>
								<div class="wla-gcc-seasia-ir-growth">Active</div>
							</div>
						</div>
						
						<div class="wla-gcc-seasia-intel-footer">
							<a href="wla-intelligence.html" class="wla-gcc-seasia-btn-white-intel">FULL CORRIDOR INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED CORRIDORS                                   -->
			<!-- ============================================================ -->
			<section class="wla-gcc-seasia-section wla-gcc-seasia-section--related wla-gcc-seasia-animate">
				<div class="wla-gcc-seasia-container">
					<div class="wla-gcc-seasia-eyebrow">ALL ACTIVE WLA CORRIDORS</div>
					<h2 class="wla-gcc-seasia-heading">EVERY CORRIDOR. BOTH SIDES.</h2>
					
					<div class="wla-gcc-seasia-rel-grid">
						<a href="wla-corridor-gulf-cee.html" class="wla-gcc-seasia-rel-card">
							<div class="wla-gcc-seasia-rc-route">GULF TO CEE</div>
							<div class="wla-gcc-seasia-rc-growth">+38%</div>
							<div class="wla-gcc-seasia-rc-desc">GCC Capital into Central Europe</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-gcc-seasia-rel-card">
							<div class="wla-gcc-seasia-rc-route">EU TO INDIA</div>
							<div class="wla-gcc-seasia-rc-growth">+34%</div>
							<div class="wla-gcc-seasia-rc-desc">Trade Technology FTA</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-gcc-seasia-rel-card">
							<div class="wla-gcc-seasia-rc-route">GCC TO SE ASIA</div>
							<div class="wla-gcc-seasia-rc-growth">+31%</div>
							<div class="wla-gcc-seasia-rc-desc">Gulf Capital into ASEAN</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-gcc-seasia-rel-card">
							<div class="wla-gcc-seasia-rc-route">UK TO AFRICA</div>
							<div class="wla-gcc-seasia-rc-growth">+22%</div>
							<div class="wla-gcc-seasia-rc-desc">Critical Minerals BII</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-gcc-seasia-rel-card">
							<div class="wla-gcc-seasia-rc-route">APAC AMERICAS</div>
							<div class="wla-gcc-seasia-rc-growth">+19%</div>
							<div class="wla-gcc-seasia-rc-desc">Pacific Rim Tech</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-gcc-seasia-cta-band">
				<div class="wla-gcc-seasia-cta-title">BRIEF WLA ON YOUR GCC TO SE ASIA MATTER. BOTH SIDES. 48 HOURS.</div>
				<div class="wla-gcc-seasia-cta-buttons">
					<a href="wla-specialist.html" class="wla-gcc-seasia-btn-white">BRIEF WLA BOTH SIDES</a>
					<a href="wla-how-it-works.html" class="wla-gcc-seasia-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA GCC TO SE ASIA CORRIDOR PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA Gulf to CEE Corridor Page Shortcode
	 *
	 * Displays the WLA Gulf to CEE Corridor page including:
	 * - Hero with split background and corridor display
	 * - Both sides coverage (GCC and CEE)
	 * - Deal flow data grid
	 * - Sector activity rows
	 * - Practice coverage table
	 * - Intelligence signals
	 * - Related corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_corridor_gulf_cee]
	 *
	 * @return string
	 */
	public function wla_corridor_gulf_cee_shortcode() {

		ob_start();
		?>
		
		<!-- WLA GULF TO CEE CORRIDOR WRAPPER -->
		<div class="wla-corridor-gulfcee-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-corridor-gulfcee-hero">
				<div class="wla-corridor-gulfcee-hero-bg">
					<div class="wla-corridor-gulfcee-hero-bg-left"></div>
					<div class="wla-corridor-gulfcee-hero-bg-right"></div>
					<div class="wla-corridor-gulfcee-hero-divider"></div>
				</div>
				<div class="wla-corridor-gulfcee-hero-content">
					<div class="wla-corridor-gulfcee-hero-crumb">
						CORRIDORS <span>›</span> ACTIVE 2026
					</div>
					<div class="wla-corridor-gulfcee-corridor-display">
						<div class="wla-corridor-gulfcee-cd-from">GULF</div>
						<div class="wla-corridor-gulfcee-cd-arrow">→</div>
						<div class="wla-corridor-gulfcee-cd-to">CEE</div>
						<div class="wla-corridor-gulfcee-cd-growth">+38%</div>
					</div>
					<p class="wla-corridor-gulfcee-hero-desc">The Gulf to Central &amp; Eastern Europe corridor is WLA's fastest-growing active deal corridor — driven by Gulf sovereign and family capital deploying into CEE real estate, infrastructure, manufacturing, and technology. WLA co-practices both sides simultaneously: the Gulf origination and the CEE execution. One brief. Both jurisdictions held.</p>
					<div class="wla-corridor-gulfcee-hero-buttons">
						<a href="wla-specialist.html" class="wla-corridor-gulfcee-btn-white">BRIEF WLA ON THIS CORRIDOR — 48H</a>
						<a href="#both-sides" class="wla-corridor-gulfcee-btn-ghost-white">BOTH SIDES COVERED</a>
						<a href="#dealflow" class="wla-corridor-gulfcee-btn-ghost-white">DEAL FLOW DATA</a>
					</div>
					<div class="wla-corridor-gulfcee-hero-stats">
						<div class="wla-corridor-gulfcee-hs">
							<div class="wla-corridor-gulfcee-hs-number">+38%</div>
							<div class="wla-corridor-gulfcee-hs-label">Growth 2025–26</div>
						</div>
						<div class="wla-corridor-gulfcee-hs">
							<div class="wla-corridor-gulfcee-hs-number">Both</div>
							<div class="wla-corridor-gulfcee-hs-label">Sides Co-Practiced</div>
						</div>
						<div class="wla-corridor-gulfcee-hs">
							<div class="wla-corridor-gulfcee-hs-number">GCC</div>
							<div class="wla-corridor-gulfcee-hs-label">6 Gulf States Active</div>
						</div>
						<div class="wla-corridor-gulfcee-hs">
							<div class="wla-corridor-gulfcee-hs-number">CEE</div>
							<div class="wla-corridor-gulfcee-hs-label">12 CEE Jurisdictions</div>
						</div>
						<div class="wla-corridor-gulfcee-hs">
							<div class="wla-corridor-gulfcee-hs-number">48H</div>
							<div class="wla-corridor-gulfcee-hs-label">Both Sides Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BOTH SIDES                                           -->
			<!-- ============================================================ -->
			<section class="wla-corridor-gulfcee-section wla-corridor-gulfcee-animate" id="both-sides">
				<div class="wla-corridor-gulfcee-container">
					<div class="wla-corridor-gulfcee-eyebrow">THE WLA CORRIDOR ADVANTAGE</div>
					<h2 class="wla-corridor-gulfcee-heading">WLA HOLDS BOTH SIDES.<br>ONE BRIEF COVERS BOTH JURISDICTIONS.</h2>
					<p class="wla-corridor-gulfcee-subtext">Most referral networks can introduce you to a local lawyer on the other side. WLA co-practices both sides simultaneously — the Gulf origination team and the CEE execution team jointly hold your matter under one Institutional framework, aligned from day one.</p>
					
					<div class="wla-corridor-gulfcee-both-sides">
						
						<!-- GCC Side -->
						<div class="wla-corridor-gulfcee-bs">
							<div class="wla-corridor-gulfcee-bs-label">
								<div class="wla-corridor-gulfcee-bs-dot"></div>
								ORIGINATION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-gulfcee-bs-country">GULF COOPERATION COUNCIL</div>
							<p class="wla-corridor-gulfcee-bs-desc">WLA partner firms across all six GCC states — UAE, Saudi Arabia, Qatar, Kuwait, Bahrain, Oman — originating Gulf capital and managing the outbound investment structuring, FDI compliance, and investor-side documentation on every Gulf→CEE transaction.</p>
							<div class="wla-corridor-gulfcee-bs-practices">
								<span class="wla-corridor-gulfcee-bp">UAE</span>
								<span class="wla-corridor-gulfcee-bp">Saudi Arabia</span>
								<span class="wla-corridor-gulfcee-bp">Qatar</span>
								<span class="wla-corridor-gulfcee-bp">Kuwait</span>
								<span class="wla-corridor-gulfcee-bp">Bahrain</span>
								<span class="wla-corridor-gulfcee-bp">Oman</span>
							</div>
							<a href="wla-jurisdiction-uae.html" class="wla-corridor-gulfcee-bs-link">VIEW WLA UAE →</a>
							<div class="wla-corridor-gulfcee-bs-bg">GCC</div>
						</div>
						
						<!-- CEE Side -->
						<div class="wla-corridor-gulfcee-bs">
							<div class="wla-corridor-gulfcee-bs-label">
								<div class="wla-corridor-gulfcee-bs-dot"></div>
								EXECUTION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-gulfcee-bs-country">CENTRAL &amp; EASTERN EUROPE</div>
							<p class="wla-corridor-gulfcee-bs-desc">WLA partner firms across 12 CEE jurisdictions — Poland, Czech Republic, Romania, Hungary, Bulgaria, Slovakia, Croatia, Slovenia, Estonia, Latvia, Lithuania, and Austria — managing the target-side legal execution, regulatory approvals, and FDI screening on Gulf-originated transactions.</p>
							<div class="wla-corridor-gulfcee-bs-practices">
								<span class="wla-corridor-gulfcee-bp">Poland</span>
								<span class="wla-corridor-gulfcee-bp">Czech Republic</span>
								<span class="wla-corridor-gulfcee-bp">Romania</span>
								<span class="wla-corridor-gulfcee-bp">Hungary</span>
								<span class="wla-corridor-gulfcee-bp">Austria</span>
								<span class="wla-corridor-gulfcee-bp">+7 more</span>
							</div>
							<a href="wla-corridors.html" class="wla-corridor-gulfcee-bs-link">VIEW ALL CEE JURISDICTIONS →</a>
							<div class="wla-corridor-gulfcee-bs-bg">CEE</div>
						</div>
						
					</div>
					
					<div class="wla-corridor-gulfcee-badge">
						<div>
							<div class="wla-corridor-gulfcee-badge-title">WLA CO-PRACTICES BOTH SIDES OF THIS CORRIDOR SIMULTANEOUSLY</div>
							<div class="wla-corridor-gulfcee-badge-sub">One brief to WLA Central Command activates the full team on both sides — Gulf origination + CEE execution — jointly holding the matter under one Institutional framework.</div>
						</div>
						<div class="wla-corridor-gulfcee-badge-tag">✓ BOTH SIDES HELD</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: DEAL FLOW DATA                                       -->
			<!-- ============================================================ -->
			<div class="wla-corridor-gulfcee-dealflow-bg">
				<section class="wla-corridor-gulfcee-section wla-corridor-gulfcee-animate" id="dealflow">
					<div class="wla-corridor-gulfcee-container">
						<div class="wla-corridor-gulfcee-eyebrow">CORRIDOR DEAL FLOW — GULF → CEE 2025–26</div>
						<h2 class="wla-corridor-gulfcee-heading">THE NUMBERS BEHIND<br>THE WORLD'S FASTEST-GROWING CORRIDOR.</h2>
						
						<div class="wla-corridor-gulfcee-df-grid">
							<div class="wla-corridor-gulfcee-dfc">
								<div class="wla-corridor-gulfcee-dfc-number">GROWTH RATE</div>
								<div class="wla-corridor-gulfcee-dfc-value">+38%</div>
								<div class="wla-corridor-gulfcee-dfc-label">Year-on-Year</div>
								<p class="wla-corridor-gulfcee-dfc-note">Fastest-growing WLA corridor in 2026. Gulf capital allocation into CEE accelerating post-2024.</p>
							</div>
							<div class="wla-corridor-gulfcee-dfc">
								<div class="wla-corridor-gulfcee-dfc-number">PRIMARY DRIVER</div>
								<div class="wla-corridor-gulfcee-dfc-value">Real Estate</div>
								<div class="wla-corridor-gulfcee-dfc-label">+ Manufacturing</div>
								<p class="wla-corridor-gulfcee-dfc-note">CEE real estate and logistics infrastructure dominating Gulf outbound. Manufacturing second.</p>
							</div>
							<div class="wla-corridor-gulfcee-dfc">
								<div class="wla-corridor-gulfcee-dfc-number">LEADING SOURCE</div>
								<div class="wla-corridor-gulfcee-dfc-value">UAE</div>
								<div class="wla-corridor-gulfcee-dfc-label">+ Saudi Arabia</div>
								<p class="wla-corridor-gulfcee-dfc-note">UAE sovereign and family capital leading. Saudi Arabia accelerating under Vision 2030 Phase 2.</p>
							</div>
							<div class="wla-corridor-gulfcee-dfc">
								<div class="wla-corridor-gulfcee-dfc-number">LEADING TARGET</div>
								<div class="wla-corridor-gulfcee-dfc-value">Poland</div>
								<div class="wla-corridor-gulfcee-dfc-label">+ Czech Republic</div>
								<p class="wla-corridor-gulfcee-dfc-note">Poland the top CEE destination for Gulf capital. Czech Republic second. Romania growing fast.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: SECTOR ACTIVITY                                      -->
			<!-- ============================================================ -->
			<div class="wla-corridor-gulfcee-sector-bg">
				<section class="wla-corridor-gulfcee-section wla-corridor-gulfcee-section--dark wla-corridor-gulfcee-animate">
					<div class="wla-corridor-gulfcee-container">
						<div class="wla-corridor-gulfcee-eyebrow-dark">CORRIDOR SECTOR ACTIVITY — 2026</div>
						<h2 class="wla-corridor-gulfcee-heading-dark">WHERE THE GULF → CEE<br>DEAL FLOW IS CONCENTRATED.</h2>
						
						<div class="wla-corridor-gulfcee-sector-rows">
							<!-- Header -->
							<div class="wla-corridor-gulfcee-sr wla-corridor-gulfcee-sr--header">
								<div class="wla-corridor-gulfcee-sr-th">SECTOR</div>
								<div class="wla-corridor-gulfcee-sr-th">DEAL TYPE / DRIVER</div>
								<div class="wla-corridor-gulfcee-sr-th" style="text-align:right">ACTIVITY</div>
							</div>
							
							<!-- Real Estate & Logistics -->
							<div class="wla-corridor-gulfcee-sr">
								<div>
									<div class="wla-corridor-gulfcee-sr-sector">REAL ESTATE &amp; LOGISTICS</div>
									<div class="wla-corridor-gulfcee-sr-sub">Gulf Capital → CEE Logistics Parks · Warsaw · Prague · Bucharest</div>
								</div>
								<div class="wla-corridor-gulfcee-sr-desc">Gulf sovereign and HNWI capital acquiring CEE logistics hubs, warehouse parks, and prime residential. Warsaw and Prague remain primary targets. Bucharest emerging.</div>
								<div class="wla-corridor-gulfcee-sr-growth">↑ DOMINANT</div>
							</div>
							
							<!-- Manufacturing & Industry -->
							<div class="wla-corridor-gulfcee-sr">
								<div>
									<div class="wla-corridor-gulfcee-sr-sector">MANUFACTURING &amp; INDUSTRY</div>
									<div class="wla-corridor-gulfcee-sr-sub">GCC FDI → Polish &amp; Czech Manufacturing</div>
								</div>
								<div class="wla-corridor-gulfcee-sr-desc">Gulf energy companies and industrial groups acquiring CEE manufacturing capacity as part of economic diversification. Poland's automotive and engineering sectors most active.</div>
								<div class="wla-corridor-gulfcee-sr-growth">↑ +42%</div>
							</div>
							
							<!-- Technology M&A -->
							<div class="wla-corridor-gulfcee-sr">
								<div>
									<div class="wla-corridor-gulfcee-sr-sector">TECHNOLOGY M&amp;A</div>
									<div class="wla-corridor-gulfcee-sr-sub">Gulf Tech Investors → CEE Scale-ups</div>
								</div>
								<div class="wla-corridor-gulfcee-sr-desc">Gulf sovereign and family tech investors acquiring and backing CEE technology companies — particularly Polish, Czech, and Romanian scale-ups with EU market access.</div>
								<div class="wla-corridor-gulfcee-sr-growth">↑ +31%</div>
							</div>
							
							<!-- Infrastructure & Energy -->
							<div class="wla-corridor-gulfcee-sr">
								<div>
									<div class="wla-corridor-gulfcee-sr-sector">INFRASTRUCTURE &amp; ENERGY</div>
									<div class="wla-corridor-gulfcee-sr-sub">Gulf Project Finance → CEE Renewables</div>
								</div>
								<div class="wla-corridor-gulfcee-sr-desc">Gulf project finance into CEE renewable energy — wind, solar, and hydrogen. Poland and Romania most active. Czech Republic energy transition accelerating.</div>
								<div class="wla-corridor-gulfcee-sr-growth wla-corridor-gulfcee-sr-growth--active">Growing</div>
							</div>
							
							<!-- Hospitality & Retail -->
							<div class="wla-corridor-gulfcee-sr">
								<div>
									<div class="wla-corridor-gulfcee-sr-sector">HOSPITALITY &amp; RETAIL</div>
									<div class="wla-corridor-gulfcee-sr-sub">GCC Hotel Groups → Central Europe</div>
								</div>
								<div class="wla-corridor-gulfcee-sr-desc">Gulf hotel groups and retail conglomerates acquiring and developing prime hospitality assets in Warsaw, Prague, Budapest, and Vienna.</div>
								<div class="wla-corridor-gulfcee-sr-growth wla-corridor-gulfcee-sr-growth--active">Active</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: PRACTICE COVERAGE                                    -->
			<!-- ============================================================ -->
			<section class="wla-corridor-gulfcee-section wla-corridor-gulfcee-section--coverage wla-corridor-gulfcee-animate">
				<div class="wla-corridor-gulfcee-container">
					<div class="wla-corridor-gulfcee-eyebrow">WLA PRACTICE COVERAGE — GULF → CEE</div>
					<h2 class="wla-corridor-gulfcee-heading">EVERY LEGAL DIMENSION<br>OF THIS CORRIDOR. BOTH SIDES.</h2>
					
					<table class="wla-corridor-gulfcee-cov-table">
						<thead>
							<tr>
								<th>PRACTICE</th>
								<th>GULF SIDE — WLA ACTIVE</th>
								<th>CEE SIDE — WLA ACTIVE</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><div class="wla-corridor-gulfcee-ct-practice">M&amp;A &amp; CORPORATE</div></td>
								<td class="wla-corridor-gulfcee-ct-side">Investor structuring, FATA compliance, UAE company law, Saudi Vision 2030 FDI frameworks</td>
								<td class="wla-corridor-gulfcee-ct-side">Target-side acquisition, FDI screening (Poland, Germany, Czech), EU merger control filing</td>
							</tr>
							<tr>
								<td><div class="wla-corridor-gulfcee-ct-practice">REAL ESTATE</div></td>
								<td class="wla-corridor-gulfcee-ct-side">Outbound real estate investment structuring, Gulf holding company design, Islamic finance structures</td>
								<td class="wla-corridor-gulfcee-ct-side">Polish and Czech real estate acquisition, planning, title due diligence, strata and leasing</td>
							</tr>
							<tr>
								<td><div class="wla-corridor-gulfcee-ct-practice">PROJECT FINANCE</div></td>
								<td class="wla-corridor-gulfcee-ct-side">Gulf development finance, Islamic project finance structures, MISA approvals</td>
								<td class="wla-corridor-gulfcee-ct-side">CEE infrastructure project financing, regulatory approvals, offtake agreements</td>
							</tr>
							<tr>
								<td><div class="wla-corridor-gulfcee-ct-practice">TAX STRUCTURING</div></td>
								<td class="wla-corridor-gulfcee-ct-side">UAE CIT 9%, zero-tax Gulf holding structures, outbound investment tax planning</td>
								<td class="wla-corridor-gulfcee-ct-side">Polish CIT, Czech tax, EU Pillar Two compliance, transfer pricing on intra-group flows</td>
							</tr>
							<tr>
								<td><div class="wla-corridor-gulfcee-ct-practice">EMPLOYMENT &amp; MOBILITY</div></td>
								<td class="wla-corridor-gulfcee-ct-side">Gulf executive mobility, Golden Visa for CEE-based executives relocating to Gulf</td>
								<td class="wla-corridor-gulfcee-ct-side">Works Council consultation (Poland), employee transfer on M&amp;A, TUPE equivalents across CEE</td>
							</tr>
							<tr>
								<td><div class="wla-corridor-gulfcee-ct-practice">ARBITRATION</div></td>
								<td class="wla-corridor-gulfcee-ct-side">DIFC-LCIA and DIAC arbitration for disputes on Gulf-originated CEE transactions</td>
								<td class="wla-corridor-gulfcee-ct-side">Vienna VIAC, Warsaw arbitration, enforcement of awards in CEE jurisdictions</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                 -->
			<!-- ============================================================ -->
			<div class="wla-corridor-gulfcee-intel-bg">
				<section class="wla-corridor-gulfcee-section wla-corridor-gulfcee-animate">
					<div class="wla-corridor-gulfcee-container">
						<div class="wla-corridor-gulfcee-eyebrow">WLA INTELLIGENCE — GULF → CEE SIGNALS</div>
						<h2 class="wla-corridor-gulfcee-heading">WHAT'S MOVING ON<br>THIS CORRIDOR RIGHT NOW.</h2>
						
						<table class="wla-corridor-gulfcee-signal-table">
							<thead>
								<tr>
									<th>JURISDICTION / AREA</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-corridor-gulfcee-st-jur">UAE</div>
										<div class="wla-corridor-gulfcee-st-area">FDI / FATA</div>
									</td>
									<td class="wla-corridor-gulfcee-st-signal"><strong>FATA Positive List Update 2026</strong> — New sectors opened to 100% Gulf foreign ownership in key CEE destination countries. Significant for structuring outbound Gulf M&amp;A into manufacturing and logistics in Poland and Czech Republic.</td>
									<td class="wla-corridor-gulfcee-st-idx">+38%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-corridor-gulfcee-st-jur">POLAND</div>
										<div class="wla-corridor-gulfcee-st-area">FDI SCREENING</div>
									</td>
									<td class="wla-corridor-gulfcee-st-signal"><strong>Polish FDI Screening Extension</strong> — Poland expanding FDI screening to cover real estate transactions above €10M involving non-EU investors. Significant for Gulf real estate acquisitions in Warsaw.</td>
									<td class="wla-corridor-gulfcee-st-idx">+22%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-corridor-gulfcee-st-jur">SAUDI ARABIA</div>
										<div class="wla-corridor-gulfcee-st-area">VISION 2030 / MISA</div>
									</td>
									<td class="wla-corridor-gulfcee-st-signal"><strong>MISA 30-Day Fast-Track Operational</strong> — Saudi MISA fast-track approval for inbound investment now operational. Accelerating two-way Gulf↔CEE investment flows significantly.</td>
									<td class="wla-corridor-gulfcee-st-idx">+31%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-corridor-gulfcee-st-jur">CZECH REPUBLIC</div>
										<div class="wla-corridor-gulfcee-st-area">M&amp;A / COMPETITION</div>
									</td>
									<td class="wla-corridor-gulfcee-st-signal"><strong>UOHS Merger Control Thresholds</strong> — Czech competition authority raised notification thresholds for 2026. Impact on Gulf acquisitions of Czech mid-market manufacturing companies.</td>
									<td class="wla-corridor-gulfcee-st-idx">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-corridor-gulfcee-st-jur">EU / CEE</div>
										<div class="wla-corridor-gulfcee-st-area">ENERGY</div>
									</td>
									<td class="wla-corridor-gulfcee-st-signal"><strong>EU Net Zero Industry Act — CEE Renewables</strong> — CEE member states accelerating renewable energy approvals under NZIA. Record Gulf capital deploying into Polish and Romanian wind and solar.</td>
									<td class="wla-corridor-gulfcee-st-idx">+41%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED CORRIDORS                                    -->
			<!-- ============================================================ -->
			<section class="wla-corridor-gulfcee-section wla-corridor-gulfcee-section--related wla-corridor-gulfcee-animate">
				<div class="wla-corridor-gulfcee-container">
					<div class="wla-corridor-gulfcee-eyebrow">OTHER ACTIVE WLA CORRIDORS</div>
					<h2 class="wla-corridor-gulfcee-heading">ALL SIX CORRIDORS.<br>BOTH SIDES. CO-PRACTICED.</h2>
					
					<div class="wla-corridor-gulfcee-rel-grid">
						<a href="wla-corridor-eu-india.html" class="wla-corridor-gulfcee-rel-card">
							<div class="wla-corridor-gulfcee-rc-route">EU → INDIA</div>
							<div class="wla-corridor-gulfcee-rc-growth">+34%</div>
							<div class="wla-corridor-gulfcee-rc-desc">Technology M&amp;A · FTA · Investment</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-corridor-gulfcee-rel-card">
							<div class="wla-corridor-gulfcee-rc-route">GCC → SE ASIA</div>
							<div class="wla-corridor-gulfcee-rc-growth">+31%</div>
							<div class="wla-corridor-gulfcee-rc-desc">Gulf capital into ASEAN</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-corridor-gulfcee-rel-card">
							<div class="wla-corridor-gulfcee-rc-route">UK → AFRICA</div>
							<div class="wla-corridor-gulfcee-rc-growth">+22%</div>
							<div class="wla-corridor-gulfcee-rc-desc">Critical minerals · BII · Common law</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-corridor-gulfcee-rel-card">
							<div class="wla-corridor-gulfcee-rc-route">APAC ↔ AMERICAS</div>
							<div class="wla-corridor-gulfcee-rc-growth">+19%</div>
							<div class="wla-corridor-gulfcee-rc-desc">Pacific Rim · Tech · CFIUS</div>
						</a>
						<a href="wla-corridor-us-europe.html" class="wla-corridor-gulfcee-rel-card">
							<div class="wla-corridor-gulfcee-rc-route">US ↔ EUROPE</div>
							<div class="wla-corridor-gulfcee-rc-growth">+18%</div>
							<div class="wla-corridor-gulfcee-rc-desc">Transatlantic · PE Carve-outs</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-corridor-gulfcee-cta-band">
				<div class="wla-corridor-gulfcee-cta-title">BRIEF WLA ON YOUR GULF → CEE MATTER. BOTH SIDES COVERED. 48 HOURS.</div>
				<div class="wla-corridor-gulfcee-cta-buttons">
					<a href="wla-specialist.html" class="wla-corridor-gulfcee-btn-white">BRIEF WLA — BOTH SIDES</a>
					<a href="wla-how-it-works.html" class="wla-corridor-gulfcee-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA GULF TO CEE CORRIDOR WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * EU to India Corridor Page Shortcode
	 *
	 * Displays the WLA EU to India Corridor page including:
	 * - Hero with split background and corridor display
	 * - Both sides covered section
	 * - Key legal themes grid
	 * - Intelligence signals
	 * - Related corridors grid
	 * - CTA band
	 *
	 * Shortcode: [wla_corridor_eu_india]
	 *
	 * @return string
	 */
	public function wla_corridor_eu_india_shortcode() {

		ob_start();
		?>
		
		<!-- WLA EU TO INDIA CORRIDOR PAGE WRAPPER -->
		<div class="wla-eu-india-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-eu-india-hero">
				<div class="wla-eu-india-hero-bg">
					<div class="wla-eu-india-hero-bg-l"></div>
					<div class="wla-eu-india-hero-bg-r"></div>
					<div class="wla-eu-india-hero-div"></div>
				</div>
				<div class="wla-eu-india-hero-content">
					<div class="wla-eu-india-h-crumb">CORRIDORS › ACTIVE 2026 › EU to India Trade Technology Investment</div>
					<div class="wla-eu-india-corridor-display">
						<div class="wla-eu-india-cd-from">EU</div>
						<div class="wla-eu-india-cd-arrow">→</div>
						<div class="wla-eu-india-cd-to">INDIA</div>
						<div class="wla-eu-india-cd-growth">+34%</div>
					</div>
					<p class="wla-eu-india-h-p">WLA co-practices the EU to INDIA corridor on both sides simultaneously. One brief activates the origination-side specialists and the destination-side execution team, jointly holding the matter under one Institutional framework from brief to close.</p>
					<div class="wla-eu-india-h-btns">
						<a href="wla-specialist.html" class="wla-eu-india-btn-white">BRIEF WLA — BOTH SIDES — 48H</a>
						<a href="#both-sides" class="wla-eu-india-btn-ghost-white">BOTH SIDES COVERED</a>
					</div>
					<div class="wla-eu-india-hero-stats">
						<div class="wla-eu-india-hs">
							<div class="wla-eu-india-hs-number">+34%</div>
							<div class="wla-eu-india-hs-label">Growth Rate</div>
						</div>
						<div class="wla-eu-india-hs">
							<div class="wla-eu-india-hs-number">Both</div>
							<div class="wla-eu-india-hs-label">Sides Co-Practiced</div>
						</div>
						<div class="wla-eu-india-hs">
							<div class="wla-eu-india-hs-number">Technology</div>
							<div class="wla-eu-india-hs-label">Primary Driver</div>
						</div>
						<div class="wla-eu-india-hs">
							<div class="wla-eu-india-hs-number">India</div>
							<div class="wla-eu-india-hs-label">Key Destination</div>
						</div>
						<div class="wla-eu-india-hs">
							<div class="wla-eu-india-hs-number">48H</div>
							<div class="wla-eu-india-hs-label">Both Sides Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BOTH SIDES COVERED                                  -->
			<!-- ============================================================ -->
			<section class="wla-eu-india-section wla-eu-india-animate" id="both-sides">
				<div class="wla-eu-india-container">
					<div class="wla-eu-india-eyebrow">WLA CO-PRACTICES BOTH SIDES</div>
					<h2 class="wla-eu-india-heading">ONE BRIEF.<br>BOTH JURISDICTIONS HELD.</h2>
					<p class="wla-eu-india-subheading">
						The defining WLA advantage: partner firms on both sides jointly hold the matter simultaneously — aligned strategy from day one, no handoff gap, no information asymmetry between sides.
					</p>
					
					<div class="wla-eu-india-both-sides">
						<div class="wla-eu-india-bs">
							<div class="wla-eu-india-bs-label">
								<div class="wla-eu-india-bs-dot"></div>
								ORIGINATION SIDE — WLA ACTIVE
							</div>
							<div class="wla-eu-india-bs-country">EU</div>
							<p class="wla-eu-india-bs-desc">WLA partner firms across all 27 EU member states managing the outbound investment structuring, FEMA compliance, EU merger control filings, and IP licensing aspects of EU-origin deals targeting India.</p>
							<div class="wla-eu-india-bs-tags">
								<span class="wla-eu-india-bst">Germany</span>
								<span class="wla-eu-india-bst">France</span>
								<span class="wla-eu-india-bst">Netherlands</span>
								<span class="wla-eu-india-bst">UK</span>
								<span class="wla-eu-india-bst">+22 more</span>
							</div>
							<a href="wla-specialist.html" class="wla-eu-india-bs-link">FIND ORIGINATION SPECIALIST →</a>
							<div class="wla-eu-india-bs-bg">EU</div>
						</div>
						<div class="wla-eu-india-bs">
							<div class="wla-eu-india-bs-label">
								<div class="wla-eu-india-bs-dot"></div>
								EXECUTION SIDE — WLA ACTIVE
							</div>
							<div class="wla-eu-india-bs-country">INDIA</div>
							<p class="wla-eu-india-bs-desc">WLA India partner firms in New Delhi managing inbound FDI approval, FEMA compliance, SEBI clearances, and the full Indian law execution on EU-originated India transactions.</p>
							<div class="wla-eu-india-bs-tags">
								<span class="wla-eu-india-bst">New Delhi</span>
								<span class="wla-eu-india-bst">FEMA</span>
								<span class="wla-eu-india-bst">CCI</span>
								<span class="wla-eu-india-bst">SEBI</span>
								<span class="wla-eu-india-bst">M&amp;A India</span>
							</div>
							<a href="wla-specialist.html" class="wla-eu-india-bs-link">FIND EXECUTION SPECIALIST →</a>
							<div class="wla-eu-india-bs-bg">INDIA</div>
						</div>
					</div>
					
					<div class="wla-eu-india-badge">
						<div>
							<div class="wla-eu-india-wb-title">WLA HOLDS BOTH SIDES OF THE EU TO INDIA CORRIDOR SIMULTANEOUSLY</div>
							<div class="wla-eu-india-wb-sub">One brief. Both sides activated. Brief to close under one Institutional framework.</div>
						</div>
						<div class="wla-eu-india-wb-badge">BOTH SIDES</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY LEGAL THEMES                                    -->
			<!-- ============================================================ -->
			<div class="wla-eu-india-themes-bg">
				<section class="wla-eu-india-section wla-eu-india-animate">
					<div class="wla-eu-india-container">
						<div class="wla-eu-india-eyebrow">KEY LEGAL THEMES — EU TO INDIA</div>
						<h2 class="wla-eu-india-heading">THREE THEMES DRIVING<br>THIS CORRIDOR IN 2026.</h2>
						
						<div class="wla-eu-india-themes-grid">
							<div class="wla-eu-india-tg">
								<div class="wla-eu-india-tg-number">DOMINANT</div>
								<div class="wla-eu-india-tg-title">TECHNOLOGY M&amp;A</div>
								<p class="wla-eu-india-tg-desc">EU technology companies acquiring Indian tech talent and platforms. Indian scale-ups expanding into EU markets. Fastest-growing deal category on this corridor.</p>
							</div>
							<div class="wla-eu-india-tg">
								<div class="wla-eu-india-tg-number">GROWING</div>
								<div class="wla-eu-india-tg-title">EU-INDIA FTA PREPARATION</div>
								<p class="wla-eu-india-tg-desc">FTA negotiations accelerating in 2026. Companies on both sides are structuring positions in advance of ratification — significant M&A, IP, and regulatory compliance work.</p>
							</div>
							<div class="wla-eu-india-tg">
								<div class="wla-eu-india-tg-number">EMERGING</div>
								<div class="wla-eu-india-tg-title">DATA CROSS-BORDER</div>
								<p class="wla-eu-india-tg-desc">DPDP Rules 2025 (India) and EU GDPR create a complex cross-border data landscape. WLA co-practices the full data compliance programme on both sides simultaneously.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                -->
			<!-- ============================================================ -->
			<div class="wla-eu-india-intel-bg">
				<section class="wla-eu-india-section wla-eu-india-section--dark wla-eu-india-animate">
					<div class="wla-eu-india-container">
						<div class="wla-eu-india-eyebrow-dark">WLA INTELLIGENCE — EU TO INDIA SIGNALS</div>
						<h2 class="wla-eu-india-heading-dark">WHAT IS MOVING ON<br>THIS CORRIDOR RIGHT NOW.</h2>
						
						<div class="wla-eu-india-intel-rows">
							<div class="wla-eu-india-ir wla-eu-india-ir--header">
								<div class="wla-eu-india-ir-th">JURISDICTION</div>
								<div class="wla-eu-india-ir-th">SIGNAL</div>
								<div class="wla-eu-india-ir-th" style="text-align:right">INDEX</div>
							</div>
							<div class="wla-eu-india-ir">
								<div class="wla-eu-india-ir-jur">INDIA</div>
								<div class="wla-eu-india-ir-text">DPDP Rules 2025 finalised. Cross-border transfer framework published. 12-month compliance window open for EU companies processing Indian personal data.</div>
								<div class="wla-eu-india-ir-growth">+34%</div>
							</div>
							<div class="wla-eu-india-ir">
								<div class="wla-eu-india-ir-jur">EU</div>
								<div class="wla-eu-india-ir-text">EU-India FTA Negotiations accelerating. Companies on both sides structuring legal positions in advance of ratification.</div>
								<div class="wla-eu-india-ir-growth">Active</div>
							</div>
							<div class="wla-eu-india-ir">
								<div class="wla-eu-india-ir-jur">INDIA</div>
								<div class="wla-eu-india-ir-text">CCI New Deal Value Threshold introduced at Rs 2,000 crore. Impacts EU-India technology acquisitions.</div>
								<div class="wla-eu-india-ir-growth">Active</div>
							</div>
						</div>
						
						<div class="wla-eu-india-intel-footer">
							<a href="wla-intelligence.html" class="wla-eu-india-btn-white-intel">FULL CORRIDOR INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED CORRIDORS                                   -->
			<!-- ============================================================ -->
			<section class="wla-eu-india-section wla-eu-india-section--related wla-eu-india-animate">
				<div class="wla-eu-india-container">
					<div class="wla-eu-india-eyebrow">ALL ACTIVE WLA CORRIDORS</div>
					<h2 class="wla-eu-india-heading">EVERY CORRIDOR. BOTH SIDES.</h2>
					
					<div class="wla-eu-india-rel-grid">
						<a href="wla-corridor-gulf-cee.html" class="wla-eu-india-rel-card">
							<div class="wla-eu-india-rc-route">GULF TO CEE</div>
							<div class="wla-eu-india-rc-growth">+38%</div>
							<div class="wla-eu-india-rc-desc">GCC Capital into Central Europe</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-eu-india-rel-card">
							<div class="wla-eu-india-rc-route">EU TO INDIA</div>
							<div class="wla-eu-india-rc-growth">+34%</div>
							<div class="wla-eu-india-rc-desc">Trade Technology FTA</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-eu-india-rel-card">
							<div class="wla-eu-india-rc-route">GCC TO SE ASIA</div>
							<div class="wla-eu-india-rc-growth">+31%</div>
							<div class="wla-eu-india-rc-desc">Gulf Capital into ASEAN</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-eu-india-rel-card">
							<div class="wla-eu-india-rc-route">UK TO AFRICA</div>
							<div class="wla-eu-india-rc-growth">+22%</div>
							<div class="wla-eu-india-rc-desc">Critical Minerals BII</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-eu-india-rel-card">
							<div class="wla-eu-india-rc-route">APAC AMERICAS</div>
							<div class="wla-eu-india-rc-growth">+19%</div>
							<div class="wla-eu-india-rc-desc">Pacific Rim Tech</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-eu-india-cta-band">
				<div class="wla-eu-india-cta-title">BRIEF WLA ON YOUR EU TO INDIA MATTER. BOTH SIDES. 48 HOURS.</div>
				<div class="wla-eu-india-cta-buttons">
					<a href="wla-specialist.html" class="wla-eu-india-btn-white">BRIEF WLA BOTH SIDES</a>
					<a href="wla-how-it-works.html" class="wla-eu-india-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA EU TO INDIA CORRIDOR PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * WLA APAC to Americas Corridor Page Shortcode
	 *
	 * Displays the WLA APAC to Americas Corridor page including:
	 * - Hero with split background and corridor display
	 * - Both sides coverage (APAC and Americas)
	 * - Key legal themes (Tech M&A, LatAm Entry, Natural Resources)
	 * - Intelligence signals
	 * - Related corridors
	 * - CTA band
	 *
	 * Shortcode: [wla_corridor_apac_americas]
	 *
	 * @return string
	 */
	public function wla_corridor_apac_americas_shortcode() {

		ob_start();
		?>
		
		<!-- WLA APAC TO AMERICAS CORRIDOR WRAPPER -->
		<div class="wla-corridor-apacamericas-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-corridor-apacamericas-hero">
				<div class="wla-corridor-apacamericas-hero-bg">
					<div class="wla-corridor-apacamericas-hero-bg-left"></div>
					<div class="wla-corridor-apacamericas-hero-bg-right"></div>
					<div class="wla-corridor-apacamericas-hero-divider"></div>
				</div>
				<div class="wla-corridor-apacamericas-hero-content">
					<div class="wla-corridor-apacamericas-hero-crumb">CORRIDORS › ACTIVE 2026 › APAC Americas Pacific Rim Cross-Border</div>
					<div class="wla-corridor-apacamericas-corridor-display">
						<div class="wla-corridor-apacamericas-cd-from">APAC</div>
						<div class="wla-corridor-apacamericas-cd-arrow">→</div>
						<div class="wla-corridor-apacamericas-cd-to">AMERICAS</div>
						<div class="wla-corridor-apacamericas-cd-growth">+19%</div>
					</div>
					<p class="wla-corridor-apacamericas-hero-desc">WLA co-practices the APAC to AMERICAS corridor on both sides simultaneously. One brief activates the origination-side specialists and the destination-side execution team, jointly holding the matter under one Institutional framework from brief to close.</p>
					<div class="wla-corridor-apacamericas-hero-buttons">
						<a href="wla-specialist.html" class="wla-corridor-apacamericas-btn-white">BRIEF WLA — BOTH SIDES — 48H</a>
						<a href="#both-sides" class="wla-corridor-apacamericas-btn-ghost-white">BOTH SIDES COVERED</a>
					</div>
					<div class="wla-corridor-apacamericas-hero-stats">
						<div class="wla-corridor-apacamericas-hs">
							<div class="wla-corridor-apacamericas-hs-number">+19%</div>
							<div class="wla-corridor-apacamericas-hs-label">Growth Rate</div>
						</div>
						<div class="wla-corridor-apacamericas-hs">
							<div class="wla-corridor-apacamericas-hs-number">Both</div>
							<div class="wla-corridor-apacamericas-hs-label">Sides Co-Practiced</div>
						</div>
						<div class="wla-corridor-apacamericas-hs">
							<div class="wla-corridor-apacamericas-hs-number">Tech M&amp;A + S</div>
							<div class="wla-corridor-apacamericas-hs-label">Primary Driver</div>
						</div>
						<div class="wla-corridor-apacamericas-hs">
							<div class="wla-corridor-apacamericas-hs-number">US/Brazil</div>
							<div class="wla-corridor-apacamericas-hs-label">Key Destination</div>
						</div>
						<div class="wla-corridor-apacamericas-hs">
							<div class="wla-corridor-apacamericas-hs-number">48H</div>
							<div class="wla-corridor-apacamericas-hs-label">Both Sides Confirmed</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: BOTH SIDES                                           -->
			<!-- ============================================================ -->
			<section class="wla-corridor-apacamericas-section wla-corridor-apacamericas-animate" id="both-sides">
				<div class="wla-corridor-apacamericas-container">
					<div class="wla-corridor-apacamericas-eyebrow">WLA CO-PRACTICES BOTH SIDES</div>
					<h2 class="wla-corridor-apacamericas-heading">ONE BRIEF.<br>BOTH JURISDICTIONS HELD.</h2>
					<p class="wla-corridor-apacamericas-subtext">The defining WLA advantage: partner firms on both sides jointly hold the matter simultaneously — aligned strategy from day one, no handoff gap, no information asymmetry between sides.</p>
					
					<div class="wla-corridor-apacamericas-both-sides">
						
						<!-- APAC Side -->
						<div class="wla-corridor-apacamericas-bs">
							<div class="wla-corridor-apacamericas-bs-label">
								<div class="wla-corridor-apacamericas-bs-dot"></div>
								ORIGINATION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-apacamericas-bs-country">APAC</div>
							<p class="wla-corridor-apacamericas-bs-desc">WLA APAC partner firms across Japan, South Korea, Singapore, Australia, and Taiwan managing the Pacific Rim origination of technology investment and cross-border M&A into the Americas.</p>
							<div class="wla-corridor-apacamericas-bs-tags">
								<span class="wla-corridor-apacamericas-bst">Japan</span>
								<span class="wla-corridor-apacamericas-bst">South Korea</span>
								<span class="wla-corridor-apacamericas-bst">Singapore</span>
								<span class="wla-corridor-apacamericas-bst">Australia</span>
								<span class="wla-corridor-apacamericas-bst">Taiwan</span>
							</div>
							<a href="wla-specialist.html" class="wla-corridor-apacamericas-bs-link">FIND ORIGINATION SPECIALIST →</a>
							<div class="wla-corridor-apacamericas-bs-bg">APAC</div>
						</div>
						
						<!-- Americas Side -->
						<div class="wla-corridor-apacamericas-bs">
							<div class="wla-corridor-apacamericas-bs-label">
								<div class="wla-corridor-apacamericas-bs-dot"></div>
								EXECUTION SIDE — WLA ACTIVE
							</div>
							<div class="wla-corridor-apacamericas-bs-country">AMERICAS</div>
							<p class="wla-corridor-apacamericas-bs-desc">WLA Americas partner firms across the United States, Brazil, Mexico, Colombia, and Canada managing the execution side, including CFIUS compliance, SEC filings, and regulatory approvals.</p>
							<div class="wla-corridor-apacamericas-bs-tags">
								<span class="wla-corridor-apacamericas-bst">United States</span>
								<span class="wla-corridor-apacamericas-bst">Brazil</span>
								<span class="wla-corridor-apacamericas-bst">Mexico</span>
								<span class="wla-corridor-apacamericas-bst">Colombia</span>
								<span class="wla-corridor-apacamericas-bst">Canada</span>
							</div>
							<a href="wla-specialist.html" class="wla-corridor-apacamericas-bs-link">FIND EXECUTION SPECIALIST →</a>
							<div class="wla-corridor-apacamericas-bs-bg">AMERICAS</div>
						</div>
						
					</div>
					
					<div class="wla-corridor-apacamericas-badge">
						<div>
							<div class="wla-corridor-apacamericas-badge-title">WLA HOLDS BOTH SIDES OF THE APAC TO AMERICAS CORRIDOR SIMULTANEOUSLY</div>
							<div class="wla-corridor-apacamericas-badge-sub">One brief. Both sides activated. Brief to close under one Institutional framework.</div>
						</div>
						<div class="wla-corridor-apacamericas-badge-tag">BOTH SIDES</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY LEGAL THEMES                                     -->
			<!-- ============================================================ -->
			<div class="wla-corridor-apacamericas-themes-bg">
				<section class="wla-corridor-apacamericas-section wla-corridor-apacamericas-animate">
					<div class="wla-corridor-apacamericas-container">
						<div class="wla-corridor-apacamericas-eyebrow">KEY LEGAL THEMES — APAC TO AMERICAS</div>
						<h2 class="wla-corridor-apacamericas-heading">THREE THEMES DRIVING<br>THIS CORRIDOR IN 2026.</h2>
						
						<div class="wla-corridor-apacamericas-themes-grid">
							<!-- Theme 01: Technology M&A and CFIUS -->
							<div class="wla-corridor-apacamericas-tg">
								<div class="wla-corridor-apacamericas-tg-number">DOMINANT</div>
								<div class="wla-corridor-apacamericas-tg-title">TECHNOLOGY M&amp;A AND CFIUS</div>
								<p class="wla-corridor-apacamericas-tg-desc">APAC technology acquisitions in the US triggering CFIUS review — semiconductor, AI, and quantum sectors most sensitive. WLA APAC manages origination structuring and WLA US manages CFIUS simultaneously.</p>
							</div>
							
							<!-- Theme 02: Latin America Entry -->
							<div class="wla-corridor-apacamericas-tg">
								<div class="wla-corridor-apacamericas-tg-number">GROWING</div>
								<div class="wla-corridor-apacamericas-tg-title">LATIN AMERICA ENTRY FROM APAC</div>
								<p class="wla-corridor-apacamericas-tg-desc">Japanese and South Korean companies entering Latin American markets — Brazil, Mexico, and Colombia most active. WLA co-practices the APAC origination and LatAm local law compliance simultaneously.</p>
							</div>
							
							<!-- Theme 03: Natural Resources and Energy -->
							<div class="wla-corridor-apacamericas-tg">
								<div class="wla-corridor-apacamericas-tg-number">EMERGING</div>
								<div class="wla-corridor-apacamericas-tg-title">NATURAL RESOURCES AND ENERGY</div>
								<p class="wla-corridor-apacamericas-tg-desc">APAC energy companies investing in Americas natural resources — Brazilian pre-salt, Chilean copper and lithium, Canadian oil sands. WLA co-practices both sides.</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS                                 -->
			<!-- ============================================================ -->
			<div class="wla-corridor-apacamericas-intel-bg">
				<section class="wla-corridor-apacamericas-section wla-corridor-apacamericas-section--dark wla-corridor-apacamericas-animate">
					<div class="wla-corridor-apacamericas-container">
						<div class="wla-corridor-apacamericas-eyebrow-dark">WLA INTELLIGENCE — APAC TO AMERICAS SIGNALS</div>
						<h2 class="wla-corridor-apacamericas-heading-dark">WHAT IS MOVING ON<br>THIS CORRIDOR RIGHT NOW.</h2>
						
						<div class="wla-corridor-apacamericas-intel-rows">
							<!-- Header -->
							<div class="wla-corridor-apacamericas-ir wla-corridor-apacamericas-ir--header">
								<div class="wla-corridor-apacamericas-ir-th">JURISDICTION</div>
								<div class="wla-corridor-apacamericas-ir-th">SIGNAL</div>
								<div class="wla-corridor-apacamericas-ir-th" style="text-align:right">INDEX</div>
							</div>
							
							<!-- Signal 01: US/CFIUS -->
							<div class="wla-corridor-apacamericas-ir">
								<div class="wla-corridor-apacamericas-ir-jur">US/CFIUS</div>
								<div class="wla-corridor-apacamericas-ir-text">CFIUS Enhanced Review — Semiconductor and AI transactions from APAC investors facing heightened scrutiny. WLA advises on pre-filing planning and mitigation agreements.</div>
								<div class="wla-corridor-apacamericas-ir-growth">Active</div>
							</div>
							
							<!-- Signal 02: Brazil -->
							<div class="wla-corridor-apacamericas-ir">
								<div class="wla-corridor-apacamericas-ir-jur">BRAZIL</div>
								<div class="wla-corridor-apacamericas-ir-text">CADE Merger Control — Brazil competition authority updating thresholds for technology sector. APAC tech acquisitions in Brazil increasingly triggering review.</div>
								<div class="wla-corridor-apacamericas-ir-growth">+19%</div>
							</div>
							
							<!-- Signal 03: Japan/South Korea -->
							<div class="wla-corridor-apacamericas-ir">
								<div class="wla-corridor-apacamericas-ir-jur">JAPAN/S.KOREA</div>
								<div class="wla-corridor-apacamericas-ir-text">Outbound FDI Monitoring — Japan and South Korea introducing enhanced outbound FDI screening for sensitive technologies. Impact on Americas-bound tech investment.</div>
								<div class="wla-corridor-apacamericas-ir-growth">Watch</div>
							</div>
						</div>
						
						<div class="wla-corridor-apacamericas-intel-footer">
							<a href="wla-intelligence.html" class="wla-corridor-apacamericas-btn-white-dark">FULL CORRIDOR INTELLIGENCE</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED CORRIDORS                                    -->
			<!-- ============================================================ -->
			<section class="wla-corridor-apacamericas-section wla-corridor-apacamericas-section--related wla-corridor-apacamericas-animate">
				<div class="wla-corridor-apacamericas-container">
					<div class="wla-corridor-apacamericas-eyebrow">ALL ACTIVE WLA CORRIDORS</div>
					<h2 class="wla-corridor-apacamericas-heading">EVERY CORRIDOR. BOTH SIDES.</h2>
					
					<div class="wla-corridor-apacamericas-rel-grid">
						<a href="wla-corridor-gulf-cee.html" class="wla-corridor-apacamericas-rel-card">
							<div class="wla-corridor-apacamericas-rc-route">GULF TO CEE</div>
							<div class="wla-corridor-apacamericas-rc-growth">+38%</div>
							<div class="wla-corridor-apacamericas-rc-desc">GCC Capital into Central Europe</div>
						</a>
						<a href="wla-corridor-eu-india.html" class="wla-corridor-apacamericas-rel-card">
							<div class="wla-corridor-apacamericas-rc-route">EU TO INDIA</div>
							<div class="wla-corridor-apacamericas-rc-growth">+34%</div>
							<div class="wla-corridor-apacamericas-rc-desc">Trade Technology FTA</div>
						</a>
						<a href="wla-corridor-gcc-seasia.html" class="wla-corridor-apacamericas-rel-card">
							<div class="wla-corridor-apacamericas-rc-route">GCC TO SE ASIA</div>
							<div class="wla-corridor-apacamericas-rc-growth">+31%</div>
							<div class="wla-corridor-apacamericas-rc-desc">Gulf Capital into ASEAN</div>
						</a>
						<a href="wla-corridor-uk-africa.html" class="wla-corridor-apacamericas-rel-card">
							<div class="wla-corridor-apacamericas-rc-route">UK TO AFRICA</div>
							<div class="wla-corridor-apacamericas-rc-growth">+22%</div>
							<div class="wla-corridor-apacamericas-rc-desc">Critical Minerals BII</div>
						</a>
						<a href="wla-corridor-apac-americas.html" class="wla-corridor-apacamericas-rel-card">
							<div class="wla-corridor-apacamericas-rc-route">APAC AMERICAS</div>
							<div class="wla-corridor-apacamericas-rc-growth">+19%</div>
							<div class="wla-corridor-apacamericas-rc-desc">Pacific Rim Tech</div>
						</a>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-corridor-apacamericas-cta-band">
				<div class="wla-corridor-apacamericas-cta-title">BRIEF WLA ON YOUR APAC TO AMERICAS MATTER. BOTH SIDES. 48 HOURS.</div>
				<div class="wla-corridor-apacamericas-cta-buttons">
					<a href="wla-specialist.html" class="wla-corridor-apacamericas-btn-white">BRIEF WLA BOTH SIDES</a>
					<a href="wla-how-it-works.html" class="wla-corridor-apacamericas-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA APAC TO AMERICAS CORRIDOR WRAPPER -->

		<?php
		return ob_get_clean();
	}	
	/**
	 * WLA Intellectual Property Page Shortcode
	 *
	 * Displays the WLA Intellectual Property page including:
	 * - Hero with IP jurisdictions grid
	 * - IP practice areas (6 cards with hover effects)
	 * - IP in M&A feature split
	 * - Intelligence signals for IP
	 * - Related practices
	 * - CTA band
	 *
	 * Shortcode: [wla_ip_page]
	 *
	 * @return string
	 */
	public function wla_ip_page_shortcode() {

		ob_start();
		?>
		
		<!-- WLA IP PAGE WRAPPER -->
		<div class="wla-ip-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-ip-hero">
				<div class="wla-ip-hero-left">
					<div class="wla-ip-hero-breadcrumb">
						PRACTICES <span>›</span> CORE ALLIANCES <span>›</span> INTELLECTUAL PROPERTY
					</div>
					<h1 class="wla-ip-hero-title">WLA INTELLECTUAL PROPERTY</h1>
					<p class="wla-ip-hero-desc">Global IP strategy, patent prosecution, trademark registration, and brand protection across multiple jurisdictions simultaneously. WLA IP specialists embedded in the world's fastest-growing innovation markets — from Silicon Valley to Shenzhen to Bangalore.</p>
					<div class="wla-ip-hero-buttons">
						<a href="wla-specialist.html" class="wla-ip-btn-white">FIND AN IP SPECIALIST — 48H</a>
						<a href="#capabilities" class="wla-ip-btn-ghost-white">IP CAPABILITIES</a>
					</div>
					<div class="wla-ip-hero-tags">
						<span class="wla-ip-htag">PATENTS</span>
						<span class="wla-ip-htag">TRADEMARKS</span>
						<span class="wla-ip-htag">COPYRIGHT</span>
						<span class="wla-ip-htag">TRADE SECRETS</span>
						<span class="wla-ip-htag">LICENSING</span>
						<span class="wla-ip-htag">IP LITIGATION</span>
						<span class="wla-ip-htag">BRAND PROTECTION</span>
						<span class="wla-ip-htag">AI &amp; DATA IP</span>
					</div>
				</div>
				<div class="wla-ip-hero-right">
					<div class="wla-ip-jur-grid-title">WLA IP ACTIVE — KEY MARKETS</div>
					<div class="wla-ip-jur-grid">
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">INDIA</div>
							<div class="wla-ip-ji-reg">Indian Patent Office · CGPDTM</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">EUROPE</div>
							<div class="wla-ip-ji-reg">EPO · EUIPO · National Offices</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">UNITED STATES</div>
							<div class="wla-ip-ji-reg">USPTO · ITC Proceedings</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">CHINA</div>
							<div class="wla-ip-ji-reg">CNIPA · CNIPA Litigation</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">UAE</div>
							<div class="wla-ip-ji-reg">UAE Ministry of Economy</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">SINGAPORE</div>
							<div class="wla-ip-ji-reg">IPOS · Regional ASEAN</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">UK</div>
							<div class="wla-ip-ji-reg">UKIPO · Post-Brexit Filing</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
						<div class="wla-ip-jur-item">
							<div class="wla-ip-ji-name">HONG KONG</div>
							<div class="wla-ip-ji-reg">IPDC · HKSAR Regime</div>
							<div class="wla-ip-ji-status"><div class="wla-ip-ji-dot"></div>ACTIVE</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: IP PRACTICE AREAS                                    -->
			<!-- ============================================================ -->
			<section class="wla-ip-section wla-ip-animate" id="capabilities">
				<div class="wla-ip-container">
					<div class="wla-ip-eyebrow">IP PRACTICE AREAS</div>
					<h2 class="wla-ip-heading">EVERY DIMENSION OF<br>CROSS-BORDER INTELLECTUAL PROPERTY.</h2>
					<p class="wla-ip-subtext">WLA's IP practice co-practices patent, trademark, copyright, and trade secret matters across multiple jurisdictions simultaneously — with specialist partner firms in each territory holding the engagement jointly from strategy through to enforcement.</p>
					
					<div class="wla-ip-grid">
						
						<!-- Card 01: Patents -->
						<div class="wla-ip-card">
							<div class="wla-ip-card-number">01 — PATENTS</div>
							<div class="wla-ip-card-icon">⚗️</div>
							<div class="wla-ip-card-title">PATENT PROSECUTION &amp; STRATEGY</div>
							<p class="wla-ip-card-desc">Multi-jurisdiction patent prosecution coordinated through WLA — national filings, PCT applications, EPO proceedings, and post-grant opposition managed across all required territories on one timeline.</p>
							<ul class="wla-ip-card-list">
								<li>PCT international applications and national phase entries</li>
								<li>EPO prosecution — examination, opposition, appeal</li>
								<li>National filings across 90+ jurisdictions coordinated</li>
								<li>Patent portfolio strategy and freedom-to-operate analysis</li>
								<li>Patent due diligence for M&amp;A and licensing transactions</li>
							</ul>
							<div class="wla-ip-card-bg">PAT</div>
						</div>
						
						<!-- Card 02: Trademarks -->
						<div class="wla-ip-card">
							<div class="wla-ip-card-number">02 — TRADEMARKS</div>
							<div class="wla-ip-card-icon">™</div>
							<div class="wla-ip-card-title">TRADEMARKS &amp; BRAND PROTECTION</div>
							<p class="wla-ip-card-desc">Global trademark registration strategy, brand protection enforcement, and anti-counterfeiting programmes across every major consumer market — coordinated through WLA's specialist IP partner firms in each jurisdiction.</p>
							<ul class="wla-ip-card-list">
								<li>Madrid Protocol international registration coordination</li>
								<li>EUIPO Community Trade Mark prosecution and opposition</li>
								<li>National trademark registrations across 90+ jurisdictions</li>
								<li>Anti-counterfeiting enforcement — customs, online, and physical markets</li>
								<li>Brand acquisition due diligence and post-M&amp;A brand consolidation</li>
							</ul>
							<div class="wla-ip-card-bg">TM</div>
						</div>
						
						<!-- Card 03: Licensing -->
						<div class="wla-ip-card">
							<div class="wla-ip-card-number">03 — LICENSING</div>
							<div class="wla-ip-card-icon">🤝</div>
							<div class="wla-ip-card-title">IP LICENSING &amp; TECHNOLOGY TRANSFER</div>
							<p class="wla-ip-card-desc">Complex cross-border IP licensing structures, technology transfer agreements, and royalty structures across multiple legal systems — including transfer pricing compliance for intra-group IP arrangements.</p>
							<ul class="wla-ip-card-list">
								<li>In-licensing and out-licensing of patents, software, and know-how</li>
								<li>Cross-border technology transfer agreements</li>
								<li>IP holding structure design and optimisation</li>
								<li>Franchise and merchandising agreement multi-jurisdiction compliance</li>
								<li>Royalty structures and transfer pricing for IP arrangements</li>
							</ul>
							<div class="wla-ip-card-bg">LIC</div>
						</div>
						
						<!-- Card 04: IP Litigation -->
						<div class="wla-ip-card">
							<div class="wla-ip-card-number">04 — IP LITIGATION</div>
							<div class="wla-ip-card-icon">⚖️</div>
							<div class="wla-ip-card-title">CROSS-BORDER IP ENFORCEMENT &amp; LITIGATION</div>
							<p class="wla-ip-card-desc">Multi-jurisdiction IP enforcement — patent, trademark, and trade secret litigation coordinated across parallel proceedings in multiple countries simultaneously, under one WLA co-practice framework.</p>
							<ul class="wla-ip-card-list">
								<li>Parallel patent infringement actions across multiple jurisdictions</li>
								<li>ITC 337 investigations alongside US district court proceedings</li>
								<li>Cross-border trade secret misappropriation — civil and criminal</li>
								<li>Pan-European UPC proceedings under the new EU patent court</li>
								<li>Coordination with TheNeutrals.ORG™ for IP ADR</li>
							</ul>
							<div class="wla-ip-card-bg">LIT</div>
						</div>
						
						<!-- Card 05: AI & Data IP -->
						<div class="wla-ip-card">
							<div class="wla-ip-card-number">05 — AI &amp; DATA IP</div>
							<div class="wla-ip-card-icon">🤖</div>
							<div class="wla-ip-card-title">AI, SOFTWARE &amp; DATA INTELLECTUAL PROPERTY</div>
							<p class="wla-ip-card-desc">The fastest-growing area of WLA's IP practice. AI-generated IP ownership, software copyright, data licensing structures, and the evolving regulatory landscape under the EU AI Act and equivalent national frameworks.</p>
							<ul class="wla-ip-card-list">
								<li>AI-generated IP ownership structures across jurisdictions</li>
								<li>Software patent strategy — patentable vs. copyright protection</li>
								<li>Data licensing and data governance frameworks</li>
								<li>EU AI Act compliance — high-risk AI system IP implications</li>
								<li>Open source licensing compliance across M&amp;A transactions</li>
							</ul>
							<div class="wla-ip-card-bg">AI</div>
						</div>
						
						<!-- Card 06: M&A IP Due Diligence -->
						<div class="wla-ip-card">
							<div class="wla-ip-card-number">06 — M&amp;A IP DUE DILIGENCE</div>
							<div class="wla-ip-card-icon">🔍</div>
							<div class="wla-ip-card-title">IP DUE DILIGENCE FOR TRANSACTIONS</div>
							<p class="wla-ip-card-desc">IP due diligence for M&amp;A transactions is a core capability of WLA's Transactional and IP practices working together — assessing the validity, ownership, and freedom-to-use of IP assets across every jurisdiction where the target operates.</p>
							<ul class="wla-ip-card-list">
								<li>Full IP portfolio audit — patents, trademarks, copyright, trade secrets</li>
								<li>Freedom-to-operate analysis in each operating jurisdiction</li>
								<li>IP ownership chain verification — particularly for software and AI</li>
								<li>Licence agreement review and assignment/change-of-control analysis</li>
								<li>Post-acquisition IP integration and consolidation planning</li>
							</ul>
							<div class="wla-ip-card-bg">DD</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: IP IN M&A FEATURE                                    -->
			<!-- ============================================================ -->
			<section class="wla-ip-section wla-ip-animate">
				<div class="wla-ip-container">
					<div class="wla-ip-eyebrow">IP &amp; TRANSACTIONS</div>
					<h2 class="wla-ip-heading">IP IS AT THE HEART OF<br>EVERY CROSS-BORDER DEAL.</h2>
					
					<div class="wla-ip-feature-layout">
						<div class="wla-ip-feature-image">
							<img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=900&q=85" alt="IP Practice">
							<div class="wla-ip-feature-image-label">WLA IP PRACTICE — CROSS-BORDER</div>
						</div>
						<div class="wla-ip-feature-content">
							<div class="wla-ip-fc-tag">WLA IP + WLA TRANSACTIONAL — WORKING TOGETHER</div>
							<div class="wla-ip-fc-title">IP DUE DILIGENCE AND TRANSACTIONAL IP SUPPORT GO HAND IN HAND.</div>
							<p class="wla-ip-fc-body">In technology M&A, pharmaceutical licensing, and brand acquisitions, IP is often the primary asset being bought or sold. WLA's IP practice works alongside the Transactional practice — with IP specialists in each jurisdiction conducting due diligence simultaneously with the deal team, on the same timeline, under the same co-practice framework.</p>
							<p class="wla-ip-fc-body">The result: IP issues surface early, not at signing. Cross-jurisdiction IP gap analysis is available before the LOI is executed. Post-completion IP integration is already planned before the deal closes.</p>
							<ul class="wla-ip-fc-points">
								<li>IP due diligence running parallel to deal due diligence — same timeline</li>
								<li>Patent freedom-to-operate in every operating jurisdiction before signing</li>
								<li>Trade secret protection assessment — particularly in technology M&amp;A</li>
								<li>IP representations and warranties aligned across all jurisdictions</li>
								<li>Post-completion IP assignment and registration in each territory</li>
							</ul>
							<div class="wla-ip-fc-buttons">
								<a href="wla-specialist.html" class="wla-ip-btn-ink">FIND AN IP SPECIALIST →</a>
								<a href="wla-page-transactional.html" class="wla-ip-btn-bdr">WLA TRANSACTIONAL</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: INTELLIGENCE SIGNALS FOR IP                          -->
			<!-- ============================================================ -->
			<div class="wla-ip-intel-bg">
				<section class="wla-ip-section wla-ip-animate">
					<div class="wla-ip-container">
						<div class="wla-ip-eyebrow">WLA INTELLIGENCE — IP SIGNALS</div>
						<h2 class="wla-ip-heading">WHAT'S MOVING IN<br>CROSS-BORDER IP RIGHT NOW.</h2>
						<p class="wla-ip-subtext">WLA Intelligence tracks IP-specific regulatory changes, court decisions, and filing framework updates across 80+ jurisdictions daily. Live IP signals for informed cross-border IP strategy.</p>
						
						<table class="wla-ip-intel-table">
							<thead>
								<tr>
									<th>JURISDICTION</th>
									<th>SIGNAL</th>
									<th style="text-align:right">INDEX</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="wla-ip-it-jur">EU</div>
										<div class="wla-ip-it-area">Patent / UPC</div>
									</td>
									<td class="wla-ip-it-signal"><strong>Unitary Patent Court (UPC)</strong> — Caseload exceeding projections. Pan-European injunctions becoming standard enforcement tool for patent holders.</td>
									<td class="wla-ip-it-idx">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-ip-it-jur">India</div>
										<div class="wla-ip-it-area">Patent Office</div>
									</td>
									<td class="wla-ip-it-signal"><strong>Indian Patent Office Backlog Reduction</strong> — New examiner capacity and AI-assisted examination cutting grant timeline to 24 months for standard applications.</td>
									<td class="wla-ip-it-idx">+28%</td>
								</tr>
								<tr>
									<td>
										<div class="wla-ip-it-jur">EU</div>
										<div class="wla-ip-it-area">AI Act / IP</div>
									</td>
									<td class="wla-ip-it-signal"><strong>EU AI Act — IP Implications</strong> — Article 53 transparency requirements creating new IP disclosure obligations for general-purpose AI model developers.</td>
									<td class="wla-ip-it-idx wla-ip-it-idx--ac">Active</td>
								</tr>
								<tr>
									<td>
										<div class="wla-ip-it-jur">UK</div>
										<div class="wla-ip-it-area">AI Copyright</div>
									</td>
									<td class="wla-ip-it-signal"><strong>UK AI Copyright Consultation</strong> — Government proposing text and data mining exception for AI training. Significant IP implications for content owners globally.</td>
									<td class="wla-ip-it-idx">Watch</td>
								</tr>
								<tr>
									<td>
										<div class="wla-ip-it-jur">US</div>
										<div class="wla-ip-it-area">USPTO / AI</div>
									</td>
									<td class="wla-ip-it-signal"><strong>USPTO AI Inventorship Guidelines</strong> — AI cannot be listed as inventor under US law. Human inventor guidance for AI-assisted inventions now published.</td>
									<td class="wla-ip-it-idx wla-ip-it-idx--ac">Active</td>
								</tr>
							</tbody>
						</table>
						
						<div class="wla-ip-intel-footer">
							<a href="wla-intelligence.html" class="wla-ip-btn-bdr">FULL IP INTELLIGENCE PLATFORM →</a>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-ip-cta-band">
				<div class="wla-ip-cta-title">BRIEF WLA ON YOUR CROSS-BORDER IP MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-ip-cta-buttons">
					<a href="wla-specialist.html" class="wla-ip-btn-white">FIND AN IP SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-ip-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: RELATED PRACTICES                                    -->
			<!-- ============================================================ -->
			<div class="wla-ip-related-bg">
				<section class="wla-ip-section wla-ip-animate">
					<div class="wla-ip-container">
						<div class="wla-ip-eyebrow">RELATED PRACTICES</div>
						<h2 class="wla-ip-heading">OFTEN NEEDED ALONGSIDE IP.</h2>
						
						<div class="wla-ip-rel-grid">
							<a href="wla-page-transactional.html" class="wla-ip-rel-card">
								<div class="wla-ip-rc-tag">PRACTICE</div>
								<div class="wla-ip-rc-title">TRANSACTIONAL &amp; M&amp;A</div>
								<div class="wla-ip-rc-link">EXPLORE →</div>
							</a>
							<a href="#" class="wla-ip-rel-card">
								<div class="wla-ip-rc-tag">PRACTICE</div>
								<div class="wla-ip-rc-title">TECHNOLOGY &amp; DATA</div>
								<div class="wla-ip-rc-link">EXPLORE →</div>
							</a>
							<a href="#" class="wla-ip-rel-card">
								<div class="wla-ip-rc-tag">PRACTICE</div>
								<div class="wla-ip-rc-title">DISPUTES &amp; ARBITRATION</div>
								<div class="wla-ip-rc-link">EXPLORE →</div>
							</a>
							<a href="#" class="wla-ip-rel-card">
								<div class="wla-ip-rc-tag">PRACTICE</div>
								<div class="wla-ip-rc-title">COMPETITION LAW</div>
								<div class="wla-ip-rc-link">EXPLORE →</div>
							</a>
						</div>
					</div>
				</section>
			</div>

		</div>
		<!-- END WLA IP PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
	/**
	 * Labour & Employment Page Shortcode
	 *
	 * Displays the WLA Labour & Employment page including:
	 * - Hero with split layout and live legislation feed
	 * - Key employment scenarios grid (6 scenarios)
	 * - Employment for General Counsel section with checklist
	 * - Employment in M&A section
	 * - CTA band
	 *
	 * Shortcode: [wla_employment_page]
	 *
	 * @return string
	 */
	public function wla_employment_page_shortcode() {
		
		ob_start();
		?>
		
		<!-- WLA EMPLOYMENT PAGE WRAPPER -->
		<div class="wla-employment-wrapper">
			
			<!-- ============================================================ -->
			<!-- SECTION: HERO                                                 -->
			<!-- ============================================================ -->
			<section class="wla-employment-hero">
				<div class="wla-employment-hero-left">
					<img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=1200&q=85" alt="Employment Law">
					<div class="wla-employment-hero-grad"></div>
					<div class="wla-employment-hero-content">
						<div class="wla-employment-h-breadcrumb">PRACTICES › SPECIALIST GROUPS › LABOUR &amp; EMPLOYMENT</div>
						<h1 class="wla-employment-h-title">WLA LABOUR &amp; EMPLOYMENT</h1>
						<p class="wla-employment-h-desc">Cross-border employment law, workforce restructuring, executive arrangements, and employment litigation co-practiced across 90+ jurisdictions. From day-one rights to multi-jurisdiction redundancy programmes — the right specialist in every territory.</p>
						<div class="wla-employment-h-btns">
							<a href="wla-specialist.html" class="wla-employment-btn-white">FIND AN EMPLOYMENT SPECIALIST — 48H</a>
							<a href="#scenarios" class="wla-employment-btn-ghost-white">KEY USE CASES</a>
						</div>
					</div>
				</div>
				<div class="wla-employment-hero-right">
					<div class="wla-employment-leg-title">
						LIVE EMPLOYMENT LEGISLATION
						<div class="wla-employment-leg-live">
							<div class="wla-employment-ldot"></div>
							LIVE
						</div>
					</div>
					<div class="wla-employment-leg-rows">
						<div class="wla-employment-leg-row">
							<div class="wla-employment-lr-jur">UNITED KINGDOM</div>
							<div class="wla-employment-lr-law">Employment Rights Bill 2025 — Day-One Rights</div>
							<div class="wla-employment-lr-impact">Day-one unfair dismissal rights. Fire-and-rehire restrictions. Flexible working default. Significant impact for international employers with UK workforces.</div>
							<div class="wla-employment-lr-badge wla-employment-lr-badge--active">LIVE — APRIL 2026</div>
						</div>
						<div class="wla-employment-leg-row">
							<div class="wla-employment-lr-jur">EUROPEAN UNION</div>
							<div class="wla-employment-lr-law">EU Platform Work Directive</div>
							<div class="wla-employment-lr-impact">Presumption of employment status for platform workers. Algorithmic management transparency. Affects all platforms operating in EU member states.</div>
							<div class="wla-employment-lr-badge wla-employment-lr-badge--watch">TRANSPOSITION 2026</div>
						</div>
						<div class="wla-employment-leg-row">
							<div class="wla-employment-lr-jur">UAE — DIFC</div>
							<div class="wla-employment-lr-law">DIFC Employment Law Amendment 2025</div>
							<div class="wla-employment-lr-impact">New secondment provisions. Enhanced mobility framework. End of service restructuring. Significant for international employers seconding staff to DIFC entities.</div>
							<div class="wla-employment-lr-badge wla-employment-lr-badge--active">EFFECTIVE Q3 2026</div>
						</div>
						<div class="wla-employment-leg-row">
							<div class="wla-employment-lr-jur">INDIA</div>
							<div class="wla-employment-lr-law">Labour Codes — Social Security &amp; Wages</div>
							<div class="wla-employment-lr-impact">Four labour codes consolidating 29 central laws. Compliance obligation redesign for all employers. State-by-state implementation ongoing.</div>
							<div class="wla-employment-lr-badge wla-employment-lr-badge--watch">IMPLEMENTATION ONGOING</div>
						</div>
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: KEY EMPLOYMENT SCENARIOS                            -->
			<!-- ============================================================ -->
			<section class="wla-employment-section wla-employment-animate" id="scenarios">
				<div class="wla-employment-container">
					<div class="wla-employment-eyebrow">KEY EMPLOYMENT SCENARIOS</div>
					<h2 class="wla-employment-heading">THE SITUATIONS WHERE WLA<br>EMPLOYMENT GROUP ADDS MOST VALUE.</h2>
					<p class="wla-employment-subheading">Cross-border employment law is at its most complex — and most consequential — in these six scenarios. WLA Employment Group co-practices all of them.</p>
					
					<div class="wla-employment-scenario-grid">
						
						<!-- Scenario 01 -->
						<div class="wla-employment-sc">
							<div class="wla-employment-sc-scenario">SCENARIO 01</div>
							<div class="wla-employment-sc-title">CROSS-BORDER WORKFORCE RESTRUCTURING</div>
							<p class="wla-employment-sc-desc">Redundancy programmes spanning multiple jurisdictions — Works Council consultation, collective dismissal procedures, consultation periods, and severance calculations all run simultaneously by specialist employment lawyers in each country.</p>
							<div class="wla-employment-sc-jurisdictions">
								<span class="wla-employment-sc-jur">EU</span>
								<span class="wla-employment-sc-jur">UK</span>
								<span class="wla-employment-sc-jur">US</span>
								<span class="wla-employment-sc-jur">UAE</span>
								<span class="wla-employment-sc-jur">India</span>
							</div>
							<div class="wla-employment-sc-bg">01</div>
						</div>
						
						<!-- Scenario 02 -->
						<div class="wla-employment-sc">
							<div class="wla-employment-sc-scenario">SCENARIO 02</div>
							<div class="wla-employment-sc-title">M&amp;A EMPLOYMENT — TUPE &amp; TRANSFERS</div>
							<p class="wla-employment-sc-desc">Employee transfer obligations on M&A transactions — TUPE in the UK, Article 3 Directive in the EU, equivalent regimes across 90+ jurisdictions. Works Council consultation, information and consultation obligations, and harmonisation planning.</p>
							<div class="wla-employment-sc-jurisdictions">
								<span class="wla-employment-sc-jur">UK TUPE</span>
								<span class="wla-employment-sc-jur">EU Directive</span>
								<span class="wla-employment-sc-jur">Germany</span>
								<span class="wla-employment-sc-jur">France</span>
							</div>
							<div class="wla-employment-sc-bg">02</div>
						</div>
						
						<!-- Scenario 03 -->
						<div class="wla-employment-sc">
							<div class="wla-employment-sc-scenario">SCENARIO 03</div>
							<div class="wla-employment-sc-title">EXECUTIVE ARRANGEMENTS — CROSS-BORDER</div>
							<p class="wla-employment-sc-desc">Senior executive employment contracts, remuneration structures, and restrictive covenants that work across multiple legal systems — including post-termination restrictions that are enforceable in every relevant jurisdiction.</p>
							<div class="wla-employment-sc-jurisdictions">
								<span class="wla-employment-sc-jur">Multi-Jurisdiction</span>
								<span class="wla-employment-sc-jur">Garden Leave</span>
								<span class="wla-employment-sc-jur">Non-Compete</span>
							</div>
							<div class="wla-employment-sc-bg">03</div>
						</div>
						
						<!-- Scenario 04 -->
						<div class="wla-employment-sc">
							<div class="wla-employment-sc-scenario">SCENARIO 04</div>
							<div class="wla-employment-sc-title">SECONDMENTS &amp; GLOBAL MOBILITY</div>
							<p class="wla-employment-sc-desc">International secondment arrangements, split payroll structures, social security coordination, and right-to-work compliance — coordinated alongside the WIA immigration practice for comprehensive cross-border employee mobility support.</p>
							<div class="wla-employment-sc-jurisdictions">
								<span class="wla-employment-sc-jur">Social Security</span>
								<span class="wla-employment-sc-jur">Split Payroll</span>
								<span class="wla-employment-sc-jur">Immigration</span>
							</div>
							<div class="wla-employment-sc-bg">04</div>
						</div>
						
						<!-- Scenario 05 -->
						<div class="wla-employment-sc">
							<div class="wla-employment-sc-scenario">SCENARIO 05</div>
							<div class="wla-employment-sc-title">EMPLOYMENT DISPUTES — CROSS-BORDER</div>
							<p class="wla-employment-sc-desc">Employment tribunal, labour court, and arbitration proceedings in multiple jurisdictions — particularly relevant for international employers facing claims in multiple territories arising from the same employment relationship.</p>
							<div class="wla-employment-sc-jurisdictions">
								<span class="wla-employment-sc-jur">Tribunals</span>
								<span class="wla-employment-sc-jur">Labour Courts</span>
								<span class="wla-employment-sc-jur">Arbitration</span>
							</div>
							<div class="wla-employment-sc-bg">05</div>
						</div>
						
						<!-- Scenario 06 -->
						<div class="wla-employment-sc">
							<div class="wla-employment-sc-scenario">SCENARIO 06</div>
							<div class="wla-employment-sc-title">AI &amp; DATA IN THE WORKPLACE</div>
							<p class="wla-employment-sc-desc">AI deployment in employment contexts — EU AI Act high-risk AI obligations for recruitment and performance management, algorithmic management transparency, and data protection compliance for employee monitoring across jurisdictions.</p>
							<div class="wla-employment-sc-jurisdictions">
								<span class="wla-employment-sc-jur">EU AI Act</span>
								<span class="wla-employment-sc-jur">GDPR</span>
								<span class="wla-employment-sc-jur">UK GDPR</span>
							</div>
							<div class="wla-employment-sc-bg">06</div>
						</div>
						
					</div>
				</div>
			</section>

			<!-- ============================================================ -->
			<!-- SECTION: EMPLOYMENT FOR GENERAL COUNSEL                     -->
			<!-- ============================================================ -->
			<div class="wla-employment-gc-bg">
				<section class="wla-employment-section wla-employment-animate">
					<div class="wla-employment-container">
						<div class="wla-employment-eyebrow">EMPLOYMENT FOR GENERAL COUNSEL</div>
						<h2 class="wla-employment-heading">THE EMPLOYMENT LAW CHECKLIST<br>EVERY GC WITH GLOBAL STAFF NEEDS.</h2>
						
						<div class="wla-employment-gc-layout">
							<div class="wla-employment-gc-checklist">
								<div class="wla-employment-gcl-header">EMPLOYMENT COMPLIANCE CHECKLIST — MULTINATIONAL EMPLOYERS</div>
								<div class="wla-employment-gcl-item">
									<div class="wla-employment-gcl-check">✓</div>
									<div class="wla-employment-gcl-text"><strong>Day-One Rights (UK)</strong> — UK Employment Rights Bill in force. Unfair dismissal from day one. Review all UK employment contracts.</div>
								</div>
								<div class="wla-employment-gcl-item">
									<div class="wla-employment-gcl-check">✓</div>
									<div class="wla-employment-gcl-text"><strong>Works Council Obligations</strong> — Any restructuring involving EU employees requires Works Council information and consultation before implementation.</div>
								</div>
								<div class="wla-employment-gcl-item">
									<div class="wla-employment-gcl-check">✓</div>
									<div class="wla-employment-gcl-text"><strong>DIFC Employment Amendment</strong> — UAE/DIFC secondment arrangements affected. Review all international secondment agreements.</div>
								</div>
								<div class="wla-employment-gcl-item">
									<div class="wla-employment-gcl-check">✓</div>
									<div class="wla-employment-gcl-text"><strong>AI in Employment (EU AI Act)</strong> — AI recruitment tools and performance management systems may be classified as high-risk AI. Compliance obligations apply.</div>
								</div>
								<div class="wla-employment-gcl-item">
									<div class="wla-employment-gcl-check">✓</div>
									<div class="wla-employment-gcl-text"><strong>India Labour Codes</strong> — State-by-state implementation. Review compliance obligations in each Indian state of operation.</div>
								</div>
								<div class="wla-employment-gcl-item">
									<div class="wla-employment-gcl-check">✓</div>
									<div class="wla-employment-gcl-text"><strong>Right-to-Work Compliance</strong> — Coordinate with WIA on business travel compliance across all jurisdictions where employees travel regularly.</div>
								</div>
							</div>
							<div class="wla-employment-gc-content">
								<div class="wla-employment-gc-title">WLA EMPLOYMENT GROUP MANAGES COMPLIANCE ACROSS EVERY JURISDICTION YOUR TEAM OPERATES IN.</div>
								<p class="wla-employment-gc-body">For General Counsel managing international HR teams, the employment law compliance burden across multiple jurisdictions has never been greater — 2025 and 2026 have brought more significant employment law changes than any equivalent period in the past decade.</p>
								<p class="wla-employment-gc-body">WLA Employment Group co-practices all cross-border employment matters through the same co-practice framework — one brief, specialist employment lawyers in every relevant jurisdiction, one WLA coordination layer. And the checklist on the left is just the start.</p>
								<div class="wla-employment-gc-features">
									<div class="wla-employment-gef">Cross-jurisdiction employment audit — current compliance status in every operating country</div>
									<div class="wla-employment-gef">Employment contract template library — jurisdiction-specific, WLA-reviewed</div>
									<div class="wla-employment-gef">Redundancy programme planning across all jurisdictions simultaneously</div>
									<div class="wla-employment-gef">Executive arrangement review — are your non-competes enforceable everywhere you need them to be?</div>
								</div>
								<div class="wla-employment-gc-buttons">
									<a href="wla-specialist.html" class="wla-employment-btn-ink">BRIEF WLA EMPLOYMENT — 48H →</a>
									<a href="wla-page-forgc.html" class="wla-employment-btn-bdr">WLA FOR GENERAL COUNSEL</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: EMPLOYMENT IN M&A                                   -->
			<!-- ============================================================ -->
			<div class="wla-employment-ma-bg">
				<section class="wla-employment-section wla-employment-section--dark wla-employment-animate">
					<div class="wla-employment-container">
						<div class="wla-employment-eyebrow-dark">EMPLOYMENT IN M&amp;A</div>
						<h2 class="wla-employment-heading-dark">EMPLOYMENT ISSUES THAT KILL<br>DEALS. WLA CATCHES THEM EARLY.</h2>
						
						<div class="wla-employment-ma-grid">
							<div class="wla-employment-ma-card">
								<div class="wla-employment-mac-n">PRE-SIGNING</div>
								<div class="wla-employment-mac-title">EMPLOYMENT DUE DILIGENCE</div>
								<p class="wla-employment-mac-desc">Workforce risk assessment, undisclosed liabilities, pension deficits, Works Council obligations, and employment claims — identified before you sign.</p>
								<div class="wla-employment-mac-badge">CO-PRACTICE ACTIVE</div>
							</div>
							<div class="wla-employment-ma-card">
								<div class="wla-employment-mac-n">SIGNING TO COMPLETION</div>
								<div class="wla-employment-mac-title">INFORMATION &amp; CONSULTATION</div>
								<p class="wla-employment-mac-desc">Works Council, employee representative, and statutory consultation obligations in every relevant jurisdiction — managed in parallel with the deal timeline.</p>
								<div class="wla-employment-mac-badge">PARALLEL PROCESS</div>
							</div>
							<div class="wla-employment-ma-card">
								<div class="wla-employment-mac-n">ON COMPLETION</div>
								<div class="wla-employment-mac-title">TRANSFER OF EMPLOYMENT</div>
								<p class="wla-employment-mac-desc">TUPE, Article 3, and equivalent transfer regimes in every jurisdiction. Employee notification, contract variations, and terms harmonisation.</p>
								<div class="wla-employment-mac-badge">COMPLETION DAY</div>
							</div>
							<div class="wla-employment-ma-card">
								<div class="wla-employment-mac-n">POST-COMPLETION</div>
								<div class="wla-employment-mac-title">INTEGRATION &amp; HARMONISATION</div>
								<p class="wla-employment-mac-desc">Post-completion workforce harmonisation — terms and conditions, benefits alignment, collective agreement analysis, and culture integration support.</p>
								<div class="wla-employment-mac-badge">ONGOING</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- ============================================================ -->
			<!-- SECTION: CTA BAND                                             -->
			<!-- ============================================================ -->
			<div class="wla-employment-cta-band">
				<div class="wla-employment-cta-title">BRIEF WLA ON YOUR CROSS-BORDER EMPLOYMENT MATTER. SPECIALIST IN 48 HOURS.</div>
				<div class="wla-employment-cta-buttons">
					<a href="wla-specialist.html" class="wla-employment-btn-white">FIND AN EMPLOYMENT SPECIALIST</a>
					<a href="wla-how-it-works.html" class="wla-employment-btn-ghost-white">HOW CO-PRACTICE WORKS</a>
				</div>
			</div>

		</div>
		<!-- END WLA EMPLOYMENT PAGE WRAPPER -->

		<?php
		return ob_get_clean();
	}
}
