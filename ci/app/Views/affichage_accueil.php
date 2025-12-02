<header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Bibliothèque Universitaire</h1>
                <h3 class="mb-5"><em>Université de Bretagne Occidentale</em></h3>
                <a class="btn btn-primary btn-xl" href="#about">Découvrir la bibliothèque</a>
            </div>
        </header>
            <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>La BU met à disposition des ressources et des espaces adaptés à tous les étudiants !</h2>
                        <p class="lead mb-5">
                            Découvrez nos ouvrages, revues scientifiques, ressources numériques et espaces de travail confortables. 
                            <a href="https://www.univ-brest.fr/">UBO</a>
                            met tout en œuvre pour faciliter vos études.
                        </p>
                        <a class="btn btn-dark btn-xl" href="#services">Nos Services</a>
                    </div>
                </div>
            </div>

            <?php
                if (!empty($actualites) && is_array($actualites)) {
                    echo "<table style='width: 80%; margin: 20px auto; border-collapse: collapse; font-family: Arial, sans-serif;'>";
                    echo "<thead>";
                    echo "<tr style='background-color: #ffe0b2;'>";
                    echo "<th style='padding: 10px; border: 1px solid #ddd;'>Titre</th>";
                    echo "<th style='padding: 10px; border: 1px solid #ddd;'>Description</th>";
                    echo "<th style='padding: 10px; border: 1px solid #ddd;'>l'auteur</th>";
                    echo "<th style='padding: 10px; border: 1px solid #ddd;'>Date de publication</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    foreach ($actualites as $act) {
                        echo "<tr>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd; color: rgb(255, 166, 0);'>" . htmlspecialchars($act['act_titre']) . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($act['act_description']) . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($act['cpt_pseudo']) . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($act['act_date_pub']) . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "
                    <p style='
                        color:white;
                        background:red;
                        padding:15px;
                        text-align:center;
                        font-size:18px;
                        border-radius:10px;
                        max-width:400px;
                        margin:40px auto;
                        font-family:Arial, sans-serif;
                    '>
                        Aucin actualité pour le moment ❌
                    </p>
                    ";
                }
            ?>
        </section>
        <section class="content-section bg-primary text-white text-center" id="services">
            
            <div class="container px-4 px-lg-5">
                
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services</h3>
                    <h2 class="mb-5">Ce que nous proposons</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Ressources numériques</strong></h4>
                        <p class="text-faded mb-0">Accédez à des bases de données et articles en ligne.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Espaces de travail</strong></h4>
                        <p class="text-faded mb-0">Salles silencieuses, groupes et équipements multimédias.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Accompagnement</strong></h4>
                        <p class="text-faded mb-0">
                            Nos bibliothécaires vous conseillent et vous orientent
                            <i class="fas fa-heart"></i>
                            pour tous vos projets.
                        </p>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Prêt & Retours</strong></h4>
                        <p class="text-faded mb-0">Empruntez facilement livres, revues et matériel.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    Bienvenue à
                    <em>votre</em>
                    bibliothèque universitaire !
                </h2>
            </div>
        </section>



        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Espaces</h3>
                    <h2 class="mb-5">Nos installations</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Salle de Lecture</div>
                                    <p class="mb-0">Un espace calme pour étudier efficacement.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-1.jpg" alt="Salle de Lecture" />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Ressources Numériques</div>
                                    <p class="mb-0">Accès aux bases de données universitaires.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-2.jpg" alt="Ressources Numériques" />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Espace Détente</div>
                                    <p class="mb-0">Un lieu pour faire une pause entre deux cours.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-3.jpg" alt="Espace Détente" />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Travaux de Groupe</div>
                                    <p class="mb-0">Espaces collaboratifs modernes et équipés.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio-4.jpg" alt="Travaux de Groupe" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Découvrez nos services et espaces facilement...</h2>
                <a class="btn btn-xl btn-light me-4" href="#!">Voir les Ressources</a>
                <a class="btn btn-xl btn-dark" href="#!">Visiter la BU</a>
            </div>
        </section>
        <div class="map" id="contact">
            <iframe src="https://maps.google.com/maps?q=bibliotheque%20universitaire%20ubo&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>
            <br />
            <small><a href="https://maps.google.com/maps?q=bibliotheque%20universitaire%20ubo"></a></small>
        </div>