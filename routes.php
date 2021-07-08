<?php
$app->get('/incluirblog', 'controllers\BlogController:incluirBlog');
$app->post('/gravarblog', 'controllers\BlogController:gravarBlog');
$app->get('/alterarblog/{id}', 'controllers\BlogController:alterarBlog');
$app->get('/visualizarblog/{id}', 'controllers\BlogController:visualizarBlog');
$app->get('/confirmarapagarblog/{id}', 'controllers\BlogController:confirmarApagarBlog');
$app->get('/listarblog', 'controllers\BlogController:listarBlogs');
$app->post('/gravarcomentario', 'controllers\BlogController:gravarComentario');
$app->post('/apagarpost', 'controllers\BlogController:apagarPost');