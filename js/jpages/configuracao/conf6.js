$(document).ready(function($) {

    var quantidade = $("#galeria").children('li').length;

    if(quantidade>8){

    $("div.holder").jPages({
        containerID  : "galeria",
        perPage      : 8,
        startPage    : 1,
        startRange   : 1,
        midRange     : 5,
        endRange     : 1,
        first       : "Primeira",
        previous    : "Anterior",
        next        : "Proxima",
        last        : "Ultima"
    });	
}
});