<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title><?php echo (isset($title) ? t($title)  : 'My Page'); ?></title>
	<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
        <script type="text/javascript" src="<?php echo FUNCTIONS2_PATH."functions.js";?>"></script>
        <script type="text/javascript" src="<?php echo FUNCTIONS2_PATH."Skrypty.js";?>"></script>
        <script type="text/javascript" src="<?php echo FUNCTIONS2_PATH."Skrypty_FormValidator.js";?>"></script>
        <!--<script src="Includes/functions/functions.js"></script>-->
        <link rel="shortcut icon" href="Resources/img/favicon_no_euro.ico" type="image/x-icon"/><!---->
        <link rel="Stylesheet" type="text/css" href="../Translations/translation.css" />
        <?php if(!$_MOBILE){
            ?>
            <link rel="Stylesheet" type="text/css" href="Resources/CSS/PC/style.css" />
            <link rel="Stylesheet" type="text/css" href="Resources/CSS/PC/styleButton.css" />
            <?php    
        }else{
            ?>
            <link rel="Stylesheet" type="text/css" href="Resources/CSS/Mobile/styleMobile.css" />
            <link rel="Stylesheet" type="text/css" href="Resources/CSS/Mobile/styleMobileButton.css" />
            <?php
            
        }?>
        <meta http-equiv="refresh" content="10801"/>   <!-- Odświeżanie loger: Cookie log =  18h, header (odświerzanie!): 18h01m-->
        <meta charset="utf-8">
            
        <!-- DO BOOTSRAPA -->    
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo FUNCTIONS2_PATH."dropdowns-enhancement.js";?>"></script>-->
        <!--<link rel="stylesheet" href="Resources/CSS/dropdowns-enhancement.css">-->
            
            
        <!--for CHECKLISTY W INSERT I EDIT-->    
        <link rel="stylesheet" type="text/css" href="../ExternSources/dropdown-check-list.1.4/lib/jquery-ui-1.8.13.custom.css">
        <link rel="stylesheet" type="text/css" href="../ExternSources/dropdown-check-list.1.4/lib/ui.dropdownchecklist.themeroller.css">
        <script type="text/javascript"          src="../ExternSources/dropdown-check-list.1.4/lib/jquery-1.6.1.min.js"></script>
        <script type="text/javascript"          src="../ExternSources/dropdown-check-list.1.4/lib/jquery-ui-1.8.13.custom.min.js"></script>
        <script type="text/javascript"          src="../ExternSources/dropdown-check-list.1.4/lib/ui.dropdownchecklist-1.4-min.js"></script>    
</head>
