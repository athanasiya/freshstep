@extends('layouts.app')

@section('title', 'Preferences')

@section('content')

<section class="relative w-full h-screen max-w-[390px] px-5 mx-auto mt-12 flex flex-col gap-16 overflow-x-hidden ">
    <div class="flex justify-between items-center w-full">
        <a class="w-6 cursor-pointer" href="/home">
            <img src="/images/ArrowLeft.png" class="w-full" />
        </a>
        <p class="text-[#4F4F4F] text-base leading-[19.2px] text-center"> Rout Preferences</p>
        <p></p>
    </div>
    <div class="flex flex-col gap-12">
        <div class="flex flex-col gap-3">
            <p class="text-[#888888] text-sm leading-4">Change Distance</p>
            <div class="flex items-center border border-gray-300 rounded-md px-3 py-2 bg-white gap-2">
                <input
                    type="number"
                    value="10"
                    class="text-black font-bold text-lg leading-5 outline-none flex-1 bg-transparent w-[50%]" />
                <div class="relative flex items-center">
                    <select class="appearance-none text-sm text-black font-medium bg-transparent focus:outline-none cursor-pointer">
                        <option value="kilometres">kilometres</option>
                        <option value="miles">miles</option>
                    </select>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-black ml-1 pointer-events-none"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-6">
            <div id="route-preference" class="flex flex-col gap-3">
                <p class="text-[#888888] text-sm leading-4 mb-2">Route Preference</p>
                <div class="flex flex-col gap-2">
                    <div
                        id="route-close-to-you"
                        class="option flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer checked bg-[#0C3CFF] text-white">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-path" fill="white" d="M16 21.875C16.1511 21.9614 16.3222 22.0068 16.4963 22.0068C16.6703 22.0068 16.8414 21.9614 16.9925 21.875C17.2987 21.6988 24.4925 17.5 24.4925 10.0063C24.4297 7.92788 23.5601 5.95563 22.068 4.50742C20.5759 3.05921 18.5786 2.24884 16.4993 2.24803C14.42 2.24722 12.422 3.05603 10.9288 4.50307C9.4356 5.95011 8.56447 7.92168 8.5 10C8.5 17.5 15.6975 21.6925 16 21.875ZM16.5 7.00001C17.0933 7.00001 17.6734 7.17595 18.1667 7.5056C18.6601 7.83524 19.0446 8.30378 19.2716 8.85196C19.4987 9.40013 19.5581 10.0033 19.4424 10.5853C19.3266 11.1672 19.0409 11.7018 18.6213 12.1213C18.2018 12.5409 17.6672 12.8266 17.0853 12.9424C16.5033 13.0581 15.9001 12.9987 15.3519 12.7716C14.8038 12.5446 14.3352 12.1601 14.0056 11.6667C13.6759 11.1734 13.5 10.5934 13.5 10C13.5 9.20436 13.8161 8.4413 14.3787 7.87869C14.9413 7.31608 15.7044 7.00001 16.5 7.00001ZM30.5 23C30.5 26.8975 23.2863 29 16.5 29C9.71375 29 2.5 26.8975 2.5 23C2.5 21.1763 4.1525 19.5613 7.15375 18.4538C7.39987 18.3724 7.66795 18.3899 7.90147 18.5024C8.13499 18.6149 8.3157 18.8137 8.40551 19.0568C8.49531 19.3 8.48719 19.5685 8.38286 19.8058C8.27853 20.0431 8.08614 20.2306 7.84625 20.3288C5.7825 21.0925 4.5 22.115 4.5 23C4.5 24.67 9.065 27 16.5 27C23.935 27 28.5 24.67 28.5 23C28.5 22.115 27.2175 21.0925 25.1537 20.33C24.9139 20.2318 24.7215 20.0443 24.6171 19.807C24.5128 19.5697 24.5047 19.3012 24.5945 19.0581C24.6843 18.8149 24.865 18.6161 25.0985 18.5036C25.332 18.3911 25.6001 18.3737 25.8463 18.455C28.8475 19.5613 30.5 21.1763 30.5 23Z" fill="#0C3CFF" />
                        </svg>
                        <span class="text-sm font-medium">Close to You</span>
                    </div>
                    <div
                        id="route-cleanest-route"
                        class="option flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer bg-[#E7F5FF] text-blue-500">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-path" fill="#0C3CFF" d="M25.015 16C28.0962 11.6737 29.6675 7.2025 27.4825 5.0175C25.2975 2.8325 20.8263 4.40375 16.5 7.485C12.1737 4.40375 7.7025 2.8325 5.5175 5.0175C3.3325 7.2025 4.90375 11.6737 7.985 16C4.90375 20.3263 3.3325 24.7975 5.5175 26.9825C6.22125 27.6863 7.16125 28 8.25625 28C10.565 28 13.5662 26.6038 16.5063 24.515C19.4338 26.6038 22.4338 28 24.75 28C25.845 28 26.7863 27.685 27.4888 26.9825C29.6675 24.7975 28.0962 20.3263 25.015 16ZM26.0688 6.43125C27.0238 7.38625 26.3787 10.4813 23.7537 14.3413C22.9233 13.3132 22.0392 12.3298 21.105 11.395C20.1698 10.4625 19.1864 9.5796 18.1588 8.75C22.0188 6.125 25.1138 5.47625 26.0688 6.43125ZM6.93125 6.43125C7.20625 6.155 7.66 6.0125 8.25875 6.0125C9.73625 6.0125 12.095 6.875 14.84 8.75C13.813 9.5799 12.83 10.4628 11.895 11.395C10.9621 12.3299 10.0792 13.3133 9.25 14.3413C6.625 10.4813 5.97625 7.38625 6.93125 6.43125ZM6.93125 25.5688C5.97625 24.6138 6.625 21.5188 9.25 17.6588C10.0804 18.6868 10.9646 19.6702 11.8988 20.605C12.833 21.5371 13.8152 22.42 14.8413 23.25C10.9813 25.875 7.88625 26.5238 6.93125 25.5688ZM16.5 17.5C16.2033 17.5 15.9133 17.412 15.6666 17.2472C15.42 17.0824 15.2277 16.8481 15.1142 16.574C15.0006 16.2999 14.9709 15.9983 15.0288 15.7074C15.0867 15.4164 15.2296 15.1491 15.4393 14.9393C15.6491 14.7296 15.9164 14.5867 16.2074 14.5288C16.4983 14.4709 16.7999 14.5006 17.074 14.6142C17.3481 14.7277 17.5824 14.92 17.7472 15.1666C17.912 15.4133 18 15.7033 18 16C18 16.3978 17.842 16.7794 17.5607 17.0607C17.2794 17.342 16.8978 17.5 16.5 17.5ZM26.0688 25.57C25.1138 26.5262 22.0188 25.88 18.1588 23.255C19.1862 22.4239 20.1696 21.5398 21.105 20.6063C22.0379 19.671 22.9208 18.6871 23.75 17.6588C26.375 21.5188 27.0238 24.6138 26.0688 25.5688V25.57Z" fill="#E7F5FF" />
                        </svg>
                        <span class="text-sm font-medium">Cleanest Route</span>
                    </div>
                </div>
            </div>
            <div id="air-preference" class="flex flex-col gap-3 mt-8">
                <p class="text-[#888888] text-sm leading-4 mb-2">Air Preference</p>
                <div class="flex flex-col gap-2">
                    <div
                        id="air-okey"
                        class="option flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer bg-[#E7F5FF] text-blue-500">
                        <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-path" d="M41.8969 7.51316C41.8755 7.14619 41.72 6.79987 41.4601 6.53995C41.2002 6.28002 40.8539 6.12459 40.4869 6.10316C26.2125 5.26503 14.7788 9.56253 9.90378 17.625C8.21396 20.383 7.38126 23.5807 7.51128 26.8125C7.59615 28.8792 8.01664 30.9184 8.75628 32.85C8.79974 32.9689 8.87258 33.0749 8.96802 33.158C9.06346 33.2412 9.17838 33.2988 9.3021 33.3256C9.42581 33.3523 9.55428 33.3473 9.67555 33.3111C9.79682 33.2748 9.90694 33.2084 9.99565 33.1182L25.9332 16.9369C26.0725 16.7975 26.238 16.687 26.4201 16.6116C26.6021 16.5361 26.7973 16.4973 26.9944 16.4973C27.1915 16.4973 27.3867 16.5361 27.5687 16.6116C27.7508 16.687 27.9163 16.7975 28.0557 16.9369C28.195 17.0763 28.3056 17.2417 28.381 17.4238C28.4564 17.6059 28.4952 17.8011 28.4952 17.9982C28.4952 18.1953 28.4564 18.3904 28.381 18.5725C28.3056 18.7546 28.195 18.92 28.0557 19.0594L10.6388 36.7388L7.97815 39.3994C7.70145 39.6688 7.53626 40.0324 7.51541 40.4181C7.49457 40.8037 7.6196 41.183 7.86565 41.4807C8.0004 41.6367 8.16588 41.7633 8.35174 41.8525C8.5376 41.9418 8.73987 41.9917 8.9459 41.9993C9.15194 42.0069 9.35732 41.9719 9.54923 41.8965C9.74114 41.8211 9.91545 41.707 10.0613 41.5613L13.2094 38.4132C15.8607 39.6957 18.5363 40.395 21.1894 40.4888C21.3982 40.4963 21.6063 40.5 21.8138 40.5C24.8352 40.5078 27.7992 39.6755 30.375 38.0963C38.4375 33.2213 42.7369 21.7894 41.8969 7.51316Z" fill="#0C3CFF" />
                        </svg>

                        <span class="text-sm font-medium">Okey</span>
                    </div>
                    <div
                        id="air-good"
                        class="option flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer checked bg-[#0C3CFF] text-white">
                        <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-path" fill="white" d="M38.5144 29.8256C36.7161 30.9187 34.6507 31.4936 32.5462 31.4868C30.7832 31.4729 29.0401 31.1123 27.4162 30.4256C26.1647 32.1924 25.4949 34.3054 25.5 36.4706V42C25.5004 42.2056 25.4586 42.4091 25.3771 42.5979C25.2956 42.7867 25.1761 42.9567 25.0261 43.0974C24.8761 43.238 24.6988 43.3464 24.5052 43.4156C24.3116 43.4849 24.1058 43.5136 23.9006 43.5C23.515 43.4664 23.1564 43.2883 22.8967 43.0014C22.6369 42.7146 22.4952 42.3401 22.5 41.9531V39.6206L15.2587 32.3793C14.1823 32.7809 13.0439 32.991 11.895 33C10.3134 33.0039 8.76136 32.5711 7.40998 31.7493C3.32435 29.2668 1.12498 23.5537 1.5506 16.4606C1.57203 16.0936 1.72747 15.7473 1.98739 15.4874C2.24732 15.2275 2.59364 15.072 2.9606 15.0506C10.0537 14.6325 15.7669 16.8243 18.2419 20.91C19.2143 22.5114 19.6388 24.3859 19.4512 26.25C19.4396 26.3944 19.3863 26.5324 19.2979 26.6472C19.2095 26.762 19.0898 26.8487 18.9531 26.8969C18.8165 26.9451 18.6688 26.9527 18.5279 26.9187C18.3871 26.8848 18.259 26.8107 18.1594 26.7056L14.5594 22.9368C14.2758 22.6674 13.8981 22.5194 13.507 22.5244C13.1158 22.5294 12.7421 22.687 12.4655 22.9636C12.1889 23.2402 12.0313 23.614 12.0263 24.0051C12.0213 24.3962 12.1693 24.7739 12.4387 25.0575L22.5412 35.4168C22.5525 35.2706 22.5656 35.1243 22.5806 34.98C22.9086 32.1989 24.1358 29.601 26.0756 27.5812L35.5612 17.5575C35.8427 17.2762 36.0009 16.8947 36.0011 16.4969C36.0013 16.099 35.8434 15.7174 35.5622 15.4359C35.281 15.1544 34.8994 14.9962 34.5016 14.996C34.1037 14.9959 33.7221 15.1538 33.4406 15.435L24.2531 25.1512C24.1611 25.2486 24.0448 25.3196 23.9161 25.3568C23.7874 25.394 23.6511 25.3961 23.5213 25.3628C23.3916 25.3295 23.2731 25.2621 23.1782 25.1675C23.0833 25.0729 23.0155 24.9546 22.9819 24.825C22.0931 21.5475 22.485 18.285 24.1819 15.4837C27.5306 9.95621 35.3231 6.99746 45.0281 7.56746C45.3951 7.58889 45.7414 7.74433 46.0013 8.00425C46.2612 8.26418 46.4167 8.6105 46.4381 8.97746C47.0006 18.6843 44.0419 26.4768 38.5144 29.8256Z" fill="#E7F5FF" />
                        </svg>
                        <span class="text-sm font-medium">Good</span>
                    </div>
                    <div
                        id="air-pure"
                        class="option flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer bg-[#E7F5FF] text-blue-500">
                        <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="svg-path" d="M24 35.2219C24.481 35.5423 24.9821 35.8316 25.5 36.0881V43.5C25.5 43.8978 25.342 44.2794 25.0606 44.5607C24.7793 44.842 24.3978 45 24 45C23.6022 45 23.2206 44.842 22.9393 44.5607C22.658 44.2794 22.5 43.8978 22.5 43.5V36.0881C23.0179 35.8316 23.5189 35.5423 24 35.2219ZM37.1437 11.7356C36.0586 9.14484 34.2321 6.93251 31.8936 5.37659C29.555 3.82068 26.8088 2.99057 24 2.99057C21.1911 2.99057 18.4449 3.82068 16.1064 5.37659C13.7679 6.93251 11.9413 9.14484 10.8562 11.7356C8.51287 12.8067 6.5266 14.5285 5.1338 16.6962C3.74101 18.8638 3.00035 21.386 2.99998 23.9625C2.98123 31.125 8.99998 37.3125 16.1512 37.5C18.3508 37.5521 20.5299 37.0675 22.5 36.0881V29.4263L14.3287 25.3425C13.9727 25.1645 13.7019 24.8523 13.576 24.4747C13.4502 24.097 13.4795 23.6848 13.6575 23.3288C13.8355 22.9727 14.1477 22.702 14.5253 22.5761C14.903 22.4502 15.3152 22.4795 15.6712 22.6575L22.5 26.0738V16.5C22.5 16.1022 22.658 15.7207 22.9393 15.4393C23.2206 15.158 23.6022 15 24 15C24.3978 15 24.7793 15.158 25.0606 15.4393C25.342 15.7207 25.5 16.1022 25.5 16.5V21.5738L32.3287 18.1575C32.505 18.0694 32.697 18.0168 32.8936 18.0028C33.0902 17.9888 33.2876 18.0137 33.4746 18.0761C33.6616 18.1384 33.8345 18.237 33.9834 18.3661C34.1323 18.4952 34.2543 18.6525 34.3425 18.8288C34.4306 19.0051 34.4832 19.197 34.4972 19.3936C34.5111 19.5902 34.4863 19.7877 34.4239 19.9747C34.3616 20.1616 34.263 20.3345 34.1339 20.4834C34.0047 20.6323 33.8475 20.7544 33.6712 20.8425L25.5 24.9263V36.0881C27.3647 37.0141 29.418 37.4972 31.5 37.5H31.8412C39 37.3125 45.0206 31.125 45 23.9625C44.9996 21.386 44.259 18.8638 42.8662 16.6962C41.4734 14.5285 39.4871 12.8067 37.1437 11.7356Z" fill="#0C3CFF" />
                        </svg>
                        <span class="text-sm font-medium">Pure</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("route-preference").addEventListener("click", function(event) {
        if (event.target.closest(".option")) {
            document.querySelectorAll("#route-preference .option").forEach((option) => {
                option.classList.remove("checked", "bg-[#0C3CFF]", "text-white");
                option.classList.add("bg-[#E7F5FF]", "text-blue-500");
                const svgPath = option.querySelector('.svg-path');
                if (svgPath) {
                    svgPath.setAttribute('fill', '#0C3CFF');
                }
            });

            const selectedOption = event.target.closest(".option");
            selectedOption.classList.add("checked", "bg-[#0C3CFF]", "text-white");
            selectedOption.classList.remove("bg-[#E7F5FF]", "text-blue-500");

            const selectedSvgPath = selectedOption.querySelector('.svg-path');
            if (selectedSvgPath) {
                selectedSvgPath.setAttribute('fill', 'white');
            }
        }
    });

    document.getElementById("air-preference").addEventListener("click", function(event) {
        if (event.target.closest(".option")) {
            document.querySelectorAll("#air-preference .option").forEach((option) => {
                option.classList.remove("checked", "bg-[#0C3CFF]", "text-white");
                option.classList.add("bg-[#E7F5FF]", "text-blue-500");
                const svgPath = option.querySelector('.svg-path');
                if (svgPath) {
                    svgPath.setAttribute('fill', '#0C3CFF');
                }
            });

            const selectedOption = event.target.closest(".option");
            selectedOption.classList.add("checked", "bg-[#0C3CFF]", "text-white");
            selectedOption.classList.remove("bg-[#E7F5FF]", "text-blue-500");

            const selectedSvgPath = selectedOption.querySelector('.svg-path');
            if (selectedSvgPath) {
                selectedSvgPath.setAttribute('fill', 'white');
            }
        }
    });
</script>
@endsection