<x-app-layout>
    <div class="p-0 w-full h-screen bg-indigo-600 bg-justfun-download-bg bg-cover bg-center bg-no-repeat sm:flex items-center justify-end hidden">
        <div class="btns flex justify-around items-center">
            <div class="grid grid-rows-3 gap-y-8 mr-20">
                <a class="w-44 rounded-full" href="https://file.zhuafan.tech/app/v2.9.51_main.apk">
                    <img class="img-fluid" src="{{ url('/storage/download-btn-android.png') }}" alt="">
                </a>
                <a class="w-44 rounded-full" href="https://file.zhuafan.tech/app/v2.9.51_main.apk">
                    <img class="img-fluid" src="{{ url('/storage/download-btn-ios.png') }}" alt="">
                </a>
                <a class="w-44 rounded-full" href="https://file.zhuafan.tech/app/v2.9.51_main.apk">
                    <img class="img-fluid" src="{{ url('/storage/download-btn-pc.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="w-full h-screen bg-justfun-download-mb bg-cover bg-no-repeat flex flex-col flex-nowrap items-center justify-start">
        <img src="{{ url('/storage/download_title_mobile.png') }}" alt="" class="img-fluid w-10/12">
        <a href="#" id="download" class="rounded-3xl border border-white text-xl py-2 px-10 text-white">企业版本APP下载</a>
        <img src="{{ url('/storage/download_logo_mobile.png') }}" alt="" class="img-fluid w-2/3 pt-4">
    </div>
    <script type="text/javascript">
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        if (/windows phone/i.test(userAgent)) {
            document.getElementById('download').setAttribute('href', 'https://file.zhuafan.tech/app/v2.9.51_main.apk');
        }
        if (/android/i.test(userAgent)) {
            document.getElementById('download').setAttribute('href', 'https://file.zhuafan.tech/app/v2.9.51_main.apk');
        }
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            document.getElementById('download').setAttribute('href', 'https://entgroup-file.oss-cn-shanghai.aliyuncs.com/app/zhuafan.ipa');
        }
    </script>
</x-app-layout>
