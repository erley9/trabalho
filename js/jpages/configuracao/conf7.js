$(document).ready(function($) {

    var quantidade = $("#fotos").children('figure').length;

    if(quantidade>28){

    $("div.holder").jPages({
        containerID  : "fotos",
        perPage      : 28,
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