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
        color: #4e73df;
        font-size: 1.5em;
    }

    .dashboard-card p {
        color: #858796;
    }

    .dashboard-card a {
        display: inline-block;
        margin-top: 10px;
        color: #4e73df;
        text-decoration: none;
    }
</style>

<h1 class="h3 mb-2 text-gray-800">Admin Dashboard</h1>

<div class="dashboard-container">
    <!-- Functional Card 1 -->
    <div class="dashboard-card">
        <h2>Users</h2>
        <p>Manage all users here</p>
        <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'index']) ?>">Go to Users</a>
    </div>

    <!-- Functional Card 2 -->
    <div class="dashboard-card">
        <h2>Bookings</h2>
        <p>Manage all bookings here</p>
        <a href="<?= $this->Url->build(['controller'=>'Bookings','action'=>'index']) ?>">Go to Bookings</a>
    </div>

    <!-- Empty Card -->
    <div class="dashboard-card">
        <h2>Feature</h2>
        <p>Description of the feature</p>
        <!-- Link to feature -->
        <!-- <a href="<?= $this->Url->build(['controller'=>'FutureController','action'=>'futureAction']) ?>">Go to Future Feature</a> -->
    </div>

</div>


