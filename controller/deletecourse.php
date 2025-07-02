<?php
include '../config.php';
$admin = new Admin;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
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
            flex-direction: column;
        }

        .form-container, .table-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width:calc(100% - 30px);
            max-width: 700px;
            margin-bottom: 20px;
        }
        .table-container {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            
        }

        h1 {
            color: #FF0000;
            margin-bottom: 20px;
            font-size: 1.8rem;
            text-transform: uppercase;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            text-align: left;
            margin-left: 4%;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin-right: 4%;
            margin-left: 4%;
        }

        button {
            width: 95%;
            height: 41px;
            padding: 10px 0;
            background: #FF0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            
        }

        button:hover {
            background: #cc0000;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background: #FF0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .delete-btn:hover {
            background: #cc0000;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletecourse'])) {
            // Trim input to remove extra spaces
            $c_no = trim($_POST['c_no']);

            // Input validation
            if (empty($c_no)) {
                echo "<script>alert('Please provide a course number.'); window.history.back();</script>";
                exit;
            }

            // Check if course number exists in the database
            $stmt = $admin->ret("SELECT * FROM `course` WHERE `c_no`='$c_no'");
            if ($stmt->rowCount() > 0) {
                // If course number exists, delete the course
                $admin->cud("DELETE FROM `course` WHERE `c_no`='$c_no'", "delete");
                echo "<script>alert('Course deleted successfully.');window.location='../dashboard/HOD_main.php';</script>";
            } else {
                // If course number does not exist, show an alert
                echo "<script>alert('Course number not found.'); window.history.back();</script>";
            }
        }
    ?>

    <div class="table-container">
        <h1>Search Course</h1>
        <form method="get" action="">
            <label for="c_no">Course Number:</label>
            <div style="display: flex;">
                <input name="c_no" type="text" id="c_no">
                <button style="margin-right: 4%; width: 30%;" type="submit">Search</button>
                <button style="margin-right: 4%; width: 30%;" type="button" onclick="goback()">Back</button>
            </div>
        </form>
        <br><br>
        <h1>Course List</h1>
        <table>
            <thead>
                <tr>
                    <th>Course Number</th>
                    <th>Course Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch courses from the database
                $search_no = isset($_GET['c_no']) ? trim($_GET['c_no']) : '';
                if (!empty($search_no)) {
                    $stmt = $admin->ret("SELECT * FROM `course` WHERE `c_no`='$search_no'");
                } else {
                    $stmt = $admin->ret("SELECT * FROM `course`");
                }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['c_no']); ?></td>
                        <td><?php echo htmlspecialchars($row['c_name']); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="c_no" value="<?php echo htmlspecialchars($row['c_no']); ?>">
                                <button type="submit" name="deletecourse" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function goback() {
            window.location.href='../dashboard/HOD_main.php';
        }
    </script>
</body>

</html>
