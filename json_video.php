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

      echo "{\"title\":\"$row[title]\",\"title_en\":\"$row[title_en]\",\"title_ta\":\"$row[title_ta]\",\"url\":\"$row[url]\",\"downurl\":\"$row[downurl]\"}";

   // ������ ���ڵ� ������ ,�� ���δ�. �׷��� ������ ������ �Ǵϱ�.
   if($i<$total_record-1){
      echo ",";
   }

   }
   // JSONArray�� ������ �ݱ�
   echo "]";
   	mysql_close($connect);

?>