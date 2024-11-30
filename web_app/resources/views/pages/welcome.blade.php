@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<section class="bg-[#0C3CFF] relative w-full h-screen">
    <img src="/images/circle.png" class="w-full h-[55vh]" />
    <div class="w-full h-[45vh] flex flex-col items-center justify-center text-white text-2xl max-w-[390px] mx-auto text-center gap-4 px-5">
        <h2 class="text-[33.18px] leading-[33.18px] font-black text-center"> Every run begins <br/> with a FreshStep </h2>
        <p class="leading-[19.2px] text-[#E7E7E7] text-base text-center"> Your personal running companion for healthier, smarter routes. </p>
        <div class="flex flex-col mt-8 w-full gap-4">
            <a href="{{ route('register') }}" class="border-[#D1D1D1] border bg-white font-bold cursor-pointer w-full text-[#0C3CFF] text-base leading-[19.2px] rounded-[16px] max-w-[350px] mx-auto h-[40px] flex items-center justify-center transition-all duration-300 hover:bg-[#0C3CFF] hover:text-white"> Join for Free </a> 
            <a href="{{ route('login') }}" class="border-[#0C3CFF] border bg-[#0C3CFF] font-bold cursor-pointer w-full text-white text-base leading-[19.2px] rounded-[16px] max-w-[350px] mx-auto h-[40px] flex items-center justify-center transition-all duration-300 hover:bg-white hover:text-[#0C3CFF] hover:border-[#D1D1D1] hover:border"> Login </a> 
        </div>
    </div>
</section>

@endsection