<?php
if(!defined("IS_INCLUDED")){header("Location:unauthorised_error.php");}
?>
<!-- .breadcrumb -->
<?php
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
foreach($crumbs as $crumb){
    $cru = ucfirst(str_replace(array("index","?page=",".php","_","&"),array("","",""," "," > "),$crumb) . ' ');
    $spos = strpos($cru, '=');
    if($spos == true){
        $cru = substr_replace($cru, '', $spos);
    }
    if($crumb == 'index.php'){
        $cru = 'Dashboard';
    }
}
?>
<!--<ul class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="#"><i class="fa fa-list-ul"></i> <?php /*echo $cru; */?></a></li>
</ul>-->
<!-- / .breadcrumb -->