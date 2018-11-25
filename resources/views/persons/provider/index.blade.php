@extends("layouts.app")
@section('title')
    {{__('pages.provider.title_index')}}
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
                <h4 class="page-title">{{__('pages.provider.title_index')}}</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{URL::route('Provider.create')}}" class="btn btn-primary rounded pull-right"><i class="fa fa-plus"></i> {{__('pages.provider.details.add')}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="card-box">
                        <div class="card-block">
                            <table class="display datatable table table-stripped">
                        <thead>
                        <tr>

                            <th>{{__('pages.provider.details.name')}}</th>
                            <th>{{__('pages.provider.details.licence')}}</th>
                            <th>{{__('pages.provider.details.tel')}}</th>
                            <th>{{__('pages.provider.details.licence')}}</th>
                            <th>{{__('pages.provider.details.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($providers)
                            @foreach($providers as $provider)
                                <tr>
                                    <td><a href="{{URL::route('Provider.show',['id'=>$provider->id])}}">{{$provider->info_box->name}}</a></td>
                                    <td>{{$provider->info_box->licence}}</td>
                                    <td>{{isset($provider->info_box->tels[0]->tel) ? $provider->info_box->tels[0]->tel : ''}}</td>
                                    <td>{{$provider->info_box->city->city}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a  href="{{URL::route('Provider.edit', ['id' => $provider->id]) }}"><i class="fa fa-pencil m-r-5"></i> {{__('pages.provider.details.edit')}}</a></li>
                                                <li>
                                                    <a href="#"
                                                       onclick="if(confirm('Do you remove it ??')){
                                                               document.getElementById('delete-provider{{$provider->id}}').submit();
                                                               event.preventDefault();}
                                                               else event.preventDefault(); ">
                                                        <i class="fa fa-trash-o m-r-5"></i> {{__('pages.provider.details.delete')}}
                                                    </a>
                                                    <form id="delete-provider{{$provider->id}}" method="post" action="{{URL::route('Provider.destroy', ['id' => $provider->id]) }}">
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
                            {{__('pages.provider.no_result')}}
                        @endif
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-scripts')
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    @endpush
@stop