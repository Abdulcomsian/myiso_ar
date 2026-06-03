<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; direction: rtl; text-align:right">

    <div class="container" style="max-width: 500px; height: auto; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;">

        <img src="{{asset('assets/media/logos/ISOOnline Arabic Logo.jpg')}}" alt="Logo" style="height: 50px; margin-bottom: 20px;">

        <div class="content-area" style="text-align: right;">

            <p><strong>
                <?php if(isset($clientName)) { ?>
                    عزيزي {{$clientName}}
                <?php }else{ ?>
                    السادة المحترمون،
                <?php } ?>
                </strong></p>
            <p>
                تعتمد صلاحية شهادة الآيزو الخاصة بك على الحفاظ على وثائقك. وحتى الآن، لم يتم القيام بنشاط كاف على حسابك. يرجى العمل على تحديث سجلاتك والاحتفاظ بها
            </p>
            <p>
                للحصول على أي مساعدة أو توضيح، يرجى زيارة قسم الدعم في حسابك حيث ستجد مقاطع فيديو تعليمية وأدوات مفيدة أخرى. أو بدلا من ذلك، فإن فريقنا على استعداد لدعمك في أي أسئلة قد تكون لديك.
            </p>
            <p>لا بد من الاهتمام الفوري لضمان الصلاحية المستمرة لشهادات الآيزو الخاصة بك.</p>

        </div>

        <?php if(isset($clientName) && isset($clientEmail) && isset($totalDays)) { ?>
            <table style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-collapse: collapse; border: 1px solid #ddd;">
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><strong>اسم العميل:</strong></td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $clientName }}</td> 
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><strong>البريد الإلكتروني للعميل:</strong></td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $clientEmail }}</td> 
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><strong>لم يوقع العميل على mylso لآخر:</strong></td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $totalDays }} عدد الأيام</td>
                </tr>
            </table>        
            <a href="https://myisoonline.com/" target="_blank" style="display: inline-block; padding: 10px 20px; font-size: 16px; font-weight: bold; text-align: center; text-decoration: none; cursor: pointer; border: 2px solid #3498db; color: #fff; background-color: #3498db; border-radius: 5px; transition: background-color 0.3s, color 0.3s, border-color 0.3s;"
            class="button">تسجيل الدخول</a>
        <?php } ?>
    </div>

    <footer style="margin-top: 20px; text-align: center; color: #888;">
        <p>كل الحقوق محفوظة. MyISOOOnline</p>
    </footer>

</body>

</html>
