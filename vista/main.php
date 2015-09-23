<div id="st-container" class="st-container">
    <nav class="st-menu st-effect-1" id="menu-1">
        <h2 class="icon icon-lab">Sidebar</h2>
        <ul>
            <li><a class="icon icon-data" href="#">Users</a></li>
            <li><a class="icon icon-location" href="#">Location</a></li>
            <li><a class="icon icon-study" href="#">Study</a></li>
            <li><a class="icon icon-photo" href="#">Collections</a></li>
            <li><a class="icon icon-wallet" href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="st-pusher">
        <div class="st-content" style="overflow-y: auto;"><!-- this is the wrapper for the content -->
            <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->               
                <header class="codrops-header">
                    <h1>Users menu <span>Add, delete and modify users</span></h1>
                </header>
                <div class="clearfix">

                    <div class="col-md-10">
                        <div class="row">
                            <div id="mainBox" class="col-xs-12 col-sm-12 col-md-12" style="border-right: solid 1px grey;">

                                <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Nick</th>
                                            <th>edad</th>
                                            <th>id_categoria</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Nick</th>
                                            <th>edad.</th>
                                            <th>id_categoria</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" id="menuBox" >
                        <div id="st-trigger-effects">
                            <button class="button button--winona button--border-thin button--round-s" data-effect="st-effect-1" data-text="Ver menu" style="margin-top: 0px;"><span>Ver menu</span></button>
                        </div>
                        <button data-target="#newUs" id="newUser" class="button button--winona button--border-thin button--round-s" data-text="Añadir" style="margin-top: 0px;"><span>Añadir</span></button>
                        <button class="button button--winona button--border-thin button--round-s" data-text="Volver" style="margin-top: 0px;"><span>Volver</span></button>
                    </div>
                    <div class="info">
                        <p></p>
                    </div>
                </div><!-- /main -->
            </div><!-- /st-content-inner -->
        </div><!-- /st-content -->
    </div>
</div>
<?php 
    include 'modals.php';
?>