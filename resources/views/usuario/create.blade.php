<x-layout>
    <a class="btn btn-secondary" href="{{ route('/usuario') }}">Voltar</a>
    <form method="post" class="form-control">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" value={{ old('nome') }}>

        @error('nome')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror

        <label for="email">Email</label>
        <input type="text" name="email" value={{ old('email') }}>
        @error('email')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="telefone">Telefone</label>
        <input type="text" id="phone" name="telefone" value={{ old('telefone') }}>
        @error('telefone')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" value={{ old('cpf') }}>
        @error('cpf')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control" value={{ old('data_nascimento') }}>
        @error('data_nascimento')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="numero">Número</label>
        <input type="text" name="numero" value={{ old('numero') }}>
        @error('numero')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="rua">Rua</label>
        <input type="text" name="rua" value={{ old('rua') }}>
        @error('rua')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" value={{ old('bairro') }}>
        @error('bairro')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep" value={{ old('cep') }}>
        @error('cep')
            <div class="error-message">
                <i>&#9888;</i> <!-- Ícone de alerta -->
                {{ $message }}
            </div>
        @enderror
        <br>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</x-layout>
