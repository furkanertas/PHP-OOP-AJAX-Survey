<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anket Uygulama</title>
    <link href="libs/front-end/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="libs/front-end/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require 'init.php';
$a=new Anket();
$a->getOranlar();
?>
<div class="container" style="margin-top: 100px">
    <div class="row" style="width: 555px">
        <div class="alert alert-info">
            Hangi takım şampiyon olur?
        </div>
    </div>
    <div class="row">
        <form method="post" action="" onsubmit="return false" id="form1">
        <div class="col-lg-2" style="margin-left: -13px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class="text-center"> <img src="libs/img/g.jpg" width="78" height="130"></p>
                </div>
                <div class="panel-footer">
                    <p class="text-center"><input type="radio" name="anket" value="0"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class="text-center"> <img src="libs/img/b.jpg" width="80" height="130"></p>
                </div>
                <div class="panel-footer">
                    <p class="text-center"><input type="radio" name="anket" value="1"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class="text-center"> <img src="libs/img/f.jpg" width="91" height="130"></p>
                </div>
                <div class="panel-footer">
                    <p class="text-center"><input type="radio" name="anket" value="2"></p>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="row" style="width: 555px">
        <div class="progress" style="height: 40px">
            <div id="divG" class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $a->getGs(); ?>%">
                <p class="text-left" style="padding: 10px; font-size: 15px" id="g"><?php echo "% ".$a->getGs() ?></p>
            </div>
        </div>
        <div class="progress" style="height: 40px">
            <div id="divB" class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $a->getBjk(); ?>%">
                <p class="text-left" style="padding: 10px; font-size: 15px" id="b"><?php echo "% ".$a->getBjk(); ?></p>
            </div>
        </div>
        <div class="progress" style="height: 40px">
            <div id="divF" class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $a->getFb(); ?>%">
                <p class="text-left" style="padding: 10px; font-size: 15px" id="f"><?php echo "% ".$a->getFb(); ?></p>
            </div>
        </div>
    </div>

</div>
</html>
<script type="text/javascript">
    $(function(){
        $("input[name='anket']").click(function(){
            var deger=$("#form1").serialize ();
            var fbURL="action.php";
            $.ajax  ({
                url:"core/"+fbURL,
                type:"post",
                dataType:"json",
                data:deger,
                success:function(cevap) {
                    $("#g").text(" % "+cevap.gs);
                    $("#divG").width(cevap.gs+"%");
                    $("#b").text(" % "+cevap.bjk);
                    $("#divB").width(cevap.bjk+"%");
                    $("#f").text(" % "+cevap.fb);
                    $("#divF").width(cevap.fb+"%");
                }
            });
        });
    })
</script>