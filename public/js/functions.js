/**
 * Created by e11en on 8/31/15.
 */
<!-- set delay of message if not important -->
$('div.alert').not('.alert-important').delay(3000).slideUp(300);

$(document).ready(function(){
    $('.capital-first').keyup(function(){
        this.value = ucFirstLetter(this.value);
    });

    $('.capital-whole').keyup(function(){
        this.value = ucWord(this.value);
    });
});

function ucFirstLetter (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function ucWord(str) {
    return str.toUpperCase();
}

function selectAll(id) {
    $('#'+id+' option').prop('selected', true);
}