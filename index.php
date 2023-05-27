<?php
    include_once 'View_Engine/Template.php';

    $template = new Template('Views/QuanLyNhanSuViews/TuyenDungViews', 'View_Engine');
    echo $template->render('test', []);
?>