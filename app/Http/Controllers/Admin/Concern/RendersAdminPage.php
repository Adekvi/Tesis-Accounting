<?php

namespace App\Http\Controllers\Admin\Concern;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RendersAdminPage
{
    protected function render(Request $request, string $view, array $data = []): Response
    {
        $title = $data['title'] ?? 'Dashboard';

        if ($request->hasHeader('X-Partial')) {
            $content = view($view, $data)->render();
            return response($content)
                ->header('Vary', 'X-Partial')
                ->header('X-Page-Title', $title);
        }

        // Pakai component class secara langsung
        return response()
            ->view('components.admin.layout.app', array_merge($data, [
                'title' => $title,
                // Slot diisi lewat view yang di-extend / @slot, atau render partial dulu
            ]));
    }
}
