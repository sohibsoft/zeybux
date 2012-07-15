function CommandeTemplate(){this.detailReservation='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Marché n°{comNumero}</div><div id="resa-info-commande">Fin des réservations : Le {dateFinReservation} à {heureFinReservation}H{minuteFinReservation} <br/>Marché : Le {dateMarcheDebut} de {heureMarcheDebut}H{minuteMarcheDebut} à {heureMarcheFin}H{minuteMarcheFin}</div><div><span>Solde Actuel : </span><span>{solde} {sigleMonetaire}</span><br/><span>Nouveau Solde : </span><span id="nouveau-solde">{soldeNv}</span> <span id="nouveau-solde-sigle">{sigleMonetaire}</span></div></div><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Ma réservation</div><table><!-- BEGIN categories --><td class="ui-widget-header ui-corner-all com-center">{categories.nom}</td><td colspan="6"></td><!-- BEGIN categories.produits --><tr ><td class="detail-resa-npro">{categories.produits.nproNom}</td><td class="td-edt"><span class="com-cursor-pointer com-btn-header ui-widget-content ui-corner-all btn-info-produit" title="Information sur le produit" id-produit="{categories.produits.proId}"><span class="ui-icon ui-icon-info"></span></span></td><td>{categories.produits.flagType}</td><td class="com-text-align-right detail-resa-qte">{categories.produits.stoQuantite}</td><td class="detail-resa-unite">{categories.produits.proUniteMesure}</td><td class="com-text-align-right detail-resa-prix">{categories.produits.prix}</td><td>{sigleMonetaire}</td></tr><!-- END categories.produits --><!-- END categories --><tr><td class="com-text-align-right" colspan="5">Total : </td><td class="com-text-align-right">{total}</td><td>{sigleMonetaire}</td></tr></table></div><div class="boutons-edition com-widget-header ui-widget ui-widget-header ui-corner-all com-center"><button class="com-btn-edt-multiples ui-state-default ui-corner-all com-button com-center" id="btn-modifier">Modifier</button><button class="ui-state-default ui-corner-all com-button com-center" id="btn-supprimer">Supprimer</button></div></div>';this.supprimerReservationDialog='<div id="dialog-supprimer-reservation" title="Supprimer la réservation"><p>Voulez-vous supprimer la réservation ?</p></div>';this.produitIndisponible='<tr><td colspan="12">{nproNom} n\'est plus disponible.</td></tr>';this.lotUnique='<input type="hidden" id="lot-{IdPdt}" value="{valeur}" /><span>{text}</span>';this.flagAbonnement='<span class="com-widget-header ui-widget ui-widget-header ui-corner-all">Abonnement</span>';this.flagSolidaire='<span class="com-widget-header ui-widget ui-widget-header ui-corner-all">Solidaire</span>';this.modifierReservation='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Marché n°{comNumero}</div><div id="resa-info-commande">Fin des réservations : Le {dateFinReservation} à {heureFinReservation}H{minuteFinReservation} <br/>Marché : Le {dateMarcheDebut} de {heureMarcheDebut}H{minuteMarcheDebut} à {heureMarcheFin}H{minuteMarcheFin} <br/></div><div><span>Solde Actuel : </span><span>{solde} {sigleMonetaire}</span><br/><span>Nouveau Solde : </span><span id="nouveau-solde">{soldeNv}</span> <span id="nouveau-solde-sigle">{sigleMonetaire}</span></div></div><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Ma réservation</div><div><table><!-- BEGIN categories --><tr><td colspan="4" class="ui-widget-header ui-corner-all com-center">{categories.nom}</td><td colspan="7"></td></tr><!-- BEGIN categories.produits -->{categories.produits.detailProduit}<!-- END categories.produits --><!-- END categories --><tr><td colspan="10" class="com-text-align-right">Total : </td><td class="com-text-align-right detail-resa-prix"><span id="total">{total}</span> {sigleMonetaire}</td></tr></table></div></div><div class="com-widget-header ui-widget ui-widget-header ui-corner-all com-center"><button class="com-btn-edt-multiples ui-state-default ui-corner-all com-button com-center" id="btn-annuler">Annuler</button><button class="ui-state-default ui-corner-all com-button com-center" id="btn-valider">Valider</button></div></div>';this.formReservationProduit='<tr class="pdt"><td><input type="checkbox" {checked}/></td><td><span class="ui-helper-hidden"><span class="pdt-id">{proId}</span></span></td><td id="commandes{proId}stoQuantite" >{nproNom}</td><td class="td-edt"><span class="com-cursor-pointer com-btn-header ui-widget-content ui-corner-all btn-info-produit" title="Information sur le produit" id-produit="{proId}"><span class="ui-icon ui-icon-info"></span></span></td><td><select id="lot-{proId}"><!-- BEGIN lot --><option value="{lot.dcomId}">par {lot.dcomTaille} {proUniteMesure}</option><!-- END lot --></select></td><td>à <span id="prix-unitaire-{proId}">{prixUnitaire}</span> {sigleMonetaire}/{proUniteMesure}</td><td>{flagType}</td><td class="ui-helper-hidden resa-pdt-{proId}"><button class="btn-moins">-</button></td><td class="ui-helper-hidden resa-pdt-{proId}"><span id="qte-pdt-{proId}"></span> {proUniteMesure}</td><td class="ui-helper-hidden resa-pdt-{proId}"><button class="btn-plus">+</button></td><td class="ui-helper-hidden resa-pdt-{proId} com-text-align-right"><span id="prix-pdt-{proId}"></span> {sigleMonetaire}</td></tr>';this.formReservationProduitInfo='<tr class="pdt"><td></td><td><span class="ui-helper-hidden"><span class="pdt-id">{proId}</span></span></td><td id="commandes{proId}stoQuantite" >{nproNom}</td><td class="td-edt"><span class="com-cursor-pointer com-btn-header ui-widget-content ui-corner-all btn-info-produit" title="Information sur le produit" id-produit="{proId}"><span class="ui-icon ui-icon-info"></span></span></td><td><select id="lot-{proId}"><!-- BEGIN lot --><option value="{lot.dcomId}">par {lot.dcomTaille} {proUniteMesure}</option><!-- END lot --></select></td><td>à <span id="prix-unitaire-{proId}">{prixUnitaire}</span> {sigleMonetaire}/{proUniteMesure}</td><td>{flagType}</td><td></td><td></td><td></td><td></td></tr>';this.formReservationProduitAbonnementInfo='<tr class="pdt"><td></td><td><span class="ui-helper-hidden"><span class="pdt-id">{proId}</span></span></td><td id="commandes{proId}stoQuantite" >{nproNom}</td><td class="td-edt"><span class="com-cursor-pointer com-btn-header ui-widget-content ui-corner-all btn-info-produit" title="Information sur le produit" id-produit="{proId}"><span class="ui-icon ui-icon-info"></span></span></td><td><select id="lot-{proId}" disabled="disabled"><!-- BEGIN lot --><option value="{lot.dcomId}">par {lot.dcomTaille} {proUniteMesure}</option><!-- END lot --></select></td><td>à <span id="prix-unitaire-{proId}">{prixUnitaire}</span> {sigleMonetaire}/{proUniteMesure}</td><td>{flagType}</td><td></td><td>{stoQuantiteReservation} {proUniteMesure}</td><td></td><td class="com-text-align-right">{prixReservation} {sigleMonetaire}</td></tr>';this.confirmationReservationCommande='<div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><table><!-- BEGIN produit --><tr><td>{produit.NOM}</td><td>{produit.QUANTITE}</td><td>{produit.PRIX}</td></tr><!-- END produit --><tr><td></td><td>Total : </td><td>{TOTAL_COMMANDE}</td></tr></table><div class="ui-helper-hidden"><form id="form-confirmation-reservation-commande"><table><tr><td><input type="text" name="id_commande" value="{ID_COMMANDE}" /></td></tr><!-- BEGIN info_produit --><tr><td><input type="text" name="id_pdt[]" value="{info_produit.IDPDT}" /></td><td><input type="text" name="id_lot[]" value="{info_produit.IDLOT}" /></td><td><input type="text" name="qte[]" value="{info_produit.QTE}" /></td></tr><!-- END info_produit --></table></form></div></div>';this.reservationOk='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Réservation</div><div class="com-widget-content"><p class="com-msg-confirm-icon"><span class="com-float-left ui-icon ui-icon-check"></span>Réservation effectuée avec succés.</p></div></div></div>';this.MonMarcheDebut='<div id="contenu">';this.listeMarche='<div id="liste_commande_int"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Les Marchés</div><table class="com-table"><tr class="ui-widget ui-widget-header"><th class="com-table-th-debut com-center" colspan="2">N°</th><th class="com-table-th-med">Date de cloture des Réservations</th><th class="com-table-th-med">Marché</th>	<th class="com-table-th-fin"></th></tr><!-- BEGIN marche --><tr ><td class="com-table-td-debut com-text-align-right lst-resa-th-num">{marche.numero}</td><td class="com-table-td-med lst-resa-td-nom">{marche.nom}</td><td class="com-table-td-med">Le {marche.jourFinReservation} {marche.dateFinReservation} à {marche.heureFinReservation}H{marche.minuteFinReservation}</td><td class="com-table-td-med">Le {marche.jourMarcheDebut} {marche.dateMarcheDebut} de {marche.heureMarcheDebut}H{marche.minuteMarcheDebut} à {marche.heureMarcheFin}H{marche.minuteMarcheFin}</td><td class="com-table-td-fin lst-resa-btn-commander"><button class="btn-commander ui-state-default ui-corner-all com-button com-center" id="{marche.id}">Réservation</button></td></tr><!-- END marche --></table></div></div></div>';this.listeMarcheVide='<div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Les Marchés</div><p id="texte-liste-vide">Aucun Marché en cours.</p></div>';this.MonMarcheFin="</div>";this.listeAchats='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Mes Achats</div><table class="com-table"><tr class="ui-widget ui-widget-header"><th class="com-table-th-debut com-center" colspan="2">N°</th><th class="com-table-th-med">Marché</th>	<th class="com-table-th-fin liste-adh-th-solde"></th></tr><!-- BEGIN achat --><tr class="com-cursor-pointer ligne-achat" id={achat.idCommande} ><td class="com-table-td-debut com-underline-hover lst-resa-th-num com-text-align-right">{achat.numero}</td><td class="com-table-td-med com-underline-hover lst-resa-td-nom">{achat.nom}</td><td class="com-table-td-med com-underline-hover">Le {achat.jourMarcheDebut} {achat.dateMarcheDebut}</td><td class="com-table-td-fin com-underline-hover liste-adh-td-solde"><span class="com-cursor-pointer com-btn-header-multiples ui-widget-content ui-corner-all"><span class="ui-icon ui-icon-triangle-1-e"></span></span></td></tr><!-- END achat --></table></div></div>';this.listeAchatVide='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Mes Achats</div><p id="texte-liste-vide">Aucun achat effectué.</p></div></div>';this.detailAchat='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Marché n°{comNumero} : {totalMarche} {sigleMonetaire}</div></div><!-- BEGIN achats --><div class="achat com-widget-window ui-widget ui-widget-content ui-corner-all" id="achat-{achats.idAchat}"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Achat <span class="achat-id ui-helper-hidden">{achats.idAchat}</span></div><table><!-- BEGIN achats.categories --><tr><td class="ui-widget-header ui-corner-all com-center">{achats.categories.nom}</td></tr><!-- BEGIN achats.categories.achat --><tr><td class="detail-achat-npro">{achats.categories.achat.nproNom}</td><td class="com-text-align-right detail-achat-qte">{achats.categories.achat.stoQuantite}</td><td class="detail-achat-unite">{achats.categories.achat.proUniteMesure}</td><td class="com-text-align-right detail-achat-prix">{achats.categories.achat.prix} {sigleMonetaire}</td></tr><!-- END achats.categories.achat --><!-- END achats.categories --><tr><td class="com-text-align-right" colspan="3">Total : </td><td class="com-text-align-right detail-achat-prix">{achats.total} {sigleMonetaire}</td></tr></table></div><!-- END achats --><!-- BEGIN achatsSolidaire --><div class="achatSolidaire com-widget-window ui-widget ui-widget-content ui-corner-all" id="achat-{achatsSolidaire.idAchat}"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Achat Solidaire <span class="achat-id ui-helper-hidden">{achatsSolidaire.idAchat}</span></div><table><!-- BEGIN achatsSolidaire.categories --><tr><td class="ui-widget-header ui-corner-all com-center">{achatsSolidaire.categories.nom}</td></tr><!-- BEGIN achatsSolidaire.categories.achat --><tr><td class="detail-achat-npro">{achatsSolidaire.categories.achat.nproNom}</td><td class="com-text-align-right detail-achat-qte">{achatsSolidaire.categories.achat.stoQuantite}</td><td class="detail-achat-unite">{achatsSolidaire.categories.achat.proUniteMesure}</td><td class="com-text-align-right detail-achat-prix">{achatsSolidaire.categories.achat.prix} {sigleMonetaire}</td></tr><!-- END achatsSolidaire.categories.achat --><!-- END achatsSolidaire.categories --><tr><td class="com-text-align-right" colspan="3">Total : </td><td class="com-text-align-right detail-achat-prix">{achatsSolidaire.totalSolidaire} {sigleMonetaire}</td></tr></table></div><!-- END achatsSolidaire --></div>';this.dialogInfoProduit='<div id="dialog-info-pro" title="Produit"><div id="information-detail-producteur"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Informations</div><div class="com-widget-content"><table class="com-table-form"><tr><th class="com-table-form-th">Nom : </th><td class="com-table-form-td">{nom}</td></tr><tr><th class="com-table-form-th">Catégorie : </th><td class="com-table-form-td">{cproNom}</td></tr><tr><th class="com-table-form-th">Description : </th><td class="com-table-form-td">{description}</td></tr></table></div></div><div id="pro-prdt"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Producteurs</div><table class="com-table-form"><!-- BEGIN producteurs --><tr><td class="com-table-form-td">{producteurs.prdtPrenom} {producteurs.prdtNom}</td></tr><!-- END producteurs --></table></div><div id="pro-car"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Caractéristiques</div><table class="com-table-form"><!-- BEGIN caracteristiques --><tr><td class="com-table-form-td">{caracteristiques.carNom}</td></tr><!-- END caracteristiques --></table></div></div>'}function MesAchatsVue(a){this.construct=function(b){$.history({vue:function(){MesAchatsVue(b)}});var c=this;$.post("./index.php?m=Commande&v=MesAchats",function(d){Infobulle.init();if(d){if(d.valid){if(b&&b.vr){Infobulle.generer(b.vr,"")}c.afficher(d);gCommunVue.majMenu("Commande","MesAchats")}else{Infobulle.generer(d,"")}}},"json")};this.afficher=function(d){Infobulle.init();var c=this;var e=new CommandeTemplate();var b={achat:[]};$(d.achats).each(function(){if(this.comNumero!=null){var f={};f.numero=this.comNumero;f.dateMarcheDebut=this.comDateMarcheDebut.extractDbDate().dateDbToFr();f.idCommande='"'+this.comId+'"';f.jourMarcheDebut=jourSem(this.comDateMarcheDebut.extractDbDate());f.nom=this.comNom;b.achat.push(f)}});if(b.achat.length>0){$("#contenu").replaceWith(c.affect($(e.listeAchats.template(b))))}else{$("#contenu").replaceWith(c.affect($(e.listeAchatVide)))}};this.affect=function(b){b=this.affectVisualiser(b);b=gCommunVue.comHoverBtn(b);return b};this.affectVisualiser=function(b){b.find(".ligne-achat").click(function(){MesAchatsDetailVue({id_commande:$(this).attr("id")})});return b};this.construct(a)}function MesAchatsDetailVue(a){this.infoCommande=new Object();this.pdtCommande=new Array();this.achats=[];this.achatsSolidaire=[];this.stockSolidaire=[];this.pParam={};this.construct=function(b){$.history({vue:function(){MesAchatsDetailVue(b)}});var c=this;this.pParam=b;b.fonction="afficher";$.post("./index.php?m=Commande&v=MesAchatsDetail","pParam="+$.toJSON(b),function(d){Infobulle.init();if(d){if(d.valid){if(b&&b.vr){Infobulle.generer(b.vr,"")}c.pdtCommande=d.marche.produits;c.infoCommande.comNumero=d.marche.numero;c.stockSolidaire=d.stockSolidaire;c.afficher(d)}else{Infobulle.generer(d,"")}}},"json")};this.afficher=function(c){var d=this;var f=new CommandeTemplate();var e=f.detailAchat;var b={};b.comNumero=this.infoCommande.comNumero;b.sigleMonetaire=gSigleMonetaire;b.achats=[];b.achatsSolidaire=[];b.totalMarche=0;$(c.achats).each(function(){var g=this;var j=[];var i=false;$.each(d.pdtCommande,function(){if(this.id){var l=false;var m=this.id;var k={};k.id=this.id;k.nproNom=this.nom;k.proUniteMesure=this.unite;k.prix=0;k.stoQuantite=0;$.each(this.lots,function(){if(this.id){var n=this.id;$(g.detailAchat).each(function(){if(this.idDetailCommande==n){k.stoQuantite=this.quantite*-1;k.prix=this.montant*-1;i=true;l=true}})}});k.stoQuantite=k.stoQuantite.nombreFormate(2,","," ");k.prix=k.prix.nombreFormate(2,","," ");if(l){if(!j[this.idCategorie]){j[this.idCategorie]={nom:this.cproNom,achat:[]}}j[this.idCategorie].achat.push(k)}}});if(i){var h={categories:j,idAchat:this.id.idAchat,total:(this.total*-1).nombreFormate(2,","," ")};b.achats.push(h);b.totalMarche+=this.total*-1}});$(c.achats).each(function(){var g=this;var j=[];var h=false;$.each(d.pdtCommande,function(){if(this.id){var l=false;var n=this;var m=this.id;var k={};k.id=this.id;k.nproNom=this.nom;k.proUniteMesure=this.unite;k.prix=0;k.stoQuantite=0;$(c.stockSolidaire).each(function(){if(k.id==this.proId){$.each(n.lots,function(){if(this.id){var o=this.id;$(g.detailAchatSolidaire).each(function(){if(this.idDetailCommande==o){k.stoQuantite=this.quantite*-1;k.prix=this.montant*-1;h=true;l=true}})}})}});if(l){k.stoQuantite=k.stoQuantite.nombreFormate(2,","," ");k.prix=k.prix.nombreFormate(2,","," ");if(!j[this.idCategorie]){j[this.idCategorie]={nom:this.cproNom,achat:[]}}j[this.idCategorie].achat.push(k)}}});if(h){var i={categories:j,idAchat:this.id.idAchat,totalSolidaire:(this.totalSolidaire*-1).nombreFormate(2,","," ")};b.achatsSolidaire.push(i);b.totalMarche+=this.totalSolidaire*-1}});b.totalMarche=b.totalMarche.nombreFormate(2,","," ");$("#contenu").replaceWith(d.affect($(e.template(b))))};this.affect=function(b){return b};this.construct(a)}function ReservationMarcheVue(a){this.infoCommande=new Object();this.pdtCommande=new Array();this.reservation=new Array();this.reservationModif=new Array();this.solde=0;this.soldeNv=0;this.mPremiereReservation=true;this.mAbonnementSurReservation=false;this.construct=function(b){var c=this;b.fonction="afficher";$.history({vue:function(){ReservationMarcheVue(b)}});$.post("./index.php?m=Commande&v=ReservationMarche","pParam="+$.toJSON(b),function(d){Infobulle.init();if(d){if(d.valid){if(b&&b.vr){Infobulle.generer(b.vr,"")}c.solde=d.adherent.cptSolde;c.soldeNv=d.adherent.cptSolde;c.infoCommande.comId=d.marche.id;c.infoCommande.comNumero=d.marche.numero;c.infoCommande.comNom=d.marche.nom;c.infoCommande.comDescription=d.marche.description;c.infoCommande.dateTimeFinReservation=d.marche.dateFinReservation;c.infoCommande.dateFinReservation=d.marche.dateFinReservation.extractDbDate().dateDbToFr();c.infoCommande.heureFinReservation=d.marche.dateFinReservation.extractDbHeure();c.infoCommande.minuteFinReservation=d.marche.dateFinReservation.extractDbMinute();c.infoCommande.dateMarcheDebut=d.marche.dateMarcheDebut.extractDbDate().dateDbToFr();c.infoCommande.heureMarcheDebut=d.marche.dateMarcheDebut.extractDbHeure();c.infoCommande.minuteMarcheDebut=d.marche.dateMarcheDebut.extractDbMinute();c.infoCommande.heureMarcheFin=d.marche.dateMarcheFin.extractDbHeure();c.infoCommande.minuteMarcheFin=d.marche.dateMarcheFin.extractDbMinute();c.infoCommande.comArchive=d.marche.archive;c.pdtCommande=d.marche.produits;$.each(c.pdtCommande,function(){if(this.id){var e=this.id;$.each(this.lots,function(){if(this.id){var f=this.id;$(d.reservation).each(function(){if(this.idDetailCommande==f){this.stoQuantite=this.quantite*-1;this.dcomId=this.idDetailCommande;this.proId=e;c.reservation[e]=this}})}})}});if(d.reservation.length>0){c.mPremiereReservation=false;c.afficher(1)}else{c.afficher(2)}}else{Infobulle.generer(d,"")}}},"json")};this.afficher=function(b){if(b==1){this.afficherDetailReservation()}else{this.afficherModifier()}};this.afficherDetailReservation=function(){var d=this;var f=new CommandeTemplate();var e=f.detailReservation;var b=new Object();b.sigleMonetaire=gSigleMonetaire;b.solde=this.solde.nombreFormate(2,","," ");b.comNumero=this.infoCommande.comNumero;b.dateFinReservation=this.infoCommande.dateFinReservation;b.heureFinReservation=this.infoCommande.heureFinReservation;b.minuteFinReservation=this.infoCommande.minuteFinReservation;b.dateMarcheDebut=this.infoCommande.dateMarcheDebut;b.heureMarcheDebut=this.infoCommande.heureMarcheDebut;b.minuteMarcheDebut=this.infoCommande.minuteMarcheDebut;b.heureMarcheFin=this.infoCommande.heureMarcheFin;b.minuteMarcheFin=this.infoCommande.minuteMarcheFin;b.categories=[];var c=0;$.each(this.pdtCommande,function(){var h=this;if(d.reservation[this.id]){var g=new Object;g.proId=h.id;g.nproNom=this.nom;g.stoQuantite=parseFloat(d.reservation[this.id].stoQuantite);g.proUniteMesure=this.unite;g.prix=0;var i=d.reservation[this.id].dcomId;$.each(this.lots,function(){if(this.id==i){g.prix=(g.stoQuantite/this.taille)*this.prix}});c+=g.prix;g.stoQuantite=g.stoQuantite.nombreFormate(2,","," ");g.prix=g.prix.nombreFormate(2,","," ");if(!b.categories[this.idCategorie]){b.categories[this.idCategorie]={nom:this.cproNom,produits:[]}}g.flagType="";if(h.type==2){g.flagType=f.flagAbonnement;d.mAbonnementSurReservation=true}b.categories[this.idCategorie].produits.push(g)}});b.total=parseFloat(c).nombreFormate(2,","," ");this.soldeNv=this.solde-c;b.soldeNv=this.soldeNv.nombreFormate(2,","," ");$("#contenu").replaceWith(d.affect($(e.template(b))))};this.afficherModifier=function(){if(!dateTimeEstPLusGrandeEgale(this.infoCommande.dateTimeFinReservation,getDateTimeAujourdhuiDb(),"db")){var h=new TemplateVR();h.valid=false;h.log.valid=false;var b=new VRerreur();b.code=ERR_221_CODE;b.message=ERR_221_MSG;h.log.erreurs.push(b);Infobulle.generer(h,"")}else{var e=this;var g=new CommandeTemplate();var f=g.modifierReservation;var c={};c.sigleMonetaire=gSigleMonetaire;c.solde=this.solde.nombreFormate(2,","," ");c.soldeNv=this.soldeNv.nombreFormate(2,","," ");c.comNumero=this.infoCommande.comNumero;c.dateFinReservation=this.infoCommande.dateFinReservation;c.heureFinReservation=this.infoCommande.heureFinReservation;c.minuteFinReservation=this.infoCommande.minuteFinReservation;c.dateMarcheDebut=this.infoCommande.dateMarcheDebut;c.heureMarcheDebut=this.infoCommande.heureMarcheDebut;c.minuteMarcheDebut=this.infoCommande.minuteMarcheDebut;c.heureMarcheFin=this.infoCommande.heureMarcheFin;c.minuteMarcheFin=this.infoCommande.minuteMarcheFin;c.categories=[];var d=0;$.each(this.pdtCommande,function(){if(this.id){var k={};k.proId=this.id;k.nproNom=this.nom;k.proUniteMesure=this.unite;k.proMaxProduitCommande=parseFloat(this.qteMaxCommande);k.flagType="";if(e.reservation[this.id]){k.stock=parseFloat(this.stockReservation)+parseFloat(e.reservation[this.id].stoQuantite)}else{k.stock=parseFloat(this.stockReservation)}k.lot=new Array();var o=false;if(parseFloat(this.qteMaxCommande)==-1&&parseFloat(this.stockInitial)==-1){o=true}else{if(parseFloat(this.stockInitial)==-1){k.max=k.proMaxProduitCommande}else{if(parseFloat(this.qteMaxCommande)==-1){k.max=k.stock}else{if(parseFloat(k.proMaxProduitCommande)<parseFloat(k.stock)){k.max=k.proMaxProduitCommande}else{k.max=k.stock}}}}var m=0;var l=-1;var n=-1;k.stoQuantiteReservation=0;k.prixReservation=0;$.each(this.lots,function(){if(this.id){if(o||(!o&&parseFloat(this.taille)<=k.max)){var i={};i.dcomId=this.id;i.dcomTaille=parseFloat(this.taille).nombreFormate(2,","," ");i.dcomPrix=parseFloat(this.prix).nombreFormate(2,","," ");i.prixReservation=parseFloat(this.prix);i.stoQuantiteReservation=parseFloat(this.taille);if(e.reservation[k.proId]&&(e.reservation[k.proId].dcomId==this.id)){i.stoQuantiteReservation=parseFloat(e.reservation[k.proId].stoQuantite);i.prixReservation=(i.stoQuantiteReservation/this.taille)*this.prix;d+=i.prixReservation;l=this.id;i.checked='checked="checked"';k.stoQuantiteReservation=i.stoQuantiteReservation.nombreFormate(2,","," ");k.prixReservation=i.prixReservation.nombreFormate(2,","," ")}if(k.prixReservation==0){k.stoQuantiteReservation=i.stoQuantiteReservation.nombreFormate(2,","," ");k.prixReservation=i.prixReservation.nombreFormate(2,","," ")}k.prixUnitaire=(i.prixReservation/i.stoQuantiteReservation).nombreFormate(2,","," ");k.lot.push(i)}}});c.total=parseFloat(d).nombreFormate(2,","," ");if(l!=-1){k.checked='checked="checked"'}else{k.checked=""}if(!c.categories[this.idCategorie]){c.categories[this.idCategorie]={nom:this.cproNom,produits:[]}}k.sigleMonetaire=gSigleMonetaire;var j=true;if(this.type==0){if(k.lot.length==0){k.detailProduit=g.produitIndisponible.template(k)}else{k.detailProduit=g.formReservationProduit.template(k)}}else{if(this.type==1){k.flagType=g.flagSolidaire;k.detailProduit=g.formReservationProduitInfo.template(k)}else{if(this.type==2){k.flagType=g.flagAbonnement;if(e.reservation[this.id]){k.detailProduit=g.formReservationProduitAbonnementInfo.template(k)}else{if(k.lot.length==0){j=false}else{k.detailProduit=g.formReservationProduit.template(k)}}}}}if(j){c.categories[this.idCategorie].produits.push(k)}}});this.reservationModif=[];$(this.reservation).each(function(){if(this.proId){e.reservationModif[this.proId]={proId:this.proId,dcomId:this.dcomId,stoQuantite:this.stoQuantite}}});$("#contenu").replaceWith(e.affectModifier($(f.template(c))));this.majNouveauSolde()}};this.affect=function(b){b=this.affectDroitEdition(b);b=this.affectModifierReservation(b);b=this.affectSupprimerReservation(b);b=this.affectNvSolde(b);b=this.affectInfoProduit(b);b=gCommunVue.comHoverBtn(b);return b};this.affectInfoProduit=function(b){var c=this;b.find(".btn-info-produit").click(function(){var e=$(this).attr("id-produit");var d={id:e,fonction:"detailProduit"};$.post("./index.php?m=Commande&v=ReservationMarche","pParam="+$.toJSON(d),function(g){Infobulle.init();if(g){if(g.valid){var i=new CommandeTemplate();var h=i.dialogInfoProduit;g.produit.sigleMonetaire=gSigleMonetaire;var f=$(h.template(g.produit));if(g.produit.producteurs.length>0&&g.produit.producteurs[0].nPrdtIdNomProduit==null){f.find("#pro-prdt").remove()}if(g.produit.caracteristiques.length>0&&g.produit.caracteristiques[0].carProIdNomProduit==null){f.find("#pro-car").remove()}$(f).dialog({autoOpen:true,modal:true,draggable:true,resizable:false,width:600,close:function(j,k){$(this).remove();Infobulle.init()}})}else{Infobulle.generer(g,"")}}},"json")});return b};this.affectDroitEdition=function(b){if(!dateTimeEstPLusGrandeEgale(this.infoCommande.dateTimeFinReservation,getDateTimeAujourdhuiDb(),"db")){b.find(".boutons-edition").hide()}if(this.mAbonnementSurReservation){b.find("#btn-supprimer").remove()}return b};this.affectModifier=function(b){b=this.affectBtnQte(b);b=this.affectChangementLot(b);b=this.affectChangementProduit(b);b=this.preparerAffichageModifier(b);b=this.affectValiderReservation(b);b=this.affectAnnulerReservation(b);b=this.supprimerSelect(b);b=gCommunVue.comHoverBtn(b);b=this.affectInitLot(b);b=this.affectInfoProduit(b);return b};this.affectNvSolde=function(b){if(this.soldeNv<=0){b.find("#nouveau-solde, #nouveau-solde-sigle").addClass("com-nombre-negatif")}return b};this.affectBtnQte=function(b){var c=this;b.find(".btn-plus").click(function(){Infobulle.init();var d=$(this).parent().parent().find(".pdt-id").text();c.nouvelleQuantite(d,$(this).parent().parent().find("#lot-"+d).val(),1)});b.find(".btn-moins").click(function(){Infobulle.init();var d=$(this).parent().parent().find(".pdt-id").text();c.nouvelleQuantite(d,$(this).parent().parent().find("#lot-"+d).val(),-1)});return b};this.affectChangementLot=function(b){var c=this;b.find(".pdt select").change(function(){Infobulle.init();c.changerLot($(this).parent().parent().find(".pdt-id").text(),$(this).val())});return b};this.affectChangementProduit=function(b){var c=this;b.find(".pdt :checkbox").click(function(){Infobulle.init();c.changerProduit($(this).parent().parent().find(".pdt-id").text())});return b};this.affectValiderReservation=function(b){var c=this;b.find("#btn-valider").click(function(){c.validerReservation()});return b};this.affectAnnulerReservation=function(b){var c=this;b.find("#btn-annuler").click(function(){if(c.mPremiereReservation){MonMarcheVue()}else{c.afficherDetailReservation()}});return b};this.affectModifierReservation=function(b){var c=this;b.find("#btn-modifier").click(function(){c.afficherModifier()});return b};this.affectInitLot=function(b){var c=this;b.find(".pdt select").each(function(){var d=$(this).parent().parent().find(".pdt-id").text();var g=$(this).val();if(c.pdtCommande[d]&&c.pdtCommande[d].lots[g]){var e=c.pdtCommande[d].lots[g].prix;var h=c.pdtCommande[d].lots[g].taille;var f=(e/h).nombreFormate(2,","," ");$(b).find("#prix-unitaire-"+d).text(f)}});return b};this.nouvelleQuantite=function(g,n,b){var j=parseFloat(this.pdtCommande[g].qteMaxCommande);if(this.reservation[g]){var l=parseFloat(this.pdtCommande[g].stockReservation)+parseFloat(this.reservation[g].stoQuantite)}else{var l=parseFloat(this.pdtCommande[g].stockReservation)}var h=false;if(parseFloat(this.pdtCommande[g].qteMaxCommande)==-1&&parseFloat(this.pdtCommande[g].stockInitial)==-1){h=true}else{if(parseFloat(this.pdtCommande[g].stockInitial)==-1){j=this.pdtCommande[g].qteMaxCommande}else{if(parseFloat(this.pdtCommande[g].qteMaxCommande)==-1){j=l}else{if(parseFloat(l)<parseFloat(j)){j=l}}}}var o=this.pdtCommande[g].lots[n].taille;var m=this.pdtCommande[g].lots[n].prix;var e=0;if(this.reservationModif[g]&&(this.reservationModif[g].dcomId==n)){e=parseFloat(this.reservationModif[g].stoQuantite)/parseFloat(o)}e+=b;var c=0;c=e*o;if((h&&c>0)||(!h&&c>0&&c<=j)){var f=0;f=(e*m).toFixed(2);this.reservationModif[g].stoQuantite=c;$("#qte-pdt-"+g).text(parseFloat(c).nombreFormate(2,","," "));$("#prix-pdt-"+g).text(parseFloat(f).nombreFormate(2,","," "));this.majTotal()}else{if(c>j&&j!=-1){var i=new TemplateVR();i.valid=false;i.commandes=[];var d=new ReservationCommandeVR();d.valid=false;d.stoQuantite.valid=false;var k=new VRerreur();k.code=ERR_304_CODE;k.message=ERR_304_MSG;d.stoQuantite.erreurs.push(k);i.commandes[g]=d;Infobulle.generer(i,"")}}};this.changerLot=function(b,c){var d=this.pdtCommande[b].lots[c].prix;var f=this.pdtCommande[b].lots[c].taille;var e=(d/f).nombreFormate(2,","," ");$("#prix-unitaire-"+b).text(e);if(this.reservationModif[b]){this.reservationModif[b].dcomId=c;this.reservationModif[b].stoQuantite=f;$("#qte-pdt-"+b).text(f.nombreFormate(2,","," "));$("#prix-pdt-"+b).text(d.nombreFormate(2,","," "))}this.majTotal()};this.changerProduit=function(b){if(this.reservationModif[b]!=null){$(".resa-pdt-"+b).hide();$("#qte-pdt-"+b).text("");$("#prix-pdt-"+b).text("");this.reservationModif[b]=null}else{var e=$("#lot-"+b).val();var f=this.pdtCommande[b].lots[e].taille;var d={};d.comId=this.infoCommande.comId;d.proId=b;d.dcomId=e;d.stoQuantite=f;this.reservationModif[b]=d;$("#qte-pdt-"+b).text(f.nombreFormate(2,","," "));var c=this.pdtCommande[b].lots[e].prix.nombreFormate(2,","," ");$("#prix-pdt-"+b).text(c);$(".resa-pdt-"+b).show()}this.majTotal()};this.majTotal=function(){var b=this.calculTotal();$("#total").text(b.nombreFormate(2,","," "));this.soldeNv=this.solde-b;this.majNouveauSolde();$("#nouveau-solde").text(this.soldeNv.nombreFormate(2,","," "))};this.majNouveauSolde=function(){if(this.soldeNv<=0){$("#nouveau-solde, #nouveau-solde-sigle").addClass("com-nombre-negatif")}else{$("#nouveau-solde, #nouveau-solde-sigle").removeClass("com-nombre-negatif")}};this.calculTotal=function(){var c=this;var b=0;$(this.reservationModif).each(function(){var d=this;if(d.stoQuantite){if(c.pdtCommande[d.proId]){$.each(c.pdtCommande[d.proId].lots,function(){if(d.dcomId==this.id){b+=(d.stoQuantite/this.taille)*this.prix}})}}});return b};this.preparerAffichageModifier=function(b){var c=this;$(b).find(".pdt").each(function(){var d=$(this).find(".pdt-id").text();if(c.reservation[d]!=null){var g=c.reservation[d];var f=g.dcomId;var h=g.stoQuantite;$(b).find("#qte-pdt-"+d).text(h.nombreFormate(2,","," "));var e=((c.pdtCommande[d].lots[f].prix*g.stoQuantite)/c.pdtCommande[d].lots[f].taille).nombreFormate(2,","," ");$(b).find("#prix-pdt-"+d).text(e);$(b).find("#lot-"+d).selectOptions(f);$(b).find(".resa-pdt-"+d).css("display","table-cell")}});return b};this.validerReservation=function(){var e=this;Infobulle.init();var c=new ListeReservationCommandeVO();var f=0;$(this.reservationModif).each(function(){if(this.stoQuantite){var h=new ReservationCommandeVO();h.stoQuantite=this.stoQuantite*-1;h.stoIdDetailCommande=this.dcomId;c.detailReservation.push(h);f++}});if(f>0){var d=new ListeReservationCommandeValid();var g=d.validAjout(c);if(!g.valid){Infobulle.generer(g,"")}else{c.fonction="modifier";$.post("./index.php?m=Commande&v=ReservationMarche","pParam="+$.toJSON(c),function(i){Infobulle.init();if(i){if(i.valid){e.reservation=[];$(e.reservationModif).each(function(){if(this.proId){e.reservation[this.proId]={proId:this.proId,dcomId:this.dcomId,stoQuantite:this.stoQuantite}}});if(e.mPremiereReservation){e.mPremiereReservation=false;var j=new TemplateVR();j.valid=false;j.log.valid=false;var h=new VRerreur();h.code=ERR_350_CODE;h.message=ERR_350_MSG;j.log.erreurs.push(h);Infobulle.generer(j,"")}else{var j=new TemplateVR();j.valid=false;j.log.valid=false;var h=new VRerreur();h.code=ERR_337_CODE;h.message=ERR_337_MSG;j.log.erreurs.push(h);Infobulle.generer(j,"")}e.afficher(1)}else{Infobulle.generer(i,"")}}},"json")}}else{var g=new TemplateVR();g.valid=false;g.log.valid=false;var b=new VRerreur();b.code=ERR_207_CODE;b.message=ERR_207_MSG;g.log.erreurs.push(b);Infobulle.generer(g,"")}};this.affectSupprimerReservation=function(b){var c=this;b.find("#btn-supprimer").click(function(){var e=new CommandeTemplate();var d=e.supprimerReservationDialog;$(d).dialog({autoOpen:true,modal:true,draggable:false,resizable:false,width:600,buttons:{Supprimer:function(){var f={id_commande:c.infoCommande.comId,fonction:"supprimer"};var g=this;$.post("./index.php?m=Commande&v=ReservationMarche","pParam="+$.toJSON(f),function(i){Infobulle.init();if(i){if(i.valid){var j=new TemplateVR();j.valid=false;j.log.valid=false;var h=new VRerreur();h.code=ERR_303_CODE;h.message=ERR_303_MSG;j.log.erreurs.push(h);MonMarcheVue({vr:j});$(g).dialog("close")}else{Infobulle.generer(i,"")}}},"json")},Annuler:function(){$(this).dialog("close")}},close:function(f,g){$(this).remove()}})});return b};this.supprimerSelect=function(b){b.find(".pdt select").each(function(){if($(this).find("option").size()==1){var e=new CommandeTemplate();var d=e.lotUnique;var c={};c.IdPdt=$(this).parent().parent().find(".pdt-id").text();c.valeur=$(this).val();c.text=$(this).text();$(this).replaceWith(d.template(c))}});return b};this.construct(a)}function MonMarcheVue(a){this.construct=function(b){$.history({vue:function(){MonMarcheVue(b)}});var c=this;$.post("./index.php?m=Commande&v=MonMarche",function(d){Infobulle.init();if(d){if(d.valid){if(b&&b.vr){Infobulle.generer(b.vr,"")}c.afficher(d);gCommunVue.majMenu("Commande","MonMarche")}else{Infobulle.generer(d,"")}}},"json")};this.afficher=function(e){var d=this;var f=new CommandeTemplate();var b=f.MonMarcheDebut;if(e.marches[0]&&e.marches[0].dateFinReservation!=null){var c=new Object;c.marche=new Array();$(e.marches).each(function(){var g=new Object();g.id=this.id;g.nom=this.nom;g.numero=this.numero;g.jourFinReservation=jourSem(this.dateFinReservation.extractDbDate());g.dateFinReservation=this.dateFinReservation.extractDbDate().dateDbToFr();g.heureFinReservation=this.dateFinReservation.extractDbHeure();g.minuteFinReservation=this.dateFinReservation.extractDbMinute();g.jourMarcheDebut=jourSem(this.dateMarcheDebut.extractDbDate());g.dateMarcheDebut=this.dateMarcheDebut.extractDbDate().dateDbToFr();g.heureMarcheDebut=this.dateMarcheDebut.extractDbHeure();g.minuteMarcheDebut=this.dateMarcheDebut.extractDbMinute();g.heureMarcheFin=this.dateMarcheFin.extractDbHeure();g.minuteMarcheFin=this.dateMarcheFin.extractDbMinute();c.marche.push(g)});b+=f.listeMarche.template(c)}else{b+=f.listeMarcheVide}b+=f.MonMarcheFin;$("#contenu").replaceWith(d.affect($(b)))};this.affect=function(b){b=this.affectBtnCommander(b);b=this.affectVisualiser(b);b=gCommunVue.comHoverBtn(b);return b};this.affectBtnCommander=function(b){b.find(".btn-commander").click(function(){var c={id_commande:$(this).attr("id")};ReservationMarcheVue(c)});return b};this.affectVisualiser=function(b){b.find(".visualiser-reservation").click(function(){AfficherReservationVue({id_commande:$(this).attr("id")})});return b};this.construct(a)};