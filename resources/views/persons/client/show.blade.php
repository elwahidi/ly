@extends("layouts.app")
@section('title')
    {{__('pages.client.title_show')}}
@stop
@section('content')
    @push('custom-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/light-gallery/css/lightgallery.min.css')}}">
    @endpush

    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-7">
                <h4 class="page-title">{{__('pages.client.title_show')}}</h4>
            </div>
            <div class="col-xs-5 text-right m-b-30">
                <form id="delete-client{{$client->id}}" method="post" action="{{URL::route('Client.destroy', ['id' => $client->id]) }}">
                    {!! method_field('delete') !!}
                    {!! csrf_field() !!}
                </form>
                <a href="#"
                   onclick="if(confirm('Do you remove it ??')){
                           document.getElementById('delete-client{{$client->id}}').submit();
                           event.preventDefault();} else event.preventDefault();"
                   class="btn btn-danger rounded ">
                    <i class="fa fa-plus"></i>  {{__('pages.client.details.delete')}}
                </a>
                <a href="{{URL::route('Client.edit', ['id' => $client->id]) }}" class="btn btn-primary rounded "><i class="fa fa-plus"></i>
                    {{__('pages.client.details.edit')}}
                </a>
            </div>
        </div>
        <div class="card-box m-b-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">{{$client->info_box->name}}</h3>
                                        @isset($client->description)<h5 class="company-role m-t-0 m-b-0">{{$client->description}}</h5>@endisset
                                        @isset($client->info_box->licence)<div class="staff-id">{{__('pages.provider.details.licence')}} : {{$client->info_box->licence}}</div>@endisset
                                        @isset($client->info_box->turnover)<div class="staff-id">{{__('pages.provider.details.turnover')}} : {{$client->info_box->turnover}}</div>@endisset
                                        @isset($client->info_box->taxes)<div class="staff-id">{{__('pages.provider.details.taxes')}} : {{$client->info_box->taxes}}</div>@endisset
                                        @isset($client->info_box->speaker)<div class="staff-id">{{__('pages.provider.details.speaker')}} : {{$client->info_box->speaker}}</div>@endisset
                                        <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Email</a></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        @isset($client->info_box->tels[0]->tel)
                                            <li>
                                                <span class="title">{{__('pages.client.details.tel')}} :</span>
                                                <span class="text"><a href="#">{{$client->info_box->tels[0]->tel}}</a></span>
                                            </li>
                                        @endisset
                                        @isset($client->info_box->fax)
                                            <li>
                                                <span class="title">{{__('pages.client.details.fax')}} :</span>
                                                <span class="text"><a href="#">{{$client->info_box->fax}}</a></span>
                                            </li>
                                        @endisset
                                        @isset($client->info_box->emails[0]->email)
                                            <li>
                                                <span class="title">{{__('pages.client.details.email')}} :</span>
                                                <span class="text"><a href="#">{{$client->info_box->emails[0]->email}}</a></span>
                                            </li>
                                        @endisset

                                        @isset($client->info_box->address)
                                            <li>
                                                <span class="title">{{__('pages.client.details.address')}} :</span>
                                                <span class="text">{{$client->info_box->address}}</span>
                                            </li>
                                        @endisset
                                        @isset($client->info_box->city->city)
                                            <li>
                                                <span class="title">{{__('pages.client.details.city')}} :</span>
                                                <span class="text">{{$client->info_box->city->city}}</span>
                                            </li>
                                        @endisset
                                        @isset($client->info_box->zip)
                                            <li>
                                                <span class="title">{{__('pages.client.details.zip')}}:</span>
                                                <span class="text">{{$client->info_box->zip}}</span>
                                            </li>
                                        @endisset
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-box tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs tabs nav-tabs-bottom">
                        <li class="col-sm-3 active"><a data-toggle="tab" href="#myprojects" aria-expanded="true">My Projects</a></li>
                        <li class="col-sm-3"><a data-toggle="tab" href="#tasks" aria-expanded="false">Tasks</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content  profile-tab-content">
                    <div id="myprojects" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-3 col-sm-4">
                                <div class="card-box project-box">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{URL::route('Client.edit',['id'=>$client->id])}}" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit___</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            8 Sep 2017
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img src="assets/img/user.jpg" alt="Jeffery Lalor"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img src="assets/img/user.jpg" alt="John Doe"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img src="assets/img/user.jpg" alt="Richard Miles"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img src="assets/img/user.jpg" alt="John Smith"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img src="assets/img/user.jpg" alt="Mike Litorus"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
                                    <div class="progress progress-xs m-b-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: 40%" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <div class="card-box project-box">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            8 Sep 2017
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img src="assets/img/user.jpg" alt="Jeffery Lalor"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img src="assets/img/user.jpg" alt="John Doe"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img src="assets/img/user.jpg" alt="Richard Miles"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img src="assets/img/user.jpg" alt="John Smith"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img src="assets/img/user.jpg" alt="Mike Litorus"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
                                    <div class="progress progress-xs m-b-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: 40%" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <div class="card-box project-box">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            8 Sep 2017
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img src="assets/img/user.jpg" alt="Jeffery Lalor"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img src="assets/img/user.jpg" alt="John Doe"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img src="assets/img/user.jpg" alt="Richard Miles"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img src="assets/img/user.jpg" alt="John Smith"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img src="assets/img/user.jpg" alt="Mike Litorus"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
                                    <div class="progress progress-xs m-b-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: 40%" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <div class="card-box project-box">
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                    <small class="block text-ellipsis m-b-15">
                                        <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                        <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                    </small>
                                    <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                    </p>
                                    <div class="pro-deadline m-b-15">
                                        <div class="sub-title">
                                            Deadline:
                                        </div>
                                        <div class="text-muted">
                                            8 Sep 2017
                                        </div>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Project Leader :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img src="assets/img/user.jpg" alt="Jeffery Lalor"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="project-members m-b-15">
                                        <div>Team :</div>
                                        <ul class="team-members">
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img src="assets/img/user.jpg" alt="John Doe"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img src="assets/img/user.jpg" alt="Richard Miles"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img src="assets/img/user.jpg" alt="John Smith"></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img src="assets/img/user.jpg" alt="Mike Litorus"></a>
                                            </li>
                                            <li>
                                                <a href="#" class="all-users">+15</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
                                    <div class="progress progress-xs m-b-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="" style="width: 40%" data-original-title="40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tasks" class="tab-pane fade">
                        <div class="project-task">
                            <ul class="nav nav-tabs nav-tabs-top nav-justified m-b-0">
                                <li class="active"><a href="#all_tasks" data-toggle="tab" aria-expanded="false">All Tasks</a></li>
                                <li><a href="#pending_tasks" data-toggle="tab" aria-expanded="false">Pending Tasks</a></li>
                                <li><a href="#completed_tasks" data-toggle="tab" aria-expanded="false">Completed Tasks</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="all_tasks">
                                    <div class="task-wrapper">
                                        <div class="task-list-container">
                                            <div class="task-list-body">
                                                <ul id="task-list">
                                                    <li class="task">
                                                        <div class="task-container">
                                                                    <span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
                                                                    </span>
                                                            <span class="task-label" contenteditable="true">Patient appointment booking</span>
                                                            <span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
                                                                    <span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="task">
                                                        <div class="task-container">
                                                                    <span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
                                                                    </span>
                                                            <span class="task-label" contenteditable="true">Appointment booking with payment gateway</span>
                                                            <span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
                                                                    <span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="completed task">
                                                        <div class="task-container">
                                                                    <span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
                                                                    </span>
                                                            <span class="task-label">Doctor available module</span>
                                                            <span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
                                                                    <span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="task">
                                                        <div class="task-container">
                                                                    <span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
                                                                    </span>
                                                            <span class="task-label" contenteditable="true">Patient and Doctor video conferencing</span>
                                                            <span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
                                                                    <span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="task">
                                                        <div class="task-container">
                                                                    <span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
                                                                    </span>
                                                            <span class="task-label" contenteditable="true">Private chat module</span>
                                                            <span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
                                                                    <span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="task">
                                                        <div class="task-container">
                                                                    <span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
                                                                    </span>
                                                            <span class="task-label" contenteditable="true">Patient Profile add</span>
                                                            <span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
                                                                    <span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="task-list-footer">
                                                <div class="new-task-wrapper">
                                                    <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                    <span class="error-message hidden">You need to enter a task first</span>
                                                    <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                    <span class="cancel-btn btn" id="close-task-panel">Close</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pending_tasks"></div>
                                <div class="tab-pane" id="completed_tasks"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-scripts')
    <script type="text/javascript" src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
    @endpush
@stop