<?php
	include "connect_db.php";

$name = $_REQUEST[name];

 $sql ="select * from ".$name;
 $result = mysql_query($sql,$connect);
 mysql_query(" set names euckr ");

	$total_record = mysql_num_rows($result);


   echo "[";

   // ��ȯ�� �� ���ڵ庰�� JSONArray �������� �����
   for ($i=0; $i < $total_record; $i++)
   {
      // ������ ���ڵ�� ��ġ(������) �̵�
      mysql_data_seek($result, $i);
      // �ϳ��� ���ڵ� ��������
      $row = mysql_fetch_array($result);

	if($name=='download')
     		echo "{\"down\":\"$row[down]\"}";
    else if($name=='notice')
     		echo "{\"id\":\"$row[id]\",\"message\":\"$row[message]\",\"send\":\"$row[alarm]\"}";
    else if($name=='versionup')
     		echo "{\"message\":\"$row[message]\",\"send\":\"$row[alarm]\",\"version\":\"$row[version]\"}";


   // ������ ���ڵ� ������ ,�� ���δ�. �׷��� ������ ������ �Ǵϱ�.
   if($i<$total_record-1){
      echo ",";
   }

   }
   // JSONArray�� ������ �ݱ�
   echo "]";
   	mysql_close($connect);

?>