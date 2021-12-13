<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>YamiFood Dashbaord - {{ $title }}</title>

    <!-- vendor css -->
    <link href="{{ asset('dashboard_assets') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets') }}/lib/chartist/chartist.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/css/bracket.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="{{ url('/home') }}"><span style="color: tomato;">Yami</span><span style="color: orange;">Food</span></a></div>
    <div class="br-sideleft overflow-y-auto">

      <div class="br-sideleft-menu mt-4">
        <a href="{{ url('/home') }}" class="br-menu-link @yield('dashboard')">
          <div class="br-menu-item">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ url('/') }}" target="_blank" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-home"></i>
            <span class="menu-item-label">Visit Website</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ url('/mail/box') }}" class="br-menu-link @yield('mailbox')">
          <div class="br-menu-item">
            <i class="fa fa-paper-plane"></i>
            <span class="menu-item-label">Mailbox</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->




        <a href="#" class="br-menu-link @yield('slider')">
          <div class="br-menu-item">
            <i class="fa fa-sliders" aria-hidden="true"></i>
            <span class="menu-item-label">Slider</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/slider') }}" class="nav-link @yield('addslider')">Add Slider</a></li>
          <li class="nav-item"><a href="{{ url('list/slider') }}" class="nav-link @yield('listslider')">List Slider</a></li>
          <li class="nav-item"><a href="{{ url('list/slider/deleted') }}" class="nav-link @yield('listsliderdeleted')">List Slider Deleted</a></li>
        </ul>

        {{-- start about content links --}}
        <a href="#" class="br-menu-link @yield('about')">
          <div class="br-menu-item">
            <i class="fa fa-info" aria-hidden="true"></i>
            <span class="menu-item-label">About Content</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/about/content') }}" class="nav-link @yield('addaboutcontent')">Add About Content</a></li>
          <li class="nav-item"><a href="{{ url('add/about/content/list') }}" class="nav-link @yield('listaboutcontent')">List About Content</a></li>
        </ul>
        {{-- end about content links --}}

        {{-- start menu links --}}
        <a href="#" class="br-menu-link @yield('menu_headings')">
          <div class="br-menu-item">
            <i class="fa fa-header" aria-hidden="true"></i>
            <span class="menu-item-label">Menu Headings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/menu/headings') }}" class="nav-link @yield('addmenuheadings')">Add Menu Headings</a></li>
          <li class="nav-item"><a href="{{ url('menu/headings/list') }}" class="nav-link @yield('listmenuheadings')">List Menu Headings</a></li>
        </ul>
        {{-- end menu links --}}
        {{-- start menu links --}}
        <a href="#" class="br-menu-link @yield('menu')">
          <div class="br-menu-item">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <span class="menu-item-label">Menu</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/menu') }}" class="nav-link @yield('addmenu')">Add Menu</a></li>
          <li class="nav-item"><a href="{{ url('menu/product/list') }}" class="nav-link @yield('listmenu')">List Menu</a></li>
          <li class="nav-item"><a href="{{ url('menu/product/list/deleted') }}" class="nav-link @yield('listmenudeleted')">List Menu Deleted</a></li>
        </ul>
        {{-- end menu links --}}

        {{-- start menu links --}}
        <a href="#" class="br-menu-link @yield('menu_catgory')">
          <div class="br-menu-item">
            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
            <span class="menu-item-label">Menu Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/menu/category') }}" class="nav-link @yield('addmenucategory')">Add Menu Category</a></li>
          <li class="nav-item"><a href="{{ url('menu/category/list') }}" class="nav-link @yield('listmenucategory')">List Menu Category</a></li>
        </ul>
        {{-- end menu links --}}

        {{-- start words links --}}
        <a href="#" class="br-menu-link @yield('words')">
          <div class="br-menu-item">
            <i class="fa fa-paw" aria-hidden="true"></i>
            <span class="menu-item-label">Words</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/words') }}" class="nav-link @yield('addwords')">Add Words</a></li>
          <li class="nav-item"><a href="{{ url('list/words') }}" class="nav-link @yield('listwords')">List Words</a></li>
        </ul>
        {{-- end words links --}}

        {{-- start gallery links --}}
        <a href="#" class="br-menu-link @yield('gallery')">
          <div class="br-menu-item">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
            <span class="menu-item-label">Gallery</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/gallery') }}" class="nav-link @yield('addgallery')">Add Gallery Image</a></li>
          <li class="nav-item"><a href="{{ url('list/gallery') }}" class="nav-link @yield('listgallery')">List Gallery Image</a></li>
          <li class="nav-item"><a href="{{ url('add/gallery/headings') }}" class="nav-link @yield('addgalleryheadings')">Add Gallery Headings</a></li>
          <li class="nav-item"><a href="{{ url('gallery/headings/list') }}" class="nav-link @yield('listgalleryheadings')">List Gallery Headings</a></li>
        </ul>
        {{-- end gallery links --}}

        {{-- start review links --}}
        <a href="#" class="br-menu-link @yield('review')">
          <div class="br-menu-item">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            <span class="menu-item-label">Review</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/review') }}" class="nav-link @yield('addreview')">Add Review</a></li>
          <li class="nav-item"><a href="{{ url('list/review') }}" class="nav-link @yield('listreview')">List Review</a></li>
          <li class="nav-item"><a href="{{ url('add/review/heading') }}" class="nav-link @yield('addreviewheading')">Add Review Headings</a></li>
          <li class="nav-item"><a href="{{ url('review/heading/list') }}" class="nav-link @yield('listreviewheadings')">List Review Headings</a></li>
        </ul>
        {{-- end review links --}}

        {{-- start staff links --}}
        <a href="#" class="br-menu-link @yield('stuff')">
          <div class="br-menu-item">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="menu-item-label">Stuff</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/stuff') }}" class="nav-link @yield('addstuff')">Add Stuff</a></li>
          <li class="nav-item"><a href="{{ url('stuff/list') }}" class="nav-link @yield('liststaff')">List Stuff</a></li>
        </ul>
        {{-- end staff links --}}

        {{-- start staff links --}}
        <a href="#" class="br-menu-link @yield('blog')">
          <div class="br-menu-item">
            <i class="fa fa-th" aria-hidden="true"></i>
            <span class="menu-item-label">Blog</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ url('add/blog') }}" class="nav-link @yield('addblog')">Add Blog</a></li>
          <li class="nav-item"><a href="{{ url('/blog/list') }}" class="nav-link @yield('listblog')">List Blog</a></li>
        </ul>
        {{-- end staff links --}}




      </div><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
          <input id="searchbox" type="text" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-email-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
              <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Messages</label>
                <a href="" class="tx-11">+ Add New Message</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Donna Seay</p>
                        <span class="tx-11 tx-gray-500">2 minutes ago</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                    </div>
                  </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Samantha Francis</p>
                        <span class="tx-11 tx-gray-500">3 hours ago</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Robert Walker</p>
                        <span class="tx-11 tx-gray-500">5 hours ago</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Larry Smith</p>
                        <span class="tx-11 tx-gray-500">Yesterday</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                    </div>
                  </div><!-- media -->
                </a>
                <div class="pd-y-10 tx-center bd-t">
                  <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Messages</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-bell-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
              <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                <a href="" class="tx-11">Mark All as Read</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                      <span class="tx-12">October 03, 2017 8:45am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                      <span class="tx-12">October 02, 2017 12:44am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                      <span class="tx-12">October 01, 2017 10:20pm</span>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                      <span class="tx-12">October 01, 2017 6:08pm</span>
                    </div>
                  </div><!-- media -->
                </a>
                <div class="pd-y-10 tx-center bd-t">
                  <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{ Auth::user()->name }}</span>
              <img src="{{ asset('frontend_assets/images/profile/img6.jpg') }}" class="wd-32 rounded-circle" alt="not found">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="icon ion-power"></i> Sign Out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-chatboxes-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#contacts"><i class="icon ion-ios-contact-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#attachments"><i class="icon ion-ios-folder-outline tx-22"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#calendar"><i class="icon ion-ios-calendar-outline tx-24"></i></a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active" id="contacts" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Online Contacts</label>
          <div class="contact-list pd-x-10">
            <a href="" class="contact-list-link new">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Marilyn Tarter</p>
                  <span class="tx-12 op-5 d-inline-block">Clemson, CA</span>
                </div>
                <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
          </div><!-- contact-list -->


          <label class="sidebar-label pd-x-25 mg-t-25">Offline Contacts</label>
          <div class="contact-list pd-x-10">
            <a href="" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Marilyn Tarter</p>
                  <span class="tx-12 op-5 d-inline-block">Clemson, CA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
          </div><!-- contact-list -->

        </div><!-- #contacts -->


        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="attachments" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Recent Attachments</label>
          <div class="media-file-list">
            <div class="media">
              <div class="pd-10 bg-primary wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-image-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">IMG_43445</p>
                <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                <p class="mg-b-0 tx-12 op-5">1.2mb</p>
              </div><!-- media-body -->
              <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
          </div><!-- media-list -->
        </div><!-- #history -->
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="calendar" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Time &amp; Date</label>
          <div class="pd-x-25">
            <h2 id="brTime" class="tx-white tx-lato mg-b-5"></h2>
            <h6 id="brDate" class="tx-white tx-light op-3"></h6>
          </div>

          <label class="sidebar-label pd-x-25 mg-t-25">Events Calendar</label>
          <div class="datepicker sidebar-datepicker"></div>


          <label class="sidebar-label pd-x-25 mg-t-25">Event Today</label>
          <div class="pd-x-25">
            <div class="list-group sidebar-event-list mg-b-20">
              <div class="list-group-item">
                <div>
                  <h6 class="tx-white tx-13 mg-b-5 tx-normal">Roven's 32th Birthday</h6>
                  <p class="mg-b-0 tx-white tx-12 op-2">2:30PM</p>
                </div>
                <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
              </div><!-- list-group-item -->
              <div class="list-group-item">
                <div>
                  <h6 class="tx-white tx-13 mg-b-5 tx-normal">Regular Workout Schedule</h6>
                  <p class="mg-b-0 tx-white tx-12 op-2">7:30PM</p>
                </div>
                <a href="" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
              </div><!-- list-group-item -->
            </div><!-- list-group -->

            <a href="" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">+ Add Event</a>
            <br>
          </div>

        </div>

      </div><!-- tab-content -->
    </div><!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    @yield('backend_content')

    <footer class="br-footer">
      <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; {{ date('Y') }}. YamiFood. All Rights Reserved.</div>
        <div>Attentively and carefully made by YamiFood.</div>
      </div>
      <div class="footer-right d-flex align-items-center">
        <span class="tx-uppercase mg-r-10">Share:</span>
        <a target="_blank" class="pd-x-5" href="#"><i class="fa fa-facebook tx-20"></i></a>
        <a target="_blank" class="pd-x-5" href="#"><i class="fa fa-twitter tx-20"></i></a>
      </div>
    </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('dashboard_assets') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/moment/moment.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/peity/jquery.peity.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/chartist/chartist.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('dashboard_assets') }}/lib/rickshaw/rickshaw.min.js"></script>


    <script src="{{ asset('dashboard_assets') }}/js/bracket.js"></script>
    <script src="{{ asset('dashboard_assets') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('dashboard_assets') }}/js/dashboard.js"></script>
    <script>
    $(function(){
      'use strict'

      // FOR DEMO ONLY
      // menu collapsed by default during first page load or refresh with screen
      // having a size between 992px and 1299px. This is intended on this page only
      // for better viewing of widgets demo.
      $(window).resize(function(){
        minimizeMenu();
      });

      minimizeMenu();

      function minimizeMenu() {
        if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
          // show only the icons and hide left menu label by default
          $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
          $('body').addClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideUp();
        } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
          $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
          $('body').removeClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideDown();
        }
      }
    });
    </script>
    </body>
    </html>
