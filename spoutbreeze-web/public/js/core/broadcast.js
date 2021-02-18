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

var Broadcasts = function () {
    var table;



    var listLoading = function() {
        $(document).ready(function () {
            var columns = [
                { data: 'selenoid_id' },
                { data: 'server_id' },
                { data: 'endpoint_id' },
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
            table = initTable('.table', '/broadcasts', columns, columnDefs);
        });
    };






    return {
        //main function to initiate the module
        init: function () {
            listLoading();
        }
    }
}();
