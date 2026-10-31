<?php

namespace App\View\Components\user\layout;

use App\Support\User\UserMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class App extends Component
{
    public string $title;
    public array $menu;
    public array $storeMeta;
    public string $greeting;

    public function __construct(string $title = 'Dashboard')
    {
        $this->title = $title;

        $roles = session('user.roles', ['gudang', 'pengadaan', 'penjualan', 'keuangan']);

        $this->menu = UserMenu::forRoles($roles);

        $this->storeMeta = [
            'nama'  => session('user.store_name', 'Toko Anda'),
            'kota'  => session('user.store_city', '-'),
            'owner' => session('user.owner_name', 'Pemilik Toko'),
        ];

        $this->greeting = 'Selamat datang, ' . $this->storeMeta['owner'];
    }

    public function groupIsActive(array $items): bool
    {
        foreach ($items as $item) {
            if (Route::has($item['route']) && request()->routeIs($item['route'])) {
                return true;
            }
        }

        return false;
    }

    public function render(): View|Closure|string
    {
        return view('components.user.layout.app');
    }
}
