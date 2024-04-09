<?php

session_start();

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function redirectToLogin() {
    header('Location: ../index.php?action=login');
    exit;
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }

    session_unset();

    session_destroy();

    redirectToLogin();
}

// Verifica se a ação de logout foi solicitada
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
}

?>
