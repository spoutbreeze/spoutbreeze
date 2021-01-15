$(document).ready(function () {

    /* ajax modal call */
    $(".modal-ajax").click(function () {
        $('#modal_ajax').find('.modal-title').html($(this).attr('data-title'));
        $('#modal_ajax').find('.modal-body').load($(this).attr('href'));

        $('#modal_ajax').modal('show');
        lists();
        return false;
    });
    /* ajax modal call */

    /* wide modal */
    $(".modal-wide").click(function () {
        var modal = $(this).attr('href');

        $(modal).on('show.bs.modal', function () {
            $(this).find('.modal-dialog').css({
                width: $(window).width() - 30,
                height: $(window).height(),
                'padding-top': 15,
                'padding-bottom': 15
            });
        });
        $(modal).on('shown.bs.modal', function () {
            $(this).find('.scroll').height($(window).height() - 105).mCustomScrollbar("update");
        });

        $(modal).modal('show');

    });
    /* eof wide modal */

    /* tasks */
    $(".tasks_view_block").click(function () {
        $(".tasks").removeClass('tasks_list');
    });
    $(".tasks_view_list").click(function () {
        $(".tasks").addClass('tasks_list');
    });
    /* eof tasks */

    /* navigation */
    $(".page-sidebar").hover(function () {
        if ($('.page-container').hasClass('page-sidebar-narrow')) {
            $(this).css('width', 230);
            $(".page-content").css('margin-left', 230);
            $(".page-navigation-hide").css('display', 'block');
        }
    }, function () {
        if ($('.page-container').hasClass('page-sidebar-narrow')) {
            $(this).removeAttr('style');
            $(".page-content").removeAttr('style');
            $(".page-navigation-hide").removeAttr('style');
            $(".page-navigation li ul").removeAttr('style');
        }
    });

    $(".psn-control").click(function () {
        if ($('.page-container').hasClass('page-sidebar-narrow')) {
            $('.page-container').removeClass('page-sidebar-narrow');
            $(this).parent('.control').removeClass('active');
        } else {
            $('.page-container').addClass('page-sidebar-narrow');
            $(this).parent('.control').addClass('active');
        }

        return false;
    });

    $(".page-navigation li a").click(function () {
        var ul = $(this).parent('li').children('ul');

        if (ul.length == 1) {
            if (ul.is(':visible'))
                ul.slideUp('fast');
            else
                ul.slideDown('fast');
            return false;
        }
    });
    /* eof navigation */

    /* block */
    $(".block-remove").click(function () {
        $(this).parents(".block").fadeOut('slow', function () {
            $(this).remove();
        });
        return false;
    });
    $(".block-toggle").click(function () {
        var content = $(this).parents(".block").children('div').not('.header');
        if (content.is(':visible')) {
            content.slideUp();
            $(this).find('span').removeClass('icon-chevron-down').addClass('icon-chevron-up');
        } else {
            content.slideDown();
            $(this).find('span').removeClass('icon-chevron-up').addClass('icon-chevron-down');
        }
        return false;
    });
    /* eof block */

    /* input file */
    $(".file .btn,.file input:text").click(function () {
        var block = $(this).parents('.file');
        block.find('input:file').click();
        block.find('input:file').change(function () {
            block.find('input:text').val(block.find('input:file').val());
        });
    });
    /* eof input file */

    /* user change */
    $(".user-change-button").click(function () {
        $(this).parents(".block").find('.user-change').animate({opacity: 0}, 400, function () {
            $(this).find('img').attr('src', 'img/user.jpg');
            $(this).animate({opacity: 1}, 400);
        });
        $(this).parents(".block").find(".user-change-row").fadeIn(800);
        $(this).remove();
    });

    /* table checkall */
    $("table .checkall").click(function () {
        var iC = $(this).parents('th').index();
        var tB = $(this).parents('table').find('tbody');

        if ($(this).is(':checked'))
            tB.find('tr').each(function () {
                var cb = $(this).find('td:eq(' + iC + ') input:checkbox');
                cb.parent('span').addClass('checked');
                cb.prop('checked', false);
            });
        else
            tB.find('tr').each(function () {
                var cb = $(this).find('td:eq(' + iC + ') input:checkbox');
                cb.parent('span').removeClass('checked')
                cb.prop('checked', false);
            });
    });
    /* eof table checkall */

    /* statusbar */
    $(".stbar, .statusbar-close").click(function () {
        statusbar($(this).attr('href'));
        return false;
    });
    /* eof statusbar */

    /* remove content from ui spinner buttons */
    $(".ui-spinner").find('span').html('');
    /* icons */
    $(".icons-list .col-md-3").click(function () {
        var text = $(this).html();
        var r = /<(\w+)[^>]*>.*<\/\1>/gi;
        var icon = $.trim(text.replace(r, ""));

        $("#modal_icon .modal-body .list").html('<div class="list-item"><div class="list-text"><p>&lt;i class="' + icon + '">&lt;/i></p></div></div>'
            + '<div class="list-item"><div class="list-text"><p>&lt;span class="' + icon + '">&lt;/span></p></div></div>'
            + '<div class="list-item"><div class="list-text"><p>.' + icon + '</p></div></div>');

        $("#modal_icon .modal-body .icons-list-icon").html("").append('<span class="' + icon + '"></span>');
        $("#modal_icon").modal('show');
    });
    /* eof icons */

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        lists();
    });

});
$(window).bind("load", function () {
    gallery();
    thumbs();
    lists();
    page();
});
$(window).resize(function () {

    /* vertical tabs */
    $(".nav-tabs-vertical").each(function () {
        var h = $(this).find('.nav-tabs').height();
        $(this).find('.tabs').css('min-height', h);
    });
    /* eof vertical tabs */

    gallery();
    thumbs();
    lists();
    page();
});

function page() {
    if ($("body").width() < 768) {
        $(".page-container").addClass("page-sidebar-narrow");
        $(".page-navigation li ul").removeAttr('style');
    }
}

function lists() {
    $(".list").each(function () {
        var items = $(this).find(".list-controls");
        if (items.length > 0)
            items.each(function () {
                $(this).height($(this).parent('.list-item').height() - 10).css('line-height', $(this).parent('.list-item').height() - 10 + 'px');
            });
    });
}

function gallery() {
    var w_block = $(".gallery").width() - 20;
    var w_item = $(".gallery a").width();

    var c_items = Math.floor(w_block / w_item);
    var m_items = Math.round((w_block - w_item * c_items) / (c_items * 2));

    if (w_block < (m_items * 2 + w_item) * c_items) m_items = m_items - 1;

    $(".gallery a").css('margin', m_items + 2);
}

function thumbs() {

    $(".gallery-list").each(function () {

        var maxImgHeight = 0;
        var maxTextHeight = 0;

        $(this).find(".gallery-item").each(function () {
            var imgHeight = $(this).find('a > img').height();
            var textHeight = $(this).find('.text').height();

            maxImgHeight = maxImgHeight < imgHeight ? imgHeight : maxImgHeight;
            maxTextHeight = maxTextHeight < textHeight ? textHeight : maxTextHeight;
        });

        $(this).find('.gallery-list .gallery-image').height(maxImgHeight);
        $(this).find('.gallery-list .gallery-content .text').height(maxTextHeight);

    });

    var w_block = $(".gallery-list").width();
    var w_item = $(".gallery-list .gallery-item").width() + 10;

    var c_items = Math.floor(w_block / w_item);

    var m_items = Math.floor(((w_block - (w_item * c_items)) / c_items) / 2);

    $(".gallery-list .gallery-item").css('margin', m_items);

}

function statusbar(id) {
    $(".statusbar").hide();
    if ($(id).is(":hidden")) $(id).fadeIn();
}

function tsp(value, state, pos) {
    $("#tsp").remove();

    var period = null;

    if ($.isArray(value)) {
        period = value;
        value = value[0];
    }

    var tsp = '<div id="tsp"' + (pos != null ? ' class="tsp-' + pos + '"' : '') + '><div class="tsp-progress' + (state != null ? ' tsp-' + state : '') + '" style="width:' + value + '%;"></div></div>';
    $('body').append(tsp);

    if (period !== null) {
        i = period[0];

        timer = setInterval(function () {
            $("#tsp .tsp-progress").css('width', i + '%');
            i++;
            if (i > period[1])  clearInterval(timer);
        }, 20);
    }

}
