
<?php
include("../Assests/connection/connection.php");
session_start();




 $selQry = "select * from tbl_chat c inner join tbl_tutor b on (b.tutor_id=c.chat_totid) or (b.tutor_id=c.chat_fromtid) where b.tutor_id='".$_SESSION["tid"]."' order by chat_datetime";
    $rowdis=$con->query($selQry);
     while($datadis=$rowdis->fetch_assoc())
  
    {
        if ($datadis["chat_fromuid"]==$_GET["id"]) {

            $selQry1= "select * from tbl_user where user_id  ='".$_GET["id"]."'";
    $rowdis1=$con->query($selQry1);
     if($datadis1=$rowdis1->fetch_assoc())
  
{
            
?>

<div class="chat-message is-received">
    <img src="../Assests/File/User/Photo/<?php echo $datadis1["user_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis1["user_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
    <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>

<?php
        }

} else {
    
?>
<div class="chat-message is-sent">
    <img src="../Assests/File/Tutor/Photo/<?php echo $datadis["tutor_photo"] ?>" alt="">
    <div class="message-block">
        <span><?php echo $datadis["tutor_name"] ?></span>
        <div class="message-text"><?php echo $datadis["chat_content"] ?></div>
    </div>
</div>
        <div class="chat-message" style="margin: 0px; padding: 0px" >

</div>
<?php
    }

        }
    


?>