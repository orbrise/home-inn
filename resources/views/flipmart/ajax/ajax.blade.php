<script>
$(document).ready(function() {
    var csrf = $('meta[name="_token"]').attr('content');

    $("select#priceoption").unbind('change').change(function() {
        if ($(this).val() == 'none') {
            var pr = $('input#prprice').val();
            $("span#price").html(pr);
        } else {
            $("span#price").html('loading..');
            var val = $(this).val();
            var prodid = $("input#prod_id").val();
            $.post("{{ url('/getpriceforthisoption')}}", {
                _token: csrf,
                val: val,
                prodid: prodid
            }, function(data) {
                console.log(data);
                $("span#price").html(data);
                $("#hideinput").html("<input type='hidden' id='rprice' value='" + data + "'>");
                $("a#upprice").attr('href', 'https://homes-inn.com/buynow/' + prodid + '/' + data);

            });
        }

	});


});

</script>