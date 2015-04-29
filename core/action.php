<?php
require '../init.php';
$an=new Anket();
$an->setPost("anket");
$an->kaydet();
$an->getOranlar();
$don["gs"]=$an->getGs();
$don["bjk"]=$an->getBjk();
$don["fb"]=$an->getFb();
echo json_encode($don);

