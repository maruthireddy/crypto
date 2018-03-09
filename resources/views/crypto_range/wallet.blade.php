@include('crypto_range/header')
<!----<style>
.input-field{
  padding: 0 .5em 2em;
}
.input-field.half{
  flex: 1 0 50%;
}
.input-field.full{
  flex: 2 0 100%;
}
label{
  display: block;
  position: relative;
  z-index: -9;
  top: 1.5rem;
  color: rgba(255,255,255,.4);
  font-size: .875rem;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 2px;
  transition: top .3s ease, color .3s ease;
}
label.raised{
  top: 0rem;
}
label.highlight{
  color: rgba(255,255,255,.6);
}

[type="text"],
[type="email"]{
  color: rgba(255,255,255,.4);
  font-family: "proxima-nova";
  padding: .25rem 0 0;
  font-size: 1.25rem;
  font-weight: 400;
  width: 100%;
  border: none;
  border-bottom: 1px solid;
  background: none;
  transition: color .3s ease;
}
[type="text"]:focus,
[type="email"]:focus{
  color: rgba(255,255,255,1);
  outline: 0;
}
</style>--->

<style>
 div.ex1 {
    background-color: ;
    width: 100%;
    height: 100%;
    overflow: scroll;
}
table caption {
	padding: .5em 0;
}

table.dataTable th,
table.dataTable td {
  white-space: nowrap;
}
</style>
 <div class="right_col" role="main"><br/>

          <div class="" style="margin-top:90px;">

           

			             <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Bitcoin Wallet</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content ex1">
						
          @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        			@if($errors->any())
              <div class="alert alert-danger">
				 @foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	 @endforeach
                               </div>

				@endif
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                           

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                       <!-- start user projects -->
			<div class="col-md-12 button_set_one two" style="margin-top:20px;">
              <div class="col-md-8">
                <p style="font-size:16px;"> Wallet Balance : <b id="wal_bal"> <span>{{$available_balance}}</span></b></p>
                <p style="font-size:16px;"> Wallet Address : <b id="wallet_id"> <span>{{$bitcoin_address}}</span></b></p>
              </div>
              <div class="col-md-4">
                <button type = "button" class = "btn btn-success" data-toggle="modal" data-target="#gridSystemModal">DEPOSIT</button>
                <button type = "button" class = "btn btn-primary" data-toggle="modal" data-target="#gridSystemModal1">WITHDRAW</button>
              </div>

			  <!--modal for deposit-->
			  	<div class="modal fade" id="gridSystemModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<center><h4 class="modal-title" id="gridSystemModalLabel">Your Crypto BTC address</h4></center>
									</div>
									<div class="modal-body">

                  <center>  <img src="{{'/'.Session::get('user')->qr_code}}" alt=""></center>
                  <center><p><b style="color:red">IMPORTANT :</b> Send only BTC to this deposit address.
                      Sending any other currency to this address may result in the loss of your deposit.</p> </center>
                    </div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
			  <!--modal ends for deposit-->
			  <!--modal for withdraw-->
			  	<div class="modal fade" id="gridSystemModal1" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<center><h4 class="modal-title" id="gridSystemModalLabel">Withdraw BTC To Address</h4><h4 class="modal-title" id="balance"></h4></center>
									</div>
									<div class="modal-body">

                  <form action="/crypto_range/withdraw" method="post">

                        {{ csrf_field() }}
									<div class="input-field half">
										<label for="lastName">BTC Wallet Address</label><i class="fa fa-address"></i>
										<input class="form-control" name="address" id="baddress" type="text">
									  </div>

									  <div class="input-field half">
										<label for="lastName">Amount in BTC</label>
										<input class="form-control" name="amount" id="bamount" type="text">
									  </div>
									 <!-- <div class="input-field half">
										<label id="transaction_fee"></label></br>
										<label id="message" style="color:red"></label>
                  </div>--->
										<div class="input-field full">
										<label for="email">Password</label>
										<input class="form-control" name="password" id="bpwd" type="text">
                  </div></br>
									  <div class="input-field full">
										<input class="btn btn-success" id="withdraw" type="submit" value="Withdraw BTC">
									  </div>

                    </form>

									  </div>

									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
                         						   
                            <table class="table" style="margin-top:40px;">
    							<thead>
    								<tr>
    								  <th id='date'>Date</th>
    								  <th id='sent'>Sent</th>
    								  <th id='status'>Recieved</th>

    								</tr>
    							</thead>
    							<tbody id="tx_disp">
    								@foreach($sent as $s)
    								<tr>

    									<td><?php echo date("d-m-Y", $s->time); ?></td>
    									<td>{{$s->amounts_sent[0]->amount}}</td>
    									<td><span>---</span></td>
    								</tr>
    								@endforeach
    								@foreach($received as $s)
    								<tr>

    									<td><?php echo date("d-m-Y", $s->time); ?></td>
    									<td><span>---</span></td>
    									<td>{{$s->amounts_received[0]->amount}}</td>
    								</tr>
    								@endforeach
    							</tbody>
    						</table>
                          </div>
                        </div>
                      </div>
		</div>

	</div>

@include('crypto_range/footer')
