function changerAnnee(){
    annee = $("#annee").val();
    if (annee !='')
    {
        $.ajax({
            type: 'get',
            url: racine + 'contribuables/changeAnnee/'+annee,
            success: function (data) {
                location.reload();
                resetInit();
            },
            error: function () {
                $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
            }
        });
    }
}
function savePayement(element) {
    saveform(element, function (id) {
        $('.datatableshow2').DataTable().ajax.reload();
        $("#create").hide();
    });
}
function montantActivite() {
    id = $("#activite_id").val();
    emplacement = $("#emplacement").val();
    taille = $("#taille").val();
    if (id != '' && emplacement != '' && taille != '') {
        $.ajax({
            type: 'get',
            url: racine + 'contribuables/getActvite/' + id + '/' + emplacement + '/' + taille,
            success: function(data) {
                if (data != '') {
                    $.each(data, function(key, value) {
                        $("#montant").val('' + value.montant + '');
                    });
                } else {
                    $("#montant").val('0');
                }
                resetInit();
            },
            error: function() {
                $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
            }
        });
    }
}


function montantActiviteedit() {
    id = $("#activite_idedit").val();
    emplacement = $("#emplacementedit").val();
    taille = $("#tailleedit").val();
    if (id != '' && emplacement != '' && taille != '') {
        $.ajax({
            type: 'get',
            url: racine + 'contribuables/getActvite/' + id + '/' + emplacement + '/' + taille,
            success: function(data) {
                if (data != '') {
                    $.each(data, function(key, value) {
                        $("#montantedit").val('' + value.montant + '');
                    });
                } else {
                    $("#montantedit").val('0');
                }
                resetInit();
            },
            error: function() {
                $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
            }
        });
    }

}

function playsup(id) {
    url = racine + 'contribuables/playsup/' + id;
    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            $("#second-modal .modal-dialog").addClass("modal-lg");
            $("#second-modal .modal-header-body").html(data);
            $("#second-modal").modal();
            resetInit();
        },
        error: function() {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

function reprendrePayement(id, id_pay) {
    $("#divContenueplaysup").html(loading_content);
    $.ajax({
        type: 'get',
        url: racine + 'contribuables/reprendrePayement/' + id + '/' + id_pay,
        success: function(data) {
            $("#divContenueplaysup").html('');
            $("#divContenueplaysup").html(data);
            resetInit();
        },
        error: function() {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}

function suspendrePayement(id, id_pay) {
    $("#divContenueplaysup").html(loading_content);
    $.ajax({
        type: 'get',
        url: racine + 'contribuables/suspendrePayement/' + id + '/' + id_pay,
        success: function(data) {
            $("#divContenueplaysup").html('');
            $("#divContenueplaysup").html(data);
            resetInit();
        },
        error: function() {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}
function newPayement(id, montant) {
    $.ajax({
        type: 'get',
        url: racine + 'contribuables/newPayement/' + id,
        success: function(data) {
            $("#create").html(data);
            $("#create").show();
            $("#id").val(id);
            $("#mt").val(montant);
            $("#edit").hide();
            resetInit();
          //  $(":input").inputmask();
        },
        error: function() {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}
function savePayement(element) {
saveform(element, function (id) {
    $('.datatableshow2').DataTable().ajax.reload();
    $("#create").hide();
});
}
function montantMax(){
    montant=$("#montantSaisi").val().replace(/ /g, '');
    mtar=$("#mtar").val();
    mt=$("#mt").val();
    max_essay=$("#max_essay").val();
    montantMaximun=(parseFloat(mt) * parseFloat(max_essay)) + parseFloat(mtar);
     if (parseFloat(montant) > parseFloat(montantMaximun))
    {

        alert('dsl le montant est grand')
        $("#montantSaisi").val('');
    }
    else if (montant ==0) {
        alert('dsl le montant est grand')
        $("#montantSaisi").val('');
    }
    else{

    }
}
function exportcontribuablePDF(id){
    document.formspdf.action = 'contribuables/exportcontribuablePDF/'+id+'';
    document.formspdf.target = "_blank";    // Open in a new window
    document.formspdf.submit();             // Submit the page
    return true;
}
// function suiviContibuable(annee) {
//     url = racine + 'contribuables/suiviContibuable/'+annee;
//     $.ajax({
//         type: 'get',
//         url: url,
//         success: function (data) {
//             $("#second-modal .modal-dialog").addClass("modal-lg'");
//             $("#second-modal .modal-header-body").html(data);
//             $("#second-modal").modal();
//             resetInit();
//         },
//         error: function () {
//             $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
//         }
//     });
// }
function filterContribuable(annee){
    contribuable = $("#contribuable").val();
    date1=date2='all';
     $('#datatableshow2').DataTable().ajax.url(racine + 'contribuables/getPayementAnnne/' + annee+'/'+ contribuable  +'/'+ date1 +'/'+ date2 ).load();
}
function filterContribuableDate(annee) {
    date1 = $("#date1").val();
    contribuable = $("#contribuable").val();
    date2 = $("#date2").val();

    //alert(date1+''+date2)
    if (contribuable ==''){
        contribuable='all';
    }
    else {

    }

    if (date1 != '' && date2 != '' )
    {
        $('#datatableshow2').DataTable().ajax.url(racine + 'contribuables/getPayementAnnne/' + annee+'/'+ contribuable +'/'+ date1 +'/'+ date2 ).load();
    }
}
function excelSuiviPayementCtb(annee){
    date1 = $("#date1").val();
    contribuable = $("#contribuable").val();
    date2 = $("#date2").val();
    if(contribuable==''){
        contribuable = 'all';
    }
    if(date1=='' || date2=='' ){
        date1 = 'all';date2 = 'all';
    }

    document.formst.action = 'contribuables/excelSuiviPayementCtb/' + annee+'/'+ contribuable + '/'+ date1 +'/'+ date2+'';
    document.formst.target = "_blank";    // Open in a new window
    document.formst.submit();             // Submit the page
    return true;
}
function pdfSuiviPayementCtb(annee){
    date1 = $("#date1").val();
    contribuable = $("#contribuable").val();
    date2 = $("#date2").val();
    if(contribuable==''){
        contribuable = 'all';
    }
    if(date1=='' || date2=='' ){
        date1 = 'all';date2 = 'all';
    }

    document.formst.action = 'contribuables/pdfSuiviPayementCtb/' + annee+'/'+ contribuable + '/'+ date1 +'/'+ date2+'';
    document.formst.target = "_blank";    // Open in a new window
    document.formst.submit();             // Submit the page
    return true;
}
function suiviContibuable(annee) {
    url = racine + 'contribuables/suiviContibuable/'+annee;
    $.ajax({
        type: 'get',
        url: url,
        success: function (data) {
            $("#second-modal .modal-dialog").addClass("modal-lg");
            $("#second-modal .modal-header-body").html(data);
            $("#second-modal").modal();
            resetInit();
        },
        error: function () {
            $.alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
        }
    });
}
function filterContribuable(annee){
    contribuable = $("#contribuable").val();
    date1=date2='all';
     $('#datatableshow2').DataTable().ajax.url(racine + 'contribuables/getPayementAnnne/' + annee+'/'+ contribuable  +'/'+ date1 +'/'+ date2 ).load();
}
function filterContribuableDate(annee) {
    date1 = $("#date1").val();
    contribuable = $("#contribuable").val();
    date2 = $("#date2").val();

    //alert(date1+''+date2)
    if (contribuable ==''){
        contribuable='all';
    }
    else {

    }

    if (date1 != '' && date2 != '' )
    {
        $('#datatableshow2').DataTable().ajax.url(racine + 'contribuables/getPayementAnnne/' + annee+'/'+ contribuable +'/'+ date1 +'/'+ date2 ).load();
    }
}
function excelSuiviPayementCtb(annee){
    date1 = $("#date1").val();
    contribuable = $("#contribuable").val();
    date2 = $("#date2").val();
    if(contribuable==''){
        contribuable = 'all';
    }
    if(date1=='' || date2=='' ){
        date1 = 'all';date2 = 'all';
    }

    document.formst.action = 'contribuables/excelSuiviPayementCtb/' + annee+'/'+ contribuable + '/'+ date1 +'/'+ date2+'';
    document.formst.target = "_blank";    // Open in a new window
    document.formst.submit();             // Submit the page
    return true;
}
function pdfSuiviPayementCtb(annee){
    date1 = $("#date1").val();
    contribuable = $("#contribuable").val();
    date2 = $("#date2").val();
    if(contribuable==''){
        contribuable = 'all';
    }
    if(date1=='' || date2=='' ){
        date1 = 'all';date2 = 'all';
    }

    document.formst.action = 'contribuables/pdfSuiviPayementCtb/' + annee+'/'+ contribuable + '/'+ date1 +'/'+ date2+'';
    document.formst.target = "_blank";    // Open in a new window
    document.formst.submit();             // Submit the page
    return true;
}
function annulerPayement(id){
    var confirme = confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement");
    if(confirme){
        $.ajax({
            type: 'get',
            url: racine+'contribuables/annulerPayement/'+id,
            success: function (data)
            {
                 $('.datatableshow2').DataTable().ajax.reload();
            },
            error: function(data){
                    alert("Une erreur est survenue veuillez réessayer ou actualiser la page!");
            }
        });
    }

}
