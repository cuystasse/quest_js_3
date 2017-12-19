// Met à jour le message affiché à l´adversaire à chaque nouvelle
// lettre saisie dans l´input ´Mon nom´
$("#moi").keyup(function (event) {
    var myName = $("#moi").val();
    $("#megaphone").text(promptMessage(myName));
    $('.button-play').prop('disabled', false);
});

$('.button-play').on('click', function (e) {
    if (!$(this).attr('disabled')) {
        $('.qg').text('QG de ' + $("#moi").val());
        $(this).fadeOut();
        $('#moi').fadeOut();
        $(this).after('<p>Last action :</p>');
    }
});

// Génère le message diffusé à l´adversaire
function promptMessage(playerName) {
    if (playerName.length > 0) {
        return ">> " + playerName + " va attaquer en ...";
    } else {
        return "> En attente d'un joueur";
    }
}

// Click on tab
$('td').on('click', function () {
    if (!$(this).hasClass('used')) {
        $(this).addClass('used');
        result = response($(this));
        $('#history').text($(this).attr('id') + ' targeted... ' + result);
    }

    // Win
    if ($('table td[data-content=0]').length === $('table td').length) {
        $('#no-mans-land').prepend('<p class="win">WIN<p>');
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/sound.mp3');
        audioElement.play();
    }
});

function response(location) {
    ship = location.data('content');
    if (ship > 0) {
        result = 'touché';
        location.attr('data-content', 0);
        location.text('X');
    } else {
        result = 'plouf';
    }

    alives = $('table td[data-content=' + ship + ']').length;
    console.log(alives);
    if (alives < 1) {
        result = 'coulé : ship ' + ship + ' has been destroyed.';
    }
    ;

    return result;
}
