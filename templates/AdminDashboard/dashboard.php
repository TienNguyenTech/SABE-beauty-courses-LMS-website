<?php $this->assign('title', 'Admin Dashboard'); ?>


<style>
    .dashboard-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .dashboard-card {
        flex: 1 0 30%;
        /* Adjusted to fit 3 cards per row with some gap */
        max-width: 30%;
        /* Ensures that the cards do not exceed 30% of the container width */
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px 0 hsla(0, 0%, 0%, 0.2);
        box-sizing: border-box;
        /* Ensures padding and border are included in the width */
    }

    .dashboard-card h2 {
        margin: 0;
        color: black;
        font-size: 1.5em;
    }

    .dashboard-card p {
        color: black;
    }

    .dashboard-card a {
        display: inline-block;
        margin-top: 10px;
        color: #1cc88a;
        text-decoration: none;
    }

    @media only screen and (max-width: 768px) {
        .topbar .nav-item .nav-link {
            right:10px;
        }

        .dashboard-card {
            flex-direction: column;
        }

        .navbar-nav {
            max-width: 17%;
        }

        .sidebar .nav-item .nav-link {
            width: auto;
            padding: .75rem 0;
        }

        .sidebar .sidebar-heading {
            padding: 0;
        }

        .dashboard-container {
            flex-direction: column;
        }

        .dashboard-card {
            max-width: 100%;
        }

        .h1,
        h1 {
            font-size: 2rem;
        }

        #des{
            display: none;
        }
    }
</style>

<h1 style="color:#1cc88a">Admin Dashboard</h1>

<div class="dashboard-container">
    <!-- Functional Card 1 -->

    <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Enquirys', 'action' => 'index']) ?>"
        class="dashboard-card">
        <h2>Enquiries</h2>
        <p id="des">View all enquiries here</p>
    </a>

    <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Courses', 'action' => 'index']) ?>"
        class="dashboard-card">
        <h2>Courses</h2>
        <p id="des">Manage all courses here</p>
    </a>

    <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Services', 'action' => 'index']) ?>"
        class="dashboard-card">
        <h2>Services</h2>
        <p id="des">Manage all services here</p>
    </a>

    <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Users', 'action' => 'index']) ?>"
        class="dashboard-card">
        <h2>Users</h2>
        <p id="des">Manage all users here</p>
    </a>

    <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Payments', 'action' => 'enrollments']) ?>"
        class="dashboard-card">
        <h2>Enrollments</h2>
        <p id="des">Manage all enrollments here</p>
    </a>

    <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'ExtendedContentBlocks', 'action' => 'index']) ?>"
        class="dashboard-card">
        <h2>Modify Website</h2>
        <p id="des">Modify your website here</p>
    </a>

    <!-- Empty Card -->


</div>