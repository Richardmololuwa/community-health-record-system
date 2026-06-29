<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Community Health Record System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{

    background:#edf5ff;

}

.auth-wrapper{

    min-height:100vh;

}

.left-panel{
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg,#0d47a1,#1565c0,#1976d2);
    color:#fff;
    padding:70px;
}

.left-panel::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    top:-180px;
    right:-150px;
}

.left-panel::after{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    border-radius:50%;
    background:rgba(255,255,255,.05);
    bottom:-120px;
    left:-120px;
}

.left-panel h1{

    font-weight:700;

}

.feature{

    margin-top:25px;

    font-size:18px;

}

.stat-box{

margin-top:50px;

background:rgba(255,255,255,.12);

border:1px solid rgba(255,255,255,.15);

backdrop-filter:blur(15px);

border-radius:22px;

padding:25px;

}
.right-panel{

     display:flex;
    justify-content:center;
    align-items:flex-start;
    padding:70px;

}

.auth-card{
    width:100%;
    max-width:520px;
    background:white;
    border-radius:28px;
    padding:40px;
    box-shadow:
        0 25px 60px rgba(0,0,0,.08);
}
.form-control{

    height:56px;

    border-radius:16px;

    border:1px solid #e2e8f0;
    padding-left:20px;

    font-size:16px;

    transition:.3s;

}

.form-control:hover{

    border-color:#0b3d91;

}

.form-control:focus{

    border-color:#1565c0;

    box-shadow:0 0 0 .2rem rgba(21,101,192,.15);

}


.auth-card{
    width:100%;
    max-width:460px;
    padding:20px;
}

.right-panel{
    padding:50px;
}
.logo{
    width:90px;
    height:90px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(255,255,255,.15);
    border-radius:22px;
    font-size:45px;
    backdrop-filter:blur(10px);
}

.btn-primary{

    height:58px;

    border-radius:16px;

    font-size:18px;

    font-weight:600;

    background:linear-gradient(135deg,#1565c0,#0d47a1);

    border:none;

    transition:.3s;

}

.btn-primary:hover{

    transform:translateY(-3px);

    box-shadow:0 15px 35px rgba(13,71,161,.35);

}

@keyframes floating{

0%{
transform:translateY(0px);
}

50%{
transform:translateY(-12px);
}

100%{
transform:translateY(0px);
}

}

.logo{

animation:floating 4s ease-in-out infinite;

}
.auth-card{

animation:fadeIn .8s ease;

}

@keyframes fadeIn{

from{

opacity:0;

transform:translateY(25px);

}

to{

opacity:1;

transform:translateY(0);

}

}

</style>

</head>

<body>

<div class="container-fluid vh-100">

<div class="row h-100">
<div class="col-lg-7 d-none d-lg-flex flex-column justify-content-center left-panel">

<div>

<div class="logo">

<div class="logo mb-4">
    <i class="bi bi-hospital-fill"></i>
</div>

</div>

<h1>Community Health Record System</h1>

<p class="lead">

Securely manage patient records anytime, anywhere.

</p>

<div class="feature">
    <i class="bi bi-shield-check me-2"></i>
    Secure Patient Records
</div>

<div class="feature">
    <i class="bi bi-calendar2-check me-2"></i>
    Appointment Scheduling
</div>

<div class="feature">
    <i class="bi bi-person-badge me-2"></i>
    Doctor-specific Access
</div>

<div class="feature">
    <i class="bi bi-speedometer2 me-2"></i>
    Super Administrator Dashboard
</div>

<div class="stat-box">

<h2>Healthcare Made Simple</h2>

<p>

Built with Laravel 12

</p>

</div>

</div>

</div>

<div class="col-lg-5 right-panel">

<div class="auth-card">

{{ $slot }}

</div>

</div>

</div>

</div>

</body>

</html>