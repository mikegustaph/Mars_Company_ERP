<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="{{ Storage::url('images/' . $favicon) }}">

    <title>{{ isset($title) ? $title : 'Default Title' }}</title>

    <link rel="stylesheet" href="{{ url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="{{ url('//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/neon-core.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

    <script src="{{ url('assets/js/jquery-1.11.3.min.js') }}"></script>

    <!--[if lt IE 9]><script src="{{ url('assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="{{ url('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
  <script src="{{ url('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
 <![endif]-->


</head>
<style>
    tr>td:first-letter {
        text-transform: uppercase;
    }
</style>

<body class="page-body  page-fade" data-URL::to="http://clix.co.tz">

    <div class="page-container">
        <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

        <!--Side Menu Start-->
        <div class="sidebar-menu">

            <div class="sidebar-menu-inner">

                <header class="logo-env">

                    <!-- logo -->
                    <div class="logo">
                        <h1 class="" style="color:white;font-weight:bold;">Mars</h1>
                        <!--   <a href="index.html">
                                <img src="assets/images/logo@2x.png" width="120" alt="" />
                            </a> -->
                    </div>

                    <!-- logo collapse icon -->
                    <div class="sidebar-collapse">
                        <a href="#" class="sidebar-collapse-icon">
                            <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>


                    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation">
                            <!-- add class "with-animation" to support animation -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>

                </header>

                <ul id="main-menu" class="main-menu">
                    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                    <li class="active opened active">

                        <a href="{{ URL::to('home') }}">
                            <i class="entypo-gauge"></i>
                            <span class="title">Dashboard</span>
                        </a>

                    </li>

                    <li class="">
                        <a href="#">
                            <i class="entypo-users"></i>
                            <span class="title">Clients</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ URL::to('clients') }}">
                                    <span class="title">Clients</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('createClient') }}">
                                    <span class="title">Add Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('createContactPerson') }}">
                                    <span class="title">Add Contact Person</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ URL::to('tasks') }}">
                            <i class="glyphicon glyphicon-tasks"></i>
                            <span class="title">Tasks</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('services') }}">
                            <i class="glyphicon glyphicon-th-large"></i>
                            <span class="title">Services</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ URL::to('dispatches') }}">
                            <i class="entypo-monitor"></i>
                            <span class="title">Dispatch</span>
                            <span class="badge badge-secondary">8</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('reminder') }}">
                            <i class="glyphicon glyphicon-time"></i>
                            <span class="title">Reminder</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ URL::to('policies') }}">
                            <i class="glyphicon glyphicon-list"></i>
                            <span class="title">Policies</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ URL::to('template') }}">
                            <i class="glyphicon glyphicon-file"></i>
                            <span class="title">Template</span>
                            <span class="badge badge-info badge-roundless" style="border-radius:3px;">New Items</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ URL::to('employees') }}">
                            <i class="entypo-users"></i>
                            <span class="title">Employees</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)">
                            <i class="entypo-users"></i>
                            <span class="title">Users</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ URL::to('userlist') }}">
                                    <span class="title">User List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('adduser') }}">
                                    <span class="title">Add User</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)">
                            <i class="entypo-briefcase"></i>
                            <span class="title">Reports</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ URL::to('document-received') }}">
                                    <span class="title">Document Received</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('daily') }}">
                                    <span class="title">Daily Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('weekly') }}">
                                    <span class="title">Weekly Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('monthly') }}">
                                    <span class="title">Monthly Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('yearly') }}">
                                    <span class="title">Yearly Reports</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)">
                            <i class="glyphicon glyphicon-cog"></i>
                            <span class="title">Settings</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ URL::to('role') }}">
                                    <span class="title">Role Permission</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ URL::to('profilesetting') }}">
                                    <span class="title">Profile Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('generalsetting') }}">
                                    <span class="title">General Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('modulesetting') }}">
                                    <span class="title">Module Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('hrmsetting') }}">
                                    <span class="title">HRM Settings</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </div>
        <!--Side Menu End-->

        <div class="main-content">

            <!--Main Header-->
            <div class="row">

                <!-- Profile Info and Notifications -->
                <div class="col-md-6 col-sm-8 clearfix">

                    <ul class="user-info pull-left pull-none-xsm">

                        <!-- Profile Info -->
                        <li class="profile-info dropdown">
                            <!-- add class "pull-right" if you want to place this from right -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle"
                                    width="44" />
                                John Henderson
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Reverse Caret -->
                                <li class="caret"></li>

                                <!-- Profile sub-links -->
                                <li>
                                    <a href="extra-timeline.html">
                                        <i class="entypo-user"></i>
                                        Edit Profile
                                    </a>
                                </li>

                                <li>
                                    <a href="mailbox.html">
                                        <i class="entypo-mail"></i>
                                        Inbox
                                    </a>
                                </li>

                                <li>
                                    <a href="extra-calendar.html">
                                        <i class="entypo-calendar"></i>
                                        Calendar
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="entypo-clipboard"></i>
                                        Tasks
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                        <!-- Task Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="entypo-list"></i>
                                <span class="badge badge-warning">1</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="top">
                                    <p>You have 6 pending tasks</p>
                                </li>

                                <li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li>
                                            <a href="#">
                                                <span class="task">
                                                    <span class="desc">Procurement</span>
                                                    <span class="percent">27%</span>
                                                </span>

                                                <span class="progress">
                                                    <span style="width: 27%;"
                                                        class="progress-bar progress-bar-success">
                                                        <span class="sr-only">27% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="task">
                                                    <span class="desc">App Development</span>
                                                    <span class="percent">83%</span>
                                                </span>

                                                <span class="progress progress-striped">
                                                    <span style="width: 83%;"
                                                        class="progress-bar progress-bar-danger">
                                                        <span class="sr-only">83% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="task">
                                                    <span class="desc">HTML Slicing</span>
                                                    <span class="percent">91%</span>
                                                </span>

                                                <span class="progress">
                                                    <span style="width: 91%;"
                                                        class="progress-bar progress-bar-success">
                                                        <span class="sr-only">91% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="task">
                                                    <span class="desc">Database Repair</span>
                                                    <span class="percent">12%</span>
                                                </span>

                                                <span class="progress progress-striped">
                                                    <span style="width: 12%;"
                                                        class="progress-bar progress-bar-warning">
                                                        <span class="sr-only">12% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="task">
                                                    <span class="desc">Backup Create Progress</span>
                                                    <span class="percent">54%</span>
                                                </span>

                                                <span class="progress progress-striped">
                                                    <span style="width: 54%;" class="progress-bar progress-bar-info">
                                                        <span class="sr-only">54% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="task">
                                                    <span class="desc">Upgrade Progress</span>
                                                    <span class="percent">17%</span>
                                                </span>

                                                <span class="progress progress-striped">
                                                    <span style="width: 17%;"
                                                        class="progress-bar progress-bar-important">
                                                        <span class="sr-only">17% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="external">
                                    <a href="{{ route('task.taskprogressall') }}">See all tasks</a>
                                </li>
                            </ul>

                        </li>
                        <!-- Raw Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <span class="notification-icon">
                                    <img src="{{ asset('assets/images/notification.gif') }}" width="auto"
                                        height="26px" alt="GIF Image">
                                </span>

                                <span class="badge badge-info">6</span>
                            </a>
                            <!--animated icon-->
                            <script type="text/javascript"></script>
                            <ul class="dropdown-menu">
                                <li class="top">
                                    <p class="small">
                                        <a href="#" class="pull-right">Mark all Read</a>
                                        You have <strong>3</strong> new notifications.
                                    </p>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li class="unread notification-success">
                                            <a href="#">
                                                <i class="entypo-user-add pull-right"></i>

                                                <span class="line">
                                                    <strong>New user registered</strong>
                                                </span>

                                                <span class="line small">
                                                    30 seconds ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="unread notification-secondary">
                                            <a href="#">
                                                <i class="entypo-heart pull-right"></i>

                                                <span class="line">
                                                    <strong>Someone special liked this</strong>
                                                </span>

                                                <span class="line small">
                                                    2 minutes ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-primary">
                                            <a href="#">
                                                <i class="entypo-user pull-right"></i>

                                                <span class="line">
                                                    <strong>Privacy settings have been changed</strong>
                                                </span>

                                                <span class="line small">
                                                    3 hours ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-danger">
                                            <a href="#">
                                                <i class="entypo-cancel-circled pull-right"></i>

                                                <span class="line">
                                                    John cancelled the event
                                                </span>

                                                <span class="line small">
                                                    9 hours ago
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-info">
                                            <a href="#">
                                                <i class="entypo-info pull-right"></i>

                                                <span class="line">
                                                    The server is status is stable
                                                </span>

                                                <span class="line small">
                                                    yesterday at 10:30am
                                                </span>
                                            </a>
                                        </li>

                                        <li class="notification-warning">
                                            <a href="#">
                                                <i class="entypo-rss pull-right"></i>

                                                <span class="line">
                                                    New comments waiting approval
                                                </span>

                                                <span class="line small">
                                                    last week
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="#">View all notifications</a>
                                </li>
                            </ul>

                        </li>

                        <!-- Message Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="entypo-mail"></i>
                                <span class="badge badge-secondary">10</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <form class="top-dropdown-search">

                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Search anything..." name="s" />
                                        </div>

                                    </form>

                                    <ul class="dropdown-menu-list scroller">
                                        <li class="active">
                                            <a href="#">
                                                <span class="image pull-right">
                                                    <img src="assets/images/thumb-1@2x.png" width="44"
                                                        alt="" class="img-circle" />
                                                </span>

                                                <span class="line">
                                                    <strong>Luc Chartier</strong>
                                                    - yesterday
                                                </span>

                                                <span class="line desc small">
                                                    This ain’t our first item, it is the best of the rest.
                                                </span>
                                            </a>
                                        </li>

                                        <li class="active">
                                            <a href="#">
                                                <span class="image pull-right">
                                                    <img src="assets/images/thumb-2@2x.png" width="44"
                                                        alt="" class="img-circle" />
                                                </span>

                                                <span class="line">
                                                    <strong>Salma Nyberg</strong>
                                                    - 2 days ago
                                                </span>

                                                <span class="line desc small">
                                                    Oh he decisively impression attachment friendship so if everything.
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="image pull-right">
                                                    <img src="assets/images/thumb-3@2x.png" width="44"
                                                        alt="" class="img-circle" />
                                                </span>

                                                <span class="line">
                                                    Hayden Cartwright
                                                    - a week ago
                                                </span>

                                                <span class="line desc small">
                                                    Whose her enjoy chief new young. Felicity if ye required likewise so
                                                    doubtful.
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span class="image pull-right">
                                                    <img src="assets/images/thumb-4@2x.png" width="44"
                                                        alt="" class="img-circle" />
                                                </span>

                                                <span class="line">
                                                    Sandra Eberhardt
                                                    - 16 days ago
                                                </span>

                                                <span class="line desc small">
                                                    On so attention necessary at by provision otherwise existence
                                                    direction.
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="mailbox.html">All Messages</a>
                                </li>
                            </ul>

                        </li>
                    </ul>

                </div>


                <!-- Raw Links -->
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                    <ul class="list-inline links-list pull-right">





                        <li class="sep"></li>

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button class="btn btn-default btn-icon icon-right">
                                    Log Out <i class="entypo-logout"></i>
                                </button>
                            </form>

                        </li>
                    </ul>

                </div>

            </div>
            <!--Main Header-->

            <hr />

            <!--Main Content Start-->
            @yield('content')
            <!--Main Content End-->

            <!-- Footer -->
            <footer class="main">

                &copy; 2023 <strong>Mars Company Limited</strong> All right reserved

            </footer>
        </div>


        <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1"
            data-max-chat-history="25">

            <div class="chat-inner">


                <h2 class="chat-header">
                    <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                    <i class="entypo-users"></i>
                    Chat
                    <span class="badge badge-success is-hidden">0</span>
                </h2>


                <div class="chat-group" id="group-1">
                    <strong>Favorites</strong>

                    <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span
                            class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                    <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                    <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                    <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                    <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
                </div>


                <div class="chat-group" id="group-2">
                    <strong>Work</strong>

                    <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                    <a href="#" data-conversation-history="#sample_history_2"><span
                            class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                    <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
                </div>


                <div class="chat-group" id="group-3">
                    <strong>Social</strong>

                    <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                    <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                    <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                    <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
                </div>

            </div>

            <!-- conversation template -->
            <div class="chat-conversation">

                <div class="conversation-header">
                    <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                    <span class="user-status"></span>
                    <span class="display-name"></span>
                    <small></small>
                </div>

                <ul class="conversation-body">
                </ul>

                <div class="chat-textarea">
                    <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                </div>

            </div>

        </div>


        <!-- Chat Histories -->
        <ul class="chat-history" id="sample_history">
            <li>
                <span class="user">Art Ramadani</span>
                <p>Are you here?</p>
                <span class="time">09:00</span>
            </li>

            <li class="opponent">
                <span class="user">Catherine J. Watkins</span>
                <p>This message is pre-queued.</p>
                <span class="time">09:25</span>
            </li>

            <li class="opponent">
                <span class="user">Catherine J. Watkins</span>
                <p>Whohoo!</p>
                <span class="time">09:26</span>
            </li>

            <li class="opponent unread">
                <span class="user">Catherine J. Watkins</span>
                <p>Do you like it?</p>
                <span class="time">09:27</span>
            </li>
        </ul>




        <!-- Chat Histories -->
        <ul class="chat-history" id="sample_history_2">
            <li class="opponent unread">
                <span class="user">Daniel A. Pena</span>
                <p>I am going out.</p>
                <span class="time">08:21</span>
            </li>

            <li class="opponent unread">
                <span class="user">Daniel A. Pena</span>
                <p>Call me when you see this message.</p>
                <span class="time">08:27</span>
            </li>
        </ul>


    </div>

    <!-- Sample Modal (Default skin) -->
    <div class="modal fade" id="sample-modal-dialog-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Default Modal</h4>
                </div>

                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw.
                        Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end
                        marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope.
                        Secure active living depend son repair day ladies now.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Modal (Skin inverted) -->
    <div class="modal invert fade" id="sample-modal-dialog-2">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
                </div>

                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw.
                        Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end
                        marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope.
                        Secure active living depend son repair day ladies now.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Modal (Skin gray) -->
    <div class="modal gray fade" id="sample-modal-dialog-3">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
                </div>

                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw.
                        Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end
                        marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope.
                        Secure active living depend son repair day ladies now.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('input.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal'
            });

            $('input.icheck-2').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });


        jQuery(document).ready(function($) {
            var icheck_skins = $(".icheck-skins a");

            icheck_skins.click(function(ev) {
                ev.preventDefault();

                icheck_skins.removeClass('current');
                $(this).addClass('current');

                updateiCheckSkinandStyle();
            });

            $("#icheck-style").change(updateiCheckSkinandStyle);
        });

        function updateiCheckSkinandStyle() {
            var skin = $(".icheck-skins a.current").data('color-class'),
                style = $("#icheck-style").val();

            var cb_class = 'icheckbox_' + style + (skin.length ? ("-" + skin) : ''),
                rd_class = 'iradio_' + style + (skin.length ? ("-" + skin) : '');

            if (style == 'futurico' || style == 'polaris') {
                cb_class = cb_class.replace('-' + skin, '');
                rd_class = rd_class.replace('-' + skin, '');
            }

            $('input.icheck-2').iCheck('destroy');
            $('input.icheck-2').iCheck({
                checkboxClass: cb_class,
                radioClass: rd_class
            });
        }
    </script>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ url('assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/rickshaw/rickshaw.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/zurb-responsive-tables/responsive-tables.css') }}">

    <!-- Bottom scripts (common) -->
    <script src="{{ url('assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ url('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/joinable.js') }}"></script>
    <script src="{{ url('assets/js/resizeable.js') }}"></script>
    <script src="{{ url('assets/js/neon-api.js') }}"></script>
    <script src="{{ url('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <!-- Bottom scripts (common) -->

    <!-- Imported scripts on this page -->
    <script src="assets/js/neon-chat.js"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
    <script src="{{ url('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('assets/js/rickshaw/vendor/d3.v3.js') }}"></script>
    <script src="{{ url('assets/js/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ url('assets/js/raphael-min.js') }}"></script>
    <script src="{{ url('assets/js/morris.min.js') }}"></script>
    <script src="{{ url('assets/js/toastr.js') }}"></script>
    <script src="{{ url('assets/js/neon-chat.js') }}"></script>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ url('assets/js/select2/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/selectboxit/jquery.selectBoxIt.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/icheck/skins/minimal/_all.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/icheck/skins/square/_all.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/icheck/skins/flat/_all.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/icheck/skins/futurico/futurico.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/icheck/skins/polaris/polaris.css') }}">

    <!-- Bottom scripts (common) -->
    <script src="{{ url('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/joinable.js') }}"></script>
    <script src="{{ url('assets/js/resizeable.js') }}"></script>
    <script src="{{ url('assets/js/neon-api.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('assets/js/typeahead.min.js') }}"></script>
    <script src="{{ url('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ url('assets/js/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('assets/js/jquery.multi-select.js') }}"></script>
    <script src="{{ url('assets/js/icheck/icheck.min.js') }}"></script>
    <script src="{{ url('assets/js/neon-chat.js') }}"></script>
    <script src="{{ url('assets/js/zurb-responsive-tables/responsive-tables.js') }}"></script>



    <!-- JavaScripts initializations and stuff -->
    <script src="{{ url('assets/js/neon-custom.js') }}"></script>


    <!-- Demo Settings -->
    <script src="{{ url('assets/js/neon-demo.js') }}"></script>

</body>

</html>
