<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
    <style>
        /* Inline styles for body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0;">

    <div class="container" style="max-width: 500px; height: auto; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;">

        <img src="{{ asset('assets/media/logos/MyISOArbiaLogo.png') }}" alt="MyISOOnline" width="180" height="34" style="width: 180px; height: 34px; max-width: 100%; margin-bottom: 20px; border: 0;">

        <div class="content-area" style="text-align: left;">

            <p><strong>
                <?php if(isset($empName)) { ?>
                    Dear {{$empName}}
                <?php }else{ ?>
                    عزيزي
                <?php } ?>
                </strong></p>
            
            <p>
                يسعدنا إعلامك بأنه قد تمت إضافة حساب الموظف الخاص بك بنجاح إلى MyISOOnline. يمكنك الآن الوصول إلى دورات MyISOOnline.
            </p>

            <a href="{{ url('/lms/account') }}?action=login" target="_blank" style="display: inline-block; padding: 10px 20px; font-size: 16px; font-weight: bold; text-align: center; text-decoration: none; cursor: pointer; border: 2px solid #3498db; color: #fff; background-color: #3498db; border-radius: 5px; transition: background-color 0.3s, color 0.3s, border-color 0.3s;"
            class="button">سجّل الدخول الآن</a>

        </div>
    </div>

    <footer style="margin-top: 20px; text-align: center; color: #888;">
        <p>All Rights Reserved. MyISOOnline</p>
    </footer>

</body>

</html>
