<style>
    h1, h2, h3{
        font-family: manrope;
        font-weight: 800 !important;
        letter-spacing: 0.1em;
        line-height: 2;
        padding: 5px 0;
    }
    h1{
        font-size: 2em;
    }
    h2{
        font-size: 1.2em;
    }
    h3{
        font-size: 1em
    }
    p{
        font-family: manrope;
        font-size: 16px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teksten') }}
        </h2>
    </x-slot>
    <div id="loader"></div>
    <div style="display: block; margin-left:auto; margin-right:auto;"
         class="container text-white py-4 px-4 max-w-4xl">
        <h1 class="font-title text-4xl p-6"> {{ Str::title($generator->product_name) }}</h1>


        <div class="mt-3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div onclick="copyDivToClipboard()" class="text-gray-900 cursor-pointer hover:bg-gray-400 rounded-lg float-right px-3 py-1 bg-gray-300"><span id="check" class="hidden">✓</span> Kopieren</div>
                        <div id="a">
                            {!! $generator->text !!}
                        </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function copyDivToClipboard() {
            var range = document.createRange();
            range.selectNode(document.getElementById("a"));
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            document.execCommand("copy");
            window.getSelection().removeAllRanges();// to deselect
            document.getElementById('check').style.display = "inline-block";
            setTimeout(function () {
                document.getElementById('check').style.display = "none";
            }, 10000);


        }
    </script>


</x-app-layout>
