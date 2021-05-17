$(document).ready(function () {
    console.log('hahahahahahahahahahahahahaha')
    $('.deleteAnimal').on('submit', function (event) {
        event.preventDefault();
        $.post('/animaux/delete', {id: $(this).find('.deleteAnimalId').val()})
            .done(function (resultat) {
                console.log($(resultat))
                $('.animaux-container').html($(resultat).html())
            })
    })
})