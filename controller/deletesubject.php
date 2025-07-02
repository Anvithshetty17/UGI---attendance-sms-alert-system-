<?php
include '../config.php';
$admin = new Admin;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Subjects</title>
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

        .form-container,
        .table-container {
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

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletesubject'])) {
        // Trim input to remove extra spaces
        $sub_no = trim($_POST['sub_no']);

        // Input validation
        if (empty($sub_no)) {
            echo "<script>alert('Please provide a subject number.'); window.history.back();</script>";
            exit;
        }

        // Check if subject number exists in the database
        $stmt = $admin->ret("SELECT * FROM `subject` WHERE `sub_no`='$sub_no'");
        if ($stmt->rowCount() > 0) {
            // If subject number exists, delete the subject
            $admin->cud("DELETE FROM `subject` WHERE `sub_no`='$sub_no'", "delete");
            echo "<script>alert('Subject deleted successfully.');window.location='../dashboard/HOD_main.php';</script>";
        } else {
            // If subject number does not exist, show an alert
            echo "<script>alert('Subject number not found.'); window.history.back();</script>";
        }
    }
    ?>


    <div class="table-container">
        <h1>Search Subject</h1>
        <form method="get" action="">
            <label for="sub_no">Subject Number:</label>
            <div style="display: flex;">
                <input name="sub_no" type="text" id="sub_no">
                <button style="margin-right: 4%;width: 30%;" type="submit">Search</button>
                <button style="margin-right: 4%;width: 30%;" type="button" onclick="goback()">Back</button>
            </div>
        </form>
        <br><br>
        <h1>Subject List</h1>
        <table>
            <thead>
                <tr>
                    <th>Subject Number</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch subjects from the database
                $search_sub_no = isset($_GET['sub_no']) ? trim($_GET['sub_no']) : '';
                if (!empty($search_sub_no)) {
                    $stmt = $admin->ret("SELECT * FROM `subject` WHERE `sub_no`='$search_sub_no'");
                } else {
                    $stmt = $admin->ret("SELECT * FROM `subject`");
                }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['sub_no']); ?></td>
                        <td><?php echo htmlspecialchars($row['sub_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['sub_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="sub_no" value="<?php echo htmlspecialchars($row['sub_no']); ?>">
                                <button type="submit" name="deletesubject" class="delete-btn">Delete</button>
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