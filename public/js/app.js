jQuery(document).ready(function ($) {
    'use strict';

    const navbar = $('#main-navbar');
    const mobileToggle = $('#mobile-menu-toggle');
    const mobileMenu = $('#mobile-menu');

    function updateNavbar() {
        if ($(window).scrollTop() > 10) {
            navbar.addClass('nav-scrolled');
        } else {
            navbar.removeClass('nav-scrolled');
        }
    }

    $(window).on('scroll', updateNavbar);
    updateNavbar();

    mobileToggle.on('click', function () {
        mobileMenu.toggleClass('open');
        const expanded = mobileMenu.hasClass('open');
        $(this).attr('aria-expanded', expanded);
    });

    $('a[href^="#"]').on('click', function (event) {
        const target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 70
            }, 600);
            mobileMenu.removeClass('open');
            mobileToggle.attr('aria-expanded', false);
        }
    });

    $('.feature-card').each(function (index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
    });

    // Copy-to-clipboard for code blocks
    $('.copy-btn').on('click', function () {
        var btn = $(this);
        var targetId = btn.data('copy-target');
        var codeEl = document.getElementById(targetId);
        if (!codeEl) {
            return;
        }
        var text = codeEl.innerText || codeEl.textContent;
        var done = function () {
            btn.find('.copy-icon').addClass('hidden');
            btn.find('.check-icon').removeClass('hidden');
            btn.find('.copy-label').text('copied');
            setTimeout(function () {
                btn.find('.copy-icon').removeClass('hidden');
                btn.find('.check-icon').addClass('hidden');
                btn.find('.copy-label').text('copy');
            }, 2000);
        };
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(done).catch(function () {
                fallbackCopy(text);
                done();
            });
        } else {
            fallbackCopy(text);
            done();
        }
    });

    function fallbackCopy(text) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        try { document.execCommand('copy'); } catch (e) {}
        document.body.removeChild(ta);
    }

    const sections = $('section[id]');
    $(window).on('scroll', function () {
        const scrollPos = $(this).scrollTop() + 100;
        sections.each(function () {
            const section = $(this);
            const offset = section.offset().top;
            const height = section.outerHeight();
            if (scrollPos >= offset && scrollPos < offset + height) {
                $('.nav-link[href="#' + section.attr('id') + '"]').addClass('text-sukarix-magenta').parent().siblings().find('.nav-link').removeClass('text-sukarix-magenta');
            }
        });
    });
});
