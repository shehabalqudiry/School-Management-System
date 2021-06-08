<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('home') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('trans.Dashboard_page') }}</span>
                            </div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('trans.Programname') }}</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#grades">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ __('trans.Grades') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="grades" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ __('trans.Grades_list') }}</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#levels-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ __('trans.Levels') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="levels-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('levels.index') }}">{{ __('trans.Levels_list') }}</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">{{ __('trans.Sections') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Sections_list') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                                    class="right-nav-text">{{ __('trans.Students') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Students-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('students.create') }}">{{ __('trans.Student_add') }}</a> </li>
                            <li> <a href="{{ route('students.index') }}">{{ __('trans.Students_list') }}</a> </li>
                            <li> <a href="{{ route('promotions.index') }}">{{ __('trans.Student_Promotion') }}</a> </li>
                            <li> <a href="{{ route('promotions.show') }}">{{ __('trans.Student_Promotion_Management') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i><span
                                    class="right-nav-text">{{ __('trans.Teachers') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('teachers.index') }}">{{ __('trans.Teachers') }}</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">{{ __('trans.Parents') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('parents') }}">{{ __('trans.Parents_list') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{ __('trans.Accounts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Accounts') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-menu">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                    class="right-nav-text">{{ __('trans.Attendance') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Attendance') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-menu">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">{{ __('trans.Exams') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Exams') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-menu">
                            <div class="pull-left"><i class="fas fa-book"></i><span
                                    class="right-nav-text">{{ __('trans.library') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.library') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-menu">
                            <div class="pull-left"><i class="fas fa-video"></i><span
                                    class="right-nav-text">{{ __('trans.Onlineclasses') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Onlineclasses') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-menu">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span
                                    class="right-nav-text">{{ __('trans.Settings') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Settings-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Settings') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-menu">
                            <div class="pull-left"><i class="fas fa-users"></i><span
                                    class="right-nav-text">{{ __('trans.Users') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections.index') }}">{{ __('trans.Users') }}</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
