<?php

namespace App\View\Components\Admin\Layout;

use App\Support\Admin\AdminMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class App extends Component
{
    public string $title;
    public array $globalMenu;
    public array $storeMenu;
    public array $activeStores;
    public array $selectedStore;

    public function __construct(string $title = 'Dashboard')
    {
        $this->title = $title;

        $this->globalMenu = AdminMenu::global();

        $this->storeMenu = AdminMenu::store();

        $this->activeStores = [
            [
                'id' => 's1',
                'toko' => 'Apotek Family Farma',
                'db' => 'MongoDB',
            ],

            [
                'id' => 's2',
                'toko' => 'Apotek Sehat Bersama',
                'db' => 'MySQL',
            ],

            [
                'id' => 's3',
                'toko' => 'Apotek Mitra Sehat',
                'db' => 'PostgreSQL',
            ],
        ];

        $selectedStoreId = request('store');

        $this->selectedStore = collect($this->activeStores)
            ->firstWhere('id', $selectedStoreId)
            ?? $this->activeStores[0];
    }

    public function groupIsActive(array $items): bool
    {
        foreach ($items as $item) {

            if (
                Route::has($item['route']) &&
                request()->routeIs($item['route'])
            ) {
                return true;
            }
        }

        return false;
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.layout.app');
    }
}
