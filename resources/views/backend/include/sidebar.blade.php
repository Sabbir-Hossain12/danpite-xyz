 <!-- partial:../../partials/_settings-panel.html -->
 <div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close typcn typcn-delete-outline"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options" id="sidebar-light-theme">
        <div class="img-ss rounded-circle bg-light border mr-3"></div>
        Light
      </div>
      <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
        <div class="img-ss rounded-circle bg-dark border mr-3"></div>
        Dark
      </div>
      <p class="settings-heading mt-2">HEADER SKINS</p>
      <div class="color-tiles mx-0 px-4">
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles primary"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default border"></div>
      </div>
    </div>
  </div>
<!-- partial -->
<!-- partial:../../partials/_sidebar.html -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <div class="d-flex sidebar-profile">
        <div class="sidebar-profile-image">
          <img src="{{asset('public/backend/images')}}/faces/face29.png" alt="image">
          <span class="sidebar-status-indicator"></span>
        </div>
        <div class="sidebar-profile-name">
          <p class="sidebar-name">
            {{ Auth::guard('administrator')->user()->name }}
          </p>
          <p class="sidebar-designation">
            Welcome
          </p>
        </div>
      </div>
      <div class="nav-search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
          <div class="input-group-append">
            <span class="input-group-text" id="search">
              <i class="typcn typcn-zoom"></i>
            </span>
          </div>
        </div>
      </div>
      <p class="sidebar-menu-title">Dash menu</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/administrator/dashboard')}}">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Dashboard <span class="badge badge-primary ml-3">New</span></span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#administrator" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-user-add-outline menu-icon"></i>
          <span class="menu-title">Administrators</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="administrator">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.roles.index') }}"> Roles </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.administrators.index') }}"> Administrator </a></li>
          </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#slider" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-image-outline menu-icon"></i>
          <span class="menu-title">Sliders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="slider">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.sliders.index') }}"> Slider </a></li>
          </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-image-outline menu-icon"></i>
          <span class="menu-title">Blogs</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="blog">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.blogs.index') }}"> Blog </a></li>
          </ul>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#service_cat" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-image-outline menu-icon"></i>
          <span class="menu-title">Service Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="service_cat">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.service-category.index') }}"> Category </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.service.index') }}"> Service </a></li>
          </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#solution" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-lightbulb menu-icon"></i>
          <span class="menu-title">Solutions</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="solution">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.solutions.index') }}"> Solution </a></li>
          </ul>
        </div>
    </li>

{{--   About Us   --}}


      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#about_us" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-lightbulb menu-icon"></i>
              <span class="menu-title">About Us</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="about_us">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.aboutUs.index') }}"> About Us </a></li>
              </ul>
          </div>
      </li>


{{--WorkSteps--}}
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#workstep" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
          <span class="menu-title">Worksteps</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="workstep">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.worksteps.index') }}"> Workstep </a></li>
          </ul>
        </div>
    </li>

{{--  Banners    --}}
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#banner" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
              <span class="menu-title">Banners</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="banner">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.banners.index') }}"> Banners </a></li>
              </ul>
          </div>
      </li>

{{--Facilities--}}
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#facility" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
          <span class="menu-title">Facilities</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="facility">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.facilities.index') }}"> Facility </a></li>
          </ul>

            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.facility_images.index') }}"> Facility Images</a></li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#client" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
          <span class="menu-title">Clients</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="client">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.clients.index') }}"> Client </a></li>
          </ul>
        </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#project" aria-expanded="false" aria-controls="auth">
        <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
        <span class="menu-title">Projects</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="project">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.projectcategories.index') }}"> Category </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.projects.index') }}"> Project </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
          <span class="menu-title">Faq</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="faq">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.faqs.index') }}"> Faq </a></li>
          </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.faq_consult_images.index') }}"> Faq and Consult Images </a></li>
            </ul>
        </div>
    </li>

{{--   Appointment   --}}

      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#appointment" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
              <span class="menu-title">Appointment</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="appointment">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.appointments.index') }}"> Appointment </a></li>
              </ul>
          </div>
      </li>
{{--    Pricing  --}}
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#pricing" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>
              <span class="menu-title">Pricing</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="pricing">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.pricinginfos.index') }}"> Pricing Info </a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.paintingcosts.index') }}"> Package </a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.paintingtypes.index') }}"> Package Type </a></li>
              </ul>
          </div>
      </li>



{{--      <li class="nav-item">--}}
{{--          <a class="nav-link" data-toggle="collapse" href="#painting" aria-expanded="false" aria-controls="auth">--}}
{{--              <i class="typcn typcn-arrow-maximise-outline menu-icon"></i>--}}
{{--              <span class="menu-title">Painting</span>--}}
{{--              <i class="menu-arrow"></i>--}}
{{--          </a>--}}
{{--          <div class="collapse" id="painting">--}}
{{--              <ul class="nav flex-column sub-menu">--}}
{{--                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.paintingtypes.index') }}">Painting Type</a></li>--}}
{{--                  <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.paintingcosts.index') }}">Painting Cost</a></li>--}}
{{--              </ul>--}}
{{--          </div>--}}
{{--      </li>--}}



    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="typcn typcn-briefcase menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="typcn typcn-film menu-icon"></i>
        <span class="menu-title">Form elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="../../pages/forms/basic_elements.html">Basic Elements</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="typcn typcn-chart-pie-outline menu-icon"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../../pages/charts/chartjs.html">ChartJs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="typcn typcn-th-small-outline menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../../pages/tables/basic-table.html">Basic table</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="typcn typcn-compass menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../../pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="typcn typcn-globe-outline menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../pages/documentation/documentation.html">
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#wesettings" aria-expanded="false" aria-controls="error">
          <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">Web Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="wesettings">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('administrator.websettings.index') }}">Websetting</a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
    </li>

  </ul>

</nav>
