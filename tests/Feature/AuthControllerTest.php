<?php

use app\controllers\admin\AuthController;

test('login redirects to /admin if user is already authenticated', function () {
    
    unset($_SESSION['user_id']);

    $controller = new AuthController();
    $controller->register();

    // Verifica se o redirecionamento ocorreu
    expect(headers_list())->toContain('Location: /admin/auth/login');
});
