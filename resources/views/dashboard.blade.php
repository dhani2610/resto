{{-- Extends the layout for authenticated users --}}
@extends('layouts.user_type.auth')

{{-- Content section --}}
@section('content')

    <style>
        :root {
            --color1: rgb(0, 231, 255);
            --color2: rgb(255, 0, 231);
            --charizard1: #fac;
            --charizard2: #ddccaa;
            --charizardfront: url(/assets/img/cicak.jpg);
            --pika1: #54a29e;
            --pika2: #a79d66;
            --pikafront: url(/assets/img/cicak.jpg);
            --eevee1: #efb2fb;
            --eevee2: #acc6f8;
            --eeveefront: url(/assets/img/cicak.jpg);
            --mewtwo1: #efb2fb;
            --mewtwo2: #acc6f8;
            --mewtwofront: url(/assets/img/cicak.jpg);
        }


        .card {

            width: 71.5vw;
            height: 100vw;
        / / width: clamp(200 px, 61 vh, 18 vw);
        / / height: clamp(280 px, 85 vh, 25.2 vw);
            @media screen and (min-width: 600px) {
            // width: 61vh;
            // height: 85vh;
            // max-width: 500px;
            // max-height: 700px;
                width: clamp(12.9vw, 61vh, 18vw);
                height: clamp(18vw, 85vh, 25.2vw);
            }

            position: relative;
            overflow: hidden;
            margin: 20px;
            overflow: hidden;
            z-index: 10;
            touch-action: none;

            border-radius: 5% / 3.5%;
            box-shadow: -5px -5px 5px -5px var(--color1),
            5px 5px 5px -5px var(--color2),
            -7px -7px 10px -5px transparent,
            7px 7px 10px -5px transparent,
            0 0 5px 0px rgba(255, 255, 255, 0),
            0 55px 35px -20px rgba(0, 0, 0, 0.5);

            transition: transform 0.5s ease, box-shadow 0.2s ease;
            will-change: transform, filter;

            background-color: #040712;
            background-image: var(--front);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            transform-origin: center;

        }

        .card:hover {
            box-shadow: -20px -20px 30px -25px var(--color1),
            20px 20px 30px -25px var(--color2),
            -7px -7px 10px -5px var(--color1),
            7px 7px 10px -5px var(--color2),
            0 0 13px 4px rgba(255, 255, 255, 0.3),
            0 55px 35px -20px rgba(0, 0, 0, 0.5);
        }

        .card.charizard {
            --color1: var(--charizard1);
            --color2: var(--charizard2);
            --front: var(--charizardfront);
        }

        .card.pika {
            --color1: var(--pika1);
            --color2: var(--pika2);
            --front: var(--pikafront);
        }

        .card.mewtwo {
            --color1: var(--mewtwo1);
            --color2: var(--mewtwo2);
            --front: var(--mewtwofront);
        }

        .card.eevee {
            --color1: #ec9bb6;
            --color2: #ccac6f;
            --color3: #69e4a5;
            --color4: #8ec5d6;
            --color5: #b98cce;
            --front: var(--eeveefront);
        }

        .card:before,
        .card:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            background-repeat: no-repeat;
            opacity: .5;
            mix-blend-mode: color-dodge;
            transition: all .33s ease;
        }

        .card:before {
            background-position: 50% 50%;
            background-size: 300% 300%;
            background-image: linear-gradient(
                115deg,
                transparent 0%,
                var(--color1) 25%,
                transparent 47%,
                transparent 53%,
                var(--color2) 75%,
                transparent 100%
            );
            opacity: .5;
            filter: brightness(.5) contrast(1);
            z-index: 1;
        }

        .card:after {
            opacity: 1;
            background-image: url("https://assets.codepen.io/13471/sparkles.gif"),
            url(https://assets.codepen.io/13471/holo.png),
            linear-gradient(125deg, #ff008450 15%, #fca40040 30%, #ffff0030 40%, #00ff8a20 60%, #00cfff40 70%, #cc4cfa50 85%);
            background-position: 50% 50%;
            background-size: 160%;
            background-blend-mode: overlay;
            z-index: 2;
            filter: brightness(1) contrast(1);
            transition: all .33s ease;
            mix-blend-mode: color-dodge;
            opacity: .75;
        }

        .card.active:after,
        .card:hover:after {
            filter: brightness(1) contrast(1);;
            opacity: 1;
        }

        .card.active,
        .card:hover {
            animation: none;
            transition: box-shadow 0.1s ease-out;
        }

        .card.active:before,
        .card:hover:before {
            animation: none;
            background-image: linear-gradient(
                110deg,
                transparent 25%,
                var(--color1) 48%,
                var(--color2) 52%,
                transparent 75%
            );
            background-position: 50% 50%;
            background-size: 250% 250%;
            opacity: .88;
            filter: brightness(.66) contrast(1.33);
            transition: none;
        }

        .card.active:before,
        .card:hover:before,
        .card.active:after,
        .card:hover:after {
            animation: none;
            transition: none;
        }

        .card.animated {
            transition: none;
            animation: holoCard 12s ease 0s 1;

            &:before {
                transition: none;
                animation: holoGradient 12s ease 0s 1;
            }

            &:after {
                transition: none;
                animation: holoSparkle 12s ease 0s 1;
            }
        }


        @keyframes holoSparkle {
            0%, 100% {
                opacity: .75;
                background-position: 50% 50%;
                filter: brightness(1.2) contrast(1.25);
            }
            5%, 8% {
                opacity: 1;
                background-position: 40% 40%;
                filter: brightness(.8) contrast(1.2);
            }
            13%, 16% {
                opacity: .5;
                background-position: 50% 50%;
                filter: brightness(1.2) contrast(.8);
            }
            35%, 38% {
                opacity: 1;
                background-position: 60% 60%;
                filter: brightness(1) contrast(1);
            }
            55% {
                opacity: .33;
                background-position: 45% 45%;
                filter: brightness(1.2) contrast(1.25);
            }
        }

        @keyframes holoGradient {
            0%, 100% {
                opacity: 0.5;
                background-position: 50% 50%;
                filter: brightness(.5) contrast(1);
            }
            5%, 9% {
                background-position: 100% 100%;
                opacity: 1;
                filter: brightness(.75) contrast(1.25);
            }
            13%, 17% {
                background-position: 0% 0%;
                opacity: .88;
            }
            35%, 39% {
                background-position: 100% 100%;
                opacity: 1;
                filter: brightness(.5) contrast(1);
            }
            55% {
                background-position: 0% 0%;
                opacity: 1;
                filter: brightness(.75) contrast(1.25);
            }
        }

        @keyframes holoCard {
            0%, 100% {
                transform: rotateZ(0deg) rotateX(0deg) rotateY(0deg);
            }
            5%, 8% {
                transform: rotateZ(0deg) rotateX(6deg) rotateY(-20deg);
            }
            13%, 16% {
                transform: rotateZ(0deg) rotateX(-9deg) rotateY(32deg);
            }
            35%, 38% {
                transform: rotateZ(3deg) rotateX(12deg) rotateY(20deg);
            }
            55% {
                transform: rotateZ(-3deg) rotateX(-12deg) rotateY(-27deg);
            }
        }


        .card.eevee:hover {
            box-shadow: 0 0 30px -5px white,
            0 0 10px -2px white,
            0 55px 35px -20px rgba(0, 0, 0, 0.5);
        }

        .card.eevee:hover:before,
        .card.eevee.active:before {
            background-image: linear-gradient(
                115deg,
                transparent 20%,
                var(--color1) 36%,
                var(--color2) 43%,
                var(--color3) 50%,
                var(--color4) 57%,
                var(--color5) 64%,
                transparent 80%
            );
        }


        .demo .card {
            background-image: var(--back);
            font-size: 2vh
        }

        .demo .card > span {
            position: relative;
            top: 45%;
        }

        .demo .card:nth-of-type(1),
        .demo .card:nth-of-type(2),
        .demo .card:nth-of-type(3) {
            width: 20vh;
            height: 27.5vh;
            box-shadow: inset 0 0 0 1px rgba(white, 0.4), 0 25px 15px -10px rgba(0, 0, 0, 0.5);
            animation: none;
        }

        .demo .card:nth-of-type(1),
        .demo .card:nth-of-type(2),
        .demo .card:nth-of-type(3) {
            &:before, &:after {
                animation: none;
            / / opacity: 1;
            }
        }

        .demo .card:nth-of-type(1) {
            &:before, &:after {
                display: none;
            }
        }

        .demo .card:nth-of-type(2) {
            background: none;

            &:before {
                display: none;
            }
        }

        .demo .card:nth-of-type(3) {
            background: none;

            &:after {
                display: none;
            }
        }

        .operator {
            display: inline-block;
            vertical-align: middle;
            font-size: 6vh;
        }


        html, body {
            height: 100%;
            background-color: #333844;
            padding: 0;
            z-index: 1;
            transform: translate3d(0, 0, 0.1px);
        }

        body {
            color: white;
            background-color: #333844;
            font-family: "Heebo", sans-serif;
            text-align: center;
        }

        h1 {
            display: block;
            margin: 30px 0;
        }

        p {
            margin-top: 5px;
            font-weight: 200;
        }

        #app {
            position: relative;
        }

        .demo,
        .cards {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            perspective: 2000px;
            position: relative;
            z-index: 1;
            transform: translate3d(0.1px, 0.1px, 0.1px)
        }

        .demo {
            flex-direction: row;
            justify-content: center;
        }

        @media screen and (min-width: 600px) {
            .cards {
                flex-direction: row;
            }
        }


        .cards .card {
            &:nth-child(2) {
                &, &:before, &:after {
                    animation-delay: 0.25s;
                }
            }

            &:nth-child(3) {
                &, &:before, &:after {
                    animation-delay: 0.5s;
                }
            }

            &:nth-child(4) {
                &, &:before, &:after {
                    animation-delay: 0.75s;
                }
            }
        }


        p {
            font-weight: 400;
            font-size: 18px;
            padding: 1em;
            background: rgba(0, 0, 0, 0.3);
            margin-top: 0;
            animation: rubberBand 1.5s linear 3s 1;
        }

        .promo {
            margin-top: 50px;
        }

        .promo img {
            margin-top: 10px;
            max-width: 80%;
        }

        p a {
            color: cyan;
        }

        html, body, main {
            min-height: 100%;
        }


        @keyframes rubberBand {
            from {
                transform: scale3d(1, 1, 1);
            }

            30% {
                transform: scale3d(1.25, 0.75, 1);
            }

            40% {
                transform: scale3d(0.75, 1.25, 1);
            }

            50% {
                transform: scale3d(1.15, 0.85, 1);
            }

            65% {
                transform: scale3d(0.95, 1.05, 1);
            }

            75% {
                transform: scale3d(1.05, 0.95, 1);
            }

            to {
                transform: scale3d(1, 1, 1);
            }
        }
    </style>

    {{-- Link to the CSS for the datepicker --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
          rel="stylesheet"/>

    {{-- Main content of the page --}}
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="cards">
                <div class="card-body p-3">
                    <div id="container">
                        {{-- Dashboard title --}}
                        Dashboard Resto Tepi Danau Bistro
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="pb-6">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-6">--}}
    {{--                <div--}}
    {{--                    class="bg-white dark:bg-zinc-800 rounded rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto mt-4">--}}
    {{--                    <img src="{{ asset('assets/img/cicak.jpg') }}" alt="Developer" class="w-full">--}}
    {{--                    <div class="p-3">--}}
    {{--                        <h2 class="text-lg font-bold text-zinc-800 dark:text-white">Jody</h2>--}}
    {{--                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Project Manager</p>--}}
    {{--                        <p class="text-sm text-zinc-700 dark:text-zinc-300 mt-2">Baik, Rendah hati, Tidak Keras Kepala,--}}
    {{--                            Rajin Menabung, Suka Menolong dan Rajin ke Gereja</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-6">--}}
    {{--                <div--}}
    {{--                    class="bg-white dark:bg-zinc-800 rounded rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto mt-4">--}}
    {{--                    <img src="{{ asset('assets/img/cicak.jpg') }}" alt="Developer" class="w-full">--}}
    {{--                    <div class="p-3">--}}
    {{--                        <h2 class="text-lg font-bold text-zinc-800 dark:text-white">Jody</h2>--}}
    {{--                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Project Manager</p>--}}
    {{--                        <p class="text-sm text-zinc-700 dark:text-zinc-300 mt-2">Baik, Rendah hati, Tidak Keras Kepala,--}}
    {{--                            Rajin Menabung, Suka Menolong dan Rajin ke Gereja</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-6">--}}
    {{--                <div--}}
    {{--                    class="bg-white dark:bg-zinc-800 rounded rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto mt-4">--}}
    {{--                    <img src="{{ asset('assets/img/cicak.jpg') }}" alt="Developer" class="w-full">--}}
    {{--                    <div class="p-3">--}}
    {{--                        <h2 class="text-lg font-bold text-zinc-800 dark:text-white">Jody</h2>--}}
    {{--                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Project Manager</p>--}}
    {{--                        <p class="text-sm text-zinc-700 dark:text-zinc-300 mt-2">Baik, Rendah hati, Tidak Keras Kepala,--}}
    {{--                            Rajin Menabung, Suka Menolong dan Rajin ke Gereja</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-6">--}}
    {{--                <div--}}
    {{--                    class="bg-white dark:bg-zinc-800 rounded rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto mt-4">--}}
    {{--                    <img src="{{ asset('assets/img/cicak.jpg') }}" alt="Developer" class="w-full">--}}
    {{--                    <div class="p-3">--}}
    {{--                        <h2 class="text-lg font-bold text-zinc-800 dark:text-white">Jody</h2>--}}
    {{--                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Project Manager</p>--}}
    {{--                        <p class="text-sm text-zinc-700 dark:text-zinc-300 mt-2">Baik, Rendah hati, Tidak Keras Kepala,--}}
    {{--                            Rajin Menabung, Suka Menolong dan Rajin ke Gereja</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="pb-6">
        <section class="cards">
            <div class="card charizard animated"></div>
            <div class="card pika animated"></div>
            <div class="card eevee animated"></div>
            <div class="card mewtwo animated"></div>
        </section>
    </div>

    {{-- End of content section --}}
@endsection

{{-- Pushes scripts to the stack named 'dashboard' --}}
@push('dashboard')

    <script>
        var x;
        var $cards = $(".card");
        var $style = $(".hover");

        $cards
            .on("mousemove touchmove", function (e) {
                // normalise touch/mouse
                var pos = [e.offsetX, e.offsetY];
                e.preventDefault();
                if (e.type === "touchmove") {
                    pos = [e.touches[0].clientX, e.touches[0].clientY];
                }
                var $card = $(this);
                // math for mouse position
                var l = pos[0];
                var t = pos[1];
                var h = $card.height();
                var w = $card.width();
                var px = Math.abs(Math.floor(100 / w * l) - 100);
                var py = Math.abs(Math.floor(100 / h * t) - 100);
                var pa = (50 - px) + (50 - py);
                // math for gradient / background positions
                var lp = (50 + (px - 50) / 1.5);
                var tp = (50 + (py - 50) / 1.5);
                var px_spark = (50 + (px - 50) / 7);
                var py_spark = (50 + (py - 50) / 7);
                var p_opc = 20 + (Math.abs(pa) * 1.5);
                var ty = ((tp - 50) / 2) * -1;
                var tx = ((lp - 50) / 1.5) * .5;
                // css to apply for active card
                var grad_pos = `background-position: ${lp}% ${tp}%;`
                var sprk_pos = `background-position: ${px_spark}% ${py_spark}%;`
                var opc = `opacity: ${p_opc / 100};`
                var tf = `transform: rotateX(${ty}deg) rotateY(${tx}deg)`
                // need to use a <style> tag for psuedo elements
                var style = `
      .card:hover:before { ${grad_pos} }  /* gradient */
      .card:hover:after { ${sprk_pos} ${opc} }   /* sparkles */
    `
                // set / apply css class and style
                $cards.removeClass("active");
                $card.removeClass("animated");
                $card.attr("style", tf);
                $style.html(style);
                if (e.type === "touchmove") {
                    return false;
                }
                clearTimeout(x);
            }).on("mouseout touchend touchcancel", function () {
            // remove css, apply custom animation on end
            var $card = $(this);
            $style.html("");
            $card.removeAttr("style");
            x = setTimeout(function () {
                $card.addClass("animated");
            }, 2500);
        });
    </script>

    {{-- Highcharts scripts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    {{-- jQuery and Bootstrap scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    {{-- End of script stack --}}
@endpush
