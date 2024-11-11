
<head>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<script type="text/javascript">
    // Need to update this publishable key everytime the payment page doesn't load
    var stripe = Stripe('pk_live_51PBo5YCXtgpHnAtiOBAnkqy3IZ070EKz220PYXiPFE7nw90uMNc6xkQ8RRj7y6bCx3kFgSGoImHigFgxDMU3ojVw00BolGtku9');
    var session = "<?php echo h($sessionId); ?>";
    stripe.redirectToCheckout({ sessionId: session })
        .then(function (result) {
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
</script>
</body>
