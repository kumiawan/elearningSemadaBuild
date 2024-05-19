<?php
session_start();
if (! isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

function renderPage($page)
{
    $allowedPages = ['home', 'pelanggaran', 'data_murid', 'absen_murid', 'permohonan_izin', 'rekap_pelanggaran', 'rekap_absen'];
    if (in_array($page, $allowedPages)) {
        include "{$page}.php";
    } else {
        include '404.php';
    }
}

function isActive($currentPage, $page)
{
    return $currentPage === $page ? 'bg-secondary text-white' : '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="dist/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div aria-label="navbar" class="navbar bg-base-100">
        <div class="flex-1">
            <label for="my-drawer-2" class="btn btn-square btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </label>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <details>
                        <summary>
                            <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </summary>
                        <ul class="p-2 bg-base-100 rounded-t-none z-50">
                            <li><a href="logout.php" class="cursor-pointer">Logout</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>

    <div aria-label="sidebar" class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col p-4">
            <!-- Page content here -->
            <?php renderPage($page); ?>
        </div>
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 min-h-full text-base-content">
                <!-- Sidebar content here -->
                <div class="dropdown dropdown-open">
                    <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-72 text-xl">
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'home'); ?>" href="?page=home">Home</a></li>
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'pelanggaran'); ?>" href="?page=pelanggaran">Pelanggaran</a></li>
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'data_murid'); ?>" href="?page=data_murid">Data Murid</a></li>
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'absen_murid'); ?>" href="?page=absen_murid">Absen Murid</a></li>
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'permohonan_izin'); ?>" href="?page=permohonan_izin">Permohonan Izin</a></li>
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'rekap_pelanggaran'); ?>" href="?page=rekap_pelanggaran">Rekap Pelanggaran</a></li>
                        <li><a class="transition ease-in hover:text-primary <?php echo isActive($page, 'rekap_absen'); ?>" href="?page=rekap_absen">Rekap Absen</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</body>
</html>
