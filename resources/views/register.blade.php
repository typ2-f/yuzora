@extends('default.common')
@section('title', 'atte-登録')



@section('content')
    <h1 class='content-ttl'>会員登録</h1>

    <!--divタグ直後の全角スペースで常に文字を存在させ位置を固定する-->
    <div class='flash_msg'>　
        @if (session('error'))
            {{ session('error') }}
        @endif
    </div>
    <section class='form' id='register'>
        <form action='register' method='POST'>
            @csrf
            <!--名前-->
            <div class='form-element'>
                <input type='text' class='form-input' name='name' id='name' required value='{{ old('name') }}' placeholder='名前'>
            </div>
            <!--パスワード-->
            <div class='form-element'>
                <input type='password' class='form-input' name='password' id='password' required placeholder='パスワード'>
            </div>
            <!--パスワード確認-->
            <div class='form-element' id='form-pass_check'>
                <input type='password' class='form-input' name='passcheck' id='passcheck' required
                    placeholder='パスワード確認用'>
            </div>
            <!--divタグ直後の全角スペースで常に文字を存在させる-->
            <div class='flash_msg'>
                <p id='err_byJS'>　</p>
            </div>
            <div>
                <x-button>
                    会員登録
                </x-button>
            </div>
        </form>
    </section>
    <section class='guidance'>
        <p class='guidance-msg'>アカウントをお持ちの方はこちらから</p>
        <a href='/login' class='link_login'>ログイン</a>
    </section>
@endsection
@section('pageJS')
    <script src={{ asset('js/register.js') }}></script>
@endsection
