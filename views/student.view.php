<?php require 'JSON.php'  ?>
<style>
    <?php  include 'views/css/style.css' ?>
</style>

<?php var_dump($_GET['id']); ?>

<br>    <a href="/" style="padding-left: 2em; padding-top: 2em; font-weight: bold">Home</a>
<br><br><br>

<?php $getdata = file_get_contents("studentsCSM.json");
      $data = json_decode($getdata);

      $avgGrade = file_get_contents("avgGrades.json");
      $avg = json_decode($avgGrade);
?>
<?php
    $niz = $_GET['id'];
    $n = 0;
    $s = 0;
    if ( ($avg[$niz-1])->oop != null) {
        $n += $avg[$niz-1]->oop;
        $s += 1;
    } if ( ($avg[$niz-1])->web_programming != null) {
        $n += $avg[$niz-1]->web_programming;
        $s += 1;
    } if ( ($avg[$niz-1])->front_end_programming != null) {
        $n += $avg[$niz-1]->front_end_programming;
        $s += 1;
    } if ( ($avg[$niz-1])->back_end_programming != null) {
        $n += $avg[$niz-1]->back_end_programming;
        $s += 1;
    }
    $print = $n/$s;

    if ($print >= 7) {
        $pass = 'PASS!';
    } else {
        $pass = "FAIL";
    }
?>
<div style="font-size: 18px; font-weight: bold; padding-left: 40px;">
    <label><?= $data[$_GET['id']-1]->id ?></label>
    <label><?= $data[$_GET['id']-1]->firstName ?></label>
    <label><?= $data[$_GET['id']-1]->lastName ?></label>
    <label><?= $data[$_GET['id']-1]->board ?></label>
    <label><?= $print ?></label>
    <label><?= $pass ?></label>
</div>

<div style="padding-left: 100px">
<?php
    $oop = array_column($avg, 'oop');
//    var_dump($oop);
?>
    <table style="width: 450px; text-align: left">
        <tr style="font-weight: bold">
            <td>SUBJECT</td>
            <td>GRADES</td>
        </tr>
        <tr>
            <td>OOP</td>
            <td><?= $avg[$_GET['id']-1]->oop ?></td>
        </tr>
        <tr>
            <td>WEB PROGRAMMING</td>
            <td><?= $avg[$_GET['id']-1]->web_programming ?></td>
        </tr>
        <tr>
            <td>FRONT END PROGRAMMING</td>
            <td><?= $avg[$_GET['id']-1]->front_end_programming ?></td>
        </tr>
        <tr>
            <td>BACK END PROGRAMMING</td>
            <td><?= $avg[$_GET['id']-1]->back_end_programming ?></td>
        </tr>
    </table>
</div>