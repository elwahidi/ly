@extends("layouts.app")
@section('page-title')
    {{ $company->info_box->name }}
@stop
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-7">
                <h4 class="page-title">{{ $company->info_box->name }}</h4>
            </div>
        </div>
        <!-- CARD info_box and premium -->
        <div class="card-box m-b-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="{{ ($company->info_box->brand) ? asset('uploads/' . $company->info_box->brand) : asset('img/brand/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0">{{ $company->info_box->name }}</h3>
                                        <h5 class="company-role m-t-0 m-b-0">{{ 'patent: ' . $company->info_box->licence }}</h5>
                                        <small class="text-muted">{{ 'Taxes: ' . $company->info_box->taxes . '%' }}</small>
                                        <div class="staff-id">{{ 'turnover: ' . $company->info_box->turnover . ' MAD' }}</div>
                                        <div class="text-primary">{{ 'sold: ' . $company->premium->sold }}</div>
                                        <div class="text-primary">{{ 'range: ' . $company->premium->range }}</div>
                                        <div class="text-success">{{ 'status: ' . ucfirst($company->premium->status->status) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h3>{{ ucfirst(__('contact')) }}</h3>
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">{{ __('validation.attributes.phone') }} :</span>
                                            <span class="text"><a href="#">{{ $company->info_box->tels[0]->tel }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('validation.attributes.speaker') }} :</span>
                                            <span class="text"><a href="#">{{ $company->info_box->speaker }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('validation.attributes.email') }} :</span>
                                            <span class="text"><a href="#">{{ $company->info_box->emails[0]->email }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('validation.attributes.address') }} :</span>
                                            <span class="text">
                                                {{ $company->info_box->address . ', immeuble N° ' . $company->info_box->build . ', '}}{{ ($company->info_box->floor) ? 'étage: ' . $company->info_box->floor . ', ' : '' }}{{($company->info_box->apt_nbr) ? 'Porte N°: ' . $company->info_box->apt_nbr.' ,' : '' }}
                                                {{ ($company->info_box->zip) ? $company->info_box->zip . ', ' : ''}}{{ $company->info_box->city->city }}</span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('updated_at') }} :</span>
                                            <span class="text">{{ $company->updated_at->format('d-m-Y') . ' à ' . $company->updated_at->format('H:i:s') }}</span>
                                        </li>
                                        <li>
                                            <span class="title">{{ __('created_at') }} :</span>
                                            <span class="text">{{ $company->created_at->format('d-m-Y') . ' à ' . $company->created_at->format('H:i:s') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
