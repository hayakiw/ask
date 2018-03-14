{{ $order->item->staff->getName() }} さん、こんにちは！

{{ $order->user->getName() }}より依頼がありました。

以下の画面で返信してください。
{{ route('staff.orders.show', $order) }}


※このメールに心当たりがない場合は、このメールを破棄してください。
※このメールアドレスは送信専用です。返信への対応はできませんので予めご了承ください。

▼サイトURL
{{ route('root.index') }}
