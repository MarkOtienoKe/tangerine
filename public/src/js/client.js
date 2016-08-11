var clientId = 0;
var userId =0;
var postBodyElement = null;
$('.markk').find('.update').on('click', function(event){
event.preventDefault();

var clientName =  event.target.parentNode.parentNode.children[1].textContent;
var clientEmail =  event.target.parentNode.parentNode.children[2].textContent;
var clientPhone =  event.target.parentNode.parentNode.children[3].textContent;

clientId = event.target.parentNode.parentNode.childNodes[1].textContent;
$('#client_nameId').val(clientName);
$('#emailId').val(clientEmail);
$('#phone_noId').val(clientPhone);

$('#modal-edit').modal();
});

$('#save-modal').on('click', function (){
$.ajax({
method:'POST',
url: urlEdit,
data:  {
client_name:$('#client_nameId').val(),
email:$('#emailId').val(),
phone_no:$('#phone_noId').val(),
clientId:clientId,
userId:userId,
_token:token}

}).done(function (msg) {

$('#modal-edit').modal('hide');
});
});
