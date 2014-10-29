<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  <!-- Force Latest IE rendering engine -->

<meta name="description" content="<?php echo $application_description; ?>">
<meta name="keywords" content="<?php echo implode(', ', $application_keywords); ?>">
<meta name="author" content="<?php echo $application_authors; ?>">

<link rel="shortcut icon"  href="<?php echo base_url(); ?>/images/favicon.ico">

<title><?php echo $application_title; ?></title>

<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-language-english.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-language-english-indicator.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/offline/themes/offline-theme-default.css');?>">

<?php $this->load->view($application_css); ?>

<!-- JS -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/offline/offline.min.js');?>"></script>
<!--script src="<?php echo base_url('assets/bower_components/offlinejs-simulate-ui/offline-simulate-ui.min.js');?>"></script-->
<script>
  $(document).ready(function(){
    Offline.check();
    console.log(Offline.state);
  });
</script>
<?php $this->load->view($application_js); ?>
