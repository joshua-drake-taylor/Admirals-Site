<?php

    /* Redirects to newest article */

        $link = mysqli_connect("xxxxxxx", "xxxxxxx","xxxxxxx","xxxxxxx");    
        
    if(mysqli_connect_error()) {
        echo "There was an error connecting to the database.";
    }
    $query = "SELECT id FROM articles";
    $articleid = "";
    if ($result = mysqli_query($link, $query)) {
        $values = array("");
        while ($fetched = mysqli_fetch_array($result)) {
            array_push($values, $fetched['id']);
        }
        $articleid = max($values);
    }
    header( 'Location: http://www.portlandadmirals.com/news/article.php?id='.$articleid) ;

?>
