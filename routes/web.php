<?php

use Dcs\Courriers\Models\CrArchive;
use Dcs\Courriers\Models\CrCourrier;
use Dcs\Courriers\Models\CrRefFonction;
use Dcs\Courriers\Models\CrRefOrigine;
use Dcs\Maps\Models\RefSigTypeGeometry;
use Dcs\Patrimoine\Models\CoordonneesEquipementsGeo;
use Dcs\Patrimoine\Models\Emplacement;
use Dcs\Patrimoine\Models\Equipement;
use Dcs\Patrimoine\Models\EquipementsRefElement;
use Dcs\Patrimoine\Models\Infrastructure;
use Dcs\Patrimoine\Models\RefChoixElement;
use Dcs\Patrimoine\Models\RefElement;
use Dcs\Patrimoine\Models\RefEtatsInfrastructure;
use Dcs\Patrimoine\Models\RefTypesEquipement;
use Dcs\Patrimoine\Models\RefTypesInfrastructure;
use Dcs\Patrimoine\Models\Secteur;
use Dcs\Patrimoine\Models\SigCoordinatesObject;
use Dcs\Patrimoine\Models\SigLayout;
use Dcs\Patrimoine\Models\SigObjectsLayout;
use Dcs\Persons\Models\PrsPerson;
use Dcs\Quartier\Models\QrCoordonne;
use Dcs\Quartier\Models\QrDevice;
use Dcs\Quartier\Models\QrEvaluationsIndividu;
use Dcs\Quartier\Models\QrEvaluationsLogement;
use Dcs\Quartier\Models\QrFamille;
use Dcs\Quartier\Models\QrFamillesIndividus;
use Dcs\Quartier\Models\QrIndividu;
use Dcs\Quartier\Models\QrLogement;
use Dcs\Quartier\Models\QrLogementIndividu;
use Dcs\Quartier\Models\QrMembreBureauQuartier;
use Dcs\Quartier\Models\QrQuartier;
use Dcs\Quartier\Models\QrSychronisation;
use Dcs\Questionnaire\Models\QstChamp;
use Dcs\Questionnaire\Models\QstChampsValeur;
use Dcs\Questionnaire\Models\QstGroupe;
use Dcs\Questionnaire\Models\QstGroupesQstGroupe;
use Dcs\Questionnaire\Models\QstGroupesQstQuestion;
use Dcs\Questionnaire\Models\QstModel;
use Dcs\Questionnaire\Models\QstQuestion;
use Dcs\Questionnaire\Models\QstQuestionnaire;
use Dcs\Questionnaire\Models\QstReponse;
use Dcs\Questionnaire\Models\QstTypesQuestionnaire;
use Dcs\Questionnaire\Models\QstQuestionnairesQstGroupe;

use Dcs\Ref\Models\RefLocalite;
use Dcs\Rh\Models\RhEmploye;
use Dcs\Admin\Models\SysDroit;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/lang/{locale}', function ($locale) {

    Session::put('language', $locale);

    return redirect()->back();

})->name('lang');
Route::get('test',[\App\Http\Controllers\EmployeController::class,'index']);
Route::get('kakhel_migrate/{databse}',function($database){
    //($database);
  // quartiers($database);
  //logements($database);
  //to_new_shemas_membres_bureau($database);
//   to_new_shemas_individus($database);
//   to_familles($database);
//   individus_familles($database);
//   qr_devices($database);
//qr_logement_individus($database);
//   qr_coordonnes($database);
//   qr_logement_individus($database);
//   qr_etat_logements($database);
//qr_sychronisations($database);
// qst_questionnaires($database);
// qst_champs_valeurs($database);
// qst_champs($database);
//qst_groupes($database);
//qst_groupes_qst_questions($database);
//qst_models($database);
// qst_groupes_qst_groupes($database);
// qst_questionnaires_qst_groupes($database);
// qst_questions($database);
// qst_reponses($database);
// qst_types_questionnaires($database);
//qr_evaluations_individus($database);
//qr_evaluations_logements($database);

return 'done';

});
 function localites($database){
    $localites= DB::connection($database)->select('select * from localites ');
    foreach($localites as $localite){
//        $loc = new RefLocalite();
//        $loc->id=$localite->id;
//        $loc->libelle= $localite->libelle;
//        $loc->libelle_ar= $localite->libelle_ar;
//        $loc->coordonnees_gps= $localite->coordonnees_gps;
//        $loc->ref_commune_id= $localite->commune_id;
//        $loc->created_at= $localite->created_at;
//        $loc->updated_at= $localite->updated_at;
//        $loc->deleted_at= $localite->deleted_at;
//        $loc->save();
        RefLocalite::firstOrCreate(
            ['id' => $localite->id],
            [
                'libelle' => $localite->libelle,
                'libelle_ar' => $localite->libelle_ar,
                'coordonnees_gps' => $localite->coordonnees_gps,
                'ref_commune_id' => $localite->commune_id,
                'created_at' => $localite->created_at,
                'updated_at' => $localite->updated_at,
                'deleted_at' => $localite->deleted_at
            ]
        );

    }
}
  function quartiers($database){
    $quartiers= DB::connection($database)->select('select * from qr_quartiers ');
    foreach($quartiers as  $quartier){
//       $q = new QrQuartier();
//       $q->id=$quartier->id;
//       $q->libelle_fr=$quartier->libelle;
//       $q->libelle_ar=$quartier->libelle_ar;
//       $q->ref_localite_id=$quartier->localite_id;
//       $q->created_at= $quartier->created_at;
//       $q->updated_at= $quartier->updated_at;
//       $q->deleted_at= $quartier->deleted_at;
//       $q->save();
        QrQuartier::firstOrCreate(
            ['id' => $quartier->id],
            [
                'libelle_fr' => $quartier->libelle,
                'libelle_ar' => $quartier->libelle_ar,
                'ref_localite_id' => $quartier->localite_id,
                'created_at' => $quartier->created_at,
                'updated_at' => $quartier->updated_at,
                'deleted_at' => $quartier->deleted_at,
            ]
        );

    }
 }

 function logements($database){
    $logements = DB::connection($database)->select('select * from qr_logements  ');
  foreach($logements as $logement){
//    $log = new QrLogement();
//    $log->id=$logement->id;
//    $log->numero_lot=$logement->numero_lot;
//    $log->qr_quartier_id=$logement->qr_quartier_id;
//    $log->eau=$logement->eau;
//    $log->electricite=$logement->electricite;
//    $log->type_logement=$logement->type_logement;
//    $log->image=$logement->image;
//    $log->latitude=$logement->latitude;
//    $log->longitude=$logement->longitude;
//    $log->etat=$logement->etat;
//    $log->source=$logement->source;
//    $log->qr_sychronisation_id=$logement->qr_sychronisation_id;
//    $log->sys_user_id=$logement->sys_user_id;
//    $log->created_at= $logement->created_at;
//    $log->updated_at= $logement->updated_at;
//    $log->deleted_at= $logement->deleted_at;
//    $log->save();
      QrLogement::firstOrCreate(
          ['id' => $logement->id],
          [
              'numero_lot' => $logement->numero_lot,
              'qr_quartier_id' => $logement->qr_quartier_id,
              'eau' => $logement->eau,
              'electricite' => $logement->electricite,
              'type_logement' => $logement->type_logement,
              'image' => $logement->image,
              'latitude' => $logement->latitude,
              'longitude' => $logement->longitude,
              'etat' => $logement->etat,
              'source' => $logement->source,
              'qr_sychronisation_id' => $logement->qr_sychronisation_id,
              'sys_user_id' => $logement->sys_user_id,
              'created_at' => $logement->created_at,
              'updated_at' => $logement->updated_at,
              'deleted_at' => $logement->deleted_at,
          ]
      );
  }
 }
function to_now_schemas_rh($database){
    $employes = DB::connection($database)->select('select * from employes ');
    foreach ($employes as  $employe) {
      $person = new PrsPerson();
       $rhemploye = new RhEmploye();

        $person->nom_fr = $employe->nom;
        $employe->nom_ar==null?$person->nom_ar=$employe->nom:$person->nom_ar = $employe->nom_ar;
        $person->prenom_fr = $employe->prenom;
        $employe->prenom_ar==null?$person->prenom_ar=$employe->prenom:$person->prenom_ar = $employe->prenom_ar;
        $person->nom_famille_fr = $employe->nom_famille;
        $employe->nom_famille_ar==null?$person->nom_famille_ar=$employe->nom_famille:$person->nom_famille_ar = $employe->nom_famille_ar;

      //  $person->nom_famille_ar==null? $employe->nom_famille:$employe->nom_famille_ar;
        $person->nni = $employe->nni;
        $person->date_naissance = $employe->date_naissance;
        $person->lieu_naissance = $employe->lieu_naissance;

        $person->prs_ref_genre_id = $employe->ref_genre_id;
        $person->prs_ref_situation_familliale_id = $employe->ref_situation_familliale_id;
        //$person->prs_ref_situation_sante_id = employe->situation_sante;
       // $person->prs_ref_situation_professionnel_id = $employe->pro;


       // $person->commune_naissance_id = employe->pays_naissance == 1 ? employe->lieu_naissance : null;
       // $person->commune_residence = employe->pays_residence == 1 ? employe->lieu_residence : null;
       // $person->lieu_residance = $employe->lieu_residence;
        $person->tel1 = str_replace(' ', '', $employe->tel);
        $person->tel2 = str_replace(' ', '', $employe->whatsapp);
        $person->email = $employe->email;
        $person->prs_types_person_id = 4;
       // $person->personnable_type=Dcs\Rh\Models\RhEmploye::class;

        $person->photo=$employe->photo;

        $person->save();
        $rhemploye->id=$employe->id;
        $rhemploye->prs_person_id = $person->id;
        $rhemploye->code=$employe->code;
        $rhemploye->taches=$employe->taches;
        $rhemploye->tel_personne=$employe->tel_personne;
        $rhemploye->email_personne=$employe->email_personne;
        $rhemploye->nom_personne= $employe->nom_personne;
        $rhemploye->prenom_personne= $employe->prenom_personne;
        $rhemploye->salaire_mensuel= $employe->salaire_mensuel;
        $rhemploye->date_embauche= $employe->date_embauche;
        $rhemploye->specialite_id=$employe->specialite_id;
        $rhemploye->service_id= $employe->service_id;
        $rhemploye->titre=$employe->titre;
        $rhemploye->commentaires=$employe->commentaires;
        $rhemploye->ref_types_contrat_id=$employe->ref_types_contrat_id;
        $rhemploye->ref_fonction_id= $employe->ref_fonction_id;
        $rhemploye->ref_commune_id =$employe->commune_id;
        $rhemploye->created_at=$employe->created_at;
        $rhemploye->updated_at=$employe->updated_at;
        $rhemploye->deleted_at=$employe->deleted_at;
      //  $rhemploye->adresse = $employe->adresse;
        $rhemploye->save();


  }
}
function to_new_shemas_membres_bureau($database){
    $membres= DB::connection($database)->select('select * from qr_membre_bureau_quartiers');
    foreach($membres as $membre){
       $person = new PrsPerson();

        $person->nom_fr = $membre->nom;
        $person->nom_ar = $membre->nom;
        $person->prenom_fr = $membre->prenom;
        $person->prenom_ar = $membre->prenom;
        $person->nni = $membre->nni;
        $person->tel1 = str_replace(' ', '', $membre->tel);
        $person->date_naissance = $membre->date_naissance;
        $person->prs_types_person_id = 3;
        $person->save();
        $mem = new QrMembreBureauQuartier();
        $mem->prs_person_id=$person->id;
        $mem->is_chef=$membre->is_chef;
        $mem->qr_quartier_id=$membre->qr_quartier_id;
        $mem->created_at= $membre->created_at;
        $mem->updated_at= $membre->updated_at;
        $mem->deleted_at= $membre->deleted_at;
        $mem->save();

    }

// date_naissance
// is_chef
// qr_quartier_id

}
function to_new_shemas_individus($database){

    $individus = DB::connection($database)->select('select * from qr_individus ');
    foreach($individus as $indvd){
      $person = new PrsPerson();

        $person->nom_fr = $indvd->nom;
        $person->nom_ar=$indvd->nom;
        $person->prenom_fr = $indvd->prenom;
        $person->prenom_ar = $indvd->prenom;
       // $person->nom_famille_fr = $indvd->nom_famille;
      // $person->nom_famille_ar = $indvd->nom_famille_ar;
        $person->nni = $indvd->nni;
        $person->date_naissance = $indvd->date_naissance;
      //  $person->lieu_naissance = $indvd->lieu_naissance;

        $person->prs_ref_genre_id = $indvd->sex==0?1:2;
        $person->prs_ref_situation_familliale_id = $indvd->ref_situation_familliale_id;
        $person->prs_ref_situation_sante_id = $indvd->ref_situation_sante_id;
        $person->prs_ref_situation_professionnel_id =  $indvd->ref_situation_professionnele_id;


       // $person->commune_naissance_id = employe->pays_naissance == 1 ? employe->lieu_naissance : null;
       // $person->commune_residence = employe->pays_residence == 1 ? employe->lieu_residence : null;
       // $person->lieu_residance = $employe->lieu_residence;
        $person->tel1 = str_replace(' ', '', $indvd->tel);
       // $person->tel2 = str_replace(' ', '', $indvd->whatsapp);
       // $person->email = $indvd->email;
        $person->prs_types_person_id = 2;
       // $person->personnable_type=Dcs\Rh\Models\RhEmploye::class;

       // $person->photo=$indvd->photo;

        $person->save();

        $individu = new QrIndividu();
        $individu->id=$indvd->id;
        $individu->prs_person_id = $person->id;
        $individu->ref_qualite_famille_id = $indvd->ref_qualite_famille_id;
        $individu->is_responsable_famille = $indvd->is_responsable_famille;
        $individu->ref_qualite_famille_id = $indvd->ref_qualite_famille_id;
        $individu->source = $indvd->source;
        $individu->qr_sychronisation_id= $indvd->qr_sychronisation_id;
        $individu->etat= $indvd->etat;
        $individu->sys_user_id=$indvd->sys_user_id;
        $individu->created_at= $indvd->created_at;
        $individu->updated_at= $indvd->updated_at;
        $individu->deleted_at= $indvd->deleted_at;
        $individu->save();
    }
}
function to_familles($database){
    $familles = DB::connection($database)->select('select * from qr_familles ');
    foreach($familles as  $famille){
        $f = new QrFamille();
        $f->id=$famille->id;
        $f->nom=$famille->nom;
        $f->nom_ar=$famille->nom_ar;
        $f->type_famille=$famille->type_famille;
        $f->etat=$famille->etat;
        $f->source=$famille->source;
        $f->qr_logement_id=$famille->qr_logement_id;
        $f->sys_user_id=$famille->sys_user_id;
        $f->qr_sychronisation_id=$famille->qr_sychronisation_id;
        $f->created_at= $famille->created_at;
        $f->updated_at= $famille->updated_at;
        $f->deleted_at= $famille->deleted_at;
        $f->save();


   }

}

function individus_familles($database){
 $individus_famille = DB::connection($database)->select('select * from qr_familles_qr_individus ');
 foreach( $individus_famille as  $ind_fe){
    $ind_f = new QrFamillesIndividus();
    $ind_f->id=$ind_fe->id;
    $ind_f->qr_famille_id=$ind_fe->qr_famille_id;
    $ind_f->qr_individu_id=$ind_fe->qr_individu_id;
    $ind_f->actif=$ind_fe->actif;
    $ind_f->created_at= $ind_fe->created_at;
    $ind_f->updated_at= $ind_fe->updated_at;
    $ind_f->deleted_at= $ind_fe->deleted_at;
    $ind_f->save();
 }
}
function  qr_devices($database){
  $qr_devices = DB::connection($database)->select('select * from qr_devices');
   foreach($qr_devices as $device){
    $qr_device = new QrDevice();
    $qr_device->id=$device->id;
    $qr_device->serial_number=$device->serial_number;
    $qr_device->username=$device->username;
    $qr_device->password=$device->password;
    $qr_device->ref_commune_id=$device->commune_id;
    $qr_device->actif=$device->actif;
    $qr_device->code_renitialisation=$device->code_renitialisation;
    $qr_device->deleted_at=$device->deleted_at;
    $qr_device->created_at=$device->created_at;
    $qr_device->updated_at=$device->updated_at;
    $qr_device->save();
   }
 }
 function qr_sychronisations($database){
  $qr_sychronisations = DB::connection($database)->select('select * from qr_sychronisations');
  foreach($qr_sychronisations as  $sych){
    $qr_synch = new QrSychronisation();
    $qr_synch->id=$sych->id;
    $qr_synch->date_sych=$sych->date_sych;
    $qr_synch->etat=$sych->etat;
    $qr_synch->ref_commune_id=$sych->commune_id;
    $qr_synch->qr_device_id=$sych->devise_id;
    $qr_synch->created_at=$sych->created_at;
    $qr_synch->updated_at=$sych->updated_at;
    $qr_synch->deleted_at=$sych->deleted_at;
    $qr_synch->save();
  }


 }
 function qr_evaluations_individus($database){
  $qr_evaluations_individus = DB::connection($database)->select('select * from qr_evaluations_individus');
  foreach($qr_evaluations_individus as $eval){
    $eval_indiv = new QrEvaluationsIndividu();
    $eval_indiv->id=$eval->id;

    $eval_indiv->qr_individu_id=$eval->qr_individu_id;

    $eval_indiv->qst_questionnaire_id=$eval->qst_questionnaire_id;

    $eval_indiv->date_eval=$eval->date_eval;
    $eval_indiv->created_at=$eval->created_at;
    $eval_indiv->updated_at=$eval->updated_at;
    $eval_indiv->deleted_at=$eval->deleted_at;
    $eval_indiv->save();
  }

 }
 function qr_evaluations_logements($database){
  $qr_evaluations_logements = DB::connection($database)->select('select * from qr_evaluations_logements');
  foreach($qr_evaluations_logements as $eval){
    $eval_log= new QrEvaluationsLogement();
    $eval_log->id=$eval->id;
    $eval_log->qr_logement_id=$eval->qr_logement_id;
    $eval_log->qst_questionnaire_id=$eval->qst_questionnaire_id;
    $eval_log->date_eval=$eval->date_eval;
    $eval_log->created_at=$eval->created_at;
    $eval_log->updated_at=$eval->updated_at;
    $eval_log->deleted_at=$eval->deleted_at;
    $eval_log->save();
  }

}
function qr_coordonnes($database){
  $qr_coordonnes = DB::connection($database)->select('select * from qr_coordonnes');
  foreach($qr_coordonnes as  $qr_coor){
    $qr_coordonne = new QrCoordonne();
    $qr_coordonne->id= $qr_coor->id;
    $qr_coordonne->id= $qr_coor->id;
    $qr_coordonne->latitude=$qr_coor->latitude;
    $qr_coordonne->longitude=$qr_coor->longitude;
    $qr_coordonne->qr_quartier_id=$qr_coor->qr_quartier_id;
    $qr_coordonne->created_at=$qr_coor->created_at;
    $qr_coordonne->updated_at=$qr_coor->updated_at;
    $qr_coordonne->deleted_at=$qr_coor->deleted_at;

    $qr_coordonne->save();

  }

}
 function qr_logement_individus($database){
    $qr_logement_individus = DB::connection($database)->select('select * from qr_logement_individus');
    foreach($qr_logement_individus as $qr_logement){
        $qr_logement_individu = new QrLogementIndividu();
        $qr_logement_individu->etat =$qr_logement->etat;
        $qr_logement_individu->id =$qr_logement->id;
        $qr_logement_individu->qr_logement_id =$qr_logement->qr_logement_id;
        $qr_logement_individu->qr_individu_id =$qr_logement->qr_individu_id;

        $qr_logement_individu->deleted_at =$qr_logement->deleted_at;
        $qr_logement_individu->created_at =$qr_logement->created_at;
        $qr_logement_individu->updated_at =$qr_logement->updated_at;
        $qr_logement_individu->save();
    }
 }
 function qr_etat_logements($database){
    $qr_etat_logements = DB::connection($database)->select('select * from qr_etat_logements');
    foreach($qr_etat_logements as  $qr_etat){
        $qr_etat_logement = new QrEvaluationsLogement();
        $qr_etat_logement->id= $qr_etat->id;
        $qr_etat_logement->eau	= $qr_etat->eau;
        $qr_etat_logement->electricite	= $qr_etat->electricite;
        $qr_etat_logement->proprietaire_locateur = $qr_etat->proprietaire_locateur;
        $qr_etat_logement->created_at = $qr_etat->created_at;
        $qr_etat_logement->updated_at = $qr_etat->updated_at;
        $qr_etat_logement->deleted_at = $qr_etat->deleted_at;
        $qr_etat_logement->save();

    }
 }

 function qst_questionnaires($database){
    $qst_questionnaires = DB::connection($database)->select('select * from qst_questionnaires');
    foreach($qst_questionnaires as  $qs){
        $qst_questionnaire= new QstQuestionnaire();
        $qst_questionnaire->id = $qs->id;
        $qst_questionnaire->libelle_fr = $qs->libelle_fr;
        $qst_questionnaire->libelle_ar = $qs->libelle_ar;
        $qst_questionnaire->description_fr = $qs->description_fr;
        $qst_questionnaire->description_ar = $qs->description_ar;
        $qst_questionnaire->qst_etats_questionnaire_id = $qs->qst_etats_questionnaire_id;
        $qst_questionnaire->qst_types_questionnaire_id = $qs->qst_types_questionnaire_id;
        $qst_questionnaire->qst_projet_id = $qs->type_projet;
        $qst_questionnaire->created_at = $qs->created_at;

        $qst_questionnaire->updated_at = $qs->updated_at;

        $qst_questionnaire->deleted_at = $qs->deleted_at;
        $qst_questionnaire->save();
    }
 }
 function qst_champs($database){
    $qst_champs = DB::connection($database)->select('select * from qst_champs');
    foreach($qst_champs as $champ){
        $qst_champ = new QstChamp();
        $qst_champ->id= $champ->id;
        $qst_champ->libelle_fr= $champ->libelle_fr;
        $qst_champ->libelle_ar= $champ->libelle_ar;
        $qst_champ->qst_natures_champ_id= $champ->qst_natures_champ_id;
        $qst_champ->qst_model_id= $champ->qst_model_id;
        $qst_champ->is_searchable= $champ->is_searchable;
        $qst_champ->created_at= $champ->created_at;
        $qst_champ->updated_at= $champ->updated_at;
        $qst_champ->deleted_at= $champ->deleted_at;
        $qst_champ->save();

    }
 }
 function qst_champs_valeurs($database){
    $qst_champs_valeurs = DB::connection($database)->select('select * from qst_champs_valeurs');
     foreach($qst_champs_valeurs as  $q){
        $qst_champs_valeur = new QstChampsValeur();
        $qst_champs_valeur->id=$q->id;
        $qst_champs_valeur->qst_champ_id=$q->qst_champ_id;
        $qst_champs_valeur->libelle_fr=$q->libelle_fr;
        $qst_champs_valeur->libelle_ar=$q->libelle_ar;
        $qst_champs_valeur->image=$q->image;
        $qst_champs_valeur->premiere_liste=$q->premiere_liste;
        $qst_champs_valeur->vrai=$q->vrai;
        $qst_champs_valeur->ordre=$q->ordre;
        $qst_champs_valeur->is_other=$q->is_other;
        $qst_champs_valeur->valeur_min=$q->valeur_min;
        $qst_champs_valeur->valeur_max=$q->valeur_max;
        $qst_champs_valeur->note=$q->note;
        $qst_champs_valeur->created_at=$q->created_at;
        $qst_champs_valeur->updated_at=$q->updated_at;
        $qst_champs_valeur->deleted_at=$q->deleted_at;
        $qst_champs_valeur->save();
     }
 }
 function qst_groupes($database){
    $qst_groupes = DB::connection($database)->select('select * from qst_groupes');
    foreach($qst_groupes as $q){
        $qst_groupe = new QstGroupe();
        $qst_groupe->id = $q->id;
        $qst_groupe->libelle_fr = $q->libelle_fr;
        $qst_groupe->libelle_ar = $q->libelle_ar;
        $qst_groupe->code = $q->code;
        $qst_groupe->formule = $q->formule;
        $qst_groupe->qst_etats_groupe_id = $q->qst_etats_groupe_id;
        $qst_groupe->ordre = $q->ordre;
        $qst_groupe->qst_projet_id	 = $q->type_projet;
        $qst_groupe->created_at = $q->created_at;
        $qst_groupe->updated_at = $q->updated_at;
        $qst_groupe->deleted_at= $q->deleted_at;
        $qst_groupe->save();
    }
 }
 function qst_groupes_qst_groupes($database){
    $qst_groupes_qst_groupes = DB::connection($database)->select('select * from qst_groupes_qst_groupes');
    foreach($qst_groupes_qst_groupes as $qst){
        $qst_groupes_qst_groupe = new QstGroupesQstGroupe();
        $qst_groupes_qst_groupe->id=$qst->id;
        $qst_groupes_qst_groupe->groupe_enfant=$qst->groupe_enfant;
        $qst_groupes_qst_groupe->groupe_parent=$qst->groupe_parent;
        $qst_groupes_qst_groupe->created_at=$qst->created_at;
        $qst_groupes_qst_groupe->updated_at=$qst->updated_at;
        $qst_groupes_qst_groupe->deleted_at=$qst->deleted_at;
        $qst_groupes_qst_groupe->save();
    }
 }
 function qst_groupes_qst_questions($database){
    $qst_groupes_qst_questions= DB::connection($database)->select('select * from qst_groupes_qst_questions');
     foreach($qst_groupes_qst_questions as  $q){
        $qst_groupes_qst_question = new QstGroupesQstQuestion();
        $qst_groupes_qst_question->id=$q->id;
        $qst_groupes_qst_question->qst_groupe_id=$q->qst_groupe_id;
        $qst_groupes_qst_question->qst_question_id =$q->qst_question_id;
        $qst_groupes_qst_question->ordre=$q->ordre;
        $qst_groupes_qst_question->created_at=$q->created_at;
        $qst_groupes_qst_question->updated_at=$q->updated_at;
        $qst_groupes_qst_question->deleted_at=$q->deleted_at;
        $qst_groupes_qst_question->save();

     }
 }
  function qst_models($database){
    $qst_models= DB::connection($database)->select('select * from qst_models');
    foreach($qst_models as $q){
        $qst_model = new QstModel();
        $qst_model->id =$q->id;
        $qst_model->libelle_fr =$q->libelle_fr;

        $qst_model->libelle_ar =$q->libelle_ar;
        $qst_model->model =$q->model;
        $qst_model->field =$q->field;
        $qst_model->created_at =$q->created_at;
        $qst_model->updated_at =$q->updated_at;
        $qst_model->deleted_at =$q->deleted_at;
        $qst_model->save();
    }
  }

  function qst_questionnaires_qst_groupes($database){
    $qst_questionnaires_qst_groupes = DB::connection($database)->select('select * from qst_questionnaires_qst_groupes');
     foreach($qst_questionnaires_qst_groupes as $q){
    $qst_questionnaires_qst_groupe = new QstQuestionnairesQstGroupe();
    $qst_questionnaires_qst_groupe->id= $q->id;
    $qst_questionnaires_qst_groupe->qst_groupe_id= $q->qst_groupe_id;
    $qst_questionnaires_qst_groupe->qst_questionnaire_id= $q->qst_questionnaire_id;
    $qst_questionnaires_qst_groupe->ordre= $q->ordre;
    $qst_questionnaires_qst_groupe->created_at= $q->created_at;
    $qst_questionnaires_qst_groupe->updated_at= $q->updated_at;
    $qst_questionnaires_qst_groupe->deleted_at= $q->deleted_at;
    $qst_questionnaires_qst_groupe->save();

  }
  }
   function qst_questions($database){
    $qst_questions = DB::connection($database)->select('select * from qst_questions');
    foreach($qst_questions as  $q){
        $qst_question = new QstQuestion();
        $qst_question->id = $q->id;
        $qst_question->qst_champ_id = $q->qst_champ_id;
        $qst_question->code = $q->code;
        $qst_question->image= $q->image;
        $qst_question->description_fr= $q->description_fr;
        $qst_question->description_ar= $q->description_ar;
        $qst_question->qst_projet_id = $q->type_projet;
        $qst_question->qst_etats_question_id= $q->qst_etats_question_id;
        $qst_question->is_required= $q->is_required;
        $qst_question->created_at= $q->created_at;
        $qst_question->updated_at= $q->updated_at;
        $qst_question->deleted_at= $q->deleted_at;
        $qst_question->save();


    }
   }
   function qst_reponses($database){
    $qst_reponses = DB::connection($database)->select('select * from qst_reponses');
    foreach($qst_reponses as $r){
        $qst_reponse = new QstReponse();
        $qst_reponse->id=$r->id;
        $qst_reponse->reponsable_type=$r->reponsable_type;
        $qst_reponse->reponsable_id=$r->reponsable_id;
        $qst_reponse->qst_champ_id=$r->qst_champ_id;
        $qst_reponse->reponse=$r->reponse;
        $qst_reponse->qst_champs_valeur_id=$r->qst_champs_valeur_id;
        $qst_reponse->etat=$r->etat;
        $qst_reponse->ordre=$r->ordre;
        $qst_reponse->date_reponse=$r->date_reponse;
        $qst_reponse->is_locked=$r->is_locked;#
        $qst_reponse->created_at=$r->created_at;
        $qst_reponse->updated_at=$r->updated_at;
        $qst_reponse->deleted_at=$r->deleted_at;
        $qst_reponse->save();
    }

   }
   function qst_types_questionnaires($database){
    $qst_types_questionnaires = DB::connection($database)->select('select * from qst_types_questionnaires');
    foreach($qst_types_questionnaires as  $type){
        $qst_types_questionnaire = new QstTypesQuestionnaire();
        $qst_types_questionnaire->id = $type->id;
        $qst_types_questionnaire->libelle_fr = $type->libelle_fr;
        $qst_types_questionnaire->libelle_ar = $type->libelle_ar;
        $qst_types_questionnaire->created_at= $type->created_at;
        $qst_types_questionnaire->updated_at= $type->updated_at;
        $qst_types_questionnaire->deleted_at= $type->deleted_at;
        $qst_types_questionnaire->save();
    }
   }
  function equipements($database){
    $equipements = DB::connection($database)->select('select * from  equipements');
    foreach($equipements as  $eq){
        $equipement = new Equipement();
        $equipement->id = $eq->id;
        $equipement->libelle = $eq->libelle;
        $equipement->libelle_ar = $eq->libelle_ar;
        $equipement->code = $eq->code;
        $equipement->date_acquisition = $eq->date_acquisition;
//
        $equipement->deliberatin_patrimoine_communal = $eq->deliberatin_patrimoine_communal;
        $equipement->localite_id= $eq->localite_id;
        $equipement->patrimoine_public= $eq->patrimoine_public;
        $equipement->num_deliberation= $eq->num_deliberation;
        $equipement->date_deliberation= $eq->date_deliberation;
        $equipement->Eau= $eq->Eau;
        $equipement->electricite= $eq->electricite;
        $equipement->service_hygiene_assainissement= $eq->service_hygiene_assainissement;
        $equipement->accessibilite= $eq->accessibilite;
        $equipement->situation_environnementale= $eq->situation_environnementale;
        $equipement->ref_types_equipement_id= $eq->ref_types_equipement_id;
        $equipement->secteur_id= $eq->secteur_id;
        $equipement->user_id= $eq->user_id;
        $equipement->ancien_eq= $eq->ancien_eq;
        $equipement->valeur= $eq->valeur;
        $equipement->image= $eq->image;
        $equipement->actif= $eq->actif;
        $equipement->created_at= $eq->created_at;
        $equipement->updated_at= $eq->updated_at;
        $equipement->deleted_at= $eq->deleted_at;
        $equipement->save();

    }
  }
 function  coordonnees_equipements_geo($database){
  $coordonnees_equipements_geo = DB::connection($database)->select('select * from  coordonnees_equipements_geo');
    foreach($coordonnees_equipements_geo as $c){
      $coordonnees = new CoordonneesEquipementsGeo();
      $coordonnees->id = $c->id;
      $coordonnees->equipement_id = $c->equipement_id;
      $coordonnees->lat = $c->lat;
      $coordonnees->lng= $c->lng;
      $coordonnees->ordre = $c->ordre;
      $coordonnees->created_at = $c->created_at;
      $coordonnees->updated_at = $c->updated_at;
      $coordonnees->deleted_at = $c->deleted_at;
      $coordonnees->save();

    }
 }
  function equipements_ref_elements($database){

    $equipements_ref_elements = DB::connection($database)->select('select * from  equipements_ref_elements');
      foreach ($equipements_ref_elements as $eq) {
        # code...
        $equip= new EquipementsRefElement();
        $equip->id=$eq->id;
        $equip->equipement_id=$eq->equipement_id;
        $equip->ref_element_id=$eq->ref_element_id;
        $equip->valeur=$eq->valeur;
        $equip->created_at=$eq->created_at;
        $equip->updated_at=$eq->updated_at;
        $equip->deleted_at=$eq->deleted_at;
        $equip->save();
      }

  }
  function ref_types_equipements($database){
    $ref_types_equipements = DB::connection($database)->select('select * from ref_types_equipements');
     foreach($ref_types_equipements  as  $type){
      $types_equipement = new RefTypesEquipement();
      $types_equipement->id = $type->id;
      $types_equipement->libelle = $type->libelle;
      $types_equipement->libelle_ar = $type->libelle_ar;
      $types_equipement->type_affichage = $type->type_affichage;
      $types_equipement->image = $type->image;
      $types_equipement->ordre = $type->ordre;
      $types_equipement->created_at = $type->created_at;
      $types_equipement->updated_at = $type->updated_at;
      $types_equipement->deleted_at = $type->deleted_at;

      $types_equipement->save();
     }

  }
  function emplacements($database){
    $emplacements = DB::connection($database)->select('select * from emplacements');
    foreach($emplacements as $em){
      $emplacement = new Emplacement();
      $emplacement->id = $em->id;
      $emplacement->ref_type_emplacement_id = $em->ref_type_emplacement_id;
      $emplacement->localite_id = $em->localite_id;
      $emplacement->libelle = $em->libelle;
      $emplacement->libelle_ar = $em->libelle_ar;
      $emplacement->description = $em->description;
      $emplacement->description_ar = $em->description_ar;
      $emplacement->lat= $em->lat;
      $emplacement->lng= $em->lng;
      $emplacement->created_at= $em->created_at;
      $emplacement->updated_at= $em->updated_at;
      $emplacement->deleted_at= $em->deleted_at;
      $emplacement->save();

    }

  }
function secteurs($database){
  $secteurs = DB::connection($database)->select('select * from secteurs');
  foreach($secteurs as $s){
    $secteur = new Secteur();
    $secteur->id = $s->id;
    $secteur->parent = $s->parent;
    $secteur->libelle = $s->libelle;
    $secteur->libelle_ar = $s->libelle_ar;
    $secteur->ordre = $s->ordre;
    $secteur->created_at = $s->created_at;
    $secteur->updated_at = $s->updated_at;
    $secteur->deleted_at = $s->deleted_at;
    $secteur->save();

  }
}

function infrastructures($database){
  $infrastructures = DB::connection($database)->select('select * from infrastructures');
  foreach($infrastructures  as $i){
    $infrastructure = new Infrastructure();
    $infrastructure->id = $i->id;
    $infrastructure->libelle = $i->libelle;
    $infrastructure->libelle_ar= $i->libelle_ar;
    $infrastructure->code = $i->code;
    $infrastructure->description = $i->description;
    $infrastructure->date_construction = $i->date_construction;
    $infrastructure->valeur = $i->valeur;
    $infrastructure->ref_types_infrastructure_id = $i->ref_types_infrastructure_id;
    $infrastructure->equipement_id = $i->equipement_id;
    $infrastructure->ref_etats_infrastructure_id = $i->ref_etats_infrastructure_id;
    $infrastructure->date_echange = $i->date_echange;
    $infrastructure->date_attribution = $i->date_attribution;
    $infrastructure->ancien_parent = $i->ancien_parent;
    $infrastructure->actif = $i->actif;
    $infrastructure->created_at = $i->created_at;
    $infrastructure->updated_at = $i->updated_at;
    $infrastructure->deleted_at = $i->deleted_at;
    $infrastructure->save();
  }
}
  function ref_choix_elements($database)
{
  $ref_choix_elements = DB::connection($database)->select('select * from ref_choix_elements');
  foreach($ref_choix_elements as $ref){
    $choix_element = new RefChoixElement();
    $choix_element->id = $ref->id;
    $choix_element->libelle = $ref->libelle;
    $choix_element->libelle_ar = $ref->libelle_ar;
    $choix_element->ordre = $ref->ordre;
    $choix_element->ref_element_id = $ref->ref_element_id;
    $choix_element->created_at= $ref->created_at;
    $choix_element->updated_at = $ref->updated_at;
    $choix_element->deleted_at = $ref->deleted_at;
    $choix_element->save();


  }
}

function ref_elements($database){
  $ref_elements = DB::connection($database)->select('select * from ref_elements');
  foreach($ref_elements as $el){
    $ref_element = new RefElement();
    $ref_element-> id= $el->id;
    $ref_element->libelle = $el->libelle;
    $ref_element->libelle_ar = $el->libelle_ar;
    $ref_element->type = $el->type;
    $ref_element->ref_types_equipement_id = $el->ref_types_equipement_id;
    $ref_element->created_at = $el->created_at;
    $ref_element->updated_at = $el->updated_at;
    $ref_element->created_at = $el->created_at;
    $ref_element->save();

  }

}
  function ref_etats_infrastructures($database){
    $ref_etats_infrastructures = DB::connection($database)->select('select * from ref_etats_infrastructures');
    foreach($ref_etats_infrastructures as $etat){
      $ref_etat = new RefEtatsInfrastructure();
      $ref_etat->id = $etat->id;
      $ref_etat->libelle = $etat->libelle;
      $ref_etat->libelle_ar = $etat->libelle_ar;
      $ref_etat->odre =$etat->odre;
      $ref_etat->created_at = $etat->created_at;
      $ref_etat->updated_at = $etat->updated_at;
      $ref_etat->deleted_at = $etat->deleted_at;
      $ref_etat->save();

    }
  }
  function ref_sig_type_geometrys($database){
        $ref_sig_type_geometrys = DB::connection($database)->select('select * from ref_sig_type_geometrys');
        foreach($ref_sig_type_geometrys  as $type){
            $ref_sig_type_geometry = new RefSigTypeGeometry();
            $ref_sig_type_geometry->id= $type->id;
            $ref_sig_type_geometry->libelle= $type->libelle;
            $ref_sig_type_geometry->libelle_ar= $type->libelle_ar;
            $ref_sig_type_geometry->ordre= $type->ordre;
            $ref_sig_type_geometry->created_at= $type->created_at;
            $ref_sig_type_geometry->updated_at= $type->updated_at;
            $ref_sig_type_geometry->deleted_at= $type->deleted_at;
            $ref_sig_type_geometry->save();

        }
  }


function ref_types_infrastructures($database){
    $ref_types_infrastructures = DB::connection($database)->select('select * from ref_types_infrastructures');
    foreach($ref_types_infrastructures as $types_inf){
        $ref_types_infrastructure = new RefTypesInfrastructure();
        $ref_types_infrastructure->id =$types_inf->id;
        $ref_types_infrastructure->libelle =$types_inf->libelle;
        $ref_types_infrastructure->libelle_ar =$types_inf->libelle_ar;
        $ref_types_infrastructure->ordre =$types_inf->ordre;
        $ref_types_infrastructure->created_at =$types_inf->created_at;
        $ref_types_infrastructure->updated_at =$types_inf->updated_at;
        $ref_types_infrastructure->id =$types_inf->id;
        $ref_types_infrastructure->save();
    }

}
function sig_coordinates_objects($database){
    $sig_coordinates_objects = DB::connection($database)->select('select * from sig_coordinates_objects');
     foreach($sig_coordinates_objects as $coor){
        $sig_coordinates_object = new SigCoordinatesObject();
        $sig_coordinates_object->id = $coor->id;
        $sig_coordinates_object->latitude = $coor->latitude;
        $sig_coordinates_object->loguitude = $coor->loguitude;
        $sig_coordinates_object->grouping = $coor->grouping;
        $sig_coordinates_object->created_at = $coor->created_at;
        $sig_coordinates_object->updated_at = $coor->updated_at;
        $sig_coordinates_object->deleted_at = $coor->deleted_at;
        $sig_coordinates_object->save();

     }

}

function sig_layouts($database){
    $sig_layouts = DB::connection($database)->select('select * from sig_layouts');
    foreach($sig_layouts as $s){
        $sig_layout = new SigLayout();
        $sig_layout->id=$s->id;
        $sig_layout->libelle=$s->libelle;
        $sig_layout->crs_name=$s->crs_name;
        $sig_layout->niveau=$s->niveau;
        $sig_layout->ref_types_objets_geo_id=$s->ref_types_objets_geo_id;
        $sig_layout->ref_sig_type_geometry_id=$s->ref_sig_type_geometry_id;
        $sig_layout->created_at=$s->created_at;
        $sig_layout->updated_at=$s->updated_at;
        $sig_layout->deleted_at=$s->deleted_at;
        $sig_layout->save();
    }
}

function sig_objects_layouts($database){
    $sig_objects_layouts= DB::connection($database)->select('select * from sig_objects_layouts');
    foreach($sig_objects_layouts as $s){
        $sig_objects_layout = new SigObjectsLayout();
        $sig_objects_layout->id=$s->id;
        $sig_objects_layout->sig_layout_id=$s->sig_layout_id;
        $sig_objects_layout->object_id=$s->object_id;
        $sig_objects_layout->created_at=$s->created_at;
        $sig_objects_layout->updated_at=$s->updated_at;
        $sig_objects_layout->deleted_at=$s->deleted_at;
        $sig_objects_layout->save();
    }
}
  function archives($database){
        $archives= DB::connection($database)->select('select * from archives');
        foreach($archives as $ar){
            $archive = new CrArchive();
            $archive->id=$ar->id;
            $archive->libelle_fr=$ar->libelle;
            $archive->cr_ref_type_archive_id=$ar->ref_type_archive_id;
            $archive->cr_ref_qualite_id=$ar->ar_qualite_id;
            $archive->cr_emplacement_id=$ar->ar_emplacement_id;
            $archive->etat=$ar->etat;
            $archive->sys_structure_id=$ar->service_id;
            $archive->num_dossier=$ar->num_dossier;
            $archive->num_archive=$ar->num_archive;
            $archive->description=$ar->description;
            $archive->mot_cles=$ar->mots_cles;
            $archive->date_archivage=$ar->id;
            $archive->created_at=$ar->created_at;
            $archive->updated_at=$ar->updated_at;
            $archive->deleted_at=$ar->deleted_at;
            $archive->save();

        }
  }

   function courriers($database){
    $courriers= DB::connection($database)->select('select * from courriers');

    foreach($courriers as $cr){
        $courrier =  new CrCourrier();
        $courrier->id=$cr->id;
        $courrier->code=$cr->code;
        $courrier->titre=$cr->titre;
        $courrier->sys_structure_id	=$cr->service_id;
        $courrier->description=$cr->description;
        $courrier->cr_ref_type_courrier_id=$cr->type;
        $courrier->cr_origine_id=$cr->ar_origine_id;
        $courrier->cr_ref_niveau_importance_id=$cr->ref_niveau_importances;
        $courrier->date_transaction=$cr->date_transaction;
		$courrier->created_at=$cr->created_at;
        $courrier->updated_at=$cr->updated_at;
        $courrier->deleted_at=$cr-> deleted_at;
        $courrier->save();

    }
   }

   function  ref_fonctions($database){
    $ref_fonctions= DB::connection($database)->select('select * from ref_fonctions');
    foreach($ref_fonctions as $fonction ){
        $ref_fonction = new CrRefFonction();
        $ref_fonction->id=$fonction->id;
        $ref_fonction->libelle_fr=$fonction->libelle;
        $ref_fonction->libelle_ar=$fonction->libelle_ar;
        $ref_fonction->order=$fonction->order;
        $ref_fonction->created_at=$fonction->created_at;
        $ref_fonction->updated_at=$fonction->updated_at;
        $ref_fonction->deleted_at=$fonction->deleted_at;
        $ref_fonction->save();
    }

   }
  function  ar_origines($database){
    $ar_origines= DB::connection($database)->select('select * from ar_origines');
    foreach($ar_origines as $ar){
        $cr_origin = new CrRefOrigine();
        $cr_origin->id =  $ar->id;
        $cr_origin->libelle_fr =  $ar->libelle;
        $cr_origin->llibelle_ar =  $ar->libelle_ar;
        $cr_origin->created_at =  $ar->created_at;
        $cr_origin->updated_at =  $ar->updated_at;
        $cr_origin->deleted_at=  $ar->deleted_at;
        $cr_origin->save();
    }

  }

