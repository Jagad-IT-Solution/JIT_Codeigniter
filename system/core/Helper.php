<?php
$run     = new \Whoops\Run;
$handler = new \Whoops\Handler\PrettyPageHandler;
$handler->setPageTitle("Ups! Ada masalah.");

if (\Whoops\Util\Misc::isAjaxRequest()) {
    $run->pushHandler(new \Whoops\Handler\JsonResponseHandler);
} else {
    $run->pushHandler($handler);
}
$run->register();

function dd($print)
{
    Kint\Renderer\RichRenderer::$theme = 'solarized-dark.css';
    Kint\Parser\BlacklistPlugin::$shallow_blacklist[] = 'Psr\Container\ContainerInterface';
    !d($print);
    Kint\Kint::trace(debug_backtrace(true));
}

function random_str($length = 32)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
