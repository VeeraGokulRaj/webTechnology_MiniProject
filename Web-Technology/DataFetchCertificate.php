<style>
    .dataFetch, .dataFetch td, .dataFetch th{
        border:1px solid black;        
        border-collapse: collapse;
        padding: 1rem;
    } 
    .dataFetch{
        width:50%;
        margin:auto;
    }
    .doc-image{
        width:100px;
        height:100px;
    }
    /* .acceptButton:hover{
        background-color: black;
    } */
    
</style>

<?php
$con= new mysqli("localhost","root","","miniproject");  //DataBase connectivity FileReq '$reqFile'
if($con->connect_error){
    die("Failec to connect: ".$con->connect_error);
}
// else{
//         echo"DONE";
//     }
$query="SELECT * FROM certificate_verify";
// $query="SELECT Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason FROM stuformdetail";
$result=mysqli_query($con,$query);
$numRow=mysqli_num_rows($result);
if($numRow>0){
    echo '<table class="dataFetch"><tr><th>Name</th><th>Regno</th><th>Dept</th><th>Year</th><th>Sem</th><th>Availed</th><th>ODstDate</th><th>ODendDate</th><th>ODreqDays</th><th>FileReq</th><th>Reason</th><th>Approve</th><th>Decline</th></tr>';
    while($row=mysqli_fetch_assoc($result)){
        $DocReq=$row['FileReq'];
        echo'<pre>';
        echo '<tr>';
        echo '<td>' .$row['Name']. '</td>';
        echo '<td>' .$row['Regno']. '</td>';
        echo '<td>' .$row['Dept']. '</td>';
        echo '<td>' .$row['Year']. '</td>';
        echo '<td>' .$row['Sem']. '</td>';
        echo '<td>' .$row['Availed']. '</td>';
        echo '<td>' .$row['ODstDate']. '</td>';
        echo '<td>' .$row['ODendDate']. '</td>';
        echo '<td>' .$row['ODreqDays']. '</td>';
        echo "<td> <img  style='width: 100px;'class='doc-image' src='CertificateValidation/$DocReq' alt='Required Document'/> </td>";
        echo '<td>' .$row['Reason']. '</td>';
        echo "<td><a class='acceptButton' href='hodPage.php?reg=".$row['Regno']."&date=".$row['ODstDate']."&sts=3'><i class='bi bi-hand-thumbs-up' style='color: blue; padding-left:40%;'></i></a></td>";
        echo "<td><a href='hodPage.php?reg=".$row['Regno']."&date=".$row['ODstDate']."&sts=4'><i class='bi bi-hand-thumbs-down' style='color: red; padding-left:40%'></i></a></td>";
        echo '</tr>';
        
        echo'<pre>';
    }
    echo "</table>";
}
else{
    echo    "<h3 style='color: green;font-size: 30px;  text-align: center;'>Record not Found!</h3>";
}
?>