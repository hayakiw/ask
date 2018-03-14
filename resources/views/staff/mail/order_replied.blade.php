{{ $order->item->staff->getName() }} さん、こんにちは！

@if ($order->status == App\Order::ORDER_STATUS_OK)
依頼を確定しました。

作業日時：{{ $order->work_at }}～{{ $order->hours }}時間
詳細：{{ $order->comment }}

@else
依頼を拒否しました。
@endif

タイトル：{{ $order->title }}
合計金額：{{ $order->price * $order->hours }}

コメント：
{{ $order->staff_comment }}


以下の画面で確認できます。
{{ route('orders.index') }}



※このメールに心当たりがない場合は、このメールを破棄してください。
※このメールアドレスは送信専用です。返信への対応はできませんので予めご了承ください。

▼サイトURL
{{ route('root.index') }}
