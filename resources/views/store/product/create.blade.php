@extends("layouts.app")
@section('title')
    {{__('pages.product.title_create')}}
@stop
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4 class="page-title">{{__('pages.product.title_create')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="/Product" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                        <label>{{__('pages.product.details.name')}}</label>
                        <input class="form-control " type="text" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="help-block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('ref') ? 'has-error' :'' }}">
                        <label>{{__('pages.product.details.ref')}}</label>
                        <input class="form-control" type="text" name="ref" value="{{ old('ref') }}">
                        @if ($errors->has('ref'))
                            <div class="help-block">{{ $errors->first('ref') }}</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('tva') ? 'has-error' :'' }}">
                                <label>{{__('pages.product.details.tva')}} %</label>
                                <select name="tva" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option>---</option>
                                    <option value="0">{{__('pages.product.details.tva_0')}}</option>
                                    <option value="7">7%</option>
                                    <option value="10">10%</option>
                                    <option value="14">14%</option>
                                    <option value="20">20%</option>
                                </select>
                                @if ($errors->has('tva'))
                                    <div class="help-block">{{ $errors->first('tva') }}</div>
                                @endif
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('size') ? 'has-error' :'' }}">
                                <label>{{__('pages.product.details.size')}}</label>
                                <input class="form-control" type="text" name="size" value="{{ old('size') }}">
                                @if ($errors->has('size'))
                                    <div class="help-block">{{ $errors->first('size') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('pages.product.details.images')}}</label>
                        <div id="filesinput" >
                            <!-- Our File Inputs -->
                            <div class="wrap-custom-file">
                                <input type="file" name="img[]" id="image1" accept=".gif, .jpg, .png" />
                                <label  for="image1">
                                    <span>Select Image One</span>
                                    <i class="fa fa-plus-circle"></i>
                                </label>
                            </div>

                            <div class="wrap-custom-file">
                                <input type="file" name="img[]" id="image2" accept=".gif, .jpg, .png" />
                                <label  for="image2">
                                    <span>Select Image Two</span>
                                    <i class="fa fa-plus-circle"></i>
                                </label>
                            </div>

                            <div class="wrap-custom-file">
                                <input type="file" name="img[]" id="image3" accept=".gif, .jpg, .png" />
                                <label  for="image3">
                                    <span>Select Image Three</span>
                                    <i class="fa fa-plus-circle"></i>
                                </label>
                            </div>

                            <div class="wrap-custom-file">
                                <input type="file" name="img[]" id="image4" accept=".gif, .jpg, .png" />
                                <label  for="image4">
                                    <span>Select Image Four</span>
                                    <i class="fa fa-plus-circle"></i>
                                </label>
                            </div>
                            <!-- End Page Wrap -->
                        </div>
                        <small class="help-block">{{__('pages.product.details.images_alert')}}</small>
                        @if ($errors->has('img'))
                            <div class="help-block">{{ $errors->first('img') }}</div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                        <label>{{__('pages.product.details.description')}}</label>
                        <textarea cols="30" rows="6" class="form-control" name="description" >{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="help-block">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary btn-lg">{{__('pages.product.details.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

