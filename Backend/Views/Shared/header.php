<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="/Frontend/Assets/img/logo.png" alt="logo" class="logo-default" />
            </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
        <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
        <div class="hor-menu   hidden-sm hidden-xs">
            <ul class="nav navbar-nav">
                <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                <li class="classic-menu-dropdown active">
                    <a href="/index.php">
                        Home
                        <span class="selected"> </span>
                    </a>
                </li>


                <li class="classic-menu-dropdown">
                    <a href="javascript:;" data-hover="megamenu-dropdown" data-close-others="true">
                        Forms
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-left">

                        <!-- <li class="dropdown-submenu">
                             <a href="javascript:;">
                                 <i class="fa fa-envelope-o"></i> HR
                             </a>
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="#">Render Service On Off Days</a>
                                 </li>
                                 <li>
                                     <a href="#">Passport Withdawal</a>
                                 </li>
                                 <li>
                                     <a href="#">New Hire Orientation</a>
                                 </li>
                                 <li>
                                     <a href="#">Exit Interview Questionnaire</a>
                                 </li>
                                 <li>
                                     <a href="#">Attendance Time Sheet</a>
                                 </li>
                                 <li>
                                     <a href="#">Interview Evaluation</a>
                                 </li>
                                 <li>
                                     <a href="#">SIM Card Request</a>
                                 </li>
                                 <li>
                                     <a href="#">Certificate Request</a>
                                 </li>
                                 <li>
                                     <a href="#">Bank Account Undertaking</a>
                                 </li>
                                 <li>
                                     <a href="#">Clearance Certificate</a>
                                 </li>
                                 <li>
                                     <a href="#">Staff Requisition</a>
                                 </li>
                                 <li>
                                     <a href="#">Log In Attendance</a>
                                 </li>
                                 <li>
                                     <a href="#">Managment Leave Request</a>
                                 </li>
                             </ul>
                         </li>-->
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Administration
                            </a>    
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a href="#">Payment Request</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=PaymentRequest&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=PaymentRequest&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#">Purchase Request</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=PurchaseRequest&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=PurchaseRequest&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#">Expense Report</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=ExpenseReport&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=ExpenseReport&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Marketing
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Marketing Project Request</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Packaging Development</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Preliminary Approval Project</a>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Procurement
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a href="#">Purchase Request</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=PurchaseRequest&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=PurchaseRequest&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Finance
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a href="/index.php?module=MM&method=List">Material Master</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=MM&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=MM&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="/index.php?module=VM&method=List">Vendor Master</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=VM&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=VM&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="/index.php?module=CM&method=List">Customer Master</a>
                                     <ul class="dropdown-menu">
                                        <li>
                                            <a href="/index.php?module=CM&method=List"> Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?module=CM&method=Index"> New </a>
                                        </li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Account Master Opening</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Advance Payment Form</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Credit Note Request</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Debit Note</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">ICV</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Item Code Creation</a>
                                </li>

                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">New Product Development</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">P&L Request Form</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">SAP Access</a>
                                </li>


                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Q&A
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Incident Report</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Accident Report</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Customer Complaint Form</a>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Engineering
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Job Order</a>
                                </li>


                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:;">
                                <i class="fa fa-envelope-o"></i>Time & Attendance
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Leave Request</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Log In/ Log Out</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Amend Leave Request</a>
                                </li>
                                <li>
                                    <a href="javascript:bootbox.alert('Coming Soon ....');">Claim Compensational Off Entitlement</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--[[[[[[[[[ MEGA MENU]]]]]]]]]-->
            </ul>
        </div>
        <!-- END MEGA MENU -->
        <!-- BEGIN HEADER SEARCH BOX -->
        <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
        <form class="search-form" action="extra_search.html" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">12 pending</span> notifications
                            </h3>
                            <a href="page_user_profile_1.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">just now</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                            </span> New user registered.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 mins</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> Server #12 overloaded.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">10 mins</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </span> Server #2 not responding.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">14 hrs</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                            </span> Application error.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">2 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> Database overloaded 68%.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> A user IP blocked.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">4 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </span> Storage Server #4 not responding dfdfdfd.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">5 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                            </span> System Error.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">9 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> Storage server failed.
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                You have
                                <span class="bold">7 New</span> Messages
                            </h3>
                            <a href="app_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/Frontend/Assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">Just Now </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/Frontend/Assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">16 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/Frontend/Assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> Bob Nilson </span>
                                            <span class="time">2 hrs </span>
                                        </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/Frontend/Assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">40 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="/Frontend/Assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">46 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!--   <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                       <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <i class="icon-calendar"></i>
                           <span class="badge badge-default"> 3 </span>
                       </a>
                       <ul class="dropdown-menu extended tasks">
                           <li class="external">
                               <h3>
                                   You have
                                   <span class="bold">12 pending</span> tasks
                               </h3>
                               <a href="app_todo.html">view all</a>
                           </li>
                           <li>
                               <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">New release v1.2 </span>
                                               <span class="percent">30%</span>
                                           </span>
                                           <span class="progress">
                                               <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">40% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">Application deployment</span>
                                               <span class="percent">65%</span>
                                           </span>
                                           <span class="progress">
                                               <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">65% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">Mobile app release</span>
                                               <span class="percent">98%</span>
                                           </span>
                                           <span class="progress">
                                               <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">98% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">Database migration</span>
                                               <span class="percent">10%</span>
                                           </span>
                                           <span class="progress">
                                               <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">10% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">Web server upgrade</span>
                                               <span class="percent">58%</span>
                                           </span>
                                           <span class="progress">
                                               <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">58% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">Mobile development</span>
                                               <span class="percent">85%</span>
                                           </span>
                                           <span class="progress">
                                               <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">85% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="javascript:;">
                                           <span class="task">
                                               <span class="desc">New UI release</span>
                                               <span class="percent">38%</span>
                                           </span>
                                           <span class="progress progress-striped">
                                               <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                   <span class="sr-only">38% Complete</span>
                                               </span>
                                           </span>
                                       </a>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </li>-->
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="/rpc.php?module=Azure&method=GetProfilePic&nojson=1" />
                        <span class="username username-hide-on-mobile">{{userinfo.given_name}}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <!-- <li>
                             <a href="page_user_profile_1.html">
                                 <i class="icon-user"></i> My Profile
                             </a>
                         </li>
                         <li>
                             <a href="app_calendar.html">
                                 <i class="icon-calendar"></i> My Calendar
                             </a>
                         </li>
                         <li>
                             <a href="app_inbox.html">
                                 <i class="icon-envelope-open"></i> My Inbox
                                 <span class="badge badge-danger"> 3 </span>
                             </a>
                         </li>
                         <li>
                             <a href="app_todo.html">
                                 <i class="icon-rocket"></i> My Tasks
                                 <span class="badge badge-success"> 7 </span>
                             </a>
                         </li>
                         <li class="divider"> </li>
                         <li>
                             <a href="page_user_lock_1.html">
                                 <i class="icon-lock"></i> Lock Screen
                             </a>
                         </li>-->
                        <li>
                            <a href="/Logout.php">
                                <i class="icon-key"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!--<li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>-->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->