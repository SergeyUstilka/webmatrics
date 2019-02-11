<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 11.02.2019
 * Time: 15:34
 */

require 'config.php';

$sql = "SELECT * FROM photo";
$stm = $pdo->prepare($sql);
$stm->execute();

$data = [];
$stmt = $pdo->query('SELECT * FROM photo');
while ($row = $stmt->fetch())
{
    $data[$row['name']] = $row['url'] ;
}
    $res  = json_encode($data);
 print_r($res);