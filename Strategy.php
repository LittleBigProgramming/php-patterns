<?php

// Encapsulate and make interchangeable

interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a file.');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a database.');
    }
}

class LogToWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a Saas service.');
    }
}

class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

$app = new App;
$app->log('Log information');

/*
 * Here are two real world examples of the strategy pattern
 *
 * https://github.com/laravel/framework/blob/7.x/src/Illuminate/Mail/Transport/Transport.php
 * https://github.com/laravel/framework/blob/7.x/src/Illuminate/Mail/MailServiceProvider.php
 */