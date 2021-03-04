/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.org/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

var Settings = function () {

    var addSaveHandler = function () {
        $(document).on('click', '.card .btn-primary', function (e) {
            e.preventDefault();

            var $button = $(this);
            var $form = $button.parents('form');

            $form.find('input').trigger('blur');

            if ($form.find('.is-invalid').length) {
                return;
            }

            $button.attr('disabled', true);

            /*saveRecord(
                '/settings',
                $form,
                function () {
                    //location.reload();
                },
                function () {
                    $button.attr('disabled', false);
                }
            );*/
            $.ajax({
                type: 'PUT',
                url: '/settings',
                data: JSON.stringify(getFormValues($form)),
                contentType: 'application/json',
                success: function () {
                    noty({text: 'Settings has been updated', type: 'success'});
                    $button.attr('disabled', false);
                },
                error: function (jqXHR) {
                    noty({text: 'Application error', type: 'error'});
                }
            });
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            addSaveHandler();
        }
    }
}();

var updateStrategySelection = function () {
    selectedValue = $("select[name*='load_balancing_strategy']").attr('value');
    $("select[name*='load_balancing_strategy']").find('option[value="' + selectedValue + '"]').attr("selected", true);
    $("input[name*='strict_pooling']").prop("checked", $("input[name*='strict_pooling']").attr("value") == 1);
}

updateStrategySelection();
