<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Java Online Compiler</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-4.0.0-beta.1.css" type="text/css"> 
  </head>
<body>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Java Online Compiler</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Compiler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Problem Archives</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-1">Java Online Compiler</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="<?php echo base_url() ?>compiler/compile" method="POST" id="form" name="f2">
            <div class="form-group">
              <label>Write your code here</label>
              <textarea class="form-control" name="code" rows="10" style="font-family: monospace">public class Main { public static void main(String[] args){ System.out.println("Hello World"); } } </textarea>
            </div>
            <div class="form-group">
              <label>Input (if needed)</label>
              <textarea class="form-control" name="input" rows="10" style="font-family: monospace"></textarea>
            </div>
            <button type="submit" id="st" class="btn btn-success">Run Code</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
      	<div class="col-md-12">
          <div class="form-group">
            <label>Output</label>
            <textarea id="div" class="form-control" rows="10" readonly="readonly" style="font-family: monospace"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">Beta Version 2018 - developed by Yohanes Dwi Listio
            <br>Design by © Copyright 2018 Pingendo - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url() ?>assets/jquery-3.2.1.slim.min.js"></script>
  <script src="<?php echo base_url() ?>assets/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap.min.js"></script>
  <script type="text/javascript"> 
  $(document).ready(function(){
     $("#st").click(function(){
        $("#div").html("Loading ...");
     });
  });
  </script>
  <script>
  //wait for page load to initialize script
  $(document).ready(function(){
    //listen for form submission
    $('form').on('submit', function(e){
      //prevent form from submitting and leaving page
      e.preventDefault();
      // AJAX 
      $.ajax({
            type: "POST", //type of submit
            cache: false, //important or else you might get wrong data returned to you
            url: "<?php echo base_url() ?>compiler/compile", //destination
            datatype: "html", //expected data format from process.php
            data: $('form').serialize(), //target your form's data and serialize for a POST
            success: function(result) { // data is the var which holds the output of your process.php
                // locate the div with #result and fill it with returned data from process.php
                $('#div').html(result);
                alert(result);
            }
        });
    });
  });
  </script>
</body>

</html>