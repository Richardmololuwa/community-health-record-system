@php
use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Community Health Record System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            background:#f4f7fc;
            font-family:'Segoe UI',sans-serif;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:260px;
            background:linear-gradient(180deg,#0d6efd,#063970);
            color:white;
            position:fixed;
            top:0;
            left:0;
            bottom:0;
            overflow-y:auto;
            padding:25px;
            box-shadow:5px 0 20px rgba(0,0,0,.15);
        }

        .logo{
            text-align:center;
            margin-bottom:35px;
        }

        .logo h2{
            font-weight:700;
            margin-bottom:5px;
        }

        .logo p{
            color:#d9e6ff;
            font-size:14px;
        }

        .profile{
            background:rgba(255,255,255,.15);
            border-radius:15px;
            padding:10px;
            text-align:center;
            margin-bottom:30px;
        }

        .profile i{
            font-size:55px;
        }

        .profile h5{
            margin-top:10px;
            margin-bottom:5px;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:10px;

            color:white;
            text-decoration:none;

            padding:10px 14px;

            border-radius:10px;

            

            transition:.35s;
        }

        .sidebar a:hover{

            background:white;

            color:#0d6efd;

            transform:translateX(5px);

        }

        .content{

            margin-left:260px;

            width:100%;

            padding:30px;

        }

        .topbar{

            background:white;

            border-radius:15px;

            padding:20px 30px;

            display:flex;

            justify-content:space-between;

            align-items:center;

            box-shadow:0 5px 15px rgba(0,0,0,.08);

            margin-bottom:30px;

        }

        .card{

            border:none;

            border-radius:15px;

            box-shadow:0 5px 15px rgba(0,0,0,.08);

        }

        table{

            background:white;

        }

        .btn{

            border-radius:8px;

        }

        footer{

            margin-top:50px;

            color:#777;

            text-align:center;

        }

        @media(max-width:992px){

            .sidebar{

                width:220px;

            }

            .content{

                margin-left:220px;

            }

        }

        @media(max-width:768px){

            .sidebar{

                position:fixed;

                top:0;

                left:-260px;

                width:260px;

                height:100vh;

                z-index:1050;

                transition:left .3s;

            }

            .sidebar.show{

                left:0;

            }

            .content{

                margin-left:0;

                width:100%;

                padding:20px;

            }

            .topbar{

                flex-wrap:wrap;

                gap:15px;

            }


        }

    </style>

</head>

<body>

<div class="wrapper">

<div class="sidebar" id="sidebar">

<div class="logo">

<h2>🏥 CHRS</h2>

<p>Community Health Record System</p>

</div>

<div class="profile">

<i class="bi bi-person-circle"></i>

<strong>{{ Auth::user()->name }}</strong>

@if(auth()->user()->isAdmin())
    <br>
    <span class="badge bg-warning text-dark">
        Super Admin
    </span>
@else
    <br>
    <span class="badge bg-primary">
        Doctor
    </span>
@endif
<small>Healthcare Professional</small>

</div>

<a href="/dashboard">

<i class="bi bi-speedometer2"></i>

Dashboard

</a>

<a href="/patients">

<i class="bi bi-people-fill"></i>

Patients

</a>

<a href="/medical-records">

<i class="bi bi-journal-medical"></i>

Medical Records

</a>

<a href="/appointments">

<i class="bi bi-calendar-check"></i>

Appointments

</a>

<a href="/reports">

<i class="bi bi-bar-chart-fill"></i>

Reports

</a>

<form method="POST" action="{{ route('logout') }}" class="mt-4">

@csrf

<button class="btn btn-danger w-100">

Logout

</button>

</form>

</div>

<div class="content">

<div class="topbar">

<div class="d-flex align-items-center gap-3">

<button
class="btn btn-light d-md-none"
id="toggleSidebar">

☰

</button>

</div>

<div>

<h4>

Good

@if(now()->hour <12)

Morning

@elseif(now()->hour <17)

Afternoon

@else

Evening

@endif

,

{{ Auth::user()->name }} 👋

</h4>

<small class="text-muted">

Welcome to Community Health Record System

</small>

</div>

<div>

<span class="badge bg-primary fs-6">

{{ now()->format('l, d M Y') }}

</span>

</div>

</div>

@yield('content')

<footer>

Community Health Record System © 2026

</footer>

</div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const sidebar = document.getElementById("sidebar");

    const button = document.getElementById("toggleSidebar");

    button.addEventListener("click", function(){

        sidebar.classList.toggle("show");

    });

    document.querySelectorAll(".sidebar a").forEach(link=>{

        link.addEventListener("click", function(){

            if(window.innerWidth<=768){

                sidebar.classList.remove("show");

            }

        });

    });

    document.querySelectorAll(".sidebar a").forEach(link => {

        link.addEventListener("click", function () {

            if (window.innerWidth <= 768) {

                sidebar.classList.remove("show");

            }

        });

    });    

});

</script>

</body>

</html>