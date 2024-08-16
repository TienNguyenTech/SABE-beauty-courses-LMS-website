<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon-->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="icon">
    <!-- Including the shortcut icon ensures that all browsers, regardless of their version, will correctly find and use this favicon.  -->
    <link href="<?= $this->Url->build('/img/favicon.png') ?>" type="image/x-icon" rel="shortcut icon">

    <title><?= $this->fetch('title') ?></title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin-2.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>

    <style>
        .small-text {
            font-size: 0.8em; /* Adjust as needed */
        }
    </style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build('/') ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3 small-text">South Adelaide Beauty and Education</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">
            <a class="nav-link"
               href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Pages', 'action' => 'display', 'home']) ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Customer Homepage</span></a>
            <a class="nav-link" href="<?= $this->Url->build(['plugin' => null,'controller'=>'AdminDashboard','action'=>'dashboard']) ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Admin Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Functions
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build (['plugin' => null,'plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index']) ?>">
                <i class="fas fa-fw fa-cog"></i>
                <span>Modify Website</span></a>
            <a class="nav-link" href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Courses', 'action' => 'index']) ?>">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Courses</span></a>
            <a class="nav-link" href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Users', 'action' => 'index']) ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span></a>
            <a class="nav-link" href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Enquirys', 'action' => 'index']) ?>">
                <i class="fas fa-fw fa-pen"></i>
                <span>Enquiries</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <?php
                // Determine if the current page is an index page or the admin_dashboard page
                $isIndexPage = $this->getRequest()->getParam('action') === 'index';
                $isAdminDashboardPage = $this->getRequest()->getParam('controller') === 'Pages' && $this->getRequest()->getParam('action') === 'display';

                // Define the URL for the admin dashboard page
                $adminDashboardUrl = $this->Url->build(['plugin' => null,'controller' => 'adminDashboard', 'action' => 'dashboard']);

                // Render the back button based on the page type
                if(!$isAdminDashboardPage) {
                    if(!$isIndexPage) {
                        // If it's not an index page, render the back button
                        echo $this->Html->tag(
                            'button',
                            $this->Html->tag('i', '', ['class' => 'fas fa-arrow-left']) . ' Return',
                            ['onclick' => 'goBack()', 'class' => 'btn btn-secondary']
                        );
                    } elseif($isIndexPage) {
                        // If it's an index page, return to the admin dashboard
                        echo $this->Html->tag(
                            'button',
                            $this->Html->tag('i', '', ['class' => 'fas fa-arrow-left']) . ' Return',
                            ['onclick' => 'returnToAdminDashboard()', 'class' => 'btn btn-secondary']
                        );
                    }
                }
                ?>
                <script>
                    // Function to navigate back
                    function goBack() {
                        window.history.back();
                    }

                    // Function to navigate back to the admin dashboard
                    function returnToAdminDashboard() {
                        window.location.href = '<?php echo $adminDashboardUrl; ?>';
                    }
                </script>

                <!-- Topbar Navbar -->

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if ($this->Identity->isLoggedIn()): ?>
                            <a class="nav-link" href="#" style="color: black" data-toggle="modal" data-target="#logoutModal">Logout</a>
                        <?php endif; ?>
                    </li>
                </ul>

                <!-- Logout Confirmation Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: black;" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: black;">Are you sure you want to logout?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                                <?= $this->Html->link('Yes', ['plugin' => null,'controller' => 'Auth', 'action' => 'logout'], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span><?= $this->ContentBlock->text('copyright-message'); ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout'])?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

<!-- Core plugin JavaScript-->
<?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>

<!-- Custom scripts for all pages-->
<?= $this->Html->script('sb-admin-2.min.js') ?>

<?= $this->fetch('script') ?>
</body>

</html>
