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
            <div class="myformations-table">
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
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->


<?php include "footerView.php";
