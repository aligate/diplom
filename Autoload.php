<?php

/**
 * Функция __autoload для автоматического подключения классов
 */
function __autoload($class_name)
{
    
	// Формируем имя и путь к файлу с классом
        $path = 'models/'. $class_name . '.php';

        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            include_once $path;
        }
    }

