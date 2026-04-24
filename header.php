<!-- HEADER -->
<div class="navbar navbar-inverse set-radius-zero custom-navbar">
    <div class="container">

        <div class="navbar-header">

            <!-- MOBILE TOGGLE -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- LOGO / TITLE -->
            <div class="logo-title">
                <div class="logo">📚</div>
                <h1 class="system-title">LIBRARY MANAGEMENT SYSTEM</h1>
            </div>

        </div>

    </div>
</div>

<!-- ================= STYLE ================= -->
<style>

/* NAVBAR BACKGROUND */
.custom-navbar {
    background: linear-gradient(135deg, #6a5acd, #2a2a40);
    border: none;
    margin-bottom: 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

/* CONTAINER ALIGNMENT */
.custom-navbar .container {
    padding: 10px 0;
}

/* LOGO + TITLE */
.logo-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

/* ICON LOGO */
.logo {
    font-size: 30px;
    background: rgba(255,255,255,0.2);
    padding: 8px 12px;
    border-radius: 10px;
}

/* TITLE STYLE */
.system-title {
    font-size: 20px;
    font-weight: bold;
    color: #fff;
    margin: 0;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* MOBILE BUTTON */
.navbar-toggle {
    border: none;
    background: rgba(255,255,255,0.2);
    border-radius: 6px;
}

/* ICON BARS */
.navbar-toggle .icon-bar {
    background: #fff;
}

/* HOVER EFFECT */
.custom-navbar:hover {
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .system-title {
        font-size: 16px;
    }

    .logo {
        font-size: 24px;
    }
}

</style>

        <!-- RIGHT SIDE -->
        <?php if($_SESSION['login']) { ?>
        <div class="right-div">
            <button onclick="toggleDarkMode()" class="btn btn-default">🌙</button>
            <a href="logout.php" class="btn btn-danger pull-right">LOG OUT</a>
        </div>
        <?php } ?>

    </div>
</div>

<!-- MENU -->
<?php if($_SESSION['login']) { ?>

<section class="menu-section">
    <div class="container">
        <ul id="menu-top" class="nav navbar-nav navbar-right">

            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
            <li><a href="issued-books.php">Issued Books</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Account <span>▼</span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="my-profile.php">My Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                </ul>
                
            </li>

        </ul>
    </div>
</section>


<?php } else { ?>

<section class="menu-section">
    <div class="container">
        <ul id="menu-top" class="nav navbar-nav navbar-right">

            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#ulogin">User Login</a></li>
            <li><a href="signup.php">User Sign up</a></li>
            <li><a href="adminlogin.php">Admin Login</a></li>

        </ul>
    </div>
</section>

<?php } ?>

<!-- ================= CSS ================= -->
<style>

/* LIGHT MODE */
body {
    margin: 0;
    font-family: Arial;
    background: #f5f7fa;
    color: #000;
    transition: 0.3s;
}

.system-title {
    color: #000;
}

/* MENU */
.menu-section {
    background: #fff;
}

#menu-top a {
    color: #000;
    padding: 12px 15px;
    display: block;
    text-decoration: none;
}

#menu-top a:hover {
    background: #6a5acd;
    color: #fff;
}

/* DROPDOWN */
.dropdown-menu {
    background: #fff;
}

.dropdown-menu a {
    color: #000;
}

/* ================= DARK MODE FIXED ================= */
.dark-mode {
    background: #1e1e2f;
    color: #fff;
}

/* FORCE ALL TEXT WHITE */
.dark-mode,
.dark-mode * {
    color: #120303 !important;
}

/* NAVBAR + MENU */
.dark-mode .navbar,
.dark-mode .menu-section {
    background: #2a2a40 !important;
}

/* ACTIVE MENU */
.dark-mode .menu-top-active {
    background: #ff9800 !important;
    color: #fff !important;
}

/* HOVER */
.dark-mode #menu-top a:hover {
    background: #ff9800;
    color: #fff !important;
}

/* DROPDOWN */
.dark-mode .dropdown-menu {
    background: #2a2a40;
}

/* REMOVE BUTTON COLOR BUGS */
.dark-mode .btn {
    color: #fff !important;
}

</style>

<!-- ================= DARK MODE SCRIPT ================= -->
<script>

// LOAD MODE ON ALL PAGES
document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("darkMode") === "enabled") {
        document.body.classList.add("dark-mode");
    }
});

// TOGGLE DARK MODE
function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("darkMode", "enabled");
    } else {
        localStorage.setItem("darkMode", "disabled");
    }
}

</script>