<?php
include 'config.php';
$admin = new Admin;
require_once 'c:\xampp\htdocs\ugimain\twilio-php-main\twilio-php-main\src\Twilio\autoload.php';

use Twilio\Rest\Client;

try {
    if (isset($_POST['att'])) {
        if (empty($_POST['st_status'])) {
            $error_msg = "Error: No attendance status selected.";
        } else {
            $course = $_POST['whichcourse'];
            foreach ($_POST['st_status'] as $i => $st_status) {
                $stat_id = $_POST['stat_id'][$i];
                $dp = date('Y-m-d');

                if ($st_status != "Present") {
                    // Fetch phone number as a string
                    $phone = $admin->ret("SELECT `st_phone` FROM `students` WHERE `st_id`='$stat_id'");
                    $name = $admin->ret("SELECT `st_name` FROM `students` WHERE `st_id`='$stat_id'");
                    $phonenumber = $phone->fetch(PDO::FETCH_ASSOC)['st_phone'];
                    $studname = $name->fetch(PDO::FETCH_ASSOC)['st_name'];
                    $phonenumber = "+91" . $phonenumber;
                    $customMessage = "Dear Parent, your child $studname was marked Absent in $course on $dp at UCPS. Please ensure regular attendance.";
                    if (!empty($phonenumber)) {
                        $sid    = "AC9f87f5420177ef34ab80286762417a2c";
                        $token  = "8daaa2ab10c073ca39a6276c43181b03";
                        $twilio = new Client($sid, $token);
                        
                        $message = $twilio->messages->create(
                            $phonenumber, // to
                            array(
                                "from" => "+13309358079",
                                "body" => $customMessage
                            )
                        );

                        print($message->sid);
                    } else {
                        $error_msg = "Error: Invalid phone number for student ID $stat_id.";
                    }
                }

                $stat = $admin->cud("INSERT INTO `attendance`(`stat_id`, `course`, `st_status`, `stat_date`) VALUES('$stat_id','$course','$st_status','$dp')", "add");

                $att_msg = "Attendance Recorded.";
            }
        }
    }
} catch (Exception $e) {
    $error_msg = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #FFF;
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
            background: #e7eaf6;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            text-transform: uppercase;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            text-transform: uppercase;
        }

        h3 {
            color: #007BFF;
            margin-bottom: 10px;
            font-size: 1.2rem;
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
            background-color: #113f67; 
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px 0;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background: red;
            transform: translateY(-2px);
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        label {
            display: block;
            margin: 10px 0;
            text-transform: uppercase;
        }

        input,
        select {
            width: calc(50% - 20px);
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px  #113f67; 
            display: block;
            margin-left: auto;
            margin-right: auto;
            transition: border 0.3s ease;
        }

        input:focus,
        select:focus {
            border-color:  #113f67; 
        }

        input[type="submit"] {
            width: 300px;
            padding: 10px 20px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            background: #007BFF;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"]:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            border: 1px solid #113f67; 
            text-align: left;
        }

        th {
            background-color: #113f67;
            color: #fff;
            font-weight: 500;
            text-align: center;
        }

        th[colspan="2"] {
            width: 200px;

        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .option_td {
            text-align: center;
            padding: 10px;
            /* Increase padding for more space */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .option_td input {
            margin: 0 10px;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                margin: 0 10px;
            }

            button,
            input[type="submit"],
            select {
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: left;
        }

        .student-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background-color: #113f67;
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
            color: #007BFF;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="header-row">
            <div class="student-info-card">
                <?php
                if (!isset($_SESSION['t_id'])) {
                    header("location:index.html");
                }

                $t_id = $_SESSION['t_id'];
                $stmt = $admin->ret("SELECT * FROM `teacher` WHERE `t_id`='$t_id'");
                $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>NAME <span class="space"></span><?php echo $row1['t_name']; ?></h3>
                <h3>COURSE <span class="space"></span><?php echo $row1['course']; ?></h3>
                <h3>SUBJECT <span class="space"></span><?php echo $row1['t_sub']; ?></h3>
            </div>
            <div>
                <h1>UDUPI COLLEGE OF PROFESSIONAL STUDIES</h1>
                <h1>TEACHER DASHBOARD</h1>
            </div>
            <form class="logout">
                <button  onclick="logout()"><a href="controller/logout.php">Logout</a></button><br>
                <button onclick="about()"><a href="about.html">about</a></button>
            </form>
        </div>
        <br>

        <div class="main">
            <header>
                <h1>Attendance Management System</h1>
            </header>
            <div>
                <h2>Attendance of <?php echo date('d-m-y'); ?></h2>
                <p>
                    <?php if (isset($att_msg)) echo "<script>alert('$att_msg');window.location='attendance.php';</script>"; ?>
                    <?php if (isset($error_msg)) echo "<script>alert( '$error_msg');window.location='attendance.php';</script>"; ?>
                </p>

                <form action="" method="post">
                    <br>
                    <label style="text-align: center; font-weight:bolder;">Course<span class="space">:</span></label>
                    <select style="text-align: center; font-weight:bolder; text-transform:uppercase;" name="whichbatch" class="input">
                        <option   value="<?php echo $row1['course']; ?>">
                            <?php echo $row1['course']; ?>
                        </option>
                    </select>
                    <input style="margin-left:40%;    background-color: #113f67; " class="bt" type="submit" value="SHOW !" name="batch" />
                </form>
                <br><br><br>

                <form action="" method="post">
                    <div>
                        <label style="text-align: center;font-weight:bolder; ">Your Subject Name is</label>
                        <select style="text-align: center; font-weight:bolder; text-transform:uppercase;" name="whichcourse" class="input">
                            <option value="<?php echo $row1['t_sub']; ?>"><?php echo $row1['t_sub']; ?></option>
                        </select>
                    </div>
                    <br>

                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Reg. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th colspan="2" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['batch'])) {
                                    $i = 0;
                                    $radio = 0;
                                    $batch = $_POST['whichbatch'];
                                    $all_query = $admin->ret("SELECT * FROM `students` WHERE `st_dept`='$batch' ORDER BY st_id ASC");
                                    while ($data = $all_query->fetch(PDO::FETCH_ASSOC)) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
                                            <td><?php echo $data['st_name']; ?></td>
                                            <td><?php echo $data['st_dept']; ?></td>
                                            <td><?php echo $data['st_phone']; ?></td>
                                            <td><?php echo $data['st_email']; ?></td>
                                            <td colspan="2" class="option_td" style="background-color: red;">
                                                <input type="radio" id="option1_<?php echo $radio; ?>" name="st_status[<?php echo $radio; ?>]" value="Present">
                                                <label style="color: white;" for="option1_<?php echo $radio; ?>">Present</label>
                                                <input id="option2_<?php echo $radio; ?>" type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" checked>
                                                <label style="color: white; margin-right: 30px;" for="option2_<?php echo $radio; ?>">Absent</label>
                                            </td>
                                        </tr>
                                <?php
                                        $radio++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </center>
                    <center><br>


                        <input style="background-color: #113f67;" class="bt" type="submit" value="SAVE !" name="att" />

                    </center>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var optionTdList = document.querySelectorAll('.option_td');

            optionTdList.forEach(function(optionTd) {
                var optionRadios = optionTd.querySelectorAll('input[type="radio"]');

                optionRadios.forEach(function(radio) {
                    radio.addEventListener('change', function() {
                        optionRadios.forEach(function(otherRadio) {
                            if (otherRadio !== radio) {
                                otherRadio.checked = false;
                            }
                        });
                        optionTd.style.backgroundColor = radio.checked && radio.value === 'Present' ? 'green' : 'red';
                    });
                });
            });
        });

       
    </script>

</body>

</html>