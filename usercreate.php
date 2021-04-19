<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM users");
$sql3 = mysqli_query($conn, "SELECT * FROM users");
$query3 = $conn->query("SELECT * FROM users");
if (mysqli_num_rows($sql3) > 0) {
    $row3 = mysqli_fetch_assoc($sql3);
    $row = mysqli_fetch_assoc($sql);
}
?>
<?php
//include header
include "header.php";
?>
<!--header included above-->

<body class="bg-gray-50">
    <?php include "menu.php" ?>

    <div class="px-10 justify-center flex h-auto">
        <div class="flex relative gap-x-5 z-10 pb-8 sm:pb-16 md:pb-20 lg:w-full">

            <div class="h-96 w-auto">
                <main class="mt-10 shadow">
                    <!--forms for registering and sign in-->
                    <div>
                        <form action="register.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="flex flex-col justify-center bg-green-400 p-2 rounded-md">
                                <div class=" flex justify-center p-1">
                                    <h1 class="text-3xl font-bold w-full text-center p-2 text-white uppercase">Create User</h1>
                                </div>
                                <div class="flex justify-center p-1">
                                </div>
                                <input type="text" required name="uname" placeholder="Username" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                                <input name="first_name" required type="text" placeholder="First Name" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                                <input name="last_name" required type="text" placeholder="Last Name" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                                <input name="uemail" required type="text" placeholder="Email" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                                <input name="role" required type="text" placeholder="Role" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                                <input name="password" required type="password" placeholder="Password" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>

                                <p class="text-sm m-2 text-white font-bold">By pressing sign up you accept the terms<br> and conditions.</p>
                                <input type="submit" name="submit" class="cursor-pointer bg-green-500 m-2 p-2 rounded-md text-lg text-white font-bold hover:bg-green-800" value="REGISTER USER"></input>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
            <div class="h-auto w-auto mt-10 bg-white shadow p-2 rounded-md ml-32" style="overflow-y: scroll; overflow-x:hidden;">
                <!-- Display Users -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-green-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-md font-medium text-white uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-md font-medium text-white uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-md font-medium text-white uppercase tracking-wider">
                                                Role
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php while ($row = $sql->fetch_array()) { ?>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <?php echo $row['first_name']; ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                <?php echo $row['email']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">

                                                    <?php if ($row['status'] == "Active now") { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Active
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Offline
                                                        </span>
                                                    <?php } ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <!--users role-->
                                                    <?php echo $row['urole']; ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>
                                            </tr>

                                            <!-- More people... -->
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-96 h-auto bg-white shadow-md mt-10 rounded-t-2xl">
                <div class="w-full bg-green-400 p-4 text-white uppercase rounded-t-2xl">messages</div>
                <div class="p-4 h-96"></div>
                <div class="grid grid-rows p-4 w-full gap-2">
                    <input type="text" placeholder="username" class="bg-gray-100 p-4 rounded-md">
                    <textarea placeholder="Message" class="w-full p-2 bg-gray-50"></textarea>
                    <input type="submit" value="Post" class="p-3 bg-green-500 text-white text-center font-bold">
                </div>
            </div>
        </div>
    </div>

    <?php include "sidebar.php" ?>
    <footer class="footer"><?php include_once('hfooter.php'); ?></footer>
</body>
<!--navbar script-->
<script src="javascript/navbar.js"></script>