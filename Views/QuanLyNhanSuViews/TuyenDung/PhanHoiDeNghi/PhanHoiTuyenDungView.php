<?php
    include_once  $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/View_Engine/Template.php';
    $template = new Template("Views", "View_Engine");
    echo $template->render('QuanLyNhanSuViews/TuyenDung/PhanHoiDeNghi/PhanHoiTuyenDungContent', isset($variables) ? $variables : []);
?>