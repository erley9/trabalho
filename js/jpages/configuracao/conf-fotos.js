$(document).ready(function($) {
    $("div.holder").jPages({
        containerID  : "container-fotos",
        perPage      : 15,
        startPage    : 1,
        startRange   : 1,
        midRange     : 5,
        endRange     : 1,
        first       : "Primeira",
        previous    : "Anterior",
        next        : "Proxima",
        last        : "Ultima"
    });	
});