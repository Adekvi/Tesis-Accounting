<?php

namespace App\Http\Controllers\User\Concern;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RendersUserPage
{
    protected function render(Request $request, string $view, array $data = []): Response
    {
        $title = $data['title'] ?? 'Dashboard';

        if ($request->hasHeader('X-Partial')) {
            return response(view($view, $data)->render())
                ->header('Vary', 'X-Partial')
                ->header('X-Page-Title', $title);
        }

        // Full page: layout component membungkus konten
        $html = view('components.user.layout.app', array_merge($data, [
            'title' => $title,
            'slot'  => view($view, $data)->render(),
        ]))->render();

        return response($html)->header('Vary', 'X-Partial');
    }
}
