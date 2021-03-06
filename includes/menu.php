<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../../styles/menu.css" />
        <title>menu</title>
        <link rel="shortcut icon" type="image/icon" href="../../img/part1.gif" />
    </head>

    <body>
<ul id="nav">
    <li <?php echo ($this_page=='home') ? 'class="current"' : '' ; ?> >
        <a href="../../home/home">Home</a>
    </li>
    <li <?php echo ($this_page=='duty_details') ? 'class="current"' : '' ; ?> >
        <a href="#">Duty Details</a>
        <ul>
            <li>
                <a href="#">Duty Locations</a>
                <ul>
                    <li >
                        <a href="../../duty_details/duty_location_new">New</a>
                    </li>
                    <li>
                        <a href="../../duty_details/duty_location_view">View</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Duty Areas</a>
                <ul>
                    <li>
                        <a href="../../duty_details/duty_area_new">New</a>
                    </li>
                    <li>
                        <a href="../../duty_details/duty_area_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Duty Points</a>
                <ul>
                    <li>
                        <a href="../../duty_details/duty_point_new">New</a>
                    </li>
                    <li>
                        <a href="../../duty_details/duty_point_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Facilitation Types</a>
                <ul>
                    <li>
                        <a href="../../duty_details/facilitation_and_security_new">New</a>
                    </li>
                    <li>
                        <a href="../../duty_details/facilitation_and_security_view">View</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li <?php echo ($this_page=='cisf_details') ? 'class="current"' : '' ; ?> >
        <a href="#">CISF Details</a>
        <ul>
            <li>
                <a href="#">Designations</a>
                <ul>
                    <li>
                        <a href="../../cisf_details/cisf_designation_new">New</a>
                    </li>
                    <li>
                        <a href="../../cisf_details/cisf_designation_view">View</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Guards Per Location</a>
                <ul>
                    <li>
                        <a href="../../cisf_details/cisf_guards_per_location_new">New</a>
                    </li>
                    <li>
                        <a href="../../cisf_details/cisf_guards_per_location_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Security Personnel</a>
                <ul>
                    <li>
                        <a href="../../cisf_details/cisf_security_personnel_new">New</a>
                    </li>
                    <li>
                        <a href="../../cisf_details/cisf_security_personnel_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Shifts</a>
                <ul>
                    <li>
                        <a href="../../cisf_details/cisf_shifts_new">New</a>
                    </li>
                    <li>
                        <a href="../../cisf_details/cisf_shifts_view">View</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Shifts Wise Security Personnel</a>
                <ul>
                    <li>
                        <a href="../../cisf_details/cisf_shift_wise_security_personnel_new">New</a>
                    </li>
                    <li>
                        <a href="../../cisf_details/cisf_shift_wise_security_personnel_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Duty Roster</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Attendance Search</a>
            </li>
            <li>
                <a href="#">Leave Record</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
   
    <li <?php echo ($this_page=='ground_control_units') ? 'class="current"' : '' ; ?> >
        <a href="#">Ground Control Units</a>
        <ul>
            <li>
                <a href="#">Token Types</a>
                <ul>
                    <li>
                        <a href="../../ground_control_units/token_type_new">New</a>
                    </li>
                    <li>
                        <a href="../../ground_control_units/token_type_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Token Register</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Visitor Pass Register</a>
                <ul>
                    <li>
                        <a href="../../ground_control_units/visitors_pass_reg_new">New</a>
                    </li>
                    <li>
                        <a href="../../ground_control_units/visitors_pass_reg_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Vehicle Movement Register</a>
                <ul>
                    <li>
                        <a href="../../ground_control_units/vehicle_mov_reg_new">New</a>
                    </li>
                    <li>
                        <a href="../../ground_control_units/vehicle_mov_reg_search">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Security Equipments</a>
            </li>
            <li>
                <a href="#">Activity Log</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Material Movement Register</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li <?php echo ($this_page=='agencies') ? 'class="current"' : '' ; ?> >
        <a href="#">Agencies</a>
        <ul>
            <li>
                <a href="#">Agency Types</a>
                <ul>
                    <li>
                        <a href="agency_types_new.php">New</a>
                    </li>
                    <li>
                        <a href="agency_types_view.php">View</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Agencies</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Express Terminal Pass</a>
                <ul>
                    <li>
                        <a href="#">New</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                    <li>
                        <a href="#">Report</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li <?php echo ($this_page=='reports') ? 'class="current"' : '' ; ?> >
        <a href="#">Reports</a>
        <ul>
            <li>
                <a href="list_of_passes_issued.php">List Of Passes Issued</a>
            </li>
            <li>
                <a href="duty_deployment_chart.php">Duty Deployment Chart</a>
            </li>
            <li>
                <a href="list_of_passes_issued_agencywise.php">Agency Wise Report</a>
            </li>
            <li>
                <a href="absent_without_leave.php">Absent Details Report</a>
            </li>
            <li>
                <a href="report_on_the_returned_passes.php">Report on Returned Passes</a>
            </li>
        </ul>
    </li>
	<li>
        <a href="../../lib/signout.php">Sign Out</a>
    </li>
</ul>
</body>
</html>