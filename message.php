<?php

$conn = mysqli_connect("sql204.epizy.com", "epiz_27509252", "2kVpdPK6vE48", "epiz_27509252_chatbot") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chat WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");


if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing reply to a varible which we'll send to ajax
    $reply = $fetch_data['replies'];
    echo $reply;
}else{
    echo "Sorry I cannot understand that!";
}

?>