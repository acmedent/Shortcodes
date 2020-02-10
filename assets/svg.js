window.onload = function () {

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
            console.log(paths);
            paths.forEach(path => {
                if (path.tagName == "path")
                    path.style.stroke = "#337ebf"
                else {
                    path.style.fill = "#337ebf"
                }
            });


            setTimeout(function () {
                animating = false;
            }, 300);
        }
    });
    var endAnimation = svg.addEventListener("mouseout", function () {
        supLineEnd.endElement();
        infLineEnd.endElement();
        paths.forEach(path => {
            if (path.tagName == "path")
                path.style.stroke = "#000"
            else {
                path.style.fill = "#000"
            }
        });
    });

}