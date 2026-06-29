<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Health Record System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f8fb;
        }

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
        }

        .hero h1{
            font-size:55px;
            font-weight:bold;
        }

        .hero p{
            font-size:20px;
            color:#666;
        }

        .feature-card{
            border:none;
            border-radius:15px;
            transition:.3s;
        }

        .feature-card:hover{
            transform:translateY(-8px);
        }

        .footer{
            background:#0b3d91;
            color:white;
            padding:20px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">

<div class="container">

<a class="navbar-brand fw-bold" href="#">

🏥 CHRS

</a>

<div>

@auth

<a href="/dashboard" class="btn btn-primary">

Dashboard

</a>

@else

<a href="/login" class="btn btn-outline-primary me-2">

Login

</a>

<a href="/register" class="btn btn-primary">

Register

</a>

@endauth

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-md-6">

<h1>

Community Health Record System

</h1>

<p>

A secure platform for managing patient information,
medical records and appointments efficiently.

</p>

<div class="mt-4">

<a href="/login" class="btn btn-primary btn-lg">

Get Started

</a>

</div>

</div>

<div class="col-md-6 text-center">

<h1 style="font-size:170px;">

🏥

</h1>

</div>

</div>

</div>

</section>

<div class="container mb-5">

<h2 class="text-center mb-5">

System Features

</h2>

<div class="row">

<div class="col-md-3">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>👨‍⚕️</h1>

<h5>Patient Management</h5>

<p>

Register and manage patient profiles.

</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>📋</h1>

<h5>Medical Records</h5>

<p>

Store diagnosis and treatment history.

</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>📅</h1>

<h5>Appointments</h5>

<p>

Schedule and manage appointments.

</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card feature-card shadow">

<div class="card-body text-center">

<h1>📈</h1>

<h5>Reports</h5>

<p>

View healthcare statistics and summaries.

</p>

</div>

</div>

</div>

</div>

</div>

<footer class="footer text-center">

<h5>

Community Health Record System

</h5>

<p>

Developed by Group 10 SEN 219 Project © 2026

</p>

</footer>

</body>

</html>