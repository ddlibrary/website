<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
<a class="navbar-brand" href="{{ URL::to('/admin') }}">DDL Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="{{ URL::to('admin') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        @if(env('DDL_LITE')=='no')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseResources" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Resources</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseResources">
                <li>
                    <a href="{{ URL::to('admin/resources') }}">Resources</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/comments') }}">Comments</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/flags') }}">Flags</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="{{ URL::to('admin/users') }}">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
            </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseServeys" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Surveys</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseServeys">
                <li>
                    <a href="{{ URL::to('admin/survey_questions') }}">Survey Result</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSurveySettings" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Survey Settings</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseSurveySettings">
                <li>
                    <a href="{{ URL::to('admin/survey_time') }}">Setting Up Time</a>
                </li>
            </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link" href="{{ URL::to('admin/pages') }}">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Pages</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link" href="{{ URL::to('admin/news') }}">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">News</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseReports" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-wrench"></i>
                <span class="nav-link-text">Reports</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseReports">
                <li>
                    <a href="{{ URL::to('admin/reports/downloads') }}">Downloads</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/reports/ddl') }}">DDL</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/reports/ga') }}">GA</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSettings" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Settings</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseSettings">
                <li>
                    <a href="{{ URL::to('admin/contacts') }}">Contacts</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/menu') }}">Menu</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/taxonomy') }}">Taxonomy</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/settings') }}">Configurations</a>
                </li>
            </ul>
        </li>
        @endif
        </ul>
        <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
            </a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-user"></i>Welcome, <strong>{{ Auth::user()->username }}</strong></a>   
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="{{ URL::to('/') }}">
                <i class="fa fa-fw fa-home"></i><strong>Homepage</strong></a>   
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>