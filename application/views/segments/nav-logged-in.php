<div id="header">
    <div id="site-title">
        <div align="center">
            <h3><a href="#"><img src="<?php echo base_url()?>images/logo_combined.png" /></a> </h3>
        </div>
</div>

    <div class="breadcrumb" id="survey_crumb">
    <li><a id="li_survey"href="<?php echo base_url() ?>home">Home</a></li>
    <li><a id="li_facilities" href="<?php echo base_url().'assessment';?>"> <?php echo $this -> session -> userdata('dName');?> Facilities</a></li>
<div class="ui label small" >
<i class="icon book"></i>
  <span id="current_survey"></span>
</div>
<div class="ui label teal small">
  <i class="icon hospital link"></i>Facilities Targeted
  <a class="detail"><span id="targeted">0</span></a>
</div>
<div class="ui label green link small">
  <i class="icon hospital"></i>Facilities Completed
  <a class="detail"><span id="finished">0</span></a>
</div>
<div class="ui label orange small">
  <i class="icon hospital link"></i>Facilities Not Completed
  <a class="detail orange"><span id="not-finished">0</span></a>
</div>
<div class="ui label red small">
  <i class="icon hospital link"></i>Facilities Not Started
  <a class="detail"><span id="not-started">0</span></a>
</div>

</div>
</div>
