$(function () {
    readNote();
    setInterval('readNote()', 1000);
    $('form > input[type="submit"]').click(function (e) {
        e.preventDefault();
        writeNote();
    });
});

function writeNote() {
    $.ajax({
        method: 'POST',
        url: 'node.php',
        data: {type: 'write', name: $('form > input[type="text"]').val(), myNote: $('form > textarea').val() }
    }).complete(function (msg) {
        $('.main').html(msg);
    });
}

function readNote() {
    $.ajax({
        method: 'POST',
        url: 'node.php',
        data: {type: 'read'}
    }).done(function (msg) {
        $('.main').html(msg);
    });
}