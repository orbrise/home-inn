<script>
$(document).ready(function() {

var csrf = $('meta[name="_token"]').attr('content');

$("button#addtocart").unbind('click').click(function() {

	var prodid = $(this).attr('prod');
	$.post("{{ url('/addtocart') }}", {
		_token: csrf,
		prodid: prodid
	}, function(data) {
		$("#insertcart").html(data);
		$("div.dropdown").addClass(' dropdown-cart open');
		$("#insertcart").html(data);
		$.post("{{ url('/getcartinfo1') }}", {
			_token: csrf
		}, function(data1) {
			$("span#mc").html(data1);

		});
	});
});

$("button#addtocartcheck, #buytocartcheck").unbind('click').click(function() {
	var buy = $(this).attr('id') === 'buytocartcheck' ? 1 : 0;
	if ($("select#priceoption").val() == 'none') {
		$("select#priceoption").addClass("border");
		$("html, body").animate({
			scrollTop: 0
		}, "slow");

		return false;
	}
	var prodid = $(this).attr('prod');
	var rprice = $("input#rprice").val();
	@if(isset( $prod))
	rprice = rprice ? rprice : '{{ $prod->d_price > 0 ? $prod->d_price : $prod->r_price}}';
	@endif
	var qty = $("input#qtyp").val();
	var options = $("select#priceoption option:selected").val();
	$.post("{{ url('/addtocart1') }}", {
		_token: csrf,
		prodid: prodid,
		rprice: rprice,
		qty: qty,
		options: options
	}, function(data) {
		if(buy){
			window.location.href = '{{ url("/checkout") }}';
			return false;
		}
		$("#insertcart").html(data);
		$("div.dropdown").addClass(' dropdown-cart open');
		$.post("{{ url('/getcartinfo1') }}", {
			_token: csrf
		}, function(data1) {
			$("span#mc").html(data1);

		});
	});
});

$("a#delrowcart").unbind('click').click(function() {

	var rowid = $(this).attr('data');
	$.post("{{ url('/deltocartitem') }}", {
		_token: csrf,
		rowid: rowid
	}, function(data) {
		$("ul#" + rowid).remove();

		$.post("{{ url('/getcartinfo') }}", {
			_token: csrf
		}, function(cartdata) {
			$("div#cartinfo").html(cartdata);
		});

		$.post("{{ url('/updatecartpopup') }}", {
			_token: csrf
		}, function(cartpopup) {
			$("#insertcart").html(cartpopup);
		});

		console.log($("ul.cart-details").lenght);
		if ($("ul.cart-details").length == 0) {
			$("i#carticon").removeClass();
			$("i#carticon").addClass('icon-basket');
		}


	});


});

$("input#cartqty").unbind('change').change(function() {

	var rowid = $(this).attr('data');
	var qty = $(this).val();

	$.post("{{ url('/updatetitemqty') }}", {
		_token: csrf,
		rowid: rowid,
		qty: qty
	}, function(data) {
		$("span#priceupdate" + rowid).html(data);

		$.post("{{ url('/getcartinfo') }}", {
			_token: csrf
		}, function(cartdata) {
			$("div#cartinfo").html(cartdata);
		});

		$.post("{{ url('/updatecartpopup') }}", {
			_token: csrf
		}, function(cartpopup) {
			$("#insertcart").html(cartpopup);
		});

	});


});

$("a#addtowishlist").unbind('click').click(function() {

	alertify.set('notifier', 'position', 'top-right');
	var prodid = $(this).attr('wishprod');
	$.post("{{ url('/addtowishlist')}}", {
		_token: csrf,
		prodid: prodid
	}, function(data) {

		if (data == 'yes') {
			alertify.success('Added to Wishlist, you can view from your dashboard');
		} else {
			alertify.error('You need to login or try later');
		}
	});


});


//end

});

</script>