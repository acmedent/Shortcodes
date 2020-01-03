window.onload = function () {

    var leftArrow = document.getElementById("left-arrow");
    var rightArrow = document.getElementById("right-arrow");
    var slider = document.getElementById("acme-slider");

    var pos = -1;
    var animating = true;
    var auto;
    auto = setTimeout(() => slidePos(pos), 1000);

    window.addEventListener('blur', () => { clearTimeout(auto); });
    window.addEventListener('focus', () => { auto = setTimeout(() => slidePos(pos), 1000); });

    rightArrow.addEventListener('click', () => {

        if (!animating) {
            pos++;
            slidePos(pos);
        }
    });

    leftArrow.addEventListener('click', () => {

        if (!animating) {
            pos--;
            slidePos(pos);
        }
    });


    function slidePos(spos) {
        animating = true;
        clearTimeout(auto);
        slider.style.transition = "1s";
        switch (spos) {
            case 0:
                console.log(spos);
                slider.style.marginLeft = "-0%";
                setTimeout(() => {
                    slider.style.transition = "0s";
                    slider.style.marginLeft = "-400%";
                    pos = 4;
                    animating = false;
                }, 1000);
                break;

            case 1:
                console.log(spos);
                slider.style.marginLeft = -100+"%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 2:
                console.log(spos);
                slider.style.marginLeft = "-200%";
                setTimeout(() => {
                    animating = false;
                }, 1000);

                break;
            case 3:
                console.log(spos);
                slider.style.marginLeft = "-300%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 4:
                console.log(spos);
                slider.style.marginLeft = "-400%";
                setTimeout(() => {
                    animating = false;
                }, 1000);
                break;
            case 5:
                console.log(spos);
                slider.style.marginLeft = "-500%";
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