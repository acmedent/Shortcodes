window.onload = function () {

    var leftArrow = document.getElementById("left-arrow");
    var rightArrow = document.getElementById("right-arrow");
    var slider = document.getElementById("acme-slider");
    var animating = false;
    var pos = 0;
    var auto;

    var slidesNr = 5;
    slidePos(pos);

    window.addEventListener('blur', () => { clearTimeout(auto); });
    window.addEventListener('focus', () => { auto = setTimeout(() => slidePos(pos), 1000); });

    rightArrow.addEventListener('click', () => {

        if (!animating) {
            pos++;
            if (pos > slidesNr + 1)
                pos = 0;
            slidePos(pos);
        }
    });

    leftArrow.addEventListener('click', () => {

        if (!animating) {
            pos--;
            if (pos < 0)
                pos = slidesNr + 1;
            slidePos(pos);
        }
    });

    function slidePos(spos) {
        animating = true;
        clearTimeout(auto);
        slider.style.transition = "1s";

        switch (spos) {
            case 0:
                slider.style.marginLeft = "-0%";
                setTimeout(() => {
                    slider.style.transition = "0s";
                    slider.style.marginLeft = (-1) * slidesNr * 100 + "%";
                    pos = slidesNr;
                    animating = false;
                }, 1000);
                break;

            case 1:
                slider.style.marginLeft = "-100%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 2:
                slider.style.marginLeft = "-200%";
                setTimeout(() => {
                    animating = false;
                }, 1000);

                break;
            case 3:
                slider.style.marginLeft = "-300%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 4:
                slider.style.marginLeft = "-400%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 5:
                slider.style.marginLeft = "-500%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 6:
                slider.style.marginLeft = (-1) * (slidesNr + 1) * 100 + "%";
                setTimeout(() => {
                    slider.style.transition = "0s";
                    slider.style.marginLeft = "-100%";
                    pos = 1;
                    animating = false;
                }, 1000);
                break;
            default:
                pos = 1;
                break;
        }

        auto = setTimeout(() => {
            animating = true;
            slidePos(++pos);
        }, 8000);

    }

    //---------------------**SVG**----------------------------------------

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





}
