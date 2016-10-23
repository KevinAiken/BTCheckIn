var source   = $("#card-template").html();
var template = Handlebars.compile(source);

function card(img, name, value) {
    var status;
    
    if (value == 0) {
        status = name + " is not here";
        //$(".card").addClass("darken");
    } else {
        status = name + " is here";
	//$(".card").removeClass("darken"); 
   }
    
    var context = {img: img, name: name, status: status};
    $("#center-cards").append(template(context));
}
