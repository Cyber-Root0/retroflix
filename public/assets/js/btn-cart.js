$(".btn-decremento").on("click", function() {
	
    var idFilme = $(this).attr("data-id");
    var divPai = $(this).closest(".div.d-flex");
    var NumeroDias = divPai.find("input").val();
    if (NumeroDias>1){
        updateDias("decremento", idFilme, NumeroDias, divPai.find("input"));
    }
});

$(".btn-incremento").on("click", function() {
    var idFilme = $(this).attr("data-id");
    var divPai = $(this).closest(".div.d-flex");
    var NumeroDias = divPai.find("input").val();
    if (NumeroDias>=0){
        updateDias("incremento", idFilme, NumeroDias, divPai.find("input"));
    }

});

function updateDias(action, id_filme, NumeroDias, element){
    
    if (action == "decremento"){
        NumeroDias--;
        element.val(NumeroDias);
    }else{
        NumeroDias++;
        element.val(NumeroDias);
    }
    //atualização do subtototal
    $.ajax({
        url: 'update.php',
        type: 'GET',
        data: {
          id: id_filme,
          qtyDays: NumeroDias
        },
        success: function(response) {
         
        },
        error: function(xhr, status, error) {
          
        }
    });   

}