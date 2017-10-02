		<footer class="footerContainer">
			<div>
				<div class="links">
					<img src="./lib/img/paw.png" alt="paw pic">
			  	<img src="./lib/img/facebook.jpeg" alt="facebook logo">
				</div>
				<!-- Disclaimer for photos -->
			  <p class="disclaimer">Disclaimer: All graphics are used for educational purposes only, and not for profit, in accordance with the Fair Use Act. All trademarks, trade names, or logos mentioned or used are the property of their respective owners. It will be removed at the request of copyright owner(s).</p>
				<p class="disclaimer">&copy; <?= date('Y') ?> Lesly Perez</p>
			</div>
		</footer>
		<!-- call jquery plugin -->
		<script 
			src="http://code.jquery.com/jquery-3.2.1.min.js" 
			integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			crossorigin="anonymous">
		</script>
		<script 
			src='./lib/js/jqueryvalidate.js'>
		</script>	
		<script>
			$('#contactForm').validate()
		</script>
	</body>
</html>