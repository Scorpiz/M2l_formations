<?php include "header.php"; ?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Mon dashboard</li>
            </ol>
            <section class="wrapper">
                <div class="container-fostrap">
                    <div class="myformations-table">
                        <h1 class="heading">Mes formations en cours</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered box-shadow--6dp">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Formation</th>
                                    <th scope="col">Date de commencement</th>
                                    <th scope="col">Durée</th>
                                    <th scope="col">Etat</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($participer as $k => $v){ ?>
                                    <tr>
                                        <th scope="row"><?= $v['contenu']; ?></th>
                                        <td><?= $v['date_deb']; ?></td>
                                        <td><?= $v['nb_j']; ?> jours</td>
                                        <td><?= $v['etat']; ?> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="wrapper">
                <div class="container-fostrap">
                    <div>
                        <h1 class="heading">
                            Les formations disponibles
                        </h1>
                    </div>

                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <?php foreach($form as $k => $v){ ?>
                                <div class="col-xs-12 col-sm-4">

                                    <div class="card">
                                        <a class="img-card" href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                            <img src="<?= $v['img']; ?>" onerror="this.src='https://www.locaporte.com/wp-content/themes/locaporte_v2/inc/img/image-not-found.png';" />
                                        </a>
                                        <div class="card-content">
                                            <h4 class="card-title">
                                                <a href="http://www.fostrap.com/2016/03/bootstrap-3-carousel-fade-effect.html"> <?=$v['contenu']; ?>
                                                </a>
                                            </h4>
                                            <p class="">
                                                Date : <?= $v['date_deb']; ?> <br>
                                                Durée : <?= $v['nb_j']; ?> jours<br>
                                                Lieu : <?= $v['numero'] . " " . $v['rue'] . ", ". $v['cp'] . " " . $v['commune']; ?><br>
                                                Prestataire: <?= $v['nom_p']; ?><br>
                                                Crédit : <?= $v['credit'] ?>
                                            </p>
                                        </div>
                                        <div class="card-read-more">
                                            <button type="button" class="btn btn-link btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                                S'inscrire
                                            </button>
                                            <!-- Modal -->
                                            <form action="#" method="post">
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Inscription</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                S'inscrire à la formation "<?=$v['contenu']; ?>" ? <br>
                                                                Coût de la formation : <?= $v['credit'] ?> crédits
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <a href="index.php?p=accueil&ajouter=<?= $v['id_f'] ?>"
                                                                    <button type="submit" class="btn btn-primary" name="submit">Oui</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /Modal -->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </div>
    <!-- /.content-wrapper-->


<?php include "footer.php"; ?>