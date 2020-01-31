window.onload = function () {

    var leftArrow = document.getElementById("left-arrow");
    var rightArrow = document.getElementById("right-arrow");
    var slideArrows = document.getElementsByClassName("slide-arrow");
    var slider = document.getElementById("acme-slider");
    var animating = false;

    slideArrows.forEach(arrow => {
        arrow.style.display = "block";
    });

    var pos = 0;
    var auto;

    var slidesNr = 3;
    slidePos(pos);

    window.addEventListener('blur', () => { clearTimeout(auto); });
    window.addEventListener('focus', () => { auto = setTimeout(() => slidePos(pos), 1000); });

    rightArrow.addEventListener('click', () => {

        if (!animating) {
            pos++;
            if (pos > 5)
                pos = 0;
            slidePos(pos);
        }
    });

    leftArrow.addEventListener('click', () => {

        if (!animating) {
            pos--;
            if (pos < 0)
                pos = 4;
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
}
