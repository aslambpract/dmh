    <div class="card imagebg1 fillheight">
        <div class="card-heading"></div>

        <div class="card-body">
            <div class="text-center mb-3 py-2">
                <h2 class="font-weight-semibold mb-1 ">{{trans('Principal')}}</h2>
                <table class="table table-bordered text-left" >
                   

                   <!--  @if(isset($wallet_data->balance_amount))
                    <tr>
                        <th>BALANCE:</th>
                        <td>{{$wallet_data->balance_amount/100000000}}</td>
                    </tr>
                    <tr>
                        <th>ADDRESS:</th>
                        <td>{{$payout_wallet}}</td>
                    </tr>
                    <tr>
                        <th>PENDING BALANCE:</th>
                        <td>{{$wallet_data->pending_received_amount/100000000}}</td>
                    </tr>
                    <tr>
                        <th>PAID OUT:</th>
                        <td>{{ ($wallet_data->sent_amount + $wallet_data->pending_sent_amount) / 100000000}}</td>
                    </tr>
                    @else
                    <tr>
                        <th>Message</th>
                        <td>{{ $wallet_data}}</td>
                    </tr>

                    @endif -->
                    
                    </table>
            </div>
        </div>
    </div>