<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = md5(mysqli_real_escape_string($db,$_POST['password']));

      $sql = "SELECT id FROM user_prev WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         // session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: dashboard.php");
      }else {
        echo "Your Login Name or Password is invalid";
      }
   }
?>
  <link rel="stylesheet" type="text/css" href="formbuilder/css/demo.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.css">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <div class="content" style="padding: 20px; background: #eef5f9;">
    <h1>Create Form</h1>
    <div id="stage1" class="build-wrap"></div>
    <form class="render-wrap"></form>
    <button id="edit-form">Edit Form</button>
    <div class="action-buttons" style="display:none;">
      <button id="showData" type="button">Show Data</button>
      <button id="clearFields" type="button">Clear All Fields</button>
      <button id="getData" type="button">Get Data</button>
      <button id="getXML" type="button">Get XML Data</button>
      <button id="getJSON" type="button">Get JSON Data</button>
      <button id="getJS" type="button">Get JS Data</button>
      <button id="setData" type="button">Set Data</button>
      <button id="addField" type="button">Add Field</button>
      <button id="removeField" type="button">Remove Field</button>
      <button id="testSubmit" type="submit">Test Submit</button>
      <button id="resetDemo" type="button">Reset Demo</button>
      <h2>i18n</h2>
      <select id="setLanguage">
        <option value="ar-TN" dir="rtl">تونسي</option>
        <option value="de-DE">Deutsch</option>
        <option value="en-US">English</option>
        <option value="es-ES">español</option>
        <option value="fa-IR" dir="rtl">فارسى</option>
        <option value="fr-FR">français</option>
        <option value="nb-NO">norsk</option>
        <option value="nl-NL">Nederlands</option>
        <option value="pt-BR">português</option>
        <option value="ro-RO">român</option>
        <option value="ru-RU">Русский язык</option>
        <option value="tr-TR">Türkçe</option>
        <option value="vi-VN">tiếng việt</option>
        <option value="zh-TW">台語</option>
      </select>
    </div>
    <br/>
    <button onclick="saveForm()" class="btn btn-lg btn-success">Save Form</button>
  </div>
  <script type="text/javascript">
    var formBuilder;
  </script>
  <script type="text/javascript">
    function saveForm(){
      console.log(formBuilder.actions.getData('xml'));
    }
  </script>
  <script src="formbuilder/js/vendor.js"></script>
  <script src="formbuilder/js/form-builder.min.js"></script>
  <script src="formbuilder/js/form-render.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.js"></script>
  <script src="formbuilder/js/demo.js"></script>
