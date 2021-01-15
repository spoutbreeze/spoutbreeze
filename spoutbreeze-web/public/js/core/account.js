/**
 * Created by RIADVICE SUARL
 * Copyright 2020 | RIADVICE SUARL ( c )
 * All rights reserved. You may not use, distribute or modify
 * this code under its source or binary form without the express
 * authorization of RIADVICE SUARL. Contact : devops@riadvice.tn
 */

var Account = function () {
    var addFormValidator = function() {
        $(document).on('keyup', 'form input', function() {
            validateInput($(this));
        });

        $(document).on('blur', 'form input', function() {
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
                var $repeatInput = $('form [name=' + repeatInputName + ']');

                if ($repeatInput.length && $repeatInput.val() !== $input.val()) {
                    $formGroup.find('.invalid-repeat').show();
                    $input.addClass('is-invalid');
                }
            }

            if (rules.indexOf('repeat-as') !== -1) {
                var sameInputName = $input.data('repeat');

                $('form [name=' + sameInputName + ']').trigger('keyup');
            }
        }
    };

    var addSaveHandler = function() {
        $(document).on('click', 'form .btn-primary', function(e) {
            e.preventDefault();

            var $form = $(this).parents('form');
            var $button = $(this);
            var email = $form.find('[name=email]').val();
            var username = $form.find('[name=username]').val();
            var password = $form.find('[name=password]').val();

            if ($form.find('.is-invalid').length) {
                return;
            }

            $button.attr('disabled', true);

            $.ajax({
                type: 'POST',
                url: '/account/profile',
                data: JSON.stringify({ username, email, password }),
                contentType: 'application/json',
                success: function () {
                    noty({text: 'Record updated', type: 'success', timeout: 500});
                    $button.attr('disabled', false);
                    $('.header .header-username').text(username);
                    $('.header .header-username-abbr').text(username[0]);
                },
                error: function(jqXHR) {

                    if (jqXHR.responseJSON.errors !== undefined) {
                        for (var [field, errors] of Object.entries(jqXHR.responseJSON.errors)) {
                            for (var [key, value] of Object.entries(errors)) {
                                noty({text: value, type: 'error'});
                            }
                        }
                    } else {
                        noty({text: 'Application error', type: 'error'});
                    }

                    $button.attr('disabled', false);
                }
            });
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            addFormValidator();
            addSaveHandler();
        }
    }
}();
