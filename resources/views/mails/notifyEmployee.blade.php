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

        <img src="{{ asset('assets/media/logos/MyISOArbiaLogo.png') }}" alt="Logo" style="height: 50px; margin-bottom: 20px;">

        <div class="content-area" style="text-align: left;">

            <p><strong>
                <?php if(isset($empName)) { ?>
                    Dear {{$empName}}
                <?php }else{ ?>
                    عزيزي
                <?php } ?>
                </strong></p>
            <p>
              

أنت الآن مؤهل للوصول إلى دوراتنا المجانية 

 
            </p>
            <p>
               
              
يسعدنا إعلامك بأنك قد تمت إضافتك بنجاح إلى MyISOOnline . أنت الآن مؤهل للوصول إلى دوراتنا المجانية والاستفادة منها.

               <br>
               للبدء، يرجى التسجيل باستخدام عنوان بريدك الإلكتروني الرسمي: 
               
               
               

            </p>
            <a href="{{ url('/lms/account') }}?action=register" target="_blank" style="display: inline-block; padding: 10px 20px; font-size: 16px; font-weight: bold; text-align: center; text-decoration: none; cursor: pointer; border: 2px solid #3498db; color: #fff; background-color: #3498db; border-radius: 5px; transition: background-color 0.3s, color 0.3s, border-color 0.3s;"
            class="button">سجل الآن</a>

        </div>
    </div>

    <footer style="margin-top: 20px; text-align: center; color: #888;">
        <p>All Rights Reserved. MyISOOnline</p>
    </footer>

</body>

</html>
