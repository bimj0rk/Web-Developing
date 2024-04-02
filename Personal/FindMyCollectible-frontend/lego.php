<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet"  href = "css/main.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist\css\bootstrap.css">
        <link rel = "stylesheet" href = "bootstrap-3.4.1-dist\css\bootstrap.min.css">
        <link rel = "shortcut icon" href = "img/logo.png">
        <title>FindMyCollectible - LEGO Collection</title>
        <meta charset = "8">
    </head>
    <body>
        <div class = "navbar">
            <div class = "container">
                <div class = "row">
                    <div class = "col-md-12">
                        <a href ="index.html">Home </a>
                        <a href = "add.html">Add </a>
                        <a href = "preDb.html">Databases </a>
                        <a href = "find.html">Find</a>
                    </div>
                </div>    
            </div>
        </div>
        <?php
            require("php/connect.php");

            $query = "SELECT * FROM lego";
            $result = mysqli_query($dbcon, $query);
        ?>
        <div class="icon flex-center">
            <div class="container">
                <div class="row">
                	<div class="col-md-12">
                        <div class = "title">
                    		<table align = "center">
								<tr>
									<th class = "flex-center">Name</th>
									<th>ID</th>
									<th>Number of Pieces</th>
									<th>Year</th>
                                    <th>Location</th>
								</tr>
                                <?php
									while($row = mysqli_fetch_array($result)){
										$name = $row['name'];
										$id = $row['id'];
										$no_pieces = $row['no_pieces'];
										$year = $row['year'];
                                        $location = $row['location']
										print "<tr><td>$name</td><td>$id</td><td>$no_pieces</td><td>$year</td><td>$location</td></tr>";
									}
									mysqli_close($dbcon);
								?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>   