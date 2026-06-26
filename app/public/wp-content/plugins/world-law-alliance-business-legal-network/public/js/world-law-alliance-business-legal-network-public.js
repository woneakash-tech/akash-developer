/**
 * WLA Header JavaScript - Complete Fixed Version v3
 */

(function () {
    'use strict';

    /* ── helper: get header bottom in px ── */
    function hdrBottom() {
        var h = document.getElementById('wla-hdr');
        return h ? Math.round(h.getBoundingClientRect().bottom) : 64;
    }

    /* ── set mega top on all panels ── */
    function setMegaTop() {
        var top = hdrBottom();
        document.querySelectorAll('.wlanav .mega').forEach(function (m) {
            m.style.setProperty('top', top + 'px', 'important');
        });
        var bd = document.getElementById('wla-bdo');
        if (bd) bd.style.setProperty('top', top + 'px', 'important');
    }

    function wlaInit() {

        /* ── SCROLL SHADOW ── */
        var hdr = document.getElementById('wla-hdr');
        if (hdr) {
            window.addEventListener('scroll', function () {
                hdr.classList.toggle('scrolled', window.pageYOffset > 2);
                setMegaTop();          /* keep panel aligned while scrolling */
            }, { passive: true });
        }

        /* run once on load */
        setMegaTop();
        window.addEventListener('resize', setMegaTop, { passive: true });

        /* ── DESKTOP MEGA ── */
        var current   = null;
        var closeTimer = null;
        var bd        = document.getElementById('wla-bdo');

        function openPanel(id) {
            clearTimeout(closeTimer);
            if (current === id) return;
            closeAll(true);            /* silent close */
            current = id;

            setMegaTop();              /* ← recalculate before showing */

            var panel = document.getElementById('wla-panel-' + id);
            if (panel) panel.classList.add('on');
            if (bd) bd.classList.add('on');

            document.querySelectorAll('.wlanav .wla-ni[data-id]').forEach(function (ni) {
                if (ni.getAttribute('data-id') === id) {
                    ni.classList.add('open');
                    var nb = ni.querySelector('.wla-nb');
                    if (nb) nb.setAttribute('aria-expanded', 'true');
                }
            });
        }

        function scheduleClose() {
            closeTimer = setTimeout(closeAll, 180);
        }

        function closeAll(silent) {
            clearTimeout(closeTimer);
            closeTimer = null;
            var id = current;
            current = null;
            if (id) {
                var panel = document.getElementById('wla-panel-' + id);
                if (panel) panel.classList.remove('on');
            }
            if (bd) bd.classList.remove('on');
            document.querySelectorAll('.wlanav .wla-ni').forEach(function (ni) {
                ni.classList.remove('open');
                var nb = ni.querySelector('.wla-nb');
                if (nb) nb.setAttribute('aria-expanded', 'false');
            });
        }

        /* nav item events */
        document.querySelectorAll('.wlanav .wla-ni[data-id]').forEach(function (ni) {
            var id = ni.getAttribute('data-id');
            ni.addEventListener('mouseenter', function () { openPanel(id); });
            ni.addEventListener('mouseleave', scheduleClose);

            var nb = ni.querySelector('.wla-nb');
            if (nb) {
                nb.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    current === id ? closeAll() : openPanel(id);
                });
            }
        });

        /* keep open while inside panel */
        document.querySelectorAll('.wlanav .mega').forEach(function (panel) {
            panel.addEventListener('mouseenter', function () { clearTimeout(closeTimer); });
            panel.addEventListener('mouseleave', scheduleClose);
        });

        /* backdrop / outside click */
        if (bd) bd.addEventListener('click', closeAll);
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.wlanav')) closeAll();
        });

        /* Escape */
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { closeAll(); wlaDrawerCloseFn(); }
        });

        /* ── MOBILE DRAWER ── */
        var drawerOpen = false;

        function wlaDrawerOpenFn() {
            var d = document.getElementById('wla-drawer');
            var hm = document.getElementById('wla-hamburger');
            if (d) d.classList.add('open');
            if (hm) { hm.classList.add('on'); hm.setAttribute('aria-expanded', 'true'); }
            document.body.style.overflow = 'hidden';
            drawerOpen = true;
        }

        function wlaDrawerCloseFn() {
            var d = document.getElementById('wla-drawer');
            var hm = document.getElementById('wla-hamburger');
            if (d) d.classList.remove('open');
            if (hm) { hm.classList.remove('on'); hm.setAttribute('aria-expanded', 'false'); }
            document.body.style.overflow = '';
            drawerOpen = false;
        }

        window.wlaDrawerToggle = function () { drawerOpen ? wlaDrawerCloseFn() : wlaDrawerOpenFn(); };
        window.wlaDrawerClose  = wlaDrawerCloseFn;

        /* ── ACCORDION ── */
        var drawerBody = document.querySelector('.wlanav .drawer-body');
        if (drawerBody) {
            drawerBody.addEventListener('click', function (e) {
                var btn = e.target.closest('.dacc-head');
                if (!btn) return;
                var dacc = btn.closest('.dacc');
                if (!dacc) return;
                var body = dacc.querySelector('.dacc-body');
                if (!body) return;

                var isOpen = body.classList.contains('open');
                drawerBody.querySelectorAll('.dacc-body').forEach(function (b) { b.classList.remove('open'); });
                drawerBody.querySelectorAll('.dacc-head').forEach(function (h) { h.classList.remove('open'); });
                if (!isOpen) { body.classList.add('open'); btn.classList.add('open'); }
            });
        }

        window.addEventListener('resize', function () {
            if (window.innerWidth > 1024) wlaDrawerCloseFn();
        });

    } /* end wlaInit */

    /* safe init */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', wlaInit);
    } else {
        wlaInit();
    }

})();
/* ════════════════════════════════════════════════════════════
   WLA FOOTER — SCRIPT
   File: wla-footer.js
   Goes with: wla-footer.css + wla-footer-shortcode.php
   ════════════════════════════════════════════════════════════
   NOTE: The ticker's "pause on hover" effect is handled purely
   in CSS:
       .sk-ticker-track:hover { animation-play-state: paused; }

   This file is the JS entry point for the footer. Nothing here
   is required for the footer to render or work — it's a clean
   place to add behaviour later (analytics clicks, mobile menu
   toggles, etc.) without touching the PHP template.
   ════════════════════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', function () {
  // Example hook point — currently does nothing, safe to extend.
  // var ticker = document.querySelector('.sk-ticker-track');
});
/**
 * WLA Home Page Scripts
 * World Law Alliance Business & Legal Network
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all home page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * NAVIGATION SCROLL EFFECT
         * Adds background to navigation on scroll
         * ============================================================ */
        var $nav = $('#wlaNav');
        if ($nav.length) {
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 60) {
                    $nav.addClass('wla-scrolled');
                } else {
                    $nav.removeClass('wla-scrolled');
                }
            });
        }

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-visible');
                    }
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -50px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-animate').addClass('wla-visible');
        }

        /**
         * ============================================================
         * TICKER PAUSE ON HOVER
         * Pauses scrolling ticker when user hovers
         * ============================================================ */
        var $tickerTrack = $('.wla-ticker-track');
        if ($tickerTrack.length) {
            $tickerTrack.on('mouseenter', function() {
                $(this).css('animation-play-state', 'paused');
            }).on('mouseleave', function() {
                $(this).css('animation-play-state', 'running');
            });
        }

        /**
         * ============================================================
         * JURISDICTION TICKER PAUSE ON HOVER
         * Pauses jurisdiction marquee when user hovers
         * ============================================================ */
        var $jurTrack = $('.wla-jur-track');
        if ($jurTrack.length) {
            $jurTrack.on('mouseenter', function() {
                $(this).css('animation-play-state', 'paused');
            }).on('mouseleave', function() {
                $(this).css('animation-play-state', 'running');
            });
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutCubic');
            }
        });

        /**
         * ============================================================
         * COUNTER ANIMATION FOR STATS
         * Animates numbers when they come into view
         * ============================================================ */
        var countersAnimated = false;

        function animateCounters() {
            if (countersAnimated) return;

            var $counters = $('.wla-hstat-n');
            if ($counters.length && isElementInViewport($counters.first())) {
                countersAnimated = true;
                $counters.each(function() {
                    var $this = $(this);
                    var text = $this.text().trim();
                    var num = parseInt(text.replace(/[^0-9]/g, ''));
                    var suffix = text.replace(/[0-9]/g, '');

                    if (!isNaN(num)) {
                        $this.prop('Counter', 0);
                        $this.animate({
                            Counter: num
                        }, {
                            duration: 2000,
                            easing: 'swing',
                            step: function(now) {
                                var val = Math.ceil(now);
                                $this.text(val + suffix);
                            },
                            complete: function() {
                                $this.text(num + suffix);
                            }
                        });
                    }
                });
            }
        }

        /**
         * Helper: Check if element is in viewport
         */
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.bottom >= 0
            );
        }

        // Check counters on scroll and load
        $(window).on('scroll', animateCounters);
        $(window).on('load', function() {
            setTimeout(animateCounters, 500);
        });

        /**
         * ============================================================
         * PARALLAX EFFECT FOR HERO
         * Subtle parallax on hero background
         * ============================================================ */
        var $heroImg = $('.wla-hero-img');
        if ($heroImg.length && $(window).width() > 768) {
            $(window).on('scroll', function() {
                var scrollY = $(window).scrollTop();
                var heroHeight = $('.wla-hero').height();
                if (scrollY < heroHeight) {
                    var translate = scrollY * 0.3;
                    $heroImg.css('transform', 'translateY(' + translate + 'px)');
                }
            });
        }

        /**
         * ============================================================
         * VIDEO / IMAGE LAZY LOADING
         * ============================================================ */
        var lazyImages = document.querySelectorAll('img[data-src]');
        if ('IntersectionObserver' in window) {
            var lazyObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        lazyObserver.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(function(img) {
                lazyObserver.observe(img);
            });
        } else {
            // Fallback: load all images
            lazyImages.forEach(function(img) {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
        }

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-practice-card').on('click', function() {
            var practiceName = $(this).find('.wla-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'practice_click', {
                    'practice': practiceName,
                    'location': 'homepage'
                });
            }
            // Add custom analytics tracking here
            console.log('Practice clicked: ' + practiceName);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-btn-primary, .wla-btn-ghost, .wla-btn-ink, .wla-btn-ink-light, .wla-btn-bdr, .wla-btn-bdr-light').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'cta_click', {
                    'button': btnText,
                    'location': 'homepage'
                });
            }
            console.log('CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-practice-card, .wla-corridor-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Home Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-animate').each(function() {
            if (isElementInViewport(this)) {
                $(this).addClass('wla-visible');
            }
        });

        // Trigger counter animation after load
        setTimeout(function() {
            animateCounters();
        }, 300);
    });

})(jQuery);
/**
 * WLA Tax Page Scripts
 * World Law Alliance International Tax Group
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all tax page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-tax-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-tax-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-tax-animate').addClass('wla-tax-visible');
        }

        /**
         * ============================================================
         * LIVE TAX INTELLIGENCE - AUTO REFRESH
         * Simulates live data updates for tax intelligence
         * ============================================================ */
        var $intelRows = $('.wla-tax-intel-row');
        if ($intelRows.length) {
            var refreshInterval = setInterval(function() {
                // Simulate rate changes for demo
                $intelRows.each(function() {
                    var $rate = $(this).find('.wla-tax-intel-rate');
                    var $change = $(this).find('.wla-tax-intel-change');
                    
                    // Random small fluctuation for demo
                    if (Math.random() > 0.7) {
                        var currentText = $rate.text();
                        var num = parseFloat(currentText.replace(/[^0-9.]/g, ''));
                        if (!isNaN(num)) {
                            var fluctuation = (Math.random() - 0.5) * 0.5;
                            var newNum = num + fluctuation;
                            if (newNum > 0) {
                                $rate.text(newNum.toFixed(1) + '%');
                                $change.text('Updated ' + new Date().toLocaleTimeString());
                            }
                        }
                    }
                });
            }, 8000);

            // Clear interval on page unload
            $(window).on('beforeunload', function() {
                clearInterval(refreshInterval);
            });
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * BEPS ROW HOVER EFFECT
         * Adds interactive feedback to BEPS rows
         * ============================================================ */
        $('.wla-tax-beps-row').on('mouseenter', function() {
            $(this).css('background', 'rgba(255,255,255,0.06)');
        }).on('mouseleave', function() {
            $(this).css('background', '');
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-tax-pillar-card, .wla-tax-beps-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-tax-btn-ink, .wla-tax-btn-bdr, .wla-tax-btn-white, .wla-tax-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tax_cta_click', {
                    'button': btnText,
                    'location': 'tax_page'
                });
            }
            console.log('Tax CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * COPYRIGHT YEAR UPDATE
         * Auto-updates footer copyright year
         * ============================================================ */
        var $copy = $('.wla-tax-footer-copy');
        if ($copy.length) {
            var year = new Date().getFullYear();
            $copy.text('© ' + year + ' WORLD LAW ALLIANCE · ALL RIGHTS RESERVED');
        }

        console.log('WLA Tax Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-tax-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-tax-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Transactional & M&A Page Scripts
 * World Law Alliance Transactional Practice
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * ============================================================
     * ACCORDION TOGGLE FUNCTION
     * Toggles accordion rows open/closed
     * ============================================================ */
    window.wlaTxnToggle = function(row) {
        var isOpen = $(row).hasClass('wla-txn-open');
        
        // Close all open rows
        $('.wla-txn-accordion-row.wla-txn-open').each(function() {
            $(this).removeClass('wla-txn-open');
            $(this).find('.wla-txn-accordion-body').css('max-height', '0');
        });
        
        // Open clicked row if it was closed
        if (!isOpen) {
            $(row).addClass('wla-txn-open');
            var body = $(row).find('.wla-txn-accordion-body');
            body.css('max-height', body[0].scrollHeight + 'px');
        }
    };

    /**
     * DOM Ready Handler
     * Initializes all transactional page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-txn-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-txn-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-txn-animate').addClass('wla-txn-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-txn-corridor-card').on('click', function() {
            var route = $(this).find('.wla-txn-cc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_click', {
                    'corridor': route,
                    'location': 'transactional_page'
                });
            }
            console.log('Corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CASE STUDY CARD CLICK TRACKING
         * Logs case study clicks for analytics
         * ============================================================ */
        $('.wla-txn-case-card').on('click', function() {
            var title = $(this).find('.wla-txn-case-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'case_study_click', {
                    'case': title,
                    'location': 'transactional_page'
                });
            }
            console.log('Case study clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-txn-btn-ink, .wla-txn-btn-bdr, .wla-txn-btn-white, .wla-txn-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'txn_cta_click', {
                    'button': btnText,
                    'location': 'transactional_page'
                });
            }
            console.log('Transactional CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-txn-accordion-head, .wla-txn-corridor-card, .wla-txn-case-card, .wla-txn-related-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * ACCORDION KEYBOARD NAVIGATION
         * Arrow keys for accordion navigation
         * ============================================================ */
        $('.wla-txn-accordion-head').on('keydown', function(e) {
            var $row = $(this).closest('.wla-txn-accordion-row');
            var $rows = $('.wla-txn-accordion-row');
            var index = $rows.index($row);
            
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (index < $rows.length - 1) {
                    $rows.eq(index + 1).find('.wla-txn-accordion-head').focus();
                }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (index > 0) {
                    $rows.eq(index - 1).find('.wla-txn-accordion-head').focus();
                }
            } else if (e.key === 'Home') {
                e.preventDefault();
                $rows.first().find('.wla-txn-accordion-head').focus();
            } else if (e.key === 'End') {
                e.preventDefault();
                $rows.last().find('.wla-txn-accordion-head').focus();
            }
        });

        /**
         * ============================================================
         * COPYRIGHT YEAR UPDATE
         * Auto-updates footer copyright year
         * ============================================================ */
        var $copy = $('.wla-txn-footer-copy');
        if ($copy.length) {
            var year = new Date().getFullYear();
            $copy.text('© ' + year + ' WORLD LAW ALLIANCE · ALL RIGHTS RESERVED');
        }

        console.log('WLA Transactional Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-txn-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-txn-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Compliance & Regulatory Page Scripts
 * World Law Alliance Compliance Practice
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all compliance page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-compliance-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-compliance-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-compliance-animate').addClass('wla-compliance-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * COMPLIANCE CARD CLICK TRACKING
         * Logs compliance card clicks for analytics
         * ============================================================ */
        $('.wla-compliance-card').on('click', function() {
            var title = $(this).find('.wla-compliance-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'compliance_card_click', {
                    'capability': title,
                    'location': 'compliance_page'
                });
            }
            console.log('Compliance capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-compliance-btn-ink, .wla-compliance-btn-bdr, .wla-compliance-btn-white, .wla-compliance-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'compliance_cta_click', {
                    'button': btnText,
                    'location': 'compliance_page'
                });
            }
            console.log('Compliance CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-compliance-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Compliance Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-compliance-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-compliance-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Contract Solutions Page Scripts
 * World Law Alliance Contract Practice
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all contract page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-contract-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-contract-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-contract-animate').addClass('wla-contract-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CONTRACT CARD CLICK TRACKING
         * Logs contract card clicks for analytics
         * ============================================================ */
        $('.wla-contract-card').on('click', function() {
            var title = $(this).find('.wla-contract-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'contract_card_click', {
                    'capability': title,
                    'location': 'contract_page'
                });
            }
            console.log('Contract capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-contract-btn-ink, .wla-contract-btn-bdr, .wla-contract-btn-white, .wla-contract-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'contract_cta_click', {
                    'button': btnText,
                    'location': 'contract_page'
                });
            }
            console.log('Contract CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-contract-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Contract Solutions Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-contract-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-contract-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Global Dispute Group Page Scripts
 * World Law Alliance Disputes Practice
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all disputes page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-disputes-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-disputes-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-disputes-animate').addClass('wla-disputes-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * DISPUTES CARD CLICK TRACKING
         * Logs disputes card clicks for analytics
         * ============================================================ */
        $('.wla-disputes-card').on('click', function() {
            var title = $(this).find('.wla-disputes-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'disputes_card_click', {
                    'capability': title,
                    'location': 'disputes_page'
                });
            }
            console.log('Disputes capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-disputes-btn-ink, .wla-disputes-btn-bdr, .wla-disputes-btn-white, .wla-disputes-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'disputes_cta_click', {
                    'button': btnText,
                    'location': 'disputes_page'
                });
            }
            console.log('Disputes CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-disputes-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Global Dispute Group Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-disputes-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-disputes-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Energy & Infrastructure Page Scripts
 * World Law Alliance Energy Practice
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all energy page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-energy-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-energy-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-energy-animate').addClass('wla-energy-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * ENERGY CARD CLICK TRACKING
         * Logs energy card clicks for analytics
         * ============================================================ */
        $('.wla-energy-card').on('click', function() {
            var title = $(this).find('.wla-energy-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'energy_card_click', {
                    'capability': title,
                    'location': 'energy_page'
                });
            }
            console.log('Energy capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR ROW CLICK TRACKING
         * Logs corridor row clicks for analytics
         * ============================================================ */
        $('.wla-energy-row').on('click', function() {
            var title = $(this).find('.wla-energy-row-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'energy_corridor_click', {
                    'corridor': title,
                    'location': 'energy_page'
                });
            }
            console.log('Energy corridor clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-energy-btn-ink, .wla-energy-btn-bdr, .wla-energy-btn-white, .wla-energy-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'energy_cta_click', {
                    'button': btnText,
                    'location': 'energy_page'
                });
            }
            console.log('Energy CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-energy-card, .wla-energy-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Energy & Infrastructure Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-energy-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-energy-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA In-House Connect Page Scripts
 * World Law Alliance In-House Practice
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all in-house connect page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-inhouse-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-inhouse-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-inhouse-animate').addClass('wla-inhouse-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * IN-HOUSE CARD CLICK TRACKING
         * Logs in-house card clicks for analytics
         * ============================================================ */
        $('.wla-inhouse-card').on('click', function() {
            var title = $(this).find('.wla-inhouse-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'inhouse_card_click', {
                    'capability': title,
                    'location': 'inhouse_page'
                });
            }
            console.log('In-House capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-inhouse-btn-ink, .wla-inhouse-btn-bdr, .wla-inhouse-btn-white, .wla-inhouse-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'inhouse_cta_click', {
                    'button': btnText,
                    'location': 'inhouse_page'
                });
            }
            console.log('In-House CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-inhouse-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA In-House Connect Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-inhouse-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-inhouse-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Neutrals Page Scripts
 * World Law Alliance Neutrals / TheNeutrals.ORG™
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all neutrals page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-neutrals-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-neutrals-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-neutrals-animate').addClass('wla-neutrals-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * NEUTRALS CARD CLICK TRACKING
         * Logs neutrals card clicks for analytics
         * ============================================================ */
        $('.wla-neutrals-card').on('click', function() {
            var title = $(this).find('.wla-neutrals-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'neutrals_card_click', {
                    'capability': title,
                    'location': 'neutrals_page'
                });
            }
            console.log('Neutrals capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-neutrals-btn-ink, .wla-neutrals-btn-bdr, .wla-neutrals-btn-white, .wla-neutrals-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'neutrals_cta_click', {
                    'button': btnText,
                    'location': 'neutrals_page'
                });
            }
            console.log('Neutrals CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-neutrals-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Neutrals Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-neutrals-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-neutrals-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Practices & Capabilities Page Scripts
 * World Law Alliance Practices Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * ============================================================
     * ACCORDION TOGGLE FUNCTION
     * Toggles practice accordion rows open/closed
     * ============================================================ */
    window.wlaPracticesToggle = function(row) {
        var isOpen = $(row).hasClass('wla-practices-open');
        
        // Close all open rows
        $('.wla-practices-pb-row.wla-practices-open').each(function() {
            $(this).removeClass('wla-practices-open');
            $(this).find('.wla-practices-pb-arrow').text('+');
            $(this).find('.wla-practices-pb-arrow').css('transform', 'rotate(0deg)');
        });
        
        // Open clicked row if it was closed
        if (!isOpen) {
            $(row).addClass('wla-practices-open');
            $(row).find('.wla-practices-pb-arrow').text('+');
            $(row).find('.wla-practices-pb-arrow').css('transform', 'rotate(45deg)');
        }
    };

    /**
     * DOM Ready Handler
     * Initializes all practices page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-practices-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-practices-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-practices-animate').addClass('wla-practices-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice clicks for analytics
         * ============================================================ */
        $('.wla-practices-pb-row').on('click', function() {
            var name = $(this).find('.wla-practices-pb-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'practice_click', {
                    'practice': name,
                    'location': 'practices_page'
                });
            }
            console.log('Practice clicked: ' + name);
        });

        /**
         * ============================================================
         * CORRIDOR ROW CLICK TRACKING
         * Logs corridor clicks for analytics
         * ============================================================ */
        $('.wla-practices-corridor-table tbody tr').on('click', function() {
            var from = $(this).find('.wla-practices-ct-from').text().trim();
            var to = $(this).find('.wla-practices-ct-to').text().trim();
            var corridor = from + ' → ' + to;
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_click', {
                    'corridor': corridor,
                    'location': 'practices_page'
                });
            }
            console.log('Corridor clicked: ' + corridor);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-practices-btn-ink, .wla-practices-btn-bdr, .wla-practices-btn-white, .wla-practices-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'practices_cta_click', {
                    'button': btnText,
                    'location': 'practices_page'
                });
            }
            console.log('Practices CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-practices-pb-head, .wla-practices-corridor-table tbody tr').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * ACCORDION KEYBOARD NAVIGATION
         * Arrow keys for accordion navigation
         * ============================================================ */
        $('.wla-practices-pb-head').on('keydown', function(e) {
            var $row = $(this).closest('.wla-practices-pb-row');
            var $rows = $('.wla-practices-pb-row');
            var index = $rows.index($row);
            
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (index < $rows.length - 1) {
                    $rows.eq(index + 1).find('.wla-practices-pb-head').focus();
                }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (index > 0) {
                    $rows.eq(index - 1).find('.wla-practices-pb-head').focus();
                }
            } else if (e.key === 'Home') {
                e.preventDefault();
                $rows.first().find('.wla-practices-pb-head').focus();
            } else if (e.key === 'End') {
                e.preventDefault();
                $rows.last().find('.wla-practices-pb-head').focus();
            }
        });

        console.log('WLA Practices Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-practices-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-practices-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Privacy Policy Page Scripts
 * World Law Alliance Privacy Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all privacy page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * COPYRIGHT YEAR UPDATE
         * Auto-updates footer copyright year if footer exists
         * ============================================================ */
        var $copy = $('.wla-privacy-wrapper .wla-footer-copy');
        if ($copy.length) {
            var year = new Date().getFullYear();
            $copy.text('© ' + year + ' WORLD LAW ALLIANCE · ALL RIGHTS RESERVED');
        }

        console.log('WLA Privacy Page initialized successfully.');
    });

})(jQuery);
/**
 * WLA Africa & Middle East Regional Hub Scripts
 * World Law Alliance Africa & ME Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Africa & ME page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-africa-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-africa-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-africa-animate').addClass('wla-africa-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * JURISDICTION CARD CLICK TRACKING
         * Logs jurisdiction card clicks for analytics
         * ============================================================ */
        $('.wla-africa-jurisdiction-card').on('click', function() {
            var name = $(this).find('.wla-africa-jurisdiction-card-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'africa_jurisdiction_click', {
                    'jurisdiction': name,
                    'location': 'africa_me_page'
                });
            }
            console.log('Jurisdiction clicked: ' + name);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-africa-corridor-card').on('click', function() {
            var title = $(this).find('.wla-africa-corridor-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'africa_corridor_click', {
                    'corridor': title,
                    'location': 'africa_me_page'
                });
            }
            console.log('Corridor clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-africa-btn-white, .wla-africa-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'africa_cta_click', {
                    'button': btnText,
                    'location': 'africa_me_page'
                });
            }
            console.log('Africa & ME CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-africa-jurisdiction-card, .wla-africa-corridor-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Africa & Middle East Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-africa-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-africa-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Americas Regional Hub Scripts
 * World Law Alliance Americas Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Americas page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-americas-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-americas-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-americas-animate').addClass('wla-americas-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * JURISDICTION CARD CLICK TRACKING
         * Logs jurisdiction card clicks for analytics
         * ============================================================ */
        $('.wla-americas-jurisdiction-card').on('click', function() {
            var name = $(this).find('.wla-americas-jurisdiction-card-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'americas_jurisdiction_click', {
                    'jurisdiction': name,
                    'location': 'americas_page'
                });
            }
            console.log('Jurisdiction clicked: ' + name);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-americas-corridor-card').on('click', function() {
            var title = $(this).find('.wla-americas-corridor-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'americas_corridor_click', {
                    'corridor': title,
                    'location': 'americas_page'
                });
            }
            console.log('Corridor clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-americas-btn-white, .wla-americas-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'americas_cta_click', {
                    'button': btnText,
                    'location': 'americas_page'
                });
            }
            console.log('Americas CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-americas-jurisdiction-card, .wla-americas-corridor-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Americas Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-americas-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-americas-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Asia Pacific Regional Hub Scripts
 * World Law Alliance Asia Pacific Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Asia Pacific page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-asia-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-asia-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-asia-animate').addClass('wla-asia-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * JURISDICTION CARD CLICK TRACKING
         * Logs jurisdiction card clicks for analytics
         * ============================================================ */
        $('.wla-asia-jurisdiction-card').on('click', function() {
            var name = $(this).find('.wla-asia-jurisdiction-card-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'asia_jurisdiction_click', {
                    'jurisdiction': name,
                    'location': 'asia_pacific_page'
                });
            }
            console.log('Jurisdiction clicked: ' + name);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-asia-corridor-card').on('click', function() {
            var title = $(this).find('.wla-asia-corridor-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'asia_corridor_click', {
                    'corridor': title,
                    'location': 'asia_pacific_page'
                });
            }
            console.log('Corridor clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-asia-btn-white, .wla-asia-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'asia_cta_click', {
                    'button': btnText,
                    'location': 'asia_pacific_page'
                });
            }
            console.log('Asia Pacific CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-asia-jurisdiction-card, .wla-asia-corridor-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Asia Pacific Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-asia-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-asia-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Asia Pacific Regional Page Scripts
 * World Law Alliance Asia Pacific Region
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Asia Pacific regional page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-asia-region-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-asia-region-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-asia-region-animate').addClass('wla-asia-region-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * JURISDICTION ITEM CLICK TRACKING
         * Logs jurisdiction clicks for analytics
         * ============================================================ */
        $('.wla-asia-region-jurisdiction-item').on('click', function() {
            var name = $(this).text().replace('→', '').trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'asia_region_jurisdiction_click', {
                    'jurisdiction': name,
                    'location': 'asia_region_page'
                });
            }
            console.log('Jurisdiction clicked: ' + name);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-asia-region-btn-white, .wla-asia-region-btn-ghost-white, .wla-asia-region-btn-ink, .wla-asia-region-btn-bdr').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'asia_region_cta_click', {
                    'button': btnText,
                    'location': 'asia_region_page'
                });
            }
            console.log('Asia Region CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-asia-region-jurisdiction-item').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Asia Pacific Regional Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-asia-region-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-asia-region-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Europe Regional Hub Scripts
 * World Law Alliance Europe Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Europe page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-europe-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-europe-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-europe-animate').addClass('wla-europe-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * JURISDICTION CARD CLICK TRACKING
         * Logs jurisdiction card clicks for analytics
         * ============================================================ */
        $('.wla-europe-jurisdiction-card').on('click', function() {
            var name = $(this).find('.wla-europe-jurisdiction-card-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'europe_jurisdiction_click', {
                    'jurisdiction': name,
                    'location': 'europe_page'
                });
            }
            console.log('Jurisdiction clicked: ' + name);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-europe-corridor-card').on('click', function() {
            var title = $(this).find('.wla-europe-corridor-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'europe_corridor_click', {
                    'corridor': title,
                    'location': 'europe_page'
                });
            }
            console.log('Corridor clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-europe-btn-white, .wla-europe-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'europe_cta_click', {
                    'button': btnText,
                    'location': 'europe_page'
                });
            }
            console.log('Europe CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-europe-jurisdiction-card, .wla-europe-corridor-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Europe Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-europe-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-europe-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Charities & Non-Profits Sector Scripts
 * World Law Alliance Charities Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all charities page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-charities-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-charities-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-charities-animate').addClass('wla-charities-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CHARITIES CARD CLICK TRACKING
         * Logs charities card clicks for analytics
         * ============================================================ */
        $('.wla-charities-card').on('click', function() {
            var title = $(this).find('.wla-charities-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'charities_card_click', {
                    'capability': title,
                    'location': 'charities_page'
                });
            }
            console.log('Charities capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-charities-btn-ink, .wla-charities-btn-bdr, .wla-charities-btn-white, .wla-charities-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'charities_cta_click', {
                    'button': btnText,
                    'location': 'charities_page'
                });
            }
            console.log('Charities CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-charities-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Charities & Non-Profits Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-charities-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-charities-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Family Office Sector Scripts
 * World Law Alliance Family Office Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all family office page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-family-office-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-family-office-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-family-office-animate').addClass('wla-family-office-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * FAMILY OFFICE CARD CLICK TRACKING
         * Logs family office card clicks for analytics
         * ============================================================ */
        $('.wla-family-office-card').on('click', function() {
            var title = $(this).find('.wla-family-office-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'family_office_card_click', {
                    'capability': title,
                    'location': 'family_office_page'
                });
            }
            console.log('Family Office capability clicked: ' + title);
        });

        /**
         * ============================================================
         * MARKET ROW CLICK TRACKING
         * Logs market row clicks for analytics
         * ============================================================ */
        $('.wla-family-office-market-row').on('click', function() {
            var title = $(this).find('.wla-family-office-market-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'family_office_market_click', {
                    'market': title,
                    'location': 'family_office_page'
                });
            }
            console.log('Family Office market clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-family-office-btn-ink, .wla-family-office-btn-bdr, .wla-family-office-btn-white, .wla-family-office-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'family_office_cta_click', {
                    'button': btnText,
                    'location': 'family_office_page'
                });
            }
            console.log('Family Office CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-family-office-card, .wla-family-office-market-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Family Office Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-family-office-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-family-office-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Fashion & Luxury Sector Scripts
 * World Law Alliance Fashion Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all fashion page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-fashion-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-fashion-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-fashion-animate').addClass('wla-fashion-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * FASHION CARD CLICK TRACKING
         * Logs fashion card clicks for analytics
         * ============================================================ */
        $('.wla-fashion-card').on('click', function() {
            var title = $(this).find('.wla-fashion-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'fashion_card_click', {
                    'capability': title,
                    'location': 'fashion_page'
                });
            }
            console.log('Fashion capability clicked: ' + title);
        });

        /**
         * ============================================================
         * MARKET ROW CLICK TRACKING
         * Logs market row clicks for analytics
         * ============================================================ */
        $('.wla-fashion-market-row').on('click', function() {
            var title = $(this).find('.wla-fashion-market-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'fashion_market_click', {
                    'market': title,
                    'location': 'fashion_page'
                });
            }
            console.log('Fashion market clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-fashion-btn-ink, .wla-fashion-btn-bdr, .wla-fashion-btn-white, .wla-fashion-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'fashion_cta_click', {
                    'button': btnText,
                    'location': 'fashion_page'
                });
            }
            console.log('Fashion CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-fashion-card, .wla-fashion-market-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Fashion & Luxury Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-fashion-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-fashion-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Founders & Entrepreneurs Sector Scripts
 * World Law Alliance Founders Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * ============================================================
     * CHECKLIST TOGGLE FUNCTION
     * Toggles checklist items between done/todo states
     * ============================================================ */
    window.wlaFoundersToggleCheck = function(item) {
        var check = item.querySelector('.wla-founders-cl-check');
        var text = item.querySelector('.wla-founders-cl-text');
        
        var isDone = check.classList.contains('wla-founders-cl-check-done');
        
        // Toggle check state
        check.classList.toggle('wla-founders-cl-check-done', !isDone);
        check.classList.toggle('wla-founders-cl-check-todo', isDone);
        text.classList.toggle('wla-founders-cl-text-done', !isDone);
    };

    /**
     * DOM Ready Handler
     * Initializes all founders page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-founders-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-founders-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-founders-animate').addClass('wla-founders-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CHECKLIST ITEM CLICK TRACKING
         * Logs checklist item clicks for analytics
         * ============================================================ */
        $('.wla-founders-cl-item').on('click', function() {
            var text = $(this).find('.wla-founders-cl-text').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'founders_checklist_click', {
                    'item': text,
                    'location': 'founders_page'
                });
            }
            console.log('Checklist item clicked: ' + text);
        });

        /**
         * ============================================================
         * MARKET CARD CLICK TRACKING
         * Logs market card clicks for analytics
         * ============================================================ */
        $('.wla-founders-market-card').on('click', function() {
            var country = $(this).find('.wla-founders-mk-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'founders_market_click', {
                    'market': country,
                    'location': 'founders_page'
                });
            }
            console.log('Founders market clicked: ' + country);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-founders-btn-ink, .wla-founders-btn-bdr, .wla-founders-btn-white, .wla-founders-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'founders_cta_click', {
                    'button': btnText,
                    'location': 'founders_page'
                });
            }
            console.log('Founders CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-founders-cl-item, .wla-founders-market-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Founders & Entrepreneurs Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-founders-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-founders-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA High Net Worth Sector Scripts
 * World Law Alliance HNW Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all HNW page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-hnw-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-hnw-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-hnw-animate').addClass('wla-hnw-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * RESIDENCY CARD CLICK TRACKING
         * Logs residency card clicks for analytics
         * ============================================================ */
        $('.wla-hnw-residency-card').on('click', function() {
            var country = $(this).find('.wla-hnw-rc-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hnw_residency_click', {
                    'country': country,
                    'location': 'hnw_page'
                });
            }
            console.log('Residency card clicked: ' + country);
        });

        /**
         * ============================================================
         * DISCRETION ITEM CLICK TRACKING
         * Logs discretion item clicks for analytics
         * ============================================================ */
        $('.wla-hnw-discretion-item').on('click', function() {
            var title = $(this).find('.wla-hnw-di-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hnw_discretion_click', {
                    'item': title,
                    'location': 'hnw_page'
                });
            }
            console.log('Discretion item clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-hnw-btn-ink, .wla-hnw-btn-bdr, .wla-hnw-btn-white, .wla-hnw-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hnw_cta_click', {
                    'button': btnText,
                    'location': 'hnw_page'
                });
            }
            console.log('HNW CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-hnw-residency-card, .wla-hnw-discretion-item').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA High Net Worth Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-hnw-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-hnw-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Institutions & Development Sector Scripts
 * World Law Alliance Institutions Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all institutions page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-institutions-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-institutions-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-institutions-animate').addClass('wla-institutions-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * INSTITUTIONS CARD CLICK TRACKING
         * Logs institutions card clicks for analytics
         * ============================================================ */
        $('.wla-institutions-card').on('click', function() {
            var title = $(this).find('.wla-institutions-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'institutions_card_click', {
                    'capability': title,
                    'location': 'institutions_page'
                });
            }
            console.log('Institutions capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-institutions-btn-ink, .wla-institutions-btn-bdr, .wla-institutions-btn-white, .wla-institutions-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'institutions_cta_click', {
                    'button': btnText,
                    'location': 'institutions_page'
                });
            }
            console.log('Institutions CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-institutions-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Institutions & Development Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-institutions-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-institutions-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Private Equity & Funds Sector Scripts
 * World Law Alliance PE Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all PE page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-pe-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-pe-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-pe-animate').addClass('wla-pe-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * DEAL ROW CLICK TRACKING
         * Logs deal row clicks for analytics
         * ============================================================ */
        $('.wla-pe-deal-row').on('click', function() {
            var title = $(this).find('.wla-pe-dr-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'pe_deal_click', {
                    'deal': title,
                    'location': 'pe_page'
                });
            }
            console.log('PE Deal clicked: ' + title);
        });

        /**
         * ============================================================
         * LIFECYCLE CARD CLICK TRACKING
         * Logs lifecycle card clicks for analytics
         * ============================================================ */
        $('.wla-pe-lc').on('click', function() {
            var stage = $(this).find('.wla-pe-lc-stage').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'pe_lifecycle_click', {
                    'stage': stage,
                    'location': 'pe_page'
                });
            }
            console.log('PE Lifecycle stage clicked: ' + stage);
        });

        /**
         * ============================================================
         * FUND CARD CLICK TRACKING
         * Logs fund card clicks for analytics
         * ============================================================ */
        $('.wla-pe-fund-card').on('click', function() {
            var title = $(this).find('.wla-pe-fg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'pe_fund_click', {
                    'fund': title,
                    'location': 'pe_page'
                });
            }
            console.log('PE Fund clicked: ' + title);
        });

        /**
         * ============================================================
         * MARKET CARD CLICK TRACKING
         * Logs market card clicks for analytics
         * ============================================================ */
        $('.wla-pe-market-card').on('click', function() {
            var country = $(this).find('.wla-pe-mkt-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'pe_market_click', {
                    'market': country,
                    'location': 'pe_page'
                });
            }
            console.log('PE Market clicked: ' + country);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-pe-btn-ink, .wla-pe-btn-bdr, .wla-pe-btn-white, .wla-pe-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'pe_cta_click', {
                    'button': btnText,
                    'location': 'pe_page'
                });
            }
            console.log('PE CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-pe-deal-row, .wla-pe-lc, .wla-pe-fund-card, .wla-pe-market-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Private Equity & Funds Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-pe-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-pe-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Private Clients Sector Scripts
 * World Law Alliance Private Clients Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all private clients page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-private-clients-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-private-clients-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-private-clients-animate').addClass('wla-private-clients-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRIVATE CLIENTS CARD CLICK TRACKING
         * Logs private clients card clicks for analytics
         * ============================================================ */
        $('.wla-private-clients-card').on('click', function() {
            var title = $(this).find('.wla-private-clients-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'private_clients_card_click', {
                    'capability': title,
                    'location': 'private_clients_page'
                });
            }
            console.log('Private Clients capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-private-clients-btn-ink, .wla-private-clients-btn-bdr, .wla-private-clients-btn-white, .wla-private-clients-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'private_clients_cta_click', {
                    'button': btnText,
                    'location': 'private_clients_page'
                });
            }
            console.log('Private Clients CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-private-clients-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Private Clients Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-private-clients-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-private-clients-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Professionals Sector Scripts
 * World Law Alliance Professionals Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all professionals page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-professionals-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-professionals-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-professionals-animate').addClass('wla-professionals-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PROFESSIONALS CARD CLICK TRACKING
         * Logs professionals card clicks for analytics
         * ============================================================ */
        $('.wla-professionals-card').on('click', function() {
            var title = $(this).find('.wla-professionals-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'professionals_card_click', {
                    'capability': title,
                    'location': 'professionals_page'
                });
            }
            console.log('Professionals capability clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-professionals-btn-ink, .wla-professionals-btn-bdr, .wla-professionals-btn-white, .wla-professionals-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'professionals_cta_click', {
                    'button': btnText,
                    'location': 'professionals_page'
                });
            }
            console.log('Professionals CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-professionals-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Professionals Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-professionals-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-professionals-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Technology Sector Scripts
 * World Law Alliance Technology Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all technology page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-tech-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-tech-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-tech-animate').addClass('wla-tech-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * TECH CARD CLICK TRACKING
         * Logs tech card clicks for analytics
         * ============================================================ */
        $('.wla-tech-card').on('click', function() {
            var title = $(this).find('.wla-tech-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tech_card_click', {
                    'capability': title,
                    'location': 'technology_page'
                });
            }
            console.log('Tech capability clicked: ' + title);
        });

        /**
         * ============================================================
         * EXPANSION CARD CLICK TRACKING
         * Logs expansion card clicks for analytics
         * ============================================================ */
        $('.wla-tech-expansion-card').on('click', function() {
            var title = $(this).find('.wla-tech-eg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tech_expansion_click', {
                    'stage': title,
                    'location': 'technology_page'
                });
            }
            console.log('Tech expansion stage clicked: ' + title);
        });

        /**
         * ============================================================
         * AI TIER CLICK TRACKING
         * Logs AI tier clicks for analytics
         * ============================================================ */
        $('.wla-tech-ai-tier').on('click', function() {
            var title = $(this).find('.wla-tech-ai-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tech_ai_tier_click', {
                    'tier': title,
                    'location': 'technology_page'
                });
            }
            console.log('AI tier clicked: ' + title);
        });

        /**
         * ============================================================
         * REGULATION ROW CLICK TRACKING
         * Logs regulation row clicks for analytics
         * ============================================================ */
        $('.wla-tech-reg-row').on('click', function() {
            var name = $(this).find('.wla-tech-rr-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tech_regulation_click', {
                    'regulation': name,
                    'location': 'technology_page'
                });
            }
            console.log('Regulation clicked: ' + name);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-tech-btn-ink, .wla-tech-btn-bdr, .wla-tech-btn-white, .wla-tech-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tech_cta_click', {
                    'button': btnText,
                    'location': 'technology_page'
                });
            }
            console.log('Tech CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-tech-card, .wla-tech-expansion-card, .wla-tech-ai-tier, .wla-tech-reg-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * REGULATION TRACKER - AUTO REFRESH
         * Simulates live updates for regulation tracker
         * ============================================================ */
        var $regRows = $('.wla-tech-reg-row');
        if ($regRows.length) {
            var refreshInterval = setInterval(function() {
                // Update live badge pulse
                var $ldot = $('.wla-tech-ldot');
                if ($ldot.length) {
                    $ldot.css('opacity', Math.random() > 0.3 ? '1' : '0.3');
                }
            }, 3000);

            // Clear interval on page unload
            $(window).on('beforeunload', function() {
                clearInterval(refreshInterval);
            });
        }

        console.log('WLA Technology Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-tech-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-tech-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Find a Specialist Scripts
 * World Law Alliance Specialist Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all specialist page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-specialist-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-specialist-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-specialist-animate').addClass('wla-specialist-visible');
        }

        /**
         * ============================================================
         * FILTER CHIPS TOGGLE
         * ============================================================ */
        $('.wla-specialist-chip').on('click', function() {
            var $row = $(this).closest('.wla-specialist-filter-row');
            $row.find('.wla-specialist-chip').removeClass('wla-specialist-chip--active wla-specialist-chip--selected');
            $(this).addClass('wla-specialist-chip--active');
        });

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * SEARCH BUTTON - BASIC FILTER
         * ============================================================ */
        $('.wla-specialist-search-btn').on('click', function() {
            var query = $('.wla-specialist-search-input').val().trim().toLowerCase();
            
            if (query.length === 0) {
                $('.wla-specialist-card').show();
                $('.wla-specialist-results-count strong').text('8');
                return;
            }

            var visibleCount = 0;
            $('.wla-specialist-card').each(function() {
                var $card = $(this);
                var text = $card.text().toLowerCase();
                var match = text.indexOf(query) !== -1;
                $card.toggle(match);
                if (match) visibleCount++;
            });

            $('.wla-specialist-results-count strong').text(visibleCount);
        });

        /**
         * ============================================================
         * SEARCH INPUT - ENTER KEY
         * ============================================================ */
        $('.wla-specialist-search-input').on('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                $('.wla-specialist-search-btn').click();
            }
        });

        /**
         * ============================================================
         * SPECIALIST CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-specialist-card').on('click', function() {
            var name = $(this).find('.wla-specialist-card-name').text().trim();
            var jurisdiction = $(this).find('.wla-specialist-card-jur-badge').text().trim();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'specialist_card_click', {
                    'specialist': name,
                    'jurisdiction': jurisdiction,
                    'location': 'find_specialist_page'
                });
            }
            console.log('Specialist clicked: ' + name + ' (' + jurisdiction + ')');
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-specialist-cm-card').on('click', function() {
            var route = $(this).find('.wla-specialist-cm-route').text().trim().replace(/\s+/g, ' ');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_card_click', {
                    'corridor': route,
                    'location': 'find_specialist_page'
                });
            }
            console.log('Corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-specialist-card, .wla-specialist-cm-card, .wla-specialist-chip').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * LOAD MORE BUTTON
         * ============================================================ */
        $('.wla-specialist-load-more a').on('click', function(e) {
            e.preventDefault();
            
            // Demo: simulate loading more specialists
            var $btn = $(this);
            var originalText = $btn.text();
            $btn.text('LOADING...');
            
            setTimeout(function() {
                // In production, this would fetch from API
                $btn.text(originalText);
                alert('In production, this would load more specialists from the WLA network.');
            }, 1000);
        });

        console.log('WLA Find a Specialist page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-specialist-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-specialist-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Terms of Use Scripts
 * World Law Alliance Terms Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all terms page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-terms-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-terms-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-terms-animate').addClass('wla-terms-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        console.log('WLA Terms of Use page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-terms-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-terms-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA UNBOUNDED Barcelona 2026 Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // Intersection Observer for animations
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-unbounded-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-unbounded-visible');
                    }
                });
            }, { threshold: 0.07 });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-unbounded-animate').addClass('wla-unbounded-visible');
        }

        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        console.log('WLA UNBOUNDED page initialized.');
    });

    $(window).on('load', function() {
        $('.wla-unbounded-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-unbounded-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA World Immigration Alliance Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // Intersection Observer for animations
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-wia-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-wia-visible');
                    }
                });
            }, { threshold: 0.07 });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-wia-animate').addClass('wla-wia-visible');
        }

        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        // Practice card click tracking
        $('.wla-wia-practice-card').on('click', function() {
            var title = $(this).find('.wla-wia-practice-card-title').text().trim();
            console.log('WIA practice clicked: ' + title);
        });

        console.log('WLA WIA page initialized.');
    });

    $(window).on('load', function() {
        $('.wla-wia-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-wia-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA UNBOUNDED Forum Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * COUNTDOWN TIMER
         * ============================================================ */
        var targetDate = new Date('2026-08-14T09:00:00');

        function updateCountdown() {
            var now = new Date();
            var diff = targetDate - now;

            if (diff <= 0) {
                $('#wlaForumsCountdown').html('<div style="font-size:16px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#D4AF65">THE FORUM IS NOW LIVE</div>');
                return;
            }

            var days = Math.floor(diff / 86400000);
            var hours = Math.floor((diff % 86400000) / 3600000);
            var minutes = Math.floor((diff % 3600000) / 60000);
            var seconds = Math.floor((diff % 60000) / 1000);

            $('#wlaForumsCdD').text(String(days).padStart(2, '0'));
            $('#wlaForumsCdH').text(String(hours).padStart(2, '0'));
            $('#wlaForumsCdM').text(String(minutes).padStart(2, '0'));
            $('#wlaForumsCdS').text(String(seconds).padStart(2, '0'));
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);

        /**
         * ============================================================
         * SEAT FILL ANIMATION
         * ============================================================ */
        var seatFill = document.getElementById('wlaForumsSeatFill');
        if (seatFill) {
            var seatObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var fillWidth = seatFill.getAttribute('data-w') || '71';
                        setTimeout(function() {
                            seatFill.style.width = fillWidth + '%';
                        }, 200);
                    }
                });
            }, { threshold: 0.3 });
            seatObserver.observe(seatFill);
        }

        /**
         * ============================================================
         * TICKET SELECTION
         * ============================================================ */
        window.wlaForumsSelectTt = function(el) {
            var container = el.closest('.wla-forums-ticket-tiers');
            if (!container) return;
            
            var allTickets = container.querySelectorAll('.wla-forums-tt:not(.wla-forums-tt--sold)');
            allTickets.forEach(function(t) {
                t.classList.remove('wla-forums-tt--sel');
            });
            el.classList.add('wla-forums-tt--sel');
        };

        /**
         * ============================================================
         * DRAG TO SCROLL - EDITIONS
         * ============================================================ */
        var scrollContainer = document.getElementById('wlaForumsEdScroll');
        if (scrollContainer) {
            var isDown = false;
            var startX = 0;
            var scrollLeft = 0;

            scrollContainer.addEventListener('mousedown', function(e) {
                isDown = true;
                startX = e.pageX - scrollContainer.offsetLeft;
                scrollLeft = scrollContainer.scrollLeft;
                scrollContainer.style.cursor = 'grabbing';
            });

            scrollContainer.addEventListener('mouseleave', function() {
                isDown = false;
                scrollContainer.style.cursor = 'grab';
            });

            scrollContainer.addEventListener('mouseup', function() {
                isDown = false;
                scrollContainer.style.cursor = 'grab';
            });

            scrollContainer.addEventListener('mousemove', function(e) {
                if (!isDown) return;
                e.preventDefault();
                var x = e.pageX - scrollContainer.offsetLeft;
                scrollContainer.scrollLeft = scrollLeft - (x - startX) * 1.5;
            });

            // Touch support
            var touchStartX = 0;
            var touchScrollLeft = 0;
            var isTouching = false;

            scrollContainer.addEventListener('touchstart', function(e) {
                isTouching = true;
                touchStartX = e.touches[0].pageX - scrollContainer.offsetLeft;
                touchScrollLeft = scrollContainer.scrollLeft;
            }, { passive: true });

            scrollContainer.addEventListener('touchmove', function(e) {
                if (!isTouching) return;
                var x = e.touches[0].pageX - scrollContainer.offsetLeft;
                scrollContainer.scrollLeft = touchScrollLeft - (x - touchStartX) * 1.5;
            }, { passive: true });

            scrollContainer.addEventListener('touchend', function() {
                isTouching = false;
            }, { passive: true });
        }

        /**
         * ============================================================
         * SPEAKER CARD FLIP (CLICK FOR TOUCH)
         * ============================================================ */
        var flipWraps = document.querySelectorAll('.wla-forums-flip-wrap');
        flipWraps.forEach(function(wrap) {
            wrap.addEventListener('click', function(e) {
                // Only toggle on touch devices or when not hovering
                if ('ontouchstart' in window || window.innerWidth < 960) {
                    this.classList.toggle('wla-forums-flipped');
                }
            });
        });

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                var offset = 80;
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * INTERSECTION OBSERVER - ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-forums-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-forums-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-forums-animate').addClass('wla-forums-visible');
        }

        /**
         * ============================================================
         * REGISTRATION FORM HANDLER
         * ============================================================ */
        $('.wla-forums-rf-submit').on('click', function(e) {
            e.preventDefault();
            
            // Basic validation
            var form = $(this).closest('.wla-forums-reg-form');
            var inputs = form.find('.wla-forums-rf-input');
            var isValid = true;
            
            inputs.each(function() {
                if ($(this).val().trim() === '' && $(this).attr('placeholder') !== 'Dietary requirements (optional)') {
                    $(this).css('border-color', '#ff6b6b');
                    isValid = false;
                } else {
                    $(this).css('border-color', '');
                }
            });
            
            if (isValid) {
                var btn = $(this);
                var originalText = btn.text();
                btn.text('PROCESSING...');
                btn.prop('disabled', true);
                
                // Simulate submission
                setTimeout(function() {
                    alert('Registration submitted! WLA will confirm your place within 48 hours.');
                    btn.text(originalText);
                    btn.prop('disabled', false);
                }, 1500);
            } else {
                alert('Please fill in all required fields.');
            }
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-forums-btn-gold-lg, .wla-forums-btn-ghost-w, .wla-forums-btn-ink, .wla-forums-rf-submit').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'forums_cta_click', {
                    'button': btnText,
                    'location': 'unbounded_forums_page'
                });
            }
            console.log('Forum CTA clicked: ' + btnText);
        });

        console.log('WLA UNBOUNDED Forum page initialized.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-forums-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-forums-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Corridor Secretariat (Governance) Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-governance-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-governance-visible');
                    }
                });
            }, {
                threshold: 0.07
            });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-governance-animate').addClass('wla-governance-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * FUNCTION ITEM CLICK TRACKING
         * ============================================================ */
        $('.wla-governance-function-item').on('click', function() {
            var title = $(this).find('.wla-governance-eyebrow').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'governance_function_click', {
                    'function': title,
                    'location': 'governance_page'
                });
            }
            console.log('Governance function clicked: ' + title);
        });

        /**
         * ============================================================
         * CRITERION CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-governance-criterion').on('click', function() {
            var title = $(this).find('.wla-governance-criterion-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'governance_criterion_click', {
                    'criterion': title,
                    'location': 'governance_page'
                });
            }
            console.log('Governance criterion clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-governance-btn-white, .wla-governance-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'governance_cta_click', {
                    'button': btnText,
                    'location': 'governance_page'
                });
            }
            console.log('Governance CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-governance-function-item, .wla-governance-criterion').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Governance page initialized.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-governance-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-governance-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA How It Works Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * FLOW STEPS ACTIVATION
         * ============================================================ */
        function activateFlowStep(stepIndex) {
            var steps = document.querySelectorAll('.wla-hiw-fv-step');
            steps.forEach(function(step, index) {
                step.classList.remove('wla-hiw-fv-step--active', 'wla-hiw-fv-step--done');
                if (index < stepIndex) {
                    step.classList.add('wla-hiw-fv-step--done');
                } else if (index === stepIndex) {
                    step.classList.add('wla-hiw-fv-step--active');
                }
            });
        }

        // Click handlers for flow steps
        $('.wla-hiw-fv-step').on('click', function() {
            var index = $(this).data('step');
            if (index !== undefined) {
                activateFlowStep(index);
            }
        });

        // Auto-advance flow steps every 4 seconds (demo)
        var currentStep = 0;
        var totalSteps = 4;
        var flowInterval = setInterval(function() {
            var steps = document.querySelectorAll('.wla-hiw-fv-step');
            var activeIndex = 0;
            steps.forEach(function(step, index) {
                if (step.classList.contains('wla-hiw-fv-step--active')) {
                    activeIndex = index;
                }
            });
            var nextIndex = (activeIndex + 1) % totalSteps;
            activateFlowStep(nextIndex);
        }, 5000);

        // Pause auto-advance on hover
        $('.wla-hiw-flow-visual').on('mouseenter', function() {
            clearInterval(flowInterval);
        }).on('mouseleave', function() {
            flowInterval = setInterval(function() {
                var steps = document.querySelectorAll('.wla-hiw-fv-step');
                var activeIndex = 0;
                steps.forEach(function(step, index) {
                    if (step.classList.contains('wla-hiw-fv-step--active')) {
                        activeIndex = index;
                    }
                });
                var nextIndex = (activeIndex + 1) % totalSteps;
                activateFlowStep(nextIndex);
            }, 5000);
        });

        /**
         * ============================================================
         * FAQ TOGGLE
         * ============================================================ */
        $('.wla-hiw-faq-item').on('click', function() {
            var isOpen = $(this).hasClass('wla-hiw-open');
            var allFaqs = $('.wla-hiw-faq-item');
            
            allFaqs.each(function() {
                $(this).removeClass('wla-hiw-open');
                $(this).find('.wla-hiw-faq-a').css('max-height', '0');
            });
            
            if (!isOpen) {
                $(this).addClass('wla-hiw-open');
                var $answer = $(this).find('.wla-hiw-faq-a');
                $answer.css('max-height', $answer[0].scrollHeight + 'px');
            }
        });

        /**
         * ============================================================
         * BRIEF FORM SUBMISSION
         * ============================================================ */
        $('.wla-hiw-bf-submit').on('click', function(e) {
            e.preventDefault();
            
            var form = $(this).closest('.wla-hiw-brief-form');
            var inputs = form.find('.wla-hiw-bf-input, .wla-hiw-bf-textarea');
            var isValid = true;
            
            inputs.each(function() {
                if ($(this).val().trim() === '' && $(this).attr('placeholder') !== 'Dietary requirements (optional)') {
                    $(this).css('border-color', '#ff6b6b');
                    isValid = false;
                } else {
                    $(this).css('border-color', '');
                }
            });
            
            if (isValid) {
                var btn = $(this);
                var originalText = btn.text();
                btn.text('PROCESSING...');
                btn.prop('disabled', true);
                
                setTimeout(function() {
                    form.css('display', 'none');
                    $('#wlaHiwBriefSuccess').css('display', 'block');
                    btn.text(originalText);
                    btn.prop('disabled', false);
                }, 1500);
            } else {
                alert('Please fill in all required fields.');
            }
        });

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                var offset = 80;
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * INTERSECTION OBSERVER - ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-hiw-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-hiw-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-hiw-animate').addClass('wla-hiw-visible');
        }

        /**
         * ============================================================
         * STEP ROW CLICK TRACKING
         * ============================================================ */
        $('.wla-hiw-step-row').on('click', function() {
            var title = $(this).find('.wla-hiw-step-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'how_it_works_step_click', {
                    'step': title,
                    'location': 'how_it_works_page'
                });
            }
            console.log('Step clicked: ' + title);
        });

        /**
         * ============================================================
         * DIFF ROW CLICK TRACKING
         * ============================================================ */
        $('.wla-hiw-diff-row').on('click', function() {
            var title = $(this).find('.wla-hiw-dr-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'how_it_works_diff_click', {
                    'differentiator': title,
                    'location': 'how_it_works_page'
                });
            }
            console.log('Differentiator clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-hiw-btn-white, .wla-hiw-btn-ghost-white, .wla-hiw-btn-ink, .wla-hiw-btn-bdr, .wla-hiw-bf-submit').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'how_it_works_cta_click', {
                    'button': btnText,
                    'location': 'how_it_works_page'
                });
            }
            console.log('CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-hiw-fv-step, .wla-hiw-step-row, .wla-hiw-diff-row, .wla-hiw-faq-item, .wla-hiw-rel-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA How It Works page initialized.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-hiw-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-hiw-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Impact Annual Report Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * PARTICLE HERO BACKGROUND
         * ============================================================ */
        var heroCanvas = document.getElementById('wlaImpactHeroBg');
        if (heroCanvas) {
            var hCtx = heroCanvas.getContext('2d');
            var width = window.innerWidth;
            var height = window.innerHeight;
            
            heroCanvas.width = width;
            heroCanvas.height = height;
            
            window.addEventListener('resize', function() {
                heroCanvas.width = window.innerWidth;
                heroCanvas.height = window.innerHeight;
                width = heroCanvas.width;
                height = heroCanvas.height;
            });
            
            var particles = [];
            var particleCount = 60;
            for (var i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    vx: (Math.random() - 0.5) * 0.3,
                    vy: (Math.random() - 0.5) * 0.3,
                    r: Math.random() * 1.5 + 0.5,
                    o: Math.random() * 0.3 + 0.05
                });
            }
            
            function drawParticles() {
                hCtx.clearRect(0, 0, width, height);
                
                particles.forEach(function(p) {
                    p.x += p.vx;
                    p.y += p.vy;
                    if (p.x < 0) p.x = width;
                    if (p.x > width) p.x = 0;
                    if (p.y < 0) p.y = height;
                    if (p.y > height) p.y = 0;
                    
                    hCtx.beginPath();
                    hCtx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    hCtx.fillStyle = 'rgba(255,255,255,' + p.o + ')';
                    hCtx.fill();
                });
                
                // Connecting lines
                for (var i = 0; i < particles.length; i++) {
                    for (var j = i + 1; j < particles.length; j++) {
                        var dx = particles[i].x - particles[j].x;
                        var dy = particles[i].y - particles[j].y;
                        var dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < 120) {
                            hCtx.beginPath();
                            hCtx.moveTo(particles[i].x, particles[i].y);
                            hCtx.lineTo(particles[j].x, particles[j].y);
                            var alpha = 0.04 * (1 - dist / 120);
                            hCtx.strokeStyle = 'rgba(255,255,255,' + alpha + ')';
                            hCtx.lineWidth = 0.5;
                            hCtx.stroke();
                        }
                    }
                }
                
                requestAnimationFrame(drawParticles);
            }
            
            drawParticles();
        }

        /**
         * ============================================================
         * HERO COUNTER ANIMATION
         * ============================================================ */
        var heroCounters = document.getElementById('wlaImpactHeroCounters');
        if (heroCounters) {
            var heroObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var numberElements = entry.target.querySelectorAll('[data-t]');
                        numberElements.forEach(function(el) {
                            var target = parseInt(el.getAttribute('data-t'));
                            var suffix = el.getAttribute('data-s') || '';
                            var duration = 1600;
                            var startTime = performance.now();
                            
                            function animateCounter(time) {
                                var progress = Math.min((time - startTime) / duration, 1);
                                var eased = 1 - Math.pow(1 - progress, 3);
                                var current = Math.round(eased * target);
                                el.textContent = current.toLocaleString() + suffix;
                                if (progress < 1) {
                                    requestAnimationFrame(animateCounter);
                                }
                            }
                            requestAnimationFrame(animateCounter);
                        });
                        
                        var fillBars = entry.target.querySelectorAll('.wla-impact-hc-bar-fill');
                        fillBars.forEach(function(fill) {
                            setTimeout(function() {
                                var width = fill.getAttribute('data-w') || '0';
                                fill.style.width = width + '%';
                            }, 200);
                        });
                        
                        heroObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });
            heroObserver.observe(heroCounters);
        }

        /**
         * ============================================================
         * IMPACT METRICS COUNTERS
         * ============================================================ */
        var metricsGrid = document.getElementById('wlaImpactMetricsGrid');
        if (metricsGrid) {
            var metricsObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var numberElements = entry.target.querySelectorAll('[data-t]');
                        numberElements.forEach(function(el) {
                            var target = parseInt(el.getAttribute('data-t'));
                            var duration = 1400;
                            var startTime = performance.now();
                            
                            function animateMetric(time) {
                                var progress = Math.min((time - startTime) / duration, 1);
                                var eased = 1 - Math.pow(1 - progress, 3);
                                var current = Math.round(eased * target);
                                el.textContent = current.toLocaleString();
                                if (progress < 1) {
                                    requestAnimationFrame(animateMetric);
                                }
                            }
                            requestAnimationFrame(animateMetric);
                        });
                        metricsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });
            metricsObserver.observe(metricsGrid);
        }

        /**
         * ============================================================
         * CHORD DIAGRAM
         * ============================================================ */
        var chordCanvas = document.getElementById('wlaImpactChord');
        if (chordCanvas) {
            var cCtx = chordCanvas.getContext('2d');
            var cx = 260, cy = 260, R = 200, r = 160;
            
            var nodes = [
                { name: 'GULF', color: '#4ade80' },
                { name: 'EU', color: '#60a5fa' },
                { name: 'GCC', color: '#f59e0b' },
                { name: 'UK', color: '#a78bfa' },
                { name: 'APAC', color: '#fb7185' },
                { name: 'US', color: '#34d399' }
            ];
            
            var flows = [
                [0, 2, 38], [1, 2, 34], [2, 3, 31],
                [0, 4, 22], [3, 5, 19], [1, 5, 18],
                [0, 1, 15], [2, 4, 12], [3, 4, 10], [1, 3, 8]
            ];
            
            var tip = document.getElementById('wlaImpactChordTip');
            
            // Build legend
            var legendEl = document.getElementById('wlaImpactChordLegend');
            nodes.forEach(function(n) {
                var li = document.createElement('div');
                li.className = 'wla-impact-chord-legend-item';
                li.innerHTML = '<div class="wla-impact-chord-legend-dot" style="background:' + n.color + '"></div>' + n.name;
                legendEl.appendChild(li);
            });
            
            // Draw arcs
            var step = Math.PI * 2 / nodes.length;
            
            function getArc(i) {
                var a = step * i - Math.PI / 2;
                return { x: cx + R * Math.cos(a), y: cy + R * Math.sin(a), a: a };
            }
            
            function drawChord() {
                cCtx.clearRect(0, 0, 520, 520);
                
                // Node arcs
                nodes.forEach(function(n, i) {
                    var a = step * i - Math.PI / 2;
                    cCtx.beginPath();
                    cCtx.arc(cx, cy, R, a - step * 0.35, a + step * 0.35);
                    cCtx.arc(cx, cy, r, a + step * 0.35, a - step * 0.35, true);
                    cCtx.closePath();
                    cCtx.fillStyle = n.color + '22';
                    cCtx.fill();
                    cCtx.strokeStyle = n.color;
                    cCtx.lineWidth = 2;
                    cCtx.stroke();
                    
                    // Label
                    var lx = cx + (R + 22) * Math.cos(a);
                    var ly = cy + (R + 22) * Math.sin(a);
                    cCtx.font = '600 11px Inter';
                    cCtx.fillStyle = n.color;
                    cCtx.textAlign = 'center';
                    cCtx.textBaseline = 'middle';
                    cCtx.fillText(n.name, lx, ly);
                });
                
                // Flow chords
                flows.forEach(function(flow) {
                    var from = flow[0], to = flow[1], val = flow[2];
                    var a1 = step * from - Math.PI / 2;
                    var a2 = step * to - Math.PI / 2;
                    var x1 = cx + r * Math.cos(a1);
                    var y1 = cy + r * Math.sin(a1);
                    var x2 = cx + r * Math.cos(a2);
                    var y2 = cy + r * Math.sin(a2);
                    
                    cCtx.beginPath();
                    cCtx.moveTo(x1, y1);
                    cCtx.bezierCurveTo(
                        cx + (x1 - cx) * 0.3, cy + (y1 - cy) * 0.3,
                        cx + (x2 - cx) * 0.3, cy + (y2 - cy) * 0.3,
                        x2, y2
                    );
                    var grad = cCtx.createLinearGradient(x1, y1, x2, y2);
                    grad.addColorStop(0, nodes[from].color + '55');
                    grad.addColorStop(1, nodes[to].color + '55');
                    cCtx.strokeStyle = grad;
                    cCtx.lineWidth = Math.max(1, val / 6);
                    cCtx.stroke();
                });
            }
            
            drawChord();
            
            // Chord hover
            chordCanvas.addEventListener('mousemove', function(e) {
                var rect = chordCanvas.getBoundingClientRect();
                var mx = e.clientX - rect.left;
                var my = e.clientY - rect.top;
                var dx = mx - cx;
                var dy = my - cy;
                var dist = Math.sqrt(dx * dx + dy * dy);
                
                if (dist > r - 10 && dist < R + 30) {
                    var angle = (Math.atan2(dy, dx) + Math.PI / 2 + Math.PI * 2) % (Math.PI * 2);
                    var idx = Math.round(angle / (Math.PI * 2) * nodes.length) % nodes.length;
                    var n = nodes[idx];
                    var relFlows = flows.filter(function(f) {
                        return f[0] === idx || f[1] === idx;
                    });
                    
                    tip.style.opacity = '1';
                    tip.style.left = (e.clientX - rect.left + 12) + 'px';
                    tip.style.top = (e.clientY - rect.top - 10) + 'px';
                    tip.textContent = n.name + ' — ' + relFlows.length + ' active corridors';
                    chordCanvas.style.cursor = 'pointer';
                } else {
                    tip.style.opacity = '0';
                    chordCanvas.style.cursor = 'default';
                }
            });
        }

        /**
         * ============================================================
         * BEFORE / AFTER SLIDER
         * ============================================================ */
        var compareWrap = document.getElementById('wlaImpactCompareWrap');
        var compareAfter = document.getElementById('wlaImpactCompareAfter');
        var handle = document.getElementById('wlaImpactHandle');
        var dragging = false;
        
        function setSliderPos(x) {
            if (!compareWrap) return;
            var rect = compareWrap.getBoundingClientRect();
            var pct = Math.min(Math.max((x - rect.left) / rect.width * 100, 5), 95);
            compareAfter.style.clipPath = 'inset(0 ' + (100 - pct) + '% 0 0)';
            handle.style.left = pct + '%';
        }
        
        if (compareWrap) {
            setSliderPos(compareWrap.getBoundingClientRect().left + compareWrap.offsetWidth * 0.5);
        }
        
        if (handle) {
            handle.addEventListener('mousedown', function(e) {
                dragging = true;
                e.preventDefault();
            });
            
            window.addEventListener('mousemove', function(e) {
                if (dragging) setSliderPos(e.clientX);
            });
            
            window.addEventListener('mouseup', function() {
                dragging = false;
            });
            
            handle.addEventListener('touchstart', function(e) {
                dragging = true;
            }, { passive: true });
            
            window.addEventListener('touchmove', function(e) {
                if (dragging && e.touches[0]) {
                    setSliderPos(e.touches[0].clientX);
                }
            });
            
            window.addEventListener('touchend', function() {
                dragging = false;
            });
        }

        /**
         * ============================================================
         * GROWTH CHART
         * ============================================================ */
        var gCanvas = document.getElementById('wlaImpactGrowthChart');
        if (gCanvas) {
            function drawGrowthChart() {
                var parentWidth = gCanvas.parentElement.offsetWidth;
                var W = parentWidth || 800;
                var H = 320;
                gCanvas.width = W;
                gCanvas.height = H;
                var gCtx = gCanvas.getContext('2d');
                
                var years = [2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026];
                var firms = [8, 18, 22, 55, 72, 98, 127, 151, 160];
                var juris = [3, 12, 18, 35, 48, 60, 78, 90, 95];
                var sigs = [0, 0, 0, 0, 42, 120, 260, 400, 620];
                
                var PAD = { l: 56, r: 20, t: 20, b: 40 };
                var gW = W - PAD.l - PAD.r;
                var gH = H - PAD.t - PAD.b;
                var maxV = 200;
                
                // Grid
                gCtx.strokeStyle = 'rgba(255,255,255,.06)';
                gCtx.lineWidth = 0.5;
                [0, 50, 100, 150, 200].forEach(function(v) {
                    var y = PAD.t + gH * (1 - v / maxV);
                    gCtx.beginPath();
                    gCtx.moveTo(PAD.l, y);
                    gCtx.lineTo(PAD.l + gW, y);
                    gCtx.stroke();
                    gCtx.fillStyle = 'rgba(255,255,255,.2)';
                    gCtx.font = '500 10px Inter';
                    gCtx.textAlign = 'right';
                    gCtx.fillText(v, PAD.l - 6, y + 4);
                });
                
                function drawLine(data, color) {
                    gCtx.beginPath();
                    data.forEach(function(v, i) {
                        var x = PAD.l + gW * i / (years.length - 1);
                        var y = PAD.t + gH * (1 - Math.min(v, maxV) / maxV);
                        if (i === 0) gCtx.moveTo(x, y);
                        else gCtx.lineTo(x, y);
                    });
                    gCtx.strokeStyle = color;
                    gCtx.lineWidth = 2;
                    gCtx.stroke();
                    
                    // Fill gradient
                    var fillPath = new Path2D();
                    data.forEach(function(v, i) {
                        var x = PAD.l + gW * i / (years.length - 1);
                        var y = PAD.t + gH * (1 - Math.min(v, maxV) / maxV);
                        if (i === 0) fillPath.moveTo(x, y);
                        else fillPath.lineTo(x, y);
                    });
                    fillPath.lineTo(PAD.l + gW, PAD.t + gH);
                    fillPath.lineTo(PAD.l, PAD.t + gH);
                    fillPath.closePath();
                    var grad = gCtx.createLinearGradient(0, PAD.t, 0, PAD.t + gH);
                    grad.addColorStop(0, color + '40');
                    grad.addColorStop(1, color + '00');
                    gCtx.fillStyle = grad;
                    gCtx.fill(fillPath);
                    
                    // Dots
                    data.forEach(function(v, i) {
                        var x = PAD.l + gW * i / (years.length - 1);
                        var y = PAD.t + gH * (1 - Math.min(v, maxV) / maxV);
                        gCtx.beginPath();
                        gCtx.arc(x, y, 3.5, 0, Math.PI * 2);
                        gCtx.fillStyle = color;
                        gCtx.fill();
                    });
                }
                
                drawLine(firms, '#4ade80');
                drawLine(juris, '#60a5fa');
                drawLine(sigs.map(function(s) { return s / 6.5; }), '#f59e0b');
                
                // X labels
                gCtx.fillStyle = 'rgba(255,255,255,.25)';
                gCtx.font = '500 10px Inter';
                gCtx.textAlign = 'center';
                years.forEach(function(y, i) {
                    gCtx.fillText(y, PAD.l + gW * i / (years.length - 1), H - 8);
                });
            }
            
            var chartObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        drawGrowthChart();
                        chartObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });
            chartObserver.observe(gCanvas.parentElement);
            
            window.addEventListener('resize', function() {
                drawGrowthChart();
            });
        }

        /**
         * ============================================================
         * DOWNLOAD BUTTON
         * ============================================================ */
        var dlBtn = document.getElementById('wlaImpactDlBtn');
        if (dlBtn) {
            dlBtn.addEventListener('click', function() {
                var btn = this;
                var prog = document.getElementById('wlaImpactDlProgress');
                var fill = document.getElementById('wlaImpactDlFill');
                
                btn.innerHTML = '<span>↓</span> PREPARING...';
                btn.style.opacity = '.6';
                btn.style.pointerEvents = 'none';
                prog.style.display = 'block';
                
                var w = 0;
                var interval = setInterval(function() {
                    w += Math.random() * 15;
                    if (w >= 100) {
                        w = 100;
                        clearInterval(interval);
                        btn.innerHTML = '<span>✓</span> DOWNLOADED';
                        btn.style.opacity = '1';
                    }
                    fill.style.width = w + '%';
                }, 120);
            });
        }

        /**
         * ============================================================
         * TIMELINE HOVER
         * ============================================================ */
        document.querySelectorAll('.wla-impact-tl-year').forEach(function(el) {
            el.addEventListener('mouseenter', function() {
                document.querySelectorAll('.wla-impact-tl-year').forEach(function(t) {
                    t.classList.remove('wla-impact-tl-year--active');
                });
                this.classList.add('wla-impact-tl-year--active');
            });
        });

        /**
         * ============================================================
         * INTERSECTION OBSERVER - ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-impact-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-impact-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-impact-animate').addClass('wla-impact-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                var offset = 80;
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-impact-dl-btn, .wla-impact-dl-btn-ghost').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'impact_cta_click', {
                    'button': btnText,
                    'location': 'impact_page'
                });
            }
            console.log('Impact CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-impact-hc, .wla-impact-metric-card, .wla-impact-tl-year, .wla-impact-dl-btn').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Impact page initialized.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-impact-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-impact-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Insights Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * FILTER TABS
         * ============================================================ */
        $('.wla-insights-filter-tab').on('click', function() {
            var tab = $(this);
            var filterText = tab.text().trim();
            
            $('.wla-insights-filter-tab').removeClass('wla-insights-filter-tab--active');
            tab.addClass('wla-insights-filter-tab--active');
            
            // Filter articles based on category
            var articles = $('.wla-insights-article-card');
            
            if (filterText === 'ALL') {
                articles.show();
                return;
            }
            
            articles.each(function() {
                var $card = $(this);
                var catText = $card.find('.wla-insights-ac-cat').text().toUpperCase();
                var match = catText.indexOf(filterText) !== -1;
                $card.toggle(match);
            });
        });

        /**
         * ============================================================
         * NEWSLETTER FORM SUBMISSION
         * ============================================================ */
        $('.wla-insights-nl-submit').on('click', function(e) {
            e.preventDefault();
            
            var input = $(this).closest('.wla-insights-nl-form').find('.wla-insights-nl-input');
            var email = input.val().trim();
            
            if (!email || !email.includes('@') || !email.includes('.')) {
                input.css('border-color', '#ef4444');
                alert('Please enter a valid email address.');
                return;
            }
            
            input.css('border-color', '');
            var btn = $(this);
            var originalText = btn.text();
            btn.text('SUBSCRIBING...');
            btn.prop('disabled', true);
            
            setTimeout(function() {
                btn.text('✓ SUBSCRIBED');
                btn.css('background', '#16A34A');
                input.val('');
                
                setTimeout(function() {
                    btn.text(originalText);
                    btn.css('background', '');
                    btn.prop('disabled', false);
                }, 3000);
            }, 1200);
        });

        /**
         * ============================================================
         * REPORT DOWNLOAD BUTTON
         * ============================================================ */
        $('.wla-insights-btn-white').on('click', function(e) {
            e.preventDefault();
            
            var btn = $(this);
            var originalText = btn.text();
            btn.text('PREPARING...');
            btn.css('opacity', '.6');
            
            setTimeout(function() {
                btn.text('✓ DOWNLOADED');
                btn.css('opacity', '1');
                
                setTimeout(function() {
                    btn.text(originalText);
                }, 3000);
            }, 1500);
        });

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                var offset = 80;
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * INTERSECTION OBSERVER - ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-insights-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-insights-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-insights-animate').addClass('wla-insights-visible');
        }

        /**
         * ============================================================
         * ARTICLE CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-insights-article-card').on('click', function() {
            var title = $(this).find('.wla-insights-ac-title').text().trim();
            var cat = $(this).find('.wla-insights-ac-cat').text().trim();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'insights_article_click', {
                    'article': title,
                    'category': cat,
                    'location': 'insights_page'
                });
            }
            console.log('Article clicked: ' + title + ' (' + cat + ')');
        });

        /**
         * ============================================================
         * HERO STORY CLICK TRACKING
         * ============================================================ */
        $('.wla-insights-hs-story, .wla-insights-hero-main').on('click', function() {
            var title = $(this).find('.wla-insights-hs-title, .wla-insights-hm-title').text().trim();
            var isMain = $(this).hasClass('wla-insights-hero-main');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'insights_hero_click', {
                    'article': title,
                    'position': isMain ? 'featured' : 'sidebar',
                    'location': 'insights_page'
                });
            }
            console.log('Hero story clicked: ' + title);
        });

        /**
         * ============================================================
         * FILTER TAB CLICK TRACKING
         * ============================================================ */
        $('.wla-insights-filter-tab').on('click', function() {
            var filter = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'insights_filter_click', {
                    'filter': filter,
                    'location': 'insights_page'
                });
            }
            console.log('Filter clicked: ' + filter);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-insights-btn-white, .wla-insights-btn-ghost-white, .wla-insights-btn-ink, .wla-insights-btn-bdr, .wla-insights-nl-submit').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'insights_cta_click', {
                    'button': btnText,
                    'location': 'insights_page'
                });
            }
            console.log('Insights CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-insights-filter-tab, .wla-insights-article-card, .wla-insights-hs-story, .wla-insights-hero-main').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Insights page initialized.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-insights-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-insights-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Intelligence Platform Scripts
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * MINI CHART BARS
         * ============================================================ */
        var chartContainer = document.getElementById('wlaIntelMiniChart');
        if (chartContainer) {
            var bars = [40, 55, 48, 70, 62, 30, 45];
            bars.forEach(function(h, i) {
                var bar = document.createElement('div');
                bar.className = 'wla-intel-mc-bar';
                if (i === 3) {
                    bar.classList.add('wla-intel-mc-bar--hi');
                }
                bar.style.height = h + '%';
                chartContainer.appendChild(bar);
            });
        }

        /**
         * ============================================================
         * COUNTER ANIMATION
         * ============================================================ */
        function animateCount(el, target, duration) {
            var start = performance.now();
            (function step(now) {
                var progress = Math.min((now - start) / duration, 1);
                el.textContent = Math.round(progress * target);
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            })(start);
        }

        setTimeout(function() {
            var c1 = document.getElementById('wlaIntelC1');
            var c2 = document.getElementById('wlaIntelC2');
            var c3 = document.getElementById('wlaIntelC3');
            var c4 = document.getElementById('wlaIntelC4');
            if (c1) animateCount(c1, 28, 1200);
            if (c2) animateCount(c2, 22, 1200);
            if (c3) animateCount(c3, 16, 1200);
            if (c4) animateCount(c4, 18, 1200);
        }, 600);

        /**
         * ============================================================
         * MINI FEED
         * ============================================================ */
        var mfData = [
            { jur: 'UAE', text: 'DIFC Employment Act Amendments', badge: '+24%', cls: '' },
            { jur: 'EU', text: 'AI Act — Full Enforcement', badge: 'Active', cls: 'wla-intel-mf-badge--ac' },
            { jur: 'India', text: 'DPDP Rules 2025 Final', badge: '+34%', cls: '' },
            { jur: 'KSA', text: 'Vision 2030 Phase 2', badge: '+31%', cls: '' },
            { jur: 'UK', text: 'Employment Rights Bill Live', badge: 'Active', cls: 'wla-intel-mf-badge--ac' }
        ];

        var mfContainer = document.getElementById('wlaIntelMiniFeed');
        var mfIdx = 0;

        if (mfContainer) {
            mfData.forEach(function(d) {
                var row = document.createElement('div');
                row.className = 'wla-intel-mf-row';
                row.innerHTML = '<span class="wla-intel-mf-jur">' + d.jur + '</span>' +
                    '<span class="wla-intel-mf-text">' + d.text + '</span>' +
                    '<span class="wla-intel-mf-badge ' + d.cls + '">' + d.badge + '</span>';
                mfContainer.appendChild(row);
            });

            setInterval(function() {
                var d = mfData[mfIdx % mfData.length];
                var row = document.createElement('div');
                row.className = 'wla-intel-mf-row';
                row.style.opacity = '0';
                row.innerHTML = '<span class="wla-intel-mf-jur">' + d.jur + '</span>' +
                    '<span class="wla-intel-mf-text">' + d.text + '</span>' +
                    '<span class="wla-intel-mf-badge ' + d.cls + '">' + d.badge + '</span>';
                mfContainer.insertBefore(row, mfContainer.firstChild);
                if (mfContainer.children.length > 5) {
                    mfContainer.removeChild(mfContainer.lastChild);
                }
                setTimeout(function() {
                    row.style.opacity = '1';
                }, 10);
                mfIdx++;
            }, 2500);
        }

        /**
         * ============================================================
         * SIGNAL DATA
         * ============================================================ */
        var signals = [
            { r: 'EU', jur: 'UAE', area: 'Corporate', text: '<strong>DIFC Employment Amendments</strong> — Secondment and mobility provisions effective Q3 2026', idx: '+24%', cls: 'wla-intel-srow-idx--up' },
            { r: 'EU', jur: 'EU', area: 'AI Regulation', text: '<strong>AI Act Enforcement</strong> — All 27 states now subject to full compliance obligations', idx: 'Active', cls: 'wla-intel-srow-idx--ac' },
            { r: 'EU', jur: 'UK', area: 'Employment', text: '<strong>Employment Rights Bill</strong> — Day-one rights and fire-and-rehire restrictions now live', idx: 'Active', cls: 'wla-intel-srow-idx--ac' },
            { r: 'EU', jur: 'Poland', area: 'FDI', text: '<strong>EU FSR Screening</strong> — Foreign Subsidies Regulation review period extended to 20 weeks', idx: '+12%', cls: 'wla-intel-srow-idx--up' },
            { r: 'EU', jur: 'Germany', area: 'Data', text: '<strong>BSI Cybersecurity Act 3.0</strong> — New reporting obligations for critical infrastructure operators', idx: '+9%', cls: 'wla-intel-srow-idx--up' },
            { r: 'EU', jur: 'France', area: 'Competition', text: '<strong>DMA Enforcement</strong> — Gatekeeper obligations now enforced against 6 designated platforms', idx: 'Active', cls: 'wla-intel-srow-idx--ac' },
            { r: 'ME', jur: 'Saudi', area: 'M&A', text: '<strong>Vision 2030 Phase 2</strong> — MISA 30-day fast-track now operational, record FDI activity', idx: '+31%', cls: 'wla-intel-srow-idx--up' },
            { r: 'ME', jur: 'UAE', area: 'Tax', text: '<strong>UAE Corporate Tax</strong> — Free zone qualifying income rules clarified by MoF circular', idx: '+18%', cls: 'wla-intel-srow-idx--up' },
            { r: 'ME', jur: 'Qatar', area: 'Arbitration', text: '<strong>QICCA Rule Updates</strong> — Emergency arbitrator appointment time reduced to 48 hours', idx: '+8%', cls: 'wla-intel-srow-idx--up' },
            { r: 'ME', jur: 'Bahrain', area: 'FinTech', text: '<strong>CBB Digital Asset Framework</strong> — Phase 2 licensing open for custody and exchange services', idx: '+15%', cls: 'wla-intel-srow-idx--up' },
            { r: 'APAC', jur: 'India', area: 'Data', text: '<strong>DPDP Rules 2025</strong> — Cross-border transfer framework published, compliance window open', idx: '+34%', cls: 'wla-intel-srow-idx--up' },
            { r: 'APAC', jur: 'Singapore', area: 'Data', text: '<strong>PDPA Amendments</strong> — Enhanced data portability obligations effective August 2026', idx: '+15%', cls: 'wla-intel-srow-idx--up' },
            { r: 'APAC', jur: 'HK', area: 'Arbitration', text: '<strong>HKIAC Record Caseload</strong> — Emergency appointment 24-hour turnaround now standard', idx: '+19%', cls: 'wla-intel-srow-idx--up' },
            { r: 'APAC', jur: 'Japan', area: 'M&A', text: '<strong>FSA Foreign Investment</strong> — Simplified prior-notification procedure extended to 50 more sectors', idx: '+11%', cls: 'wla-intel-srow-idx--up' },
            { r: 'APAC', jur: 'Australia', area: 'Employment', text: '<strong>Closing Loopholes No.2</strong> — Casual employee conversion rights strengthened', idx: '+7%', cls: 'wla-intel-srow-idx--up' },
            { r: 'AM', jur: 'USA', area: 'CFIUS', text: '<strong>CFIUS Rule Expansion</strong> — New covered real estate and technology categories effective Q2 2026', idx: 'Active', cls: 'wla-intel-srow-idx--ac' },
            { r: 'AM', jur: 'Brazil', area: 'Privacy', text: '<strong>ANPD Data Transfer Regs</strong> — Standard contractual clauses framework now operational', idx: '+22%', cls: 'wla-intel-srow-idx--up' },
            { r: 'AM', jur: 'Canada', area: 'Data', text: '<strong>Bill C-27 Progress</strong> — CPPA committee amendments published, Royal Assent expected Q4 2026', idx: '+14%', cls: 'wla-intel-srow-idx--up' }
        ];

        var regionLabels = {
            'ALL': 'ALL REGIONS',
            'EU': 'EUROPE',
            'ME': 'MIDDLE EAST',
            'APAC': 'ASIA PACIFIC',
            'AM': 'AMERICAS'
        };

        function renderSignals(region) {
            var rowsContainer = document.getElementById('wlaIntelSigRows');
            var titleEl = document.getElementById('wlaIntelRegionTitle');
            var filtered = region === 'ALL' ? signals : signals.filter(function(s) { return s.r === region; });
            
            titleEl.textContent = regionLabels[region] + ' — ' + filtered.length + ' SIGNALS';
            rowsContainer.innerHTML = '';
            
            filtered.forEach(function(s, i) {
                var row = document.createElement('div');
                row.className = 'wla-intel-sig-row wla-intel-sig-row--fadein';
                row.style.animationDelay = (i * 0.04) + 's';
                row.innerHTML = '<div>' +
                    '<div class="wla-intel-srow-jur">' + s.jur + '</div>' +
                    '<div class="wla-intel-srow-area">' + s.area + '</div>' +
                    '</div>' +
                    '<div class="wla-intel-srow-text">' + s.text + '</div>' +
                    '<div class="wla-intel-srow-idx ' + s.cls + '">' + s.idx + '</div>';
                rowsContainer.appendChild(row);
            });
        }

        function filterRegion(region) {
            document.querySelectorAll('.wla-intel-sig-region').forEach(function(el) {
                el.classList.remove('wla-intel-sig-region--active');
            });
            var target = document.querySelector('.wla-intel-sig-region[data-region="' + region + '"]');
            if (target) target.classList.add('wla-intel-sig-region--active');
            renderSignals(region);
        }

        // Click handlers for signal regions
        document.querySelectorAll('.wla-intel-sig-region').forEach(function(el) {
            el.addEventListener('click', function() {
                var region = this.getAttribute('data-region');
                filterRegion(region);
            });
        });

        renderSignals('ALL');

        /**
         * ============================================================
         * MAP CANVAS
         * ============================================================ */
        var mapCanvas = document.getElementById('wlaIntelMapCanvas');
        var tooltip = document.getElementById('wlaIntelTooltip');
        var currentRegion = 'ALL';

        if (mapCanvas) {
            var mCtx = mapCanvas.getContext('2d');
            
            function resizeMap() {
                var parentWidth = mapCanvas.parentElement.offsetWidth;
                mapCanvas.width = parentWidth || 800;
                mapCanvas.height = mapCanvas.width * 0.48;
                drawMap(currentRegion);
            }

            var jurisNodes = [
                { x: 0.38, y: 0.28, name: 'UK', r: 'EU' },
                { x: 0.44, y: 0.30, name: 'DE', r: 'EU' },
                { x: 0.41, y: 0.34, name: 'FR', r: 'EU' },
                { x: 0.47, y: 0.26, name: 'PL', r: 'EU' },
                { x: 0.42, y: 0.38, name: 'ES', r: 'EU' },
                { x: 0.46, y: 0.24, name: 'SE', r: 'EU' },
                { x: 0.43, y: 0.22, name: 'NO', r: 'EU' },
                { x: 0.51, y: 0.42, name: 'UAE', r: 'ME' },
                { x: 0.55, y: 0.46, name: 'KSA', r: 'ME' },
                { x: 0.53, y: 0.39, name: 'QA', r: 'ME' },
                { x: 0.49, y: 0.38, name: 'BH', r: 'ME' },
                { x: 0.67, y: 0.38, name: 'IN', r: 'APAC' },
                { x: 0.75, y: 0.36, name: 'SG', r: 'APAC' },
                { x: 0.78, y: 0.30, name: 'HK', r: 'APAC' },
                { x: 0.82, y: 0.28, name: 'JP', r: 'APAC' },
                { x: 0.85, y: 0.40, name: 'AU', r: 'APAC' },
                { x: 0.15, y: 0.32, name: 'US', r: 'AM' },
                { x: 0.12, y: 0.26, name: 'CA', r: 'AM' },
                { x: 0.20, y: 0.50, name: 'BR', r: 'AM' },
                { x: 0.52, y: 0.50, name: 'KE', r: 'AF' },
                { x: 0.50, y: 0.55, name: 'ZA', r: 'AF' },
                { x: 0.48, y: 0.46, name: 'NG', r: 'AF' }
            ];

            function drawMap(region) {
                var W = mapCanvas.width;
                var H = mapCanvas.height;
                mCtx.clearRect(0, 0, W, H);
                
                // Background
                mCtx.fillStyle = '#0D0D0D';
                mCtx.fillRect(0, 0, W, H);
                
                // Grid
                mCtx.strokeStyle = 'rgba(255,255,255,0.06)';
                mCtx.lineWidth = 0.5;
                for (var i = 0; i <= 8; i++) {
                    mCtx.beginPath();
                    mCtx.moveTo(W * i / 8, 0);
                    mCtx.lineTo(W * i / 8, H);
                    mCtx.stroke();
                }
                for (var j = 0; j <= 5; j++) {
                    mCtx.beginPath();
                    mCtx.moveTo(0, H * j / 5);
                    mCtx.lineTo(W, H * j / 5);
                    mCtx.stroke();
                }
                
                // Nodes
                jurisNodes.forEach(function(n) {
                    var active = region === 'ALL' || n.r === region;
                    var x = n.x * W;
                    var y = n.y * H;
                    
                    mCtx.beginPath();
                    mCtx.arc(x, y, active ? 5 : 3, 0, Math.PI * 2);
                    mCtx.fillStyle = active ? 'rgba(74,222,128,0.9)' : 'rgba(255,255,255,0.15)';
                    mCtx.fill();
                    
                    if (active) {
                        mCtx.beginPath();
                        mCtx.arc(x, y, 10, 0, Math.PI * 2);
                        mCtx.fillStyle = 'rgba(74,222,128,0.15)';
                        mCtx.fill();
                    }
                    
                    mCtx.font = '600 10px Inter';
                    mCtx.fillStyle = active ? 'rgba(255,255,255,0.7)' : 'rgba(255,255,255,0.2)';
                    mCtx.fillText(n.name, x + 8, y + 4);
                });
            }

            // Map hover
            mapCanvas.addEventListener('mousemove', function(e) {
                var rect = mapCanvas.getBoundingClientRect();
                var scaleX = mapCanvas.width / rect.width;
                var scaleY = mapCanvas.height / rect.height;
                var mx = (e.clientX - rect.left) * scaleX;
                var my = (e.clientY - rect.top) * scaleY;
                
                var found = false;
                jurisNodes.forEach(function(n) {
                    var x = n.x * mapCanvas.width;
                    var y = n.y * mapCanvas.height;
                    var dist = Math.sqrt(Math.pow(mx - x, 2) + Math.pow(my - y, 2));
                    if (dist < 15) {
                        found = true;
                        tooltip.style.opacity = '1';
                        tooltip.style.left = (e.clientX - rect.left + 12) + 'px';
                        tooltip.style.top = (e.clientY - rect.top - 10) + 'px';
                        tooltip.textContent = n.name + ' (' + n.r + ')';
                    }
                });
                if (!found) {
                    tooltip.style.opacity = '0';
                }
            });

            mapCanvas.addEventListener('mouseleave', function() {
                tooltip.style.opacity = '0';
            });

            // Map region filter
            document.querySelectorAll('.wla-intel-rtab').forEach(function(el) {
                el.addEventListener('click', function() {
                    document.querySelectorAll('.wla-intel-rtab').forEach(function(t) {
                        t.classList.remove('wla-intel-rtab--active');
                    });
                    this.classList.add('wla-intel-rtab--active');
                    currentRegion = this.getAttribute('data-region');
                    drawMap(currentRegion);
                });
            });

            // Initial draw
            resizeMap();
            window.addEventListener('resize', resizeMap);
        }

        /**
         * ============================================================
         * INTERSECTION OBSERVER - ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-intel-animate');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-intel-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });
            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-intel-animate').addClass('wla-intel-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                var offset = 80;
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-intel-btn-white, .wla-intel-btn-ghost-white, .wla-intel-btn-ink, .wla-intel-btn-bdr').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'intelligence_cta_click', {
                    'button': btnText,
                    'location': 'intelligence_page'
                });
            }
            console.log('Intelligence CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-intel-sig-region, .wla-intel-rtab, .wla-intel-price-card a').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Intelligence page initialized.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-intel-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-intel-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Bahamas Jurisdiction Scripts
 * World Law Alliance Bahamas Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Bahamas page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-bahamas-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-bahamas-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-bahamas-animate').addClass('wla-bahamas-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-bahamas-pc').on('click', function() {
            var title = $(this).find('.wla-bahamas-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'bahamas_practice_click', {
                    'practice': title,
                    'jurisdiction': 'bahamas'
                });
            }
            console.log('Bahamas practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-bahamas-cg').on('click', function() {
            var route = $(this).find('.wla-bahamas-cg-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'bahamas_corridor_click', {
                    'corridor': route,
                    'jurisdiction': 'bahamas'
                });
            }
            console.log('Bahamas corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-bahamas-btn-ink, .wla-bahamas-btn-bdr, .wla-bahamas-btn-white, .wla-bahamas-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'bahamas_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'bahamas'
                });
            }
            console.log('Bahamas CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-bahamas-pc, .wla-bahamas-cg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-bahamas-intel-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-bahamas-it-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'bahamas_intel_click', {
                    'signal': area,
                    'jurisdiction': 'bahamas'
                });
            }
            console.log('Bahamas intelligence signal clicked: ' + area);
        });

        console.log('WLA Bahamas Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-bahamas-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-bahamas-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA France Jurisdiction Scripts
 * World Law Alliance France Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all France page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-france-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-france-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-france-animate').addClass('wla-france-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-france-pc').on('click', function() {
            var title = $(this).find('.wla-france-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'france_practice_click', {
                    'practice': title,
                    'jurisdiction': 'france'
                });
            }
            console.log('France practice clicked: ' + title);
        });

        /**
         * ============================================================
         * LUXURY CARD CLICK TRACKING
         * Logs luxury card clicks for analytics
         * ============================================================ */
        $('.wla-france-lg').on('click', function() {
            var title = $(this).find('.wla-france-lg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'france_luxury_click', {
                    'topic': title,
                    'jurisdiction': 'france'
                });
            }
            console.log('France luxury topic clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-france-btn-ink, .wla-france-btn-bdr, .wla-france-btn-white, .wla-france-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'france_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'france'
                });
            }
            console.log('France CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-france-pc, .wla-france-lg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA France Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-france-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-france-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Germany Jurisdiction Scripts
 * World Law Alliance Germany Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Germany page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-germany-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-germany-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-germany-animate').addClass('wla-germany-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * MITTELSTAND CARD CLICK TRACKING
         * Logs Mittelstand card clicks for analytics
         * ============================================================ */
        $('.wla-germany-mg').on('click', function() {
            var title = $(this).find('.wla-germany-mg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'germany_mittelstand_click', {
                    'practice': title,
                    'jurisdiction': 'germany'
                });
            }
            console.log('Germany practice clicked: ' + title);
        });

        /**
         * ============================================================
         * DEVELOPMENT CARD CLICK TRACKING
         * Logs development card clicks for analytics
         * ============================================================ */
        $('.wla-germany-dg').on('click', function() {
            var title = $(this).find('.wla-germany-dg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'germany_development_click', {
                    'development': title,
                    'jurisdiction': 'germany'
                });
            }
            console.log('Germany development clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-germany-btn-ink, .wla-germany-btn-bdr, .wla-germany-btn-white, .wla-germany-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'germany_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'germany'
                });
            }
            console.log('Germany CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-germany-mg, .wla-germany-dg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Germany Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-germany-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-germany-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Hong Kong Jurisdiction Scripts
 * World Law Alliance Hong Kong Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Hong Kong page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-hongkong-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-hongkong-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-hongkong-animate').addClass('wla-hongkong-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-hongkong-pc').on('click', function() {
            var title = $(this).find('.wla-hongkong-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hongkong_practice_click', {
                    'practice': title,
                    'jurisdiction': 'hongkong'
                });
            }
            console.log('Hong Kong practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-hongkong-cg').on('click', function() {
            var route = $(this).find('.wla-hongkong-cg-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hongkong_corridor_click', {
                    'corridor': route,
                    'jurisdiction': 'hongkong'
                });
            }
            console.log('Hong Kong corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-hongkong-btn-ink, .wla-hongkong-btn-bdr, .wla-hongkong-btn-white, .wla-hongkong-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hongkong_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'hongkong'
                });
            }
            console.log('Hong Kong CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-hongkong-pc, .wla-hongkong-cg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-hongkong-intel-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-hongkong-it-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'hongkong_intel_click', {
                    'signal': area,
                    'jurisdiction': 'hongkong'
                });
            }
            console.log('Hong Kong intelligence signal clicked: ' + area);
        });

        console.log('WLA Hong Kong Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-hongkong-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-hongkong-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA India Jurisdiction Scripts
 * World Law Alliance India Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all India page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-india-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-india-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-india-animate').addClass('wla-india-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-india-pc').on('click', function() {
            var title = $(this).find('.wla-india-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'india_practice_click', {
                    'practice': title,
                    'jurisdiction': 'india'
                });
            }
            console.log('India practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-india-cc').on('click', function() {
            var routeText = $(this).find('.wla-india-cc-route').text().trim().replace(/\s+/g, ' ');
            if (typeof gtag !== 'undefined') {
                gtag('event', 'india_corridor_click', {
                    'corridor': routeText,
                    'jurisdiction': 'india'
                });
            }
            console.log('India corridor clicked: ' + routeText);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-india-btn-ink, .wla-india-btn-bdr, .wla-india-btn-white, .wla-india-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'india_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'india'
                });
            }
            console.log('India CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-india-pc, .wla-india-cc').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-india-signal-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-india-st-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'india_intel_click', {
                    'signal': area,
                    'jurisdiction': 'india'
                });
            }
            console.log('India intelligence signal clicked: ' + area);
        });

        /**
         * ============================================================
         * PARTNER SPOTLIGHT CARD CLICK TRACKING
         * Logs partner card clicks for analytics
         * ============================================================ */
        $('.wla-india-partner-layout').on('click', function(e) {
            if (e.target.tagName !== 'A' && !$(e.target).closest('a').length) {
                var name = $(this).find('.wla-india-pc-name').text().trim();
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'india_partner_click', {
                        'partner': name,
                        'jurisdiction': 'india'
                    });
                }
                console.log('India partner spotlight clicked: ' + name);
            }
        });

        console.log('WLA India Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-india-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-india-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Netherlands Jurisdiction Scripts
 * World Law Alliance Netherlands Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Netherlands page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-netherlands-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-netherlands-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-netherlands-animate').addClass('wla-netherlands-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-netherlands-pc').on('click', function() {
            var title = $(this).find('.wla-netherlands-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'netherlands_practice_click', {
                    'practice': title,
                    'jurisdiction': 'netherlands'
                });
            }
            console.log('Netherlands practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-netherlands-cg').on('click', function() {
            var route = $(this).find('.wla-netherlands-cg-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'netherlands_corridor_click', {
                    'corridor': route,
                    'jurisdiction': 'netherlands'
                });
            }
            console.log('Netherlands corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-netherlands-btn-ink, .wla-netherlands-btn-bdr, .wla-netherlands-btn-white, .wla-netherlands-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'netherlands_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'netherlands'
                });
            }
            console.log('Netherlands CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-netherlands-pc, .wla-netherlands-cg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-netherlands-intel-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-netherlands-it-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'netherlands_intel_click', {
                    'signal': area,
                    'jurisdiction': 'netherlands'
                });
            }
            console.log('Netherlands intelligence signal clicked: ' + area);
        });

        console.log('WLA Netherlands Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-netherlands-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-netherlands-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Poland Jurisdiction Scripts
 * World Law Alliance Poland Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Poland page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-poland-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-poland-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-poland-animate').addClass('wla-poland-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-poland-pc').on('click', function() {
            var title = $(this).find('.wla-poland-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'poland_practice_click', {
                    'practice': title,
                    'jurisdiction': 'poland'
                });
            }
            console.log('Poland practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-poland-cg').on('click', function() {
            var route = $(this).find('.wla-poland-cg-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'poland_corridor_click', {
                    'corridor': route,
                    'jurisdiction': 'poland'
                });
            }
            console.log('Poland corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-poland-btn-ink, .wla-poland-btn-bdr, .wla-poland-btn-white, .wla-poland-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'poland_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'poland'
                });
            }
            console.log('Poland CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-poland-pc, .wla-poland-cg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-poland-intel-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-poland-it-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'poland_intel_click', {
                    'signal': area,
                    'jurisdiction': 'poland'
                });
            }
            console.log('Poland intelligence signal clicked: ' + area);
        });

        console.log('WLA Poland Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-poland-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-poland-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Portugal Jurisdiction Scripts
 * World Law Alliance Portugal Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Portugal page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-portugal-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-portugal-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-portugal-animate').addClass('wla-portugal-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-portugal-pc').on('click', function() {
            var title = $(this).find('.wla-portugal-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'portugal_practice_click', {
                    'practice': title,
                    'jurisdiction': 'portugal'
                });
            }
            console.log('Portugal practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-portugal-cg').on('click', function() {
            var route = $(this).find('.wla-portugal-cg-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'portugal_corridor_click', {
                    'corridor': route,
                    'jurisdiction': 'portugal'
                });
            }
            console.log('Portugal corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-portugal-btn-ink, .wla-portugal-btn-bdr, .wla-portugal-btn-white, .wla-portugal-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'portugal_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'portugal'
                });
            }
            console.log('Portugal CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-portugal-pc, .wla-portugal-cg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-portugal-intel-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-portugal-it-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'portugal_intel_click', {
                    'signal': area,
                    'jurisdiction': 'portugal'
                });
            }
            console.log('Portugal intelligence signal clicked: ' + area);
        });

        console.log('WLA Portugal Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-portugal-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-portugal-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Singapore Jurisdiction Scripts
 * World Law Alliance Singapore Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Singapore page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-singapore-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-singapore-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-singapore-animate').addClass('wla-singapore-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * HUB CANVAS VISUALIZATION
         * Renders Singapore as APAC hub with spokes to markets
         * ============================================================ */
        var hc = document.getElementById('wlaHubCanvas');
        if (hc) {
            var ctx = hc.getContext('2d');
            var cx = 180, cy = 180, R = 130;

            var markets = [
                { name: 'INDIA', a: -60, color: '#4ade80' },
                { name: 'CHINA', a: -10, color: '#60a5fa' },
                { name: 'JAPAN', a: 30, color: '#f59e0b' },
                { name: 'AUSTRALIA', a: 80, color: '#a78bfa' },
                { name: 'INDONESIA', a: 130, color: '#fb7185' },
                { name: 'GULF', a: 200, color: '#34d399' },
                { name: 'EUROPE', a: 240, color: '#38bdf8' },
                { name: 'US', a: 280, color: '#fbbf24' }
            ];

            function drawHub() {
                ctx.clearRect(0, 0, 360, 360);
                ctx.fillStyle = '#0D0D0D';
                ctx.fillRect(0, 0, 360, 360);

                // Grid rings
                ctx.strokeStyle = 'rgba(255,255,255,0.04)';
                ctx.lineWidth = 0.5;
                for (var i = 1; i <= 3; i++) {
                    ctx.beginPath();
                    ctx.arc(cx, cy, R * i / 3, 0, Math.PI * 2);
                    ctx.stroke();
                }

                // Draw spokes and market labels
                markets.forEach(function(m) {
                    var rad = (m.a * Math.PI) / 180;
                    var mx = cx + R * Math.cos(rad);
                    var my = cy + R * Math.sin(rad);

                    // Spoke
                    ctx.beginPath();
                    ctx.moveTo(cx, cy);
                    ctx.lineTo(mx, my);
                    ctx.strokeStyle = m.color + '40';
                    ctx.lineWidth = 1;
                    ctx.stroke();

                    // Market dot
                    ctx.beginPath();
                    ctx.arc(mx, my, 5, 0, Math.PI * 2);
                    ctx.fillStyle = m.color;
                    ctx.fill();

                    // Glow
                    ctx.beginPath();
                    ctx.arc(mx, my, 10, 0, Math.PI * 2);
                    ctx.fillStyle = m.color + '20';
                    ctx.fill();

                    // Label
                    ctx.font = '600 10px Inter';
                    ctx.fillStyle = m.color;
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    var lx = cx + (R + 22) * Math.cos(rad);
                    var ly = cy + (R + 22) * Math.sin(rad);
                    ctx.fillText(m.name, lx, ly);
                });

                // Singapore hub
                ctx.beginPath();
                ctx.arc(cx, cy, 18, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,255,255,0.08)';
                ctx.fill();
                ctx.beginPath();
                ctx.arc(cx, cy, 12, 0, Math.PI * 2);
                ctx.fillStyle = '#fff';
                ctx.fill();
                ctx.font = '700 9px Inter';
                ctx.fillStyle = '#0D0D0D';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText('SG', cx, cy);
            }

            // Animate pulses
            var pulses = markets.map(function(m) {
                return { m: m, p: 0, speed: 0.008 + Math.random() * 0.006 };
            });

            function animHub() {
                drawHub();
                pulses.forEach(function(pulse) {
                    var rad = (pulse.m.a * Math.PI) / 180;
                    var px = cx + (R * pulse.p) * Math.cos(rad);
                    var py = cy + (R * pulse.p) * Math.sin(rad);
                    ctx.beginPath();
                    ctx.arc(px, py, 3, 0, Math.PI * 2);
                    ctx.fillStyle = pulse.m.color;
                    ctx.fill();
                    pulse.p += pulse.speed;
                    if (pulse.p > 1) pulse.p = 0;
                });
                requestAnimationFrame(animHub);
            }

            // Start animation when canvas is visible
            var canvasObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        animHub();
                        canvasObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            canvasObserver.observe(hc);
        }

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-singapore-pc').on('click', function() {
            var title = $(this).find('.wla-singapore-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'singapore_practice_click', {
                    'practice': title,
                    'jurisdiction': 'singapore'
                });
            }
            console.log('Singapore practice clicked: ' + title);
        });

        /**
         * ============================================================
         * INTELLIGENCE ROW CLICK TRACKING
         * Logs signal row clicks for analytics
         * ============================================================ */
        $('.wla-singapore-sr:not(.wla-singapore-sr--header)').on('click', function() {
            var area = $(this).find('.wla-singapore-sr-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'singapore_intel_click', {
                    'signal': area,
                    'jurisdiction': 'singapore'
                });
            }
            console.log('Singapore intelligence signal clicked: ' + area);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-singapore-btn-ink, .wla-singapore-btn-bdr, .wla-singapore-btn-white, .wla-singapore-btn-ghost-white, .wla-singapore-btn-white-intel').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'singapore_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'singapore'
                });
            }
            console.log('Singapore CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-singapore-pc, .wla-singapore-sr:not(.wla-singapore-sr--header)').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Singapore Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-singapore-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-singapore-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA UAE Jurisdiction Scripts
 * World Law Alliance UAE Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all UAE page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-uae-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-uae-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-uae-animate').addClass('wla-uae-visible');
        }

        /**
         * ============================================================
         * ZONE TABS
         * Switches between DIFC, ADGM, and Mainland panels
         * ============================================================ */
        function setZone(zoneKey) {
            // Update tab active states
            $('.wla-uae-ztab').removeClass('wla-uae-ztab-active');
            $('.wla-uae-ztab[data-zone="' + zoneKey + '"]').addClass('wla-uae-ztab-active');
            
            // Update panel active states
            $('.wla-uae-zone-panel').removeClass('wla-uae-zone-panel-active');
            $('#wlaUaeZp' + zoneKey.charAt(0).toUpperCase() + zoneKey.slice(1)).addClass('wla-uae-zone-panel-active');
        }

        // Tab click handler
        $('.wla-uae-ztab').on('click', function() {
            var zone = $(this).data('zone');
            setZone(zone);
            
            // Track analytics
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uae_zone_tab_click', {
                    'zone': zone,
                    'jurisdiction': 'uae'
                });
            }
            console.log('UAE zone selected: ' + zone);
        });

        // Keyboard support for tabs
        $('.wla-uae-ztab').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-uae-pc').on('click', function() {
            var title = $(this).find('.wla-uae-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uae_practice_click', {
                    'practice': title,
                    'jurisdiction': 'uae'
                });
            }
            console.log('UAE practice clicked: ' + title);
        });

        /**
         * ============================================================
         * SIGNAL ROW CLICK TRACKING
         * Logs signal row clicks for analytics
         * ============================================================ */
        $('.wla-uae-sr').on('click', function() {
            var area = $(this).find('.wla-uae-sr-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uae_signal_click', {
                    'signal': area,
                    'jurisdiction': 'uae'
                });
            }
            console.log('UAE signal clicked: ' + area);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-uae-btn-ink, .wla-uae-btn-bdr, .wla-uae-btn-white, .wla-uae-btn-ghost-white, .wla-uae-btn-white-dark').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uae_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'uae'
                });
            }
            console.log('UAE CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-uae-pc, .wla-uae-v2030-item').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA UAE Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-uae-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-uae-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA United Kingdom Jurisdiction Scripts
 * World Law Alliance United Kingdom Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all UK page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-uk-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-uk-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-uk-animate').addClass('wla-uk-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-uk-pc').on('click', function() {
            var title = $(this).find('.wla-uk-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uk_practice_click', {
                    'practice': title,
                    'jurisdiction': 'uk'
                });
            }
            console.log('UK practice clicked: ' + title);
        });

        /**
         * ============================================================
         * DEVELOPMENT ROW CLICK TRACKING
         * Logs development row clicks for analytics
         * ============================================================ */
        $('.wla-uk-dev-row').on('click', function() {
            var title = $(this).find('.wla-uk-dr-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uk_development_click', {
                    'development': title,
                    'jurisdiction': 'uk'
                });
            }
            console.log('UK development clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-uk-btn-ink, .wla-uk-btn-bdr, .wla-uk-btn-white, .wla-uk-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'uk_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'uk'
                });
            }
            console.log('UK CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-uk-pc, .wla-uk-dev-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * LAW POINT TOGGLE (Optional interactive enhancement)
         * Allows users to highlight key points
         * ============================================================ */
        $('.wla-uk-law-points li').on('click', function() {
            $(this).toggleClass('highlighted');
        });

        console.log('WLA United Kingdom Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-uk-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-uk-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Zambia Jurisdiction Scripts
 * World Law Alliance Zambia Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Zambia page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-zambia-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-zambia-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-zambia-animate').addClass('wla-zambia-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * PRACTICE CARD CLICK TRACKING
         * Logs practice card clicks for analytics
         * ============================================================ */
        $('.wla-zambia-pc').on('click', function() {
            var title = $(this).find('.wla-zambia-pc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'zambia_practice_click', {
                    'practice': title,
                    'jurisdiction': 'zambia'
                });
            }
            console.log('Zambia practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CORRIDOR CARD CLICK TRACKING
         * Logs corridor card clicks for analytics
         * ============================================================ */
        $('.wla-zambia-cg').on('click', function() {
            var route = $(this).find('.wla-zambia-cg-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'zambia_corridor_click', {
                    'corridor': route,
                    'jurisdiction': 'zambia'
                });
            }
            console.log('Zambia corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-zambia-btn-ink, .wla-zambia-btn-bdr, .wla-zambia-btn-white, .wla-zambia-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'zambia_cta_click', {
                    'button': btnText,
                    'jurisdiction': 'zambia'
                });
            }
            console.log('Zambia CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-zambia-pc, .wla-zambia-cg').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * INTELLIGENCE TABLE ROW CLICK TRACKING
         * Logs table row clicks for analytics
         * ============================================================ */
        $('.wla-zambia-intel-table tbody tr').on('click', function() {
            var area = $(this).find('.wla-zambia-it-area').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'zambia_intel_click', {
                    'signal': area,
                    'jurisdiction': 'zambia'
                });
            }
            console.log('Zambia intelligence signal clicked: ' + area);
        });

        console.log('WLA Zambia Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-zambia-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-zambia-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA About Page Scripts
 * World Law Alliance About Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all About page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-about-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-about-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-about-animate').addClass('wla-about-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * STAT COUNTER ANIMATION
         * Animates numbers counting up from 0 to target
         * ============================================================ */
        function animateCounter(el) {
            var target = parseInt(el.dataset.t);
            var duration = 1400;
            var startTime = performance.now();

            function step(currentTime) {
                var progress = Math.min((currentTime - startTime) / duration, 1);
                var easeOut = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(easeOut * target);
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            }
            requestAnimationFrame(step);
        }

        var statObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('[data-t]').forEach(animateCounter);
                    statObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        var statsGrid = document.querySelector('.wla-about-stats-grid');
        if (statsGrid) {
            statObserver.observe(statsGrid);
        }

        /**
         * ============================================================
         * TIMELINE INTERACTION
         * Toggles active state on timeline years
         * ============================================================ */
        window.wlaSetYear = function(el) {
            document.querySelectorAll('.wla-about-tl-year').forEach(function(t) {
                t.classList.remove('wla-about-tl-year--active');
            });
            el.classList.add('wla-about-tl-year--active');
        };

        /**
         * ============================================================
         * REGION CARDS INTERACTION
         * Toggles active state on region cards to show/hide countries
         * ============================================================ */
        window.wlaToggleRc = function(el) {
            document.querySelectorAll('.wla-about-rc').forEach(function(r) {
                r.classList.remove('wla-about-rc--active');
            });
            el.classList.add('wla-about-rc--active');
        };

        /**
         * ============================================================
         * TEAM CARD CLICK TRACKING
         * Logs team member clicks for analytics
         * ============================================================ */
        $('.wla-about-tc').on('click', function() {
            var name = $(this).find('.wla-about-tc-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'about_team_click', {
                    'member': name,
                    'page': 'about'
                });
            }
            console.log('Team member clicked: ' + name);
        });

        /**
         * ============================================================
         * PILLAR CARD CLICK TRACKING
         * Logs pillar clicks for analytics
         * ============================================================ */
        $('.wla-about-pillar').on('click', function() {
            var title = $(this).find('.wla-about-pillar-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'about_pillar_click', {
                    'pillar': title,
                    'page': 'about'
                });
            }
            console.log('Pillar clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-about-btn-ink, .wla-about-btn-bdr, .wla-about-btn-white, .wla-about-btn-ghost-white, .wla-about-corg-link').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'about_cta_click', {
                    'button': btnText,
                    'page': 'about'
                });
            }
            console.log('About CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-about-tl-year, .wla-about-rc, .wla-about-pillar, .wla-about-tc').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * REGION CARD AUTO-SCROLL ON MOBILE
         * Ensures active card is visible on small screens
         * ============================================================ */
        if (window.innerWidth <= 960) {
            $('.wla-about-rc').on('click', function() {
                var rect = this.getBoundingClientRect();
                if (rect.top < 0 || rect.bottom > window.innerHeight) {
                    this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        }

        console.log('WLA About Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-about-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-about-visible');
            }
        });

        // Ensure timeline active year is visible
        var activeYear = document.querySelector('.wla-about-tl-year--active');
        if (activeYear) {
            var track = document.getElementById('wlaTlTrack');
            if (track) {
                var yearRect = activeYear.getBoundingClientRect();
                var trackRect = track.getBoundingClientRect();
                if (yearRect.left < trackRect.left || yearRect.right > trackRect.right) {
                    activeYear.scrollIntoView({ behavior: 'smooth', inline: 'center' });
                }
            }
        }
    });

})(jQuery);
/**
 * WLA Arbitration & Mediation Scripts
 * World Law Alliance Arbitration Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Arbitration page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-arbitration-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-arbitration-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-arbitration-animate').addClass('wla-arbitration-visible');
        }

        /**
         * ============================================================
         * INSTITUTION SELECTOR
         * Toggles active state and shows details
         * ============================================================ */
        $('.wla-arbitration-inst').on('click', function() {
            var $this = $(this);
            
            // Remove active from all
            $('.wla-arbitration-inst').removeClass('wla-arbitration-inst-active');
            
            // Add active to clicked
            $this.addClass('wla-arbitration-inst-active');
            
            // Track analytics
            var instName = $this.find('.wla-arbitration-inst-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'arbitration_institution_select', {
                    'institution': instName
                });
            }
            console.log('Arbitration institution selected: ' + instName);
        });

        /**
         * ============================================================
         * CAPABILITIES ACCORDION
         * Toggle expand/collapse for each capability row
         * ============================================================ */
        $('.wla-arbitration-cap-row').on('click', function() {
            var $this = $(this);
            var $expand = $this.next('.wla-arbitration-cr-expand');
            var isOpen = $this.hasClass('wla-arbitration-cap-row-open');
            
            // Close all open rows
            $('.wla-arbitration-cap-row-open').each(function() {
                $(this).removeClass('wla-arbitration-cap-row-open');
                $(this).next('.wla-arbitration-cr-expand').removeClass('wla-arbitration-cr-expand-open').hide();
            });
            
            // Open clicked if it was closed
            if (!isOpen) {
                $this.addClass('wla-arbitration-cap-row-open');
                $expand.addClass('wla-arbitration-cr-expand-open').show();
                
                // Track analytics
                var title = $this.find('.wla-arbitration-cr-title').text().trim();
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'arbitration_capability_expand', {
                        'capability': title
                    });
                }
                console.log('Capability expanded: ' + title);
            }
        });

        /**
         * ============================================================
         * ENFORCEMENT BARS ANIMATION
         * Animate bar widths when section comes into view
         * ============================================================ */
        var enfData = [
            { country: 'UK', pct: 95 },
            { country: 'Singapore', pct: 92 },
            { country: 'UAE', pct: 88 },
            { country: 'India', pct: 78 },
            { country: 'Germany', pct: 96 },
            { country: 'Hong Kong', pct: 94 },
            { country: 'Poland', pct: 85 },
            { country: 'Kenya', pct: 72 }
        ];

        var container = document.getElementById('wlaArbEnfBars');
        if (container) {
            enfData.forEach(function(d) {
                var row = document.createElement('div');
                row.className = 'wla-arbitration-enf-row';
                row.innerHTML = 
                    '<div class="wla-arbitration-enf-country">' + d.country + '</div>' +
                    '<div class="wla-arbitration-enf-bar-wrap"><div class="wla-arbitration-enf-bar" data-width="' + d.pct + '"></div></div>' +
                    '<div class="wla-arbitration-enf-pct">' + d.pct + '%</div>';
                container.appendChild(row);
            });
        }

        // Observe enforcement section for bar animation
        var enfWrap = document.getElementById('wlaArbEnfWrap');
        if (enfWrap && 'IntersectionObserver' in window) {
            var barObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.querySelectorAll('.wla-arbitration-enf-bar').forEach(function(bar) {
                            setTimeout(function() {
                                bar.style.width = bar.dataset.width + '%';
                            }, 100);
                        });
                        barObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            barObserver.observe(enfWrap);
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-arbitration-btn-white, .wla-arbitration-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'arbitration_cta_click', {
                    'button': btnText
                });
            }
            console.log('Arbitration CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-arbitration-inst, .wla-arbitration-cap-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Arbitration Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-arbitration-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-arbitration-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Clients Page Scripts
 * World Law Alliance Clients Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Clients page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-clients-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-clients-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-clients-animate').addClass('wla-clients-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * GLASS CARD - LIVE PULSE ANIMATION
         * Ensures the live dot animation stays active
         * ============================================================ */
        var gdot = document.querySelector('.wla-clients-gdot');
        if (gdot) {
            setInterval(function() {
                gdot.style.opacity = gdot.style.opacity === '0.3' ? '1' : '0.3';
            }, 3000);
        }

        /**
         * ============================================================
         * SECTOR CARD CLICK TRACKING
         * Logs sector card clicks for analytics
         * ============================================================ */
        $('.wla-clients-sector-card').on('click', function() {
            var name = $(this).find('.wla-clients-sector-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'clients_sector_click', {
                    'sector': name,
                    'page': 'clients'
                });
            }
            console.log('Sector clicked: ' + name);
        });

        /**
         * ============================================================
         * CASE STUDY CARD CLICK TRACKING
         * Logs case study card clicks for analytics
         * ============================================================ */
        $('.wla-clients-cs-card').on('click', function() {
            var title = $(this).find('.wla-clients-cs-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'clients_casestudy_click', {
                    'case': title,
                    'page': 'clients'
                });
            }
            console.log('Case study clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-clients-btn-ink, .wla-clients-btn-bdr, .wla-clients-btn-white, .wla-clients-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'clients_cta_click', {
                    'button': btnText,
                    'page': 'clients'
                });
            }
            console.log('Clients CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-clients-sector-card, .wla-clients-cs-card, .wla-clients-process-step').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * HORIZONTAL SCROLL HINT - FADE IN/OUT
         * Shows/hides scroll hint based on scroll position
         * ============================================================ */
        var scrollContainer = document.querySelector('.wla-clients-sectors-scroll');
        var scrollHint = document.querySelector('.wla-clients-scroll-hint');

        if (scrollContainer && scrollHint) {
            scrollContainer.addEventListener('scroll', function() {
                var maxScroll = this.scrollWidth - this.clientWidth;
                if (this.scrollLeft >= maxScroll - 20) {
                    scrollHint.style.opacity = '0.4';
                } else {
                    scrollHint.style.opacity = '1';
                }
            });

            // Check initial state
            if (scrollContainer.scrollWidth <= scrollContainer.clientWidth) {
                scrollHint.style.opacity = '0.3';
            }
        }

        console.log('WLA Clients Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-clients-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-clients-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA For Firms Page Scripts
 * World Law Alliance For Firms Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all For Firms page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-firms-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-firms-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-firms-animate').addClass('wla-firms-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * HERO RIGHT CARD CLICK TRACKING
         * Logs hero card clicks for analytics
         * ============================================================ */
        $('.wla-firms-hrc').on('click', function() {
            var title = $(this).find('.wla-firms-hrc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'firms_hero_card_click', {
                    'card': title,
                    'page': 'for_firms'
                });
            }
            console.log('Hero card clicked: ' + title);
        });

        /**
         * ============================================================
         * FEATURE ROW CLICK TRACKING
         * Logs feature row clicks for analytics
         * ============================================================ */
        $('.wla-firms-feat-row').on('click', function() {
            var title = $(this).find('.wla-firms-fr-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'firms_feature_click', {
                    'feature': title,
                    'page': 'for_firms'
                });
            }
            console.log('Feature clicked: ' + title);
        });

        /**
         * ============================================================
         * ACCREDITATION STEP CLICK TRACKING
         * Logs accreditation step clicks for analytics
         * ============================================================ */
        $('.wla-firms-acp-step').on('click', function() {
            var name = $(this).find('.wla-firms-acp-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'firms_accreditation_click', {
                    'level': name,
                    'page': 'for_firms'
                });
            }
            console.log('Accreditation level clicked: ' + name);
        });

        /**
         * ============================================================
         * METRIC CARD CLICK TRACKING
         * Logs metric card clicks for analytics
         * ============================================================ */
        $('.wla-firms-metric-card').on('click', function() {
            var label = $(this).find('.wla-firms-mc-label').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'firms_metric_click', {
                    'metric': label,
                    'page': 'for_firms'
                });
            }
            console.log('Metric clicked: ' + label);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-firms-btn-ink, .wla-firms-btn-bdr, .wla-firms-btn-white, .wla-firms-btn-ghost-white, .wla-firms-form-submit').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'firms_cta_click', {
                    'button': btnText,
                    'page': 'for_firms'
                });
            }
            console.log('Firms CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-firms-hrc, .wla-firms-feat-row, .wla-firms-acp-step, .wla-firms-metric-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * FORM SUBMISSION HANDLER
         * Basic form validation and submission tracking
         * ============================================================ */
        $('#wlaFirmsForm').on('submit', function(e) {
            e.preventDefault();

            // Basic validation
            var valid = true;
            $(this).find('input[required], select[required]').each(function() {
                if (!$(this).val()) {
                    valid = false;
                    $(this).css('border-color', '#ef4444');
                } else {
                    $(this).css('border-color', '');
                }
            });

            if (!valid) {
                alert('Please fill in all required fields.');
                return;
            }

            // Track submission
            if (typeof gtag !== 'undefined') {
                gtag('event', 'firms_application_submit', {
                    'page': 'for_firms'
                });
            }

            // Show success message
            var $form = $(this);
            var $btn = $form.find('.wla-firms-form-submit');
            var originalText = $btn.text();

            $btn.text('SUBMITTED ✓');
            $btn.css('background', '#16A34A');
            $btn.css('color', '#fff');

            // Reset after 3 seconds
            setTimeout(function() {
                $btn.text(originalText);
                $btn.css('background', '');
                $btn.css('color', '');
            }, 3000);

            console.log('Firms application submitted');
        });

        /**
         * ============================================================
         * FORM INPUT RESET ON FOCUS
         * Removes error styling when user focuses on field
         * ============================================================ */
        $('.wla-firms-form-input, .wla-firms-form-select').on('focus', function() {
            $(this).css('border-color', '');
        });

        console.log('WLA For Firms Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-firms-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-firms-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Partner Directory Scripts
 * World Law Alliance Directory Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * ============================================================
     * FIRM DATA
     * ============================================================ */
    var firms = [
        { name: 'S.K. SINGHI & PARTNERS', jur: 'India', region: 'APAC', tier: 'anchor', practices: ['M&A', 'Corporate', 'FDI'], lead: 'Akshay Singhi', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/10/Akshay-Singhi-WLA-Member-scaled.jpg', size: '45 lawyers' },
        { name: 'SOKOLOWSKI & PARTNERS', jur: 'Poland', region: 'EU', tier: 'distinguished', practices: ['Transactional', 'Disputes', 'CEE M&A'], lead: 'Dawid Sokolowski', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/10/Dawid-Sokolowski-WLA-Member-scaled.jpg', size: '32 lawyers' },
        { name: 'WLA SWITZERLAND', jur: 'Switzerland', region: 'EU', tier: 'distinguished', practices: ['Private Clients', 'HNW', 'Tax'], lead: 'Natacha Auvertin', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/11/Natacha-Auvertin-WLA-Member.jpg', size: '18 lawyers' },
        { name: 'AL JUBAIRI LAW FIRM', jur: 'Saudi Arabia', region: 'ME', tier: 'anchor', practices: ['FDI', 'Vision 2030', 'M&A'], lead: 'Mused Alrashidi', photo: '', size: '28 lawyers' },
        { name: 'WLA KENYA', jur: 'Kenya', region: 'AF', tier: 'distinguished', practices: ['Corporate', 'Infrastructure', 'East Africa'], lead: 'Evelyn Njiru', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/10/Evelyn-W.-Njiru-WLA-Member.jpg', size: '22 lawyers' },
        { name: 'WLA MAURITIUS', jur: 'Mauritius', region: 'AF', tier: 'partner', practices: ['Tax Structuring', 'Africa Gateway', 'Funds'], lead: 'Ahmed Bhurtun', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/10/Ahmed-Richard-Bhurtun-WLA-Member-scaled.jpg', size: '12 lawyers' },
        { name: 'WLA GUINEA', jur: 'Guinea', region: 'AF', tier: 'partner', practices: ['Mining', 'Natural Resources', 'FDI'], lead: 'Jean Pascal Ouendeno', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/10/Jean-Pascal-Ouendeno-WLA-Member.jpg', size: '15 lawyers' },
        { name: 'WLA ZAMBIA', jur: 'Zambia', region: 'AF', tier: 'partner', practices: ['Corporate', 'Mining', 'Energy'], lead: 'Melody Mwansa', photo: 'https://worldlawalliance.com/wp-content/uploads/2025/10/Melody-Mwansa-WLA-Member.jpg', size: '10 lawyers' },
        { name: 'WLA UAE', jur: 'United Arab Emirates', region: 'ME', tier: 'anchor', practices: ['Corporate', 'Tax', 'Employment'], lead: 'WLA UAE Team', photo: '', size: '34 lawyers' },
        { name: 'FIGUERAS LEGAL', jur: 'Spain', region: 'EU', tier: 'distinguished', practices: ['M&A', 'Real Estate', 'Arbitration'], lead: 'Josep Figueras', photo: '', size: '20 lawyers' },
        { name: 'WLA SINGAPORE', jur: 'Singapore', region: 'APAC', tier: 'distinguished', practices: ['Arbitration', 'Data', 'IP'], lead: 'WLA SG Team', photo: '', size: '26 lawyers' },
        { name: 'WLA NETHERLANDS', jur: 'Netherlands', region: 'EU', tier: 'partner', practices: ['Tax', 'Corporate', 'Employment'], lead: 'WLA NL Team', photo: '', size: '19 lawyers' }
    ];

    var currentFilter = 'ALL';
    var currentSearch = '';
    var sortAZ = true;
    var selectedRegions = [];
    var selectedPractices = [];

    /**
     * ============================================================
     * UTILITY FUNCTIONS
     * ============================================================ */
    function tierLabel(tier) {
        var map = { anchor: 'WLA ANCHOR', distinguished: 'WLA DISTINGUISHED', partner: 'WLA PARTNER' };
        return map[tier] || tier;
    }

    function initials(name) {
        return name.split(' ').map(function(w) { return w[0]; }).join('').slice(0, 2);
    }

    /**
     * ============================================================
     * RENDER FIRMS
     * ============================================================ */
    function renderFirms() {
        var grid = document.getElementById('wlaDirFirmsGrid');
        var filtered = firms.slice();

        // Filter by tier/region/practice from top bar
        if (currentFilter !== 'ALL') {
            filtered = filtered.filter(function(f) {
                return f.tier === currentFilter || 
                       f.region === currentFilter || 
                       f.practices.some(function(p) { return p.toLowerCase().includes(currentFilter.toLowerCase()); });
            });
        }

        // Filter by search
        if (currentSearch) {
            filtered = filtered.filter(function(f) {
                return f.name.toLowerCase().includes(currentSearch) || 
                       f.jur.toLowerCase().includes(currentSearch) || 
                       f.practices.some(function(p) { return p.toLowerCase().includes(currentSearch); });
            });
        }

        // Filter by selected regions
        if (selectedRegions.length > 0) {
            filtered = filtered.filter(function(f) {
                return selectedRegions.indexOf(f.region) !== -1;
            });
        }

        // Filter by selected practices
        if (selectedPractices.length > 0) {
            filtered = filtered.filter(function(f) {
                return f.practices.some(function(p) {
                    return selectedPractices.some(function(sp) {
                        return p.toLowerCase().includes(sp.toLowerCase());
                    });
                });
            });
        }

        // Sort
        if (sortAZ) {
            filtered.sort(function(a, b) { return a.name.localeCompare(b.name); });
        } else {
            filtered.sort(function(a, b) { return b.name.localeCompare(a.name); });
        }

        // Update counts
        document.getElementById('wlaDirGridCount').innerHTML = 'Showing <strong>' + filtered.length + '</strong> of ' + firms.length + ' WLA-Qualified partner firms';
        document.getElementById('wlaDirFirmCount').innerHTML = 'Showing <strong>' + filtered.length + '</strong> of ' + firms.length + ' firms';

        grid.innerHTML = '';

        if (filtered.length === 0) {
            grid.innerHTML = '<div style="grid-column:1/-1;padding:60px 0;text-align:center;color:var(--wla-directory-muted);font-size:15px">No firms match your current filters. <a href="#" id="wlaDirClearLink" style="color:var(--wla-directory-ink);font-weight:600;text-decoration:underline">Clear all filters</a></div>';
            document.getElementById('wlaDirClearLink').addEventListener('click', function(e) {
                e.preventDefault();
                clearAllFilters();
            });
            return;
        }

        // Spotlight card for first anchor
        var spotlightFirm = filtered.find(function(f) { return f.tier === 'anchor'; }) || filtered[0];
        var spotCard = document.createElement('div');
        spotCard.className = 'wla-directory-fc wla-directory-fc--spotlight';
        
        var logoHtml = '';
        if (spotlightFirm.photo) {
            logoHtml = '<img src="' + spotlightFirm.photo + '" style="width:80px;height:80px;border-radius:10px;object-fit:cover;object-position:top;border:1px solid rgba(255,255,255,.1)" onerror="this.style.display=\'none\'">';
        } else {
            logoHtml = '<div class="wla-directory-fc-logo" style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.4)">' + initials(spotlightFirm.name) + '</div>';
        }

        spotCard.innerHTML = 
            '<div class="wla-directory-fc-top">' +
                '<div>' + logoHtml + '</div>' +
                '<div>' +
                    '<div style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin-bottom:8px">FEATURED · ' + tierLabel(spotlightFirm.tier) + '</div>' +
                    '<div class="wla-directory-fc-name">' + spotlightFirm.name + '</div>' +
                    '<div class="wla-directory-fc-jur">' + spotlightFirm.jur + ' · ' + spotlightFirm.size + '</div>' +
                    '<div class="wla-directory-fc-practices" style="margin-top:10px">' + spotlightFirm.practices.map(function(p) { return '<span class="wla-directory-fc-prac">' + p + '</span>'; }).join('') + '</div>' +
                '</div>' +
            '</div>' +
            '<div class="wla-directory-fc-bottom"><span class="wla-directory-fc-contact">VIEW FIRM PROFILE →</span></div>';
        grid.appendChild(spotCard);

        // Remaining cards
        filtered.forEach(function(f) {
            if (f === spotlightFirm) return;
            var card = document.createElement('div');
            card.className = 'wla-directory-fc';
            
            var tierClass = '';
            if (f.tier === 'anchor') tierClass = 'wla-directory-fc-tier-badge--anchor';
            else if (f.tier === 'distinguished') tierClass = 'wla-directory-fc-tier-badge--distinguished';
            else tierClass = 'wla-directory-fc-tier-badge--partner';

            var logoHtml2 = '';
            if (f.photo) {
                logoHtml2 = '<div class="wla-directory-fc-logo" style="background:none;padding:0"><img src="' + f.photo + '" style="width:44px;height:44px;border-radius:10px;object-fit:cover;object-position:top" onerror="this.outerHTML=\'<div class=wla-directory-fc-logo>' + initials(f.name) + '</div>\'"></div>';
            } else {
                logoHtml2 = '<div class="wla-directory-fc-logo">' + initials(f.name) + '</div>';
            }

            card.innerHTML = 
                '<div class="wla-directory-fc-top">' +
                    '<div class="wla-directory-fc-tier-badge ' + tierClass + '">' + tierLabel(f.tier) + '</div>' +
                    logoHtml2 +
                    '<div class="wla-directory-fc-name">' + f.name + '</div>' +
                    '<div class="wla-directory-fc-jur">' + f.jur + '</div>' +
                    '<div class="wla-directory-fc-practices">' + f.practices.map(function(p) { return '<span class="wla-directory-fc-prac">' + p + '</span>'; }).join('') + '</div>' +
                '</div>' +
                '<div class="wla-directory-fc-bottom">' +
                    '<span style="font-size:11px;color:var(--wla-directory-muted)">' + f.size + '</span>' +
                    '<span class="wla-directory-fc-contact">PROFILE →</span>' +
                '</div>';
            grid.appendChild(card);
        });
    }

    /**
     * ============================================================
     * FILTER FUNCTIONS
     * ============================================================ */
    function setTab(el, filter) {
        document.querySelectorAll('.wla-directory-fbt').forEach(function(t) {
            t.classList.remove('wla-directory-fbt--active');
        });
        el.classList.add('wla-directory-fbt--active');
        currentFilter = filter;
        renderFirms();
    }

    function filterTier(el, tier) {
        document.querySelectorAll('.wla-directory-tf-btn').forEach(function(t) {
            t.classList.remove('wla-directory-tf-btn--active');
        });
        el.classList.add('wla-directory-tf-btn--active');
        currentFilter = tier;
        renderFirms();
    }

    function toggleSb(el) {
        var cb = el.querySelector('.wla-directory-sb-checkbox');
        cb.classList.toggle('wla-directory-sb-checkbox--checked');
        
        var region = el.getAttribute('data-region');
        var practice = el.getAttribute('data-practice');
        
        if (region) {
            var idx = selectedRegions.indexOf(region);
            if (idx === -1) {
                selectedRegions.push(region);
            } else {
                selectedRegions.splice(idx, 1);
            }
        }
        
        if (practice) {
            var idx2 = selectedPractices.indexOf(practice);
            if (idx2 === -1) {
                selectedPractices.push(practice);
            } else {
                selectedPractices.splice(idx2, 1);
            }
        }
        
        renderFirms();
    }

    function clearAllFilters() {
        currentFilter = 'ALL';
        currentSearch = '';
        selectedRegions = [];
        selectedPractices = [];
        
        document.getElementById('wlaDirHeroSearch').value = '';
        
        document.querySelectorAll('.wla-directory-fbt').forEach(function(t) {
            t.classList.remove('wla-directory-fbt--active');
        });
        document.querySelector('.wla-directory-fbt').classList.add('wla-directory-fbt--active');
        
        document.querySelectorAll('.wla-directory-tf-btn').forEach(function(t) {
            t.classList.remove('wla-directory-tf-btn--active');
        });
        
        document.querySelectorAll('.wla-directory-sb-checkbox').forEach(function(c) {
            c.classList.remove('wla-directory-sb-checkbox--checked');
        });
        
        document.querySelectorAll('.wla-directory-chip').forEach(function(c) {
            c.classList.remove('wla-directory-chip--selected');
        });
        document.querySelector('.wla-directory-chip').classList.add('wla-directory-chip--selected');
        
        renderFirms();
    }

    function heroChip(el, region) {
        document.querySelectorAll('.wla-directory-chip').forEach(function(c) {
            c.classList.remove('wla-directory-chip--selected');
        });
        el.classList.add('wla-directory-chip--selected');
        currentFilter = region;
        renderFirms();
    }

    function liveSearch(val) {
        currentSearch = val.toLowerCase();
        renderFirms();
    }

    function toggleSort(el) {
        sortAZ = !sortAZ;
        el.textContent = sortAZ ? 'SORT: A–Z ↕' : 'SORT: Z–A ↕';
        renderFirms();
    }

    /**
     * ============================================================
     * REGION CARDS
     * ============================================================ */
    function toggleRegion(el) {
        document.querySelectorAll('.wla-directory-rc').forEach(function(r) {
            r.classList.remove('wla-directory-rc--active');
        });
        el.classList.add('wla-directory-rc--active');
    }

    /**
     * ============================================================
     * DOM READY
     * ============================================================ */
    $(document).ready(function() {

        // Initial render
        renderFirms();

        // Hero search
        $('#wlaDirHeroSearch').on('input', function() {
            liveSearch(this.value);
        });

        // Search button
        $('.wla-directory-search-btn').on('click', function() {
            liveSearch($('#wlaDirHeroSearch').val());
        });

        // Filter bar tabs
        $('.wla-directory-fbt').on('click', function() {
            var filter = $(this).data('filter');
            setTab(this, filter);
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'directory_filter_tab', {
                    'filter': filter
                });
            }
        });

        // Tier filter
        $('.wla-directory-tf-btn').on('click', function() {
            var tier = $(this).data('tier');
            filterTier(this, tier);
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'directory_filter_tier', {
                    'tier': tier
                });
            }
        });

        // Sidebar options
        $('.wla-directory-sb-option').on('click', function() {
            toggleSb(this);
        });

        // Hero chips
        $('.wla-directory-chip').on('click', function() {
            var region = $(this).data('region');
            heroChip(this, region);
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'directory_filter_region', {
                    'region': region
                });
            }
        });

        // Clear filters
        $('#wlaDirClearFilters').on('click', function() {
            clearAllFilters();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'directory_clear_filters');
            }
        });

        // Sort toggle
        $('#wlaDirToggleSort').on('click', function() {
            toggleSort(this);
        });

        // Region cards
        $('.wla-directory-rc').on('click', function() {
            toggleRegion(this);
        });

        // Pagination
        $('.wla-directory-pg-btn').on('click', function() {
            if ($(this).hasClass('wla-directory-pg-btn--disabled') || $(this).hasClass('wla-directory-pg-btn--arrow')) return;
            
            $('.wla-directory-pg-btn').removeClass('wla-directory-pg-btn--active');
            $(this).addClass('wla-directory-pg-btn--active');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'directory_pagination', {
                    'page': $(this).text()
                });
            }
        });

        // Firm card click
        $(document).on('click', '.wla-directory-fc', function() {
            var name = $(this).find('.wla-directory-fc-name').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'directory_firm_click', {
                    'firm': name
                });
            }
            console.log('Firm clicked: ' + name);
        });

        // Keyboard support
        $(document).on('keydown', '.wla-directory-fbt, .wla-directory-tf-btn, .wla-directory-sb-option, .wla-directory-chip, .wla-directory-rc', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Directory Page initialized successfully.');
    });

    /**
     * ============================================================
     * EXPOSE FUNCTIONS GLOBALLY
     * ============================================================ */
    window.wlaDirectory = {
        renderFirms: renderFirms,
        setTab: setTab,
        filterTier: filterTier,
        toggleSb: toggleSb,
        clearAllFilters: clearAllFilters,
        heroChip: heroChip,
        liveSearch: liveSearch,
        toggleSort: toggleSort,
        toggleRegion: toggleRegion
    };

})(jQuery);
/**
 * WLA Corridor Page Scripts
 * World Law Alliance US to Europe Corridor Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Corridor page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-corridor-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-corridor-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-corridor-animate').addClass('wla-corridor-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * BOTH SIDES CARD CLICK TRACKING
         * Logs both sides card clicks for analytics
         * ============================================================ */
        $('.wla-corridor-bs').on('click', function(e) {
            // Ignore clicks on links inside the card
            if ($(e.target).closest('a').length) return;
            
            var country = $(this).find('.wla-corridor-bs-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_both_sides_click', {
                    'side': country,
                    'corridor': 'us_europe'
                });
            }
            console.log('Both sides card clicked: ' + country);
        });

        /**
         * ============================================================
         * THEME CARD CLICK TRACKING
         * Logs theme card clicks for analytics
         * ============================================================ */
        $('.wla-corridor-tg').on('click', function() {
            var title = $(this).find('.wla-corridor-tg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_theme_click', {
                    'theme': title,
                    'corridor': 'us_europe'
                });
            }
            console.log('Theme clicked: ' + title);
        });

        /**
         * ============================================================
         * INTELLIGENCE ROW CLICK TRACKING
         * Logs intelligence row clicks for analytics
         * ============================================================ */
        $('.wla-corridor-ir:not(.wla-corridor-ir--header)').on('click', function() {
            var jur = $(this).find('.wla-corridor-ir-jur').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_intel_click', {
                    'jurisdiction': jur,
                    'corridor': 'us_europe'
                });
            }
            console.log('Intel row clicked: ' + jur);
        });

        /**
         * ============================================================
         * RELATED CORRIDOR CARD CLICK TRACKING
         * Logs related corridor clicks for analytics
         * ============================================================ */
        $('.wla-corridor-rel-card').on('click', function() {
            var route = $(this).find('.wla-corridor-rc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_related_click', {
                    'corridor': route,
                    'page': 'us_europe'
                });
            }
            console.log('Related corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-corridor-btn-white, .wla-corridor-btn-ghost-white, .wla-corridor-btn-white-intel').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_cta_click', {
                    'button': btnText,
                    'corridor': 'us_europe'
                });
            }
            console.log('Corridor CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-corridor-bs, .wla-corridor-tg, .wla-corridor-ir:not(.wla-corridor-ir--header), .wla-corridor-rel-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * HERO SPLIT BACKGROUND - PARALLAX EFFECT
         * Subtle parallax on scroll for hero background
         * ============================================================ */
        var heroBg = document.querySelector('.wla-corridor-hero-bg');
        if (heroBg) {
            $(window).on('scroll', function() {
                var scrollPos = $(window).scrollTop();
                var heroHeight = $('.wla-corridor-hero').height();
                if (scrollPos < heroHeight) {
                    var offset = scrollPos * 0.1;
                    heroBg.style.transform = 'translateY(' + offset + 'px)';
                }
            });
        }

        console.log('WLA US to Europe Corridor Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-corridor-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-corridor-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA UK to Africa Corridor Scripts
 * World Law Alliance UK to Africa Corridor Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all UK to Africa corridor functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-corridor-ukafrica-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-corridor-ukafrica-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-corridor-ukafrica-animate').addClass('wla-corridor-ukafrica-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * RELATED CORRIDOR CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-ukafrica-rel-card').on('click', function() {
            var route = $(this).find('.wla-corridor-ukafrica-rc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_related_click', {
                    'corridor': route,
                    'from': 'uk_africa'
                });
            }
            console.log('Related corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * BOTH SIDES CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-ukafrica-bs-link').on('click', function() {
            var side = $(this).closest('.wla-corridor-ukafrica-bs').find('.wla-corridor-ukafrica-bs-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_side_click', {
                    'side': side,
                    'corridor': 'uk_africa'
                });
            }
            console.log('Corridor side clicked: ' + side);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-ukafrica-btn-white, .wla-corridor-ukafrica-btn-ghost-white, .wla-corridor-ukafrica-btn-white-dark').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_cta_click', {
                    'button': btnText,
                    'corridor': 'uk_africa'
                });
            }
            console.log('UK-Africa CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-corridor-ukafrica-rel-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA UK to Africa Corridor Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-corridor-ukafrica-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-corridor-ukafrica-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Corridors Landing Page Scripts
 * World Law Alliance Corridors Landing Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Corridors Landing page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-corridors-lp-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-corridors-lp-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-corridors-lp-animate').addClass('wla-corridors-lp-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * CORRIDOR ROW CLICK TRACKING
         * Logs corridor row clicks for analytics
         * ============================================================ */
        $('.wla-corridors-lp-row').on('click', function() {
            var title = $(this).find('.wla-corridors-lp-row-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridors_lp_row_click', {
                    'corridor': title,
                    'page': 'corridors_landing'
                });
            }
            console.log('Corridor clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-corridors-lp-btn-white, .wla-corridors-lp-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridors_lp_cta_click', {
                    'button': btnText,
                    'page': 'corridors_landing'
                });
            }
            console.log('Corridors CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-corridors-lp-row').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * LEADERSHIP STAT CARD INTERACTION
         * Subtle hover effect enhancement for stats
         * ============================================================ */
        $('.wla-corridors-lp-ls-item').on('mouseenter', function() {
            $(this).css('background', 'rgba(255, 255, 255, 0.08)');
        }).on('mouseleave', function() {
            $(this).css('background', 'rgba(255, 255, 255, 0.04)');
        });

        console.log('WLA Corridors Landing Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-corridors-lp-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-corridors-lp-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA GCC to SE Asia Corridor Page Scripts
 * World Law Alliance GCC to SE Asia Corridor Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Corridor page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-gcc-seasia-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-gcc-seasia-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-gcc-seasia-animate').addClass('wla-gcc-seasia-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * BOTH SIDES CARD CLICK TRACKING
         * Logs both sides card clicks for analytics
         * ============================================================ */
        $('.wla-gcc-seasia-bs').on('click', function(e) {
            // Ignore clicks on links inside the card
            if ($(e.target).closest('a').length) return;
            
            var country = $(this).find('.wla-gcc-seasia-bs-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_both_sides_click', {
                    'side': country,
                    'corridor': 'gcc_seasia'
                });
            }
            console.log('Both sides card clicked: ' + country);
        });

        /**
         * ============================================================
         * THEME CARD CLICK TRACKING
         * Logs theme card clicks for analytics
         * ============================================================ */
        $('.wla-gcc-seasia-tg').on('click', function() {
            var title = $(this).find('.wla-gcc-seasia-tg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_theme_click', {
                    'theme': title,
                    'corridor': 'gcc_seasia'
                });
            }
            console.log('Theme clicked: ' + title);
        });

        /**
         * ============================================================
         * INTELLIGENCE ROW CLICK TRACKING
         * Logs intelligence row clicks for analytics
         * ============================================================ */
        $('.wla-gcc-seasia-ir:not(.wla-gcc-seasia-ir--header)').on('click', function() {
            var jur = $(this).find('.wla-gcc-seasia-ir-jur').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_intel_click', {
                    'jurisdiction': jur,
                    'corridor': 'gcc_seasia'
                });
            }
            console.log('Intel row clicked: ' + jur);
        });

        /**
         * ============================================================
         * RELATED CORRIDOR CARD CLICK TRACKING
         * Logs related corridor clicks for analytics
         * ============================================================ */
        $('.wla-gcc-seasia-rel-card').on('click', function() {
            var route = $(this).find('.wla-gcc-seasia-rc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_related_click', {
                    'corridor': route,
                    'page': 'gcc_seasia'
                });
            }
            console.log('Related corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-gcc-seasia-btn-white, .wla-gcc-seasia-btn-ghost-white, .wla-gcc-seasia-btn-white-intel').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_cta_click', {
                    'button': btnText,
                    'corridor': 'gcc_seasia'
                });
            }
            console.log('Corridor CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-gcc-seasia-bs, .wla-gcc-seasia-tg, .wla-gcc-seasia-ir:not(.wla-gcc-seasia-ir--header), .wla-gcc-seasia-rel-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * HERO SPLIT BACKGROUND - PARALLAX EFFECT
         * Subtle parallax on scroll for hero background
         * ============================================================ */
        var heroBg = document.querySelector('.wla-gcc-seasia-hero-bg');
        if (heroBg) {
            $(window).on('scroll', function() {
                var scrollPos = $(window).scrollTop();
                var heroHeight = $('.wla-gcc-seasia-hero').height();
                if (scrollPos < heroHeight) {
                    var offset = scrollPos * 0.1;
                    heroBg.style.transform = 'translateY(' + offset + 'px)';
                }
            });
        }

        console.log('WLA GCC to SE Asia Corridor Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-gcc-seasia-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-gcc-seasia-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Gulf to CEE Corridor Scripts
 * World Law Alliance Gulf to CEE Corridor Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-corridor-gulfcee-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-corridor-gulfcee-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-corridor-gulfcee-animate').addClass('wla-corridor-gulfcee-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * RELATED CORRIDOR CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-gulfcee-rel-card').on('click', function() {
            var route = $(this).find('.wla-corridor-gulfcee-rc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_related_click', {
                    'corridor': route,
                    'from': 'gulf_cee'
                });
            }
            console.log('Related corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * BOTH SIDES CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-gulfcee-bs-link').on('click', function() {
            var side = $(this).closest('.wla-corridor-gulfcee-bs').find('.wla-corridor-gulfcee-bs-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_side_click', {
                    'side': side,
                    'corridor': 'gulf_cee'
                });
            }
            console.log('Corridor side clicked: ' + side);
        });

        /**
         * ============================================================
         * SECTOR ROW CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-gulfcee-sr').on('click', function() {
            var sector = $(this).find('.wla-corridor-gulfcee-sr-sector').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_sector_click', {
                    'sector': sector,
                    'corridor': 'gulf_cee'
                });
            }
            console.log('Sector clicked: ' + sector);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-gulfcee-btn-white, .wla-corridor-gulfcee-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_cta_click', {
                    'button': btnText,
                    'corridor': 'gulf_cee'
                });
            }
            console.log('Gulf-CEE CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * ============================================================ */
        $('.wla-corridor-gulfcee-rel-card, .wla-corridor-gulfcee-bs-link, .wla-corridor-gulfcee-sr').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA Gulf to CEE Corridor Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * ============================================================ */
    $(window).on('load', function() {
        $('.wla-corridor-gulfcee-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-corridor-gulfcee-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA EU to India Corridor Page Scripts
 * World Law Alliance EU to India Corridor Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Corridor page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-eu-india-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-eu-india-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-eu-india-animate').addClass('wla-eu-india-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * BOTH SIDES CARD CLICK TRACKING
         * Logs both sides card clicks for analytics
         * ============================================================ */
        $('.wla-eu-india-bs').on('click', function(e) {
            // Ignore clicks on links inside the card
            if ($(e.target).closest('a').length) return;
            
            var country = $(this).find('.wla-eu-india-bs-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_both_sides_click', {
                    'side': country,
                    'corridor': 'eu_india'
                });
            }
            console.log('Both sides card clicked: ' + country);
        });

        /**
         * ============================================================
         * THEME CARD CLICK TRACKING
         * Logs theme card clicks for analytics
         * ============================================================ */
        $('.wla-eu-india-tg').on('click', function() {
            var title = $(this).find('.wla-eu-india-tg-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_theme_click', {
                    'theme': title,
                    'corridor': 'eu_india'
                });
            }
            console.log('Theme clicked: ' + title);
        });

        /**
         * ============================================================
         * INTELLIGENCE ROW CLICK TRACKING
         * Logs intelligence row clicks for analytics
         * ============================================================ */
        $('.wla-eu-india-ir:not(.wla-eu-india-ir--header)').on('click', function() {
            var jur = $(this).find('.wla-eu-india-ir-jur').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_intel_click', {
                    'jurisdiction': jur,
                    'corridor': 'eu_india'
                });
            }
            console.log('Intel row clicked: ' + jur);
        });

        /**
         * ============================================================
         * RELATED CORRIDOR CARD CLICK TRACKING
         * Logs related corridor clicks for analytics
         * ============================================================ */
        $('.wla-eu-india-rel-card').on('click', function() {
            var route = $(this).find('.wla-eu-india-rc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_related_click', {
                    'corridor': route,
                    'page': 'eu_india'
                });
            }
            console.log('Related corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-eu-india-btn-white, .wla-eu-india-btn-ghost-white, .wla-eu-india-btn-white-intel').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_cta_click', {
                    'button': btnText,
                    'corridor': 'eu_india'
                });
            }
            console.log('Corridor CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-eu-india-bs, .wla-eu-india-tg, .wla-eu-india-ir:not(.wla-eu-india-ir--header), .wla-eu-india-rel-card').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * HERO SPLIT BACKGROUND - PARALLAX EFFECT
         * Subtle parallax on scroll for hero background
         * ============================================================ */
        var heroBg = document.querySelector('.wla-eu-india-hero-bg');
        if (heroBg) {
            $(window).on('scroll', function() {
                var scrollPos = $(window).scrollTop();
                var heroHeight = $('.wla-eu-india-hero').height();
                if (scrollPos < heroHeight) {
                    var offset = scrollPos * 0.1;
                    heroBg.style.transform = 'translateY(' + offset + 'px)';
                }
            });
        }

        console.log('WLA EU to India Corridor Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-eu-india-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-eu-india-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA APAC to Americas Corridor Scripts
 * World Law Alliance APAC to Americas Corridor Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all APAC to Americas corridor functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-corridor-apacamericas-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-corridor-apacamericas-visible');
                    }
                });
            }, {
                threshold: 0.07
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-corridor-apacamericas-animate').addClass('wla-corridor-apacamericas-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * RELATED CORRIDOR CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-apacamericas-rel-card').on('click', function() {
            var route = $(this).find('.wla-corridor-apacamericas-rc-route').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_related_click', {
                    'corridor': route,
                    'from': 'apac_americas'
                });
            }
            console.log('Related corridor clicked: ' + route);
        });

        /**
         * ============================================================
         * BOTH SIDES CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-apacamericas-bs-link').on('click', function() {
            var side = $(this).closest('.wla-corridor-apacamericas-bs').find('.wla-corridor-apacamericas-bs-country').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_side_click', {
                    'side': side,
                    'corridor': 'apac_americas'
                });
            }
            console.log('Corridor side clicked: ' + side);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-corridor-apacamericas-btn-white, .wla-corridor-apacamericas-btn-ghost-white, .wla-corridor-apacamericas-btn-white-dark').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'corridor_cta_click', {
                    'button': btnText,
                    'corridor': 'apac_americas'
                });
            }
            console.log('APAC-Americas CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-corridor-apacamericas-rel-card, .wla-corridor-apacamericas-bs-link, .wla-corridor-apacamericas-ir').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA APAC to Americas Corridor Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-corridor-apacamericas-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-corridor-apacamericas-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Intellectual Property Scripts
 * World Law Alliance IP Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all IP page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-ip-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-ip-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            $('.wla-ip-animate').addClass('wla-ip-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * IP CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-ip-card').on('click', function() {
            var title = $(this).find('.wla-ip-card-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'ip_practice_click', {
                    'practice': title
                });
            }
            console.log('IP practice clicked: ' + title);
        });

        /**
         * ============================================================
         * RELATED PRACTICE CARD CLICK TRACKING
         * ============================================================ */
        $('.wla-ip-rel-card').on('click', function() {
            var title = $(this).find('.wla-ip-rc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'ip_related_click', {
                    'practice': title
                });
            }
            console.log('Related practice clicked: ' + title);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * ============================================================ */
        $('.wla-ip-btn-white, .wla-ip-btn-ghost-white, .wla-ip-btn-ink, .wla-ip-btn-bdr').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'ip_cta_click', {
                    'button': btnText
                });
            }
            console.log('IP CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-ip-card, .wla-ip-rel-card, .wla-ip-jur-item').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        console.log('WLA IP Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-ip-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-ip-visible');
            }
        });
    });

})(jQuery);
/**
 * WLA Labour & Employment Page Scripts
 * World Law Alliance Labour & Employment Page
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    /**
     * DOM Ready Handler
     * Initializes all Employment page functionality
     */
    $(document).ready(function() {

        /**
         * ============================================================
         * INTERSECTION OBSERVER - FADE UP ANIMATIONS
         * Triggers animation when elements enter viewport
         * ============================================================ */
        if ('IntersectionObserver' in window) {
            var animateElements = document.querySelectorAll('.wla-employment-animate');

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('wla-employment-visible');
                    }
                });
            }, {
                threshold: 0.07,
                rootMargin: '0px 0px -36px 0px'
            });

            animateElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for older browsers
            $('.wla-employment-animate').addClass('wla-employment-visible');
        }

        /**
         * ============================================================
         * SMOOTH SCROLL FOR ANCHOR LINKS
         * Enables smooth scrolling for internal links
         * ============================================================ */
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'swing');
            }
        });

        /**
         * ============================================================
         * SCENARIO CARD CLICK TRACKING
         * Logs scenario card clicks for analytics
         * ============================================================ */
        $('.wla-employment-sc').on('click', function() {
            var title = $(this).find('.wla-employment-sc-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'employment_scenario_click', {
                    'scenario': title,
                    'page': 'employment'
                });
            }
            console.log('Employment scenario clicked: ' + title);
        });

        /**
         * ============================================================
         * M&A CARD CLICK TRACKING
         * Logs M&A card clicks for analytics
         * ============================================================ */
        $('.wla-employment-ma-card').on('click', function() {
            var title = $(this).find('.wla-employment-mac-title').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'employment_ma_click', {
                    'phase': title,
                    'page': 'employment'
                });
            }
            console.log('Employment M&A phase clicked: ' + title);
        });

        /**
         * ============================================================
         * LEGISLATION ROW CLICK TRACKING
         * Logs legislation row clicks for analytics
         * ============================================================ */
        $('.wla-employment-leg-row').on('click', function() {
            var law = $(this).find('.wla-employment-lr-law').text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'employment_legislation_click', {
                    'law': law,
                    'page': 'employment'
                });
            }
            console.log('Legislation clicked: ' + law);
        });

        /**
         * ============================================================
         * CHECKLIST ITEM CLICK TRACKING
         * Logs checklist item clicks for analytics
         * ============================================================ */
        $('.wla-employment-gcl-item').on('click', function() {
            var text = $(this).find('.wla-employment-gcl-text').text().trim().substring(0, 50) + '...';
            if (typeof gtag !== 'undefined') {
                gtag('event', 'employment_checklist_click', {
                    'item': text,
                    'page': 'employment'
                });
            }
            console.log('Checklist item clicked: ' + text);
        });

        /**
         * ============================================================
         * CTA BUTTON CLICK TRACKING
         * Logs CTA clicks for analytics
         * ============================================================ */
        $('.wla-employment-btn-ink, .wla-employment-btn-bdr, .wla-employment-btn-white, .wla-employment-btn-ghost-white').on('click', function() {
            var btnText = $(this).text().trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'employment_cta_click', {
                    'button': btnText,
                    'page': 'employment'
                });
            }
            console.log('Employment CTA clicked: ' + btnText);
        });

        /**
         * ============================================================
         * KEYBOARD ACCESSIBILITY
         * Enter/Space key support for interactive elements
         * ============================================================ */
        $('.wla-employment-sc, .wla-employment-ma-card, .wla-employment-leg-row, .wla-employment-gcl-item').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        /**
         * ============================================================
         * LEGISLATION FEED - LIVE PULSE
         * Ensures the live dot animation stays active
         * ============================================================ */
        var ldot = document.querySelector('.wla-employment-ldot');
        if (ldot) {
            setInterval(function() {
                ldot.style.opacity = ldot.style.opacity === '0.3' ? '1' : '0.3';
            }, 3000);
        }

        console.log('WLA Employment Page initialized successfully.');
    });

    /**
     * ============================================================
     * WINDOW LOAD HANDLER
     * Additional initialization after all assets loaded
     * ============================================================ */
    $(window).on('load', function() {
        // Ensure all animations are triggered
        $('.wla-employment-animate').each(function() {
            var rect = this.getBoundingClientRect();
            if (rect.top <= window.innerHeight && rect.bottom >= 0) {
                $(this).addClass('wla-employment-visible');
            }
        });
    });

})(jQuery);