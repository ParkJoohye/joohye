<?php
mysql_connect('localhost', 'root', '111111');
mysql_select_db('hisedu');
switch($_GET['mode']){
    case 'insert_gallery':
        $result = mysql_query("INSERT INTO gallery_en (title,url,downurl) VALUES ('".mysql_real_escape_string($_POST['title'])."', '".mysql_real_escape_string($_POST['url'])."', '".mysql_real_escape_string($_POST['downurl'])."')");
	    header("Location: list_gallery_en.php");
        break;

    case 'delete_gallery':
	    mysql_query('DELETE FROM gallery_en WHERE id = '.mysql_real_escape_string($_POST['id']));
	    header("Location: list_gallery_en.php");
        break;

    case 'modify_gallery':
        mysql_query('UPDATE gallery_en SET title = "'.mysql_real_escape_string($_POST['title']).'", url = "'.mysql_real_escape_string($_POST['url']).'", downurl = "'.mysql_real_escape_string($_POST['downurl']).'" WHERE id = '.mysql_real_escape_string($_POST['id']));
        header("Location: list_gallery_en.php");
        break;



}
?>
