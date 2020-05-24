<html>

<head>
    <title>Students' List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right,black,white);
            color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "students";

    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if ($connection) {
        echo "";
    } else {
        die("Connection failed because " . mysqli_connect_error());
    }
    $name = $rollno = $nameErr = $rollnoErr = "";
    ?>
    
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["rollno"])) {
            $rollnoErr = "Roll No. is required";
        } else {
            $rollno = test_input($_POST["rollno"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $query = "INSERT INTO student VALUES ($rollno,'$name')";

    mysqli_query($connection, $query)

    ?>
    <div class="container mt-5 mb-5">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Name: <input style="border-radius: 20px" type="text" name="name">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br>
            Roll No: <input style="border-radius: 20px;" type="text" name="rollno">
            <span class="error">* <?php echo $rollnoErr; ?></span>
            <br><br>
            <p><span class="error">* required field</span></p>
            <br>
            <button type="submit" class="btn btn-info" style="border-radius: 20px">Submit</button>
        </form>
    </div>

    <?php
    $query = "SELECT * FROM STUDENT";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) != 0) {
    ?>
        <div class="container mt-5">
            <table class="table table-striped table-dark">
                <tr>
                    <th>Roll No.</th>
                    <th>Name</th>
                </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['rollno'] . "</td><td>" . $row['name'] . "</td></tr>";
            }
        } else {
            echo "<div class='error'>No records found</div>";
        }

            ?>

            </table>
        </div>

</body>

</html>