/**
 * SpoutBreeze open source platform - https://www.spoutbreeze.io/
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

let Common = function () {

    let deleteLink;
    let deleteObject;
    let cdn;
    let joinAsName;
    let userRole;

    let addDeleteHandler = function () {
        $('.btn-delete').click(function () {
            deleteLink = $(this).data('link');
            deleteObject = $(this).data('object');
        });

        $('#confirm-delete').click(function () {
            deleteAction();
        });
    };

    let deleteAction = function () {
        $.ajax({
            url: deleteLink,
            type: 'DELETE',
            async: true,
            success: function (result) {
                if (result.code = 200 && result.deleted == true) {
                    location.reload();
                } else {
                    noty({ text: Locale.err(deleteObject, 'delete_error'), type: 'error' });
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // @TODO: handle general error here
            }
        });
    };

    let extendJquery = function () {
        // Add jquery pseudo selecto for attributes
        jQuery.expr.pseudos.attr = $.expr.createPseudo(function (arg) {
            let regexp = new RegExp(arg);
            return function (elem) {
                for (let i = 0; i < elem.attributes.length; i++) {
                    let attr = elem.attributes[i];
                    if (regexp.test(attr.name)) {
                        return true;
                    }
                }
                return false;
            };
        }
        );
    }

    let initSelect2 = function () {
        /* select2 */
        if ($(".select2").length > 0) {
            $(".select2").select2();
        }
    };

    let initDatePicker = function () {
        if ($(".datepicker").length > 0) {
            $(".datepicker").attr('autocomplete', 'off');
        }
    };
    let initToolTip = function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="tooltip"]').css('cursor', 'pointer');
    };

    let listenForFormSubmit = function () {
        $('form').submit(function () {
            $(this).find('button[type=submit]').prop('disabled', true);
            $(this).find('button[type=submit]').html(Locale.lbl('core', 'sending'));
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            extendJquery();
            initSelect2();
            initDatePicker();
            addDeleteHandler();
            initToolTip();
            listenForFormSubmit();
        },

        setCDN: function (cdn) {
            Common.cdn = cdn;
        },

        setJoinAsName: function (joinAsName) {
            Common.joinAsName = joinAsName;
        },

        setUserRole: function (userRole) {
            Common.userRole = userRole;
        },

    }
}();
