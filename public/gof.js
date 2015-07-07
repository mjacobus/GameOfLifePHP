$(document).ready(function () {

    $('#board').html('');

    $('form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();

        $('#log').html('');

        $.ajax({
            type: 'POST',
            data: data,
            success: function (response) {
                if (typeof(response) === 'string') {
                    response = $.parseJSON(response);
                }

                var interval = $('input[name="interval"]').val();
                interval = parseInt(interval);
                renderGenerations(response.generations, interval);
            }
        });
    });

    function renderGenerations(generations, interval) {
        setTimeout(function () {
            if (generations.length > 0) {
                var generation = generations.shift();
                log();
                renderNeighbourhood(generation);
                renderGenerations(generations, interval)
            }
        }, interval);
    }

    function renderNeighbourhood(neighbourhood) {
        var html = [];

        for (var i = 0; i < neighbourhood.length; i++) {
            html.push(getRowHtml(neighbourhood[i]));
        }

        $('#board').html(html.join(''));
    }

    function getRowHtml(row) {
        var html = ['<div class="row">'];

        for (var i = 0; i < row.length; i++) {
            html.push(getCellHtml(row[i]));
        }

        html.push('</div>');

        return html.join('');
    }

    function getCellHtml(isAlive) {
        if (isAlive) {
            return '<div class="cell alive"></div>';
        }

        return '<div class="cell"></div>';
    }

    function log() {
        $('#log').append('<p>Rendered generation</p>');
    }
});
