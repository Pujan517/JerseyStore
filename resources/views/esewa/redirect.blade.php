<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Redirecting to eSewa...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f8f9;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #2f80ed;
        }
        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #2f80ed;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }
    </style>
</head>
<body>
    <div class="loader"></div>
    <h2>Redirecting to eSewa Payment Gateway...</h2>
    <p>Please wait while we redirect you to complete your payment.</p>

    <form id="esewaPaymentForm" method="POST" action="{{ $esewa_url }}">
        @csrf
        <input type="hidden" name="tAmt" value="{{ $total_amount }}">
        <input type="hidden" name="amt" value="{{ $amount }}">
        <input type="hidden" name="txAmt" value="{{ $tax_amount }}">
        <input type="hidden" name="psc" value="{{ $product_service_charge }}">
        <input type="hidden" name="pdc" value="{{ $product_delivery_charge }}">
        <input type="hidden" name="pid" value="{{ $pid }}">
        <input type="hidden" name="su" value="{{ $success_url }}">
        <input type="hidden" name="fu" value="{{ $failure_url }}">
    </form>

    <script>
        window.onload = function() {
            document.getElementById('esewaPaymentForm').submit();
        };
    </script>
</body>
</html>
