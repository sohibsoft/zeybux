function RechargementCompteTemplate(){this.listeAdherent='<div id="contenu"><div id="liste_adherent_solde_int"><div class="com-widget-window ui-widget ui-widget-content ui-widget-content-transparent ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Les Adhérents</div><div id="liste-adh-recherche" class="recherche com-widget-header ui-widget ui-widget-header ui-corner-all"><form id="filter-form"><div><span class="conteneur-icon com-float-left ui-widget-content ui-corner-left" title="Chercher"><span class="ui-icon ui-icon-search"></span></span><input class="com-input-text ui-widget-content ui-corner-right" name="filter" id="filter" value="" maxlength="30" size="15" type="text" /></div></form></div><table class="com-table"><thead><tr class="ui-widget ui-widget-header"><th class="com-table-th-debut com-underline-hover liste-adh-th-num com-cursor-pointer"><span class="ui-icon span-icon"></span>N°</th><th class="com-table-th-med com-underline-hover liste-adh-th-nom com-cursor-pointer"><span class="ui-icon span-icon"></span>Nom</th><th class="com-table-th-med com-underline-hover liste-adh-th-nom com-cursor-pointer"><span class="ui-icon span-icon"></span>Prénom</th><th class="com-table-th-med com-underline-hover com-cursor-pointer"><span class="ui-icon span-icon"></span>Courriel</th><th class="com-table-th-fin liste-adh-th-solde">Solde</th></tr></thead><tbody><!-- BEGIN listeAdherent --><tr class="com-cursor-pointer compte-ligne" id-adherent="{listeAdherent.adhId}"><td class="com-table-td-debut com-underline-hover"><span class="ui-helper-hidden">{listeAdherent.adhIdTri}</span>{listeAdherent.adhNumero}</td><td class="com-table-td-med com-underline-hover">{listeAdherent.adhNom}</td><td class="com-table-td-med com-underline-hover">{listeAdherent.adhPrenom}</td><td class="com-table-td-med com-underline-hover">{listeAdherent.adhCourrielPrincipal}</td><td class="com-table-td-fin com-underline-hover liste-adh-td-solde"><span class="{listeAdherent.classSolde}">{listeAdherent.cptSolde} {sigleMonetaire}</span></td></tr><!-- END listeAdherent --></tbody></table></div></div></div></div>';this.listeAdherentVide='<div id="contenu"><div class="com-widget-window ui-widget ui-widget-content ui-corner-all"><div class="com-widget-header ui-widget ui-widget-header ui-corner-all">Les Adhérents</div><p id="texte-liste-vide">Aucun adhérent dans la base.</p></div></div>';this.dialogRecharger='<div title="Rechargement du compte {compte}"><div>{numero} : {prenom} {nom}</div><div><span>Solde : </span><span class="{classSolde}" id="nouveau-solde">{solde}</span> <span class="{classSolde}" id="nouveau-solde-sigle">{sigleMonetaire}</span></div><br/><div class="com-widget-content"><table><thead><tr><td>Montant</td><td><input type="text" name="montant-rechargement" value="" class="com-numeric com-input-text ui-widget-content ui-corner-all" id="montant" maxlength="12" size="5"/> <span>{sigleMonetaire}</span></td></tr></thead><tbody><tr id="ligne-operation"><td>Type de Paiement</td><td><select name="typepaiement" id="typePaiement"><option value="0">== Choisir ==</option><!-- BEGIN typePaiement --><option value="{typePaiement.id}">{typePaiement.type}</option><!-- END typePaiement --></select></td></tr></tbody></table></div></div>';this.champComplementaire='<!-- BEGIN champComplementaire --><tr class="champ-complementaire"><td>{champComplementaire.label}</td><td><input type="text" value="" class="com-input-text ui-widget-content ui-corner-all" id="champComplementaire{champComplementaire.id}valeur" data-id-champ-complementaire="{champComplementaire.id}" maxlength="50" size="15"/></td></tr><!-- END champComplementaire -->'}function RechargerCompteVue(a){this.mTypePaiement=[];this.solde=0;this.mBanques=[];this.construct=function(b){$.history({vue:function(){RechargerCompteVue(b)}});var c=this;var d={fonction:"listeAdherent"};$.post("./index.php?m=RechargementCompte&v=RechargerCompte","pParam="+$.toJSON(d),function(e){Infobulle.init();if(e){if(e.valid){if(b&&b.vr){Infobulle.generer(b.vr,"")}c.mTypePaiement=e.typePaiement;c.afficher(e)}else{Infobulle.generer(e,"")}}},"json")};this.afficher=function(d){var c=this;var b=new RechargementCompteTemplate();if(d.listeAdherent.length>0&&d.listeAdherent[0].adhId!=null){var e=b.listeAdherent;d.sigleMonetaire=gSigleMonetaire;$(d.listeAdherent).each(function(){this.classSolde="";if(this.cptSolde<0){this.classSolde="com-nombre-negatif"}this.cptSolde=this.cptSolde.nombreFormate(2,","," ");this.adhIdTri=this.adhNumero.replace("Z","")});$("#contenu").replaceWith(c.affect($(e.template(d))))}else{$("#contenu").replaceWith(b.listeAdherentVide)}};this.affect=function(b){b=this.affectTri(b);b=this.affectRecherche(b);b=this.affectLienCompte(b);return b};this.affectTri=function(b){b.find(".com-table").tablesorter({sortList:[[0,0]],headers:{4:{sorter:false}}});return b};this.affectRecherche=function(b){b.find("#filter").keyup(function(){$.uiTableFilter($(".com-table"),this.value)});b.find("#filter-form").submit(function(){return false});return b};this.affectLienCompte=function(b){var c=this;b.find(".compte-ligne").click(function(){var d={id:$(this).attr("id-adherent"),fonction:"infoRechargement"};$.post("./index.php?m=RechargementCompte&v=RechargerCompte","pParam="+$.toJSON(d),function(f){Infobulle.init();if(f){if(f.valid){c.mBanques=f.banques;c.solde=parseFloat(f.solde);f.sigleMonetaire=gSigleMonetaire;f.solde=f.solde.nombreFormate(2,","," ");f.typePaiement=c.mTypePaiement;var g=f.idCompte;var e=new RechargementCompteTemplate();c.affectDialog($(e.dialogRecharger.template(f))).dialog({autoOpen:true,modal:true,draggable:false,resizable:false,width:350,buttons:{Valider:function(){var h=c.getRechargementVO();h.idCompte=g;var i=new OperationDetailValid();var k=i.validAjout(h);Infobulle.init();if(k.valid){h.fonction="rechargerCompte";var j=this;$.post("./index.php?m=RechargementCompte&v=RechargerCompte","pParam="+$.toJSON(h),function(m){Infobulle.init();if(m.valid){var o=new TemplateVR();o.valid=false;o.log.valid=false;var l=new VRerreur();l.code=ERR_306_CODE;l.message=ERR_306_MSG;o.log.erreurs.push(l);var n={vr:o};c.construct(n);$(j).dialog("close")}else{Infobulle.generer(m,"")}},"json")}else{Infobulle.generer(k,"")}},Annuler:function(){$(this).dialog("close")}},close:function(h,i){$(this).remove()}});c.changerTypePaiement($(":input[name=typepaiement]"));c.majNouveauSolde()}else{Infobulle.generer(f,"")}}},"json")});return b};this.affectDialog=function(b){b=this.affectSelectTypePaiement(b);b=this.affectNouveauSolde(b);b=gCommunVue.comNumeric(b);return b};this.affectSelectTypePaiement=function(b){var c=this;b.find(":input[name=typepaiement]").change(function(){c.changerTypePaiement($(this))});return b};this.changerTypePaiement=function(e){var d=e.val();if(!this.mTypePaiement[d]||(this.mTypePaiement[d]&&this.mTypePaiement[d].champComplementaire.length==0)){$(".champ-complementaire").remove()}else{var b=new RechargementCompteTemplate();var c=new TypePaiementService();$("#ligne-operation").after(c.affect($(b.champComplementaire.template(this.mTypePaiement[d])),this.mBanques))}};this.affectNouveauSolde=function(b){var c=this;b.find(":input[name=montant-rechargement]").keyup(function(){c.majNouveauSolde()});return b};this.majNouveauSolde=function(){var b=this.calculNouveauSolde();if(b<=0){$("#nouveau-solde").addClass("com-nombre-negatif");$("#nouveau-solde-sigle").addClass("com-nombre-negatif")}else{$("#nouveau-solde").removeClass("com-nombre-negatif");$("#nouveau-solde-sigle").removeClass("com-nombre-negatif")}$("#nouveau-solde").text(b.nombreFormate(2,","," "))};this.calculNouveauSolde=function(){var b=parseFloat($(":input[name=montant-rechargement]").val().numberFrToDb());if(isNaN(b)){b=0}return this.solde+b};this.getRechargementVO=function(){var b=new OperationDetailVO();var d=$(":input[name=montant-rechargement]").val().numberFrToDb();if(!isNaN(d)&&!d.isEmpty()){d=parseFloat(d)}b.montant=d;b.typePaiement=$(":input[name=typepaiement]").val();if(this.mTypePaiement[b.typePaiement]){var c=new TypePaiementService();b.champComplementaire=c.getChampComplementaire(this.mTypePaiement[b.typePaiement].champComplementaire)}return b};this.construct(a)};