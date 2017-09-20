<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>LogIn-Mehaničari</title>
  <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('components/reset.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/site.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('components/container.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/grid.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/header.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/image.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/menu.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('components/divider.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/segment.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/form.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/input.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/button.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/list.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/message.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('components/icon.css') }}">


  <script src="{{ asset('components/form.js') }}"></script>
  <script src="{{ asset('components/transition.js') }}"></script>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <span><img src="{{ asset('/img/logo.jpg') }}" class="img-circle" alt="User Image"/></span>
      <div class="content">
        Prijavite se na Vaš račun
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large teal submit button">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      Nemate korisnički račun <a href="#">Registrujte se</a>
    </div>
  </div>
</div>
</body>
</html>
