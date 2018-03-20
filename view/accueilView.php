<?php
session_start();

include "../controller/headerController.php";
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Mon dashboard</li>
            </ol>
<!--            <p>-->
<!--                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">-->
<!--                    Link with href-->
<!--                </a>-->
<!--                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">-->
<!--                    Button with data-target-->
<!--                </button>-->
<!--            </p>-->
<!--            <div class="collapse" id="collapseExample">-->

            <div class="myformations-table">
                <?php if (!empty($participer)) { ?>
                <h1 class="myformations-title">Mes formations en cours</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Formation</th>
                            <th scope="col">Date de commencement</th>
                            <th scope="col">Durée</th>
                            <th scope="col">Détails</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($participer as $participe){ ?>
                            <tr>
                                <th scope="row"><?= $participe['contenu'] ?></th>
                                <td><?= $participe['date_deb'] ?></td>
                                <td><?= $participe['nb_j'] ?> jours</td>
                                <td><a href="">Voir détails</a></td>
                            </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container-fluid">
                <h2 class="text-center">Liste des formations</h2>
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/350x150" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Tir à l'arc</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/350x150" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Natation</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/350x150" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Athlétisme</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->



<?php include "footerView.php";
