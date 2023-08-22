@extends('layouts.theme.default')
@section('title', auth()->user()->username . ' | cpx-research')
@section('content')
{{-- cpx research --}}
<div style="max-width: 950px; margin: auto" id="fullscreen"></div>
<div style="width: 100%; height: 150px;" id="single"></div>
<div id="sidebar" style="height: 469px"></div>
<div id="notification" style="height: 469px"></div>
<div id="notification2" style="height: 469px"></div>
@if ($oneOffer->id === 10)
    @push('script')
        <script type="text/javascript" src="https://cdn.cpx-research.com/assets/js/script_tag_v2.0.js"></script>
    @endpush
    @push('script')
        <script>
            // How to use:
            // 1. Add div(s) to html and give it an id
            // 2. add this config script before the script tag
            // 3. place the script on the bottom before the closing html tag

            // All instances will take up the available space of its div
            // If you are using the sidebar option, please specify a fixed height
            // To debug, please only use 1 option

            const script1 = {
                div_id: "fullscreen", // string // Entry point for the script
                theme_style: 1, // int // Theme: Select 1 for fullscreen, 2 for sidebar, 3 for sidebar single item
                order_by: 2, // int // Sort surveys (optional): Select 1 for best score (default), 2 for best money, 3 for best conversion rate
                limit_surveys: 7 // int // Limit the number of surveys displayed (optional). Default is 12.
            };

            const script2 = {
                div_id: "sidebar",
                theme_style: 1,
                order_by: 1,
            };

            const script3 = {
                div_id: "single",
                theme_style: 3,
                display_mode: 1 //(optional): 1 show text "no surveys", 2 make element invisible, 3 dont render the element
                // Display_mode option only affects the behaviour of the box (theme style 3) if no surveys are found
            };

            // NOTIFICATION LOGIC:
            // no text, no link -> earn XX in XX Minutes, survey opening directly
            // text and link -> own text + and own link
            // text, but no link -> survey is opening directly
            // no text, but link -> standard text + link


            const script4 = {
                div_id: "notification",
                theme_style: 4,
                position: 5, //number // default 1 // 1 = top center, 2 = top left, 3 top right, 4 bottom left, 5 bottom right, 6 bottom center
                text: "",
                link: "",
                newtab: true
            };

            const script5 = {
                div_id: "notification2",
                theme_style: 4,
                position: 6, //number // default 1 // 1 = top center, 2 = top left, 3 top right, 4 bottom left, 5 bottom right, 6 bottom center
                text: "",
                link: "https://wall.cpx-research.com/index.php?app_id={your_app_id}&ext_user_id={ext_user_id}",
                newtab: true
            };



            const config = {
                general_config: {
                    app_id: "{{ $oneOffer->public_key }}", //number
                    ext_user_id: "{{ $subId }}", // string
                    email: "", // string
                    username: "", // string
                    secure_hash: "", // string if enabled on publisher area
                    subid_1: "", // string
                    subid_2: "", // string
                },
                style_config: {
                    text_color: "#2b2b2b", // string // hex, rgba, colorcode
                    survey_box: {
                        topbar_background_color: "#ffaf20", // string // hex, rgba, colorcode
                        box_background_color: "white", // string // hex, rgba, colorcode
                        rounded_borders: true, // boolean true || false
                        stars_filled: "black", // string // hex, rgba, colorcode
                    },
                },
                script_config: [script1, script2, script3, script4, script5], // Object Array
                debug: false, // boolean
                useIFrame: true, //boolean    
                iFramePosition: 1, // 1 right (default), 2 left
                functions: {
                    no_surveys_available: () => {
                        console.log("no surveys available function here");
                    }, // Function without parameter, NEVER USE window.alert... because of infinite loop
                    count_new_surveys: (countsurveys) => {
                        console.log("count surveys function here, count:", countsurveys);
                    },
                    get_all_surveys: (surveys) => {
                        console.log("get all surveys function here, surveys: ", surveys);
                    },
                    get_transaction: (transactions) => {
                        console.log("transaction function here, transaction: ", transactions);
                    }


                }


            };

            window.config = config;
        </script>
    @endpush
@endif

@endsection