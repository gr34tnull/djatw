<div class="flex flex-col items-center justify-center w-screen h-screen p-20 bg-cover" style="background-image: url({{asset('bg.png')}})">
    <div class="flex flex-col items-center justify-center w-full p-6 bg-white rounded-xl">
        <h1 class="text-xl font-extrabold text-center">3 Months Subscription</h1>
        <h1 class="pb-4 text-sm text-center">500 Download Credits for $100</h1>
        <div class="w-full h-full p-10">
            <div class="w-full absoulte" id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        <p class="text-xs text-center text-gray-900">This is not an automatic subscription payment. Payment will not be deducted from your account without your confirmation.</p>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AYldQPU_7nhdwZMyiN2g5V35zzEJqg7qQGRB1rZYfG9luiHSLJjxRgvBsAtHu_vL9j42YJ-6vOig3In3&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
function initPayPalButton() {
    paypal.Buttons({
    style: {
        shape: 'rect',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',
        
    },

    createOrder: function(data, actions) {
        return actions.order.create({
        purchase_units: [{"description":"3 Months Subscription Service","amount":{"currency_code":"USD","value":100}}]
        });
    },

    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
        // alert('Transaction completed by ' + details.payer.name.given_name + '!');
        location.replace("https://djsaroundtheworld.com/success");
        });
    },

    onError: function(err) {
        console.log(err);
    }
    }).render('#paypal-button-container');
}
initPayPalButton();
</script>