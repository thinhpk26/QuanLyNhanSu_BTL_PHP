<?php declare(strict_types = 1);
    include_once  $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/View_Engine/Template.php';
    $template = new Template("Views", "View_Engine");
    echo $template->render('QuanLyNhanSuViews/TuyenDung/ThucThiTuyenDung/ThucThiTuyenDungContent', isset($variables) ? $variables : []);
?>