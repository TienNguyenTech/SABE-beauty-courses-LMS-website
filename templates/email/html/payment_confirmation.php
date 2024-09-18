<div>
    <h1>South Adelaide Beauty and Education</h1>
    <h3>Payment Confirmation Email</h3>
    <p>Hi <?= $name ?>,</p>
    <p>Your payment for our <?= $courseName ?> course has been successful! <?= $this->Html->link('Click here', ['controller' => 'Courses', 'action' => 'accesscourse', $courseID]) ?></p>
    <a href="<?= $courseURL ?>">Click here</a>
</div>