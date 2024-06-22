<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letterhead</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .letterhead {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 20mm;
            box-sizing: border-box;
            position: relative;
        }
        .header {
            width: 100%;
            text-align: center;
        }
        .header img {
            display: block;
            margin: 0 auto;
        }
        .line-cell img {
            width: 100%;
            height: auto;
        }
        .logo-name {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 20%;
            text-align: center;
        }
        .company-name {
            width: 80%;
            text-align: center;
        }
        .address {
            text-align: center;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>
<body>
    <div class="letterhead">
        <div class="header">
            <div class="line-cell">
                <img src="src="{{ asset('storage/' . $itememployee->uploademployee) }}"" alt="Top Line">
            </div>
            <div class="logo-name">
                <div class="logo">
                    <img src="{{ asset('logo.png') }}" alt="Logo">
                </div>
                <div class="company-name">
                    <img src="{{ asset('company_name.png') }}" alt="Company Name">
                </div>
            </div>
            <div class="address">
                <img src="{{ asset('address.png') }}" alt="Address">
            </div>
            <div class="line-cell">
                <img src="{{ asset('bottom_line.png') }}" alt="Bottom Line">
            </div>
        </div>
    </div>
</body>
</html>
