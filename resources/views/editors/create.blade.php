
@extends('layouts.master')
@section('title','New Editor')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    h3 {
    font-family: Calibri;
    margin-bottom: 50px;
    font-size: 24px;
    font-weight: 400;
    margin-bottom: 40px;
 }
 
 .G{
     display: block;
    text-align: center;
 }
 .H{
    position: relative;
    color: green;
    zoom: 120%;
 }
 input {
    text-align: center;
    padding: 15px;
    background: #efefef;
    border: none;
    width: 300px;
    font-size: 14px;
    margin: 5px 10px 0px; 
    text-transform: none;
    border-radius: 15px;
    border-bottom: 1px solid transparent;
 }
 input:focus {
    outline: none;
    border-bottom: 1px solid #66aa66;
 }
 
 #sub {
    padding: 10px;
    background: #171716;
    width: 200px;
    font-family: calibri;
    text-transform: uppercase;
    margin-top: 50px;
    font-weight: 500;
    letter-spacing: 0px;
    font-size: 18px;
    color: #e8db1e;
 }
 #sub:hover {
    cursor: pointer;
 }
 .dn {
    display: none !important;
 }
 
 @media(max-width: 420px) {
    input {
       width: 80%;
    }
    .H {
       display: none !important;
    }
    
 }
 
 
 
 @media(min-width: 1300px) {
 form {
    margin: 100px 450px 10px;
    padding: 10px;
    padding-bottom: 80px;
    border: 1px solid #e3e3e3;
    background: #fac916;
 }
    }
</style>
    <title>Document</title>
</head>
<body>


<form class="G rounded shadow" action="{{url('editors')}}" method="POST">
@csrf
   <h3>Editor Registration</h3>
   <div><i class="fa fa-exclamation-circle fn H"></i><input type="text" name="name" id="name" placeholder="NAME"><i class="fa fa-check pn"></i></div>
   
   <div><i class="fa fa-exclamation-circle fe H"></i><input type="email" name="email" placeholder="EMAIL" id="email"><i class="fa fa-check pe"></i></div>
   
   <div><i class="fa fa-exclamation-circle fp H"></i><input type="password" name="password" id="pass" placeholder="PASSWORD"><i class="fa fa-check pp"></i></div>   
   
   <div><i class="fa fa-exclamation-circle dn H"></i><input id="sub" type="submit" value="register"><i class="fa fa-check dn"></i></div>
 </form>


<script>
     //Initial Image hiding
$('.fa').css('color', 'transparent');

//Validate Functions
function validateEmail(em) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(em);
};
function validateName(n) {
    var nr = /.[a-zA-Z]+$/;
    return nr.test(n);
};

//Actions
$('#name').on("change blur", function () {
    var n = $('#name').val();
    if (!validateName(n) || n.length == 0) {
        $('.pn').css('color', 'transparent');
        $('.fn').css('color', '#c44');
        $('#name').css('border', '1px solid red');
    }
    else {
        $('.pn').css('color', '#2c2');
        $('.fn').css('color', 'transparent');
        $('#name').css('border', '1px solid transparent');
    }
});

$('#email').on("change blur", function () {
    var em = $('#email').val();
    if (!validateEmail(em) || em.length == 0) {
        $('.pe').css('color', 'transparent');
        $('.fe').css('color', '#c44');
        $('#email').css('border', '1px solid red');
    }
    else {
        $('.pe').css('color', '#00cc00');
        $('.fe').css('color', 'transparent');
        $('#email').css('border', '1px solid transparent');
    }
});

$('#pass').on("change blur", function () {
    var pa = $('#pass').val();
    if (pa.length <= 6 || pa.length >= 12) {
        $('.pp').css('color', 'transparent');
        $('.fp').css('color', '#c44');
        $('#pass').css('border', '1px solid red');
    }
    else {
        $('.pp').css('color', '#00cc00');
        $('.fp').css('color', 'transparent');
        $('#pass').css('border', '1px solid transparent');
    }
});

$('#sub').click(function (evt) {
    var n = $('#name').val();
    var em = $('#email').val();
    var pa = $('#pass').val();
    // if (!validateName(n) || n.length == 0 || !validateEmail(em) || em.length == 0 ||
    //     pa.length <= 6 || pa.length >= 12) {
    //     alert("Error! Please check your details");
    //     evt.preventDefault();
    // }
    // else {
    //     alert("Form submitted successfully");
    // }

    if (!validateName(n) || n.length == 0 ) {
        alert("Error! Please fill your name");
        evt.preventDefault();
    }
   
    else if (!validateEmail(em) || em.length == 0 ) {
        alert("Error! Please check your email type");
        evt.preventDefault();
    }
   
    else if (pa.length <= 6 || pa.length >= 12) {
        alert("Error! Please fill your password between 6 & 12 characters");
        evt.preventDefault();
    }
  
    else {
         alert("Form submitted successfully");
    }
    

    
});
 </script>
</body>
</html>
@endsection



 
