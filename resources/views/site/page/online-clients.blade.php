@extends('site.layouts.home-signed.layout')
@section('content')
    <div class="container-fluid mt-3 pt-3">
        <div class="row">
            <!-- القسم الجانبي -->
            @include('site.content.profile-sidebar')

            <!-- قسم تعديل البيانات -->
            <section class=" content-sec col-lg-7 col-md-6">

                <div class="page-head p-3 ">
                    @if (isset($type))
                        @if ($type == 'new')
                            <h3>أعضاء جدد : {{ $genderTrans }} </h3>
                        @elseif($type == 'online')
                            <h3> المتواجدون الان : {{ $genderTrans }} </h3>
                        @elseif($type == 'health')
                            <h3>الحالات الصحية : {{ $genderTrans }} </h3>
                            @elseif($type == 'special')
                            <h3> الأعضاء المتميزون : {{ $genderTrans }} </h3>
                            @elseif($type == 'images')
                            <h3>صور الاعضاء  : {{ $genderTrans }} </h3>
                        @endif
                    @else
                        <h3> الاعضاء</h3>
                    @endif
                    @if($type =='health')
                    <div class="page-options">
                        <div>
                            <p class="page-desc" style="min-width:165px"></p>
                        </div>
                        <form action="{{url($lang.'/members','health-cases')}}" id="form-search" name="form-search" method="post" >
                            @csrf
                        <div class="filter">                        
                                <div class="select--alt">
                                    <div class="dropdown bootstrap-select std_select">
                                        <select class="btn btn-sm select-outline-danger select-btn std_select mobile-device search-select" name="residence">
                                            <option value="0" @if(isset($residence_id) && $residence_id==0) @selected(true) @endif>كل الدول</option>                                            
                                            @foreach ($prop_group['countries'] as $country)
                                                <option value="{{ $country->id }}" @if(isset($residence_id) && $residence_id==$country->id) @selected(true) @endif >{{ $country->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="select--alt">
                                    <div class="dropdown bootstrap-select healthCase std_select">
                                        <select  class="btn btn-sm select-outline-danger  select-btn std_select mobile-device search-select" name="health">
                                            <option value="" @if(isset($health_id) && $health_id==0) @selected(true) @endif>كل الحالات الصحية</option>                                            
                                            @foreach ($prop_group['health']['optionsvalues'] as $health)
                                            <option value="{{ $health['id'] }}" @if(isset($health_id) && $health_id== $health['id']) @selected(true) @endif >{{ $health['tr_title'] }}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                </div>
                      
                        </div>
                    </form>
                 </div>
                 @elseif($type == 'special')
                 <div class="page-options">
                    <div>
                        <p class="page-desc" style="min-width:165px"></p>
                    </div>
                    <form action="{{url($lang.'/members','special')}}" id="form-search" name="form-search" method="post" >
                        @csrf
                    <div class="filter">                        
                            <div class="select--alt">
                                <div class="dropdown bootstrap-select std_select">
                                    <select class="btn btn-sm select-outline-danger select-btn std_select mobile-device search-select" name="residence">
                                        <option value="0" @if(isset($residence_id) && $residence_id==0) @selected(true) @endif>كل الدول</option>                                            
                                        @foreach ($prop_group['countries'] as $country)
                                            <option value="{{ $country->id }}" @if(isset($residence_id) && $residence_id==$country->id) @selected(true) @endif >{{ $country->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                       
                  
                    </div>
                </form>
             </div>

                    @endif

                </div>
                <!--   table-->
                <div class="row members-list" style="height: auto !important;">
                    @forelse ($clients as $client)
                        <div class="col-md-6">
                            <div class="user-card user-card  is-contactable @if($client['is_blacklist']==1) blacklisted @endif" id="card-{{ $client['client']->id }}"
                                data-user-name="{{ $client['client']->name }}"  data-user-id="{{$client['client']->id }}" > 
                                @if($type == 'special')
                                <div class="corner"><img src="{{ url('assets/site/img/corner-star.svg')}}" alt="عضو مميز"  ></div>
                                @endif
                                <a  href="{{ url($lang . '/member', $client['client']->id) }}" role="link-profile">
                                    <div class="essential-data">
                                        <div class="avatar"> <img src="{{ $client['client']->image_path }}"
                                                class="avatar-female" alt="صورة العضو"> <i
                                                class="ico ico-circle user-status online"></i></div>
                                        <div class="data">
                                            <h3><span class="username" dir="auto">{{ $client['client']->name }}</span>
                                                <img src="{{ url('assets/site/img/flags/32x32/' . $client['nationality']->code . '.png') }}"
                                                    alt="{{ $client['nationality']->country_name }}">
                                            </h3>
                                            <h4> {{ $client['client']->age }} سنة من
                                                {{ $client['nationality']->country_name }} </h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="secondary-data">
                                    <div class="user-location"><i class="bi bi-geo-alt-fill"></i> <span>
                                            {{ $client['residence']->country_name }} /
                                            {{ $client['residence']->city_name }} </span></div>
                                    <div class="user-marital-status"> <span>
                                            @if ($client['client']->gender == 'male')
                                                {{ $client['family_status']->option_name }}
                                            @else
                                                {{ $client['family_status_female']->option_name }}
                                            @endif
                                        </span></div>
                                </div>
                                <div class="more-data">
                                    <div class="user-last-login"> </div>
                                    <div class="user-options">
                                        <ul>
                                           @if(Auth::guard('client')->check())
                                           <li><span class="profile-visited" title="لقد زرت هذا الملف سابقا"></span></li>
                                           <li><button class="btn btn-primary btn-send-message" 
                                                   data-user-name="{{ $client['client']->name }}"   data-user-id="{{$client['client']->id }}"
                                                   data-user-premium="" data-user-last-login="" data-user-favorited="0"
                                                   data-user-blacklisted="0" data-user-disabled="0"
                                                   data-user-contactability="1" title="أرسل رسالة"><i
                                                       class="fas fa-comments"></i></button></li>
                                           <li> 
                                               <button class="btn btn-outline-light @if($client['is_favorite']==1) btn-remove-from-favorite @else  btn-add-to-favorite @endif"
                                                  @if($client['is_blacklist']==1) style="display:none; "@endif
                                                  data-toggle="modal" data-target="#favoriteModal"
                                               data-user-favorite="{{$client['is_favorite']}}"
                                                   title="@if($client['is_favorite']==1) مهتم @else إضافة للإهتمام @endif "><i class="fas fa-heart"></i></button> </li>
                                           <li>
                                               <button class="btn btn-outline-light btn-remove-from-blacklist"
                                             data-toggle="modal" data-target="#favoriteModal"
                                                     data-user-blacklist="{{$client['is_blacklist']}}"
                                                   title="لقد تجاهلت هذا العضو"><i class="fas fa-ban"></i></button></li>
                                      
                                            @else
                                            <li><span class="profile-visited" title="لقد زرت هذا الملف سابقا"></span></li>
                                            <li><button class="btn btn-primary  not-register"  data-user-contactability="1" title="أرسل رسالة"><i class="fas fa-comments"></i></button></li>
                                            <li> 
                                                <button class="btn btn-outline-light btn-add-to-favorite not-register"  title="  إضافة للإهتمام "><i class="fas fa-heart"></i></button> </li>
                                            @endif
                                             </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                        <div class="col-sm-12 text-center" style="background-color:white;padding:5px;">
                            <span class="user-residency" dir="auto"> لايوجد نتائج</span>
                        </div>
                    @endforelse

                </div>


            </section>
        </div>
    </div>
    @include('site.page.sub-all.fave-modal')
@endsection
@section('js')
    <script>
        // var fail_msg = "لم يتم الحفظ";
     var favurl="{{ url('favorite') }}";
     var blackurl="{{ url('blacklist') }}";
</script>
    <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/validate.js') }}"></script>

    <script src="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ url('assets/site/js/custom/health-search.js') }}"></script>  
    <script src="{{ url('assets/site/js/custom/members-cards.js') }}"></script>
@endsection
@section('css')
    <link href="{{ url('assets/site/bootstrap/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/srch-result.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/slide-range.css') }}" rel="stylesheet">
    <link href="{{ url('assets/site/css/custom/member.css') }}" rel="stylesheet">
@endsection
