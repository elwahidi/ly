@extends("layouts.app")
@section('title')
    {{__('pages.position.title_index')}}
@stop
@section('content')
    @push('custom-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap.min.css')}}">
    @endpush


    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <div class="view-icons pull-left">
                    <i class="fa fa-bars"></i>
                </div>
                <h4 class="page-title">{{__('pages.position.title_index')}}</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{URL::route('Position.create')}}" class="btn btn-primary rounded pull-right"><i class="fa fa-plus"></i> {{__('pages.position.details.add')}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="display datatable table table-stripped">
                                <thead>
                                <tr>
                                    <th>{{__('pages.position.details.facial')}}</th>
                                    <th>{{__('pages.position.details.name')}}</th>
                                    <th>{{__('pages.position.details.name')}}</th>
                                    <th>{{__('pages.position.details.tel')}}</th>
                                    <th>{{__('pages.position.details.email')}}</th>
                                    <th>{{__('pages.position.details.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($positions)
                                    @foreach($positions as $position)
                                        <tr>
                                            <td>
                                                <div class="product-det">
                                                    <img src="{{asset('img/user.jpg') }}" alt="" >
                                                </div>
                                            </td>
                                            <td>{{$position->info->first_name}}</td>
                                            <td>{{$position->info->last_name}}</td>
                                            <td>{{$position->info->tels[0]->tel}}</td>
                                            <td>{{$position->info->emails[0]->email}}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a  href="{{URL::route('Position.edit', ['id' => $position->id]) }}"><i class="fa fa-pencil m-r-5"></i> {{__('pages.position.details.edit')}}</a></li>
                                                        <li>
                                                            <a href="#"
                                                               onclick="if(confirm('Do you remove it ??')){
                                                                       document.getElementById('delete-position{{$position->id}}').submit();
                                                                       event.preventDefault();}
                                                                       else event.preventDefault(); ">
                                                                <i class="fa fa-trash-o m-r-5"></i> {{__('pages.position.details.delete')}}
                                                            </a>
                                                            <form id="delete-position{{$position->id}}" method="post" action="{{URL::route('Position.destroy', ['id' => $position->id]) }}">
                                                                {!! method_field('delete') !!}
                                                                {!! csrf_field() !!}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    {{__('pages.position.no_result')}}
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>

    @push('custom-scripts')
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    @endpush
@stop