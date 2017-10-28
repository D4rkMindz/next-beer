<?php


namespace App\Controller;


class ExampleController extends AppController
{
    public function index()
    {
        // Render HTML file
        $viewData = [
            'userName'=> 'herbert',
        ];
        return $this->render('view::Example/example.html.php', $viewData);
    }
}
