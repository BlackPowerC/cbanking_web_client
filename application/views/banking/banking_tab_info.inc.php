<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 22:37
 */
?>
<div id="info-pan" class="tab-pan fade">
    <div class="card">
        <div class="card-body">
            <?php
            if(array_key_exists('accounts', $customer))
            {
                foreach($customer['accounts'] as $account)
                {
                ?>
                    <ul>
                        <li>Numero de compte:
                            <a
                                data-toggle="modal" data-target="#account-modal"
                                href="http://localhost:8181/account/get/<?php echo $account['id'] ;?>"
                                class="btn btn-link account-link">
                                <?php echo $account['id'] ;?>
                            </a>
                        </li>
                        <li>Date de création: <?php echo $account['creationDate'] ;?></li>
                        <li>Solde: <?php echo $account['balance'] ;?></li>
                    </ul>
                <?php
                }
            }
            else
            {

            }
            ?>
        </div>
        <script src="../js/getAccount.js"></script>
        <!-- Boite de dalog affichant les infos d'un compte -->
        <div class="modal fade" id="account-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--  En-tête -->
                    <div class="modal-header">
                        <h4 id="id" class="modal-title">Compte N° </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Corps -->
                    <div class="modal-body">
                        <p id="infos">
                            <h4>Informations utiles</h4>
                        Compte appartenant à <span class="text-gray-dark" id="customer">???</span> <br/>
                        Créé par <span class="text-gray-dark" id="employee">???</span>
                        le <span class="text-gray-dark" id="creationDate">???</span> <br/>
                        </p>
                        <div>
                            <h4>Ensemble des transactions</h4>
                            <ul id="operations">

                            </ul>
                        </div>
                    </div>

                    <!-- Pied de page -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>