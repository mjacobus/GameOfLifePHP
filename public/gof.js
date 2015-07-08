var Renderer = {
    currentGeneration: 0,

    render: function (gof) {
        this.currentGeneration = 0;
        this.renderGenerations(gof.generations, gof.interval);
    },

    renderGenerations: function (generations, interval) {
        generations = generations.slice(0);
        var self = this;

        setTimeout(function () {
            if (generations.length > 0) {
                var generation = generations.shift();
                self.renderLog();
                self.renderNeighbourhood(generation);
                self.renderGenerations(generations, interval)
            }
        }, interval);
    },

    renderNeighbourhood: function (neighbourhood) {
        var html = [];

        for (var i = 0; i < neighbourhood.length; i++) {
            html.push(this.getRowHtml(neighbourhood[i]));
        }

        this.container.html(html.join(''));
    },

    getRowHtml: function (row) {
        var html = ['<div class="row">'];

        for (var i = 0; i < row.length; i++) {
            html.push(this.getCellHtml(row[i]));
        }

        html.push('</div>');

        return html.join('');
    },

    getCellHtml: function (isAlive) {
        if (isAlive) {
            return '<div class="cell alive"></div>';
        }

        return '<div class="cell"></div>';
    },

    renderLog: function () {
        this.currentGeneration = this.currentGeneration +1;
        $('#log').html('<p>Rendered generation <strong>' + this.currentGeneration + '</strong></p>');
    }
};

var Gof = {
    generations: [],
    interval: 500
};


$(document).ready(function () {
    Renderer.container = $('#board');
    Renderer.container.html('');

    $('#replay').on('click', function () {
        Renderer.render(Gof);
    });

    $('form').on('submit', function (e) {
        e.preventDefault();
        Renderer.container.html('<strong>please wait...</strong>');
        var data = $(this).serialize();

        $.ajax({
            type: 'POST',
            data: data
        }).fail(function (response) {
            Renderer.container.html(response.responseText);
        }).done(function (response) {
            if (typeof(response) === 'string') {
                response = $.parseJSON(response);
            }

            Gof.generations = response.generations;
            Gof.interval = parseInt($('input[name="interval"]').val());
            Renderer.render(Gof);
        });
    });
});
