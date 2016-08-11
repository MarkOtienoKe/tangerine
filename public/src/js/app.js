
var siteId = 0;
var postBodyElement = null;
$('.mark').find('.edit').on('click', function(event){
	event.preventDefault();
	
 var siteName =  event.target.parentNode.parentNode.children[1].textContent;
 var siteLandmark =  event.target.parentNode.parentNode.children[2].textContent;
  var siteLongitude =  event.target.parentNode.parentNode.children[4].textContent;
  var siteLatitude =  event.target.parentNode.parentNode.children[3].textContent;
  var siteSize =  event.target.parentNode.parentNode.children[5].textContent;
  var sitePrice =  event.target.parentNode.parentNode.children[6].textContent;
  var siteStatus =  event.target.parentNode.parentNode.children[7].textContent;
 

 siteId = event.target.parentNode.parentNode.childNodes[1].textContent;
	$('#site_nameId').val(siteName);
	$('#landmarkId').val(siteLandmark);
  $('#latitudeId').val(siteLatitude);
	$('#longitudeId').val(siteLongitude);
	$('#sizeId').val(siteSize);		
	$('#priceId').val(sitePrice);
    $('#statusId').val(siteStatus);

	$('#edit-modal').modal();
});

/*
* Closes the edit Modal after editing.
*
* */
$('#modal-save').on('click', function (){

 $.ajax({
  method:'POST',
  url: urlEdit,
  data:  {
        site_name:$('#site_nameId').val(),
  			landmark:$('#landmarkId').val(),
        latitude:$('#latitudeId').val(),
  			longitude:$('#longitudeId').val(),
  			size:$('#sizeId').val(),
  			price:$('#priceId').val(),
        status: $('#statusId').val(),
         siteId:siteId, 
         _token:token}

 }).done(function (msg) {
       
      $('#edit-modal').modal('hide');


     });


});

 function htmlbodyHeightUpdate(){
    var height3 = $( window ).height()
    var height1 = $('.nav').height()+50
    height2 = $('.main').height()
    if(height2 > height3){
      $('html').height(Math.max(height1,height3,height2)+10);
      $('body').height(Math.max(height1,height3,height2)+10);
    }
    else
    {
      $('html').height(Math.max(height1,height3,height2));
      $('body').height(Math.max(height1,height3,height2));
    }
    
  }
  $(document).ready(function () {
    htmlbodyHeightUpdate()
    $( window ).resize(function() {
      htmlbodyHeightUpdate()
    });
    $( window ).scroll(function() {
      height2 = $('.main').height()
        htmlbodyHeightUpdate()
    });
  });


$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
     $("#menu-toggle-2").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled-2");
        $('#menu ul').hide();
    });
 
     function initMenu() {

      $('#menu ul').hide();
      $('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
      $('#menu li a').click(
        function() {
          var checkElement = $(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
            }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
            }
          }
        );
      }
    $(document).ready(function() {initMenu();});
