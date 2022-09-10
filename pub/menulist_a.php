<?php
$acct=$_SESSION['account'];
if($acct=='ADMIN') {
?>
<li class="nav-item">
    <a href="?page=dashboard" role="button" aria-expanded="false" class="nav-link" title="Panimulang Pahina"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span></a>
</li>
<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="Akawnt ng mga Gumagamit ng Web Apps"><i class="fa big-icon fa-users"></i> <span class="mini-dn">User Accounts Module</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX sidebar-submenu" style="text-align: justify; padding: 10px 0px;">
        <a href="?page=user_account" class="dropdown-item" title="Akawnt ng mga Guro"><i class="fa big-icon fa-users"></i> Faculty User Account</a>
        <a href="?page=user_student_account" class="dropdown-item" title="Akawnt ng mga Estudyante"><i class="fa big-icon fa-users"></i> Student User Account</a>
    </div>
</li>
<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="Modyul ng Kontrol ng Web Apps"><i class="fa big-icon fa-leanpub"></i> <span class="mini-dn">System Settings</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX sidebar-submenu" style="text-align: justify; padding: 10px 0px;">
        <a href="?page=academic_year_settings" class="dropdown-item" title="Talaan ng Taong Pampaaralan"><i class="fa big-icon fa-calendar"></i> Academic Year Settings</a>
        <a href="?page=grade_section_settings" class="dropdown-item" title="Talaan ng Antas at Seksyon"><i class="fa big-icon fa-calculator"></i> Grade / Section Settings</a>
        <a href="?page=subject_records" class="dropdown-item" title="Talaan ng Asignatura"><i class="fa big-icon fa-book"></i> Subject Records</a>
        <a href="?page=faculty_scheduler" class="dropdown-item" title="Modyul sa Iskedyul ng mga Guro"><i class="fa big-icon fa-th-list"></i> Faculty Scheduler</a>
    </div>
</li>
<li class="nav-item">
    <a href="?page=announcements" role="button" aria-expanded="false" class="nav-link" title="Mga Anunsyo"><i class="fa big-icon fa-newspaper-o"></i> <span class="mini-dn">Announcements</span></a>
</li>
<?php } else if($acct=='FACULTY') { ?>
<li class="nav-item">
    <a href="?page=dashboard" role="button" aria-expanded="false" class="nav-link" title="Panimulang Pahina"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span></a>
</li>
<li class="nav-item">
    <a href="?page=lessons_module" role="button" aria-expanded="false" class="nav-link" title="Modyul ng mga Aralin"><i class="fa big-icon fa-book"></i> <span class="mini-dn">Lessons Module</span></a>
</li>
<li class="nav-item">
    <a href="?page=student_record" role="button" aria-expanded="false" class="nav-link" title="Talaan ng Mag aaral"><i class="fa big-icon fa fa-users"></i> <span class="mini-dn">Student Record</span></a>
</li>
<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="Assessment Module"><i class="fa big-icon fa-leanpub"></i> <span class="mini-dn">Assessment Module</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX sidebar-submenu"  style="text-align: justify; padding: 10px 0px;">
        <a href="?page=assessment_records" class="dropdown-item" title="Talaan ng Pagtatasa"><i class="fa big-icon fa-list-ol"></i> Assessment Records</a>
        <a href="?page=assessment_results" class="dropdown-item" title="Resulta ng Pagtatasa"><i class="fa big-icon fa-calculator"></i> Assessment Results</a>
        <a href="?page=assessment_settings" class="dropdown-item" title="Pagtatakda ng Pagtatasa"><i class="fa big-icon fa-gears"></i> Assessment Settings</a>       
        <a href="?page=grading_sheet" class="dropdown-item" title="Talaan ng Grado"><i class="fa big-icon fa-book"></i> Grading Sheet Module</a>
    </div>
</li>
<li class="nav-item">
    <a href="?page=announcements" role="button" aria-expanded="false" class="nav-link" title="Mga Anunsyo"><i class="fa big-icon fa-newspaper-o"></i> <span class="mini-dn">Announcements</span></a>
</li>
<?php } else if($acct=='STUDENT') { ?>
<li class="nav-item">
    <a href="?page=dashboard" role="button" aria-expanded="false" class="nav-link" title="Panimulang Pahina"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span></a>
</li>
<li class="nav-item">
    <a href="?page=my_lessons" role="button" aria-expanded="false" class="nav-link" title="Lessons Module"><i class="fa big-icon fa-book"></i> <span class="mini-dn">Lessons Module</span></a>
</li>
<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="Assessment Module"><i class="fa big-icon fa-leanpub"></i> <span class="mini-dn">Assessment Module</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX sidebar-submenu" style="text-align: justify; padding: 10px 0px;">
        <a href="?page=assessment_activity" class="dropdown-item" title="Talaan ng Pagsusulit"><i class="fa big-icon fa-list-ol"></i> Assessment Activity</a>
        <a href="?page=assessment_outcome" class="dropdown-item" title="Resulta ng Pagtatasa"><i class="fa big-icon fa-calculator"></i> Assessment Results</a>        
        <a href="?page=grade_sheet" class="dropdown-item" title="Talaan ng Grado"><i class="fa big-icon fa-book"></i> Student Grade Record</a>
    </div>
</li>
<?php } ?>