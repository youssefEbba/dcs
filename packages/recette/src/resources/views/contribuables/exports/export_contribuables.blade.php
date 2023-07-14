


        <table class="table-export">

            <tr>
                <th>Contribuable</th>
                <th>Date</th>
                <th>Montants</th>
            </tr>

            <tbody>
            @foreach($payements as $payement)

                <tr>
                    <td>{{ $contribualbe->libelle}}</td>
                    <td>{{ $payement}}</td>
                    <td>{{$payement->montants}}</td>

                </tr>

            @endforeach

            </tbody>
        </table>




