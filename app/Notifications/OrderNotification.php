<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Quý khách đã đặt phòng thành công.')
            ->line('Tên Khách Hàng: ' . $this->order->name)
            ->line('Giá: ' . $this->order->new_total_price)
            ->line('Email: ' . $this->order->email)
            ->line('Số điện thoại: ' . $this->order->phone)
            ->line('Ngày nhận phòng: ' . $this->order->check_in_date)
            ->line('Ngày trả phòng: ' . $this->order->check_out_date)
            ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }
}
