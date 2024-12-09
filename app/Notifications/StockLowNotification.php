<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockLowNotification extends Notification
{
    use Queueable;
    public $inventario;

    /**
     * Create a new notification instance.
     */
    public function __construct($inventario)
    {
        $this->inventario = $inventario;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Stock Bajo en Inventario')
                    ->line('El producto "' . $this->inventario->producto->nombre . '" en el almacén "' . $this->inventario->almacen->nombre . '" está por debajo del límite mínimo.')
                    ->action('Ver Producto', url('/productos/' . $this->inventario->producto_id));
    }

    public function toDatabase($notifiable)
    {
        return [
            'titulo' => 'Stock Bajo',
            'mensaje' => 'El producto "' . $this->inventario->producto->nombre . '" en el almacén "' . $this->inventario->almacen->nombre . '" está por debajo del límite mínimo.',
            'producto_id' => $this->inventario->producto_id,
            'almacen_id' => $this->inventario->almacen_id
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
