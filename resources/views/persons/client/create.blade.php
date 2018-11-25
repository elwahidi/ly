@extends("layouts.app")
@section('title')
    {{__('pages.client.title_index')}}
@stop
@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4 class="page-title">{{__('pages.client.title_create')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/Client" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.brand')}}</label>
                                <input class="form-control" type="text" name="brand" value="{{ old('brand') }}">
                                @if ($errors->has('brand'))
                                    <div class="help-block">{{ $errors->first('brand') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.name')}}</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.licence')}}</label>
                                <input class="form-control" type="text" name="licence" value="{{ old('licence') }}">
                                @if ($errors->has('licence'))
                                    <div class="help-block">{{ $errors->first('licence') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.speaker')}}</label>
                                <input class="form-control" type="text" name="speaker" value="{{ old('speaker') }}">
                                @if ($errors->has('speaker'))
                                    <div class="help-block">{{ $errors->first('speaker') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.tel')}}</label>
                                <input class="form-control" type="text" name="tel" value="{{ old('tel') }}">
                                @if ($errors->has('tel'))
                                    <div class="help-block">{{ $errors->first('tel') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.fax')}}</label>
                                <input class="form-control" type="text" name="fax" value="{{ old('fax') }}">
                                @if ($errors->has('fax'))
                                    <div class="help-block">{{ $errors->first('fax') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.build')}}</label>
                                <input class="form-control" type="text" name="build" value="{{ old('build') }}">
                                @if ($errors->has('build'))
                                    <div class="help-block">{{ $errors->first('build') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.turnover')}}</label>
                                <input class="form-control" type="text" name="turnover" value="{{ old('turnover') }}">
                                @if ($errors->has('turnover'))
                                    <div class="help-block">{{ $errors->first('turnover') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('pages.client.details.address')}}</label>
                        <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                        @if ($errors->has('address'))
                            <div class="help-block">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{__('pages.client.details.email')}}</label>
                        <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="help-block">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('pages.client.details.taxes')}}</label>
                                <input class="form-control" type="text" name="taxes" value="{{ old('taxes') }}">
                                @if ($errors->has('taxes'))
                                    <div class="help-block">{{ $errors->first('taxes') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('pages.client.details.floor')}}</label>
                                <input class="form-control" type="text" name="floor" value="{{ old('floor') }}">
                                @if ($errors->has('floor'))
                                    <div class="help-block">{{ $errors->first('floor') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('pages.client.details.apt_nbr')}}</label>
                                <input class="form-control" type="text" name="apt_nbr" value="{{ old('apt_nbr') }}">
                                @if ($errors->has('apt_nbr'))
                                    <div class="help-block">{{ $errors->first('apt_nbr') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.city')}}</label>
                                <select name="city_id" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="0">{{__('pages.client.details.choise_city')}}</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city'))
                                    <div class="help-block">{{ $errors->first('city') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.client.details.zip')}}</label>
                                <input class="form-control" type="text" name="zip" value="{{ old('zip') }}">
                                @if ($errors->has('zip'))
                                    <div class="help-block">{{ $errors->first('zip') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('pages.client.details.description')}}</label>
                        <textarea cols="30" rows="6" class="form-control" name="description">{{old('description')}}</textarea>
                        @if ($errors->has('description'))
                            <div class="help-block">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary btn-lg">{{__('pages.client.details.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop