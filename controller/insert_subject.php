<?php
include '../config.php';
$admin = new Admin;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f0f0f0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            color:  #113f67;
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: bold;
            
            margin-bottom: 20px;
            font-size: 1.8rem;
            text-transform: uppercase;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            text-align: left;
        }

        input, select {
            width: calc(100% -  30px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s ease;
            margin-bottom: 3.5%;
        }

        input:focus {
            background-color: #cccccc4e;
        }

        input {
            text-transform: uppercase;
        }

        button {
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background-color: #113f67; 
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
            font-size: medium;
            text-transform: uppercase;
        }

        button:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="form-container">
    <button id="back" style="margin-left: 88.120%;width: 20%; border-radius: 10px  0px 0px 10px ;  background-color: #113f67; " type="button" onclick="goback()">Back</button>
        <h1>Add Subject Form</h1>
        <form method="post" action="insert_back.php">
            <div>
                <label for="subcode">Subcode:</label>
                <input name="subcode" type="text" id="subcode" placeholder="Enter the subject code" required>
            </div>
            <div>
                <label for="name">Subject Name:</label>
                <input name="name" type="text" id="name" placeholder="Enter the subject name" required>
            </div>
            <div>
                <label for="course">Course:</label>
                <select name="course" id="course" required>
                    <?php
                    $stmt = $admin->ret("SELECT * FROM `course`");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $row['c_name'] ?>">
                            <?php echo $row['c_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <button name="addsubject" type="submit">Submit</button>
        </form>
    </div>
    <script>
        function goback(){
            window.location.href='../dashboard/HOD_main.php';
        }
    </script>
</body>

</html>
