/**
 *
 */
let hexToRgba = function (hex, opacity) {
    let result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    let rgb = result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;

    return 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', ' + opacity + ')';
};

let initFormValidator = function (selector) {
    $(document).on('keyup', selector + ' input', function () {
        validateInput($(this));
    });

    $(document).on('blur', selector + ' input', function () {
        validateInput($(this));
    });

    function validateInput($input) {
        var $formGroup = $input.parents('.form-group');
        var rules = $input.data('validation') || [];

        $formGroup.find('.invalid-feedback').hide();
        $input.removeClass('is-invalid');

        if (rules.indexOf('required') !== -1 && !$input.val()) {
            $formGroup.find('.invalid-required').show();
            $input.addClass('is-invalid');
        }

        if (rules.indexOf('repeat') !== -1) {
            var repeatInputName = $input.data('repeat');
            var $repeatInput = $(selector + ' [name=' + repeatInputName + ']');

            if ($repeatInput.length && $repeatInput.val() !== $input.val()) {
                $formGroup.find('.invalid-repeat').show();
                $input.addClass('is-invalid');
            }
        }

        if (rules.indexOf('repeat-as') !== -1) {
            var sameInputName = $input.data('repeat');

            $(selector + ' [name=' + sameInputName + ']').trigger('keyup');
        }
    }
};

let saveRecord = function (url, $form, successCallback, errorCallback) {
    const data = getFormValues($form);
    const type = data.id ? 'PUT' : 'POST';
    const text = data.id ? 'Record updated' : 'Record created';
    url += data.id ? '/' + data.id : '';

    $.ajax({
        type,
        url,
        data: JSON.stringify(data),
        contentType: 'application/json',
        success: function (result) {
            noty({text, type: 'success', timeout: 500});

            successCallback(result);
        },
        error: function (jqXHR) {
            if (jqXHR.responseJSON.errors !== undefined) {
                for (var [field, errors] of Object.entries(jqXHR.responseJSON.errors)) {
                    for (var [key, value] of Object.entries(errors)) {
                        noty({text: field + ': ' + value, type: 'error'});
                    }
                }
            } else {
                noty({text: 'Application error', type: 'error'});
            }

            errorCallback(jqXHR);
        }
    });
};

let getFormValues = function ($form) {
    let values = {};

    $form.find('select, input, textarea').each(function () {
        if ($(this).is(':checkbox')) {
            values[$(this).attr('name')] = $(this).is(':checked');
        } else {
            values[$(this).attr('name')] = $(this).val();
        }
    });

    return values
};

let setFormValues = function ($form, data) {
    for (let [key, value] of Object.entries(data)) {
        if (typeof value === 'boolean') {
            $form.find('[name=' + key + ']').prop('checked', value);
        } else {
            $form.find('[name=' + key + ']').val(value || '');
        }
    }
};

let initTable = function (selector, url, columns, columnDefs, order, scrollX) {
    return $(selector).DataTable({
        lengthMenu: [[15, 20, 50, 100, -1], [15, 20, 50, 100, 'All']],
        "sDom": 'Rlfrtip',
        ajax: {
            cache: true,
            deferRender: true,
            url,
            data: function (d) {
                return {};
            }
        },
        columns,
        columnDefs,
        createdRow: function (row, data, index) {
            $(row).data('row', data);
        },
        scrollX: scrollX || false,
        order: order || []
    });
};

let prepareTableDropdown = function (fields) {
    var $dropdown = $('<span class="dropdown"></span>');
    var $button = $('<button class="btn btn-sm btn-secondary dropdown-toggle"></button>')
        .attr('data-toggle', 'dropdown')
        .text('Actions');
    var $dropdownMenu = $('<div class="dropdown-menu"></div>');
    $dropdown.append($button);

    fields.forEach(function (field) {
        let isDivider = field.divider || false;
        let $item;

        if (!isDivider) {
            $item = $('<a class="dropdown-item"></a>')
                .addClass(field.class || ('dropdown-item-' + titleToClass(field.title)))
                .text(field.title)
                .attr('href', field.href || '#');
        } else {
            $item = $('<div class="dropdown-divider"></div>');
        }

        $dropdownMenu.append($item);
    });

    $dropdown.append($dropdownMenu);

    return $dropdown.get(0).outerHTML;
};

function titleToClass(title) {
    return title.toLowerCase().replace(' ', '-');
}

/**
 *
 */
$(document).ready(function () {
    /** Constant div card */
    const DIV_CARD = 'div.card';

    /** Initialize tooltips */
    $('[data-toggle="tooltip"]').tooltip();

    /** Initialize popovers */
    $('[data-toggle="popover"]').popover({
        html: true
    });

    /** Function for remove card */
    $('[data-toggle="card-remove"]').on('click', function (e) {
        let $card = $(this).closest(DIV_CARD);

        $card.remove();

        e.preventDefault();
        return false;
    });

    /** Function for collapse card */
    $('[data-toggle="card-collapse"]').on('click', function (e) {
        let $card = $(this).closest(DIV_CARD);

        $card.toggleClass('card-collapsed');

        e.preventDefault();
        return false;
    });

    /** Function for fullscreen card */
    $('[data-toggle="card-fullscreen"]').on('click', function (e) {
        let $card = $(this).closest(DIV_CARD);

        $card.toggleClass('card-fullscreen').removeClass('card-collapsed');

        e.preventDefault();
        return false;
    });

    /**  */
    if ($('[data-sparkline]').length) {
        let generateSparkline = function ($elem, data, params) {
            $elem.sparkline(data, {
                type: $elem.attr('data-sparkline-type'),
                height: '100%',
                barColor: params.color,
                lineColor: params.color,
                fillColor: 'transparent',
                spotColor: params.color,
                spotRadius: 0,
                lineWidth: 2,
                highlightColor: hexToRgba(params.color, .6),
                highlightLineColor: '#666666',
                defaultPixelsPerValue: 5
            });
        };

        require(['sparkline'], function () {
            $('[data-sparkline]').each(function () {
                let $chart = $(this);

                generateSparkline($chart, JSON.parse($chart.attr('data-sparkline')), {
                    color: $chart.attr('data-sparkline-color')
                });
            });
        });
    }

    /**  */
    if ($('.chart-circle').length) {
        require(['circle-progress'], function () {
            $('.chart-circle').each(function () {
                let $this = $(this);

                $this.circleProgress({
                    fill: {
                        color: tabler.colors[$this.attr('data-color')] || tabler.colors.blue
                    },
                    size: $this.height(),
                    startAngle: -Math.PI / 4 * 2,
                    emptyFill: '#F4F4F4',
                    lineCap: 'round'
                });
            });
        });
    }
});
