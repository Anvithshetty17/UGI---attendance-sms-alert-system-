
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        h1 {
            color: darkgreen;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        button {
            background:#113f67;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px 0;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            height: 70px;
            font-weight: bold;
        }

        button:hover {
            background: #28598b;
            transform: translateY(-2px);
        }

        button a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: #f0f0f0;
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

        img {
            width: 110%;
            height: 120PX;
        }

        header {
            background-color: #113f67;

            border-radius: 12PX;
        }

        H1 {
            color: #113f67;
        }

        .b {
            display: flex;
        }

        .b button {

            margin-right: 10px;
        }
    </style>
</head>

<body>
    <br>

    <div class="container">
    <header style="display: flex; align-items: center; justify-content: space-between;">
    <div style="flex: 1;">
        <img style="background-color:#113f67;" src="../logo.png" alt="Logo">
    </div>
    <div style="display: flex; gap: 10px;">
        
        <button style="width: 90%; box-shadow: 0px 0px 15px rgb(0, 0, 0, 0.9);">
            <a href="../about.html">about</a>
            <button style=" width: 100%; box-shadow: 0px 0px 15px rgb(0, 0, 0, 0.9); margin-bottom: 10px; margin-right:13px; background-color: red">
            <a href="../controller/logout.php">logout</a>
        </button>
        </button>
    </div>
</header>

        <div>
            <h1>ADMIN DASHBOARD</h1>
            <div class="b">
                <button onclick="addstudent()" style="width: 100%;" ><a href="../controller/insert_student.php">Add Student</a></button>
                <button onclick="student()" style="background-color:#38598b;"><a href="../controller/deletestudent.php">view Student</a></button>
            </div><br><br>
            <div class="b">
                <button onclick="addteach()" style="width: 100%;"><a href="../controller/insert_teacher.php">Add Teacher</a></button>
                <button onclick="teach()" style="background-color:#38598b;"><a href="../controller/deleteteacher.php">view Teacher</a></button>
            </div><br><br>
            <div class="b">
                <button onclick="addcourse()" style="width: 100%;"><a href="../controller/insert_course.php">Add Course</a></button>
                <button onclick="course()" style="background-color: #38598b;"><a href="../controller/deletecourse.php">view Course</a></button>
            </div><br><br>
            <div class="b">
                <button onclick="addsub()" style="width: 100%;"><a href="../controller/insert_subject.php">Add Subject</a></button>
                <button onclick="sub()" style="background-color: #38598b;"><a href="../controller/deletesubject.php">view Subject</a></button>
            </div><br><br>
        </div>
        <style>
    footer {
        background-color:#113f67;
        color: white;
        padding: 20px 0;
        text-align: left;
        border-radius: 1%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
    }

    footer .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    footer .contact-info,
    footer .info-centers {
        flex: 1;
        padding: 10px;
    }

    footer h3 {
        font-size: 1.2em;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    footer p,
    footer ul {
        font-size: 1em;
        margin: 5px 0;
    }

    footer ul {
        list-style: none;
        padding: 0;
    }

    footer ul li {
        margin: 5px 0;
    }

    footer a {
        color: #FFD700;
        text-decoration: none;
    }

    footer nav {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    footer nav a {
        color: white;
        text-decoration: none;
        font-size: 1em;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    footer nav a:hover {
        background-color: #FFD700;
        color: #2C3E50;
    }

    footer .powered-by {
        margin-top: 10px;
        font-size: 0.9em;
        color: #bbb;
    }

    footer h3 {
        color: white;
    }
</style>
<br><br>
<footer>
    <div class="footer-content">
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p>
                Udupi Group of Institutions, Manipal<br>
                S.No. 421, Opp. CIBM,<br>
                Ananth Nagar, Shivalli, Manipal, Udupi<br>
                Karnataka, 576104<br>
                Mobile: +919844898383, +919611586912
            </p>
            <h3>Connect Us</h3>
            <p>
                <a href="https://www.instagram.com/ugimanipal">instagram</a><br>
                Follow us on <a href="https://www.facebook.com/pages/category/Community-College/Udupi-Group-of-Institutions-Manipal-218252875228563/">faceboook</a><br>
                Watch Videos <a href="https://www.youtube.com/user/levin20">youtube</a><br>
                Telephone: 0820-2570924<br>
                Mobile: +919844898383<br>
                Email: info@udupicolleges.edu.in, admissions@udupicolleges.edu.in
            </p>
        </div>
        <div class="info-centers">
            <h3>Information Centre - Shivamogga</h3>
            <p>
                First Floor, Sri Shaila Complex,<br>
                100ft Road, Opp.Kariyanna Building,<br>
                Vinobanagar, Shivamogga- 577204.<br>
                Mobile: +918050926547
            </p>
            <h3>Information Centre - Uttara Kannada</h3>
            <p>
                Vijayalaxmi Complex, First Floor,<br>
                Sagar Cross, Hosur, Siddapur,<br>
                U.K-581355.<br>
                Mobile: +919141180989
            </p>
            <h3>Information Centre - Goa</h3>
            <p>
                Bluebell, No 6/29/A-1/SF-1,<br>
                Sonarbhat, Saligo, Bardez,<br>
                Goa-403511.<br>
                Mobile: +919503368083
            </p>
        </div>
    </div>
    <div class="footer-content">
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#courses">Courses</a>

            <a href="#contact">Contact</a>
        </nav>
        <div class="powered-by">
            &copy; 2024 Udupi Group of Institutions. All rights reserved. Powered by Legos Graphics Pvt. Ltd
        </div>
    </div>
</footer>
    </div>
    <script>
        function addstudent() {
            window.location.href='../controller/insert_student.php';
        }
        function addteach() {
            window.location.href='../controller/insert_teacher.php';
        }
        function addcourse() {
            window.location.href='../controller/insert_course.php';
        }
        function addsub() {
            window.location.href='../controller/insert_subject.php';
        }
        function student() {
            window.location.href='../controller/deletestudent.php';
        }
        function teach() {
            window.location.href='../controller/deleteteacher.php';
        }
        function course() {
            window.location.href='../controller/deletecourse.php';
        }
        function sub() {
            window.location.href='../controller/deletesubject.php';
        }
    </script>
    <br>
</body>

</html>