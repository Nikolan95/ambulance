<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <nav class="nav">
            <a href="/dashboard"  data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Dashboard">
                <a href="/dashboard"><i data-feather="monitor" class="align-self-center menu-icon icon-dual" href = "/dashboard"></i></a>
            </a><br>
            <a href="#BonusCalculation" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Ambulance" data-trigger="hover">
                <i data-feather="dollar-sign" class="align-self-center menu-icon icon-dual"></i>
            </a>
        </nav><!--end nav-->
        <div class="pro-metrica-end">
            <a href="/logout" class="help" data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Logout">
                <i data-feather="log-out" class="align-self-center menu-icon icon-md icon-dual mb-4"></i> 
            </a>
        </div>
    </div><!--end main-icon-menu-->
    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="/dashboard" class="logo">
                <span>
                    <img src="{{ asset('images/ambulance-logo.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-body slimscroll">
            <div id="BonusCalculation" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Ambulance</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="/patients">Patients</a></li>
                    <li class="nav-item"><a class="nav-link" href="/doctors">Doctors</a></li>
                    <div class="title-box">
                        <h6 class="menu-title">Examinations</h6>
                    </div>
                    <li class="nav-item"><a class="nav-link" href="/examinations">All</a></li>
                    <li class="nav-item"><a class="nav-link" href="/examinations/unchecked">Uncompleted</a></li>
                    <li class="nav-item"><a class="nav-link" href="/examinations/checked">Completed</a></li>
                </ul>
            </div><!-- end bonusdaten -->
        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
