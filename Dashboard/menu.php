<!-- Apion CRM v0.1+ -->
<?php
$hostname = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$query3 = $conn->query("SELECT * FROM users");
if (mysqli_num_rows($query3) > 0) {
    $row3 = mysqli_fetch_assoc($query3);
}
?>
<div>
    <nav class="bg-gradient-to-r from-gray-800 to-gray-700 shadow-md border-b border-gray-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex gap-4 items-center">
                    <!--sidebar menu select-->
                    <span style="font-size:22px;cursor:pointer; color:white;" class="p-3 mr-8" onclick="openNav()" id="menu">&#9776;</span>
                    <a href="./index" class="hover:bg-green-400 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-white font-bold p-2 rounded-md mr-8"><a href="index">AP-CRM</a></h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <div class="relative"><?php include("search.php") ?></div>

                            <!--<a href="home" class="text-white hover:bg-green-700 bg-green-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Client Dashboard</a>-->
                        </div>
                    </div>
                </div>
                <div class="p-2 bg-gray-800 text-xs text-white">
                    <?php
                    echo date('j / m / Y');
                    //echo "Day " . date("l");
                    ?>
                </div>
                <div class="flex items-center gap-2 align-items-center">
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <div class="flex items-center gap-4 relative">
                                <!--drop down menu button-->
                                <div x-data="{ dropdownOpen: false }" class="grid grid-cols-1 relative md:m-0 w-8 h-8 justify-items-center hover:bg-green-400 rounded-full" style="margin-left: 10px;">
                                    <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md focus:outline-none">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="White">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                                    <div x-show="dropdownOpen" class="absolute right-0 w-32 bg-white shadow-2xl z-20 mt-10 mr-5 divide-y divide-gray-400 p-2 rounded-tl-2xl rounded-bl-2xl rounded-br-2xl">
                                        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-500 hover:text-black">
                                            <div class="flex ">
                                                <svg class="h-5 w-5 self-center mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="text-xs"> Help</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

                            </div>
                        </div>
                    </div>
                    <a href="logout.php?logout=<?php echo $_SESSION['user_uid']; ?>" class="block">
                        <div class="flex text-white hover:bg-red-800 bg-red-400 p-2 rounded-full">
                            <svg class="h-5 w-5 self-center mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </nav>
</div>