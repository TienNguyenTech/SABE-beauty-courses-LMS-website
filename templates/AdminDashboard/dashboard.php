<?php $this->assign('title', 'Admin Dashboard'); ?>


<style>
    .dashboard-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .dashboard-card {
        flex: 1 0 200px;
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px 0 hsla(0, 0%, 0%, 0.2);
    }

    .dashboard-card h2 {
        margin: 0;
        color: #1a4332;
        font-size: 1.5em;
    }

    .dashboard-card p {
        color: #858796;
    }

    .dashboard-card a {
        display: inline-block;
        margin-top: 10px;
        color: #76c7b7;
        text-decoration: none;
    }

</style>

<h1 class="h3 mb-2 text-gray-800">Admin Dashboard</h1>

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
        <a href="<?= $this->Url->build(['controller'=>'Courses','action'=>'index']) ?>">Go to Courses</a>
    </div>

    <div class="dashboard-card">
        <h2>Users</h2>
        <p>Manage all users here</p>
        <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'index']) ?>">Go to Users</a>
    </div>



    <!-- Empty Card -->


</div>


