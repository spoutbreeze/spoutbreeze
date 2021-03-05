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

var   Agents = function () {
    var table;

    var addFormValidator = function () {
        initFormValidator('#editModal form');
    };

    var listLoading = function() {
        $(document).ready(function () {
            var columns = [
                { data: 'id' },
                { data: 'name' },
                { data: 'status' },
                { data: 'ip_address' },
                { data: 'port' },

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
                }
            ];
            table = initTable('.table', '/agents', columns, columnDefs);
        });
    };

    var addEditHandler = function () {
        $('.table-listing').on('click', '.dropdown-item-edit', function (e) {
            e.preventDefault();

            var data = $(this).parents('tr').data('row');
            var $modal = $('#editModal');
            var $button = $modal.find('.btn-primary');

            setFormValues($modal.find('form'), data);
            $modal.find('.modal-title').text('Edit Agent');
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
                '/agents',
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
                    name: '',
                    status: '',
                    ip_address:'',
                    port:'',
                }
            );
            $modal.find('.modal-title').text('Add Agent');
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
                url: '/agents/' + data.id,
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
