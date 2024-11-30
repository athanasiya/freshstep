@extends('layouts.app')

@section('title', 'Register')

@section('content')

<section class="mt-12 flex flex-col gap-12 max-w-[540px] mx-auto px-5">
    <a href="/" class="flex self-end">
        <img src="/images/XCircle.png" class="w-6" />
    </a>
    <div class="flex flex-col gap-8 w-full">
        <h2 class="text-black font-black text-[27.65px] leading-[27.65px]"> Create an Account </h2>
        <a href="{{ route('login') }}" class="text-[13.33px] leading-4 text-black opacity-90 underline">
            Already have an account? 
        </a>
        <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-6">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="name" class="text-[#000000] opacity-40 text-[13.33px] leading-4 font-normal">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    required
                    class="border-[#E7E7E7] border rounded-[12px] h-[35px] px-3 py-1 text-black font-normal text-base"
                    placeholder="Enter your name" />
                    @if($errors->has('name'))
                    <span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>
                    @endif  

            </div>
            <div class="flex flex-col gap-2">
                <label for="email" class="text-[#000000] opacity-40 text-[13.33px] leading-4 font-normal">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    required
                    class="border-[#E7E7E7] border rounded-[12px] h-[35px] px-3 py-1 text-black font-normal text-base"
                    placeholder="Enter your email" />
                    @if($errors->has('email'))
                    <span class="text-red-500 text-xs">{{ $errors->first('email') }}</span>
                    @endif 
            </div>
            <div class="flex flex-col gap-2">
                <label for="password" class="text-[#000000] opacity-40 text-[13.33px] leading-4 font-normal">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="border-[#E7E7E7] border rounded-[12px] h-[35px] px-3 py-1 text-black font-normal text-base"
                    placeholder="Create a password" />
                    @if($errors->has('password'))
                    <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
                    @endif 
                <p class="text-[11.11px] leading-[13.33px] text-[#000000] opacity-60">
                    Password must contain at least 8 characters.
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <label for="password_confirmation" class="text-[#000000] opacity-40 text-[13.33px] leading-4 font-normal">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="border-[#E7E7E7] border rounded-[12px] h-[35px] px-3 py-1 text-black font-normal text-base"
                    placeholder="Re-enter your password" />
            </div>
            <div class="flex flex-col gap-2">
                <button
                    type="submit"
                    class="border-2 border-[#D5ECFF] h-[40px] flex items-center justify-center text-center bg-[#B3DAFF] text-[#0C3CFF] rounded-[16px] transition-all duration-300 hover:bg-[#0C3CFF] hover:text-white">
                    Sign Up
                </button>
                <p class="text-[13.33px] leading-4 text-black opacity-40">
                    By signing up, you are agreeing to our
                    <a href="#" class="underline text-blue-500">Terms of Service</a>.
                    View our
                    <a href="#" class="underline text-blue-500">Privacy Policy</a>.
                </p>
            </div>

            <div class="flex items-center w-full justify-between">
                <span class="w-[40%] block bg-[#5695FF] h-[1px]"></span>
                <p class="text-[#5695FF] text-[13.33px] leading-4">or</p>
                <span class="w-[40%] block bg-[#5695FF] h-[1px]"></span>
            </div>
            <div class="flex flex-col gap-2">
                <a
                    class="border-2 border-[#2E6CFF] h-[40px] flex items-center justify-center text-center bg-[#0C3CFF] group text-white rounded-[16px] transition-all duration-300 hover:bg-white hover:text-[#0C3CFF] cursor-pointer gap-2">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-[#E7F5FF] transition-all duration-300 group-hover:fill-[#0C3CFF]" d="M8.01439 2.375C8.15306 1.83794 8.46639 1.36225 8.90507 1.02281C9.34374 0.683364 9.88285 0.499444 10.4375 0.500001H10.5C10.6326 0.500001 10.7598 0.55268 10.8536 0.646448C10.9473 0.740216 11 0.867393 11 1C11 1.13261 10.9473 1.25979 10.8536 1.35355C10.7598 1.44732 10.6326 1.5 10.5 1.5H10.4375C10.105 1.49997 9.7818 1.61046 9.51888 1.81411C9.25595 2.01775 9.06816 2.303 8.98502 2.625C8.95187 2.75347 8.86904 2.8635 8.75476 2.93089C8.64048 2.99829 8.50411 3.01753 8.37564 2.98438C8.24718 2.95122 8.13715 2.8684 8.06975 2.75412C8.00235 2.63984 7.98312 2.50347 8.01627 2.375H8.01439ZM13.9563 11.0994C13.9188 11.0137 13.8582 10.9401 13.7813 10.8869C12.7206 10.1581 12.5 8.915 12.5 8C12.5 6.89563 13.3419 5.93375 13.8438 5.45813C13.8931 5.4114 13.9325 5.3551 13.9593 5.29267C13.9862 5.23023 14.0001 5.16297 14.0001 5.095C14.0001 5.02703 13.9862 4.95977 13.9593 4.89734C13.9325 4.8349 13.8931 4.7786 13.8438 4.73188C13.0513 3.98375 11.7388 3.5 10.5 3.5C9.61018 3.5008 8.74042 3.76455 8.00002 4.25813C7.13634 3.67898 6.09785 3.41888 5.06315 3.52256C4.02846 3.62625 3.06223 4.08724 2.33064 4.82625C1.89329 5.27274 1.55013 5.80258 1.32155 6.38429C1.09297 6.966 0.983626 7.58771 1.00002 8.2125C1.02455 9.26709 1.25905 10.3062 1.6898 11.2691C2.12056 12.232 2.73893 13.0994 3.50877 13.8206C3.97239 14.2587 4.58657 14.5019 5.22439 14.5H10.7044C11.0454 14.5006 11.3829 14.4313 11.6959 14.2961C12.009 14.161 12.291 13.963 12.5244 13.7144C12.9568 13.2491 13.3308 12.7327 13.6381 12.1769C14.0769 11.375 14.0206 11.25 13.9563 11.0994Z" fill="#E7F5FF" />
                    </svg>

                    Continue with Apple
                </a>
                <a
                    class="border-2 border-[#2E6CFF] h-[40px] flex items-center justify-center text-center bg-[#0C3CFF] group text-white rounded-[16px] transition-all duration-300 hover:bg-white hover:text-[#0C3CFF] cursor-pointer gap-2">
                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 17">
                        <path class="fill-[#E7F5FF] transition-all duration-300 group-hover:fill-[#0C3CFF]" d="M8 2C6.71442 2 5.45772 2.38122 4.3888 3.09545C3.31988 3.80968 2.48676 4.82484 1.99479 6.01256C1.50282 7.20028 1.37409 8.50721 1.6249 9.76809C1.8757 11.029 2.49477 12.1872 3.40381 13.0962C4.31285 14.0052 5.47104 14.6243 6.73192 14.8751C7.99279 15.1259 9.29973 14.9972 10.4874 14.5052C11.6752 14.0132 12.6903 13.1801 13.4046 12.1112C14.1188 11.0423 14.5 9.78558 14.5 8.5C14.5 6.77609 13.8152 5.12279 12.5962 3.90381C11.3772 2.68482 9.72391 2 8 2ZM8 13.5C7.18955 13.4999 6.39126 13.3028 5.6739 12.9257C4.95653 12.5486 4.34159 12.0027 3.88204 11.3351C3.42249 10.6676 3.1321 9.8983 3.03588 9.09358C2.93967 8.28886 3.04051 7.47281 3.32973 6.71571C3.61895 5.95862 4.08787 5.28318 4.69611 4.74756C5.30434 4.21194 6.03366 3.83221 6.82125 3.64106C7.60884 3.44991 8.4311 3.45308 9.21719 3.65029C10.0033 3.8475 10.7297 4.23284 11.3338 4.77313C11.4301 4.86219 11.4876 4.98558 11.4938 5.11667C11.5 5.24775 11.4545 5.37602 11.3669 5.4738C11.2794 5.57158 11.157 5.63103 11.026 5.63932C10.895 5.64762 10.766 5.60409 10.6669 5.51813C10.0003 4.92188 9.15307 4.56624 8.26061 4.50801C7.36815 4.44978 6.48192 4.69233 5.74349 5.1969C5.00506 5.70148 4.45703 6.43897 4.18694 7.29157C3.91685 8.14417 3.94029 9.06269 4.25352 9.90041C4.56674 10.7381 5.15167 11.4467 5.91488 11.913C6.67808 12.3792 7.57553 12.5762 8.46386 12.4726C9.35219 12.3689 10.1801 11.9705 10.8155 11.341C11.4508 10.7116 11.8569 9.88733 11.9688 9H8C7.86739 9 7.74022 8.94732 7.64645 8.85355C7.55268 8.75979 7.5 8.63261 7.5 8.5C7.5 8.36739 7.55268 8.24021 7.64645 8.14645C7.74022 8.05268 7.86739 8 8 8H12.5C12.6326 8 12.7598 8.05268 12.8536 8.14645C12.9473 8.24021 13 8.36739 13 8.5C12.9985 9.82563 12.4713 11.0965 11.5339 12.0339C10.5965 12.9712 9.32563 13.4985 8 13.5Z" />
                    </svg>
                    Continue with Google
                </a>
            </div>
        </form>
    </div>
</section>

@endsection