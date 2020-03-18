<html>
    <head>
        <title>Donation Successful</title>
        <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <style>
		:root{
			--themeColor: rgb(6, 204, 138);
			--baseheadercolor: rgb(161, 248, 201);
		}
		body{
			padding: 0;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
		}
		div.banner{
			margin-left: 15%;
			display: inline-block;
		}
		div.banner h1{
			color: var(--baseheadercolor);
		}
		div.containerr{
			display: grid;
			grid-template-rows: 2fr 8fr 2fr;
        }
        h1{
            color: var(--themeColor);
            font-weight: bold;

        }
		div.topp{
			background-color: var(--themeColor);
		}
		div.bottom{
			display: grid;
			grid-template-columns: 1fr 1fr;
		}
		div.bottom div.rightPad{
			display: grid;
			grid-template-columns: 1fr 1fr;
			grid-template-rows: 1fr 1fr;
		}
		nav{
			float: right;
			margin-right: 15%;
		}
		header{
			display: table;
			clear: both;
			content: "";
			width: 100%;
			padding: 1% 0 1% 0;
		}
		header figure{
			float: left;
		}
		nav ul.rightNav{
			padding-top: 5%;
		}
		nav ul.rightNav li{
			list-style: none;
			float: left;
			padding-left: 20px;
		}
		a{
			text-decoration: none;
			color: var(--baseheadercolor);
		}
		iframe{
			width: 100%;
        }
        div.donateContainer{
            margin: 0 15%;
            /* display: grid;
            grid-template-rows: 0.5fr 2fr; */
        }
        div.column{
            display: grid;
            grid-gap: 2%;
            grid-template-columns: 1fr 1fr;
        }
	 </style> 

    </head>
    <body>
	<div class="containerr">
		<div class="topp">
			<header>
				<!-- <figure>LOGO</figure> -->
				<nav>
					<ul class="rightNav">
						<li><a href="about">About Us</a></li>
						<li><a href="donate.html">Donate</a></li>
						<li><a href="volunteer">Volunteer</a></li>
						<li><a href="contact">Contact</a></li>
					</ul>
				</nav>
				<!-- <br> -->
				<div class="banner">
					<h1><a href="index.html">FOOD BANKS EVERYWHERE</a></h1>
				</div>
			</header>
        </div>
        <div class="donateContainer">
            <?php
                // Connect to database

                $dbh = new PDO("mysql:host=localhost;dbname=000796709", "root", "");
                
                //Get POST parameters

                // $name = $_POST['name'];
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $sel1 = filter_input(INPUT_POST, 'sel1', FILTER_SANITIZE_STRING);
                // $sel1 = $_POST['sel1'];
                $donation = filter_input(INPUT_POST, 'donation', FILTER_SANITIZE_STRING);
                // $donation = $_POST['donation'];

                //insert these values into the database if any of these values are not null
                if($name != '' || $sel1 != '' || $donation != ''){

                    //confirm if the new users username is already in the datebase
                    
                    // $selectQuery = "SELECT * FROM foodbanks WHERE username='?'";       //query statement
                    // $stmt1 = $dbh->prepare($selectQuery);                               //prepare the query

                        try{
                            $query = "INSERT INTO donations (username, selectoption, donation) VALUES (?,?,?)";

                            $stmt = $dbh->prepare($query);
                    
                            $success = $stmt->execute([$name, $sel1, $donation]);
                            // echo json_encode($success);
                            echo($name . " you have successfully donated " . $donation . " to " . $sel1 . "<br>");
                            echo("Thank you for your donation");
                            }catch(Exception $e){
                                echo ("Sorry, your donation was not registered, please refresh the page and try agein!");
                            }
                        //}

                    //echo"<p>insertion successful</p>";
                    }else{
                        echo "Donation Failed <br> Some fields are blank.";
                    //    die();
                }

            ?>
            <br>
            <a href="index.html"><button type="button" class="btn btn-default">Home</button></a>

        </div>

    </div>
    


    </body>
</html>


