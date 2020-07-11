jQuery(document).ready(function($) {

$(".form").submit(function() {
var str = $(this).serialize();

$.ajax({
type: "POST",
url: "https://antnnks.ru//contact.php",
data: str,
success: function(msg) {
if(msg == 'OK') {
result = '<p>Ваш заказ принят</p>';
$(".fields").hide();
} else {
result = msg;
}
$('.note').html(result);
}
});
return false;
});
});