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
                تعد هذه الرسالة الإلكترونية بمثابة تذكير لطيف بأهمية الحفاظ على نظام التوثيق الخاص بك باستمرار للحفاظ على شهادة الآيزو الخاصة بك. ويعتبر التحديث المنتظم لنظام التوثيق الخاص بك أمرا بالغ الأهمية.
            </p>
            <p>
                لضمان استمرار نشاط شهادة الآيزو الخاصة بك، نوصي بما يلي:
            </p>
            <p><strong>تحديثات منتظمة:</strong></p>
            <p>يرجى مراجعة وثائقك وتحديثها بانتظام لتعكس أي تغييرات في عمليات الأعمال أو الهيكل أو العمليات التشغيلية. كما يضمن تحديث وثائقك أن تمثل بدقة امتثال مؤسستك لمعايير الآيزو.
            </p>
            <p><strong>التدريب والتوعية:</strong></p>
            <p>تعزيز ثقافة الوعي والفهم بين أعضاء فريقك فيما يتعلق بأهمية معايير الآيزو، حيث يمكن أن تعزز الدورات التدريبية المنتظمة أهمية الالتزام بالعمليات الموثقة والحفاظ على المعايير العالية المطلوبة للحصول على شهادة الآيزو.</p>
            <p><strong>التغييرات الموثقة:</strong></p>
            <p>في حال طرأت أي تغييرات مهمة على مؤسستك، مثل العمليات أو الإجراءات أو الموظفين الجدد، احرص على توثيق هذه التغييرات على الفور. وتضمن الوثائق المحدثة بقاء شهادة الآيزو الخاصة بك تعكس ممارساتك الحالية.</p>
            <p>من خلال الحفاظ على نظام التوثيق الخاص بك بفعالية واجتياز التدقيق السنوي الخاص بك، فإنك تستوفي متطلبات شهادة الآيزو. </p>
            <p>
                إذا كانت لديك أي أسئلة أو كنت بحاجة إلى مساعدة في هذا الصدد، يرجى زيارة قسم الدعم حيث ستجد موارد التدريب والتوجيه.
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
