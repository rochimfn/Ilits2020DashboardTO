<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            //forda
            if (\Session::get('role') == 'forda') {
                $totalEvent = \App\Kalender::count();
                $event->menu->add('NAVIGASI UTAMA');
                $event->menu->add([
                    'text' => 'Daftar Peserta',
                    'url' => '/daftar_peserta',
                    'icon' => 'fas fa-fw fa-print',
                ]);
                $event->menu->add([
                    'text' => 'Notifikasi',
                    'url' => '/kelola_notifikasi',
                    'icon' => 'fas fa-fw fa-envelope-open-text',
                ]);
                $event->menu->add([
                    'text' => 'Upcoming Event',
                    'url' => '/upcoming_peserta',
                    'icon' => 'far fa-fw fa-calendar-alt',
                    'label' => $totalEvent,
                    'label_color' => 'success',
                ]);
                $event->menu->add([
                    'text' => 'Koreksi Try Out',
                    'url' => '/koreksi_tryout',
                    'icon' => 'fas fa-fw fa-check-circle',
                ]);
                $event->menu->add('PENGATURAN AKUN');
                $event->menu->add([
                    'text' => 'Ganti Password',
                    'url' => '/ganti_password',
                    'icon' => 'fas fa-lock',
                ]);

                $event->menu->add('PEMBAYARAN');
                $event->menu->add(['text' => 'Konfirmasi Pembayaran',
                    'icon' => 'far fa-fw fa-check-circle',
                    'url' => '/konfirmasi_berkas']);
            }
            //admin
            else if (\Session::get('role') == 'admin') {
                $event->menu->add('NAVIGASI UTAMA');
                $event->menu->add([
                    'text' => 'Statistik',
                    'url' => 'admin/blog',
                    'icon' => 'fas fa-fw fa-chart-bar',
                ]);
                $event->menu->add([
                    'text' => 'Atur Kalender',
                    'url' => '/atur_kalender',
                    'icon' => 'fas fa-fw fa-calendar-alt',

                ]);
                $event->menu->add('PENGATURAN AKUN');
                $event->menu->add([
                    'text' => 'Ganti Password',
                    'url' => '/ganti_password',
                    'icon' => 'fas fa-lock',
                ]);

                $event->menu->add('GENERATOR');
                $event->menu->add([
                    'text' => 'Generate Token',
                    'icon' => 'fas fa-fw fa-barcode',
                ]);
                $event->menu->add([
                    'text' => 'Generate Sertifikat',
                    'icon' => 'fas fa-fw fa-stamp',
                ]);
            }

            //Peserta
            else if (\Session::get('role') == 'peserta') {

                $totalEvent = \App\Kalender::count();
                $event->menu->add('NAVIGASI UTAMA');
                $event->menu->add([
                    'text' => 'Notifikasi Forda',
                    'url' => '/notifikasi',
                    'icon' => 'far fa-fw fa-bell',
                ]);
                $event->menu->add([
                    'text' => 'Upcoming Event',
                    'url' => '/upcoming_peserta',
                    'icon' => 'far fa-fw fa-calendar-alt',
                    'label' => $totalEvent,
                    'label_color' => 'success',
                ]);
                $event->menu->add('PENGATURAN AKUN');
                $event->menu->add([
                    'text' => 'Ganti Password',
                    'url' => '/ganti_password',
                    'icon' => 'fas fa-lock',
                ]);
                $event->menu->add('UPLOAD');
                $event->menu->add([
                    'text' => 'Upload Berkas',
                    'url' => '/bukti_pembayaran',
                    'icon' => 'fas fa-fw fa-file-upload',
                ]);

            }
        });
    }

}
