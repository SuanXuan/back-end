<?php
    $temp = $_FILES["file"]["type"] = "";
    $allowedExts = array("jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);        // 获取文件后缀名
    $url = "./index.html";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $keyword = $_POST['ID'];
        $keyword_hash = md5('$keyword');
        echo "$keyword_hash";
        if(!isset($_POST['ID']) || !isset($_POST['Keyword']) || !isset($_POST['email'])){
            $_SESSION['LOGIN'] = 0;
            exit("ID/KeyWord/Email is required");
        }
        if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email'])) {
            $_SESSION['LOGIN'] = 0;
            exit("邮箱格式非法");
        }
        if($_POST['ID'] === "tangyixuan" && $keyword_hash === $_POST['Keyword']) {
            echo '<script>alert("Login Success")</script>';
            sleep(3);
            if ((($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 204800)    // 小于 200 kb
                && in_array($extension, $allowedExts))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    echo "错误：: " . $_FILES["file"]["error"] . "<br>";
                }
                else
                {
                    echo "头像上传成功！";
                    $_SESSION['LOGIN'] = 1;
                }
            }
            else
            {
                echo "非法的文件格式，请返回重新上传头像！";
            }
        }
        else {
            $_SESSION['LOGIN'] = 0;
            echo '<script>alert("Login Fail")</script>';
            sleep(3);
        }
        }
        if($_SESSION['LOGIN'] == 0)
        {
            echo "<script language='javascript' type = 'text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }
/*
 * Created by PhpStorm.
 * User: Suan
 * Date: 2018/11/10
 * Time: 17:34
 */
?>