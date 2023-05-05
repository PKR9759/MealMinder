<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form action="payment_process.php" method="POST">
    <input type="textbox" name="name2" id="name" placeholder="enter your name"/><br><br>
    <input type="textbox" name="amt2" id="amt" placeholder="enter your amount"/><br><br>
   <input type="button" name="pay" id="pay" value="pay now" onclick="pay_now()"/>
</form>

<script>
    function pay_now(){
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();

        var options = {
            "key": "rzp_test_YsZR9BjT1yt4QF", 
            "amount": amt*100,
          
            "currency": "INR",
            "name": "Food Token",
            "description": "Test Transaction",
            "image": "https://cdn.pixabay.com/photo/2017/03/16/21/18/logo-2150297_640.png",
            "handler": function (response) {
console.log(response);
               jQuery.ajax({
                   type:'post',
                   url:'payment_process.php',
                   data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name,
                   success:function(result){
                   window.location.href = "payment_success.php";
                   }
               })
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
</script>