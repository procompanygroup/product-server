   <!-- القسم الجانبي -->
   <aside class="col-lg-3 col-md-4">
    @if(Auth::guard('client')->check()) 
                <div class="profile-sidebar">
                    <div class="profile-header bg-info text-center p-3">
                        <img src="{{ auth()->guard('client')->user()->image_path }}" alt="User" class="rounded-circle mb-2">
                        <h5>{{ auth()->guard('client')->user()->name }}</h5>
                    </div>
                    <div class="profile-content   p-3">
                        <ul class="list-unstyled">
                            <li> <a href="{{ url($lang.'/subscribe/features') }}"><i class="bi bi-award"></i> إمتيازاتي</a></li>
                            <li> <a href="{{ url($lang,'notifications') }}"><i class="bi bi-bell"></i> الإشعارات</a></li>
                            <li> <a href="{{ url($lang,'inbox') }}"><i class="bi bi-envelope"></i> بريدي الداخلي</a></li>
                            <li> <a href="{{ url($lang,'who-like-me') }}"><i class="bi bi-person-hearts"></i> من مهتم بي</a></li>
                            <li> <a href="{{ url($lang,'myfavorite') }}"><i class="bi bi-heart"></i> قائمة الإهتمام والتجاهل</a></li>
                            <li> <a href="{{ url($lang,'who-visited-me') }}"><i class="bi bi-eye"></i> من زار بياناتي</a></li>
                            <li> <a href="{{ url($lang.'/members','image') }}"><i class="bi bi-images"></i> صور الأعضاء</a></li>
                            <li> <a href="{{ url($lang,'advance-search') }}"><i class="bi bi-search"></i> البحث المتقدم</a></li>
                            <li> <a href="{{ url($lang,'ai-search') }}"><i class="bi bi-search"></i> البحث الالي</a></li>
                            <li> <a href="{{ url($lang,'subscribe') }}"><i class="bi bi-card-checklist"></i> الباقات</a></li>
                        </ul>
                    </div>
                </div>
                @endif
            </aside>