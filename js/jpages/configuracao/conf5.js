$(document).ready(function($) {

    var quantidade = $(".clientes").children('div').length;

    if(quantidade>4){

    $("div.holder").jPages({
        containerID  : "container-orcamentos",
        perPage      : 10,
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