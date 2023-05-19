@component('mail::message')
# ご登録ありがとうございます

この度はご登録いただき、ありがとうございます。<br>
以下のボタンをクリックして本登録を完了してください。

@component('mail::button', ['url' => $verify_url])
会員登録
@endcomponent

このメールに心当たりがない場合やご不明点等ありましたら、下記へお問い合わせください。<br>
[{{ url('contact') }}]({{ url('contact') }})

※こちらのメールは送信専用のメールアドレスより送信しております。恐れ入りますが、直接ご返信しないようお願いいたします。

{{ config('app.name') }}
@endcomponent
