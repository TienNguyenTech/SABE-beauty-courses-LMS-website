
<head>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<script type="text/javascript">
    // Need to update this publishable key everytime the payment page doesn't load
    var stripe = Stripe('pk_test_51PnfYBHtFQ126a2JuPBJY2K7NbvEg3WCFqmsBl70wVBgvrL5IzWsnTTiHJnvQL0pP8fi5aeVm9E35kt609AjUkNV00RbT1fgLY');
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
