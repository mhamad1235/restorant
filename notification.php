<?php 

    include "auth/database.php";

    $table_id=$_GET['table_id'];
    
    $query="select * from temporary_order where table_id=$table_id";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);

    if($count>0){

    $query2="select * from notification where table_id=$table_id";
    $result2=mysqli_query($connect,$query2);
    $count2=mysqli_num_rows($result2);
   
    if($count2<=0){
        $queryy="insert into notification(table_id,weight) values('$table_id',0)";
            $resultt=mysqli_query($connect,$queryy);
            echo "ئاگادارکردەنەوەکە سەرکەووتووبوو";
    }else{
    while($data=mysqli_fetch_array($result2)){
        if($data['weight']==0){
            
            $query3="update  notification set weight=1 where table_id=$table_id";
            $result3=mysqli_query($connect,$query3);
            echo "ئاگادارکردەنەوەکە بە سەرکەووتووی نوێکرایەوە";
        }else if($data['weight']==1){
            $query4="update  notification set weight=2 where table_id=$table_id";
            $result4=mysqli_query($connect,$query4);
            echo "ئاگادارکردەنەوەکە بە سەرکەووتووی نوێکرایەوە";
        }else{
            $query5="update  notification set weight=2 where table_id=$table_id";
            $result5=mysqli_query($connect,$query5);
            echo "ئاگادارکردەنەوەکە سەرکەووتووبوو";
        }
    }





    }
    }
