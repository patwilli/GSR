function notifierMsg(id_user) {
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Administration/Verification/" +
                id_user
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response.data);
            var nbr_message = response.data;
            if (nbr_message != 0) {
                if (Notification.permission === "granted") {
                    showNotification();
                } else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then((permission) => {
                        if (permission === "granted") {
                            showNotification();
                        } else {
                            console.log(
                                "Les notifications ne sont pas autorisées."
                            );
                        }
                    });
                }
                axios
                    .get(
                        "http://127.0.0.1:8000/SR-PADME-UpdateNotifier/" +
                            id_user +
                            "/" +
                            nbr_message
                    )
                    .then((response) => {
                        // Gérer la réponse ici
                        console.log(response.data);
                    })
                    .catch((error) => {
                        // Gérer les erreurs ici
                        console.error(error);
                    });
            }
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });

    // Fonction pour afficher la notification
    const showNotification = () => {
        const notification = new Notification("SR PADME - NOUVEAU MESSAGE", {
            body: "Cliquez pour consulter.",
            icon: "/images/sr1.png",
        });

        // setTimeout(() => {
        //     notification.close();
        // }, 10 * 1000);

        notification.addEventListener("click", () => {
            window.open("http://127.0.0.1:8000/SR-PADME-Message");
        });
    };
}

function logout() {
    let transparent = document.createElement("div");
    transparent.id = "div-transparent";
    transparent.className = "div-de-fond";
    transparent.style.zIndex = "2000";
    let div = document.createElement("div");
    div.id = "transform";
    div.style.zIndex = "2500";
    let a = document.createElement("a");
    a.id = "lien";
    a.className = "btn btn-danger";

    a.href = `/deconnexion`;

    div.className = "popup";
    div.innerHTML = `<h1 style="font-size:50px;"><i class="fa fa-sign-out"></i></h1>`;
    div.innerHTML += "<div>Confirmer déconnexion</div>";
    a.innerHTML = " Déconnexion ";
    var body = document.querySelector("body");
    body.appendChild(div);
    div.appendChild(a);
    body.appendChild(transparent);
    transparent.addEventListener("click", function () {
        body.removeChild(transparent);
        body.removeChild(div);
    });
}
function avertissement(login) {
    let transparent = document.createElement("div");
    transparent.id = "div-transparent";
    transparent.className = "div-de-fond";
    transparent.style.zIndex = "2000";
    let div = document.createElement("div");
    div.id = "transform";
    div.style.zIndex = "2500";
    let a = document.createElement("a");
    a.id = "lien";
    a.className = "btn btn-success";
    a.href = ``;

    div.className = "popup";
    div.innerHTML = `<marquee style="font-size:30px;color:steelblue"><i
                            class="fa fa-exclamation-triangle"></i> Avertissement</marquee>`;
    div.innerHTML +=
        "<div>Hi <i>" +
        login +
        "</i><br> Pardon il faut travailler !!! S'il faut plaît </div>";
    a.innerHTML = " J'ai compris ";
    var body = document.querySelector("body");
    body.appendChild(div);
    div.appendChild(a);
    body.appendChild(transparent);
    transparent.addEventListener("click", function () {
        body.removeChild(transparent);
        body.removeChild(div);
    });
}
// avertissement("Patrice SOSSAVI");
function signalementMAJ(name, temps) {
    var li = document.getElementById("typing-text");
    li.className = "animate__animated animate__backInDown";
    li.innerHTML =
        `<a><b style="color: rgb(143, 120, 80)">
                                    Systeme mis à jour
                                </b><br>
                                <marquee style="color: rgb(143, 120, 80)">il y a ` +
        temps +
        ` s</marquee>
                            </a>`;
    setTimeout(() => {
        li.className = "animate__animated animate__backOutUp";
    }, 5000);
    setTimeout(() => {
        li.className = "animate__animated animate__backInDown";
        li.innerHTML =
            `<a href="//SR-PADME-Compte"><b style="color: rgb(32, 20, 20)"> ` +
            name +
            `  </b><br>  <i style="color: rgb(143, 120, 80)">en ligne</i></a>`;
    }, 5500);
}
//setTimeout('signalementMAJ("Patrice SOSSAVI", "52")', 1000);

function printPDF() {
    var pdfUrl = "pdf/exemple_1687041516.pdf";
    var printWindow = window.open(pdfUrl, "_blank");
    printWindow.addEventListener("load", function () {
        setTimeout(() => {
            printWindow.print();
        }, 2000);
    });
}

function bloquerUtilisateur(id) {
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Administration/Bloquer%20un%20utilisateur/" +
                id
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response);
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}
function changerProfil(id) {
    var form_select = document.getElementById("form_select_" + id);
    var selected = form_select.value;
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Administration/Changement%20profil/" +
                id +
                "/" +
                selected
        )
        .then((response) => {
            // Gérer la réponse ici
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}
function recupABP(codeAgence, codeBureau, codeProfil) {
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Administration/recupABP/" +
                codeAgence +
                "/" +
                codeBureau +
                "/" +
                codeProfil
        )
        .then((response) => {
            console.log(response.data);
            var agence = response.data[0];
            var bureau = response.data[1];
            var profil = response.data[2];
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}

function rechercherUtilisateur() {
    var search = document.getElementById("search");
    var mot = search.value;
    //recuperer les profils dans une variables
    axios
        .get("http://127.0.0.1:8000/SR-PADME-Administration/listes des profils")
        .then((response) => {
            var listes_profils = response.data;
            if (mot != "") {
                axios
                    .get(
                        "http://127.0.0.1:8000/SR-PADME-Administration/Recherche/" +
                            mot
                    )
                    .then((response) => {
                        var users = response.data;
                        var count = users.length;
                        var contenu = document.getElementById("contenu");
                        contenu.innerHTML = "";
                        for (let i = 0; i < count; i++) {
                            axios
                                .get(
                                    "http://127.0.0.1:8000/SR-PADME-Administration/recupABP/" +
                                        users[i]["codeAgence"] +
                                        "/" +
                                        users[i]["codeBureau"] +
                                        "/" +
                                        users[i]["codeProfil"]
                                )
                                .then((response) => {
                                    var agence = response.data[0];
                                    var bureau = response.data[1];
                                    var profil = response.data[2];
                                    console.log(
                                        "Un " +
                                            profil +
                                            " " +
                                            users[i]["name"] +
                                            " affiché "
                                    );
                                    contenu.innerHTML += `
                                <tr>
                                    <td class="text-center">${
                                        users[i]["id"]
                                    }</td>
                                    <td class="txt-oflo">${
                                        users[i]["name"]
                                    }</td>
                                    <td class="txt-oflo">${
                                        users[i]["login"]
                                    }</td>
                                    <td><span class="text-success">${
                                        users[i]["email"]
                                    }</span></td>
                                    <td><span class="txt-oflo">${agence}</span></td>
                                    <td><span class="txt-oflo">${bureau}</span></td>
                                    <td class="align-middle text-center">
                                        <input type="checkbox" class="" onchange="bloquerUtilisateur(${
                                            users[i]["id"]
                                        })" ${
                                        users[i]["bloque"] === 1
                                            ? "checked"
                                            : ""
                                    }>
                                    </td>
                                    <td class="align-middle text-center">
                                            <select class="custom-select b-0" id="form_select_${
                                                users[i]["id"]
                                            }" onchange="changerProfil(${
                                        users[i]["id"]
                                    })">`;
                                    for (
                                        let j = 0;
                                        j < listes_profils.length;
                                        j++
                                    ) {
                                        select_cnt = document.getElementById(
                                            "form_select_" + users[i]["id"]
                                        );
                                        if (
                                            listes_profils[j]["intitule"] ==
                                            profil
                                        ) {
                                            select_cnt.innerHTML += `<option value="${listes_profils[j]["id"]}" selected>
                                                            ${listes_profils[j]["intitule"]}
                                                        </option>`;
                                        } else {
                                            select_cnt.innerHTML += `<option value="${listes_profils[j]["id"]}">
                                                                ${listes_profils[j]["intitule"]}
                                                            </option>`;
                                        }
                                    }
                                    contenu.innerHTML += `
                                            </select>
                                    </td>
                                </tr>`;
                                })
                                .catch((error) => {
                                    // Gérer les erreurs ici
                                    console.error(error);
                                });
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                location.reload();
            }
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}

function trierUtilisateur() {
    var search = document.getElementById("trierUsers");
    var mot = search.value;
    //recuperer les profils dans une variables
    axios
        .get("http://127.0.0.1:8000/SR-PADME-Administration/listes des profils")
        .then((response) => {
            var listes_profils = response.data;
            if (mot != "Tous les utilisateurs") {
                axios
                    .get(
                        "http://127.0.0.1:8000/SR-PADME-Administration/Trier les utilisateurs/" +
                            mot
                    )
                    .then((response) => {
                        var users = response.data;
                        var count = users.length;
                        var contenu = document.getElementById("contenu");
                        contenu.innerHTML = "";
                        for (let i = 0; i < count; i++) {
                            axios
                                .get(
                                    "http://127.0.0.1:8000/SR-PADME-Administration/recupABP/" +
                                        users[i]["codeAgence"] +
                                        "/" +
                                        users[i]["codeBureau"] +
                                        "/" +
                                        users[i]["codeProfil"]
                                )
                                .then((response) => {
                                    var agence = response.data[0];
                                    var bureau = response.data[1];
                                    var profil = response.data[2];
                                    console.log(
                                        "Un " +
                                            profil +
                                            " " +
                                            users[i]["name"] +
                                            " affiché "
                                    );
                                    contenu.innerHTML += `
                                <tr>
                                    <td class="text-center">${
                                        users[i]["id"]
                                    }</td>
                                    <td class="txt-oflo">${
                                        users[i]["name"]
                                    }</td>
                                    <td class="txt-oflo">${
                                        users[i]["login"]
                                    }</td>
                                    <td><span class="text-success">${
                                        users[i]["email"]
                                    }</span></td>
                                    <td><span class="txt-oflo">${agence}</span></td>
                                    <td><span class="txt-oflo">${bureau}</span></td>
                                    <td class="align-middle text-center">
                                        <input type="checkbox" class="" onchange="bloquerUtilisateur(${
                                            users[i]["id"]
                                        })" ${
                                        users[i]["bloque"] === 1
                                            ? "checked"
                                            : ""
                                    }>
                                    </td>
                                    <td class="align-middle text-center">
                                            <select class="custom-select b-0" id="form_select_${
                                                users[i]["id"]
                                            }" onchange="changerProfil(${
                                        users[i]["id"]
                                    })">`;
                                    for (
                                        let j = 0;
                                        j < listes_profils.length;
                                        j++
                                    ) {
                                        select_cnt = document.getElementById(
                                            "form_select_" + users[i]["id"]
                                        );
                                        if (
                                            listes_profils[j]["intitule"] ==
                                            profil
                                        ) {
                                            select_cnt.innerHTML += `<option value="${listes_profils[j]["id"]}" selected>
                                                            ${listes_profils[j]["intitule"]}
                                                        </option>`;
                                        } else {
                                            select_cnt.innerHTML += `<option value="${listes_profils[j]["id"]}">
                                                                ${listes_profils[j]["intitule"]}
                                                            </option>`;
                                        }
                                    }
                                    contenu.innerHTML += `
                                            </select>
                                    </td>
                                </tr>`;
                                })
                                .catch((error) => {
                                    // Gérer les erreurs ici
                                    console.error(error);
                                });
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            } else {
                location.reload();
            }
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}

function updateProfil(idProfil) {
    var btn = document.getElementById("btnprofil" + idProfil).innerHTML;
    var cadre = document.getElementById("cadre");
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Administration/Recherche de fonctionnalites/" +
                idProfil
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response);
            var fonct = response.data;
            cadre.innerHTML = `<div class="card-body">
                                <h2 class="card-text" style="color: rgb(84, 174, 84)">${btn} | Fonctionnalités</h2>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check1" onclick="updateFonc(${idProfil},1)">&nbsp;&nbsp;VOIR LES CREDITS</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check2" onclick="updateFonc(${idProfil},2)">&nbsp;&nbsp;VOIR UN CREDIT</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check3" onclick="updateFonc(${idProfil},3)">&nbsp;&nbsp;GESTION DE RELANCE</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check4" onclick="updateFonc(${idProfil},4)">&nbsp;&nbsp;VOIR LES RAPPORTS EN COURS</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check5" onclick="updateFonc(${idProfil},5)">&nbsp;&nbsp;TELECHARGER RAPPORT</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check6" onclick="updateFonc(${idProfil},6)">&nbsp;&nbsp;ANALYSER LA PERFORMANCE</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check7" onclick="updateFonc(${idProfil},7)">&nbsp;&nbsp;VOIR SUBORDONNE</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check8" onclick="updateFonc(${idProfil},8)">&nbsp;&nbsp;BOOSTER UN SUBORDONNE</h4>
                                    <h4 class="card-title"><input type="checkbox" name="" id="check9" onclick="updateFonc(${idProfil},9)">&nbsp;&nbsp;ESPACE ADMIN</h4>                                   
                                    <h4 class="card-title"><input type="checkbox" name="" id="check10" onclick="updateFonc(${idProfil},10)">&nbsp;&nbsp;VOIR PROFIL</h4>
                            </div>`;
            for (let i = 0; i < 11; i++) {
                for (let j = 0; j < fonct.length; j++) {
                    if (fonct[j]["codeFonctionnalite"] == i) {
                        document.getElementById("check" + i).checked = true;
                    }
                }
            }
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}
function updateFonc(idProfil, idFonc) {
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Administration/Mettre a jour fonctionnalité/" +
                idProfil +
                "/" +
                idFonc
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response);
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}

function rapportSearch() {
    var mot = document.getElementById("searchrapport").value;
    var form = document.getElementById("formrapport");
    form.action = "#credit" + mot;
    var form = document.getElementById("formrapport");
    var mot = document.getElementById("searchrapport").value;
    var imgRapport = document.getElementById("img" + mot);
    if (imgRapport) {
        imgRapport.classList.add("animate__animated", "animate__heartBeat");

        setTimeout(function () {
            imgRapport.classList.remove(
                "animate__animated",
                "animate__heartBeat"
            );
        }, 1000);
    }
}

function epingler(nbr_credit_dispo, credits) {
    var btn_eping = document.getElementById("btn_eping");
    var btn_envoye = document.getElementById("btn_envoye");
    var btn_annuler = document.getElementById("btn_annuler");
    var slt_trier = document.getElementById("slt_trier");
    btn_eping.style.display = "none";
    btn_envoye.style.display = "block";
    btn_annuler.style.display = "block";
    slt_trier.style.display = "none";
    for (let i = 0; i < nbr_credit_dispo; i++) {
        var col_checkbox = document.getElementById(
            "col_checkbox" + credits[i]["id"]
        );
        var col_id = document.getElementById("col_id" + credits[i]["id"]);
        col_id.style.display = "none";
        col_checkbox.style.display = "block";
    }
}

function annuler_epingle() {
    location.reload();
}

function epingler_credit(id_credit) {
    var nbr_credit_epingler = document.getElementById("nbr_credit_epingler");
    var valeur = parseInt(nbr_credit_epingler.innerHTML);
    var checkbox = document.getElementById("checkbox" + id_credit);
    if (checkbox.checked == true) {
        valeur += 1;
    } else {
        valeur -= 1;
    }
    nbr_credit_epingler.innerHTML = valeur;
}

function envoyer_credits(nbr_credit_dispo, credits, id_user) {
    var btn_envoye = document.getElementById("btn_envoye");
    // Créer le tableau en dehors de la boucle
    var tableau = [];
    for (let i = 0; i < nbr_credit_dispo; i++) {
        var checkbox = document.getElementById("checkbox" + credits[i]["id"]);
        if (checkbox.checked == true) {
            // Utilisation de checkbox.checked pour vérifier si la case est cochée
            // Fonction pour ajouter l'agent et le crédit épinglé
            function add(id_agent, id_credit, id_user) {
                var info = {
                    id_agent: id_agent,
                    id_credit: id_credit,
                    id_user: id_user,
                };
                tableau.push(info);
            }
            add(credits[i]["codeAgent"], credits[i]["id"], id_user);
        }
    }
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Envoie de message/" +
                JSON.stringify(tableau)
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response.data);
            btn_envoye.style.cursor = "progress";
            btn_envoye.innerHTML = "en cours denvoie . . .";
            setTimeout(() => {
                btn_envoye.innerHTML = "Terminer";
                btn_envoye.className =
                    "btn waves-effect waves-light btn-success hidden-md-down";
            }, 1000);
            setTimeout(() => {
                btn_envoye.innerHTML = "Redirection . . .";
                location.reload();
            }, 2000);
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}

function trierCredit(id_profil, mes_fonctionnalites) {
    var btn_eping = document.getElementById("btn_eping");
    if (btn_eping) {
        btn_eping.style.display = "none";
    }
    var contenu = document.getElementById("contenuCredit");
    contenu.innerHTML = "Rien pour le moment !";
    var select = document.getElementById("slt_trier");
    var elementSelectionne = select.value;
    if (elementSelectionne == 0) {
        location.reload();
    } else {
        contenu.innerHTML = "";
        axios
            .get(
                "http://127.0.0.1:8000/SR-PADME-Trier Credit/" +
                    elementSelectionne
            )
            .then((response) => {
                console.log(response.data);
                var credits = response.data;
                for (let i = 0; i < credits.length; i++) {
                    axios
                        .get(
                            "http://127.0.0.1:8000/SR-PADME-recupCA/" +
                                credits[i]["identifiantClient"] +
                                "/" +
                                credits[i]["codeAgent"]
                        )
                        .then((response) => {
                            console.log(response.data);
                            var nom = response.data[0];
                            var prenom = response.data[1];
                            var telephone = response.data[2];
                            var nomAgent = response.data[3];
                            if (credits[i]["etatCredit"] == "PERTE") {
                                var etat = `<span class="label label-danger">${credits[i]["etatCredit"]}</span>
                        `;
                            }
                            if (credits[i]["etatCredit"] == "CONTENTIEUX") {
                                var etat = `<span class="label label-info">${credits[i]["etatCredit"]}</span>
                        `;
                            }
                            if (credits[i]["etatCredit"] == "IMMOBILISE") {
                                var etat = `<span class="label label-success">${credits[i]["etatCredit"]}</span>
                        `;
                            }
                            if (credits[i]["etatCredit"] == "SAINT") {
                                var etat = `<span class="label label-warning">${credits[i]["etatCredit"]}</span>
                        `;
                            }
                            if (credits[i]["etatCredit"] == "SOLDE") {
                                var etat = `<span class="label label-primary">${credits[i]["etatCredit"]}</span>
                        `;
                            }
                            if (id_profil != 4) {
                                var agent = nomAgent;
                            }
                            for (const fonct of mes_fonctionnalites) {
                                if (fonct == 2) {
                                    var voirPlus = `<td style="text-align:">
                                <a href="http://127.0.0.1:8000/SR-PADME-Credit-${credits[i]["id"]}">
                                    voir plus
                                </a>
                            </td></tr>`;
                                }
                            }
                            contenu.innerHTML += `
                    <tr style="backgrounndd:rgb(239, 229, 229)">
                                            <td id="col_checkbox${
                                                credits[i]["id"]
                                            }" style="display: none">
                                                <input class="" type="checkbox" name=""
                                                    id="checkbox${
                                                        credits[i]["id"]
                                                    }"
                                                    onclick="epingler_credit(${
                                                        credits[i]["id"]
                                                    })">
                                            </td>
                                            <td id="col_id${
                                                credits[i]["id"]
                                            }" style="display: block">
                                                ${credits[i]["id"]}
                                            </td>
                                            <td>${nom}&nbsp;${prenom}</td>
                                            <td>${telephone}</td>
                                            <td>${
                                                credits[i]["montantAccorde"]
                                            } FCFA</td>
                                            <td>${
                                                credits[i]["dateDeboursement"]
                                            }</td>
                                            <td>${etat}</td>
                                            ${agent ? `<td>${agent}</td>` : ""}
                                            <td>${voirPlus}</td>
                                        </tr>`;
                        })
                        .catch((error) => {
                            // Gérer les erreurs ici
                            console.error(error);
                        });
                }
            })
            .catch((error) => {
                // Gérer les erreurs ici
                console.error(error);
            });
    }
}

function avertirAgent(id_user, id_agent, taux, observation) {
    var imgEvaluation = document.getElementById("imgEvaluation" + id_agent);
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Avertir un agent/" +
                id_user +
                "/" +
                id_agent +
                "/" +
                taux +
                "/" +
                observation
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response.data);
            imgEvaluation.src = "/images/envoyeAvertir.png";
            setTimeout(() => {
                imgEvaluation.src = "/images/correct.png";
            }, 1000);
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
            imgEvaluation.src = "/images/envoyeAvertir.png";
        });
}

function prevoir() {
    var contenu_prevision = document.getElementById("contenu_prevision");
    var inputDatePrev = document.getElementById("inputDatePrev");
    contenu_prevision.innerHTML = `<table class="table table-hover">
    <thead>
    <tr style="color: rgb(84, 174, 84)">
    <th class="text-center">N° CREDIT</th>
                                    <th class="text-center">MONTANT ECHEANCE</th>
                                    <th class="text-center">ETAT ECHEANCE</th>
                                    <th class="text-center">EN SAVOIR PLUS</th>
                                </tr>
                                </thead>
                                <tbody id="tab_prevision">
                                </tbody>
                                </table>`;
    var tab_prevision = document.getElementById("tab_prevision");
    axios
        .get(
            "http://127.0.0.1:8000/SR-PADME-Prevoir un credit/" +
                inputDatePrev.value
        )
        .then((response) => {
            // Gérer la réponse ici
            console.log(response.data);
            var data = response.data;
            if (data.length != 0) {
                for (let i = 0; i < data.length; i++) {
                    tab_prevision.innerHTML += `
                                <tr>
                                    <td class="text-center">${data[i]["codecredit"]}</td>
                                    <td class="text-center">${data[i]["montant_echeance"]} fcfa</td>
                                    <td class="text-center">${data[i]["etat_echeance"]}</td>
                                    <td class="text-center"><a href="http://127.0.0.1:8000/SR-PADME-Credit-${data[i]["codecredit"]}"><i class="fa fa-ellipsis-h"></i></a></td>
                                </tr>
                `;
                }
            } else {
                tab_prevision.innerHTML += `
                                <tr>
                                    <td class="text-center">AUCUN RESULTAT</td>
                                </tr>
                `;
            }
        })
        .catch((error) => {
            // Gérer les erreurs ici
            console.error(error);
        });
}
