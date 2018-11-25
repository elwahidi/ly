@extends('layouts.guest')

@section('title_page'){{ __('register') }}@stop
@section('content')
    <div class="container">
        <h3 class="account-title">{{ __('register') }}</h3>

        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['method' => 'POST', 'url' => route('register'),'class' => 'form-horizontal']) }}
                <div class="card-box">
                    <div class="row m-b-30">
                        <div class="col-md-6">
                            <input type="file" name="face" class="form-control">
                            @if($errors->has('face'))
                                <span class="text-danger">{{ $errors->first('face') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="cin" placeholder="cin" class="form-control">
                            @if($errors->has('cin'))
                                <span class="text-danger">{{ $errors->first('cin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">{{ __('pages.auth.register.Personal details') }}</h4>
                            <div class="form-group">
                                {{ Form::label('name',__('validation.attributes.name') . ' :',['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::text('first_name',null,['class' => 'form-control', 'placeholder'=> __('validation.attributes.first_name'),'required','minlenght' => '3','maxlenght'=> '15']) }}
                                            @if($errors->has('first_name'))
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <span
                                                            class="text-warning">{{ $errors->first('first_name') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::text('last_name',null,['class' => 'form-control', 'placeholder'=> __('validation.attributes.last_name'),'required','minlenght' => '3','maxlenght'=> '15']) }}
                                            @if($errors->has('last_name'))
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <span
                                                            class="text-warning">{{ $errors->first('last_name') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('phone', __('validation.attributes.phone'),['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            +212
                                        </span>
                                        {{ Form::tel('tel',null,['class' => 'form-control', 'placeholder' => '06', 'minlenght' => '10', 'maxlenght' => '10']) }}
                                    </div>
                                    @if($errors->has('tel'))
                                        <span class="text-warning">{{ $errors->first('tel') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('address',__('validation.attributes.address'),['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required', 'minlenght' => '10','maxlenght' => '80']) }}
                                            @if($errors->has('address'))
                                                <span class="text-warning">{{ $errors->first('address') }}</span>
                                            @endif

                                        </div>
                                        <div class="col-md-6">
                                            <select name="city" id="city" title="city" class="form-control" required>
                                                @if(!old('city'))
                                                    <option>{{ __('validation.attributes.city') }}</option>
                                                @endif
                                                @foreach($cities as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ (old('city') == $city->id) ? 'selected' : '' }}>{{ $city->city }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('city'))
                                                <span class="text-warning">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('birth',__('validation.attributes.birth'), ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    {{ Form::date('birth',(old('birth')) ? old('birth') : gmdate('Y-m-d',strtotime("-18 years")),['class' => 'form-control','placeholder' => 'birth', 'required']) }}
                                    @if($errors->has('birth'))
                                        <span class="text-warning">{{ $errors->first('birth') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">{{ __('pages.auth.register.Account Details') }}</h4>

                            <div class="form-group">
                                {{ Form::label('identity', __('validation.attributes.identity'), ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::text('name',null,['class' => 'form-control', 'placeholder' => __('validation.attributes.username'),'required','minlenght' => '3','maxlenght' => '15']) }}
                                            @if($errors->has('name'))
                                                <span class="text-warning">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::email('email',null,['class' => 'form-control', 'placeholder' => __('validation.attributes.email'),'required','minlenght' => '5','maxlenght' => '80']) }}
                                            @if($errors->has('email'))
                                                <span class="text-warning">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', __('validation.attributes.password'), ['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ Form::password('password',['class' => 'form-control', 'placeholder' => __('validation.attributes.password'),'required','minlenght' => '6','maxlenght' => '80']) }}
                                            @if($errors->has('password'))
                                                <span class="text-warning">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => __('validation.attributes.password_confirmation'),'required','minlenght' => '6','maxlenght' => '80']) }}
                                            @if($errors->has('password_confirmation'))
                                                <span
                                                    class="text-warning">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('token',__('validation.attributes.token'),['class' => 'col-lg-3 control-label']) }}
                                <div class="col-lg-9">
                                    {{ Form::text('token', null, ['class' => 'form-control', 'placeholder' => __('validation.attributes.token'), 'required', 'minlenght' => '10']) }}
                                    @if($errors->has('token'))
                                        <span class="text-warning">{{ $errors->first('token') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('pages.auth.register.registered') }}
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
