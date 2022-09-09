<aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/dashboard" title="Sleek Dashboard">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33">
                  <g fill="none" fill-rule="evenodd">
                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>

                <span class="brand-name text-truncate">Admin Dashboard</span>
              </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub active expand">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                    aria-expanded="false" aria-controls="dashboard">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text">HOME</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="active">
                        <a class="sidenav-item-link" href="{{route ('home.slider')}}">
                          <span class="nav-text">Slider</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{route('all.about')}}">
                          <span class="nav-text">Home About</span>
                          <span class="badge badge-success">new</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('multi.image') }}">
                          <span class="nav-text">Home Portofolio</span>
                          <span class="badge badge-success">new</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="{{route ('all.brand')}}">
                          <span class="nav-text">Home Brand</span>
                          <span class="badge badge-success">new</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="{{route('roles.index')}}">
                    <span class="nav-text">Manage Role</span>
                  </a>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="{{route('users.index')}}">
                    <span class="nav-text">Manage User</span>
                  </a>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="{{ route('products.index') }}">
                    <span class="nav-text">Manage Product</span>
                  </a>
                </li>
                <!-- <li class="has-sub ">
                  <a class="sidenav-item-link" href="{{ route('product.index') }}">
                    <span class="nav-text">Api Product</span>
                  </a> -->
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="{{ route('csv.view') }}">
                    <span class="nav-text">CSV File</span>
                  </a>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
                    aria-expanded="false" aria-controls="app">
                    <i class="mdi mdi-pencil-box-multiple"></i>
                    <span class="nav-text">CONTACT PAGE</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="app" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route ('admin.contact')}}">
                          <span class="nav-text">Contact Profile</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="{{ route('admin.messages') }}">
                          <span class="nav-text">Contact Message</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <!-- <li class="section-title">
                  UI Elements
                </li> -->

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
                    aria-expanded="false" aria-controls="components">
                    <i class="mdi mdi-folder-multiple-outline"></i>
                    <span class="nav-text">CHARTS</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="components" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="alert.html">
                          <span class="nav-text">Alert</span>
                        </a>
                      </li>
                      <li class="has-sub ">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#buttons"
                          aria-expanded="false" aria-controls="buttons">
                          <span class="nav-text">Buttons</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse " id="buttons">
                          <div class="sub-menu">
                            <li class="">
                              <a href="button-default.html">Button Default</a>
                            </li>
                           <li class="">
                              <a href="button-loading.html">Button Loading</a>
                            </li>
                          </div>
                        </ul>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="tab.html">
                          <span class="nav-text">Tab</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                    aria-expanded="false" aria-controls="icons">
                    <i class="mdi mdi-diamond-stone"></i>
                    <span class="nav-text">PAGES</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="icons" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="material-icon.html">
                          <span class="nav-text">Material Icon</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="flag-icon.html">
                          <span class="nav-text">Flag Icon</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms"
                    aria-expanded="false" aria-controls="forms">
                    <i class="mdi mdi-email-mark-as-unread"></i>
                    <span class="nav-text">Forms</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="forms" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="basic-input.html">
                          <span class="nav-text">Basic Input</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="checkbox-radio.html">
                          <span class="nav-text">Checkbox & Radio</span>
                        </a>
                      </li>
                      <li class="">
                        <a class="sidenav-item-link" href="form-advance.html">
                          <span class="nav-text">Form Advance</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#maps"
                    aria-expanded="false" aria-controls="maps">
                    <i class="mdi mdi-google-maps"></i>
                    <span class="nav-text">Maps</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="maps" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="">
                        <a class="sidenav-item-link" href="google-map.html">
                          <span class="nav-text">Google Map</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="vector-map.html">
                          <span class="nav-text">Vector Map</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                    aria-expanded="false" aria-controls="pages">
                    <i class="mdi mdi-image-filter-none"></i>
                    <span class="nav-text">Pages</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="pages" data-parent="#sidebar-menu">
                    <div class="sub-menu ">
                      <li class="">
                        <a class="sidenav-item-link" href="user-profile.html">
                          <span class="nav-text">User Profile</span>
                        </a>
                      </li>

                      <li class="has-sub ">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#authentication"
                          aria-expanded="false" aria-controls="authentication">
                          <span class="nav-text">Authentication</span> <b class="caret"></b>
                        </a>

                        <ul class="collapse " id="authentication">
                          <div class="sub-menu">
                            <li class="">
                              <a href="sign-in.html">Sign In</a>
                            </li>

                           <li class="">
                              <a href="sign-up.html">Sign Up</a>
                            </li>
                          </div>
                        </ul>
                      </li>
                    </div>
                  </ul>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation"
                    aria-expanded="false" aria-controls="documentation">
                    <i class="mdi mdi-book-open-page-variant"></i>
                    <span class="nav-text">Documentation</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="documentation" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="section-title">
                        Getting Started
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="introduction.html">
                          <span class="nav-text">Introduction</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="quick-start.html">
                          <span class="nav-text">Quick Start</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="customization.html">
                          <span class="nav-text">Customization</span>
                        </a>
                      </li>

                      <li class="section-title">
                        Layouts
                      </li>

                      <li class="has-sub ">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#header-variations" aria-expanded="false" aria-controls="header-variations">
                          <span class="nav-text">Header Variations</span> <b class="caret"></b>
                        </a>

                        <ul class="collapse " id="header-variations">
                          <div class="sub-menu">
                            <li class="">
                              <a href="header-fixed.html">Header Fixed</a>
                            </li>

                            <li class="">
                              <a href="header-static.html">Header Static</a>
                            </li>

                            <li class="">
                              <a href="header-light.html">Header Light</a>
                            </li>

                            <li class="">
                              <a href="header-dark.html">Header Dark</a>
                            </li>
                          </div>
                        </ul>
                      </li>

                      <li class="has-sub ">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#sidebar-variations" aria-expanded="false" aria-controls="sidebar-variations">
                          <span class="nav-text">Sidebar Variations</span> <b class="caret"></b>
                        </a>

                        <ul class="collapse " id="sidebar-variations">
                          <div class="sub-menu">
                            <li class="">
                              <a href="sidebar-fixed-default.html">Sidebar Fixed Default</a>
                            </li>

                            <li class="">
                              <a href="sidebar-fixed-minified.html">Sidebar Fixed Minified</a>
                            </li>

                            <li class="">
                              <a href="sidebar-fixed-offcanvas.html">Sidebar Fixed Offcanvas</a>
                            </li>

                            <li class="">
                              <a href="sidebar-static-default.html">Sidebar Static Default</a>
                            </li>

                            <li class="">
                              <a href="sidebar-static-minified.html">Sidebar Static Minified</a>
                            </li>

                            <li class="">
                              <a href="sidebar-static-offcanvas.html">Sidebar Static Offcanvas</a>
                            </li>

                            <li class="">
                              <a href="sidebar-with-footer.html">Sidebar With Footer</a>
                            </li>

                            <li class="">
                              <a href="sidebar-without-footer.html">Sidebar Without Footer</a>
                            </li>

                            <li class="">
                              <a href="right-sidebar.html">Right Sidebar</a>
                            </li>
                          </div>
                        </ul>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="rtl.html">
                          <span class="nav-text">RTL Direction</span>
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

                <!-- <li class="section-title">
                  Documentation
                </li> -->
              </ul>
            </div>


          </div>
        </aside>