<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        @vite('resources/css/app.css')
        <style>
            .loading .bar{
                width: 10px;
                border-radius: 10px;
                background: black;
                animation: movement .24s ease-in-out infinite;
            }

            @keyframes movement {
                0%, 100% {
                    height: 2px;
                }
                50% {
                    height: 80px;
                }
            }
            
            .loading .bar:nth-child(1) {
                animation-delay: 1s;
            }
            
            .loading .bar:nth-child(2) {
                animation-delay: .8s;
            }
            
            .loading .bar:nth-child(3) {
                animation-delay: .6s;
            }
            
            .loading .bar:nth-child(4) {
                animation-delay: .4s;
            }
            
            .loading .bar:nth-child(5) {
                animation-delay: .2s;
            }
            
            .loading .bar:nth-child(6) {
                animation-delay: .4s;
            }
            
            .loading .bar:nth-child(7) {
                animation-delay: .6s;
            }
            
            .loading .bar:nth-child(8) {
                animation-delay: .8s;
            }
            
            .loading .bar:nth-child(9) {
                animation-delay: 1s;
            }
        </style>
    </head>
    <body class="antialiased">
        @if(isset($result))
            <x-form-input.submit-result :$name :$password :$radio :$checkbox :$color :$date :$minmaxdate 
            :$datetime :$minmaxdatetime :$email :$imagex :$imagey :$filepath :$hidden :$number :$range :$search :$telephone>
            </x-form-input.submit-result>
        @else
        <div class="w-full py-10 flex justify-center">
            <div class="w-1/2 p-7 border shadow-xl">
                <div class="w-full h-[150px] flex justify-center">
                    <div class="loading inline-flex gap-2 justify-between items-center">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <form action="/forms/submit" enctype="multipart/form-data" method="POST">
                    @csrf
                    <x-form-input.text label="Name" name="name" placeholder="Your Name" pattern="^[a-zA-Z]{3,20}$" required="true" note="Only Alphabets, 3 to 20 Characters."></x-form-input.text>
                    <x-form-input.password label="Password" name="password" placeholder="Your Password" required="true" note="Password is Required"></x-form-input.password>
                    @php
                    //This array can be made from the controller
                    $radioOptions = array(
                        "Radio 1" => "",
                        "Radio 2" => "Checked",
                        "Radio 3" => "",
                    );
                    $checkboxOptions = array(
                        "Check Value 1" => "Checked",
                        "Check Value 2" => "",
                        "Check Value 3" => "Checked",
                    );
                    @endphp
                    <x-form-input.radio label="Radio Inputs" name="radio" :$radioOptions note="The second option is Checked by Default."></x-form-input.radio>
                    <x-form-input.checkbox label="Checkbox Inputs" name="checkbox" :$checkboxOptions note="The first and third option is Checked by Default."></x-form-input.checkbox>
                    <x-form-input.color label="Color" name="color" value="#00FFFF" disabled="true" note="This field is disabled by Default."></x-form-input.color>
                    <x-form-input.date label="Date" name="date" note="Date Field."></x-form-input.date>
                    <x-form-input.date label="Min Max Date" name="minmaxdate" min="2020-07-10" max="2020-07-20" note="Date Field with minimum and maximum selectable date."></x-form-input.date>
                    <x-form-input.datetime label="Date Time" name="datetime" note="Date Field with Time."></x-form-input.datetime>
                    <x-form-input.datetime label="Min Max Date Time" name="minmaxdatetime" min="2020-07-10T07:00" max="2020-07-20T22:00" note="Date Field with Time, both date and time have minimum and maximum selectable timestamps."></x-form-input.datetime>
                    <x-form-input.email label="Email" name="email" placeholder="Your Email" value="abc123@example.com" required="true" note="Email is required."></x-form-input.email>
                    <x-form-input.file label="File" name="file" note="File is stored under {rootDir}/storage/app/upload/."></x-form-input.file>
                    <x-form-input.hidden name="hidden" value="HiddenID"></x-form-input.hidden>
                    <x-form-input.number label="Number" name="number" placeholder="123" note="Number Field."></x-form-input.number>
                    <x-form-input.range label="Range" name="range" min="30" max="130" step="5" value="0" showvalue="true" note="Range Field within 30 - 130 and step of 5 by Default."></x-form-input.range>
                    <x-form-input.search label="Search" name="search" placeholder="Search Field" pattern="^[a-zA-Z]+$" note="Only Alphabets."></x-form-input.search>
                    <x-form-input.tel label="Telephone" name="telephone" placeholder="Your Phone" pattern="[0-9]{3,4}-[0-9]{4}-[0-9]{3,4}" note="Telephone Number (e.g. 1234-2345-123 or 123-1234-1234 or 123-1234-345"></x-form-input.tel>
                    <div class="flex justify-end items-end gap-3">
                        <x-form-input.reset label="Reset"></x-form-input.reset>
                        <x-form-input.submit label="Submit"></x-form-input.submit>
                        <x-form-input.image label="Image" name="image" img="{{ asset('/assets/form/pompom-ok.png') }}" width="150" height="150"></x-form-input.image>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </body>
</html>
