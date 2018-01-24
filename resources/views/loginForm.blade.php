<!--login-->
	    <div id="loginModal" class="modal">
	        		<div class="modal-content">
	        			<form method="post" action={{$loginOrSign}}>
							<!-- start of login -->
							<div class="input-field center-align">
								<button class="btn btn-large"><i class="fa fa-user"></i></button>
								<input id="login" name="login" type="text"/>
							</div>
						<!-- end of login -->
						<!-- start of password -->
							<div class="input-field center-align">
								<button class="btn btn-large"><i class="fa fa-lock"></i></button>
								<input id="password" name="password" type="password"/>
							</div>
						<!-- end of password -->
						<!-- start of login btn-->
							<div class="right-align">
							<label for="submit" class="btn blue"><i class="fa fa-check"></i></label>
							<input type="submit"  style="display:none"id="submit"/>
							</div>
						<!-- end of login btn -->
						 <!-- csrf -->
					        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
					     <!--csrf-->
						
						</form>
	        		</div> 		
	         	</div>
<!--login-->
