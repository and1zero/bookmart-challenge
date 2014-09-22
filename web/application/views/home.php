	<!-- BANNER -->
	<div class="banner col-sm-12" style="background-image:url('<?= $banner['image']?>');height:140px;">
				<div class="col-sm-3 col-sm-offset-8">
					<p>
						<?= $banner['text'] ?>
					</p>
					<p><a href="<?= $banner['link'] ? $banner['link'] : '#' ?>">+ View Promotion</a></p>
				</div>
			</div>
			<div class="clearfix"></div>

			<!-- CAROUSEL -->
			<div class="carousel row hidden-xs hidden-sm"><!-- hide it in small devices -->
				<div class="col-md-10 display inner">
					<div class="item">
						<img src="images/slider1.png"/>
					</div>
					<div class="item">
						<img src="images/slider2.png"/>
					</div>
					<div class="item">
						<img src="images/slider3.png"/>
					</div>
					<div class="item">
						<img src="images/slider4.png"/>
					</div>
				</div>
				<div class="col-md-2 list-control inner">
					<ol>
						<li data-slide-to="0" class="active"><img src="images/slider1.png"/></li>
						<li data-slide-to="1"><img src="images/slider2.png"/></li>
						<li data-slide-to="2"><img src="images/slider3.png"/></li>
						<li data-slide-to="3"><img src="images/slider4.png"/></li>
					</ol>
				</div>
			</div>

			<!-- BOOKCASE -->
			<div class="bookcase row">
				<div class="col-sm-12">
					<h4>OUR BOOKS</h4>
					<ul>
						<li><img src="images/book_sm1.png"/></li>
						<li><img src="images/book_sm2.png"/></li>
						<li><img src="images/book_sm1.png"/></li>
						<li><img src="images/book_sm2.png"/></li>
						<li><img src="images/book_sm1.png"/></li>
						<li><img src="images/book_sm2.png"/></li>
						<li><img src="images/book_sm1.png"/></li>
						<li><img src="images/book_sm2.png"/></li>
						<li><img src="images/book_sm1.png"/></li>
					</ul>
			</div>
			</div>

			<!-- FOOTER TABLE -->
			<table class="footer-table table">
				<thead>
					<tr>
						<th>DEAL<br/> MART</th>
						<th>CUSTOMER<br/> SERVICE</th>
						<th>MEET US<br/> ON</th>
						<th>PAYMENT</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<ul>
								<li><a href="#">HOME</a></li>
								<li><a href="#">ABOUT US</a></li>
								<li><a href="#">USER AGREEMENT</a></li>
								<li><a href="#">PRIVACY</a></li>
								<li><a href="#">CONTACT US</a></li>
							</ul>

						</td>
						<td>
							<ul>
								<li><a href="#">CUSTOMER SERVICE</a></li>
								<li><a href="#">PRODUCT RECALLS</a></li>
								<li><a href="#">ORDER STATUS & TRACKING</a></li>
								<li><a href="#">SHIPPING POLICY</a></li>
								<li><a href="#">WARRANTY</a></li>
								<li><a href="#">TIPS & ADVICE</a></li>
							</ul>
						</td>
						<td>
							<ul>
								<li><a href="#">FACEBOOK</a></li>
								<li><a href="#">TWITTER</a></li>
								<li><a href="#">YOUTUBE</a></li>
								<li><a href="#">GOOGLE +</a></li>
							</ul>
						</td>
						<td>
							<ul class="icons">
								<li><i class="icon-visa"></i></li>
								<li><i class="icon-master"></i></li>
								<li><i class="icon-cod"></i></li>
								<li><i class="icon-paypal"></i></li>
								<li><i class="icon-amex"></i></li>
								<li><i class="icon-maestro"></i></li>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
