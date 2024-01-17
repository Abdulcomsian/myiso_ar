<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; direction:rtl;">

    <div class="container" style="max-width: 500px; height: auto; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;">

        <img src="https://myisoonline.com/assets/media/logos/newmyisologo50.png" alt="Logo" style="height: 50px; margin-bottom: 20px;">

        <div class="content-area" style="text-align: right;">

            <p><strong>
                <?php if(isset($clientName)) { ?>
                    عزيزي {{$clientName}}
                <?php }else{ ?>
                    عزيزي العميل
                <?php } ?>
                </strong></p>
            <p>
                يعد هذا البريد الإلكتروني بمثابة تذكير لطيف بشأن أهمية الحفاظ على بياناتك باستمرار
                نظام التوثيق للاحتفاظ بشهادة ISO الخاصة بك. الصيانة الدورية لنظام التوثيق الخاص بك هي
                حاسما.
            </p>
            <p>
                لضمان استمرار الحالة النشطة لشهادة ISO الخاصة بك، نوصي بما يلي:
            </p>
            <p><strong>تحديثات منتظمة:</strong></p>
            <p>يرجى مراجعة وتحديث وثائقك بانتظام لتعكس أي تغييرات في عمليات عملك،
                الهيكل أو العمليات. إن الحفاظ على وثائقك محدثة يضمن أنها تمثل معلوماتك بدقة
                امتثال المنظمة لمعايير ISO.
            </p>
            <p><strong>التدريب والتوعية:</strong></p>
            <p>تعزيز ثقافة الوعي والفهم بين أعضاء فريقك فيما يتعلق بأهمية ISO
                المعايير. يمكن أن تعزز الدورات التدريبية المنتظمة أهمية الالتزام بالعمليات الموثقة
                والحفاظ على المعايير العالية المطلوبة للحصول على شهادة ISO.</p>
            <p><strong>التغييرات الموثقة:</strong></p>
            <p>إذا كانت هناك أي تغييرات مهمة داخل مؤسستك، مثل العمليات أو الإجراءات أو
                الموظفين، تأكد من توثيق هذه التغييرات على الفور. تضمن الوثائق المحدثة أن ملف ISO الخاص بك
                تظل الشهادة تعكس ممارساتك الحالية.</p>
            <p>من خلال الحفاظ بنشاط على نظام التوثيق الخاص بك، واجتياز التدقيق السنوي الخاص بك، فإنك تفي بالمتطلبات
                متطلبات الحصول على شهادة الأيزو.</p>
            <p>إذا كان لديك أي أسئلة أو كنت بحاجة إلى المساعدة في هذا الصدد، يرجى زيارة قسم الدعم
                حيث ستجد موارد التدريب والتوجيه
            </p>

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
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><strong>لم يقم العميل بتسجيل الدخول إلى MyISO لآخر مرة:</strong></td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $totalDays }} أيام</td>
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
