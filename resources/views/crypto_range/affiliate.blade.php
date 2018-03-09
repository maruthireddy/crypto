@include('crypto_range/header')
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

          <div class="" style="margin-top:90px;">

           

			             <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Affiliate</a>
                          </li>
                        </ul>
           <div id="myTabContent" class="tab-content scrollbar1 ex1">
          <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
            <div class="col-md-12 button_set_one two" style="margin-top:20px;">
              <div class="col-md-12">
                <!-- <p style="font-size:20px;"> There is no people on your side</p> -->
                <p style="font-size:20px;"> Total money your referrals lent: <b>{{$total_lend}}</b></p>
                <p style="font-size:20px;"> Total commission: <b>{{$total_amount}}</b></p>
              </div>
              <div class="col-md-12">
                <table class="table" style="margin-top:40px;">
    							<thead>
    								<tr>
    								  <th>Ref level</th>
    								  <th>Total affiliates</th>
    								  <th>Total lend amount</th>
    								  <th>Total commission</th>
    								</tr>
    							</thead>
    							<tbody>
                    <?php $i=1; ?>
                    @foreach($transfers as $t)
    								<tr>
    								  <th scope="row"><?php echo $i ?></th>
    								  <td>{{$t->first_name.' '. $t->last_name}}</td>
    								  <td>{{$t->amount_usd}}</td>
    								  <td>{{$t->transfer_amount}}</td>
                      <?php $i++; ?>
    								</tr>
                    @endforeach
    							</tbody>
    						</table>
              </div>
            </div>
            <div class="col-md-12">
            </div>
          </div>
          <!-- <div role="tabpanel" class="tab-pane fade in" id="profile" aria-labelledby="profile-tab">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
          </div> -->
        </div>
                      </div>
		</div>

	</div>

@include('crypto_range/footer')
