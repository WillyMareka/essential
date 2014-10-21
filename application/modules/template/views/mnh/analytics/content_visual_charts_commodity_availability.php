<style>
    .chart {
        overflow-y: auto;
    }
</style>
<!-- BEGIN CHART PORTLET 1-->
<!-- Pushy Menu -->


<div id="statistic_summary" style="display:none">
    <h4>Stats</h4>
    <div id="survey_stat" class="small-graph" style="display:none">
        <div class="outer">
            <div class="inner">
                <i class='main icon hospital'></i>
                <div class="content">
                    <div class='digit'><span data-content='Targeted' id="targeted">0</span>|<span data-content='Finished' id="finished">0</span>|<span data-content='Not Finished' id="not-finished">0</span>|<span data-content='Not Started' id="not-started">0</span></div>
                    <div class='text'>Facilities Reported</div>
                </div>
            </div>
            <div class="link"><i class="fa fa-chevron-circle-left"></i>View More</div>
        </div>
    </div>
    <div id="county_stat" class="small-graph" style="display:none">
        <div class="outer">
            <div class="inner">
                <i class='main icon map marker'></i>
                <div class="content">
                    <div class='inner-graph'></div>
                    <div class='text'>Counties Reported</div>
                </div>
            </div>
            <div class="link"><i class="fa fa-chevron-circle-left"></i>View More</div>
        </div>
    </div>
    <div id="district_stat" class="small-graph" style="display:none">
        <div class="outer">
            <div class="inner">
                <i class='main icon map marker'></i>
                <div class="content">
                    <div class='digit'>0</div>
                    <div class='text'>Sub-Counties in <span id="county"></span></div>
                </div>
            </div>
            <div class="link"><i class="fa fa-chevron-circle-left"></i>View More</div>
        </div>
    </div>
    <div id="reporting_stat" class="small-graph" style="display:none">
        <div class="outer">
            <div class="inner">
             <i class='main icon pencil'></i>
            <div class="content">
                <div class='inner-graph'></div>
                <div class='text'>Reporting Activity</div>
                </div>
            </div>
            <div class="link"><i class="fa fa-chevron-circle-left"></i>View More</div>
        </div>
    </div>
    <div class="small-graph" style="display:none">
        <div class="title">Last Entry</div>
        <div class="outer">

            <div class="content" id="date">0</div>
        </div>

    </div>
    <div class="small-graph" style="display:none">
        <div class="title">...</div>
        <div class="outer">

            <div class="content">0</div>
        </div>

    </div>

</div>
<div class="panel-group" id="accordion">

    <div class="panel panel-default analytics_row section" id="reporting-parent">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#sectionNav">
                    Section Navigation <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="sectionNav" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="semi-large-graph">
                    <div class="portlet-title">
                        <h6>Sections <i>(Click to Select a Section)</i></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart">
                            <ul id="sectionList" data-offset-top="-300" >

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="semi-large-graph">
                    <div class="portlet-title">
                        <h6 id="countyHeader"><i class="fa fa-map-marker"></i>County</h6>
                        <h6 id="progressHeader" ><i class="fa fa-tasks"></i>National Reporting Progress</h6>
                    </div>
                    <div id="reporting"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="analytics_row" id="reporting-parent">


    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Section 1 : Facility Information <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph" >
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Ownership</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="facility_owner">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Levels of Care</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="facility_levels">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Facility Type</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="facility_type"f>
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Training Before and After 2010</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="staff_training">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="staff_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Training & Retention in CH Unit</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="staff_retention">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">IMCI Consultation Room</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">
					<div class="chart" id="imci">
                        </div>
                    </div>
                </div>
                
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Health Service: Where are sick children seen?</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">
						<div class="chart" id="chhealth_service">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-2">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Section 2 : Guidelines, Job Aids and Tools <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Guidelines and Job Aids Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="guidelines">
                        </div>
                    </div>
                </div>
              <!--<div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Job Aids</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="job_aids">
                        </div>
                    </div>
              </div>-->
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Tools Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="tools">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Challenge in Accessing Data from Under 5 Register</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="challenge">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-3">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Section 3 : Case Management <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="x-large-graph" style="height:400px">
                   <h5>Data From Under 5 Register</h5>
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Assessment: Cases Documented in Under five register in the last one month</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="u5_register">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="ui horizontal icon divider">
  <i class="icon circular fa fa-bar-chart"></i>
</div>
                </div>
                
                <div class="x-large-graph">
                   <h5>Classification and Treatment</h5>
                    <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Diarrhoea</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="other_treatment_options_dia">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Pneumonia</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="other_treatment_options_pne">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Malaria</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="other_treatment_options_fev">
                        </div>
                    </div>
                </div>
                </div>
  <div class="col-md-12">
                <div class="ui horizontal icon divider">
  <i class="icon circular fa fa-bar-chart"></i>
</div>
                </div>
                <div class="semi-large-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Danger Signs Assessed in ongoing session</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="danger_signs">
                        </div>
                    </div>
                </div>
                <div class="semi-large-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i>Health Care Worker Response <span><select id="indicator_types"></select></span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="indicator_comparison">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-4">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    Section 4 : Commodity & Bundling <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="commodity_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Reason for Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart"id="commodity_unavailability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart"id="commodity_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Supplier</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart"id="commodity_supplier">
                        </div>
                    </div>
                </div>
                <!-- Bundling -->
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Bundling Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="bundling_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Bundling Unavailability Reasons</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="bundling_unavailability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Bundling Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="bundling_location">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-5">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    Section 5 : ORT Corner Assessment <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">ORT Corner Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="ort_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">ORT Corner Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="ort_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">ORT Corner Functionality</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="ort_reason">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-6">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                    Section 6 :Equipment  Availability and Status<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseSix" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="equipment_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Functionality</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="equipment_functionality">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="equipment_location">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-7">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                    Section 7 : Supplies Availability<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseSeven" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="supplies_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="supplies_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Availability of Testing Supplies </span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="testingSuppliesAvailability">
                        </div>
                    </div>
                </div>
				<div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Testing Supplies Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="testing_supplies">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Suppliers</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">
                        <div class="chart" id="ch_suppliers">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-8">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                    Section 8 : Resources Availability<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseEight" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title"> Resource Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="resource_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Resource Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="resource_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Suppliers</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="resource_suppliers">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="panel panel-default analytics_row section" data-survey='ch' id="ch-section-9">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                    Section 9 : Community Strategy <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
      <div id="collapseNine" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                <div class="portlet-title">
                    <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Establishment of Community Units Support</span><span class="sizer">Click to Enlarge</span></h6>
                </div>
                <div class="portlet-body">

                    <div class="chart" id="chcommunity_units">
                    </div>
                </div>
            </div>
         <div class="medium-graph">
                <div class="portlet-title">
                    <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Community Cases Management</span><span class="sizer">Click to Enlarge</span></h6>
                </div>
                <div class="portlet-body">
				<div class="chart" id="chCases">
                    </div>
                </div>
            </div>
       <div class="medium-graph">
                <div class="portlet-title">
                    <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Community level Staff availability and Training</span><span class="sizer">Click to Enlarge</span></h6>
                </div>
                <div class="portlet-body">
					<div class="chart" id="chIMCITraining">
                    </div>
                </div>
            </div>
           </div>
           </div>
           </div>
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                    Section 1 : Facility Information <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>

                </a>
            </h4>
        </div>
        <div id="collapseTen" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph" >
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Facility Ownership</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">


                        <div class="chart" id="MNHfacility_ownership">

                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Levels of Care</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHfacility_levels">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Facility Type</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHfacility_type">


                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Conducting Deliveries</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="DeliveryReasons">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Reasons For Not Conducting Deliveries</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MainDeliveryReasons">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Nurses and Beds Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="NnB">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">24 Hour Service Provision</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="24Hr">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Health Facility Management</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="HFM">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-2">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                    Section 2 : Facility Data And Maternal And Neotanal Service Delivery <span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>

                </a>
            </h4>
        </div>
        <div id="collapseEleven" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Provision of Data on Deliveries Conducted (2013-2014)</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHdeliveries">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Provision of BEmONC Signal Functions</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="BEMONCQuestions">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Reason why BEmONC Signal Function is not Provided</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="BEMONCReasons">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Provision of CEmONC</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="CEmONC">
                        </div>
                    </div>
                </div>

                <div class="medium-graph">
                    <div class="portlet-title">

                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Reason why Blood Transfusion is not performed</span><span class="sizer">Click to Enlarge</span></h6>

                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="TransfusionReasons">
                        </div>
                    </div>
                </div>
				<div class="medium-graph">
                    <div class="portlet-title">

                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main source of Blood</span><span class="sizer">Click to Enlarge</span></h6>

                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="bloodmainsource">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Reasons For Not Conducting CS</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="CEOCReasons">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">

                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">HIV Testing and Counselling</span><span class="sizer">Click to Enlarge</span></h6>

                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHhiv">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Provision of New Born Care</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHnewborn">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Provision of Kangaroo Mother Care</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHkmc">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Delivery Preparedness</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="delivery_preparedness">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
		    <!--
		<div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-2">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
		<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
		</a>
		</h4>
		</div>
		<div id="collapseTen" class="panel-collapse collapse">
		<div class="panel-body">
		
		</div>
		</div>
		</div>
		-->
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-3">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">
                    Section 3 : Guidelines, Job Aid and Tools Availability<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseTwelve" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Guidelines</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHguidelines">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Job Aids</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHjob_aids">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Tools</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHtools">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-4">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">
                    Section 4: Staff Training<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseThirteen" class="panel-collapse collapse">
            <div class="panel-body">

                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Service Training Before & After 2010</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhStaffAvailability">
                        </div>
                    </div>
                </div>
                <!--<div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Retention</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHstaffRetention">
                        </div>
                    </div>
                </div>-->
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Staff Availability During Assessment</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHStaffTraining">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-5">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen">
                    Section 5 : Commodity Availability<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>

                </a>
            </h4>
        </div>
        <div id="collapseFourteen" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHcommodity_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Reason for Commodity Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart"id="MNHcommodity_unavailability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Location of Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart"id="MNHcommodity_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Supplier</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart"id="MNHcommodity_supplier">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-6">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen">
                    Section 6 : Commodity  Usage<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseFifteen" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Commodity Consumption</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHcommodity_consumption">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Duration Of Unavailability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHunavailability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">What happened when the Commodity Was Unavailable?</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHReason">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-7">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen">
                    Section 7 of 8 :I.Equipment Availability and Functionality<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseSixteen" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhequipment_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Functionality</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhequipment_functionality">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Equipment Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhequipment_location">
                        </div>
                    </div>
                </div>
                
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Testing Supplies Availability </span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhtesting_availability">
                        </div>
                    </div>
                </div>
               <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Testing Supplies Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhtesting_supplies">
                        </div>
                    </div>
                </div>
                </div>
               </div>
              </div>
              <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-7">
        		<div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen">
                    Section 7 of 8 :II.KITS/SETS Availability<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseSeventeen" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title"> KITS/SETS Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhDelivery_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title"> KITS/SETS Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhDelivery_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title"> KITS/SETS Functionality</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhDelivery_functionality">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title"> Supplies Name Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhsupplies_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">  Supplies Name Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhsupplies_location">
                        </div>
                    </div>
                </div>
                </div>
               </div>
              </div>
              <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-7">
        		<div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen">
                    Section 7 of 8 :III.Resource  Availability<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseEighteen" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="panel-body">
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Running Water Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhresource_availability">
                        </div>
                    </div>
               </div>
               <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Running Water Location </span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhresource_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Running Water Source</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhwatersource">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Water Storage Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhwateravailability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Community Main Water Source</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhresource_mainSource">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Provision of Waste Disposal</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhresource_wasteDisposal">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Electricity Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhequipment_electricity">
                        </div>
                    </div>
                </div>
                 <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Electricity Supplier</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhelectricitysupplier">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Electricity Source</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="mnhelectricitysource">
                        </div>
                    </div>
                </div>
                </div>
                <div class="panel-body">
           		<div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Availability</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHsupplies_availability">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Supplies Location</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHsupplies_location">
                        </div>
                    </div>
                </div>
                <div class="medium-graph">
                    <div class="portlet-title">
                        <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Main Supplier</span><span class="sizer">Click to Enlarge</span></h6>
                    </div>
                    <div class="portlet-body">

                        <div class="chart" id="MNHsupplies_supplier">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="panel panel-default analytics_row section" data-survey='mnh' id="mnh-section-8">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseNineteen">
                    Section 8 : Community Strategy<span class="show-collapse"><span class="txt">Click to Expand</span><i class="fa fa-chevron-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapseNineteen" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="medium-graph">
                <div class="portlet-title">
                    <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Establishment of Community Units Support</span><span class="sizer">Click to Enlarge</span></h6>
                </div>
                <div class="portlet-body">

                    <div class="chart" id="community_units">
                    </div>
                </div>
            </div>
            <div class="medium-graph">
                <div class="portlet-title">
                    <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Community MNH training</span><span class="sizer">Click to Enlarge</span></h6>
                </div>
                <div class="portlet-body">

                    <div class="chart" id="community_cases">
                    </div>
                </div>
            </div>
            <div class="medium-graph">
                <div class="portlet-title">
                    <h6><i class="fa fa-bar-chart-o"></i><span class="graph-title">Referred Cases</span><span class="sizer">Click to Enlarge</span></h6>
                </div>
                <div class="portlet-body">

                    <div class="chart" id="imci_trainings">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
