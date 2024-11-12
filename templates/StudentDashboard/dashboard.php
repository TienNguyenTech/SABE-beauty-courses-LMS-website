<?php $this->assign('title', 'Student Dashboard'); ?>


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

<h1 style="color:#1cc88a">Student Dashboard</h1>

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


