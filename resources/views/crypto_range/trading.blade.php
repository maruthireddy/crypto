@include('crypto_range/header')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<style>

table caption {
	padding: .5em 0;
}

table.dataTable th,
table.dataTable td {
  white-space: nowrap;
}
</style>
<style>

table caption {
	padding: .5em 0;
}

table.dataTable th,
table.dataTable td {
  white-space: nowrap;
}
    div.ex1 {
    background-color: ;
    width: 100%;
    height: 100%;
    overflow: scroll;
}
</style>
 <div class="right_col" role="main"><br/>

          <div class="" style="margin-top:100px;">

           

			             <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Tradings</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                         
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                           

                          </div>
                          <div role="tabpanel" class="tab-pane fade ex1" id="tab_content3" aria-labelledby="profile-tab">
                                       <!-- start user projects -->
                           <table  class="table  table-responsive" >

        <thead>
          <tr>
            <th>Trading ID</th>
            <th>Plan</th>
            <th>Amount</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Profit Earned</th>
			<th>Balance</th>
			<!-- <th>Withdrawn Amount</th> -->
			<th>Status</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
        	@foreach($investment as $i)
				<tr>
					<td>{{$i->investment_id}}</td>
					<td>{{$i->plan_name}}</td>
					<td>{{$i->amount_usd}}</td>
					<td>{{$i->start_date}}</td>
					<td>{{$i->end_date}}</td>
					<td>{{$i->profit_earned}}</td>
					<td>{{$i->balance_amount}}</td>
					<!-- <td>{{$i->witdraw_amount}}</td> -->
					<td>{{$i->status}}</td>
					<!-- <td><button class="btn-sm btn-success show_bal">Withdraw</button></td> -->
				</tr>
        	@endforeach

        </tbody>

      </table>
                          </div>
                        </div>
                      </div>
		</div>

	</div>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
$('table').DataTable({
	'searching': true
});

	$(".show_bal").click(function(){
		var trading_id=$(this).parent().parent().children('.trading_id').html();
		 $.ajax({
             url:"http://localhost/coin_web1/api/register_api.php",
                data: "action=show_inv_bal&trading_id=" + trading_id,
                method: "POST",
                type: "POST",
                dataType: "json"
            }).done(function(data) {
				console.log(data);
                if (data.status == "success") {
				var currdate=new Date(data.response.disp[0].date);
				var end_date=new Date(data.response.disp[0].end_date);

					if(currdate>=end_date){
					$("#amt_usd").html('Eligible Wihdrawable Amount in USD $'+(parseFloat(data.response.disp[0].balance)+parseFloat(data.response.disp[0].principle)));
					}else{
					$("#amt_usd").html('Eligible Wihdrawable Amount in USD $'+(parseFloat(data.response.disp[0].balance)));
					}
					} else {

                }

            }).always(function(data){
						console.log(data);
			});

			$("#wihtdraw_amt").keyup(function(){
				var wihtdraw_amt=$("#wihtdraw_amt").val();
				if(wihtdraw_amt>=10 && wihtdraw_amt!=NaN){
				$.ajax({
				 url:"http://localhost/coin_web1/api/register_api.php",
					data: "action=show_inv_bal&trading_id=" + trading_id,
					method: "POST",
					type: "POST",
					dataType: "json"
				}).done(function(data) {
					console.log(data);
					if (data.status == "success") {
					var currdate=new Date(data.response.disp[0].date);
					var end_date=new Date(data.response.disp[0].end_date);
					if(currdate>=end_date){
					if((parseFloat(data.response.disp[0].balance)+parseFloat(data.response.disp[0].principle))>=10 && parseFloat(wihtdraw_amt)<=(parseFloat(data.response.disp[0].balance)+parseFloat(data.response.disp[0].principle))){
							$("#withdraw_balance").prop('disabled',false);
							$("#bal_msg").html("");
						} else {

							$("#bal_msg").html("You cannot wihdraw more than available balance");
							$("#withdraw_balance").prop('disabled',true);
						}

					}else{
						/*if((parseFloat(data.response.disp[0].balance))>=10){
							$("#withdraw_balance").prop('disabled',false);
						} else {
							$("#bal_msg").html("You cannot wihdraw less than $10");
						}*/

					}

					}

				}).always(function(data){
					console.log(data);
				});
				}else{
						if(wihtdraw_amt==NaN || wihtdraw_amt==""){
						$("#bal_msg").html("");
						}else{
						$("#bal_msg").html("You cannot wihdraw less than $10");
						}
				}
			});
			var settings = {
			  "async": true,
			  "crossDomain": true,
			  "url": "https://blockchain.info/ticker",
			  "method": "GET",
			}
			$.ajax(settings).done(function (response) {
			  console.log(response);
		});

})
});
</script>
@include('crypto_range/footer')
