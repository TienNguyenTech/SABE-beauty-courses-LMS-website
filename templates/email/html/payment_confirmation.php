<div>
    <h1>South Adelaide Beauty and Education</h1>
    <h3>Payment Confirmation Email</h3>
    <p>Hi <?= $name ?>,</p>
    <p>Your course payment has been successful, a link to access course material will be sent shortly!</p>
    <p>Your payment for our <?= $courseName ?> course has been successful! <?= $this->Html->link('Click here', ['controller' => 'Courses', 'action' => 'accesscourse', $courseID]) ?></p>
</div>