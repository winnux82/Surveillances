<?php

require_once('config.php');
    //open connection to mysql db


    //fetch table rows from mysql db
    $sql = "select*, DATE_FORMAT(datedebut,'%d-%m-%Y %H:%i') as dateDebutFormat, DATE_FORMAT(datefin,'%d-%m-%Y %H:%i') as dateFinFormat from gdp.habitations where datedebut <= now() and datefin >= now() order by datedebut asc";

    
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    //$json_string = json_encode($data, JSON_PRETTY_PRINT);
    
    //echo json_encode($emparray, JSON_PRETTY_PRINT);
    echo json_encode($emparray, JSON_FORCE_OBJECT);


?>
<script>
    var data = '<?php echo $data; ?>';
    var json = JSON.parse(data);
    console.log(json);
    console.log(json[0]);
</script>

<?php
    //write to json file
    $fp = fopen('empdata.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
?>