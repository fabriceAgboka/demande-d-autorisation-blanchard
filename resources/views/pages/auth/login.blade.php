@extends('layout.auth')
@section('title', 'Connexion')

@section('content')

<div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
    <div class="w-px-400 mx-auto">           
        <h3 class="mb-1 fw-bold">{{env("APP_NAME")}} administration</h3>
        <p class="mb-4">Veuillez-vous connecter au tableau de bord d'administration.</p>

        <form id="formAuthentication" class="mb-3" action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email ou téléphone</label>
                <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email ou téléphone"
                    autofocus
                />
                @error('email')
                    <small class="text-danger font-size-xsmall"> {{ $message }} </small>
                @enderror
            </div>

            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Mot de passe</label>
                </div>
                <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('password')
                    <small class="text-danger font-size-xsmall"> {{ $message }} </small>
                @enderror
            </div>
        
            <button class="btn d-grid w-100" id="connexionButton">Connexion</button>
        </form>
    </div>
</div>
        
@stop    
