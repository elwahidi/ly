@extends("communication.app")
@section('title')
    Communication
@stop
@section('content')
    <div class="page-wrapper" style="min-height: 360px;">
        <div>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li class="menu-title">Contacts</li>
                            <li>
                                <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg" alt="" class="img-circle"><span class="status online"></span></span> John Doe <span class="badge bg-danger pull-right">1</span></a>
                            </li>
                            <li>
                                <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg" alt="" class="img-circle"><span class="status offline"></span></span> Richard Miles <span class="badge bg-danger pull-right">18</span></a>
                            </li>
                            <li>
                                <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg" alt="" class="img-circle"><span class="status away"></span></span> John Smith</a>
                            </li>
                            <li class="active">
                                <a href="chat.html"><span class="chat-avatar-sm user-img"><img src="assets/img/user.jpg" alt="" class="img-circle"><span class="status online"></span></span> Mike Litorus <span class="badge bg-danger pull-right">108</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-xs-9 message-view task-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details">
                                        <div class="pull-left user-img m-r-10">
                                            <a href="profile.html" title="Mike Litorus"><img src="assets/img/user.jpg" alt="" class="w-40 img-circle"><span class="status online"></span></a>
                                        </div>
                                        <div class="user-info pull-left m-t-5">
                                            <a href="profile.html" title="Mike Litorus"><span class="font-bold">Mike Litorus</span> <i class="typing-text">Typing...</i></a>
                                        </div>
                                    </div>
                                    <ul class="nav navbar-nav pull-right custom-menu">

                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0)">Delete Conversations</a></li>
                                                <li><a href="javascript:void(0)">Settings</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>I'm just looking around.</p>
                                                                <p>Will you tell me something about yourself? </p>
                                                                <span class="chat-time">8:35 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Where?</p>
                                                                <span class="chat-time">8:35 am</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <div class="message-bar">
                                    <div class="message-inner">
                                        <a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files"><img src="assets/img/attachment.png" alt=""></a>
                                        <div class="message-area">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Type message..."></textarea>
                                                <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                        <div class="chat-window video-window">
                            <div class="fixed-header">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li><a href="#calls_tab" data-toggle="tab">Calls</a></li>
                                    <li class="active"><a href="#profile_tab" data-toggle="tab">Profile</a></li>
                                </ul>
                            </div>
                            <div class="tab-content chat-contents">
                                <div class="content-full tab-pane" id="calls_tab">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">You</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">Jeffrey Warden missed the call</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">call_end</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details"><span class="call-description">This call has ended</span></div>
                                                                        <div class="call-timing">Duration: <strong>5 min 57 sec</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-line">
                                                    <span class="chat-date">January 29th, 2015</span>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">Richard Miles</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">You missed the call</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="assets/img/user.jpg" class="img-responsive img-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">You</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">ring_volume</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <a href="#" class="call-description call-description--linked" data-qa="call_attachment_link">Calling John Smith ...</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-full tab-pane active" id="profile_tab">
                                    <div class="display-table">
                                        <div class="table-row">
                                            <div class="table-body">
                                                <div class="table-content">
                                                    <div class="chat-profile-img">
                                                        <div class="edit-profile-img">
                                                            <img src="assets/img/user.jpg" alt="">
                                                            <span class="change-img">Change Image</span>
                                                        </div>
                                                        <h3 class="user-name m-t-10 m-b-0">John Doe</h3>
                                                        <small class="text-muted">Web Designer</small>
                                                        <a href="edit-profile.html" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                                                    </div>
                                                    <div class="chat-profile-info">
                                                        <ul class="user-det-list">
                                                            <li>
                                                                <span>Username:</span>
                                                                <span class="pull-right text-muted">johndoe</span>
                                                            </li>
                                                            <li>
                                                                <span>DOB:</span>
                                                                <span class="pull-right text-muted">24 July</span>
                                                            </li>
                                                            <li>
                                                                <span>Email:</span>
                                                                <span class="pull-right text-muted">johndoe@example.com</span>
                                                            </li>
                                                            <li>
                                                                <span>Phone:</span>
                                                                <span class="pull-right text-muted">9876543210</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="transfer-files">
                                                        <ul class="nav nav-tabs nav-tabs-solid nav-justified m-b-0">
                                                            <li class="active"><a href="#all_files" data-toggle="tab">All Files</a></li>
                                                            <li><a href="#my_files" data-toggle="tab">My Files</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="all_files">
                                                                <ul class="files-list">
                                                                    <li>
                                                                        <div class="files-cont">
                                                                            <div class="file-type">
                                                                                <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                                            </div>
                                                                            <div class="files-info">
                                                                                <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                                                                                <span class="file-author"><a href="#">Loren Gatlin</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                                                            </div>
                                                                            <ul class="files-action">
                                                                                <li class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a href="javascript:void(0)">Download</a></li>
                                                                                        <li><a href="#" data-toggle="modal" data-target="#share_files">Share</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="my_files">
                                                                <ul class="files-list">
                                                                    <li>
                                                                        <div class="files-cont">
                                                                            <div class="file-type">
                                                                                <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                                            </div>
                                                                            <div class="files-info">
                                                                                <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                                                                                <span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                                                            </div>
                                                                            <ul class="files-action">
                                                                                <li class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a href="javascript:void(0)">Download</a></li>
                                                                                        <li><a href="#" data-toggle="modal" data-target="#share_files">Share</a></li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="drag_files" class="modal custom-modal fade center-modal" role="dialog">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Drag and drop files upload</h3>
                        </div>
                        <div class="modal-body p-t-0">
                            <form id="js-upload-form">
                                <div class="upload-drop-zone" id="drop-zone">
                                    <i class="fa fa-cloud-upload fa-2x"></i> <span class="upload-text">Just drag and drop files here</span>
                                </div>
                                <h4>Uploading</h4>
                                <ul class="upload-list">
                                    <li class="file-list">
                                        <div class="upload-wrap">
                                            <div class="file-name">
                                                <i class="fa fa-photo"></i> photo.png
                                            </div>
                                            <div class="file-size">1.07 gb</div>
                                            <button type="button" class="file-close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="progress progress-xs progress-striped">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                        </div>
                                        <div class="upload-process">37% done</div>
                                    </li>
                                    <li class="file-list">
                                        <div class="upload-wrap">
                                            <div class="file-name">
                                                <i class="fa fa-file"></i> task.doc
                                            </div>
                                            <div class="file-size">5.8 kb</div>
                                            <button type="button" class="file-close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="progress progress-xs progress-striped">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                        </div>
                                        <div class="upload-process">37% done</div>
                                    </li>
                                    <li class="file-list">
                                        <div class="upload-wrap">
                                            <div class="file-name">
                                                <i class="fa fa-photo"></i> dashboard.png
                                            </div>
                                            <div class="file-size">2.1 mb</div>
                                            <button type="button" class="file-close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="progress progress-xs progress-striped">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                        </div>
                                        <div class="upload-process">Completed</div>
                                    </li>
                                </ul>
                            </form>
                            <div class="m-t-30 text-center">
                                <button class="btn btn-primary btn-lg">Add to upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="share_files" class="modal custom-modal fade center-modal" role="dialog">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Share File</h3>
                        </div>
                        <div class="modal-body">
                            <div class="files-share-list">
                                <div class="files-cont">
                                    <div class="file-type">
                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                    </div>
                                    <div class="files-info">
                                        <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                                        <span class="file-author"><a href="#">Bernardo Galaviz</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Share With</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="m-t-50 text-center">
                                <button class="btn btn-primary btn-lg">Share</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
