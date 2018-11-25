@extends("layouts.app")
@section('title')
    {{__('pages.product.title_edit')}}
@stop
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4 class="page-title">{{__('pages.product.title_edit')}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{URL::route('Product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                        <label>{{__('pages.product.details.name')}}</label>
                        <input class="form-control " type="text" name="name" value="{{ old('name') != '' ? old('name') : $product->name }}">
                        @if ($errors->has('name'))
                            <div class="help-block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('ref') ? 'has-error' :'' }}">
                        <label>{{__('pages.product.details.ref')}}</label>
                        <input class="form-control" type="text" name="ref" value="{{ old('ref') != '' ? old('ref') : $product->ref }}">
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
                                    <option value="0"  {{$product->tva == 0 ? 'selected':''}}>exonérer</option>
                                    <option value="7"  {{$product->tva == 7 ? 'selected':''}}>7%</option>
                                    <option value="10" {{$product->tva == 10 ? 'selected':''}}>10%</option>
                                    <option value="14" {{$product->tva == 14 ? 'selected':''}}>14%</option>
                                    <option value="20" {{$product->tva == 20 ? 'selected':''}}>20%</option>
                                </select>
                                @if ($errors->has('tva'))
                                    <div class="help-block">{{ $errors->first('tva') }}</div>
                                @endif
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('size') ? 'has-error' :'' }}">
                                <label>{{__('pages.product.details.size')}}</label>
                                <input class="form-control" type="text" name="size" value="{{ old('size') != '' ? old('size') : $product->size }}">
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
                                @if(isset($product->imgs[0]))
                                    <label  for="image1" class="covimgs" {{isset($product->imgs[0]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[0]->img).")" : '' }}>
                                        <a href="#" onClick='if(confirm("Do you remove it ??")){event.preventDefault();
                                                window.location.href ="{{route('product.destroyImg',['img'=>$product->imgs[0]->id])}}"}
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

                            <div class="wrap-custom-file">
                                @if(isset($product->imgs[1]))
                                    <label  for="image2" class="covimgs" {{isset($product->imgs[1]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[1]->img).")" : '' }}>
                                        <a href="#" onClick='if(confirm("Do you remove it ??")){event.preventDefault();
                                                window.location.href ="{{route('product.destroyImg',['img'=>$product->imgs[1]->id])}}"}
                                                else event.preventDefault()'>
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </label>
                                @else
                                    <input type="file" name="img[]" id="image2" accept=".gif, .jpg, .png" />
                                    <label  for="image2" class="covimgs" {{isset($product->imgs[1]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[1]->img).")" : '' }}>
                                        <span>Select Image One</span>
                                        <i class="fa fa-plus-circle"></i>
                                    </label>
                                @endif
                            </div>

                            <div class="wrap-custom-file">
                                @if(isset($product->imgs[2]))
                                    <label  for="image3" class="covimgs" {{isset($product->imgs[2]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[2]->img).")" : '' }}>
                                        <a href="#" onClick='if(confirm("Do you remove it ??")){event.preventDefault();
                                                window.location.href ="{{route('product.destroyImg',['img'=>$product->imgs[2]->id])}}"}
                                                else event.preventDefault()'>
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </label>
                                @else
                                    <input type="file" name="img[]" id="image3" accept=".gif, .jpg, .png" />
                                    <label  for="image3" class="covimgs" {{isset($product->imgs[2]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[2]->img).")" : '' }}>
                                        <span>Select Image One</span>
                                        <i class="fa fa-plus-circle"></i>
                                    </label>
                                @endif
                            </div>

                            <div class="wrap-custom-file">
                                @if(isset($product->imgs[3]))
                                    <label  for="image4" class="covimgs" {{isset($product->imgs[3]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[3]->img).")" : '' }}>
                                        <a href="#" onClick='if(confirm("Do you remove it ??")){event.preventDefault();
                                                window.location.href ="{{route('product.destroyImg',['img'=>$product->imgs[3]->id])}}"}
                                                else event.preventDefault()'>
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </label>
                                @else
                                    <input type="file" name="img[]" id="image4" accept=".gif, .jpg, .png" />
                                    <label  for="image4" class="covimgs" {{isset($product->imgs[3]) ? 'style=background-image:'."url(".asset("storage/".$product->imgs[3]->img).")" : '' }}>
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
                    <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                        <label>{{__('pages.product.details.description')}}</label>
                        <textarea cols="30" rows="6" class="form-control" name="description" >{{ old('description') != '' ? old('description') : $product->description }}</textarea>
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
