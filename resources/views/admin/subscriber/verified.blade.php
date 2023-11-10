<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>{{ $title ?? title() }}</title>

    {{-- Meta Tags --}}
    <meta name="description"
        content="{{ setting('descrption', config('adminetic.description', 'Laravel Adminetic Admin Panel Upgrade.')) }}">
    <meta name="author" content="Pratik Shrestha">
    <meta name="keywords"
        content="{{ $keywords ?? (keywords() ?? 'adminetic admin panel, adminetic, pratik shrestha, doctype innovations') }}">

    {{-- Open Graph Tags --}}
    <meta property="og:title" content="{{ $title ?? (title() ?? config('adminetic.title', 'Event Management')) }}" />
    <meta property="og:description" content="{{ $description ?? (title() ?? 'Event Management') }}" />
    <meta property="og:image" content="{{ url($image ?? logoBanner()) }}" />

    <link rel="icon" href="{{ favicon() }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ favicon() }}" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{ favicon() }}">
    <style>
        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Poppins";
            background: #3173f6;
            background-size: cover;
            height: 100vh;
            display: grid;
            place-items: center;
        }

        .card {
            background: #fff;
            width: calc(100% - 40px);
            max-width: 640px;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 24px;
            color: #263238;
            font-weight: 700;
        }

        .card p {
            margin: 0 0 15px;
            color: #546e7a;
        }

        .btn {
            padding: 13px 10px;
            border: none;
            min-width: 180px;
            border-radius: 4px;
            transition: 0.2s ease-in;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 2px 6px #0001;
        }

        .btn:hover {
            box-shadow: 0 3px 15px #0002;
        }

        .btn+.btn {
            margin-left: 10px;
        }

        .btn-primary {
            background: #304ffe;
            color: #fff;
        }

        .btn-primary:hover {
            background: #536dfe;
        }

        .btn-secondary {
            background: #f5f5f5;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .emo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 240px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 0px;
            background: #3173f6;
        }

        .emo-container * {
            transition: 0.2s ease-in;
        }

        .bunny {
            height: 180px;
            width: 130px;
            background: #fff;
            border-radius: 100px;
            border: 1px solid #eee;
            position: relative;
            z-index: 10;
            transform: translateY(8px);
        }

        .bunny .leg {
            position: absolute;
            background: #fefefe;
            width: 45px;
            height: 70px;
            bottom: 10px;
            z-index: 20;
            border-radius: 50px;
            transform-origin: 22.5px 70px 0;
            border: 1px solid #eee;
        }

        .bunny .leg:before {
            content: "";
            position: absolute;
            top: 5px;
            color: #d571a6;
            background: currentcolor;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 13px;
            border-radius: 50%;
            box-shadow: 12px 7px 0 -2px, -12px 7px 0 -2px;
        }

        .bunny .leg.l {
            left: 15px;
            transform: rotate(-40deg);
            box-shadow: 0px -3px 6px #0001;
            animation: 1.4s doubtLegL ease-out infinite alternate;
        }

        .bunny .leg.r {
            transform: rotate(40deg);
            right: 15px;
            box-shadow: 3px 0px 6px #0001;
            animation: 1.4s doubtLegR ease-out infinite alternate;
        }

        .bunny .face {
            background: #fff;
            width: 100%;
            height: 100%;
            border-radius: 100px;
            z-index: 10;
            position: relative;
        }

        .bunny .face .eye {
            top: 25px;
            position: absolute;
            z-index: 6;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            border: 2px solid #444;
            background: radial-gradient(circle 5px, #222 100%, transparent 0) no-repeat;
            animation: 2.8s doubtEye ease-out infinite alternate;
        }

        .bunny .face .eye.l {
            left: 30px;
        }

        .bunny .face .eye.r {
            right: 30px;
        }

        .bunny .mostash {
            position: absolute;
            width: 50px;
            height: 30px;
            border: 1px solid #0000;
            border-top-color: #fff;
            border-radius: 50%;
            top: 35px;
            transform: rotate(-4deg);
            z-index: 2;
        }

        .bunny .mostash:after {
            content: "";
            position: absolute;
            width: 50px;
            height: 30px;
            border: 1px solid #0000;
            border-top-color: #fff;
            border-radius: 50%;
            transform-origin: 50px 0;
        }

        .bunny .mostash.l {
            left: -35px;
            transform-origin: 50px 0;
        }

        .bunny .mostash.l:after {
            left: 8px;
            top: -8px;
            transform: rotate(15deg);
        }

        .bunny .mostash.r {
            right: -35px;
            transform-origin: 0px 0;
        }

        .bunny .mostash.r:after {
            left: auto;
            right: 8px;
            top: -20px;
            transform: rotate(-15deg);
        }

        .bunny .nose {
            position: absolute;
            width: 16px;
            height: 14px;
            transform: translateX(-50%);
            left: 50%;
            top: 40px;
        }

        .bunny .nose:before,
        .bunny .nose:after {
            content: "";
            position: absolute;
            top: 0;
            width: 8px;
            height: 12px;
            border-radius: 16px;
            background: #d571a6;
        }

        .bunny .nose:before {
            left: 8px;
            transform: rotate(-45deg);
            transform-origin: 0 100%;
        }

        .bunny .nose:after {
            left: 0;
            transform: rotate(45deg);
            transform-origin: 100% 100%;
        }

        .bunny .mouth {
            position: absolute;
            left: 50%;
            top: 55px;
            width: 15px;
            height: 5px;
            border-radius: 0 0 50% 50%;
            transform: translateX(-50%);
            overflow: hidden;
            border: 2px solid #0000;
            border-bottom-color: #000;
        }

        .bunny .ear {
            position: absolute;
            width: 32px;
            background: #d571a6;
            border: 9px solid #fff;
            height: 100px;
            border-radius: 20px 20px 0 0;
            transform-origin: 16px 100px;
        }

        .bunny .ear.r {
            right: 35px;
            transform: rotate(14deg);
            bottom: 160px;
            animation: 0.35s doubtEarR ease-out infinite alternate;
        }

        .bunny .ear.l {
            left: 35px;
            transform: rotate(-4deg);
            bottom: 160px;
        }

        .bunny .hand {
            position: absolute;
            width: 32px;
            background: #fff;
            height: 60px;
            border-radius: 0 0 20px 20px;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
            transform-origin: 16px 0px;
            z-index: 16;
            top: 90px;
            box-shadow: 2px 4px 8px #0001;
        }

        .bunny .hand:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            background: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid #fff;
            border-color: #fff #fff #d571a6 #d571a6;
            transform: rotate(-45deg);
        }

        .bunny .hand.l {
            left: 0px;
            transform: rotate(345deg);
            animation: 1.4s doubtHandL ease-out infinite alternate;
        }

        .bunny .hand.r {
            right: 0px;
            transform: rotate(120deg);
            animation: 0.7s doubtHandR ease-out infinite alternate;
        }

        .bunny .tail {
            position: absolute;
            left: 50%;
            bottom: -10px;
            background: #eee;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        .btn:hover~.emo-container .bunny .ear.l {
            bottom: 135px;
        }

        .btn:hover~.emo-container .bunny .ear.l:after {
            content: "";
            position: absolute;
            width: 32px;
            height: 64px;
            background: #fff;
            border-radius: 20px;
            transform-origin: 16px 16px;
            transform: rotate(64deg);
            top: -9px;
            left: -9px;
            box-shadow: 4px 4px 4px #0001;
        }

        .btn:hover~.emo-container .bunny .mouth {
            background: #562242;
        }

        .btn:hover~.emo-container .bunny .mouth:before {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            z-index: 2;
            width: 18px;
            border-style: solid;
            border-color: #eee #0000 #0000 #0000;
            border-width: 8px 3px 0px 3px;
        }

        .btn:hover~.emo-container .bunny .mouth:after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            background: #d571a6;
            width: 36px;
            height: 12px;
            border-radius: 30px 30px 0 0;
            box-shadow: 0 -10px 0 5px #3e1632;
        }

        .btn-primary:hover~.emo-container:after {
            content: "";
            aspect-ratio: 10/1;
            width: 100%;
            background: #3173f6;
            position: absolute;
            left: 0;
            bottom: 0;
            border-radius: 50%;
            animation: 0.35s happyJumpMat ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny {
            animation: 0.35s happyJump ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .ear.l:after {
            animation: happyEarL 0.35s ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .ear.r {
            animation: happyEarR 0.35s ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .eye {
            top: 30px;
            width: 20px;
            height: 20px;
            background: #0000;
            border: 2px solid #0000;
            border-color: #000 #000 #0000 #0000;
            transform: rotate(-45deg);
        }

        .btn-primary:hover~.emo-container .bunny .mostash.l {
            animation: happyMostashL 0.35s ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .mostash.r {
            animation: happyMostashR 0.35s ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .mouth {
            border: none;
            width: 70px;
            border-radius: 0 0 50px 50px;
            animation: happyMouth 0.35s ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .hand.l {
            animation: 0.35s happyHandL ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .hand.r {
            animation: 0.35s happyHandR ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .tail {
            animation: 0.35s happyTail ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .leg.l {
            animation: happyLegL 0.35s ease-out infinite alternate;
        }

        .btn-primary:hover~.emo-container .bunny .leg.r {
            animation: happyLegR 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny {
            animation: 0.35s sadMove ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .ear.l:after {
            animation: sadEarL 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .ear.r {
            bottom: 140px;
        }

        .btn-secondary:hover~.emo-container .bunny .ear.r::after {
            content: "";
            position: absolute;
            width: 32px;
            height: 64px;
            background: #fff;
            border-radius: 20px;
            transform-origin: 16px 16px;
            transform: rotate(-64deg);
            top: -9px;
            left: -9px;
            box-shadow: -4px 4px 4px #0001;
            animation: sadEarR 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .mostash.l {
            animation: sadMostashL 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .mostash.r {
            animation: sadMostashR 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .eye {
            top: 35px;
            width: 20px;
            height: 18px;
            border: 2px solid #444;
            background: radial-gradient(circle 6px, #222 100%, transparent 0) no-repeat;
        }

        .btn-secondary:hover~.emo-container .bunny .eye::after,
        .btn-secondary:hover~.emo-container .bunny .eye::before {
            content: "";
            background: #8ecbf9;
            border: 1px solid #1d90ee;
            width: 10px;
            height: 10px;
            border-radius: 50px 50px 0 50px;
            position: absolute;
            transform: rotate(-15deg);
            top: 0px;
            left: 0px;
            z-index: 100;
            animation: dropL 1.47s ease-out infinite;
        }

        .btn-secondary:hover~.emo-container .bunny .eye::before {
            animation-duration: 1.925s;
        }

        .btn-secondary:hover~.emo-container .bunny .eye.l {
            background-position: 1px 4px;
        }

        .btn-secondary:hover~.emo-container .bunny .eye.r {
            background-position: -1px 4px;
        }

        .btn-secondary:hover~.emo-container .bunny .eye.r::after,
        .btn-secondary:hover~.emo-container .bunny .eye.r::before {
            transform: rotate(145deg);
            animation: dropR 1.47s ease-out infinite;
        }

        .btn-secondary:hover~.emo-container .bunny .eye.r::before {
            animation-duration: 1.925s;
        }

        .btn-secondary:hover~.emo-container .bunny .mouth {
            border: none;
            width: 70px;
            height: 35px;
            animation: sadMouth 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .hand.l {
            animation: 0.35s sadHandL ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .hand.r {
            animation: 0.35s sadHandR ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .tail {
            animation: 0.35s sadTail ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .leg.l {
            animation: sadLegL 0.35s ease-out infinite alternate;
        }

        .btn-secondary:hover~.emo-container .bunny .leg.r {
            animation: sadLegR 0.35s ease-out infinite alternate;
        }

        @keyframes doubtEye {
            0% {
                background-position: -4px 3px;
            }

            100% {
                background-position: 4px 3px;
            }
        }

        @keyframes doubtEarR {

            0%,
            30%,
            50%,
            100% {
                transform: rotate(14deg);
            }

            35%,
            30% {
                transform: rotate(20deg);
            }
        }

        @keyframes doubtHandR {

            0%,
            30%,
            50%,
            100% {
                transform: rotate(120deg);
            }

            35%,
            30% {
                transform: rotate(125deg);
            }
        }

        @keyframes doubtHandL {
            0% {
                transform: rotate(340deg);
            }

            100% {
                transform: rotate(345deg);
            }
        }

        @keyframes doubtLegL {

            0%,
            50%,
            100% {
                transform: translatey(0) rotate(-45deg);
            }

            60%,
            55% {
                transform: translatey(-2px) rotate(-40deg);
            }
        }

        @keyframes doubtLegR {

            0%,
            50%,
            100% {
                transform: translatey(0) rotate(45deg);
            }

            60%,
            55% {
                transform: translatey(-2px) rotate(40deg);
            }
        }

        @keyframes sadMove {
            0% {
                transform: translateY(6px) scaleY(1);
                transform-origin: 50% 100%;
            }

            100% {
                transform: translateY(6px) scaleY(0.98);
                transform-origin: 50% 100%;
            }
        }

        @keyframes sadEarL {
            0% {
                transform: rotate(20deg);
            }

            100% {
                transform: rotate(25deg);
            }
        }

        @keyframes sadEarR {
            0% {
                transform: rotate(-20deg);
            }

            100% {
                transform: rotate(-25deg);
            }
        }

        @keyframes dropL {

            0%,
            30% {
                opacity: 0;
                transform: translate(0, 0) rotate(-15deg);
            }

            35% {
                opacity: 0.5;
                transform: translate(0, 0) rotate(-45deg);
            }

            50% {
                opacity: 1;
                transform: translate(-30px, 0) rotate(-90deg);
            }

            70% {
                opacity: 0.5;
                transform: translate(-50px, 100px) rotate(-100deg);
            }

            80%,
            100% {
                opacity: 0;
                transform: translate(-50px, 100px) rotate(-120deg);
            }
        }

        @keyframes dropR {

            0%,
            30% {
                opacity: 0;
                transform: translate(0, 0) rotate(90deg);
            }

            35% {
                opacity: 0.5;
                transform: translate(0, 0) rotate(145deg);
            }

            50% {
                opacity: 1;
                transform: translate(30px, 0) rotate(180deg);
            }

            70% {
                opacity: 0.5;
                transform: translate(50px, 100px) rotate(215deg);
            }

            80%,
            100% {
                opacity: 0;
                transform: translate(50px, 100px) rotate(230deg);
            }
        }

        @keyframes sadMostashL {
            0% {
                transform: rotate(-10deg);
            }

            50% {
                transform: rotate(-15deg);
            }

            100% {
                transform: rotate(-25deg);
            }
        }

        @keyframes sadMostashR {
            0% {
                transform: rotate(10deg);
            }

            50% {
                transform: rotate(15deg);
            }

            100% {
                transform: rotate(25deg);
            }
        }

        @keyframes sadMouth {
            0% {
                width: 50px;
                height: 20px;
                border-radius: 50%;
            }

            100% {
                width: 60px;
                height: 40px;
                border-radius: 50%;
            }
        }

        @keyframes sadHandL {
            0% {
                transform: rotate(-140deg);
            }

            100% {
                transform: rotate(-135deg);
            }
        }

        @keyframes sadHandR {
            0% {
                transform: rotate(140deg);
            }

            100% {
                transform: rotate(135deg);
            }
        }

        @keyframes sadTail {
            0% {
                bottom: -5px;
            }

            100% {
                bottom: -7px;
            }
        }

        @keyframes sadLegL {
            0% {
                transform: rotate(-60deg);
            }

            100% {
                transform: rotate(-65deg);
            }
        }

        @keyframes sadLegR {
            0% {
                transform: rotate(60deg);
            }

            100% {
                transform: rotate(65deg);
            }
        }

        @keyframes happyJump {
            0% {
                transform: translateY(40px) scaleY(0.9);
            }

            100% {
                transform: translateY(-80px) scaleY(1);
            }
        }

        @keyframes happyJumpMat {
            0% {
                transform: translateY(30px);
            }

            100% {
                transform: translateY(-80px);
            }
        }

        @keyframes happyEarL {
            0% {
                transform: rotate(60deg);
            }

            100% {
                transform: rotate(35deg);
            }
        }

        @keyframes happyEarR {
            0% {
                transform: translateY(0px) rotate(10deg) skewX(0deg);
            }

            100% {
                transform: translateY(5px) rotate(20deg) skewX(-2deg);
            }
        }

        @keyframes happyMouth {
            0% {
                height: 40px;
            }

            100% {
                height: 35px;
            }
        }

        @keyframes happyTail {
            0% {
                bottom: -5px;
            }

            100% {
                bottom: -20px;
            }
        }

        @keyframes happyLegL {
            0% {
                left: 10px;
                transform: translatey(0) rotate(-50deg);
            }

            100% {
                left: 15px;
                transform: translatey(-10px) rotate(-40deg);
            }
        }

        @keyframes happyLegR {
            0% {
                right: 10px;
                transform: translatey(0) rotate(50deg);
            }

            100% {
                right: 15px;
                transform: translatey(-10px) rotate(40deg);
            }
        }

        @keyframes happyMostashL {
            0% {
                transform: rotate(-15deg);
            }

            50% {
                transform: rotate(-5deg);
            }

            100% {
                transform: rotate(8deg);
            }
        }

        @keyframes happyMostashR {
            0% {
                transform: rotate(15deg);
            }

            50% {
                transform: rotate(5deg);
            }

            100% {
                transform: rotate(-8deg);
            }
        }

        @keyframes happyHandL {
            0% {
                transform: rotate(45deg);
            }

            100% {
                transform: rotate(125deg);
            }
        }

        @keyframes happyHandR {
            0% {
                transform: rotate(-45deg);
            }

            100% {
                transform: rotate(-125deg);
            }
        }
    </style>
    {{-- Livewire --}}
    @livewireStyles
</head>

<body>
   <div class="card">
            <h3>Verification {{$subscriber->verified ? 'Successful' : 'Unsuccessful'}}</h3>
            <br>
                 <a href="{{ url('/') }}" class="btn btn-primary">Back to {{title()}}</a>
    </div>
</body>

</html>
