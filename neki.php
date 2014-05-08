<html>


<body>
<?php
 $dbcnx = @mysql_connect('localhost', 'root', '');
    if (!$dbcnx ) {
        echo( '<p> Komunikacija s strežnikom SUPB ni uspela . </p>');
        exit() ;
    }
    if(!@mysql_select_db('cakalnavrsta', $dbcnx)){
        die('<p>Zahtevana podatkovna baza ne obstaja.</p>');
    }
    else{
        $sql = 'SELECT Navrsti FROM stevilke WHERE ID = 1';
        $result = mysql_query($sql, $dbcnx);
            if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            }
    }
?>
    <form method="post">
        <input type="submit" name="pov" value="Povecaj"/>
    </form>
    
<?php
    if(isset($_POST['pov'])){
        $SQL = "UPDATE stevilke SET Navrsti=(Navrsti+1) WHERE ID = 1";
        $result = mysql_query($SQL);
    }
?>
    <form method="post">
        <input type="submit" name="pom" value="Pomanjsaj"/>
    </form>

<?php
    if(isset($_POST['pom'])){
        $SQL = "UPDATE stevilke SET Navrsti=(Navrsti-1) WHERE ID = 1";
        $result = mysql_query($SQL);
    }
 
    $sql = 'SELECT Navrsti FROM stevilke WHERE ID = 1';
    $result = mysql_query($sql, $dbcnx);
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }else{
        while ($row = mysql_fetch_assoc($result)) {
        echo $row['Navrsti'];
        }
    }
    
?>

</body>
</html>
