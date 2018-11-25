@extends("layouts.app")
@section('title')
    {{__('pages.product.title_index')}}
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
                <h4 class="page-title">{{__('pages.product.title_index')}}</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="{{URL::route('Product.create')}}" class="btn btn-primary rounded pull-right"><i class="fa fa-plus"></i> {{__('pages.product.add_product')}}</a>
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
                                    <th>ID</th>
                                    <th>{{__('pages.product.details.name')}}</th>
                                    <th>{{__('pages.product.details.ref')}}</th>
                                    <th>{{__('pages.product.details.created_at')}}</th>
                                    <th>{{__('pages.product.details.tva')}}</th>
                                    <th>{{__('pages.product.details.qte')}}</th>
                                    <th>{{__('pages.product.details.availability')}}</th>
                                    <th>{{__('pages.product.details.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($products)
                                    @foreach($products as $product)
                                        <tr>
                                            <td>PROD-{{$product->id}}</td>
                                            <td>
                                                <div class="product-det">

                                                    <img src="{{ (isset($product->imgs[0])) ? asset('storage/'.$product->imgs[0]->img) : asset('img/user.jpg') }}" alt="" >
                                                    <div class="product-desc">
                                                        <h2><a  href="{{URL::route('Product.show', ['id' => $product->id]) }}">{{$product->name}}</a> <span>{{substr($product->description,0,30)}}</span></h2>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>{{$product->ref}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>{{$product->tva === 0 ? 'exonérer' : $product->tva.'%'}}</td>
                                            <td>0</td>
                                            <td>
                                                <span class="label label-danger-border">Out of Stock</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a  href="{{URL::route('Product.edit', ['id' => $product->id]) }}"><i class="fa fa-pencil m-r-5"></i> {{__('pages.product.details.edit')}}</a></li>
                                                        <li>
                                                            <a href="#"
                                                               onclick="if(confirm('Do you remove it ??')){
                                                                       document.getElementById('delete-product{{$product->id}}').submit();
                                                                       event.preventDefault();}
                                                                       else event.preventDefault(); ">
                                                                <i class="fa fa-trash-o m-r-5"></i> {{__('pages.product.details.delete')}}
                                                            </a>
                                                            <form id="delete-product{{$product->id}}" method="post" action="{{URL::route('Product.destroy', ['id' => $product->id]) }}">
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
                                    {{__('pages.product.no_result')}}
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