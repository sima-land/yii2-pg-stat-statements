$(document).ready(function () {
    // Get descriptions and optimal size of table columns
    var theads = document.querySelectorAll('table thead th'),
        info = [],
        sizesAfter = [];

    for (var i = 0; i < theads.length; i++) {
        var text = theads[i].childNodes[0].innerText,
            tbodyTd = document.querySelectorAll('tbody td');

        //  Write table headers in array for title attribute
        info.push(text);

        //  Bootstrap tooltip for table header
        theads[i].childNodes[0].setAttribute('data-toggle', 'tooltip');
        theads[i].childNodes[0].setAttribute('data-placement', 'bottom');
        theads[i].childNodes[0].setAttribute('title', info[i]);

        //  Write cells width to array. If scroll not from top then load from cookies
        if ($(window).scrollTop() === 0) {
            sizesAfter.push(theads[i].offsetWidth);
        } else {
            sizesAfter = document.cookie.replace(/.*cellsWidth\=\[(.*)\]\;.*/, '$1').split(',');
        }
        //  Optimal width of cells
        tbodyTd[i].style.width = sizesAfter[i] + 'px';
        theads[i].style.width = sizesAfter[i] + 'px';
    }

    //  Save columns size in cookies
    if ($(window).scrollTop() === 0) {
        document.cookie = "cellsWidth=" + JSON.stringify(sizesAfter);
    }

    //  Title for cells
    var cells = document.querySelectorAll('tbody td'),
        k = 0;
    for (i = 1; i < cells.length; i++) {
        k++;
        if (k === info.length) {
            k = 0;
        }
        cells[i].setAttribute('title', info[k]);
    }

    //  Trim 3rd column (SQL query) to 2 lines
    if ($('tbody tr td:nth-child(2)').text().length > 36) {
        $('tbody tr td:nth-child(2)').html(function () {
            return '<div class="reducer">' + $(this).text() + '</div>'
        });
    }

    //  Highlight column on click
    $('tbody td').click(function () {
        var indexIt = $(this).index() + 1;
        $(this).toggleClass('extend');
        if (($(this).index() + 1) === 2) {
            return;
        } else {
            $('tbody tr td:nth-child(' + indexIt + ')').toggleClass('danger');
        }
    });

    //  Bootstrap features
    //      Affix
    $('thead tr:first-child').affix({
        offset: {
            top: 158,
        }
    });

    //      Tooltip
    $('[data-toggle="tooltip"]').tooltip()
});
