<style>
    #duzen {
        width: 20px;
        height: 20px;
        background-color: #34495E !important;
        margin-left: -10px;
        border-radius: 5px;
        color: white;
        font-size: 15px;
        font-weight: bolder;
        padding-left: 4px !important;
        padding-top: 2px !important;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }
</style>
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="fas fa-qrcode fa-lg fa-fw"></i>
            <span class="hide-menu">QR MENU SAYFASI</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('anasayfa') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-dark">
                        <i class="fa fa-qrcode" aria-hidden="true"></i>
                    </span>
                </span>
                <span class="hide-menu">Siteye Git</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">KATEGORİLER</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('categoryPage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-dark">
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                </span>
                <span class="hide-menu">Kategoriler</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('CreateCategoryPage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-danger">
                        <i class="ti ti-layout-dashboard"></i>
                    </span><sup>

                        <small>
                            <span class=" pr-2" id="duzen" style="; ">
                                <i class="fa fa-plus mr-1" aria-hidden="true" style=""></i>
                            </span>
                        </small>
                    </sup>
                </span>
                <span class="hide-menu">Kategori Ekle </span>
            </a>
        </li>
        <li class="nav-small-cap">
            <img src="{{ asset('assets/images/menu.png') }}" width="25" />
            <span class="hide-menu">MENULER</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('AllMenuPage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-success">
                        <i class="fa fa-list mr-1" aria-hidden="true"></i>
                    </span>
                </span>
                <span class="hide-menu">Menuleri Listele</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('MenuCreatePage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-primary">
                        <i class="fa fa-list mr-1" aria-hidden="true"></i>
                    </span><sup>

                        <small>
                            <span class=" pr-2" id="duzen" style="; ">
                                <i class="fa fa-plus mr-1" aria-hidden="true" style=""></i>
                            </span>
                        </small>
                    </sup>
                </span>
                <span class="hide-menu">Menu Oluştur</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('AllPriceUpdatePage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-danger">
                        <i class="fas fa-pencil-ruler mr-1    "></i>
                    </span>

                </span>
                <span class="hide-menu">Toplu Fiyat Güncelle</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="fa fa-cogs mr-1" aria-hidden="true"></i>
            <span class="hide-menu">AYARLAR</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('settingsPage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-warning">
                        <i class="fa fa-cog mr-1" aria-hidden="true"></i>
                    </span>
                </span>
                <span class="hide-menu">Genel Ayarlar</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('SliderPage') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-dark">
                        <i class="fa fa-sliders " aria-hidden="true"></i>
                    </span>
                </span>
                <span class="hide-menu">Slider Ayarları</span>
            </a>
        </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('TheMostToPrefer') }}" aria-expanded="false">
                <span>
                    <span class="badge bg-dark">
                        <i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i>
                    </span>
                </span>
                <span class="hide-menu">E.Ç.T.E Listesi</span>
            </a>
        </li>
        {{-- <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-alert-circle"></i>
                      </span>
                      <span class="hide-menu">Alerts</span>
                  </a>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-cards"></i>
                      </span>
                      <span class="hide-menu">Card</span>
                  </a>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-file-description"></i>
                      </span>
                      <span class="hide-menu">Forms</span>
                  </a>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-typography"></i>
                      </span>
                      <span class="hide-menu">Typography</span>
                  </a>
              </li>
              <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">AUTH</span>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-login"></i>
                      </span>
                      <span class="hide-menu">Login</span>
                  </a>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-user-plus"></i>
                      </span>
                      <span class="hide-menu">Register</span>
                  </a>
              </li>
              <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">EXTRA</span>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-mood-happy"></i>
                      </span>
                      <span class="hide-menu">Icons</span>
                  </a>
              </li>
              <li class="sidebar-item">
                  <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                      <span>
                          <i class="ti ti-aperture"></i>
                      </span>
                      <span class="hide-menu">Sample Page</span>
                  </a>
              </li> --}}
    </ul>
</nav>
