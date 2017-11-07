<!-- MODALS =============================================-->
<div class="modal fade" id="contactEditUser" tabindex="-1" role="dialog" aria-labelledby="contactLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                        <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
                <h4 class="modal-title">Edit Contact</h4>
                <div class="user-avatar-wrapper">
                    <figure>
                        <div class="icon-upload">
                            <label for="file-input">
                            <span class="edit-avatar">
                            <img src="" alt="" class="avatar img-circle animated zoomIn"/>
                            </span>
                            </label>
                            <input id="file-input" type="file">
                        </div>
                        <figcaption>
                            <h5 class="name animated fadeInUp"></h5>
                            <ul class="card-actions icons">
                                <li>
                                    <a href="javascript:void(0)"><i class="zmdi star zmdi-star-outline"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu p-15">
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" id="" value=""><span class="checkbox-material"></span>
                                                Work
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" checked="" id="" value=""><span class="checkbox-material"></span>
                                                Family
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" checked="" id="" value=""><span class="checkbox-material"></span>
                                                Friends
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" id="" value=""><span class="checkbox-material"></span>
                                                Private
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <label class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="edit_name" value="name">
                    </div>
                </div>
                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <label class="control-label">Email Address</label>
                        <input type="email" class="form-control" id="edit_email" value="email@materiallab.pro">
                    </div>
                </div>
                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                        <label class="control-label">Phone Number</label>
                        <input type="text" class="form-control" id="edit_phone" value="phone">
                    </div>
                </div>
                <div class="form-group label-floating is-empty">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-pin"></i></span>
                        <label class="control-label">Address</label>
                        <input type="text" class="form-control" id="edit_address">
                    </div>
                </div>
                <div class="form-group label-floating is-empty">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="mdi mdi-note-text"></i></span>
                        <label for="textArea" class="control-label">Notes</label>
                        <textarea class="form-control" rows="3" id="edit_notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-flat pull-left">Delete</button>
                <button class="btn btn-primary btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newContactModal" tabindex="-1" role="dialog" aria-labelledby="newContactModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="card-actions icons right-top">
                    <li>
                        <a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
                        <i class="zmdi zmdi-close"></i>
                        </a>
                    </li>
                </ul>
                <h4 class="modal-title">New Contact</h4>
                <div class="user-avatar-wrapper">
                    <figure>
                        <div class="icon-upload">
                            <label for="file-input">
                                <span class="edit-avatar">
                                    <div class="no-avatar app_primary_lighten_bg animated zoomIn"></div>
                                </span>
                            </label>
                            <input id="file-input" type="file">
                        </div>
                        <figcaption>
                            <h5 class="name"></h5>
                            <ul class="card-actions icons">
                                <li>
                                    <a href="javascript:void(0)"><i class="zmdi star zmdi-star-outline"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu p-15">
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" id="" value=""><span class="checkbox-material"></span>
                                                Work
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" id="" value=""><span class="checkbox-material"></span>
                                                Family
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" id="" value=""><span class="checkbox-material"></span>
                                                Friends
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label class="checkbox-inline action">
                                                <input type="checkbox" id="" value=""><span class="checkbox-material"></span>
                                                Private
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <label class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="add_name" value="">
                    </div>
                </div>
                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <label class="control-label">Email Address</label>
                        <input type="email" class="form-control" id="add_email" value="">
                    </div>
                </div>
                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                        <label class="control-label">Phone Number</label>
                        <input type="text" class="form-control" id="add_phone" value="">
                    </div>
                </div>
                <div class="form-group label-floating is-empty">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-pin"></i></span>
                        <label class="control-label">Address</label>
                        <input type="text" class="form-control" id="add_address">
                    </div>
                </div>
                <div class="form-group label-floating is-empty">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="mdi mdi-note-text"></i></span>
                        <label for="textArea" class="control-label">Notes</label>
                        <textarea class="form-control" rows="3" id="textArea" id="add_notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default btn-flat pull-left">Delete</button>
                <button class="btn btn-primary btn-flat" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODALS =============================================-->