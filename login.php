<?php if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['perfil'])){
        header("Location: profile");
    }
?>

<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta charset="utf-8">
    <title>Registro | Login</title>
    <script src="libraries/jquery.min.js"></script>
    <script src="libraries/angular.js"></script>
    <script src="libraries/angular-sanitize.min.js"></script> 
    <script src="js/bin/materialize.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/materialize.css" />
    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <section ng-controller="controller-login-register" class="form-container">
        <form class="card-panel hoverable login-form" action="POST">
            <a href=".">
                <object data="img/system/logo.svg" type="image/svg+xml">Logo</object>
            </a>
            <div class="input-field">
                <input type="text" id="email" ng-model="email" />
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" ng-model="pass" />
                <label for="password">Contraseña</label>
            </div>
            </br>
            <a class="waves-effect waves-deep-purple btn-large right" ng-click="login()">Iniciar sesion</a>
            <div class="register-text">
                <span>¿Aún no tienes una cuenta? </span>
                <a class="waves-effect waves-deep-purple btn-flat center" ng-click="showRegister()">Registrate</a>
            </div>
        </form>
        <form class="card-panel hoverable register-form" action="POST">
            <i class="material-icons back-btn" ng-click="backBtn()">arrow_back</i>
            <br/>
            <br/>
            <div class="input-field">
                <i class="material-icons prefix">mail_outline</i>
                <input type="text" id="emailR" ng-model="emailR" />
                <label for="emailR">Email</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">lock_outline</i>
                <input type="password" id="passwordR" ng-model="passR" />
                <label for="passwordR">Contraseña</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">perm_identity</i>
                <input type="text" id="names" ng-model="namesR" />
                <label for="names">Nombre(s)</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix"></i>
                <input type="text" id="apP" ng-model="apPR" />
                <label for="apP">Apellido Paterno</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix"></i>
                <input type="text" id="apM" ng-model="apMR" />
                <label for="apM">Apellido Materno</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input type="number" id="phone" ng-model="phoneR" />
                <label for="phone">Teléfono</label>
            </div>
            <br/>
            <a class="waves-effect waves-deep-purple btn-large right" ng-click="register()">Crear cuenta</a>
        </form>
    </section>
    <script>
    var app = angular.module("myApp", ['ngSanitize']);

    function isValid(s) {
        return !(s == undefined || s == "");
    }

    app.controller("controller-login-register", function($scope, $http, $window, $timeout) {

        // Login ----------------------------------------------
        $(".register-form").hide();

        $scope.login = function() {
            var email = $scope.email;
            var pass = $scope.pass;

            if (!isValid(email) || !isValid(pass)) {
                alert("Ingresa un email y una contraseña");
                return;
            }

            if (!/.+@.+\..+/.test(email)) {
                alert("Ingresa un email correcto");
                return;
            } 

            pass = pass.trim();
            $http({
                method: 'POST',
                /*
                Colocar la url del archivo PHP donde se recibirán los campos 
                'email' y 'pass' mediante el protocolo POST y se evaluará la existencia 
                estos campos en la base de datos dentro de las tablas 'admin' o 'nutriologo'.

                Devolver un "echo [valor]" del lado del servidor, en donde
                [valor] está definido de acuerdo a las condiciones:
                    
                -1: Los valores no se encontraron en ninguna tabla
                 0: EL email existe pero la contraseña no es correcta
                 1: El email y la contraseña existen solo dentro de la tabla 'Nutriologo'
                 2: El email y la contraseña existen solo dentro de la tabla 'admin'
                */
                url: 'controlador/login_controlador.php',
                data: $.param({
                    email: email,
                    password: pass
                }),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).success(function(data, status, headers, config) {
                console.log(data);
                switch (data) {
                    case "-1":
                        alert("No se ha registrado una cuenta con ese email");
                        break;
                    case "0":
                        alert("Contraseña incorrecta");
                        break;
                    case "1":
                        $window.location.href = "profile";
                        break;
                    case "2":
                        $window.location.href = "admin";
                        break;
                }
            }).error(function(data, status, headers, config) {
                alert("Ha ocurrido un error, inténtalo más tarde.");
            });
        };

        // Register ----------------------------------------------

        $scope.register = function() {
            var email = $scope.emailR;
            var pass = $scope.passR;
            var name = $scope.namesR;
            var ap = $scope.apPR;
            var am = $scope.apMR;
            var tel = $scope.phoneR;

            if (!isValid(email) || !isValid(pass) || !isValid(name) || !isValid(ap) || !isValid(am)) {
                alert("Rellena todos los campos");
                return;
            }

            if (!/.+@.+\..+/.test(email)) {
                alert("Ingresa un email correcto");
                return;
            }

            pass = pass.trim();

            $http({
                method: 'POST',
                /*
                Colocar la url del archivo PHP donde se recibirán los campos 
                'email', 'pass', 'name', 'ap', 'am' y 'tel' mediante el protocolo POST. 

                Verificar si el campo email ya se encuentra en la tabla Nutriologo o admin,
                en caso afirmativo devolver un "echo 0" desde el servidor. 

                En caso de que el email no exista en ninguna de estas dos tablas,
                ingresar dichos campos en la tabla Nutriologo. 

                    Devolver un "echo -1" desde el servidor si se sucitó algún error 
                    al tratar de insertar los valores en la tabla.

                    Devolver un "echo 1" desde el servidor si la operación se realizó
                    satisfactoriamente y guardar las variables name, ap, am, email y tel como
                    variables de sesión en un diccionario de array de nombre perfil, ejemplo:

                    $_SESSION['perfil'] = [
                        "nombre" => "Juanito",
                        "ap"     => "Bombin",
                        "am"    => "Bombon",
                        "email  => "juaninbombin@gmail.com",
                        "tel"   => 54546080
                    ];                
                */
                url: 'controlador/index_datos.php',
                data: $.param({
                    email: email,
                    password: pass,
                    name: name,
                    ap: ap,
                    am: am,
                    tel: tel
                }),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).success(function(data, status, headers, config) {
                console.log(data);
                switch (data) {
                    case "-1":
                        alert("Ocurrió un error desconocido, intentelo más tarde.");
                        break;
                    case "0":
                        alert("Ya existe una cuenta registrada con ese correo electrónico.");
                        break;
                    case "1":
                        $window.location.href = "profile";
                        break;
                }
            }).error(function(data, status, headers, config) {
                alert("Ha ocurrido un error, inténtalo más tarde.");
            });
        };

        // Toogle Forms ----------------------------------------------

        $scope.showRegister = function() {
            toggleForm();
        };
        $scope.backBtn = function() {
            toggleForm();
        };

        function toggleForm() {
            $timeout(function() {
                $(".login-form").toggle();
                $(".register-form").toggle();
            }, 200);
        }
    });
    </script>
</body>

</html>
