

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Connexion</div>
        <div class="card-body">
            <form method="post" action="#">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Entrer email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Mot de passe" name="mdp">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Se souvenir de moi</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit" name="submit">Se connecter</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="<?= BASE_URL ?>/forgot-password">Mot de passe oublié?</a>
            </div>
        </div>
    </div>
</div>
<