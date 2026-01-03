 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="{{ route('dashboard.home') }}" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img src="{{ asset('assets/img/logo.png') }}" width="40px" class="img-fluid" alt=""
                     srcset="">
             </span>
             <span class=" menu-text fw-bolder ms-2">SPK-KDRT</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
             <a href="{{ route('dashboard.home') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
             </a>
         </li>


         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'kriteria') active @endif">
             <a href="{{ route('dashboard.kriteria') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-box"></i>
                 <div data-i18n="Analytics">Kriteria</div>
             </a>
         </li>


         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'alternatif') active @endif">
             <a href="{{ route('dashboard.alternatif') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-info-square"></i>
                 <div data-i18n="Analytics">Alternatif</div>
             </a>
         </li>





         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengaduan') active @endif">
             <a href="{{ route('dashboard.pengaduan') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-file"></i>
                 <div data-i18n="Analytics">Pengaduan</div>
             </a>
         </li>

         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'nilai') active @endif">
             <a href="{{ route('dashboard.nilai') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-file"></i>
                 <div data-i18n="Analytics"> Nilai Pengaduan</div>
             </a>
         </li>



         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'petugas') active @endif">
             <a href="{{ route('dashboard.petugas') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-user"></i>
                 <div data-i18n="Analytics">Petugas</div>
             </a>
         </li>

         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pendampingan') active @endif">
             <a href="{{ route('dashboard.pendampingan') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-message"></i>
                 <div data-i18n="Analytics">Pendampingan</div>
             </a>
         </li>


         <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'rekomendasi') active @endif">
             <a href="{{ route('dashboard.rekomendasi') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-star"></i>
                 <div data-i18n="Analytics">Rekomendasi</div>
             </a>
         </li>

          <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengajuan') active @endif">
             <a href="{{ route('dashboard.pengajuan') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-star"></i>
                 <div data-i18n="Analytics">Pengajuan </div>
             </a>
         </li>



         <li class="menu-item ">
             <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-door-open"></i>
                 <div data-i18n="Analytics">Keluar </div>
             </a>
         </li>


         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>


     </ul>
 </aside>
 <!-- / Menu -->
