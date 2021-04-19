<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM clients ORDER BY created_at DESC");
$query = $conn->query("SELECT * FROM clients ORDER BY created_at DESC");
$result = $conn->query("SELECT * FROM clients");
$pay = $conn->query("SELECT * FROM clients WHERE payed = TRUE");
$count = $result->num_rows;
$count2 = $pay->num_rows;
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
}
?>
<!doctype html>
<html lang="en">

<!--header-->
<?php
//include header
include "header.php";
?>

<body class="bg-gray-100">
    <div style="z-index: 99;position: fixed;"><?php include "sidebar.php" ?></div>
    <div style="position: fixed; width:100%; z-index:98;"><?php include_once("menu.php") ?></div>
    <!--pop button for email form-->
    <button onclick="myFunction()" style="position: absolute; right:15px; bottom:0px; z-index:102;" class="ring-0 focus:outline-none">
        <svg class="w-12 h-12 m-5 bg-green-500 hover:bg-green-800 rounded-full p-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
        </svg>
    </button>

    <!--display the email form-->
    <div id="myDIV" style="position: absolute; right:30px; bottom:0px; z-index:101; display:none">
        <?php include("emailpop.php") ?>
    </div>

    <!--grid top columns-->
    <div class="p-8">

        <!--grid top columns end-->
        <div class="mt-8" style="position: relative; z-index:1;">

            <!-- Apion CRM v0.1+ -->
            <div class="flex flex-col">
                <header class="bg-green-600 p-2">
                    <div class="flex items-center w-atuo mx-auto justify-between">
                        <h1 class="text-2xl h-full font-bold text-white uppercase text-left bg-green-800 p-2 rounded-br-2xl">
                            Client Dashboard
                        </h1>
                        <div class="flex shadow bg-green-600 justify-end w-auto " style="right: 0px;">
                            <div class="whitespace-nowrap text-center bg-yellow-500 p-1">
                                <div class="rounded-md">
                                    <p class="text-white text-sm border-b border-white">OUTSTANDING</p>
                                </div>
                                <div class="text-xs font-bold text-white"><?php echo $count - $count2; ?></div>
                            </div>
                            <div class="whitespace-nowrap text-center bg-white p-1">
                                <div class="rounded-md">
                                    <p class="text-green-700 text-sm border-b border-black">PAYED</p>
                                </div>
                                <div class="text-xs font-bold text-green-700"><?php echo $count2; ?></div>
                            </div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="max-w-3x1 mx-auto py-2">
                        <!-- display user content -->
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 rounded-md">
                                    <table class="min-w-full divide-y divide-gray-200 flex-wrap">
                                        <thead class="bg-green-500">
                                            <tr>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider">
                                                    Client Information
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    unique id
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Job Type
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Inspection<br> Date
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Inspection<br> Status
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Quoted
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Date<br>of JOB
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Invoice#
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    Cost
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                    payed
                                                </th>
                                                <td scope="col" class="px-4 py-4 text-center text-xs uppercase border-l border-white text-center bg-green-600 hover:bg-green-800">
                                                    <?php
                                                    if (empty($row['client_id'])) { ?>
                                                        <a href="job.php" class="text-white animate-pulse">+ Job</a>
                                                    <?php } else { ?>
                                                        <a href="job" class="text-white">+ Job</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </thead>
                                        <?php while ($row = $query->fetch_array()) { ?>
                                            <tbody class="bg-white divide-y divide-white">
                                                <!--table information-->
                                                <tr>
                                                    <td class="px-2 py-4 whitespace-nowrap bg-green-500 hover:bg-green-600 border-r border-white">
                                                        <div class="flex items-center">
                                                            <div class="grid gap-1">
                                                                <div class="text-sm font-medium text-white font-bold">
                                                                    <!--first/last name-->
                                                                    Name: <a href="edit?e=<?php echo $row['client_id'] ?>"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></a>
                                                                </div>
                                                                <!--email-->
                                                                <div class="text-xs text-white">
                                                                    Email: <?php echo $row['email']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--unique id for clients-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center bg-green-400 border-r border-white border-b rounded-br-3xl hover:bg-green-500">
                                                        <a href="edit?e=<?php echo $row['client_id'] ?>">
                                                            <div class="text-sm text-white"><?php echo $row['client_id']; ?></div>
                                                        </a>
                                                    </td>
                                                    <!--created-->
                                                    <!--<td class="px-4 py-4 whitespace-nowrap text-center">
                                                <div class="text-sm text-gray-500">
                                                <?php
                                                //echo the date created for client information
                                                $date = strtotime($row['created_at']);
                                                echo date('j, F Y', $date);
                                                ?>
                                                </div>
                                                </td>-->
                                                    <!--contact type-->
                                                    <!--<td class="px-4 py-4 whitespace-nowrap text-center">
                                                    <div class="text-sm text-gray-500 ml-5">
                                                    <?php
                                                    //if there is no status 
                                                    if ($row['contact'] == 'Email') { ?>
                                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                        </svg>
                                                    <?php } elseif ($row['contact'] == "Call") { ?>
                                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                        </svg>
                                                    <?php } else { ?>

                                                    <?php } ?>
                                                    </div>
                                                </td>-->
                                                    <!--jobtype-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                                        <div class="text-sm text-gray-500"><?php echo $row['job_type']; ?></div>
                                                    </td>
                                                    <!--inspection date-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                                        <div class="text-sm text-gray-500">
                                                            <?php
                                                            if (empty($row['inspec_day'])) {
                                                            } else {
                                                                $inspec = $row['inspec_day'];
                                                                echo date("d/m/Y", strtotime($inspec));;
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <!--displays inspection status-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                                        <?php
                                                        //if there is no status 
                                                        if (empty($row['inspec_day'])) { ?>
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-white">
                                                                <?php echo "Unset"; ?>
                                                            </span>
                                                        <?php } elseif (!empty($row['inspec_day']) && empty($row['inspec_dayrt'])) { ?>
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-white">
                                                                <?php echo "in-progress"; ?>
                                                            </span>
                                                        <?php } elseif ($row['inspec_day'] == TRUE  && $row['inspec_dayrt'] == TRUE) { ?>
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                                <?php echo "completed"; ?>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <!--display inspection ends here-->
                                                    <!--quoted-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['quotation'])) { ?>
                                                            <!--does nothing-->
                                                        <?php } else {
                                                            echo "True";
                                                        } ?>
                                                    </td>
                                                    <!--job date-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['day_of_job'])) {
                                                        } else {
                                                            $doj = $row['day_of_job'];
                                                            echo date("d/m/Y", strtotime($doj));;
                                                        }
                                                        ?>
                                                    </td>
                                                    <!--invoice id-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                        <?php echo "LEA" . $row['invoice_id']; ?>
                                                    </td>
                                                    <!--cost for job-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['cost'])) { ?>
                                                            $
                                                        <?php } else { ?>
                                                            <?php
                                                            echo "$" . number_format($row['cost']); ?>
                                                        <?php } ?>
                                                    </td>
                                                    <!--amount payed by client-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center border-r border-gray-200">
                                                        <?php
                                                        echo "$" . number_format($row['payed']); ?>
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                                        <div class="text-sm text-gray-500 ml-2 flex justify-center">
                                                            <div class="p-2">
                                                                <a href="edit?e=<?php echo $row['client_id'] ?>" class="text-gray-400 hover:text-gray-800">
                                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                </main>

            </div>
        </div>
    </div>
    </div>
    </head>
    <!--sidebar menu-->

    <footer class="footer"><?php include_once('hfooter.php'); ?></footer>
</body>
<!--navbar script-->
<script src="javascript/navbar.js"></script>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

</html>