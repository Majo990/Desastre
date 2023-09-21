<?php

namespace App\Listeners;

use App\Events\PedidoRealizado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnviarNotificacionPedido
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PedidoRealizado $event): void
    {
        $pedido= $event->pedido;
        $usuario=$pedido->usuario;
        $usuario->notify(new NuevoPedidoNotification($pedido));
    }
}
