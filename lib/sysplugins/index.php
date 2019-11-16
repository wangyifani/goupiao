<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>在线文件管理系统</title>
</head>

<body>
  <table border="1" align="center" cellspacing="0" cellpadding="5">
    <caption>
      <h3>在线文件管理系统</h3>
    </caption>
    <tr>
      <th>文件</th>
      <th>类型</th>
      <th>时间</th>
    </tr>
    <?php
    //设置时区
    date_default_timezone_set('PRC');
    $dir = "./";
    //打开目录
    $dd = opendir($dir);
    //循环
    while (false !== $f = readdir($dd)) {
      //去掉无用文件
      if ($f == "." || $f == ".." || $f == 'index.php' || $f == '.DS_Store') {
        continue;
      }
      //var_dump($f);
      echo "<tr>";
      //文件名
      echo "<td><b><a href='{$f}' tanget='_blank'>{$f}</a></b></td>";
      $file = rtrim($dir, "/") . "/" . $f;
      //文件类型
      echo "<td>" . filetype($file). "</td>";
      //文件创建时间
      echo "<td>" . date("Y-m-d H:i:s", filectime($file)) . "</td>";
      echo "</tr>";
      if(is_dir($f)){
        // echo $f;
        $newdir= $dir.$f; //新路径
        // echo $newdir;
        $dk=opendir($newdir);
        while (false !== $ff =readdir($dk)) {
          //如果文件不存在则创建文件
          // echo $ff;
          if(!file_exists("{$newdir}/index.php")){
            copy('./index.php', "{$newdir}/index.php");
          }
        }

      }
    }
    //关闭文件夹
    closedir($dd);
    ?>
  </table>

</body>

</html>
