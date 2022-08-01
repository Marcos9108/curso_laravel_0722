$(document).ready(function () {

    //Funcion para evento de checked de input activo

    $('#activo').on('change', function(){
        this.value = this.checked ? 1 : 0;
    }).change();


});
