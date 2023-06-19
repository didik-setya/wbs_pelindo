<?php $user = get_member(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title><?= $title ?></title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/web/dashboard') ?>/dist/css/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/web/dashboard') ?>/assets/libs/toastr/build/toastr.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/web/dashboard') ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"/>

    <script src="<?= base_url('assets/web/dashboard') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets/web/dashboard') ?>/assets/libs/toastr/build/toastr.min.js"></script>
    <script src="<?= base_url('assets/web/dashboard') ?>/assets/extra-libs/DataTables/datatables.min.js"></script>

    
    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1500",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    </script>

    <style>
      .modal.fade.show {
        backdrop-filter: blur(5px);
      }
    </style>

  </head>

  <body>
    
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="<?= base_url('master') ?>">
              <b class="logo-icon ps-2">
                <img
                  src="<?= base_url('assets/web/pelindo_logo.png') ?>"
                  alt="homepage"
                  class="light-logo"
                  width="25"
                />
              </b>
              <span class="logo-text ms-2">
                <img
                  src="<?= base_url('assets/web/pelindo_title.png') ?>"
                  alt="homepage"
                  class="light-logo" width="70%"
                />
              </span>
              
            </a>
            
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
             
            </ul>
            <ul class="navbar-nav float-end">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-bell font-24"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle waves-effect waves-dark"
                  href="#"
                  id="2"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="font-24 mdi mdi-comment-processing"></i>
                </a>
                <ul
                  class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    animated
                    bounceInDown
                  "
                  aria-labelledby="2"
                >
                  <ul class="list-style-none">
                    <li>
                      <div class="">
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-success btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-calendar text-white fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Event today</h5>
                              <span class="mail-desc"
                                >Just a reminder that event</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-info btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-settings fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Settings</h5>
                              <span class="mail-desc"
                                >You can customize this template</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-primary btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-account fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Pavan kumar</h5>
                              <span class="mail-desc"
                                >Just see the my admin!</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-danger btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-link fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Luanch Admin</h5>
                              <span class="mail-desc"
                                >Just see the my new admin!</span
                              >
                            </div>
                          </div>
                        </a>
                      </div>
                    </li>
                  </ul>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="<?= base_url('assets/img-user/') . $user->img ?>"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                  <?= $user->nama ?>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
                  >
                 
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-settings me-1 ms-1"></i> Account
                    Setting</a
                  >
                  <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                  >
                 
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="<?= base_url('master') ?>"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>

              <?php
              $menu = get_menu();
              foreach($menu as $m){ ?>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="<?= base_url() . $m->link ?>"
                  aria-expanded="false"
                  >
                  <?= $m->icon; ?> 
                  <span class="hide-menu"><?= $m->menu; ?></span></a
                >
              </li>
              <?php } ?>
            
              
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      
      <div class="page-wrapper">
        <div class="container-fluid">
            <!-- content -->
            <?php $this->load->view($view) ?>
        </div>
        
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        
      </div>
      
    </div>
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/web/dashboard') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url('assets/web/dashboard') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('assets/web/dashboard') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/web/dashboard') ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/web/dashboard') ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/web/dashboard') ?>/dist/js/custom.min.js"></script>
  </body>
</html>
