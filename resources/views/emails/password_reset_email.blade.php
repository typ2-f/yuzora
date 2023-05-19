@component('mail::message')
# パスワードのリセット

以下のボタンをクリックして手続きを行ってください。

@component('mail::button', ['url' => $reset_url])
パスワードリセット
@endcomponent

このメールに心当たりがない場合やご不明点等ありましたら、下記へお問い合わせください。<br>
[{{ url('contact') }}]({{ url('contact') }})

※こちらのメールは送信専用のメールアドレスより送信しております。恐れ入りますが、直接ご返信しないようお願いいたします。

{{ config('app.name') }}
@endcomponent
