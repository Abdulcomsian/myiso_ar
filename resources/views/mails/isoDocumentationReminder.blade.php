<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تذكير بخصوص وثائق ISO</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; direction: rtl;">

    <div class="container" style="max-width: 500px; height: auto; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;">

        <img src="{{ asset('assets/media/logos/MyISOOnline-Logo-1.png') }}" alt="Logo" style="height: 50px; margin-bottom: 20px;">

        <div class="content-area" style="text-align: right;">

            <p><strong>
            <?php if(isset($clientName)) { ?>
                عزيزي {{$clientName}}،
            <?php }else{ ?>
                عزيزي عضو MyISOOnline،
            <?php } ?>
            </strong></p>

            <p>
                لضمان الالتزام وفقًا لاتفاقك، يرجى تسجيل الدخول بشكل متكرر والمحافظة على تحديث
                وثائقك.
            </p>

            <p>
                يتطلب المدققون وجود أدلة واضحة على الالتزام، وعدم الحفاظ على سجلات الوثائق الخاصة بك قد يضع
                شهادتك في خطر وقد يؤدي إلى سحبها من موقع IRQAO.
            </p>

            <p>
                إذا كنت بحاجة إلى دعم إضافي، يرجى زيارة قسم الدعم داخل بوابتك الإلكترونية.
            </p>

            <p>شكرًا لك.</p>

        </div>

    </div>

    <footer style="margin-top: 20px; text-align: center; color: #888;">
        <p>جميع الحقوق محفوظة. MyISOOnline</p>
    </footer>

</body>

</html>
