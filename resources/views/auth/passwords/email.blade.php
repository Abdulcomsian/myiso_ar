@include('auth.includes.head')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MyISOOnline.com</title>
<meta name="description" content="Established for over 25 years, MyISOOnline offers expert ISO certification in Arabic and English. Fully online with support and training. ISO 9001, 14001, and 45001 tailored to your business" />
	
<link rel="icon" href="https://isoarabia.com/wp-content/uploads/2025/01/fav-100x100.webp" sizes="32x32" />
<link rel="icon" href="https://isoarabia.com/wp-content/uploads/2025/01/fav-300x300.webp" sizes="192x192" />
<link rel="apple-touch-icon" href="https://isoarabia.com/wp-content/uploads/2025/01/fav-300x300.webp" />
<meta name="msapplication-TileImage" content="https://isoarabia.com/wp-content/uploads/2025/01/fav-300x300.webp" />	
<meta name="author" content="MyISOOnline"/>
<!-- Main Css -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{asset("assets/style.css")}}" rel="stylesheet" type="text/css">

	
<style>
  .mobile-br {
    display: none;
  }

  @media (max-width: 767px) {
    .mobile-br {
      display: block;
    }
  }
</style>	
	</head>

<body style="background-color:#FFFFFF">
<!-- =========== Main Section Start =========== -->
<section class="relative h-screen w-full flex items-center justify-center bg-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-[#ccf9df] to-[#d1d6ff]">
  <div class="relative max-w-lg md:mx-auto mx-6 w-full flex flex-col justify-center bg-white rounded-lg p-6" style="
">
    <div class="text-start mb-7" style="direction: rtl"> <a href="https://myisoarabia.com" class="grow block mb-8"> <img class=" mx-auto" src="{{asset("assets/media/logos/MyISOArbiaLogo.png")}}" alt="images"  style="width: 450px"> </a> </div>
    @if($errors->any())
    <div class="alert" style="background: red !important;color:#fff !important;"> {{ implode('', $errors->all(':message')) }} </div>
    @endif
   <div class="kt-login__forgot">
    <div class="kt-login__head">
        <h3 class="kt-login__title" style="direction: rtl; text-align: right; font-size: 22px">{{ __('إعادة تعيين كلمة المرور') }}</h3>
        <div class="kt-login__desc" style="direction: rtl; text-align: right;  font-size: 22px">أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور:</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <form class="kt-form" method="POST" action="{{ route('password.email') }}">
         @csrf
         <div class="flex justify-between items-center flex-wrap gap-x-1 gap-y-2 mb-6 mt-3">
        <div class="inline-flex items-center">
            </div></div>
        <div class="input-group">
            <input style="padding: 20px 10px !important; direction: rtl; text-align: right"  placeholder="أدخل بريدك الإلكتروني"  autocomplete="off" id="email" type="email" class="block w-full rounded-md py-2.5 px-4 text-dark text-base font-medium border-gray-300 focus:gray-300 focus:border-primary focus:outline-0 focus:ring-0 placeholder:text-light placeholder:text-base form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <!--@error('email')-->
            <!--    <span class="invalid-feedback" role="alert">-->
            <!--        <strong>{{ $message }}</strong>-->
            <!--    </span>-->
            <!--@enderror-->
        </div>
        <div class="flex justify-between items-center flex-wrap gap-x-1 gap-y-2 mb-6 mt-3">
        <div class="inline-flex items-center">
            </div></div>
        <div class="kt-login__actions">
            <button id="kt_login_forgot_submit" class="w-full inline-flex items-center justify-center px-6 py-2.5 bg-primary font-bold text-base text-white rounded-md transition-all duration-500 btn-brand" type="submit">طلب كلمة مرور جديدة</button>&nbsp;&nbsp;
             <button 
            id="kt_login_forgot_cancel" 
            class="w-full inline-flex items-center justify-center px-6 py-2.5 bg-primary font-bold text-base text-white rounded-md transition-all duration-500 btn-brand" 
            type="button" 
            onclick="window.location.href='{{ route('home') }}'"
        >
          إلغاء الطلب
        </button>
        </div>
    </form>
</div>
  </div>
 
 
 
 
 
</section>
<script>
    $('#firstCheckbox').on("change",function(){
			// $('#firstCheckbox').prop('checked', false);
			if(this.checked){
				document.querySelector('#SignIN').removeAttribute('disabled');
			}else{
				document.querySelector('#SignIN').setAttribute('disabled', '');
			}
		});    
    </script> 
<!-- =========== Main Section End =========== --> 

<!-- Preline Js --> 
<script src="{{asset("js/en/js/preline.js")}}" ></script> 

<!-- Lucide Js --> 
<script src="{{asset("js/en/js/lucide.min.js")}}" ></script> 

<!-- Main App Js --> 
<script src="{{asset("js/en/js/app.js")}}" ></script>
</body>
</html>














<!--@section('content')-->
<!--<div class="kt-login__forgot">-->
<!--    <div class="kt-login__head">-->
<!--        <h3 class="kt-login__title">{{ __('Reset Password') }}</h3>-->
<!--        <div class="kt-login__desc">Enter your email to reset your password:</div>-->
<!--        @if (session('status'))-->
<!--            <div class="alert alert-success" role="alert">-->
<!--                {{ session('status') }}-->
<!--            </div>-->
<!--        @endif-->
<!--    </div>-->
<!--    <form class="kt-form" method="POST" action="{{ route('password.email') }}">-->
<!--         @csrf-->
<!--        <div class="input-group">-->
<!--            <input  placeholder="Email"  autocomplete="off" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->
<!--            @error('email')-->
<!--                <span class="invalid-feedback" role="alert">-->
<!--                    <strong>{{ $message }}</strong>-->
<!--                </span>-->
<!--            @enderror-->
<!--        </div>-->
<!--        <div class="kt-login__actions">-->
<!--            <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary" type="submit">Request</button>&nbsp;&nbsp;-->
<!--            <button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!--@endsection-->
