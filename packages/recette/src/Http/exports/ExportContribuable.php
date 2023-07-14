<?php
namespace Dcs\Recette\Http\exports;
use Dcs\Recette\Http\Models\RctContribuable;
use Dcs\Recette\Http\Models\RctPayement;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
class ExportContribuable implements  WithHeadings ,WithColumnWidths , WithStyles ,FromView{
   private $annee,$contr,$date1,$date2;
    function __construct($annee,$contr,$date1,$date2) {
    $this->annee=$annee;
    $this->contr=$contr;
    $this->date1=$date1;
    $this->date2=$date2;
 }
//     public function collection()
// {
//     $contribuable = '';
//        $payements = RctPayement::where('annee', $this->annee)->where('etat','<>',3)->where('montant','<>',0)
//            ->select('contribuable_id', 'date', DB::raw('SUM(montant) as montants'))
//            ->groupBy('contribuable_id')
//            ->groupBy('date')->get();
//        if ($this->contr != 'all') {
//            $payements = $payements->where('contribuable_id', $this->contr);
//            $contribuable = RctContribuable::find($payements->first()->contribuable_id);
//            //dd($payements->first()->contribuable_id);
//        }
//        if ($this->date1 != 'all' and $this->date2 != 'all'){
//            // $payements = $payements->where('date', '>=',$date1 )->where('date', '<=', $date2);
//            $payements = $payements->where('date','>=', $this->date1)->where('date','<=', $this->date2);

//        }
//        $contribuable = RctContribuable::find($payements->first()->contribuable_id)->get('libelle');

//     return $payements;
// }
public function headings(): array
{
    return [
        ['Situation des paiements des contribuables '.$this->annee],
        ["Contribuable ", "Date", "Montant"]];
}
public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            //2    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
           // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
           // 'C'  => ['font' => ['size' => 16]],
        ];
    }
    public function view():View
  {

    $contribuable = '';
    $payements = RctPayement::where('annee', $this->annee)->where('etat','<>',3)->where('montant','<>',0)
        ->select('contribuable_id', 'date', DB::raw('SUM(montant) as montants'))
        ->groupBy('contribuable_id')
        ->groupBy('date')->get();
    if ($this->contr != 'all') {
        $payements = $payements->where('contribuable_id', $this->contr);
        $contribuable = RctContribuable::find($payements->first()->contribuable_id);
        //dd($payements->first()->contribuable_id);
    }
    if ($this->date1 != 'all' and $this->date2 != 'all'){
        // $payements = $payements->where('date', '>=',$date1 )->where('date', '<=', $date2);
        $payements = $payements->where('date','>=', $this->date1)->where('date','<=', $this->date2);
    }
    $idc = env('APP_COMMUNE');
   // $commune = RefCommune::find($idc);
//        $entete_id = EnteteCommune::where('commune_id', $idc)->get()->first()->id;
//        $entete = EnteteCommune::find($entete_id);
    $lib = trans("recette::text_me.suiviContribuable1");
//        $conreoller = new EmployeController();
//        $enetet = $conreoller->entete(  $lib.' '.$annee);
    $enetet='';
    $html = '';
    $html .= $enetet;
    if ($this->contr != 'all' or ($this->date1 != 'all' and $this->date2 != 'all'))
    {
        $html .= '<div class="filter">
             <table width="100%" >
                <tr><td>' . trans("recette::text_me.filtrage") . ' :</td></tr>
                <tr>
                    <td>';
        if ($this->contr != 'all') {
            $html .= '' . trans("recette::text_me.contribuable") . ' :<b>' . $contribuable .'</b>';
        }
        if ($this->date1 != 'all' and $this->date2 != 'all') {

        }
        $html .= '</td>
            </tr>
            </table>
            </div><br>';
    }
    $montants=0;
    $html .='<table  width="100%" class="normal" >
            <thead>
            <tr bgcolor="#add8e6">
            <th><b>'.trans("recette::text_me.contribuable") .'</b></th>
            <th><b>'. trans("recette::text_me.date") .'</b></th>
            <th><b>'. trans("recette::text_me.montant") .'</b></th>
            </tr>
            </thead>
            <tbody>';
            $contr= collect();
    foreach ($payements as $payement)
    {

        $contr->push(RctContribuable::find($payement->contribuable_id));
        $montants +=$payement->montants;
    }
        return view('recette::contribuables.exports.suiviepayementspdf', [
            'payements'=>$payements ,'contr'=>$contr , 'montants'=> $montants
        ]);
    }
}
