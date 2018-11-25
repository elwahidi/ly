@extends("layouts.app")
@section('title')
    {{__('pages.product.title_show')}}
@stop
@section('content')
    @push('custom-styles')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/light-gallery/css/lightgallery.min.css')}}">
    @endpush

    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-7">
                <h4 class="page-title">{{__('pages.product.title_show')}}</h4>
            </div>
            <div class="col-xs-5 text-right m-b-30">
                <form id="delete-product{{$product->id}}" method="post" action="{{URL::route('Product.destroy', ['id' => $product->id]) }}">
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                </form>
                <a href="#"
                        onclick="if(confirm('Do you remove it ??')){
                        document.getElementById('delete-product{{$product->id}}').submit();
                        event.preventDefault();} else event.preventDefault();"
                        class="btn btn-danger rounded ">
                        <i class="fa fa-plus"></i>  {{__('pages.product.details.delete')}}
                </a>
                <a href="{{URL::route('Product.edit', ['id' => $product->id]) }}" class="btn btn-primary rounded "><i class="fa fa-plus"></i>
                {{__('pages.product.details.edit')}}
            </a>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="product-view">
                        <div class="proimage-wrap">
                            <div class="pro-image" id="pro_popup">
                                <a href="/{{(isset($product->imgs[0])) ? asset('storage/'.$product->imgs[0]->img) : asset('img/user.jpg') }}">
                                    <img class="img-responsive" src="{{(isset($product->imgs[0])) ? asset('storage/'.$product->imgs[0]->img) : asset('img/user.jpg') }}" alt="">
                                </a>
                            </div>
                            <ul class="proimage-thumb">
                                @foreach($product->imgs as $img)
                                    <li>
                                        <a href="{{asset('storage/'.$img->img)}}"><img src="{{asset('storage/'.$img->img)}}" alt=""></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="product-info">
                        <h2>{{$product->name}}</h2>
                        <p>{{__('pages.product.details.id')}}: PRO-{{$product->id}}</p>
                        <p><b>{{__('pages.product.details.description')}}:</b> {{$product->description}}</p>
                        <p><b>{{__('pages.product.details.created_at')}}:</b> {{$product->created_at}}</p>
                        <p><b>{{__('pages.product.details.tva')}}:</b> {{$product->tva === 0 ? 'exonérer' : $product->tva.'%'  }}</p>
                        <p><b>{{__('pages.product.details.qte')}}:</b> 0</p>
                        <p><b>{{__('pages.product.details.availability')}}:</b> <span class="text-danger">{{__('pages.product.details.out_stock')}}</span></p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class=""><a href="#product_desc" data-toggle="tab" aria-expanded="false">Laste Bays</a></li>
                        <li class="active"><a href="#product_reviews" data-toggle="tab" aria-expanded="true">Last Sales</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="product_desc">
                            <div class="product-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <blockquote>
                                    <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p>
                                </blockquote>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                            </div>
                        </div>
                        <div class="tab-pane active" id="product_reviews">
                            <div class="product-reviews">
                                <h3>Orders (3)</h3>
                                <ul class="review-list">
                                    <li>
                                        <div class="review">
                                            <div class="review-author">
                                                <img class="avatar" alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="review-block">
                                                <div class="review-by">
                                                    <span class="review-author-name">Diana Bailey</span>
                                                    <div class="rating">
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
                                                <span class="review-date">December 6, 2017</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="review">
                                            <div class="review-author">
                                                <img class="avatar" alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="review-block">
                                                <div class="review-by">
                                                    <span class="review-author-name">Marie Wells</span>
                                                    <div class="rating">
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <span class="review-date">December 11, 2017</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="review">
                                            <div class="review-author">
                                                <img class="avatar" alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="review-block">
                                                <div class="review-by">
                                                    <span class="review-author-name">Pamela Curtis</span>
                                                    <div class="rating">
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <span class="review-date">December 13, 2017</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="all-reviews">
                                    <button type="button" class="btn btn-primary">View All Reviews</button>
                                </div>
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