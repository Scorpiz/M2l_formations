<?php include "header.php"; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="accueil">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Mon compte</li>
        </ol>
        <div class="container">
            <div class="row m-y-2">
                <div class="col-lg-8 push-lg-4">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Historique</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Modifier</a>
                        </li>
                        <?php if(isset($_SESSION['estChef']) && $_SESSION['estChef'] == 1){ ?> <!--Pour les chefs et admins seulement -->
                        <li class="nav-item">
                            <a href="" data-target="#gestion" data-toggle="tab" class="nav-link">Gestion Chef</a>
                        </li>
                        <?php } ?>
                        <?php if(isset($_SESSION['estChef']) && $_SESSION['estChef'] == 2){ ?> <!--Pour les chefs et admins seulement -->
                            <li class="nav-item">
                                <a href="" data-target="#gestion" data-toggle="tab" class="nav-link">Gestion Salariés</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content p-b-3">
                        <div class="tab-pane active" id="profile">
                            <h4 class="m-y-2">Profil d'utilisateur</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php foreach($info as $k=>$v){ ?>
                                    <p><?= $v['nom']." ".$v['prenom']; ?></p>
                                    <p><?= $v['email']; ?></p>
                                    <p><?= $v['credit']; ?> Crédits restants</p>
                                    <p><?= $v['nbj']; ?> jours de formations restants</p>
                                </div>

                                <?php if(isset($_SESSION['estChef']) && $_SESSION['estChef'] > 0){ ?>
                                <div class="col-md-12">
                                    <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Formations en cours</h4>

                                        <table class="table table-bordered box-shadow--6dp">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Formation</th>
                                                <th scope="col">Date de commencement</th>
                                                <th scope="col">Durée</th>
                                                <th scope="col">Prestataire</th>
                                                <th scope="col">Etat</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach($participer as $participe => $p){ ?>
                                                <tr>
                                                    <th scope="row"><?= $p['contenu']; ?></th>
                                                    <td><?= $p['date_deb']; ?></td>
                                                    <td><?= $p['nb_j']; ?> jours</td>
                                                    <td><?= $p['nom_p']. " " .$p['prenom_p']; ?></td>
                                                    <td><?= $p['etat']; ?> </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                </div>
                                <?php } ?>
                                <?php if(isset($_SESSION['estChef']) && $_SESSION['estChef'] > 0){ ?><!--Pour les chefs et admins seulement -->
                                <div class="col-md-12">
                                    <h4 class="m-t-2"><span class="fas fa-user-alt ion-clock pull-xs-right"></span> Mes salariés</h4>

                                    <table class="table table-bordered box-shadow--6dp">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($salaries as $salarie => $s){ ?>
                                            <tr>
                                                <td><?= $s['prenom']; ?></td>
                                                <td><?= $s['nom']; ?></td>
                                                <td><?= $s['email']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                                <?php } ?>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <h4 class="m-y-2">Historique des activités</h4>
                            <div class="alert alert-info alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                            </div>
                            <table class="table table-hover table-striped">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="pull-xs-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="pull-xs-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="pull-xs-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="pull-xs-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus.
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="edit">
                            <h4 class="m-y-2">Edition de profil</h4>
                            <form method="post" action="#">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Prénom</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="prenom" value="<?= $v['prenom']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nom</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="nom" value="<?= $v['nom']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="email" value="<?= $v['email']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Mot de passe*</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="mdp" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirmer mot de passe*</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" name="mdpconfirm" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Annuler">
                                        <input type="submit" class="btn btn-primary" value="Sauvegarder les changements" name="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                       <?php if(isset($_SESSION['estChef']) && $_SESSION['estChef'] > 0){ ?> <!--Pour les chefs et admins seulement -->
                        <div class="tab-pane" id="gestion">
                            <h4 class="m-y-2">Vérification des inscriptions</h4>
                            <div class="col-md-12">
                                <table class="table table-bordered box-shadow--6dp">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Date de commencement</th>
                                        <th scope="col">Durée</th>
                                        <th scope="col">Etat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if($_SESSION['estChef'] = 1){
                                        foreach($participer2 as $participe2 => $p) {
                                            foreach ($salaries as $salarie => $s) { ?>
                                                <tr>
                                                    <td><?= $s['nom']; ?></td>
                                                    <td><?= $s['prenom']; ?></td>
                                                    <td><?= $p['contenu']; ?></td>
                                                    <td><?= $p['date_deb']; ?></td>
                                                    <td><?= $p['nb_j']; ?> jours</td>
                                                    <td><?= $p['etat']; ?> </td>
                                                    <td>
                                                        <a href="index.php?p=gestionMembreChef&id_s=<?= $s["id_s"]; ?>&id_f=<?= $p["id_f"]; ?>"
                                                        <button type="submit" class="btn btn-success"
                                                                name="submitAccept" style="margin-bottom: 5px">Accepter
                                                        </button>
                                                        </a>
                                                        <a href="index.php?p=gestionMembreChef&id_s=<?= $s["id_s"]; ?>&id_f=<?= $p["id_f"]; ?>"
                                                        <button type="submit" class="btn btn-danger" name="submitRefus">
                                                            Refuser
                                                        </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }
                                    } ?>
                                    <?php if($_SESSION['estChef'] = 2){
                                        foreach($participerAll as $participeAll => $p) {
//                                            foreach ($salaries as $salarie => $s) { ?>
                                                <tr>
                                                    <td><?= $s['nom']; ?></td>
                                                    <td><?= $s['prenom']; ?></td>
                                                    <td><?= $p['contenu']; ?></td>
                                                    <td><?= $p['date_deb']; ?></td>
                                                    <td><?= $p['nb_j']; ?> jours</td>
                                                    <td><?= $p['etat']; ?> </td>
                                                    <td>
                                                        <a href="index.php?p=gestionMembreAdmin&id_s=<?= $s["id_s"]; ?>&id_f=<?= $p["id_f"]; ?>"
                                                        <button type="submit" class="btn btn-success"
                                                                name="submitAccept" style="margin-bottom: 5px">Accepter
                                                        </button>
                                                        </a>
                                                        <a href="index.php?p=gestionMembreAdmin&id_s=<?= $s["id_s"]; ?>&id_f=<?= $p["id_f"]; ?>"
                                                        <button type="submit" class="btn btn-danger" name="submitRefus">
                                                            Refuser
                                                        </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }
//                                        }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php }
                                    } ?>
                    </div>
                </div>
            </div>
        </div>
<?php include "footer.php"; ?>