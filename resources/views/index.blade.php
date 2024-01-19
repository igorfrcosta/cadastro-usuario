<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de Usuário</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

        <style>
            html, body {
                height: 300px;
                margin: 0;
                font-family: 'Roboto', sans-serif;
            }

            #conteudo {
                padding: 10px 50px;
            }

            input, select, textarea, button {
                width: 300px;
                padding: 10px 15px;
                margin: 10px 0px 10px 0px;
                box-sizing: border-box;
                border-radius: 3px;
                background-color: transparent;
                color: #333;
            }

            button {
                background-color: #7ab829;
                cursor: pointer;
                color: #fff;
            }

            button:hover {
                background-color: #6ea22c;
            }

            .red {
                color: red;
            }

            .alert {
                margin: 30px 0px;
            }
        </style>
    </head>

    <body>

        <div id="conteudo">
            <h1>Cadastrar Novo Usuário</h1>

            @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
            @endif

            <form action={{ route('salvar') }} method="post">
                @csrf
                <span class="red">*</span> <input name="nome" type="text" placeholder="Nome" value="{{ old('nome') }}" required>
                <br><span class="red">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>
                <br>
                <span class="red">*</span> <input name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
                <br><span class="red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                <br>
                <span class="red">*</span> <input name="senha" type="password" placeholder="Senha" value="{{ old('senha') }}" required>
                <br><span class="red">{{ $errors->has('senha') ? $errors->first('senha') : '' }}</span>
                <br>
                <span class="red">*</span> <input name="confirmacao_senha" type="password" placeholder="Confirmação de Senha" value="{{ old('confirmacao_senha') }}" required>
                <br><span class="red">{{ $errors->has('confirmacao_senha') ? $errors->first('confirmacao_senha') : '' }}</span>
                <br>
                <span class="red">&nbsp</span> <button type="submit" class="borda-preta">Salvar</button>
            </form>
        </div>

    </body>
</html>