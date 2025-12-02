@extends('layouts.app')

@section('content')
<style>
    /*
     * Estilos CSS Personalizados para el Formulario de Registro
     */

    /* Contenedor principal para centrar el formulario */
    .main-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Asegura que cubra toda la altura de la vista */
        background-color: #f0f2f5; /* Color de fondo suave */
        padding: 20px;
    }

    /* Contenedor del formulario (define el ancho máximo) */
    .form-container {
        width: 100%;
        max-width: 450px; /* Ancho típico para formularios */
    }

    /* La tarjeta o panel del formulario */
    .form-card {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Para que el header redondee correctamente */
    }

    /* Encabezado de la tarjeta */
    .card-header-custom {
        background-color: #4a5568; /* Un color oscuro */
        color: white;
        padding: 15px 20px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
    }

    /* Cuerpo de la tarjeta */
    .card-body-custom {
        padding: 25px;
    }

    /* Grupo de cada campo (label + input) */
    .form-group {
        margin-bottom: 20px;
    }

    /* Etiqueta del campo */
    .form-label-custom {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333333;
    }

    /* Campo de entrada de texto/password/email */
    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 1rem;
        box-sizing: border-box; /* Crucial para que el padding no afecte el ancho total */
        transition: border-color 0.3s;
    }

    .form-input:focus {
        border-color: #4a5568;
        outline: none;
    }

    /* Estilo para campos con error (clase .is-error) */
    .form-input.is-error {
        border-color: #e3342f; /* Rojo de error */
    }

    /* Mensaje de error */
    .error-message {
        display: block;
        margin-top: 5px;
        font-size: 0.85rem;
        color: #e3342f;
    }

    /* Grupo del botón */
    .button-group {
        margin-top: 30px;
    }

    /* Botón de envío */
    .form-button {
        display: block;
        width: 100%;
        padding: 12px;
        font-size: 1.1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .primary-button {
        background-color: #4a5568;
        color: white;
    }

    .primary-button:hover {
        background-color: #2d3748;
    }
</style>

<div class="main-wrapper">
    <div class="form-container">
        <div class="form-card">
            <div class="card-header-custom">
                {{ __('Registro de Usuario') }}
            </div>

            <div class="card-body-custom">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label-custom">{{ __('Nombre') }}</label>
                        <div class="input-wrapper">
                            <input id="name" type="text" class="form-input @error('name') is-error @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                            @error('name')
                                <span class="error-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label-custom">{{ __('Correo Electrónico') }}</label>
                        <div class="input-wrapper">
                            <input id="email" type="email" class="form-input @error('email') is-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="error-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label-custom">{{ __('Contraseña') }}</label>
                        <div class="input-wrapper">
                            <input id="password" type="password" class="form-input @error('password') is-error @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="error-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="form-label-custom">{{ __('Confirmar Contraseña') }}</label>
                        <div class="input-wrapper">
                            <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="form-button primary-button">
                            {{ __('Registrarme') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection