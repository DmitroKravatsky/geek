/**
 * Created by dima on 13.08.17.
 */
$('#modal').click(function () { //
    var variable = function(){
        var result = [];
        $('form .form-group').clone().each(function(num,elem){
            if($(elem).find('#load').length>0) return;
            $(elem).find('input').attr('disabled','disabled');
            result.push(elem);
        })
        return result;
    }
    $('#myModal .modal-body').html(variable);
})