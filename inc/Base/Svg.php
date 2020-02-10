<?php

/**
 * @package  AcmeShortcodes
 */

namespace Inc\Base;

if (!defined('ABSPATH')) {
  die;
};
class Svg
{

  function __construct()
  {
    add_shortcode('nextWeekSvg', array($this, 'nextWeekSvg'));
  }

  function nextWeekSvg()
  {
    return ('
            <style>
      #svgBox {
          margin:auto;
        display: block;
        position: relative;
        width: 170px;
        height: auto;
      }
      svg{
        cursor: pointer;
      }
      #svgCover {
        z-index: 4;
        position: absolute;
        top: inherit;
        left: inherit;
        width: 100%;
        height: 100%;
      }
      .teste:hover{
      stroke:#ffffff
      }
      .svgColor{
        transition: stroke 0.3s;
        transition: fill 0.3s;
      }

    </style>
    <div id="svgBox">
      <a href="/next-week-promo"><div id="svgCover"></div></a>
      
      <svg
        viewBox="0 0 136.30745 28.196934"
        id="nextWeek"
      >
        <defs id="defs2" />

        <g
          inkscape:label="Layer 1"
          inkscape:groupmode="layer"
          id="layer1"
          transform="translate(-31.417707,-134.18692)"
        >
          <g class="svgColor"
            aria-label="Next Week"
            style="font-style:normal;font-weight:normal;font-size:50.79999924px;line-height:1.25;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.26458332"
            id="NextWeek"
          >
            <path
              d="m 51.023959,156.2173 h -2.700955 l -7.78316,-14.68437 v 14.68437 h -2.039496 v -16.41519 h 3.384461 l 7.099653,13.40555 v -13.40555 h 2.039497 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="N"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 65.531945,150.2752 h -9.073003 q 0,1.1355 0.341753,1.98437 0.341754,0.83785 0.937066,1.37804 0.573264,0.52917 1.35599,0.79375 0.79375,0.26459 1.74184,0.26459 1.256771,0 2.524566,-0.4961 1.278819,-0.50712 1.81901,-0.99219 h 0.110243 v 2.25999 q -1.047309,0.44097 -2.138715,0.73863 -1.091406,0.29765 -2.293055,0.29765 -3.064757,0 -4.784549,-1.65364 -1.719792,-1.66467 -1.719792,-4.71841 0,-3.02066 1.642622,-4.79557 1.653646,-1.77491 4.343576,-1.77491 2.491493,0 3.836459,1.45521 1.355989,1.4552 1.355989,4.13411 z m -2.017448,-1.5875 q -0.01102,-1.6316 -0.826823,-2.52457 -0.804774,-0.89297 -2.45842,-0.89297 -1.66467,0 -2.656857,0.98117 -0.981164,0.98116 -1.113455,2.43637 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="e1"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 79.334377,156.2173 h -2.612761 l -3.494705,-4.72943 -3.516753,4.72943 h -2.414323 l 4.806597,-6.14054 -4.7625,-6.17361 h 2.612761 l 3.472656,4.65226 3.48368,-4.65226 h 2.425348 l -4.839671,6.06337 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="x"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 88.429428,156.10706 q -0.584288,0.15434 -1.278819,0.25356 -0.683507,0.0992 -1.223698,0.0992 -1.885156,0 -2.86632,-1.01424 -0.981163,-1.01424 -0.981163,-3.25217 v -6.54844 h -1.400087 v -1.74184 h 1.400087 v -3.5388 h 2.07257 v 3.5388 h 4.27743 v 1.74184 h -4.27743 v 5.61137 q 0,0.97014 0.0441,1.52136 0.0441,0.54019 0.30868,1.01423 0.242535,0.44098 0.661459,0.65044 0.429948,0.19843 1.300868,0.19843 0.507118,0 1.058333,-0.14331 0.551215,-0.15434 0.79375,-0.25356 h 0.110243 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="t"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 118.15096,139.80211 -4.26641,16.41519 h -2.45842 l -3.45061,-13.62604 -3.37344,13.62604 h -2.40329 l -4.343581,-16.41519 h 2.237931 l 3.45061,13.64809 3.39549,-13.64809 h 2.21588 l 3.42856,13.78038 3.42856,-13.78038 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="W"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 130.39896,150.2752 h -9.07301 q 0,1.1355 0.34176,1.98437 0.34175,0.83785 0.93706,1.37804 0.57327,0.52917 1.35599,0.79375 0.79375,0.26459 1.74184,0.26459 1.25677,0 2.52457,-0.4961 1.27882,-0.50712 1.81901,-0.99219 h 0.11024 v 2.25999 q -1.04731,0.44097 -2.13871,0.73863 -1.09141,0.29765 -2.29306,0.29765 -3.06476,0 -4.78455,-1.65364 -1.71979,-1.66467 -1.71979,-4.71841 0,-3.02066 1.64262,-4.79557 1.65365,-1.77491 4.34358,-1.77491 2.49149,0 3.83646,1.45521 1.35599,1.4552 1.35599,4.13411 z m -2.01745,-1.5875 q -0.011,-1.6316 -0.82682,-2.52457 -0.80478,-0.89297 -2.45842,-0.89297 -1.66467,0 -2.65686,0.98117 -0.98116,0.98116 -1.11346,2.43637 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="e2"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 143.84861,150.2752 h -9.073 q 0,1.1355 0.34175,1.98437 0.34175,0.83785 0.93707,1.37804 0.57326,0.52917 1.35599,0.79375 0.79375,0.26459 1.74184,0.26459 1.25677,0 2.52456,-0.4961 1.27882,-0.50712 1.81901,-0.99219 h 0.11025 v 2.25999 q -1.04731,0.44097 -2.13872,0.73863 -1.09141,0.29765 -2.29305,0.29765 -3.06476,0 -4.78455,-1.65364 -1.7198,-1.66467 -1.7198,-4.71841 0,-3.02066 1.64263,-4.79557 1.65364,-1.77491 4.34357,-1.77491 2.4915,0 3.83646,1.45521 1.35599,1.4552 1.35599,4.13411 z m -2.01745,-1.5875 q -0.011,-1.6316 -0.82682,-2.52457 -0.80477,-0.89297 -2.45842,-0.89297 -1.66467,0 -2.65686,0.98117 -0.98116,0.98116 -1.11345,2.43637 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="e3"
              inkscape:connector-curvature="0"
            />
            <path
              d="m 158.16918,156.2173 h -2.73402 l -4.93889,-5.39089 -1.34497,1.27882 v 4.11207 h -2.07257 v -17.15382 h 2.07257 v 11.00226 l 5.9862,-6.16259 h 2.61276 l -5.72161,5.68854 z"
              style="font-size:22.57777786px;stroke-width:0.26458332"
              id="k"
              inkscape:connector-curvature="0"
            />
          </g>
          <path class="svgColor"
            style="fill:none;stroke:#000000;stroke-width:1.5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
          >
            <animate
              id="infLine_1"
              attributeName="d"
              values="m 161.88659,158.54854 h -1.23211 l -8.6e-4,-0.75016;M 161.88659,158.54854 H 34.977397 l -8.6e-4,-0.75016"
              begin="N.click"
              dur="0.2s"
            />
            <animate
              id="infLine_2"
              attributeName="d"
              values="M 161.88659,158.54854 H 34.977397 l -8.6e-4,-0.75016;M 161.88659,158.54854 H 34.977397 l -8.6e-4,-22.20208"
              dur="0.05s"
              begin="infLine_1.end"
            />
            <animate
              id="infLine_3"
              attributeName="d"
              values="M 161.88659,158.54854 H 34.977397 l -8.6e-4,-22.20208"
              begin="infLine_2.end"
            />
          </path>
          <path class="svgColor"
            style="fill:none;stroke:#000000;stroke-width:1.5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
          >
            <animate
              attributeName="d"
              values="m 34.226707,136.34685 h 0.75 v 0.75;M 34.226707,136.34685 H 161.13671 v 0.75"
              id="supLine_1"
              begin="N.click"
              dur="0.2s"
            />
            <animate
              attributeName="d"
              values="M 34.226707,136.34685 H 161.13671 v 0.75;M 34.226707,136.34685 H 161.13671 v 22.202"
              id="supLine_2"
              begin="supLine_1.end"
              dur="0.05s"
            />
            <animate
              attributeName="d"
              values="M 34.226707,136.34685 H 161.13671 v 22.202"
              id="supLine_3"
              begin="supLine_2.end"
            />
          </path>
        </g>
      </svg>
      
    </div>
            ');
  }
}
