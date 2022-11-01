<div class="section tiendo">
	<div class="container content">
		<div class="col-lg-6">
			<h2>{{$val->name}}</h2>
			{!! $val->content !!}
		</div>
		<div class="col-lg-6">
			<div class=" dangky">
		        <h2>REGISTER INFORMATION</h2>
		        <form action="" method="post">
		            <input type="text" name="name" class="form-control" placeholder="Your Name">
		            <input type="text" name="phone" class="form-control" placeholder="Phone number">
		            <input type="email" name="email" class="form-control" placeholder="Email">
		            <p><div class="g-recaptcha" data-sitekey="6LfsErkiAAAAABhpVqPBI85ByiHOUvdQ-h2TT_X2"></div></p>
		            <button class="form-control" type="submit">REGISTER</button>
		        </form>
		    </div>
		</div>
	</div>
</div>