<?php

namespace App\Http\Controllers\Admin\Concern;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

trait RendersAdminPage
{
    protected function render(Request $request, string $view, array $data)
    {
        $content = view($view, $data)->render();

        $response = $request->hasHeader('X-Partial')
            ? response($content)
            : response(view('admin.layout', ['content' => $content, 'title' => $data['title']])->render());

        return $response->header('Vary', 'X-Partial');
    }
}
