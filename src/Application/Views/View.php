<?php

namespace App\Application\Views;

class View
{

    public static function renderViews(string $viewName, $params = []): void
    {
        $pathToView = __DIR__ . "/../../Views/Pages/$viewName.view.php";
        if (file_exists($pathToView)) {
            require_once $pathToView;
        } else {
            echo "View $viewName not found";
        }
    }

    public static function renderComponents(string $componentsName, $params = []): void
    {
        $pathToView = __DIR__ . "/../../Views/Components/$componentsName.view.php";
        if (file_exists($pathToView)) {
            require_once $pathToView;
        } else {
            echo "Component $componentsName not found";
        }
    }
    public static function renderPages(string $pagesName, $params = []): void
    {
        $pathToView = __DIR__ . "/../../Views/Pages/$pagesName.view.php";
        if (file_exists($pathToView)) {
            require_once $pathToView;
        } else {
            echo "Pages $pagesName not found";
        }
    }

    public static function renderSections(string $sectionName, $params = []): void
    {
        $pathToView = __DIR__ . "/../../Views/Sections/$sectionName.view.php";
        if (file_exists($pathToView)) {
            require_once $pathToView;
        } else {
            echo "Sections $sectionName not found";
        }
    }
}