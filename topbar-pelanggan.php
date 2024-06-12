<nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php echo isset($_SESSION["user_nama"]) ? htmlspecialchars($_SESSION["user_nama"]) : 'Username'; ?>
                </span>
                <img class="img-profile rounded-circle" src="img/person.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./profil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="./logout.php" aria-expanded="false" class="dropdown-item">
                    <i class="icon-logout"></i><span class="nav-text">Logout</span>
                </a>
            </div>
        </li>
    </ul>
</nav>
<style>
    /* Custom CSS for smaller profile image */
    .img-profile {
        width: 30px;
        height: 30px;
    }
</style>