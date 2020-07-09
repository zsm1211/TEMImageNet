
<?php
session_start();
$filename = "bak.zip"; 
$zip=new ZipArchive();
if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) { 
    echo 'successfull';
    exit('无法打开文件，或者文件创建失败');
  } 
  echo "atomsegmentation_bupt_fullsuite_2/circularMask/{$_SESSION['val'][$i][10]}.png";
  for($i=0; $i<10; $i++)
  {
  $zip->addFile( "atomsegmentation_bupt_fullsuite_2/circularMask/{$_SESSION['val'][$i][10]}.png");
  }
  $zip->addFile( "atomsegmentation_bupt_fullsuite_2/circularMask/00001.png");
  $zip->close();
header('Content-Type:text/html;charset=utf-8');
header('Content-Disposition:attachment;filename=bak.zip');
$filesize = filesize('./bak.zip');
readfile('./bak.zip');
header('Content-length:'.$filesize);
unlink('./bak.zip')
?>