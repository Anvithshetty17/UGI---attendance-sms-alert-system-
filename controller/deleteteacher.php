<?php
include '../config.php';
$admin = new Admin;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teachers</title>
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteteacher'])) {
            // Trim input to remove extra spaces
            $id = trim($_POST['id']);

            // Input validation
            if (empty($id)) {
                echo "<script>alert('Please provide a teacher ID.'); window.history.back();</script>";
                exit;
            }

            // Check if teacher ID exists in the database
            $stmt = $admin->ret("SELECT * FROM `teacher` WHERE `t_id`='$id'");
            if ($stmt->rowCount() > 0) {
                // If teacher ID exists, delete the teacher
                $admin->cud("DELETE FROM `teacher` WHERE `t_id`='$id'", "delete");
                echo "<script>alert('Teacher deleted successfully.');window.location='../dashboard/HOD_main.php';</script>";
            } else {
                // If teacher ID does not exist, show an alert
                echo "<script>alert('Teacher ID not found.'); window.history.back();</script>";
            }
        }
    ?>

    <div class="table-container">
    <h1>Search Teacher</h1>
        <form method="get" action="">
        <label for="id">Teacher ID:</label>
            <div style="display: flex; ">
                
                <input name="id" type="text" id="id">
                <button style="margin-right: 4%;width: 30%;" type="submit">Search</button>
                <button style="margin-right: 4%;width: 30%;" type="button" onclick="goback()">Back</button>
            </div>
            
           
        </form>
    <br><br>
        <h1>Teacher List</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch teachers from the database
                $search_id = isset($_GET['id']) ? trim($_GET['id']) : '';
                if (!empty($search_id)) {
                    $stmt = $admin->ret("SELECT * FROM `teacher` WHERE `t_id`='$search_id'");
                } else {
                    $stmt = $admin->ret("SELECT * FROM `teacher`");
                }
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['t_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['t_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                        <td><?php echo htmlspecialchars($row['t_phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['t_sub']); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['t_id']); ?>">
                                <button type="submit" name="deleteteacher" class="delete-btn">Delete</button>
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
        function goback(){
            window.location.href='../dashboard/HOD_main.php';
        }
    </script>
</body>

</html>
