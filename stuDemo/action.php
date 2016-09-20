<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/6/18
 * Time: 14:12
 */
try{
    $pdo=new PDO("mysql:host=localhost;dbname=test","root","");
}catch(PDOException $e){
    die($e->getMessage());
}

switch($_GET['action']){
    case 'add':
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $age=$_POST['age'];
        $classid=$_POST['classid'];

        $sql="INSERT INTO stu VALUES (null,'$name','$sex','$age','$classid')";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('success');window.location='index.php'</script>";
        }else{
            echo "<script>alert('fail');window.history.back()</script>";
        }
        break;
    case 'del':
        $id=$_GET['id'];
        $sql="delete from stu where id={$id}";
        $pdo->exec($sql);
        header("Location:index.php");
        break;
    case 'edit':
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $age=$_POST['age'];
        $classid=$_POST['classid'];
        $id=$_POST['id'];

        $sql="update stu set name='{$name}',sex='{$sex}',age='{$age}',classid='{$classid}' where id={$id}";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('success');window.location='index.php'</script>";
        }else{
            echo "<script>alert('fail');window.history.back()</script>";
        }
        break;
}