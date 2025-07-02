<?php
// Some code here that outputs content or whitespace
include '../config.php';
$admin = new Admin;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #fff;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1400px;
            padding: 40px;
            margin: 20px;
            background: #e7eaf6;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.9);

            animation: fadeIn 0.5s ease-in-out;
        }

        h1 {
            color: #113f67;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;

            border: 8px solid #113f67;
            border-radius: 10px;
            padding-left: 2%;
            padding-right: 2%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .logout {
            text-align: center;
        }

        button {
            background: #113f67;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px 0;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        button:hover {
            background: red;
            transform: translateY(-2px);
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        .form input,
        .calc input {
            width: calc(50% - 20px);
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: block;
            margin-left: auto;
            margin-right: auto;
            transition: border 0.3s ease;
        }

        label {
            margin-left: 47%;
            text-transform: uppercase;
            font-family: serif;
            font-weight: bold;
        }

        .form input:focus,
        .calc input:focus {
            border-color: #113f67;
        }

        .form input[type="submit"],
        .calc input[type="submit"] {
            width: 300px;
            padding: 10px 20px;
            margin: 10px 0;
            margin-left: 40%;
            border-radius: 5px;
            border: none;
            background: #113f67;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .form input[type="submit"]:hover,
        .calc input[type="submit"]:hover {
            background: #38598b;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        th,
        td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #113f67;
            color: #fff;
            font-weight: 500;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        footer {
           
            text-align: center;
        }

        .calc h2 {

            text-align: center;
            margin-top: 20px;
        }

        .calc h2.green {
            color: white;
            background-color: green;
        }

        .calc h2.red {
            color: white;
            background-color: red;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                margin: 0 10px;
            }

            button,
            .form input[type="submit"],
            .calc input[type="submit"] {
                width: 100%;
            }
        }

        .student-info-card {
            width: 100%;
            max-width: 280px;
            height: 50%;
            background: #113f67;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            margin: 20px 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
        }

        .student-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.65);
            background: #113f67;
        }

        .student-info-card h3 {
            font-size: 1.2rem;
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            color: white;
        }

        .student-info-card h3 .space {
            margin-left: 5px;
            font-weight: 500;
            color: #113f67;
        }

        .student-info-card h3:last-child {
            border-bottom: none;
        }

        .logout button {
            height: 80px;
            width: 200px;
            font-weight: bolder;
            text-transform: uppercase;
        }

        footer #short {
            background-color: #fff;
            color: #113f67;
            text-transform: uppercase;
            font-weight: bold;
        }
        h2{
            font-family: serif;
            font-weight: bold;
            color: white;
            text-align:center ;
            text-transform: uppercase;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-row">
            <div class="student-info-card">
                <?php
                if (!isset($_SESSION['st_id'])) {
                    header("location:index.html");
                    exit();
                }

                $st_id = $_SESSION['st_id'];
                $stmt = $admin->ret("SELECT * FROM `students` WHERE `st_id`='$st_id'");
                $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>NAME <span></span><?php echo $row1['st_name']; ?></h3>
                <h3>COURSE <span class="space"></span><?php echo $row1['st_dept']; ?></h3>
                <h3>PHONE <span class="space"></span><?php echo $row1['st_phone']; ?></h3>
            </div>
            <div>
                <h1>UDUPI COLLEGE OF PROFESSIONAL STUDIES</h1>
                <h1>STUDENT DASHBOARD</h1>
            </div>
            <form class="logout">
                <button onclick="logout()"><a href="../controller/logout.php">Logout</a></button><br>
                <button onclick="about()"><a href="../about.html">about</a></button>
            </form>
        </div>
        <br>
        <div class="form">
            <form action="" method="post">
                <input name="id" type="hidden" value="<?php echo $row1['st_id']; ?>">
                <label for="date">Enter Date <span class="space">:</span></label>
                <input id="date" name="date" type="date" required>
                <input id="check" type="submit" name="check">
            </form>
        </div>
        <br>
        <div class="table-container">
            <center>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Reg. No.</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_POST['check'])) {
                        $id = $_POST['id'];
                        $date = $_POST['date'];
                        $all_query = $admin->ret("SELECT * FROM `attendance` WHERE `stat_id`='$id' and `stat_date`='$date'");
                        while ($data = $all_query->fetch(PDO::FETCH_ASSOC)) {  ?>
                            <tr>
                                <td><?php echo $data['stat_id']; ?></td>
                                <td><?php echo $data['course']; ?></td>
                                <td><?php echo $data['st_status']; ?></td>
                                <td><?php echo $data['stat_date']; ?></td>
                            </tr>
                        <?php
                        }
                        $num = $all_query->rowCount();
                        if ($num == 0) {
                        ?>
                            <tr>
                                <td colspan="3"><label style="font-weight: bold; color:red;" for="">No data found...!     Please enter correct date.</label></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </center>
        </div>
        <br><br>
        <footer>
        <h2>attendance % calculator</h2>
      
            <div class="calc">
                
                <form id="attendanceForm">
                    <input id="attendedclass" name="attendedclass" type="number" placeholder="Enter no of attended class" required>
                    <input id="totalclass" name="totalclass" type="number" placeholder="Enter total no of class" required>
                    <input id="short" name="calc" type="submit">
                </form>
                <div id="result"></div>
            </div>
        </footer>
        <?php include '../footer.php'; ?>
    </div>
    <script>
        document.getElementById('attendanceForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const attendedclass = parseFloat(document.getElementById('attendedclass').value);
            const totalclass = parseFloat(document.getElementById('totalclass').value);
            const resultDiv = document.getElementById('result');

            if (totalclass >= attendedclass && totalclass !== 0) {
                const res = (attendedclass / totalclass) * 100;
                if (res > 75) {
                    resultDiv.innerHTML = `<h2 class="green">NO ATTENDANCE SHORTAGE...!</h2>
                                   <h2>Your attendance is <span class="space">:</span> ${res.toFixed(2)}%</h2>`;
                } else {
                    resultDiv.innerHTML = `<h2 class="red">ATTENDANCE SHORTAGE ...!</h2>
                                   <h2>Your attendance is <span class="space">:</span> ${res.toFixed(2)}%</h2>`;
                }
            } else if (totalclass <= attendedclass) {
                resultDiv.innerHTML = '<h2 class="red">Error: Total classes must be greater than attended classes</h2>';
            } else {
                resultDiv.innerHTML = '<h2 class="red">Error: Total classes cannot be zero</h2>';
            }
        });
    </script>
</body>

</html>
