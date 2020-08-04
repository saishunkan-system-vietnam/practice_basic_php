<link href=<?php echo './css/test.css' ?> rel="stylesheet" />
<div class="card-content">
    <!-- datatable start -->
    <div class="responsive-table">
        <div id="users-list-datatable_wrapper" class="dataTables_wrapper no-footer">
              <div id="users-list-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="users-list-datatable"></label></div>
            <table id="users-list-datatable" class="table dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="users-list-datatable_info" style="width: 1023px;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" rowspan="1" colspan="1" style="width: 5px;" aria-label=""></th>
                        <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 31px;" aria-label="id: activate to sort column ascending">id</th>
                        <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 113px;" aria-label="username: activate to sort column ascending">username</th>
                        <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 178px;" aria-label="name: activate to sort column ascending">role</th>
                        <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 109px;" aria-label="last activity: activate to sort column ascending">last activity</th>
                        <!-- <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 75px;" aria-label="verified: activate to sort column ascending">verified</th> -->
                        <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 40px;" aria-label="role: activate to sort column ascending">role</th>
                        <th class="sorting" tabindex="0" aria-controls="users-list-datatable" rowspan="1" colspan="1" style="width: 82px; display: none;" aria-label="status: activate to sort column ascending">status</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 42px; display: none;" aria-label="edit">edit</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 48px; display: none;" aria-label="view">view</th>
                    </tr>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1"></td>
                        <td>300</td>
                        <td><a href="page-users-view.html">dean3004</a>
                        </td>
                        <td>Dean Stanley</td>
                        <td>30/04/2019</td>
                        <!-- <td>No</td> -->
                        <td>Staff</td>
                        <td style="display: none;"><span class="chip green lighten-5">
                                <span class="green-text">Active</span>
                            </span>
                        </td>
                        <td style="display: none;"><a href="page-users-edit.html"><i class="material-icons">edit</i></a></td>
                        <td style="display: none;"><a href="page-users-view.html"><i class="material-icons">remove_red_eye</i></a></td>
                    </tr>
                    <tr role="row" class="even">
                        <td tabindex="0" class="sorting_1"></td>
                        <td>301</td>
                        <td><a href="page-users-view.html">zena0604</a>
                        </td>
                        <td>Zena Buckley</td>
                        <td>06/04/2020</td>
                        <!-- <td>Yes</td> -->
                        <td>User </td>
                        <td style="display: none;"><span class="chip green lighten-5">
                                <span class="green-text">Active</span>
                        </span>
                        </td>
                        <td style="display: none;"><a href="page-users-edit.html"><i class="material-icons">edit</i></a></td>
                        <td style="display: none;"><a href="page-users-view.html"><i class="material-icons">remove_red_eye</i></a></td>
                    </tr>                   
                </tbody>
            </table>
            <!-- <div class="dataTables_info" id="users-list-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 36 entries</div>
            <div class="dataTables_paginate paging_simple_numbers" id="users-list-datatable_paginate"><a class="paginate_button previous disabled" aria-controls="users-list-datatable" data-dt-idx="0" tabindex="-1" id="users-list-datatable_previous">Previous</a><span><a class="paginate_button current" aria-controls="users-list-datatable" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="users-list-datatable" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="users-list-datatable" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="users-list-datatable" data-dt-idx="4" tabindex="0">4</a></span><a class="paginate_button next" aria-controls="users-list-datatable" data-dt-idx="5" tabindex="0" id="users-list-datatable_next">Next</a></div> -->
        </div>
    </div>
    <!-- datatable ends -->
</div>



