<div class="row">
    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-12">
        <div class="row mb-0">
            <div class="col-sm-6">
                <div class="hidden-print with-border">
                    <a href="https://demo.backpackforlaravel.com/admin/user/create" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> Add User</span></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="datatable_search_stack" class="mt-sm-0 mt-2">
                    <div id="crudTable_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search..." aria-controls="crudTable"></label></div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-filters mb-0 pb-0 pt-0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="nav-item d-none d-lg-block"><span class="la la-filter"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bp-filters-navbar" aria-controls="bp-filters-navbar" aria-expanded="false" aria-label="Toggle filters">
                <span class="la la-filter"></span> Filters
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bp-filters-navbar">
                <ul class="nav navbar-nav">
                    <!-- THE ACTUAL FILTERS -->
                    <li filter-name="role" filter-type="dropdown" class="nav-item dropdown ">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Role <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" parameter="role" dropdownkey="" href="">-</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item " parameter="role" href="" dropdownkey="1">superadmin</a>
                            <a class="dropdown-item " parameter="role" href="" dropdownkey="2">admin</a>
                            <a class="dropdown-item " parameter="role" href="" dropdownkey="3">member</a>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" id="remove_filters_button" class="nav-link invisible"><i class="la la-eraser"></i> Remove filters</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>


        <div id="crudTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row hidden">
                <div class="col-sm-6 hidden-xs"></div>
                <div class="col-sm-6 hidden-print"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="crudTable" class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2 dataTable dtr-inline collapsed has-hidden-columns" cellspacing="0" aria-describedby="crudTable_info" role="grid">
                        <thead>
                            <tr role="row">
                                <th data-orderable="true" data-priority="1" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" aria-label="
                    Name
                  : activate to sort column ascending">
                                    Name
                                </th>
                                <th data-orderable="true" data-priority="2" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" aria-label="
                    Email
                  : activate to sort column ascending">
                                    Email
                                </th>
                                <th data-orderable="false" data-priority="3" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                    Roles
                  ">
                                    Roles
                                </th>
                                <th data-orderable="false" data-priority="4" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                    Extra Permissions
                  " style="display: none;">
                                    Extra Permissions
                                </th>
                                <th data-orderable="false" data-priority="1" data-visible-in-export="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr role="row" class="odd">
                                <td class="dtr-control"><span>
                                        Prof.  Wolf
                                    </span>
                                </td>
                                <td><span>
                                        <a href="mailto:aurore.douglas@example.net"> aurore.douglas@example.net
                                        </a></span>
                                </td>
                                <td><span>
                                        -
                                    </span></td>
                                <td style="display: none;"><span>
                                        -
                                    </span></td>
                                <td>
                                    <!-- Single edit button -->
                                    <a href="https://demo.backpackforlaravel.com/admin/user/132/edit" class="btn btn-sm btn-link"><i class="la la-edit"></i> Edit</a>


                                    <a href="javascript:void(0)" onclick="deleteEntry(this)" data-route="https://demo.backpackforlaravel.com/admin/user/132" class="btn btn-sm btn-link" data-button-type="delete"><i class="la la-trash"></i> Delete</a>




                                    <!-- <script>
                                        if (typeof deleteEntry != 'function') {
                                            $("[data-button-type=delete]").unbind('click');

                                            function deleteEntry(button) {
                                                // ask for confirmation before deleting an item
                                                // e.preventDefault();
                                                var button = $(button);
                                                var route = button.attr('data-route');
                                                var row = $("#crudTable a[data-route='" + route + "']").closest('tr');

                                                swal({
                                                    title: "Warning",
                                                    text: "Are you sure you want to delete this item?",
                                                    icon: "warning",
                                                    buttons: {
                                                        cancel: {
                                                            text: "Cancel",
                                                            value: null,
                                                            visible: true,
                                                            className: "bg-secondary",
                                                            closeModal: true,
                                                        },
                                                        delete: {
                                                            text: "Delete",
                                                            value: true,
                                                            visible: true,
                                                            className: "bg-danger",
                                                        }
                                                    },
                                                }).then((value) => {
                                                    if (value) {
                                                        $.ajax({
                                                            url: route,
                                                            type: 'DELETE',
                                                            success: function(result) {
                                                                if (result == 1) {
                                                                    // Show a success notification bubble
                                                                    new Noty({
                                                                        type: "success",
                                                                        text: "<strong>Item Deleted</strong><br>The item has been deleted successfully."
                                                                    }).show();

                                                                    // Hide the modal, if any
                                                                    $('.modal').modal('hide');

                                                                    // Remove the details row, if it is open
                                                                    if (row.hasClass("shown")) {
                                                                        row.next().remove();
                                                                    }

                                                                    // Remove the row from the datatable
                                                                    row.remove();
                                                                } else {
                                                                    // if the result is an array, it means 
                                                                    // we have notification bubbles to show
                                                                    if (result instanceof Object) {
                                                                        // trigger one or more bubble notifications 
                                                                        Object.entries(result).forEach(function(entry, index) {
                                                                            var type = entry[0];
                                                                            entry[1].forEach(function(message, i) {
                                                                                new Noty({
                                                                                    type: type,
                                                                                    text: message
                                                                                }).show();
                                                                            });
                                                                        });
                                                                    } else { // Show an error alert
                                                                        swal({
                                                                            title: "Not Deleted",
                                                                            text: "Deleting entries is disabled in the online demo. Dooh.",
                                                                            icon: "error",
                                                                            timer: 4000,
                                                                            buttons: false,
                                                                        });
                                                                    }
                                                                }
                                                            },
                                                            error: function(result) {
                                                                // Show an alert with the result
                                                                swal({
                                                                    title: "Not Deleted",
                                                                    text: "Deleting entries is disabled in the online demo. Dooh.",
                                                                    icon: "error",
                                                                    timer: 4000,
                                                                    buttons: false,
                                                                });
                                                            }
                                                        });
                                                    }
                                                });

                                            }
                                        }

                                        // make it so that the function above is run after each DataTable draw event
                                        // crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
                                    </script> -->

                                </td>
                            </tr>