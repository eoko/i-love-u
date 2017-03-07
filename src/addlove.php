<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php
    class visitors
    {
        function __construct()
        {
            $this->checkIp();
        }
        function createFile()
        {
            $fp=fopen("ip.txt","a+");
            if($fp)
            {
                echo "<br /> File created";
                return $fp;
            }
            else
            {
                echo "Error File";
                exit;
            }
        }
        function fetchIp()
        {
            $ip=$_SERVER['REMOTE_ADDR'];
            return $ip;
        }
        function writeFile()
        {
            $fp=$this->createFile();
            $ip=$this->fetchIp();
            $space="\n";
            fwrite($fp,$ip.$space);
        }
        function checkIp()
        {
            $fp=$this->createFile();
            $ip=$this->fetchIp();
            while(!feof($fp))
            {
                $data.=fgets($fp);
            }
            if(!stristr($data, $ip)){
                $this->writeFile();
                $monfichier = fopen('compteur.txt', 'r+');
                $love_count = fgets($monfichier);
                $love_count += 1;
                fseek($monfichier, 0);
                fputs($monfichier, $love_count);
                fclose($monfichier);
            }
        }
    }
    $v=new visitors();
?>
</html>