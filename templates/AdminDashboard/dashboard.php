<?php $this->assign('title', 'Admin Dashboard'); ?>


<style>
    .dashboard-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .dashboard-card {
        flex: 1 0 30%; /* Adjusted to fit 3 cards per row with some gap */
        max-width: 30%; /* Ensures that the cards do not exceed 30% of the container width */
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px 0 hsla(0, 0%, 0%, 0.2);
        box-sizing: border-box; /* Ensures padding and border are included in the width */
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

</style>

<h1 style="color:#1cc88a">Admin Dashboard</h1>

<div class="dashboard-container">
    <!-- Functional Card 1 -->

    <div class="dashboard-card">
        <h2>Enquiries</h2>
        <p>View all enquiries here</p>
        <!-- Link to feature -->
        <a href="<?= $this->Url->build(['controller'=>'Enquirys','action'=>'index']) ?>">Go to Enquiries</a>
    </div>

    <!-- Functional Card 2 -->
    <div class="dashboard-card">
        <h2>Courses</h2>
        <p>Manage all courses here</p>
        <a href="<?= $this->Url->build(['plugin' => null,'controller'=>'Courses','action'=>'index']) ?>">Go to Courses</a>
    </div>

    <div class="dashboard-card">
        <h2>Services</h2>
        <p>Manage all Services here</p>
        <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Services', 'action' => 'index']) ?> ">Go to Services</a>
    </div>

    <div class="dashboard-card">
        <h2>Users</h2>
        <p>Manage all users here</p>
        <a href="<?= $this->Url->build(['plugin' => null,'controller'=>'Users','action'=>'index']) ?>">Go to Users</a>
    </div>

    <div class="dashboard-card">
        <h2>Enrollments</h2>
        <p>Manage all enrollments here</p>
        <a href="<?= $this->Url->build(['plugin' => null, 'controller' => 'Payments', 'action' => 'enrollments']) ?>">Go to Enrollments</a>
    </div>

    <div class="dashboard-card">
        <h2>Modify Website</h2>
        <p>Modify your website here</p>
        <a href="<?= $this->Url->build(['plugin' => null, 'plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index']) ?> ">Go to Modify Wbesite</a>
    </div>

    <!-- Empty Card -->


</div>


