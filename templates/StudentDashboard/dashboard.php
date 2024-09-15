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
        color: #1a4332;
        text-decoration: none;
    }

</style>

<h1 class="h3 mb-2 text-gray-800">Student Dashboard</h1>

<div class="dashboard-container">

    <div class="dashboard-card">
        <h2>Courses</h2>
        <p>View all courses here</p>
        <a href="<?= $this->Url->build(['controller'=>'Courses','action'=>'enrolledcourses']) ?>">Go to Courses</a>
    </div>

    <div class="dashboard-card">
        <h2>Profile</h2>
        <p>View my profile</p>
        <?php $userId = $this->request->getSession()->read('Auth.User.id'); ?>
        <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'view', $userId]) ?>">Go to Profile</a>
    </div>


    <!-- Empty Card -->


</div>


