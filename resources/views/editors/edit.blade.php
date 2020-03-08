
@extends('layouts.master')
@section('title','New Editor')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>

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


<form class="G rounded shadow" action="{{route('editors.update',['editor'=>$edit->id])}}" method="POST">
@csrf

    <input type="hidden" name="_method" value="PUT">
   <h3>Editor Registration</h3>

   <div><i class="fa fa-exclamation-circle fn H"></i><input type="text" name="name" id="name" placeholder="NAME" value="{{$edit->name}}"><i class="fa fa-check pn H"></i></div>
   
   @if($errors->any())
      @foreach ($errors->get('name') as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif
   <div><i class="fa fa-exclamation-circle fe H"></i><input type="email" name="email" placeholder="EMAIL" id="email" value="{{$edit->email}}"><i class="fa fa-check pe H"></i></div>
   @if($errors->any())
      @foreach ($errors->get('email') as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif
   <div><i class="fa fa-exclamation-circle fp H"></i><input type="password" name="password" id="pass" placeholder="PASSWORD"><i class="fa fa-check pp H"></i></div>   
   @if($errors->any())
      @foreach ($errors->get('password') as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif
   <div><i class="fa fa-exclamation-circle dn H"></i><input id="sub" type="submit" value="register"><i class="fa fa-check dn"></i></div>
 </form>


<script>
     //Initial Image hiding
$('.H').css('color', 'transparent');

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

});
 </script>
</body>
</html>
@endsection



 
