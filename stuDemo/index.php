<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>

<script>
        function doDel(id){
            if(confirm("确定删除？")){
                window.location='action.php?action=del&id='+id
            }
        }
</script>

<body>

<center>
    <?php include 'menu.php'; ?>
    <h3>浏览学生信息</h3>
    <table width="600" border="1">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>班级</th>
        <th>操作</th>
    </tr>
    <?php
    //1.连接数据库
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=test","root","");
    }catch(PDOException $e){
        die($e->getMessage());
    }

    $sql="SELECT * FROM stu";
    foreach($pdo->query($sql) as $row){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['age']}</td>";
        echo "<td>{$row['classid']}</td>";
        echo "<td><a href='javascript:doDel({$row['id']})'>删除</a>  <a href='edit.php?id={$row['id']}'>修改</a></td>";
        echo "</tr>";
    }


    ?>

    </table>
</center>

</body>
</html>

<?php
