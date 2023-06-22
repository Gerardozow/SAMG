<?php
session_start();

function login(){
    // Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['id'])) {
    // Redirigir al usuario a la página de inicio
    header("Location: home.php");
    exit();
} 
}

function permisos() {
    // Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: index.php");
    exit();
}}



?>