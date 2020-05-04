<section class="page page-dashboard">
    <!-- PAGE-TITLE -->
    <div class="page-title">
        <div class="title large">
            <span class="title-icon"><i class="fa fa-cube"></i></span>Request
        </div>
        <div class="actions-ctrl">
            <a href="addEvent.php" class="v-btn v-btn-secondary float-right">New Request</a>
        </div>
    </div>
    <!-- FILTER LIST -->
    <div class="page-filter">
        <ul class="filter-list">
            <li>
                <label for="">Event</label>
                <input type="text" class="form-control" placeholder="">
            </li>
            <li>
                <label for="">Location</label>
                <input type="text" class="form-control" placeholder="">
            </li>
            <li>
                <label for="">Date/Time</label>
                <input type="text" class="form-control" placeholder="">
            </li>
            <li>
                <label for="">Due Date</label>
                <input type="text" class="form-control" placeholder="">
            </li>
            <li>
                <a href="" class="v-btn v-btn-secondary mt-4 btn-block" data-toggle="modal" data-target="" >Filter</a>
            </li>
        </ul>
    </div>
    <!-- PAGE-CONTENT -->
    <div class="page-content">
        <div class="block no-padding">
            <div class="content table-responsive">
                <table class="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event No.</th>
                            <th>Location</th>
                            <th>Date/Time</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                #EVN12345
                            </td>
                            <td>Dwarka - Delhi</td>
                            <td>26 March 2020 | 10:00AM </td>
                            <td>28 March 2020 </td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Pending</option>
                                    <option value="">Process</option>
                                    <option value="">Completed</option>
                                </select>
                            </td>
                            <td>
                                <a href="#" class="icon icon-sm icon-secondary " title="Edit Use"><i class="fa fa-pencil-alt"></i></a>
                                <a href="#" data-target="#confirmation" data-toggle="modal" title="Delete User" class="icon icon-sm icon-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                #EVN12345
                            </td>
                            <td>Dwarka - Delhi</td>
                            <td>26 March 2020 | 10:00AM </td>
                            <td>28 March 2020</td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Process</option>
                                    <option value="">Process</option>
                                    <option value="">Completed</option>
                                </select>
                            </td>
                            <td>
                                <a href="#" class="icon icon-sm icon-secondary " title="Edit Use"><i class="fa fa-pencil-alt"></i></a>
                                <a href="#" data-target="#confirmation" data-toggle="modal" title="Delete User" class="icon icon-sm icon-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                #EVN12345
                            </td>
                            <td>Dwarka - Delhi</td>
                            <td>26 March 2020 | 10:00AM </td>
                            <td>28 March 2020 </td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Completed</option>
                                    <option value="">Process</option>
                                    <option value="">Completed</option>
                                </select>
                            </td>
                            <td>
                                <a href="#" class="icon icon-sm icon-secondary " title="Edit Use"><i class="fa fa-pencil-alt"></i></a>
                                <a href="#" data-target="#confirmation" data-toggle="modal" title="Delete User" class="icon icon-sm icon-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer text-right">
                <nav class="page-navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item  active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

