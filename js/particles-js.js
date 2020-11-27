/* -----------------------------------------------
/* Author : Vincent Garreau  - vincentgarreau.com
/* MIT license: http://opensource.org/licenses/MIT
/* Demo / Generator : vincentgarreau.com/particles.js
/* GitHub : github.com/VincentGarreau/particles.js
/* How to use? : Check the GitHub README
/* v2.0.0
/* ----------------------------------------------- */

particlesJS("particles-js", {
"particles": {
"number": {
  "value": 80,
  "density": {
    "enable": true,
    "value_area": 789.1476416322727
  }
},
"color": {
  "value": "#397E20"
},
"shape": {
  "type": "edge",
  "stroke": {
    "width": 0,
    "color": "#397E202"
  },

},
"opacity": {
  "value": 0.7,
  "random": false,
  "anim": {
    "enable": true,
    "speed": 0.9,
    "opacity_min": 0,
    "sync": false
  }
},
"size": {
  "value": 7,
  "random": true,
  "anim": {
    "enable": true,
    "speed": 2,
    "size_min": 0,
    "sync": false
  }
},
"line_linked": {
  "enable": false,
  "distance": 150,
  "color": "#397E20",
  "opacity": 0.4,
  "width": 1
},
"move": {
  "enable": true,
  "speed": 0.2,
  "direction": "top",
  "random": true,
  "straight": false,
  "out_mode": "out",
  "bounce": false,
  "attract": {
    "enable": false,
    "rotateX": 600,
    "rotateY": 1200
  }
}
},
"interactivity": {
"detect_on": "canvas",
"events": {
  "onhover": {
    "enable": true,
    "mode": "bubble"
  },
  "onclick": {
    "enable": true,
    "mode": "push"
  },
  "resize": true
},
"modes": {
  "grab": {
    "distance": 400,
    "line_linked": {
      "opacity": 1
    }
  },
  "bubble": {
    "distance": 83.91608391608392,
    "size": 1,
    "duration": 3,
    "opacity": 1,
    "speed": 3
  },
  "repulse": {
    "distance": 200,
    "duration": 0.4
  },
  "push": {
    "particles_nb": 4
  },
  "remove": {
    "particles_nb": 2
  }
}
},
"retina_detect": true
});
