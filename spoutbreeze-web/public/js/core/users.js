/**
 * Created by RIADVICE SUARL
 * Copyright 2020 | RIADVICE SUARL ( c )
 * All rights reserved. You may not use, distribute or modify
 * this code under its source or binary form without the express
 * authorization of RIADVICE SUARL. Contact : devops@riadvice.tn
 */

var Users = function () {
    var table;

    var addFormValidator = function () {
        initFormValidator('#editModal form');
    };

    var listLoading = function() {
        $(document).ready(function () {
            var columns = [
                { data: 'id' },
                { data: 'email' },
                { data: 'username' },
                { data: 'last_login' },
                { data: 'role' },
                { data: 'status' },
                { data: null }
            ];
            var columnDefs = [
                {
                    targets: -1,
                    data: null,
                    defaultContent: prepareTableDropdown(
                        [
                            { title: 'Edit' },
                            { title: 'Delete' }
                        ]
                    )
                },
                {
                    targets: 4,
                    render: function (data) {
                        return data.replace(/^\w/, c => c.toUpperCase());
                    }
                },
                {
                    targets: 5,
                    render: function (data) {
                        return data.replace(/^\w/, c => c.toUpperCase());
                    }
                }
            ];
            table = initTable('.table', '/users', columns, columnDefs);
        });
    };

    var addEditHandler = function () {
        $('.table-listing').on('click', '.dropdown-item-edit', function (e) {
            e.preventDefault();

            var data = $(this).parents('tr').data('row');
            var $modal = $('#editModal');
            var $button = $modal.find('.btn-primary');

            setFormValues($modal.find('form'), data);
            $modal.find('[name=password]').val('');
            $modal.find('.modal-title').text('Edit User');
            $button.attr('disabled', false);
            $modal.find('input').trigger('blur');

            $modal.modal('show');
        });
    };

    var addSaveHandler = function () {
        $(document).on('click', '#editModal .btn-primary', function (e) {
            e.preventDefault();

            var $button = $(this);
            var $modal = $button.parents('.modal');
            var $form = $modal.find('form');

            $modal.find('input').trigger('blur');

            if ($form.find('.is-invalid').length) {
                return;
            }

            $button.attr('disabled', true);

            saveRecord(
                '/users',
                $form,
                function () {
                    $modal.modal('hide');
                    table.ajax.reload();
                },
                function () {
                    $button.attr('disabled', false);
                }
            );
        });
    };

    var addCreateHandler = function () {
        $(document).on('click', '.btn-new', function (e) {
            e.preventDefault();

            var $modal = $('#editModal');
            var $button = $modal.find('.btn-primary');

            setFormValues(
                $modal.find('form'),
                {
                    id: '',
                    email: '',
                    username: '',
                    password: '',
                    role: 'admin',
                    status: 'active'
                }
            );
            $modal.find('.modal-title').text('Add User');
            $button.attr('disabled', false);
            $modal.find('select, input, textarea').removeClass('is-invalid');
            $modal.find('.invalid-feedback').hide();

            $modal.modal('show');
        });
    };

    var addDeleteHandler = function () {
        $('.table-listing').on('click', '.dropdown-item-delete', function(e) {
            e.preventDefault();

            var data = $(this).parents('tr').data('row');

            $.ajax({
                url: '/users/' + data.id,
                type: 'DELETE',
                async: false,
                success: function (result) {
                    noty({ text: 'Record deleted', type: 'success' });
                    table.ajax.reload();
                },
                error: function () {
                    noty({ text: 'Application error', type: 'error' });
                }
            });
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            addFormValidator();
            addCreateHandler();
            addEditHandler();
            addSaveHandler();
            addDeleteHandler();
            listLoading();
        }
    }
}();
