@extends('layouts.app')

@section('title', 'Leaderboard')

@section('content')

<!-- <section class="flex flex-col gap-36 max-w-[550px] px-5 mx-auto mt-10">
    <img src="/images/Leaderboard.png" class="w-[170px]">

    <div class="bg-white border-2 border-[#E7E7E7] rounded-[32px] w-[90%] flex h-[80px] justify-between items-center shadow-lg px-4 py-2 absolute bottom-4 left-1/2 -translate-x-1/2  max-w-[550px] mx-auto">
        <a href="{{ route('home') }}">
            <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path d="M28 15V27C28 27.2653 27.8946 27.5196 27.7071 27.7072C27.5196 27.8947 27.2652 28 27 28H20C19.7348 28 19.4804 27.8947 19.2929 27.7072C19.1054 27.5196 19 27.2653 19 27V20.5C19 20.3674 18.9473 20.2403 18.8536 20.1465C18.7598 20.0527 18.6326 20 18.5 20H13.5C13.3674 20 13.2402 20.0527 13.1464 20.1465C13.0527 20.2403 13 20.3674 13 20.5V27C13 27.2653 12.8946 27.5196 12.7071 27.7072C12.5196 27.8947 12.2652 28 12 28H5C4.73478 28 4.48043 27.8947 4.29289 27.7072C4.10536 27.5196 4 27.2653 4 27V15C4.00025 14.4697 4.21112 13.9612 4.58625 13.5863L14.5863 3.5863C14.9613 3.21151 15.4698 3.00098 16 3.00098C16.5302 3.00098 17.0387 3.21151 17.4137 3.5863L27.4137 13.5863C27.7889 13.9612 27.9998 14.4697 28 15Z" fill="#B0B0B0" />
            </svg>
        </a>
        <a href="{{ route('map') }}">
            <svg width="32" fill="#0C3CFF" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.615 6.21127C28.4952 6.11793 28.3557 6.0531 28.2072 6.02169C28.0586 5.99029 27.9048 5.99314 27.7575 6.03002L20.1162 7.94002L12.4475 4.10502C12.2338 3.99844 11.9891 3.97184 11.7575 4.03002L3.7575 6.03002C3.54116 6.08409 3.3491 6.20893 3.21185 6.38468C3.0746 6.56044 3.00003 6.77702 3 7.00002V25C3.00002 25.152 3.03467 25.3019 3.10132 25.4385C3.16797 25.575 3.26486 25.6946 3.38463 25.7881C3.50441 25.8816 3.64392 25.9466 3.79256 25.9781C3.94121 26.0096 4.09508 26.0069 4.2425 25.97L11.8837 24.06L19.5525 27.895C19.6917 27.9637 19.8448 27.9996 20 28C20.0818 28 20.1632 27.9899 20.2425 27.97L28.2425 25.97C28.4588 25.9159 28.6509 25.7911 28.7881 25.6154C28.9254 25.4396 29 25.223 29 25V7.00002C29 6.84792 28.9654 6.69783 28.8987 6.56115C28.8319 6.42447 28.7349 6.3048 28.615 6.21127ZM12 22C11.9182 22.0001 11.8368 22.0101 11.7575 22.03L5 23.7188V7.78127L11.8837 6.06002L12 6.11752V22ZM27 24.2188L20.1162 25.94L20 25.8825V10C20.0817 10.0004 20.1631 9.99072 20.2425 9.97127L27 8.28127V24.2188Z" fill="#B0B0B0" />
            </svg>
        </a>
        <a>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="border-b-2 border-[#5695FF]">
                <path fill="#0C3CFF" d="M29 8H26V6C26 5.73478 25.8946 5.48043 25.7071 5.29289C25.5196 5.10536 25.2652 5 25 5H7C6.73478 5 6.48043 5.10536 6.29289 5.29289C6.10536 5.48043 6 5.73478 6 6V8H3C2.46957 8 1.96086 8.21071 1.58579 8.58579C1.21071 8.96086 1 9.46957 1 10V12C1 13.3261 1.52678 14.5979 2.46447 15.5355C2.92876 15.9998 3.47995 16.3681 4.08658 16.6194C4.69321 16.8707 5.34339 17 6 17H6.45625C7.04531 18.8668 8.16846 20.52 9.68688 21.7554C11.2053 22.9908 13.0524 23.7542 15 23.9513V27H12C11.7348 27 11.4804 27.1054 11.2929 27.2929C11.1054 27.4804 11 27.7348 11 28C11 28.2652 11.1054 28.5196 11.2929 28.7071C11.4804 28.8946 11.7348 29 12 29H20C20.2652 29 20.5196 28.8946 20.7071 28.7071C20.8946 28.5196 21 28.2652 21 28C21 27.7348 20.8946 27.4804 20.7071 27.2929C20.5196 27.1054 20.2652 27 20 27H17V23.9475C20.9925 23.5438 24.305 20.7425 25.51 17H26C27.3261 17 28.5979 16.4732 29.5355 15.5355C30.4732 14.5979 31 13.3261 31 12V10C31 9.46957 30.7893 8.96086 30.4142 8.58579C30.0391 8.21071 29.5304 8 29 8ZM6 15C5.20435 15 4.44129 14.6839 3.87868 14.1213C3.31607 13.5587 3 12.7956 3 12V10H6V14C6 14.3333 6.01625 14.6667 6.04875 15H6ZM29 12C29 12.7956 28.6839 13.5587 28.1213 14.1213C27.5587 14.6839 26.7956 15 26 15H25.9375C25.9785 14.6306 25.9994 14.2592 26 13.8875V10H29V12Z" fill="#B0B0B0" />
            </svg>
        </a>
        <a href="{{ route('profile') }}">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.5 15C21.5 16.0878 21.1774 17.1512 20.5731 18.0556C19.9687 18.9601 19.1098 19.6651 18.1048 20.0813C17.0998 20.4976 15.9939 20.6065 14.927 20.3943C13.8601 20.1821 12.8801 19.6583 12.1109 18.8891C11.3417 18.1199 10.8179 17.1399 10.6057 16.073C10.3935 15.0061 10.5024 13.9002 10.9187 12.8952C11.335 11.8902 12.0399 11.0313 12.9444 10.4269C13.8488 9.82257 14.9122 9.5 16 9.5C17.4582 9.50165 18.8562 10.0816 19.8873 11.1127C20.9184 12.1438 21.4984 13.5418 21.5 15ZM29 16C29 18.5712 28.2376 21.0846 26.8091 23.2224C25.3807 25.3603 23.3503 27.0265 20.9749 28.0104C18.5995 28.9944 15.9856 29.2518 13.4638 28.7502C10.9421 28.2486 8.6257 27.0105 6.80762 25.1924C4.98953 23.3743 3.75141 21.0579 3.2498 18.5362C2.74819 16.0144 3.00563 13.4006 3.98957 11.0251C4.97351 8.64968 6.63975 6.61935 8.77759 5.1909C10.9154 3.76244 13.4288 3 16 3C19.4467 3.00364 22.7512 4.37445 25.1884 6.81163C27.6256 9.24882 28.9964 12.5533 29 16ZM27 16C26.9984 14.5194 26.6982 13.0544 26.1174 11.6924C25.5366 10.3305 24.6871 9.09974 23.6198 8.07367C22.5524 7.04759 21.289 6.24732 19.9053 5.7207C18.5215 5.19408 17.0457 4.95194 15.5663 5.00875C9.67876 5.23625 4.98376 10.14 5.00001 16.0312C5.00565 18.7132 5.99478 21.2998 7.78001 23.3013C8.50703 22.2468 9.43056 21.3423 10.5 20.6375C10.5912 20.5773 10.6996 20.5486 10.8086 20.5558C10.9177 20.563 11.0213 20.6058 11.1038 20.6775C12.4627 21.8529 14.1995 22.4998 15.9963 22.4998C17.793 22.4998 19.5298 21.8529 20.8888 20.6775C20.9712 20.6058 21.0749 20.563 21.1839 20.5558C21.2929 20.5486 21.4013 20.5773 21.4925 20.6375C22.5633 21.342 23.4881 22.2464 24.2163 23.3013C26.0103 21.2925 27.0013 18.6932 27 16Z" fill="#B0B0B0" />
            </svg>
        </a>
    </div>
</section> -->
@endsection