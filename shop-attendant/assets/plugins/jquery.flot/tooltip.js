var previousPoint = null, previousLabel = null;
 
$.fn.UseTooltip = function () {
    $(this).bind("plothover", function (event, pos, item) {
        if (item) {
            if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                previousPoint = item.dataIndex;
                previousLabel = item.series.label;
                $("#tooltip").remove();
 
                var x = item.datapoint[0];
                var y = item.datapoint[1];
 
                var color = item.series.color;
                var date = "Jan " + new Date(x).getDate();
                 
                var unit = "";
 
                if (item.series.label == "Sea Level Pressure") {
                    unit = "hPa";
                } else if (item.series.label == "Wind Speed") {
                    unit = "km/hr";
                } else if (item.series.label == "Temperature") {
                    unit = "°C";
                }
 
                showTooltip(item.pageX, item.pageY, color,
                            "<strong>" + item.series.label + "</strong><br>" + date +
                            " : <strong>" + y + "</strong> " + unit + "");
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
};
 
 
function showTooltip(x, y, color, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 40,
        left: x - 120,
        border: '2px solid ' + color,
        padding: '3px',
        'font-size': '9px',
        'border-radius': '5px',
        'background-color': '#fff',
        'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
        opacity: 0.9
    }).appendTo("body").fadeIn(200);
}