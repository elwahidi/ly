@extends("layouts.app")
@section('title')
    {{__('pages.position.title_edit')}}
@stop
@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4 class="page-title">{{__('pages.position.title_edit')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{URL::route('Position.update',['id'=>$position->id])}}" method="post">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.first_name')}}</label>
                                <input class="form-control" type="text" name="first_name" value="{{ old('first_name') != '' ? old('first_name') : $position->info->first_name }}">
                                @if ($errors->has('first_name'))
                                    <div class="help-block">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.last_name')}}</label>
                                <input class="form-control" type="text" name="last_name" value="{{ old('last_name') != '' ? old('last_name') : $position->info->last_name }}">
                                @if ($errors->has('last_name'))
                                    <div class="help-block">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.tel')}}</label>
                                <input class="form-control" type="text" name="tel" value="{{ old('tel') != '' ? old('tel') : $position->info->tels[0]->tel }}">
                                @if ($errors->has('tel'))
                                    <div class="help-block">{{ $errors->first('tel') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.email')}}</label>
                                @isset($position->info->emails[0]->email )
                                    <input class="form-control" type="text" name="email" value="{{ old('email') != '' ? old('email') :   $position->info->emails[0]->email  }}">
                                @else
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                                @endif
                                @if ($errors->has('email'))
                                    <div class="help-block">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{__('pages.position.details.address')}}</label>
                        <input class="form-control" type="text" name="address" value="{{ old('address') != '' ? old('address') : $position->info->address }}">
                        @if ($errors->has('address'))
                            <div class="help-block">{{ $errors->first('address') }}</div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.sex')}}</label>
                                <select name="sex" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="0">Choise sex</option>
                                    <option value="man" {{$position->info->sex == 'man' ? 'selected' : ''}}>{{__('pages.position.details.man')}}</option>
                                    <option value="women" {{$position->info->sex == 'women' ? 'selected' : ''}}>{{__('pages.position.details.women')}}</option>
                                </select>
                                @if ($errors->has('sex'))
                                    <div class="help-block">{{ $errors->first('sex') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.city')}}</label>
                                <select name="city_id" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="0">Choise city</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$position->info->city->id == $city->id ? 'selected':''}}>{{$city->city}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city'))
                                    <div class="help-block">{{ $errors->first('city') }}</div>
                                @endif
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.birth')}}</label>
                                <input class="form-control" type="date" name="birth" value="{{ old('birth') != '' ? old('birth') : $position->info->birth }}">
                                @if ($errors->has('birth'))
                                    <div class="help-block">{{ $errors->first('birth') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('pages.position.details.cin')}}</label>
                                <input class="form-control" type="text" name="cin" value="{{ old('cin') != '' ? old('cin') : $position->info->cin }}">
                                @if ($errors->has('cin'))
                                    <div class="help-block">{{ $errors->first('cin') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{__('pages.position.details.facial')}}</label>
                        <div id="filesinput" >
                            <!-- Our File Inputs -->
                            <div class="wrap-custom-file">
                                @if(isset($position->imgs[0]))
                                    <label  for="image1" class="covimgs" {{isset($position->imgs[0]) ? 'style=background-image:'."url(".asset("storage/".$position->imgs[0]->img).")" : '' }}>
                                        <a href="#" onClick='if(confirm("Do you remove it ??")){event.preventDefault();
                                                window.location.href ="{{route('product.destroyImg',['img'=>$position->imgs[0]->id])}}"}
                                                else event.preventDefault()'>
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </label>
                                @else
                                    <input type="file" name="img[]" id="image1" accept=".gif, .jpg, .png" />
                                    <label  for="image1" class="covimgs" {{isset($product->imgs[0]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[0]->img).")" : '' }}>
                                        <span>Select Image One</span>
                                        <i class="fa fa-plus-circle"></i>
                                    </label>
                                @endif
                            </div>
                            <!-- End Page Wrap -->
                        </div>
                        <small class="help-block">Max. file size: 50 MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                        @if ($errors->has('img'))
                            <div class="help-block">{{ $errors->first('img') }}</div>
                        @endif
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary btn-lg">{{__('pages.position.details.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop