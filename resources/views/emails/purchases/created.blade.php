@component('mail::message')
# Thanks!!

商品の注文ありがとうございます。

注文が確定したら通知メールをお送りいたしますので、そのメールをもって購入確定となります。

在庫がない場合などの理由により商品の発送ができない場合、購入がキャンセルとなる場合がございます。

ご了承ください。

@component('mail::button', ['url' => route('top')])
買い物を続ける
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
