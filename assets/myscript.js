window.onload = function () {

    //---------------------**SVG**----------------------------------------
    try {
        var svg = document.getElementById("svgBox");
        var paths = this.document.getElementsByClassName("svgColor");
        var infLine = document.getElementById("infLine_1");
        var supLine = document.getElementById("supLine_1");
        var infLineEnd = document.getElementById("infLine_3");
        var supLineEnd = document.getElementById("supLine_3");
        var animating = false;
        var animation = svg.addEventListener("mouseenter", function () {
            if (!animating) {
                animating = true;
                supLine.beginElement();
                infLine.beginElement();
                for (var i = 0; i < paths.length; i++) {
                    if (paths[i].tagName == "path")
                        paths[i].style.stroke = "#337ebf"
                    else {
                        paths[i].style.fill = "#337ebf"
                    }
                };


                setTimeout(function () {
                    animating = false;
                }, 300);
            }
        });

        var endAnimation = svg.addEventListener("mouseout", function () {
            supLineEnd.endElement();
            infLineEnd.endElement();
            for (var i = 0; i < paths.length; i++) {
                if (paths[i].tagName == "path")
                    paths[i].style.stroke = "#000"
                else {
                    paths[i].style.fill = "#000"
                }
            };
        });

    } catch (err) {
        this.console.log(err);
    }

}
