/**
 * Created by RIADVICE SUARL
 * Copyright 2020 | RIADVICE SUARL ( c )
 * All rights reserved. You may not use, distribute or modify
 * this code under its source or binary form without the express
 * authorization of RIADVICE SUARL. Contact : devops@riadvice.tn
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
